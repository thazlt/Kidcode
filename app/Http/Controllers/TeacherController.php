<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

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
}
