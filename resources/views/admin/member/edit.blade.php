@extends('admin.layouts.template')

@section('admin.content')


<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon" style="padding: 2px;">
                                    <img style="width:100%" class="rounded-circle" src="{{url('assets/images/avatar/'.$objs->image_mem)}}" >
                                </div>
                                <div>{{$objs->first_name_mem}} {{$objs->last_name_mem}}
                                    <div class="page-title-subheading">รายชื่อสมาชิก ของ GT Fitnes แบบ
                                    @if($objs->type_mem == 1)
                                    รายวัน
                                    @elseif($objs->type_mem == 2)
                                    รายเดือน
                                    @else
                                    รายปี
                                    @endif
                                    </div>
                                </div>
                            </div>


                            <div class="page-title-actions">
                              <a href="{{url('admin/member/'.$objs->id)}}"   class="btn-shadow btn btn-info">
                                  <span class="btn-icon-wrapper pr-2 opacity-7">
                                      <i class="lnr-user btn-icon-wrapper"></i>
                                  </span>
                                  รูปบัตรสมาชิก
                              </a>
                              <br /><br />
                              <form  action="{{url('admin/member/'.$objs->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                                  <input type="hidden" name="_method" value="DELETE">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <button type="submit" class="mb-2 mr-2 btn-icon btn btn-danger"><b><i class="pe-7s-trash btn-icon-wrapper"> </i> ลบสมาชิก</b></button>
                              </form>

                            </div>



                          </div>
                    </div>

