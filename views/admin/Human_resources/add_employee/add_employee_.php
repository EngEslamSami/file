

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
</style>


<?php


if(isset($emp)&&!empty($emp))
{



    $name=$emp->employee;
    $emp_code=$emp->emp_code;
    $card_num=$emp->card_num;
    $gender=$emp->gender;
    $bank=$emp->bank;
    $bank_num=$emp->bank_num;

    
    
    $status=$emp->status;
    $phone=$emp->phone;
    $personal_photo=$emp->personal_photo;
    $birth_date=$emp->birth_date;
    $type_card_row=$emp->type_card;
    $dest_card_row=$emp->dest_card;
    $esdar_date=$emp->esdar_date;

    $end_date=$emp->end_date;
    $adress=$emp->adress;
    $adress_other=$emp->adress_other; 
    
    
    $email=$emp->email;
    $nationality_row=$emp->nationality;
    $deyana_row=$emp->deyana;
    $dis="none";




    $out['form']='human_resources/Human_resources/edit_emp/'.$this->uri->segment(4);
}else{

    $name="";
    $emp_code="";
    $card_num="";
    $gender="";
    $bank="";
    $bank_num="";
    $status="";
    $phone="";
    $personal_photo="";
    $birth_date="";
    $type_card_row="";
    $dest_card_row="";
    $esdar_date="";

    $end_date="";
    $adress="";
    $adress_other="";
    $email="";
    $nationality_row="";
    $deyana_row="";
    $dis="block";
    $out['form']='human_resources/Human_resources/add_personal_data';
}

?>
<?php

?>

