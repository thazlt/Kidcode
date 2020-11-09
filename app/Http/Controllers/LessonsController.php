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
    $exercisedata = $this->lessonModel->getExercises(intval($rq->get('lessonID')), session()->get('username'));
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
    $this->lessonModel = new Lesson;
    $this->data = $this->lessonModel->getQuizzes($rq->get('lessonID'));
    //var_dump($rq->get('lessonID'));
    return view('lessons/quiz')->with('data',$this->data);
  }
  public function fetch_commnent(Request $rq){
    $this->lessonModel = new Lesson;
    $result = $this->lessonModel->getComments($rq->get('lessonID'));
    $output = '';
    foreach($result as $row)
    {
     $output .= '
     <div class="panel panel-default">
      <div class="panel-heading">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
      <div class="panel-body">'.$row["comment"].'</div>
      <div class="panel-footer" align="right"><button type="button" class="btn2 btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
     </div>
     ';
     $this->lessonModel2 = new Lesson;
     $output .= $this->lessonModel2->getReplyComments($row["comment_id"]);
    }

    echo $output;
  }
  public function add_comment(){
    $error ='';
    $comment_name = '';
    $comment_content='';
    if(empty($_POST["comment_name"]))
    {
      $error .= '<p class="text-danger">
      Name is required
      </p>';
    } else {
      $comment_name = $_POST["comment_name"];
    }

    if(empty($_POST["comment_content"])){
      $error .= '<p class="text-danger">
      Comment is required
      </p>';
    } else {
      $comment_content = $_POST["comment_content"];
    }

    if($error == ''){
      $this->lessonModel = new Lesson;
      $this->lessonModel->addComment($_POST["comment_id"],$comment_content,$comment_name,$_POST["lessonID"]);
      $error = '<label class="text-success">Comment Added</label>';
    }

    $data = array (
      'error' => $error
    );
    echo json_encode($data);
  }
}
