<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Carbon\Carbon;
use App\Models\User;
use App\Models\Classes;
use App\Models\Company;
Use App\Mail\TemporaryPasswordNotification;
use App\Models\Courses;
use App\Models\MOAUpload;
use App\Models\Professor;
use App\Mail\SendFileNotif;
use App\Mail\SendTempNotif;
use App\Models\CoursePerSY;
use Illuminate\Support\Str;
use App\Models\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function uploadpage()
    {
                   // Get the currently logged-in user's name
                   $user=array();
                   if(Session::has('loginId')){
           
                       $user=User::where('id','=', Session::get('loginId'))->first();
                               }
           
            $userName=$user->full_name;
        // Fetch data from the database where the uploader_name matches the currently logged-in user's name
        $data = UploadedFile::where('uploader_name', $userName)->get();

    }



    public function uploadFile(Request $request)
    {
        $user = [];
        if (Session::has('loginId')) {
            $user = User::where('id', '=', Session::get('loginId'))->first();
        }
    
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:doc,docx',  // max:10240 is the maximum file size in kilobytes (10 MB)
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Validation failed. Please upload a valid file.');
        }
    
        try {
            $data = new UploadedFile();
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets'), $filename);
            $data->file = $filename;
    
            $data->name = $request->name;
            $data->uploader_name = $user ? $user->full_name : 'Unknown';
    
            $data->save();
    
            return redirect()->back()->with('success', 'File uploaded successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'File upload failed. Please try again.');
        }
    }
    

    public function show(Request $request)
    {

                   // Get the currently logged-in user's name
                   $user=array();
                   if(Session::has('loginId')){
           
                       $user=User::where('id','=', Session::get('loginId'))->first();
                               
           
            $userName=$user->full_name;
        // Fetch data from the database where the uploader_name matches the currently logged-in user's name
        $data = UploadedFile::where('uploader_name', $userName)->get();
        return view('ojtCoordinator.upload', compact('data', 'user'));
        }
        return redirect()->route('facultylogin');
    }

    public function download(Request $request, $file)
    {   
	    return response()->download(public_path('assets/'.$file));

    }


    public function view($id)
    {

        $data=UploadedFile::find($id);

        return view('ojtCoordinator.view',compact('data'));
    }

    

    public function remove($id)
    {

        $data = UploadedFile::find($id);

        if (!$data) {
            return redirect()->back()->with('error', 'File not found.');
        }
    
        $data->delete();
    
        return redirect()->back();
    }
    
    public function search(Request $request){

        if($request->search){
            $searchFile = UploadedFile::where('name', 'LIKE', '%'.$request->search. '%')->latest()->paginate(15);
            return view('ojtCoordinator.search',compact('searchFile'));
        }

        else{
            return redirect()->back()->with('message', 'Empty Search');
            
        }
    }


    public function sendFiless(Request $request){
       
        $request->validate([
            'email' => 'required|email',
            'file_id', // Make sure the file exists in the 'moa_uploads' table
        ]);
    
        $fileId = $request->input('file_id');
        $file = UploadedFile::find($fileId);
    
        if (!$file) {
            return back()->with('error', 'File not found.');
        }
    
        $attachmentPath = public_path('assets/' . $file->file_name); // Move this line after defining $file
    
        try {
            Mail::to($request->email)->send(new SendTempNotif($attachmentPath, $file->file));
    
            return back()->with('success', 'Email sent with file attachment.');
        } catch (\Exception $e) {
            Log::error('Email sending error: ' . $e->getMessage());
            return back()->with('error', 'Email sending failed.');
        }
    
    }

    public function downloadFile($file)
{
    $fileRecord = UploadedFile::where('file', $file)->first();

    if ($fileRecord) {
        // Check if the file is still valid
        if ($fileRecord->valid_until && now()->gt($fileRecord->valid_until)) {
            // File has expired, return a response indicating that
            return response()->json(['message' => 'File has expired'], 403);
        }

        // File is valid, allow download
        $filePath = public_path('assets/' . $file);
        $headers = [
            'Content-Type' => 'application/pdf', // Adjust the content type as needed
        ];

        return response()->download(public_path('assets/' . $file));
    }

    // File not found, return a response indicating that
    return response()->json(['message' => 'File not found'], 404);
}
}
