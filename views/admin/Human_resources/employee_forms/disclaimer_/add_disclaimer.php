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
<?php 
if(isset($disclaimer)&&!empty($disclaimer))
{
    $out['form']='human_resources/employee_forms/Disclaimer/updateDisclaimer/'.$this->uri->segment(5);
}else {
    $out['form']='human_resources/employee_forms/Disclaimer/addDisclaimer';
}
?>

<div class="col-xs-9 fadeInUp " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?></h3>
        </div>
       

        <div class="panel-body">
            <?php    echo form_open_multipart($out['form'])?>
            <div class="col-md-12">
                <div class="form-group col-md-4  col-sm-6 padding-4">
                    <label class="label top-label">الإسم</label>
                    <select name="emp_id" id="emp_id"
                            data-validation="required" onchange="get_emp_data($(this).val());"   class="form-control bottom-input"
                            aria-required="true">
                        <option value="">اختر</option >
                        <?php
                        if(isset($all_emps)&&!empty($all_emps)) {

                            foreach($all_emps as $row){
                                $select = '';
                                if(isset($disclaimer['emp_id'])) {
                                    if ($disclaimer['emp_id'] == $row->id) {
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

            </div>


            <div class="col-md-12">
               <?php if(isset($departments)&&!empty($departments)) { ?>
            <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                    <th class="text-center">م</th>
                    <th class="text-center">الإدارة </th>
                    <th class="text-center">الموظف المسئول</th>
                    <th class="text-center">ملاحظات</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php
                $a=1;

                foreach ($departments as $key=>$record) {
                ?>
                    <tr>
                        <td><?php echo $a ?></td>
                        <td><?php echo $record[1] ?>
                            <input type="hidden" value="<?=$key?>" name="adminstration_id[]" id="adminstration_id">
                        </td>
                        <td>

                            <select name="responsible_emp_id[]" id=""
                                    class="form-control bottom-input"
        <?php if(isset($record[0]) && !empty($record[0])){ ?>
        data-validation="required"
            <?php   } ?>

                                    aria-required="true">
                                <option value="">اختر</option>
                                <?php
                                if (isset($record[0]) && !empty($record[0])) {
                                    foreach ($record[0] as $row) {
                                        $select ='';
                                        if(isset($disclaimer[$key]['responsible_emp_id'])) {
                                            if ($disclaimer[$key]['responsible_emp_id'] == $row->id) {
                                                $select = 'selected';
                                            }
                                        }
                                        ?>
                                        <option value="<?php echo $row->id; ?>" <?=$select?> > <?php echo $row->employee; ?></option>
                                        <?php
                                    }
                                }else{ ?>
                                <option value="">لا يوجد موظفين لهذه الإدارة</option>
                                <?php   }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="notes[]"  value="<?php if(isset($disclaimer[$key]['notes'])) { echo $disclaimer[$key]['notes'];} ?>" class="form-control bottom-input">
                        </td>

                    </tr>
                <?php $a++; } ?>
                </tbody>
            </table>
               <?php } ?>
            </div>


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
            <h3 class="panel-title"><?php echo 'بيانات إخلاء الطرف';?></h3>
        </div>


        <div class="panel-body">
<div class="col-md-12">
    <?php if(isset($allDisclaimers)&&!empty($allDisclaimers)) { ?>
        <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="info">
                <th class="text-center">م</th>
                <th class="text-center">الرقم الوظفي </th>
                <th class="text-center">اسم الموظف </th>
                <th class="text-center">الإدارة </th>
                <th class="text-center">القسم </th>
                <th class="text-center">المسمي الوظفي </th>
                <th class="text-center">الاجراء</th>
                <th class="text-center">الطباعة</th>
            </tr>
            </thead>
            <tbody class="text-center">
            <?php
            $a=0;

            foreach ($allDisclaimers as $record) {
                $a++;
               
                ?>
                <tr>
                    <td><?php echo $a ?></td>
                    <td><?php echo $record->employee_info->emp_code ?></td>
                    <td><?php echo $record->employee_info->employee ?></td>
                    <td><?php echo $record->employee_info->admin_name ?></td>
                    <td><?php echo $record->employee_info->depart_name ?></td>
                    <td><?php echo $record->employee_info->degree_name ?></td>
                    <td>
                        <a href="<?php echo base_url();?>human_resources/employee_forms/Disclaimer/updateDisclaimer/<?php echo  $record->disclaimer_id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <a  href="<?php echo base_url();?>human_resources/employee_forms/Disclaimer/DeleteDisclaimer/<?php echo  $record->disclaimer_id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>

                    </td>
                    <td>  <a href="<?=base_url("human_resources/employee_forms/Disclaimer/printDisclaimer").'/'.$record->disclaimer_id;?>" >
                            <i class="fa fa-print" aria-hidden="true"></i>  </a>
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
    function getEmployeeDetails(employee_id) {
        if (employee_id !=0 &&  employee_id >0 &&  employee_id!='') {
            var dataString = 'employee_id=' + employee_id;

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/employee_forms/Disclaimer/getEmployeeDetails',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);

                    $('#mange_department').val(JSONObject.admin_name);
                    $('#mange_department_id').val(JSONObject.administration);
                    $('#department').val(JSONObject.depart_name);
                    $('#department_id').val(JSONObject.department);
                    $('#degree_id_fk').val(JSONObject.degree_name);
                    $('#degree_id').val(JSONObject.degree_id);
                    $('#emp_code').val(JSONObject.emp_code);
                }
            });
            return false;
        }
    }
</script>





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