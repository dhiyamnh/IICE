<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TemplateController;


Route::get('/', [TemplateController::class, 'index']);

Route::view('/admin/{any?}', 'admin.app')->where('any', '.*')->name('admin');

Route::get('/', function () {
    return view('index');
});