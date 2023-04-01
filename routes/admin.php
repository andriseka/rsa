<?php

use App\Http\Controllers\Admin\CandidateController;
use App\Http\Controllers\Admin\CategoryUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EncryptController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\VotingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->prefix('/dashboard')->group(function() {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Add Member
    Route::prefix('/member')->group(function() {

        // category
        Route::get('/category', [CategoryUserController::class, 'index'])->name('category');

        Route::get('/', [MemberController::class, 'index'])->name('member.index');
        Route::get('/create', [MemberController::class, 'create'])->name('member.create');
        Route::post('/store', [MemberController::class, 'store'])->name('member.store');
        Route::get('/detail/{id}', [MemberController::class, 'detail'])->name('member.detail');
        Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
        Route::patch('/update/{id}', [MemberController::class, 'update'])->name('member.update');
        Route::delete('/destroy/{id}', [MemberController::class, 'destroy'])->name('member.destroy');
    });


    // Encryption
    Route::get('/encrypt', [EncryptController::class, 'index'])->name('encrypt.index');
    Route::post('/encrypt/generate', [EncryptController::class, 'generate'])->name('encrypt.generate');
    Route::delete('/encrypt/reset', [EncryptController::class, 'reset'])->name('encrypt.reset');


    Route::resource('candidate', CandidateController::class);


    Route::prefix('/voting')->group(function() {
        Route::get('/', [VotingController::class, 'index'])->name('voting.index');
        Route::get('/result', [VotingController::class, 'result'])->name('voting.result');
    });

});
