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
           $tp_id = $request->tp_id;

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
           $package->tp_id = $tp_id;
           $package->admin_id = Auth::user()->id;
           $package->status = 1;
           $package->save();


           return response()->json([
            'data' => [
              'success' => 1001,
            ]
          ]);


         }

         public function followersdata(){

           $ran_x = array(1,2,3,4);
           $get_date = [];
           for ($i = 0; $i < sizeof($ran_x); $i++) {
           $date = array([date("Y-1-1"),date("Y-2-1")], [date("Y-2-1"),date("Y-3-1")], [date("Y-3-1"),date("Y-4-1")], [date("Y-4-1"),date("Y-5-1")], [date("Y-5-1"),date("Y-6-1")],
           [date("Y-6-1"),date("Y-7-1")], [date("Y-7-1"),date("Y-8-1")], [date("Y-8-1"),date("Y-9-1")], [date("Y-9-1"),date("Y-10-1")], [date("Y-10-1"),date("Y-11-1")], [date("Y-11-1"),date("Y-12-1")],);


             for ($j = 0; $j < sizeof($date); $j++) {

             $get_count = DB::table('members')->select(
                   'members.*'
                   )
                   ->where('type_mem', $ran_x[$i])
                   ->whereBetween('created_at', $date[$j])
                   ->count();


             $get_date[$j] = $get_count;

           }

           if($i == 3){
             $set_label = 'รายปี';
             $set_color = '#3e95cd';
;             }elseif($i == 2){
               $set_label = 'รายเดือน';
               $set_color = '#8e5ea2';
               }elseif($i == 1){
                 $set_label = 'รายวัน';
                 $set_color = '#3cba9f';
                 }else{
                   $set_label = 'Trainer';
                   $set_color = '#e8c3b9';
                   }

           $set_date_2[] = [
             'data' => $get_date,
             'label' => $set_label,
             'borderColor' => $set_color,
             'fill' => false
          ];

           }

           return response()->json(
             $set_date_2
             );


           //dd($set_date_2);

         }


         public function owner(){

           $get_all_count1 = DB::table('mem_pays')
                 ->sum('pt_money_mem');

                 $get_all_count2 = DB::table('mem_pays')
                       ->sum('mem_money_mem');
           $get_all_count = 0;

           $get_all_count = $get_all_count1 + $get_all_count2;

           $get_array = [];
           $ran = array(1,2,3,4);

           foreach($ran as $u){

             $get_count = DB::table('mem_pays')->select(
                   'mem_pays.*'
                   )
                   ->where('mem_type', $u)
                   ->sum('mem_money_mem');
             $get_array[] = $get_count;

           }





           //dd($set_date_2);

           $get_now = date("Y-m-d");

           $get_mem_type = [];
           $ran = array(1,2,3,4);
           foreach($ran as $u){

             $get_count = DB::table('members')->select(
                   'members.*'
                   )
                   ->where('type_mem', $u)
                   ->count();
             $get_mem_type[] = $get_count;

           }

           $get_count_set = 0;

           $s1 = 0;
           $s2 = 0;
           $s3 = 0;
           $s4 = 0;
           $member_set = member::all();
           foreach($member_set as $u){

             $get_date2 = strtotime($u->end_at) - strtotime($get_now);

             $data_2 = ($get_date2/86400);
             //echo $data_2;
             $u->days = $data_2;
             if($data_2 <= 30 && $data_2 > 15 ){
               $s1++;
             }elseif($data_2 <= 15 && $data_2 > 0 ){
               $s2++;
             }elseif($data_2 >= 30){
               $s3++;
             }else{
               $s4++;
             }


             }
        //   $get_date = date("Y-m-d");
          $get_mem_status = array($s1,$s2,$s3,$s4);

          $get_data_user = DB::table('members')
                ->get();
                $get_data_expire = 0;


                foreach($get_data_user as $u){

                  $u->get_data_expire = 0;

                  //////////////////////////////////////////////////
                  $get_date2 = strtotime($u->end_at) - strtotime($get_now);
                  $data_2 = ($get_date2/86400);
                  $u->days = $data_2;
                  if($data_2 < 30){
                    $u->get_data_expire = 1;
                    $get_data_expire++;
                  }
                  //////////////////////////////////////////////

                }


          $data['objs'] = $get_data_user;

          $a = 1;
          $data['a'] = $a;


        //  dd($get_mem_status);
          $data['get_mem_status'] = $get_mem_status;
          $data['get_data_expire'] = $get_data_expire;
           //dd($get_date);
           $data['get_mem_type'] = $get_mem_type;
           $data['get_array'] = $get_array;
           $data['get_all_count'] = $get_all_count;


          // return view('admin.dashboard.search', $data);
          return view('admin.dashboard.owner', $data);
         }





}
