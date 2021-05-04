<?php

use Illuminate\Support\Facades\Route;

Route::get('/blogs', function() {
    return view('blog.index');
});