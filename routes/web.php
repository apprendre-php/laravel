<?php

use Illuminate\Support\Facades\DB;
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

// #4 Query Builder : Exercice 1

Route::get('/guilds', function () {
    $guilds = DB::table('guilds')->get();

    echo '<ul>';
    foreach ($guilds as $guild) {
        echo "<li>" . $guild->name . "</li>";
    }
    echo '</ul>';
});

Route::get('/users-with-health-up-20', function () {
    $users = DB::table('users')
        ->where('health', '>', 20)
        ->get();

    echo '<ul>';
    foreach ($users as $user) {
        echo "<li>" . $user->name . "</li>";
    }
    echo '</ul>';
});

Route::get('/best-user', function () {
    $user = DB::table('users')
        ->orderByDesc('level')
        ->limit(1)
        ->first();

    echo "<h1>" . $user->name . "</h1>";
});

Route::get('/users/{user}/items', function ($user) {
    $userItems = DB::table('items')
        ->leftJoin('item_user', 'item_user.item_id', '=', 'items.id')
        ->where('item_user.user_id', $user)
        ->get();

    echo '<ul>';
    foreach ($userItems as $item) {
        echo "<li>" . $item->name . " / qté: " . $item->quantity . "</li>";
    }
    echo '</ul>';
});
