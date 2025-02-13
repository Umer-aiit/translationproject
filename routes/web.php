<?php
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/page1', function () {
    return view('page1');
})->name('page1');

Route::get('/page2', function () {
    return view('page2');
})->name('page2');

Route::get('/page3', function () {
    return view('page3');
})->name('page3');

Route::get('/language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'fr', 'sp'])) {
        Session::put('locale', $lang);
        App::setLocale($lang);
    }
    return redirect()->back();
})->name('language.switch');