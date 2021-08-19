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

use App\Post;
use App\User;

Route::get('/', function () {
    return view('post');
});

Route::get('/index', 'UserController@index')->name('users.index');
Route::post('users', 'UserController@store')->name('users.store');
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');

Route::resource('pages', 'PageController');

Route::post('post', 'PostController@store')->name('posts.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('eloquent', function () {
    $posts = Post::where('id', '>=', '20')
        ->orderBy('id', 'desc')
        ->take(5)
        ->get();

    foreach ($posts as $post) {
        echo "$post->id $post->title <br/>";
    }
});

Route::get('posts', function () {
    $posts = Post::get();

    foreach ($posts as $post) {
        echo "{$post->id} <strong>{$post->user->getName}</strong> {$post->getTitle} <br/>";
    }
});

Route::get('users', function () {
    $users = User::all();

    foreach ($users as $user) {
        $posts = $user->posts;

        foreach ($posts as $post) {
            echo "{$user->id} <strong>{$post->getTitle}</strong> {$user->getName} <br/>";
        }
    }
});

Route::get('collections', function () {
    $users = User::all();

//    dd($users);
//    dd($users->contains(5)); // Valida si contiene 5 elementos
//    dd($users->except([1,2,3])); // exceptuando elementos, buscados por su llave primaria (id)
//    dd($users->only([1,4])); // unicamente aquellos que se le pasen por parametro, buscados por su llave primaria (id)
//    dd($users->find(2)); // busca por su llave primaria aquel que se le pase por parametro o por modelo si se le pasa directamente un modelo por parametro, el resultado no es una colleción, no habria necesidad de iterarlo
    dd($users->load('posts')); // trae la colleción con su relación que se pàse por parametro (el nombre de la relación que se le pasa por parametro debe de coincidir con el método que se agrego en el modelo para la relación)

});

Route::get('serialization', function () {
    $users = User::all();

//    dd($users->toArray()); // trae la información en array unicamente con los datos de la BD
    $user = $users->find(2);
    dd($user ? $user->toJson() : '');
});
