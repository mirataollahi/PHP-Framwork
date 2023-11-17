<?php

require __DIR__ . "/../vendor/autoload.php";
ini_set('display_errors', true);
use App\Command\CommandLine as Cli;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


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





$databaseConnection = new \App\Database\DatabaseConnection();
$schema = $databaseConnection->engine->schema();






// *************************** Drop table credentials  if exist ************************
try
{
    $schema->dropIfExists('credentials');
    Cli::success("Successfully `credentials` table deleted");

}
catch (Exception $exception)
{
    Cli::warning("Error : {$exception->getMessage()} ");
}
// **************************************************************************************