<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/getCv', 'CvController@getCv');
Route::delete('/deletecv/{id}', 'CvController@deletecv');

Route::get('/getexperiences/{id}', 'ExperienceController@getExperiencesId');
Route::get('/getexperiences', 'ExperienceController@getExperiences');
Route::post('/addexperiences', 'ExperienceController@addExperiences');
Route::put('/updateexperiences', 'ExperienceController@updateExperiences');
Route::delete('/deleteexperiences/{id}', 'ExperienceController@deleteExperiences');

Route::get('/getformations/{id}', 'FormationController@getFormationsId');
Route::get('/getformations', 'FormationController@getFormations');
Route::post('/addformations', 'FormationController@addFormations');
Route::put('/updateformations', 'FormationController@updateFormations');
Route::delete('/deleteformations/{id}', 'FormationController@deleteFormations');

Route::get('/getportefolios/{id}', 'PortefolioController@getPortefoliosId');
Route::get('/getportefolios', 'PortefolioController@getPortefolios');
Route::post('/addportefolios', 'PortefolioController@addPortefolios');
Route::put('/updateportefolios', 'PortefolioController@updatePortefolios');
Route::delete('/deleteportefolios/{id}', 'PortefolioController@deletePortefolios');

Route::get('/getcompetances/{id}', 'CompetanceController@getCompetancesId');
Route::get('/getcompetances', 'CompetanceController@getCompetances');
Route::post('/addcompetances', 'CompetanceController@addCompetances');
Route::put('/updatecompetances', 'CompetanceController@updateCompetances');
Route::delete('/deletecompetances/{id}', 'CompetanceController@deleteCompetances');