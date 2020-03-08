
<style type="text/css">
    .print_forma{
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
      /*  border: 1px solid #73b300;*/
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
    background-color: #09704e;
    display: inline-block;
    float: right;
    width: 100%;
    padding: 5px;
    color: #fff;
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
    }
    .piece-box table{
        margin-bottom: 0;
        font-size: 17px;
    }
    .piece-box table th,
    .piece-box table td
    {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
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
    @media print{
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }
    .footer img{
        width: 100%;
        height: 120px;
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
        font-size: 12px;
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

</style>

<?php

if(!empty($result)){


    $emp_name =$result['emp_name'];
    $qsm_id_fk=$result['qsm_id_fk'];
    $edara_id_fk=$result['edara_id_fk'];
    $job_title_id_fk=$result['job_title_id_fk'];
    $direct_manager_id_fk=$result['direct_manager_id_fk'];


    $salary=$result['salary'];
    $bdal_skan=$result['bdal_skan'];
    $bdal_mowaslat =$result['bdal_mowaslat'];
    $bdal_other =$result['bdal_other'];
    $total_salary =$result['total_salary'];
    $work_date_h =$result['work_date_h'];
    $work_date_m =$result['work_date_m'];
    $date_from_m =$result['date_from_m'];
    $date_from_h =$result['date_from_h'];
    $date_to_m =$result['date_to_m'];
    $date_to_h =$result['date_to_h'];



}else{

    $emp_name='';
    $qsm_id_fk='';
    $edara_id_fk='';
    $direct_manager_id_fk ='';
    $job_title_id_fk='';
    $salary ='';
    $bdal_skan ='';
    $bdal_mowaslat  ='';
    $bdal_other  ='';
    $total_salary  ='';
    $work_date_h ='';
    $work_date_m ='';
    $date_from_m  ='';
    $date_from_h ='';
    $date_to_m ='';
    $date_to_h ='';

}
?>


<!--------------------------------------------------------modal------------------------------------>

<div class="col-sm-12 no-padding " >
 
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <div class="panel-body">
                <?php
                if(isset($result)&&!empty($result)){ ?>
                <form action="<?php echo base_url();?>human_resources/employee_forms/ta3en/Temporary_employment_qrars/edit_temporary_employment_qrars/<?php echo $result['id'];?>" method="post">
                    <?php } else{?>
                    <form action="<?php echo base_url();?>human_resources/employee_forms/ta3en/Temporary_employment_qrars/add_temporary_employment_qrars" method="post">
                        <?php }?>

                        <div class="print_forma  col-xs-12 no-padding">

                            <div class="piece-box">
                                <div class="piece-heading">
                                    <h6>&nbsp  المدير المباشر</h6>
                                </div>
                                <div class="piece-body" >
                                    <div class="col-xs-12 ">
                                        <div class="col-xs-4">       <h5 class="text-center ">تعيين السيد /
                                            </h5></div>
                                        <div class="col-xs-4">
                                            <input type="text" id="emp_name" name="emp_name" value="<?=$emp_name?>"
                                                   data-validation="required"  class="form-control">
                                        </div>
                                        <div class="col-xs-4"></div>
                                    </div>
                                    <div class="col-xs-12 no-padding ">
                                        <div class="col-xs-3 form-group padding-4">
                                            <label>الإدارة</label>
                                            <select name="edara_id_fk" id="edara_name"
                                                    class="form-control bottom-input"
                                                    onchange="return lood(this.value);" data-validation="required" aria-required="true">
                                                <option value="">إختر</option>
                                                <?php
                                                if (!empty($admin)){
                                                    foreach ($admin as $record) {
                                                        $select = '';
                                                        if ($edara_id_fk == $record->id) {
                                                            $select = 'selected';
                                                        }
                                                        ?>
                                                        <option
                                                                value="<?php echo $record->id; ?>" <?= $select ?>>
                                                            <?php echo $record->name; ?></option>
                                                        <?php
                                                    }}
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-3 form-group padding-4">
                                            <label>القسم</label>
                                            <select name="qsm_id_fk" id="qsm_id_fk" class="form-control bottom-input"
                                                    data-validation="required" aria-required="true">
                                                <option value="">إختر</option>
                                                <?php
                                                if (!empty($departs)){
                                                    foreach ($departs as $record) {
                                                        $select = '';
                                                        if ($qsm_id_fk == $record->id) {
                                                            $select = 'selected';
                                                        } ?>
                                                        <option
                                                                value="<?php echo $record->id; ?>" <?= $select ?> >
                                                            <?php echo $record->name; ?></option>
                                                        <?php

                                                    }}
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-3 form-group padding-4">
                                            <label>المسمي الوظيفي</label>
                                            <select name="job_title_id_fk" id="job_title_id_fk"
                                                    class="form-control bottom-input" data-validation="required"  aria-required="true" >
                                                <option value="">إختر</option>
                                                <?php foreach($jobtitles as $one_job_role){$select='';
                                                    if($job_title_id_fk == $one_job_role->defined_id){
                                                        $select ='selected';
                                                    }
                                                    ?>
                                                    <option value="<?php echo $one_job_role->defined_id ; ?>" <?=$select?>>
                                                        <?php echo $one_job_role->defined_title ; ?></option>';
                                                <?php } ?>
                                            </select>

                                        </div>

                                        <div class="col-xs-3 form-group padding-4">
                                            <label> الرئيس المباشر</label>
                                            <select name="direct_manager_id_fk"  id="direct_manager_id_fk" data-validation="required" class="form-control bottom-input edara_direction"
                                                    aria-required="true" onchange="get_emp_data($(this).val());">
                                                <option value="">إختر</option>
                                                <?php
                                                if(!empty($all_emps)) {
                                                    foreach($all_emps as $row){
                                                        $select='';
                                                        if(!empty($direct_manager_id_fk)){
                                                            if($direct_manager_id_fk == $row->id){
                                                                $select='selected';
                                                            }
                                                        }
                                                        ?>
                                                        <option value="<?php echo $row->id;?>-<?php echo $row->employee;?>"  <?php echo$select;?> > <?php echo $row->employee;?></option >
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-3 form-group padding-4">
                                            <label>  الراتب الأساسي</label>
                                            <input type="text" id="salary" name="salary"
                                                   data-validation="required" value="<?=$salary?>"  onkeyup="GetSum()"
                                                   onkeypress="validate_number(event)" class="form-control  salary">

                                        </div>
                                        <div class="col-xs-3 form-group padding-4">
                                            <label>   بدل السكن</label>
                                            <input type="text" id="bdal_skan" name="bdal_skan" data-validation="required"
                                                   value="<?=$bdal_skan?>" onkeypress="validate_number(event)" onkeyup="GetSum()"
                                                   class="form-control salary">

                                        </div>
                                        <div class="col-xs-3 form-group padding-4">
                                            <label>   بدل المواصلات</label>
                                            <input type="text" id="bdal_mowaslat" name="bdal_mowaslat" data-validation="required"
                                                   value="<?=$bdal_mowaslat?>" onkeypress="validate_number(event)" onkeyup="GetSum()"
                                                   class="form-control salary">

                                        </div>
                                        <div class="col-xs-3 form-group padding-4">
                                            <label>    بدالات أخري</label>
                                            <input type="text" id="bdal_other" name="bdal_other"  data-validation="required"
                                                   value="<?=$bdal_other?>" onkeypress="validate_number(event)" onkeyup="GetSum()"
                                                   class="form-control salary">

                                        </div>
                                        <div class="col-xs-3 form-group padding-4">
                                            <label>     إجمالي الراتب</label>
                                            <input type="text" id="total_salary" name="total_salary"  data-validation="required" onkeyup="GetSum()"
                                                   readonly  value="<?=$total_salary?>" onkeypress="validate_number(event)" class="form-control salary">


                                        </div>
                                      <!--  <div class="col-xs-3 form-group padding-4">
                                            <label>      تاريخ مباشرة العمل</label>
                                            <input type="date"  name="work_date"   data-validation="required" value="<?=$work_date?>"
                                                   class="form-control">
                                        </div> -->
                                        <div class="col-xs-2 form-group padding-4 " >
                                            <label class=" "style="text-align: center;" >
                                                <img style="width: 19px;float: right;"
                                                     src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                                تاريخ مباشرة العمل
                                                <img style="width: 19px;float: left;"
                                                     src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                            </label>

                                            <div id="cal-21" style="width: 50%;float: right;">
                                                <input id="work_date_h" name="work_date_h"
                                                       class="form-control  " type="text"
                                                       onfocus="showCal21();" value="<?= $work_date_h?>"
                                                       style=" width: 100%;float: right"/>
                                            </div>
                                            <div id="cal-11" style="width: 50%;float: left;">
                                                <input id="work_date_m" name="work_date_m"
                                                       class="form-control  "
                                                       type="text" onfocus="showCal11();"
                                                       value="<?= $work_date_m?>"
                                                       style=" width: 100%;float: right" />
                                            </div>
                                        </div>

                                        <div class="col-xs-3 form-group padding-4" >
                                            <label class=" " style="text-align: center;">
                                                <img style="width: 19px;float: right;"
                                                     src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                                مدة الفترة التجريبية من
                                                <img style="width: 19px;float: left;"
                                                     src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                            </label>

                                            <div id="cal-end-2" style="width: 50%;float: right;">
                                                <input id="from_date_h" name="date_from_h"
                                                       class="form-control  " type="text"
                                                       onfocus="showCalEnd2();" value="<?=$date_from_h?>"
                                                       style=" width: 100%;float: right"/>
                                            </div>
                                            <div id="cal-end-1" style="width: 50%;float: left;">
                                                <input id="from_date_m" name="date_from_m"
                                                       class="form-control  "
                                                       type="text" onfocus="showCalEnd1();"
                                                       value="<?= $date_from_m?>"
                                                       style=" width: 100%;float: right" />
                                            </div>
                                        </div>
                                        <div class="col-xs-3 form-group padding-4 " >
                                            <label class=" "style="text-align: center;" >
                                                <img style="width: 19px;float: right;"
                                                     src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                                مدة الفترة التجريبية الي
                                                <img style="width: 19px;float: left;"
                                                     src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                            </label>

                                            <div id="cal-2" style="width: 50%;float: right;">
                                                <input id="to_date_h" name="date_to_h"
                                                       class="form-control  " type="text"
                                                       onfocus="showCal2();" value="<?= $date_to_h?>"
                                                       style=" width: 100%;float: right"/>
                                            </div>
                                            <div id="cal-1" style="width: 50%;float: left;">
                                                <input id="to_date_m" name="date_to_m"
                                                       class="form-control  "
                                                       type="text" onfocus="showCal1();"
                                                       value="<?= $date_to_m?>"
                                                       style=" width: 100%;float: right" />
                                            </div>
                                        </div>

                                    <!--    <div class="col-xs-3 form-group padding-4">
                                            <label>         مدة الفترة التجريبية من</label>
                                            <input type="date"  name="date_from" id="date_from" onchange="GetDays()"
                                                   data-validation="required" value="<?=$date_from?>" class="form-control" style="width: 92%; float: left"  >

                                        </div>
                                        <div class="col-xs-3 form-group padding-4">
                                            <label> مدة الفترة التجريبية الي</label>
                                            <input type="date"  name="date_to"  id="date_to" onchange="GetDays()"
                                                   data-validation="required" value="<?=$date_to?>" class="form-control" style="width: 92%; float: left" >

                                        </div> -->


                                       <!-- <div class="col-xs-3 form-group">
                                            <label>  أيام العمل</label>
                                            <input type="text" id="num_days" name="num_days"
                                                   readonly  value="" onkeypress="validate_number(event)" class="form-control ">

                                        </div>
                                        <div class="col-xs-3 form-group">
                                            <label>  مواعيد العمل</label>

                                        </div> -->


                                    </div>

                                </div>

                            </div>





                        </div>
                        <div class="col-md-12 text-center">
                            
                             <button type="submit" id="buttons"  value="حفظ" class="btn btn-success btn-labeled"  name="add"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>
                         
                        </div>
                    </form>
            </div>
        </div>


</div>
<?php
if(isset($records)&&!empty($records)){?>
    <div class="col-sm-12 no-padding " >
     
            <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title">  <?= $title?></h3>
                </div>
                <div class="panel-body">

                    <!-----------------------------------------table------------------------------------->

                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="greentd visible-md visible-lg">
                            <th>م</th>
                            <th>إسم الموظف</th>
                            <th>الإدارة</th>
                            <th> القسم</th>
                            <th> المسمي الوظيفي</th>
                            <th> الاجراء</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach ($records as $row) { ?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $row->emp_name ;?></td>
                                <td><?php echo $row->edara_n ;?></td>
                                <td><?php echo $row->qsm_n ;?></td>
                                <td><?php echo $row->job_title_n ;?></td>

                                <td>
                                    <a data-toggle="modal" data-target="#detailsModal" class="btn btn-xs btn-info" style="padding:1px 5px;" onclick="load_page(<?= $row->id?>);">
                                        <i class="fa fa-list "></i> </a>
                                    <a href="#" onclick='swal({
                                            title: "هل انت متأكد من التعديل ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-warning",
                                            confirmButtonText: "تعديل",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){

                                            window.location="<?php echo base_url(); ?>human_resources/employee_forms/ta3en/Temporary_employment_qrars/edit_temporary_employment_qrars/<?php echo $row->id;?>";
                                            });'>
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                    <a href="#" onclick='swal({
                                            title: "هل انت متأكد من الحذف ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "حذف",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){
                                            swal("تم الحذف!", "", "success");
                                            window.location="<?php echo base_url(); ?>human_resources/employee_forms/ta3en/Temporary_employment_qrars/delete_temporary_employment_qrars/<?php echo $row->id;?>";
                                            });'>
                                        <i class="fa fa-trash"> </i></a>
                             


                                 <a  onclick="print_qrar(<?= $row->id?>)" target = "_blank" >
                                     <i class="fa fa-print" aria - hidden = "true" ></i > </a >
                                </td>
                                <td></td>
                            </tr>
                            <?php $x++; } ?>
                        </tbody>
                    </table>



                    <!--------------------------------------------table---------------------------------->
                    <!-- detailsModal -->


                    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document" style="width: 85%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" style="text-align: center;" >التفاصيل </h4>
                                </div>
                                <div  class="modal-body" style="padding: 10px " id="result">

                                </div>
                                <div class="modal-footer" style="display: inline-block;width: 100%;">

                                    <button
                                            type="button" onclick="print_qrar(document.getElementById('qrar_id').value)"
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




                </div>
            </div>
        </div>
 

<?php } ?>
<div id=""></div>

