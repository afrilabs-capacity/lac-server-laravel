<?php

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
//Access-Control-Allow-Origin: *
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });




// Auth Endpoints
Route::group( [
    'prefix' => 'v1/auth'
], function ($router) {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LogoutController@logout');
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('forgot-password', 'Auth\ForgotPasswordController@email');
    Route::post('password-reset', 'Auth\ResetPasswordController@reset');
});

Route::group( [
    'prefix' => 'v1'
], function ($router) {
    Route::post('get-reg-token', 'UserController@getRegToken');
    Route::post('validate-reg-token', 'UserController@validateRegToken');
    Route::post('feedback', 'UserController@FeedBack');

    /*forgot password routes*/
    Route::post('get-reg-token-forget', 'UserController@getRegTokenForget');
    Route::post('validate-reg-token-forget', 'UserController@validateRegTokenForget');
    Route::post('create-password', 'UserController@createPassword');
    
});


Route::group( [
    'prefix' => 'v1/report'
], function ($router) {


     /*PDSS Report Routes*/
    Route::middleware('jwt.verify')->post('new-pdss-report', 'ReportController@newPdssReport');

    Route::middleware('jwt.verify')->post('edited-pdss-report', 'ReportController@editedPdssReport');

      Route::middleware('jwt.verify')->
     get('fetch-reports-pdss', 'ReportController@fetchPdssReports');

      Route::
       middleware('jwt.verify')->
       get('fetch-pdss-report-all-or-user', 'ReportController@fetchPdssReportAllOrUser');

       Route::middleware('jwt.verify')->get('fetch-report-pdss-web/{report_id}', 'ReportController@fetchPdssReportWeb');

     Route::middleware('jwt.verify')->
     get('fetch-report-pdss/{report_id}', 'ReportController@fetchPdssReport');

     Route::middleware('jwt.verify')->
     get('search-report-pdss', 'ReportController@searchPdssReports');

      Route::post('upload-pdss-report-image', 'ReportController@uploadPdssReportImage');

     Route::post('delete-pdss-report-image', 'ReportController@deletePdssReportImage');

         Route::post('delete-pdss-report', 'ReportController@deletePdssReport');


    /*Daily Report Routes*/

     Route::middleware('jwt.verify')->post('new-daily-report', 'ReportController@newDailyReport');

     Route::middleware('jwt.verify')->post('edited-daily-report', 'ReportController@editedDailyReport');

     Route::get('fetch-councils', 'ReportController@fetchCouncils');

     Route::get('fetch-states', 'ReportController@fetchStates');

          Route::middleware('jwt.verify')->
     get('fetch-reports', 'ReportController@fetchDailyReports');

     Route::
       middleware('jwt.verify')->
       get('fetch-daily-report-all-or-user', 'ReportController@fetchDailyReportAllOrUser');

       Route::middleware('jwt.verify')->get('fetch-report-daily/{report_id}', 'ReportController@fetchDailyReportWeb');

     Route::middleware('jwt.verify')->
     get('fetch-report/{report_id}', 'ReportController@fetchDailyReport');

     Route::middleware('jwt.verify')->
     get('search', 'ReportController@searchDailyReports');

     Route::post('upload-report-image', 'ReportController@uploadDailyReportImage');

     Route::post('delete-report-image', 'ReportController@deleteDailyReportImage');

      Route::post('delete-report', 'ReportController@deleteDailyReport');


     /*monthly report routes*/
      Route::middleware('jwt.verify')->post('monthly-report-new', 'ReportController@newMonthlyReport');

       Route::middleware('jwt.verify')->post('monthly-report-update', 'ReportController@monthlyReportUpdate');

       Route::middleware('jwt.verify')->get('fetch-report-monthly/{report_id}', 'ReportController@fetchMonthlyReport');

       Route::middleware('jwt.verify')->get('fetch-monthly-config', 'ReportController@fetchMonthlyConfig');

       Route::
       middleware('jwt.verify')->
       get('fetch-monthly-report-all-or-user', 'ReportController@fetchMonthlyReportAllOrUser');

       
    
});


Route::group( [
    'prefix' => 'v1/user'
], function ($router) {
/*users routes*/
Route::middleware('jwt.verify','not.admin')->post('register', 'UserController@register');

Route::middleware('jwt.verify','not.admin')->post('update', 'UserController@update');

Route::middleware('jwt.verify','not.admin')->get('users', 'UserController@getUsers');

Route::middleware('jwt.verify','not.admin')->get('user/{id}', 'UserController@getUserById');

Route::middleware('jwt.verify')->get('user/profile/owner', 'UserController@getUserPersonal');

Route::middleware('jwt.verify','not.admin')->post('user/new', 'UserController@register');

Route::middleware('jwt.verify','not.admin')->post('user/update', 'UserController@updateUser');

Route::middleware('jwt.verify','not.admin')->get('user/delete/{id}', 'UserController@deleteUser');

Route::get('fetch-zones', 'UserController@fetchUserZones');

Route::get('fetch-states-zone-id/{id}', 'UserController@fetchUserStatesZoneId');

Route::get('fetch-centres-state-id/{id}', 'UserController@fetchUserCentresStateId');


});

// fetchUserZones
// fetchUserStatesZoneId

Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');

Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');

    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
});
