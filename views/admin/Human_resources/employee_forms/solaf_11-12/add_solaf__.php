<style type="text/css">
 

    .print_forma {
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

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
        color: #fff;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
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

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;

    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }

    .under-line {
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }

    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3,
    .under-line .col-xs-4,
    .under-line .col-xs-6,
    .under-line .col-xs-8 {
        border-left: 1px solid #abc572;
    }


    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
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



    .right-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        right: 10px;
        top: 1px;
    }

    .left-calendar-icon {
        width: 23px;
        float: right;
        position: absolute;
        left: 10px;
        top: 1px;
    }

    .personel-img {
        position: relative;
        overflow: hidden;
        height: 200px;
    }

    .personel-img .front {
        border: 2px solid #eee;
        border-radius: 5px;
    }

    .personel-img .front img {
        width: 100%;
        height: 200px;
    }

    .personel-img .back {
        position: absolute;
        bottom: -200px;
        opacity: 0;
        background: rgba(0, 0, 0, 0.7);
        width: 100%;
        height: 100%;
        transition: 0.3s all ease-in;
        -webkit-transition: 0.3s all ease-in;
        border: 2px solid #fcb632;
    }

    .personel-img:hover .back {
        opacity: 1;
        bottom: 0;
    }

    .personel-img .back i {
        background-color: #fcb632;
        color: #fff;
        padding: 7px;
        font-size: 34px;
        border-radius: 50%;
        margin: 47% 35%;
    }

    .personel-img .show-da {
        position: relative;
    }

    .bond-heading {
        background-color: #00713e;
        color: #fff;
        padding: 10px;
        border-radius: 3px;
    }

    .bond-heading .bond-title {
        margin: 0;
    }

    .bond-body {
        padding: 10px;
        border: 2px solid #ccc;
        display: inline-block;
        width: 100%;

    }
 
    .table-bordered.table-details tbody > tr > td {
        font-size: 13px !important;
        white-space: pre-line;
    }
    .check-style input[type=checkbox] + label{
        line-height: 20px;
    }
    
    
    .box-register {
        display: inline-block;
        text-align: center;
        border: 2px solid #999;
        background-color: #fff;
        border-radius: 13px;
        box-shadow: 2px 2px 8px #eee;
        min-width: 210px;
        padding: 5px;
    }
    .box-register img {
        width: 40px;
        height: 40px;
      
        float:right;
        -webkit-transition: 0.3s all ease-in;
        -moz-transition: 0.3s all ease-in;
        transition: 0.3s all ease-in;
    }
    .box-register h5 {
        font-family: h1;
        font-size: 16px;
        font-weight: bold;
    }
    .box-register:hover img{
        -webkit-transform: rotate(360deg);
        -moz-transform: rotate(360deg);
        transform: rotate(360deg);
    }

</style>
<div class="col-md-12 no-padding">
<div class="col-md-1 col-sm-1 padding-4">

</div>
<div class="col-md-11 col-sm-11 no-padding">
    <div class="col-xs-12 no-padding text-center" style="margin-bottom: 5px;">
        <a  href="#modal_details" data-toggle="modal" onclick="get_details()">
           <div class="box-register">
               <img src="<?php echo base_url(); ?>/asisst/admin_asset/img/icons/846-8467960_regulation-rules-and-regulation-icon.png">
               <h5>ضوابط الدعم</h5>
           </div>
        </a>
        <a  href="#modal_details_dbt" data-toggle="modal" onclick="get_details_dbt()">
           <div class="box-register">
               <img src="<?php echo base_url(); ?>/asisst/admin_asset/img/icons/completed-projects-10-days.png">
               <h5>ضبط الإستحقاق</h5>
           </div>
        </a>
        <a  href="#modal_details_doc" data-toggle="modal" onclick="get_details_doc()">
           <div class="box-register">
               <img src="<?php echo base_url(); ?>/asisst/admin_asset/img/icons/doc.png">
               <h5>المستندات المطلوبة</h5>
           </div>
        </a>
        <a href="#modal_details_exp" data-toggle="modal" onclick="get_details_exp()">
           <div class="box-register">
               <img src="<?php echo base_url(); ?>/asisst/admin_asset/img/icons/Advanced-payment-bonds.png">
               <h5>ألية إسترداد القرض / السلف</h5>
           </div>
        </a>
    </div>
 <div class="roundedBox"> 
 
 
 
