<?php

use App\Http\Controllers\PageBlogPostController;
use App\Http\Controllers\PageCategoryController;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PagePostController;
use App\Http\Controllers\PagePostMonthlyController;
use App\Http\Controllers\PagePostYearlyController;
use App\Http\Controllers\PageProjectDetailController;
use App\Http\Controllers\PageProjectListController;
use App\Http\Controllers\PageProjectPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', PageHomeController::class)->name('page.home');

Route::get('/proyectos', PageProjectListController::class)->name('page.project.list');
Route::get('/proyectos/{codename}', PageProjectDetailController::class)->name('page.project.detail');
Route::get('/proyectos/{codename}/{chapter}', PageProjectPostController::class)->name('page.project.post');

Route::get('/categoria/{category}', PageCategoryController::class)->name('page.category');

Route::get('/blog/{year}', PagePostYearlyController::class)->name('page.blog.yearly');
Route::get('/blog/{year}/{month}', PagePostMonthlyController::class)->name('page.blog.monthly');
Route::get('/blog/{year}/{month}/{slug}', PageBlogPostController::class)->name('page.blog.post');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
