<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Main\IndexController as MainIndexController;
use App\Http\Controllers\Admin\Tag\EditController as AdminTagEditController;
use App\Http\Controllers\Admin\Tag\ShowController as AdminTagShowController;
use App\Http\Controllers\Admin\Post\EditController as AdminPostEditController;
use App\Http\Controllers\Admin\Post\ShowController as AdminPostShowController;
use App\Http\Controllers\Admin\Tag\IndexController as AdminTagIndexController;

use App\Http\Controllers\Admin\Tag\StoreController as AdminTagStoreController;
use App\Http\Controllers\Admin\User\EditController as AdminUserEditController;
use App\Http\Controllers\Admin\User\ShowController as AdminUserShowController;
use App\Http\Controllers\Admin\Main\IndexController as AdminMainIndexController;
use App\Http\Controllers\Admin\Post\IndexController as AdminPostIndexController;
use App\Http\Controllers\Admin\Post\StoreController as AdminPostStoreController;
use App\Http\Controllers\Admin\Tag\CreateController as AdminTagCreateController;

use App\Http\Controllers\Admin\Tag\DeleteController as AdminTagDeleteController;
use App\Http\Controllers\Admin\Tag\UpdateController as AdminTagUpdateController;
use App\Http\Controllers\Admin\User\IndexController as AdminUserIndexController;
use App\Http\Controllers\Admin\User\StoreController as AdminUserStoreController;
use App\Http\Controllers\Admin\Post\CreateController as AdminPostCreateController;
use App\Http\Controllers\Admin\Post\DeleteController as AdminPostDeleteController;
use App\Http\Controllers\Admin\Post\UpdateController as AdminPostUpdateController;

use App\Http\Controllers\Admin\User\CreateController as AdminUserCreateController;
use App\Http\Controllers\Admin\User\DeleteController as AdminUserDeleteController;
use App\Http\Controllers\Admin\User\UpdateController as AdminUserUpdateController;
use App\Http\Controllers\Admin\Category\EditController as AdminCategoryEditController;
use App\Http\Controllers\Admin\Category\ShowController as AdminCategoryShowController;
use App\Http\Controllers\Admin\Category\IndexController as AdminCategoryIndexController;
use App\Http\Controllers\Admin\Category\StoreController as AdminCategoryStoreController;

use App\Http\Controllers\Admin\Category\CreateController as AdminCategoryCreateController;
use App\Http\Controllers\Admin\Category\DeleteController as AdminCategoryDeleteController;
use App\Http\Controllers\Admin\Category\UpdateController as AdminCategoryUpdateController;

use App\Http\Controllers\Post\IndexController as PostIndexController;
use App\Http\Controllers\Post\ShowController;



// Главная страница
Route::group(['namespace' => 'Main'], function() {
    Route::get('/', [MainIndexController::class, '__invoke'])->name('main.index');
});

// Страница с постами
Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function() {
    Route::get('/', [PostIndexController::class, '__invoke'])->name('post.index');  // Или MainIndexController, если хотите использовать его
    Route::get('/{post}', [ShowController::class, '__invoke'])->name('post.show');

// post/10/comments
    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function() {
        Route::post('/', [App\Http\Controllers\Post\Comment\StoreController::class, '__invoke'])->name('post.comment.store');
    });

    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function() {
        Route::post('/', [App\Http\Controllers\Post\Like\StoreController::class, '__invoke'])->name('post.like.store');
    });
});

Auth::routes(['verify' => true]);



