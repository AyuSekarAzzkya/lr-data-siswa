<?php

use Illuminate\Http\Request;
use App\Http\Kernel;

define('LARAVEL_START', microtime(true));

// Menentukan apakah aplikasi dalam mode pemeliharaan
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Mendaftarkan autoloader Composer
require __DIR__.'/../vendor/autoload.php';

// Mendapatkan aplikasi
$app = require_once __DIR__.'/../bootstrap/app.php';

// Menggunakan Kernel secara manual
$kernel = $app->make(Kernel::class);

// Menangani request
$response = $kernel->handle(
    $request = Request::capture() // Menangkap request
);

// Mengirimkan respons ke browser
$response->send();

// Menyelesaikan request
$kernel->terminate($request, $response);
