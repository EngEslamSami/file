<style>
    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>


<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">تقرير الكفلاء</h3>
        </div>

        <div class="panel-body">

            <div class="col-sm-12">
                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label ">البحث عن</label>
                    <select class="form-control" id="searchOf" onchange="searchOf(this);">

                        <option value="0">الكل</option>
                        <option value="1">الاسره</option>
                    </select>

                    <!--   <input type="radio" name="all"  value="0" id="radio-one" onclick="get_click2();"  class="form-radio"  checked>

                       <label for="radio-one">الكل </label>
                       <input type="radio" name="all" value="1" id="radio-one"  class="form-radio"  onclick="get_click();">

                       <label for="radio-one">بكود الكافل </label>-->
                </div>

                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label ">رقم الاسره </label>
                    <input type="number" class="form-control " name="k_num" id="k_num2" disabled onfocusOut="check_k_num();" style="width: 78%;float: right">
                    <button type="button" disabled   data-toggle="modal" id="k_num" onclick="GetDiv('myDiv',1)" data-target="#myModalInfo" class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i>  </button>


                </div>
                <?php
                ?>
                <span style="color:red; display:none;" id="message" class="error-text " > عفوا.. هذا الكود غير موجود</span>
                <?php
                ?>
                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label ">التصنيف</label>
                    <select class="form-control " data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true" id="fe2a_type">
                        <option value="0" selected="">الكل</option>
                        <option value="1">ارمله</option>
                        <option value="2">يتيم</option>
                        <option value="2">مستفيد</option>

                    </select>

                </div>



                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label">الجنس</label>
                    <select class="form-control " data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true" id="gender">
                        <option value="0" selected="">الكل</option>
                        <option value="52">ذكر</option>
                        <option value="53">انثي</option>

                    </select>

                </div>
                <?php $types=array(1=>'كفاله شامله',2=>'كفاله نصف شامله',3=>'كفاله مستفيد',4=>'كفاله ارمله');?>
                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label">انواع الكفاله</label>
                    <select class="form-control " data-validation="required" aria-required="true"
                            tabindex="-1" aria-hidden="true" id="kafala_type_fk">
                        <option value="0" selected="">الكل</option>
                        <?php
                        if(isset($kfalat_types)&&!empty($kfalat_types)) {
                            foreach($kfalat_types as $value){
                                ?>
                                <option value="<?php echo $value->id;?>"
                                >
                                    <?php echo $value->title;?></option >
                                <?php
                            }
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label">طبيعه المستفيد</label>
                    <select class="form-control" data-validation="required"
                            aria-required="true" tabindex="-1" aria-hidden="true" id="pay_method">

                        <option value="0" selected="">الكل</option>

                        <option value="1">غير مكفول</option>
                        <option value="2">مكفول</option>

                    </select>

                </div>

            </div>
            <div class="col-sm-12">

                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <div id="cal-1">
                        <label class="label"> تاريخ نهايه الكفالة م</label>
                        <input id="date-Miladi" name="from_date" class="form-control"
                               value="" type="text" onfocus="showCal1();"  style=" width: 100%;float: right"  />
                    </div>
                </div>
                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <div id="cal-2">
                        <label class="label">تاريخ نهايه الكفالة هـ</label>
                        <input id="date-Hijri" name="from_date_h" class="form-control"  value=""
                               type="text"  onfocus="showCal2();" value="" style=" width: 100%;float: right"/>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 text-center">
                <button type="button" class="btn btn-labeled btn-success search" id=""  name="search" onclick="get_result();" >
                    <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                </button>
            </div>


            <!-------------------------------------------------------------------------------------->
            <div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" style="width: 70%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">الاسر</h4>
                        </div>
                        <div class="modal-body">

                            <div  id="myDiv"></div>
                        </div>
                        <div class="modal-footer"  style="display: inline-block;width: 100%" >
                            <button type="button" class="btn btn-danger"
                                    style="float: left;" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
            <!----------------------------------------------------->
        </div>
    </div>
</div>



<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">نتيجة البحث</h3>
        </div>

        <div class="panel-body" style="height: 400px;overflow: scroll">

            <div id="res">
                <div id="before_send">

                </div>




            </div>

        </div>
    </div>
</div>







<script>
    function check_k_num() {
        var k_num = $('#k_num').val();
        var dataString   ='k_num=' + k_num;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_Finance_resource/reports/Reports/check_knum',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(d){

                if($('#k_num').val()!='')
                {
                    if (d==0){
                        $('#message').show();
                        $('.search').attr("disabled","disabled");


                    }else{
                        $('#message').html('هذا الرقم متاح');
                        $('#message').hide(7000);
                        // $('.search').removeattr("disabled","disabled");
                        $('.search').prop("disabled", false); // Element(s) are now enabled.

                    }
                }



            }
        });

    }
