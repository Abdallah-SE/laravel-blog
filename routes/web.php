<?php
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TagsController;
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


Route::middleware(['auth'])->group(function (){
   Route::resource('categories',  CategoriesController::class);
   Route::resource('posts', PostsController::class);
   Route::resource('tags', TagsController::class);
   Route::get('trashed-posts', [PostsController::class, 'trashed'])->name('trashed-posts.index');
   Route::get('/', function () {
    return view('welcome');
   });
   
   Route::put('restore-post/{post}', [PostsController::class, 'restore'])->name('restore-post');
});



Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    
    Route::post('users/{user}/make-admin', [UsersController::class, 'makeAdmin'])->name('usres.make-admin');
    
    Route::get('users/edit-profile', [UsersController::class, 'editProfile'])->name('users.edit-profile');
    Route::get('users/view-profile', [UsersController::class, 'viewProfile'])->name('users.view-profile');
    Route::put('users/update-profile', [UsersController::class, 'updateProfile'])->name('users.update-profile');
    Route::get('/dashboard', [UsersController::class, 'adminPanel'])->name('dashboard');
    
});
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

Route::get('blog/posts/{post}', [App\Http\Controllers\Blog\PostsController::class, 'show'])->name('blog.show');
Route::get('/', [App\Http\Controllers\Blog\PostsController::class, 'index'])->name('blog.index');
Route::get('blog/categories/{category}', [App\Http\Controllers\Blog\PostsController::class, 'category'])->name('blog.category');
Route::get('blog/tags/{tag}', [App\Http\Controllers\Blog\PostsController::class, 'tag'])->name('blog.tag');

require __DIR__.'/auth.php';
