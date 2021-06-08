<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Mreport extends Model
{
    //

      protected $table="monthly_report";  

       protected $appends=['submited','date_case_received_human','date_case_granted_human','date_case_completed_human'];

    protected $fillable =[  'user_id',
                            'zone_id',
                            'state_id',
                            'centre_id',
                            'regno',
                            'first_name',
                            'last_name',
                            'gender',
                            'age',
                            'marital_status',
                            'occupation',
                            'state_of_origin',
                            'case_type',
                            'offence',
                            'complaints',
                            'court',
                            'case_no',
                            'date_case_received',
                            'date_case_granted',
                            'granted',
                            'eligible',
                            'active_case',
                            'counsel_assigned',
                            'date_case_completed',
                            'completed_case',
                            'case_outcome',
                            'resolution'
];


public function getSubmitedAttribute($value){
        return $this->created_at->format('d M Y');
    }

     public function user()
    {
    return $this->belongsTo('App\User');
    }

   public function zone()
    {
    return $this->belongsTo('App\Zone');
    }

      public function centre()
    {
    return $this->belongsTo('App\Centre');
    }

    public function state()
    {
    return $this->belongsTo('App\State');
    }

    public function storigin()
    {
    return $this->belongsTo('App\State','state_of_origin');
    }


    public function setDateCaseReceivedAttribute($value)
{

	//echo $value;
    $this->attributes['date_case_received'] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->toDateTimeString();
}



    public function setDateCaseGrantedAttribute($value)
{
    // $this->attributes['date_case_granted'] = Carbon::parse('m/d/Y', $value)->format('Y-m-d');
    $this->attributes['date_case_granted'] =Carbon::createFromFormat('Y-m-d H:i:s', $value)->toDateTimeString();
}


    public function setDateCaseCompletedAttribute($value)
{
    $this->attributes['date_case_completed'] = Carbon::createFromFormat('Y-m-d H:i:s', $value)->toDateTimeString();
}


//set format d-m-y
public function getDateCaseReceivedHumanAttribute($value){
        return Carbon::parse($this->date_case_received)->format('d M Y');
}

public function getDateCaseGrantedHumanAttribute($value){
        return Carbon::parse($this->date_case_granted)->format('d M Y');
}

public function getDateCaseCompletedHumanAttribute($value){
       return Carbon::parse($this->date_case_completed)->format('d M Y');
}


}
