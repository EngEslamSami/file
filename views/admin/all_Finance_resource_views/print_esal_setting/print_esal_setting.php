<style type="text/css">
    /**************************/
    /* 27-1-2019 */
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
        float: right;
        display: block;
        width: 100%;
    }

    .half {
        width: 100% !important;
        float: right !important;
    }

    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }

    .form-group {
        margin-bottom: 0px;
    }

    .bootstrap-select > .btn {
        width: 100%;
        padding-right: 5px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important;
        left: 4px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }

    .bond-header {
        height: 80px;
        margin-bottom: 0px;
    }

    .bond-header .right-img img,
    .bond-header .left-img img {
        width: 100%;
        height: 60px;
    }

    .border-box {
        padding: 5px 20px;
        border: 4px double #999;
        border-radius: 29px;
    }

    .border-box-h {
        padding: 10px 20px;
        border: 2px solid #222;
        border-radius: 29px;
        font-size: 10px;
    }

    .main-bond-title {
        display: table;
        height: 60px;
        text-align: center;
        width: 100%;
    }

    .main-bond-title h3 {
        display: table-cell;
        vertical-align: bottom;
        font-size: 16px;
    }

    .bond-body {
        display: inline-block;
        width: 100%;
        background: url(<?php echo base_url();?>asisst/admin_asset/img/pills/recieve_esal.jpg);
        background-position: center;
        background-size: 100% 100%;
        background-repeat: no-repeat;
        padding: 60px 14px 10px;

    }

    .bond-body h5 {
        font-size: 14px;
    }

    input[type=radio] {
        height: 20px;
        width: 20px;
    }
</style>

<style type="text/css" id="bg-for-print">
    .padd {
        padding: 0 3px !important;
    }

    .no-padding {
        padding: 0;
    }

    .no-margin {
        margin: 0;
    }

    h4 {
        margin-top: 0;
    }
</style>

