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

// Route::get('0zyKuv2GaQM', [UserAuthController::class, 'login'])->name('adm.login');
// Route::get('$2y$10$KHV8', [UserAuthController::class, 'reg'])->name('adm.register');

Route::get('enPH920PH920', [UserAuthController::class, 'login'])->name('adm.login');
Route::get('029HP029HPne', [UserAuthController::class, 'reg'])->name('adm.register');

Route::post('create', [UserAuthController::class, 'create'])->name('auth.create');
Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');

Route::get('dashboard', [UserAuthController::class, 'dashboard'])->middleware('isLogged')->name('admin.dashboard');
Route::get('dashboardv', [UserAuthController::class, 'dashboardv'])->middleware('isLogged')->name('admin.dashboardv');
Route::get('logout', [UserAuthController::class, 'logout'])->name('logout');

Route::get('visitors', [UserAuthController::class, 'visitors'])->name('visitors');
Route::post('visitors', [UserAuthController::class, 'RegVist'])->name('reg_vist');

Route::get('/stud-search',[StudController::class,'search'])->name('stud.search');
Route::get('/visitors-search',[UserAuthController::class,'search'])->name('visitors.search');


