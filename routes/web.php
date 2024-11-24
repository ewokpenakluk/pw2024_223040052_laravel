<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Halaman Home
Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

// Halaman About
Route::get('/about', function () {
    return view('about', ['title' => 'About', 'name' => 'Angga Nugraha Sofyan']);
});

// Halaman Semua Post
Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog',
        'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(9)->withQueryString() // Hapus scopeFilter
    ]);
});

// Halaman Detail Post Berdasarkan Slug
Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

// Halaman Post Berdasarkan Author
Route::get('authors/{user:username}', function (User $user) {
    $posts = $user->posts()->with('category', 'author')->get(); // Relasi lebih efisien
    return view('posts', [
        'title' => count($posts) . ' Articles by ' . $user->name,
        'posts' => $posts
    ]);
});

// Halaman Post Berdasarkan Kategori
Route::get('categories/{category:slug}', function (Category $category) {
    $posts = $category->posts()->with('category', 'author')->get(); // Memuat relasi
    return view('posts', [
        'title' => 'Articles in: ' . $category->name,
        'posts' => $posts
    ]);
});

// Halaman Kontak
Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
