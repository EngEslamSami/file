<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style type="text/css">
    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }

    . {
        font-size: 13px;
    }
</style>


<?php
if (isset($emp) && !empty($emp)) {
    $employee_type = $emp->employee_type;
    $employee_degree = $emp->employee_degree;
    $employee_qualification = $emp->employee_qualification;
    $reason = $emp->reason;
    $manger = $emp->manger;
    $type_tamin = $emp->type_tamin;
//    $start_work_date = $emp->start_work_date;
//    $end_contract_date = $emp->end_contract_date;
//    $end_service_date = $emp->end_service_date;
    $work_maktb = $emp->work_maktb;
//    $start_tamin_date = $emp->start_tamin_date;
    $type_tamin__medicine = $emp->type_tamin__medicine;
    $tamin_company = $emp->tamin_company;
    $polica_num = $emp->polica_num;
    $tamin_type = $emp->tamin_type;
//    $tamin_date = $emp->tamin_date;
    $administration = $emp->administration;
    $department = $emp->department;
    $employee_degree = $emp->employee_degree;
    $degree_id = $emp->degree_id;
    $contract = $emp->contract;
    $insurance_number = $emp->insurance_number;
    $tamin_medicine_num = $emp->tamin_medicine_num;
    $cat_manager_id_fk = $emp->cat_manager_id_fk;
    $disabled_end_date = "";
    if ($contract == "0") {
        $disabled_end_date = 'disabled=""';
    }
    $disabled_end_service = '';
    if ($employee_type == 1) {
        $disabled_end_service = 'disabled=""';
    }
} else {
    $employee_type = "";
    $employee_degree = "";
    $employee_qualification = "";
    $reason = "";
    $manger = "";
    $type_tamin = "";
//    $start_work_date = "";
//    $end_contract_date = "";
//    $end_service_date = "";
    $work_maktb = "";
//    $start_tamin_date = "";
    $type_tamin__medicine = "";
    $tamin_company = "";
    $polica_num = "";
    $tamin_type = "";
//    $tamin_date = "";
    $administration = "";
    $department = "";
    $employee_degree = "";
    $degree_id = "";
    $contract = "";
    $insurance_number = "";
    $tamin_medicine_num = "";
    $disabled_end_date = "";
    $disabled_end_service = '';
    $cat_manager_id_fk = '';
  
    //yara
    $reason_name=" ";
    $qualification_name="";
    $employee_degree_name="";
    $work_maktb_name="";
}
?>
<?php
$out['form'] = 'human_resources/radwa/Rawda/add_job_data/' . $this->uri->segment(4);
?>

    <div class=" panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
            <div class="pull-left">
                <?php $data_load["emp_code"] = $personal_data[0]->emp_code;
                $data_load["id"] = $this->uri->segment(4);
                $this->load->view('admin/Human_resources/drop_down_menu', $data_load); ?>
            </div>
        </div>
        <div class="panel-body">
             <div class="col-sm-10 no-padding">
            <?php echo form_open_multipart($out['form']) ?>
            <div class="form-group col-md-2 col-sm-6 padding-4">
                <label class="label ">حاله الموظف</label>
                <select name="employee_type" id="employee_type" class="form-control "
                        data-validation="required" aria-required="true" onchange="change_service_end(this.value);">
                    <option value="">إختر</option>
                    <option value="1" <?php if ($employee_type == 1) {
                        echo 'selected';
                    } ?>>نشط
                    </option>
                    <option value="2"<?php if ($employee_type == 2) {
                        echo 'selected';
                    } ?>>موقوف
                    </option>
                </select>
            </div>
            <!-- <div class="form-group col-md-5 col-sm-6 padding-4">
                <label class="label ">اسباب حالات الموظفين </label>

                <select name="reason" id="reason" class="form-control " aria-required="true">
                    <option value="">إختر</option>
                    <?php
                    if (isset($reasons_employees_cases) && !empty($reasons_employees_cases)) {
                        foreach ($reasons_employees_cases as $row) {

                            ?>
                            <option value="<?php echo $row->id_setting; ?>"<?php if ($row->id_setting == $reason) {
                                echo 'selected';
                            } ?>> <?php echo $row->title_setting; ?></option>
                            <?php
                        }
                    } else {
                        echo '<option value="">لايوجد اسباب مضافه</option>';
                    }
                    ?>
                </select>
            </div> -->
            <div class="form-group col-md-4 col-sm-6 padding-4" 
                     >
                    <label class="label  ">اسباب حالات الموظفين</label>
                    <input type="text" name="reason_name" id="reason_name" value="<?php echo $reason_name ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:88%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_esdar').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="reason" id="reason" 
                           value="<?php echo $reason ?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_esdar" 
                    onclick="get_details_reason()"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>
            <!-- <div class="form-group col-md-2 col-sm-6 padding-4">
                <label class="label ">الدرجه العلميه</label>
                <select name="employee_degree" id="employee_degree"
                        class="form-control "
                        onchange=""
                        data-validation="required" aria-required="true">
                    <option value="">إختر</option>
                    <?php
                    if (isset($degree_qual) && !empty($degree_qual)) {
                        foreach ($degree_qual as $row) {
                            ?>
                            <option value="<?php echo $row->id_setting; ?>"<?php if ($row->id_setting == $employee_degree) {
                                echo 'selected';
                            } ?>> <?php echo $row->title_setting; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div> -->
            <!-- yara -->
            <div class="form-group col-md-3 col-sm-6 padding-4" 
                     >
                    <label class="label  ">الدرجه العلميه</label>
                    <input type="text" name="employee_degree_name" id="employee_degree_name"  value="<?php echo $employee_degree_name ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:85%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_family').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="employee_degree" id="employee_degree" 
                           value="<?php echo $employee_degree ?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_family" 
                    onclick="get_details_employee_degree()"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>
                 
            <!-- <div class="form-group col-md-3 col-sm-6 padding-4">
                <label class="label ">المؤهل العلمي</label>
                <select name="employee_qualification" id="employee_qualification"
                        class="form-control "
                        onchange=""
                        data-validation="required" aria-required="true">
                    <option value="">إختر</option>
                    <?php
                    if (isset($qualification) && !empty($qualification)) {
                        foreach ($qualification as $row) {
                            ?>
                            <option value="<?php echo $row->id_setting; ?>"<?php if ($row->id_setting == $employee_qualification) {
                                echo 'selected';
                            } ?>> <?php echo $row->title_setting; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div> -->
            <div class="form-group col-md-3 col-sm-6 padding-4" 
                     >
                    <label class="label  ">المؤهلات العلمية</label>
                    <input type="text" name="moahel_3elmi_name" id="moahel_3elmi_name"  value="<?php echo $qualification_name ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:85%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_mo2hl').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="employee_qualification" id="employee_qualification" 
                           value="<?php echo $employee_qualification ?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_mo2hl"
                    onclick="get_details_mo2hl()"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>

            <div class="form-group col-md-2 col-sm-6 padding-4">
                <label class="label ">الفئه الوظيفيه</label>
                <select name="cat_manager_id_fk" id="cat_manager_id_fk"
                        class="form-control "
                        onchange="get_manager_cat($(this).val());"
                        data-validation="required" aria-required="true">
                    <option value="">إختر</option>
                    <?php
                    if (isset($manager_category) && !empty($manager_category)) {
                        foreach ($manager_category as $row) {
                            ?>
                            <option value="<?php echo $row->id; ?>"<?php if ($row->id == $cat_manager_id_fk) {
                                echo 'selected';
                            } ?>> <?php echo $row->name; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>


            <div class="form-group col-md-3 col-sm-6 padding-4">
                <label class="label ">الاداره </label>
                <select name="administration" id="administration3"
                        class="form-control "
                         onchange="get_direct_manger(this.value); lood(this.value);"
                        data-validation="required" aria-required="true">
                    <option value="">إختر</option>
                    <?php
                    if (!empty($admin)):
                        foreach ($admin as $record):
                            ?>
                            <option
                                    value="<?php echo $record->id; ?>" <?php if ($record->id == $administration) {
                                echo 'selected';
                            } ?>><?php echo $record->name; ?></option>
                        <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3 col-sm-6 padding-4">
                <label class="label ">القسم </label>
           
                <select name="department" class="form-control " id="department3"
                        aria-required="true">
                    <option value="0">إختر</option>
                    <?php
                     
                    if (isset($departs[$administration]) && !empty($departs[$administration])) {
                        foreach ($departs[$administration] as $row) {
                            ?>
                            <option value="<?php echo $row->id; ?>" <?php if ($row->id == $department) {
                                echo 'selected';
                            } ?>>
                                <?php echo $row->name; ?></option>
                            <?php
                        }
                    } else { ?>
                        <option value="">لا يوجد اقسام مضافة</option>
                    <?php }
                    ?>

                </select>
            </div>
            <div class="form-group col-md-4 col-sm-6 padding-4">
                <label class="label ">المسمي الوظيفي </label>
                <select name="degree_id" id="degree_id3" class="form-control " data-validation="required"
                        aria-required="true">
                    <option value="">إختر</option>
                    <?php foreach ($job_role as $one_job_role) { ?>
                        <option value="<?php echo $one_job_role->defined_id; ?>"<?php if ($one_job_role->defined_id == $degree_id) {
                            echo 'selected';
                        } ?>><?php echo $one_job_role->defined_title; ?></option>';
                    <?php } ?>
                </select>
            </div>
            <!--<div class="form-group col-md-3 col-sm-6 padding-4">
                <label class="label ">المدير المباشر </label>

                <select name="manger" id="manger" class="form-control "
                        aria-required="true">
                    <option value="">إختر</option>
                    <?php if (isset($direct_all_emps) && $direct_all_emps != null) {
                        foreach ($direct_all_emps as $value) { ?>
                            <option value="<?= $value->id ?>" <?php if ($value->id == $manger) {
                                echo 'selected';
                            } ?> ><?= $value->employee ?></option>
                        <?php }
                    } ?>
                </select>
            </div>-->
            
                <div class="form-group col-md-3 col-sm-6 padding-4">
                <label class="label ">المدير المباشر </label>

                <select name="manger" id="manger" class="form-control "
                        onchange="$('#manger_type').val($('option:selected', this).data('type'))"
                        aria-required="true">
                    <option value="">إختر</option>
                    <?php if (isset($direct_all_emps) && $direct_all_emps != null) {
                        foreach ($direct_all_emps as $value) { ?>
                            <option value="<?= $value->emp_id_fk ?>"
                                    data-type="<?= $value->emp_type ?>" <?php if ($value->emp_id_fk == $manger) {
                                echo 'selected';
                            } ?> ><?= $value->empolyee_name ?></option>
                        <?php }
                    } ?>
                </select>
                <input type="hidden" name="manger_type" id="manger_type" value="0">

            </div>
            <div class="form-group col-md-3 col-sm-6 padding-4">

                <label class="label ">نوع العقد </label>
                <select name="contract" id="contract3" data-validation="required" class="form-control "
                        onchange="changeAqdStatus($(this).val());" aria-required="true">
                    <option value="">إختر</option>
                    <?php $contracts = array('عقد غير محدد المدة ', 'عقد محدد المدة ');
                    /* if(isset($contracts) && $contracts != null) {
                      foreach ($contracts as $key=>$value) {?>
                          <option value="<?=$key?>" <?php if($key==$contract){ echo 'selected' ; } ?> ><?=$value?></option>
                      <?php   }
                  }*/ ?>
                    <option value="1" <?php if ($contract == "1") {
                        echo 'selected';
                    } ?>>عقد محدد المدة
                    </option>
                    <option value="0" <?php if ($contract == "0") {
                        echo 'selected';
                    } ?>>عقد غير محدد المدة
                    </option>
                </select>
            </div>


            <div class="form-group col-md-3  col-sm-6 padding-4">

                <label class="label text-center">
                    <img style="width: 18px;float: right;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                    تاريخ التعيين
                    <img style="width: 18px;float: left;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                </label>

                <div id="cal-2" style="width: 50%;float: right;">
                    <input id="date-Hijri" name="start_work_date_h" class="form-control bottom-input "
                           type="text" onfocus="showCal2();"
                           style=" width: 100%;float: right"/>

                </div>


                <div id="cal-1" style="width: 50%;float: left;">
                    <input id="date-Miladi" name="start_work_date_m" class="form-control bottom-input  "

                           type="text" onfocus="showCal1();" style=" width: 100%;float: right"/>

                </div>
            </div>


            <div class="form-group col-md-3  col-sm-6 padding-4">

                <label class="label text-center">
                    <img style="width: 18px;float: right;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                    تاريخ انتهاء العقد
                    <img style="width: 18px;float: left;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                </label>

                <div id="cal-4" style="width: 50%;float: right;">
                    <input id="date-Hijri4" name="end_contract_date_h" class="form-control bottom-input "
                           type="text" onfocus="showCal4();"
                           style=" width: 100%;float: right"  <?= $disabled_end_date ?>/>

                </div>


                <div id="cal-3" style="width: 50%;float: left;">
                    <input id="date-Miladi3" name="end_contract_date_m" class="form-control bottom-input  "

                           type="text" onfocus="showCal3();"
                           style=" width: 100%;float: right"  <?= $disabled_end_date ?>/>

                </div>
            </div>


            <div class="form-group col-md-3  col-sm-6 padding-4">

                <label class="label text-center">
                    <img style="width: 18px;float: right;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                    تاريخ انتهاء الخدمه
                    <img style="width: 18px;float: left;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                </label>

                <div id="cal-6" style="width: 50%;float: right;">
                    <input id="date-Hijri6" name="end_service_date_h" class="form-control bottom-input "
                           type="text" onfocus="showCal6();"
                           style=" width: 100%;float: right" <?= $disabled_end_service ?>/>

                </div>


                <div id="cal-5" style="width: 50%;float: left;">
                    <input id="date-Miladi5" name="end_service_date_m" class="form-control bottom-input  "

                           type="text" onfocus="showCal5();"
                           style=" width: 100%;float: right" <?= $disabled_end_service ?>/>

                </div>
            </div>

            <div class="form-group col-md-2 col-sm-6 padding-4">
                <label class="label ">التامينات الاجتماعيه</label>
                <select name="type_tamin" id="type_tamin"
                        class="form-control "
                        onchange="get_halt_tamin($(this).val());"
                        data-validation="required" aria-required="true">
                    <option value="">إختر</option>
                    <option value="1" <?php if ($type_tamin == 1) {
                        echo 'selected';
                    } ?>>مؤمن
                    </option>
                    <option value="2" <?php if ($type_tamin == 2) {
                        echo 'selected';
                    } ?>>غير مؤمن
                    </option>
                </select>
            </div>
            <!-- <div class="form-group col-md-3 col-sm-6 padding-4">
                <label class="label ">مكتب العمل </label>

                <select name="work_maktb" <?php if ($type_tamin != 1) {
                    echo 'disabled';
                } ?> id="work_maktb" data-validation="required" class="form-control " aria-required="true">
                    <option value="">إختر</option>
                    <?php if (isset($all_maktb) && $all_maktb != null) {
                        if (isset($work_maktb) && $work_maktb != null) {
                            $maktb = $work_maktb;
                        } else {
                            $maktb = '';
                        }
                        foreach ($all_maktb as $value) { ?>
                            <option value="<?= $value->id_setting ?>" <?php if ($value->id_setting == $maktb) {
                                echo 'selected';
                            } ?> ><?= $value->title_setting ?></option>
                        <?php }
                    } ?>
                </select>
            </div> -->
            <div class="form-group col-md-4 col-sm-6 padding-4" 
                     >
                    <label class="label  ">مكتب العمل </label>
                    <input type="text" name="work_maktb_name" id="work_maktb_name" value="<?php echo $work_maktb_name ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:88%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_work_maktb').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="work_maktb" id="work_maktb" 
                           value="<?php echo $work_maktb ?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_work_maktb" 
                    onclick="get_details_work_maktb()"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>
            <div class="form-group col-md-3 col-sm-6 padding-4">
                <label class="label ">رقم الإشتراك </label>
                <input type="text" <?php if ($type_tamin != 1) {
                    echo 'disabled';
                } ?> name="tamin" id="tamin3" value="<?php echo $insurance_number; ?>" class="form-control "
                       autofocus="" data-validation="required" data-validation-has-keyup-event="true"
                       onkeypress="validate_number(event);">
            </div>


            <div class="form-group col-md-3  col-sm-6 padding-4">

                <label class="label text-center">
                    <img style="width: 18px;float: right;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                    تاريخ الإشتراك
                    <img style="width: 18px;float: left;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                </label>

                <div id="cal-8" style="width: 50%;float: right;">
                    <input id="date-Hijri8" name="start_tamin_date_h" class="form-control bottom-input "
                           type="text" onfocus="showCal8();"
                           style=" width: 100%;float: right" <?php if ($type_tamin != 1) {
                        echo 'disabled';
                    } ?> />

                </div>


                <div id="cal-7" style="width: 50%;float: left;">
                    <input id="date-Miladi7" name="start_tamin_date_m" class="form-control bottom-input  "

                           type="text" onfocus="showCal7();"
                           style=" width: 100%;float: right" <?php if ($type_tamin != 1) {
                        echo 'disabled';
                    } ?> />

                </div>
            </div>

            <div class="form-group col-md-2 col-sm-6 padding-4">
                <label class="label ">التأمين الطبي</label>
                <select name="type_tamin__medicine" id="type_tamin__medicine"
                        class="form-control "
                        onchange="get_medicine_tamin($(this).val());"
                        data-validation="required" aria-required="true">
                    <option value="">إختر</option>
                    <option value="1"<?php if ($type_tamin__medicine == 1) {
                        echo 'selected';
                    } ?>>مؤمن
                    </option>
                    <option value="2"<?php if ($type_tamin__medicine == 2) {
                        echo 'selected';
                    } ?>>غير مؤمن
                    </option>
                </select>
            </div>
            <!-- <div class="form-group col-md-3 col-sm-6 padding-4">
                <label class="label ">شركه التأمين </label>
                <select name="tamin_company" id="tamin_company"
                        class="form-control "
                        onchange=""
                        data-validation="required" aria-required="true" <?php if ($type_tamin__medicine != 1) {
                    echo 'disabled';
                } ?>>
                    <option value="">إختر</option>
                    <?php
                    if (isset($company) && !empty($company)) {
                        foreach ($company as $row) {
                            ?>
                            <option value="<?php echo $row->id_setting; ?>"<?php if ($row->id_setting == $tamin_company) {
                                echo 'selected';
                            } ?> > <?php echo $row->title_setting; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select> 
            </div> -->
            <div class="form-group col-md-4 col-sm-6 padding-4" 
                     >
                    <label class="label  ">شركه التأمين </label>
                    <input type="text" name="tamin_company_name" id="tamin_company_name" value="<?php echo $tamin_company_name ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:88%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_tamin_company').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="tamin_company" id="tamin_company" 
                           value="<?php echo $tamin_company ?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>

                    <button type="button" data-toggle="modal" data-target="#Modal_tamin_company" 
                    onclick="get_details_tamin_company()"
                            class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>
            <div class="form-group col-md-3 col-sm-6 padding-4">
                <label class="label ">رقم التأمين </label>
                <input type="text" <?php if ($type_tamin__medicine != 1) {
                    echo 'disabled';
                } ?> name="tamin_medicine_num" id="tamin_medicine_num" value="<?php echo $tamin_medicine_num; ?>"
                       class="form-control " autofocus="" data-validation="required"
                       data-validation-has-keyup-event="true" onkeypress="validate_number(event);">
            </div>
            <div class="form-group col-md-3 col-sm-6 padding-4">
                <label class="label ">رقم البوليصه </label>
                <input type="text" <?php if ($type_tamin__medicine != 1) {
                    echo 'disabled';
                } ?> name="polica_num" id="polica_num" value="<?php echo $polica_num; ?>"
                       class="form-control " autofocus="" data-validation="required"
                       data-validation-has-keyup-event="true" onkeypress="validate_number(event);">
            </div>
            <div class="form-group col-md-2 col-sm-6 padding-4">
                <label class="label ">فئه التأمين </label>
                <select name="tamin_type" id="tamin_type"
                        class="form-control "
                        onchange=""
                        data-validation="required" aria-required="true" <?php if ($type_tamin__medicine != 1) {
                    echo 'disabled';
                } ?>>
                    <option value="">إختر</option>
                    <?php
                    if (isset($cat_tamin) && !empty($cat_tamin)) {
                        foreach ($cat_tamin as $row) {
                            ?>
                            <option value="<?php echo $row->id_setting; ?>"<?php if ($row->id_setting == $tamin_type) {
                                echo 'selected';
                            } ?>> <?php echo $row->title_setting; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group col-md-3  col-sm-6 padding-4">

                <label class="label text-center">
                    <img style="width: 18px;float: right;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                    تاريخ الانتهاء
                    <img style="width: 18px;float: left;"
                         src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                </label>

                <div id="cal-10" style="width: 50%;float: right;">
                    <input id="date-Hijri10" name="tamin_date_h" class="form-control bottom-input "
                           type="text" onfocus="showCal10();"
                           style=" width: 100%;float: right" <?php if ($type_tamin__medicine != 1) {
                        echo 'disabled';
                    } ?>/>

                </div>


                <div id="cal-9" style="width: 50%;float: left;">
                    <input id="date-Miladi9" name="tamin_date_m" class="form-control bottom-input  "
                           type="text" onfocus="showCal9();"
                           style=" width: 100%;float: right" <?php if ($type_tamin__medicine != 1) {
                        echo 'disabled';
                    } ?>/>

                </div>
            </div>

            <div class="form-group text-center col-xs-12">
                <!--                <button type="submit" id="manage" name="manage" value="manage"-->
                <!--                        onclick="insert_manage_Data();" class="btn btn-purble w-md m-b-5">-->
                <!--                    <span><i class="fa fa-floppy-o"></i></span> حفظ-->
                <!--                </button>-->

                <button type="submit" id="manage" name="manage" value="manage"
                        onclick="insert_manage_Data();" class="btn btn-labeled btn-success "
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                </button>
            </div>


        </div>
        
        
        <!----------------------------------------------------------------------------------------------------------------->
        <?php $data_load["personal_data"] = $personal_data;
        $this->load->view('admin/Human_resources/sidebar_person_data', $data_load); ?>
        <!----------------------------------------------------------------------------------------------------------------->
        
                
        
        
        
    </div>
</div>

<!-- yara -->
<div class="modal fade" id="Modal_mo2hl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">  المؤهلات العلميه </h4>
            </div>
            <div class="modal-body">


                <div id="mo2hl_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input1').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة 
                                     مؤهل
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input1" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">المؤهل </label>
                                    <input type="text" name="mo2hl" id="mo2hl" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_mo2hl" style="display: block;">
                                    <button type="button" onclick="add_mo2hl($('#mo2hl').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_mo2hl" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_mo2hl">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha1"><br><br>
                   
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-- yara -->
<!-- yara -->
<div class="modal fade" id="Modal_esdar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> اسباب حالات الموظفين </h4>
            </div>
            <div class="modal-body">


                <div id="esdar_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input11').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة 
                                    اسباب حالات الموظفين
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input11" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">اسباب حالات الموظفين </label>
                                    <input type="text" name="reason_fk" id="reason_fk" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_esdar" style="display: block;">
                                    <button type="button" onclick="add_reason($('#reason_fk').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_esdar" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_esdar">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha11"><br><br>
                   
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<!-- yara -->
<div class="modal fade" id="Modal_family" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> اضافه الدرجه العلميه </h4>
            </div>
            <div class="modal-body">


                <div id="geha_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة 
                                    الدرجه العلميه
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">الدرجه العلميه </label>
                                    <input type="text" name="employee_degree_fk" id="employee_degree_fk" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add" style="display: block;">
                                    <button type="button" onclick="add_employee_degree($('#employee_degree_fk').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha"><br><br>
                  
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- yara -->
<!-- yara -->
<div class="modal fade" id="Modal_work_maktb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">  مكتب العمل </h4>
            </div>
            <div class="modal-body">


                <div id="work_maktb_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input111').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة 
                                    مكتب العمل
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input111" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">مكتب العمل </label>
                                    <input type="text" name="work_maktb_fk" id="work_maktb_fk" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_work_maktb" style="display: block;">
                                    <button type="button" onclick="add_work_maktb($('#work_maktb_fk').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_work_maktb" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_work_maktb">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha111"><br><br>
                   
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- yara -->
<div class="modal fade" id="Modal_tamin_company" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">  شركه التأمين  </h4>
            </div>
            <div class="modal-body">


                <div id="tamin_company_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input1111').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة 
                                    شركه التأمين 
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input1111" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">شركه التأمين </label>
                                    <input type="text" name="tamin_company_fk" id="tamin_company_fk" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_tamin_company" style="display: block;">
                                    <button type="button" onclick="add_tamin_company($('#tamin_company_fk').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_tamin_company" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_tamin_company">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha1111"><br><br>
                   
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>









<script type="text/javascript">
    jQuery(function ($) {
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>


<script>
    function changeAqdStatus(value) {
        if (value == 1) {
            document.getElementById('end_contract_date').removeAttribute("disabled", "disabled");
            document.getElementById('end_contract_date').setAttribute("data-validation", "required");
        } else if (value == 0) {
            document.getElementById('end_contract_date').setAttribute("disabled", "disabled");
            document.getElementById('end_contract_date').removeAttribute("data-validation", "required");
            $('#start_work_date').val('');
            $('#end_contract_date').val('');
        } else {
            document.getElementById('end_contract_date').setAttribute("disabled", "disabled");
            document.getElementById('end_contract_date').removeAttribute("data-validation", "required");
            $('#start_work_date').val('');
            $('#end_contract_date').val('');
        }
    }

    function change_service_end(value) {   /// 1 active

        if (value == 1) {
            document.getElementById('end_service_date').setAttribute("disabled", "disabled");
            document.getElementById('end_service_date').removeAttribute("data-validation", "required");
        } else if (value == 2) {
            document.getElementById('end_service_date').removeAttribute("disabled", "disabled");
            document.getElementById('end_service_date').setAttribute("data-validation", "required");
        } else {
            document.getElementById('end_service_date').removeAttribute("disabled", "disabled");
            document.getElementById('end_service_date').setAttribute("data-validation", "required");
        }
    }

</script>

<script>
    function get_halt_tamin(valu) {
        if (valu == 2) {
            document.getElementById('work_maktb').setAttribute("disabled", "disabled");
            document.getElementById('tamin3').setAttribute("disabled", "disabled");
            document.getElementById('start_tamin_date').setAttribute("disabled", "disabled");
            $('#work_maktb').val('');
            $('#tamin3').val('');
            $('#start_tamin_date').val('');
        }
        if (valu == 1) {
            document.getElementById('work_maktb').removeAttribute("disabled", "disabled");
            document.getElementById('tamin3').removeAttribute("disabled", "disabled");
            document.getElementById('start_tamin_date').removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function get_medicine_tamin(valu2) {
        if (valu2 == 2) {
            document.getElementById('tamin_company').setAttribute("disabled", "disabled");
            document.getElementById('tamin_medicine_num').setAttribute("disabled", "disabled");
            document.getElementById('polica_num').setAttribute("disabled", "disabled");
            document.getElementById('tamin_type').setAttribute("disabled", "disabled");
            document.getElementById('tamin_date').setAttribute("disabled", "disabled");
            $('#tamin_company').val('');
            $('#tamin_medicine_num').val('');
            $('#polica_num').val('');
            $('#tamin_type').val('');
            $('#tamin_date').val('');
        }
        if (valu2 == 1) {
            document.getElementById('tamin_company').removeAttribute("disabled", "disabled");
            document.getElementById('tamin_medicine_num').removeAttribute("disabled", "disabled");
            document.getElementById('polica_num').removeAttribute("disabled", "disabled");
            document.getElementById('tamin_type').removeAttribute("disabled", "disabled");
            document.getElementById('tamin_date').removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function get_halt_emp(valu) {
        if (valu == 1) {
            $('#reason').val('');
            document.getElementById('reason').setAttribute("disabled", "disabled");
        }
        if (valu == 2) {
            document.getElementById('reason').removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function lood(num) {
        if (num > 0 && num != '') {
            var id = num;
            var dataString = 'admin_num=' + id;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/radwa/Rawda',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#department3").html(html);
                }
            });
            return false;
        }
    }
</script>


<script>

    function get_manager_cat(valu) {
        if (valu == 1 || valu == 2) {
            document.getElementById('department3').setAttribute("disabled", "disabled");
            $('#department3').val('');

        } else {
            document.getElementById('department3').removeAttribute("disabled", "disabled");

        }
    }
</script>


<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
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
            <?php if (isset($emp->start_work_date_m) && !empty($emp->start_work_date_m)) {  ?>
            loop1++;
            date1.value = '<?=$emp->start_work_date_m?>';
            date2.value = '<?=$emp->start_work_date_h?>';
            <?php }else{ ?>
            date1.value = cal1.getDate().getDateString();
            date2.value = cal2.getDate().getDateString();
            <?php } ?>
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


</script>
<script>

    var loop2 = 0;
    var cal3 = new Calendar(),
        cal4 = new Calendar(true, 0, true, true),
        date3 = document.getElementById('date-Miladi3'),
        date4 = document.getElementById('date-Hijri4'),
        cal3Mode = cal3.isHijriMode(),
        cal4Mode = cal4.isHijriMode();


    date3.setAttribute("value", cal3.getDate().getDateString());
    date4.setAttribute("value", cal4.getDate().getDateString());

    document.getElementById('cal-3').appendChild(cal3.getElement());
    document.getElementById('cal-4').appendChild(cal4.getElement());


    cal3.show();
    cal4.show();
    setDateFields3();


    cal3.callback = function () {
        if (cal3Mode !== cal3.isHijriMode()) {
            cal4.disableCallback(true);
            cal4.changeDateMode();
            cal4.disableCallback(false);
            cal3Mode = cal3.isHijriMode();
            cal4Mode = cal4.isHijriMode();
        } else

            cal4.setTime(cal3.getTime());
        setDateFields3();
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
        setDateFields3();
    };


    cal3.onHide = function () {
        cal3.show(); // prevent the widget from being closed
    };

    cal4.onHide = function () {
        cal4.show(); // prevent the widget from being closed
    };

    function setDateFields3() {
        if (loop2 === 0) {
            <?php if (isset($emp->end_contract_date_m) && !empty($emp->end_contract_date_m)) {  ?>
            loop2++;
            date3.value = '<?=$emp->end_contract_date_m?>';
            date4.value = '<?=$emp->end_contract_date_h?>';
            <?php }else{ ?>
            date3.value = cal3.getDate().getDateString();
            date4.value = cal4.getDate().getDateString();
            <?php } ?>
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
        date5 = document.getElementById('date-Miladi5'),
        date6 = document.getElementById('date-Hijri6'),
        cal5Mode = cal5.isHijriMode(),
        cal6Mode = cal6.isHijriMode();


    date5.setAttribute("value", cal5.getDate().getDateString());
    date6.setAttribute("value", cal6.getDate().getDateString());

    document.getElementById('cal-5').appendChild(cal5.getElement());
    document.getElementById('cal-6').appendChild(cal6.getElement());


    cal5.show();
    cal6.show();
    setDateFields5();


    cal5.callback = function () {
        if (cal5Mode !== cal5.isHijriMode()) {
            cal6.disableCallback(true);
            cal6.changeDateMode();
            cal6.disableCallback(false);
            cal5Mode = cal5.isHijriMode();
            cal6Mode = cal6.isHijriMode();
        } else

            cal6.setTime(cal5.getTime());
        setDateFields5();
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
        setDateFields5();
    };


    cal5.onHide = function () {
        cal5.show(); // prevent the widget from being closed
    };

    cal6.onHide = function () {
        cal6.show(); // prevent the widget from being closed
    };

    function setDateFields5() {
        if (loop3 === 0) {
            <?php if (isset($emp->end_service_date_m) && !empty($emp->end_service_date_m)) {  ?>
            loop3++;
            date5.value = '<?=$emp->end_service_date_m?>';
            date6.value = '<?=$emp->end_service_date_h?>';
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

    var loop4 = 0;
    var cal7 = new Calendar(),
        cal8 = new Calendar(true, 0, true, true),
        date7 = document.getElementById('date-Miladi7'),
        date8 = document.getElementById('date-Hijri8'),
        cal7Mode = cal7.isHijriMode(),
        cal8Mode = cal8.isHijriMode();


    date7.setAttribute("value", cal7.getDate().getDateString());
    date8.setAttribute("value", cal8.getDate().getDateString());

    document.getElementById('cal-7').appendChild(cal7.getElement());
    document.getElementById('cal-8').appendChild(cal8.getElement());


    cal7.show();
    cal8.show();
    setDateFields7();


    cal7.callback = function () {
        if (cal7Mode !== cal7.isHijriMode()) {
            cal8.disableCallback(true);
            cal8.changeDateMode();
            cal8.disableCallback(false);
            cal7Mode = cal7.isHijriMode();
            cal8Mode = cal8.isHijriMode();
        } else

            cal8.setTime(cal7.getTime());
        setDateFields7();
    };

    cal8.callback = function () {
        if (cal8Mode !== cal8.isHijriMode()) {
            cal7.disableCallback(true);
            cal7.changeDateMode();
            cal7.disableCallback(false);
            cal7Mode = cal7.isHijriMode();
            cal8Mode = cal8.isHijriMode();
        } else

            cal7.setTime(cal8.getTime());
        setDateFields7();
    };


    cal7.onHide = function () {
        cal7.show(); // prevent the widget from being closed
    };

    cal8.onHide = function () {
        cal8.show(); // prevent the widget from being closed
    };

    function setDateFields7() {
        if (loop4 === 0) {
            <?php if (isset($emp->start_tamin_date_m) && !empty($emp->start_tamin_date_m)) {  ?>
            loop4++;
            date7.value = '<?=$emp->start_tamin_date_m?>';
            date8.value = '<?=$emp->start_tamin_date_h?>';
            <?php }else{ ?>
            date7.value = cal7.getDate().getDateString();
            date8.value = cal8.getDate().getDateString();
            <?php } ?>
        } else {
            date7.value = cal7.getDate().getDateString();
            date8.value = cal8.getDate().getDateString();
        }
        date7.setAttribute("value", cal7.getDate().getDateString());
        date8.setAttribute("value", cal8.getDate().getDateString());
    }

    function showCal7() {
        if (cal7.isHidden())
            cal7.show();
        else
            cal7.hide();
    }

    function showCal8() {
        if (cal8.isHidden())
            cal8.show();
        else
            cal8.hide();
    }


</script>


<script>

    var loop5 = 0;
    var cal9 = new Calendar(),
        cal10 = new Calendar(true, 0, true, true),
        date9 = document.getElementById('date-Miladi9'),
        date10 = document.getElementById('date-Hijri10'),
        cal9Mode = cal9.isHijriMode(),
        cal10Mode = cal10.isHijriMode();


    date9.setAttribute("value", cal9.getDate().getDateString());
    date10.setAttribute("value", cal10.getDate().getDateString());

    document.getElementById('cal-9').appendChild(cal9.getElement());
    document.getElementById('cal-10').appendChild(cal10.getElement());


    cal9.show();
    cal10.show();
    setDateFields9();


    cal9.callback = function () {
        if (cal9Mode !== cal9.isHijriMode()) {
            cal10.disableCallback(true);
            cal10.changeDateMode();
            cal10.disableCallback(false);
            cal9Mode = cal9.isHijriMode();
            cal10Mode = cal10.isHijriMode();
        } else

            cal10.setTime(cal9.getTime());
        setDateFields9();
    };

    cal10.callback = function () {
        if (cal10Mode !== cal10.isHijriMode()) {
            cal9.disableCallback(true);
            cal9.changeDateMode();
            cal9.disableCallback(false);
            cal9Mode = cal9.isHijriMode();
            cal10Mode = cal10.isHijriMode();
        } else

            cal9.setTime(cal10.getTime());
        setDateFields9();
    };


    cal9.onHide = function () {
        cal9.show(); // prevent the widget from being closed
    };

    cal10.onHide = function () {
        cal10.show(); // prevent the widget from being closed
    };

    function setDateFields9() {
        if (loop5 === 0) {
            <?php if (isset($emp->tamin_date_m) && !empty($emp->tamin_date_m)) {  ?>
            loop5++;
            date9.value = '<?=$emp->tamin_date_m?>';
            date10.value = '<?=$emp->tamin_date_h?>';
            <?php }else{ ?>
            date9.value = cal9.getDate().getDateString();
            date10.value = cal10.getDate().getDateString();
            <?php }?>
        } else {
            date9.value = cal9.getDate().getDateString();
            date10.value = cal10.getDate().getDateString();
        }
        date9.setAttribute("value", cal9.getDate().getDateString());
        date10.setAttribute("value", cal10.getDate().getDateString());
    }

    function showCal9() {
        if (cal9.isHidden())
            cal9.show();
        else
            cal9.hide();
    }

    function showCal10() {
        if (cal10.isHidden())
            cal10.show();
        else
            cal10.hide();
    }


</script>
       <script>
            function get_direct_manger(depart_id) {

                if (depart_id > 0 && depart_id != '') {
                    var id = depart_id;
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>human_resources/radwa/Rawda/get_direct_manger',
                        data: {depart_id: depart_id},
                        dataType: 'html',
                        cache: false,
                        success: function (res) {
                            var mangers = JSON.parse(res);
                            // console.log(mangers);
                            if (mangers == 0) {
                                swal({
                                    title: "لا يوجد مدراء مباشرين لهذه الادارة!! ",
                                    text: "من فضلك توجه للاعداد واضف مداراء",
                                    type: "warning",
                                    confirmButtonClass: "btn-warning",
                                    confirmButtonText: "تم",
                                    closeOnConfirm: true
                                });
                                $('#manger').empty();
                            } else {
                                // console.log(mangers.length);
                                var options = '';
                                for (var i = 0; i < mangers.length; i++) {
                                    options += '<option value="' + mangers[i].emp_id_fk + '" data-type="' + mangers[i].emp_type + '">' + mangers[i].empolyee_name + '</option>';
                                }
                                // console.log('options:' + options);
                                $('#manger').html(options);
                                $('#manger_type').val(mangers[0].emp_type);
                            }
                        }
                    });
                    return false;
                }

            }
        </script>
        <!-- ؟yara -->
        <script>
    function get_details_reason() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/Human_resources/load_reason",
            
            // beforeSend: function () {
            //     $('#myDiv_geha11').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha11').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_reason(value,id) {


        $('#reason').val(id);
        $('#reason_name').val(value);

        $('#Modal_esdar').modal('hide');
    }
</script>
<script>
  
  function add_reason(value) {

      $('#div_update_esdar').hide();
      $('#div_add_esdar').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'reason_fk=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>human_resources/Human_resources/add_reason',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#reason_fk').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ بنجاح!",


      }
      );
      get_details_reason();

              }
          });
      }

  }


</script>
<script>
    function update_reason(id) {
        var id = id;
        $('#geha_input11').show();
        $('#div_add_esdar').hide();
        $('#div_update_esdar').show();


        $.ajax({
            url: "<?php echo base_url() ?>human_resources/Human_resources/getById_reason",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               // console.log(obj.title_setting);

                $('#reason_fk').val(obj.title_setting);


            }

        });

        $('#update_esdar').on('click', function () {
            var reason_fk = $('#reason_fk').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>human_resources/Human_resources/update_reason",
                type: "Post",
                dataType: "html",
                data: {reason_fk: reason_fk,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#reason_fk').val('');
                    $('#div_update_esdar').hide();
                    $('#div_add_esdar').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_reason();    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_reason(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
             var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/delete_reason',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#reason_fk').val('');
                   // $('#Modal_esdar').modal('hide');
                  
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );
        get_details_reason();

                }
            });
        }

    }
</script>
<!-- yara -->
<script>
    function get_details_mo2hl() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/load_mo2hl",
            
            // beforeSend: function () {
            //     $('#myDiv_geha1').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha1').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_mo2hl(value,id) {


        $('#moahel_3elmi_fk').val(id);

        $('#moahel_3elmi_name').val(value);
        $('#Modal_mo2hl').modal('hide');
    }
</script>
<script>
  
  function add_mo2hl(value) {

      $('#div_update_mo2hl').hide();
      $('#div_add_mo2hl').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'mo2hl=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/add_mo2hl',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#mo2hl').val('');
              //  $('#Modal_mo2hl').modal('hide');
                  swal({
                      title: "تم الحفظ بنجاح!",


      }
      );
      get_details_mo2hl();
              }
          });
      }

  }


</script>
<script>
    function update_mo2hl(id) {
        var id = id;
        $('#geha_input1').show();
        $('#div_add_mo2hl').hide();
        $('#div_update_mo2hl').show();


        $.ajax({
            url: "<?php echo base_url() ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/getById_mo2hl",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               // console.log(obj.title_setting);

                $('#mo2hl').val(obj.title_setting);


            }

        });

        $('#update_mo2hl').on('click', function () {
            var mo2hl = $('#mo2hl').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/update_mo2hl",
                type: "Post",
                dataType: "html",
                data: {mo2hl: mo2hl,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#mo2hl').val('');
                    $('#div_update_mo2hl').hide();
                    $('#div_add_mo2hl').show();
                   // $('#Modal_mo2hl').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_mo2hl();     

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_mo2hl(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
             var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/delete_mo2hl',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#mo2hl').val('');
                    //$('#Modal_mo2hl').modal('hide');
                  
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );
        get_details_mo2hl();

                }
            });
        }

    }
