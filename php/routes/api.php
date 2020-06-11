<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// end point to add a page
Route::post('add_page', 'PagesController@set_page');
// end point to set a page markdown
Route::post('set_markdown_page', 'PagesController@set_page');
// this endpoint will take care of retrieving the html format of the markdown file
Route::get('retrieve_html_page', 'PagesController@retrieve_html_page');
// this endpoint will take care of retrieving the markdown format of the  file
Route::get('retrieve_markdown_page', 'PagesController@retrieve_markdown_page');
// this endpoint will return the list of all pages in storage
Route::get('list_pages', 'PagesController@list_pages');
