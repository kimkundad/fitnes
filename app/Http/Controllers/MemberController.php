<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\member;
use App\trainer;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $get_data = DB::table('members')
              ->get();
        $get_data_expire = 0;
        $get_data_expire1 = 0;
        $get_date = date("Y-m-d");
        foreach($get_data as $u){

          $get_date2 = strtotime($u->end_at) - strtotime($get_date);
          $data_2 = ($get_date2/86400);
          if($data_2 < 30 && $data_2 > 0){
            $get_data_expire++;
          }
          if($data_2 < 0){
            $get_data_expire1++;
          }
        }


        $get_count = DB::table('members')->select(
              'members.*'
              )
              ->count();




        //dd($get_date2/86400);
        //86400


        $trainer = member::all();

        $s = 1;
        $data['s'] = $s;
        $data['get_data_expire1'] = $get_data_expire1;
        $data['get_data_expire'] = $get_data_expire;
        $data['get_count'] = $get_count;
        $data['objs'] = $trainer;
        $data['datahead'] = "รายชื่อสมาชิก GT Fitnes";
        return view('admin.member.index', $data);
    }



    public function check_in_member(){
      return view('admin.member.check_in_member');
    }

    public function search_mem_checkin(Request $request){

      $this->validate($request, [
       'search' => 'required'
     ]);
     $search = $request->get('search');

     $get_data = DB::table('members')->select(
           'members.*'
           )
           ->where('no_mem', 'like', "%$search%")
           ->orWhere('first_name_mem', 'LIKE', "%$search%")
           ->get();

    //  dd($get_data);
      $data['search'] = $search;
      $data['objs'] = $get_data;
      return view('admin.member.check_in_member_search', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $obj = trainer::all();
        $data['trainer'] = $obj;
        $data['method'] = "post";
        $data['url'] = url('admin/member');
        $data['datahead'] = "สมัครสมาชิก GT Fitnes";
        return view('admin.member.create', $data);
    }


    public function get_member_his(){

      $trainer = DB::table('checkins')->select(
            'checkins.*',
            'checkins.id as idc',
            'trainers.*',
            'members.*'
            )
            ->leftjoin('trainers', 'trainers.id',  'checkins.tp_id')
            ->leftjoin('members', 'members.id',  'checkins.user_id')
            ->get();

      $s = 1;
      $data['s'] = $s;

      $data['trainer'] = $trainer;
      return view('admin.member.get_member_his', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function search_mem(Request $request)
     {

       $this->validate($request, [
        'search' => 'required'
      ]);
      $search = $request->get('search');

      //dd($search);
      if($search == 1 || $search == 2 || $search == 3){

        $get_data = DB::table('members')
              ->where('type_mem', $search)
              ->get();
        //////////////////////////////////////////
        $get_data_expire = 0;
        $get_data_expire1 = 0;
        $get_date = date("Y-m-d");
        foreach($get_data as $u){

          $get_date2 = strtotime($u->end_at) - strtotime($get_date);
          $data_2 = ($get_date2/86400);
          if($data_2 < 30 && $data_2 > 0){
            $get_data_expire++;
          }
          if($data_2 < 0){
            $get_data_expire1++;
          }
        }
        //////////////////////////////////////////
        $get_count = DB::table('members')->select(
              'members.*'
              )
              ->where('type_mem', $search)
              ->count();
        //////////////////////////////////////////
        $search1 = $search;
        $search = null;
      }else{


        $get_data = DB::table('members')
              ->where('no_mem', 'like', "%$search%")
              ->orWhere('first_name_mem', 'LIKE', "%$search%")
              ->get();
        //////////////////////////////////////////
        $get_data_expire = 0;
        $get_data_expire1 = 0;
        $get_date = date("Y-m-d");
        foreach($get_data as $u){

          $get_date2 = strtotime($u->end_at) - strtotime($get_date);
          $data_2 = ($get_date2/86400);
          if($data_2 < 30 && $data_2 > 0){
            $get_data_expire++;
          }
          if($data_2 < 0){
            $get_data_expire1++;
          }
        }
        //////////////////////////////////////////
        $get_count = DB::table('members')->select(
              'members.*'
              )
              ->where('no_mem', 'like', "%$search%")
              ->orWhere('first_name_mem', 'LIKE', "%$search%")
              ->count();
        //////////////////////////////////////////


        $search1 = 0;
      }





      $s = 1;
      $data['s'] = $s;
      $data['get_data_expire1'] = $get_data_expire1;
      $data['get_data_expire'] = $get_data_expire;
      $data['get_count'] = $get_count;
      $data['search'] = $search;
      $data['search1'] = $search1;
      $data['objs'] = $get_data;
      $data['datahead'] = "รายชื่อสมาชิก GT Fitnes";
      return view('admin.member.search', $data);

     }



     public function add_time($id){

       $trainer = trainer::all();
       $data['trainer'] = $trainer;

       $objs = member::find($id);

       $data['objs'] = $objs;

       $data['method'] = "post";
       $data['url'] = url('admin/add_time_post');
       $data['datahead'] = "สมัครสมาชิก GT Fitnes";
       return view('admin.member.add_time', $data);

     }

     public function add_time_post(Request $request){

       $user_id = $request['user_id'];

       $package = member::find($user_id);
       $package->start_at = $request['start_at'];
       $package->end_at = $request['end_at'];
       $package->type_mem = $request['type_mem'];
       $package->pay_type_mem = $request['pay_type_mem'];
       $package->amount_mem = $request['amount_mem'];
       $package->re_amount_mem = $request['re_amount_mem'];
       $package->remark_mem = $request['remark_mem'];
       $package->status_mem = $request['status_mem'];
       $package->pt_end_at = $request['pt_end_at'];
       $package->pt_hr = $request['pt_hr'];
       $package->pt_pay_type_mem = $request['pt_pay_type_mem'];
       $package->pt_amount_mem = $request['pt_amount_mem'];
       $package->pt_re_amount_mem = $request['pt_re_amount_mem'];
       $package->pt_remark_mem = $request['pt_remark_mem'];
       $package->save();

       return redirect(url('admin/member/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

     }




    public function store(Request $request)
    {
        //

        $image = $request->file('image');

        $this->validate($request, [
         'first_name_mem' => 'required',
         'last_name_mem' => 'required',
         'birthday_mem' => 'required',
         'sex_mem' => 'required',
         'phone_mem' => 'required',
         'start_at' => 'required',
         'end_at' => 'required',
         'type_mem' => 'required',
         'pay_type_mem' => 'required',
         'address_mem' => 'required',
         'province_mem' => 'required'
        ]);

        if($image == null){
          $ran = array("1483537975.png","1483556517.png","1483556686.png");
          $input['imagename'] = $ran[array_rand($ran, 1)];
        }else{

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(500, 500, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/images/avatar/'.$input['imagename']);

        }

        $package = new member();
        $package->pt_id = $request['pt_id'];
        $package->image_mem = $input['imagename'];
        $package->first_name_mem = $request['first_name_mem'];
        $package->last_name_mem = $request['last_name_mem'];
        $package->birthday_mem = $request['birthday_mem'];
        $package->sex_mem = $request['sex_mem'];
        $package->height_mem = $request['height_mem'];
        $package->width_mem = $request['width_mem'];
        $package->phone_mem = $request['phone_mem'];
        $package->email_mem = $request['email_mem'];
        $package->line_mem = $request['line_mem'];
        $package->facebook_mem = $request['facebook_mem'];
        $package->address_mem = $request['address_mem'];
        $package->province_mem = $request['province_mem'];
        $package->district_mem = $request['district_mem'];
        $package->zip_code_mem = $request['zip_code_mem'];
        $package->start_at = $request['start_at'];
        $package->end_at = $request['end_at'];
        $package->type_mem = $request['type_mem'];
        $package->pay_type_mem = $request['pay_type_mem'];
        $package->amount_mem = $request['amount_mem'];
        $package->re_amount_mem = $request['re_amount_mem'];
        $package->remark_mem = $request['remark_mem'];
        $package->status_mem = $request['status_mem'];
        $package->admin_id = Auth::user()->id;
        $package->pt_end_at = $request['pt_end_at'];
        $package->pt_hr = $request['pt_hr'];
        $package->pt_pay_type_mem = $request['pt_pay_type_mem'];
        $package->pt_amount_mem = $request['pt_amount_mem'];
        $package->pt_re_amount_mem = $request['pt_re_amount_mem'];
        $package->pt_remark_mem = $request['pt_remark_mem'];
        $package->save();

        $get_count = DB::table('members')
              ->count();

        $l = strlen($get_count);
        $get_count2 = $get_count+1;
        if($l == 1){

          $get_l = '00'.$get_count2;

        }elseif($l == 2){
          $get_l = '0'.$get_count2;
        }else{
          $get_l = $get_count2;
        }

      //  dd($get_l);


        $randomSixDigitInt = 'GT62-'.($get_l).'-'.(\random_int(100, 999));

        $the_id = $package->id;
          //$no_mem = 'GT'.$the_id.''.Auth::user()->id.'-'.$request['sex_mem'].''.$request['type_mem'].''.$request['pay_type_mem'];

          $package = member::find($the_id);
          $package->no_mem = $randomSixDigitInt;
          $package->save();


        return redirect(url('admin/preview/'.$the_id))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
        $objs = member::find($id);

        $data['objs'] = $objs;
        return view('admin.member.preview', $data);
    }

    public function search_history(Request $request){

      $user_id = $request['user_id'];
      $select_type = $request['select_type'];

      $get_data_chart = DB::table('checkins')->select(
            'checkins.*'
            )
            ->where('user_id', $user_id)
            ->groupBy('time_type')
            ->get();
            $get_array = [];
            $ran = array("ฟิตเนส","เทรนเนอร์","คลาส","ว่ายน้ำ");
            foreach($ran as $u){

              $get_count = DB::table('checkins')->select(
                    'checkins.*'
                    )
                    ->where('user_id', $user_id)
                    ->where('time_type', $u)
                    ->count();
              $get_array[] = $get_count;
            }

          //  dd($get_array);

      $get_data = DB::table('checkins')->select(
            'checkins.*'
            )
            ->where('user_id', $user_id)
            ->where('time_type', $select_type)
            ->get();

          //  dd($select_type);
        //
        $objs = member::find($user_id);
        $s = 1;
        $data['s'] = $s;
        $data['objs'] = $objs;
        $data['select_type'] = $select_type;
        $data['get_array'] = $get_array;
        $data['get_data'] = $get_data;
        $data['get_data_chart'] = $get_data_chart;
        return view('admin.member.search_his', $data);

    }

    public function report($id)
    {

      $get_data_chart = DB::table('checkins')->select(
            'checkins.*'
            )
            ->where('user_id', $id)
            ->groupBy('time_type')
            ->get();
            $get_array = [];
            $ran = array("ฟิตเนส","เทรนเนอร์","คลาส","ว่ายน้ำ");
            foreach($ran as $u){

              $get_count = DB::table('checkins')->select(
                    'checkins.*'
                    )
                    ->where('user_id', $id)
                    ->where('time_type', $u)
                    ->count();
              $get_array[] = $get_count;
            }

          //  dd($get_array);

      $get_data = DB::table('checkins')->select(
            'checkins.*'
            )
            ->where('user_id', $id)
            ->get();
        //
        $objs = member::find($id);
        $s = 1;
        $data['s'] = $s;
        $data['objs'] = $objs;
        $data['get_array'] = $get_array;
        $data['get_data'] = $get_data;
        $data['get_data_chart'] = $get_data_chart;
        return view('admin.member.show', $data);
    }

    public function preview($id)
    {
        //
        $objs = member::find($id);

        $data['objs'] = $objs;
        return view('admin.member.preview', $data);
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
        $obj = trainer::all();




        $data['trainer'] = $obj;
        $objs = member::find($id);
        $province = DB::table('province')
              ->select(
              'province.*'
              )
              ->where('PROVINCE_ID', $objs->province_mem)
              ->first();
          $data['province'] = $province;
        $data['url'] = url('admin/member/'.$id);
        $data['datahead'] = "แก้ไข ข้อมูล Member";
        $data['method'] = "put";
        $data['objs'] = $objs;
        return view('admin.member.edit', $data);
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
        $get_count = DB::table('members')
              ->count();
        $l = strlen($id);

        if($l == 1){
          $get_l = '00'.$id;
        }elseif($l == 2){
          $get_l = '0'.$id;
        }else{
          $get_l = $id;
        }

        $randomSixDigitInt = 'GT62-'.($get_l).'-'.(\random_int(100, 999));
        $image = $request->file('image');

        $this->validate($request, [
         'first_name_mem' => 'required',
         'last_name_mem' => 'required',
         'birthday_mem' => 'required',
         'sex_mem' => 'required',
         'phone_mem' => 'required',
         'start_at' => 'required',
         'end_at' => 'required',
         'type_mem' => 'required',
         'pay_type_mem' => 'required'
        ]);

        if($image == null){


          $package = member::find($id);
          $package->no_mem = $randomSixDigitInt;
          $package->pt_id = $request['pt_id'];
          $package->first_name_mem = $request['first_name_mem'];
          $package->last_name_mem = $request['last_name_mem'];
          $package->birthday_mem = $request['birthday_mem'];
          $package->sex_mem = $request['sex_mem'];
          $package->height_mem = $request['height_mem'];
          $package->width_mem = $request['width_mem'];
          $package->phone_mem = $request['phone_mem'];
          $package->email_mem = $request['email_mem'];
          $package->line_mem = $request['line_mem'];
          $package->facebook_mem = $request['facebook_mem'];
          $package->address_mem = $request['address_mem'];
          $package->province_mem = $request['province_mem'];
          $package->district_mem = $request['district_mem'];
          $package->zip_code_mem = $request['zip_code_mem'];
          $package->start_at = $request['start_at'];
          $package->end_at = $request['end_at'];
          $package->type_mem = $request['type_mem'];
          $package->pay_type_mem = $request['pay_type_mem'];
          $package->amount_mem = $request['amount_mem'];
          $package->re_amount_mem = $request['re_amount_mem'];
          $package->remark_mem = $request['remark_mem'];
          $package->status_mem = $request['status_mem'];
          $package->pt_end_at = $request['pt_end_at'];
          $package->pt_hr = $request['pt_hr'];
          $package->pt_pay_type_mem = $request['pt_pay_type_mem'];
          $package->pt_amount_mem = $request['pt_amount_mem'];
          $package->pt_re_amount_mem = $request['pt_re_amount_mem'];
          $package->pt_remark_mem = $request['pt_remark_mem'];
          $package->save();

        }else{


          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(500, 500, function ($constraint) {
          $constraint->aspectRatio();
        })->save('assets/images/avatar/'.$input['imagename']);

        $package = member::find($id);
        $package->no_mem = $randomSixDigitInt;
        $package->pt_id = $request['pt_id'];
        $package->image_mem = $input['imagename'];
        $package->first_name_mem = $request['first_name_mem'];
        $package->last_name_mem = $request['last_name_mem'];
        $package->birthday_mem = $request['birthday_mem'];
        $package->sex_mem = $request['sex_mem'];
        $package->height_mem = $request['height_mem'];
        $package->width_mem = $request['width_mem'];
        $package->phone_mem = $request['phone_mem'];
        $package->email_mem = $request['email_mem'];
        $package->line_mem = $request['line_mem'];
        $package->facebook_mem = $request['facebook_mem'];
        $package->address_mem = $request['address_mem'];
        $package->province_mem = $request['province_mem'];
        $package->district_mem = $request['district_mem'];
        $package->zip_code_mem = $request['zip_code_mem'];
        $package->start_at = $request['start_at'];
        $package->end_at = $request['end_at'];
        $package->type_mem = $request['type_mem'];
        $package->pay_type_mem = $request['pay_type_mem'];
        $package->amount_mem = $request['amount_mem'];
        $package->re_amount_mem = $request['re_amount_mem'];
        $package->remark_mem = $request['remark_mem'];
        $package->status_mem = $request['status_mem'];
        $package->pt_end_at = $request['pt_end_at'];
        $package->pt_hr = $request['pt_hr'];
        $package->pt_pay_type_mem = $request['pt_pay_type_mem'];
        $package->pt_amount_mem = $request['pt_amount_mem'];
        $package->pt_re_amount_mem = $request['pt_re_amount_mem'];
        $package->pt_remark_mem = $request['pt_remark_mem'];
        $package->save();

        }

        return redirect(url('admin/member/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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

      $obj = member::find($id);
      $obj->delete();
      return redirect(url('admin/member/'))->with('del_product','คุณทำการลบอสังหา สำเร็จ');
    }
}
