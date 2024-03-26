<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\StoryController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use App\Livewire\CreateContribution;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome')->name('home');

Route::get('{language:code}/stories', [StoryController::class, 'index'])
    ->name('stories.index');

Route::get('stories/{story:slug}', [StoryController::class, 'show'])
    ->name('stories.show');

Route::view('for-writers', 'pages.for-writers');

Route::get('random/story/{language:code}', [StoryController::class, 'random'])
    ->name('stories.random');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');

    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');

    Route::get('contribute/stories/create', CreateContribution::class)
        ->name('contributions.create');

    Route::view('contribute/success', 'pages.contribution-submitted')
        ->name('contributions.success');
});
