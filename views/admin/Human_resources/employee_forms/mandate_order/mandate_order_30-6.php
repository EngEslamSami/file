



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
    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
    .top-label {
        font-size: 14px;
        font-weight: 500;
        position: relative;

    }

</style>
<?php
if(isset($row)&&!empty($row)) {
    $id=$row->id;
    $emp_id_fk=$row->emp_id_fk;
    $edara_id_fk=$row->edara_id_fk;
    $qsm_id_fk=$row->qsm_id_fk;
    $job_title_id_fk=$row->job_title_id_fk;
    $mandate_type_fk=$row->mandate_type_fk;
    $mandate_direction=$row->mandate_direction;
    $mandate_distance=$row->mandate_distance;
    $from_date=$row->from_date;
    $to_date=$row->to_date;
    $num_days=$row->num_days;
    $bdal_count_method=$row->bdal_count_method;
    $bdal_value=$row->bdal_value;
    $bdal_total=$row->bdal_total;
    $date=$row->date;
    $mandate_purpose=$row->mandate_purpose;
    $times=$row->times;
    $emp_code=$row->emp_code;
    $emp_code_fk = $item->emp_code_fk;
    $edara_id_fk = $item->edara_id_fk;
    $edara_n = $item->edara_n;
    $qsm_id_fk = $item->qsm_id_fk;
    $qsm_n = $item->qsm_n;
    $marad_name = $item->marad_name;
    $job_title=$item->job_title;
    $action=base_url().'/'.'human_resources/employee_forms/Mandate_orders/edit_Mandate_order/'.$this->uri->segment(5);




}else{
    $emp_id_fk='';
  
    $emp_name = '';
    $emp_code='';
    $emp_id_fk='';
    $qsm_id_fk='';
    $edara_id_fk='';
    $job_title_id_fk='';
    $mandate_type_fk='';
    $mandate_direction='';
    $mandate_distance='';
    $mandate_purpose='';
    $from_date='';
    $to_date='';
    $num_days='';
    $bdal_count_method='';
    $bdal_value='';
    $bdal_total='';
    $id='';
    $date='';
    $times='';
    $emp_code='';
    $emp_id_fk = '';
    $emp_code_fk = '';
    $edara_id_fk = '';
    $edara_n = '';
    $qsm_id_fk = '';
    $qsm_n = '';
    $job_title='';
    $action=base_url().'/'.'human_resources/employee_forms/Mandate_orders';

}

