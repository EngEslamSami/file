<?php
$this->load->view('admin/requires/header');
$this->load->view('admin/requires/tob_menu');

?>

<style type="text/css">
    .top-label {
        font-size: 14px;
        font-weight: 500;

    }
    .print_forma{
        /*border:1px solid #73b300;*/
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
    .bordered-bottom{
        border-bottom: 4px solid #9bbb59;
    }
    .piece-footer{
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
        color: #fff;
    }
    .piece-box table{
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td
    {
        padding: 2px 8px !important;
    }

    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
    }
    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .no-padding{
        padding: 0;
    }
    .header p{
        margin: 0;
    }
    .header img{
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

    .print_forma hr{
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border{
        border:0 !important;
    }

    .gray_background{
        background-color: #eee;

    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }
    .open_green{
        background-color: #e6eed5;
    }
    .closed_green{
        background-color: #cdddac;
    }
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }
    .under-line{
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }
    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3 ,
    .under-line .col-xs-4,
    .under-line .col-xs-6 ,
    .under-line .col-xs-8
    {
        border-left: 1px solid #abc572;
    }


    .nonactive{
        pointer-events: none;
        cursor: not-allowed;
    }


    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block ;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>
<?php

    if ($_SESSION['role_id_fk']==1 || $_SESSION['role_id_fk']==3){
        ?>
        <div >

<div class="col-xs-12 no-padding" >
 
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <div class="panel-body">
             <div class="col-md-10  padding-4">
                <?php
                if (isset($get_ezn) && !empty($get_ezn)){
                    echo form_open_multipart('human_resources/employee_forms/all_ozonat/Ezn_order/Upadte_ezn/'.$get_ezn->id);
                    $no3_ezn = $get_ezn->no3_ezn;
                    $emp_id_fk = $get_ezn->emp_id_fk;
                    $ezn_date = $get_ezn->ezn_date_ar;
                    $fatra_fk = $get_ezn->fatra_fk;
                    $from_hour = $get_ezn->from_hour;
                    $to_hour = $get_ezn->to_hour;
                    $total_hours = $get_ezn->total_hours;
                    $reason = $get_ezn->reason;

                } else{
                    echo form_open_multipart('human_resources/employee_forms/all_ozonat/Ezn_order');
                    $no3_ezn = '';
                    $emp_id_fk = '';
                    $ezn_date =date('Y-m-d');
                    $fatra_fk = '';
                    $from_hour = '';
                    $to_hour = '';
                    $total_hours ='';
                    $reason = '';

                }
                ?>
                <div class="col-xs-12 no-padding">
                    <div class="col-md-2  padding-4">
                        <label class="label ">نوع الاذن</label>
                        <?php   $permits=array(1=>'استئذان شخصي',2=>'استئذان للعمل');
                        $work_types=array("1"=>"فترة","2"=>"فترتين");
                        ?>

                        <select name="no3_ezn" id="no3_ezn" onchange="get_option($(this).val());"
                                data-validation="required"   class="form-control  ">
                            <option value=" " selected="">اختر</option>
                            <?php foreach ($permits as $key=>$value){?>
                                <option value="<?php echo $key;?>" <?php  if($no3_ezn==$key){ echo 'selected'; }?> > <?php echo $value;?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-md-3 padding-4">
                        <label class="label">اسم الموظف</label>
                        <?php
                        if (isset($emp_name) && !empty($emp_name)){
                            ?>
                            <input class="form-control" name="" readonly value="<?= $emp_name?>">
                              <input type="hidden" id="employee_name" value="<?= $_SESSION['emp_code'] ?>">
                        <?php

                        } else{
                            ?>
                            <select name="emp_id_fk"  id="employee_name"
                                    data-validation="required" class="form-control   selectpicker" onchange="get_emp_sidebar()"
                                    data-show-subtext="true" data-live-search="true"
                                    aria-required="true">
                                <option value="">إختر</option>
                                <?php
                                if(isset($all_emp)&&!empty($all_emp)) {
                                    foreach($all_emp as $row){
                                        $select='';
                                        ?>
                                        <option value="<?php echo $row->id;?>" <?php if($emp_id_fk == $row->id){ echo 'selected'; }?><?php //if($row->id==$emp_id_fk){echo 'selected'; }?> > <?php echo $row->employee;?></option >
                                        <?php
                                    }
                                }
                                ?>
                            </select>

                            <?php
                        }
                        ?>

                    </div>
                    <div class="col-md-2  padding-4">
                        <label class="label ">تاريخ  الاذن</label>
                        <input type="date"   name="ezn_date"  id="start_date" value="<?= $ezn_date;?>"
                               class="form-control  "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="col-md-1  padding-4">
                        <label class="label ">الفتره</label>


                        <select name="fatra_fk" id="fatra_fk" onchange="get_option($(this).val());"
                                data-validation="required"   class="form-control  ">


                            <option value=" " selected="">اختر</option>
                            <?php foreach ($work_types as $key=>$value){?>
                                <option value="<?php echo $key;?>" <?php  if($fatra_fk==$key){ echo 'selected'; }?>><?php echo $value;?></option>


                            <?php } ?>


                        </select>

                    </div>
                    <div class="col-md-2  padding-4">
                        <label class="label ">بداية الإذن</label>
                        <input type="text"   name="from_hour" onchange="get_time();" id="from_time" value="<?= $from_hour?>"
                               class="form-control  "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="col-md-2  padding-4">
                        <label class="label ">نهاية الإذن</label>
                        <input type="text"   name="to_hour" onchange="get_time();" id="to_time" value="<?= $to_hour?>"
                               class="form-control  "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="col-md-1  padding-4">
                        <label class="label ">المده</label>
                        <input type="text" readonly   name="total_hours" id="num_hours" value="<?= $total_hours?>"
                               class="form-control  ">
                    </div>
                    <div class="col-md-3  padding-4">
                        <label class="label ">السبب</label>
                        <input class="form-control" id="reason" name="reason" value="<?= $reason?>" />
                        <!--
                        <textarea id="reason" name="reason" class="form-control"></textarea>-->
                    </div>

                     <div class="col-md-3 text-center">
                    <span style="color: red" id="span_id"></span><br>

                    <button type="submit"  class="btn btn-labeled btn-success " name="add_ezn" value="add_ezn" id="add_ezn"  style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                  <!--  <button type="button" class="btn btn-labeled btn-danger ">
                        <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                    </button>

                    <button type="button" class="btn btn-labeled btn-purple ">
                        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                    </button>


                    <button type="button" class="btn btn-labeled btn-inverse "  id="attach_button" data-target="#myModal_search"  data-toggle="modal" >
                        <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                    </button>-->


                </div>

                </div>
               

                
                <?php
                echo form_close();
                ?>

                </div>
                
                
             <div class="col-sm-2 padding-4">
                        <div id="sidebar_emp"></div>
                    </div>





            </div>

        </div>




</div>
            <?php
            if (isset($emp) && $emp ===0){
               } else{

                ?>

<table id="js_table_ozonat"
       style="table-layout: fixed;"
       class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
    <thead>
    <tr class="greentd">
        <th style="width: 20px;">م </th>
        <th style="width: 90px;">نوع الاذن</th>
        <th style="width: 200px;">اسم الموظف</th>
        <th style="width: 80px;">بدايه الاذن</th>
        <th style="width: 80px;">نهايه الاذن</th>
        <th style="width: 80px;">عدد الساعات</th>
       <!-- <th style="width: 80px;">التفاصيل</th> -->
        <th style="width: 120px;" >افاده شئون الموظفين</th>
        <th style=""> الاجراء</th>

    </tr>
    </thead>
</table>
                <?php
            }
            ?>


        </div>
        <?php

} else{
        ?>
        <div class="alert alert-danger">عفوا... لا تمتلك صلاحية لعرض هذه الصفحة !</div>
<?php
    }
?>
<!-- detailsModal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> التفاصيل </h4>
            </div>
            <div class="modal-body" id="details_result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button
                        type="button" onclick="print_ezn(document.getElementById('row_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
<!-- detailsModal -->

<!-- Ozonat_details Modal -->
<div class="modal fade" id="Ozonat_detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> التفاصيل </h4>
            </div>
            <div class="modal-body" id="ozonat_result">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button
                        type="button" onclick="print_ozonat(document.getElementById('emp_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
<!-- Ozonat_details Modal -->

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>

    function get_emp_sidebar() {
        var emp_id = $('#employee_name').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/get_emp_data",
            data: {emp_id: emp_id},
            success: function (d) {

                $('#sidebar_emp').html(d);


            }


        });
    }

    $(document).ready(function () {
        console.log('document ready');
        get_emp_sidebar();
        console.log('document ready');

    });

</script>

<?php


echo $ezn_js;
?>

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/analogue-time-picker.js"></script>
<!--

<script>

       timePickerInput({
           inputElement: document.getElementById("from_time"),
           mode: 12,

       });

</script>

<script>

      timePickerInput({
          inputElement: document.getElementById("to_time"),
          mode: 12,

      });

</script>

-->


<script>
    $(document).ready(function(){
        $('#from_time').mdtimepicker(); //Initializes the time picker
    });
</script>
<script>
    $(document).ready(function(){
        $('#to_time').mdtimepicker(); //Initializes the time picker
    });
</script>



<?php  $this->load->view('admin/requires/footer'); ?>



<script>
    function get_time() {

        var start = $('#from_time').val();
        var end = $('#to_time').val();
    //  alert(start);
    //  return;

        if (start != '' && end != '') {

            s = start.split(':');
            e = end.split(':');
            var ss = s[s.length - 1].split(' ');
            var ee = e[e.length - 1].split(' ');

            if (ss[ss.length - 1] === 'PM') {
                if (parseInt(s[0]) === 12) {

                } else {
                    s[0] = parseInt(s[0]) + 12;
                }
            }
            if (ee[ee.length - 1] === 'PM') {
                if (parseInt(e[0]) === 12) {
                } else {
                    e[0] = parseInt(e[0]) + 12;
                }
            }
            min = parseInt(e[1]) - parseInt(s[1]);
            console.log('min :' + min + " e[1] :" + e[1] + " s[1] :" + s[1]);
            hour_carry = 0;
            if (min < 0) {
                min += 60;
                hour_carry += 1;
            }
            console.log('min :' + min);
            hour = e[0] - s[0] - hour_carry;
            diff = hour + "." + min;
            console.log('min :' + min + " hours :" + hour + " diff :" + diff);
            $('#num_hours').val(diff);
            if (diff <= 0) {
                $('#num_hours').val(0);
                document.getElementById("add_ezn").disabled = true;
                document.getElementById("span_id").style.display = 'block';
                document.getElementById("span_id").innerText = 'من فضلك ادخل فترة زمنية صحيحة';
            } else {
                document.getElementById("add_ezn").disabled = false;
                document.getElementById("span_id").style.display = 'none';

            }
        }
    }

</script>

<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>

<script>
    function load_person_data(emp_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order/load_ozonat_details",
            data: {emp_id:emp_id},
            success: function (d) {
                $('#ozonat_result').html(d);

            }

        });

    }
</script>

<script>
    function print_ezn(row_id) {

        var request = $.ajax({
            url: "<?=base_url().'human_resources/employee_forms/all_ozonat/Ezn_order/print_ezn'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>

<script>
    function print_ozonat(emp_id) {

        var request = $.ajax({
            url: "<?=base_url().'human_resources/employee_forms/all_ozonat/Ezn_order/print_ozonat'?>",
            type: "POST",
            data: {emp_id: emp_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>