</script>
<!-- yara -->
<!-- yara -->
<script>
    function get_details_employee_degree() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/Human_resources/load_employee_degree",
            
            // beforeSend: function () {
            //     $('#myDiv_geha').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha').html(d);

            }

        });
    }
</script>
<script>
    function getTitle(value,id) {


        $('#employee_degree').val(id);
        $('#employee_degree_name').val(value);

        $('#Modal_family').modal('hide');
    }
</script>
<script>
  
    function add_employee_degree(value) {

        $('#div_update').hide();
        $('#div_add').show();
        //  alert(value);

       
        if (value != 0 && value != '' ) {
            var dataString = 'employee_degree_fk=' + value ;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/add_employee_degree',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {

                  //  $('#reason').val(' ');
                  $('#employee_degree_fk').val('');
                //  $('#Modal_family').modal('hide');
                    swal({
                        title: "تم الحفظ بنجاح!",
  
  
        }
        );
        get_details_employee_degree();
                }
            });
        }

    }


</script>
<script>
    function update_employee_degree(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add').hide();
        $('#div_update').show();


        $.ajax({
            url: "<?php echo base_url() ?>human_resources/Human_resources/getById_employee_degree",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               // console.log(obj.title_setting);

                $('#employee_degree_fk').val(obj.title_setting);


            }

        });

        $('#update').on('click', function () {
            var employee_degree_fk = $('#employee_degree_fk').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>human_resources/Human_resources/update_employee_degree",
                type: "Post",
                dataType: "html",
                data: {employee_degree_fk: employee_degree_fk,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#employee_degree_fk').val('');
                    $('#div_update').hide();
                    $('#div_add').show();
                   // $('#Modal_family').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_employee_degree();
                    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_employee_degree(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
        var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/delete_employee_degree',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#employee_degree_fk').val('');
                   // $('#Modal_family').modal('hide');
                  
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );
        get_details_employee_degree();

                }
            });
        }

    }
