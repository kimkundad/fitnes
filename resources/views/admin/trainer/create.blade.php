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

<div class="tabs-animation">
                        <div class="row">
                            <div class="col-lg-12 ">


                              <div class="row">
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">เพิ่ม ข้อมูล Trainer</h5>
                                            <form class="" method="POST" action="{{$url}}" enctype="multipart/form-data">
                                              {{ method_field($method) }}
                                              {{ csrf_field() }}

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">ชื่อ-นามสกุล</label>
                                                  <input name="trainer_name" placeholder="นายสมปอง อีกแล้ว" type="text" class="form-control">
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">เลือกประเภท</label>
                                                  <select name="cat_id" id="exampleSelect" class="form-control">
                                                    @if(isset($category))
                                                    @foreach($category as $u)
                                                    <option value="{{$u->id}}">{{$u->name_cat}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">รูป Avatar</label>
                                                  <input name="image" id="exampleFile" type="file" class="form-control-file">
                                                  <small class="form-text text-muted">รุปที่แนะนำ ควรเป็นรูปสี่เหลี่ยมด้านเท่า 150 x 150 px ขึ้นไป</small>
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">เบอร์ติดต่อ</label>
                                                  <input name="trainer_phone" placeholder="081-007-753" type="text" class="form-control">
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
