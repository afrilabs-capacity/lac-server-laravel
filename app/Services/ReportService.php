<?php
namespace App\Services;

use App\Providers\RouteServiceProvider;
use App\Role;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Mreport;

class ReportService
{

    public function canMreport()
    {
        return auth('api')->user()->monthly_report == "Yes";
         // || auth('api')->user()
         //        ->hasRole('admin') ? true : false;
    }

    public function canReport()
    {
        return auth('api')->user()->zone_id > 0 && auth('api')
            ->user()->state_id > 0 || auth('api')->user()
                ->hasRole('admin') && auth('api')->user()->zone_id > 0 && auth('api')
            ->user()->state_id > 0 ? true : false;
    }

    public function hasReportZone($reportData)
    {
        return auth('api')->user()->zone_id == $reportData->zone_id;
    }

    public function shouldMreportAccessError($reportData)
    {
        $user = auth('api')->user()
                ->hasRole('admin') ? 'admin' : 'lawyer';
                if(!$this->hasReportZone($reportData)){
                     return response()->json(['status' => 'Unauthorized access', 'code' => 402], 401);
                } 

    }

     public function isAdmin()
    {
        return auth('api')->user()->hasRole('admin');
    }

      public function fullyQualifiedMreporter($reportData)
    {
        return $this->hasReportZone($reportData) && $this->canMreport() && $this->canReport();
    }




    

}

