
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
                $this->load->view('admin/Human_resources/employee_forms/drop_down_menu', $data_load);?>
            </div>
        </div>
        <div class="panel-body">

            <div class="col-md-12">
                <?php echo form_open_multipart('human_resources/employee_forms/Job_requests/add_dawrat/'.$this->uri->segment(5)); ?>

                <table class="table table-bordered">
                    <thead>
                    <tr  class="open_green">
                        <th  colspan="6"><button class="btn btn-add" type="button" onclick="add_row(3,'training')">اضافه الدوره التدريبه</button>
                        </th>
                    </tr>
                    <tr class="closed_green">
                        <th>الدروة  </th>
                        <th>الجهة </th>
                        <th>الفترة</th>
                        <th>التخصص</th>
                        <th> رفع صوره</th>
                        <th>الاجراء</th>
                    </tr>
                    </thead>
                    <tbody id="training">
                    <?php if(isset($record)&&!empty($record)) {
                    foreach ($record as $record) {

                    ?>





                            <td><input type="text" disabled="disabled" value="<?php echo $record->dawra;?>" name="dawra[]" data-validation="required" class="form-control"> </td>



                            <td><input type="text" name="place[]" value="<?php echo $record->place;?>" data-validation="required"   id=""  data-validation="required">


                            </td>
                            <td> <input type="text" disabled="disabled" name="date_from[]" data-validation="required"  id=""  data-validation="required" value="<?php echo $record->date_from;?>"
                                        class="form-control bottom-input date_as_mask"
                                        data-validation-has-keyup-event="true">
                                الي <input type="text" data-validation="required" disabled="disabled" name="date_to[]"  id=""  data-validation="required" value="<?php echo $record->date_to;?>"
                                           class="form-control bottom-input date_as_mask"
                                           data-validation-has-keyup-event="true">
                            </td>
                            <td><input type="text" disabled="disabled" data-validation="required" value="<?php echo $record->specialized;?>" name="specialized[]"  class="form-control"> </td>
                            <td><a data-toggle="modal" type="button" style="cursor: pointer"
                                   data-target="#modal-img<?php echo $record->id;?>">

                                    <i class="fa fa-eye"></i>
                                </a> </td>

                    <td> <a href="<?php echo base_url();?>human_resources/employee_forms/Job_requests/delete_record/<?php echo $this->uri->segment(5);?>/<?php echo $record->id;?>/hr_dwrat_job_orders/<?php echo $this->uri->segment(4);?>"onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>

                    </tr>



                            <!--------------------------------------- statt modal--->
                            <div class="modal fade" id="modal-img<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"></h4>
                                        </div>

                                        <div class="modal-body">
                                            <?php if($record->img!=0) {


                                                $img_url ="uploads/images/".$record->img;
                                            }

                                            else{
                                                $img_url ="uploads/images/".$record->img;


                                            }?>
                                            <img src="<?php echo base_url().$img_url?>" width="100%" height="">






                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-danger" style="float: left" data-dismiss="modal">إغلاق</button>


                                        </div>

                                    </div>
                                </div>
                            </div>
                    <tr>
                            <!-----------------------------------------------end ------------------------------------------------>

                            <?php  } } ?>

                    </tbody>
                </table>
                <input type="submit" style="display: none" name="add" value="حفظ" class="button-add training">
                <?php echo form_close();?>
            </div>

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


