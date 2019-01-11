@extends('admin.layouts.template')

@section('admin.content')

<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-plugin icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>Class เรียนของ GT Fitnes
                                    <div class="page-title-subheading">Class เรียนของ GT Fitnes ทั้งหมด
                                    </div>
                                </div>
                            </div>


                            <div class="page-title-actions">
                              <a href="{{url('admin/course/create')}}"  class="btn-shadow btn btn-info">
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


                              <div class="row">

                                <div class="col-md-12">
                                  <div class="main-card mb-3 card">
                                    <div class="card-body">
                                  <div id='calendar1'></div>
                                  </div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">แก้ไข Class เรียน</h5>
                                            <form class="" method="POST" action="{{$url}}" enctype="multipart/form-data">
                                              {{ method_field($method) }}
                                              {{ csrf_field() }}

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">ชื่อ Class เรียน</label>
                                                  <input name="course_name" placeholder="Yoka, Kick Boxing" value="{{$objs->course_name}}" type="text" class="form-control">
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">เลือกหมวดหมู่</label>
                                                  <select name="cat_id" id="exampleSelect" class="form-control">
                                                    @if(isset($category))
                                                    @foreach($category as $u)
                                                    <option value="{{$u->id}}" @if($objs->cat_id == $u->id)
                                  selected='selected'
                                  @endif>{{$u->name_cat}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">ราคา</label>
                                                  <input name="course_price" placeholder="1500" type="text" value="{{$objs->course_price}}" class="form-control">
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">รายละเอียด</label>
                                                  <textarea name="course_detail" style="height:150px" value="{{$objs->course_detail}}" class="form-control"></textarea>
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">หมายเหตุ</label>
                                                  <textarea name="course_remark" style="height:150px" value="{{$objs->course_remark}}" class="form-control"></textarea>
                                                </div>

                                                <button class="mt-1 btn btn-primary" type="submit">เพิ่มข้อมูล</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="main-card mb-3 card">
                                    <div class="card-body">

                                      <h5 class="card-title">เพิ่ม Class เรียน</h5>
                                        <form class="" method="POST" action="{{url('post_class_in')}}" enctype="multipart/form-data">

                                          {{ csrf_field() }}
                                            <div class="position-relative form-group">
                                              <label for="exampleEmail" class="">คำอธิบาย<span class="text-danger">*</span></label>
                                              <input name="title_event" placeholder="Yoka, Kick Boxing" type="text" class="form-control">
                                              <input name="class_id" value="{{$objs->id}}" type="hidden" class="form-control">
                                            </div>



                                            <div class="position-relative form-group">
                                              <label for="exampleEmail" class="">ผู้สอน</label>
                                              <select name="t_id" id="exampleSelect" class="form-control">
                                                <option value=""> -- เลือก ผู้สอน -- </option>
                                                @if(isset($trainer))
                                                @foreach($trainer as $u)
                                                <option value="{{$u->id}}">{{$u->trainer_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            </div>

                                            <div class="position-relative form-group">
                                              <label for="exampleEmail" class="">ชื่อ Class เรียน<span class="text-danger">*</span></label>
                                              <select name="color_event" id="exampleSelect" class="form-control">
                                                <option value="#3f6ad8">น้ำเงิน</option>
                                                <option value="#6c757d">เทา</option>
                                                <option value="#3ac47d">เขียว</option>
                                                <option value="#16aaff">ฟ้า</option>
                                                <option value="#f7b924">เหลือง</option>
                                                <option value="#d92550">แดง</option>
                                                <option value="#eee">ขาว</option>
                                                <option value="#212529">ดำ</option>
                                            </select>
                                            </div>
                                            <div class="position-relative form-group">
                                              <label for="exampleEmail" class="">วันที่เรียน<span class="text-danger">*</span></label>
                                              <input type="text" name="start_event" class="form-control date-pick" id="filter-date2" >
                                            </div>
                                            <div class="position-relative form-group">
                                              <label for="exampleEmail" class="">สิ้นสุดวันที่<span class="text-danger">*</span></label>
                                              <input type="text" name="end_event" class="form-control date-pick" id="filter-date3" >
                                            </div>

                                            <button class="mt-1 btn btn-primary" type="submit">เพิ่มข้อมูล</button>
                                        </form>

                                  </div>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="main-card mb-3 card">
                                    <div class="card-body">
                                      <table style="width: 100%;" id="example" class="table table-hover table-striped ">
                                        <thead>
                                        <tr>
                                            <th>คำอธิบาย</th>
                                            <th>ผู้สอน</th>
                                            <th>
                                            วันที่เรียน
                                            </th>



                                            <th>สิ้นสุดวันที่</th>

                                            <th style="width:180px;">
                                              จัดการ
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          @if($get_class)
                                          @foreach($get_class as $u)
                                          <tr>

                                            <td>
                                              {{$u->title_event}}
                                            </td>
                                            <td>
                                              {{$u->trainer_name}}
                                            </td>
                                            <td>
                                              {{$u->start_event}}
                                            </td>
                                            <td>
                                              {{$u->end_event}}
                                            </td>
                                            <td>
                                              <a class="mb-2 mr-2 btn-icon btn-icon-only btn btn-link btn-sm" href="{{url('edit_c_t/'.$u->idc)}}" style="float: left;"><b><i class="pe-7s-config btn-icon-wrapper"> </i> แก้ไข</b></a>
                                              <form  action="{{url('admin/del_class_t/')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                                                  <input type="hidden" name="_method" value="POST">
                                                  <input type="hidden" name="id_c" value="{{$u->idc}}">
                                                  <input type="hidden" name="class_id" value="{{$u->class_id}}">
                                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                  <button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn btn-link" ><b><i class="pe-7s-trash btn-icon-wrapper"> </i> ลบ</b></button>
                                              </form>

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

                        </div>




                    </div>

@stop
<div class="app-drawer-overlay d-none animated fadeIn"></div>


@section('scripts')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="{{url('assets/fullcalendar/lib/moment.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/fullcalendar/fullcalendar.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/fullcalendar/locale/th.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{url('assets/datetimepicker-master/jquery.datetimepicker.css')}}"/>
<script src="{{url('assets/datetimepicker-master/build/jquery.datetimepicker.full.js')}}"></script>
<script>
jQuery(document).ready(function () {
      'use strict';

      jQuery('#filter-date2').datetimepicker({
        format: 'Y-m-d H:i',
        lang:'th',
        value: new Date(),
        allowTimes:[
          '07:00', '07:30', '08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30',
          '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30',
          '19:00', '19:30', '20:00', '20:30', '21:00'
         ]
        });

        jQuery('#filter-date3').datetimepicker({
          format: 'Y-m-d H:i',
          lang:'th',
          value: new Date(),
          allowTimes:[
            '07:00', '07:30', '08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30',
            '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30', '18:00', '18:30',
            '19:00', '19:30', '20:00', '20:30', '21:00'
           ]
          });



  });
</script>
<script>

$(document).ready(function () {
    $('#calendar1').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay',
        },
        events: {
            url: '{{url('get_event_c/'.$objs->id)}}',
            error: function() {

            }
        },
        eventLimit:true,
        lang: 'th'
    });
});

</script>

@stop('scripts')
