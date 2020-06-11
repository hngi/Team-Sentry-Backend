<?php

use Dotenv\Store\StoreInterface;
use Illuminate\Support\Facades\Route;
use GrahamCampbell\Markdown\Facades\Markdown;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $content = file_get_contents(storage_path('app/public/files/README.md'));
    return view('welcome', ['html' => $content]);
});