</script>
<!-- مكتب العمل -->
<script>
    function get_details_work_maktb() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/Human_resources/load_work_maktb",
            
            // beforeSend: function () {
            //     $('#myDiv_geha11').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha111').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_work_maktb(value,id) {


        $('#work_maktb').val(id);
        $('#work_maktb_name').val(value);

        $('#Modal_work_maktb').modal('hide');
    }
</script>
<script>
  
  function add_work_maktb(value) {

      $('#div_update_work_maktb').hide();
      $('#div_add_work_maktb').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'work_maktb_fk=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>human_resources/Human_resources/add_work_maktb',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#work_maktb_fk').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ بنجاح!",


      }
      );
      get_details_work_maktb();

              }
          });
      }

  }


</script>
<script>
    function update_work_maktb(id) {
        var id = id;
        $('#geha_input111').show();
        $('#div_add_work_maktb').hide();
        $('#div_update_work_maktb').show();


        $.ajax({
            url: "<?php echo base_url() ?>human_resources/Human_resources/getById_work_maktb",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title_setting);

                $('#work_maktb_fk').val(obj.title_setting);


            }

        });

        $('#update_work_maktb').on('click', function () {
            var work_maktb_fk = $('#work_maktb_fk').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>human_resources/Human_resources/update_work_maktb",
                type: "Post",
                dataType: "html",
                data: {work_maktb_fk: work_maktb_fk,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#work_maktb_fk').val('');
                    $('#div_update_work_maktb').hide();
                    $('#div_add_work_maktb').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_work_maktb();    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_work_maktb(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
             var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/delete_work_maktb',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#work_maktb_fk').val('');
                   // $('#Modal_esdar').modal('hide');
                  
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );
        get_details_work_maktb();

                }
            });
        }

    }
