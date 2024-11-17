<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
// use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('role', function(){
    return view('role');
})->where('role','role');

Route::get('role/{id}', function(){
    return view('role');
});

Route::get('bureau', function(){
    return view('role');
})->where('bureau','bureau/');
// Route::get('/role', function () {
//     return Inertia::render('role');
// });
// Route::post('/role-save', function () {
//     return Inertia::render('role');
// });
// Route::post('role-save',[RoleController::class,'store'])->name('role.store');

Route::get('/{pathMatch}', function(){
    return view('welcome');
})->where('pathMAtch','.*');


