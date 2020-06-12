<?php

use Dotenv\Store\StoreInterface;
use Illuminate\Support\Facades\Route;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Auth;
use App\User;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'Web\HomeController@index')->name('home');

Route::get('/generate_key', 'Web\ApiController@generate_key')->name('generate-key');

Route::get('/reveal_tokens', 'Web\ApiController@reveal_token')->name('reveal-tokens');

