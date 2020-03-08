
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
<div class="col-sm-12  wow" >
<div class="col-sm-9" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo$title;?></h3>
            <div class="pull-left">
                <?php
                $data_load["id"]=$this->uri->segment(5) ;
                $data_load['result'] = $this->Job_requests_model->getMaindataById($data_load["id"]);
                $this->load->view('admin/Human_resources/employee_forms/drop_down_menu', $data_load);?>
            </div>
        </div>
        <div class="panel-body">

            <div class="col-md-12">
                <th  colspan="7"><button class="btn btn-add" type="button" onclick="add_row(5,'recognize')">اضافه  المعرفون</button>
                </th>
                <?php echo form_open_multipart('human_resources/employee_forms/Job_requests/add_persons/'.$this->uri->segment(5)); ?>

                <table class="table table-bordered" id="table_persons">
                    <thead>
                    <tr class="open_green">
                        <td>الاسم</td>
                        <td>الوظيفة</td>
                        <td>جهة العمل</td>
                        <td>الجوال</td>
                        <td>الاجراء</td>
                    </tr>
                    </thead>
                    <tbody id="recognize">
                    <?php if(isset($record)&&!empty($record)) {
                        $x=1;
                    foreach ($record as $record) {

                    ?>

                        <tr>
                            <td><input type="text"data-validation="required"disabled="disabled" value="<?php  echo $record->job;?>"  name="job[]" class="form-control"></td>
                            <td><input type="text" data-validation="required"  disabled="disabled"  value="<?php  echo $record->job_name;?>"    name="job_name[]"  class="form-control"> </td>
                            <td><input type="text" data-validation="required"  disabled="disabled"  value="<?php echo  $record->job_place;?>"   name="job_place[]"  class="form-control"> </td>
                            <td><div class="col-md-12"><input type="text"  disabled="disabled" value="<?php echo $record->mob;?>"   job_placedata-validation="required"  name="mob[]"  id="mob<?php echo  $x;?>"  onkeyup="chek_lenth_mobile($(this).val(),<?php echo $x;?>);"
                                                              maxlength="10" onkeypress="validate_number(event)" class="form-control">
                                    <span  id="mob_span<?php echo  $x;?>"   class="span-validation "></span></div>
                            </td>

                            <td> <a href="<?php echo base_url();?>human_resources/employee_forms/Job_requests/delete_record/<?php echo $this->uri->segment(5);?>/<?php echo $record->id;?>/hr_persons_job_orders/<?php echo $this->uri->segment(4);?>"onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>


                        </tr>
                    <?php  $x++;
                    } } ?>
                    </tbody>
                </table>
                <input type="submit" style="display: none" name="add" value="حفظ"  id="mybutton" class="button-add  recognize">

            </div>
            <?php echo form_close();?>

        </div>
    </div>
    </div>
    <!---------------------osama--------------------------->
    <?php  $this->load->view('admin/Human_resources/employee_forms/sidebar_application_data');?>
    <!---------------------osama--------------------------->
    </div>

    <script>

        function add_row(type,id)
        {

            var x = document.getElementById('table_persons');

            var len = x.rows.length;
            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>human_resources/employee_forms/Job_requests/add_record",
                data:{type:type,len:len},
                success:function(d){
                    $('.'+id).show();

                    $('#'+id).append(d);



                }

            });
        }


    </script>