Route::group(['prefix' => 'personal', 'middleware' => ['auth', 'verified']], function() {
    Route::get('main', 'App\Http\Controllers\Personal\Main\IndexController@__invoke')->name('personal.main.index');
    Route::get('liked', 'App\Http\Controllers\Personal\Liked\IndexController@__invoke')->name('personal.liked.index');
    Route::delete('/{post}', 'App\Http\Controllers\Personal\Liked\DeleteController@__invoke')->name('personal.liked.delete');

    Route::get('comments', 'App\Http\Controllers\Personal\Comment\IndexController@__invoke')->name('personal.comment.index');
    Route::get('comments/{comment}/edit', 'App\Http\Controllers\Personal\Comment\EditController@__invoke')->name('personal.comment.edit');
    Route::put('comments/{comment}', 'App\Http\Controllers\Personal\Comment\UpdateController@__invoke')->name('personal.comment.update');  // Это обновление комментария
    Route::delete('comments/{comment}', 'App\Http\Controllers\Personal\Comment\DeleteController@__invoke')->name('personal.comment.delete');
});














Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function() {
    Route::get('/', [AdminMainIndexController::class, '__invoke'])->name('admin.main.index');

    Route::group(['prefix' => 'posts'], function() {
        Route::get('/', [AdminPostIndexController::class, '__invoke'])->name('admin.post.index');
        Route::get('create', [AdminPostCreateController::class, '__invoke'])->name('admin.post.create');
        Route::post('create', [AdminPostStoreController::class, '__invoke'])->name('admin.post.store');
        Route::get('/{post}', [AdminPostShowController::class, '__invoke'])->name('admin.post.show');
        Route::get('/{post}/edit', [AdminPostEditController::class, '__invoke'])->name('admin.post.edit');
        Route::patch('/{post}', [AdminPostUpdateController::class, '__invoke'])->name('admin.post.update');
        Route::delete('/{post}', [AdminPostDeleteController::class, '__invoke'])->name('admin.post.delete');
    });
    
    
    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', [AdminCategoryIndexController::class, '__invoke'])->name('admin.category.index');
        Route::get('create', [AdminCategoryCreateController::class, '__invoke'])->name('admin.category.create');
        Route::post('create', [AdminCategoryStoreController::class, '__invoke'])->name('admin.category.store');
        Route::get('/{category}', [AdminCategoryShowController::class, '__invoke'])->name('admin.category.show');
        Route::get('/{category}/edit', [AdminCategoryEditController::class, '__invoke'])->name('admin.category.edit');
        Route::patch('/{category}', [AdminCategoryUpdateController::class, '__invoke'])->name('admin.category.update');
        Route::delete('/{category}', [AdminCategoryDeleteController::class, '__invoke'])->name('admin.category.delete');
    });

    Route::group(['prefix' => 'tags'], function() {
        Route::get('/', [AdminTagIndexController::class, '__invoke'])->name('admin.tag.index');
        Route::get('create', [AdminTagCreateController::class, '__invoke'])->name('admin.tag.create');
        Route::post('create', [AdminTagStoreController::class, '__invoke'])->name('admin.tag.store');
        Route::get('/{tag}', [AdminTagShowController::class, '__invoke'])->name('admin.tag.show');
        Route::get('/{tag}/edit', [AdminTagEditController::class, '__invoke'])->name('admin.tag.edit');
        Route::patch('/{tag}', [AdminTagUpdateController::class, '__invoke'])->name('admin.tag.update');
        Route::delete('/{tag}', [AdminTagDeleteController::class, '__invoke'])->name('admin.tag.delete');
    });

    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [AdminUserIndexController::class, '__invoke'])->name('admin.user.index');
        Route::get('create', [AdminUserCreateController::class, '__invoke'])->name('admin.user.create');
        Route::post('create', [AdminUserStoreController::class, '__invoke'])->name('admin.user.store');
        Route::get('/{user}', [AdminUserShowController::class, '__invoke'])->name('admin.user.show');
        Route::get('/{user}/edit', [AdminUserEditController::class, '__invoke'])->name('admin.user.edit');
        Route::patch('/{user}', [AdminUserUpdateController::class, '__invoke'])->name('admin.user.update');
        Route::delete('/{user}', [AdminUserDeleteController::class, '__invoke'])->name('admin.user.delete');
    });
    
    
});





