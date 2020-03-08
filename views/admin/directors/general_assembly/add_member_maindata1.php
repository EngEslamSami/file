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
    #map_canvas{

        height: 200px !important;

    }

</style>
<?php
if(isset($result)&&!empty($result))
{
    $name =$result->name;
    $card_num=$result->card_num;
    $gender=$result->gender;
    $nationality_id =$result->nationality;
    $marital_status=$result->marital_status;
    $esdar_geha=$result->esdar_geha;
    $esdar_date=$result->esdar_date;
    $birth_date=$result->birth_date;
    $mob=$result->mob;
    $another_mob=$result->another_mob;
    $city_id_fk=$result->city_id_fk;
    $hai_id_fk=$result->hai_id_fk;
    $street_name=$result->street_name;
    $adress=$result->adress;
    $email=$result->email;
    $degree=$result->degree;
    $scientific_qualification_id_fk =$result->scientific_qualification_id_fk;
    $working_life=$result->working_life;
    $job=$result->job;
    $employer_id=$result->employer;
    $work_adress=$result->work_adress;
    $work_mobile=$result->work_mobile;
    $location_google_lng=$result->location_google_lng;
    $location_google_lat=$result->location_google_lat;
    $img =$result->img ;
    $id_img =$result->id_img;
    $array_date=explode("/",$birth_date);
    if(isset($array_date[2])){
        $age = $current_hijry_year - $array_date[2];
    }else{
        $age ="";
    }

    $out['form']='Directors/General_assembly/update_member_maindata/'.$this->uri->segment(4);
}else{


    $name ="";
    $card_num="";
    $gender="";
    $nationality_id ="";
    $marital_status="";
    $esdar_geha="";
    $esdar_date="";
    $birth_date="";
    $mob="";
    $another_mob="";
    $city_id_fk="";
    $hai_id_fk="";
    $street_name="";
    $adress="";
    $email="";
    $degree="";
    $scientific_qualification_id_fk ="";
    $working_life="";
    $job="";
    $employer_id="";
    $work_adress="";
    $work_mobile="";
    $location_google_lng="";
    $location_google_lat="";
    $age='';
    $img ='';
    $id_img ='';
    $out['form']='Directors/General_assembly/add_member_maindata';
}
?>
<?php
?>
<div class="col-sm-12 no-padding " >
    <div class="col-sm-9 " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
                <div class="pull-left">
                    <?php if(isset($result) && !empty($result)){
                      //  $data_load["emp_code"]= $personal_data[0]->emp_code;
                        $data_load["id"]=$result->id ;
                        $this->load->view('admin/directors/general_assembly/drop_down_menu', $data_load);
                    }?>
                </div>
            </div>
            <div class="panel-body">
                <?php    echo form_open_multipart($out['form'])?>
                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">إسم العضو</label>
                        <input type="text" name="name" id="name" value="<?php echo $name;?>"
                               class="form-control bottom-input"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الجنس </label>
                        <select name="gender" id="gender"
                                data-validation="required"   class="form-control bottom-input"
                                aria-required="true">
                            <option value="">إختر</option>
                            <?php
                            if(isset($gender_data)&&!empty($gender_data)) {
                                foreach($gender_data as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"<?php if($row->id_setting==$gender){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">الجنسيه</label>
                        <select id="nationality" data-validation="required" class="form-control bottom-input"
                                name="nationality">
                            <option value="">إختر</option>
                            <?php
                            foreach($nationality as $row){
                                ?>
                                <option value="<?php echo $row->id_setting;?>"
                                    <?php if($row->id_setting == $nationality_id){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label">الحاله الاجتماعيه   </label>
                        <select name="marital_status" class="form-control bottom-input" id="marital_status" data-validation="required">
                            <option value="">اختر</option>
                            <?php
                            if(isset($social_status)&&!empty($social_status)) {
                                foreach($social_status as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"<?php if($row->id_setting==$marital_status){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <label class="label top-label"> رقم الهويه <span class="span-allow"> (10ارقام) </span></label>
                        <input type="text" name="card_num" id="card_num" onkeyup="get_length($(this).val(),'hint');"
                               maxlength="10" data-validation="required" value="<?php echo $card_num;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                        <small  id="hint" class="myspan"  style="color: red;"> </small>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">جهه الاصدار </label>
                        <select id="esdar_geha" name="esdar_geha"  class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if(isset($dest_card)&&!empty($dest_card)) {
                                foreach($dest_card as $row){
                                    ?>
                                    <option value="<?php echo $row->id_setting;?>"<?php if($row->id_setting==$esdar_geha){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ الاصدار</label>
                        <input type="text" name="esdar_date" id="esdar_date"  data-validation="required"
                               value="<?php echo $esdar_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true">
                    </div>

                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">تاريخ الميلاد هجرى</label>
                        <input type="text" name="birth_date" data-validation="required" id="birth_date" value="<?php echo $birth_date;?>"
                               class="form-control bottom-input date_as_mask"
                               data-validation-has-keyup-event="true" onchange="getAge($(this).val());">
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">العمر</label>
                        <input type="text" name="age"  id="age" value="<?php echo $age;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true" readonly>
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label"">  الجوال <span class="span-allow"> (10ارقام) </span></label>
                        <input type="text" name="mob" maxlength="10" onkeyup="get_length($(this).val(),'tel');"
                               data-validation="required" id="phone3" value="<?php echo $mob;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                        <small  id="tel" class="myspan"  style="color: red;"> </small>
                    </div>


                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label"> جوال أخر </label>
                        <input type="text" maxlength="10" name="another_mob" onkeypress="validate_number(event)"
                               onkeyup="get_length($(this).val(),'tel_another');"   value="<?php echo $another_mob; ?>"
                               class="form-control bottom-input" data-validation-has-keyup-event="true">
                        <small  id="tel_another" class="myspan"  style="color: red;"> </small>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label top-label">المدينة</label>
                        <select id="city_id_fk" name="city_id_fk" onchange="getAhai($(this).val());"  class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if(isset($cities)&&!empty($cities)) {
                                foreach($cities as $key=>$value){
                                    ?>
                                    <option value="<?php echo$key;?>"<?php if($key==$city_id_fk){ echo 'selected'; } ?>> <?php echo $value;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 padding-4 ">
                        <label class="label top-label">الحي</label>
                        <select id="hai_id_fk" name="hai_id_fk" disabled="disabled"  class="form-control bottom-input">
                            <option value="">إختر</option>
                            <?php if(isset($hai_id_fk) && !empty($hai_id_fk)){
                                foreach ($ahais as $hay){
                                    $select ='';  if($hay->id == $hai_id_fk){$select = 'selected';}?>
                                    <option <?= $select?> value="<?=$hay->id ?>"><?=$hay->name ?></option>
                                <?php } } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">اسم الشارع</label>
                        <input type="text" name="street_name"  data-validation="required"  value="<?php echo $street_name;?>" class="form-control bottom-input" data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">العنوان الوطني</label>
                        <input type="text" name="adress" id="adress"  onkeypress="validate_number(event);"
                               data-validation="required" value=" <?php echo $adress;?>" class="form-control bottom-input">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">البريد الإلكتروني</label>
                        <input type="email" name="email" id="email" data-validation="email" value="<?php echo $email;?>"
                               class="form-control bottom-input"
                               data-validation-has-keyup-event="true">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">الدرجة العلمية </label>
                        <select id="degree" name="degree"
                                class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if(isset($Degree)&&!empty($Degree)) {
                                foreach($Degree as $value){
                                    $select ='';  if($value->id_setting == $degree){$select = 'selected';}?>
                                    ?>
                                    <option value="<?php echo$value->id_setting;?>" <?=$select?>>
                                        <?php echo $value->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">المؤهلات العلمية </label>
                        <select id="science_qualification" name="science_qualification"
                                class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if(isset($science_qualification)&&!empty($science_qualification)) {
                                foreach($science_qualification as $value){
                                    $select ='';  if($value->id_setting == $scientific_qualification_id_fk){$select = 'selected';}?>
                                    ?>
                                    <option value="<?php echo$value->id_setting;?>" <?=$select?>>
                                        <?php echo $value->title_setting;?></option >
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <?php  $arr =array(1=>'نعم',0=>'لا');  ?>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label">الحياة العملية</label>
                        <select id="working_life" name="working_life" onchange="GetType(this.value)"
                                class="form-control bottom-input" data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            foreach($arr as $key=>$value) {
                                $select ='';  if($key == $working_life){ $select = 'selected';} ?>
                                <option
                                    value="<?php echo $key; ?>" <?=$select?>> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-sm-6">
                        <label class="label top-label">المهنة </label>
                        <select name="job" id="job_title" class="form-control bottom-input" <?php if($working_life !=1){ ?>disabled="disabled" <?php } ?>
                                aria-required="true" >
                            <option value="">إختر</option>
                            <?php foreach($job_role as $one_job_role){
                                $select ='';  if($one_job_role->defined_id == $job){
                                    $select = 'selected'; } ?>

                                ?>
                                <option value="<?php echo $one_job_role->defined_id ; ?>" <?=$select?>
                                ><?php echo $one_job_role->defined_title ; ?></option>';
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                        <label class="label top-label">جهة العمل </label>
                        <select name="employer" id="employer" class="form-control bottom-input"  aria-required="true"
                            <?php if($working_life !=1){ ?> disabled="disabled" <?php } ?>>
                            <option value="">إختر</option>
                            <?php if(!empty($employer)){ foreach($employer as $value){

                                $select ='';  if($value->id_setting == $employer_id){
                                    $select = 'selected'; }


                                ?>
                                <option value="<?php echo $value->id_setting ; ?>" <?=$select?>
                                ><?php echo $value->title_setting ; ?></option>';
                            <?php } }?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%"> عنوان العمل</label>
                        <input id="work_adress"  name="work_adress"   style="padding: 0;"
                               <?php if($working_life !=1){ ?>disabled="disabled" <?php } ?> value="<?=$work_adress?>"
                               class=" form-control bottom-input" type="text">
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%"> هاتف العمل</label>
                        <input id="work_mobile"  name="work_mobile" maxlength="10"
                               onkeyup="get_length($(this).val(),'work_mobile_span');"
                            <?php if($working_life !=1){ ?>  disabled="disabled" <?php } ?> value="<?=$work_mobile?>"
                               class="  form-control bottom-input" type="text"
                               onkeypress="validate_number(event)">
                        <small  id="work_mobile_span" class="myspan"  style="color: red;"> </small>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%">الصوره الشخصيه </label>
                        <input id="img" onchange="readURL(this);" name="img"    style="padding: 0;" class=" form-control bottom-input" type="file">
                        <?php if(!empty($img)){?>
                        <a data-toggle="modal" data-target="#myModal-view" type="button" style="cursor: pointer"
                          onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/images/<?php echo $img;?>');">
                            <i class="fa fa-eye"></i>
                        </a>
                        <?php } ?>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 padding-4">
                        <label class="label top-label" style="width: 100%">صورة الهوية </label>
                        <input id="id_img" onchange="readURL(this);" name="id_img"    style="padding: 0;" class=" form-control bottom-input" type="file">
                        <?php if(!empty($id_img)){?>
                        <a  data-toggle="modal" data-target="#myModal-view" type="button" style="cursor: pointer"
                        onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/images/<?php echo $id_img;?>');">
                            <i class="fa fa-eye"></i>
                        </a>
                        <?php  } ?>
                    </div>
                </div>

                <div class="col-md-12">

                        <label class="control-label">الموقع على الخريطة </label>
                        <input type="hidden" name="location_google_lng" id="lng" value="<?php echo $location_google_lng; ?>" />
                        <input type="hidden" name="location_google_lat" id="lat"   value="<?php echo $location_google_lat; ?>" />
                        <?php  echo $maps['html'];?>

                </div>

                <div class="col-md-12">
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                    <div class="form-group col-md-4 col-sm-6 padding-4">
                        <br /><br />
                        <button type="submit" id="save" name="save" value="save"
                                class="btn btn-add">
                            <span><i class="fa fa-floppy-o"></i></span> حفظ
                        </button>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                </div>
                <?php echo form_close()?>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------>
    <?php  $this->load->view('admin/directors/general_assembly/general_assembly_person_data');?>
    <!------ table -------->
    <?php
    if(isset($records) &&!empty($records)){
    ?>
</div>
    <div class="col-xs-12 no-padding">
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">البيانات الأساسية</h3>
            </div>
            <div class="panel-body"><br>
                <div class="col-md-12 no-padding">

                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr class="info">
                            <th class="text-center">م</th>
                            <th class="text-center">إسم الموظف</th>
                            <th>رقم الجول</th>
                            <th>رقم الهوية</th>
                            <th>الجنسية</th>
                            <th>الحالة</th>

                            <th class="text-center">الاجراءات</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        $a=1;
                        $emp_type = array(1=>'نشط',0=>'غير نشط');
                        if(isset($records)&&!empty($records)) {
                            foreach ($records as $record) {
                                ?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td><? echo $record->name; ?></td>
                                    <td><? echo $record->mob; ?></td>
                                    <td><? echo $record->card_num; ?></td>
                                    <td><? echo $record->nationality; ?></td>
                                    <td>
                                        <?php if ($record->suspend == 1) {
                                            $class = "success";?>
                                        <a href="#">
                                      <?php  }elseif ($record->suspend == 0) {
                                            $class = "danger";?>
                                            <a href="<?php echo base_url(); ?>Directors/General_assembly/ChangeType/<?php  echo $record->id;?>/<?php  echo $record->approved;?>">
                                      <?php  } ?>
                                      <span   class="label label-pill label-<?= $class ?> m-r-15"
                                              style="font-size: 12px;"><?= $emp_type[$record->suspend] ?></span></a>
                                    </td>
                                    <td>
                                        <?php if ($record->suspend == 1) {?>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger">اضافه</button>
                                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a target="_blank"
                                                       href="<?php echo base_url(); ?>Directors/General_assembly/add_membership_data/<?php echo $record->id; ?>">بيانات العضوية</a></li></ul>
                                        </div>
                                    <?php } ?>

                                        <a href="<?php echo base_url(); ?>Directors/General_assembly/update_member_maindata/<?php echo $record->id; ?>"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      


                                        <a href = "<?php echo base_url('human_resources/Human_resources/print_employee_details').'/'.$record->id ?>" target = "_blank" >
                                            <i class="fa fa-print" aria-hidden = "true" ></i > </a>

                                        <a  href = "<?php echo base_url('human_resources/Human_resources/print_card').'/'.$record->id ?>" target = "_blank" >
                                            <i   style="background-color: #0a568c" class="fa fa-print" aria-hidden = "true" ></i > </a>



                                    </td>

                                </tr>
                                <?php
                                $a++;
                            }
                        } else {?>
                            <td colspan="6"><div style="color: red; font-size: large;">لم يتم اضافه موظفين الي الان</div></td>
                        <?php  }
                        ?>
                        </tbody>
                    </table>

            


                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!----- end table ------>

<div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
            </div>
            <div class="modal-body">
                <img src="" id="my_image" width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
    jQuery(function($){

        $(".date_as_mask").mask("99/99/9999");
    });
</script>



<script>
    function getAge(birth) {
        var birth_date=birth;
        var res = birth_date.split("/");
        var year_birth=res[2];
        var current_year = '<?php echo $current_hijry_year?>';
        var ageYear = parseFloat(current_year)  -parseFloat(year_birth);
        $('#age').val(ageYear+'سنه');

    }
</script>
<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
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
<script>
    function length_hesab_om(length) {
        var len=length.length;
        if(len<24){
            alert(" رقم الحساب لابد الايقل عن 24 حرف او رقم");
        }
        if(len>24){
            alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
        }
        if(len==24){
        }
    }
</script>
<script>
    function get_length(len,span_id)
    {
        if(len.length < 10){
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if(len.length >10){
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if(len.length ==10){
            document.getElementById("save").removeAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = '';
        }
    }
</script>
<script>
    function get_banck_code(valu)
    {
        var valu=valu.split("-");
        $('#bank_code').val(valu[1]);
    }
</script>
<script>
    function chek_length(inp_id,len)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(''+inchek_id).val();
        if(inchek.length < len){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
            document.getElementById("save").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,len);
            $(inchek_id).val(inchek_out);
        }
        if(inchek.length > len){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
            document.getElementById("save").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,len);
            $(inchek_id).val(inchek_out);
        }
        if(inchek.length == len){
            document.getElementById(""+ inp_id +"_span").innerHTML ='';
            document.getElementById("save").removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function getAhai(city_id){
        if(city_id != ''){
            var dataString='city_id='+city_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Human_resources/getAhai',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#hai_id_fk').addClass("selectpicker");
                    document.getElementById("hai_id_fk").removeAttribute("disabled", "disabled");
                    document.getElementById("hai_id_fk").setAttribute("data-validation", "required");
                    document.getElementById("hai_id_fk").setAttribute("data-show-subtext", "true");
                    document.getElementById("hai_id_fk").setAttribute("data-live-search", "true");
                    $('#hai_id_fk').html(html);
                    $('#hai_id_fk').selectpicker("refresh");
                }
            });
        }else if(city_id == '' ) {

            $('#hai_id_fk').removeClass("selectpicker");

            $("#hai_id_fk").val('');
            document.getElementById("hai_id_fk").removeAttribute("data-show-subtext", "true");
            document.getElementById("hai_id_fk").removeAttribute("data-live-search", "true");
            document.getElementById("hai_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("hai_id_fk").removeAttribute("data-validation", "required");
            $('#hai_id_fk').selectpicker("refresh");
        }
    }
</script>
<!---------------------------------------------------------------------------------------->


<script>
    function GetType(valu) {
        if(valu == 1){
            document.getElementById("job_title").removeAttribute("disabled", "disabled");
            document.getElementById("employer").removeAttribute("disabled", "disabled");
            document.getElementById("work_adress").removeAttribute("disabled", "disabled");
            document.getElementById("work_mobile").removeAttribute("disabled", "disabled");
            document.getElementById("job_title").setAttribute("data-validation", "required");
            document.getElementById("employer").setAttribute("data-validation", "required");
            document.getElementById("work_address").setAttribute("data-validation", "required");
            document.getElementById("work_mobile").setAttribute("data-validation", "required");

        } else {

            document.getElementById("job_title").setAttribute("disabled", "disabled");
            document.getElementById("employer").setAttribute("disabled", "disabled");
            document.getElementById("work_adress").setAttribute("disabled", "disabled");
            document.getElementById("work_mobile").setAttribute("disabled", "disabled");
            document.getElementById("job_title").removeAttribute("data-validation", "required");
            document.getElementById("employer").removeAttribute("data-validation", "required");
            document.getElementById("work_address").removeAttribute("data-validation", "required");
            document.getElementById("work_mobile").removeAttribute("data-validation", "required");

        }


    }

</script>


