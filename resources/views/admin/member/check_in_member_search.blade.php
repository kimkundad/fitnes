@extends('admin.layouts.template')

@section('admin.content')

<?php
                        function DateThai($strDate)
                        {
                        $strYear = date("Y",strtotime($strDate))+543;
                        $strMonth= date("n",strtotime($strDate));
                        $strDay= date("j",strtotime($strDate));
                        $strHour= date("H",strtotime($strDate));
                        $strMinute= date("i",strtotime($strDate));
                        $strSeconds= date("s",strtotime($strDate));
                        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                        $strMonthThai=$strMonthCut[$strMonth];
                        return "$strDay $strMonthThai $strYear";
                        }

                         ?>

<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>เช็คอินสมาชิก GT Fitnes
                                    <div class="page-title-subheading">เช็คอินสมาชิก ของ GT Fitnes ทั้งหมด
                                    </div>
                                </div>
                            </div>


                            <div class="page-title-actions">
                              <a href="{{url('admin/member/create')}}"  class="btn-shadow btn btn-info">
                                  <span class="btn-icon-wrapper pr-2 opacity-7">
                                      <i class="icon ion-android-add"></i>
                                  </span>
                                  สมัครสมาชิก
                              </a>

                            </div>



                          </div>
                    </div>

<div class="tabs-animation">
                        <div class="row">
                            <div class="col-lg-6 offset-md-3">


                              <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">ค้นหาสมาชิก</h5>

                                  <br />
                                  <div class="search-wrapper active" style="margin-top:5px;">
                                    <form class="" method="POST" action="{{url('admin/search_mem_checkin')}}" enctype="multipart/form-data" novalidate="novalidate">
                                    {{ csrf_field() }}
                                      <div class="input-holder" style="width: 450px;">
                                          <input type="text" class="search-input" value="{{$search}}" name="search" placeholder="Search">
                                          <button class="search-icon" type="submit"><span></span></button>
                                      </div>
                                      </form>
                                  </div>
                                  <br />
                                </div>
                            </div>




                            </div>

                            <div class="col-lg-12 ">



                              <br />
                              <div class="main-card card">
                              <div class="card-body">
                                <h5 class="card-title">ผลการค้นหา</h5>

                                <table style="width: 100%;"  class="table table-hover table-striped ">
                                  <thead>
                                  <tr>
                                      <th>หมายเลขสมาชิก</th>
                                      <th>สถานะ</th>
                                      <th>
                                        ชื่อ-นามสกุล
                                      </th>



                                      <th>ประเภท</th>
                                      <th>จำนวน ขม.T.</th>
                                      <th>

                                      </th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    @if(isset($objs))
                                    @foreach($objs as $u)
                                    <tr id="{{$u->id}} ">
                                      <td>
                                        #{{$u->no_mem}}
                                      </td>
                                      <td>
                                        <button class="mb-2 mr-2 btn btn-success btn-sm">{{$u->start_at}}
                                              </button>
                                      </td>
                                      <td>
                                        <div class="widget-content p-0">
                                                          <div class="widget-content-wrapper">

                                                              <div class="widget-content-left mr-3">
                                                                  <div class="widget-content-left">
                                                                      <a href="{{url('admin/member/'.$u->id.'/history')}}"><img width="40" class="rounded-circle" src="{{url('assets/images/avatar/'.$u->image_mem)}}" alt=""></a>
                                                                  </div>
                                                              </div>
                                                              <div class="widget-content-left flex2">
                                                                  <div class="widget-heading"><a href="{{url('admin/member/'.$u->id.'/history')}}">{{$u->first_name_mem}} {{$u->last_name_mem}}</a></div>
                                                                  <div class="widget-subheading">{{$u->phone_mem}}</div>
                                                              </div>

                                                          </div>
                                                      </div>
                                      </td>

                                      <td>
                                        @if($u->type_mem == 1)
                                        รายวัน
                                        @elseif($u->type_mem == 2)
                                        รายเดือน
                                        @else
                                        รายปี
                                        @endif
                                      </td>
                                      <td>
                                        @if($u->pt_hr == null)
                                        0
                                        @else
                                        {{$u->pt_hr}}
                                        @endif
                                        ชม.
                                      </td>
                                      <td>
                                        <button class="btn-f mb-2 mr-2 btn-pill btn-transition btn btn-outline-primary" data-id="101" data-tp="{{$u->pt_id}}">ฟิตเนส</button>
                                        <button class="btn-f mb-2 mr-2 btn-pill btn-transition btn btn-outline-primary" data-id="102" data-tp="{{$u->pt_id}}">เทรนเนอร์</button>
                                        <button class="btn-f mb-2 mr-2 btn-pill btn-transition btn btn-outline-primary" data-id="103" data-tp="{{$u->pt_id}}">คลาส</button>
                                        <button class="btn-f mb-2 mr-2 btn-pill btn-transition btn btn-outline-primary" data-id="104" data-tp="{{$u->pt_id}}">ว่ายน้ำ</button>
                                      </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                  </tbody>


                                </table>






                              </div>
                              </div>




                            </div>

                        </div>




                    </div>

@stop



@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".btn-f").click(function(e){
    var abc = $(this).attr('data-id');
    var tp_id = $(this).attr('data-tp');

    console.log(abc);
       e.preventDefault();
    var user_id = $(this).closest('tr').attr('id');

    $.ajax({
            type:'POST',
            url:'{{url('api/api_tech_status')}}',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { "user_id" : user_id, "data_id" : abc, "tp_id" : tp_id},
            success: function(data){
              if(data.data.success == 1001){


                swal("สำเร็จ!", "ได้ทำการ Check In สำเร็จ!", "success");



              }else{
                swal("TP ของท่านหมด!", "กรุณาเติมเงินก่อนเข้าใช้บริการ!");
              }
            }
        });
    });
});
</script>


@stop('scripts')
