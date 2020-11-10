<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MYSQLIDB;

class Forum extends Model
{
  private $dbh;
  private $user;
  use HasFactory;
  public function __construct(){
    $this->dbh = new MYSQLIDB;
  }
  public function getPost($postID){
    $params[] = $postID;
    $sql = "SELECT * FROM forum_post WHERE PostID = ?";
    $this->dbh->run($sql, 'i', $params);
    return $this->dbh->single();
  }
  public function getComments($postID){
    $sql = "SELECT * FROM forum_comment
    WHERE ParentCommentID = '0' AND PostID = ?
    ORDER BY CommentID DESC
    ";
    $this->dbh->run($sql, "i", $params=[$postID]);
    $result = $this->dbh->resultSet();
    return $result;
  }
  public function getReplyComments($parent_id = 0, $marginleft = 0){
    $sql = "SELECT * FROM forum_comment WHERE ParentCommentID = '".$parent_id."'";
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
       <div class="panel-heading">By <b>'.$row["Username"].'</b> on <i>'.$row["PostTime"].'</i></div>
       <div class="panel-body">'.$row["Content"].'</div>
       <div class="panel-footer" align="right"><button type="button" class="btn2 btn-default reply" id="'.$row["CommentID"].'">Reply</button></div>
      </div>
      ';
      $output .= $this->getReplyComments($row["CommentID"], $marginleft);
     }
    }
    return $output;
  }
  public function addComment($parent_cmt_id, $comment, $comment_sender_name, $postID){
    $sql = "INSERT INTO forum_comment (ParentCommentID,Content,Username, PostID)
    VALUES (?,?,?,?)";
    $this->dbh->run($sql, "issi", $params=[$parent_cmt_id, $comment, $comment_sender_name, $postID]);
  }
  public function addPost($PostTitle, $PostAuthor, $Categories, $Type, $Public, $Content){
    $sql = "INSERT INTO forum_post (PostTitle, PostAuthor, Categories, Type, Public, PostContent)
    VALUES (?,?,?,?,?,?)";
    $this->dbh->run($sql, "ssssis", $params=[$PostTitle, $PostAuthor, $Categories, $Type, $Public, $Content]);
  }
  public function getAllPosts($search,$curPage,$categories){
    $search="%".$search."%";
    $categories="%".$categories."%";
    $index=($curPage-1)*6;
    $sql = "SELECT forum_post.PostID, PostTitle, PostAuthor, PostDate, Categories, ViewCount, COUNT(forum_comment.CommentID) AS CommentCount
            FROM forum_post LEFT JOIN forum_comment ON forum_post.PostID = forum_comment.PostID
            WHERE PostTitle LIKE ? AND Categories LIKE ?
            GROUP BY forum_post.PostID
            ORDER BY PostDate DESC
            LIMIT ?,6";
    $this->dbh->run($sql, "ssi", $params=[$search,$categories,$index]);
    return $result = $this->dbh->resultSet();
  }
  public function getMaxPage($search,$categories){
    $search="%".$search."%";
    $categories="%".$categories."%";
    $sql = "SELECT Count(PostID) as Count
            FROM forum_post
            WHERE PostTitle LIKE ? AND Categories LIKE ?";
    $this->dbh->run($sql, "ss", $params=[$search,$categories]);
    $result = $this->dbh->single();
    return $result['Count']%6==0?(int)($result['Count']/6):(int)($result['Count']/6) + 1;
  }
public function getCategories(){
  $sql = "SELECT Categories, COUNT(Categories) as Num FROM forum_post GROUP BY Categories ORDER BY Num DESC";
  $this->dbh->run($sql, "", $params=[]);
  return $result = $this->dbh->resultSet();
}
public function addView($postID){
  $sql="UPDATE forum_post SET ViewCount=ViewCount+1 WHERE PostID=?";
  $this->dbh->run($sql, "i", $params=[$postID]);
  return 1;
}
}