</script>

<script>

    function searchOf(item)
    {
        // alert(item.value);
        if(item.value==0){
            $('#k_num').prop("disabled", true); // Element(s) are now enabled.
            $('#k_num2').val('');
        }
        else if(item.value==1){
            $('#k_num').prop("disabled", false); // Element(s) are now enabled.
        }

    }


    function get_click()
    {

        $('#k_num').prop("disabled", false); // Element(s) are now enabled.
    }
    function get_click2()
    {

        $('#k_num').prop("disabled", true); // Element(s) are now enabled.
        $('#k_num2').val('');
    }
</script>

<script>
    function get_result()
    {
        var end_date=$('#date-Miladi').val();


        var valu=$("#searchOf").val();

        if(valu==1)
        {
            if($('#k_num2').val()=='')
            {
                alert("من فضلك ادخل رقم الاسره");
                return;
            }
        }

        var searchOf=$('#searchOf').val();

        var gender=$('#gender').val();
        var k_num=$('#k_num2').val();
        var kafala_type_fk=$('#kafala_type_fk').val();
        var type_member=$('#pay_method').val();
        var halet_khafel=$('#halet_khafel').val();
        var kafala_status=$('#kafala_status').val();
        var kafala_period=$('#kafala_period').val();

        var fe2a_type=$('#fe2a_type').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/reports/Reports/report_mother",
            data: {searchOf:searchOf,gender:gender,mother_num:k_num,kafala_type_fk:kafala_type_fk,type_member:type_member,halet_khafel:halet_khafel,
                kafala_status:kafala_status,kafala_period:kafala_period,end_date:end_date,fe2a_type:fe2a_type,valu:valu},
            beforeSend: function() {
                $('#res').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },

            success: function (d) {


                $('#before_send').html('');

                if(valu==0)
                {
                    $('#tab').show();
                    $('#res2').html('');
                    $('#res2').hide();
                    $('#res').html(d);
                }
                else{


                    //$('#tab').hide();
                    $('#before_send').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');

                    //$('#res2').show();
                    //$('#res2').html(d);
                    $('#res').html(d);
                }


            }

        });
    }

</script>
<script src='<?php echo base_url();?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url();?>asisst/admin_asset/js/calendar.js'></script>
<script>




    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    /*	date1.setAttribute("value",cal1.getDate().getDateString());
     date2.setAttribute("value",cal2.getDate().getDateString());*/

    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    //	setDateFields1();


    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal2.setTime(cal1.getTime());
        setDateFields1();
    };

    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal1.setTime(cal2.getTime());
        setDateFields1();
    };


    cal1.onHide = function() {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function() {
        cal2.show(); // prevent the widget from being closed
    };
    function setDateFields1() {
        /*	date1.value = cal1.getDate().getDateString();
         date2.value = cal2.getDate().getDateString();*/

        date1.setAttribute("value",cal1.getDate().getDateString());
        date2.setAttribute("value",cal2.getDate().getDateString());
    }

    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }

    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();
    }



</script>