<div class="col-sm-12  wow">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <?php


        ?>


        <?php

        echo form_open_multipart('all_Finance_resource/print_esal_setting/Print_esal_setting');
        if (isset($emp_data) && !empty($emp_data)) {

            $emp_id_fk = $emp_data->emp_id;
            $emp_code = $emp_data->emp_code;
            $edara_id_fk = $emp_data->edara_id_fk;
            $qsm_id_fk = $emp_data->qsm_id_fk;
            //==================
            $margin_top = $emp_data->margin_top;
            $margin_bottom = $emp_data->margin_bottom;
            $margin_left = $emp_data->margin_left;
            $margin_right = $emp_data->margin_right;
            $esal_type = $emp_data->esal_type;
            $but = 'تعديل';
        } else {
            $edara_id_fk = '';
            $qsm_id_fk = '';
            $emp_id_fk = '';
            $emp_code = '';
            $margin_top = '';
            $margin_bottom = '';
            $margin_left = '';
            $margin_right = '';
            $esal_type = '';
            $but = 'حفظ';
        }
        echo form_open_multipart('all_Finance_resource/print_esal_setting/Print_esal_setting');
        if (isset($personal_data) && !empty($personal_data) && $_SESSION['role_id_fk'] != 1) {
            $emp_id_fk = $personal_data[0]->id;
            $emp_code = $personal_data[0]->emp_code;
            $edara_id_fk = $personal_data[0]->administration;
            $qsm_id_fk = $personal_data[0]->department;


        } else {
            $edara_id_fk = '';
            $qsm_id_fk = '';
            $emp_id_fk = '';
            $emp_code = '';


        }


        if (!empty($esal_type)) {
            $disp = 'block';
        } else {
            $disp = 'none';
        }


        ?>
        <div class="panel-body">


            <input type="hidden" name="emp_id" id="emp_id2" value="<?php echo $emp_id_fk; ?>">
            <input type="hidden" name="emp_code" id="emp_code2" value="<?php echo $emp_code; ?>">

            <input type="hidden" name="edara_id_fk" id="edara_id_fk2" value="<?php echo $edara_id_fk; ?>">
            <input type="hidden" name="qsm_id_fk" id="qsm_id_fk2" value="<?php echo $qsm_id_fk; ?>">

            <div class="col-md-12">
                <div class="form-group col-md-3 col-sm-6 padd ">
                    <label class="label label-green half">اسم الموظف</label>
                    <select name="" id="employee_name"
                            data-validation="required" class="form-control half selectpicker no-margin"
                            data-show-subtext="true" data-live-search="true"
                            aria-required="true" <?php if ($_SESSION['role_id_fk'] == 1) { ?> onchange="get_emp_data($(this).val());" <?php } else {
                        echo 'disabled';
                    } ?>>
                        <option value="">إختر الموظف</option>
                        <?php
                        if (isset($all_emps) && !empty($all_emps)) {
                            foreach ($all_emps as $row) {
                                $select = '';
                                if (!empty($emp_id_fk == $row->id)) {
                                    $select = 'selected';
                                }
                                ?>
                                <option value="<?php echo $row->id; ?>" <?php echo $select; ?> > <?php echo $row->employee; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-3 col-sm-4 padd">
                    <label class="label label-green  half">الرقم الوظيفي</label>
                    <input type="text" readonly data-validatio="required" value="<?php echo $emp_code; ?>"
                           data-validation="required" id="emp_rakm" class="form-control half">

                </div>
                <div class="form-group col-md-3 col-sm-6 padd">
                    <label class="label label-green  half">الاداره </label>
                    <select name="administration" disabled id="manage"
                            class="form-control half"
                            onchange="return lood(this.value);"
                            aria-required="true">
                        <option value="">إختر</option>
                        <?php
                        if (!empty($admin)):
                            foreach ($admin as $record):
                                $select = '';
                                if (!empty($edara_id_fk == $record->id)) {
                                    $select = 'selected';
                                }
                                ?>

                                <option
                                        value="<?php echo $record->id; ?>" <?php echo $select; ?>><?php echo $record->name; ?></option>
                            <?php
                            endforeach;
                        endif;
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-3 col-sm-4 padd">
                    <label class="label label-green  half">القسم</label>
                    <select name="" disabled id="depart"
                            class="form-control half"
                            onchange="return lood(this.value);">

                        <option value="">إختر</option>
                        <?php
                        if (!empty($departs)):
                            foreach ($departs as $record):
                                $select = '';
                                if (!empty($qsm_id_fk == $record->id)) {
                                    $select = 'selected';
                                }
                                ?>
                                <option
                                        value="<?php echo $record->id; ?>" <?php echo $select; ?>><?php echo $record->name; ?></option>
                            <?php
                            endforeach;
                        endif;
                        ?>
                    </select>
                </div>


                <div class="col-xs-12">
                    <br>
                    <div class="col-md-6 esal_ready1" style="min-height: 150px;background-color: #eee">
                        <h5 class="text-right"><input type="radio" data-validation="required" name="esal_type"
                                                      onchange="esal_type2(1);"
                                                      id="inlineCheckbox1" <?php if (isset($esal_type) && $esal_type == 1) echo 'checked'; ?>
                                                      value="1"> إيصال جاهز</h5>
                    </div>
                    <div class="col-md-6 esal_ready2" style="min-height: 150px;background-color: #c2ffa4">
                        <h5 class="text-left"><input type="radio" data-validation="required" name="esal_type"
                                                     onchange="esal_type2(2);" <?php if (isset($esal_type) && $esal_type == 2) echo 'checked'; ?>
                                                     id="inlineCheckbox2" value="2"> إيصال من النظام</h5>

                        <div class="col-xs-12 no-padding " style="display: block;">
                            <div class="form-group col-md-3 col-sm-6">
                                <label>من الأعلى</label>
                                <input type="number" name="margin_top" class="form-control" id="from-top"
                                       value="<?php if (isset($margin_top)) {
                                           echo $margin_top;
                                       } ?>">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>من اليمين</label>
                                <input type="number" name="margin_right" class="form-control" id="from-right"
                                       value="<?php if (isset($margin_right)) {
                                           echo $margin_right;
                                       } ?>">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>من الأسفل</label>
                                <input type="number" name="margin_bottom" class="form-control" id="from-bottom"
                                       value="<?php if (isset($margin_bottom)) {
                                           echo $margin_bottom;
                                       } ?>">
                            </div>


                            <div class="form-group col-md-3 col-sm-6">
                                <label>من اليسار</label>
                                <input type="number" name="margin_left" class="form-control" id="from-left"
                                       value="<?php if (isset($margin_left)) {
                                           echo $margin_left;
                                       } ?>">
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding esal" style="display:block;">
                            <br>
                            <article class="pill" style="margin-top:<?php if (isset($margin_top)) {
                                echo $margin_top . 'px';
                            } ?>;margin-bottom:<?php if (isset($margin_bottom)) {
                                echo $margin_bottom . 'px';
                            } ?>
                                    ;margin-left:<?php if (isset($margin_left)) {
                                echo $margin_left . 'px';
                            } ?>;margin-right:<?php if (isset($margin_right)) {
                                echo $margin_right . 'px';
                            } ?>">
                                <!-- <div class="bond-header">
                                        <div class="col-xs-4 pad-2">
                                            <div class="right-img">
                                                <img src="<?php echo base_url(); ?>asisst/admin_asset/img/sympol1.png">
                                            </div>
                                        </div>
                                        <div class="col-xs-4 pad-2">
                                            <div class="main-bond-title">
                                                <h3 class="text-center"><span class="border-box">إيصال إستلام</span></h3>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 pad-2">
                                            <div class="left-img">
                                                <img src="<?php echo base_url(); ?>asisst/admin_asset/img/sympol2.png">
                                            </div>
                                        </div>
                                    </div>-->
