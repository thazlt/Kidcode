<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;

class FAQController extends Controller
{
    private $data;

    public function index(Request $rq){
      return view('faqs/index')->with('data',$this->data);
    }
}
