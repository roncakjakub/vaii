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

Artisan::command('createAdmin', function () {
    \App\Models\User::create([
        'name' => 'Filip Testovač',
        'email' => 'f@t.sk',
        'password' => bcrypt('Filip123'),
    ]);
});

Artisan::command('createCourses', function () {
    foreach (['AM', 'A1', 'A2', 'BE', 'B', 'B1', 'C', 'T'] as $code) {
        \App\Models\Course::create([
            'code' => $code,
            'price' => '111.23',
            'short_desc_1' => 'Motocykel s objemom motora do 125cm3',
            'short_desc_2' => 'Od 16 rokov',
            'short_desc_3' => 'Zahŕňa skupinu AM'
        ]);
    }
});