<!--------------------------------------------------------------->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>


    function lood(valu) {
        if(valu !=''){
            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>human_resources/employee_forms/ta3en/Temporary_employment_qrars/GetDepartment",
                data:{id:valu},
                success:function(d) {
                    $('#qsm_id_fk').html(d);
                }
            });
        }
    }

</script>




<script>




    function GetSum() {
        
        if($("#salary").val() !=''){
            var salary =$("#salary").val();
        }else{
            salary =0;
        }

        if($("#bdal_skan").val() !=''){
            var bdal_skan =$("#bdal_skan").val();
        }else{
            bdal_skan =0;
        }

        if($("#bdal_mowaslat").val() !=''){
            var bdal_mowaslat =$("#bdal_mowaslat").val();
        }else{
            bdal_mowaslat =0;
        }
        if($("#bdal_other").val() !=''){
            var bdal_other =$("#bdal_other").val();
        }else{
            bdal_other =0;
        }

        var sum =( parseFloat(salary) +  parseFloat(bdal_skan) +  parseFloat(bdal_mowaslat) +  parseFloat(bdal_other) ) ;
        $('#total_salary').val(sum);



    }

</script>
        
        <script>
            
            function GetDays() {

            }
            
        </script>

        <script>
            function load_page(row_id) {

                $.ajax({
                    type: 'post',
                    url: "<?php echo base_url();?>human_resources/employee_forms/ta3en/Temporary_employment_qrars/load_details",
                    data: {row_id:row_id},
                    success: function (d) {
                        $('#result').html(d);

                    }

                });

            }
        </script>


