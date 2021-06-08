<?php

namespace App\Services;

class UtilService{

           public $user;

           // public function __construct($user=null) {
           //    $this->user=$user;
           // }

          public static  $monthlyReportRules= [
            
            'regno'=>'required|numeric',
            'first_name'=>'required|String|max:15',
            'last_name'=>'required|String|max:15',
            'gender'=>'required|String|max:10',
            'age'=>'required|integer',
            'marital_status'=>'required|String|max:10',
            'occupation'=>'required|String|max:20',
            'state_of_origin'=>'required|integer',
            'case_type'=>'required|String|max:30',
            'offence'=>'max:40',
            'complaints'=>'max:40',
            'court'=>'required|String|max:40',
            'case_no'=>'required|String|max:40',
            'date_case_received'=>'required|date',
            'date_case_granted'=>'required|date',
            'granted'=>'required|max:5',
            'eligible'=>'required|max:5',
            'active_case'=>'required|max:5',
            'counsel_assigned'=>'required|String',
            'date_case_completed'=>'required|date',
            'completed_case'=>'required|max:5',
            'case_outcome'=>'required|String|max:30',
            'resolution'=>'required|String|max:30',

        ];

        public static  $dailyReportRules= [
             //'sno'=>'required|String|max:20',
            //'user_id'=>'required|integer|max:2',
            'first_name'=>'required|String|max:50',
            'last_name'=>'required|String|max:40',
            'gender'=>'required|String|max:10',
            'age'=>'required|String|max:2',
            'occupation'=>'required|String|max:20',
            'granted'=>'required|max:5',
            'case_type'=>'required|String|max:30',
            'offence'=>'String|max:40',
            'complaints'=>'String|max:40',
            'location'=>'required|String|max:2',
            'bail_status'=>'required|String|max:70',
            'outcome'=>'required|String|max:80',

        ];

        public static  $pdssReportRules= [
            // 'sno'=>'required|String|max:20',
            'first_name'=>'required|String|max:15',
            'last_name'=>'required|String|max:15',
            'gender'=>'required|String|max:10',
            'marital_status'=>'required|String|max:10',
            'occupation'=>'required|String|max:20',
            'offence'=>'required|String|max:40',
            'pod'=>'required|String|max:70',
            'date_arrested'=>'required|String|max:40',
            'date_released'=>'required|String|max:40',
            'duration'=>'required|String|max:40',
            'counsel_assigned'=>'required|String|max:40',

        ];



        public static $monthlyReportAttributeNames= [
            //'sno'=>'S/NO',
            'regno'=>'Reg No',
            'first_name'=>'First Name',
            'last_name'=>'Last Name',
            'gender'=>'Gender',
            'age'=>'Age',
            'marital_status'=>'Marital Status',
            'occupation'=>'Occupation',
            'state_of_origin'=>'State of Origin',
            'case_type'=>'Case Type',
            'offence'=>'Offence',
            'complaints'=>'Complaints',
            'court'=>'Court',
            'case_no'=>'Case No',
            'date_case_received'=>'Date Case Recived',
            'date_case_granted'=>'Date Case  Granted',
            'granted'=>'Granted',
            'eligible'=>'Eligible',
            'active_case'=>'Active Case',
            'councel_assigned'=>'Counsel assigned',
            'date_case_completed'=>'Date Case Completed',
            'completed_case'=>'Completed cass',
            'case_outcome'=>'Case Outcome',
            'resolution'=>'Resolution',

        ];

         public static $dailyReportAttributeNames= [
            'sno'=>'S/No',
            'first_name'=>'First Name',
            'last_name'=>'Last Name',
            'gender'=>'Gender',
            'age'=>'Age',
            'occupation'=>'Occupation',
            'granted'=>'Granted',
            'case_type'=>'Case type',
            'offence'=>'Offence',
            'complaints'=>'Complaints',
            'location'=>'Location',
            'bail_status'=>'Bail Status',
            'outcome'=>'Outcome',

        ];

         public static $pdssReportAttributeNames= [
            //'sno'=>'S/No',
            'first_name'=>'First Name',
            'last_name'=>'Last Name',
            'gender'=>'Gender',
            'marital_status'=>'Marital Status',
            'occupation'=>'Occupation',
            'offence'=>'Offence',
            'pod'=>'Place of Detention',
            'date_arrested'=>'Date Arrested',
            'date_released'=>'Date Released',
            'duration'=>'Duration',
            'counsel_assigned'=>'Counsel Assigned',

        ];


         public static  $userRules= [
            'names' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'status' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'gl' => 'required|string|max:255',
            'sex' =>'required|string|max:255',
            'phone' => 'string|max:255',
            'zone_id' => 'required|integer',
            'state_id' => 'required|integer',
            'centre_id' => 'integer',
            'monthly_report' => 'required:string|max:255',
            'role' => 'required:string|max:255',

        ];
        
        public static $userAttributeNames= [

            'names' => 'Names',
            'email' => 'Email',
            'status' => 'Status',
            'qualification' => 'Qualification',
            'gl' => 'Grade Level',
            'sex' =>'Sex',
            'phone' => 'Phone',
            'zone_id' => 'Zone',
            'state_id' => 'State',
            'centre_id' => 'Centre',
            'monthly_report' => 'Monthly report',
            'role' => 'Role',
            // 'reg_type' => 'Registration type',



];


public static function getUserRules($id){

   return   [
            'names' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'status' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'gl' => 'required|string|max:255',
            'sex' =>'required|string|max:255',
            'phone' => 'string|max:255',
            'zone_id' => 'required|integer',
            'state_id' => 'required|integer',
            'centre_id' => 'integer',
            'monthly_report' => 'required:string|max:255',
            'role' => 'required:string|max:255',

        ];

    }

}
