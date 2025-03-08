this is my rooutes:

Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/jobs', JobComponent::class)->name('jobs.index');
    Route::get('/departments', Departements::class)->name('departments');
    Route::get('/contracts', Contracts::class)->name('contracts');
    Route::get('/formations', Formations::class)->name('formations');
    Route::get('/users', Users::class)->name('users');
    Route::get('/roles', Roles::class)->name('roles');
    Route::get('/careers', Careers::class)->name('careers');
    Route::get('/Conges', Conges::class)->name('Conges');

});

 you can run this or the seeder:
 php artisan make:seeder RolePermissionSeeder                                      
