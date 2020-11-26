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
    public function addLesson(Request $rq){
        $LessonName = $rq->input('LessonName');
        $LessonDescription = $rq->input('LessonDescription');
        $Teacher = $rq->input('Teacher');
        $Categories = $rq->input('Categories');
        $Color = $rq->input('Color');
        $this->lessonModel->addLesson($LessonName, $LessonDescription, $Teacher, $Categories, $Color);
        return redirect()->to(URLROOT . "teacher/index");
    }
    public function deleteLesson(Request $rq){
        $this->lessonModel->deleteLesson($rq->get('lessonID'));
        return redirect()->to(URLROOT . "teacher/index");
    }
    public function editLesson(Request $rq){
        return view('teacher/editlesson')->with('data',$this->data);
    }
    public function addExercise(Request $rq){
        $this->data['LessonID'] = $rq->get('lessonID');
        return view('teacher/addexercise')->with('data',$this->data);
    }
    public function deleteExercise(Request $rq){
        $LessonID=$rq->get('lessonID');
        $ExerciseID=$rq->get('exerciseID');
        $this->lessonModel->deleteExercise($LessonID, $ExerciseID);
        return redirect()->to(URLROOT . "lessons/index?lessonID=$LessonID");
    }
    public function editExercise(Request $rq){
        return view('teacher/editexercise')->with('data',$this->data);
    }
    public function commitAddExercise(Request $rq){
        $LessonID = $rq->input('LessonID');
        $ExerciseName = $rq->input('ExerciseName');
        $ExerciseDescription = $rq->input('ExerciseDescription');
        $Code = $rq->input('Code');
        $this->lessonModel->addExercise($LessonID, $ExerciseName, $ExerciseDescription, $Code);
        return redirect()->to(URLROOT . "teacher/index");
    }
}
