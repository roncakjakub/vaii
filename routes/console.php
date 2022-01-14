<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('initRoles', function () {
    \Spatie\Permission\Models\Role::create(['name' => 'admin']);
    \Spatie\Permission\Models\Role::create(['name' => 'teacher']);
    \Spatie\Permission\Models\Role::create(['name' => 'student']);
});

Artisan::command('createAdmin', function () {
    $u = \App\Models\User::create([
        'name' => 'Admin',
        'email' => 'a@a.a',
        'password' => bcrypt('admin'),
    ]);
    $u->assignRole('admin');
});

Artisan::command('createLicenceTypes', function () {
    foreach (['AM', 'A1', 'A2', 'BE', 'B', 'B1', 'C', 'T'] as $code) {
        \App\Models\LicenceType::create([
            'code' => $code,
            'price' => '111.23',
            'short_desc_1' => 'Motocykel s objemom motora do 125cm3',
            'short_desc_2' => 'Od 16 rokov',
            'short_desc_3' => 'Zahŕňa skupinu AM'
        ]);
    }
});
