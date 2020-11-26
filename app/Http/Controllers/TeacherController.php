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
        $this->pageModel = new Page;
    }
    public function index(Request $rq){
        $this->data['Lessons']=$this->lessonModel->getLessonsByTeacher(session()->get('username'));
        $this->data['Students']=$this->pageModel->getStudents(session()->get('userID'));
        return view('teacher/index')->with('data',$this->data);
    }
    public function deleteLesson(Request $rq){
        $this->lessonModel->deleteLesson($rq->get('lessonID'));
        return redirect()->to(URLROOT . "teacher/index");
    }
    public function editLesson(Request $rq){
        return view('teacher/editlesson')->with('data',$this->data);
    }
    public function addExercise(Request $rq){
        return view('teacher/addexercise')->with('data',$this->data);
    }
    public function editExercise(Request $rq){
        return view('teacher/editexercise')->with('data',$this->data);
    }
}
