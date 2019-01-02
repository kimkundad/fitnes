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


                              <div class="row">
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">แก้ไข Class เรียน</h5>
                                            <form class="" method="POST" action="{{$url}}" enctype="multipart/form-data">
                                              {{ method_field($method) }}
                                              {{ csrf_field() }}

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">ชื่อ Class เรียน</label>
                                                  <input name="course_name" placeholder="Yoka, Kick Boxing" value="{{$objs->course_name}}" type="text" class="form-control">
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">เลือกหมวดหมู่</label>
                                                  <select name="cat_id" id="exampleSelect" class="form-control">
                                                    @if(isset($category))
                                                    @foreach($category as $u)
                                                    <option value="{{$u->id}}" @if($objs->cat_id == $u->id)
                                  selected='selected'
                                  @endif>{{$u->name_cat}}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">ราคา</label>
                                                  <input name="course_price" placeholder="1500" type="text" value="{{$objs->course_price}}" class="form-control">
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">รายละเอียด</label>
                                                  <textarea name="course_detail" style="height:150px" value="{{$objs->course_detail}}" class="form-control"></textarea>
                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">หมายเหตุ</label>
                                                  <textarea name="course_remark" style="height:150px" value="{{$objs->course_remark}}" class="form-control"></textarea>
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
