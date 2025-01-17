<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Professor;
use App\Models\Courses;
use Illuminate\Support\Str;
Use App\Mail\TemporaryPasswordNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class MaintenanceController extends Controller
{

    public function maintenance(){

        $user=array();
        if(Session::has('loginId')){
    
            $user=User::where('id','=', Session::get('loginId'))->first();
                  

        $data=Courses::all();

    return view('ojtCoordinator.maintenance', compact('data','user'));
    }
        return redirect()->route('facultylogin');
    }
    public function courses(Request $request){
        
        
        $courses =new Courses();
        $courses->course = $request->course;
        $courses->acronym = $request->acronym;
        $res = $courses->save();
        
        if($res){
            return back()->with('success','You have added the course successfully!');
        }
        else{
            return back()->with('fail','Oh no! Something went wrong.');
        }
    }




    public function remove($id)
    {

        $data = Courses::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'File not found.');
        }
    
        $data->delete();
    
        return redirect()->back();
    }
    

    
}
