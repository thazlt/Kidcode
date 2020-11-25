<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    private $data;
    public function __construct() {
      $this->userModel = new Page;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages/index')->with('data',$this->data);
    }

    public function aboutus()
    {
        return view('pages/aboutus');
    }

    public function lessons(Request $rq)
    {
        $this->data=[];
        $this->lessonModel = new Page;
        $this->data['lessons'] = $this->lessonModel->getLessons(session()->get('username'),$rq->get('page'));
        $this->data['curPage'] = $rq->get('page');
        $this->data['maxPage'] = $this->lessonModel->getMaxPage();
        return view('pages/lessons')->with('data',$this->data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function __invoke()
    {
      return $this->index();
    }
    public function register() {
    if($_SERVER['REQUEST_METHOD'] == "POST") {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'username' => trim($_POST['username']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
        'usertype' => $_POST['usertype'],
        'username_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
        'email_err' => ''
      ];
      // Username validation > check empty, more than 5 chars and username not taken
      if(empty($data['username'])) {
        $data['username_err'] = "The user name field is empty! ";
      } elseif(strlen($data['username']) < 5) {
        $data['username_err'] = "Username must be 5 or more characters long! ";
      } elseif($this->userModel->findUserByName($data['username'])) {
        $data['username_err'] = "This username is taken! ";
      }
      // Check Password
      if(empty($data['password'])) {
        $data['password_err'] = "The password field is empty! ";
      } elseif(strlen($data['password']) < 6) {
        $data['password_err'] = "Password must be 6 or more characters long! ";
      }
      //Conform password match
      if($data['password'] != $data['confirm_password']) {
        $data['confirm_password_err'] = "Password do not match! ";
      }
      //Check email
      if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) {
        $data['email_err'] = "Email is invalid! ";
      }

      // check if there are any errors, if not call register method on User model
      if(empty($data['username_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['email_err'])) {
        //Hash user password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        //call register method on User model
        if($this->userModel->register($data)) {
          echo "<script type='text/javascript'>alert('Account created. Login now to start learning!!');</script>";
        } else {
          echo "<script type='text/javascript'>alert('Something is wrong with the server. Try again later');</script>";
        }
      }
    }
    return view('pages/index')->with('data',$data);
  }
  // Login method
  public function login(Request $rq) {
    $data = [
      'username' => '' ,
      'password' => '',
      'username_err' => '',
      'password_err' => ''
    ];

    if($_SERVER['REQUEST_METHOD'] == "POST") {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password']),
        'username_err' => '',
        'password_err' => ''
      ];

      // check user field has input, check that user exists in the DB
      if(empty($data['username'])) {
        $data['username_err'] = "The user name field is empty!";
      } elseif(!$this->userModel->findUserByName($data['username'])) {
        $data['username_err'] = "Username is not found!";
      }
      // Check Password
      if(empty($data['password'])) {
        $data['password_err'] = "The password field is empty!";
      }
      //password_verify($data['password'], $this->userModel->getHash()
      if(empty($data['username_err']) && empty($data['password_err'])) {
        $hash = $this->userModel->getPassword();
        if(password_verify($data['password'], $hash)) {
          //Session::set('loggedin', true);
          session()->put('loggedin', true);
          //Session::set('username', $this->userModel->getUsername());
          session()->put('username', $this->userModel->getUsername());
          session()->put('userID', $this->userModel->getUserID());
          //check teacher
          session()->put('u_type', $this->userModel->getUserType());
          echo "<script type='text/javascript'>alert('Login success!!!');</script>";
        } else {
          $data['password_err'] = "Wrong password!";
        }
      } 
      // else {
      //   $message = "Something happen: " . $data['username_err'] . $data['password_err'];
      //   echo "<script type='text/javascript'>alert('$message');</script>";
      // }

    }
    // return the view
    return view('pages/index')->with('data',$data);
  }
  public function logout(){
     session(['username' => '']);
     session(['loggedin' => false]);
     session(['u_type' => '']);
     echo "<script type='text/javascript'>alert('Good bye :*( see you again');</script>";
     return view('pages/index')->with('data',$this->data);
  }
  public function profile(){
    $this->userModel = new Page;
    $userinfo = $this->userModel->getUserByName(session()->get('username'));
    $lessoncom = $this->userModel->getLessonsComByName(session()->get('username'));
    $exercisecom = $this->userModel->getExercisesComByName(session()->get('username'));
    $progressinfo = $this->userModel->getProgressByName(session()->get('username'));
    $this->data['user'] = $userinfo;
    $this->data['lessoncom'] = $lessoncom;
    $this->data['exercisecom'] = $exercisecom['num'];
    $this->data['progress'] = $progressinfo;
    return view('pages/profile')->with('data',$this->data);
  }
}
