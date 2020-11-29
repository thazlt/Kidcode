<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;

class ForumController extends Controller
{
    private $data;
    public function index(Request $rq){
      $this->forumModel = new Forum;
      $this->data['CurPage'] = $rq->get('curpage',1);
      $this->data['Post'] = $this->forumModel->getAllPosts($rq->get('search',''), $this->data['CurPage'],$rq->get('categories',''));
      $this->data['MaxPage'] = $this->forumModel->getMaxPage($rq->get('search',''),$rq->get('categories',''));
      $this->data['Categories'] = $this->forumModel->getCategories();
      return view('forum/index')->with('data',$this->data);
    }
    public function create_post(){
      return view('forum/create_post')->with('data',$this->data);
    }
    public function post(Request $rq){
      $this->forumModel = new Forum;
      $this->forumModel->addView($rq->get('PostID'));
      $this->data['Post'] = $this->forumModel->getPost($rq->get('PostID'));
      $this->data['Comments'] = $this->forumModel->getComments($rq->get('PostID'));
      $this->data['CommentsCount'] = $this->forumModel->getCommentsCounts($rq->get('PostID'));
      $this->data['Categories'] = $this->forumModel->getCategories();
      return view('forum/post')->with('data',$this->data);
    }
    public function fetch_commnent(Request $rq){
      $this->forumModel = new Forum;
      $result = $this->forumModel->getComments($rq->get('postID'));
      $output = '';
      foreach($result as $row)
      {
       $output .= '
       <div class="panel panel-default">
        <div class="panel-heading">By <b>'.$row["Username"].'</b> on <i>'.$row["PostTime"].'</i></div>
        <div class="panel-body">'.$row["Content"].'</div>
        <div class="panel-footer" align="right"><button type="button" class="btn2 btn-default reply" id="'.$row["CommentID"].'">Reply</button></div>
       </div>
       ';
       $this->forumModel2 = new Forum;
       $output .= $this->forumModel2->getReplyComments($row["CommentID"]);
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
        Login to add a comment
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
        $this->forumModel = new Forum;
        $this->forumModel->addComment($_POST["comment_id"],$comment_content,$comment_name,$_POST["postID"]);
        $error = '<label class="text-success">Comment Added</label>';
      }

      $data = array (
        'error' => $error
      );
      echo json_encode($data);
    }
    public function add_post(Request $rq){
      $this->forumModel = new Forum;
      $this->forumModel->addPost($rq->input('PostTitle'), $rq->input('PostAuthor'), $rq->input('Categories'), $rq->input('Type'), $rq->input('Public'), $rq->input('Content'));
      return redirect()->to(URLROOT . "forum/index");
    }
}
