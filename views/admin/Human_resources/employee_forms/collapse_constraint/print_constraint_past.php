
    <title>إخلاء طرف</title>
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">




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
            margin-bottom: 0;
            font-size: 17px;
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
            margin: 20px 10px 0 10px;
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

    </style>


    <div id="printdiv"  >

        <div class="main-header">
            <div class="col-xs-6">
                <img src="<?php echo base_url()?>asisst/admin_asset/print/right-header.jpg" id="rightlogo">
            </div>
            <div class="col-xs-6">
<!--                <img src="--><?php //echo base_url()?><!--asisst/admin_asset/img/left-header.jpg" style="float: left;">-->
                <h6>الرقم :<?=$this->uri->segment(5);?></h6>
                <h6>التاريخ : <?=date("Y-m-d");?></h6>
                <h6>المرفقات : ...............</h6>
                <h6>الموضوع : طي قيد </h6>
            </div>
        </div>





        <section class="main-body">
            <div class="print_forma  col-xs-12 ">

                <div class="">
                    <h5 class="text-center">قرار طي قيد &nbsp</h5><br><br>
                    <h6> &nbsp  فإن المدير العام للجمعية الخيرية لرعاية الأيتام ببريدة-أبناء و بناءاً  على صلاحياته، وبناءاً  على ما تقتضيه مصلحة العمل  فإنه تقرر ما يلي:&nbsp</h6><br>
                    <h6>&nbsp  طي قيد</h6><br>
                    <div class="  col-xs-12 ">
                        <table class="table table-bordered" style="table-layout: fixed;">

                            <tbody>
                            <tr class=" bordered-bottom">
                                <th width="20%">السيد</th>

                                 <td><div id="employee_name" ><?php if(isset($constraint->employee_info)) { echo $constraint->employee_info->employee; } ?></div> <input type="hidden" id="emp_id_fkk" name="emp_id" value="<?php if(isset($constraint->emp_id)) { echo $constraint->emp_id; } ?>">   <input type="hidden" id="direct_manger_id_fk" name="direct_manger_id_fk"  value="<?php if(isset($constraint->direct_manger_id_fk)) { echo $constraint->direct_manger_id_fk; } ?>"></td>
                            </tr>
                            <tr class="open_green">
                                <th>من القسم</th>
                                <td><div id="department_name" > <?php if(isset($constraint->employee_info)) { echo $constraint->employee_info->depart_name; } ?>   </div> <input type="hidden" id="qsm_id_fk" name="qsm_id_fk" value="<?php if(isset($constraint->qsm_id_fk)) { echo $constraint->qsm_id_fk; } ?>"></td>

                            </tr>
                            <tr>
                                <th width="20%">التابع لإدارة </th>
                                <td><div id="administration_name" > <?php if(isset($constraint->employee_info)) { echo $constraint->employee_info->admin_name; } ?></div>  <input type="hidden" id="edara_id_fk" name="edara_id_fk" <?php if(isset($constraint->edara_id_fk)) { echo $constraint->edara_id_fk; } ?>></td>
                            </tr>
                            </tbody>
                        </table><br><br>
                    </div>
                    <div class="col-xs-12 form-group no-padding">
                        <div class="col-xs-3">
                            <h6>- اعتبارا من تاريخ </h6>
                        </div>
                        <div class="col-xs-4">
                           <?php if(isset($constraint->from_date_ar)) { echo $constraint->from_date_ar; } ?>
                        </div>
                    </div>
                    <div class="col-xs-12 form-group no-padding">
                        <div class="col-xs-4">
                            <h6>- صرف جميع مستحقاته حتى تاريخ     </h6>
                        </div>
                        <div class="col-xs-4">
                            <?php if(isset($constraint->to_date_ar)) { echo $constraint->to_date_ar; } ?>
                        </div>
                    </div>

                    <div class="col-xs-12 form-group no-padding">
                        <h6>&nbsp - على جميع الإدارات العمل بموجبه وإنفاذه.     </h6>
                    </div>

                    <br>
                    <h5 class="text-center">والله ولي التوفيق</h5><br>


                    <div class="col-xs-4 col-xs-offset-8">
                        <h6>مدير عام الجمعية</h6>
                        <h5>سلطان بن محمد الجاسر</h5>
                    </div>






                </div>

            </div>
        </section>


    </div>







    <?php  ?>
    <script>
        //Get the HTML of div
        var divElements = document.getElementById("printdiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body><div id='printdiv'>" +
            divElements + "</div></body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        // document.body.innerHTML = oldPage;
        setTimeout(function () {location.replace("<?php echo base_url('human_resources/employee_forms/CollapseConstraint/addConstraint')?>");}, 1500);
    </script>







