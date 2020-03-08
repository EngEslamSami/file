
<style>

    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text{
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1{
        background-color:#eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text{
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation{
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric{
        color: red;
        font-size: 25px;
        position: absolute;
    }
    .help-block.form-error{
        color: #a94442  !important;
        font-size: 11px !important;
        position: absolute !important;
        bottom: -23px !important ;
        right: 50% !important ;
    }
</style>
<?php
if(isset($result) && $result!=null){
    $w_name= $result[0]->w_name;
    $relationship_id_fk=  $result[0]->relationship_id_fk;
    $w_mob=  $result[0]->w_mob;
    $w_national_id_type=  $result[0]->w_national_id_type;
    $w_card_source=  $result[0]->w_card_source;
    $w_national_id=  $result[0]->w_national_id;
    $w_birth_date=  $result[0]->w_birth_date;
    $w_birth_date_hijri=  $result[0]->w_birth_date_hijri;
    $w_birth_date_hijri_year=  $result[0]->w_birth_date_hijri_year;
    $w_birth_date_year=  $result[0]->w_birth_date_year;
    $w_want_work =  $result[0]->w_want_work;
    $job=  $result[0]->job;
    $w_job_id_fk =$result[0]->w_job_id_fk;
    $job_place=  $result[0]->job_place;
    $employer=$result[0]->employer;
    $job_mob=  $result[0]->job_mob;
    $salary=   $result[0]->salary;
    $guaranted=  $result[0]->guaranted;
    $persons_num=  $result[0]->persons_num;
    $w_national_img=  $result[0]->w_national_img;
    $id = $result[0]->id;
    $w_marital_status_id_fk = $result[0]->w_marital_status_id_fk;




}else{

    $w_name="";
    $relationship_id_fk="";
    $w_mob="";
    $w_national_id_type="";
    $w_card_source="";
    $w_national_id="";
    $w_birth_date="";
    $w_birth_date_hijri="";
    $w_birth_date_hijri_year="";
    $w_birth_date_year="";
    $w_want_work = '';
    $job="";
    $w_job_id_fk="";
    $job_place="";
    $employer="";
    $job_mob="";
    $salary="";
    $guaranted="";
    $persons_num="";
    $w_national_img ='';
    $w_marital_status_id_fk='';
    $id = '';
}
?>
<div class="col-xs-12 " >
    <?php
    $this->load->model("familys_models/Register");
    $data_load["basic_data_family"] = $basic_data_family;
    $data_load["mother_num"] = $this->uri->segment(4);
    $data_load["person_account"] = $basic_data_family["person_account"];
    $data_load['FamilyOperationsPermissions'] = $this->Register->getFamilyOperationsPermissions()[0];
    $data_load["agent_bank_account"] = $basic_data_family["agent_bank_account"];
    $data_load["file_num"] = $basic_data_family["file_num"];
    $this->load->view('admin/familys_views/drop_down_button', $data_load); ?>


    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?>  </h3>
        </div>
        <div class="panel-body">

            <?php echo form_open_multipart('family_controllers/Family/add_wakel/'.$this->uri->segment(4).'');?>


            <div class="col-sm-12 col-xs-12">

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> رقم السجل المدني للاب  </label>
                    <input type="text"
                           disabled class="form-control half input-style"
                           value="<?php if(!empty($father->f_national_id)){ echo $father->f_national_id; }  ?>" />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> اسم الاب الرباعي  </label>
                    <input type="text"
                           disabled class="form-control half input-style"
                           value="<?php if(!empty($father->full_name)){ echo $father->full_name; }  ?>" />
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> إسم الوكيل رباعي  <strong class="astric">*</strong><strong></strong></label>
                    <input type="text" name="w_name"
                           data-validation="required"  class="form-control half input-style" value="<?php echo $w_name;?>" />
                </div>


            </div>





            <div class="col-sm-12 col-xs-12">

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الهوية<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="w_national_id" maxlength="10"
                           id="w_national_id" data-validation="required"
                           onkeyup="check_length_num(this,10,'w_national_id_span');"
                           value="<?php echo $w_national_id; ?>" onkeypress="validate_number(event)"
                           class="form-control half input-style" />
                    <span  id="w_national_id_span" class="span-validation"> </span>
                </div>


                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">نوع الهوية<strong class="astric">*</strong><strong></strong> </label>
                    <select  name="w_national_id_type" class="selectpicker no-padding form-control choose-date form-control half"
                             data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                        <?php if(isset($national_id_array) && $national_id_array!=null &&!empty($national_id_array)){?>
                            <option value="">اختر</option>
                            <?php

                            foreach ($national_id_array as $row2):
                                $selected='';if($row2->id_setting==$w_national_id_type){$selected='selected';}	?>
                                <option value="<?php  echo $row2->id_setting;?>" <?php echo $selected?>  ><?php  echo $row2->title_setting;?></option>
                            <?php  endforeach;?>
                        <?php }else { ?>
                            <option value="" selected>اختر</option>
                            <option value="<?php  echo $row2->id_setting;?>" <?php echo $selected?>  ><?php  echo $row2->title_setting;?></option>
                            <?php
                        }

                        ?>
                    </select>
                </div>


                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">مصدر الهوية<strong class="astric">*</strong><strong></strong> </label>
                    <select  name="w_card_source" id="w_card_source"
                             class="selectpicker no-padding form-control choose-date form-control half"
                             data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true">
                        <option value="">إختر</option>
                        <?php if(!empty($id_source)){ foreach ($id_source as $record){
                            $select=''; if($w_card_source==$record->id_setting){$select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>"
                                <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>


            </div>
            <div class="col-sm-12 col-xs-12">

                <div class="form-group col-sm-4 col-xs-12">
                    <?php      if(!empty($w_birth_date_hijri)){
                        $hijri_date=explode('/',$w_birth_date_hijri); }?>
                    <label class="label label-green  half">تاريخ الميلاد هجرى<strong class="astric">*</strong> </label>
                    <input class="textbox form-control" type="text" name="HDay" pattern="\d*" onkeypress="return isNumberKey(event)"
                           onkeyup="moveOnMax(this,document.getElementById('Hmonth'))"
                           value="<?php if(!empty($hijri_date[0])){ echo $hijri_date[0];}?>"
                           placeholder="day"  id="HDay" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                    <input class="textbox form-control" type="text" name="HMonth" pattern="\d*"
                           onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('HYear'))"
                           value="<?php  if(!empty($hijri_date[1])){ echo $hijri_date[1];}?>"  placeholder="month"
                           id="Hmonth" size="20" maxlength="2" style="width: 16.6%;float: right;"/>
                    <input class="textbox4 form-control" type="text" name="HYear" pattern="\d*"
                           onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form);getAge();"
                           value="<?php if(!empty($hijri_date[2])){ echo $hijri_date[2];}?>"  placeholder="year"
                           id="HYear" size="20" maxlength="4"  style="width: 16.6%;float: right;"/>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <?php
                    if(!empty($w_birth_date)){
                        $gregorian_date=explode('/',$w_birth_date); }  ?>
                    <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong> </label>
                    <input class="textbox form-control" type="text" name="CDay"pattern="\d*"
                           onkeypress="return isNumberKey(event)"  onkeyup="moveOnMax(this,document.getElementById('CMonth'))"
                           placeholder="day"  id="CDay" size="20" maxlength="2" autofocus style="width: 16.6%;float: right;"
                           value="<?php if(!empty($gregorian_date[0])){ echo $gregorian_date[0]; } ?>"/>
                    <input class="textbox form-control" type="text" name="CMonth" pattern="\d*"
                           onkeypress="return isNumberKey(event)" onkeyup="moveOnMax(this,document.getElementById('CYear'))"
                           placeholder="month" id="CMonth" size="20" maxlength="2"  style="width: 16.6%;float: right;"
                           value="<?php if(!empty($gregorian_date[1])){ echo $gregorian_date[1]; }?>"/>
                    <input class="textbox4 form-control" type="text" name="CYear"  id="CYear" pattern="\d*"
                           onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"
                           placeholder="year"  id="CYear" size="20" maxlength="4" style="width: 16.6%;float: right;"
                           value="<?php if(!empty($gregorian_date[2])){ echo $gregorian_date[2]; }?>"/>
                </div>


                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">العمر<strong class="astric">*</strong><strong></strong> </label>
                    <input class="textbox2 form-control half " type="text" name="age" id="myage" id="wd"
                           value="<?php
                           if(!empty($current_year) && !empty($w_birth_date_hijri_year)){
                               echo $current_year  - $w_birth_date_hijri_year;

                           } ?>" readonly />
                    <input class="textbox2 form-control half hidden" type="number" name="wd" size="60"
                           id="wd" readonly />
                    <input class="textbox2 hidden" type="text" name="JD"  size="60" id="JD" readonly />
                </div>

            </div>


            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الصلة<strong class="astric">*</strong><strong></strong> </label>
                    <select name="relationship_id_fk" id="relationship_id_fk"  data-validation="required" aria-required="true"
                            class="selectpicker no-padding form-control choose-date form-control half">
                        <option value="">إختر</option>
                        <?php if(!empty($relationships)){ foreach ($relationships as $record){
                            $select=''; if($relationship_id_fk ==$record->id_setting){$select='selected'; }
                            ?>
                            <option value="<?php echo $record->id_setting;?>" <?php echo $select;?>><?php echo $record->title_setting;?></option>
                        <?php  } } ?>
                    </select>
                </div>


                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الحالة الإجتماعية<strong class="astric">*</strong><strong></strong> </label>
                    <select name="w_marital_status_id_fk" id="w_marital_status_id_fk"  data-validation="required" aria-required="true"
                            onchange="getGuaranted(this.value)"    class="selectpicker no-padding form-control choose-date form-control half">
                        <option value="">إختر</option>
                        <?php foreach ($marital_status_array as $row6):
                            $selected='';if($row6->id_setting==$w_marital_status_id_fk){$selected='selected';}   ?>
                            <option value="<?php  echo $row6->id_setting;?>"  <?php echo $selected?>  ><?php  echo $row6->title_setting;?></option>
                        <?php  endforeach;?>
                    </select>
                </div>


                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">رقم الجوال <strong class="astric">*</strong><strong></strong> </label>
                    <input type="text"  onkeypress="validate_number(event)" maxlength="10" name="w_mob"
                           value="<?php echo $w_mob;?>"   id="w_mob"
                           class="form-control half input-style" data-validation="required"
                           onkeyup="check_length_num(this,10,'w_mob_span');"  />
                    <span  id="w_mob_span" class="span-validation"> </span>
                </div>




            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">الحياة العملية<strong class="astric">*</strong><strong></strong> </label>
                    <select id="w_want_work" name="w_want_work" class=" no-padding form-control choose-date form-control half"
                            onchange="checkJob(this.value)"
                            data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >
                        <?php $arr_job=array(1=>'يعمل',0=>'لا يعمل'); ?>
                        <option value="">اختر</option>
                        <?php for($a=0;$a<sizeof($arr_job);$a++){
                            $selected="";
                            if($job !=''){
                                if($a == $w_want_work){$selected="selected";} } ?>
                            <option value="<?php echo $a ; ?>" <?php echo $selected?> ><?php echo$arr_job[$a];?></option>
                        <?php }?>
                    </select>
                </div>


                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> المهنة  <strong class="astric">*</strong><strong></strong></label>
                    <select  name="w_job_id_fk" id="w_job_id_fk"
                             class=" no-padding form-control choose-date form-control half "
                             aria-required="true"  <?php if($w_want_work !=1){?> disabled="disabled" <?php }?> >
                        <option value="">اختر</option>
                        <?php
                        foreach ($job_titles as $value):
                            $selected='';if($value->id_setting==$w_job_id_fk){$selected='selected';}	?>
                            <option value="<?php  echo $value->id_setting; ?>"  <?php echo $selected?> ><?php  echo $value->title_setting;?></option>
                        <?php  endforeach;?>
                        <option value="0">أخري</option>
                    </select>
                </div>


                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> إسم جهة العمل  <strong class="astric">*</strong><strong></strong></label>
                    <input type="text" name="employer" <?php if($w_want_work!=1){echo 'disabled';}?> id="employer"
                           class="form-control half input-style" value="<?php echo $employer;?>" />
                </div>




            </div>

            <div class="col-sm-12 col-xs-12">

                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> مكان العمل  <strong class="astric">*</strong><strong></strong></label>
                    <input type="text" name="job_place" <?php if($w_want_work!=1){echo 'disabled';}?> id="job_place"
                           class="form-control half input-style" value="<?php echo $job_place;?>" />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> هاتف العمل  <strong class="astric">*</strong><strong></strong></label>
                    <input type="text" name="job_mob"  id="job_mob" <?php if($w_want_work!=1){echo 'disabled';}?> onkeypress="validate_number(event)"
                           onkeyup="check_length_num(this,10,'job_mob_span');" maxlength="10"
                           class="form-control half input-style" value="<?php echo $job_mob;?>" />
                    <span  id="job_mob_span" class="span-validation"> </span>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half"> الدخل الشهري   <strong class="astric">*</strong><strong></strong></label>
                    <input type="text" name="salary"  id="salary" <?php if($w_want_work !=1){echo 'disabled';}?> onkeypress="validate_number(event)"
                           class="form-control half input-style"  value="<?php echo $salary;?>" />
                </div>



            </div>

            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">هل يعول<strong class="astric">*</strong><strong></strong> </label>
                    <select id="guaranted" name="guaranted" class=" no-padding form-control choose-date form-control half"
                            onchange="checkGuaranted(this.value)"
                            data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >
                        <?php $arr_guaranted=array(1=>'نعم',0=>'لا'); ?>
                        <option value="">اختر</option>
                        <?php for($a=0;$a<sizeof($arr_guaranted);$a++){
                            $selected="";
                            if($guaranted !=''){
                                if($a == $guaranted){$selected="selected";} } ?>
                            <option value="<?php echo $a ; ?>" <?php echo $selected?> ><?php echo$arr_guaranted[$a];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">عدد الأفراد<strong class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="persons_num" id="persons_num"  onkeypress="validate_number(event)"
                        <?php if($guaranted!=1){echo 'disabled';}?> value="<?php echo $persons_num;?>"  class="form-control half input-style" />
                </div>
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">صورة الهوية </label>
                    <input type="file" name="w_national_img" class="form-control half"/>
                    <small class="small" style="bottom:-13px;">
                        <?php if (!empty($w_national_img)){?>
                            <a href="<?php echo base_url()?>uploads/images/<?php echo $w_national_img;?>" download> <i
                                    class="fa fa-download"></i> </a>
                            <a href="#" data-toggle="modal" data-target="#myModal-view<?php echo $id;?>"> <i
                                    class="fa fa-eye"></i> </a>
                        <?php } ?> برجاء إرفاق صورة
                    </small>
                </div>


                <div class="modal fade" id="myModal-view<?php echo $id;?>" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">صورة الهوية</h4>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo base_url()?>uploads/images/<?php echo $w_national_img;?>"
                                     width="100%">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>



            </div>



        </div>

        <div class="col-sm-12 col-xs-12">

            <!------------------------------------>
            <div class="col-xs-12">

                <?php if(isset($result) &&$result!=null){
                    $input_name1='update';$input_name2='update_save';
                }else{  $input_name1='add';$input_name2='add_save';}
                ?>
                <input type="submit" id="buttons" class="btn btn-blue btn-close" name="add"  value="حفظ  "/>

            </div>
            <?php  echo form_close()?>
            <br/>
            <br/>

        </div>
    </div>
</div>

<script>
    function check_length_num(this_input,max_lenth,span_id) {
        if($(this_input).val().length != max_lenth   ){
            $(this_input).css("border-color" , "red");
            $("#"+span_id).html("الرقم مكون من"  +max_lenth+"أرقام" );
            $('input[type="submit"]').attr("disabled","disabled");
        }else{
            $(this_input).css("border-color" , "green");
            $("#"+span_id).html("");
            $('input[type="submit"]').removeAttr("disabled");
        }
    }

</script>


<script>

    function checkJob(valux)
    {

        if(valux ==1){
            document.getElementById("employer").removeAttribute("disabled", "disabled");
            document.getElementById("w_job_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("job_place").removeAttribute("disabled", "disabled");
            document.getElementById("job_mob").removeAttribute("disabled", "disabled");
            document.getElementById("salary").removeAttribute("disabled", "disabled");
            document.getElementById("employer").setAttribute("data-validation", "required");
            document.getElementById("w_job_id_fk").setAttribute("data-validation", "required");
            document.getElementById("job_place").setAttribute("data-validation", "required");
            document.getElementById("job_mob").setAttribute("data-validation", "required");
            document.getElementById("salary").setAttribute("data-validation", "required");

        }else{
            document.getElementById("employer").setAttribute("disabled", "disabled");
            document.getElementById("w_job_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("job_place").setAttribute("disabled", "disabled");
            document.getElementById("job_mob").setAttribute("disabled", "disabled");
            document.getElementById("salary").setAttribute("disabled", "disabled");
            document.getElementById("employer").value='';
            document.getElementById("job_place").value='';
            document.getElementById("job_mob").value='';
            document.getElementById("salary").value='';
            document.getElementById("employer").removeAttribute("data-validation", "required");
            document.getElementById("w_job_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("job_place").removeAttribute("data-validation", "required");
            document.getElementById("job_mob").removeAttribute("data-validation", "required");
            document.getElementById("salary").removeAttribute("data-validation", "required");
        }


    }

    function checkGuaranted(valux)
    {
        if(valux ==0){


            document.getElementById("persons_num").setAttribute("disabled", "disabled");
            document.getElementById("persons_num").setAttribute("data-validation", "required");
            document.getElementById("persons_num").value='';
        }else{
            document.getElementById("persons_num").removeAttribute("disabled", "disabled");



            document.getElementById("persons_num").removeAttribute("data-validation", "required");
        }
    }

</script>






<script>

    function getAge() {
        var nowYear =(new Date()).getFullYear();
        var myAge = ( nowYear- $('#CYear').val() );
        $('#myage').val(myAge)
    }
</script>


<script>
    function getGuaranted(valux){
        var ids ='';
        if(valux == 4){
            ids =0;
            $("select#guaranted").val(0);
        } else {
            ids =1;
            $("select#guaranted").val(1);

        }
        checkGuaranted(ids);
    }
</script>