<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\course;
use App\category;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = DB::table('courses')->select(
              'courses.*',
              'courses.id as idc',
              'categories.*'
              )
              ->leftjoin('categories', 'categories.id',  'courses.cat_id')
              ->get();

        $s = 1;
        $data['s'] = $s;
        $data['objs'] = $objs;
        $data['datahead'] = "Class เรียน";
        return view('admin.course.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = category::all();
        $data['category'] = $category;
        $data['method'] = "post";
        $data['url'] = url('admin/course');
        $data['datahead'] = "CLASS เรียน";
        return view('admin.course.create', $data);
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
        $this->validate($request, [
         'course_name' => 'required',
         'cat_id' => 'required',
         'course_price' => 'required'
        ]);

        $package = new course();
        $package->course_name = $request['course_name'];
        $package->cat_id = $request['cat_id'];
        $package->course_price = $request['course_price'];
        $package->course_detail = $request['course_detail'];
        $package->course_remark = $request['course_remark'];
        $package->save();
        return redirect(url('admin/course'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_c_t($id)
    {

      $classtables = DB::table('classtables')->select(
            'classtables.*'
            )
            ->where('id', $id)
            ->first();
        //
        $course = course::all();
        $data['course'] = $course;

        $trainer = DB::table('trainers')->select(
              'trainers.*'
              )
              ->get();

        $data['trainer'] = $trainer;
        $data['classtables'] = $classtables;

        return view('admin.course.edit_c_t', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $get_class = DB::table('classtables')->select(
            'classtables.*',
            'classtables.id as idc',
            'trainers.*'
            )
            ->leftjoin('trainers', 'trainers.id',  'classtables.t_id')
            ->where('classtables.class_id', $id)
            ->get();


      $data['get_class'] = $get_class;
      $trainer = DB::table('trainers')->select(
            'trainers.*'
            )
            ->get();

      $data['trainer'] = $trainer;
        //
        $category = category::all();
        $data['category'] = $category;
        $obj = course::find($id);
        $data['url'] = url('admin/course/'.$id);
        $data['datahead'] = "แก้ไข class เรียน";
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin.course.edit', $data);
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
        $this->validate($request, [
         'course_name' => 'required',
         'cat_id' => 'required',
         'course_price' => 'required'
        ]);

            $package = course::find($id);
            $package->course_name = $request['course_name'];
            $package->cat_id = $request['cat_id'];
            $package->course_price = $request['course_price'];
            $package->course_detail = $request['course_detail'];
            $package->course_remark = $request['course_remark'];
            $package->save();

            return redirect(url('admin/course/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
        DB::table('classtables')->select(
              'classtables.*'
              )
              ->where('class_id', $id)
              ->delete();


        $obj = course::find($id);
        $obj->delete();
        return redirect(url('admin/course/'))->with('delete','คุณทำการลบอสังหา สำเร็จ');
    }
}
