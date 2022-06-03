<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TeacherClass;
use App\Models\File;
use App\Models\has_class_students;
use App\Mail\studentEmail;
use Illuminate\Support\Facades\Auth;
use Mail;
  

class StudentController extends Controller
{

    public function index(Request $request, $courseCode)
    {
        $users = User::where("userType", "=", "Student")
                        ->paginate(10);

        $subject = TeacherClass::where("course_code", "=", $courseCode)->first();

        return view('students', compact('users', 'courseCode', 'subject'));
    }

    public function enrolledStudentView(Request $request, $courseCode)
    {
        $subjectWew = TeacherClass::where("course_code", "=", $courseCode)->first();
        $students = has_class_students::select("*")->get();
    
        return view('enrolledStudent', compact('courseCode', 'subjectWew', 'students'));
    }

    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendEmail(Request $request)
    {
        $users = User::whereIn("id", $request->ids)->get();
        $course_code = $request->input('course_code');
  
        foreach ($users as $key => $user) {
            Mail::to($user->email)->send(new studentEmail($user, $course_code));
        }
  
        return response()->json(['success'=>'Send email successfully.']);
    }


    public function viewInvitation($id, $name, $email, $course_code)
    {
        return view('acceptInvitation', compact('id', 'name', 'email', 'course_code'));
    }


    public function acceptInvitation(Request $request)
    {
        $student_exist = has_class_students::where("subject_codes", "=", $request->course_code)->get();

        if($student_exist->isEmpty()) {
 
            has_class_students::create([
                "name" => $request->name,
                "email" => $request->email,
                "student_id" => $request->id,
                "subject_codes" => json_encode($request->course_code),
            ]);

            return response()->json(['accepted'=>'Invitation Accepted.']);
           
            
        } else {
    
            return response()->json(['accepted'=>'Student Already exist!']);
        }

    }

    
    public function viewStudentRes($courseCode)
    {
        $courseName = TeacherClass::where("course_code", "=", $courseCode)->first();
        $resources = File::where("course_code", "=", $courseCode)->get();
        return view('student-res', compact('resources', 'courseCode', 'courseName'));
    }


    
    

}
