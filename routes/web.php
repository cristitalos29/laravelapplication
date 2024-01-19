<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticlesController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/welcome/{user}', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome.show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.show');

Route::get('/', [App\Http\Controllers\ArticlesController::class, 'welcome'])->name('welcome');

Route::get('/articles/{id}', [App\Http\Controllers\ArticlesController::class, 'show'])->name('articles.show');

Route::get('art', [\App\Http\Controllers\CategoryController::class, 'showArt'])->name('art.show');
Route::get('tech', [\App\Http\Controllers\CategoryController::class, 'showTech'])->name('tech.show');
Route::get('science', [\App\Http\Controllers\CategoryController::class, 'showScience'])->name('science.show');
Route::get('fashion', [\App\Http\Controllers\CategoryController::class, 'showFashion'])->name('fashion.show');

Route::get('/article/create', [\App\Http\Controllers\ArticlesController::class, 'create'])->name('article.show');;
Route::delete('/articles/{id}', [App\Http\Controllers\ArticlesController::class, 'delete'])->name('articles.delete');
Route::put('/articles/{id}/approve', [App\Http\Controllers\ArticlesController::class, 'approveArticle'])->name('articles.approve');
Route::put('/articles/{id}/edit', [App\Http\Controllers\ArticlesController::class, 'update'])->name('articles.update');
Route::get('/articles/{id}/edit', [App\Http\Controllers\ArticlesController::class, 'edit'])->name('articles.edit');



Route::post('/article', [\App\Http\Controllers\ArticlesController::class, 'store'])->name('article.store');
Route::get('/user/articles', [ArticlesController::class, 'userArticles'])->name('user.articles');
Route::get('/editor/pending-articles', [App\Http\Controllers\ArticlesController::class, 'editorPendingArticles'])->name('editor.pending.articles');




Route::get('/admin/panel', 'App\Http\Controllers\AdminController@index')->name('admin.panel');
//Route::get('/admin/panel', [AdminController::class, 'get_users'])->name('admin.panel');
//::put('/admin/user/update/{user}', [AdminController::class, 'updateUser'])->name('admin.user.update');
//Route::delete('/admin/user/delete/{user}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
//Route::get('/admin/users/{user}/edit', 'AdminController@editUser')->name('admin.users.edit');

Route::get('/admin/panel', [AdminController::class, 'get_users'])->name('admin.panel');
Route::put('/admin/users/{user}/update', [AdminController::class, 'updateUser'])->name('admin.users.update');
Route::delete('/admin/user/delete/{user}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
Route::get('/admin/users/{user}/edit', 'AdminController@editUser')->name('admin.user.edit');
Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');


//Route::get('/profilepage', [\App\Http\Controllers\ProfilePageController::class, 'index'])->name('profile.page');


use App\Http\Controllers\ProfilePageController;

Route::middleware(['auth'])->group(function () {

    Route::get('/profilepage', [ProfilePageController::class, 'index'])->name('profile.page');
    Route::post('/profilepage/change-password', [ProfilePageController::class, 'changePassword'])->name('profile.password.change');
});
