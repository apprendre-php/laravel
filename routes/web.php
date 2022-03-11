<?php

use Illuminate\Support\Facades\Route;

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

Route::get( '/', array( \App\Http\Controllers\ItemController::class, 'index' ) )
	->name( 'items.index' );

Route::get( '/items/create', array( \App\Http\Controllers\ItemController::class, 'create' ) )
	->name( 'items.create' );

Route::post( '/items', array( \App\Http\Controllers\ItemController::class, 'store' ) )
	->name( 'items.store' );

Route::get( '/items/{item}', array( \App\Http\Controllers\ItemController::class, 'show' ) )
	->name( 'items.show' );

Route::get( '/items/{item}/edit', array( \App\Http\Controllers\ItemController::class, 'edit' ) )
	->name( 'items.edit' );

Route::put( '/items/{item}', array( \App\Http\Controllers\ItemController::class, 'update' ) )
	->name( 'items.update' );

Route::delete( '/items/{item}', array( \App\Http\Controllers\ItemController::class, 'destroy' ) )
	->name( 'items.destroy' );

Route::get( '/register', array( \App\Http\Controllers\RegisterController::class, 'create' ) )
	->name( 'register.create' );

Route::post( '/register', array( \App\Http\Controllers\RegisterController::class, 'store' ) )
	->name( 'register.store' );

Route::get( '/login', array( \App\Http\Controllers\AuthController::class, 'loginForm' ) )
	->name( 'login' );

Route::post( 'login', array( \App\Http\Controllers\AuthController::class, 'login' ) );

Route::post( 'logout', array( \App\Http\Controllers\AuthController::class, 'logout' ) )
	->name( 'logout' );

Route::get( '/users', array( \App\Http\Controllers\UserController::class, 'index' ) )
	->name( 'users.index' );

Route::get( '/users/{user}', array( \App\Http\Controllers\UserController::class, 'show' ) )
	->name( 'users.show' );

Route::get( '/orders/{order}', array( \App\Http\Controllers\OrderController::class, 'show' ) )
	->name( 'orders.show' );

Route::post( '/orders/add/{item}', array( \App\Http\Controllers\OrderController::class, 'addItem' ) )
	->name( 'orders.addItem' );

Route::get( '/orders/{order}/checkout', array( \App\Http\Controllers\OrderController::class, 'checkout' ) )
	->name( 'orders.checkout' );

Route::get( '/cart', array( \App\Http\Controllers\CartController::class, 'show' ) )
	->name( 'cart.show' );

Route::get( '/orders/{order}/cancell', array( \App\Http\Controllers\OrderController::class, 'cancell' ) )
	->name( 'orders.cancell' );
