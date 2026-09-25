<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\post\PostController;
use Illuminate\Support\Facades\Route;




Route::get('/dashboard',[AdminController::class,'index'])->name('admin.index');


Route::resource('posts',PostController::class);





?>
