<?php


use App\Router\Route;


/*
 * Dashboard html view
 */
Route::get('/' , [\App\Controllers\DashboardController::class , 'index'] , 'dashboard.index');


Route::get('/api/credentials' , [\App\Controllers\CredentialController::class , 'index'] , 'credentials.index');
Route::get('/api/credentials/create' , [\App\Controllers\CredentialController::class , 'create'] , 'credentials.create');
Route::get('/api/credentials/update' , [\App\Controllers\CredentialController::class , 'update'] , 'credentials.update');
Route::get('/api/credentials/delete' , [\App\Controllers\CredentialController::class , 'delete'] , 'credentials.delete');
