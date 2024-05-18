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
        dump($book);
        return view('book-field', compact('book'));
    }
}
