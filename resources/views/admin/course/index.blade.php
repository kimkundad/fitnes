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


                              <div class="main-card card">
                        <div class="card-body">

                            <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Class เรียน</th>
                                    <th>
                                      หมวดหมุ่
                                    </th>
                                    <th>
                                      ราคา
                                    </th>
                                    <th>
                                    ใช้บริการ
                                    </th>
                                    <th>จัดการ</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @if($objs)
                                  @foreach($objs as $u)
                                <tr>
                                    <td>{{$s}}</td>
                                    <td>{{$u->course_name}}</td>
                                    <td>{{$u->name_cat}}</td>
                                    <td>{{$u->course_price}}</td>
                                    <td></td>
                                    <td>
                                      <a class="mb-2 mr-2 btn-icon btn-icon-only btn btn-link" href="{{url('admin/course/'.$u->idc.'/edit')}}" style="float: left;"><b><i class="pe-7s-config btn-icon-wrapper"> </i> แก้ไข</b></a>


                                      <form  action="{{url('admin/course/'.$u->idc)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                                          <input type="hidden" name="_method" value="DELETE">
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

@stop



@section('scripts')



@stop('scripts')
