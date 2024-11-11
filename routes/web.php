<?php

use App\Models\post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

 

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about',  ['title' => 'About', 'name' => 'Angga Nugraha Sofyan']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => post::all()]);
});

Route::get('posts/{slug}', function($slug)  {
  

    $post = post::find($slug);

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
