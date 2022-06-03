<?php

namespace App\Http\Livewire;
use App\Models\has_class_students;
use App\Models\TeacherClass;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class StudentMenu extends Component
{
    public function render()
    {   
        $enrolled_students = [];
        $student_ids = Auth::user()->id;
        $raw_students = has_class_students::where("student_id", "=", $student_ids)->get();
        
        foreach($raw_students as $student) {
            $subject_codes = json_decode($student->subject_codes);
            
            foreach($subject_codes as $subCode) {
                array_push($enrolled_students, $subCode);
            }
        }
        
        $num_classes = TeacherClass::whereIn("course_code", $enrolled_students)->get();
        $classes = [];

        if(count($num_classes) > 0) {
            $classes =  DB::table('teacher_classes')
                ->leftJoin('users', 'teacher_classes.teacher_id', '=', 'users.id')
                ->select("teacher_classes.class_id", 'teacher_classes.desc', 'users.name', 'teacher_classes.course_code')
                ->get();
        }
        
        return view('livewire.student-menu', compact('classes', 'student_ids', 'classes'));
    }
}