<script>
    function print_qrar(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url().'human_resources/employee_forms/ta3en/Temporary_employment_qrars/Print_qrar'?>",
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


<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>

    var loop1 = loop2 = loop3 = loop4 = loop5 = 0;
    var calEnd1 = new Calendar(),
        calEnd2 = new Calendar(true, 0, true, true),
        dateEnd1 = document.getElementById('from_date_m'),
        dateEnd2 = document.getElementById('from_date_h'),
        calEnd1Mode = calEnd1.isHijriMode(),
        calEnd2Mode = calEnd2.isHijriMode();


    dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
    dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());

    document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
    document.getElementById('cal-end-2').appendChild(calEnd2.getElement());


    calEnd1.show();
    calEnd2.show();
    setDateFieldsEnd1();


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


    calEnd1.onHide = function () {
        calEnd1.show(); // prevent the widget from being closed

    };

    calEnd2.onHide = function () {
        calEnd2.show(); // prevent the widget from being closed

    };


    function setDateFieldsEnd1() {
        if (loop1 == 0) {
            <?php if (isset($result) && $result != null) { ?>
            loop1++;
            dateEnd1.value = '<?=$date_from_m?>';
            dateEnd2.value = '<?=$date_from_h?>';
            <?php } else { ?>
            dateEnd1.value = calEnd1.getDate().getDateString();
            dateEnd2.value = calEnd2.getDate().getDateString();
            <?php } ?>
        } else {
            dateEnd1.value = calEnd1.getDate().getDateString();
            dateEnd2.value = calEnd2.getDate().getDateString();
        }
        //  var diffDays = get_date(document.getElementById("end_date").value, dateEnd1.value);
        // document.getElementById("num_days").value = diffDays;

        dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
        dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());
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


