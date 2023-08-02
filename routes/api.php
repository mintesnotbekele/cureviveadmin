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
use App\Http\Controllers\Forum\ForumCategoryContoller;
use App\Http\Controllers\TeamController;

use App\Http\Controllers\Forum\ReplyController;
use App\Http\Controllers\Forum\TagController;
use App\Http\Controllers\Forum\ThreadController;

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

Route::apiResource('newsAndarticle', NewsAndArticleController::class);
Route::apiResource('quote', QuoteController::class);
Route::apiResource('faq', FaqController::class);
Route::apiResource('testimonial', TestimonialController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('researchpaper', ResearchPaperController::class);
Route::apiResource('treatment', TreatmentController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('disease', DiseaseController::class);
Route::apiResource('books', BookController::class);
Route::apiResource('teams', TeamController::class);


Route::group(['prefix' => 'threads', 'as' => 'threads.'], function () {
    Route::post('/', [ThreadController::class, 'store'])->name('store');
    Route::patch('/{thread:slug}', [ThreadController::class, 'update'])->name('update');
    Route::delete('/{thread:slug}', [ThreadController::class, 'destroy'])->name('destroy');
    Route::post('/like/{thread:slug}', [ThreadController::class, 'like'])->name('like');
    Route::post('/dislike/{thread:slug}', [ThreadController::class, 'disLike'])->name('dislike');
});


Route::group(['prefix' => 'tags', 'as' => 'tags.'], function () {
    Route::post('/', [TagController::class, 'store'])->name('store');
    Route::patch('/{tag}', [TagController::class, 'update'])->name('update');
    Route::delete('/{tag}', [TagController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'forum-category', 'as' => 'tags.','namespace' => 'Forum' ], function () {
    Route::post('/', [ForumCategoryContoller::class, 'store'])->name('store');
    Route::patch('/{category}', [ForumCategoryContoller::class, 'update'])->name('update');
    Route::delete('/{category}', [ForumCategoryContoller::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'replies', 'as' => 'replies.'], function () {
    Route::post('/', [ReplyController::class, 'store'])->name('store');
    Route::delete('/{reply}', [ReplyController::class, 'destroy'])->name('destroy');
    Route::post('/like/{reply}', [ReplyController::class, 'like'])->name('like');
    Route::post('/dislike/{reply}', [ReplyController::class, 'disLike'])->name('dislike');
});