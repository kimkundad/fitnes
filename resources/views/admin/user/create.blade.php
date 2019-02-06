@extends('admin.layouts.template')

@section('admin.content')

<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-ball icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>เพิ่ม Admin Trainer GT Fitnes
                                    <div class="page-title-subheading">เพิ่ม Admin GT Fitnes ในระบบ ทั้งหมด
                                    </div>
                                </div>
                            </div>


                            <div class="page-title-actions">
                              <a href="{{url('admin/admin_owner/create')}}"  class="btn-shadow btn btn-info">
                                  <span class="btn-icon-wrapper pe-7s-door-lock">
                                      <i class="icon ion-android-add"></i>
                                  </span>
                                  เพิ่ม Admin
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
                                        <div class="card-body"><h5 class="card-title">เพิ่ม ข้อมูล Admin</h5>

                                          @if (count($errors) > 0)
                    <br>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                                            <form class="" method="POST" action="{{$url}}" enctype="multipart/form-data">
                                              {{ method_field($method) }}
                                              {{ csrf_field() }}

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">ชื่อผู้ใช้งาน</label>
                                                  <input name="name" value="{{ old('name')}}" type="text" class="form-control">
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">อีเมล</label>
                                                  <input name="email" value="{{ old('email')}}" type="text" class="form-control">
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">รูป Avatar</label>
                                                  <input name="image" id="exampleFile" type="file" class="form-control-file">
                                                  <small class="form-text text-muted">รุปที่แนะนำ ควรเป็นรูปสี่เหลี่ยมด้านเท่า 150 x 150 px ขึ้นไป</small>
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">Password</label>
                                                  <input name="password" placeholder="ใส่พาสเวิร์ด 6 ตัว" value="{{ old('Password')}}" type="Password" class="form-control">
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">Confirm Password</label>
                                                  <input name="password_confirmation" placeholder="ใส่พาสเวิร์ด 6 ตัว" type="password" class="form-control">
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



@stop('scripts')
