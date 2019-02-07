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
    });


    //---------------------------------------------------------------------
    Route::group(['middleware' => 'doctor'], function () {
    //Doctor
        Route::get('addpatient', 'DoctorPatientController@show');
        Route::post('addpatient', 'DoctorPatientController@addpatient');
        Route::get('patients', 'DoctorPatientController@index');
        Route::post('patient', 'DoctorPatientController@patient');
        Route::get('doctorprofile', 'DoctorProfileController@profile');
        Route::get('/doctorsettings', 'DoctorSettingsController@settings');
        Route::post('/uploadPhoto', 'DoctorSettingsController@uploadPhoto');

    //Route::get('doctorsettings', 'DoctorSettingsController@editProfileForm');
        Route::post('/doctorsettings', 'DoctorSettingsController@updateProfile');
        Route::get('/changePhoto', function() {
            return view('doctor.pic');
    });
    });

    //---------------------------------------------------------------------
    Route::group(['middleware' => 'patient'], function () {
    //Patient

        Route::get('/userprofile', 'UserProfileController@userprofile');
        Route::get('/settings', 'UserSettingsController@settings');
        Route::post('/uploadPhoto', 'UserSettingsController@uploadPhoto');
        Route::post('/settings', 'UserSettingsController@updateProfile');
        Route::get('/changePhoto', function() {
        return view('patient.pic');
        });
});
    });

        //register
        Route::resource('/register', 'RegisterController')->only(['store', 'index']);
        //login
//        Route::resource('/login', 'LoginController')->only(['index', 'store']);
    Route::get('/login', 'LoginController@index');
    Route::post('/login', 'LoginController@store');
        //logout
        Route::get('/logout', 'LoginController@logout');






    //Reset Password
    //Route::get('/dashboard', 'ResetPaswordController@index');
