<?php


/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here, so we don't need to manually load our classes.
|
*/
require __DIR__ .'/../vendor/autoload.php';




/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Create an instance of framework application
|
*/


$app = \Core\Framework\Application::make();

$request = new \Core\Request\Request();

dd($request->url());