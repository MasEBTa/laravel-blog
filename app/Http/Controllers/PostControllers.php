<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostControllers extends Controller
{
    public function index()
    {
        $judul = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $judul = 'Blog on category ' . $category->name;
        } else if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $judul = 'Blog by Author ' . $author->name;
        }
        // dd(request('search'));
        // $blog_Utkpost = Post::all(); // urut berdasar id
        $blog_Utkpost = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString();// urut berdasar waktu input;
        return view('blog', [
            "title" => "Blog",
            "posts" => $blog_Utkpost,
            "judul" => $judul,
            "active" => "blog"
        ]);
    }
    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "active" => "blog",
            "post" => $post
        ]);
    }
}
