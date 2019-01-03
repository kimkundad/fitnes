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

                              <br />
                              <h5 class="card-title">ตาราง GT FITNESS</h5>
                              <br />

                              <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                                  <li class="nav-item">
                                      <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                          <span>All</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                          <span>Yoka</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
                                          <span>Kick Boxing</span>
                                      </a>
                                  </li>
                              </ul>


                              <div class="tab-content">
                                  <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                      <div class="main-card mb-3 card">
                                          <div class="card-body">
                                              <div id='calendar'></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                                      <div class="main-card mb-3 card">
                                          <div class="card-body">
                                              <div id='calendar-list'></div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
                                      <div class="main-card mb-3 card">
                                          <div class="card-body">
                                              <div id="calendar-bg-events"></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>




                              </div>
                              </div>

                              <br />

                              <div class="row">

                                <div class="col-lg-6">

                                  <div class="main-card card">
                                  <div class="card-body">
                                    <h5 class="card-title">สมาชิกใกล้หมดอายุ</h5>


                                    <table style="width: 100%;"  class="table table-hover table-striped ">
                                      <thead>
                                      <tr>


                                          <th>
                                            ชื่อ-นามสกุล
                                          </th>



                                          <th>ประเภท</th>
                                          <th>
                                            เบอร์ติดต่อ
                                          </th>
                                          <th>

                                          </th>
                                      </tr>
                                      </thead>
                                      <tbody>

                                        <tr>

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
                                            0877110025
                                          </td>
                                          <td>
                                            <button class="mb-2 mr-2 btn-pill btn btn-primary">ดูประวัติ</button>

                                          </td>
                                        </tr>
                                        <tr>

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
                                            0877110025
                                          </td>
                                          <td>
                                            <button class="mb-2 mr-2 btn-pill btn btn-primary">ดูประวัติ</button>

                                          </td>
                                        </tr>


                                      </tbody>


                                    </table>

                                  </div>
                                  </div>

                                </div>

                                <div class="col-lg-6">

                                  <div class="main-card card">
                                  <div class="card-body">
                                    <h5 class="card-title">สมาชิกล่าสุด</h5>


                                    <table style="width: 100%;"  class="table table-hover table-striped ">
                                      <thead>
                                      <tr>


                                          <th>
                                            ชื่อ-นามสกุล
                                          </th>



                                          <th>ประเภท</th>
                                          <th>
                                            เบอร์ติดต่อ
                                          </th>
                                          <th>

                                          </th>
                                      </tr>
                                      </thead>
                                      <tbody>

                                        <tr>

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
                                            0877110025
                                          </td>
                                          <td>
                                            <button class="mb-2 mr-2 btn-pill btn btn-primary">ดูประวัติ</button>

                                          </td>
                                        </tr>
                                        <tr>

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
                                            0877110025
                                          </td>
                                          <td>
                                            <button class="mb-2 mr-2 btn-pill btn btn-primary">ดูประวัติ</button>

                                          </td>
                                        </tr>


                                      </tbody>


                                    </table>

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
