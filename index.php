<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Autoload dependencies
require __DIR__.'/vendor/autoload.php';

// Bootstrap the application
$app = require_once __DIR__.'/bootstrap/app.php';

// Create the kernel
$kernel = $app->make(Kernel::class);

// Handle the request and send the response
$response = $kernel->handle(
    $request = Request::capture()
)->send();

// Terminate the request/response cycle
$kernel->terminate($request, $response);