<!--
                                <div class="bond-body">
                                    <br>
                                    <div class="col-xs-12 no-padding">
                                        <div class="col-xs-6">
                                            <h5>المبلغ :</h5>
                                        </div>
                                        <div class="col-xs-3">
                                            <h5>الرقم :</h5>
                                        </div>
                                        <div class="col-xs-3">
                                            <h5>التاريخ :</h5>
                                        </div>
                                    </div>


                                    <div class="col-xs-12">
                                        <h5>استلمنا من :</h5>
                                    </div>


                                    <div class="col-xs-12">
                                        <h5>مبلغاَ وقدره :</h5>
                                    </div>


                                    <div class="col-xs-12 no-padding">
                                        <div class="col-xs-5">
                                            <h5>بالشيك رقم :</h5>
                                        </div>
                                        <div class="col-xs-4">
                                            <h5>على بنــــك :</h5>
                                        </div>
                                        <div class="col-xs-3">
                                            <h5>بتـــاريخ :</h5>
                                        </div>
                                    </div>


                                    <div class="col-xs-12">
                                        <h5>وهو عبارة عن :</h5>
                                        <br>
                                        <br>
                                    </div>


                                    <div class="col-xs-12 no-padding">
                                        <div class="col-xs-1">
                                        </div>
                                        <div class="col-xs-4">
                                            <h5>المستلم</h5>
                                        </div>
                                        <div class="col-xs-5">

                                        </div>
                                        <div class="col-xs-2">
                                            <h5>الختم :</h5>
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                    <br>

                                </div>
-->
                                <!--<div class="bond-footer">
                                    <h5 class="border-box-h text-center">المملكة العربية السعودية - القصيم - بريدة - ص.ب821 - بريدة 51421 - هاتف : 0163851919 - جوال : 0553851919 - فاكس : 0163837737</h5>
                                </div>-->
                            </article>
                        </div>
                    </div>
                </div>

                <div class="form-group col-xs-12 text-center">

                    <button type="submit"
                            class="btn btn-labeled btn-success myBtnInsert" name="add" value="<?php echo $but; ?>">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>


                </div>
                <?php echo form_close(); ?>


            </div>

        </div>
    </div>
</div>
<!--------------------------------------------------------->

<?php 
/*
echo '<pre>';
print_r($records);*/

