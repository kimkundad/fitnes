@extends('admin.layouts.template')

@section('admin.content')


<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-tempting-azure">
                                    </i>
                                </div>
                                <div>รายชื่อสมาชิก GT Fitnes
                                    <div class="page-title-subheading">รายชื่อสมาชิก ของ GT Fitnes ทั้งหมด
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
                            <div class="col-lg-12 ">


                              <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">ข้อมูลส่วนตัว</h5>
                                    <form class="">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">ชื่อ</label>
                                                  <input name="text" placeholder="Porrapat" type="text" class="form-control">
                                                </div>
                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">นามสกุล</label>
                                                  <input name="text" placeholder="Warker" type="text" class="form-control">
                                                </div>
                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">วัน/เดือน/ปี เกิด</label>
                                                  <input type="text" class="form-control" data-toggle="datepicker">
                                                </div>


                                                <div class="position-relative form-group row">
                                                    <div class="col-md-6">
                                                      <label for="exampleEmail11" class="">เพศ</label>
                                                      <br /><br />
                                                        <div class="custom-radio custom-control">
                                                          <input type="radio" id="exampleCustomRadio" name="customRadio" class="custom-control-input">
                                                          <label class="custom-control-label" for="exampleCustomRadio">ชาย</label>
                                                        </div>
                                                        <br />
                                                        <div class="custom-radio custom-control">
                                                          <input type="radio" id="exampleCustomRadio2" name="customRadio" class="custom-control-input">
                                                          <label class="custom-control-label" for="exampleCustomRadio2">หญิง
                                                          </label>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                      <label for="exampleEmail11" class="">สัดส่วน</label>
                                                      <div class="position-relative form-group"><input  placeholder="สูง" type="text" class="mr-1 form-control"></div>
                                                      <div class="position-relative form-group"><input  placeholder="หนัก" type="text" class="mr-1 form-control"></div>
                                                    </div>

                                                </div>

                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">ช่องทางการติดต่อ</label>
                                                  <input name="text" placeholder="เบอร์ติดต่อ" type="text" class="form-control">
                                                  <br />
                                                  <input name="text" placeholder="Email" type="text" class="form-control">
                                                  <br />
                                                  <div class="row">
                                                    <div class="position-relative form-group col-md-6"><input  placeholder="Line ID" type="text" class="mr-1 form-control"></div>
                                                    <div class="position-relative form-group col-md-6"><input  placeholder="Facebook" type="text" class="mr-1 form-control"></div>
                                                  </div>

                                                </div>


                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">อัพโหลดรูป</label>
                                                  <input name="image" id="exampleFile" type="file" class="form-control-file">
                                                  <small class="form-text text-muted">รุปที่แนะนำ ควรเป็นรูปสี่เหลี่ยมด้านเท่า 150 x 150 px ขึ้นไป</small>
                                                </div>
                                                <hr />

                                              <h5 class="card-title">ประเภทสมาชิก</h5>
                                                  <div class="row">
                                                  <div class="position-relative form-group col-md-6"><label for="exampleEmail11" class="">วันที่เริ่มต้น</label>
                                                    <input type="text" class="form-control" data-toggle="datepicker">
                                                  </div>

                                                  <div class="position-relative form-group col-md-6"><label for="exampleEmail11" class="">วันที่สิ้นสุด</label>
                                                    <input type="text" class="form-control" data-toggle="datepicker">
                                                  </div>

                                                  <div class="position-relative form-group col-md-6">
                                                    <label for="exampleEmail" class="">ประเภทสมาชิก</label>
                                                    <select name="cat_id" id="exampleSelect" class="form-control">
                                                      <option value="1">รายวัน</option>
                                                      <option value="1">รายเดือน</option>
                                                      <option value="1">รายปี</option>
                                                  </select>
                                                  </div>

                                                  <div class="position-relative form-group col-md-6">
                                                    <label for="exampleEmail" class="">ช่องทางการชำระเงิน</label>
                                                    <select name="cat_id" id="exampleSelect" class="form-control">
                                                      <option value="1">เงินสด</option>
                                                      <option value="1">ผ่อนชำระ</option>

                                                  </select>
                                                  </div>


                                                  <div class="position-relative form-group col-md-6"><label for="exampleEmail11" class="">จำนวนเงิน</label>
                                                    <input name="text" placeholder="1500" type="text" class="form-control">
                                                  </div>
                                                  <div class="position-relative form-group col-md-6"><label for="exampleEmail11" class="">ค้างชำระ</label>
                                                    <input name="text" placeholder="00" value="0" type="text" class="form-control">
                                                  </div>




                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">Note</label>
                                                  <textarea name="course_remark" style="height:150px" class="form-control"></textarea>
                                                </div>



                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="examplePassword11" class="">Password</label>
                                                  <input name="password" id="examplePassword11" placeholder="password placeholder" type="password" class="form-control">
                                                </div>
                                            </div>






                                  <!--      <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleCity" class="">City</label><input name="city" id="exampleCity" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="position-relative form-group"><label for="exampleState" class="">State</label><input name="state" id="exampleState" type="text" class="form-control"></div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="position-relative form-group"><label for="exampleZip" class="">Zip</label><input name="zip" id="exampleZip" type="text" class="form-control"></div>
                                            </div>
                                        </div> -->
                                        <div class="col-md-12 text-center">
                                        <button class="mt-2 btn btn-primary">สมัครสมาชิก</button>
                                        </div>
                                    </form>
                                </div>
                            </div>




                            </div>

                        </div>




                    </div>

@stop



@section('scripts')



@stop('scripts')
