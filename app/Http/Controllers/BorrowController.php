<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Books;
use App\Models\Members;

class BorrowController extends Controller
{
    //to show all books avaible to borrow
    public function availableBorrow()
    {
        $items = Books::where('deleted', 0)
            ->where('stock', '>=', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('borrow')->with('items', $items);
    }

    //to get data needed to borrow books
    public function borrowData($id)
    {
        $registeredMembers = Members::where('deleted', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        $book = Books::where('deleted', 0)
            ->where('id', $id)
            ->where('stock', '>=', 1)
            ->firstOrFail();

        return view('new-borrow-field', [
            'registeredMembers' => $registeredMembers,
            'book' => $book,
        ]);
    }

    //to borrow books
    public function borrowBook(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'member_id' => 'required',
            'phoneForm' => 'required|numeric',
            // Add more validation rules if needed
        ]);

        // Retrieve the book information
        $book = Books::findOrFail($id);

        $librarianId = session('librarian_id');

        // Create a new Borrow 
        $borrow = new Borrow();
        $borrow->librarian_id = $librarianId;
        $borrow->book_id = $book->id;
        $borrow->member_id = $validatedData['member_id'];
        $borrow->borrow = now();
        $borrow->due = now()->addDays(7);
        $borrow->return = null;

        $borrow->save();

        $book->stock -= 1;
        $book->save();

        return redirect()->route('borrow')->with('borrowed', 'Book borrowed successfully.');
    }

    //to get all books borrowed
    public function allBorrow()
    {
        $items = Borrow::with(['book:id,ISBN,title,author', 'member:id,name,phone'])
            ->where('deleted', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        // dump($items);
        return view('return')->with('items', $items);
    }

    //to return books
    public function returnBook(Request $request, $id)
    {
        // get the borrow record by its ID
        $borrow = Borrow::findOrFail($id);

        // update the return date
        $borrow->return = now();
        $borrow->save();

        // get the book id
        $book = Books::findOrFail($borrow->book_id);

        // increase the stock count
        $book->stock += 1;
        $book->save();

        return redirect()->route('return')->with('returned', 'Book returned successfully.');
    }
}
