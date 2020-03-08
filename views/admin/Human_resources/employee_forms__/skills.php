<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>

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
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo$title;?></h3>
            <div class="pull-left">
                <?php
                $data_load["id"]=$this->uri->segment(5) ;
                $this->load->view('admin/Human_resources/employee_forms/drop_down_menu', $data_load);?>
            </div>
        </div>
        <div class="panel-body">

            <div class="col-md-12">
                <?php echo form_open_multipart('human_resources/employee_forms/Job_requests/add_skills/'.$this->uri->segment(5)); ?>


                <table class="table table-bordered">
                    <thead>
                    <tr  class="open_green">
                        <th  colspan="6"><button class="btn btn-add" type="button" onclick="add_row(4,'skills')">اضافه المهارات والهوايات</button>
                        </th>
                    </tr>
                    </thead>
                    <tbody id="skills">
                    <tr class="closed_green">
                        <td>الاسم</td>
                        <td>تفاصيل</td>
                        <td>الكفاءة</td>

                    </tr>


                    </tbody >
                </table>
                <input type="submit"  style="display: none" name="add" value="حفظ" class="button-add skills">
            </div>
            <?php echo form_close();?>

        </div>
    </div>

    <script type="text/javascript">
        jQuery(function($){
            //	$(".date_as_mask").mask("99/99/9999");
            $(".date_as_mask").mask("99/99/9999");
        });
    </script>
    <script>

        function add_row(type,id)
        {
            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>human_resources/employee_forms/Job_requests/add_record",
                data:{type:type},
                success:function(d){
                    $('.'+id).show();

                    $('#'+id).append(d);



                }

            });
        }


    </script>


