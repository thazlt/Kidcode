<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MYSQLIDB;

class Page extends Model
{
    use HasFactory;

    private $dbh;
    private $user;

  public function __construct() {
    $this->dbh = new MYSQLIDB;
  }

  //Register user
  public function register($data){
    $params[] = $data['username'];
    $params[] = $data['password'];
    $params[] = $data['email'];
    $params[] = $data['usertype'];
    $sql = "INSERT INTO userinfo (USERNAME, H_PASSWORD, EMAIL,U_TYPE) VALUES (?,?,?,?)";
    return $this->dbh->run($sql, "sssi", $params);
  }

  public function findUserByName($name) {
    $params[] = $name;
    $sql = "SELECT * FROM userinfo WHERE USERNAME = ?";
    $this->dbh->run($sql, 's', $params);
    $this->user = $this->dbh->single();
    if($this->dbh->countRows() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function getUserByName($name) {
    $params[] = $name;
    $sql = "SELECT * FROM userinfo WHERE USERNAME = ?";
    $this->dbh->run($sql, 's', $params);
    return $this->dbh->single();
  }
  public function getLessonsComByName($name) {
    $params[] = $name;
    $sql = "SELECT LessonID, COUNT(ExerciseID) FROM progress WHERE username = ? GROUP BY LessonID HAVING COUNT(ExerciseID) = (SELECT ExerciseNum FROM lesson where      progress.LessonID=lesson.LessonID)";
    $this->dbh->run($sql, 's', $params);
    return $this->dbh->countRows();
  }
  public function getExercisesComByName($name) {
    $params[] = $name;
    $sql = "SELECT COUNT(ExerciseID) as num FROM progress where username=?";
    $this->dbh->run($sql, 's', $params);
    return $this->dbh->single();
  }
  public function getProgressByName($name) {
    $params[] = $name;
    $sql = "SELECT l.LessonName, e.ExerciseName, 100-p.Errors as points , p.TimeFinish, p.date as date FROM progress p join lesson l on p.LessonID = l.LessonID join exercise e on p.ExerciseID = e.ExerciseID and l.LessonID = e.LessonID where p.username=? ORDER BY date DESC";
    $this->dbh->run($sql, 's', $params);
    return $this->dbh->resultSet();
  }
  public function getPassword() {
    return $this->user['H_PASSWORD'];
  }
  public function getUsername() {
    return $this->user['USERNAME'];
  }
  public function getEMAIL() {
    return $this->user['EMAIL'];
  }

  public function getUserType() {
    return $this->user['U_Type'];
  }
  public function getUserID() {
    return $this->user['UserID'];
  }
  public function getLessons($username, $page){
    $page--;
    $index=($page!==null)?$page*3:0;
    $sql = "SELECT lesson.*, COUNT(ExerciseID)/lesson.ExerciseNum*100 as Progress
        FROM lesson
        LEFT JOIN (SELECT * FROM progress WHERE progress.username=?) as progress on lesson.LessonID=progress.LessonID
        GROUP BY LessonID
        LIMIT ?,3";
    $this->dbh->run($sql, "si", $params=[$username,$index]);
    $result = $this->dbh->resultSet();
    return $result;
  }
  public function getMaxPage(){
    $sql = "SELECT Count(LessonID) as Count
            FROM lesson";
    $this->dbh->run($sql, "", $params=[]);
    $result = $this->dbh->single();
    return $result['Count']%3==0?(int)($result['Count']/3):(int)($result['Count']/3) + 1;
  }
  public function getStudents($teacher){
    $sql = "SELECT UserID, USERNAME, EMAIL FROM teacher_student JOIN userinfo ON teacher_student.StudentID = userinfo.UserID WHERE TeacherID = ?";
    $this->dbh->run($sql, "i", $params=[$teacher]);
    $result = $this->dbh->resultSet();
    return $result;
  }
}
