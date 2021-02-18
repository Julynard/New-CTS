<?php

use App\Http\Controllers\StudController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/register', [StudController::class, 'index']);
Route::post('/register', [StudController::class, 'store'])->name('register');

Route::get('/shs', [StudController::class, 'shs']);
Route::post('/shs', [StudController::class, 'logs'])->name('shs');

Route::get('/jhs', [StudController::class, 'jhs']);
Route::post('/jhs', [StudController::class, 'logs'])->name('jhs');

Route::get('/elem', [StudController::class, 'elem']);
Route::post('/elem', [StudController::class, 'logs'])->name('elem');

Route::get('/col', [StudController::class, 'col']);
Route::post('/col', [StudController::class, 'logs'])->name('college');

Route::get('/admin', [StudController::class, 'admin']);
Route::post('/admin', [StudController::class, 'logs'])->name('admin');

Route::get('/clinic', [StudController::class, 'clinic']);
Route::post('/clinic', [StudController::class, 'logs'])->name('clinic');

Route::get('/purchasing', [StudController::class, 'purchasing']);
Route::post('/purchasing', [StudController::class, 'logs'])->name('purchasing');

Route::get('/gso', [StudController::class, 'gso']);
Route::post('/gso', [StudController::class, 'logs'])->name('gso');

Route::get('/maingate', [StudController::class, 'main']);
Route::post('/maingate', [StudController::class, 'logs'])->name('maingate');

Route::post('student/fetch', 'StudController@fetch')->name('student.fetch');

Route::get('login', [UserAuthController::class, 'login'])->name('adm.login');
Route::get('reg', [UserAuthController::class, 'reg'])->name('adm.register');

Route::post('create', [UserAuthController::class, 'create'])->name('auth.create');
Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');

Route::get('dashboard', [UserAuthController::class, 'dashboard'])->name('admin.dashboard');
