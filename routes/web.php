<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ActivityController;

use App\Models\Activity;
use Carbon\Carbon;

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

Route::get('/test', function () {
    return view('dashboard.dashboard');
});

Route::get('/', [CustomAuthController::class, 'index'])->name('index');
Route::post('/login', [CustomAuthController::class, 'login'])->name('login');

Route::get('/registeration', [CustomAuthController::class, 'register'])->name('register');
Route::post('/registeration/create', [CustomAuthController::class, 'registeration'])->name('registeration');
Route::post('/upgrade/premium/{id}', [CustomAuthController::class, 'premium'])->name('premium');

Route::get('/signOut', [CustomAuthController::class, 'signOut'])->name('signOut');


Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');

Route::get('/createtdl', [ActivityController::class, 'createtdl'])->name('createtdl')->middleware('free');
Route::post('/savetdl', [ActivityController::class, 'savetdl'])->name('savetdl')->middleware('free');

Route::get('edit/{id}', [ActivityController::class, 'edit'])->name('edit.view');
Route::post('/update/{id}', [ActivityController::class, 'update'])->name('update');

Route::get('/delete/{id}', [ActivityController::class, 'delete'])->name('delete');

Route::get('/upgrade', [ActivityController::class, 'upgrade'])->name('upgrade');


// Route::get('/cmd', function () {
//     $activity = Activity::where('reminder', 1)->where('date', Carbon::now()->format('Y-m-d'))->get();

//     foreach($activity as $act){
//         $this->dispatch(new SendNotificationMail($act->user->email));
//     }
//     // dd($activity);
// });

Route::get('/cmd', [ActivityController::class, 'cmd'])->name('cmd');

