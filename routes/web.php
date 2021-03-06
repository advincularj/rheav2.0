<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/users/{name}/{id}', function ($name, $id){
//    return 'This is user '.$name.' with an id of '.$id;
//});

//Route::get('/about', function (){
//    return view('pages.about');
//});

Route::group(['middleware' => ['web']], function () {


    Route::resource('template', 'ProductsController');
    Route::get('/add', 'ProductsController@indexMoto');
    Route::get('/remove', 'ProductsController@index');

    Route::resource('auth', 'AuthorshipController');

    //PagesController
    Route::get('/', 'PagesController@index');
//    Route::get('/indexLoggedIn', 'PagesController@indexLoggedIn');


    Route::get('/about', 'PagesController@about');
    Route::get('/services', 'PagesController@services');
    Route::get('index', 'IndexController@index');
    Route::get('/userIndex', 'IndexController@indexLoggedIn');


    //PostsController
    Route::resource('posts', 'PostsController');


    Route::get('/dashboard', 'DashboardController@index');

    //---------------------------------------------------------------------
    Route::group(['middleware' => 'admin'], function () {

        //Admin
        Route::get('/admin/dashboard', 'AdminsController@dashboard');
        Route::get('/profile', 'AdminsController@profile');

        //Admin-CRUD DOCTORS
        Route::resource('users', 'CrudDoctorController');
        Route::get('users.fetch_data', 'CrudDoctorController@fetch_data');

        Route::get('/doctorprofile/{id}', 'CrudDoctorController@showprofile');
        Route::post('doctor', 'CrudDoctorController@doctor');
        Route::get('users.action', 'CrudDoctorController@action')->name('doctors_action');
//        Route::post('doctor.fetch_data', 'CrudDoctorController@fetch_data');

        //Admin - CRUD Maternal Guide
        Route::resource('guides', 'MaternalGuideController', ['except' => ['show']]);
        Route::get('/archived', 'MaternalGuideController@indexArchived');
        Route::get('/restore/{id}', 'MaternalGuideController@restore')->name('guide.restore');
        Route::get('guides.action', 'MaternalGuideController@action')->name('guides_action');


        // Admin - Maternal Guide Categories
        Route::resource('categories', 'MaternalGuideCategoryController', ['except' => ['create']]);
        Route::get('/admin/charts', 'ChartsController@index')->name('charts.index');

        //Admin - User Logs
        Route::resource('audits', 'AuditController');
        Route::get('/archived-audits', 'AuditController@indexArchived');

        Route::delete('/clear-activity', ['uses' => 'AuditController@clearActivityLog'])->name('clear-activity');
        Route::delete('/destroy-activity', ['uses' => 'AuditController@destroyActivityLog'])->name('destroy-activity');
        Route::post('/restore-log', ['uses' => 'AuditController@restoreClearedActivityLog'])->name('restore-activity');

        //Reports
        Route::get('ajaxdata', 'AjaxdataController@index');
//        Route::get('doctors', 'AjaxdataController@doctor');
        Route::get('articles', 'AjaxdataController@article');
        Route::get('logs', 'AjaxdataController@logs');
        Route::post('/data/users', 'DatatableController@getUsers')->name('dataProcessing');
        Route::post('/data/articles', 'DatatableController@getArticles')->name('articleProcessing');
//        Route::post('/data/doctors', 'DatatableController@getDoctors')->name('doctorProcessing');
        Route::post('/data/logs', 'DatatableController@getLogs')->name('logsProcessing');



    });


    //---------------------------------------------------------------------
    Route::group(['middleware' => 'doctor'], function () {

        //Doctor

        //Dashboard
        Route::get('/doctor/doctorcharts', 'DoctorChartsController@index');

        //Add Patients
        Route::get('addpatient', 'DoctorPatientController@show');
        Route::post('addpatient', 'DoctorPatientController@addpatient');
        Route::get('/patients', 'DoctorPatientController@index');
        Route::get('/patientprofile/{id}', 'DoctorPatientController@showprofile');
        Route::post('patient', 'DoctorPatientController@patient');
//        Route::get('patients.action', 'DoctorPatientController@action')->name('action');
//        Route::get('users.addaction', 'DoctorPatientController@addaction')->name('addaction');

        //Doctor Profile
        Route::get('doctorprofile', 'DoctorProfileController@profile');
        Route::get('/doctorsettings', 'DoctorSettingsController@settings');
        Route::post('/uploadPic', 'DoctorSettingsController@uploadPic');
        Route::post('/doctorsettings', 'DoctorSettingsController@updateProfile');
        Route::get('/changePic', function () {
            return view('doctor.pic');
        });
        Route::get('/changePassword', 'DoctorSettingsController@showChangePasswordForm');
        Route::post('/changePassword', 'DoctorSettingsController@changePassword')->name('changePassword');

        //Check-up
//        Route::get('indexrecord/{id}', 'CheckupRecordsController@index');
        Route::get('indexrecord/{id}', 'CheckupRecordsController@index');
        Route::resource('indexrecord', 'CheckupRecordsController')->except('index');
        Route::get('checkup/{id}', 'CheckupRecordsController@create');
        Route::resource('checkuprecords', 'CheckupRecordsController')->except('create');


    });

    //---------------------------------------------------------------------
    Route::group(['middleware' => 'verified'], function () {
        //---------------------------------------------------------------------
//      Route::group(['middleware' => 'patient'], function () {

        //Check-up
        Route::resource('checkup', 'CheckupRecordsController')->only(['show']);
        Route::get('/notification', 'PusherNotificationController@sendNotification');
        Route::resource('checkups', 'CheckupRecordsController')->only(['check','show']);
        Route::get('/checkups', 'CheckupRecordsController@check');

         //---------------------------------------------------------------------
//         Route::group(['middleware' => 'new'], function () {

            //Patient

            //Patient Profile
            Route::get('/userprofile', 'UserProfileController@userprofile');
            Route::get('/settings', 'UserSettingsController@settings');
            Route::post('/uploadPhoto', 'UserSettingsController@uploadPhoto');
            Route::post('/settings', 'UserSettingsController@updateProfile');
            Route::get('/changePhoto', function () {
            return view('patient.pic');
            });
            Route::get('/changePass', 'UserSettingsController@showChangePasswordForm');
            Route::post('/changePass', 'UserSettingsController@changePass')->name('changePass');

            //Patient - Maternal Guide Dashboard
            Route::get('/maternalguide', 'MaternalGuideDashboardController@index');
            Route::resource('guides', 'MaternalGuideController')->only(['show']);

            //Pregnancy Diary
            Route::resource('diary', 'PregnancyDiariesController');
            Route::resource('pregnancydiaries', 'PregnancyDiariesController');

            //Due Date Calculator
            Route::resource('duedate', 'DueDateController');

            //Show Doctor's Profile
            Route::get('/doctorprof/{id}', 'CrudDoctorController@showdocprofile');


//        Route::resource('pregnancydiaries', 'PregnancyDiariesController');

//        Route::get('indexnote', function () {
//                return view('patient.viewpregnancydiary');
//            });
//            Route::resource('indexnote', 'PregnancyDiariesController');
//            Route::get('diary', function () {
//                return view('patient.createpregnancydiary');
//            });
//            Route::resource('pregnancydiaries', 'PregnancyDiariesController');




//        });
//     });
    });


//    ---------------------------------------------------------------------
//    Route::group(['middleware' => 'new'], function () {
//        //Guest
//
//        //Patient Profile
//        Route::get('/userprofile', 'UserProfileController@userprofile');
//        Route::get('/settings', 'UserSettingsController@settings');
//        Route::post('/uploadPhoto', 'UserSettingsController@uploadPhoto');
//        Route::post('/settings', 'UserSettingsController@updateProfile');
//        Route::get('/changePhoto', function () {
//            return view('patient.pic');
//        });
//        Route::get('/changePass', 'UserSettingsController@showChangePasswordForm');
//        Route::post('/changePass', 'UserSettingsController@changePass')->name('changePass');
//
//        //Patient - Maternal Guide Dashboard
//        Route::get('/maternalguide', 'MaternalGuideDashboardController@index');
//        Route::resource('guides', 'MaternalGuideController')->only(['show']);
//
//        //Pregnancy Diary
//        Route::resource('diary', 'PregnancyDiariesController');
//        Route::resource('pregnancydiaries', 'PregnancyDiariesController');
//
//
//
//    });





//register
//Route::resource('/register', 'RegisterController')->only(['create', 'index']);
    Route::resource('signup', 'SignupController')->only(['store', 'index']);
//    Route::get('/user/verify/{token}', 'SignupController@verifyUser');

    //Forgot Password
    Route::get('forgotpassword', 'ForgotPasswordController@getKeys');
    Route::post('forgotpassword/save', 'ForgotPasswordController@saveNewPassword');
    Route::resource('forgotpassword', 'ForgotPasswordController')->except(['index', 'destroy', 'show', 'update']);

//login
// Route::resource('/login', 'LoginController')->only(['index', 'store']);
Route::get('signin', 'SigninController@index');
Route::post('signin', 'SigninController@store');
//logout
Route::get('logout', 'LoginController@logout');

Route::get('/hi', 'HomeController2@getIndex');
    Route::post('/hi', 'HomeController2@postIndex');




});




//Reset Password
//Route::get('/dashboard', 'ResetPaswordController@index');

//Auth::routes();
Auth::routes(['verify' => true]);



