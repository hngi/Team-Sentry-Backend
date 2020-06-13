<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'v1'
], function() {
    // end point to add a page
    Route::post('add_page', 'Api\PagesController@set_page');
    // end point to set a page markdown
    Route::post('set_page_markdown', 'Api\PagesController@set_page');
    // this endpoint will take care of retrieving the html format of the markdown file
    Route::get('retrieve_html_page', 'Api\PagesController@retrieve_html_page');
    // this endpoint will take care of retrieving the markdown format of the  file
    Route::get('retrieve_markdown_page', 'Api\PagesController@retrieve_markdown_page');
    // this endpoint will return the list of all pages in storage
    Route::get('list_pages', 'Api\PagesController@list_pages');

    Route::get('/', 'Api\PagesController@get_docs');
});
