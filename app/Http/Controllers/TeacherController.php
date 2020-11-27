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
        $LessonID=$rq->get('lessonID');
        $this->data['Lesson'] = $this->lessonModel->getLesson($LessonID);
        return view('teacher/editlesson')->with('data',$this->data);
    }
    public function commitEditLesson(Request $rq){
        $LessonID = $rq->input('LessonID');
        $LessonName = $rq->input('LessonName');
        $LessonDescription = $rq->input('LessonDescription');
        $Color = $rq->input('Color');
        $Categories = $rq->input('Categories');
        $this->lessonModel->updateLesson($LessonID, $LessonName, $LessonDescription, $Categories, $Color);
        return redirect()->to(URLROOT . "lessons/index?lessonID=$LessonID");
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
        $LessonID=$rq->get('lessonID');
        $ExerciseID=$rq->get('exerciseID');
        $this->data['Exercise']=$this->lessonModel->getExercise($LessonID, $ExerciseID);
        return view('teacher/editexercise')->with('data',$this->data);
    }
    public function commitAddExercise(Request $rq){
        $LessonID = $rq->input('LessonID');
        $ExerciseName = $rq->input('ExerciseName');
        $ExerciseDescription = $rq->input('ExerciseDescription');
        $Code = $rq->input('Code');
        $this->lessonModel->addExercise($LessonID, $ExerciseName, $ExerciseDescription, $Code);
        return redirect()->to(URLROOT . "lessons/index?lessonID=$LessonID");
    }
    public function commitEditExercise(Request $rq){
        $LessonID = $rq->input('LessonID');
        $ExerciseID = $rq->input('ExerciseID');
        $ExerciseName = $rq->input('ExerciseName');
        $ExerciseDescription = $rq->input('ExerciseDescription');
        $Code = $rq->input('Code');
        $this->lessonModel->updateExercise($LessonID, $ExerciseID, $ExerciseName, $ExerciseDescription, $Code);
        return redirect()->to(URLROOT . "lessons/index?lessonID=$LessonID");
    }
    public function addStudent(Request $rq){
        $TeacherID = $rq->input('TeacherID');
        $StudentID = $rq->input('StudentID');
        $this->lessonModel->addStudent($TeacherID,$StudentID);
        return redirect()->to(URLROOT . "teacher/index");
    }
}
