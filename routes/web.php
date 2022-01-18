<?php

use Illuminate\Http\Request;
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

// #4 Query Builder : Exercice 2

Route::get('/items/create', function () {
    echo "<h1>Objets existants</h1>";

    $items = DB::table('items')->get();

    echo '<ul>';
    foreach ($items as $item) {
        echo "<li>" . $item->name . "</li>";
    }
    echo '</ul>';

    echo "<h1>Création d'un item</h1>";

    echo '<form action="/items" method="post">';
    echo csrf_field();
    echo '<input type="text" name="name"/>';
    echo '<button type="submit">Envoyer</button>';
    echo '</form>';
});

Route::post('/items', function (Request $request) {
   $properties = $request->all('name');

   DB::table('items')->insert($properties);

   return redirect('/items/create');
});

Route::get('/users/give-item', function () {
    $users = DB::table('users')->get();
    $items = DB::table('items')->get();

    echo "<h1>Don d'un objet à un joueur</h1>";

    echo '<form action="/users/give-item" method="post">';
    echo csrf_field();
    echo '<label>Joueur</label><br/>';
    echo '<select name="user_id">';
    foreach ($users as $user) {
        echo "<option value='" . $user->id . "'>" . $user->name . "</option>";
    }
    echo '</select><br/><br/>';

    echo '<label>Objet</label><br/>';
    echo '<select name="item_id">';
    foreach ($items as $item) {
        echo "<option value='" . $item->id . "'>" . $item->name . "</option>";
    }
    echo '</select><br/><br/>';

    echo '<label>Quantité</label>';
    echo '<input type="text" name="quantity"/><br/><br/>';
    echo '<button type="submit">Envoyer</button>';
    echo '</form>';
});

Route::post('/users/give-item', function (Request $request) {
    $properties = $request->all('user_id', 'item_id', 'quantity');

    DB::table('item_user')->insert($properties);

    $user = DB::table('users')->find($request->input('user_id'));
    $item = DB::table('items')->find($request->input('item_id'));
    $quantity = $request->input('quantity');

    echo "Don de $quantity " . $item->name . " au joueur " . $user->name . "<br/>";

    echo "<a href='/users/give-item'>Retour au formulaire de don</a>";
});

Route::get('/users/choose', function () {
    $users = DB::table('users')->get();

    echo "<h1>Suppression d'un joueur</h1>";

    echo '<form action="/users/drop" method="post">';
    echo method_field('delete');
    echo csrf_field();
    echo '<label>Joueur</label><br/>';
    echo '<select name="user_id">';
    foreach ($users as $user) {
        echo "<option value='" . $user->id . "'>" . $user->name . "</option>";
    }
    echo '</select><br/><br/>';
    echo '<button type="submit">Envoyer</button>';
    echo '</form>';
});

Route::delete('/users/drop', function (Request $request) {
    $user = DB::table('users')->find($request->input('user_id'));

    DB::table('guild_user')
        ->where('user_id', $user->id)
        ->delete();

    DB::table('item_user')
        ->where('user_id', $user->id)
        ->delete();

    DB::table('users')
        ->where('id', $request->input('user_id'))
        ->delete();

    echo "Dissociation du joueur $user->name avec ses guildes<br/>";
    echo "Dissociation du joueur $user->name avec ses objets<br/>";
    echo "Suppression du joueur<br/>";

    echo "<a href='/users/choose'>Retour au formulaire de suppression d'un joueur</a>";
});
