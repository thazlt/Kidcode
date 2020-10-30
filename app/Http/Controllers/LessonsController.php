<?php

namespace App\Http\Controllers;
use App\Models\Lesson;

use Illuminate\Http\Request;

class LessonsController extends Controller
{
  private $data;

public function index(Request $rq){
  //var_dump($rq->get('lessonID'));
  if(!session()->get('loggedin'))
  {
    echo "<script type='text/javascript'>alert('You are not logged in!!! Login or Register a new account to enter a lesson');</script>";
    return view('pages/index')->with('data',$this->data);
  }
  else{
    $this->lessonModel = new Lesson;
    $lessondata = $this->lessonModel->getLesson(intval($rq->get('lessonID')));
    $exercisedata = $this->lessonModel->getExercises(intval($rq->get('lessonID')));
    $this->data['Lesson'] = $lessondata;
    $this->data['Exercise'] = $exercisedata;
    $headcolor=['#7bcedc','rgb(238, 108, 75)','rgba(250, 207, 15)'];
    $this->data['headcolor'] = $headcolor[intval($rq->get('lessonID'))];
    return view('lessons/index')->with('data',$this->data);
  }
}
public function exercise(Request $rq){
  if(!session()->get('loggedin'))
  {
    echo "<script type='text/javascript'>alert('You are not logged in!!! Login or Register a new account to enter a lesson');</script>";
    return view('pages/index')->with('data',$this->data);
  }
  else{
    $this->lessonModel = new Lesson;
    $exercisedata = $this->lessonModel->getExercise($rq->get('lessonID'), $rq->get('exerciseID'));
    return view('lessons/exercise')->with('data',$exercisedata);
  }
}
public function  exercisesubmit(Request $rq){
  //var_dump($rq->get('lessonID'));
  if(!session()->get('loggedin'))
  {
    echo "<script type='text/javascript'>alert('You are not logged in!!! Login or Register a new account to enter a lesson');</script>";
    return view('pages/index')->with('data',$this->data);
  }
  else{
    $LessonID = $rq->get('lessonID');
    $ExerciseID = $rq->get('exerciseID');
    $Uname = session()->get('username');
    $error = intval($rq->get('error'));
    $time = $rq->get('time');
    $this->lessonModel = new Lesson;
    $this->lessonModel->submitExercise($Uname, $LessonID, $ExerciseID, $error, $time);
    return redirect()->to(URLROOT . "lessons/index?lessonID=" . $LessonID);
    }
  }
  public function quiz(Request $rq){
    return view('lessons/quiz')->with('data',$this->data);
  }
}
