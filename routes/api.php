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

        Route::group(['prefix'=>'panier'],function(){
            
            Route::get('/{id}','ControllerPanier@index');
            Route::post('add','ControllerPanier@create');
            Route::delete('delete/{id}','ControllerPanier@destroy');
            Route::delete('deletebyuser/{id}','ControllerPanier@destroyByIdUser');
            Route::get('show/{id}','ControllerPanier@show');
                
            
        });


        Route::group(['prefix'=>'favoris'],function(){

            Route::get('/{id}','ControllerFavoris@index');
            Route::post('add','ControllerFavoris@create');
            Route::delete('delete/{id}','ControllerFavoris@destroy');
            Route::delete('deletebyuser/{id}','ControllerFavoris@destroyByIdUser');
            Route::get('show/{id}','ControllerFavoris@show');
                 
        });

        Route::group(['prefix'=>'commande'],function(){
            
            Route::get('/{id}','ControllerCommande@index');
            Route::post('add','ControllerCommande@create');
            Route::delete('delete/{id}','ControllerCommande@destroy'); 
        });
    
        Route::group(['prefix'=>'banne'],function(){
            
            Route::get('bloque/{id}','ControllerBanne@getByid_bloque');
            Route::get('bloqueur/{id}','ControllerBanne@getByid_bloqueur');
            Route::post('add','ControllerBanne@create');
            Route::delete('delete/{id}','ControllerBanne@destroy');
                
        });
    });
});