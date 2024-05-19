<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BookController extends Controller
{
    public function allBook()
    {
        $registeredBooks = Books::where('deleted', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        // dump($registeredBooks);
        return view('catalog')->with('registeredBooks', $registeredBooks);
    }

    public function addBook(Request $request)
    {
        // Validate the form data 
        $validatedData = $request->validate([
            'isbnForm' => 'required|integer',
            'titleForm' => 'required',
            'authorForm' => 'required',
            'stockForm' => 'required|integer'
        ]);

        //insert into database
        $books = new Books();
        $books->ISBN = $validatedData['isbnForm'];
        $books->title = $request->input('titleForm');
        $books->author = $request->input('authorForm');
        $books->stock = $request->input('stockForm');
        $books->save();

        return redirect()->route('catalog')->with('bookAdded', 'Book added successfully');
    }

    public function editBook(Request $request, $id)
    {
        $book = Books::findOrFail($id);
        // dump($book);
        return view('book-field', compact('book'));
    }

    public function updateBook(Request $request, $id)
    {
        // Validate the form data 
        $validatedData = $request->validate([
            'isbnForm' => 'required|integer',
            'titleForm' => 'required',
            'authorForm' => 'required',
            'stockForm' => 'required|integer'
        ]);

        // Find the book by its ID
        $book = Books::findOrFail($id);

        // Update the book attributes
        $book->ISBN = $validatedData['isbnForm'];
        $book->title = $request->input('titleForm');
        $book->author = $request->input('authorForm');
        $book->stock = $request->input('stockForm');
        $book->save();

        // Redirect back to the catalog page with a success message
        return redirect()->route('catalog')->with('bookUpdated', 'Book updated successfully');
    }

    public function deleteBook(Request $request, $id)
    {
        // Find the book by its ID
        $book = Books::findOrFail($id);

        // Soft delete the book
        $book->deleted = 1;
        $book->save();

        // Redirect back to the catalog page with a success message
        return redirect()->route('catalog')->with('bookDeleted', 'Book deleted successfully');
    }    
}
