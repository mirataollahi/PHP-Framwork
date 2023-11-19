<?php


/*
|--------------------------------------------------------------------------
| Require Autoload
|--------------------------------------------------------------------------
|
| Require composer package and namespace loader from vendor directory
|
*/


require __DIR__ . "/../vendor/autoload.php";
ini_set('display_errors' , true);


use Core\Application\Application;
use Core\Response\ResponseGenerator;


require __DIR__ . '/../php_error.php';



/*
|--------------------------------------------------------------------------
| PHP Error viewer
|--------------------------------------------------------------------------
|
| Display error with details
|
*/

//\php_error\reportErrors();



/*
|--------------------------------------------------------------------------
| Run Application
|--------------------------------------------------------------------------
|
| Create new Application instance , container and services  with each incoming request
| Run app instance and process related response
| Process application running result and generate response
| Show response and terminate application instance
|
*/
\Core\Bootstrap\ApplicationBootstrapper::boot();