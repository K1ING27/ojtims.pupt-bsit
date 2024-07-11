<?php

use App\Http\Controllers\AccountInfo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OJTController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PassDocuController;
use App\Http\Controllers\MOAUploadController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\ForgotPassController;
use App\Http\Controllers\CoursePerSYController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\PreventBackHistory;
use App\Models\Company;
use App\Models\Professor;
use App\Models\Student;
use FontLib\Table\Type\name;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.roleSelect');
});

Route::get('/',[AuthController::class,'roleSelect'])->name('role-select');
Route::get('/auth/studentlogin', [AuthController::class,'studentShow'])->name('studentlogin');
Route::get('/auth/facultylogin', [AuthController::class,'facultyShow'])->name('facultylogin');
Route::post('/auth/student-login',[AuthController::class,'studentUser'])->name('student-user');
Route::post('/login-user',[AuthController::class,'loginUser'])->name('login-user');
//Route::get('/logout',[AuthController::class, 'logout']);
Route::get('/professor/login',[AuthController::class, 'logoutF']);
Route::get('/student/login',[AuthController::class, 'logout']);

//OJTCOORDINATOR
Route::group(['middleware' =>'no.cache'], function(){
Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
Route::get('/studentLists', [StudentController::class,'StuList']);
Route::get('/professorTab', [AuthController::class,'professorTab']);
Route::get('/uploadpage', [FileController::class, 'show'])->name('uploadpage');
Route::get('/maintenance',[MaintenanceController::class,'maintenance']);
Route::get('/MOA', [CompanyController::class,'companies']);
Route::get('/reports', [ReportsController::class, 'reports'])->name('reports');
Route::get('/reportsExpired', [ReportsController::class, 'reportsExpired'])->name('reportsExpired');
Route::get('/accountinfo', [AccountInfo::class,'accountinfo']);
Route::get('/moa/view/{companyId}', [MOAUploadController::class, 'view'])->name('moa.view');
});
//PROFESSOR
Route::group(['middleware' =>'no.cache'], function(){
Route::get('/professor/home',[AuthController::class,'professor_home'])->name('professor_home');
Route::get('/professor/class', [ProfessorController::class,'class']);
Route::get('/professor/upload', [ProfessorController::class,'uploadP']);
Route::get('/reportsExpiredProf', [ReportsController::class, 'reportsExpiredProf'])->name('reportsExpiredProf');
Route::get('/professor/maintain',[PassDocuController::class,'maintainFileCategory']);
Route::get('/professor/accountinfo', [AccountInfo::class,'profAcc']);
Route::get('/professor/listStudents/{course}', [ProfessorController::class,'show']);
Route::get('/professor/classList/{course}', [ProfessorController::class,'show_list']);
Route::get('/studentrequire',[PassDocuController::class,'studentRequirements']);
});     
//STUDENT
Route::group(['middleware' => 'no.cache'], function(){
Route::get('/student/home',[AuthController::class,'student_home'])->name('student.home');
Route::get('/student/ojtinfo', [StudentController::class,'ojtInformation'])->name('ojtinfo');
Route::get('/student/class', [StudentController::class,'class']);
Route::get('/student/files', [StudentController::class,'fileSee']);
Route::get('/student/pending', [CompanyController::class,'pending']);
Route::get('/student/MOA', [CompanyController::class,'companiesup']);
Route::get('/student/requirements', [PassDocuController::class,'fileReq']);
Route::get('/student/ojtSite', [StudentController::class,'showOjtSite']);
Route::get('/student/accountinfo', [StudentController::class,'student_acc']);    
});






//Route::get('/login', [AuthController::class,'login']);
Route::get('/auth/registration', [AuthController::class,'registration'])->name('auth.registration');
Route::post('/register-user', [AuthController::class,'registerUser'])->name('register-user');
Route::get('/fetch-subject-data/{subject_code}', [ProfessorController::class, 'fetchSubjectData']);
Route::get('/fetch-professors/{semester}/{startYear}/{endYear}', [ProfessorController::class,'fetchProfessors'])->name('fetch.professors');


//Route::post('/student-login',[AuthController::class,'studentLogin'])->name('student-login');

Route::get('/reset', [ForgotPassController::class,'resetP']);
Route::get('/forgot-faculty', [ForgotPassController::class,'forgotP'])->name('auth.forgot');
Route::get('/forgot-student',[ForgotPassController::class, 'forgotSp']);
Route::post('/forgotPass', [ForgotPassController::class,'forgotPass'])->name('forgotPass');
Route::post('/reset-password', [ForgotPassController::class, 'resetPass'])->name('password.reset');




 

