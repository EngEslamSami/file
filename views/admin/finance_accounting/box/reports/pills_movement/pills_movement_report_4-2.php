

<style type="text/css">
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
    btn-close-model:hover,
    btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }


    .my_style{

        color: #222;
        font-size: 15px;
        font-weight: 500;

    }
</style>

<div class="col-sm-12 no-padding " >
    <div class="col-sm-4 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <div class="panel-body">
                <form id="myform">
                <div class="col-md-12 no-padding">

                    <div class="form-group col-md-6 col-sm-6 padding-4">
                        <label class="label top-label">  الفترة من </label>
                        <input type="date" name="from_date" id="from_date" class="form-control  bottom-input">
                    </div>


                    <div class="form-group col-md-6 col-sm-6 padding-4">
                        <label class="label top-label">  الفترة إلي </label>
                        <input type="date" name="to_date" id="to_date" class="form-control  bottom-input">
                    </div>

                    <div class="form-group col-md-6 col-sm-6 padding-4">
                        <label class="label top-label">  المحصل </label>
                        <select name="" id="" class="form-control   bottom-input  " >
                            <option value="">إختر</option>
                            <?php if(!empty($publishers)){ foreach($publishers as $row){ ?>
                            <option value="<?php echo $row->publisher;?>"> <?php echo $row->publisher_name;?> </option>
                            <?php } } ?>
                        </select>

                    </div>



                    <div class="form-group col-md-6  col-sm-6 padding-4">
                        <label class="label top-label"> مركز التحصيل</label>
                        <select id="place_supply" name="place_supply" class="form-control bottom-input input_style_2 inputclass">
                            <option value="">إختر</option>
                            <?php if(!empty($gathering_place)){
                                foreach ($gathering_place as $row){  ?>
                                    <option value="<?=$row->id_setting?>"><?=$row->title_setting?></option>
                                <?php  } } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6 col-sm-6 padding-4">
                        <label class="label top-label">  نوع الإيصال </label>
                        <select id="pill_type" name="pill_type" class="form-control input_style_2 inputclass bottom-input" onchange="GEtF2a(this.value,'tabro3');">
                            <option value="">إختر  </option>
                            <?php if(!empty($esal_type)){  foreach ($esal_type as $row){ ?>
                                <option value="<?=$row->from_id?>"><?=$row->title?></option>
                            <?php } } ?>
                        </select>
                    </div>



                    <div class="form-group col-md-6 col-sm-6 padding-4">
                        <label class="label top-label">  طريقة التوريد </label>
                        <select id="pay_method" name="pay_method" class="form-control input_style_2 inputclass bottom-input">
                            <option value="">إختر</option>
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


                    <div class="form-group col-md-6 col-sm-6 padding-4">
                        <label class="label top-label">  فئة التبرع </label>
                        <select  name="fe2a_id_fk"  data-validation="required"
                                 class=" choose-date  form-control input_style_2 inputclass bottom-input"
                                 data-show-subtext="true" data-live-search="true"   >
                            <option value="">اختر</option>
                            <?php  if(!empty($fe2a_types)){  foreach ($fe2a_types as $row){?>
                                <option value="<?php  echo $row->id;?>"><?php  echo $row->title;?></option>
                            <?php  } } ?>
                        </select>

                    </div>


                    <div class="form-group col-md-6 col-sm-6 padding-4">
                        <label class="label top-label">  نوع التبرع </label>
                        <select  class="form-control  input_style_2 inputclass bottom-input" id="erad_tbro3" name="erad_type"
                                 onchange="GEtF2a(this.value,'fe2a');
                                    var html = '<option>إختر </option>';
                          $('#fe2a').val('');$('#fe2a_type2').val('');">
                            <option value=""> إختر  </option>

                        </select>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 padding-4">
                        <label class="label top-label">  الفئة </label>
                        <select   class="form-control  input_style_2 inputclass bottom-input" id="fe2a" name="fe2a_type1"
                                  onchange="GEtF2a(this.value,'band')"     >
                            <option value="">إختر  </option>
                        </select>

                    </div>


                    <div class="form-group col-md-6 col-sm-6 padding-4">
                        <label class="label top-label">  البند </label>
                        <select id="band" name="bnd_type1" class="form-control  input_style_2 inputclass bottom-input">
                            <option value="">إختر  </option>
                        </select>

                    </div>

                </div>


                <div class="col-md-12"  >
                    <div class="form-group col-md-4 col-sm-6 "></div>

                    <div class="form-group col-md-4 col-sm-6 ">
                        <br /><br />
                        <button type="button"  name="add"  onclick="SearchTable()"
                                class="btn btn-warning">
                            <span><i class="fa fa-floppy-o"></i></span> بحث
                        </button>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 "></div>
                </div>
                </form>
            </div>
        </div>





    </div>



    <div class="col-sm-8 no-padding">
        <div  class=" panel panel-bd lobipanel-noaction  ">
            <div class="panel-heading">
                <h3 class="panel-title">نتيجة البحث</h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12 no-padding" id="optionearea1">

                </div>
            </div>
        </div>
    </div>


</div>

<script>

    function GEtF2a(value,type) {
        if (value !=0 &&  value >0 &&  value!=0) {

            var dataString = 'id=' + value +'&type=' + type;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_Finance_resource/all_pills/AllPills/GetData',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    if(type === 'tabro3'){
                        var html = '<option>إختر </option>';

                        for (i = 0; i < JSONObject.length; i++) {
                            html += '<option value="' + JSONObject[i].from_id + '"> ' + JSONObject[i].title + '</option>';
                        }
                        $("#erad_tbro3").html(html);

                    }else if(type === 'fe2a') {
                        var html = '<option>إختر </option>';
                        for (i = 0; i < JSONObject.length; i++) {
                            html += '<option value="' + JSONObject[i].from_id + '"> ' + JSONObject[i].title + '</option>';
                        }
                        $("#fe2a").html(html);

                    }else if(type === 'band') {
                        if(JSONObject.length > 1) {
                            var html = '<option>إختر </option>';
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
        console.log(dataString);
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/box/reports/Pills_movement_controller/GetSearchTable',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
    }
</script>