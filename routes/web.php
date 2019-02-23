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

    //PagesController
    Route::get('/', 'PagesController@index');
    Route::get('/about', 'PagesController@about');
    Route::get('/services', 'PagesController@services');
    Route::get('index', 'IndexController@index');


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
        Route::get('/doctorprofile/{id}', 'CrudDoctorController@showprofile');
        Route::post('doctor', 'CrudDoctorController@doctor');


        //Admin - CRUD Maternal Guide
        Route::resource('/guides', 'MaternalGuideController');
        Route::get('/archived', 'MaternalGuideController@indexArchived');
        Route::get('/restore/{id}', 'MaternalGuideController@restore')->name('guide.restore');


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
        Route::get('doctors', 'AjaxdataController@doctor');
        Route::get('articles', 'AjaxdataController@article');
        Route::post('/data/users', 'DatatableController@getUsers')->name('dataProcessing');
        Route::post('/data/articles', 'DatatableController@getArticles')->name('articleProcessing');
        Route::post('/data/doctors', 'DatatableController@getDoctors')->name('doctorProcessing');


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
        Route::get('indexrecord', function () {
            return view('doctor.indexcheckup');
        });
        Route::resource('indexrecord', 'CheckupRecordsController');
        Route::get('checkup', function () {
            return view('doctor.createcheckup');
        });
        Route::resource('checkuprecords', 'CheckupRecordsController');


    });

    //---------------------------------------------------------------------
    Route::group(['middleware' => 'verified'], function () {
        //---------------------------------------------------------------------
        Route::group(['middleware' => 'patient'], function () {

            //Check-up
            Route::resource('checkup', 'CheckupRecordsController')->only(['show']);

         //---------------------------------------------------------------------
//         Route::group(['middleware' => 'guest'], function () {

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
            Route::get('indexnote', function () {
                return view('patient.viewpregnancydiary');
            });
            Route::resource('indexnote', 'PregnancyDiariesController');
            Route::get('diary', function () {
                return view('patient.createpregnancydiary');
            });
            Route::resource('pregnancydiaries', 'PregnancyDiariesController');
            Route::get('/notification', 'PusherNotificationController@sendNotification');


//        });
     });
    });


    //---------------------------------------------------------------------
//    Route::group(['middleware' => 'guest'], function () {
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
//        Route::get('indexnote', function () {
//            return view('patient.viewpregnancydiary');
//        });
//        Route::resource('indexnote', 'PregnancyDiariesController');
//        Route::get('diary', function () {
//            return view('patient.createpregnancydiary');
//        });
//        Route::resource('pregnancydiaries', 'PregnancyDiariesController');
//
//
//    });





//register
//Route::resource('/register', 'RegisterController')->only(['create', 'index']);
    Route::resource('signup', 'SignupController')->only(['store', 'index']);;

//login
// Route::resource('/login', 'LoginController')->only(['index', 'store']);
Route::get('signin', 'SigninController@index');
Route::post('signin', 'SigninController@store');
//logout
Route::get('logout', 'SigninController@logout');

});




//Reset Password
//Route::get('/dashboard', 'ResetPaswordController@index');

//Auth::routes();
Auth::routes(['verify' => true]);



