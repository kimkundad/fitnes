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

        $trainer = member::all();

        $s = 1;
        $data['s'] = $s;
        $data['objs'] = $trainer;
        $data['datahead'] = "รายชื่อสมาชิก GT Fitnes";
        return view('admin.member.index', $data);
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
         'first_name_mem' => 'required',
         'last_name_mem' => 'required',
         'birthday_mem' => 'required',
         'sex_mem' => 'required',
         'phone_mem' => 'required',
         'start_at' => 'required',
         'end_at' => 'required',
         'type_mem' => 'required',
         'pay_type_mem' => 'required',
         'amount_mem' => 'required'
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

        $the_id = $package->id;
          $no_mem = $the_id.''.Auth::user()->id.'-'.$request['sex_mem'].''.$request['type_mem'].''.$request['pay_type_mem'];
          $package = member::find($the_id);
          $package->no_mem = $no_mem;
          $package->save();




        return redirect(url('admin/member/'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');
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
         'amount_mem' => 'required'
        ]);

        if($image == null){


          $package = member::find($id);
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

        return redirect(url('admin/member/'.$id.'/edit'))->with('add_success','คุณทำการเพิ่มอสังหา สำเร็จ');

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
}