<?php if ($_SESSION['role_id_fk'] == 1 || $_SESSION['role_id_fk'] == 3) { ?>
    <div class="col-sm-12 no-padding ">

            <?php
            if (isset($item) && !empty($item)) {
                $rkm=$item->t_rkm ;
            
                $t_rkm_date_m=$item->t_rkm_date_m;
                $qemt_solaf=$item->qemt_solaf;
                $sadad_solfa=$item->sadad_solfa;
                $qst_num=$item->qst_num;

                $khsm_form_date_m=$item->khsm_form_date_m;
                $khsm_to_date_m=$item->khsm_to_date_m;
                $previous_request_date_m=$item->previous_request_date_m;
                $hd_solfa=$item->hd_solfa;
                $num_previous_requests=$item->num_previous_requests;
                $solaf_reason=$item->solaf_reason;
                $emp_id_fk = $item->emp_id_fk;
                $emp_name = $item->emp_name;
                
                $emp_id_fk = $item->emp_id_fk;
                $emp_code_fk = $item->emp_code_fk;
                $edara_id_fk = $item->edara_id_fk;
                $edara_n = $item->edara_n;
                $qsm_id_fk = $item->qsm_id_fk;
                $qsm_n = $item->qsm_n;
                $job_title=$item->job_title;
               



            } else {
                $rkm=$last_rkm ;
         
                $t_rkm_date_m=date('Y-m-d');
                $qemt_solaf='';
                $sadad_solfa='';
                $qst_num='';
                $khsm_to_date_m=date('Y-m-d');
                $khsm_form_date_m=date('Y-m-d');
  
                $previous_request_date_m=date('Y-m-d');
                $hd_solfa='';
                $num_previous_requests='';
                $solaf_reason='';
                $emp_id_fk = '';
                $emp_name = '';
               

                $emp_id_fk = '';
                $emp_code_fk = '';
                $edara_id_fk = '';
                $edara_n = '';
                $qsm_id_fk = '';
                $qsm_n = '';
                $job_title='';

              
            }
            ?>


          
                <div class="col-sm-12 no-padding">
                    <?php
                    if (isset($item) && !empty($item)){
                    ?>
                    <form action="<?php echo base_url() . 'human_resources/employee_forms/solaf/Solaf/edit_solaf/' . $item->id; ?>"
                          method="post" id="form1">

                        <?php } else{ ?>
                        <form action="<?php echo base_url(); ?>human_resources/employee_forms/solaf/Solaf/add_solaf"
                              method="post" id="form1">

                            <?php } ?>
<!-- 28-8-om -->
                            <?php if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
                            <input type="hidden" name="from_profile" value="1"/>
                        <?php } ?>


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


                            <?php $role = $_SESSION['role_id_fk']; ?>

                            <div class="col-md-12 no-padding">
                            <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4" >
             <label class="label "> رقم الطلب </label>
                <input type="text" readonly=""   name="t_rkm" id="t_rkm" 
                       value="<?=$rkm?>" data-validation="required"
                       onkeypress="validate_number(event);"
                       class="form-control "
                       onkeypress="validate_number(event);"
                       data-validation-has-keyup-event="true">
            </div>
            
                <div class="col-md-2  padding-4">
                        <label class="label ">تاريخ  الطلب</label>
                        <input type="date"   name="t_rkm_date_m"  id="t_rkm_date_m" value="<?= $t_rkm_date_m;?>"
                               class="form-control  "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
            
