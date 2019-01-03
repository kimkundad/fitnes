@extends('admin.layouts.template')

@section('admin.content')


<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                              <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>
                                </div>
                                <div><div class="input-group">
                                                    <div class="input-group-prepend"><button class="btn btn-secondary">check In</button> </div>
                                                    <input placeholder="ค้นหาสมาชิกเพื่อ check In" type="text" class="form-control" style="width: 550px;"></div>
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
                            <div class="col-lg-12 ">


                              <div class="main-card card">
                              <div class="card-body">
                                <h5 class="card-title">ผลการค้นหา</h5>
                              <table style="width: 100%;"  class="table table-hover table-striped ">
                                <thead>
                                <tr>
                                    <th>หมายเลขสมาชิก</th>
                                    <th>สถานะ</th>
                                    <th>
                                      ชื่อ-นามสกุล
                                    </th>



                                    <th>ประเภท</th>
                                    <th>จำนวน ขม.T.</th>
                                    <th>

                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                  <tr>
                                    <td>
                                      #142-210-6254
                                    </td>
                                    <td>
                                      <button class="mb-2 mr-2 btn btn-success btn-sm">12 มค. 62
                                            </button>
                                    </td>
                                    <td>
                                      <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="{{url('assets/images/avatars/1.jpg')}}" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">Alina Mclourd</div>

                                                            </div>
                                                        </div>
                                                    </div>
                                    </td>

                                    <td>
                                      รายวัน
                                    </td>
                                    <td>
                                      25 ชม.
                                    </td>
                                    <td>
                                      <button class="mb-2 mr-2 btn-pill btn btn-primary">ฟิตเนส</button>
                                      <button class="mb-2 mr-2 btn-pill btn-transition btn btn-outline-primary">เทรนเนอร์</button>
                                      <button class="mb-2 mr-2 btn-pill btn-transition btn btn-outline-primary">คลาส</button>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      #142-210-6254
                                    </td>
                                    <td>
                                      <button class="mb-2 mr-2 btn btn-success btn-sm">12 มค. 62
                                            </button>
                                    </td>
                                    <td>
                                      <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img width="40" class="rounded-circle" src="{{url('assets/images/avatars/1.jpg')}}" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">Alina Mclourd</div>

                                                            </div>
                                                        </div>
                                                    </div>
                                    </td>

                                    <td>
                                      รายวัน
                                    </td>
                                    <td>
                                      25 ชม.
                                    </td>
                                    <td>
                                      <button class="mb-2 mr-2 btn-pill btn btn-primary">ฟิตเนส</button>
                                      <button class="mb-2 mr-2 btn-pill btn-transition btn btn-outline-primary">เทรนเนอร์</button>
                                      <button class="mb-2 mr-2 btn-pill btn-transition btn btn-outline-primary">คลาส</button>
                                    </td>
                                  </tr>

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
