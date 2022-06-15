<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->name('welcome');

Auth::routes();

// Route::get('pricing', 'PageController@pricing')->name('page.pricing');
// Route::get('lock', 'PageController@lock')->name('page.lock');

Route::group(['middleware' => 'auth'], function () {



    /**
     * Establisment Routes
     */
    Route::resource('establishments', 'EstablishmentController')->only('index', 'create', 'edit');
    Route::resource('establishment-areas', 'EstablishmentAreaController')->only('index', 'create', 'edit');

    Route::resource('establishments.room-areas', 'RoomAreasController')->only('index', 'create', 'edit');
    Route::resource('establishments.rooms', 'RoomController')->only('index', 'create', 'edit');
    Route::resource('establishments.rooms.shellies', 'ShellyController')->only('index', 'create', 'edit');



    /**
     * Inventory Routes
     */
    Route::controller('InventoryController')->group(function () {
        Route::get('/inventory/index', 'index')->name('inventory.index');
        Route::post('/inventory', 'store')->name('inventory.store');
        Route::get('/inventory/create', 'create')->name('inventory.create');
        Route::get('/inventory/{id}', 'show')->name('inventory.show');
        Route::put('/inventory/{id}', 'update')->name('inventory.update');
        Route::delete('/inventory/{id}', 'destroy')->name('inventory.delete');
        Route::get('/inventory/{id}/edit', 'edit')->name('inventory.edit');
        Route::post('/inventory/table', 'getInventario')->name('inventory.getInventario');
    });

    /**
     * Stretche Routes
     */
    Route::controller('StretchController')->group(function () {
        Route::get('/stretch/index', 'index')->name('stretch.index');
        Route::post('/stretch', 'store')->name('stretch.store');
        Route::get('/stretch/create', 'create')->name('stretch.create');
        Route::get('/stretch/{id}', 'show')->name('stretch.show');
        Route::put('/stretch/{id}', 'update')->name('stretch.update');
        Route::delete('/stretch/{id}', 'delete')->name('stretch.delete');
        Route::get('/stretch/{id}/edit', 'edit')->name('stretch.edit');
    });

    /**
     * Reservation Desk Routes
     */
    Route::controller('ReservationDeskController')->group(function () {
        Route::get('/reservationDesk/index', 'index')->name('ReservationDesk.index');
        Route::post('/reservationDesk', 'store')->name('ReservationDesk.store');
        Route::get('/reservationDesk/create', 'create')->name('ReservationDesk.create');
        Route::get('/reservationDesk/{id}', 'show')->name('ReservationDesk.show');
        Route::put('/reservationDesk/{id}', 'update')->name('ReservationDesk.update');
        Route::delete('/reservationDesk/{id}', 'delete')->name('ReservationDesk.delete');
        Route::get('/reservationDesk/{id}/edit', 'edit')->name('ReservationDesk.edit');
    });
    /**
     * Product Routes
     */
    Route::controller('ProductController')->group(function () {
        Route::get('/product/{establishment_id}/', 'index')->name('product.index');
        Route::post('/product/{establishment_id}/store', 'store')->name('product.store');
        Route::get('/product/{establishment_id}/create', 'create')->name('product.create');
        Route::put('/product/{id}/update', 'update')->name('product.update');
        Route::delete('/product/{id}/update', 'destroy')->name('product.delete');
        Route::get('/product/{id}/edit/update', 'edit')->name('product.edit');
        Route::post('/{establishment_id}/productRecipt', 'storeRecipt')->name('product.storeRecipt');
    });

    Route::controller('TypeProductController')->group(function () {
        Route::get('/tipo', 'index')->name('tipo.index');
        Route::post('/creacion/tipo', 'store')->name('tipo.store');
        Route::put('/actualizacion/tipo/{id}', 'update')->name('tipo.update');
        Route::delete('/eliminacion/tipo/{id}', 'destroy')->name('tipo.delete');
    });

    Route::controller('IngredientController')->group(function () {
        Route::get('/ingredientes/{establishment_id}/', 'index')->name('ingredient.index');
        Route::post('/ingredientes/{establishment_id}/store', 'store')->name('ingredient.store');
        Route::put('/ingredientes/{id}/update', 'update')->name('ingredient.update');
        Route::delete('/ingredientes/{id}/destroy', 'destroy')->name('ingredient.delete');
    });

    Route::resource('category', 'CategoryController', ['except' => ['show']]);
    Route::resource('tag', 'TagController', ['except' => ['show']]);
    Route::resource('item', 'ItemController', ['except' => ['show']]);
    Route::resource('role', 'RoleController', ['except' => ['show', 'destroy']]);
    Route::resource('user', 'UserController', ['except' => ['show']]);

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);


    Route::get('home', 'HomeController@index')->name('home');

    Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
