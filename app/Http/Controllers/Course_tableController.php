<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Course_tableController extends Controller
{
    //
    public function index(){
      return view('admin.course_table.index');
    }
}
