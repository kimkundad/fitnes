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

      $course = course::all();
      $data['course'] = $course;

      $trainer = DB::table('trainers')->select(
            'trainers.*'
            )
            ->get();
      $s = 1;
      $data['s'] = $s;
      $k = 1;
      $data['k'] = $k;
      $j = 1;
      $data['j'] = $j;
      $data['trainer'] = $trainer;

      return view('admin.course_table.index', $data);

    }

    public function create(){

      $course = course::all();
      $data['course'] = $course;

      $trainer = DB::table('trainers')->select(
            'trainers.*'
            )
            ->get();
      $s = 1;
      $data['s'] = $s;
      $data['trainer'] = $trainer;
      $data['method'] = "post";
      $data['url'] = url('admin/table_course/add_class');
      return view('admin.course_table.create', $data);

    }


    public function edit_c_t_post(Request $request){

      $this->validate($request, [
       'title_event' => 'required',
       'color_event' => 'required',
       'class_id' => 'required',
       'start_event' => 'required'
      ]);


      if(isset($request['t_id'])){

        $tr = DB::table('trainers')->select(
              'trainers.*'
              )
              ->where('id', $request['t_id'])
              ->first();

        $title_event = $request['title_event'].' '.$tr->trainer_name;

      }else{

        $title_event = $request['title_event'];

      }

      $ids = $request['ids'];

      $package = classtable::find($ids);
      $package->title_event = $title_event;
      $package->color_event = $request['color_event'];
      $package->class_id = $request['class_id'];
      $package->t_id = $request['t_id'];
      $package->start_event = $request['start_event'];
      $package->end_event = $request['end_event'];
      $package->save();

      return redirect(url('edit_c_t/'.$ids))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }

    public function post_class_in(Request $request){

      $this->validate($request, [
       'title_event' => 'required',
       'color_event' => 'required',
       'class_id' => 'required',
       'start_event' => 'required'
      ]);

      if(isset($request['t_id'])){

        $tr = DB::table('trainers')->select(
              'trainers.*'
              )
              ->where('id', $request['t_id'])
              ->first();

        $title_event = $request['title_event'].' '.$tr->trainer_name;

      }else{

        $title_event = $request['title_event'];

      }


      $package = new classtable();
      $package->title_event = $title_event;
      $package->color_event = $request['color_event'];
      $package->class_id = $request['class_id'];
      $package->t_id = $request['t_id'];
      $package->start_event = $request['start_event'];
      $package->end_event = $request['end_event'];
      $package->save();


      return redirect(url('admin/course/'.$request['class_id'].'/edit'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }

    public function del_class_t(Request $request){

      $id = $request['id_c'];

      $obj = classtable::find($id);
      $obj->delete();


      return redirect(url('admin/course/'.$request['class_id'].'/edit'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

    }

    public function post_class(Request $request){

      $this->validate($request, [
       'title_event' => 'required',
       'color_event' => 'required',
       'class_id' => 'required',
       'start_event' => 'required'
      ]);

      if(isset($request['t_id'])){

        $tr = DB::table('trainers')->select(
              'trainers.*'
              )
              ->where('id', $request['t_id'])
              ->first();

        $title_event = $request['title_event'].' '.$tr->trainer_name;

      }else{

        $title_event = $request['title_event'];

      }


      $package = new classtable();
      $package->title_event = $title_event;
      $package->color_event = $request['color_event'];
      $package->class_id = $request['class_id'];
      $package->t_id = $request['t_id'];
      $package->start_event = $request['start_event'];
      $package->end_event = $request['end_event'];
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
            "end"=>$rs->end_event,
            "color"=>$rs->color_event,
            "textColor"=>'#fff'
            // กำหนด event object property อื่นๆ ที่ต้องการ
        );
      }

      $json= json_encode($json_data);
      echo $json;
    }

    public function get_event_c($id){

      $classtable = DB::table('classtables')->select(
            'classtables.*'
            )
            ->where('class_id', $id)
            ->get();

      foreach($classtable as $rs){
        $json_data[]=array(
            "id"=> $rs->id,
            "title"=>$rs->title_event,
            "start"=>$rs->start_event,
            "end"=>$rs->end_event,
            "color"=>$rs->color_event,
            "textColor"=>'#fff'
            // กำหนด event object property อื่นๆ ที่ต้องการ
        );
      }

      $json= json_encode($json_data);
      echo $json;

    }

}
