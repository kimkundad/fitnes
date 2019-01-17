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
                            <div class="col-lg-12 ">


                              <div class="main-card mb-3 card">
                                <div class="card-body"><h4>สมาชิก เลขที่ #{{$objs->no_mem}}</h4>
                                  <br />
                                  <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left mr-3">
                                                            <div class="widget-content-left">
                                                                <img width="40" class="rounded-circle" src="{{url('assets/images/avatar/'.$objs->image_mem)}}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{$objs->first_name_mem}} {{$objs->last_name_mem}}</div>
                                                            <div class="widget-subheading">ประเภทสมาชิก : @if($objs->type_mem == 1)
                                                            รายวัน
                                                            @elseif($objs->type_mem == 2)
                                                            รายเดือน
                                                            @else
                                                            รายปี
                                                            @endif วันหมดอายุ : <?php echo DateThai($objs->end_at); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br />
                                          <div class="row">
                                              <div class="col-md-4">
                                                <h5>ประเภทการเข้าใช้งาน</h5>
                                                  <div class="widget-content">
                                                    <div class="text-center">
                                                        <canvas id="myChart"></canvas>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-8">

                                                <h5>วันที่เข้าใช้บริการ</h5>
                                                <br />
                                                <?php echo DateThai($objs->start_at); ?>
                                                <hr />
                                                <p>
                                                  <b>เวลาที่เข้าใช้</b><br />
                                                  <br />
                                                  10.30-14.30 น.
                                                </p>
                                                <hr />
                                              </div>


                                                <div class="col-md-6">
                                                  <br />
                                                <h5>ประวัติการเติมเงิน</h5>
                                                </div>

                                                <div class="col-md-6">


                                                </div>

                                                <div class="col-md-12">
                                                  <table style="width: 100%;" class="table table-hover table-striped ">
                                                    <thead>
                                                    <tr>
                                                      <td>
                                                        ลำดับ
                                                      </td>
                                                      <td>
                                                        วันที่เติม
                                                      </td>
                                                      <td>
                                                        จำนวนเงิน
                                                      </td>
                                                      <td>
                                                        TP
                                                      </td>
                                                      <td>
                                                       ประเภทสมาชิก
                                                      </td>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                      @if(isset($get_data))
                                                        @foreach($get_data as $u)
                                                      <tr>
                                                        <td>
                                                          {{$s}}
                                                        </td>
                                                        <td>

                                                          <?php echo DateThai($u->created_at1); ?>
                                                        </td>
                                                        <td>
                                                          @if($u->mem_money_mem != " ")
                                                          {{$u->mem_money_mem}}

                                                          @endif

                                                          @if($u->pt_money_mem != " ")
                                                          {{$u->pt_money_mem}}

                                                          @endif


                                                        </td>

                                                        <td>
                                                          {{$u->pt_hr_mem}}
                                                        </td>

                                                        <td>

                                                          @if($u->mem_type == 1)
                                                          รายวัน
                                                          @elseif($u->mem_type == 2)
                                                          รายเดือน
                                                          @else
                                                          รายปี
                                                          @endif

                                                        </td>

                                                      </tr {{$s++}}>
                                                        @endforeach
                                                      @endif
                                                    </tbody>


                                                  </table>
                                                </div>


                                          </div>

                                </div>
                            </div>




                            </div>

                        </div>




                    </div>

@stop



@section('scripts')

<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["ฟิตเนส","เทรนเนอร์","คลาส","ว่ายน้ำ"],
        datasets: [{
            label: '# of Votes',
            data: [
              @if(isset($get_array))
              @foreach($get_array as $u)
              {{$u}},
              @endforeach
              @endif
            ],
            backgroundColor:[window.chartColors.red,window.chartColors.orange,window.chartColors.yellow,window.chartColors.green,window.chartColors.blue],
        }]
    },
    options: {

      legend: {
    display: false,
      labels: {
        display: false
      }
  }

    }
});
</script>

<script>
function onSelectChange(){
 document.getElementById('frm').submit();
}
</script>

@stop('scripts')
