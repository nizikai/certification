<?php

namespace App\Http\Controllers;

use App\Models\Librarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PharIo\Manifest\Library;

class LibrarianController extends Controller
{
    // login
    public function login(Request $request)
    {
        // cet the email and password from the form
        $email = $request->input('emailForm');
        $password = $request->input('passwordForm');

        // check if the email is in the librarian table
        $librarian = Librarian::where('email', $email)->first();

        //check password is correct and email exist
        if ($librarian && password_verify($password, $librarian->password)) {
            //clear session first
            Session::flush();

            // set session for librarian
            Session::put('librarian_id', $librarian->id);
            Session::put('librarian_email', $librarian->email);
            Session::put('librarian_name', $librarian->name);
            return redirect()->route('catalog');
        }

        // Handle invalid login
        return redirect()->route('login')->withErrors(['Invalid credentials']);
    }

    // logout
    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
