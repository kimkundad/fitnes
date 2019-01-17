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
                                <div>ประวัติสมาชิก GT Fitnes
                                    <div class="page-title-subheading">ข้อมูล ประวัติสมาชิก GT Fitnes GT Fitnes ในระบบ ทั้งหมด
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

                              <table style="width: 100%;" id="example" class="table table-hover table-striped ">
                                  <thead>
                                  <tr>
                                      <th>สมาชิก</th>



                                      <th>วันที่</th>
                                      <th>
                                        เวลา
                                      </th>
                                      <th>
                                        รูปแบบการเข้าใช้งาน
                                      </th>


                                      <th >ประเภท</th>
                                  </tr>
                                  </thead>
                                  <tbody>

                                    @if(isset($trainer))
                                    @foreach($trainer as $u)

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
                                                                  <div class="widget-subheading">{{$u->phone_mem}}</div>
                                                              </div>
                                                          </div>
                                                      </div>
                                      </td>

                                      <td>

                                        <?php echo DateThai($u->start_at11); ?>
                                      </td>
                                      <td>
                                        {{$u->time_ch}} น.
                                      </td>
                                      <td>
                                        {{$u->time_type}}
                                      </td>
                                      <td>
                                        @if($u->user_type == 1)
                                        รายวัน
                                        @elseif($u->user_type == 2)
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







@stop



@section('scripts')



@stop('scripts')
