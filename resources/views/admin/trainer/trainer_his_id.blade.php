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
                                    <i class="pe-7s-ball icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>ข้อมูล Trainer GT Fitnes
                                    <div class="page-title-subheading">ข้อมูล Trainer GT Fitnes ในระบบ ทั้งหมด
                                    </div>
                                </div>
                            </div>


                            <div class="page-title-actions">
                              <a href="{{url('admin/trainer/create')}}"  class="btn-shadow btn btn-info">
                                  <span class="btn-icon-wrapper pr-2 opacity-7">
                                      <i class="icon ion-android-add"></i>
                                  </span>
                                  เพิ่ม trainer
                              </a>

                            </div>







                          </div>
                    </div>


                          <div class="row">
                              <div class="col-lg-12 ">


                                <div class="main-card card">
                          <div class="card-body">

                            <h5>ประวัติและสถิติ</h5>
                            <br />
                            <div class="widget-content p-0">
                                              <div class="widget-content-wrapper">
                                                  <div class="widget-content-left mr-3">
                                                      <div class="widget-content-left">
                                                          <img width="40" class="rounded-circle" src="{{url('assets/images/avatars/'.$trainer_data->trainer_image)}}" alt="">
                                                      </div>
                                                  </div>
                                                  <div class="widget-content-left flex2">
                                                      <div class="widget-heading">{{$trainer_data->trainer_name}}</div>
                                                      <div class="widget-subheading opacity-7">{{$trainer_data->trainer_phone}}</div>
                                                  </div>
                                              </div>
                                          </div>
                                          <br />
                            <h5>สถิติ Personal Trainer</h5>

                              <table style="width: 100%;"  class="table table-hover table-striped ">
                                  <thead>
                                    <tr>
                                        <th>หมายเลขสมาชิก</th>
                                        <th>
                                          สถานะ
                                        </th>
                                        <th>ชื่อ - นามสกุล</th>


                                        <th>วันที่</th>
                                        <th>
                                          เวลา
                                        </th>



                                        <th >จำนวนชั่วโมงคงเหลือ</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <?php $get_date = date("Y-m-d"); ?>
                                    @if(isset($trainer))
                                    @foreach($trainer as $u)

                                    <?php

                                    $get_date2 = strtotime($u->end_at) - strtotime($get_date);
                                    $data_2 = ($get_date2/86400);
                                    //echo $data_2;
                                    $u->days = $data_2;
                                    if($data_2 <= 30 && $data_2 > 15 ){
                                      $success = 'orange';
                                    }elseif($data_2 <= 15 && $data_2 > 0 ){
                                      $success = 'warning';
                                    }else{
                                      $success = 'danger';
                                    }

                                    ?>

                                    <tr>
                                      <td>
                                        #{{$u->no_mem}}
                                      </td>
                                      <td>
                                        <div class="badge badge-{{$success}} "><?php echo DateThai($u->end_at); ?></div>
                                      </td>
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
                                                                  <div class="widget-subheading">{{$u->phone_mem}}</div>
                                                              </div>
                                                          </div>
                                                      </div>
                                      </td>

                                      <td>

                                        <?php echo DateThai($u->start_at); ?>
                                      </td>
                                      <td>
                                        {{$u->time_ch}} น.
                                      </td>
                                      <td>
                                        {{$u->pt_hr}} ชม.
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







@stop



@section('scripts')



@stop('scripts')
