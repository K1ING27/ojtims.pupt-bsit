<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Professor;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class AccountInfo extends Controller
{
    public function accountinfo()
    {
        $data = array();
        if (Session::has('loginId')) {

            $data = User::where('id', '=', Session::get('loginId'))->first();
       

        return view('ojtCoordinator.accountinfo', compact('data'));
        }
        return redirect()->route('facultylogin');
    }

    public function edit(Request $request, $email)
{
    // Find the user and professor by email
    $user = User::where('email', $email)->first();
    $professor = Professor::where('email', $email)->first();

    // Check if user and professor exist
    if (!$user || !$professor) {
        return back()->with('error', 'User or Professor not found.');
    }

    // Update user data
    $user->first_name = $request->first_name;
    $user->middle_name = $request->middle_name;
    $user->last_name = $request->last_name;
    $user->full_name = $user->first_name . ' ' . $user->last_name;
    $user->suffix = $request->suffix;
    $user->address = $request->address;
    $user->contact_number = $request->contact_number;
    $user->date_of_birth = $request->date_of_birth;
    $user->course = $request->course;
    $user->year_and_section = $request->year_and_section;
    $user->studentNum = $request->studentNum;
    $user->email = $request->email;

    // Update professor data
    $professor->full_name = $user->full_name;

    // Find related student and classes
    $students = Student::where('adiver_email', $email)->get();
    $classes = Classes::where('email', $email)->get();

    // Update each related student and class
    foreach ($students as $student) {
        $student->adviser_name = $user->full_name;
        $student->save();

        // Update adviser_name in the student's user account
        $studentUser = User::where('studentNum', $student->studentNum)->first();
        if ($studentUser) {
            $studentUser->adviser_name = $user->full_name;
            $studentUser->save();
        }
    }

    foreach ($classes as $class) {
        $class->adviser_name = $user->full_name;
        $class->save();
    }

    // Save changes to user and professor
    $user->save();
    $professor->save();

    return back()->with('success', 'You have updated the information successfully!');
}


    public function change_password(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required|min:8|max:12',
            'confirm_password' => 'required|min:8|max:12',
            'new_password' => 'required|min:8|max:12',
        ]);

        $user = User::find($id);

        // Check if the entered current password matches the one in the database
        if (Hash::check($request->current_password, $user->password)) {
            // Passwords match, proceed with updating the password
            $user->password = Hash::make($request->new_password);
            $user->save();

            // Redirect with a success message
            return back()->with('success', 'You have updated the password successfully!');
        } else {
            // Passwords do not match, show an error message
            return back()->withErrors(['current_password' => 'Current password is incorrect. Please try again.']);
        }
    }

    public function profAcc()
    {
        $data = array();
        if (Session::has('loginId')) {

            $data = User::where('id', '=', Session::get('loginId'))->first();
            return view('professor.profAcc', compact('data'));
        }

        return redirect()->route('facultylogin');
    }


    public function editojt(Request $request,$email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'User not found.');
        }
    
      
    
        // Update user data
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->full_name = $user->first_name . ' ' . $user->last_name;
        $user->suffix = $request->suffix;
        $user->address = $request->address;
        $user->contact_number = $request->contact_number;
        $user->date_of_birth = $request->date_of_birth;
        $user->course = $request->course;
        $user->year_and_section = $request->year_and_section;
        $user->studentNum = $request->studentNum;
        $user->email = $request->email;
    
        
        $user->save();
    
        return back()->with('success', 'You have updated the information successfully!');

    }
}
