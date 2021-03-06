<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\TeacherClass;

class FileController extends Controller
{
    public function ImageUpload($courseCode)
    {
        $subject = TeacherClass::where("course_code", "=", $courseCode)->first();
        $files = File::select("*")->get();

    	return view('studentResources', compact('courseCode', 'subject', 'files'));	
    }

    public function ImageUploadStore(Request $request, $courseCode)
    {
    	 $request->validate([
            'fileInput' => 'required|file|mimes:pdf,ppt,docx,xlsx',
        ]);
        
        // $fileCodeName = time().'.'.$request->fileInput->extension();  
        $fileName = time().'.'.$request->fileInput->getClientOriginalName();  
        $path = public_path('file_resources' . '/' . $fileName);
     
        $request->fileInput->move(public_path('file_resources'), $fileName);

        File::create([
            "name" => $fileName,
            "path" => $path,
            "course_code" => $courseCode,
        ]);
        
        return back()
            ->with('success','You have successfully uploaded file.')
            ->with('path',$path);
    }
}
