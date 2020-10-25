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
  public function getExercises($id){
    $params[] = $id;
    $sql = "SELECT * FROM exercise WHERE LessonID = ?";
    $this->dbh->run($sql, 'i', $params);
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
}
