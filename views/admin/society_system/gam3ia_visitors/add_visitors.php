

<style type="text/css">
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: !block !important;
        font-weight: 500 !important;
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

    .print_forma {
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-!block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-!block;
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
        display: inline-!block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0
    }





    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
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

    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }

    .footer img {
        width: 100%;
        height: 120px;
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

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    /***/

    .btn-close-model,
    btn-close-model:hover,
    btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }

    .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu {
        top: 100% !important;
        bottom: auto !important;
        margin-bottom: 1px !important;
    }

    /**********************************************************/

    @media (min-width: 992px){
        .col_md_10{
            width: 10%;
            float:right;
        }
        .col_md_15{
            width: 15%;
            float:right;
        }
        .col_md_20{
            width: 20%;
            float:right;
        }
        .col_md_25{
            width: 25%;
            float:right;
        }
        .col_md_30{
            width: 30%;
            float:right;
        }
        .col_md_35{
            width: 35%;
            float:right;
        }
        .col_md_40{
            width: 40%;
            float:right;
        }
        .col_md_45{
            width: 45%;
            float:right;
        }
        .col_md_50{
            width: 50%;
            float:right;
        }
        .col_md_55{
            width: 55%;
            float:right;
        }


        .col_md_60{
            width: 60%;
            float:right;
        }

        .col_md_70{
            width: 70%;
            float:right;
        }

        .col_md_75{
            width: 75%;
            float:right;
        }

        .col_md_80{
            width: 80%;
            float:right;
        }

        .col_md_85{
            width: 85%;
            float:right;
        }
        .col_md_90{
            width: 90%;
            float:right;
        }
        .col_md_95{
            width: 95%;
            float:right;
        }
        .col_md_100{
            width: 100%;
            float:right;
        }

    }

    .label_title_2 {
        width: 100%;
        color: white;
        background-color: #428bca;
        border: 2px solid #428bca;
        height: 34px;
        margin: 0;
        line-height: 34px;
        padding-right: 6px;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .input_style_2 {
        border-radius: 0px;
        border-right: transparent;
        width: 100%;
    }

</style>

<?php

if(isset($result)&&!empty($result))
{
    $name = $result->name;
    $visit_date =  date('Y/m/d',$result->visit_date);
    $visit_time_start = $result->visit_time_start;
    $mob = $result->mob;
    $fe2a =$result->fe2a ;
    $purpose = $result->purpose;
    $twasol = $result->twasol;
    $elentb =$result->elentb ;
    $degree_name =$result->degree_name ;
    $out['form'] = 'society_system/Gam3iaVisitors/addGam3iaVisitors/'.$result->id;


}else{
    $name = "";
    $visit_date = date('Y/m/d');
    $visit_time_start = date("h:i:sa");
    $mob = '';
    $fe2a = '';
    $purpose = '';
    $twasol = '';
    $elentb = '';
    $degree_name = '';
 
    $out['form'] = 'society_system/Gam3iaVisitors/addGam3iaVisitors';
}

    $f2at = array(
        1=>'الاسر',
        2=>'الكفلاء والمتبرعين',
        3=>'مؤسسات مانحة',
        4=>'المتطوعين',
        5=>'التوظيف',
        6=>'اخري'
    );


$elentb3 = array(
    1=>'ممتاز',
    2=>'جيد',
    3=>'مقبول',
    4=>'سيئة'
);
$yes_no = array(
        1=>'نعم',
        2=>'لا'
    );
?>

<div class="col-sm-12 no-padding " >
    <div class="col-sm-12 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>
                <div class="col-md-12">
                <div class="col_md_15 col-sm-6 padding-4">
                    <div class="col-md-6 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">التاريخ</h6>
                    </div>
                    <div class="col-md-6 col-sm-6  no-padding">

                        <input type="text" name="visit_date" id="visit_date" readonly="readonly"
                               value="<?php echo $visit_date;?>"
                               class="form-control input_style_2"
                               data-validation-has-keyup-event="true">
                    </div>
                </div>


                <div class="col_md_20 col-sm-6 padding-4">
                    <div class="col-md-6 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">وقت وصول الزائر</h6>
                    </div>
                    <div class="col-md-6 col-sm-6  no-padding">
                        <input type="text" name="visit_time_start" id="visit_time_start" readonly="readonly"
                               value="<?= $visit_time_start?>" data-validation="required"
                               class="form-control input_style_2"
                               data-validation-has-keyup-event="true">
                    </div>
                </div>


                <div class="col_md_25 col-sm-6 padding-4">
                    <div class="col-md-3 col-sm-6  no-padding ">
                        <h6 class=" label_title_2 kafel">إسم الزائر </h6>
                    </div>
                    <div class="col-md-9 col-sm-6  no-padding">
                        <input type="text" name="name" id="name" value="<?php echo $name;?>"
                               class="form-control input_style_2"
                               data-validation="!!required"
                               data-validation-has-keyup-event="true">
                    </div>
                </div>
                
                
                    <div class="col_md_20 col-sm-6 padding-4">
                    <div class="col-md-4 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">رقم الجوال</h6>
                    </div>
                    <div class="col-md-8 col-sm-6  no-padding">

                        <input type="text" name="mob" id="mob"
                               value="<?php echo $mob;?>"
                               class="form-control input_style_2"
                               data-validation-has-keyup-event="true">
                    </div>
                </div>
                
                
                
                    <div class="col_md_20 col-sm-6 padding-4">
                    <div class="col-md-3 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">الفئة</h6>
                    </div>
                    <div class="col-md-9 col-sm-6  no-padding">
                        <select id="fe2a" data-validation="required" class="form-control input_style_2"
                                name="fe2a" >
                            <option value="">أختر</option>
                            <?php
                                foreach($f2at as $key=>$value){
                                    ?>
                                    <option value="<?php echo $key;?>"
                                        <?php
                                        if(!empty($fe2a)){
                                            if($key ==$fe2a){
                                                echo 'selected'; }}  ?>> <?php echo $value;?></option >
                                    <?php } ?>
                        </select>
                    </div>
                </div>
                
                
                
                </div>
                <div class="col-md-12">
            


            

                <div class="col_md_40 col-sm-6 padding-4">
                    <div class="col-md-3 col-sm-6  no-padding ">
                        <h6 class=" label_title_2 kafel">الغرض من الزيارة </h6>
                    </div>
                    <div class="col-md-9 col-sm-6  no-padding">
                        <input type="text" name="purpose" id="purpose" value="<?php echo $purpose;?>"
                               class="form-control input_style_2"
                               data-validation="!!required"
                               data-validation-has-keyup-event="true">
                    </div>
                </div>
                
                   <div class="col_md_20 col-sm-6 padding-4">
                    <div class="col-md-7 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">هل يرغب بالتواصل</h6>
                    </div>
                    <div class="col-md-5 col-sm-6  no-padding">
                        <select id="twasol" data-validation="required" class="form-control input_style_2"
                                name="twasol" >
                        <option value="">أختر</option>
                        <?php
                        foreach($yes_no as $key=>$value){
                            ?>
                            <option value="<?php echo $key;?>"
                                <?php
                                if(!empty($twasol)){
                                    if($key ==$twasol){
                                        echo 'selected'; }}  ?>> <?php echo $value;?></option >
                        <?php } ?>
                        </select>
                    </div>
                </div>
                
                  <div class="col_md_20 col-sm-6 padding-4">
                    <div class="col-md-7 col-sm-6  no-padding ">
                        <h6 class=" label_title_2">إنطباع الزائر عن الجمعية</h6>
                    </div>
                    <div class="col-md-5 col-sm-6  no-padding">
                        <select id="elentb" data-validation="required" class="form-control input_style_2"
                                name="elentb" >
                            <option value="">أختر</option>
                            <?php
                            foreach($elentb3 as $key=>$value){
                                ?>
                                <option value="<?php echo $key;?>"
                                    <?php
                                    if(!empty($elentb)){
                                        if($key ==$twasol){
                                            echo 'selected'; }}  ?>> <?php echo $value;?></option >
                            <?php } ?>
                        </select>
                    </div>
                </div> 
                
                
                </div>

    
                <?php if($_SESSION['role_id_fk']==3){?>
                    <div class="col-md-12" style="display: none;">
                        <div class="col_md_50 col-sm-6 padding-4">
                            <div class="col-md-6 col-sm-6  no-padding ">
                                <h6 class=" label_title_2">اسم الموظف</h6>
                            </div>
                            <div class="col-md-6 col-sm-6  no-padding">

                                <input disabled type="text" name="degree_name" id="degree_name"
                                       value="<?php if(isset($record[0]->employee)){ echo $record[0]->employee ; } ?>"
                                       class="form-control input_style_2"
                                       data-validation-has-keyup-event="true">
                            </div>
                        </div>


                        <div class="col_md_50 col-sm-8 padding-4">
                            <div class="col-md-6 col-sm-6  no-padding ">
                                <h6 class=" label_title_2">الادارة</h6>
                            </div>
                            <div class="col-md-6 col-sm-6  no-padding">
                                <input  disabled type="text" name="edara_id" id="edara_id"
                                        value="<?php if(isset($record[0]->admin_name)){ echo $record[0]->admin_name ; } ?>" data-validation="required"
                                        class="form-control input_style_2"
                                        data-validation-has-keyup-event="true">
                            </div>
                        </div>


                        <div class="col_md_25 col-sm-8 padding-4">
                            <div class="col-md-6 col-sm-6  no-padding ">
                                <h6 class=" label_title_2 kafel">القسم </h6>
                            </div>
                            <div class="col-md-6 col-sm-6  no-padding">
                                <input  disabled type="text" name="qsm" id="qsm" value="<?php if(isset($record[0]->depart_name)){ echo $record[0]->depart_name ; } ?>"
                                        class="form-control input_style_2"
                                        data-validation="!!required"
                                        data-validation-has-keyup-event="true">
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if($_SESSION['role_id_fk']==1){?>
                <div class="col-md-12" style="display: none;">
                    <div class="col_md_6 col-sm-6 padding-4">
                        <div class="col-md-3 col-sm-6  no-padding ">
                            <h6 class=" label_title_2">اسم الموظف</h6>
                        </div>
                        <div class="col-md-9 col-sm-6  no-padding">

                            <input disabled type="text" name="degree_name" id="degree_name"
                                   value="<?php echo $_SESSION['user_name'];?>"
                                   class="form-control input_style_2"
                                   data-validation-has-keyup-event="true">
                        </div>
                    </div>

                    <div class="col_md_6 col-sm-6 padding-4">
                        <div class="col-md-3 col-sm-6  no-padding ">
                            <h6 class=" label_title_2">الوظيفه </h6>
                        </div>
                        <div class="col-md-9 col-sm-6  no-padding">

                            <input disabled type="text" name="degree_name" id="degree_name"
                                   value="مدير علي النظام"
                                   class="form-control input_style_2"
                                   data-validation-has-keyup-event="true">
                        </div>
                    </div>
                </div>
                <?php } ?>
    
                <div class="form-group col-md-5 col-sm-6 padding-4"></div>

                <div class="form-group col-md-4 col-sm-6 padding-4">
                    <br /><br />
                    <button type="submit" id="save" name="add" value="add"
                            class="btn btn-success">
                        <span><i class="fa fa-floppy-o"></i></span> حفظ
                    </button>
                </div>
                <div class="form-group col-md-3 col-sm-6 padding-4"></div>
                <?php echo form_close();?>

                <?php

                if(isset($records)&&!empty($records)){

                    ?>

                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="visible-md visible-lg">
                            <th>م</th>
                            <th>التاريخ</th>
                            <th>وقت البدء</th>
                            <th>وقت النهايه</th>

                            <th>الاسم </th>
                            <th>رقم الجوال </th>
                            <th>الفئه </th>
                            <th>الغرض من الزياره </th>
                            <th>يرغب التواصل </th>

                            <th>الاجراء</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $x=1;
                        foreach($records as $row){
                            if($row->twasol==1)
                            {
                                $color="green";
                            }else{
                                $color="red";
                            }
                            ?>
                            <tr>
                                <td><?php echo $x;?></td>
                                <td><?php echo date("Y-m-d",$row->visit_date);?></td>
                                <td><?php echo $row->visit_time_start ;?></td>
                                <td><?php echo $row->visit_time_end ;?></td>

                                <td style="padding: 0;"><?php if(!empty($row->name)) { echo $row->name ; } else {?> <h3 style="background-color: red; width: 100%; margin: 0;
padding: 3px;"> لايكن</h3> <?php } ?></td>
                                <td><?php echo $row->mob ;?> fe2a</td>
                                <td><?php echo $f2at[$row->fe2a];?></td>
                                <td><?php echo $row->purpose ;?></td>
                                <td style="background-color: <?php echo $color;?>"> <?php echo $yes_no[$row->twasol];?> </td>


                                <td>



                                    <a href="<?php echo base_url();?>society_system/Gam3iaVisitors/addGam3iaVisitors/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                    <a  href="<?php echo base_url();?>society_system/Gam3iaVisitors/deleteGam3iaVisitors/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>


                                </td>


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

            </div>
        </div>
    </div>
</div>





