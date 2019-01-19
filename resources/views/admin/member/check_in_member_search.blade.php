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



<style>
.dropdown-menu-header .menu-header-image {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    z-index: 8;
    opacity: 1;
    filter: grayscale(0%);
    background-size: cover;
}
</style>
<div class="tabs-animation">
                        <div class="row">


                            <div class="col-lg-6 offset-md-3">


                              <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">ค้นหาสมาชิก</h5>

                                  <br />


                                  <div class="search-wrapper active" style="margin-top:5px; width: 100%;">
                                    <form class="" method="POST"  action="{{url('admin/search_mem_checkin')}}" enctype="multipart/form-data" novalidate="novalidate">
                                    {{ csrf_field() }}
                                      <div class="input-holder" style="width: 100%;">
                                          <input type="text" class="search-input" value="{{$search}}" name="search" placeholder="Search">
                                          <button class="search-icon" type="submit"><span></span></button>
                                      </div>
                                      </form>
                                  </div>

                                  <br />


                                  <div class="mb-3 profile-responsive card">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-dark">
                                          <div class="menu-header-image" >
                                          <img src="{{url('assets/images/123456.png')}}" style="width:100%">
                                        </div>
                                            <div class="menu-header-content" style="width:100%; bottom:-110px;">


                                                <div class=" rounded" style=" z-index:99; ">
                                                  <h5 style="font-size: 1.2rem; " > {{$objs->no_mem}} </h5>
                                                    <img  class="rounded-circle" src="{{url('assets/images/avatar/'.$objs->image_mem)}}" style="width: 45%; margin-bottom:-110px;  border-radius: 50%;">

                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <ul class="list-group list-group-flush">
                                      <li class="p-0 list-group-item">
                                          <div class="widget-content">
                                              <div class="text-center" style = 'margin-top: 190px; width:100%'>
                                                <div class="menu-header-btn-pane">
                                                  <div class="menu-header-btn-pane">
                                                    <h5 style="font-size: 22px;; color:#f30f1a; margin-bottom: .2rem;" >ยินดีต้อนรับคุณ </h5>
                                                      <h5 style="font-size: 18px;; color:#f30f1a; margin-bottom: .2rem;" > {{$objs->first_name_mem}} {{$objs->last_name_mem}}</h5>
                                                      <button type="button" class="btn-wide btn-shadow btn btn-danger">@if($objs->type_mem == 1)
                                                      รายวัน
                                                      @elseif($objs->type_mem == 2)
                                                      รายเดือน
                                                      @else
                                                      รายปี
                                                      @endif</button>
                                                  </div>
                                                  <img style="margin:0 auto; width: 55%;" class="img-responsive" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($objs->no_mem)) !!} "><br />

                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                      <li class="p-0 list-group-item">
                                          <div class="grid-menu grid-menu-2col" style="background-color: #343a40 !important;">
                                              <div class="no-gutters row">
                                                  <div class="col-sm-12">
                                                      <div class="p-1 text-center" >
                                                        <h6 class="menu-header-subtitle" style="color:#fff; padding-bottom:10px;">หมดอายุสมาชิก <?php echo DateThai($objs->end_at); ?><br />ออกบัตร <?php echo DateThai($objs->start_at); ?></h6>

                                                      </div>
                                                  </div>

                                              </div>
                                          </div>
                                      </li>
                                    </ul>
                                </div>






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
