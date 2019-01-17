<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\trainer;
use App\category;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trainer = DB::table('trainers')->select(
              'trainers.*',
              'trainers.id as idc',
              'categories.*'
              )
              ->leftjoin('categories', 'categories.id',  'trainers.cat_id')
              ->get();

        $s = 1;
        $data['s'] = $s;
        $data['objs'] = $trainer;
        $data['datahead'] = "ข้อมูล Trainer";
        return view('admin.trainer.index', $data);
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
        $data['url'] = url('admin/trainer');
        $data['datahead'] = "ข้อมูล Trainer";
        return view('admin.trainer.create', $data);
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
        $image = $request->file('image');
        $this->validate($request, [
         'trainer_name' => 'required',
         'cat_id' => 'required',
         'image' => 'required|max:8048'
        ]);

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $img = Image::make($image->getRealPath());
        $img->resize(500, 500, function ($constraint) {
        $constraint->aspectRatio();
      })->save('assets/images/avatars/'.$input['imagename']);


       $package = new trainer();
       $package->cat_id = $request['cat_id'];
       $package->trainer_name = $request['trainer_name'];
       $package->trainer_phone = $request['trainer_phone'];
       $package->trainer_image = $input['imagename'];
       $package->trainer_status = 1;
       $package->save();

       $the_id = $package->id;


      return redirect(url('admin/trainer/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    //  return redirect(url('admin/trainer/'.$id.'/edit'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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

    public function trainer_his_id($id){

      $obj = trainer::find($id);



      $trainer = DB::table('checkins')->select(
            'checkins.*',
            'checkins.id as idc',
            'trainers.*',
            'members.*'
            )
            ->leftjoin('trainers', 'trainers.id',  'checkins.tp_id')
            ->leftjoin('members', 'members.id',  'checkins.user_id')
            ->where('checkins.tp_id', $id)
            ->where('checkins.time_type', 'เทรนเนอร์')
            ->get();

      $s = 1;
      $data['s'] = $s;

      $data['trainer'] = $trainer;
      $data['trainer_data'] = $obj;
      return view('admin.trainer.trainer_his_id', $data);

    }

    public function trainer_his()
    {
        //
        $trainer = DB::table('checkins')->select(
              'checkins.*',
              'checkins.id as idc',
              'trainers.*',
              'members.*'
              )
              ->leftjoin('trainers', 'trainers.id',  'checkins.tp_id')
              ->leftjoin('members', 'members.id',  'checkins.user_id')
              ->where('checkins.time_type', 'เทรนเนอร์')
              ->get();

        $s = 1;
        $data['s'] = $s;

        $data['trainer'] = $trainer;
        return view('admin.trainer.trainer_his', $data);
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
        $category = category::all();
        $data['category'] = $category;
        $obj = trainer::find($id);
        $data['url'] = url('admin/trainer/'.$id);
        $data['datahead'] = "แก้ไข ข้อมูล Trainer";
        $data['method'] = "put";
        $data['objs'] = $obj;
        return view('admin.trainer.edit', $data);
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
        $image = $request->file('image');
        $this->validate($request, [
         'trainer_name' => 'required',
         'cat_id' => 'required'
        ]);

        if($image == null){

          $package = trainer::find($id);
          $package->cat_id = $request['cat_id'];
          $package->trainer_name = $request['trainer_name'];
          $package->trainer_phone = $request['trainer_phone'];
          $package->save();


        }else{

          $objs = DB::table('trainers')
          ->select(
             'trainers.*'
             )
          ->where('id', $id)
          ->first();

          $file_path = 'assets/images/avatars/'.$objs->trainer_image;
          unlink($file_path);

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(500, 500, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/images/avatars/'.$input['imagename']);



          $package = trainer::find($id);
          $package->cat_id = $request['cat_id'];
          $package->trainer_name = $request['trainer_name'];
          $package->trainer_phone = $request['trainer_phone'];
          $package->trainer_image = $input['imagename'];
          $package->save();

        }

        return redirect(url('admin/trainer/'.$id.'/edit'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $objs = DB::table('trainers')
          ->select(
             'trainers.*'
             )
          ->where('id', $id)
          ->first();

      $file_path = 'assets/images/avatars/'.$objs->trainer_image;
      unlink($file_path);

        //
        $obj = trainer::find($id);
        $obj->delete();
        return redirect(url('admin/trainer/'))->with('del_product','คุณทำการลบอสังหา สำเร็จ');
    }
}
