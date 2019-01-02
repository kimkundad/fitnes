@extends('admin.layouts.template')

@section('admin.content')

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

                              <table style="width: 100%;"  class="table table-hover table-striped ">
                                  <thead>
                                  <tr>
                                      <th>ชื่อ-นามสกุล</th>
                                      <th>สถานะ</th>
                                      <th>
                                        ประเภท
                                      </th>
                                      <th>
                                        วันที่สร้าง
                                      </th>


                                      <th>จัดการ</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    @if($objs)
                                    @foreach($objs as $u)
                                    <tr>
                                        <td>

                                          <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="widget-content-left">
                                                                        <img width="40" class="rounded-circle" src="{{url('assets/images/avatars/'.$u->trainer_image)}}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">{{$u->trainer_name}}</div>
                                                                    <div class="widget-subheading opacity-7">{{$u->trainer_phone}}</div>
                                                                </div>
                                                            </div>
                                                        </div>

                                        </td>
                                        <td>
                                          <div class="custom-checkbox custom-control">
                                            <input type="checkbox" id="exampleCustomCheckbox" class="custom-control-input" checked>
                                            <label class="custom-control-label" for="exampleCustomCheckbox">
                                               สอน
                                                          </label>
                                                        </div>
                                        </td>
                                        <td>
                                          {{$u->name_cat}}
                                        </td>
                                        <td>
                                          {{$u->created_at}}
                                        </td>
                                        <td>

                                          <a class="mb-2 mr-2 btn-icon btn-icon-only btn btn-primary" href="{{url('admin/trainer/'.$u->idc.'/edit')}}" style="color: #fff;float: left;"><i class="pe-7s-tools btn-icon-wrapper"> </i></a>


                                          <form  action="{{url('admin/trainer/'.$u->idc)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                                              <input type="hidden" name="_method" value="DELETE">
                                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                              <button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn btn-warning" style="color: #fff;"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
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







@stop



@section('scripts')



@stop('scripts')
