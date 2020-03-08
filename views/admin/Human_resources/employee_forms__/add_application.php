<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>

<style type="text/css">
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

    .title{
        background-color: #;
        background-color: #428bca;
        color: #fff;
        text-align: center;
        padding: 5px;
    }
    .span{
        font-size: 12px !important;
        position: absolute !important;
        bottom: -17px !important;
        right: 50% !important;
    }
    .form-group .help-block.form-error {
        color: #a94442 !important;
        font-size: 12px !important;
        position: absolute !important;
        bottom: -26px !important;
        right: 2% !important;
    }
</style>
<?php
if(isset($result)&&!empty($result))
{

    $out['form']='human_resources/Job_requests/update_application/'.$this->uri->segment(4);
}else{

    $out['form']='human_resources/Job_requests/add_application';
}
?>

<div class="col-sm-12 no-padding " >
    <div class="col-sm-12 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>

            <div class="panel-body">

                <?php    echo form_open_multipart($out['form'])?>
                <div class="col-md-12 ">
                    <h4 class="title"> البيانات الشخصية </h4>
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">السجل المدني</label>
                        <input type="text" name="national_num" id="national_num" maxlength="10" value="" class="form-control bottom-input"
                         onkeyup="chek_lenth($(this).val());"  onkeypress="validate_number(event)"  data-validation="required"  data-validation-has-keyup-event="true">
                        <span  id="national_num_span"   class="span-validation span"></span>
                    </div>
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">صورة السجل المدني</label>
                        <input type="file" name="national_num_img" id="national_num_img" class="form-control bottom-input"
                             data-validation="required"  data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الجنس</label>
                        <select name="gender_id_fk" id="gender_id_fk" data-validation="required"
                          class="form-control bottom-input selectpicker" data-show-subtext="true" data-live-search="true"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($gender)&&!empty($gender)) {
                                foreach($gender as $row){
                                    $select='';
                                    if(!empty($result[0]->gender_id_fk == $row->id_setting)){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php echo $select;?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الجنسية</label>
                        <select name="nationality_id_fk" id="nationality_id_fk" data-validation="required"
                                class="form-control bottom-input selectpicker" data-show-subtext="true" data-live-search="true"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($nationalities)&&!empty($nationalities)) {
                                foreach($nationalities as $row){
                                    $select='';
                                    if(!empty($result[0]->nationality_id_fk == $row->id_setting)){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php echo $select;?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">الإسم</label>
                        <input type="text" name="name" id="name"  value="" class="form-control bottom-input" data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">تاريخ الميلاد</label>
                        <input id="date_birth" name="date_birth" type="text" size="10" maxlength="10"  class="form-control bottom-input input-style error date_as_mask"  data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="form-group col-md-2  col-sm-6 padding-4">
                            <label class="label top-label">مكان الميلاد</label>
                            <input id="place_birth" name="place_birth" type="text"   class="form-control bottom-input input-style error"  data-validation="required" data-validation-has-keyup-event="true">
                        </div>
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">الحالة الإجتماعية</label>
                        <select name="social_status" id="social_status"
                                data-validation="required"   class="form-control bottom-input selectpicker"
                                data-show-subtext="true" data-live-search="true" aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($social_status)&&!empty($social_status)) {
                                foreach($social_status as $row){
                                    $select='';
                                    if(!empty($result[0]->job_type == $row->id_setting)){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php echo $select;?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">المدينة</label>
                        <input id="city" name="city" type="text"   class="form-control bottom-input input-style error"  data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">الحي</label>
                        <input id="hai" name="hai" type="text"  class="form-control bottom-input input-style error"  data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الوظيفة المتقدم إليها</label>
                        <select id="job_request_id_fk" data-validation="required" class="form-control bottom-input selectpicker"
                           onchange="getOther(this.value,'other_job')"     data-show-subtext="true" data-live-search="true"
                                name="job_request_id_fk">
                            <option value="">إختر</option>
                            <?php
                            if(isset($jobs)&&!empty($jobs)) {
                                foreach($jobs as $row){
                                    $select='';
                                    if(!empty($result[0]->job_natural == $row->id_setting)){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php echo $select;?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                } } ?>
                            <option value="other">أخري</option>
                        </select>
                    </div>
                        <div class="form-group col-md-2 col-sm-6 padding-4">
                            <label class="label top-label">وظيفة أخري</label>
                            <input id="other_job" name="job_name_other" type="text"  disabled="disabled" class="form-control bottom-input input-style error"  data-validation="required" data-validation-has-keyup-event="true">
                        </div>

                    </div>
                <div class="col-md-12 ">

                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">الجوال</label>
                        <input id="mob" name="mob" type="text" maxlength="10"
                               onkeyup="chek_lenth_mobile($(this).val());"  onkeypress="validate_number(event)"
                               class="form-control bottom-input input-style error"  data-validation="required"
                               data-validation-has-keyup-event="true">
                        <span  id="mob_span"   class="span-validation span"></span>
                    </div>
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label">الإيميل</label>
                        <input id="email" name="email" type="email"  class="form-control bottom-input input-style error"  data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">طرق الوصول إلينا</label>
                        <select id="method_reached" data-validation="required" class="form-control bottom-input selectpicker"
                                onchange="getOther(this.value,'other_way')"     data-show-subtext="true" data-live-search="true"
                                name="method_reached">
                            <option value="">إختر</option>
                            <?php
                            if(isset($reach_us)&&!empty($reach_us)) {
                                foreach($reach_us as $row){
                                    $select='';
                                    if(!empty($result[0]->job_natural == $row->id_setting)){
                                        $select='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>" <?php echo $select;?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                } } ?>
                            <option value="other">أخري</option>
                        </select>
                    </div>
                    <!-------------------------------------------------------------------------->
                    <div class="form-group col-md-2  col-sm-6 padding-4">
                        <label class="label top-label"> طريقة أخري</label>
                        <input id="other_way" name="method_reached_other" type="text"  disabled="disabled" class="form-control bottom-input input-style error"  data-validation="required" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">هل سبق التقديم لوظيقه للجمعيه من قبل </label>
                        <select name="previous_request" id="previous_request"
                                data-validation="required"   class="form-control bottom-input"
                                aria-required="true" onchange="getFunction($(this).val(),'apply_date');">
                            <?php
                            $arr_yos_no=array(1=>'نعم',2=>'لا');
                            ?>
                            <option value="">اختر</option>
                            <?php
                            foreach ($arr_yos_no as $key=>$value){
                                ?>
                                <option value="<?php echo $key;?>"><?php echo $value;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ الإلتحاق</label>
                        <input type="text" name="previous_request_date" id="apply_date" disabled="disabled" data-validation="required" value=""
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true">
                    </div>


                </div>
                <div class="col-md-12" >
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">هل يعمل احد اصدقاءك او معارفك بالجمعيه </label>
                        <select name="know_person_in_charity" id="know_person_in_charity"
                                data-validation="required"   class="form-control bottom-input"
                                aria-required="true" onchange="getFunction($(this).val(),'names');">
                            <?php
                            $arr_yos_no=array(1=>'نعم',2=>'لا');
                            ?>
                            <option value="">اختر</option>
                            <?php
                            foreach ($arr_yos_no as $key=>$value){
                                ?>
                                <option value="<?php echo $key;?>"><?php echo $value;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الاسماء </label>
                        <textarea class="form-control bottom-input"  name="persons_names" id="names" style="margin: 0px 0px 0px -1px; width: 276px; height: 32px;" disabled="disabled"></textarea>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">هل تعمل حاليا </label>
                        <select name="work_now" id="work_now"
                                data-validation="required"   class="form-control bottom-input"
                                aria-required="true">
                            <?php
                            $arr_yos_no=array(1=>'نعم',2=>'لا');
                            ?>
                            <option value="">اختر</option>
                            <?php
                            foreach ($arr_yos_no as $key=>$value){
                                ?>
                                <option value="<?php echo $key;?>"><?php echo $value;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">متي تستطيع بدايه العمل</label>
                        <input type="text" name="date_start_work" id="date_start_work"  data-validation="required" value=""
                               class="form-control bottom-input date_as_mask" data-validation-has-keyup-event="true">
                    </div>
                 </div>



                <div class="col-md-12"><br>
                    <div class="col-md-5"></div>
                    <div class="col-md-3">
                        <button type="submit" id="register" name="add" value="save_main_data"
                                class="btn btn-add"><span><i class="fa fa-floppy-o"></i></span> حفظ
                        </button></div>
                    <div class="col-md-4"></div>

                </div>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------>
<!------ table -------->
<?php       if(isset($records) &&!empty($records)){ ?>
    </div>
    <div class="col-xs-12 no-padding">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">طلبات التوظيف</h3>
            </div>
            <div class="panel-body"><br>
                <div class="col-md-12 no-padding">

                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="info">
                            <th class="text-center">م</th>
                            <th class="text-center">رقم السجل المدني</th>
                            <th class="text-center">الإسم</th>
                            <th class="text-center">الاجراء</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        $a=1;
                        if(isset($records)&&!empty($records)) {
                            foreach ($records as $record) {
                                ?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td><? echo $record->national_num; ?></td>
                                    <td><? echo $record->name; ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger">اضافه</button>
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a target="_blank"
                                                       href="<?php echo base_url(); ?>human_resources/employee_forms/Job_requests/add_previous_work/<?php echo $record->id;?>">الأعمال التي سبق العمل بها </a></li>
                                                <li><a target="_blank"
                                                       href="<?php echo base_url(); ?>human_resources/employee_forms/Job_requests/add_science_qualification/<?php echo $record->id;?>">المؤهلات العلمية</a></li>
                                                <li><a target="_blank"
                                                       href="<?php echo base_url(); ?>human_resources/employee_forms/Job_requests/add_dawrat/<?php echo $record->id;?>">الدورات التدريبية</a></li>
                                                <li><a target="_blank"
                                                       href="<?php echo base_url(); ?>human_resources/employee_forms/Job_requests/add_skills/<?php echo $record->id;?>">الهوايات ومهارات</a></li>
                                                <li><a target="_blank"
                                                       href="<?php echo base_url(); ?>human_resources/employee_forms/Job_requests/add_persons/<?php echo $record->id;?>">المعرفون</a></li>
                                            </ul>
                                        </div>
                                        
                                        <a href="<?php echo base_url(); ?>human_resources/Job_requests/update_job_request/<?php echo $record->id; ?>"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                        <a onclick="$('#adele').attr('href', '<?= base_url() . "human_resources/Job_requests/Deletejob_request/" . $record->id ?>');"
                                           data-toggle="modal" data-target="#modal-delete"
                                           title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>

                                    </td>
                                </tr>
                                <?php
                                $a++;
                            }
                        } else {?>
                            <td colspan="6"><div style="color: red; font-size: large;">لا توجد بيانات</div></td>
                        <?php  }  ?>
                        </tbody>
                    </table>




                </div>
            </div>
        </div>
    </div>
<?php }  ?>
<!----- end table ------>
<script type="text/javascript">
    jQuery(function($){
        //	$(".date_as_mask").mask("99/99/9999");
        $(".date_as_mask").mask("99/99/9999");
    });
</script>

<script>
    function chek_lenth(valu)
    {
        if(valu.length < 10){
            document.getElementById("national_num_span").style.color = '#F00';
            document.getElementById("national_num_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('register').setAttribute("disabled", "disabled");

            var inchek_out= inchek.substring(0,10);
            $('#national_num').val(inchek_out);
        }

        if(valu.length > 10){
            document.getElementById("national_num_span").style.color = '#F00';
            document.getElementById("national_num_span").innerHTML = 'أقصي عدد 10 ارقام';

            var inchek_out= inchek.substring(0,10);
            $('#national_num').val(inchek_out);
        }

        if(valu.length == 10){
            document.getElementById('register').removeAttribute("disabled", "disabled");

        }
    }



    function chek_lenth_mobile(valu)
    {
        if(valu.length < 10){
            document.getElementById("mob_span").style.color = '#F00';
            document.getElementById("mob_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('register').setAttribute("disabled", "disabled");

            var inchek_out= inchek.substring(0,10);
            $('#mob').val(inchek_out);
        }

        if(valu.length > 10){
            document.getElementById("mob_span").style.color = '#F00';
            document.getElementById("mob_span").innerHTML = 'أقصي عدد 10 ارقام';

            var inchek_out= inchek.substring(0,10);
            $('#mob').val(inchek_out);
        }

        if(valu.length == 10){
            document.getElementById('register').removeAttribute("disabled", "disabled");

        }
    }



</script>

<script>
    function getOther(valu,div) {
        if(valu ==='other'){
        document.getElementById(div).setAttribute("data-validation", "required");
        document.getElementById(div).removeAttribute("disabled", "disabled");
        } else {
            document.getElementById(div).removeAttribute("data-validation", "required");
            document.getElementById(div).setAttribute("disabled", "disabled");
        }
    }

    function getFunction(valu,div) {
        if(valu==1)
        {
            document.getElementById(div).removeAttribute("disabled", "disabled");
            document.getElementById(div).setAttribute("data-validation", "required");
        }else{
            document.getElementById(div).setAttribute("disabled", "disabled");
            document.getElementById(div).removeAttribute("data-validation", "required");
        }
    }

</script>