Route::post('/professorCreate', [AuthController::class,'professorCreate'])->name('professorCreate');
Route::put('/updateProfessor', [ProfessorController::class, 'update'])->name('updateProfessor');
Route::post('/remove/course/{id}', [MaintenanceController::class,'remove']);
Route::post('/courses', [MaintenanceController::class,'courses'])->name('courses');
Route::post('/remove/company/{id}', [CompanyController::class,'removeCompany']);

//Route::post('/apply/{companyId}', [CompanyController::class, 'apply'])->name('company.apply');


Route::match(['get', 'post'], '/OJTReports', [ReportsController::class, 'generateReport'])->name('studentojt.report.generate');
Route::post('/reports/send-email', [ReportsController::class, 'sendEmail'])->name('reports.send.email');
Route::match(['get', 'post'], '/ExpiredMOAReports', [ReportsController::class, 'generateMOAReport'])->name('reports.generate');
Route::post('/reportsExpired/send-email', [ReportsController::class, 'sendEmailExpired'])->name('reportsExpired.send.email');
Route::match(['get', 'post'], '/ExpiredMOAReportsProf', [ReportsController::class, 'generateMOAReportProf'])->name('reports.generate.prof');
Route::post('/uploadfile', [FileController::class,'uploadfile']);



Route::get('/download/{file}', [FileController::class,'download']);
Route::get('/view/{is}', [FileController::class,'view']);
Route::post('/remove/{id}', [FileController::class,'remove']);
Route::post('/remove/file/{id}', [FileController::class,'remove']);
Route::get('/search', [FileController::class,'search']);





Route::post('/companyCreate', [CompanyController::class,'companyCreate'])->name('companyCreate');
Route::post('/uploadMOA', [MOAUploadController::class,'uploadfile']);
Route::get('/moa/download/{file}', [MOAUploadController::class,'download']);
Route::post('/moa/remove/{id}', [MOAUploadController::class,'remove']);
//Route::get('/moa/view/{companyId}', [MOAUploadController::class, 'view'])->name('moa.view');
Route::post('/sendFile', [MOAUploadController::class,'sendFiles']);
Route::get('/send/download/{file}', [MOAUploadController::class, 'downloadFile'])->name('download.file');
Route::get('/print-data/{company}', [MOAUploadController::class, 'printData'])->name('print-data');
Route::post('/status/{studentNum}', [StudentController::class,'update']);
Route::post('/notify/{studentNum}', [StudentController::class, 'notify']);
Route::get('/voucher/{company}', [CompanyController::class,'voucher'])->name('voucher');

 

Route::get('/ojt-report', [OJTController::class, 'showForm'])->name('ojt.report.form');
Route::post('/ojt-report', [OJTController::class, 'generateReport'])->name('ojt.report.generate');
Route::post('/announcements', [AnnouncementController::class,'announcement']);
Route::put('/edit/{email}', [AccountInfo::class,'editojt']);
Route::put('/change_password/{id}', [AccountInfo::class,'change_password']);
// student middleware
Route::put('/student/edit/{email}', [StudentController::class,'edit']);
Route::post('/student/join/{email}', [StudentController::class,'join']);

// adding route
Route::put('/student/ojtEdit/{studentNum}', [StudentController::class,'ojt_edit'])->name('ojt.edit');
Route::post('/fetch-company-data', [CompanyController::class, 'fetchCompanyData'])->name('fetch.company.data');
Route::put('/professor/edit/{id}', [AccountInfo::class,'edit']);
Route::put('/professor/change_password/{id}', [AccountInfo::class,'change_password']);
//Route::get('/professor/listStudents/{course}', [ProfessorController::class,'show']);
Route::get('/supTab', [AuthController::class,'supTab']);
Route::post('/supCreate', [AuthController::class,'supCreate'])->name('supCreate');
Route::post('/roomCreate', [ProfessorController::class,'roomCreate'])->name('roomCreate');
//Route::get('/professor/classList/{course}', [ProfessorController::class,'show_list']);
Route::post('/professor/approve/{email}', [ProfessorController::class,'approve']);
Route::post('/professor/deny/{email}', [ProfessorController::class,'deny']);
Route::get('/allStudents', [ProfessorController::class,'allStudents']);
Route::get('/pending',[AuthController::class,'pending']);



//Passing files
Route::post('/fileCategory', [PassDocuController::class,'fileCategory']);
Route::post('/remove/files/{id}', [PassDocuController::class,'removeCategory']);
Route::post('/uploadReq', [PassDocuController::class,'fileReqCreate']);
Route::post('/remove/filesReq/{id}', [PassDocuController::class,'removeFile']);

Route::post('/update/approve/status/{id}', [PassDocuController::class, 'updateApproveStatus']);
Route::post('/update/denied/status/{id}', [PassDocuController::class, 'updateDeniedStatus']);
Route::get('/requireview',[PassDocuController::class,'requirementsView']);
Route::get('/download/req/{file}', [PassDocuController::class,'download']);


?>
