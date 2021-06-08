<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dreport;
use App\Mreport;
use App\Pdss;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Rtoken;
use Hash;
use App\Services\ApiService;
use Illuminate\Support\Facades\Validator;
use App\Services\UtilService;
use App\Services\ReportService;
use App\Services\ApiResponses;
use App\Services\UploadImageService;
use File;
use App\Council;
use App\State;
use Carbon\Carbon;

class ReportController extends Controller
{

    public function newDailyReport(Request $request)
    {

        //$this->apiResponse=new ApiResponses();
        $validator = Validator::make($request->all() , UtilService::$dailyReportRules);
        $validator->setAttributeNames(UtilService::$dailyReportAttributeNames);
        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors() ], 422);
        }
        try
        {
            //$request->merge(['user_id' => auth('api')->user()->id]);
            $request
                ->request
                ->add(['user_id' => auth('api')
                ->user()->id]);
            //return $request->bail_status;
            $report = Dreport::create($request->all());
            return response()
                ->json(['report' => $report], 200);

        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid user"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => $e->getMessage() ], 500);
            }
        }
    }

    public function editedDailyReport(Request $request)
    {

        //$this->apiResponse=new ApiResponses();
        $validator = Validator::make($request->all() , UtilService::$dailyReportRules);
        $validator->setAttributeNames(UtilService::$dailyReportAttributeNames);
        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors() ], 422);
        }
        try
        {
            //$request->merge(['user_id' => auth('api')->user()->id]);
            // $request
            //     ->request
            //     ->add(['user_id' => auth('api')
            //     ->user()->id]);
            //return $request->bail_status;
            // $report = Dreport::create($request->all());
            // return response()
            //     ->json(['report' => $report], 200);

                  $report = Dreport::whereId($request->report_id)
                ->update($request->except(['report_id']));
            return response()
                ->json(['report' => 'success'], 200);

        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid user"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => $e->getMessage() ], 500);
            }
        }
    }

    public function fetchDailyReports(Request $request)
    {
        //auth('api')->invalidate(true);
        return response()->json(['reports' => Dreport::where('user_id', auth('api')
            ->user()
            ->id)
            ->orderBy('id', 'desc')
            ->paginate(10) ], 200);

    }

    public function fetchDailyReport($report_id)
    {
        //auth('api')->invalidate(true);
        return response()->json(['report' => Dreport::where('user_id', auth('api')
            ->user()
            ->id)
            ->where('id', $report_id)->first() ], 200);

    }

    public function searchDailyReports(Request $request, Dreport $dReport)
    {

        $dReport = $dReport->newQuery();
        $dReport->where('user_id', auth('api')
            ->user()
            ->id);
        // Search for a user based on their name.
        if (!empty($request->location))
        {
            $dReport->where('location', $request->location);
        }

        if (!empty($request->first_name))
        {
            $dReport->where('first_name', 'LIKE', "%{$request->first_name}%");
        }
        if (!empty($request->last_name))
        {
            $dReport->where('last_name', 'LIKE', "%{$request->last_name}%");
        }

        //->orderBy('created_at','desc')
        $result = $dReport->paginate(10)
            ->appends(request()
            ->query());

        return response()
            ->json(['reports' => $result], 200);
    }

    public function uploadDailyReportImage(Request $request)
    {
        $uploadImageService = new UploadImageService();
        return $uploadImageService->upload($request['image'], '/uploads/daily', $request, 'daily');

    }

    public function deleteDailyReportImage(Request $request)
    {

        try
        {

            $report = Dreport::findOrFail($request->report_id);

            $imageToDelete = $request->image_id == "1" ? $report->photo_one : $report->photo_two;

            if (File::exists(public_path("uploads/daily/" . basename($imageToDelete))))
            {
                File::delete(public_path("uploads/daily/" . basename($imageToDelete)));

                if ($request->image_id == "1")
                {
                    $report->photo_one = null;
                }
                else
                {
                    $report->photo_two = null;
                }

                $report->save();

            }
            else
            {
                //dd('File does not exists.');
                //return response()->json(['report',"File does not exists"],200);
                
            }

            return response()
                ->json(["message" => "success"], 200);
        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid user"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => $e->getMessage() ], 500);
            }
        }

    }



        public function deleteDailyReport(Request $request)
    {

        try
        {

            $report = Dreport::findOrFail($request->report_id);

            $report->delete();
               

            return response()
                ->json(["message" => 'success'], 200);
        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid user"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => $e->getMessage() ], 500);
            }
        }

    }

    /**
     * All reports, if admin then all reports, else based on user zone.
     *
     * @param  int  $id
     * @return \App\Report Collection
     */

    public function fetchDailyReportAllOrUser()
    {

        try
        {

            $reports = auth('api')->user()
                ->hasRole('admin') ? Dreport::with('user', 'user.zone', 'user.state', 'user.centre')
                ->get() : Dreport::where('user_id', auth('api')
                ->user()
                ->id)
                ->get();

            return response()
                ->json(['reports' => $reports,
            //'admin'=>$isAdmin
            ], 200);
        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid user"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => $e->getMessage() ], 500);
            }
        }

    }

    /**
     * Single user record by $id.
     *
     * @param  int  $id
     * @return \App\User Instance
     */

    public function fetchDailyReportWeb($id)
    {

        $reportData = auth('api')->user()
            ->hasRole('admin') ? Dreport::with('user', 'user.zone', 'user.state', 'user.centre')
            ->findOrFail($id) : Dreport::findOrFail($id);

        if (auth('api')->user()
            ->hasRole('admin') || auth('api')
            ->user()->id == $reportData->user_id)
        {
            $report = $reportData;

        }
        else
        {
            //return 'condition failed';
            return response()->json(['status' => 'Unauthorized access', 'code' => 402], 401);
            $report = [];
        }

        //return data or fail
        return response()->json(['report' => $report], 200);

    }

    /*PDSS CONTROLLERS*/
    public function newPdssReport(Request $request)
    {
        //auth('api')->invalidate(true);
        $validator = Validator::make($request->all() , UtilService::$pdssReportRules);
        $validator->setAttributeNames(UtilService::$pdssReportAttributeNames);
        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors() ], 422);
        }
        try
        {

            $request
                ->request
                ->add(['user_id' => auth('api')
                ->user()->id]);
            //return $request->bail_status;
            $report = Pdss::create($request->all());
            return response()
                ->json(['report' => $report], 200);
        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid user"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => $e->getMessage() ], 500);
            }
        }
    }

    public function editedPdssReport(Request $request)
    {

        $validator = Validator::make($request->all() , UtilService::$pdssReportRules);
        $validator->setAttributeNames(UtilService::$pdssReportAttributeNames);
        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors() ], 422);
        }
        try
        {
           

                  $report = Pdss::whereId($request->report_id)
                ->update($request->except(['report_id']));
            return response()
                ->json(['report' => 'success'], 200);

        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid user"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => $e->getMessage() ], 500);
            }
        }
    }


    public function fetchPdssReports(Request $request)
    {
        //auth('api')->invalidate(true);
        return response()->json(['reports' => Pdss::where('user_id', auth('api')
            ->user()
            ->id)
            ->orderBy('id', 'desc')
            ->paginate(10) ], 200);

    }

    public function fetchPdssReport($report_id)
    {
        //auth('api')->invalidate(true);
        return response()->json(['report' => Pdss::where('user_id', auth('api')
            ->user()
            ->id)
            ->where('id', $report_id)->first() ], 200);

    }

    public function searchPdssReports(Request $request, Pdss $dReport)
    {
        $dReport = $dReport->newQuery();
        $dReport->where('user_id', auth('api')
            ->user()
            ->id);
        if (!empty($request->counsel_assigned))
        {
            $dReport->where('counsel_assigned', 'LIKE', "%{$request->counsel_assigned}%");
        }

        if (!empty($request->first_name))
        {
            $dReport->where('first_name', 'LIKE', "%{$request->first_name}%");
        }
        if (!empty($request->last_name))
        {
            $dReport->where('last_name', 'LIKE', "%{$request->last_name}%");
        }

        //->orderBy('created_at','desc')
        $result = $dReport->paginate(10)
            ->appends(request()
            ->query());

        return response()
            ->json(['reports' => $result], 200);
    }

    public function uploadPdssReportImage(Request $request)
    {
        $uploadImageService = new UploadImageService();
        return $uploadImageService->upload($request['image'], '/uploads/pdss', $request, 'pdss');

    }

    public function deletePdssReportImage(Request $request)
    {

        try
        {

            $report = Pdss::findOrFail($request->report_id);

            $imageToDelete = $request->image_id == "1" ? $report->photo_one : $report->photo_two;

            if (File::exists(public_path("uploads/pdss/" . basename($imageToDelete))))
            {
                File::delete(public_path("uploads/pdss/" . basename($imageToDelete)));

                if ($request->image_id == "1")
                {
                    $report->photo_one = null;
                }
                else
                {
                    $report->photo_two = null;
                }

                $report->save();
                //return response()->json(['report',"file exists"],200);
                
            }
            else
            {
                //dd('File does not exists.');
                //return response()->json(['report',"File does not exists"],200);
                
            }

            return response()
                ->json(["message" => "success"], 200);
        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid user"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => $e->getMessage() ], 500);
            }
        }

    }

      public function deletePdssReport(Request $request)
    {

        try
        {

            $report = Pdss::findOrFail($request->report_id);

            $report->delete();
               

            return response()
                ->json(["message" => 'success'], 200);
        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid user"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => $e->getMessage() ], 500);
            }
        }

    }

    /**
     * All reports, if admin then all reports, else based report owner.
     *
     * @param  int  $id
     * @return \App\Report Collection
     */

    public function fetchPdssReportAllOrUser(ReportService $reportservice)
    {

        try
        {

            $reports = $reportservice->isAdmin() ? Pdss::with('user', 'user.zone', 'user.state', 'user.centre')
                ->get() : Pdss::where('user_id', auth('api')
                ->user()
                ->id)
                ->get();

            return response()
                ->json(['reports' => $reports,
            //'admin'=>$isAdmin
            ], 200);
        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid query"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => $e->getMessage() ], 500);
            }
        }

    }

    /**
     * Single report record by $id.
     *
     * @param  int  $id
     * @return \App\User Instance
     */

    public function fetchPdssReportWeb($id,ReportService $reportservice)
    {

        $reportData = $reportservice->isAdmin() ? Pdss::with('user', 'user.zone', 'user.state', 'user.centre')
            ->findOrFail($id) : Pdss::findOrFail($id);

        if ($reportservice->isAdmin() || auth('api')
            ->user()->id == $reportData->user_id)
        {
            $report = $reportData;

        }
        else
        {
            //return 'condition failed';
            return response()->json(['status' => 'Unauthorized access', 'code' => 402], 401);
            $report = [];
        }

        //return data or fail
        return response()->json(['report' => $report], 200);

    }

    /*MONTHLY CONTROLLERS*/
    public function newMonthlyReport(Request $request)
    {

        $validator = Validator::make($request->all() , UtilService::$monthlyReportRules);
        $validator->setAttributeNames(UtilService::$monthlyReportAttributeNames);
        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors() ], 422);
        }

        try
        {

            $request
                ->request
                ->add(['user_id' => auth('api')
                ->user()->id, 'zone_id' => auth('api')
                ->user()->zone_id, 'state_id' => auth('api')
                ->user()->state_id, 'centre_id' => auth('api')
                ->user()->centre_id > 0 ? auth('api')
                ->user()->centre_id : "0",

            ]);
            //return $request->bail_status;
            $report = Mreport::create($request->all());
            return response()
                ->json(['report' => $report], 200);
        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid user"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => $e->getMessage() ], 500);
            }
        }
    }

    public function monthlyReportUpdate(Request $request, ReportService $reportservice)
    {

        $reportData = Mreport::with('zone', 'state', 'centre', 'storigin')->findOrFail($request->id);

        if($reportservice->isAdmin() && !$reportservice->fullyQualifiedMreporter($reportData)){
            return $reportservice->shouldMreportAccessError($reportData);
        }

        if(!$reportservice->isAdmin() && !$reportservice->fullyQualifiedMreporter($reportData)){
             return $reportservice->shouldMreportAccessError($reportData);
        }

        //return 'trial';
        $validator = Validator::make($request->all() , UtilService::$monthlyReportRules);
        $validator->setAttributeNames(UtilService::$monthlyReportAttributeNames);
        if ($validator->fails())
        {
            return response()
                ->json(['errors' => $validator->errors() ], 422);
        }

        try
        {

            //return $request->bail_status;
            $report = Mreport::whereId($request->id)
                ->update($request->except(['submited', 'date_case_received_human', 'date_case_granted_human', 'date_case_completed_human', 'zone', 'state', 'centre', 'storigin','user']));
            return response()
                ->json(['report' => $report], 200);
        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid user"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => $e->getMessage() ], 500);
            }
        }
    }

    /**
     * Single user record by $id.
     *
     * @param  int  $id
     * @return \App\User Instance
     */

    public function fetchMonthlyReport($id)
    {

        $reportData = Mreport::with('zone', 'state', 'centre', 'storigin','user')->findOrFail($id);

        //return data or fail
        $monthly_report = auth('api')->user()->monthly_report == "No" ? false : true;

        //check if user has zoneid and state id
        $can_report = auth('api')->user()->zone_id > 0 && auth('api')
            ->user()->state_id > 0 ? true : false;

        //check if belongs to report zone and state
        $userIsZoned = auth('api')->user()->zone_id == $reportData->zone_id;

        if (auth('api')
            ->user()
            ->hasRole('admin') || $monthly_report && $can_report && $userIsZoned)
        {
            $report = auth('api')->user()
                ->hasRole('admin') ? $reportData : $reportData;

        }
        else
        {
            //return 'condition failed';
            return response()->json(['status' => 'Unauthorized access', 'code' => 402], 401);
            $report = [];
        }

        //return data or fail
        return response()->json(['report' => $report], 200);

    }

    /**
     * All reports, if admin then all reports, else based on user zone.
     *
     * @param  int  $id
     * @return \App\Report Collection
     */

    public function fetchMonthlyReportAllOrUser()
    {

        try
        {

            $message = '';

            //return data or fail
            $monthly_report = auth('api')->user()->monthly_report == "No" ? false : true;

            //check if user has zoneid and state id
            $can_report = auth('api')->user()->zone_id > 0 && auth('api')
                ->user()->state_id > 0 ? true : false;

            //if user is admin or enables for monthly report and can report (zone id and state present). Return all reports for admin and zone reports based on user zone
            if (auth('api')
                ->user()
                ->hasRole('admin') || $monthly_report && $can_report)
            {
                $reports = auth('api')->user()
                    ->hasRole('admin') ? Mreport::with('zone', 'state', 'centre', 'storigin','user')
                    ->get() : Mreport::with('zone', 'state', 'centre', 'storigin')
                    ->where('zone_id', auth('api')
                    ->user()
                    ->zone_id)
                    ->get();

                //return $reports[0]->id;
                
            }
            else
            {
                //return 'condition failed';
                $reports = [];
            }

            return response()->json(['reports' => $reports,
            //'admin'=>$isAdmin
            ], 200);
        }
        catch(\Exception $e)
        {
            //return "hi";
            if ($e instanceof ModelNotFoundException)
            {
                return response()->json(["message" => "Invalid user"], 500);
            }
            else
            {
                return response()
                    ->json(["message" => $e->getMessage() ], 500);
            }
        }

    }

    /*MISC CONTROLLERS*/
    public function fetchCouncils(Request $request)
    {
        //auth('api')->invalidate(true);
        return response()->json(['councils' => Council::all() ], 200);

    }

    public function fetchStates(Request $request)
    {
        //auth('api')->invalidate(true);
        return response()->json(['states' => State::all() ], 200);

    }
    
    //
    public function fetchMonthlyConfig(ReportService $reportservice)
    {

        return response()->json(['states' => State::all() , 'counsels' => Council::all() , 'monthly_report' => $reportservice->canMreport() , 'can_report' => $reportservice->canReport() ,
            'server_date'=>Carbon::now('Africa/Lagos')

    ], 200);

    }

}

