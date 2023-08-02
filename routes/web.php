<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\SiteSettings\SiteController;
use App\Http\Controllers\backend\News\NewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');




Route::group(['middleware' => 'auth'], function () {
    #dashboard Yolları
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [DashboardController::class, 'loguout'])->name('admin.logout');
    Route::get('/site-settings', [DashboardController::class, 'SiteSettingsForm'])->name('admin.SiteSettingsForm');
    Route::get('/newsList', [DashboardController::class, 'newsList'])->name('admin.newsList');
    Route::get('/newsForm', [DashboardController::class, 'newsForm'])->name('admin.newsForm');
    #Site Ayarları
    Route::post('/site-settings', [SiteController::class, 'SiteSettingsUpdate'])->name('admin.SiteSettingsPost');
    Route::get('/site-settings-add', [SiteController::class, 'SiteSettingsAddForm'])->name('admin.SiteSettingsAddForm');
    Route::post('/site-settings-add', [SiteController::class, 'siteSettingsAdd'])->name('admin.siteSettingsAdd');
    Route::get('/site-settings-delete/{value}', [SiteController::class, 'siteSettingsDelete'])->name('admin.siteSettingsDelete');
    #Haberler Yolları
    Route::get('/newsDelete/{id}', [NewsController::class, 'newsDelete'])->name('admin.newsDelete');
    Route::post('/newsAdd', [NewsController::class, 'newsAdd'])->name('admin.newsAdd');
    Route::get('/newsEditForm/{id}', [NewsController::class, 'newsEditForm'])->name('admin.newsEditForm');

});
