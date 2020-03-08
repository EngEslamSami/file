<style type="text/css">

.mystyle{
    width: 37%;
    height: 34px;
    padding: 6px 6px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;


}
.mystyle3{
    width: 9%;
    height: 34px;
    padding: 6px 6px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;


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
    .managment-div-select .btn-group.bootstrap-select{
        width: 85%;
    }
    .help-block.form-error {
        position: absolute;
        top: 27px;
        left: 13%;
    }
    table .help-block.form-error{
        position: relative;
        top: auto;
        left: auto;

    }
</style>
<?php
if(isset($result)&&!empty($result)){
    $emp_id_fk =$result->emp_id_fk;
    $emp_code=$result->emp_code;
    $card_num=$result->card_num;
    $job_title_id_fk=$result->job_title_id_fk;
    $edara_id_fk=$result->edara_id_fk;
    $qsm_id_fk=$result->qsm_id_fk;
    $date=$result->date_ar;
    $direct_manager_id_fk=$result->employee;
    $direct_manager_job_title_fk=$result->direct_manager_job_title_fk;
    $nazran=$result->nazran;
    $work_assigned=$result->work_assigned;
    $max_hours=$result->max_hours;
    $overtime_hours_details=$result->overtime_hours_details;



}else{

    $emp_id_fk='';
    $emp_code='';
    $card_num='';
    $job_title_id_fk='';
    $edara_id_fk='';
    $qsm_id_fk='';
    $date= date('Y-m-d');
    $direct_manager_id_fk ='';
    $direct_manager_job_title_fk ='';
    $nazran ='';
    $work_assigned ='';
    $max_hours ='';
    $overtime_hours_details ='';

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
                <form action="<?php echo base_url();?>human_resources/employee_forms/overtime_hours_orders/edit_overtime_hours_orders/<?php echo $this->uri->segment(5);?>" method="post">
                    <?php } else{?>
                    <form action="<?php echo base_url();?>human_resources/employee_forms/overtime_hours_orders/add_overtime_hours_orders" method="post">
                        <?php }?>

                        <div class="print_forma  col-xs-12 no-padding">
                            <!-------------------------------------------------------------------------------->

                            <div class="piece-box">
                                <div class="piece-body">
                                    <div class="col-xs-12 no-padding">
                                        <div class="col-xs-12  under-line bordered-bottom ">
                                            <h6>&nbsp بيانات الموظف</h6>
                                        </div>
                                        <div class="col-xs-12 no-padding under-line open_green">
                                            <div class="col-xs-4">
                                                <h6>اسم الموظف:<span class="valu"></span></h6>
                                                <select name="emp_id_fk"  id="emp_id_fk" data-validation="required"
                                                        class="form-control bottom-input edara_direction
                                              aria-required="true" onchange="get_emp_data($(this).val());">
                                                <option value="">إختر</option>
                                                <?php
                                                if(!empty($all_emps)) {
                                                    foreach($all_emps as $row){
                                                        $select='';
                                                        if(!empty($emp_id_fk)){
                                                            if($emp_id_fk == $row->id){
                                                                $select='selected';
                                                            }
                                                        }
                                                        ?>
                                                        <option value="<?php echo $row->id;?>"  <?php echo$select;?> >
                                                            <?php echo $row->employee;?></option >
                                                        <?php
                                                    }
                                                } ?>
                                                </select>
                                            </div>
                                            <div class="col-xs-4">
                                                <h6>الرقم الوظيفي<span class="valu"></span></h6>
                                                <input type="text" id="employ_code"  readonly class="form-control" value="<?=$emp_code?>">
                                            </div>

                                            <div class="col-xs-4">
                                                <h6>المسمى الوظيفي<span class="valu" id=""></span></h6>
                                                <select name="job_title_id_fk" id="job_title"
                                                        class="form-control bottom-input" data-validation="required"  aria-required="true" >
                                                    <option value="">إختر</option>
                                                    <?php foreach($jobtitles as $one_job_role){

                                                        $select='';
                                                        if($job_title_id_fk == $one_job_role->defined_id){
                                                            $select ='selected';
                                                        }
                                                        ?>
                                                        <option value="<?php echo $one_job_role->defined_id ; ?>" <?=$select?>>
                                                            <?php echo $one_job_role->defined_title ; ?></option>';
                                                    <?php } ?>
                                                </select>
                                                <input type="hidden" name="job_title_id_fk" id="job_title_hidden" >
                                            </div>
                                        </div>
                                        <div class="col-xs-12 no-padding under-line ">
                                            <div class="col-xs-4">
                                                <h6>الإدارة<span class="valu" ></span></h6>
                                                <select name="edara_id_fk" id="edara_name"
                                                        class="form-control bottom-input"
                                                        onchange="return lood(this.value);"
                                                        data-validation="required" aria-required="true">
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
                                                </select>
                                                <input type="hidden" name="edara_id_fk" id="edara_name_hidden" >
                                            </div>
                                            <div class="col-xs-4">
                                                <h6>القسم<span class="valu" ></span></h6>
                                                <select name="qsm_id_fk" id="qsm_name"
                                                        class="form-control bottom-input"
                                                        onchange="return lood(this.value);"
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
                                                </select>
                                                <input type="hidden" name="qsm_id_fk" id="qsm_name_hidden" >
                                            </div>
                                            <div class="col-xs-4">
                                                <h6>التاريخ<span class="valu"></span></h6>
                                                <input type="text" id="date"   name="date"  readonly class="form-control" value="<?php echo $date;?>" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="piece-box">
                                <div class="piece-heading">
                                    <h6>&nbsp  المدير المباشر</h6>
                                </div>
                                <div class="piece-body" >
                                    <div class="col-xs-12 under-line open_green">
                                        <h5 class="text-center">الأستاذ / <input type="text" readonly  class="mystyle" name="direct_manager_id_fk"  id="direct_manager_id_fk" value="<?=$direct_manager_id_fk?>"/>   المحترم</h5>

                                        <h5>  &nbsp &nbsp&nbsp&nbsp مسمى الوظيفة : <input type="text" readonly name="direct_manager_job_title_fk"  id="direct_manager_job_title_fk" value="<?=$direct_manager_job_title_fk?>" class="mystyle" /></h5>

                                        <h6>  &nbsp &nbsp&nbsp&nbsp  نظراً لـ<input  type="text"  class="mystyle" name="nazran" value="<?=$nazran?>" /> فقد تم تكليفكم بإنجاز العمل التالي :</h6><br>

                                        <h6>&nbsp &nbsp&nbsp&nbsp  -	<textarea    style="margin: 0px; height: 49px; width: 347px;" name="work_assigned" ><?=$work_assigned?></textarea></h6>

                                        <h6 class="text-center">&nbsp   على أن يتم ذلك خلال اليوم/الأيام والأوقات المحددة أدناه </h6><br>
                                        <h6 class="text-center">وألا تتجاوز عدد الساعات (  <input  type="text" class="mystyle3" value="<?=$max_hours?>"  onkeyup="$('#mytable').hide(),$('#resultTable').html('')" onkeypress="validate_number(event)" name="max_hours" id="max_hours" />    ) ساعة / ساعات .     وجزاكم الله خيراً ،،،</h6><br>

                                    </div>
                                    <div class="col-xs-12 no-padding">
                                        <br><br>
                                        <button type="button" value="" id="" onclick="add_row()" class="btn btn-success btn-next"/>
                                        <i class="fa fa-plus"></i> إضافةعمل </button><br><br>


                                        <table class="table table-bordered"   <?php if(empty($overtime_hours_details)){ ?> style="display: none" <?php  } ?> id="mytable">
                                            <thead>
                                            <tr>
                                                <th>التاريخ</th>
                                                <th>من الساعة</th>
                                                <th>إلى الساعة</th>
                                                <th>المدة</th>
                                                <th>البدل الأضافي</th>
                                                <th>العمل المكلف بإنجازه</th>
                                            </tr>
                                            </thead>

                                            <tbody id="resultTable">
                                            <?php if(!empty($overtime_hours_details)){ ?>
                                            <?php $difference=0; $hours=0;  $z=1; foreach ($overtime_hours_details as $record){
                                            $class = '';
                                            if ($z % 2 == 0) {
                                                $class = 'open_green';
                                            }

                                            $difference = ( strtotime($record->to_time) -  strtotime($record->from_time));
                                            $hours = $difference / 3600;
                                            $minutes =$hours * 60;

                                            ?>
                                            <?php $bdal_type_arr =array(0=>'بدل نقدي',1=>'بدل أيام الراحة');?>

                                            <tr class="<?=$class?>" id="tr<?=$z?>">
                                                <td><input type="hidden" name="date[]" id="date"  value="<?=$record->date ?>"><?=$record->date ?></td>
                                                <td><input type="hidden"   value="<?=$record->from_time?>" name="from_time[]"
                                                        ><?=$record->from_time?></td>
                                                <td><input type="hidden"   value="<?=$record->to_time?>" name="to_time[]"
                                                    ><?=$record->to_time?></td>
                                                <td><input type="hidden"   value="<?=$record->num_hours?>" name="num_hours[]"
                                                    ><?=$record->num_hours?></td>
                                                <input type="hidden"    class="minutes"   value="<?php echo $minutes;?>" id="minutes<?php echo$z;?>"  >
                                                <td>

                                                    <input type="hidden"   value="<?=$record->bdal_type?> " name="bdal_type[]">
                                                    <?php if($record->bdal_type ==1){ echo 'بدل أيام الراحة';}elseif($record->bdal_type ==0){ echo'بدل نقدي';}?></td>
                                                <td><textarea  name="work_assigned[]" style="margin: 0px; width: 193px; height: 69px;"  readonly cols="30" rows="10"><?=$record->work_assigned?></textarea></td>
                                                <td>
                                                    <a href="#"
                                                       onclick=" RemoveMe('tr<?=$z?>' );"><i class="fa fa-trash"
                                                                                                              aria-hidden="true"></i> </a>
                                                </td>
                                            </tr>

                                            </tbody>
                                            <?php $z++;} ?>
                                            <?php } ?>
                                        </table>


                                    </div>

                                </div>

                            </div>





                            <!-------------------------------------------------------------------------------->





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

        <?php $data_load["personal_data"]=$personal_data;
        $this->load->view('admin/Human_resources/sidebar_person_data_vacation',$data_load);?>

    </div>
</div>
<?php
if(isset($records)&&!empty($records)){?>
    <div class="col-sm-12 no-padding " >
        <div class="col-sm-12">
            <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"> بيانات التكليف الإضافى</h3>
                </div>
                <div class="panel-body">

                    <!-----------------------------------------table------------------------------------->

                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="visible-md visible-lg">
                            <th>مسلسل</th>
                            <th>الرقم الوظيفي</th>
                            <th>إسم الموظف</th>
                            <th>التفاصيل</th>
                            <th> الاجراء</th>
                            <th>الحالة </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach ($records as $row) {
                 
                            ?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo $row->emp_code ;?></td>
                                <td><?php echo $row->employee ;?></td>
                                <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo$row->id; ?>">التفاصيل</button></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>human_resources/employee_forms/Overtime_hours_orders/edit_overtime_hours_orders/<?php echo $row->id;?>"><i
                                            class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                    <a href="<?php echo base_url(); ?>human_resources/employee_forms/Overtime_hours_orders/delete_overtime_hours_orders/<?php echo $row->id;?>"
                                       onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                                     aria-hidden="true"></i> </a>
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

                                                <div class="piece-box">
                                                    <div class="piece-body">
                                                        <div class="col-xs-12 no-padding">
                                                            <div class="col-xs-12  under-line bordered-bottom ">
                                                                <h6>&nbsp </h6>
                                                            </div>
                                                            <div class="col-xs-12 no-padding under-line open_green">
                                                                <div class="col-xs-4">
                                                                    <h6>اسم الموظف<span class="valu">/<?php echo $row->employee ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>الرقم الوظيفي<span class="valu">/<?php echo $row->emp_code ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>المسمى الوظيفي<span class="valu">/<?php echo $row->job_title ;?></span></h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 no-padding under-line ">
                                                                <div class="col-xs-4">
                                                                    <h6>الإدارة<span class="valu">/<?php echo $row->admin_title ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>القسم<span class="valu">/<?php echo $row->department_title ;?></span></h6>
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <h6>التاريخ<span class="valu">/<?php echo date('Y-m-d',$row->date_s);?></span></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="piece-box">
                                                    <div class="piece-heading">
                                                        <h6>&nbsp  المدير المباشر</h6>
                                                    </div>
                                                    <div class="piece-body" >
                                                        <div class="col-xs-12 under-line open_green">
                                                            <h5 class="text-center">الأستاذ / <?=$row->employee?>   المحترم</h5>

                                                            <h5>  &nbsp &nbsp&nbsp&nbsp مسمى الوظيفة : <?=$row->direct_manager_job_title_fk?></h5>

                                                            <h6>  &nbsp &nbsp&nbsp&nbsp نظراً لـ <?=$row->nazran?> فقد تم تكليفكم بإنجاز العمل التالي :</h6><br>

                                                            <h6>&nbsp &nbsp&nbsp&nbsp  -	<?=$row->work_assigned?></h6>

                                                            <h6 class="text-center">&nbsp   على أن يتم ذلك خلال اليوم/الأيام والأوقات المحددة أدناه </h6><br>
                                                            <h6 class="text-center">وألا تتجاوز عدد الساعات (  <?=$row->max_hours?>   ) ساعة / ساعات .     وجزاكم الله خيراً ،،،</h6><br>


                                                        </div>
                                                        <div class="col-xs-12 no-padding">
                                                            <?php if(!empty($row->overtime_hours_details)){ ?>
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th>التاريخ</th>
                                                                    <th>من الساعة</th>
                                                                    <th>إلى الساعة</th>
                                                                    <th>المدة</th>
                                                                    <th>البدل الأضافي</th>
                                                                    <th>العمل المكلف بإنجازه</th>
                                                                </tr>
                                                                </thead>
                                                        <?php $z=1; foreach ($row->overtime_hours_details as $record){
                                                            $class = '';
                                                            if ($z % 2 == 0) {
                                                                $class = 'open_green';
                                                            }

                                                            ?>
                                                            <?php $bdal_type_arr =array(0=>'بدل نقدي',1=>'بدل أيام الراحة');?>
                                                                <tbody >
                                                                <tr class="<?=$class?>">
                                                                    <td><?=$record->date ?></td>
                                                                    <td><?=$record->from_time?></td>
                                                                    <td><?=$record->to_time?></td>
                                                                    <td><?=$record->num_hours?></td>
                                                                    <td>   <?php if($record->bdal_type ==1){ echo 'بدل أيام الراحة';}elseif($record->bdal_type ==0){ echo'بدل نقدي';}?></td>
                                                                    <td><textarea style="margin: 0px; width: 193px; height: 69px;"  readonly cols="30" rows="10"><?=$record->work_assigned?></textarea></td>
                                                                </tr>

                                                                </tbody>
                                                                <?php $z++;} ?>
                                                            </table>
                                                            <?php } ?>
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


<!--------------------------------------------------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

    $(document).ready(function(){
        var emp_id_fk =<?php echo$emp_id_fk;?>;
        if( emp_id_fk !=''  ){
            get_emp_data(emp_id_fk);

        }
    });

</script>




<script>
    function get_emp_data(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Overtime_hours_orders/get_emp_data",
            data:{valu:valu},
            success:function(d) {


                var obj=JSON.parse(d);


                $('#job_title_id_fk').val(obj.degree_id);
                $('#job_title').val(obj.degree_id);
                var title =$.trim($("#job_title").find("option:selected").text());
                $('#direct_manager_job_title_fk').val(title);
                $('#national_id').val(obj.card_num);
                $('#employ_code').val(obj.emp_code);
                $('#emp_id').val(obj.id);
                $('#administration').val(obj.administration);
                $('#department').val(obj.department);
                $('#direct_manager_id_fk').val(obj.employee);
                $("#job_title").attr('disabled',true);
                $('#job_title_hidden').val(obj.degree_id);

                // $("#manger").attr('disabled',true)
                $('#edara_name').val(obj.administration);
                $('#edara_name_hidden').val(obj.administration);
                $("#edara_name").attr('disabled',true);
                $('#qsm_name').val(obj.department);
                $('#qsm_name_hidden').val(obj.department);
                $("#qsm_name").attr('disabled',true);
            }




        });


        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Overtime_hours_orders/get_load_page",
            data:{valu:valu},
            success:function(d) {

                $('#load3').html(d);


            }






        });
    }


</script>


<script>

     var a=1;
     function add_row(){
         var hours =$('#max_hours').val();
   if(hours >0 && hours !=''){
     $("#mytable").show();
     var x = document.getElementById('resultTable');
     var y = document.getElementById('mytable');
     var len = a++;
     var table_max = y.rows.length;
     var dataString   ='lenth=' + len +'& table_max='+ table_max;

     $.ajax({
     type:'post',
     url: '<?php echo base_url() ?>human_resources/employee_forms/Overtime_hours_orders/add_overtime_hours_work',
     data:dataString,
     dataType: 'html',
     cache:false,
     success: function(html){
     $("#resultTable").append(html);
     // $('#saves').show();
     }
     });
         } else {

             alert(' إختر  عدد ساعات العمل !!');
         }
     }


</script>






<script>
    function check_len(length)
    {

        var len=length.length;
        if(len<10){
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if(len>10){
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if(len==10){
            document.getElementById("buttons").removeAttribute("disabled", "disabled");
        }


    }



</script>




<script>
    function RemoveMe(valu) {
        $('#' + valu).remove();
    }

</script>




