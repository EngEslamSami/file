
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

<div class="col-sm-12   no-padding" >

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
            <div class="col-sm-10 padding-4" >
                <?php echo form_open_multipart('human_resources/employee_forms/job_requests/Job_request/add_science_qualification/'.$this->uri->segment(6)); ?>

                <table class="table table-bordered">
                    <thead>

                    <tr class="info">
                        <th>الدرجة العلمية  </th>
                        <th>المؤهل العلمي </th>
                        <th>المدرسه/الجامعة</th>
                        <th>التخصص</th>
                        <th>مدة الدراسة/العام</th>
                        <th>التقدير</th>
                        <th>صوره الشهاده</th>
                        <th>الاجراء</th>
                    </tr>
                    </thead>
                    <tbody id="scientific">
                    <?php if(isset($record)&&!empty($record)) {
                        foreach ($record as $record) {

                            ?>

                            <tr>


                                <td><select disabled="disabled" name="degree_id_fk[]" id="employee_degree"
                                            class="form-control bottom-input"
                                            onchange=""
                                            data-validation="required" aria-required="true">
                                        <option value="">إختر</option>
                                        <?php
                                        if(isset($degree_qual)&&!empty($degree_qual)) {
                                            foreach($degree_qual as $row){
                                                ?>
                                                <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$record->degree_id_fk){echo 'selected' ; } ?>> <?php echo $row->title_setting;?></option >
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select> </td>



                                <td><select name="qualification_id_fk[]" disabled="disabled"  id="employee_qualification"
                                            class="form-control bottom-input"
                                            onchange=""
                                            data-validation="required" aria-required="true">
                                        <option value="">إختر</option>
                                        <?php
                                        if(isset($qualification)&&!empty($qualification)) {
                                            foreach($qualification as $row){
                                                ?>
                                                <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$record->qualification_id_fk){echo 'selected' ; } ?>> <?php echo $row->title_setting;?></option >
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select></td>
                                <td><input type="text" disabled="disabled" data-validation="required" value="<?php echo $record->school;?>" name="school[]" class="form-control"></td>
                                <td><input type="text"disabled="disabled"  data-validation="required" value="<?php echo $record->specialied;?>" name="specialied[]" class="form-control"></td>
                                <td><input type="text"disabled="disabled" data-validation="required" value="<?php echo $record->year;?>" name="year[]" class="form-control"> </td>
                                <td><input type="text"disabled="disabled" data-validation="required" value="<?php echo $record->taqder;?>"  name="taqder[]" class="form-control"> </td>

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
                                            window.location="<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/delete_record/<?php echo $this->uri->segment(6);?>/<?php echo $record->id;?>/hr_qualification_job_orders/<?php echo $this->uri->segment(5);?>";
                                            });'>
                                        <i class="fa fa-trash"> </i></a>
                                    <!--<a href="<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/delete_record/<?php echo $this->uri->segment(6);?>/<?php echo $record->id;?>/hr_qualification_job_orders/<?php echo $this->uri->segment(5);?>"onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
                                </td>



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
                                <!-----------------------------------------------end ------------------------------------------------>

                            </tr>

                            <?php
                        }
                    }
                    ?>

                    </tbody>
                    <tfoot>
                    <tr class="">
                        <th colspan="7"></th>
                        <th>
                            <button type="button" onclick="add_row(2,'scientific')" class="btn-success btn"><i
                                        class="fa fa-plus"></i>
                            </button>
                        </th>
                    </tr>
                    </tfoot>
                </table>
               <!-- <input type="submit" style="display: none"  name="add" value="حفظ" class="button-add scientific"> -->
                <button type="submit"  class="btn btn-labeled btn-success button-add scientific "  name="add" value="save_main_data" style=" background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px;display: none; ">
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


