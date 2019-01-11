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
                            <div class="col-md-4">
                              <br />
                              <div class="search-wrapper active" style="margin-top:5px;">
                                <form class="" method="POST" action="{{url('search_mem')}}" enctype="multipart/form-data" novalidate="novalidate">
                                {{ csrf_field() }}
                                  <div class="input-holder">
                                      <input type="text" class="search-input" name="search" placeholder="Search">
                                      <button class="search-icon" type="submit"><span></span></button>
                                  </div>
                                  </form>
                              </div>

                            </div>
                            <div class="col-md-8">

                              <div class="position-relative form-group col-md-6">
                                <form class="" id="frm" method="POST" action="{{url('search_mem')}}" enctype="multipart/form-data" novalidate="novalidate">
                                {{ csrf_field() }}
                                <label for="exampleEmail" class="">เลือกดูตามประเภทสมาชิก</label>
                                <select name="search" id="exampleSelect" onchange="onSelectChange();" class="form-control">
                                  <option> เลือกระเภทสมาชิก </option>
                                  <option value="1"> รายวัน </option>
                                  <option value="2"> รายเดือน </option>
                                  <option value="3"> รายปี </option>
                              </select>

                              </form>
                              </div>

                            </div>

                            <div class="col-md-6 col-xl-4">
                              <br />
                                    <div class="card  widget-chart widget-chart2 text-left card-btm-border card-shadow-success">
                                        <div class="widget-chat-wrapper-outer">

                                                <div class="widget-chart-flex">
                                                    <div class="widget-numbers">
                                                        <div class="widget-chart-flex">
                                                            <div class="fsize-4">
                                                                <small class="">สมาชิกทั้งหมด :</small>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 class="widget-subheading mb-0 ">{{$get_count}} คน</h5>


                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-4">
                                  <br />
                                        <div class="card  widget-chart widget-chart2 text-left card-btm-border card-shadow-success">
                                            <div class="widget-chat-wrapper-outer">

                                                    <div class="widget-chart-flex">
                                                        <div class="widget-numbers">
                                                            <div class="widget-chart-flex">
                                                                <div class="fsize-4">
                                                                    <small class="">สมาชิกใกล้หมดอายุ :</small>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h5 class="widget-subheading mb-0 ">{{$get_data_expire}} คน</h5>


                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xl-4">
                                      <br />
                                            <div class="card  widget-chart widget-chart2 text-left card-btm-border card-shadow-success">
                                                <div class="widget-chat-wrapper-outer">

                                                        <div class="widget-chart-flex">
                                                            <div class="widget-numbers">
                                                                <div class="widget-chart-flex">
                                                                    <div class="fsize-4">
                                                                        <small class="">สมาชิกหมดอายุแล้ว :</small>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="widget-subheading mb-0 ">{{$get_data_expire1}} คน</h5>


                                                </div>
                                            </div>
                                        </div>


                            <div class="col-lg-12 ">



                              <br />
                              <div class="main-card card">
                              <div class="card-body">
                                <h5 class="card-title">ผลการค้นหา</h5>

                              <table style="width: 100%;" id="example" class="table table-hover table-striped ">
                                <thead>
                                <tr>
                                    <th>หมายเลข</th>
                                    <th>สถานะ</th>
                                    <th>
                                      ชื่อ-นามสกุล
                                    </th>



                                    <th>ประเภท</th>
                                    <th>จำนวน ชม. PT.</th>
                                    <th>

                                    </th>
                                </tr>
                                </thead>
                                <tbody>


                                  @if(isset($objs))
                                  @foreach($objs as $u)
                                  <tr>
                                    <td>
                                      #{{$u->no_mem}}
                                    </td>
                                    <td>
                                      @if(date("Y-m-d") >= $u->end_at)
                                      <button class="mb-2 mr-2 btn btn-danger btn-sm"><?php echo DateThai($u->end_at); ?></button>
                                      @else
                                      <button class="mb-2 mr-2 btn btn-success btn-sm"><?php echo DateThai($u->end_at); ?></button>
                                      @endif

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
                                      <a class="mb-2 mr-2 btn-icon btn-icon-only btn btn-link btn-sm" href="#" style="float: left;"><b><i class="pe-7s-file btn-icon-wrapper"> </i> ดูประวัติ</b></a>
                                      <a class="mb-2 mr-2 btn-icon btn-icon-only btn btn-link btn-sm" href="{{url('admin/member/'.$u->id.'/edit')}}" style="float: left;"><b><i class="pe-7s-config btn-icon-wrapper"> </i> แก้ไข</b></a>
                                      <button class="mb-2 mr-2 btn-pill btn btn-secondary">ต่ออายุสมาชิก
                                            </button>



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

@stop



@section('scripts')

<script>
function onSelectChange(){
 document.getElementById('frm').submit();
}
</script>

@stop('scripts')
