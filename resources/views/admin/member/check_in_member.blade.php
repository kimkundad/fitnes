@extends('admin.layouts.template')

@section('admin.content')


<div class="tabs-animation">
                        <div class="row">
                            <div class="col-lg-6 offset-md-3">


                              <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">ค้นหาสมาชิก</h5>

                                  <br />
                                  <div class="search-wrapper active" style="margin-top:5px; width: 100%;">
                                    <form class="" method="POST"  action="{{url('admin/search_mem_checkin')}}" enctype="multipart/form-data" novalidate="novalidate">
                                    {{ csrf_field() }}
                                      <div class="input-holder" style="width: 100%;">
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
