<?php
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
define('LARAVEL_START', microtime(true));
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {// Determine if the application is in maintenance mode...
    require $maintenance;
}
require __DIR__.'/../vendor/autoload.php';// Register the Composer autoloader...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';// Bootstrap Laravel and handle the request...
$app->handleRequest(Request::capture());
