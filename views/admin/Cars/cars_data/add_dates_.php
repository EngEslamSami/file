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
</style>

<?php


    $date_end_estmara=$car->date_end_estmara;
    $date_end_fahsdawry=$car->date_end_fahsdawry;
    $date_end_tafweal=$car->date_end_tafweal;
    $date_end_tash3ol=$car->date_end_tash3ol;


    $out['form']='Cars/cars_data/Cars_data/addDates/'.$carId;

?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-9 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm  btn-info">اضافه - تعديل -استكمال </button>
                    <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a target=""
                               href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/update_car/<?php echo $carId; ?>"> بيانات الاساسية  </a></li>
                        <li><a target=""
                               href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addInsurance/<?php echo $carId; ?>"> بيانات التأمين  </a></li>
                        <li><a target=""
                               href="<?php echo base_url(); ?>Cars/cars_data/Cars_data/addDates/<?php echo $carId; ?>">  بيانات التواريخ </a></li>

                    </ul>
                </div>

            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>

                    <div class="col-md-12">

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ انتهاء الاستمارة</label>
                        <input type="text" name="date_end_estmara" id="date_end_estmara" value="<?php echo $date_end_estmara;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label"> تاريخ انتهاء الفحص الدوري</label>
                        <input type="text" name="date_end_fahsdawry" id="date_end_fahsdawry" value="<?php echo $date_end_fahsdawry;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ انتهاء التفويض</label>
                        <input type="text" name="date_end_tafweal" id="b_car_model_year" value="<?php echo $date_end_tafweal;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                  </div>
                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ انتهاء كارت التشغيل</label>
                        <input type="text" name="date_end_tash3ol" id="date_end_tash3ol" value="<?php echo $date_end_tash3ol;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>


                </div>
                <div class="col-md-12 ">
                    <input type="submit" id="save" name="add" value="حفظ"
                            class="btn btn-add center-block">
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------>
    <?php  $this->load->view('admin/Cars/cars_data/sidebar_car_data');?>
    <!------ table -------->
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



