
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
<div class="col-sm-12   no-padding" >

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo$title;?></h3>
            <div class="pull-left">
                <?php
                $data_load["id"]=$this->uri->segment(6) ;
                $this->load->view('admin/Human_resources/employee_forms/job_requests/drop_down_menu', $data_load);?>
            </div>
        </div>
        <div class="panel-body">

            <div class="col-sm-10 padding-4" >
                <?php echo form_open_multipart('human_resources/employee_forms/job_requests/Job_request/add_dawrat/'.$this->uri->segment(6)); ?>

                <table class="table table-striped table-bordered">
                    <thead>

                    <tr class="info">
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
                    <tr>
                            <td><input type="text" disabled="disabled" value="<?php echo $record->dawra;?>" name="dawra[]" data-validation="required" class="form-control"> </td>



                            <td><input type="text" name="place[]" class="form-control" value="<?php echo $record->place;?>" data-validation="required"   id=""  data-validation="required">


                            </td>
                            <td> <input type="text" disabled="disabled" name="date_from[]" data-validation="required"  id=""  data-validation="required" value="<?php echo $record->date_from;?>"
                                        class="form-control bottom-input date_as_mask"
                                        data-validation-has-keyup-event="true">
                                الي <input type="text" data-validation="required" disabled="disabled" name="date_to[]"  id=""  data-validation="required" value="<?php echo $record->date_to;?>"
                                           class="form-control bottom-input date_as_mask"
                                           data-validation-has-keyup-event="true">
                            </td>
                            <td><input type="text" disabled="disabled" data-validation="required" value="<?php echo $record->specialized;?>" name="specialized[]"  class="form-control"> </td>
                            <td>
                                <?php
                                $ext = pathinfo($record->img, PATHINFO_EXTENSION);
                                $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                                $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                                if (in_array($ext,$image)){
                                    ?>
                                    <a data-toggle="modal" type="button" style="cursor: pointer"
                                       data-target="#modal-img<?php echo $record->id;?>">

                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <?php
                                } elseif (in_array($ext,$file)){
                                    ?>
                                    <a target="_blank" href="<?=base_url()."human_resources/employee_forms/job_requests/Job_request/read_file/".$record->img?>">
                                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                                    <?php
                                }

                                ?>
                                </td>

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
                                window.location="<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/delete_record/<?php echo $this->uri->segment(6);?>/<?php echo $record->id;?>/hr_dwrat_job_orders/<?php echo $this->uri->segment(5);?>";
                                });'>
                            <i class="fa fa-trash"> </i></a>
                        <!--<a href="<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/delete_record/<?php echo $this->uri->segment(6);?>/<?php echo $record->id;?>/hr_dwrat_job_orders/<?php echo $this->uri->segment(5);?>"onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
                    </td>

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


                                                $img_url ="uploads/human_resource/job_request/".$record->img;
                                            }

                                            else{
                                                $img_url ="uploads/human_resource/job_request/".$record->img;


                                            }?>
                                            <img src="<?php echo base_url().$img_url?>" width="100%" height="" alt="">






                                        </div>

                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-danger" style="float: left" data-dismiss="modal">إغلاق</button>


                                        </div>

                                    </div>
                                </div>
                            </div>
                    <tr>
                            <!-----------------------------------------------end ------------------------------------------------>

                            <?php  } }else{?>
                                <tr>


<td><input type="text" name="dawra[]" data-validation="required" class="form-control"> </td>



<td><input type="text" name="place[]" data-validation="required"  id=""  data-validation="required" value=""
           class="form-control date_as_mask"
           data-validation-has-keyup-event="true">

   </td>
<td> <input type="date" name="date_from[]" data-validation="required"  id=""  data-validation="required" value="<?= date('Y-m-d');?>"
            class="form-control "
            data-validation-has-keyup-event="true">
    الي <input type="date" data-validation="required" name="date_to[]"  id=""  data-validation="required" value="<?= date('Y-m-d');?>"
                   class="form-control bottom-input "
                   data-validation-has-keyup-event="true">
    </td>
<td><input type="text" data-validation="required" name="specialized[]"  class="form-control"> </td>
<td><input type="file" data-validation="required" name="userfile[]"  class="form-control"> </td>
<td><a id="1" onclick=" $(this).closest('tr').remove(); "><i class="fa fa-trash"></i></a></td>


</tr>
                            <?php }?>

                    </tbody>
                    <tfoot>
                    <tr class="">
                        <th colspan="5"></th>
                        <th>
                            <button type="button" onclick="add_row(3,'training')" class="btn-success btn"><i
                                        class="fa fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                    </tfoot>
                </table>
               <!-- <input type="submit" style="display: none" name="add" value="حفظ" class="button-add training"> -->
                <button type="submit"  class="btn btn-labeled btn-success button-add training "  name="add" value="save_main_data" style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

                <?php echo form_close();?>


        </div>
            <div class="col-sm-2 no-padding" >
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


