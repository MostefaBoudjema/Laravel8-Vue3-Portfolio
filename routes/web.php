<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'CvController@index');
Route::get('/getCv', 'CvController@getCv');
// Route::delete('/deletecv/{id}', 'CvController@deletecv');
Route::resource('cvs', 'CvController');
Route::get('cv/experience/create/{id}', 'CvController@cvExperienceCreate');
Route::get('cv/experience/show/{id}', 'CvController@cvExperienceShow');

Route::get('experience/{id}', 'ExperienceController@create');
Auth::routes();
Route::get('/home', 'HomeController@index');
// Route::get('/getexperiences/{id}', 'CvController@getExperiencesId');
// Route::get('/getexperiences', 'CvController@getExperiences');
// Route::post('/addexperiences', 'CvController@addExperiences');
// Route::get('/getexperiences/{id}', 'ExperienceController@getExperiencesId');
// Route::get('/getexperiences', 'ExperienceController@getExperiences');
// Route::post('/addexperiences', 'ExperienceController@addExperiences');
// Route::put('/updateexperiences', 'ExperienceController@updateExperiences');
// Route::delete('/deleteexperiences/{id}', 'ExperienceController@deleteExperiences');

// Route::get('/getformations/{id}', 'FormationController@getFormationsId');
// Route::get('/getformations', 'FormationController@getFormations');
// Route::post('/addformations', 'FormationController@addFormations');
// Route::put('/updateformations', 'FormationController@updateFormations');
// Route::delete('/deleteformations/{id}', 'FormationController@deleteFormations');

// Route::get('/getportefolios/{id}', 'PortefolioController@getPortefoliosId');
// Route::get('/getportefolios', 'PortefolioController@getPortefolios');
// Route::post('/addportefolios', 'PortefolioController@addPortefolios');
// Route::put('/updateportefolios', 'PortefolioController@updatePortefolios');
// Route::delete('/deleteportefolios/{id}', 'PortefolioController@deletePortefolios');

// Route::get('/getcompetances/{id}', 'CompetanceController@getCompetancesId');
// Route::get('/getcompetances', 'CompetanceController@getCompetances');
// Route::post('/addcompetances', 'CompetanceController@addCompetances');
// Route::put('/updatecompetances', 'CompetanceController@updateCompetances');
// Route::delete('/deletecompetances/{id}', 'CompetanceController@deleteCompetances');

// Route::get('/{any}', 'App\Http\Controllers\PagesController@index')->where('any', '.*');