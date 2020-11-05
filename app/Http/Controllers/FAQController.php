<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;

class FAQController extends Controller
{
    private $data;

    public function index(Request $rq){
      echo"Hello di";
      // lam xong view uncomment cai nay
      //return view('FAQ/index')->with('data',$this->data);
    }
}
