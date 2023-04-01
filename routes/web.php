<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();
Route::get('/', function() {
    return view('auth.login');
});

Route::middleware(['auth'])->prefix('/')->group(function() {

    Route::get('home', [HomeController::class, 'index'])->name('home');

    // Voting
    Route::get('voting/code', [VotingController::class, 'index']);
    Route::post('voting', [VotingController::class, 'voting']);
    Route::post('voting/store', [VotingController::class, 'store']);

    // Candidate
    Route::get('/candidate', [CandidateController::class, 'index']);

});
