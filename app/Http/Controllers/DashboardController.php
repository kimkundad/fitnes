<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\course;
use App\checkin;
use App\member;

class DashboardController extends Controller
{
    //
    public function index()
    {

      $get_data = DB::table('members')
            ->get();
            $get_data_expire = 0;
            $get_data_expire1 = 0;
            $get_date = date("Y-m-d");
            foreach($get_data as $u){

              $u->get_data_expire = 0;

              //////////////////////////////////////////////////
              $get_date2 = strtotime($u->end_at) - strtotime($get_date);
              $data_2 = ($get_date2/86400);
              $u->days = $data_2;
              if($data_2 < 30){
                $u->get_data_expire = 1;
                $get_data_expire++;
              }
              //////////////////////////////////////////////

            }


            foreach($get_data as $j){


              $j->get_data_expire1 = 0;
              //////////////////////////////////////////////////

              //////////////////////////////////////////////
              $get_date3 = strtotime($j->start_at) - strtotime($get_date);
              $data_3 = ($get_date3/86400);
              $j->days1 = $data_3;
              if($data_3 > -30){
                $j->get_data_expire1 = 1;
                $get_data_expire1++;
              }
              //////////////////////////////////////////////
            }
          //  dd($get_data);
            $data['objs'] = $get_data;

      $course = course::all();
      $data['course'] = $course;
      $s = 1;
      $data['s'] = $s;
      $k = 1;
      $data['k'] = $k;
      $j = 1;
      $data['j'] = $j;
      $a = 1;
      $data['a'] = $a;
      $b = 1;
      $data['b'] = $b;
      $data['get_data_expire'] = $get_data_expire;
      $data['get_data_expire1'] = $get_data_expire1;
      return view('admin.dashboard.index', $data);
    }

    public function search_mem(Request $request)
     {
       $this->validate($request, [
        'search' => 'required'
      ]);
      $search = $request->get('search');
      //dd($search);


     $get_data_meme = DB::table('members')
           ->where('no_mem', $search)
           ->orWhere('first_name_mem', 'LIKE', "%$search%")
           ->get();
     //////////////////////////////////////////

     //////////////////////////////////////////
     $get_count = DB::table('members')->select(
           'members.*'
           )
           ->where('no_mem', $search)
           ->orWhere('first_name_mem', 'LIKE', "%$search%")
           ->count();



           $data['get_count'] = $get_data_meme;
           $data['search'] = $search;


           $get_data = DB::table('members')
                 ->get();
                 $get_data_expire = 0;
                 $get_data_expire1 = 0;
                 $get_date = date("Y-m-d");
                 foreach($get_data as $u){

                   $u->get_data_expire = 0;

                   //////////////////////////////////////////////////
                   $get_date2 = strtotime($u->end_at) - strtotime($get_date);
                   $data_2 = ($get_date2/86400);
                   $u->days = $data_2;
                   if($data_2 < 30){
                     $u->get_data_expire = 1;
                     $get_data_expire++;
                   }
                   //////////////////////////////////////////////

                 }


                 foreach($get_data as $j){


                   $j->get_data_expire1 = 0;
                   //////////////////////////////////////////////////

                   //////////////////////////////////////////////
                   $get_date3 = strtotime($j->start_at) - strtotime($get_date);
                   $data_3 = ($get_date3/86400);
                   $j->days1 = $data_3;
                   if($data_3 > -30){
                     $j->get_data_expire1 = 1;
                     $get_data_expire1++;
                   }
                   //////////////////////////////////////////////
                 }
               //  dd($get_data);
                 $data['objs'] = $get_data;

           $course = course::all();
           $data['course'] = $course;
           $s = 1;
           $data['s'] = $s;
           $k = 1;
           $data['k'] = $k;
           $j = 1;
           $data['j'] = $j;
           $a = 1;
           $data['a'] = $a;
           $b = 1;
           $data['b'] = $b;
           $data['get_data_meme'] = $get_data_meme;
           $data['get_data_expire'] = $get_data_expire;
           $data['get_data_expire1'] = $get_data_expire1;
           $data['search'] = $search;
           return view('admin.dashboard.search', $data);

         }


         public function api_tech_status(Request $request){
           $user = member::findOrFail($request->user_id);
           //dd($user->pt_hr);
           $data_id = $request->data_id;
           $get_point = 0;
           if($data_id == 101){
            $get_value = 'ฟิตเนส';
           }elseif($data_id == 102){

             if($user->pt_hr >= 1){

               $get_point = $user->pt_hr-1;

                $obj = member::find($user->id);
                $obj->pt_hr = $get_point;
                $obj->save();

             }else{

               return response()->json([
                'data' => [
                  'success' => 1002,
                ]
              ]);

             }



             $get_value = 'เทรนเนอร์';
           }elseif($data_id == 103){
             $get_value = 'คลาส';
           }else{
             $get_value = 'ว่ายน้ำ';
           }


           date_default_timezone_set("Asia/Bangkok");
           $get_date = date("Y-m-d");
           $get_time = date("H:i");


           $package = new checkin();
           $package->user_id = $request['user_id'];
           $package->start_at = $get_date;
           $package->time_ch = $get_time;
           $package->time_type = $get_value;
           $package->user_type = $user->type_mem;
           $package->admin_id = Auth::user()->id;
           $package->status = 1;
           $package->save();


           return response()->json([
            'data' => [
              'success' => 1001,
            ]
          ]);


         }





}
