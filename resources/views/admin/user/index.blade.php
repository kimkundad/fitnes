@extends('admin.layouts.template')

@section('admin.content')

<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-light icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>จัดการ Admin
                                    <div class="page-title-subheading">จัดการ Admin ที่อนู่ใน GT fitnes ทั้งหมด
                                    </div>
                                </div>
                            </div>

                            <div class="page-title-actions">
                              <a href="{{url('admin/admin_owner/create')}}"  class="btn-shadow btn btn-info">
                                  <span class="btn-icon-wrapper pr-2 opacity-7">
                                      <i class="icon ion-android-add"></i>
                                  </span>
                                  เพิ่มจัดการ Admin
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
                                    <th>ชื่อ user</th>
                                    <th>
                                      email
                                    </th>
                                    <th>
                                      position
                                    </th>
                                    <th>จัดการ</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @if($user)
                                  @foreach($user as $u)
                                <tr>
                                    <td>{{$s}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>
                                      @if($u->id == 1)
                                      owner
                                      @else
                                      admin
                                      @endif
                                    </td>
                                    <td>
                                      <a class="mb-2 mr-2 btn-icon btn-icon-only btn btn-link" href="{{url('admin/admin_owner/'.$u->id.'/edit')}}" style="float: left;"><b><i class="pe-7s-config btn-icon-wrapper"> </i> แก้ไข</b></a>

                                      @if($u->id != 1)
                                      <form  action="{{url('admin/admin_owner/'.$u->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                                          <input type="hidden" name="_method" value="DELETE">
                                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                          <button type="submit" class="mb-2 mr-2 btn-icon btn-icon-only btn btn-link" ><b><i class="pe-7s-trash btn-icon-wrapper"> </i> ลบ</b></button>
                                      </form>
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




                    </div>

@stop



@section('scripts')

@if ($message = Session::get('add_success'))
<script type="text/javascript">


</script>
@endif

@stop('scripts')
