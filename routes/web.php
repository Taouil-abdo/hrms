<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\JobComponent;
use App\Livewire\Departements;
use App\Livewire\Contracts;
use App\Livewire\Formations;
use App\Livewire\Roles;
use App\Livewire\Users;
use App\Livewire\Permissions;



Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::get('/jobs', JobComponent::class)->name('jobs.index');    // Route::post('jobs/add',Job::class);
    Route::get('/departments', Departements::class)->name('departments');
    Route::get('/contracts', Contracts::class)->name('contracts');


require __DIR__.'/auth.php';
