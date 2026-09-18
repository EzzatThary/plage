<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;

Route::get('/', [HomeControler::class, 'index'])->name('home');
Route::get('/about', [HomeControler::class, 'about'])->name('about');
Route::get('/contact', [HomeControler::class, 'contact'])->name('contact');
Route::get('/post', [HomeControler::class, 'post'])->name('post');
