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


                              <div class="row">
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                          <h5 class="card-title">เพิ่ม Class เรียน</h5>
                                            <form class="" method="POST" action="{{$url}}" enctype="multipart/form-data">
                                              {{ method_field($method) }}
                                              {{ csrf_field() }}
                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">คำอธิบาย<span class="text-danger">*</span></label>
                                                  <input name="title_event" placeholder="Yoka, Kick Boxing" type="text" class="form-control">
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">class เรียน <span class="text-danger">*</span></label>
                                                  <select name="class_id" id="exampleSelect" class="form-control">
                                                    <option > -- เลือก class เรียน -- </option>
                                                    @if(isset($course))
                                                    @foreach($course as $u)
                                                    <option value="{{$u->id}}">{{$u->course_name}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
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


                            </div>




                            </div>

                        </div>




                    </div>

@stop



@section('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
@stop('scripts')
