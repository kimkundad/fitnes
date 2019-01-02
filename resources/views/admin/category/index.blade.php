@extends('admin.layouts.template')

@section('admin.content')

<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-light icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>ประเภท Class
                                    <div class="page-title-subheading">ประเภท Class ต่างๆที่อนู่ใน GT fitnes ทั้งหมด
                                    </div>
                                </div>
                            </div>

                            <div class="page-title-actions">
                              <a href="{{url('admin/category/create')}}"  class="btn-shadow btn btn-info">
                                  <span class="btn-icon-wrapper pr-2 opacity-7">
                                      <i class="icon ion-android-add"></i>
                                  </span>
                                  เพิ่มประเภท CLASS
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
                                    <th>ชื่อ Class</th>
                                    <th>
                                      จำนวน Class
                                    </th>
                                    <th>
                                      จำนวน ผู้ใช้บริการ
                                    </th>
                                    <th>จัดการ</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @if($objs)
                                  @foreach($objs as $u)
                                <tr>
                                    <td>{{$s}}</td>
                                    <td>{{$u->name_cat}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                      <a class="mb-2 mr-2 btn-icon btn-icon-only btn btn-primary" href="{{url('admin/category/'.$u->id.'/edit')}}" style="color: #fff;float: left;"><i class="pe-7s-tools btn-icon-wrapper"> </i></a>


                                      <form  action="{{url('admin/category/'.$u->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
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




                    </div>

@stop



@section('scripts')

@if ($message = Session::get('add_success'))
<script type="text/javascript">


</script>
@endif

@stop('scripts')
