<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', UsersController::class);
    $router->resource('diseases', DiseaseController::class);
    $router->resource('treatments', TreatmentController::class);
    $router->resource('faqs', FaqController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('newsandarticles', NewsAndArticleController::class);
    $router->resource('products', ProductController::class);
    $router->resource('quotes', QuoteController::class);
    $router->resource('researchpapers', ResearchPaperController::class);
    $router->resource('testimonials', TestimonialController::class);
    

    $router->resource('teams', TeamController::class);
    $router->resource('books', BookController::class);
    $router->resource('sectionones', SectionOneController::class);
    $router->resource('sectiontwos', SectionTwoController::class);
    $router->resource('sectiononetreatments', SectiononetreatmentController::class);
    $router->resource('sectiontwotreatments', SectiontwotreatmentController::class);
    $router->resource('replies', ReplyController::class);
    $router->resource('likes', LikeController::class);
    $router->resource('threads', ThreadController::class);
});
