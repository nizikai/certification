<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PharIo\Manifest\Library;

class MemberController extends Controller
{
    public function allMember()
    {
        $registeredMembers = Members::where('deleted', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        // dump($registeredBooks);
        return view('member')->with('registeredMembers', $registeredMembers);
    }

    public function addMember(Request $request)
    {
        // Validate the form data 
        $validatedData = $request->validate([
            'nameForm' => 'required',
            'phoneForm' => 'required',
        ]);

        //insert into database
        $member = new Members();
        $member->name = $validatedData['nameForm'];
        $member->phone = $request->input('phoneForm');
        $member->save();

        return redirect()->route('member')->with('memberAdded', 'Member added successfully');
    }

    public function editMember(Request $request, $id)
    {
        $member = Members::findOrFail($id);
        // dump($book);
        return view('member-field', compact('member'));
    }

    public function updateMember(Request $request, $id)
    {
        // Validate the form data 
        $validatedData = $request->validate([
            'nameForm' => 'required',
            'phoneForm' => 'required',
        ]);

        // Find the member by its ID
        $member = Members::findOrFail($id);

        // Update the member attributes
        $member->name = $validatedData['nameForm'];
        $member->phone = $validatedData['phoneForm'];
        $member->save();

        // Redirect back to the catalog page with a success message
        return redirect()->route('member')->with('memberUpdated', 'Member updated successfully');
    }

    public function deleteMember(Request $request, $id)
    {
        // Find the member by its ID
        $member = Members::findOrFail($id);

        // Soft delete the member
        $member->deleted = 1;
        $member->save();

        // Redirect back to the catalog page with a success message
        return redirect()->route('member')->with('memberDeleted', 'Member deleted successfully');
    }  
}
