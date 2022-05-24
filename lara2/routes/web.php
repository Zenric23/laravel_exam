<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/enrolled-classes', function () {
    return view('profile.student-menu');
})->name('student-menu');


Route::get('/my-classes', function () {
    return view('profile.teacher-menu');
})->name('teacher-menu');


Route::get('/student-list', function () {
    return view('profile.student-list');
})->name('student-list');


Route::get('/add-student', function () {
    return view('profile.add-student');
})->name('add-student');


Route::get('/about', function () {
    return view('profile.about');
})->name('about');

Route::get('/code', [SubjectController::class, 'subjectList']);

Route::get('/class/{key}', [SubjectController::class, 'urlFetch']);

Route::get('/email-student', [MailController::class, 'mailer']);
Route::post('/send-mail', [MailController::class, 'sendMail'])->name('EmailStudent.send');
Route::get('/users/{courseCode}', [StudentController::class, 'index'])->name('users.index');
Route::get('/enrolledStudent/{courseCode}', [StudentController::class, 'enrolledStudentView']);

Route::post('/users-send-email', [StudentController::class, 'sendEmail'])->name('ajax.send.email');
Route::get('/invitation/{name}/{email}/{course_code}', [StudentController::class, 'viewInvitation']);
Route::post('/request-invitation', [StudentController::class, 'acceptInvitation'])->name('ajax.send.invitation');

Route::get('upload/image/{courseCode}', [FileController::class,'ImageUpload'])->name('ImageUpload');
Route::post('upload/image/store/{courseCode}', [FileController::class,'ImageUploadStore'])->name('ImageUploadStore');















