<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\LandingController@index')->name('landing');

Route::get('/about', 'App\Http\Controllers\LandingController@about')->name('landing.about');

Route::get('/contact', 'App\Http\Controllers\LandingController@contact')->name('landing.contact');

Route::get('/services', 'App\Http\Controllers\LandingController@service')->name('blog.service');


Route::get('/articles', 'App\Http\Controllers\BlogController@articles')->name('blog.articles');

Route::get('/articles/{article}', 'App\Http\Controllers\BlogController@show_article')->name('blog.article');

Route::get('/events', 'App\Http\Controllers\BlogController@events')->name('blog.events');

Route::get('/events/{event}', 'App\Http\Controllers\BlogController@show_event')->name('blog.event');



Route::get('/outreaches', 'App\Http\Controllers\BlogController@outreaches')->name('blog.outreaches');
Route::get('/outreaches/{outreach}', 'App\Http\Controllers\BlogController@show_outreach')->name('blog.outreach');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