<!--
            <div class="form-group col-md-3  col-sm-6 padding-4">
                    <label class="label text-center">
                        <img style="width: 18px;float: right;"
                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                        تاريخ الطلب
                        <img style="width: 18px;float: left;"
                             src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                    </label>

                    <div id="cal-2" style="width: 50%;float: right;">
                        <input id="date-Hijri" name="t_rkm_date_h" class="form-control bottom-input "
                               data-validation="required"
                               type="text" onfocus="showCal2();" value="<?php echo $t_rkm_date_h; ?>"
                              
                               style=" width: 100%;float: right"/>

                    </div>


                    <div id="cal-1" style="width: 50%;float: left;">
                        <input id="date-Miladi" name="t_rkm_date_m" class="form-control bottom-input  "
                               value="<?php echo $t_rkm_date_m; ?>" data-validation="required"
                               type="text" onfocus="showCal1();" style=" width: 100%;float: right"/>

                    </div>
                </div>
                
      -->          
                

                                <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                                    <label class="label ">اسم الموظف</label>
                                    <input name="emp_name" id="emp_name" class="form-control" style="width:86%; float: right;"
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
                                <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
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
                                           }else
                                           {
                                            echo $job_title; 
                                           } 
                                           ?>" readonly>
                                </div>
                                <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                                    <label class="label "> الأدارة </label>
                                    <input style="padding-right: 0px !important;" name="edara_n" id="edara_n" class="form-control"
                                           value="<?php if (!empty($emp_data->administration_name)) {echo $emp_data->administration_name;
                                           } else { echo $edara_n;
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


                                <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
                                    <label class="label ">قيمه السلفه</label>
                                    <input type="text"  name="qemt_solaf" id="qemt_solaf"
                                           value="<?= $qemt_solaf ?>"
                                           class="form-control "
                                           onkeypress="validate_number(event);"
                                           data-validation-has-keyup-event="true">
                                </div>

                                <?php $arr = array(1 => 'دفع نقدا', 2 => 'تقسم مره واحده علي الراتب',3=>' تقسم شهريا علي الراتب'); ?>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label ">طريقه سداد السلفه </label>
                        <select id="sadad_solfa" name="sadad_solfa" onchange="GetType(this.value)"
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            foreach ($arr as $key => $value) {
                                $select = '';
                                if ($sadad_solfa != '') {
                                    if ($key == $sadad_solfa) {
                                        $select = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-1  col-sm-6 col-xs-6  padding-4">


<label class="label ">عدد الاقساط</label>
<input type="text" name="qst_num" id="qst_num" onchange="Getdiv(this.value)"
       value="<?php echo $qst_num; ?>"
       <?php if ($sadad_solfa == 1 && $sadad_solfa == 2){ ?>disabled="disabled" <?php } ?>
       class="form-control "
       data-validation="required" onkeypress="validate_number(event);"
       data-validation-has-keyup-event="true">


                                
</div>



<div class="form-group col-md-2  col-sm-6 col-xs-6  padding-4">


<label class="label "> قيمه القسط</label>
<input type="text" id="quest_val"
   value="<?php if($sadad_solfa==3){echo $qemt_solaf/$qst_num; }?>"
   class="form-control "
   data-validation="required" onkeypress="validate_number(event);"
   data-validation-has-keyup-event="true">


                            
</div>



     
      <div class="form-group col-md-2  col-sm-6 col-xs-6  padding-4">
                        <label class="label ">  تاريخ بداية الخصم</label>
                        <input type="date"   name="khsm_form_date_m"  id="khsm_form_date_m" value="<?= $khsm_form_date_m;?>"
                               class="form-control  " oninput="Getdate(this.value)"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>


<div class="form-group col-md-1  col-sm-6 col-xs-6  padding-4">

<label class="label "> حد السلفة</label>
<input type="text" id="hd_solfa" name="hd_solfa"
       value="<?=$hd_solfa;?>"
       class="form-control "
       data-validation="required" onkeypress="validate_number(event);"
       data-validation-has-keyup-event="true">


                                
</div>

<div class="form-group col-md-2  col-sm-6 col-xs-6  padding-4">


<label class="label ">  عدد مرات السلف السابقة</label>
<input type="text"  id="num_previous_requests" name="num_previous_requests"
       value="<?=$num_previous_requests; ?>"
       class="form-control "
       data-validation="required" onkeypress="validate_number(event);"
       data-validation-has-keyup-event="true">


                                
</div>
<div class="col-md-2  padding-4">
<label class="label ">    تاريخ اخر سلفة</label>
<input type="date"   name="previous_request_date_m"  id="previous_request_date_m" value="<?= $previous_request_date_m;?>"
       class="form-control  "
       data-validation="required"
       data-validation-has-keyup-event="true">
</div>
<!--
<div class="form-group col-md-3  col-sm-6 padding-4">
<label class="label text-center">
    <img style="width: 18px;float: right;"
         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
         تاريخ اخر سلفه
    <img style="width: 18px;float: left;"
         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
</label>
<div id="cal-6" style="width: 50%;float: right;">
    <input id="date-Hijri2" name="previous_request_date_h" class="form-control bottom-input "
           data-validation="required"
           type="text" onfocus="showCal6();" value="<?php echo $previous_request_date_h; ?>"
           style=" width: 100%;float: right"/>

</div>
<div id="cal-5" style="width: 50%;float: left;">
    <input id="date-Miladi2" name="previous_request_date_m" class="form-control bottom-input  "
           value="<?php echo $previous_request_date_m; ?>"
           type="text" onfocus="showCal5();" style=" width: 100%;float: right"/>

</div>
</div>
-->
                                   
<div class="form-group col-md-2  col-sm-6 col-xs-6  padding-4">
                        <label class="label ">  تاريخ نهايه الخصم</label>
                        <input type="date"   name="khsm_to_date_m"  id="khsm_to_date_m" value="<?= $khsm_to_date_m;?>"
                               class="form-control  "
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>                      

    <div class="form-group col-md-5  col-sm-6 col-xs-6  padding-4">


<label class="label "> سبب السلفة </label>
<input type="text"  id="solaf_reason" name="solaf_reason"
       value="<?=$solaf_reason; ?>"
       class="form-control "
     
       data-validation-has-keyup-event="true">


                                
</div>

                                




                                


                               


                                 

 
                            </div>
                            <div class="col-xs-12 text-center" style="margin-top: 15px">
                                <input type="hidden" name="add" value="add">
                                <button type="submit" 
                                        class="btn btn-labeled btn-success " id="reg" name="add" value="حفظ"
                                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>

                             <!--   <button type="button" class="btn btn-sm btn-info" href="#modal_details"  data-toggle="modal"  onclick="get_details()"><span class="fa fa-list">
                                </span> ضوابط الدعم</button>
                  
                                <button type="button" class="btn btn-sm btn-warning" href="#modal_details_dbt"  data-toggle="modal"  onclick="get_details_dbt()"><span class="fa fa-list">
                                </span> ضبط الاستحقاق</button>

                                <button type="button" class="btn btn-sm btn-danger" href="#modal_details_doc"  data-toggle="modal"  onclick="get_details_doc()"><span class="fa fa-list">
                                </span> المستندات المطلوب</button>
                                <button type="button" class="btn btn-sm btn-scuss" href="#modal_details_exp"  data-toggle="modal"  onclick="get_details_exp()"><span class="fa fa-list">
                                </span>  ألية إسترداد القرض / السلف</button> -->
                               
                            </div>

                        </form>
                </div>

              
                <div class="col-sm-2 padding-4">
          <div id="sidebar_emp"></div>



                </div>
                
           
       

    </div>

 
 
 
 </div>

</div>

</div>




    <?php
    
    // echo '<pre>';
    // print_r($items);
    if (isset($items) && !empty($items)) {
        
        ?>
        <div class="col-sm-12 no-padding ">

            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $title; ?></h3>
                </div>
                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr class="greentd">
                        <th style="width: 25px;">م</th>
                        <th style="width: 60px;">رقم الطلب</th>
                        <th  style="width: 85px;">تاريخ الطلب</th>
                         <th style="width: 200px;">إسم الموظف</th>
                        <th style="width: 75px;">قيمة السلفة</th>
                        <th style="width: 140px;">طريقة سداد السلفة</th>
                        <th style="width: 75px;">عدد الاقساط</th>
                        <th style="width: 75px;">قيمة القسط</th>
                        <th style="width: 75px;"> بداية الخصم</th>
                        <th> الاجراء</th>
                        <th> حالة الطلب </th>

                    </tr>

                    </thead>
                    <tbody>

                    <?php
                      
                    if (isset($items) && !empty($items)) {
                        $x = 1;

                        foreach ($items as $row) {

                            if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                                $link_update = 'edit_solaf(' . $row->id . ')';
                                $link_delete = 1;
                            } else {
                                $link_update = 'window.location="' . base_url() . 'human_resources/employee_forms/solaf/Solaf/edit_solaf/' . $row->id . '";';
                                $link_delete = 0;
                            }


                            if($row->suspend == 0){
                                $halet_eltalab = 'جاري ';
                                $halet_eltalab_class = 'warning';     
                                }elseif($row->suspend == 1){
                                 $halet_eltalab = 'تم قبول الطلب ';
                                $halet_eltalab_class = 'success';    
                                }elseif($row->suspend == 2){
                                    $halet_eltalab = 'تم رفض الطلب '; 
                                    $halet_eltalab_class = 'danger';     
                                }elseif($row->suspend == 4){
                                   $halet_eltalab = 'تم اعتماد الطلب بالموافقة ';
                                   $halet_eltalab_class = 'success';       
                                }elseif($row->suspend == 5){
                                   $halet_eltalab = 'تم اعتماد الطلب بالرفض '; 
                                   $halet_eltalab_class = 'danger';      
                                }else{
                                     $halet_eltalab = 'غير محدد '; 
                                   $halet_eltalab_class = 'danger';  
                                }
                            // echo '<pre>'; print_r($row->t_rkm);
                            ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                 <td><?php echo $row->t_rkm; ?></td> 
                                 <td><?php echo $row->t_rkm_date_m; ?></td> 
                                 <td><?php echo $row->emp_name; ?></td> 
                                <td><?php echo $row->qemt_solaf; ?></td>
                                <td><?php if($row->sadad_solfa==1){echo 'دفع نقدا';}elseif($row->sadad_solfa==2){echo ' تقسم مره واحده علي الراتب';}
                    elseif($row->sadad_solfa==3){echo 'تقسم شهريا علي الراتب';}
                    ?></td>
                    <td><?php echo $row->qst_num; ?></td>
                                <td><?php if($row->qst_num>0){echo round( ($row->qemt_solaf/$row->qst_num)*100)/100; }?></td>
                                
                                <td><?php echo $row->khsm_form_date_m; ?></td>
                       
                                <td>
                                  
                                <a href="#modal_details"  data-toggle="modal"  onclick="get_solfa_details(<?php echo $row->t_rkm;?>)"> <i class="btn fa fa-list"></i></a>
<!-- 
<button
                    type="button" onclick="print_order(<?php echo $row->t_rkm;?>)"
                    class="btn  ">
                    <span ><i class="fa fa-print"> </i></span>
                </button> -->
                <a onclick="print_order(<?php echo $row->t_rkm;?>)" title="طباعه"><i
                                            class="fa fa-print"></i></a>
                                            <?php
if($row->suspend == 0){ ?>

        <a onclick='swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: true
        },
        function(){
            <?= $link_update ?>
        });'>
    <i class="fa fa-pencil"> </i></a>


                                                             <a onclick=' swal({
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
        setTimeout(function(){window.location="<?= base_url() . 'human_resources/employee_forms/solaf/Solaf/delete_solfa/' . $row->id. '/' . $link_delete; ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>
<!-- new -->
<?php }else{ ?>
       <span class="label label-danger">
                               عذرا لا يمكنك التعديل والحذف
                                 </span>   

 <?php } ?>
                                    


                                </td>
                               
                                <td>
                                <span class="label label-<?php echo $halet_eltalab_class ?>" style="min-width: 140px;">
                                <?php echo $halet_eltalab;  ?>
                                 </span>
                                </td>

                            </tr>
                            <?php
                            $x++;
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>

    <?php } ?>
    <!--------------------------------------------------------modal------------------------------------>


    


    
<?php } ?>
<!--------------------------------------------------------------->
<div class="modal fade" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل السلفه</h4>
            </div>
            <div class="modal-body" id="details"> </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
               

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                'copy',
                'csv',
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
            colReorder: true
        });
    </script>
<?php } ?>
<div class="modal fade" id="modal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> ضوابط الدعم </h4>
            </div>
            <div class="modal-body" id="details"> </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
               

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_details_dbt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">ضوابط الإستحقاق </h4>
            </div>
            <div class="modal-body" id="details_dbt"> </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
               

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_details_doc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">المستندات المطلوبة </h4>
            </div>
            <div class="modal-body" id="details_doc"> </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
               

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_details_exp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">ألية إسترداد القرض / السلف </h4>
            </div>
            <div class="modal-body" id="details_exp"> </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
               

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>

    function GetDiv_emps(div) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="info"><th style="width: 50px;">#</th><th style="width: 50px;"> أسم الموظف  </th>' +
            '<th style="width: 170px;" >الأدارة   </th>' +
            '<th style="width: 170px;" >القسم</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/solaf/Solaf/getConnection_emp/',

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

    //8-6-om
        function Get_emp_Name(obj) {

        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var emp_code = obj.dataset.emp_code;
        var edara_id = obj.dataset.edara_id;
        var edara_n = obj.dataset.edara_n;
        var job_title = obj.dataset.job_title;
        var qsm_id = obj.dataset.qsm_id;
        var qsm_n = obj.dataset.qsm_n;
   
       

        document.getElementById('emp_name').value = name;
        document.getElementById('emp_id_fk').value = obj.value;
        document.getElementById('emp_code').value = emp_code;
    
     
        $('#emp_id_fk').val(obj.value);

       // get_emp_sidebar();
        document.getElementById('edara_n').value = edara_n;
        document.getElementById('edara_id_fk').value = edara_id;
        document.getElementById('job_title').value = job_title;
        document.getElementById('qsm_n').value = qsm_n;
        document.getElementById('qsm_id_fk').value = qsm_id;
      
        

        $("#myModal_emps .close").click();

    }
  

</script>



























<!--
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>

    var loop2 = 0;
    var cal3 = new Calendar(),
        cal4 = new Calendar(true, 0, true, true),
        date3 = document.getElementById('date-Miladi1'),
        date4 = document.getElementById('date-Hijri1'),
        cal3Mode = cal3.isHijriMode(),
        cal4Mode = cal4.isHijriMode();


    date3.setAttribute("value", cal3.getDate().getDateString());
    date4.setAttribute("value", cal4.getDate().getDateString());

    document.getElementById('cal-3').appendChild(cal3.getElement());
    document.getElementById('cal-4').appendChild(cal4.getElement());


    cal3.show();
    cal4.show();
    setDateFields2();


    cal3.callback = function () {
        if (cal3Mode !== cal1.isHijriMode()) {
            cal4.disableCallback(true);
            cal4.changeDateMode();
            cal4.disableCallback(false);
            cal3Mode = cal3.isHijriMode();
            cal4Mode = cal4.isHijriMode();
        } else

            cal4.setTime(cal3.getTime());
        setDateFields2();
    };

    cal4.callback = function () {
        if (cal4Mode !== cal4.isHijriMode()) {
            cal3.disableCallback(true);
            cal3.changeDateMode();
            cal3.disableCallback(false);
            cal3Mode = cal3.isHijriMode();
            cal4Mode = cal4.isHijriMode();
        } else

            cal3.setTime(cal4.getTime());
        setDateFields2();
    };


    cal3.onHide = function () {
        cal3.show(); // prevent the widget from being closed
    };

    cal4.onHide = function () {
        cal4.show(); // prevent the widget from being closed
    };

    function setDateFields2() {
        if (loop2 === 0) {
            <?php if (isset($khsm_form_date_m) && !empty($khsm_form_date_m)) {  ?>
            loop2++;
            date3.value = '<?=$khsm_form_date_m?>';
            date4.value = '<?=$khsm_form_date_h?>';
            <?php }else{ ?>
            date3.value = cal3.getDate().getDateString();
            date4.value = cal4.getDate().getDateString();
            <?php  } ?>
        } else {
            date3.value = cal3.getDate().getDateString();
            date4.value = cal4.getDate().getDateString();
        }
        date3.setAttribute("value", cal3.getDate().getDateString());
        date4.setAttribute("value", cal4.getDate().getDateString());
    }


    function showCal3() {
        if (cal3.isHidden())
            cal3.show();
        else
            cal3.hide();
    }

    function showCal4() {
        if (cal4.isHidden())
            cal4.show();
        else
            cal4.hide();
    }


</script>

<script>

    var loop3 = 0;
    var cal5 = new Calendar(),
        cal6 = new Calendar(true, 0, true, true),
        date5 = document.getElementById('date-Miladi2'),
        date6 = document.getElementById('date-Hijri2'),
        cal5Mode = cal5.isHijriMode(),
        cal6Mode = cal6.isHijriMode();


    date5.setAttribute("value", cal5.getDate().getDateString());
    date6.setAttribute("value", cal6.getDate().getDateString());

    document.getElementById('cal-5').appendChild(cal5.getElement());
    document.getElementById('cal-6').appendChild(cal6.getElement());


    cal5.show();
    cal6.show();
    setDateFields3();


    cal5.callback = function () {
        if (cal5Mode !== cal5.isHijriMode()) {
            cal6.disableCallback(true);
            cal6.changeDateMode();
            cal6.disableCallback(false);
            cal5Mode = cal5.isHijriMode();
            cal6Mode = cal6.isHijriMode();
        } else

            cal6.setTime(cal5.getTime());
        setDateFields3();
    };

    cal6.callback = function () {
        if (cal6Mode !== cal6.isHijriMode()) {
            cal5.disableCallback(true);
            cal5.changeDateMode();
            cal5.disableCallback(false);
            cal5Mode = cal5.isHijriMode();
            cal6Mode = cal6.isHijriMode();
        } else

            cal5.setTime(cal6.getTime());
        setDateFields3();
    };


    cal5.onHide = function () {
        cal5.show(); // prevent the widget from being closed
    };

    cal6.onHide = function () {
        cal6.show(); // prevent the widget from being closed
    };

    function setDateFields3() {
        if (loop3 === 0) {
            <?php if (isset($previous_request_date_m) && !empty($previous_request_date_m)) {  ?>
            loop2++;
            date5.value = '<?=$previous_request_date_m?>';
            date6.value = '<?=$previous_request_date_h?>';

            <?php }else{ ?>
            date5.value = cal5.getDate().getDateString();
            date6.value = cal6.getDate().getDateString();
            <?php  } ?>
        } else {
            date5.value = cal5.getDate().getDateString();
            date6.value = cal6.getDate().getDateString();
        }
        date5.setAttribute("value", cal5.getDate().getDateString());
        date6.setAttribute("value", cal6.getDate().getDateString());
    }


    function showCal5() {
        if (cal5.isHidden())
            cal5.show();
        else
            cal5.hide();
    }

    function showCal6() {
        if (cal6.isHidden())
            cal6.show();
        else
            cal6.hide();
    }


</script>
<script>

var loop1 = 0;
var cal1 = new Calendar(),
    cal2 = new Calendar(true, 0, true, true),
    date1 = document.getElementById('date-Miladi'),
    date2 = document.getElementById('date-Hijri'),
    cal1Mode = cal1.isHijriMode(),
    cal2Mode = cal2.isHijriMode();


date1.setAttribute("value", cal1.getDate().getDateString());
date2.setAttribute("value", cal2.getDate().getDateString());

document.getElementById('cal-1').appendChild(cal1.getElement());
document.getElementById('cal-2').appendChild(cal2.getElement());


cal1.show();
cal2.show();
setDateFields1();


cal1.callback = function () {
    if (cal1Mode !== cal1.isHijriMode()) {
        cal2.disableCallback(true);
        cal2.changeDateMode();
        cal2.disableCallback(false);
        cal1Mode = cal1.isHijriMode();
        cal2Mode = cal2.isHijriMode();
    } else

        cal2.setTime(cal1.getTime());
    setDateFields1();
};

cal2.callback = function () {
    if (cal2Mode !== cal2.isHijriMode()) {
        cal1.disableCallback(true);
        cal1.changeDateMode();
        cal1.disableCallback(false);
        cal1Mode = cal1.isHijriMode();
        cal2Mode = cal2.isHijriMode();
    } else

        cal1.setTime(cal2.getTime());
    setDateFields1();
};


cal1.onHide = function () {
    cal1.show(); // prevent the widget from being closed
};

cal2.onHide = function () {
    cal2.show(); // prevent the widget from being closed
};

function setDateFields1() {
    if (loop1 === 0) {
        <?php if (isset($t_rkm_date_m) && !empty($t_rkm_date_m)) {  ?>
        loop1++;
        date1.value = '<?=$t_rkm_date_m?>';
        date2.value = '<?=$t_rkm_date_h?>';

        <?php }else{ ?>
        date1.value = cal1.getDate().getDateString();
        date2.value = cal2.getDate().getDateString();
      
        <?php  } ?>
    } else {
        date1.value = cal1.getDate().getDateString();
        date2.value = cal2.getDate().getDateString();
        
    }
    date1.setAttribute("value", cal1.getDate().getDateString());
    date2.setAttribute("value", cal2.getDate().getDateString());
}


function showCal1() {
    if (cal1.isHidden())
        cal1.show();
    else
        cal1.hide();
}

function showCal2() {
    if (cal2.isHidden())
        cal2.show();
    else
        cal2.hide();
}


</script>-->
<script>
    function get_solfa_details(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_solaf_details",
            data:{rkm:valu},
            success:function(d){


$('#details').html(d);


            }

        });
    }
