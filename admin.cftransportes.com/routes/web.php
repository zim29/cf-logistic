<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\ClientCreate;
use App\Livewire\PersonTypeCreate;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', Login::class )->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class )->name('dashboard');
    Route::get('/client/create', ClientCreate::class )->name('client-create');


    Route::get('/person-type/create', PersonTypeCreate::class )->name('person-type-create');


    Route::get('/logout',  function () {
        \Auth::logout();
        return redirect()->route('login');
    } )->name('logout');

});
