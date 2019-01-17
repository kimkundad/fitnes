@extends('admin.layouts.template')

@section('admin.content')


<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>เช็คอินสมาชิก GT Fitnes
                                    <div class="page-title-subheading">เช็คอินสมาชิก ของ GT Fitnes ทั้งหมด
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
                            <div class="col-lg-6 offset-md-3">


                              <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">ค้นหาสมาชิก</h5>

                                  <br />
                                  <div class="search-wrapper active" style="margin-top:5px;">
                                    <form class="" method="POST" action="{{url('admin/search_mem_checkin')}}" enctype="multipart/form-data" novalidate="novalidate">
                                    {{ csrf_field() }}
                                      <div class="input-holder" style="width: 450px;">
                                          <input type="text" class="search-input" name="search" placeholder="Search">
                                          <button class="search-icon" type="submit"><span></span></button>
                                      </div>
                                      </form>
                                  </div>
                                  <br />
                                </div>
                            </div>




                            </div>

                        </div>




                    </div>

@stop



@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>





@stop('scripts')
