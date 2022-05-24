<?php

namespace App\Http\Livewire;

use App\Models\TeacherClass;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TeacherMenu extends Component
{

    public $modalFormVisible;
    public $modelId;
    public $course_code;
    public $desc;
    public $units;

    public function read()
    {
        return TeacherClass::paginate(15);
    }


    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        TeacherClass::create($this->modelData());
        $this->modalFormVisible = false;
       
    }

     /**
     * Shows the create modal
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }

     /**
     * The data for the model mapped
     * in this component.
     *
     * @return void
     */
    public function modelData()
    {
        return [
            'course_code' => $this->course_code,
            'desc' => $this->desc,
            'units' => $this->units,
            'teacher_id' => Auth::user()->id
        ];
    }

    
    public function render()
    {
        return view('livewire.teacher-menu', [
            'data' => $this->read(),
        ]);

    }
}
