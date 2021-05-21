<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>['api']], function(){
    
    // Authentification 
    Route::post('login','App\Http\Controllers\AuthController@login');

    Route::group(['prefix'=>'client','namespace'=>'App\Http\Controllers\client'],function(){    
        
            Route::get('','ControllerClient@index');
            Route::post('add','ControllerClient@create');
            Route::delete('delete/{id}','ControllerClient@destroy');
            Route::get('show/{id}','ControllerClient@show');
            Route::post('update','ControllerClient@update');

        Route::group(['prefix'=>'immobiler'],function(){
            
            Route::get('','ControllerImmobilier@index');
            Route::post('add','ControllerImmobilier@create');
            Route::delete('delete/{id}','ControllerImmobilier@destroy');
            Route::get('show/{id}','ControllerImmobilier@show');
            Route::post('update','ControllerImmobilier@update');
                
            
        });

        Route::group(['prefix'=>'mobilier'],function(){
            
            Route::get('','ControllerMobilier@index');
            Route::post('add','ControllerMobilier@create');
            Route::delete('delete/{id}','ControllerMobilier@destroy');
            Route::get('show/{id}','ControllerMobilier@show');
            Route::post('update','ControllerMobilier@update');
                
            
        });
    
    });
});