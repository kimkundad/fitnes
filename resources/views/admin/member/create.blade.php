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
                                              <div class="position-relative form-group">
                                                <label for="exampleEmail" class="">ที่อยู่</label>
                                                <textarea name="course_remark" style="height:120px" class="form-control"></textarea>
                                              </div>

                                              <div class="position-relative form-group ">
                                                <label for="exampleEmail" class="">จังหวัด</label>
                                                <select id="province" name="province" class="form-control">
                                                  <option value="">- กรุณาเลือกจังหวัด -</option>
                                              </select>
                                              </div>

                                              <div class="position-relative form-group ">
                                                <label for="exampleEmail" class="">อำเภอ</label>
                                                <select id="amphur" name="amphur" class="form-control">
                                                  <option value="">- กรุณาเลือกอำเภอ -</option>
                                              </select>
                                              </div>

                                              <div class="position-relative form-group"><label for="exampleEmail11" class="">รหัสไปรษณีย์</label>
                                                <input id="postcode" name="postcode" placeholder="10310" type="text" class="form-control">
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

            _loadProvince();
            addEventList();
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
