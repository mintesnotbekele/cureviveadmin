<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsAndArticleController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResearchPaperController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TeamController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/using', function () {
    return response()->json(['name' => 'John', 'email' => 'john@example.com']);
});

Route::resource('newsAndarticle', NewsAndArticleController::class);
Route::resource('quote', QuoteController::class);
Route::resource('faq', FaqController::class);
Route::resource('testimonial', TestimonialController::class);
Route::resource('product', ProductController::class);
Route::resource('researchpaper', ResearchPaperController::class);
Route::resource('treatment', TreatmentController::class);
Route::resource('category', CategoryController::class);
Route::resource('disease', DiseaseController::class);
Route::resource('books', BookController::class);
Route::resource('teams', TeamController::class);



