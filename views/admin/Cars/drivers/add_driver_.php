<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">


    /*
        .top-label {
            color: white;
            background-color: #009688;
            border: 2px solid #009688;
            border-radius: 0;
            margin-bottom: 0;
            width: 100%;
            display: block;
            padding: 8px 4px;
        }
        .bottom-input{
            width: 100%;
            border-radius: 0;
        }
        */
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





    .print_forma {
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

</style>
<?php
if(isset($driver)&&!empty($driver)){
    $emp_id_fk=$driver->emp_id_fk;
    $markz_taklfa_fk=$driver->markz_taklfa_fk;
    $license_num=$driver->license_num;
    $esdar_date=$driver->esdar_date;
    $end_date=$driver->end_date;
    $licence_type_fk=$driver->licence_type_fk;
    $blood_fasila=$driver->blood_fasila;
    $edara_id_fk=$driver->edara_id_fk;

    $action=base_url().'Cars/all_drivers/Driver/edit_driver/'.$driver->id;

}else{
    $edara_id_fk='';
    $emp_id_fk='';
    $markz_taklfa_fk='';
    $license_num='';
    $esdar_date='';
    $end_date='';
    $licence_type_fk='';
    $blood_fasila='';
    $action=base_url().'Cars/all_drivers/Driver';
}
?>


<div class="col-sm-12 no-padding " >
    <div class="col-sm-9" >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable col-xs-12 no-padding">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>

            </div>
<div class="panel-body">
                <form action="<?php echo $action;?>" method="post">
                    <div class="col-md-12 ">
                      <!--  <div class=" form-group col-md-3 padding-4">
                            <label class="label top-label">إسم الجهة </label>
                            <select name="markz_taklfa_fk" id="markz_taklfa_fk"
                                    data-validation="required" onchange=""   class="form-control bottom-input"
                                    aria-required="true">
                                <option value="">اختر</option>
                                <?php if(isset($markz)&&!empty($markz)){
                                    foreach ($markz as $row){?>
                                        <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$markz_taklfa_fk) echo "selected";?>><?php echo $row->title_setting;?></option>
                                <?php } }?>



                            </select>
                        </div>-->
                        <div class=" form-group col-md-3 padding-4">
                            <label class="label top-label"> الإدارة </label>
                            <select name="edara_id_fk" id="edara_id_fk"
                                    data-validation="required" onchange="get_emps()" class="form-control bottom-input"
                                    aria-required="true">
                                <option value="">اختر</option>
                                <?php if(isset($adminstration)&&!empty($adminstration)){
                                    foreach ($adminstration as $row){?>
                                        <option value="<?php echo $row->id ;?>" <?php if($row->id==$edara_id_fk) echo "selected";?>><?php echo $row->name;?></option>
                                    <?php } }?>



                            </select>
                        </div>
                        <div class=" form-group col-md-3 padding-4">
                            <label class="label top-label"> اسم الموظف </label>
                            <select name="emp_id_fk" id="emp_id_fk"
                                    data-validation="required" onchange="get_side_bar($(this).val())"   class="form-control bottom-input"
                                    aria-required="true">
                                <option value="">اختر</option>
                                <?php
                                if(isset($emps)&&!empty($emps)){
                                    foreach ($emps as $row){?>
                                        <option value="<?php echo $row->id;?>" <?php if($row->id==$emp_id_fk) echo "selected";?>><?php echo $row->employee;?> </option>

                                    <?php }  } ?>

                            </select>
                        </div>
                        <div class="form-group col-md-3  padding-4">
                            <label class="label top-label">رقم الرخصه</label>
                            <input type="text" name="license_num" maxlength="" onkeyup=""  data-validation="required" id="license_num" value="<?php echo $license_num;?>"
                                   class="form-control bottom-input"
                                   data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">

                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="form-group col-md-3  padding-4">
                            <label class="label top-label">تاريخ اصدار الرخصه </label>
                            <input type="text" name="esdar_date" maxlength="" onkeyup=""  data-validation="required" id="esdar_date" value="<?php echo $esdar_date;?>"
                                   class="form-control bottom-input date_as_mask error"
                                   data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">

                        </div>
                        <div class="form-group col-md-3  padding-4">
                            <label class="label top-label">تاريخ انتهاء الرخصه </label>
                            <input type="text" name="end_date" maxlength="" onkeyup=""  data-validation="required" id="end_date" value="<?php echo $end_date;?>"
                                   class="form-control bottom-input date_as_mask error"
                                   data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">

                        </div>
                        <div class=" form-group col-md-3 padding-4">
                            <label class="label top-label">نوع الرخصه </label>
                            <select name="licence_type_fk" id="licence_type_fk"
                                    data-validation="required" onchange=""   class="form-control bottom-input"
                                    aria-required="true">
                                <option value="">اختر</option>
                                <?php if(isset($types)&&!empty($types)){
                                    foreach ($types as $row){?>
                                        <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$licence_type_fk) echo "selected";?>><?php echo $row->title_setting;?></option>
                                    <?php } }?>


                            </select>
                        </div>
                        <div class=" form-group col-md-3 padding-4">
                            <label class="label top-label"> فصيله الدم  </label>
                            <select name="blood_fasila" id="blood_fasila"
                                    data-validation="required" onchange=""   class="form-control bottom-input"
                                    aria-required="true">
                                <option value="">اختر</option>
                                <?php if(isset($fasila)&&!empty($fasila)){
                                    foreach ($fasila as $row){?>
                                        <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$blood_fasila) echo "selected";?>><?php echo $row->title_setting;?></option>
                                    <?php } }?>


                            </select>
                        </div>
                        </div>
                    <div class="col-md-12">
                        <input type="submit" name="add" class="btn btn-add" value="حفظ">
                        </div>



                </form>
