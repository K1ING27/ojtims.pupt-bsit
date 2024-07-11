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
use App\Models\UploadedFile;
use Illuminate\Http\Request;
use App\Models\Announcements;
use App\Models\OJTInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


use Symfony\Component\HttpKernel\Attribute\Cache;


class AuthController extends Controller
{   
    public function studentShow()
    {
        return view('auth.studentLogin');
       
    }
    
    public function facultyShow(){
        return view('auth.login');
    }
    public function roleSelect(){
        return view('auth.roleSelect');
    }

    /*public function login(){
        return view("auth.login");
    }*/

    public function registration(){
        $data=Professor::all();
        $course=Courses::all();
        $schedules = Schedule::with('subject')->get();

    return view('auth.registration', compact('data','course','schedules'));
        
    }
   

    
    public function registerUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'studentNum' => 'required',
            'password' => 'required|min:8|max:12',
            'course' => 'required',
            'year_and_section' => 'required',
            'adviser_name' => 'required'
        ]);
    
        // Fetch the professor based on the adviser name
        $professor = Professor::where('full_name', $request->adviser_name)->first();
        if (!$professor) {
            return back()->with('fail', 'Professor not found.');
        }
    
        $user = new User();
        $student = new OJTInformation();
        $studentE = new Student();
    
        // Set user data
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->studentNum = $request->studentNum;
        $user->course = $request->course;
        $user->year_and_section = $request->year_and_section;
        $user->adviser_name = $request->adviser_name;
        $user->password = Hash::make($request->password);
        $user->full_name = $user->first_name . ' ' . $user->last_name;
        $user->adviser_email = $professor->email;
    
        // Set OJT information
        $student->studentNum = $user->studentNum;
    
        // Set student information
        $studentE->first_name = $user->first_name;
        $studentE->last_name = $user->last_name;
        $studentE->email = $user->email;
        $studentE->studentNum = $user->studentNum;
        $studentE->course = $user->course;
        $studentE->year_and_section = $user->year_and_section;
        $studentE->adviser_name = $user->adviser_name;
        $studentE->full_name = $user->full_name;
        $studentE->adiver_email = $professor->email; // Set adviser email
    
        // Save data to the database
        $res = $user->save();
        $student->save();
        $studentE->save();
    
        if ($res) {
            return redirect()->route('studentlogin')->with('success', 'You have registered successfully!');
        } else {
            return back()->with('fail', 'Oh no! Something went wrong.');
        }
    }
    


    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $user = User::where('email', '=', $request->email)->first();
    
        if ($user) {
            if ($user->role == 0) {
                return back()->with('fail', 'Students are not allowed to login through this portal.');
            }
    
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                $request->session()->put('role', $user->role);
    
                switch ($user->role) {
                    case 2:
                        return redirect()->route('professor_home');
                    case 1:
                        return redirect()->route('dashboard');
                    default:
                        return redirect('/supervisor/home');
                }
            } else {
                return back()->with('fail', 'Password does not match.');
            }
        } else {
            return back()->with('fail', 'Email is not registered.');
        }
    }
    


    public function studentUser(Request $request)
    {
        $request->validate([
            'studentNum' => 'required',
            'password' => 'required'
        ]);
    
        $user = User::where('studentNum', '=', $request->studentNum)->first();
    
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if ($user->role == 0) {
                    $request->session()->put('loginId', $user->id);
                    $request->session()->put('role', $user->role);
                    return redirect()->route('student.home');
                } else {
                    return back()->with('fail', 'This account is not a student account.');
                }
            } else {
                return back()->with('fail', 'Password does not match.');
            }
        } else {
            return back()->with('fail', 'Student Number is not registered.');
        }
    
        return view('auth.studentLogin');
    }

    public function dashboard(){

            $sixMonthsAgo = Carbon::now()->subMonths(6);
            $roleCount = User::where('role', 0)
            ->where('created_at', '>=', $sixMonthsAgo)
            ->count();
            $roleCountP = User::where('role', 2)
            ->where('created_at', '>=', $sixMonthsAgo)
            ->where('created_at', '>=', $sixMonthsAgo)->count();
            
            $data=array();
                if(Session::has('loginId')){

                    $data=User::where('id','=', Session::get('loginId'))->first();
                      

                            $userName=$data->full_name;
                            $fileCount = UploadedFile::where('uploader_name', $userName)->count();
        
            return view('ojtCoordinator.dashboard', compact('data','roleCount','roleCountP','fileCount'));
        }
        return redirect()->route('facultylogin');
        
    }

  
        
    public function logout(Request $request){
        // Clear all session data
        Session::flush();
    
        // Regenerate CSRF token
        $request->session()->regenerateToken();
        
        // Set headers to prevent back navigation
        return redirect()->route('studentlogin');
    }
    
    public function logoutF(Request $request){
         // Clear all session data
         Session::flush();
    
    
         // Regenerate CSRF token to avoid CSRF attacks
         $request->session()->regenerateToken();
     
         // Redirect to the faculty login page
         return redirect()->route('facultylogin');
    }


    public function professorTab()
        {
            $user = [];
        
            if (Session::has('loginId')) {
                $user = User::where('id', Session::get('loginId'))->first();
           
            $course= Courses::all();
        
            $data = Professor::with('subjects')->get();

            $usersP = User::whereIn('email', $data->pluck('email'))->get();

        
            // Transform the subjects data
            $subjectData = $data->flatMap(function ($professor) {
                return $professor->subjects->map(function ($subject) {
                    return [
                        'subject_code' => $subject->code,
                        'subject_description' => $subject->description,
                    ];
                });
            })->toArray();
        
            return view('ojtCoordinator.professorTab', compact('data', 'user', 'subjectData','usersP',"course"));
            }
            return redirect()->route('facultylogin');
        }

    public function professorCreate(Request $request){



        $request->validate([
            
            'email'=>'required|email|unique:users,email',
            

    ]);

    $startYear = $request->academic_year_start;
    $endYear = $request->academic_year_end;

    $schoolYear = $startYear . '-' . $endYear;
    $temporaryPassword = Str::random(8);
    $user =new User();
    $subj =new Subject();
    $professor =new Professor();
    $professor->email = $request->email;

    
    $user->email = $request->email;
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->full_name = $user->first_name . ' ' . $user->last_name;
    $professor->full_name = $user->first_name . ' ' . $user->last_name;
    $subj->subject_code = $request->subject_code;
    $subj->subject_description = $request->subject_description;
    $user->password = Hash::make($temporaryPassword);
    $user->role = 2;
    $user->adviser_email = $request->email;

    $room =new Classes();
    $room->room = $request->room;
    $room->course = $request->course;
    $room->adviser_name = $user->full_name;
    $room->email = $user->email;

    $sched =new Schedule();
    $sched->subject_code = $subj->subject_code;
    $sched->course = $room->course;
    $sched->academic_year = $schoolYear;
    $sched->semester = $request->semester;
   // Retrieve schedule days and time slots from the form
    $scheduleDays = isset($_POST['schedule_day']) ? $_POST['schedule_day'] : [];
    $timeSlots = isset($_POST['time_slots']) ? $_POST['time_slots'] : 1;

    // Prepare an array to store schedule day and time data
    $scheduleData = [];

    // Iterate over each selected schedule day
    foreach ($scheduleDays as $day) {
        // Retrieve the corresponding start and end time inputs based on the number of time slots
        for ($i = 1; $i <= $timeSlots; $i++) {
            $startTimeKey = $day . '_start_time_' . $i;
            $endTimeKey = $day . '_end_time_' . $i;

            $startTime = isset($_POST[$startTimeKey]) ? $_POST[$startTimeKey] : '';
            $endTime = isset($_POST[$endTimeKey]) ? $_POST[$endTimeKey] : '';

            // Create an array for each schedule day containing its day and time data
            $scheduleData[] = [
                'day' => $day,
                'start_time' => $startTime,
                'end_time' => $endTime
            ];
        }
    }

    // Serialize the schedule data into JSON format
    $scheduleJson = json_encode($scheduleData);

    // Save the serialized JSON data into the database field
    $sched->schedule_day = $scheduleJson;
        $sched->schedule_time = $request->schedule_time;


        Mail::to($user->email)->send(new TemporaryPasswordNotification($temporaryPassword));
        
    
        $subj->save();
        $professor->save();
        $room->save();
        $res = $user->save();
        $sched->save();

    

        if($res){
            $subj->professors()->attach($professor->id);
            return back()->with('success','You have registered successfully!');
        }
        else{
            return back()->with('fail','Oh no! Something went wrong.');
        }
        }
    
        public function student_home()
        {
            $user = [];
        
            if (Session::has('loginId')) {
                $user = User::where('id', Session::get('loginId'))->first();
        
                $fileCount = UploadedFile::where(function ($query) use ($user) {
                    $query->where('uploader_name', 'Gina Dela Cruz')
                          ->orWhere('uploader_name', $user->adviser_name);
                })->count();
        
                // Get the current year
                $currentYear = now()->year;
        
                // Retrieve the selected company or companies
                $companies = Company::all(); // Get all companies
        
                $stu = Student::all();
        
                // Filter companies based on the start year of "school_year"
                $companies = $companies->filter(function ($company) use ($currentYear) {
                    // Extract the start year from the "school_year" format
                    list($startYear, $endYear) = explode('-', $company->school_year);
        
                    // Convert them to integers
                    $startYear = (int) $startYear;
                    $endYear = (int) $endYear;
        
                    return $currentYear >= $startYear && $currentYear <= $startYear + 3;
                });
        
                $companyNames = $companies->pluck('company_name')->toArray();
        
                return response()
                    ->view('students.student_home', compact('companies', 'user', 'fileCount'))
                    ->withHeaders([
                        'Cache-Control' => 'no-cache, no-store, must-revalidate', // HTTP 1.1.
                        'Pragma' => 'no-cache', // HTTP 1.0.
                        'Expires' => '0', // Proxies.
                        
                    ]);
            }
        
            // Handle the case where Session::has('loginId') is false (user not logged in)
            return redirect()->route('studentlogin'); // Redirect to the login page or handle accordingly
        }
    public function professor_home(){

        $data = [];
        $userName = ''; // Initialize with an empty string
        $sixMonthsAgo = Carbon::now()->subMonths(6);
        
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
            $userName = $data->full_name;
  
        $roleCount = User::where('role', 0)
        ->where(function ($query) use ($userName) {
            $query->where('adviser_name', $userName)
                ->orWhere('id', Session::get('loginId')); // Include the logged-in professor in the count
        })
        ->where('created_at', '>=', $sixMonthsAgo)
        ->count();
    
        $fileCount = UploadedFile::all()->count();


        // Get the current year
        $currentYear = now()->year;
    
        // Retrieve the selected company or companies
        $companies = Company::all(); // Get all companies
    
        $stu = Student::all();
    
        // Filter companies based on the start year of "school_year"
        $companies = $companies->filter(function ($company) use ($currentYear) {
            // Extract the start year from the "school_year" format
            list($startYear, $endYear) = explode('-', $company->school_year);
    
            // Convert them to integers
            $startYear = (int) $startYear;
            $endYear = (int) $endYear;
    
          
            return $currentYear >= $startYear && $currentYear <= $startYear + 3;
        });
    
        $companyNames = $companies->pluck('company_name')->toArray();
    
        return view('professor.home', compact('companies','data', 'roleCount', 'fileCount'));
    }
    return redirect()->route('facultylogin');
            
    }



    public function sup_home(){

        $data=array();
            if(Session::has('loginId')){

                $data=User::where('id','=', Session::get('loginId'))->first();
                        }
        return view('ojtSupervisor.sup_home', compact('data'));
   }
        

    public function supTab(){
        $user=array();
            if(Session::has('loginId')){
        
                $user=User::where('id','=', Session::get('loginId'))->first();
                        }
        $data=User::where('role', 3)->get();

    return view('professor.supTab', compact('data','user'));
    }

            public function supCreate(Request $request){



                $request->validate([
                    
                    'email'=>'required|email|unique:users,email',

            ]);

        $temporaryPassword = Str::random(8);
        $user =new User();
        $user->email = $request->email;
        $user->password = Hash::make($temporaryPassword);
        $user->role = 3;
        Mail::to($user->email)->send(new TemporaryPasswordNotification($temporaryPassword));



        $res = $user->save();

        if($res){
            return back()->with('success','You have registered successfully!');
        }
        else{
            return back()->with('fail','Oh no! Something went wrong.');
        }
        }



    public function pending(){

        $data=array();
            if(Session::has('loginId')){

                $data=User::where('id','=', Session::get('loginId'))->first();
                        }
        return view('students.pending', compact('data'));
    }

     
}
