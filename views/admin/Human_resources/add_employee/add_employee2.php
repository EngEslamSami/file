

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


    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;

    }
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
     $age=date("Y-m-d")-$birth_date;





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
   $age='';
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
                    <input type="text" name="phone" maxlength="10" onkeyup="get_length($(this).val(),'tel');"  data-validation="required" id="phone3" value="<?php echo $phone;?>"
                           class="form-control bottom-input"
                           data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                    <small  id="tel" class="myspan"  style="color: red;"> </small>
              <!--      <div id="tel" style="color: red;"></div>-->
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
                <div class="form-group col-md-3 col-sm-6">
                    <label class="label top-label">العمر</label>
                    <input type="text" name="age"  id="age" value="<?php echo $age;?>"
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
                            name="bank"    onchange="get_banck_code($(this).val())">
                        <option value="">إختر</option>
                        <?php
                        if (isset($banks) && $banks != null) {
                            foreach ($banks as $value) { ?>


                                <option
                                    value="<?php echo$value->id; ?>-<?php echo $value->bank_code;?>"<?php if($value->id==$bank){ echo 'selected'; } ?>><?php echo$value->title ?></option>
                                <?php
                            }

                        }
                        ?>
                    </select>
                </div>

            <div class="form-group col-md-3 col-sm-6">
                <label class="label top-label">رمز البنك</label>
                <input type="text" name="bank_ramz" class="form-control bottom-input"
                       id="bank_code" readonly="readonly">
            </div>

            <!----------------------------------------------------->

            <!----------------------------------------------------->
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
                    <input type="text" name="card_num" id="card_num" onkeyup="get_length($(this).val(),'hint');" maxlength="10" data-validation="required" value="<?php echo $card_num;?>"
                           class="form-control bottom-input"

                           data-validation-has-keyup-event="true"  onkeypress="validate_number(event);">
                  <!--  <div id="hint" style="color: red;"></div>-->
                          <small  id="hint" class="myspan"  style="color: red;"> </small>
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
                    <div class="col-md-12" style="padding-right: 0">

                            <div id="post_img" class="imgContent" style="min-height: 120px;">
                                <img id="blah" src="<?php if(isset($emp->personal_photo)){ echo base_url().'uploads/files/'.$emp->personal_photo;}else{
                                    echo 'https://via.placeholder.com/350x150';
                                } ?>" alt="الصورة الشخصية"  style="width: 150px;height: 150px;" class="img-rounded">
                            </div>
                        </div>
                </div>


            <div class="form-group col-md-12 col-sm-12">
                <div class="form-group col-md-5 col-sm-4">
                </div>
                <div class="form-group col-md-4 col-sm-4">
                    <button type="submit" id="save" name="add" value="save"
                            onclick="insertData();" class="btn btn-add">
                        <span><i class="fa fa-floppy-o"></i></span> حفظ
                    </button>
                </div>
                <div class="form-group col-md-3 col-sm-4">
                </div>

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
<li><a target="_blank"  href="<?php echo base_url();?>human_resources/human_resources/add_job_data/<?php echo $record->id ;?>">البيانات الوظيفيه  </a></li>

<li><a target="_blank"  href="<?php echo base_url();?>human_resources/human_resources/financeEmployee/<?php echo $record->id ;?>">البيانات  المالية   </a></li>

<li><a target="_blank"  href="<?php echo base_url();?>human_resources/human_resources/contractEmployee/<?php echo $record->id ;?>">بيانات التعاقد   </a></li>

<li><a target="_blank"  href="<?php echo base_url();?>human_resources/human_resources/printer_machin_Employee/<?php echo $record->id ;?>">بيانات الدوام   </a></li>
<li><a target="_blank"  href="<?php echo base_url();?>human_resources/human_resources/employee_files/<?php echo $record->id ;?>"> المستندات والبطاقات والمهارات     </a></li>
<li><a target="_blank"  href="<?php echo base_url();?>human_resources/human_resources/custody/<?php echo $record->id ;?>"> شاشة العهد    </a></li>



</ul>
                    </div>
                </td>
                <td>
                    <a href="<?php echo base_url();?>human_resources/human_resources/edit_emp/<?php echo $record->emp_code;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>


                    <a onclick="$('#adele').attr('href', '<?= base_url() . "human_resources/human_resources/DeleteEmpAll/" . $record->id ?>');"
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
        <!-- Modal -->
