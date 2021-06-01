<?php

use Illuminate\Http\Request;

use Http\Controllers\LeadController;
use Http\Controllers\ContactsController;
use Http\Controllers\CompanyController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
	'middleware' => ['api'],
	'prefix' => 'leads'
], function(){
    Route::resource('leads', 'LeadController');

    // Другие методы

    Route::post('/add', 'LeadController@addLead')->name('api:lead:add');
});

Route::group([
	'middleware' => ['api'],
	'prefix' => 'contacts'
], function(){
    Route::resource('contacts', 'ContactsController');

    // Другие методы

    Route::post('/add', 'ContactsController@addContact')->name('api:contact:add');
});

Route::group([
	'middleware' => ['api'],
	'prefix' => 'companies'
], function(){
    Route::resource('companies', 'CompanyController');

    // Другие методы

    Route::post('/add', 'CompanyController@addCompany')->name('api:company:add');
});
