@extends('admin.layouts.template')

@section('admin.content')


<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-news-paper icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>ตาราง Class เรียนของ GT Fitnes
                                    <div class="page-title-subheading">ตาราง Class เรียนของ GT Fitnes ทั้งหมด
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
                            <div class="col-lg-12 ">


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

@stop('scripts')
