<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'app.pages.home.index')->name('home');
Route::view('/docs', 'app.pages.docs.index')->name('docs');