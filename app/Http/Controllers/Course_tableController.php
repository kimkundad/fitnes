<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\classtable;
use App\course;
use Validator;
use Response;
use Redirect;
use Illuminate\Support\Facades\DB;

class Course_tableController extends Controller
{
    //
    public function index(){
      return view('admin.course_table.index');
    }

    public function create(){

      $course = course::all();
      $data['course'] = $course;

      $trainer = DB::table('trainers')->select(
            'trainers.*'
            )
            ->get();

      $data['trainer'] = $trainer;
      $data['method'] = "post";
      $data['url'] = url('admin/table_course/add_class');
      return view('admin.course_table.create', $data);

    }

    public function post_class(Request $request){

      $this->validate($request, [
       'title_event' => 'required',
       'color_event' => 'required',
       'class_id' => 'required',
       'start_event' => 'required'
      ]);

      $title_event = $request['title_event'].' '.$request['trainer_name'];

      $package = new classtable();
      $package->title_event = $title_event;
      $package->color_event = $request['color_event'];
      $package->class_id = $request['class_id'];
      $package->start_event = $request['start_event'];
      $package->save();

      return view('admin.course_table.index');

    }

    public function get_event(){

      $classtable = classtable::all();
      foreach($classtable as $rs){
        $json_data[]=array(
            "id"=> $rs->id,
            "title"=>$rs->title_event,
            "start"=>$rs->start_event,
            "color"=>$rs->color_event,
            "textColor"=>'#fff'
            // กำหนด event object property อื่นๆ ที่ต้องการ
        );
      }

      $json= json_encode($json_data);
      echo $json;  
    }

}
