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


    Auth::routes();

    Route::get('/dashboard', 'DashboardController@index');

    //---------------------------------------------------------------------
    Route::group(['middleware' => 'admin'], function () {

        //Admin
        Route::get('/admin/dashboard', 'AdminsController@dashboard');
        Route::get('/profile', 'AdminsController@profile');

        //Admin-CRUD DOCTORS
        Route::resource('users', 'CrudDoctorController');


        //Admin - CRUD Maternal Guide
        Route::resource('/guides', 'MaternalGuideController');
        Route::get('/archived', 'MaternalGuideController@indexArchived');
        Route::get('/restore/{id}', 'MaternalGuideController@restore')->name('guide.restore');


        // Admin - Maternal Guide Categories
        Route::resource('categories', 'MaternalGuideCategoryController', ['except' => ['create']]);
        Route::get('/admin/charts', 'ChartsController@index')->name('charts.index');
    });


    //---------------------------------------------------------------------
    Route::group(['middleware' => 'doctor'], function () {

        //Doctor
        Route::get('/doctor/dashboard', 'DoctorController@dashboard');
        Route::get('addpatient', 'DoctorPatientController@show');
        Route::post('addpatient', 'DoctorPatientController@addpatient');
        Route::get('patients', 'DoctorPatientController@index');
        Route::post('patient', 'DoctorPatientController@patient');
        Route::get('doctorprofile', 'DoctorProfileController@profile');
        Route::get('/doctorsettings', 'DoctorSettingsController@settings');
        Route::post('/uploadPic', 'DoctorSettingsController@uploadPic');
        Route::get('indexrecord', function () {
            return view('doctor.indexcheckup');
        });
        Route::resource('indexrecord', 'CheckupRecordsController');
        Route::get('checkup', function () {
            return view('doctor.createcheckup');
        });
        Route::resource('checkuprecords', 'CheckupRecordsController');

        //Route::get('doctorsettings', 'DoctorSettingsController@editProfileForm');
        Route::post('/doctorsettings', 'DoctorSettingsController@updateProfile');
        Route::get('/changePic', function () {
            return view('doctor.pic');
        });
        Route::get('/archivedpatients', 'DoctorPatientController@indexArchived');
        Route::get('/restore/{id}', 'DoctorPatientController@restore')->name('user.restore');
        Route::get('/changePassword','DoctorSettingsController@showChangePasswordForm');
        Route::post('/changePassword','DoctorSettingsController@changePassword')->name('changePassword');
    });

    //---------------------------------------------------------------------
    Route::group(['middleware' => 'patient'], function () {
        //Patient

        Route::get('/userprofile', 'UserProfileController@userprofile');
        Route::get('/settings', 'UserSettingsController@settings');
        Route::post('/uploadPhoto', 'UserSettingsController@uploadPhoto');
        Route::post('/settings', 'UserSettingsController@updateProfile');
        Route::get('/changePhoto', function () {
            return view('patient.pic');
        });
        //Patient - Maternal Guide Dashboard
        Route::get('/maternalguide', 'MaternalGuideDashboardController@index');
        Route::resource('guides', 'MaternalGuideController')->only(['show']);

    Route::get('indexnote', function () {
        return view('patient.viewpregnancydiary');
    });
    Route::resource('indexnote', 'PregnancyDiariesController');
    Route::get('diary', function () {
        return view('patient.createpregnancydiary');
    });
    Route::resource('pregnancydiaries', 'PregnancyDiariesController');
    Route::resource('checkup', 'CheckupRecordsController')->only(['show']);
    });
    Route::get('/changePass','UserSettingsController@showChangePasswordForm');
    Route::post('/changePass','UserSettingsController@changePass')->name('changePass');
});

//register
Route::resource('/register', 'RegisterController')->only(['store', 'index']);
//login
// Route::resource('/login', 'LoginController')->only(['index', 'store']);
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@store');
//logout
Route::get('/logout', 'LoginController@logout');






//Reset Password
//Route::get('/dashboard', 'ResetPaswordController@index');