<div class="modal fade" id="modal-info<?=$record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 100%">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">بيانات خاصه الموظف</h4>
      </div>
      <div class="modal-body">
       <div>

  <!-- Nav tabs -->
   <ul class="nav nav-tabs" role="tablist" style="background-color: #c1e2ff;">
    <li role="presentation" class="active"><a href="#tab_form1<?=$record->id ?>" aria-controls="home" role="tab" data-toggle="tab">البيانات الشخصيه</a></li>
    <li role="presentation"><a href="#tab_form2<?=$record->id ?>" aria-controls="profile" role="tab" data-toggle="tab">البيانات الوظيفيه</a></li>
       <li role="presentation"><a href="#tab_form7<?=$record->id ?>" aria-controls="settings" role="tab" data-toggle="tab"> البيانات الماليه </a></li>

       <li role="presentation"><a href="#tab_form3<?=$record->id ?>" aria-controls="messages" role="tab" data-toggle="tab">بيانات التعاقد</a></li>
    <li role="presentation"><a href="#tab_form4<?=$record->id ?>" aria-controls="settings" role="tab" data-toggle="tab">بيانات الدوام</a></li>
       <li role="presentation"><a href="#tab_form5<?=$record->id ?>" aria-controls="settings" role="tab" data-toggle="tab"> المستندات والوثائق والمهارات </a></li>
       <li role="presentation"><a href="#tab_form6<?=$record->id ?>" aria-controls="settings" role="tab" data-toggle="tab"> شاشه العهد </a></li>



   </ul>
           </br> </br>

  <!-- Tab panes -->
  <div class="tab-content">


    <div role="tabpanel" class="tab-pane fade in active" id="tab_form1<?=$record->id ?>">
        <div class="col-md-10">

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
                                        <th>رقم البطاقه</th>
                                        <td><?= $record->card_num; ?></td>
                                        <th>رقم التامين</th>
                                        <td><?= $record->insurance_number ?></td>

                                      </tr>
                                     <tr>
                                         <th>رقم الجوال</th>
                                         <td><?= $record->phone; ?></td>                                                    <th>تاريخ الميلاد</th>
                                         <td><?= $record->birth_date ?></td>

                                       </tr>


                                     <tr>
                                         <th>الجنسيه</th>
                                         <td><?= $record->nationality; ?></td>
                                            <th>الديانه</th>
                                         <td><?= $record->deyana ?></td>

                                       </tr>
                                     <tr>
                                         <th>نوع الهويه</th>
                                         <td><?= $record->type_card; ?></td>
                                            <th>جهه الهويه</th>
                                         <td><?= $record->dest_card ?></td>

                                       </tr>
                                     <tr>
                                         <th>تاريخ الاصدار</th>
                                         <td><?= $record->esdar_date; ?></td>
                                       <th>تاريخ الانتهاء</th>
                                         <td><?= $record->end_date ?></td>

                                       </tr>
                                    <tr>
                                        <th>العنوان الوطني</th>
                                        <td><?= $record->adress; ?></td>
                                        <th>العنوان ف بلد المقيم</th>
                                        <td><?= $record->adress_other ?></td>

                                    </tr>

            </thead>
            </table>
        </div>
        <div class="col-md-2">

        <img  src="<?php echo base_url();?>uploads/files/<?=$record->personal_photo ?>" style="width: 250px;height: 250px;">

    </div>
