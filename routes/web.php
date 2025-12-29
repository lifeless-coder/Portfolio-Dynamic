<?php


use App\Http\Controllers\User\PortfolioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
Route::get('/footer-settings', [PortfolioController::class, 'footerSettings'])->name('portfolio.footerSettings');
Route::post('/footer-text-update', [PortfolioController::class, 'updateFooterText'])->name('portfolio.updateFooterText');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminPortfolioController::class, 'settings'])->name('dashboard');
    Route::get('/settings', [AdminPortfolioController::class, 'settings'])->name('settings');
    Route::get('/hero', [AdminPortfolioController::class, 'hero'])->name('hero.index');
    Route::post('/hero-settings', [AdminPortfolioController::class, 'storeHero'])->name('hero.store');
    Route::get('/about-settings', [AdminPortfolioController::class, 'about'])->name('about.index');
    Route::post('/about', [AdminPortfolioController::class, 'storeAbout'])->name('about.store');
    Route::post('/aboutme-images', [AdminPortfolioController::class, 'storeAboutImage'])->name('aboutme.storeImage');
    Route::get('/skills-settings', [AdminPortfolioController::class, 'skills'])->name('skills.index');
    Route::post('/skills', [AdminPortfolioController::class, 'storeSkill'])->name('skills.store');
    Route::delete('/skills/{id}', [AdminPortfolioController::class, 'deleteSkill'])->name('skills.delete');
    Route::put('/skills/{id}', [AdminPortfolioController::class, 'updateSkill'])->name('skills.update');
    Route::post('/projects', [AdminPortfolioController::class, 'storeProject'])->name('projects.store');

    Route::delete('/projects/{id}', [AdminPortfolioController::class, 'deleteProject'])->name('projects.delete');
    Route::post('/education', [AdminPortfolioController::class, 'storeEducation'])->name('education.store');
    Route::put('/footer-text', [AdminPortfolioController::class, 'updateFooterText'])->name('footertext.update');
});