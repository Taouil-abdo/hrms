<?php

use App\Livewire\Roles;
use App\Livewire\Users;
use App\Mail\BasicMail;
use App\Livewire\Conges;
use App\Livewire\Careers;
use App\Livewire\Contracts;
use App\Livewire\Dashboard;
use App\Livewire\Formations;
use App\Livewire\Permissions;
use App\Livewire\Departements;
use App\Livewire\JobComponent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth')->group(function () {

Route::view('/', 'livewire.pages.auth.login');
// });

// Route::view('livewire.dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/jobs', JobComponent::class)->name('jobs.index');
    Route::get('/departments', Departements::class)->name('departments');
    Route::get('/contracts', Contracts::class)->name('contracts');
    Route::get('/formations', Formations::class)->name('formations');
    Route::get('/users', Users::class)->name('users');
    Route::get('/roles', Roles::class)->name('roles');
    Route::get('/careers', Careers::class)->name('careers');
    Route::get('/Conges', Conges::class)->name('Conges');





    Route::get('/Message',function(){
        Mail::to('abdotaouil03@gmail.com')->send(new BasicMail('Taouil'));
        return 'Email was sent';
    });

require __DIR__.'/auth.php';