</script>
<!-- شركه التامين -->
<script>
    function get_details_tamin_company() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/Human_resources/load_tamin_company",
            
            // beforeSend: function () {
            //     $('#myDiv_geha11').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha1111').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_tamin_company(value,id) {


        $('#tamin_company').val(id);
        $('#tamin_company_name').val(value);

        $('#Modal_tamin_company').modal('hide');
    }
</script>
<script>
  
  function add_tamin_company(value) {

      $('#div_update_tamin_company').hide();
      $('#div_add_tamin_company').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'tamin_company_fk=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>human_resources/Human_resources/add_tamin_company',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#tamin_company_fk').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ بنجاح!",


      }
      );
      get_details_tamin_company();

              }
          });
      }

  }


</script>
<script>
    function update_tamin_company(id) {
        var id = id;
        $('#geha_input1111').show();
        $('#div_add_tamin_company').hide();
        $('#div_update_tamin_company').show();


        $.ajax({
            url: "<?php echo base_url() ?>human_resources/Human_resources/getById_tamin_company",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title_setting);

                $('#tamin_company_fk').val(obj.title_setting);


            }

        });

        $('#update_tamin_company').on('click', function () {
            var tamin_company_fk = $('#tamin_company_fk').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>human_resources/Human_resources/update_tamin_company",
                type: "Post",
                dataType: "html",
                data: {tamin_company_fk: tamin_company_fk,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#tamin_company_fk').val('');
                    $('#div_update_tamin_company').hide();
                    $('#div_add_tamin_company').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_tamin_company();    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_tamin_company(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
             var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/delete_tamin_company',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#tamin_company_fk').val('');
                   // $('#Modal_esdar').modal('hide');
                  
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );
        get_details_tamin_company();

                }
            });
        }

    }
</script>