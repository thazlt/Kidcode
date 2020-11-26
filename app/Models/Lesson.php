<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MYSQLIDB;

class Lesson extends Model
{
  private $dbh;
  private $user;
  use HasFactory;

  public function __construct(){
    $this->dbh = new MYSQLIDB;
  }
  public function getLesson($id){
    $params[] = $id;
    $sql = "SELECT * FROM lesson WHERE LessonID = ?";
    $this->dbh->run($sql, 'i', $params);
    return $this->dbh->single();
  }
  public function getExercises($lessonID,$username){
    $params[] = $username;
    $params[] = $lessonID;
    $sql = "SELECT exercise.LessonID, exercise.ExerciseID, ExerciseName, ExerciseDescription, Code, Errors
            FROM `exercise`
            LEFT JOIN (SELECT * FROM progress WHERE username = ?) as progress
            ON exercise.LessonID = progress.LessonID and exercise.ExerciseID = progress.ExerciseID
            WHERE exercise.LessonID = ?
            ORDER BY exercise.LessonID, exercise.ExerciseID ASC";
    $this->dbh->run($sql, 'si', $params);
    return $this->dbh->resultSet();
  }
  public function getExercise($Lid, $Eid){
    $params[] = $Lid;
    $params[] = $Eid;
    $sql = "SELECT * FROM exercise WHERE LessonID = ? AND ExerciseID = ?";
    $this->dbh->run($sql, 'ii', $params);
    return $this->dbh->single();
  }
  public function submitExercise($Uname,$Lid, $Eid, $error, $time){
    if($time != null){
        //delete old record
        $sql = "DELETE FROM progress WHERE username = ? and  LessonID = ? and ExerciseID = ?";
        $params = [$Uname,$Lid, $Eid];
        $this->dbh->run($sql, 'sii', $params);
        //add new
        $sql = "INSERT INTO progress (username, LessonID, ExerciseID, Errors, TimeFinish) values (?,?,?,?,?)";
        $params = [$Uname,$Lid, $Eid, $error, $time];
        $this->dbh->run($sql, 'siiis', $params);
    }
  }
  public function getQuizzes($LessonID){
    $sql = "SELECT QuesNum, Question, Ans1, Ans2, Ans3, Ans4, Correct_Ans FROM quiz q join quiz_questions qq on q.QuizID = qq.QuizID WHERE LessonID = ?";
    $params = [$LessonID];
    $this->dbh->run($sql, 'i', $params);
    return $this->dbh->resultSet();
  }
  public function getComments($LessonID){
    $sql = "SELECT * FROM comment
    WHERE parent_cmt_id = '0' AND LessonID = ?
    ORDER BY comment_id DESC
    ";
    $this->dbh->run($sql, "i", $params=[$LessonID]);
    $result = $this->dbh->resultSet();
    return $result;
  }
  public function getReplyComments($parent_id = 0, $marginleft = 0){
    $sql = "SELECT * FROM comment WHERE parent_cmt_id = '".$parent_id."'";
    $this->dbh->run($sql, "", $params=[]);
    $result = $this->dbh->resultSet();
    $count = count($result);
    $output = '';
    if($parent_id == 0)
    {
     $marginleft = 0;
    }
    else
    {
     $marginleft = $marginleft + 48;
    }
    if($count > 0)
    {
     foreach($result as $row)
     {
      $output .= '
      <div class="panel panel-default" style="margin-left:'.$marginleft.'px">
       <div class="panel-heading">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
       <div class="panel-body">'.$row["comment"].'</div>
       <div class="panel-footer" align="right"><button type="button" class="btn2 btn-default reply" id="'.$row["comment_id"].'">Reply</button></div>
      </div>
      ';
      $output .= $this->getReplyComments($row["comment_id"], $marginleft);
     }
    }
    return $output;
  }
  public function addComment($parent_cmt_id, $comment, $comment_sender_name, $LessonID){
    $sql = "INSERT INTO comment (parent_cmt_id,comment,comment_sender_name, LessonID)
    VALUES (?,?,?,?)";
    $this->dbh->run($sql, "issi", $params=[$parent_cmt_id, $comment, $comment_sender_name, $LessonID]);
  }
  public function getLessonsByTeacher($teacher){
    $sql = "SELECT * FROM lesson WHERE Teacher = ?";
    $this->dbh->run($sql,"s", $params=[$teacher]);
    return $this->dbh->resultSet();
  }
  public function deleteLesson($lessonID){
    $sql = "DELETE FROM lesson WHERE LessonID = ?";
    $this->dbh->run($sql,"i", $params=[$lessonID]);
    $sql = "DELETE FROM exercise WHERE LessonID = ?";
    $this->dbh->run($sql,"i", $params=[$lessonID]);
    $sql = "DELETE FROM comment WHERE LessonID = ?";
    $this->dbh->run($sql,"i", $params=[$lessonID]);
  }
  public function addLesson($LessonName, $LessonDescription, $Teacher, $Categories, $Color){
    $sql = "INSERT INTO lesson(LessonName, LessonDescription, Teacher, Categories, color) VALUES (?,?,?,?,?)";
    $this->dbh->run($sql,"sssss", $params=[$LessonName, $LessonDescription, $Teacher, $Categories, $Color]);
  }
  public function updateLesson($LessonID, $LessonName, $LessonDescription, $Categories, $Color){
    $sql= "UPDATE lesson SET LessonName = ?, LessonDescription = ?, Categories=?, color = ? WHERE LessonID = ?";
    $this->dbh->run($sql,"ssssi", $params=[$LessonName, $LessonDescription, $Categories, $Color, $LessonID]);
  }
  public function addExercise($LessonID, $ExerciseName, $ExerciseDescription, $Code){
    $sql = "INSERT INTO exercise(LessonID, ExerciseName, ExerciseDescription, Code) VALUES (?,?,?,?)";
    return $this->dbh->run($sql,"isss", $params=[$LessonID, $ExerciseName, $ExerciseDescription, $Code]);
  }
  public function deleteExercise($LessonID,$ExerciseID){
    $sql = "DELETE FROM exercise WHERE LessonID = ? AND ExerciseID = ?";
    $this->dbh->run($sql,"ii", $params=[$LessonID,$ExerciseID]);
  }
  public function updateExercise($LessonID, $ExerciseID, $ExerciseName, $ExerciseDescription, $Code){
    $sql= "UPDATE exercise SET ExerciseName = ?, ExerciseDescription = ?, Code=? WHERE LessonID = ? AND ExerciseID = ?";
    $this->dbh->run($sql,"ssssi", $params=[$ExerciseName, $ExerciseDescription, $Code, $LessonID, $ExerciseID]);
  }
}