?>
    <div class="col-sm-12 no-padding " >
        
            <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $title;  ?></h3>
                </div>
                <div class="panel-body">


    <form action="<?php echo $action;?>" method="post">

 
        <input type="hidden" id="emp_id" name="emp_id_fk" value="<?php if(!empty($emp_data->id)){ echo $emp_data->id; }else{ echo 0 ; }?> ">
        <input type="hidden" id="administration" name="edara_id_fk" value="<?php if(!empty($emp_data->administration)){ echo $emp_data->administration; }else{ echo 0 ; }?>  ">

        <input type="hidden" id="department" name="qsm_id_fk" value="<?php if(!empty($emp_data->department)){ echo $emp_data->department; }else{ echo 0 ; }?>  ">

        <input type="hidden" id="manger" name="direct_manager_id_fk" value="<?php if(!empty($emp_data->manger)){ echo $emp_data->manger; }else{ echo 0 ; }?>  ">

        <div class="col-xs-12 no-padding">
            <div class="col-md-2 padding-4">
            <label class="label ">رقم الطلب</label>
               
                <input type="text"   value="<?php if(isset($last)&&!empty($last)){echo $last->id+1;}else{ echo 1; } ?>" data-validation="required"  id="" name="order_id" class="form-control">
            </div>
            <div class="col-md-2 form-group padding-4">
                
                <label class="label ">نوع الانتداب</label>
                <?php $types=array(1=>'انتداب عمل1',2=>'انتداب عمل 2');?>



                <select name="mandate_type_fk"  id="employee_name"
                        data-validation="required" class="form-control bottom-input selectpicker"
                        data-show-subtext="true" data-live-search="true"
                        aria-required="true" onchange="get_emp_data($(this).val());">
                    <option value="">إختر نوع الانتداب</option>
                    <?php
                    if(isset($types)&&!empty($types)) {
                        foreach($types as $key=>$value){
                            $select='';
                            if(!empty($mandate_type_fk== $key)){
                                $select='selected';
                            }
                            ?>
                            <option value="<?php echo $key;?>" <?php echo $select;?> > <?php echo $value;?></option >
                            <?php
                        }
                    }
                    ?>
                </select>

            </div>
            <div class="col-md-2 padding-4">
            <label class="label "> التاريخ</label>
                
                <input type="date" value="<?php echo date("Y-m-d");?>" data-validation="required" id="" name="date" class="form-control">
            </div>
           
             
         
                 
                  
            <input type="hidden" id="emp_id_fk" name="emp_id_fk"
                       value="<?php if (!empty($emp_data->id)) {
                           echo $emp_data->id;
                       } else {
                           echo $emp_id_fk;
                       } ?> ">
                <input type="hidden" id="edara_id_fk" name="edara_id_fk"
                       value="<?php if (!empty($emp_data->administration)) {
                           echo $emp_data->administration;
                       } else {
                           echo $edara_id_fk;
                       } ?>  ">

                <input type="hidden" id="qsm_id_fk" name="qsm_id_fk"
                       value="<?php if (!empty($emp_data->department)) {
                           echo $emp_data->department;
                       } else {
                           echo $qsm_id_fk;
                       } ?>  ">
            <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                        <label class="label ">اسم الموظف</label>
                        <input name="" id="emp_name" class="form-control" style="width:84%; float: right;"
                               readonly
                               
                               value="<?php if (!empty($emp_data->employee)) {
                                   echo $emp_data->employee;
                               } else {
                                   echo $emp_name;
                               } ?>">
                        <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                class="btn btn-success btn-next" style="float: right;"
                                onclick="GetDiv_emps('myDiv_emp')" <?php if (!empty($emp_data->employee)) {
                            echo 'disabled';
                        } ?>>
                            <i class="fa fa-plus"></i></button>

                    </div>
                    <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                        <label class="label "> الرقم الوظيفي</label>
                        <input name="emp_code_fk" id="emp_code" class="form-control"
                               value="<?php if (!empty($emp_data->emp_code)) {
                                   echo $emp_data->emp_code;
                               } else {
                                   echo $emp_code_fk;
                               } ?>" readonly>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                        <label class="label "> المسمى الوظيفي</label>
                        <input name="job_title" id="job_title" class="form-control"
                               value="<?php if (!empty($emp_data->job_title)) {
                                   echo $emp_data->job_title;
                               }else{
                                echo $job_title;
                               } ?>" readonly>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                        <label class="label "> الأدارة </label>
                        <input name="edara_n" id="edara_n" class="form-control"
                               value="<?php if (!empty($emp_data->administration_name)) {
                                   echo $emp_data->administration_name;
                               } else {
                                   echo $edara_n;
                               } ?>" readonly>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                        <label class="label "> القسم</label>
                        <input name="qsm_n" id="qsm_n" class="form-control"
                               value="<?php if (!empty($emp_data->departments_name)) {
                                   echo $emp_data->departments_name;
                               } else {
                                   echo $qsm_n;
                               } ?>" readonly>
                    </div>

                    <div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document" style="width: 80%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"></h4>
                                </div>
                                <div class="modal-body">
                                    <div id="myDiv_emp"></div>
                                </div>
                                <div class="modal-footer" style="display: inline-block;width: 100%">
                                    <button type="button" class="btn btn-danger"
                                            style="float: left;" data-dismiss="modal">إغلاق
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                        <label class="label ">  عدد مرات انتداب الموظف:</label>
                        <input name="times" id="times" class="form-control"
                               value="<?php if (!empty($emp_data->times)) {
                                   echo $emp_data->times;
                               } else {
                                   echo $times;
                               } ?>" readonly>
                    </div>

                
                <!-- <div class="col-xs-4">
                    <h6>عدد مرات انتداب الموظف:<span class="valu"></span></h6>
                    <input type="text" disabled  name="times" id="times" value="<?php echo $times;?>"   data-validation="required" class="form-control">
                </div> -->
                
       



                       
                      
                            <div class="col-md-3 form-group  padding-4">
                              
                                <label class="label "> جهه الانتداب</label>
                                <select name="mandate_direction" id="destination" style="width: 85%;float: right;"

                                        onchange="return lood(this.value);"
                                        aria-required="true"  data-validation="required" class="form-control"
                                        >
                                    <option value="">إختر</option>
                                    <?php
                                    if (!empty($dest)):
                                        foreach ($dest as $record):
                                            $select='';
                                            if(!empty($mandate_direction == $record->id_setting)){
                                                $select='selected';
                                            }
                                            ?>
                                            <option
                                                value="<?php echo $record->id_setting; ?>"<?php echo $select;?> ><?php echo $record->title_setting; ?></option>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </select>
                                   
                                  <button type="button" class="btn btn-success but2" style="float: right;" title="إضافة جهه أخرى" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> </button>

                            

                            </div>
                            <div class="col-md-1 form-group  padding-4">
                                <label class="label ">المسافه:</label>
                                <input type="text" value="<?php echo $mandate_distance;?> " data-validation="required" onkeypress="validate_number()" class="form-control" name="mandate_distance">
                            </div>
                       
                       
                            <div class="col-md-4 form-group  padding-4">
                                <label class="label ">الغرض من الإنتداب</label>
                               <input class="form-control" data-validation="required" name="mandate_purpose" value="<?php echo $mandate_purpose;?>">

                            </div>
                      
                   
                            <div class="col-md-2 form-group  padding-4">
                                <label class="label ">فترة الإنتداب من تاريخ </label>
                                <input type="date" value="<?php echo date("Y-m-d");?>" data-validation="required" id="from_date" onchange="get_peroid();" name="from_date" class="form-control">
                            </div>
                            <div class="col-md-2 form-group  padding-4">
                                <label class="label ">فترة الإنتداب الي تاريخ </label>
                                <input type="date" value="<?php echo date("Y-m-d", strtotime('tomorrow'));?>" data-validation="required" id="to_date" onchange="get_peroid();" name="to_date" class="form-control">
                            </div>
                            <div class="col-md-2 form-group  padding-4">
                                <label class="label ">مدة الإنتداب بالأيام </label>
                                <input  data-validation="required" type="text"value="<?php echo $num_days;?>" readonly="readonly" id="num_days" name="num_days" class="form-control">

                            </div>




                        <?php
                        $arr_badl=array(1=>'بدل1',2=>'بدل2');
                        
                        ?>
                      

                            <div class="col-md-3 form-group  padding-4">
                                <label class="label ">بدل الإنتداب<span class="valu"> </span></label>
                                <select name="bdal_count_method"  id="bdal_count_method"
                                        data-validation="required" class="form-control bottom-input selectpicker"
                                        data-show-subtext="true" data-live-search="true"
                                        aria-required="true" onchange="get_badl_value($(this).val());">
                                    <option value="">إختر نوع البدل</option>
                                    <?php
                                    if(isset($arr_badl)&&!empty($arr_badl)) {
                                    foreach($arr_badl as $key=>$value){
                                        if(!empty($bdal_count_method == $key.'-'.$key*100)){
                                            $select='selected';
                                        }
                                    ?>
                                    <option value="<?php echo $key;?>-<?php echo $key*100;?>"<?php echo $select;?> > <?php echo $value;?></option >
                                    <?php
                                    }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3 form-group  padding-4">
                                <label class="label ">قيمه البدل</label>
                                <input type="text" readonly value="<?php echo $bdal_value;?>" data-validation="required"  id="pay_count" name="bdal_value" class="form-control">
                            </div>
                            <div class="col-md-3 form-group  padding-4">
                                <label class="label ">إجمالي </label>
                                <input type="text" value="<?php echo $bdal_total;?>"  data-validation="required" readonly id="total" name="bdal_total" class="form-control">
                            </div>

                   


             

        </div>
        <div class="col-xs-12 text-center" style="margin-top: 15px">
                                <input type="hidden" name="add" value="add">
                                <button type="submit" 
                                        class="btn btn-labeled btn-success " id="buttons" name="add" value="حفظ"
                                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                                <button type="button" class="btn btn-labeled btn-danger ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                                </button>

                                <button type="button" class="btn btn-labeled btn-purple ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                                </button>


                                <button type="button" class="btn btn-labeled btn-inverse " id="attach_button"
                                        data-target="#myModal_search" data-toggle="modal">
                                    <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                                </button>


                            </div>

        <!-- <input type="submit" name="add" value="حفظ"> -->
     

    </form>
</div>
                </div>
          

        
        </div>
<!------------------------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog "  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">اضافه جهه انتداب</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                <div class="col-xs-7 col-xs-offset-2">
                    <div class="form-group">
                    <h6>اسم الجهه:<span class=""></span></h6>
                    <input type="text" id="destin" name="dest" class="form-control" style="width: 80%;float: right">
                        <button type="button" id="save" onclick="add_option($('#destin').val());" class="btn btn-danger"  style="float: left" data-dismiss="modal">حفظ</button>

                    </div>
                    <div class="clearfix"></div>
                    <br>
                </div>

                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width:100%;">
                <button type="button" class="btn btn-default"  style="float: left" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>



<!------------------------------------------------------------------------------------------------------------------------------>
<?php

if(isset($records)&&!empty($records)){




?>

            <?php

            if(isset($records)&&!empty($records)){




                ?>

                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="greentd visible-md visible-lg">
                        <th>مسلسل</th>
                        <th> رقم الطلب</th>
                        <th>اسم الموظف</th>
                        <th>جهه الانتداب</th>
                        <th> عدد ايام الانتداب</th>
                        
                        <th>الاجراء</th>
                        <th>حاله الطلب</th>




                    </tr>

                    </thead>
                    <tbody>
                    <?php
                    $x=1;
                    foreach($records as $row){?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <td><?php echo $row->id;?></td>
                            <td><?php echo $row->name;?></td>

                            <td><?php echo $row->destination;?></td>

                            <td><?php echo $row->num_days;?></td>




                            <td><a type="button" class="btn btn-info btn-xs" title="التفاصيل" data-toggle="modal" data-target="#myModal<?php echo$row->id; ?>"><i class="fa fa-list"></i></a>

                                <a href="<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/edit_Mandate_order/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                <a  href="<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/delete_mandate_order/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>


                            </td>
                            <td></td>


                        </tr>
                        <?php
                        $x++;
                    }
                    ?>
                    </tbody>
                </table>
                <?php
            }
            ?>

<?php } ?>

<!-------------------------------------------------------------------------------------------------------------->

<?php

  if(isset($records)&&!empty($records)){
    foreach ($records as $row){


        $id=$row->id;
        $emp_id_fk=$row->emp_id_fk;
        $edara_id_fk=$row->edara_id_fk;
        $qsm_id_fk=$row->qsm_id_fk;
        $job_title_id_fk=$row->job_title_id_fk;
        $mandate_type_fk=$row->mandate_type_fk;
        $mandate_direction=$row->mandate_direction;
        $mandate_distance=$row->mandate_direction;
        $from_date=$row->from_date;
        $to_date=$row->to_date;
        $num_days=$row->num_days;
        $bdal_count_method=$row->bdal_count_method;
        $bdal_value=$row->bdal_value;
        $bdal_total=$row->bdal_total;
        $date=$row->date;
        $mandate_purpose=$row->mandate_purpose;
        $times=$row->times;
        $emp_code=$row->emp_code;

        ?>
        <div class="modal fade" id="myModal<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" style="width: 80%;"  role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">اضافه جهه انتداب</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-xs-12  under-line bordered-bottom ">
                            <div class="col-xs-4">
                                <h6>رقم الطلب:<span class=""></span></h6>
                                <input type="text" readonly  value="<?php if(isset($last)){echo $last->id+1; }else{ echo $id;  } ?>" data-validation="required"  id="" name="order_id" class="form-control">
                            </div>
                            <div class="col-xs-4 form-group">
                                <h6>نوع الانتداب</h6>
                                <?php $types=array(1=>'انتداب عمل1',2=>'انتداب عمل 2');?>



                                <select name="mandate_type_fk"  id="employee_name"
                                        data-validation="required" disabled class="form-control bottom-input selectpicker"
                                        data-show-subtext="true" data-live-search="true"
                                        aria-required="true" onchange="get_emp_data($(this).val());">
                                    <option value="">إختر نوع الانتداب</option>
                                    <?php
                                    if(isset($types)&&!empty($types)) {
                                        foreach($types as $key=>$value){
                                            $select='';
                                            if(!empty($mandate_type_fk== $key)){
                                                $select='selected';
                                            }
                                            ?>
                                            <option value="<?php echo $key;?>" <?php echo $select;?> > <?php echo $value;?></option >
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="col-xs-4">
                                <h6>التاريخ:<span class=""></span></h6>
                                <input type="date" disabled value="<?php echo $date;?>" data-validation="required" id="" name="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12  under-line bordered-bottom ">
                            <h6>&nbsp بيانات الموظف</h6>
                        </div>
                        <div class="col-xs-12 no-padding under-line ">

                            <div class="col-xs-4 form-group">
                                <h6>اسم الموظف</h6>



                                <select name=""  id="employee_name"
                                        data-validation="required" disabled class="form-control bottom-input selectpicker"
                                        data-show-subtext="true" data-live-search="true"
                                        aria-required="true" onchange="get_emp_data($(this).val());">
                                    <option value="">إختر الموظف</option>
                                    <?php
                                    if(isset($all_emps)&&!empty($all_emps)) {
                                        foreach($all_emps as $row){
                                            $select='';
                                            if(!empty($emp_id_fk == $row->id)){
                                                $select='selected';
                                            }
                                            ?>
                                            <option value="<?php echo $row->id;?>"  <?php echo $select;?> > <?php echo $row->employee;?></option >
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="col-xs-4">
                                <h6>الرقم الوظيفي:<span class=""></span></h6>
                                <input type="text" disabled value="<?php echo $emp_code;?>" data-validation="required" id="emp_rakm" class="form-control">
                            </div>

                            <div class="col-xs-4 form-group">
                                <h6>المسمي الوظيفي</h6>



                                <select name="job_title_id_fk"  disabled id="degree_id3" class="form-control bottom-input" data-validation="required"  aria-required="true" >
                                    <option value="">إختر</option>
                                    <?php foreach($job_role as $one_job_role){
                                        $select='';
                                        if(!empty($job_title_id_fk == $one_job_role->defined_id)){
                                            $select='selected';
                                        }
                                        ?>
                                        <option value="<?php echo $one_job_role->defined_id ;?>"<?php echo $select;?>><?php echo $one_job_role->defined_title ; ?></option>';
                                    <?php } ?>
                                </select>

                            </div>
                        </div>


                        <div class="col-xs-12 no-padding under-line open_green">
                            <div class="col-xs-4 form-group">
                                <h6>الاداره</h6>

                                <select name="administration" disabled id="manage"
                                        class="form-control bottom-input"
                                        onchange="return lood(this.value);"
                                        data-validation="required" aria-required="true">
                                    <option value="">إختر</option>
                                    <?php
                                    if (!empty($admin)):
                                        foreach ($admin as $record):
                                            $select='';
                                            if(!empty($edara_id_fk == $record->id)){
                                                $select='selected';
                                            }
                                            ?>

                                            <option
                                                value="<? echo $record->id; ?>" <?php echo $select;?>><? echo $record->name; ?></option>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </select>

                            </div>

                            <div class="col-xs-4 form-group">
                                <h6>القسم</h6>

                                <select name="" id="depart" disabled
                                        class="form-control bottom-input"
                                        onchange="return lood(this.value);">

                                    <option value="">إختر</option>
                                    <?php
                                    if (!empty($departs)):
                                        foreach ($departs as $record):
                                            $select='';
                                            if(!empty($qsm_id_fk == $record->id)){
                                                $select='selected';
                                            }
                                            ?>
                                            <option
                                                value="<? echo $record->id; ?>" <?php echo $select;?>><? echo $record->name; ?></option>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </select>

                            </div>
                            <div class="col-xs-4">
                                <h6>عدد مرات انتداب الموظف:<span class="valu"></span></h6>
                                <input type="text" disabled id="num" value="<?php echo $times;?>"   data-validation="required" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12  under-line bordered-bottom ">
                            <h6>&nbsp بيانات الإنتداب</h6>
                        </div>
                        <div class="col-xs-12 no-padding under-line open_green ">
                            <div class="col-xs-6 form-group">
                                <div class="col-xs-12 form-group">
                                    <h6>جهه الانتداب</h6>

                                    <select name="mandate_direction" disabled id="destination"

                                            disabled  onchange="return lood(this.value);"
                                            aria-required="true"  data-validation="required" class="form-control bottom-input selectpicker"
                                            data-show-subtext="true" data-live-search="true">
                                        <option value="">إختر</option>
                                        <?php
                                        if (!empty($dest)):
                                            foreach ($dest as $record):
                                                $select='';
                                                if(!empty($mandate_direction == $record->id_setting)){
                                                    $select='selected';
                                                }
                                                ?>
                                                <option
                                                    value="<? echo $record->id_setting; ?>"<?php echo $select;?> ><? echo $record->title_setting; ?></option>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                </div>


                            </div>
                            <div class="col-xs-6">
                                <h6>المسافه:<span class="valu"></span></h6>
                                <input type="text" disabled value="<?php echo $mandate_distance;?> " data-validation="required" class="form-control" name="mandate_distance">
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding under-line">
                            <div class="col-xs-12">
                                <h6>الغرض من الإنتداب</h6><br>
                                <textarea disabled class="form-control" data-validation="required" name="mandate_purpose"><?php echo $mandate_purpose;?></textarea>

                            </div>
                        </div>

                        <div class="col-xs-12 no-padding under-line open_green ">
                            <div class="col-xs-4">
                                <h6>فترة الإنتداب من تاريخ <span class="valu"> </span></h6>
                                <input type="date"disabled value="<?php echo $from_date;?>" data-validation="required" id="from_date" onchange="get_peroid();" name="from_date" class="form-control">
                            </div>
                            <div class="col-xs-4">
                                <h6>فترة الإنتداب الي تاريخ <span class="valu"> </span></h6>
                                <input type="date" disabled value="<?php echo $to_date;?>" data-validation="required" id="to_date" onchange="get_peroid();" name="to_date" class="form-control">
                            </div>
                            <div class="col-xs-4">
                                <h6>مدة الإنتداب بالأيام <span class="valu"> </span></h6>
                                <input  data-validation="required" type="text"value="<?php echo $num_days;?>" readonly="readonly" id="num_days" name="num_days" class="form-control">

                            </div>

                        </div>



                        <?php
                        $arr_badl=array(1=>'بدل1',2=>'بدل2');

                        ?>
                        <div class="col-xs-12 no-padding under-line open_green ">

                            <div class="col-xs-3">
                                <h6>بدل الإنتداب<span class="valu"> </span></h6>
                                <select name="bdal_count_method" disabled  id=""
                                        data-validation="required" class="form-control bottom-input selectpicker"
                                        data-show-subtext="true" data-live-search="true"
                                        aria-required="true" onchange="get_badl_value($(this).val());">
                                    <option value="">إختر نوع البدل</option>
                                    <?php
                                    if(isset($arr_badl)&&!empty($arr_badl)) {
                                        foreach($arr_badl as $key=>$value){
                                            if(!empty($bdal_count_method == $key.'-'.$key*100)){
                                                $select='selected';
                                            }
                                            ?>
                                            <option value="<?php echo $key;?>-<?php echo $key*100;?>"<?php echo $select;?> > <?php echo $value;?></option >
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <h6>قيمه البدل<span class="valu"> </span></h6>
                                <input  disabled type="text" readonly value="<?php echo $bdal_value;?>" data-validation="required"  id="pay_count" name="bdal_value" class="form-control">
                            </div>
                            <div class="col-xs-3">
                                <h6>إجمالي <span class="valu"> </span></h6>
                                <input disabled type="text" value="<?php echo $bdal_total;?>"  data-validation="required" readonly id="total" name="bdal_total" class="form-control">
                            </div>

                        </div>

                    </div>


                    <div class="modal-footer" style="display: inline-block;width:100%;">
                        <button type="button" class="btn btn-default"  style="float: left" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>

<?php } } ?>

<!-------------------------------------------------------------------------------------------------------------->



    <script>
        function get_emp_data(valu)
        {

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
                    $('#num').val(obj.order);
                 //   alert(d);

                    $('#degree_id3').val(obj.degree_id);
                    $('#manage').val(obj.administration);
                    $('#depart').val(obj.department);
                    $('#emp_rakm').val(obj.emp_code);




                }






            });


            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>human_resources/employee_forms/Vacation/get_load_page",
                data:{valu:valu},
                success:function(d) {

                    $('#load3').html(d);


                }






            });
        }


    </script>
<script>
function add_option(valu)
{
    var id='<?php echo $last_id +1;?>';
    var x=$('#destination').val();
    $('#destination').append('<option value='+id+' selected>'+valu+'</option>');
    $('.selectpicker').selectpicker('refresh');
    $.ajax({
        type:'post',
        url:"<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/add_option",
        data:{valu:valu},
        success:function(d) {

    $('.but2').attr('disabled','true');


        }






    });
}


</script>

<script>
    function get_peroid()
    {
        var end_date=$('#to_date').val();
        var start_date=$('#from_date').val();


        var a = new Date(end_date);
        var x=new Date(start_date);


        if($('#from_date').val()=='')
        {
            return;
        }
        if($('#to_date').val()=='')
        {
            return;
        }

            if (start_date > end_date) {
                alert("يجب ان يكون تاريخ النهايه اكبر من البدايه");
                return;
            }


        // var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];







        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/Vacation/get_date",
            data:{start_date:start_date,end_date:end_date},
            success:function(d) {

                var obj=JSON.parse(d);


                $('#num_days').val(obj.day);
                $('#bdal_count_method').val()
                get_badl_value($('#bdal_count_method').val());
                 
            }






        });
    }
