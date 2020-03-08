<style type="text/css">
    .top-label {
        font-size: 13px;
    }
    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    .title{
        background-color: #;
        background-color: #428bca;
        color: #fff;
        text-align: center;
        padding: 5px;
    }
</style>

<style type="text/css">
    .print_forma{
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 20px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        width: 100%;
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

</style>
<?php
if(isset($result)&&!empty($result))
{

    $out['form']='human_resources/employee_forms/Job_requests/update_job_request/'.$this->uri->segment(4);
}else{

    $out['form']='human_resources/employee_forms/Job_requests/add_job_request';
}
?>

<div class="col-sm-12 no-padding " >
    <div class="col-sm-12 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>

            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>
                <div class="col-md-12 ">
                    <div class="form-group col-md-3  col-sm-6 padding-4">
                        <label class="label top-label">الإدارة-القسم</label>
                        <input type="text" name="" id="" value="<?php  if(!empty($result)){ echo$result[0]->management; echo '-'; echo$result[0]->department; }else{
                        if(!empty($emp_data->administration_name)){   echo$emp_data->administration_name; echo'-';echo $emp_data->departments_name;}else{ echo 'غيرمحدد';} } ?>"
                                readonly class="form-control bottom-input"
                               data-validation-has-keyup-event="true">
                        <input type="hidden" name="dep_id_fk" value="<?php  if(!empty($result)){  echo$result[0]->management; echo '-'; echo$result[0]->department; }else{if(!empty($emp_data->administration_name)){ echo$emp_data->administration; echo'-'; echo $emp_data->department; } } ?>">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">مسمي الوظيفة</label>
                        <select name="job_title_id_fk" id="job_title_id_fk"
                                data-validation="required"   class="form-control bottom-input selectpicker"
                                data-show-subtext="true" data-live-search="true"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($jobtitles)&&!empty($jobtitles)) {
                                foreach($jobtitles as $row){
                                    $select='';
                                    if(!empty($result[0]->job_title_id_fk == $row->defined_id)){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->defined_id;?>" <?php echo $select;?>> <?php echo $row->defined_title;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-1 col-sm-6 padding-4">
                        <label class="label top-label">العدد</label>
                        <input type="text" name="num_for_job" id="num_for_job" value="<?php  if(!empty($result)){ echo$result[0]->num_for_job; } ?>"
                               class="form-control bottom-input"
                               data-validation="required"  onkeypress="validate_number(event)"
                               data-validation-has-keyup-event="true">
                    </div>


                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">نوع الوظيفة </label>
                        <select name="job_type" id="job_type"
                                data-validation="required"   class="form-control bottom-input selectpicker"
                                data-show-subtext="true" data-live-search="true"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($job_type)&&!empty($job_type)) {
                                foreach($job_type as $row){
                                    $select='';
                                    if(!empty($result[0]->job_type == $row->id_setting)){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php echo $select;?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">طبيعة العمل بالوظيفة</label>
                        <select id="job_natural" data-validation="required" class="form-control bottom-input selectpicker"
                                data-show-subtext="true" data-live-search="true"
                                name="job_natural">
                            <option value="">إختر</option>
                            <?php
                            if(isset($work_nature)&&!empty($job_type)) {
                            foreach($work_nature as $row){
                                $select='';
                                if(!empty($result[0]->job_natural == $row->id_setting)){
                                    $select='selected';
                                }
                                ?>
                                <option value="<?php echo $row->id_setting;?>" <?php echo $select;?>> <?php echo $row->title_setting;?></option >
                                <?php
                            } } ?>
                        </select>
                    </div>

                   </div>
                <div class="col-sm-12 col-xs-12">
                    <h4 class="title"> أسباب ومبررات الإحتياج </h4>
                    <div class="col-sm-1 col-xs-12"></div>
                    <div class="col-sm-10 col-xs-12">
                        <button type="button" value="" id="" onclick="add_reasons()" class="btn btn-success btn-next"/><i class="fa fa-plus"></i> إضافة </button><br>

                        <table class="table table-striped table-bordered"   style="<?php  if(empty($result)){ ?>display: none <?php } ?>" id="mytable_reasons">
                            <thead>
                            <tr class="info">
                                <th class="text-center">م</th>
                                <th class="text-center">الاسباب والمبررات</th>
                            </tr>
                            </thead>
                            <tbody id="reasonsTable">
                            <?php if(!empty($result[0]->reason)){
                                $xx=1;
                                foreach ($result[0]->reason as $value){?>
                                    <tr>
                                        <td><?php echo $xx;?></td>
                                        <td>
                                    <input   type='text'   name='details_reason[]'   value="<?php echo $value->details;?>" class='form-control'></td>
                                    </tr>
                                <?php $xx++; }
                            } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-1 col-xs-12"></div>

                </div>
                <div class="col-sm-12 col-xs-12">
                    <h4 class="title"> متطلبات العمل بالوظيفة </h4>
                    <div class="col-sm-1 col-xs-12"></div>
                    <div class="col-sm-10 col-xs-12">
                        <button type="button" value="" id="" onclick="add_job_request()" class="btn btn-success btn-next"/><i class="fa fa-plus"></i> إضافة </button><br>

                        <table class="table table-striped table-bordered"   style="<?php  if(empty($result)){ ?>display: none<?php } ?>" id="mytable_job_request">
                            <thead>
                            <tr class="info">
                                <th class="text-center">م</th>
                                <th class="text-center">المتطلب</th>
                            </tr>
                            </thead>
                            <tbody id="job_requestTable">
                            <?php if(!empty($result[0]->requires)){
                                $xx=1;
                                foreach ($result[0]->requires as $value){?>
                                    <tr>
                                        <td><?php echo $xx;?></td>
                                        <td>
                                            <input   type='text'   name='details_job_request[]'   value="<?php echo $value->details;?>" class='form-control'></td>
                                    </tr>
                                <?php $xx++;}
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-1 col-xs-12"></div>
                </div>
                <div class="col-md-12"><br>
                    <div class="col-md-5"></div>
                    <div class="col-md-3">
                        <button type="submit" id="save" name="add" value="add"
                         class="btn btn-add"><span><i class="fa fa-floppy-o"></i></span> حفظ
                        </button></div>
                    <div class="col-md-4"></div>

                </div>
                <?php echo form_close()?>
            </div>
        </div>
        </div>
    </div>
    <!------------------------------------------------------------------>
    <!------ table -------->
    <?php       if(isset($records) &&!empty($records)){ ?>
   </div>
    <div class="col-xs-12 no-padding">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">طلبات الإحتياج</h3>
            </div>
            <div class="panel-body"><br>
                <div class="col-md-12 no-padding">

                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr class="info">
                                <th class="text-center">م</th>
                                <th class="text-center">رقم الطلب</th>
                                <th class="text-center">تاريخ الطلب</th>
                                <th class="text-center">مسمي الوظيفة</th>
                                <th class="text-center">التفاصيل</th>
                                <th class="text-center">الاجراء</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            $a=1;
                            if(isset($records)&&!empty($records)) {
                                foreach ($records as $record) {
                                    ?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <td><? echo $record->id; ?></td>
                                        <td><? echo $record->date_ar; ?></td>
                                        <td><? echo $record->job_name; ?></td>
                                        <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo$record->id; ?>">التفاصيل</button></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>human_resources/employee_forms/Job_requests/update_job_request/<?php echo $record->id; ?>"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                            <a onclick="$('#adele').attr('href', '<?= base_url() . "human_resources/employee_forms/Job_requests/Deletejob_request/" . $record->id ?>');"
                                               data-toggle="modal" data-target="#modal-delete"
                                               title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                            <!--<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal_transfer<?php /*echo$record->id; */?>">التحويل</button>-->
                                       </td>
                                    </tr>
                                    <?php
                                    $a++;
                                }
                            } else {?>
                                <td colspan="6"><div style="color: red; font-size: large;">لا توجد بيانات</div></td>
                            <?php  }  ?>
                            </tbody>
                        </table>



                    <?php
                    $a=1;
                    foreach ($records as $record) {
                    ?>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal<?php echo$record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog " style="width: 80%" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="print_forma  col-xs-12 no-padding">
                                        <div class="piece-box">
                                            <div class="piece-heading">
                                                <div class="col-xs-4">
                                                    <h5><?php echo $record->management ;?>/<?php echo $record->department ;?></h5>
                                                </div>
                                                <div class="col-xs-5 ">
                                                    <h5> <?php echo $record->job_name ;?></h5>
                                                </div>
                                                <div class="col-xs-3">
                                                    <h5>العدد(<?php echo $record->num_for_job ;?>)</h5>
                                                </div>
                                            </div>
                                            <div class="piece-body">
                                                <div class="col-xs-2">
                                                    <h6>نوع الوظيفة</h6>
                                                </div>
                                                <div class="col-xs-3">
                                                    <h6>
                                                        <?php
                                                        foreach($job_type as $row) {

                                                            if ($record->job_type == $row->id_setting) {
                                                                echo $row->title_setting;
                                                            }
                                                        }

                                                        ?>
                                                    </h6>
                                                </div>




                                            </div>
                                            <div class="piece-footer">
                                                <div class="col-xs-3">
                                                    <h6>طبيعة العمل بالوظيفة</h6>
                                                </div>

                                                <div class="col-xs-5">
                                                    <h6>
                                                        <?php
                                                        foreach($work_nature as $row) {

                                                            if ($record->job_natural == $row->id_setting) {
                                                                echo $row->title_setting;
                                                            }
                                                        }

                                                        ?>
                                                    </h6>                                                </div>

                                            </div>
                                        </div>

                                        <div class="piece-box" style="margin-bottom: 0">
                                            <div class="piece-heading">
                                                <div class="col-xs-12">
                                                    <h5>أسباب ومبررات الإحتياج</h5>
                                                </div>
                                            </div>
                                            <div class="piece-body">
                                                <div class="col-xs-12  ">
                                                    <?php if(!empty($record->reason)){
                                                        $xx=1;
                                                        foreach ($record->reason as $value){?>



                                                                 <h6><?php echo $xx;?>-<?php echo $value->details;?></h6>

                                                            <?php $xx++; }
                                                    } else{?>
                                                        <h6>لا توجد اسباب</h6>

                                                   <?php  }?>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="piece-box" >
                                            <div class="piece-heading">
                                                <div class="col-xs-12">
                                                    <h5>متطلبات للعمل بالوظيفة</h5>

                                                </div>
                                            </div>
                                            <div class="piece-body">
                                                <div class="col-xs-12  ">
                                                    <?php if(!empty($record->requires)){
                                                        $xx=1;
                                                        foreach ($record->requires as $value){?>



                                                            <h6><?php echo $xx;?>-<?php echo $value->details;?></h6>

                                                            <?php $xx++; }
                                                    } else{?>
                                                        <h6>لا توجد متطلبات وظيفه</h6>

                                                    <?php  }?>
                                                </div>

                                            </div>
                                            <div class="piece-footer">

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
                        <div class="modal fade" id="myModal_transfer<?php echo$record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"  style="float: left" data-dismiss="modal">إغلاق</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }  ?>

                </div>
            </div>
        </div>
    </div>
      <?php }  ?>
    <!----- end table ------>


<script>

    function add_reasons(){
        var x = document.getElementById('mytable_reasons');
        var len = x.rows.length;
        $("#mytable_reasons").show();
        $('#reasonsTable').append("<tr><td style='text-align: center !important;'>"+ len +"</td><td> " +
            "<input  data-validation='required'   type='text'   style='text-align: center !important;' name='details_reason[]'  placeholder='الأسباب والمبررات' class='form-control'></td></tr>");

    }
    //-----------------------------------------------

</script>
<script>
    function add_job_request(){
        var x = document.getElementById('mytable_job_request');
        var len = x.rows.length;
        $("#mytable_job_request").show();
        $('#job_requestTable').append("<tr><td style='text-align: center !important;'>"+ len +"</td><td > " +
            "<input   data-validation='required'   type='text'  style='text-align: center !important;'  name='details_job_request[]'  placeholder='المتطلبات' class='form-control'></td></tr>");

    }
    //-----------------------------------------------

</script>

