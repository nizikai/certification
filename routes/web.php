<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowController;
use App\Models\Member;

//to display login page
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/', function () {
    return view('login');
})->name('login');

// To run login auth logic
Route::post('/auth', [LibrarianController::class, 'login'])->name('auth');

// To run login auth logic
Route::post('/logout', [LibrarianController::class, 'logout'])->name('logout');

// To run login auth logic
Route::get('/catalog', [BookController::class, 'allBook'])->name('catalog');

// to display book fields
Route::get('/new-book-field', function () {
    return view('new-book-field');
})->name('new-book-field');

// To insert new book into database
Route::post('/addBook', [BookController::class, 'addBook'])->name('addBook');

// To edit song details
Route::get('/editBook/{id}', [BookController::class, 'editBook'])->name('editBook');

// To update song details
Route::get('/updateBook/{id}', [BookController::class, 'updateBook'])->name('updateBook');

// To delete song details
Route::get('/deleteBook/{id}', [BookController::class, 'deleteBook'])->name('deleteBook');

// to display member fields
Route::get('/new-member-field', function () {
    return view('new-member-field');
})->name('new-member-field');

// To display all member
Route::get('/member', [MemberController::class, 'allMember'])->name('member');

//to add new member
Route::post('/addMember', [MemberController::class, 'addMember'])->name('addMember');

//to edit member
Route::get('/editMember/{id}', [MemberController::class, 'editMember'])->name('editMember');

// To delete member
Route::get('/deleteMember/{id}', [MemberController::class, 'deleteMember'])->name('deleteMember');

// To update member details
Route::get('/updateMember/{id}', [MemberController::class, 'updateMember'])->name('updateMember');

// To display all borrow
Route::get('/borrow', [BorrowController::class, 'availableBorrow'])->name('borrow');

// to borrow item and asign to member
Route::get('/borrowBook/{id}', [BorrowController::class, 'borrowBook'])->name('borrowBook');

// get data before creating new borrow record
Route::get('/new-borrow-field/{id}', [BorrowController::class, 'borrowData'])->name('new-borrow-field');

//to get all borrowed items
Route::get('/return', [BorrowController::class, 'allBorrow'])->name('return');

// To return borrowed item
Route::get('/returnBook/{id}', [BorrowController::class, 'returnBook'])->name('returnBook');