</script>

<script>
  function get_badl_value(valu)
  {
      if($('#num_days').val()=='')
      {
          alert("من فضلك ادخل مده الانتداب");
          return;
      }
      var res=valu.split("-");
      var num_day=$('#num_days').val();

      $('#pay_count').val(res[1]);
      $('#total').val(res[1]*num_day);

  }

</script>

<!-- uuu -->


<script>

    function GetDiv_emps(div) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> أسم الموظف  </th>' +
            '<th style="width: 170px;" >الأدارة   </th>' +
            '<th style="width: 170px;" >القسم</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/Mandate_orders/getConnection_emp/',

            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
            ],

            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });
    }

   
    function Get_emp_Name(obj) {

        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var emp_code = obj.dataset.emp_code;
        var edara_id = obj.dataset.edara_id;
        var edara_n = obj.dataset.edara_n;
        var job_title = obj.dataset.job_title;
        var qsm_id = obj.dataset.qsm_id;
        var qsm_n = obj.dataset.qsm_n;
        var adress = obj.dataset.adress;
        var emp_phone = obj.dataset.phone;
        var times=obj.dataset.times;
        

        document.getElementById('emp_name').value = name;
        document.getElementById('emp_id_fk').value = obj.value;
        document.getElementById('emp_code').value = emp_code;
        document.getElementById('edara_n').value = edara_n;
        document.getElementById('edara_id_fk').value = edara_id;
        document.getElementById('job_title').value = job_title;
        document.getElementById('qsm_n').value = qsm_n;
        document.getElementById('qsm_id_fk').value = qsm_id;
        document.getElementById('times').value = times;
        
        
        

        $("#myModal_emps .close").click();

    }

</script>