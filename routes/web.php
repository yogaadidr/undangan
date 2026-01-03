<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UndanganController;
use App\Http\Controllers\WishController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UndanganController::class, 'index']);
Route::post('/wish', [WishController::class, 'create']);

Route::group(['middleware' => 'auth'], function () {

	Route::group(['prefix' => 'dashboard'], function () {
		Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

		Route::group(['prefix' => 'guests'], function () {
			Route::get('/',  [GuestController::class, 'view'])->name('guests');
			Route::get('/add',  [GuestController::class, 'create'])->name('guests.add');
			Route::post('/add/process',  [GuestController::class, 'process'])->name('guests.add.process');
			Route::delete('/{id}/delete',  [GuestController::class, 'delete'])->name('guests.destroy');
			Route::get('/{id}/update',  [GuestController::class, 'update'])->name('guests.update');
			Route::put('/{id}/update/process',  [GuestController::class, 'process'])->name('guests.update.process');
		});

		Route::group(['prefix' => 'wishes'], function () {
			Route::get('/', [WishController::class, 'view'])->name('wishes');
			Route::delete('/{id}/delete',  [WishController::class, 'delete'])->name('wishes.destroy');
			});

		Route::group(['prefix' => 'cards'], function () {
			Route::get('/', [CardController::class, 'view'])->name('cards');
			Route::get('/add',  [CardController::class, 'create'])->name('cards.add');
			Route::post('/add/process',  [CardController::class, 'process'])->name('cards.add.process');
			Route::delete('/{id}/delete',  [CardController::class, 'delete'])->name('cards.destroy');
			Route::get('/{id}/update',  [CardController::class, 'update'])->name('cards.update');
			Route::put('/{id}/update/process',  [CardController::class, 'process'])->name('cards.update.process');
		});
	});

	Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});


Route::group(['middleware' => 'guest'], function () {
	Route::get('/login', function () {
		return view('session/login-session');
	})->name('login');
	Route::post('/session', [SessionsController::class, 'store']);
});
