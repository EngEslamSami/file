
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
</style>
<div class="col-sm-12  no-padding" >

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo$title;?></h3>
            <div class="pull-left">
                <?php
                $data_load["id"]=$this->uri->segment(6) ;
                $data_load['result'] = $this->Job_request_model->getMaindataById($data_load["id"]);
                $this->load->view('admin/Human_resources/employee_forms/job_requests/drop_down_menu', $data_load);?>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-sm-10 no-padding" >

                <?php echo form_open_multipart('human_resources/employee_forms/job_requests/Job_request/add_previous_work/'.$this->uri->segment(6)) ?>


                <table class="table table-bordered">
                    <thead >
                    <tr colspan="6" class="">
                     <!--   <button class="btn btn-add" type="button" onclick="add_row(1,'work')">اضافه الاعمال السابقه</button> -->

                    </tr>
                    <tr class="info">
                        <th>الشركة/صاحب العمل </th>
                        <th>الفترة &nbsp   من : إلى </th>
                        <th>المسمى الوظيفي </th>
                        <th>المهام </th>
                        <th>الراتب والبدلات </th>
                        <th>سبب ترك العمل </th>
                        <th>الاجراء </th>
                    </tr>
                    </thead>
                    <tbody id="work">

                    <?php if(isset($record)&&!empty($record)){
                    foreach ($record as $record) {

                        ?>

                    <tr>
                        <td><input type="text" disabled="disabled" value="<?php echo $record->company_name;?>"
                                   data-validation="required"  class="form-control" name="company_name[]"> </td>

                        <td><input type="text" disabled="disabled" name="date_from[]" id="" value="<?php echo $record->date_from;?>"  data-validation="required"
                                   class="form-control bottom-input date_as_mask"
                                   data-validation-has-keyup-event="true">
            الي<input type="text"  disabled="disabled" name="date_to[]" id="" value="<?php echo $record->date_to;?>" data-validation="required"
                            class="form-control bottom-input date_as_mask"
                            data-validation-has-keyup-event="true">
        </td>
        <td><select name="job_id_title_fk[]" id="job_title_id_fk"
                    data-validation="required"   disabled="disabled"  class="form-control "
                    data-show-subtext="true" data-live-search="true"
                    aria-required="true">
                <option value="">إختر</option>
                <?php
                if(isset($jobtitles)&&!empty($jobtitles)) {
                    foreach($jobtitles as $row){?>

                        <option  value="<?php echo $row->defined_id;?>" <?php if($row->defined_id==$record->job_id_title_fk){ echo 'selected'; } ?>>
                        <?php echo $row->defined_title;?></option >
                        <?php
                    }
                }
                ?>
            </select></td>
        <td><?php echo strip_tags($record->job_mission);?>  </td>
        <td><input type="text" disabled="disabled" class="form-control" value="<?php echo $record->salary;?>"  data-validation="required"  name="salary[]" > </td>
        <td><?php echo strip_tags($record->leave_work_reason);?></td>

        <td>
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
                    window.location="<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/delete_record/<?php echo $this->uri->segment(6);?>/<?php echo $record->id;?>/hr_previous_work_job_orders/<?php echo $this->uri->segment(5);?>";
                    });'>
                <i class="fa fa-trash"> </i></a>
          <!--  <a href="<?php echo base_url();?>human_resources/employee_forms/Job_requests/delete_record/<?php echo $this->uri->segment(6);?>/<?php echo $record->id;?>/hr_previous_work_job_orders/<?php echo $this->uri->segment(5);?>"onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a> -->
        </td>

       </tr>
                        <?php
                    }
                    }
                    ?>

                    </tbody>

                    <tfoot>
                    <tr class="">
                        <th colspan="6"></th>
                        <th>
                            <button type="button" onclick="add_row(1,'work')" class="btn-success btn"><i
                                        class="fa fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                    </tfoot>

                </table>
              <!--  <input type="submit" style="display: none" name="add" value="حفظ" class="button-add work"></br> -->
                <button type="submit"  class="btn btn-labeled btn-success button-add work "  name="add" value="save_main_data" style=" background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px;display: none; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

            <?php echo form_close(); ?>

            </div>

            <div class="col-sm-2 no-padding">
                <?php  $this->load->view('admin/Human_resources/employee_forms/job_requests/sidebar_application_data');?>


            </div>
        </div>
    </div>


    </div>



    <script>

        function add_row(type,id)
        {
            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/add_record",
                data:{type:type},
                success:function(d){
                    $('.'+id).show();

                    $('#'+id).append(d);



                }

            });
        }


    </script>


