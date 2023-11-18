<?php


use Core\Router\Route;



Route::get('/' , [\App\Controllers\ExampleController::class , 'welcome'] , 'example.welcome');


