<style>
    .title-top{
        padding: 8px;
        background-color: #1e65a2;
        color: #fff;
        border-radius: 5px;
        font-size: 15px;
    }
    .validation_radio span{

    }
    .top_radio{
        margin-bottom: 15px;
    }
    .top_radio input[type=radio] {
        height: 30px;
        width: 30px;
        line-height: 0px;
        vertical-align: middle;

    }
    .top_radio .radio-inline,.top_radio .checkbox-inline {
        vertical-align: middle;
        font-size: 20px;

        padding: 10px;
        border-bottom: 2px solid #eee;
        border-radius: 8px;
    }

</style>
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
        border-bottom: 4px solid #9bbb59 !important;
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
        margin-bottom: 0
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
    }
</style>


<?php 
if(isset($constraint)&&!empty($constraint))
{
    $out['form']='human_resources/employee_forms/CollapseConstraint/updateConstraint/'.$this->uri->segment(5);
}else {
    $out['form']='human_resources/employee_forms/CollapseConstraint/addConstraint';
}
?>

<div class="col-xs-9 fadeInUp " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?></h3>
        </div>
       

        <div class="panel-body">
            <?php    echo form_open_multipart($out['form'])?>
           <!-- <div class="col-md-12">
                <div class="form-group col-md-4  col-sm-6 padding-4">
                    <label class="label top-label">الموظف</label>
                    <select name="emp_id" id="emp_id"
                            data-validation="required" onchange="get_emp_data($(this).val());"   class="form-control bottom-input"
                            aria-required="true">
                        <option value="">اختر</option >
                        <?php
                        if(isset($all_emps)&&!empty($all_emps)) {

                            foreach($all_emps as $row){
                                $select = '';
                                if(isset($constraint->emp_id)) {
                                    if ($constraint->emp_id == $row->id) {
                                        $select = 'selected';
                                    }
                                }
                                ?>
                                <option value="<?php echo $row->id;?>" <?=$select?>> <?php echo $row->employee;?></option >
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

            </div>-->


            <section class="main-body">
                <div class="print_forma  col-xs-12 ">

                    <div class="piece-box">
                        <h5 class="text-center">قرار طي قيد &nbsp</h5><br><br>
                        <h6> &nbsp  فإن المدير العام للجمعية الخيرية لرعاية الأيتام ببريدة-أبناء و بناءاً  على صلاحياته، وبناءاً  على ما تقتضيه مصلحة العمل  فإنه تقرر ما يلي:&nbsp</h6><br>
                        <h6>&nbsp  طي قيد</h6><br>
                        <div class="  col-xs-12 ">
                        <table class="table table-bordered" style="table-layout: fixed;">

                            <tbody>
                            <tr class=" bordered-bottom">
                                <th width="20%">السيد</th>
                                <td>
                                    <select name="emp_id" id="emp_id"
                                            data-validation="required" onchange="get_emp_data($(this).val());"   class="form-control selectpicker half"
                                            aria-required="true" data-show-subtext="true" data-live-search="true"
                                            aria-required="true">
                                        <option value="">اختر</option >
                                        <?php
                                        if(isset($all_emps)&&!empty($all_emps)) {

                                            foreach($all_emps as $row){
                                                $select = '';
                                                if(isset($constraint->emp_id)) {
                                                    if ($constraint->emp_id == $row->id) {
                                                        $select = 'selected';
                                                    }
                                                }
                                                ?>
                                                <option value="<?php echo $row->id;?>" <?=$select?>> <?php echo $row->employee;?></option >
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" id="direct_manger_id_fk" name="direct_manger_id_fk"  value="<?php if(isset($constraint->direct_manger_id_fk)) { echo $constraint->direct_manger_id_fk; } ?>">
                                </td>
                               <!-- <td><div id="employee_name" ><?php if(isset($constraint->employee_info)) { echo $constraint->employee_info->employee; } ?></div> <input type="hidden" id="emp_id_fkk" name="emp_id" value="<?php if(isset($constraint->emp_id)) { echo $constraint->emp_id; } ?>">   <input type="hidden" id="direct_manger_id_fk" name="direct_manger_id_fk"  value="<?php if(isset($constraint->direct_manger_id_fk)) { echo $constraint->direct_manger_id_fk; } ?>"></td>-->
                            </tr>
                            <tr class="open_green">
                                <th>من القسم</th>
                                <td><div id="department_name" > <?php if(isset($constraint->employee_info)) { echo $constraint->employee_info->depart_name; } ?>   </div> <input type="hidden" id="qsm_id_fk" name="qsm_id_fk" value="<?php if(isset($constraint->qsm_id_fk)) { echo $constraint->qsm_id_fk; } ?>"></td>

                            </tr>
                            <tr>
                                <th width="20%">التابع لإدارة </th>
                                <td><div id="administration_name" > <?php if(isset($constraint->employee_info)) { echo $constraint->employee_info->admin_name; } ?></div>  <input type="hidden" id="edara_id_fk" name="edara_id_fk" <?php if(isset($constraint->edara_id_fk)) { echo $constraint->edara_id_fk; } ?>></td>
                            </tr>
                            </tbody>
                        </table><br><br>
                        </div>
                        <div class="col-xs-12 form-group no-padding">
                            <div class="col-xs-3">
                                <h6>- اعتبارا من تاريخ </h6>
                            </div>
                            <div class="col-xs-4">
                                <input type="date" name="from_date" class="form-control" data-validation="required" value="<?php if(isset($constraint->from_date_ar)) { echo $constraint->from_date_ar; } ?>">
                            </div>
                        </div>
                        <div class="col-xs-12 form-group no-padding">
                            <div class="col-xs-3">
                                <h6>- صرف جميع مستحقاته حتى تاريخ     </h6>
                            </div>
                            <div class="col-xs-4">
                                <input type="date" name="to_date" class="form-control" data-validation="required" value="<?php if(isset($constraint->to_date_ar)) { echo $constraint->to_date_ar; } ?>">
                            </div>
                        </div>





                    </div>

                </div>
            </section>









            <div class="col-md-12">
                    <button type="submit" id="register" name="add" value="save_main_data"
                            class="btn btn-add col-md-offset-5"><span><i class="fa fa-floppy-o"></i></span> حفظ
                    </button></div>






            <div class="col-md-2">

            </div>
            <?php echo form_close()?>

        </div>
    </div>
</div>

<div id="load3">
    <?php $data_load["personal_data"]=$personal_data;
    $this->load->view('admin/Human_resources/sidebar_person_data_vacation',$data_load);?>

</div>

<div class="col-xs-12 fadeInUp " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo 'بيانات طي القيد';?></h3>
        </div>


        <div class="panel-body">
<div class="col-md-12">
    <?php if(isset($allConstraints)&&!empty($allConstraints)) { ?>
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="info">
                <th class="text-center">م</th>
                <th class="text-center">رقم طي قيد</th>
                <th class="text-center">اسم الموظف </th>
                <th class="text-center">الإدارة </th>
                <th class="text-center">القسم </th>
                <th class="text-center">اعتبارا من تاريخ </th>
                <th class="text-center"> صرف جميع مستحقاته حتى تاريخ </th>
                <th class="text-center">الاجراء</th>

            </tr>
            </thead>
            <tbody class="text-center">
            <?php
            $a=0;

            foreach ($allConstraints as $record) {
                $a++;
               
                ?>
                <tr>
                    <td><?php echo $a ?></td>
                    <td><?php echo $record->id ?></td>
                    <td><?php echo $record->employee_info->employee ?></td>
                    <td><?php if(!empty($record->employee_info->admin_name)){ echo $record->employee_info->admin_name;}else{ echo "لم يضاف";} ?></td>
                    <td><?php if(!empty($record->employee_info->depart_name)){ echo $record->employee_info->depart_name;}else{ echo "لم يضاف";} ?></td>
                    <td><?php echo $record->from_date_ar; ?></td>
                    <td><?php echo $record->to_date_ar; ?></td>
                    <td>
                        <a href="<?php echo base_url();?>human_resources/employee_forms/CollapseConstraint/updateConstraint/<?php echo  $record->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <a  href="<?php echo base_url();?>human_resources/employee_forms/CollapseConstraint/DeleteConstraint/<?php echo  $record->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                        <a href="<?php echo base_url();?>human_resources/employee_forms/CollapseConstraint/printConstraint//<?php echo  $record->id;?>"><i class="fa fa-print" aria-hidden="true"></i>  </a>
                        
                    </td>


                </tr>
                <?php   } ?>
            </tbody>
        </table>
    <?php } ?>
</div>
            </div>
        </div>
    </div>





<script>
    function get_emp_data()
    {
      valu=  $('#emp_id').val();
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Vacation/get_emp_data",
            data:{valu:valu},
            success:function(d) {


                var obj=JSON.parse(d);


                 document.getElementById('department_name').innerHTML = obj.depart_name;
                 document.getElementById('administration_name').innerHTML = obj.admin_name;
                $('#qsm_id_fk').val(obj.department);
                $('#edara_id_fk').val(obj.administration);

                $('#direct_manger_id_fk').val(obj.manger);

                $('#job_title_id_fk').val(obj.degree_id);
                $('#administration3').val(obj.administration);
                $('#department3').val(obj.department);
                $('#emp_id').val(obj.id);
                $('#administration').val(obj.administration);
                $('#department').val(obj.department);
                $('#manger').val(obj.manger);




            }






        });


        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Disclaimer/get_load_page",
            data:{valu:valu},
            success:function(d) {

                $('#load3').html(d);


            }






        });
    }


</script>