</div>
            </div>

        </div>


    <div id="load_page">
        <?php
        if(isset($driver)&&!empty($driver)) {
            $data["personal_data"] = $personal_data;
            $this->load->view('admin/Cars/drivers/sidebar_person_data', $data);
        }else{
            $this->load->view('admin/Cars/drivers/sidebar_person_data');
        }?>

    </div>
</div>
<?php
if(isset($drivers)&&!empty($drivers)) {
?>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="info">
            <th class="text-center">م</th>
            <th>اسم السائق</th>
            <th> مركز التكلفه</th>
            <th>رقم الرخصه</th>
            <th>تاريخ بدايه الرخصه</th>
            <th>تاريخ انتهاء الرخصه</th>
            <th> فصيله الدم</th>

            <th>الاجراء</th>



        </tr>
        </thead>
        <tbody class="text-center">
        <?php
        $a=1;

        if(isset($drivers)&&!empty($drivers)) {
            foreach ($drivers as $record) {
               ?>
                <tr>
                    <td><?php echo $a;?></td>
                    <td><?php echo $record->name;?></td>
                    <td><?php echo $record->markz;?></td>
                    <td><?php echo $record->license_num;?></td>
                    <td><?php echo $record->esdar_date;?></td>
                    <td><?php echo $record->end_date;?></td>
                    <td><?php echo $record->fasila_dm;?></td>

                    <td> <a href="<?php echo base_url(); ?>Cars/all_drivers/Driver/edit_driver/<?php echo $record->id; ?>"><i
                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <a href="<?php echo base_url().'Cars/all_drivers/Driver/delete_record/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                            <i class="fa fa-trash" aria-hidden="true"></i>



                    </td>




                </tr>
                <?php
                $a++;
            }
        }
        ?>
        </tbody>
    </table>

<?php } ?>

<script>


    function get_emps()
    {
      var valu= $('#edara_id_fk').val();

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>Cars/all_drivers/Driver/get_emps",
            data:{valu:valu},
            success:function(d) {

                $('#emp_id_fk').html(d);


            }

        });
    }
</script>

<script type="text/javascript">
    jQuery(function($){
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>

<script>
    function get_side_bar(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>Cars/all_drivers/Driver/get_emp_siebar",
            data:{valu:valu},
            success:function(d) {

                $('#load_page').html(d);


            }

        }); 
    }

</script>
