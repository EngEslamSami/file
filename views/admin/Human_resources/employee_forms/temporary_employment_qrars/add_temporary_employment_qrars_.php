
<style type="text/css">
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
    $work_date =$result['work_date'];
    $date_from =$result['date_from'];
    $date_to =$result['date_to'];



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
    $work_date  ='';
    $date_from  ='';
    $date_to  ='';

}
?>


<!--------------------------------------------------------modal------------------------------------>

<div class="col-sm-12 no-padding " >
    <div class="col-sm-9">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <div class="panel-body">
                <?php
                if(isset($result)&&!empty($result)){ ?>
                <form action="<?php echo base_url();?>human_resources/employee_forms/Temporary_employment_qrars/edit_temporary_employment_qrars/<?php echo $this->uri->segment(4);?>" method="post">
                    <?php } else{?>
                    <form action="<?php echo base_url();?>human_resources/employee_forms/Temporary_employment_qrars/add_temporary_employment_qrars" method="post">
                        <?php }?>

                        <div class="print_forma  col-xs-12 no-padding">

                            <div class="piece-box">
                                <div class="piece-heading">
                                    <h6>&nbsp  المدير المباشر</h6>
                                </div>
                                <div class="piece-body" >
                                    <div class="col-xs-12 under-line open_green">
                                        <div class="col-xs-4">       <h5 class="text-center ">تعيين السيد /
                                            </h5></div>
                                        <div class="col-xs-4">
                                            <input type="text" id="emp_name" name="emp_name" value="<?=$emp_name?>"
                                                   data-validation="required"  class="form-control">
                                        </div>
                                        <div class="col-xs-4"></div>
                                    </div>
                                    <div class="col-xs-12 no-padding ">
                                            <table class="table table-bordered ">
                                                <tr class="">
                                                    <th width="30%">الإدارة</th>
                                                    <td> <select name="edara_id_fk" id="edara_name"
                                                                 class="form-control bottom-input"
                                                                 onchange="return lood(this.value);" data-validation="required" aria-required="true">
                                                            <option value="">إختر</option>
                                                            <?php
                                                            if (!empty($admin)):
                                                                foreach ($admin as $record):
                                                                    $select='';
                                                                    if($edara_id_fk == $record->id){
                                                                        $select ='selected';
                                                                    }
                                                                    ?>
                                                                    <option
                                                                        value="<? echo $record->id; ?>"  <?=$select?>>
                                                                        <? echo $record->name; ?></option>
                                                                    <?php
                                                                endforeach;
                                                            endif;
                                                            ?>
                                                        </select></td>
                                                </tr>
                                                <tr class="open_green">
                                                    <th>القسم</th>
                                                    <td> <select name="qsm_id_fk" id="qsm_id_fk" class="form-control bottom-input"
                                                                 data-validation="required" aria-required="true">
                                                            <option value="">إختر</option>
                                                            <?php
                                                            if (!empty($departs)):
                                                                foreach ($departs as $record):
                                                                    $select='';
                                                                    if($qsm_id_fk == $record->id){
                                                                        $select ='selected';
                                                                    }?>
                                                                    <option
                                                                        value="<? echo $record->id; ?>"   <?=$select?> >
                                                                        <? echo $record->name; ?></option>
                                                                    <?php
                                                                endforeach;
                                                            endif;
                                                            ?>
                                                        </select></td>
                                                </tr>
                                                <tr class="">
                                                    <th>المسمي الوظيفي</th>
                                                    <td><select name="job_title_id_fk" id="job_title_id_fk"
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
                                                        </select></td>
                                                </tr>
                                                <tr class="open_green">
                                                    <th>الرئيس المباشر</th>
                                                    <td>
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

                                                    </td>
                                                </tr>
                                                <tr class="">
                                                    <th>الراتب الأساسي</th>
                                                    <td> <input type="text" id="salary" name="salary"
                                                                data-validation="required" value="<?=$salary?>"  onkeyup="GetSum()"
                                                                onkeypress="validate_number(event)" class="form-control  salary"></td>
                                                </tr>
                                                <tr class="open_green">
                                                    <th>بدل السكن</th>
                                                    <td>    <input type="text" id="bdal_skan" name="bdal_skan" data-validation="required"
                                                                   value="<?=$bdal_skan?>" onkeypress="validate_number(event)" onkeyup="GetSum()"
                                                                   class="form-control salary"></td>
                                                </tr>
                                                <tr class="">
                                                    <th>بدل المواصلات</th>
                                                    <td> <input type="text" id="bdal_mowaslat" name="bdal_mowaslat" data-validation="required"
                                                                value="<?=$bdal_mowaslat?>" onkeypress="validate_number(event)" onkeyup="GetSum()"
                                                                class="form-control salary"></td>
                                                </tr>
                                                <tr class="open_green">
                                                    <th>بدالات أخري</th>
                                                    <td>
                                                        <input type="text" id="bdal_other" name="bdal_other"  data-validation="required"
                                                               value="<?=$bdal_other?>" onkeypress="validate_number(event)" onkeyup="GetSum()"
                                                               class="form-control salary"></td>
                                                </tr>
                                                <tr class="">
                                                    <th>إجمالي الراتب</th>
                                                    <td>  <input type="text" id="total_salary" name="total_salary"  data-validation="required" onkeyup="GetSum()"
                                                                readonly  value="<?=$total_salary?>" onkeypress="validate_number(event)" class="form-control salary"></td>
                                                </tr>
                                                <tr class="open_green">
                                                    <th>تاريخ مباشرة العمل</th>
                                                    <td><input type="date"  name="work_date"   data-validation="required" value="<?=$work_date?>"
                                                               class="form-control"></td>
                                                </tr>
                                                <tr class="">
                                                    <th>مدة الفترة التجريبية</th>
                                                    <td>
                                                        <div class="col-xs-12">
                                                            <div class="col-xs-5">
                                                                <h6>من </h6>
                                                                <input type="date"  name="date_from" id="date_from" onchange="GetDays()"
                                                                       data-validation="required" value="<?=$date_from?>"  >
                                                            </div>
                                                            <div class="col-xs-5">
                                                                <h6>إلي </h6>
                                                                <input type="date"  name="date_to"  id="date_to" onchange="GetDays()"
                                                                       data-validation="required" value="<?=$date_to?>"  >
                                                            </div>

                                                        </div>

                                                    </td>
                                                </tr>
                                                <tr class="open_green">
                                                    <th>أيام العمل</th>
                                                    <td> <input type="text" id="num_days" name="num_days"
                                                                                           readonly  value="" onkeypress="validate_number(event)" class="form-control "></td></td>
                                                </tr>
                                                <tr class="">
                                                    <th>مواعيد العمل</th>
                                                    <td></td>
                                                </tr>
                                            </table>
                                    </div>

                                </div>

                            </div>





                        </div>
                        <div class="col-md-12">
                            <div class="col-md-5"></div>
                            <div class="col-md-4">     <input type="submit" id="buttons"  value="حفظ" class="btn btn-add"  name="add"></div>
                            <div class="col-md-3"></div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <div   id="load3">

        <?php $data_load["personal_data"]=''/*$personal_data*/;
        $this->load->view('admin/Human_resources/sidebar_person_data_vacation',$data_load);?>

    </div>
