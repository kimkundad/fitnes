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
                                <div>รายชื่อสมาชิก GT Fitnes
                                    <div class="page-title-subheading">รายชื่อสมาชิก ของ GT Fitnes ทั้งหมด
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

                        <!--      <div id="canvas" style="font-family: 'tahoma', sans-serif; ">
                              <div class="main-card card" >
                              <div class="card-body text-center" style="font-family: 'tahoma', sans-serif;">
                                <table class="col-lg-12 offset-md-3" style = 'text-align:justify; width:100%'>
                                  <tr>
                                    <td>
                                        <h5 style="font-size: 1.20rem; " >ยินดีต้อนรับคุณ {{$objs->first_name_mem}} {{$objs->last_name_mem}}</h5>
                                        <h5 style="font-size: 1.20rem; font-family: 'tahoma', sans-serif;" >หมายเลขสมาชิก {{$objs->no_mem}} </h5>
                                    </td>
                                  </tr>
                                </table>


                                <br />
                                <div class="main-card card">
                                  <div class="card-body text-center">
                                  <img src="{{url('assets/images/logo-inverse.png')}}" /><br />
                                  <br />
                                  <img width="82" class="rounded-circle" src="{{url('assets/images/avatar/'.$objs->image_mem)}}" alt="">
                                  <p>
                                    <b>{{$objs->first_name_mem}} {{$objs->last_name_mem}}</b>
                                    <br />
                                    ประเภทสมาชิก
                                    @if($objs->type_mem == 1)
                                    รายวัน
                                    @elseif($objs->type_mem == 2)
                                    รายเดือน
                                    @else
                                    รายปี
                                    @endif
                                    <br />
                                    วันหมดอายุ <?php echo DateThai($objs->end_at); ?><br />
                                    <img style="margin:0 auto;" class="img-responsive" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($objs->no_mem)) !!} "><br />
                                    {{$objs->no_mem}}
                                  </p>
                                  </div>
                                </div>

                              </div>
                              </div>

                            </div> -->

                              </div>

<link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
<style>
.btn-danger {
  font-family: 'Prompt', sans-serif;
    color: #fff;
    background-color: #e2141c;
    border-color: #e2141c;
}
.circle-icon {
  font-family: 'Prompt', sans-serif;
    background: #ffc0c0;
    padding:30px;
    border-radius: 50%;
}
.dropdown-menu-header .menu-header-image {
  font-family: 'Prompt', sans-serif;
    position: relative;
    left: 0;
    top: 0;
    height: 480px;
    width: 100%;
    z-index: 0;
    opacity: 1;
    filter: grayscale(0%);
    background-size: cover;
}

.list-group-item {
  font-family: 'Prompt', sans-serif;
    position: relative;
    display: block;
    padding: .75rem 1.25rem;
    margin-bottom: -1px;
    background-color: #fff;
    border: 1px solid rgba(255, 255, 255, 0.125);
}
</style>


                              <div class="col-lg-6" >

                                <div class="mb-3 profile-responsive card" style="height:1366px; width:768px; font-family: 'Prompt', sans-serif!important; " id="canvas">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner" style="   padding:0px">
                                            <div class="menu-header-image" >
                                            <img src="{{url('assets/images/123456.png')}}">
                                          </div>
                                            <div class="menu-header-content" style="width:100%">



                                                <div class=" rounded" style="margin: 0 auto; z-index:99;">
                                                    <img  class="rounded-circle" src="{{url('assets/images/avatar/'.$objs->image_mem)}}" style="position: absolute; left: 170px; top: -230px; width:420px; height:420px; margin-bottom:-110px; border-radius: 50%;">

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="p-0 list-group-item">
                                            <div class="widget-content" style="height: 734px;">
                                                <div class="text-center">
                                                  <div class="menu-header-btn-pane">
                                                    <br /><br /><br /><br />

                                                    <table class="col-lg-12 offset-md-4" style = 'margin-top: 120px; text-align:justify; width:100%'>
                                                      <tr>
                                                        <td>
                                                            <h5 style="font-size: 36px;; color:#f30f1a" >ยินดีต้อนรับคุณ </h5>

                                                        </td>
                                                      </tr>
                                                    </table>
                                                    @if(strlen($objs->first_name_mem.''.$objs->last_name_mem) < 9)
                                                    <table class="col-lg-12 offset-md-3" style = ' text-align:justify; width:100%'>
                                                      <tr>
                                                        <td>
                                                            <h5 style="font-size: 36px;; color:#f30f1a" > {{$objs->first_name_mem}} {{$objs->last_name_mem}}</h5>
                                                        </td>
                                                      </tr>
                                                    </table>
                                                    @else
                                                    <table class="col-lg-12 offset-md-4" style = ' text-align:justify; width:100%'>
                                                      <tr>
                                                        <td>
                                                            <h5 style="font-size: 36px;; color:#f30f1a" > {{$objs->first_name_mem}} {{$objs->last_name_mem}}</h5>
                                                        </td>
                                                      </tr>
                                                    </table>
                                                    @endif
                                                    <br />

                                                    <table class="col-lg-12" style = 'margin-left: 300px; text-align:justify; width:100%'>
                                                      <tr>
                                                        <td>
                                                      <div  class="btn-wide btn-shadow  btn btn-danger" style="font-size: 30px; text-align:justify;">@if($objs->type_mem == 1)
                                                      รายวัน
                                                      @elseif($objs->type_mem == 2)
                                                      รายเดือน
                                                      @else
                                                      รายปี
                                                      @endif</div>
                                                    </td>
                                                  </tr>
                                                </table>
                                                      <br />

                                                      <img style="margin:0 auto; width:320px;" class="img-responsive" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate($objs->no_mem)) !!} "><br />
                                                  </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="p-0 list-group-item">
                                            <div class="grid-menu grid-menu-2col" style="background-color: #343a40 !important;">
                                                <div class="no-gutters row">
                                                    <div class="col-sm-12">
                                                        <div class="p-1" style="padding: 30px !important; height: 150px;">
                                                          <table class="col-lg-12 offset-md-1" style = 'text-align:justify; width:100%'>
                                                            <tr>
                                                              <td>
                                                                  <h5 style="font-size: 2.8rem; color:#fff; padding-left:30px;" >หมดอายุสมาชิก <?php echo DateThai($objs->end_at); ?></h5>

                                                                  <h5 class="col-lg-12 offset-md-3" style="font-size: 24px; color:#fff">ออกบัตร <?php echo DateThai($objs->start_at); ?></h5>
                                                              </td>
                                                            </tr>
                                                          </table>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                </div>
                                <div class="col-lg-6 offset-md-2">
                                <a class="colormycanvas mb-2 mr-2 btn-pill btn btn-secondary" href="{{url('admin/member')}}">เสร็จสิ้น
                                </a>
                                <button class="colormycanvas mb-2 mr-2 btn-pill btn btn-secondary" id="colormycanvas">DOWNLOAD
                                            </button>
                                </div>


                            </div>

                        </div>




                    </div>

@stop



@section('scripts')
<script src="https://votesmart.me/front/vendor/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script>


document.getElementById('colormycanvas').addEventListener('click', function () {




  html2canvas($('#canvas'), {
    allowTaint: true,
    onrendered: function (canvas) {
      var imgString = canvas.toDataURL("image/png");
      console.log(imgString);

      var a = document.createElement('a');
      a.href = imgString;
      a.download = "image.png";
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
    }

  });

}, false);




</script>


@stop('scripts')
