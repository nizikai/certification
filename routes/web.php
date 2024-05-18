<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrarianController;

//to display login page
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/', function () {
    return view('login');
})->name('login');

// To run login auth logic
Route::get('/catalog', [BookController::class, 'allBook'])->name('catalog');

// To run login auth logic
Route::post('/auth', [LibrarianController::class, 'login'])->name('auth');

// to display book fields
Route::get('/book-field', function () {
    return view('book-field');
})->name('book-field');

// To insert new book into database
Route::post('/addBook', [BookController::class, 'addBook'])->name('addBook');

// To edit song details
Route::get('/editBook/{id}', [BookController::class, 'editBook'])->name('editBook');

Route::get('/borrow', function () {
    return view('borrow');
})->name('borrow');

Route::get('/return', function () {
    return view('return');
})->name('return');

Route::get('/member', function () {
    return view('member');
})->name('member');

Route::get('/librarian', function () {
    return view('librarian');
})->name('librarian');