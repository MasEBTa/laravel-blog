<?php

use Illuminate\Support\Facades\Route;
// use App\Models\Post;
use App\Http\Controllers\PostControllers;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
// use App\Models\User;

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

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "Home"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "About"
    ]);
});

Route::get('/blog', [PostControllers::Class, 'index']);

// halaman single post
Route::get('posts/{post:slug}', [PostControllers::Class, 'show']);

// halaman category
// Route::get('/categories/{category:slug}', function(Category $category)
// {
//     return view('blog', [
//         'title' => 'Blog by Kategory',
//         'active' => 'blog',
//         'judul' => 'Blog by Category ' . $category->name,
//         'posts' => $category->posts->load(['author', 'category'])
//     ]);
// });

// halaman categories
Route::get('/categories', function()
{
    return view('categories', [
        'title' => 'kategori',
        'active' => 'categories',
        'categories' => Category::all() //mengambil dari model category
    ]);
});

// halaman author
// Route::get('authors/{author:username}', function(User $author) {
//     return view('blog', [
//         'title' => 'Blog by Author',
//         'active' => 'blog',
//         'judul' => 'Blog by Author ' . $author->name,
//         'posts' => $author->posts->load(['author', 'category'])
//     ]);
// });

// halaman login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// loguot
Route::post('/logout', [LoginController::class, 'logout']);

// halaman register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

// membuat akun
Route::post('/register', [RegisterController::class, 'store']);

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// dashboard post
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// make slug
// Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');