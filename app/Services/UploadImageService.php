<?php

namespace App\Services;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\ApiResponses;
use Illuminate\Http\Request;
use App\User;
use App\Dreport;
use App\Pdss;

class UploadImageService {



    use AuthenticatesUsers;

    /**
     * @var string
     */
    protected $uploadDirectory;

    /**
     * @var Array
     */
    protected $data;

    public function __construct($data=null){

        $this->data=$data;

        $this->apiResponse=new ApiResponses();

    }


    public function upload($image,$directory,$request,$type){
   
   $res = [
        'success' => false,
        'message' => '',
    ];
  
    $file = base64_decode($image);
        //$folderName = "/uploads";
        $safeName = time().'.'.'png';
        $destinationPath = public_path() . $directory;
        try{
        $success = file_put_contents(public_path()."/$directory/".$safeName, $file);
        if($type=="daily"){
         $user= Dreport::find($request->report_id);   
     }else{
         $user= Pdss::find($request->report_id); 
        }
        
        
        if($request->image_id=="1"){
            $user->photo_one=$safeName;
        }else{
            $user->photo_two=$safeName;
        }
        

        $user->save();
            $res['success']=true;
            return $this->apiResponse->responseDataSuccess('Success.',$safeName);
        }catch(\Exception  $e){
        //return "hi";
        if($e instanceof ModelNotFoundException ){
            return response()->json(["message"=>"Invalid user"],500);
        }else {
         return response()->json(["message"=>$e->getMessage()],500);
    }
    }

    }

       
    public function uploadTemp($image,$directory,$request,$prefix){
   
   $res = [
        'success' => false,
        'message' => '',
    ];
  
    $file = base64_decode($image);
        $folderName = "public/uploads/$directory";
        $safeName = time().'.'.'png';
        $destinationPath = public_path() . $folderName;
        try{
        $success = file_put_contents(public_path()."/uploads/$prefix/$directory".$safeName, $file);

        return array('success'=>true,'title'=>$safeName);

        }catch(Exception $e){
             
       return array('success'=>false,'title'=>$safeName);

        }

    }


    


}