<?php

use App\Models\Article;
use App\Models\TypeArticle;
use App\Http\Livewire\TypeApt;
use App\Http\Livewire\Utilisateurs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


// Route::get('/articles', function () {
//     return Article::with("type")->paginate(5);
// });

// Route::get('/types', function () {
//     return TypeArticle::with("articles")->paginate(5);
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Le groupe des routes relatives aux administrateurs uniquement
Route::group([
    "middleware" => ["auth", "auth.admin"],
    'as' => 'admin.'
], function(){

    // Appartements
    Route::group([
        "prefix" => "appartements",
        'as' => 'appartements.'
    ], function(){

        Route::get("/utilisateurs", Utilisateurs::class)->name("users.index");
        //Route::get("/rolesetpermissions", [UserController::class, "index"])->name("rolespermissions.index");

    });

});


// Route::get('/appartements/utilisateurs', [App\Http\Controllers\UserController::class, 'index'])
//     ->name('utilisateurs')
//     ->middleware("auth.admin");
