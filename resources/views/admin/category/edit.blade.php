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







                          </div>
                    </div>

<div class="tabs-animation">
                        <div class="row">
                            <div class="col-lg-12 ">


                              <div class="row">
                                <div class="col-md-6">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">แก้ไข ประเภท Class</h5>
                                            <form class="" method="POST" action="{{$url}}" enctype="multipart/form-data">
                                              {{ method_field($method) }}
                                              {{ csrf_field() }}
                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">ชื่อ ประเภท Class</label>
                                                  <input name="name_cat" placeholder="Yoka, Kick Boxing" type="text" value="{{$objs->name_cat}}" class="form-control">
                                                </div>

                                                <button class="mt-1 btn btn-primary" type="submit">แก้ไขข้อมูล</button>
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
