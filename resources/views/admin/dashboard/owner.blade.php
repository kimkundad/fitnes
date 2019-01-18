@extends('admin.layouts.template')

@section('admin.content')

<style>
.search-wrapper.active .input-holder {
    width: 480px;
}
</style>

<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-airplay icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>Owner Dashboard ของ GT Fitnes
                                    <div class="page-title-subheading">สรุปข้อมูลทั้งหมดของ GT Fitnes ทั้งหมด
                                    </div>
                                </div>
                            </div>


                            <div class="page-title-actions">
                              <a href="{{url('admin/table_course/create')}}"  class="btn-shadow btn btn-info">
                                  <span class="btn-icon-wrapper pr-2 opacity-7">
                                      <i class="icon ion-android-add"></i>
                                  </span>
                                  เพิ่ม CLASS
                              </a>

                            </div>







                          </div>
                    </div>

<div class="tabs-animation">
                        <div class="row">

                          <div class="col-lg-6">

                            <div class="main-card card">
                            <div class="card-body">
                              <h5 class="card-title">ยอดขายค่าสมาชิกแบ่งตามประเภทสมาชิก </h5>
                              <canvas id="myChart"></canvas>
                              <br />

                              <h5 class="card-title">สัดส่วนประเภทสมาชิก </h5>
                              <canvas id="myChart2"></canvas>

                              <br />

                              <h5 class="card-title">สัดส่วนสถานะสมาชิก </h5>
                              <canvas id="myChart3"></canvas>
                            </div>
                            </div>

                        </div>

                        <div class="col-lg-6">
                          <div class="main-card card">
                          <div class="card-body">
                          <div class="widget-chart-content ">
                                                <div class="widget-chart-flex">
                                                    <div class="widget-numbers">
                                                        <div class="widget-chart-flex">
                                                            <div class="fsize-4">
                                                                <small class="opacity-5">฿</small>
                                                                <span>{{number_format($get_all_count)}}</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 class="card-title" style="font-size:18px; margin-bottom: 1rem;">ยอดขายค่าสมาชิก</h5></div>
                                              </div>
                                              </div>


                                              <br />
                                              <div class="main-card card">
                                              <div class="card-body">

                                              <canvas id="line-chart1"></canvas>

                                                                  </div>
                                                                  </div>


                                                                  <br />


                                                                  <div class="main-card card">
                                                                  <div class="card-body">
                                                                    <h5 class="card-title">สมาชิกใกล้หมดอายุ <div class="badge badge-warning mr-2">{{$get_data_expire}}</div></h5>


                                                                    <table style="width: 100%;"  class="table table-hover table-striped ">
                                                                      <thead>
                                                                      <tr>


                                                                          <th>
                                                                            ชื่อ-นามสกุล
                                                                          </th>



                                                                          <th>ประเภท</th>
                                                                          <th>
                                                                            เบอร์ติดต่อ
                                                                          </th>
                                                                          <th>

                                                                          </th>
                                                                      </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                        @if(isset($objs))
                                                                        @foreach($objs as $u)
                                                                        @if($u->get_data_expire == 1)
                                                                        @if($a <= 10)
                                                                        <tr>

                                                                          <td>
                                                                            <div class="widget-content p-0">
                                                                                              <div class="widget-content-wrapper">
                                                                                                  <div class="widget-content-left mr-3">
                                                                                                      <div class="widget-content-left">
                                                                                                          <img width="40" class="rounded-circle" src="{{url('assets/images/avatar/'.$u->image_mem)}}" alt="">
                                                                                                      </div>
                                                                                                  </div>
                                                                                                  <div class="widget-content-left flex2">
                                                                                                      <div class="widget-heading">{{$u->first_name_mem}} {{$u->last_name_mem}}</div>

                                                                                                      @if($u->days <= 0)
                                                                                                      <div class="badge badge-danger ml-2">หมดอายุ</div>
                                                                                                      @else
                                                                                                      <div class="badge badge-warning ml-2">{{$u->days}} วัน</div>
                                                                                                      @endif

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
                                                                            {{$u->phone_mem}}
                                                                          </td>
                                                                          <td>

                                                                            <a class="mb-2 mr-2 btn-pill btn btn-primary" href="{{url('admin/member/'.$u->id.'/history')}}">ดูประวัติ</a>
                                                                          </td>
                                                                        </tr {{$a++}}>
                                                                        @endif
                                                                        @endif
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="{{url('assets/fullcalendar/lib/moment.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/fullcalendar/fullcalendar.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/fullcalendar/locale/th.js')}}"></script>

<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["รายปี","รายเดือน","รายวัน","Trainer Only"],
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

  }

    }
});
</script>


<script>
var ctx = document.getElementById("line-chart1");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: '# of Votes',
            data: [
              @if(isset($get_date))
              @foreach($get_date as $j)
              {{$j}},
              @endforeach
              @endif
            ],
            backgroundColor:[window.chartColors.blue],
            borderColor: [
                window.chartColors.blue,
            ],
        }]
    },
    options: {

      scales: {
            yAxes: [{
                stacked: true
            }]
        }

  }

});
</script>

<script>
var ctx = document.getElementById("myChart2");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["รายปี","รายเดือน","รายวัน","Trainer Only"],
        datasets: [{
            label: '# of Votes',
            data: [
              @if(isset($get_mem_type))
              @foreach($get_mem_type as $u)
              {{$u}},
              @endforeach
              @endif
            ],
            backgroundColor:[window.chartColors.red,window.chartColors.orange,window.chartColors.yellow,window.chartColors.green,window.chartColors.blue],
        }]
    },
    options: {

      legend: {

  }

    }
});
</script>


<script>
var ctx = document.getElementById("myChart3");
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["เหลือ 30","เหลือ 15","เต็ม","หมดอายุ"],
        datasets: [{
            label: '# of Votes',
            data: [
              @if(isset($get_mem_status))
              @foreach($get_mem_status as $u)
              {{$u}},
              @endforeach
              @endif
            ],
            backgroundColor:[window.chartColors.red,window.chartColors.orange,window.chartColors.yellow,window.chartColors.green,window.chartColors.blue],
        }]
    },
    options: {

      legend: {

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
