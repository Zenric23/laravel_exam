<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    
    public function subjectList(Request $request)
    {
        $id = $request->input('id');
        echo $id;
    }

    public function urlFetch($key)
    {
        echo $key;
    }

}
