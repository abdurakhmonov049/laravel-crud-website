<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
       return 'salom';
    });
});



Route::get('/', [PageController::class, 'main']);


Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/service', [PageController::class, 'service'])->name('service');
Route::get('/project', [PageController::class, 'project'])->name('project');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');


Route::resource('posts', PostController::class);



/*
Route::get('posts',[PageController::class,'index'])->name('posts.index');
Route::get('posts{post}',[PageController::class,'show'])->name('posts.show');
Route::get('posts/create',[PageController::class,'create'])->name('posts.create');
Route::post('posts/create',[PageController::class,'store'])->name('posts.store');
Route::get('posts/{post}/edit',[PageController::class,'edit'])->name('posts.edit');
Route::put('posts/{post}/edit',[PageController::class,'update'])->name('posts.update');
Route::delete('posts/{post}/delete',[PageController::class,'delete'])->name('posts.delete');
*/









/*
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);

Route::get('/create',[UserController::class,'create']);
Route::post('/user-create',[UserController::class,'store']);
*/