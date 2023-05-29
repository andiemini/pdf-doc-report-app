<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientsController;

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

//Routes for patients
//Route::get('/patients', [PatientsController::class, 'index']);
//Route::get('/patients/create', [PatientsController::class, 'create']);
//Route::get('/patients/', [PatientsController::class, 'store']);
Route::resource('patients', PatientsController::class);
//Route::resource('patients', 'PatientsController');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/download-pdf/{id}', [PatientsController::class, 'downloadPDF']);
