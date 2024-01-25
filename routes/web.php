<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
Nguyễn Quang Hải
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


// route mới

// home
Route::get('/', [\App\Http\Controllers\HomeController::class , 'index'])->name('home');

// about
Route::get('/about', [\App\Http\Controllers\AboutController::class , 'index'])->name('about');
Route::get('/page/{slug}', [\App\Http\Controllers\AboutController::class , 'page']);

// Tour
Route::get('tours',[\App\Http\Controllers\TourController::class , 'index'])->name('tours');
Route::get('tours/{slug}',[\App\Http\Controllers\TourController::class , 'show'])->name('tours.show');

// contact
Route::get('/contact', [\App\Http\Controllers\ContactController::class , 'index'])->name('contact');

// posts
Route::get('/posts', [\App\Http\Controllers\PostController::class , 'index'])->name('posts');
Route::get('/posts/{slug}', [\App\Http\Controllers\PostController::class , 'show'])->name('posts.show');
Route::get('/category-post/{id}', [\App\Http\Controllers\PostController::class , 'categoryPost'])->name('categoryPost');
Route::get('/tag-post', [\App\Http\Controllers\PostController::class , 'tagPost'])->name('tagPost');

// hotels
Route::get('/hotels', [\App\Http\Controllers\HotelController::class , 'index'])->name('hotels');
Route::get('/hotels/{slug}', [\App\Http\Controllers\HotelController::class , 'show'])->name('hotels.show');

// advises
Route::post('/advises', [\App\Http\Controllers\AdvisesController::class , 'store'])->name('advises');

// events
Route::get('/events', [\App\Http\Controllers\EventController::class , 'index'])->name('events');
Route::get('/events/{slug}', [\App\Http\Controllers\EventController::class , 'show'])->name('events.show');

// search
Route::get('/search/tags/{slug}',[\App\Http\Controllers\SearchController::class , 'searchPostsByTagName'])->name('search.posts.tag');
Route::get('/search/tours',[\App\Http\Controllers\SearchController::class , 'searchTours'])->name('search.tours');
Route::get('/search/hotels',[\App\Http\Controllers\SearchController::class , 'searchHotels'])->name('search.hotels');
Route::get('/search/events',[\App\Http\Controllers\SearchController::class , 'searchEvents'])->name('search.events');
Route::get('/search/posts',[\App\Http\Controllers\SearchController::class , 'searchPosts'])->name('search.posts');


Route::get('/booking', [\App\Http\Controllers\BookingController::class , 'index'])->name('booking.index');

Route::get('/tour-booking', [\App\Http\Controllers\BookingController::class , 'listTourBooking'])->name('booking.tour');

Route::get('/hotel-booking', [\App\Http\Controllers\BookingController::class , 'listHotelBooking'])->name('booking.hotel');

Route::post('/booking', [\App\Http\Controllers\BookingController::class , 'booking'])->name('booking');


