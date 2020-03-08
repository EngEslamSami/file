<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">
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
    $car_id_fk=$driver->car_id_fk;
    $driver_type=$driver->driver_type;
    $tafwed_date_from=$driver->tafwed_date_from;
    $tafwed_date_to=$driver->tafwed_date_to;
    $responsible_emp_id=$driver->responsible_emp_id;


    $action=base_url().'Cars/drivers/Driver/edit_driver/'.$driver->id;

}else{
    $emp_id_fk='';
    $car_id_fk='';
    $driver_type='';
    $tafwed_date_from='';
    $tafwed_date_to='';
    $responsible_emp_id='';
    $action=base_url().'Cars/drivers/Driver/car_relation_driver';
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
                        <div class=" form-group col-md-3 padding-4">
                            <label class="label top-label"> السياره </label>
                            <select name="car_id_fk" id="car_id_fk"
                                    data-validation="required" onchange=""   class="form-control bottom-input"
                                    aria-required="true">
                                <option value="">اختر</option>
                                <?php
                                if(isset($cars)&&!empty($cars)){
                                    foreach ($cars as $row){?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->b_car_board_num;?> </option>

                                    <?php }  } ?>


                            </select>
                        </div>
                        <div class=" form-group col-md-3 padding-4">
                            <label class="label top-label"> تحديد السائق </label>
                            <select name="driver_type" id="driver_type"
                                    data-validation="required" onchange=""   class="form-control bottom-input"
                                    aria-required="true">
                                <option value="">اختر</option>
                                <option value="1">اساسي</option>
                                <option value="2">مساعد</option>



                            </select>
                        </div>
                        <div class=" form-group col-md-3 padding-4">
                            <label class="label top-label"> السائق </label>
                            <select name="emp_id_fk" id="emp_id_fk"
                                    data-validation="required" onchange="get_emps()" class="form-control bottom-input"
                                    aria-required="true">
                                <option value="">اختر</option>
                                <?php
                                if(isset($employees)&&!empty($employees)){
                                    foreach ($employees as $row){?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->employee;?> </option>

                                    <?php }  } ?>

                            </select>
                        </div>

                        <div class="form-group col-md-3  padding-4">
                            <label class="label top-label">فتره التفويض من  </label>
                            <input type="text" name="tafwed_date_from" maxlength="" onkeyup=""  data-validation="required" id="tafwed_date_from" value=""
                                   class="form-control bottom-input  date_as_mask"
                                   data-validation-has-keyup-event="true"  >

                        </div>


                    </div>
                    <div class="col-md-12 ">
                        <div class="form-group col-md-3  padding-4">
                            <label class="label top-label">فتره التفويض الي </label>
                            <input type="text" name="tafwed_date_to" maxlength="" onkeyup=""  data-validation="required" id="tafwed_date_to" value=""
                                   class="form-control bottom-input date_as_mask"
                                   data-validation-has-keyup-event="true"  >

                        </div>
                        <div class=" form-group col-md-3 padding-4">
                            <label class="label top-label">مسئول الحركه </label>
                            <select name="responsible_emp_id" id="responsible_emp_id"
                                    data-validation="required" onchange="get_emps()" class="form-control bottom-input"
                                    aria-required="true">
                                <option value="">اختر</option>
                                <?php
                                if(isset($employees)&&!empty($employees)){
                                    foreach ($employees as $row){?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->employee;?> </option>

                                    <?php }  } ?>


                            </select>
                        </div>

                        <div class="form-group col-md-3  padding-4">
                            <label class="label top-label">صوره  التفويض</label>
                            <input type="file" name="file" maxlength="" onkeyup=""  data-validation="required" id="" value=""
                                   class="form-control bottom-input"
                                   data-validation-has-keyup-event="true"  >

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

                    <td> <a href="<?php echo base_url(); ?>Cars/drivers/Driver/edit_driver/<?php echo $record->id; ?>"><i
                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <a href="<?php echo base_url().'Cars/drivers/Driver/delete_record/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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

<script type="text/javascript">
    jQuery(function($){
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>


