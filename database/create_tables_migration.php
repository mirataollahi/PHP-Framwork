<?php

require __DIR__ . "/../vendor/autoload.php";
ini_set('display_errors', true);
use Core\Command\CommandLine as Cli;
use Core\Database\DatabaseConnection;
use Illuminate\Database\Schema\Blueprint;


//*****************************************************************************************
try
{
    $path = "database/sqlite.db";
    $databaseFile = path($path);
    if (!file_exists($databaseFile)) {
        $db = new SQLite3($databaseFile);
        $db->close();
        Cli::success("New SQLite database file created at : " . $path);
    } else {
        Cli::info("SQLite database file already exists at: " . $path);
    }

} catch (Exception $exception) {
    Cli::error("Error : {$exception->getMessage()}");
}
//***************************************************************************************





$databaseConnection = new DatabaseConnection();
$schema = $databaseConnection->engine->schema();





//  ********************** Create Credentials Table *************************************
try
{
    $schema->create('credentials', function (Blueprint $table) {
        $table->id();
        $table->string('name' , 254)->nullable()->comment('The name of the auth credentials');
        $table->string('ip' , 100)->nullable()->comment('The ip of the credential auth');
        $table->integer('port')->nullable()->comment('The port number of the credential auth');
        $table->string('username' , 254)->nullable()->comment('The username of the auth record');
        $table->text('password')->nullable()->comment('The password of the auth record');

        $table->bigInteger('deleted_at')->nullable()->comment('The auth record delete at this timestamp unix');
        $table->bigInteger('updated_at')->nullable()->comment('The auth record update at this timestamp unix');
        $table->bigInteger('created_at')->comment('The auth record created at this timestamp unix');

    });
    Cli::success("credentials table Created Successfully");
}
catch (Exception $exception)
{
    Cli::error('Error :' . $exception->getMessage());
}
// ******************************************************************************************