<script>


    var calEnd1 = new Calendar(),
        calEnd2 = new Calendar(true, 0, true, true),
        dateEnd1 = document.getElementById('date-Miladi-end'),
        dateEnd2 = document.getElementById('date-Hijri-end'),
        calEnd1Mode = calEnd1.isHijriMode(),
        calEnd2Mode = calEnd2.isHijriMode();


    /*	dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
     dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());*/

    document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
    document.getElementById('cal-end-2').appendChild(calEnd2.getElement());



    calEnd1.show();
    calEnd2.show();
    //	setDateFieldsEnd1();





    calEnd1.callback = function () {
        if (calEnd1Mode !== calEnd1.isHijriMode()) {
            calEnd2.disableCallback(true);
            calEnd2.changeDateMode();
            calEnd2.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd2.setTime(calEnd1.getTime());
        setDateFieldsEnd1();
    };

    calEnd2.callback = function () {
        if (calEnd2Mode !== calEnd2.isHijriMode()) {
            calEnd1.disableCallback(true);
            calEnd1.changeDateMode();
            calEnd1.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd1.setTime(calEnd2.getTime());
        setDateFieldsEnd1();
    };





    calEnd1.onHide = function() {
        calEnd1.show(); // prevent the widget from being closed
    };

    calEnd2.onHide = function() {
        calEnd2.show(); // prevent the widget from being closed
    };





    function setDateFieldsEnd1() {
        /*	dateEnd1.value = calEnd1.getDate().getDateString();
         dateEnd2.value = calEnd2.getDate().getDateString();*/

        dateEnd1.setAttribute("value",calEnd1.getDate().getDateString());
        dateEnd2.setAttribute("value",calEnd2.getDate().getDateString());
    }




    function showCalEnd1() {
        if (calEnd1.isHidden())
            calEnd1.show();
        else
            calEnd1.hide();
    }

    function showCalEnd2() {
        if (calEnd2.isHidden())
            calEnd2.show();
        else
            calEnd2.hide();
    }


    //# sourceURL=pen.js

</script>


<!------------------------------------------------------->
<!------------------------------------------------------>

<script>

    var cal11 = new Calendar(),
        cal22 = new Calendar(true, 0, true, true),
        date11 = document.getElementById('mostadem-date-Miladi'),
        date22 = document.getElementById('mostadem-date-Hijri'),
        cal11Mode = cal11.isHijriMode(),
        cal22Mode = cal22.isHijriMode();


    /*	date11.setAttribute("value",cal11.getDate().getDateString());
     date22.setAttribute("value",cal22.getDate().getDateString());*/

    document.getElementById('cal-11').appendChild(cal11.getElement());
    document.getElementById('cal-22').appendChild(cal22.getElement());


    cal11.show();
    cal22.show();
    //	setDateFields();


    cal11.callback = function () {
        if (cal11Mode !== cal11.isHijriMode()) {
            cal22.disableCallback(true);
            cal22.changeDateMode();
            cal22.disableCallback(false);
            cal11Mode = cal11.isHijriMode();
            cal22Mode = cal22.isHijriMode();
        } else

            cal22.setTime(cal11.getTime());
        setDateFields();
    };

    cal22.callback = function () {
        if (cal22Mode !== cal22.isHijriMode()) {
            cal11.disableCallback(true);
            cal11.changeDateMode();
            cal11.disableCallback(false);
            cal11Mode = cal11.isHijriMode();
            cal22Mode = cal22.isHijriMode();
        } else

            cal11.setTime(cal22.getTime());
        setDateFields();
    };


    cal11.onHide = function() {
        cal11.show(); // prevent the widget from being closed
    };

    cal22.onHide = function() {
        cal22.show(); // prevent the widget from being closed
    };
    function setDateFields() {
        /*	date11.value = cal11.getDate().getDateString();
         date22.value = cal22.getDate().getDateString();*/

        date11.setAttribute("value",cal11.getDate().getDateString());
        date22.setAttribute("value",cal22.getDate().getDateString());
    }

    function showCal11() {
        if (cal11.isHidden())
            cal11.show();
        else
            cal11.hide();
    }

    function showCal22() {
        if (cal22.isHidden())
            cal22.show();
        else
            cal22.hide();
    }



</script>




<script>


    var calEnd11 = new Calendar(),
        calEnd22 = new Calendar(true, 0, true, true),
        dateEnd11 = document.getElementById('mostadem-date-Miladi-end'),
        dateEnd22 = document.getElementById('mostadem-date-Hijri-end'),
        calEnd11Mode = calEnd11.isHijriMode(),
        calEnd22Mode = calEnd22.isHijriMode();


    /*	dateEnd11.setAttribute("value",calEnd11.getDate().getDateString());
     dateEnd22.setAttribute("value",calEnd22.getDate().getDateString());*/

    document.getElementById('cal-end-11').appendChild(calEnd11.getElement());
    document.getElementById('cal-end-22').appendChild(calEnd22.getElement());



    calEnd11.show();
    calEnd22.show();
    //	setDateFieldsEnd();





    calEnd11.callback = function () {
        if (calEnd11Mode !== calEnd11.isHijriMode()) {
            calEnd22.disableCallback(true);
            calEnd22.changeDateMode();
            calEnd22.disableCallback(false);
            calEnd11Mode = calEnd11.isHijriMode();
            calEnd22Mode = calEnd22.isHijriMode();
        } else

            calEnd22.setTime(calEnd11.getTime());
        setDateFieldsEnd();
    };

    calEnd22.callback = function () {
        if (calEnd22Mode !== calEnd22.isHijriMode()) {
            calEnd11.disableCallback(true);
            calEnd11.changeDateMode();
            calEnd11.disableCallback(false);
            calEnd11Mode = calEnd11.isHijriMode();
            calEnd22Mode = calEnd22.isHijriMode();
        } else

            calEnd11.setTime(calEnd22.getTime());
        setDateFieldsEnd();
    };





    calEnd11.onHide = function() {
        calEnd11.show(); // prevent the widget from being closed
    };

    calEnd22.onHide = function() {
        calEnd22.show(); // prevent the widget from being closed
    };





    function setDateFieldsEnd() {
        /*	dateEnd11.value = calEnd11.getDate().getDateString();
         dateEnd22.value = calEnd22.getDate().getDateString();*/

        dateEnd11.setAttribute("value",calEnd11.getDate().getDateString());
        dateEnd22.setAttribute("value",calEnd22.getDate().getDateString());
    }




    function showCalEnd11() {
        if (calEnd11.isHidden())
            calEnd11.show();
        else
            calEnd11.hide();
    }

    function showCalEnd22() {
        if (calEnd22.isHidden())
            calEnd22.show();
        else
            calEnd22.hide();
    }


    //# sourceURL=pen.js

</script>

<script>

    function GetDiv(div,valu) {
        var html;
        if(valu ==1){
            html ='<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> رقم الاسره </th><th style="width: 50px;"> رقم الملف  </th><th style="width: 170px;" >اسم رب الاسره</th>' +
                '</tr></thead><table><div id="dataMember"></div></div>';
        }
        $("#" + div).html(html);

        /*
         $("#" + div).html('<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
         '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> الإسم </th><th style="width: 170px;" >الهوية </th><th style="width: 170px;" >الجوال</th>' +
         '</tr></thead><table><div id="dataMember"></div></div>');
         */

        $('#person_type').val(valu);
        $('#js_table_members').show();
        var F2aType = valu;
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>all_Finance_resource/reports/Reports/get_mother_data',

            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }
            ],

            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: { columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });

    }
</script>
<script>

    function GetMemberName(valu) {
        var id = valu;
        $('#k_num2').val(valu);
        $("#myModalInfo .close").click();


    }

</script>
