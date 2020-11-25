<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Page;

class TeacherController extends Controller
{
    private $data;
    //--------------------------
    public function __construct(){
        $this->lessonModel = new Lesson;
    }
    public function index(){
        $this->data['Lessons']=$this->lessonModel->getLessonsByTeacher(session()->get('username'));
        return view('pages/teacher')->with('data',$this->data);
    }
    public function deleteLesson(Request $rq){
        $this->lessonModel->deleteLesson($rq->get('lessonID'));
        return redirect()->to(URLROOT . "teacher/index");
    }

}
