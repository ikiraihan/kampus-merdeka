<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//Route::get('/welcome', fn () => view('welcome'));
Route::get('/', HomeController::class);
Route::get('/mau', [PageController::class, 'mau']);
Route::get('/gak', [PageController::class, 'gak']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/show/{user}', [UserController::class, 'show']);
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/index', [ProductController::class, 'index2']);
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/destroy2/{id}', [ProductController::class, 'destroy2']);
Route::get('/products/trash', [ProductController::class, 'trash'])->name('products.trash');
Route::get('/products/restore/{id}', [ProductController::class, 'restore']);
Route::get('/products/destroy_permanent/{id}', [ProductController::class, 'destroy_permanent']);

Route::middleware('kmkey')->group(function () {
    Route::get('/dashboard', fn () => 'Dashboard')->name('dashboard');
});
