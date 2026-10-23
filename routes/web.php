<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;


use App\Exports\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/customers/export', [
    AttendanceController::class,
    'ExportCustomers'
])->name('customers.export');

// Route::get('/customers/export', function (\Illuminate\Http\Request $request) {
//     return Excel::download(
//         new CustomersExport($request->search),
//         'customers.xlsx'
//     );
// })->name('customers.export');

Route::get('/list', [UserController::class, 'List'])->name('list');

// Route::get('/user', [UserController::class, 'index']);
// Route::get('/', [UserController::class, 'Login'])->name('login');
// Route::post('loginsubmit', [UserController::class, 'LoginSubmit'])->name('loginsubmit');
Route::get('/',              [UserController::class, 'Login'])->name('login');
Route::post('/login-submit', [UserController::class, 'LoginSubmit']);
Route::get('/update-password', [UserController::class, 'updatePassword']);



Route::get('/dashboard', [AttendanceController::class, 'Dashboard'])->name('dashboard');
Route::get('/viewcoustomer', [AttendanceController::class, 'ViewCoustomer'])->name('viewcoustomer');
Route::get('/addcoustomer', [AttendanceController::class, 'Addcoustomer'])->name('addcoustomer');

Route::post('/addcoustomer-submit', [AttendanceController::class, 'AddcoustomerSubmit'])->name('addcoustomer-submit');

Route::get('/updatecoustomer/{idupdate}', [AttendanceController::class, 'UdateCoustomer'])->name('updatecoustomer');
Route::post('/updatecoustomer-submit', [AttendanceController::class, 'UdateCoustomerSubmit'])->name('updatecoustomer-submit');


Route::delete('/deleted/{id_dele}', [AttendanceController::class, 'DeleteAtten'])->name('deleted');


