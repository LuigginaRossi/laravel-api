<?php

use App\Http\Controllers\PostController as PublicPostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

//per utente loggato            //verified->controlla che l'email sia verificata
Route::middleware(['auth', 'verified'])
    ->prefix('admin') //porzione uri
    ->name('admin.')    //name rotta
    ->group(function (){
        
    Route::resource('/projects', ProjectController::class);
    Route::resource('/categories', CategoryController::class);
    //Route::resource('/types', TypeController::class);
    //php artisan make:controller Admin/TypeController --resource
    //queste iniziano tutte con nomi :admin. rotte: admin/
    // php artisan route:list
    Route::get('/contacts', [ContactController::class, "index"]);
    Route::get('/contacts/{contact}', [ContactController::class, "show"]);
});

//Utente non loggato:
// Route::get('/post', [PublicPostController::class, 'index'])->name('post.index');
// Route::get('/about', [PublicController::class, 'about'])->name('about.index');
// Route::get('/contact', [PublicController::class, 'contacts'])->name('contact.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


