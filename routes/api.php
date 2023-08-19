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
use App\Http\Controllers\SectiononeController;
use App\Http\Controllers\SectiontwoController;
use App\Http\Controllers\SectiononetreatmentController;
use App\Http\Controllers\SectiontwotreatmentController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\LikeController;


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
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);   
Route::patch('/updatepost/{id}', [ThreadController::class, 'updatepost']);

Route::post('/likepost/{id}', [ThreadController::class, 'likePost']);

Route::resource('newsAndarticle', NewsAndArticleController::class);
Route::resource('quote', QuoteController::class);
Route::resource('faq', FaqController::class);
Route::resource('testimonial', TestimonialController::class);
Route::resource('product', ProductController::class);
Route::resource('researchpaper', ResearchPaperController::class);
Route::resource('treatment', TreatmentController::class);
//Route::resource('category', CategoryController::class);
Route::resource('disease', DiseaseController::class);
Route::resource('books', BookController::class);
Route::resource('teams', TeamController::class);
Route::resource('sectionone', SectionOneController::class);
Route::resource('sectiontwo', SectionTwoController::class);
Route::resource('sectiononeTreatment', SectiononetreatmentController::class);
Route::resource('sectiontwoTreatment', SectiontwotreatmentController::class);
Route::resource('threads', ThreadController::class);
Route::resource('replies', ReplyController::class);
Route::resource('threads', ThreadController::class);
Route::resource('replies', ReplyController::class);
Route::resource('likes', LikeController::class);
Route::get('/repliedforum/{id}', [ReplyController::class, 'repliedforum']);  
Route::get('/likecounter/{id}', [LikeController::class, 'likecounter']);  
Route::get('/likedby/{id}', [LikeController::class, 'likedby']);  

Route::get('/myfavourites', [LikeController::class, 'myfavourites']);  

Route::delete('/dislike/{id}', [LikeController::class, 'destroylikes']);  
Route::group (['middleware' => 'forum.api'], function () {
    Route::get ('/categories', 'Forum\Api\CategoryController@index');
});

