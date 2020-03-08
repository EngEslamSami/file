

<style type="text/css">
    label.label{
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: none !important;
        font-weight: 500 !important;
    }

    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    .print_forma {
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {
        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;
    }

    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }

    .footer img {
        width: 100%;
        height: 120px;
    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    /***/

    .btn-close-model,
    .btn-close-model:hover,
    .btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }
.box-h {
    border-radius: 4px;
    padding: 1px 5px;
    margin-bottom: 4px;
    font-weight: bold;
    font-size: 16px;
}
    .box-h .box-span1 {
    color: #d88200;
    border: 1px solid #649c48;
    padding: 5px;
    margin-left: 5px;
    border-radius: 5px;
    width: 120px;
    display: inline-block;
    text-align: center;
}
    .box-h .box-span2{
        color: #d88200;
    border: 1px solid #649c48;
    padding: 5px;
    margin-left: 5px;
    border-radius: 5px;
    }

    .my_style{

        color: #222;
        font-size: 15px;
        font-weight: 500;

    }
</style>

<div class="col-sm-12 no-padding " >


        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
           <div class="panel-body"> 
           <!--   <div class="panel-body" style="height: 500px;overflow-y: scroll;"> -->
                <form id="myform">
                <div class="col-md-12 no-padding">


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">  الفترة من </label>
                        <input type="date" name="from_date" id="from_date" VALUE="<?php echo date("Y-m-d");?>" class="form-control  bottom-input">
                    </div>


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">  الفترة إلي </label>
                        <input type="date" name="to_date" VALUE="<?php echo date("Y-m-d");?>" id="to_date" class="form-control  bottom-input">
                    </div>


   <div class="form-group col-md-2 col-sm-6 padding-4">
  <label for="example-time-input" class="label">من</label>

    <input placeholder="من"   data-validation="required" name="from_time"   id="m13h"   class="form-control" type="text" data-validation="required"
           value=""     style="width: 100%; float: right;margin-left: 10px;    text-align: center;">
</div>

   <div class="form-group col-md-2 col-sm-6 padding-4">
  <label for="example-time-input" class="label">إلي</label>

     <input placeholder="إلى"  data-validation="required"  name="to_time" id="m12h" type="text" class="form-control" data-validation="required"
           value="" style="width: 100%; float: right;    text-align: center;">