</div>




    <div role="tabpanel" class="tab-pane fade" id="tab_form2<?=$record->id ?>">

        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"

               width="100%">
            <thead>
            <tr>
                <th>حاله الموظف</th>
                <td> <?php if($record->employee_type==1){  echo 'نشط ' ; }else { echo 'موقوف';  } ; ?></td>
                <th>السبب</th>
                <td><?= $record->reason ?></td>

            </tr>
            <tr>
                <th>الدرجه العلميه</th>
                <td><?= $record->degree_science; ?></td>
                <th>المؤهل العلمي</th>
                <td><?= $record->employee_qualification ?></td>

            </tr>
            <tr>
                <th>الاداره </th>
                <td><?= $record->management; ?></td>
                <th>القسم</th>
                <td><?= $record->part ?></td>

            </tr>


            <tr>
                <th>المسمي الوظيفي</th>
                <td><?= $record->job_role; ?></td>
                <th>نوع العقد</th>
                <td><?= $record->contract ?></td>

            </tr>
            <tr>
                <th> تاريخ بدايه العقد</th>
                <td><?= $record->start_work_date; ?></td>
                <th>تاريخ انتهاء العقد</th>
                <td><?= $record->end_contract_date ?></td>

            </tr>
            <tr>
                <th>تاريخ انتهاء الخدمه</th>
                <td><?= $record->end_service_date; ?></td>
                <th>تاريخ الانتهاء</th>
                <td><?= $record->end_date ?></td>

            </tr>
            <tr>
                <th>التأمين الاجتماعي</th>
                <td><?php if($record->type_tamin==1){ echo 'مؤمن' ; } else { echo 'غير مؤمن'; } ?></td>
                <th>رقم التأمين</th>
                <td><?= $record->insurance_number ?></td>

            </tr>
            <tr>

                <th>تاربخ بدايه التامين </th>
                <td><?= $record->start_tamin_date ?></td>
                <th>التأمينات الطبيه</th>
                <td><?php if($record->type_tamin__medicine==1){ echo 'مؤمن' ; } else { echo 'غير مؤمن'; } ?></td>

            </tr>
            <tr>

                <th>شركه التامين </th>
                <td><?= $record->company ?></td>
                <th>رقم التامين الطبي </th>
                <td><?= $record->tamin_medicine_num ?></td>
            </tr>
            <tr>

                <th>رقم البوليصه </th>
                <td><?= $record->polica_num ?></td>
                <th> فئه التأمين</th>
                <td><?= $record->tamin_type ?></td>
            </tr>
            <tr>

                <th>تاريخ التأمين </th>
                <td><?= $record->tamin_date ?></td>

            </tr>

            </thead>
        </table>


    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_form3<?=$record->id ?>">
     <div class="panel_body">

         <?php
         if(isset($record->contract_employee) &&!empty($record->contract_employee)) {
             $paid_type=array("1"=>"نقدي","2"=>"شيك","3"=>"تحويل بنكي");

             ?>

         <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"

                width="100%">
             <thead>
             <tr>
                 <th>ايام العمل خلال الشهر</th>
                 <td><?= $record->contract_employee->num_days_in_month; ?></td>
                 <th> ساعات العمل</th>
                 <td> <?= $record->contract_employee->hours_work; ?> </td>

             </tr>
             <tr>

                 <th>اجر الساعه</th>
                 <td><?= $record->contract_employee->hour_value; ?></td>
                 <th>طريقه دفع الراتب</th>
                 <td> <?=$paid_type[ $record->contract_employee->pay_method_id_fk];?> </td>

             </tr>
             <tr>

                 <th>اسم البنك</th>
                 <td><?= $record->contract_employee->bank_name; ?></td>
                 <th>رقم الحساب</th>
                 <td>  <?= $record->contract_employee->bank_account_num; ?></td>

             </tr>
             <tr>

                 <th>الاجازه السنويه</th>
                 <td><?= $record->contract_employee->year_vacation_num; ?></td>
                 <th>المده المستحقه</th>
                 <td>  <?= $record->contract_employee->year_vacation_period; ?></td>

             </tr>
             <tr>

                 <th> نوع تذكره السفر</th>
                 <td><?= $record->contract_employee->ticket_travel; ?></td>
                 <th>مده التذكره </th>
                 <td>  <?= $record->contract_employee->travel_period; ?></td>

             </tr>
             <tr>

                 <th>مكافأه نهايه الخدمه</th>
                 <td><?php if($record->contract_employee->reward_end_work==1){ echo 'نعم' ; }else{ echo 'لا';  }  ?></td>


             </tr>
             </thead>
             </table>

             <?php
         }else{  ?>

             <div class="alert alert-danger">لاتوجد بيانات</div>

        <?php }  ?>




     </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab_form4<?=$record->id ?>">
        <?php
        if(isset($record->dawam_employee)&&!empty($record->dawam_employee)){
        $work_days=array("1"=>"السبت","2"=>"الأحد","3"=>"الأثنين","4"=>"الثلاثاء","5"=>"الأربعاء","6"=>"الخميس","7"=>"الجمعة");
?>
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"

               width="100%">
            <thead>
            <tr>
                <th>جهاز البصمه</th>
                <td><?= $record->dawam_employee->device_name; ?></td>
                <th>رقم الموظف بجهاز البصمه</th>
                <td><?= $record->dawam_employee->num_in_device ?></td>

            </tr>
            <tr>
                <th>فتره الدوام</th>
                <td><?= $record->dawam_employee->peroid; ?></td>
                <th>مواعيد العمل من :الي</th>
                <td><?= $work_days[$record->dawam_employee->from_day] .':'.$work_days[$record->dawam_employee->to_day] ?></td>

            </tr>
            </thead>
            </table>



            <?php } else { ?>

<div class="alert alert-danger">لاتوجد بيانات</div>
            <?php
        }
        ?>
    </div>
      <div role="tabpanel" class="tab-pane fade" id="tab_form5<?=$record->id ?>">


         <?php
         if(isset($record->attach_files) &&!empty($record->attach_files)){?>

             <table class="table table-bordered">
             <thead>
             <th>م</th>
             <th>اسم المرفق</th>
             <th>الاجراء</th>
             <th>من تاريج</th>
             <th>الي تاريخ</th>

             </thead>
                 <tbody>
                 <?php
                 $x=1;
                 foreach($record->attach_files as $row){?>
                    <tr>

                      <td><?php echo $x;?></td>
                        <td><?php echo $row->title;?> </td>
                        <td>
                                <a href="<?php echo base_url() . 'human_resources/Human_resources/downloads/'.$row->emp_file ?>" download> <i class="fa fa-download" title="تحميل"></i> </a>
                                <a target="_blank" href="<?php echo base_url() . 'human_resources/Human_resources/read_file/'.$row->emp_file ?>" > <i class="fa fa-eye" title=" قراءة"></i> </a>
                           </td>
                        <td><?php echo $row->from_date;?> </td>
                        <td><?php echo $row->to_date;?> </td>


                    </tr>
                 <?php
                 $x++;
                 } ?>


                 </tbody>


             </table>

     <?php } else{?>
             <div class="alert alert-danger">لاتوجد بيانات</div>
          <?php

         }
         ?>

          </div>
      <div role="tabpanel" class="tab-pane fade" id="tab_form6<?=$record->id ?>">

          <?php
          if(isset($record->emp_custody) &&!empty($record->emp_custody)){?>

              <table class="table table-bordered">
                  <thead>
                  <th>م</th>
                  <th> تصنيف الاصل</th>
                  <th>اسم الصنف</th>
                  <th>العدد</th>
                  <th>الحاله</th>
                  <th>التاريخ</th>

                  </thead>
                  <tbody>
                  <?php
              $status=array("1"=>"جيد","2"=>"متوسط","3"=>"غيرجيد","4"=>"يحتاج");

                  $x=1;
                  foreach($record->emp_custody as $row){?>
                      <tr>

                          <td><?php echo $x;?></td>
                          <td><?php echo $row->product;?> </td>
                          <td><?php echo $row->custody_title;?> </td>
                          <td><?php echo $row->num;?> </td>
                          <td><?php echo $status[$row->status];?> </td>
                          <td><?php echo $row->date_recived;?> </td>


                      </tr>
                      <?php
                      $x++;
                  } ?>


                  </tbody>


              </table>

          <?php } else{?>
              <div class="alert alert-danger">لاتوجد بيانات</div>
              <?php

          }
          ?>

          </div>
      <div role="tabpanel" class="tab-pane fade" id="tab_form7<?=$record->id ?>">
          <div class="panel_body">
              <div class="col-sm-12">
                  <h6 class="text-center inner-heading">بيانات  الماليه</h6>
              </div>


              <?php
              if(isset($record->finance) &&!empty($record->finance)){
                  $salary_types = array(1=>'راتب أساسي',2=>'راتب مقطوع');
                  ?>

                  <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"

                         width="100%">
                      <thead>
                      <tr>
                          <th>نوع الراتب</th>
                          <td><?php echo $salary_types[$record->finance->salary_type];?> </td>
                          <th>الراتب/المكافأه</th>
                          <td><?php echo $record->finance->salary;?></td>
                          <th>مركز التكلفه</th>
                          <td><?php echo $record->finance->markz;?></td>

                      </tr>
                      </thead>
                  </table>


                  <?php
              }else{?>

                  <div class=" col-sm-12 alert alert-danger">لاتوجد بيانات ماليه</div>


              <?php   }
              ?>

              <div class="col-sm-12">
                  <h6 class="text-center inner-heading">بدلات   الموظف</h6>
              </div>
              <?php
              if(isset($record->basic_badalat) &&!empty($record->basic_badalat)){
                  $a=0;
                  foreach($record->basic_badalat as $row){
                      if(isset($row->value->value)){
                              $a++;
                      } ?>


                  <?php  }

                  if($a ==0){ ?>

                      <div class=" col-sm-12 alert alert-danger">لاتوجد إستقطاعات للموظف </div>

                 <?php  }else{?>


                  <table class="table table-bordered">
                      <thead>
                      <th>م</th>
                      <th>اسم البدل</th>
                      <th>قيمه البدل</th>
                      <th>من تاريخ</th>
                      <th>الي تاريخ</th>
                      <th>تامينات</th>


                      </thead>
                      <tbody>
                      <?php
                      $status=array("1"=>"جيد","2"=>"متوسط","3"=>"غيرجيد","4"=>"يحتاج");

                      $x=1;
                      foreach($record->basic_badalat as $row){  ?>
                          <tr>

                              <td><?php echo $x;?></td>
                              <td><?php  if(isset($row->title)) echo  $row->title;?> </td>
                              <td><?php if(isset($row->value->value)) echo  $row->value->value;?> </td>
                              <td><?php  if(isset($row->value->date_from)&&$row->value->date_from!=0) echo  date("Y-m-d",$row->value->date_from);?> </td>
                              <td><?php  if(isset($row->value->date_to)&&$row->value->date_to!=0) echo  date("Y-m-d",$row->value->date_to);?> </td>
                              <td><?php if(isset($row->value->insurance_affect)) {if($row->value->insurance_affect==1){echo 'نعم' ;}else { echo 'لا'; }  }?> </td>



                          </tr>
                          <?php
                          $x++;
                      } ?>


                      </tbody>


                  </table>

              <?php }  }else { ?>

                  <div class=" col-sm-12 alert alert-danger">لاتوجد بدلات للموظف </div>



              <?php  } ?>
              <div class="col-sm-12">
                  <h6 class="text-center inner-heading">استقطاعات الموظف</h6>
              </div>
              <?php
              if(isset($record->cut_emp) &&!empty($record->cut_emp)){

                  $a=0;
                  foreach($record->cut_emp as $row){
                  if(isset($row->value->value)){
                  $a++;
                  } ?>


              <?php   }

                  if($a ==0){?>
                      <div class=" col-sm-12 alert alert-danger">لاتوجد إستقطاعات للموظف </div>

                      <?php }else{ ?>

                  <table class="table table-bordered">
                      <thead>
                      <th>م</th>
                      <th>اسم البدل</th>
                      <th>قيمه البدل</th>
                      <th>من تاريخ</th>
                      <th>الي تاريخ</th>
                      <th>تامينات</th>
                      </thead>
                      <tbody>
                      <?php
                      $status=array("1"=>"جيد","2"=>"متوسط","3"=>"غيرجيد","4"=>"يحتاج");

                      $x=1;
                      foreach($record->cut_emp as $row){?>
                          <tr>
                              <td><?php echo $x;?></td>
                              <td><?php  if(isset($row->title)) echo  $row->title;?> </td>
                              <td><?php if(isset($row->value->value)) echo  $row->value->value;?> </td>
                              <td><?php  if(isset($row->value->date_from)&&$row->value->date_from!=0) echo  date("Y-m-d",$row->value->date_from);?> </td>
                              <td><?php  if(isset($row->value->date_to)&&$row->value->date_to!=0) echo  date("Y-m-d",$row->value->date_to);?> </td>
                              <td><?php if(isset($row->value->insurance_affect)) {if($row->value->insurance_affect==1){echo 'نعم' ;}else { echo 'لا'; }  }?> </td>

                          </tr>
                          <?php
                          $x++;
                      } ?>
                      </tbody>
                  </table>

              <?php } }else { ?>

                  <div class=" col-sm-12 alert alert-danger">لاتوجد إستقطاعات للموظف </div>

              <?php  } ?>
              <div class="col-sm-12">
                  <h6 class="text-center inner-heading">الحسابات البنكيه</h6>
              </div>

              <?php
              if(isset($record->banks) &&!empty($record->banks)){?>
                  <table class="table table-bordered">
                      <thead>
                      <th>م</th>
                      <th>اسم البنك</th>

                      <th>رقم الحساب</th>
                      <th>نشظ/غيرنشط</th>


                      </thead>
                      <tbody>
                      <?php


                      $x=1;
                      foreach($record->banks as $row){?>
                          <tr>

                              <td><?php echo $x;?></td>
                              <td><?php echo $row->bank;?> </td>
                              <td><?php echo $row->bank_account_num;?> </td>

                              <td><?php if($row->approved_for_sarf==1){echo 'نشط' ;}else { echo 'غيرنشط'; } ?> </td>



                          </tr>
                          <?php
                          $x++;
                      } ?>


                      </tbody>


                  </table>

              <?php }else { ?>
                  <div class=" col-sm-12 alert alert-danger">لاتوجد بيانات</div>

              <?php } ?>

          </div>
          </div>
  </div>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>

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
    </script