</script>
<script>



    var loop1 = loop2 = loop3 = loop4 = loop5 = 0;
    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('to_date_m'),
        date2 = document.getElementById('to_date_h'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    date1.setAttribute("value",cal1.getDate().getDateString());
    date2.setAttribute("value",cal2.getDate().getDateString());

    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    setDateFields1();


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

        if (loop1 == 0) {
            <?php if (isset($result) && $result != null) { ?>
            loop1++;
            date1.value = '<?=$date_to_m?>';
            date2.value = '<?=$date_to_h?>';
            <?php } else { ?>
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();
            <?php } ?>
        } else {
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();
        }


        date1.setAttribute("value", cal1.getDate().getDateString());
        date2.setAttribute("value", cal2.getDate().getDateString());
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



    var loop1 = loop2 = loop3 = loop4 = loop5 = 0;
    var cal11 = new Calendar(),
        cal21 = new Calendar(true, 0, true, true),
        date11 = document.getElementById('work_date_m'),
        date21 = document.getElementById('work_date_h'),
        cal11Mode = cal11.isHijriMode(),
        cal21Mode = cal21.isHijriMode();


    date11.setAttribute("value",cal11.getDate().getDateString());
    date21.setAttribute("value",cal21.getDate().getDateString());

    document.getElementById('cal-11').appendChild(cal11.getElement());
    document.getElementById('cal-21').appendChild(cal21.getElement());


    cal11.show();
    cal21.show();
    setDateFields11();


    cal11.callback = function () {
        if (cal11Mode !== cal11.isHijriMode()) {
            cal21.disableCallback(true);
            cal21.changeDateMode();
            cal21.disableCallback(false);
            cal11Mode = cal11.isHijriMode();
            cal21Mode = cal21.isHijriMode();
        } else

            cal21.setTime(cal11.getTime());
        setDateFields11();
    };

    cal21.callback = function () {
        if (cal21Mode !== cal21.isHijriMode()) {
            cal11.disableCallback(true);
            cal11.changeDateMode();
            cal11.disableCallback(false);
            cal11Mode = cal11.isHijriMode();
            cal21Mode = cal21.isHijriMode();
        } else

            cal11.setTime(cal21.getTime());
        setDateFields11();
    };


    cal11.onHide = function() {
        cal11.show(); // prevent the widget from being closed
    };

    cal21.onHide = function() {
        cal21.show(); // prevent the widget from being closed
    };
    function setDateFields11() {

        if (loop1 == 0) {
            <?php if (isset($result) && $result != null) { ?>
            loop1++;
            date11.value = '<?=$work_date_m?>';
            date21.value = '<?=$work_date_h?>';
            <?php } else { ?>
            date11.value = cal11.getDate().getDateString();
            date21.value = cal21.getDate().getDateString();
            <?php } ?>
        } else {
            date11.value = cal11.getDate().getDateString();
            date21.value = cal21.getDate().getDateString();
        }


        date11.setAttribute("value", cal11.getDate().getDateString());
        date21.setAttribute("value", cal21.getDate().getDateString());
    }

    function showCal11() {
        if (cal11.isHidden())
            cal11.show();
        else
            cal11.hide();
    }

    function showCal21() {
        if (cal21.isHidden())
            cal21.show();
        else
            cal21.hide();
    }



</script>
