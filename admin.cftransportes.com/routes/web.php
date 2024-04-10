<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\ClientCreate;
use App\Livewire\ClientIndex;
use App\Livewire\ClientView;
use App\Livewire\PersonTypeCreate;
use App\Livewire\PersonTypeIndex;
use App\Livewire\PersonTypeView;
use App\Livewire\OrderCreate;
use App\Livewire\OrderIndex;
use App\Livewire\OrderView;
use App\Livewire\OrderHistory;
use App\Livewire\VehicleCreate;
use App\Livewire\VehicleIndex;
use App\Livewire\VehicleView;
use App\Livewire\WarehouseCreate;
use App\Livewire\WarehouseIndex;
use App\Livewire\WarehouseView;
use App\Livewire\UserCreate;
use App\Livewire\UserIndex;
use App\Livewire\UserView;



Route::get('/', Login::class );
Route::get('/login', Login::class )->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class )->name('dashboard');

    Route::get('/client/create', ClientCreate::class )->name('client-create');
    Route::get('/client/index', ClientIndex::class )->name('client-index');
    Route::get('/client/view/{item}', ClientView::class )->name('client-view');


    Route::get('/person-type/create', PersonTypeCreate::class )->name('person-type-create');
    Route::get('/person-type/index', PersonTypeIndex::class )->name('person-type-index');
    Route::get('/person-type/view/{item}', PersonTypeView::class )->name('person-type-view');
    
    Route::get('/order/create', OrderCreate::class )->name('order-create');
    Route::get('/order/index', OrderIndex::class )->name('order-index');
    Route::get('/order/view/{item}', OrderView::class )->name('order-view');
    Route::get('/order/history/{item}', OrderHistory::class )->name('order-history');

    Route::get('/vehicle/create', VehicleCreate::class )->name('vehicle-create');
    Route::get('/vehicle/index', VehicleIndex::class )->name('vehicle-index');
    Route::get('/vehicle/view/{item}', VehicleView::class )->name('vehicle-view');

    Route::get('/warehouse/create', WarehouseCreate::class )->name('warehouse-create');
    Route::get('/warehouse/index', WarehouseIndex::class )->name('warehouse-index');
    Route::get('/warehouse/view/{item}', WarehouseView::class )->name('warehouse-view');

    Route::get('/user/create', UserCreate::class )->name('user-create');
    Route::get('/user/index', UserIndex::class )->name('user-index');
    Route::get('/user/view/{item}', UserView::class )->name('user-view');


    Route::get('/logout',  function () {
        \Auth::logout();
        return redirect()->route('login');
    } )->name('logout');

});
