<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">
    
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
</style>

<?php


    $insurance_company_fk=$car->insurance_company_fk;
    $insurance_type_fk=$car->insurance_type_fk;
    $insurance_start_date=$car->insurance_start_date;
    $insurance_end_date=$car->insurance_end_date;
    $insurance_wathiqa_num=$car->insurance_wathiqa_num;
    $insurance_value=$car->insurance_value;


    $out['form']='Cars/cars_data/Cars_data/addInsurance/'.$carId;

?>
<div class="col-sm-12 no-padding " >

        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm  btn-info"> إستكمال البيانات</button>
                    <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
<ul class="dropdown-menu">
    <li><a target=""
           href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/update_car/<?php echo $carId; ?>">  البيانات الأساسية </a></li>
    <li><a target=""
           href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addInsurance/<?php echo $carId; ?>"> وثيقة التأمين </a></li>
    <li><a target=""
           href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addDates/<?php echo $carId; ?>">  الوثائق والمستندات </a></li>

</ul>
                </div>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>


                    <div class="col-sm-9 no-padding">

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label ">شركة التأمين</label>
                        <select id="insurance_company_fk" data-validation="required" class="form-control "
                                name="insurance_company_fk">
                            <option value="">إختر</option>
                            <?php if(isset($companies) && !empty($companies)){?>
                                <?php
                                foreach($companies as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$insurance_company_fk){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >
                                <?php }}else { ?>
                                <option value="">لا يوجد اختارات متاحة</option>
                            <? } ?>
                        </select>
                    </div>

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label "> نوع التأمين</label>
                        <select id="insurance_type_fk" data-validation="required" class="form-control "
                                name="insurance_type_fk">
                            <option value="">إختر</option>
                            <?php if(isset($tamenat) && !empty($tamenat)){?>
                                <?php
                                foreach($tamenat as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$insurance_type_fk){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >
                                <?php }}else { ?>
                                <option value="">لا يوجد اختارات متاحة</option>
                            <? } ?>
                        </select>
                    </div>
                        <div class="form-group col-md-4 col-sm-6 padding-4">
                            <label class="label "> رقم الوثيقة</label>
                            <input type="text" name="insurance_wathiqa_num" id="insurance_wathiqa_num" value="<?php echo $insurance_wathiqa_num;?>"
                                   class="form-control  " onkeypress="validate_number(event)"
                                   data-validation="required"
                                   data-validation-has-keyup-event="true">
                        </div>


                   
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label ">تاريخ بداية التأمين</label>
                        <input type="text" name="insurance_start_date" id="insurance_start_date" value="<?php echo $insurance_start_date;?>"
                               class="form-control  date_as_mask"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label ">تاريخ انتهاء التأمين</label>
                        <input type="text" name="insurance_end_date" id="insurance_end_date" value="<?php echo $insurance_end_date;?>"
                               class="form-control  date_as_mask"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label ">قيمة التأمين</label>
                        <input type="text" name="insurance_value" id="insurance_value" value="<?php echo $insurance_value;?>"
                               class="form-control  "
                               data-validation="required" onkeypress="validate_number(event)"
                               data-validation-has-keyup-event="true">
                    </div>
                
                <div class="col-md-12 text-center">
                    <button type="submit" name="add" id="save" class="btn btn-success btn-labeled" value="حفظ"><span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>
                </div>
                
             </div>
                
                    <!------------------------------------------------------------------>
                    <?php  $this->load->view('admin/Cars/cars_data/sidebar_car_data');?>
                    <!------ table -------->
                
                
            </div>
        </div>



    </div>


<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script type="text/javascript">
    jQuery(function($){
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>



