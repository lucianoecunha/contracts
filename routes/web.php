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

Route::group(['middleware' => 'auth'], function() {


  Route::get('/', 'HomeController@index')->name('index');

	
	Route::resources([
    	'secretaries' => 'SecretaryController'

    ]);

    Route::resources([
    	'sectors' => 'SectorController'
    	
    ]);

     Route::resources([
    	'managers' => 'ManagerController'
    	
    ]);

       Route::get('/contracts/notify/', 'ContractController@notifyExpirity')->name('contracts.notify');

       Route::get('/contracts/get_datatable/', 'ContractController@get_datatable')->name('contracts.get_datatable');


       Route::post('/contracts/add_contract_manager/', 'ContractController@add_contract_manager')->name('contracts.add_contract_manager');

       Route::post('/contracts/remove_contract_manager/', 'ContractController@remove_contract_manager')->name('contracts.remove_contract_manager');

       Route::resources([
    	'contracts' => 'ContractController'
    	
    ]);



 
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
