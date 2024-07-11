<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Enroll;
use App\Models\Classes;
use App\Models\Company;
use App\Models\Courses;
Use App\Mail\TemporaryPasswordNotification;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Schedule;
use App\Models\Professor;
use Illuminate\Support\Str;
use App\Models\FileCategory;
use App\Models\UploadedFile;
use Illuminate\Http\Request;
use App\Models\Announcements;
use App\Models\OJTInformation;
use App\Models\FileRequirement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage; 

class PassDocuController extends Controller
{
    public function maintainFileCategory(){

        $data = [];
        $userName = ''; // Initialize with an empty string
        $sixMonthsAgo = Carbon::now()->subMonths(6);
        
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
            $userName = $data->full_name;
       
        $files = FileCategory::where('uploadedBy', $data->full_name)->get();
    
      
        return view('professor.fileCategory', compact('data', 'userName', 'files'));
    }
        return redirect()->route('facultylogin');

            
     }


     public function fileCategory(Request $request){
        
        
        $files =new FileCategory();
        $files->fileName = $request->fileName;
        $files->uploadedBy = $request->uploadedBy;
        $res = $files->save();
        
        if($res){
            return back()->with('success','You have added the course successfully!');
        }
        else{
            return back()->with('fail','Oh no! Something went wrong.');
        }
     }
    /*public function fileCategory(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'fileName' => 'required|string|max:255',
        'priority' => 'required|string|in:high,medium,low',
        'uploadedBy' => 'required|string',
    ]);

    // Create a new FileCategory instance and set its attributes
    $files = new FileCategory();
    $files->fileName = $request->fileName;
    $files->priority = $request->priority; // Add the priority field
    $files->uploadedBy = $request->uploadedBy;

    // Save the new FileCategory instance to the database
    $res = $files->save();

    // Return a response based on whether the save was successful
    if ($res) {
        return back()->with('success', 'You have added the file category successfully!');
    } else {
        return back()->with('fail', 'Oh no! Something went wrong.');
    }
}*/

    public function removeCategory($id)
    {

        $data = FileCategory::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'File not found.');
        }
    
        $data->delete();
    
        return redirect()->back();
    }


    public function fileReq(Request $request)
    {
        $user = [];
    
        if (Session::has('loginId')) {
            $user = User::where('id', '=', Session::get('loginId'))->first();
    
            $fileCategories = FileCategory::where('uploadedBy', '=', $user->adviser_name)->get();
            $data = FileRequirement::where('uploadedBy', '=', $user->full_name)->get();
    
            return response()
                ->view('students.fileReq', compact('user', 'fileCategories', 'data'))
                ->withHeaders([
                    'Cache-Control' => 'no-cache, no-store, must-revalidate', // HTTP 1.1.
                    'Pragma' => 'no-cache', // HTTP 1.0.
                    'Expires' => '0', // Proxies.
                ]);
        }
    
        return redirect()->route('studentlogin')
            ->withHeaders([
                'Cache-Control' => 'no-cache, no-store, must-revalidate', // HTTP 1.1.
                'Pragma' => 'no-cache', // HTTP 1.0.
                'Expires' => '0', // Proxies.
            ]);
    }

public function fileReqCreate(Request $request){
   

    
    // Create a new instance of FileRequirement model
    $fileup = new FileRequirement();
    $fileup->fileName = $request->fileName; 
    $file=$request->file;
    $filename=time().'.'.$file->getClientOriginalExtension();
    $request->file->move('assets',$filename);
    $fileup->file=$filename;
    $fileup->status = 0;
    $fileup->adviser = $request->adviser;
    $fileup->uploadedBy = $request->uploadedBy;
    
    // Save the model instance
    $res = $fileup->save();

    if($res){
        return back()->with('success', 'File uploaded successfully!');
    } else {
        // If saving fails, delete the uploaded file
        Storage::delete('assets/' . $filename);
        return back()->with('fail', 'Failed to upload file.');
    }
}

public function removeFile($id)
    {

        $data = FileRequirement::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'File not found.');
        }
    
        $data->delete();
    
        return redirect()->back();
    }




    public function studentRequirements(Request $request){

        // Retrieve the value from the query parameter
        $value = $request->input('value');
        $data = [];

        $student = User::where('full_name', '=', $value)->first();
        $course=$student->course;
       
        
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
            $userName = $data->full_name;
        }
        $files=FileRequirement::where('adviser', '=',$data->full_name)
                                ->where('uploadedBy', '=', $value)
                                ->get();
        
        return view('professor.studentRequire', compact('data','files', 'value','course'));

            
            }


            public function updateApproveStatus(Request $request, $id)
            {
                // Validate the request data if needed
        
                // Find the file requirement by ID
                $fileRequirement = FileRequirement::findOrFail($id);
        
                // Update the status based on the request data
                $fileRequirement->status = 1;
                $fileRequirement->save();
        
                return back()->with('success', 'You have updated the information successfully!');
            }


            public function updateDeniedStatus(Request $request, $id)
            {
                // Validate the request data if needed
        
                // Find the file requirement by ID
                $fileRequirement = FileRequirement::findOrFail($id);
        
                // Update the status based on the request data
                $fileRequirement->status = 2;
                $fileRequirement->save();
        
                return back()->with('success', 'You have updated the information successfully!');
            }

            public function requirementsView(Request $request){

                // Retrieve the value from the query parameter
                $value = $request->input('value');
                $file = $request->input('file');
                $data = [];
               
                
                if (Session::has('loginId')) {
                    $data = User::where('id', '=', Session::get('loginId'))->first();
                    $userName = $data->full_name;
                }
                $files=FileRequirement::where('adviser', '=',$data->full_name)
                                        ->where('uploadedBy', '=', $value)
                                        ->where('fileName', '=', $file)
                                        ->get();
                
                return view('professor.requireView', compact('data','files','value','file'));
        
                    
                    }

     public function download($id)
    {
        // Find the FileRequirement by ID
        $fileRequirement = FileRequirement::findOrFail($id);

        // Get the file path
        $filePath = public_path('assets/' . $fileRequirement->file);

        // Check if the file exists
        if (file_exists($filePath)) {
            // Return the file as a download response
            return response()->download($filePath, $fileRequirement->file);
        } else {
            // File not found
            return back()->with(['error' => 'File not found.'], 404);
        }
    }

}