<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;  ?></h3>
        </div>
        <div class="panel-body">
            <?php    echo form_open_multipart($out['form'])?>



                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">إسم الموظف</label>
                    <input type="text" name="name" id="name3" value="<?php echo $name;?>"
                           class="form-control bottom-input"
                           data-validation="required"
                           data-validation-has-keyup-event="true">
                </div>
                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">الكود الوظيفي</label>
                    <input type="text" name="emp_code" id="emp_code" value="<?php echo $emp_code;?>"
                           data-validation="required" class="form-control bottom-input"

                           data-validation-has-keyup-event="true">
                </div>



                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label""> رقم الجوال <span class="span-allow"> (10ارقام) </span></label>
                    <input type="text" name="phone" maxlength="10" data-validation="required" id="phone3" value="<?php echo $phone;?>"
                           class="form-control bottom-input"

                           data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                    <div id="tel" style="color: red;"></div>
                </div>
                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">النوع </label>
                    <select name="gender" id="gender_id3"
                            data-validation="required"   class="form-control bottom-input"
                           aria-required="true">
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
                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">تاريخ الميلاد</label>
                    <input type="date" name="birth_date" data-validation="required" id="birth_date" value="<?php echo $birth_date;?>"
                           class="form-control bottom-input"

                           data-validation-has-keyup-event="true" onchange="getAge($(this).val());">
                </div>
                <div class="form-group col-md-3 col-sm-6" style="display: <?php echo $dis;?>">
                    <label class="label top-label">العمر</label>
                    <input type="text" name="age"  id="age" value=""
                           class="form-control bottom-input"

                            data-validation-has-keyup-event="true" readonly>
                </div>
                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">الجنسيه</label>

                    <select id="nationality" data-validation="required" class="form-control bottom-input"
                            name="nationality">
                        <option value="">إختر</option>

                        <?php




                            foreach($nationality as $row){
                                ?>



                                <option value="<?php echo $row->id_setting;?>" <?php if($row->id_setting==$nationality_row){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >


                                <?php

                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">الديانه</label>

                    <select id="deyana" class="form-control bottom-input"
                            name="deyana" data-validation="required">
                        <option value="">إختر</option>
                        <?php
                        if(isset($deyana)&&!empty($deyana)) {
                            foreach($deyana as $row){
                                ?>


                                <option value="<?php echo $row->id_setting;?>"<?php if($row->id_setting==$deyana_row){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >


                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">الحاله الاجتماعيه   </label>
                    <select name="status"
                            class="form-control bottom-input" id="status3" data-validation="required">

                        <option value="">اختر</option>
                        <?php 

                                if(isset($social_status)&&!empty($social_status)) {
                            foreach($social_status as $row){
                                ?>


                                <option value="<?php echo $row->id_setting;?>"<?php if($row->id_setting==$status){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >


                                <?php
                            }
                        }
                        
                                                                                                
                       ?>
                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">اسم البنك التابع </label>
                    <select id="bank3" class="form-control bottom-input" data-validation="required"
                            name="bank">
                        <option value="">إختر</option>
                        <?php
                        if (isset($banks) && $banks != null) {
                            foreach ($banks as $value) { ?>


                                <option
                                    value="<?= $value->id ?>"<?php if($value->id==$bank){ echo 'selected'; } ?>><?= $value->title ?></option>
                                <?php
                            }

                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">رقم الحساب</label>
                    <input type="text" name="bank_num" maxlength="24" data-validation="required"
                           id="bank_num3" value="<?php echo $bank_num;?>"
                        onfocusout="length_hesab_om($(this).val());"
                           class="form-control bottom-input"

                           data-validation-has-keyup-event="true" >
                </div>

                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">البريد الإلكتروني</label>
                    <input type="email" name="email" id="email" data-validation="required" value="<?php echo $email;?>"
                           class="form-control bottom-input"

                           data-validation-has-keyup-event="true">
                </div>
                
                      <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label"> رقم الهويه <span class="span-allow"> (10ارقام) </span></label>
                    <input type="text" name="card_num" id="card_num" maxlength="10" data-validation="required" value="<?php echo $card_num;?>"
                           class="form-control bottom-input"

                           data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                    <div id="hint" style="color: red;"></div>
                </div>
                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">نوع الهوية </label>
                    <select id="type_card"  class="form-control bottom-input"data-validation="required"
                            name="type_card">
                        <option value="">إختر</option>
                        <?php
                        if(isset($type_card)&&!empty($type_card)) {
                            foreach($type_card as $row){
                                ?>


                                <option value="<?php echo $row->id_setting;?>"<?php if($row->id_setting==$type_card_row){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >


                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">جهه الاصدار </label>
                    <select id="dest_card" name="dest_card"  class="form-control bottom-input" data-validation="required">

                        <option value="">إختر</option>
                        <?php
                        if(isset($dest_card)&&!empty($dest_card)) {
                            foreach($dest_card as $row){
                                ?>


                                <option value="<?php echo $row->id_setting;?>"<?php if($row->id_setting==$dest_card_row){ echo 'selected'; } ?>> <?php echo $row->title_setting;?></option >


                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            <div class="form-group col-md-3 col-sm-6">
                <label class="label top-label">تاريخ الاصدار</label>
                <input type="date" name="esdar_date" id="esdar_date"  data-validation="required" value="<?php echo $esdar_date;?>"
                       class="form-control bottom-input"

                       data-validation-has-keyup-event="true">
            </div>
            <div class="form-group col-md-3 col-sm-6">
                <label class="label top-label">تاريخ الانتهاء</label>
                <input type="date" name="end_date" id="end_date" data-validation="required" value="<?php echo $end_date;?>"
                       class="form-control bottom-input"

                       data-validation-has-keyup-event="true">
            </div>
          
                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">العنوان الوطني</label>
                    <textarea name="adress" id="adress"  data-validation="required" class="form-control bottom-input">  <?php echo $adress;?>     </textarea>
                </div>


     <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">العنوان في بلد المقيم</label>
                    <textarea name="adress_other" id="adress_other"  data-validation="required" class="form-control bottom-input">  <?php echo $adress_other;?>     </textarea>
                </div>

                <div class="form-group col-md-3 col-sm-6">

                <label class="label top-label" style="width: 100%">الصوره الشخصيه </label>
                <input id="person_img" onchange="readURL(this);" name="img"   style="padding: 0;" class=" form-control bottom-input" type="file">


            </div>
            <div class="form-group col-md-3 col-sm-6">
                </div>
                <div class="form-group col-md-3 col-sm-6">
                    <div class="col-md-12" style="padding-right: 0">

                            <div id="post_img" class="imgContent" style="min-height: 120px;">
                                <img id="blah" src="<?php if(isset($emp->personal_photo)){ echo base_url().'uploads/files/'.$emp->personal_photo;}else{
                                    echo base_url().'uploads/images/momany_logo.png';
                                } ?>" alt="الصورة الشخصية"  style="width: 150px;height: 150px;" class="img-rounded">
                            </div>
                        </div>



        </div>





            <div class="form-group col-md-3 col-sm-6">
            <button type="submit" id="save" name="add" value="save"
                    onclick="insertData();" class="btn btn-add">
                <span><i class="fa fa-floppy-o"></i></span> حفظ
            </button>
        </div>
            <?php echo form_close()?>
            <?php
            if(isset($all_emps) &&!empty($all_emps)){
            ?>

<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
    <tr class="info">
        <th class="text-center">م</th>
        <th class="text-center">إسم الموظف</th>
        <th>كود الموظف</th>
        <th>رقم الهويه</th>
        <th>التفاصيل</th>
        <th>استكمال بيانات الموظف</th>
        <th class="text-center">الاجراء</th>
    </tr>
    </thead>
    <tbody class="text-center">
    <?php
    $a=1;
    if(isset($all_emps)&&!empty($all_emps)) {
        foreach ($all_emps as $record):?>
            <tr>
                <td><?php echo $a ?></td>
                <td><? echo $record->employee; ?></td>
                <td><? echo $record->emp_code; ?></td>
                <td><? echo $record->card_num; ?></td>
                <td>
                    <button data-toggle="modal"
                            data-target="#modal-info<?= $record->id ?>"
                            class="btn btn-sm btn-info"><i
                            class="fa fa-list btn-info"></i> تفاصيل الموظف
                    </button>
                </td>

                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger">اضافه</button>
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
<ul class="dropdown-menu">
<li><a target="_blank"  href="<?php echo base_url();?>human_resources/human_resources/add_job_data/<?php echo $record->emp_code ;?>">البيانات الوظيفيه  </a></li>

<li><a target="_blank"  href="<?php echo base_url();?>human_resources/human_resources/financeEmployee/<?php echo $record->emp_code ;?>">البيانات  المالية   </a></li>

<li><a target="_blank"  href="<?php echo base_url();?>human_resources/human_resources/contractEmployee/<?php echo $record->emp_code ;?>">بيانات التعاقد   </a></li>

<li><a target="_blank"  href="<?php echo base_url();?>human_resources/human_resources/printer_machin_Employee/<?php echo $record->emp_code ;?>">بيانات الدوام   </a></li>
<li><a target="_blank"  href="<?php echo base_url();?>human_resources/human_resources/employee_files/<?php echo $record->emp_code ;?>"> المستندات والبطاقات والمهارات     </a></li>
<li><a target="_blank"  href="<?php echo base_url();?>human_resources/human_resources/custody/<?php echo $record->emp_code ;?>"> شاشة العهد    </a></li>



</ul>
                    </div>
                </td>
                <td>
                    <a href="<?php echo base_url();?>human_resources/human_resources/edit_emp/<?php echo $record->emp_code;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>


                    <a onclick="$('#adele').attr('href', '<?= base_url() . "Administrative_affairs/delete_employee/" . $record->id ?>');"
                       data-toggle="modal" data-target="#modal-delete"
                       title="حذف"> <i class="fa fa-trash"
                                       aria-hidden="true"></i> </a></td>
            </tr>
            <?php

            $a++;
        endforeach;
    }else{?>
        <td colspan="6"><div style="color: red; font-size: large;">لم يتم اضافه موظفين الي الان</div></td>

    <?php  }
    ?>
    </tbody>
</table>
            <?php } ?>
        </div>
    </div>
</div>
<?php
if(isset($all_emps) &&!empty($all_emps)) {
    ?>
    <?php foreach ($records as $record) { ?>
        <div class="modal" id="modal-info<?= $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             data-wow-duration="0.5s">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> بيانات الموظف (<?= $record->employee ?>)</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>الاسم</th>
                                <td><?= $record->employee; ?></td>
                                <th>كود الموظف</th>
                                <td><?= $record->emp_code ?></td>
                            </tr>
                            <tr>
                                <th>رقم التليفون</th>
                                <td><?= $record->phone; ?></td>


                            </tr>

                            <tr>
                                <th>رقم الحساب</th>
                                <td><?= $record->bank_num ?></td>
                                <th>رقم التأمين</th>
                                <td><?= $record->insurance_number ?></td>
                            </tr>
                            <tr>
                                <th>الحاله الاجتماعيه</th>
                                <td><?php if (isset($record->status)) {
                                        echo $social_status[$record->status];
                                    } ?> </td>

                            </tr>


                            </thead>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}?>




    <script>

    function getAge(birth) {



        ageMS = Date.parse(Date()) - Date.parse(birth);
        age = new Date();
        age.setTime(ageMS);
        ageYear = age.getFullYear() - 1970;


        $('#age').val(ageYear+'سنه');
      //  return ageYear;


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