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

                              <div id="canvas">
                              <div class="main-card card" >
                              <div class="card-body text-center">
                                <h5 style="font-size: 1.20rem;">ยินดีต้อนรับคุณ {{$objs->first_name_mem}} {{$objs->last_name_mem}}</h5>
                                <h5 style="font-size: 1.20rem;">หมายเลขสมาชิก {{$objs->no_mem}} </h5>
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
                                <br />
                                <a class="colormycanvas mb-2 mr-2 btn-pill btn btn-secondary" href="{{url('admin/member')}}">เสร็จสิ้น
                                </a>
                                <button class="colormycanvas mb-2 mr-2 btn-pill btn btn-secondary" id="colormycanvas">DOWNLOAD
                                            </button>
                              </div>
                              </div>

                              </div>

                              </div>




                            </div>

                        </div>




                    </div>

@stop



@section('scripts')
<script type="text/javascript" src="{{url('assets/scripts/html2canvas.js')}}"></script>
<script>





document.getElementById("colormycanvas").addEventListener("click", function() {


    html2canvas(document.querySelector('#canvas')).then(function(canvas) {

        saveAs(canvas.toDataURL(), 'file-name.jpg');
    });

});

function saveAs(uri, filename) {

    var link = document.createElement('a');

    if (typeof link.download === 'string') {

        link.href = uri;
        link.download = filename;

        //Firefox requires the link to be in the body
        document.body.appendChild(link);

        //simulate click
        link.click();

        //remove the link when done
        document.body.removeChild(link);

    } else {

        window.open(uri);

    }
}

</script>


@stop('scripts')