</div>








                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">  المحصل </label>
                        <select name="publisher" id="publisher" class="form-control   bottom-input  " >
                            <option value="">إختر</option>
                            <?php if(!empty($publishers)){ foreach($publishers as $row){ ?>
                            <option value="<?php echo $row->publisher;?>"> <?php echo $row->publisher_name;?> </option>
                            <?php } } ?>
                        </select>

                    </div>



                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label "> جهة التحصيل</label>
                        <select id="place_supply" name="place_supply" class="form-control bottom-input input_style_2 inputclass">
                            <option value="">إختر</option>
                            <?php if(!empty($gathering_place)){
                                foreach ($gathering_place as $row){  ?>
                                    <option value="<?=$row->id_setting?>"><?=$row->title_setting?></option>
                                <?php  } } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">  نوع الإيصال </label>
                        <select id="pill_type" name="pill_type" class="form-control input_style_2 inputclass bottom-input" onchange="GEtF2a(this.value,'tabro3');">
                            <option value="">إختر  </option>
                            <?php if(!empty($esal_type)){  foreach ($esal_type as $row){ ?>
                                <option value="<?=$row->from_id?>"><?=$row->title?></option>
                            <?php } } ?>
                        </select>
                    </div>



                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label ">  طريقة التوريد </label>
                        <select id="pay_method"  name="pay_method[]"  class="form-control input_style_2 inputclass bottom-input  selectpicker" multiple data-actions-box="true">
                            <!--<option value="">إختر</option>-->
                            <?php
                            $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي'
                            ,5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

                            if(isset($pay_method_arr)&&!empty($pay_method_arr)) {
                                for($a=1;$a<sizeof($pay_method_arr);$a++){?>
                                    <option value="<?php echo $a;?>"><?php echo $pay_method_arr[$a];?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>

                    </div>


                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label">  فئة التبرع </label>
                        <select  name="fe2a_id_fk"  data-validation="required"
                                 class=" choose-date  form-control input_style_2 inputclass bottom-input"
                                 data-show-subtext="true" data-live-search="true"   >
                            <option value="">اختر</option>
                            <?php  if(!empty($fe2a_types)){  foreach ($fe2a_types as $row){?>
                                <option value="<?php  echo $row->id;?>"><?php  echo $row->title;?></option>
                            <?php  } } ?>
                        </select>

                    </div>
                    
                    
                      <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label"> اسم المتبرع </label>
                    <input type="text" name="motbr3_name" id="motbr3_name" disabled="disabled" value="<?php /*$motbr3_name*/ ?>"
                           style="width:86%; float: right;"
                           class="form-control "

                           data-validation-has-keyup-event="true">
                    <button type="button" data-toggle="modal" data-target="#myModalInfo"
                            class="btn btn-success btn-next" style="float: right;" onclick="GetDiv('myDiv')">
                        <i class="fa fa-plus"></i></button>
                    <input type="hidden" name="motbr3_id_fk" id="motbr3_id_fk" value="<?php /*$motbr3_id_fk */ ?>">
                </div>


     <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> رقم الجوال </label>
                    <input type="text" name="motbr3_jwal" id="motbr3_jwal" value=""
                           class="form-control "
                           onkeypress="validate_number(event)"
                           data-validation-has-keyup-event="true">
                </div>



                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label">  نوع التبرع </label>
                        <select  class="form-control  input_style_2 inputclass bottom-input" id="erad_tbro3" name="erad_type"
                                 onchange="GEtF2a(this.value,'fe2a');
                                  
                          $('#fe2a').val('');$('#fe2a_type2').val('');">
                            <option value=""> إختر  </option>

                        </select>
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">  الفئة </label>
                        <select   class="form-control  input_style_2 inputclass bottom-input" id="fe2a" name="fe2a_type1"
                                  onchange="GEtF2a(this.value,'band')"     >
                            <option value="">إختر  </option>
                        </select>

                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">  البند </label>
                        <select id="band" name="bnd_type1" class="form-control  input_style_2 inputclass bottom-input">
                            <option value="">إختر  </option>
                        </select>

                    </div>
                    <div class="form-group col-md-2 col-sm-6 ">


                        <button type="button" class="btn btn-labeled btn-success" name="add" style="margin-top: 20px;"   onclick="SearchTable()">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>بحث
                        </button>
                    </div>

                </div>


                <div class="col-md-12"  >
                    <div class="form-group col-md-4 col-sm-6 "></div>


                    <div class="form-group col-md-3 col-sm-6 "></div>
                </div>
                </form>
            </div>
        </div>






   
   
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">نتيجة البحث</h3>
            </div>
            <div class="panel-body" style="">
                <div class="col-md-12 no-padding" id="optionearea1">
  <!--
   <div class='loader-img'><div class='bar1'></div><div class='bar2'></div><div class='bar3'></div><div class='bar4'></div><div class='bar5'></div><div class='bar6'></div></div>
      -->        
              
                </div>
            </div>
        </div>
  
  






</div>

<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> المتبرعين </h4>
            </div>
            <div class="modal-body">
                <div id="myDiv"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/analogue-time-picker.js"></script>
<script>
timePickerInput({
inputElement: document.getElementById("m12h"),
mode: 12,
// time: new Date()
});
</script>
<script>
timePickerInput({
inputElement: document.getElementById("m13h"),
mode: 12,
// time: new Date()
});
</script>
<script>
    function GetMemberName(obj) {

        console.log(' obj :' + obj.dataset.name);
        var name = obj.dataset.name;
        var mob = obj.dataset.mob;
        var id = obj.dataset.id;
        document.getElementById('motbr3_name').value = name;
        document.getElementById('motbr3_jwal').value = mob;
        document.getElementById('motbr3_id_fk').value = id;

        $("#myModalInfo .close").click();

    }
    function GetDiv(div) {
        html = '<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> الإسم </th><th style="width: 170px;" >الجوال </th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members').show();
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>finance_accounting/box/reports/Pills_movement_controller/getConnection',

            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                
                {"bSortable": true}
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
                    exportOptions: {columns: ':visible'},
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

    function GEtF2a(value,type) {
        if (value !=0 &&  value >0 &&  value!=0) {

            var dataString = 'id=' + value +'&type=' + type;
            
            
        // console.log(dataString);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_Finance_resource/all_pills/AllPills/GetData',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    if(type === 'tabro3'){
                        var html = '<option value="">إختر </option>';

                        for (i = 0; i < JSONObject.length; i++) {
                            html += '<option value="' + JSONObject[i].from_id + '"> ' + JSONObject[i].title + '</option>';
                        }
                        $("#erad_tbro3").html(html);

                    }else if(type === 'fe2a') {
                        var html = '<option value="">إختر </option>';
                        for (i = 0; i < JSONObject.length; i++) {
                            html += '<option value="' + JSONObject[i].from_id + '"> ' + JSONObject[i].title + '</option>';
                        }
                        $("#fe2a").html(html);

                    }else if(type === 'band') {
                        if(JSONObject.length > 1) {
                            var html = '<option value="">إختر </option>';
                        }
                        for (i = 0; i < JSONObject.length; i++) {
                            html += '<option value="' + JSONObject[i].code + '"> ' + JSONObject[i].title + '</option>';
                        }
                        $("#band").html(html);

                    }
                }
            });
        }

    }
</script>


<script>

    function SearchTable() {
            var dataString = $('#myform').serialize();
        //console.log(dataString);
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/box/reports/Pills_movement_controller/Get_esalat_tabr3at',
                data:dataString,
                dataType: 'html',
                cache:false,
                beforeSend: function() {
                    $('#optionearea1').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
                },
                success: function(html){
                    $("#optionearea1").html(html);
                    window.scroll(0,300);


                }
            });
    }

</script>