<div class="tabs-animation">
                        <div class="row">
                            <div class="col-lg-12 ">


                              <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">ข้อมูลส่วนตัว</h5>
                                    <form class="" method="POST" action="{{$url}}" enctype="multipart/form-data" novalidate="novalidate">
                                      {{ method_field($method) }}
                                        {{ csrf_field() }}
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">ชื่อ<span class="text-danger">*</span></label>
                                                  <input name="first_name_mem" value="{{$objs->first_name_mem}}" placeholder="Porrapat" type="text" class="form-control">
                                                </div>
                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">นามสกุล<span class="text-danger">*</span></label>
                                                  <input name="last_name_mem" value="{{$objs->last_name_mem}}" placeholder="Warker" type="text" class="form-control">
                                                </div>
                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">วัน/เดือน/ปี เกิด<span class="text-danger">*</span></label>
                                                  <input name="birthday_mem" value="{{$objs->birthday_mem}}" type="text" class="form-control datepicker" data-toggle="datepicker">
                                                </div>


                                                <div class="position-relative form-group row">
                                                    <div class="col-md-6">
                                                      <label for="exampleEmail11" class="">เพศ</label>
                                                      <br /><br />
                                                        <div class="custom-radio custom-control">
                                                          <input type="radio" id="exampleCustomRadio" name="sex_mem" value="0" class="custom-control-input" @if($objs->sex_mem == 0) checked @endif>
                                                          <label class="custom-control-label" for="exampleCustomRadio">ชาย</label>
                                                        </div>
                                                        <br />
                                                        <div class="custom-radio custom-control">
                                                          <input type="radio" id="exampleCustomRadio2" name="sex_mem" value="1" class="custom-control-input"  @if($objs->sex_mem == 1) checked @endif>
                                                          <label class="custom-control-label" for="exampleCustomRadio2">หญิง
                                                          </label>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-6">
                                                      <label for="exampleEmail11" class="">สัดส่วน</label>
                                                      <div class="position-relative form-group"><input  placeholder="สูง" name="height_mem" value="{{$objs->height_mem}}" type="text" class="mr-1 form-control"></div>
                                                      <div class="position-relative form-group"><input  placeholder="หนัก" name="width_mem" value="{{$objs->width_mem}}" type="text" class="mr-1 form-control"></div>
                                                    </div>

                                                </div>

                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">ช่องทางการติดต่อ</label>
                                                  <input name="phone_mem" placeholder="เบอร์ติดต่อ" value="{{$objs->phone_mem}}" type="text" class="form-control">
                                                  <br />
                                                  <input name="email_mem" placeholder="Email" value="{{$objs->email_mem}}" type="text" class="form-control">
                                                  <br />
                                                  <div class="row">
                                                    <div class="position-relative form-group col-md-6"><input  placeholder="Line ID" value="{{$objs->line_mem}}" name="line_mem" type="text" class="mr-1 form-control"></div>
                                                    <div class="position-relative form-group col-md-6"><input  placeholder="Facebook" value="{{$objs->facebook_mem}}" name="facebook_mem" type="text" class="mr-1 form-control"></div>
                                                  </div>

                                                </div>


                                                <div class="position-relative form-group"><label for="exampleEmail11" class="">อัพโหลดรูป</label>
                                                  <input name="image" id="exampleFile"  type="file" class="form-control-file">
                                                  <small class="form-text text-muted">รุปที่แนะนำ ควรเป็นรูปสี่เหลี่ยมด้านเท่า 150 x 150 px ขึ้นไป</small>
                                                </div>






                                            </div>




                                            <div class="col-md-6">
                                              <div class="position-relative form-group">
                                                <label for="exampleEmail" class="">ที่อยู่<span class="text-danger">*</span></label>
                                                <textarea name="address_mem" style="height:120px" class="form-control">{{$objs->address_mem}}</textarea>
                                              </div>

                                              <div class="position-relative form-group ">
                                                <label for="exampleEmail" class="">จังหวัด<span class="text-danger">*</span></label>
                                                <select id="province" name="province_mem" class="form-control">
                                                  <option value="{{$objs->province_mem}}">{{$province->PROVINCE_NAME}}</option>
                                              </select>
                                              </div>

                                              <div class="position-relative form-group ">
                                                <label for="exampleEmail" class="">อำเภอ<span class="text-danger">*</span></label>
                                                <select id="amphur" name="district_mem" class="form-control">
                                                  <option value="{{$objs->district_mem}}">{{$objs->district_mem}}</option>
                                              </select>
                                              </div>

                                              <div class="position-relative form-group"><label for="exampleEmail11" class="">รหัสไปรษณีย์<span class="text-danger">*</span></label>
                                                <input id="postcode" name="zip_code_mem" value="{{$objs->zip_code_mem}}" placeholder="10310" type="text" class="form-control">
                                              </div>

                                            </div>

                                            <div class="col-md-12">
                                              <hr />
                                              <br />
                                            </div>


                                            <div class="col-md-6">
                                              <h5 class="card-title">ประเภทสมาชิก</h5>
                                                  <div class="row">
                                                  <div class="position-relative form-group col-md-6"><label for="exampleEmail11" class="">วันที่เริ่มต้น<span class="text-danger">*</span></label>
                                                    <input type="text" name="start_at" class="form-control" value="{{ $objs->start_at }}" data-toggle="datepicker">
                                                  </div>

                                                  <div class="position-relative form-group col-md-6"><label for="exampleEmail11" class="">วันที่สิ้นสุด<span class="text-danger">*</span></label>
                                                    <input type="text" name="end_at" class="form-control" value="{{ $objs->end_at }}" data-toggle="datepicker">
                                                  </div>

                                                  <div class="position-relative form-group col-md-6">
                                                    <label for="exampleEmail" class="">ประเภทสมาชิก<span class="text-danger">*</span></label>
                                                    <select name="type_mem" id="exampleSelect" class="form-control">
                                                      <option value="1" @if($objs->type_mem == 1)
                                    selected='selected'
                                    @endif>รายวัน</option>
                                                      <option value="2" @if($objs->type_mem == 2)
                                    selected='selected'
                                    @endif>รายเดือน</option>
                                                      <option value="3" @if($objs->type_mem == 3)
                                    selected='selected'
                                    @endif>รายปี</option>
                                    <option value="4" @if($objs->type_mem == 4)
                  selected='selected'
                  @endif>Trainer Only</option>
                                                  </select>
                                                  </div>

                                                  <div class="position-relative form-group col-md-6">
                                                    <label for="exampleEmail" class="">ช่องทางการชำระเงิน<span class="text-danger">*</span></label>
                                                    <select name="pay_type_mem" id="exampleSelect" class="form-control">
                                                      <option value="1" @if($objs->pay_type_mem == 1)
                                    selected='selected'
                                    @endif>เงินสด</option>
                                                      <option value="2" @if($objs->pay_type_mem == 2)
                                    selected='selected'
                                    @endif>ผ่อนชำระ</option>

                                                  </select>
                                                  </div>


                                                  <div class="position-relative form-group col-md-6"><label for="exampleEmail11" class="">จำนวนเงิน</label>
                                                    <input name="amount_mem"  value="{{$objs->amount_mem}}" type="text" class="form-control">
                                                  </div>
                                                  <div class="position-relative form-group col-md-6"><label for="exampleEmail11" class="">ค้างชำระ</label>
                                                    <input name="re_amount_mem"  value="{{$objs->re_amount_mem}}" type="text" class="form-control">
                                                  </div>




                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">Note</label>
                                                  <textarea name="remark_mem" style="height:150px" class="form-control">{{$objs->remark_mem}}</textarea>
                                                </div>
                                            </div>




                                            <div class="col-md-6">
                                              <h5 class="card-title">Personal Trainer</h5>
                                                  <div class="row">

                                                    <div class="position-relative form-group col-md-6">
                                                      <label for="exampleEmail" class="">พนักงาน</label>
                                                      <select name="pt_id" id="exampleSelect" class="form-control">
                                                        <option> -- เลือก Trainer -- </option>
                                                        @if(isset($trainer))
                                                        @foreach($trainer as $u)
                                                        <option value="{{$u->id}}" @if($objs->pt_id == $u->id)
                                      selected='selected'
                                      @endif>{{$u->trainer_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                    </div>

                                                    <div class="position-relative form-group col-md-6"><label for="exampleEmail11" class="">จำนวนชั่วโมง</label>
                                                      <input name="pt_hr" type="text" value="{{$objs->pt_hr}}" class="form-control">
                                                    </div>

                                                    <div class="position-relative form-group col-md-6"><label for="exampleEmail11" class="">วันที่หมดอายุ</label>
                                                      <input name="pt_end_at" class="form-control" value="{{$objs->pt_end_at}}" data-toggle="datepicker">
                                                    </div>

                                                  <div class="position-relative form-group col-md-6">
                                                    <label for="exampleEmail" class="">ช่องทางการชำระเงิน</label>
                                                    <select name="pt_pay_type_mem" id="exampleSelect" class="form-control">
                                                      <option value="1" @if($objs->pt_pay_type_mem == 1)
                                    selected='selected'
                                    @endif>เงินสด</option>
                                                      <option value="2" @if($objs->pt_pay_type_mem == 2)
                                    selected='selected'
                                    @endif>ผ่อนชำระ</option>

                                                  </select>
                                                  </div>


                                                  <div class="position-relative form-group col-md-6"><label for="exampleEmail11" class="">จำนวนเงิน</label>
                                                    <input name="pt_amount_mem"  value="{{$objs->pt_amount_mem}}" type="text" class="form-control">
                                                  </div>
                                                  <div class="position-relative form-group col-md-6"><label for="exampleEmail11" class="">ค้างชำระ</label>
                                                    <input name="pt_re_amount_mem"  value="{{$objs->pt_re_amount_mem}}" value="0" type="text" class="form-control">
                                                  </div>




                                                </div>

                                                <div class="position-relative form-group">
                                                  <label for="exampleEmail" class="">Note</label>
                                                  <textarea name="pt_remark_mem" style="height:150px" class="form-control">{{$objs->pt_remark_mem}}</textarea>
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
                                        <button class="mt-2 btn btn-primary" type="submit">อัพเดทข้อมูล</button>
                                        </div>
                                    </form>
                                </div>
                            </div>




                            </div>

                        </div>




                    </div>

@stop



@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>




;(function( $ ){
  $.fn.AutoProvince = function( options ) {
    var Setting = $.extend( {
      PROVINCE:		'#province', // select div สำหรับรายชื่อจังหวัด
      AMPHUR:			'#amphur', // select div สำหรับรายชื่ออำเภอ
      POSTCODE:		'#postcode', // input field สำหรับรายชื่อรหัสไปรษณีย์
      arrangeByName:		false // กำหนดให้เรียงตามตัวอักษร
    }, options);

    return this.each(function() {
      var xml;
      var dataUrl = "{{url('assets/thailand.xml')}}";


      $(function() {
        initialize();
      });

      function initialize(){
        $.ajax({
          type: "GET",
          url: dataUrl,
          dataType: "xml",
          success: function(xmlDoc) {
            xml = $(xmlDoc);

            _loadAmphur({{$objs->province_mem}});
            _loadDistrict({{$objs->district_mem}});

            _loadProvince();
            addEventList();
            $("#amphur").val('{{$objs->district_mem}}');

              $("#postcode").val('{{$objs->zip_code_mem}}');
          },
          error: function() {
            console.log("Failed to get xml");
          }
        });
      }

      function _loadProvince()
      {
        var list = [];
        xml.find('table').each(function(index){
          if($(this).attr("name") == Setting.PROVINCE.split("#")[1]){
            var PROVINCE_ID = $(this).children().eq(0).text();
            var PROVINCE_NAME = $(this).children().eq(2).text();
            if(PROVINCE_ID)list.push({id:PROVINCE_ID,name:PROVINCE_NAME});

          }
        });
        if(Setting.arrangeByName){
          AddToView(list.sort(SortByName),Setting.PROVINCE);
        }else{
          AddToView(list,Setting.PROVINCE);
        }
      }

      function _loadAmphur(PROVINCE_ID_SELECTED)
      {
        var list = [];
        var isFirst = true;
        $(Setting.AMPHUR).empty();
        xml.find('table').each(function(index){
          if($(this).attr("name") == Setting.AMPHUR.split("#")[1]){
            var AMPHUR_ID = $(this).children().eq(0).text();
            var AMPHUR_NAME = $(this).children().eq(2).text();
            var POSTCODE = $(this).children().eq(3).text();
            var PROVINCE_ID = $(this).children().eq(5).text();
            if(PROVINCE_ID_SELECTED == PROVINCE_ID && AMPHUR_ID){
              if(isFirst)_loadDistrict(AMPHUR_ID);
              isFirst = false;
              list.push({id:AMPHUR_ID,name:AMPHUR_NAME,postcode:POSTCODE});
              $(Setting.POSTCODE).val(POSTCODE);
            }
          }
        });
        if(Setting.arrangeByName){
          AddToView(list.sort(SortByName),Setting.AMPHUR);
        }else{
          AddToView(list,Setting.AMPHUR);
        }
      }

      function _loadDistrict(AMPHUR_ID_SELECTED)
      {
        var list = [];
        $(Setting.DISTRICT).empty();
        xml.find('table').each(function(index){
          if($(this).attr("name") == Setting.DISTRICT.split("#")[1]){
            var DISTRICT_ID = $(this).children().eq(0).text();
            var DISTRICT_NAME = $(this).children().eq(2).text();
            var AMPHUR_ID = $(this).children().eq(3).text();
            if(AMPHUR_ID_SELECTED == AMPHUR_ID && DISTRICT_ID){
              list.push({id:DISTRICT_ID,name:DISTRICT_NAME});
            }
          }
        });
        if(Setting.arrangeByName){
          AddToView(list.sort(SortByName),Setting.DISTRICT);
        }else{
          AddToView(list,Setting.DISTRICT);
        }
      }

      function addEventList(){
        $(Setting.PROVINCE).change(function(e) {
          var PROVINCE_ID = $(this).val();
          _loadAmphur(PROVINCE_ID);
        });
        $(Setting.AMPHUR).change(function(e) {
          var AMPHUR_ID = $(this).val();
          $(Setting.POSTCODE).val($(this).find('option:selected').attr("POSTCODE"));
          _loadDistrict(AMPHUR_ID);
        });
      }
      function AddToView(list,key){
        for (var i = 0;i<list.length;i++) {
          if(key != Setting.AMPHUR){
            $(key).append("<option value='"+list[i].id+"'>"+list[i].name+"</option>");
          }else{
            $(key).append("<option value='"+list[i].id+"' POSTCODE='"+list[i].postcode+"'>"+list[i].name+"</option>");
          }
        }
      }

      function SortByName(a, b){
        var aName = a.name.toLowerCase();
        var bName = b.name.toLowerCase();
        return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
      }
    });
  };
})( jQuery );

$('body').AutoProvince({
		PROVINCE:		'#province', // select div สำหรับรายชื่อจังหวัด
		AMPHUR:			'#amphur', // select div สำหรับรายชื่ออำเภอ
		DISTRICT:		'#district', // select div สำหรับรายชื่อตำบล
		POSTCODE:		'#postcode', // input field สำหรับรายชื่อรหัสไปรษณีย์
		arrangeByName:		false // กำหนดให้เรียงตามตัวอักษร
	});

</script>


@stop('scripts')