</div>
<?php
if(isset($records)&&!empty($records)){?>
    <div class="col-sm-12 no-padding " >
        <div class="col-sm-12">
            <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"> ساعات التطوع</h3>
                </div>
                <div class="panel-body">

                    <!-----------------------------------------table------------------------------------->

                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="visible-md visible-lg">
                            <th>مسلسل</th>
                            <th>إسم الموظف</th>
                            <th>التفاصيل</th>
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
                                <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo$row->id; ?>">التفاصيل</button></td>

                                <td>
                                    <a href="<?php echo base_url(); ?>human_resources/employee_forms/Temporary_employment_qrars/edit_temporary_employment_qrars/<?php echo $row->id;?>"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                    <a href="<?php echo base_url(); ?>human_resources/employee_forms/Temporary_employment_qrars/delete_temporary_employment_qrars/<?php echo $row->id;?>"
                                       onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                                     aria-hidden="true"></i> </a>
                                 <a href = "<?php echo base_url('human_resources/employee_forms/Temporary_employment_qrars/print_Temporary_employment_qrars').'/'.$row->id ?>" target = "_blank" >
                                     <i class="fa fa-print" aria - hidden = "true" ></i > </a >
                                </td>
                                <td></td>
                            </tr>
                            <?php $x++; } ?>
                        </tbody>
                    </table>



                    <!--------------------------------------------table---------------------------------->



                    <!--------------------------------------------------------modal------------------------------------>


                    <?php
                    if (isset($records) && !empty($records)) {
                        $x = 1;
                        foreach ($records as $row) { ?>
                            <div class="modal fade" id="myModal<?php echo$row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog " style="width: 80%" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="print_forma  col-xs-12 no-padding">
                                                <div class="col-xs-12 ">
                                                    <h5>   فإن المدير العام للجمعية الخيرية لرعاية الأيتام ببريدة-أبناء و بناءاً  على صلاحياته، وبناءاً  عن حاجة الجمعية لتعيين...........................................................................................................، فإنه تقرر ما يلي:</h5>

                                                    <h5>  تعيين السيد/<?=$row->emp_name?></h5>
                                                </div>

                                                <div class="piece-box no-border">
                                                    <div class="piece-body">
                                                        <div class="col-xs-12 no-padding">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr class="bordered-bottom">
                                                                    <th>الإدارة</th>
                                                                    <th><?=$row->admin_title?></th>
                                                                </tr>
                                                                </thead>

                                                                <tbody>
                                                                <tr class="open_green">
                                                                    <td>القسم</td>
                                                                    <td><?=$row->department_title?></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>المسمى الوظيفي</td>
                                                                    <td><?=$row->job_title?></td>
                                                                </tr>
                                                                <tr class="open_green">
                                                                    <td>الرئيس المباشر</td>
                                                                    <td><?=$row->employee?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>الراتب الإساسي</td>
                                                                    <td><?=$row->salary?></td>
                                                                </tr>
                                                                <tr class="open_green">
                                                                    <td>بدل السكن</td>
                                                                    <td><?=$row->bdal_skan?></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>بدل المواصلات</td>
                                                                    <td><?=$row->bdal_mowaslat?></td>
                                                                </tr>
                                                                <tr class="open_green">
                                                                    <td>بدلات أخرى</td>
                                                                    <td><?=$row->bdal_other?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>إجمالي الراتب</td>
                                                                    <td><?=$row->total_salary?></td>
                                                                </tr>
                                                                <tr class="open_green">
                                                                    <td>تاريخ مباشرة العمل</td>
                                                                    <td><?=$row->work_date?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>مدة الفترة التجريبية</td>
                                                                    <td> من <?=$row->date_from?>  حتي <?=$row->date_to?></td>
                                                                </tr>
                                                                <tr class="open_green">
                                                                    <td>أيام العمل</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>مواعيد العمل</td>
                                                                    <td></td>
                                                                </tr>

                                                                </tbody>
                                                            </table>

                                                            <br>
                                                            <h5>	- يكون عمله وفقاً للوصف الوظيفي المعتمد من إدارة الجمعية.</h5><br>

                                                            <h5>	- على جميع الإدارات العمل بموجبه وإنفاذه.</h5><br>

                                                            <h4 class="text-center">والله ولي التوفيق</h4><br><br>
                                                            <div class="col-xs-4 col-xs-offset-8">
                                                                <h5>مدير عام الجمعية</h5>
                                                                <h5>   سلطان بن محمد الجاسر</h5>
                                                            </div>


                                                        </div>
                                                    </div>



                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"  style="float: left" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        <?php } }  ?>


                    <!--------------------------------------------------------modal------------------------------------>

                </div>
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
                url:"<?php echo base_url();?>human_resources/employee_forms/Temporary_employment_qrars/GetDepartment",
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