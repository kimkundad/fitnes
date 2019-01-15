@extends('admin.layouts.template')

@section('admin.content')

<style>
.search-wrapper.active .input-holder {
    width: 480px;
}
</style>

<div class="app-page-title">
                        <div class="page-title-wrapper">


                            <div class="row">

                              <div class="col-lg-10">



                                <div class="search-wrapper active" >

                                  <form class="" method="POST" action="{{url('search_mem_dash')}}" enctype="multipart/form-data" novalidate="novalidate">
                                  {{ csrf_field() }}

                                    <div class="input-holder">
                                        <input type="text" class="search-input" name="search" value="{{$search}}" placeholder="ค้นหาสมาชิกเพื่อ Check In">
                                        <button class="search-icon" type="submit"><span></span></button>
                                    </div>
                                    </form>
                                </div>

                              </div>

                              <div class="col-lg-2">
                                <a href="{{url('admin/member/create')}}" style="margin-left:140px;" class="btn-shadow btn-wide fsize-1 btn btn-info btn-lg pull-right">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="icon ion-android-add"></i>
                                    </span>
                                    สมัครสมาชิก
                                </a>
                              </div>

                            </div>



                          </div>
                    </div>

<div class="tabs-animation">
                        <div class="row">
                            <div class="col-lg-12 ">


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
                                  @if(isset($get_data_meme))
                                  @foreach($get_data_meme as $u)
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






                              <div class="row">

                                <div class="col-lg-12">







                                  <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">

                                    <li class="nav-item">
                                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                                <span>All</span>
                                            </a>
                                        </li>

                                  @if($course)
                                  @foreach($course as $u)

                                  <li class="nav-item">
                                      <a role="tab" class="nav-link" id="tab-{{$s}}" data-toggle="tab" href="#tab-content-{{$s}}">
                                          <span>{{$u->course_name}}</span>
                                      </a>
                                  </li>
                                  <?php $s++; ?>
                                  @endforeach
                                  @endif

                                  <!--    <li class="nav-item">
                                          <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                              <span>All</span>
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                          <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                              <span>Yoka</span>
                                          </a>
                                      </li>
                                      <li class="nav-item">
                                          <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
                                              <span>Kick Boxing</span>
                                          </a>
                                      </li> -->

                                  </ul>


                                  <div class="tab-content">
                                      <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                          <div class="main-card mb-3 card">
                                              <div class="card-body">
                                                  <div id='calendar0'></div>
                                              </div>
                                          </div>
                                      </div>
                                      @if($course)
                                      @foreach($course as $u)
                                      <div class="tab-pane tabs-animation fade" id="tab-content-{{$j}}" role="tabpanel">
                                          <div class="main-card mb-3 card">
                                              <div class="card-body">
                                                  <div id='calendar{{$j}}'></div>
                                              </div>
                                          </div>
                                      </div>
                                      <?php $j++; ?>
                                      @endforeach
                                      @endif

                                  </div>



                                </div>
                                </div>



                              <div class="row">

                                <div class="col-lg-6">

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
                                        @if($a <= 5)
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
                                            <button class="mb-2 mr-2 btn-pill btn btn-primary">ดูประวัติ</button>

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

                                <div class="col-lg-6">

                                  <div class="main-card card">
                                  <div class="card-body">
                                    <h5 class="card-title">สมาชิกล่าสุด</h5>


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
                                        @foreach($objs as $j)
                                        @if($j->get_data_expire1 == 1)
                                        @if($b <= 5)
                                        <tr>

                                          <td>
                                            <div class="widget-content p-0">
                                                              <div class="widget-content-wrapper">
                                                                  <div class="widget-content-left mr-3">
                                                                      <div class="widget-content-left">
                                                                          <img width="40" class="rounded-circle" src="{{url('assets/images/avatar/'.$j->image_mem)}}" alt="">
                                                                      </div>
                                                                  </div>
                                                                  <div class="widget-content-left flex2">
                                                                      <div class="widget-heading">{{$j->first_name_mem}} {{$j->last_name_mem}}</div>


                                                                      <div class="badge badge-success ml-2">{{$j->start_at}}</div>



                                                                  </div>
                                                              </div>
                                                          </div>
                                          </td>

                                          <td>
                                            @if($j->type_mem == 1)
                                            รายวัน
                                            @elseif($j->type_mem == 2)
                                            รายเดือน
                                            @else
                                            รายปี
                                            @endif
                                          </td>
                                          <td>
                                            {{$j->phone_mem}}
                                          </td>
                                          <td>
                                            <button class="mb-2 mr-2 btn-pill btn btn-primary">ดูประวัติ</button>

                                          </td>
                                        </tr {{$b++}}>
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

                        </div>




                    </div>

@stop



@section('scripts')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="{{url('assets/fullcalendar/lib/moment.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/fullcalendar/fullcalendar.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/fullcalendar/locale/th.js')}}"></script>

<script>

$(document).ready(function () {

    $('#calendar0').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay',
        },
        events: {
            url: '{{url('get_event')}}',
            error: function() {

            }
        },
        eventLimit:true,
        lang: 'th'
    });

    @if($course)
    @foreach($course as $u)

    $('#calendar{{$k}}').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay',
        },
        events: {
            url: '{{url('get_event_c/'.$u->id)}}',
            error: function() {

            }
        },
        eventLimit:true,
        lang: 'th'
    });
    <?php $k++; ?>
    @endforeach
    @endif


});

</script>


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
