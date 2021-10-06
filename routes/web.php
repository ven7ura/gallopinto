<?php

use App\Http\Controllers\PageCategoryController;
use App\Http\Controllers\PageHomeController;
use App\Http\Controllers\PagePostController;
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

Route::get('/', PageHomeController::class);

Route::get('/{year}/{month}/{slug}', PagePostController::class)->name('page.post');

Route::get('/category/{category}', PageCategoryController::class)->name('page.category');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';
