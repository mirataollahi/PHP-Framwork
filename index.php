<?php


/*
|--------------------------------------------------------------------------
| Require Autoload
|--------------------------------------------------------------------------
|
| Require composer package and namespace loader from vendor directory
|
*/
require __DIR__ . "/vendor/autoload.php";


ini_set('display_errors' , true);




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
$app = new \App\Framework\Application();


$responseGenerator = new \App\Response\ResponseGenerator(
    $app->run()
);

$responseGenerator->make();