</script>
<script>
    function print_order(row_id) {


        var request = $.ajax({
// print_resrv -- print_contract
            url: "<?=base_url().'human_resources/employee_forms/solaf/Solaf/get_solfa_print'?>",
            type: "POST",
            data: {rkm: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
             WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>
<script>
    function GetType(valu) {
        console.log(valu);
        if (valu == 1) {
         
            document.getElementById("qst_num").value = 1;
         //   document.getElementById("qst_num").setAttribute("disabled", "disabled");
            document.getElementById("quest_val").value = document.getElementById("qemt_solaf").value;
           // document.getElementById("quest_val").setAttribute("disabled", "disabled");
            var today = new Date();   
            Getdate(today);
        }
       else if (valu == 2) {
         
 
        document.getElementById("qst_num").value = 1;
       // document.getElementById("qst_num").setAttribute("disabled", "disabled");
        document.getElementById("quest_val").value = document.getElementById("qemt_solaf").value;
           // document.getElementById("quest_val").setAttribute("disabled", "disabled");
            var today = new Date();   
            Getdate(today);
        }
        
        
         else {
            document.getElementById("qst_num").value = '';
          

           // document.getElementById("qst_num").removeAttribute("disabled", "disabled");
         
            
        }


    }

</script>
<script>
    function Getdiv(valu) {
        console.log(valu);
      
            console.log(document.getElementById("qemt_solaf").value);
            console.log(document.getElementById("qst_num").value);
            //document.getElementById("quest_val").removeAttribute("disabled", "disabled");
            document.getElementById("quest_val").value = Math.round((document.getElementById("qemt_solaf").value/document.getElementById("qst_num").value)*100)/100;
          //  document.getElementById("quest_val").setAttribute("disabled", "disabled");
            var today = new Date();   
            Getdate(today);
       
       

    }

</script>
<script>
    function Getdate(valu) {
  


var y=document.getElementById("qst_num").value;
console.log(y);
y=parseInt(y);
var d = new Date(valu);
console.log(d.toLocaleDateString());
d.setMonth(d.getMonth() + y);
console.log(d.toLocaleDateString());
// var str = $.datepicker.formatDate('yy-mm-dd', d.toLocaleDateString());

var date = d.toLocaleDateString();
function formatDate(date) {
     var d = new Date(date),
         month = '' + (d.getMonth() + 1),
         day = '' + d.getDate(),
         year = d.getFullYear();

     if (month.length < 2) month = '0' + month;
     if (day.length < 2) day = '0' + day;

     return [year, month, day].join('-');
 }
  date=formatDate(date);


document.getElementById("khsm_to_date_m").value =date;
//document.getElementById("khsm_to_date_m").setAttribute("disabled", "disabled");


    }

</script>
<script>
    function get_details()
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_details",
           
            success:function(d){


$('#details').html(d);


            }

        });
    }
</script>
<script>
    function get_details_dbt()
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_details_dbt",
           
            success:function(d){


$('#details_dbt').html(d);


            }

        });
    }
</script>
<script>
    function get_details_doc()
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_details_doc",
           
            success:function(d){


$('#details_doc').html(d);


            }

        });
    }
</script>
<script>
    function get_details_exp()
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/get_details_exp",
           
            success:function(d){


$('#details_exp').html(d);


            }

        });
    }
</script>