if($_SESSION['role_id_fk'] == 1){ ?>
    
    
<?php
if (isset($records) && $records != null ){
    $x = 1;
    ?>


<div class="col-xs-12">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">  </h3>
        </div>
        <div class="panel-body">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                <thead>
                <tr class="greentd">
                    <th>م</th>
                    <th>كود الموظف </th>
                    <th>اسم الموظف </th>
                    <th> القسم </th>
                    <th> نوع الإيصال </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($records as $one_emp){
                
                if($one_emp->esal_type == 1){
                    $esal_type = ' إيصال جاهز ';
                    $esal_type_class = 'success';
                }elseif($one_emp->esal_type == 2){
                     $esal_type = 'إيصال من النظام ';
                       $esal_type_class = 'primary';
                }else{
                   $esal_type = 'غير محدد'; 
                   $esal_type_class = 'default'; 
                     
                    
                }
                
                    ?>
                    <tr>
                        <td><?= $x++?></td>
                        <td><?= $one_emp->emp_code?></td>
                        <td><?= $one_emp->emp_name?></td>
                        <td><?= $one_emp->qsm_name?></td>
                      <!--  <td><?= $esal_type ?></td> -->
                        
                        <td>
                        <span
                        style="font-size: 12px; color: white !important; font-weight: normal;"
                         class="label label-<?php echo $esal_type_class ?>"><?= $esal_type ?></span>
                        
                        

                        </td>

                    </tr>
                <?php

                }
                ?>
                </tbody>

            </table>
        </div>
    </div>
</div>

    <?php
}
?>
    
    
    
<?php }


?>

<!------------------------------------------------------------>

<script>
    function get_emp_data(valu) {

        $('.emp' + valu).show();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_Finance_resource/print_esal_setting/Print_esal_setting/check_data_emp",
            data: {valu: valu},
            success: function (d) {
                var obj = JSON.parse(d);
                if (obj) {
                    if (obj.esal_type == 2) {
                        $('#inlineCheckbox2').attr('checked', true);
                    } else {
                        $('#inlineCheckbox1').attr('checked', true);
                    }


                    $('.esal').show();
                    $("#from-top").val(obj.margin_top);
                    $("#from-right").val(obj.margin_right);
                    $("#from-bottom").val(obj.margin_bottom);
                    $("#from-left").val(obj.margin_left);
                } else {

                }


            }
        });


        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Vacation/get_emp_data",
            data: {valu: valu},
            success: function (d) {


                var obj = JSON.parse(d);


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
                //======================================
                <!-------------- emp_id2    emp_code2    edara_id_fk2      qsm_id_fk2 -->
                $('#emp_id2').val(obj.id);
                $('#emp_code2').val(obj.emp_code);
                $('#edara_id_fk2').val(obj.administration);
                $('#qsm_id_fk2').val(obj.department);

                //============================


            }


        });


        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Vacation/get_load_page",
            data: {valu: valu},
            success: function (d) {

                $('#load3').html(d);


            }


        });
    }


</script>
<script>
    function esal_type2(valu) {
        //alert(valu);
        if (valu == 2) {
$('.esal_ready2').css("background-color","#c2ffa4");
$('.esal_ready1').css("background-color","white");
          //  $('.esal').show();
        } else {
            $('.esal_ready1').css("background-color","#c2ffa4");
            $('.esal_ready2').css("background-color","white");
            // $('.esal').hide();
            // $("#from-top").val(0);
            // $("#from-right").val(0);
            // $("#from-bottom").val(0);
            // $("#from-left").val(0);
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    new WOW().init();
    $('.some_class').datetimepicker();
</script>
<script type="text/javascript">


    $("#from-top").keyup(function () {
        from_top = $(this).val();
        $(".pill").css("margin-top", from_top + "px");
        //	setStyle();
    });
    $("#from-right").keyup(function () {
        from_right = $(this).val();
        $(".pill").css("margin-right", from_right + "px");
        //	setStyle();
    });
    $("#from-bottom").keyup(function () {
        from_bottom = $(this).val();
        $(".pill").css("margin-bottom", from_bottom + "px");
        //	setStyle();
    });
    $("#from-left").keyup(function () {
        from_left = $(this).val();
        $(".pill").css("margin-left", from_left + "px");
        //	setStyle();
    });

    function setStyle() {
        var from_top = $("#from-top").val();
        var from_right = $("#from-right").val();
        var from_bottom = $("#from-bottom").val();
        var from_left = $("#from-left").val();
        $("#bg-for-print").text("@page {.pill{ margin:" + from_top + "px " + from_right + "px " + from_bottom + "px " + from_left + "px " + ";}}");
    }

</script>
