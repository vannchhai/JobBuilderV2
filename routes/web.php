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

Route::get('/', 'HomeController@index');
Route::get('login', 'Auth\Login@index');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/checkRole', 'HomeController@checkRole');


// Candidate management 
Route::get('/AddResume', 'Candidate\AddResumeController@index');
Route::get('/BrowseCategory', 'Candidate\BrowseCategoryController@index');
Route::get('/BrowseJob', 'Candidate\BrowseJobController@index');
Route::get('/JobAlert', 'Candidate\JobAlertController@index');
Route::get('/ManageResume', 'Candidate\ManageResumeController@index');

// Employer management
Route::get('/AddJob', 'Employer\AddJobController@index');
Route::get('/BrowseResume', 'Employer\BrowseResumeController@index');
Route::get('/CompanyProfile', 'Employer\CompanyProfileController@index');
Route::get('/ManageJobsPost', 'Employer\ManageApplicationController@index');

// Page management
Route::get('/About', 'Pages\About@index');
Route::get('/Contact', 'Pages\Contact@index');
Route::get('/FAQ', 'Pages\FAQ@index');
Route::get('/Privacy', 'Pages\Privacy@index');

// Search
Route::get('/AdvanceSearch', 'HomeController@AdvanceSearch');
Route::get('/DetailJob', 'HomeController@DetailJob');


// post add resume
Route::post('/AddResume', 'Candidate\AddResumeController@AddResume');

// post company
Route::post('/CompanyName', 'Employer\CompanyProfileController@CompanyName');
Route::post('/UpdateCompany', 'Employer\CompanyProfileController@UpdateCompany');


//Jobs
Route::get('/AddFavorite/{id}', 'Job\Favorite@Add');
Route::get('/GetFavorite/', 'Job\Favorite@Get');
Route::get('/RemoveFavorite/{id}', 'Job\Favorite@Remove');
Route::post('/ApplyJobs/', 'Job\Favorite@ApplyJobs');
Route::get('/PenddingJob/', 'Job\Favorite@PenddingJob');
Route::get('/RemovePending/{id}', 'Job\Favorite@RemovePending');


Route::post('/PostJobs/', 'Employer\AddJobController@PostJobs');
Route::get('/RemoveJob/{id}', 'Employer\ManageApplicationController@RemoveJob');
Route::get('/EditJob/{id}', 'Employer\ManageApplicationController@EditJob');
Route::post('/UpdateJobs/', 'Employer\ManageApplicationController@UpdateJobs');


Route::get('/AddResume/{id}', 'Candidate\JobAlertController@ShowResume');
Route::get('/RemoveMessage/{id}/{mId}', 'Candidate\JobAlertController@RemoveMessage');


// side bar lift
Route::get('/dashboard', 'Admin\DashboardController@index');
Route::get('/job', 'Admin\JobMngController@index');
Route::get('/jobCategory', 'Admin\JobCategoryMngController@index');
Route::get('/jobType', 'Admin\JobTypeMngController@index');

Route::get('/userMng', 'Admin\UserMngController@index');
Route::get('/userTypeMng', 'Admin\UserTypeMngController@index');

Route::get('/zone', 'Admin\ZoneMngController@index');
Route::get('/country', 'Admin\CountryMngController@index');

Route::get('/setting', 'Admin\PageMngController@setting');
Route::get('/privacy', 'Admin\PageMngController@privacy');
Route::get('/termOfuse', 'Admin\PageMngController@termOfuse');
Route::get('/faq', 'Admin\PageMngController@faq');
Route::get('/contact', 'Admin\PageMngController@contact');
Route::get('/about', 'Admin\PageMngController@about');
Route::get('/help', 'Admin\PageMngController@help');

Route::get('/advertise', 'Admin\AdvertiseMngController@index');

Route::get('/account', 'Admin\AccountMngController@index');

Route::get('/company', 'Admin\CompanyMngController@index');



Auth::routes();
