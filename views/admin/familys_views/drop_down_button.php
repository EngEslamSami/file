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
    .top_radio{
        margin-bottom: 15px;
    }
    .top_radio input[type=radio] {
        height: 24px;
        width: 24px;
        line-height: 0px;
        vertical-align: middle;
        margin-right: -33px;
        top: -5px;

    }
    .top_radio .radio,.top_radio .radio {
        vertical-align: middle;
        font-size:16px;

        padding: 10px;
        border-bottom: 2px solid #eee;
        border-radius: 8px;
        text-align: right;

    }
    .radio input[type="radio"] {
        opacity: 1;
    }
</style>

<style type="text/css">

.btn-group.mega-btn .dropdown-menu{
left: 50% !important;
right: auto !important;
text-align: center !important;
transform: translate(-50%, 0) !important;
}


@media (max-width: 480px) {
.btn-group.mega-btn .dropdown-menu{
min-width:350px;
}
}
@media (min-width: 480px) and (max-width: 767px) {
.btn-group.mega-btn .dropdown-menu{
min-width:470px;
}
}
@media (min-width: 768px) and (max-width: 991px) {
.btn-group.mega-btn .dropdown-menu{
min-width:750px;
}
}
@media (min-width: 992px) (max-width: 1150px) {
.btn-group.mega-btn .dropdown-menu{
min-width:900px;
}
}
@media (min-width: 1151px){
.btn-group.mega-btn .dropdown-menu{
min-width:544px;
}
}

.mega-col{
width: 50%;
float: right;
list-style: none;
text-align: right;
padding-right: 5px;
}
.mega-col li{

}



li.mega-col-header {
    font-size: 18px;
    border-bottom: 3px double;
    margin-bottom: 8px;
    padding-left: 5px;
    padding-right: 0px;
}
.dropdown-menu li .mega-col:first-child{
border-left: 2px dotted #eee;
padding-left: 5px;
}
</style>

   
    <div class="panel ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php //echo $title?>  </h3>
<!------------------------------------------------------------------------------------------------------>
<?php


if ($basic_data_family["final_suspend"] == 4) { ?>
        <button id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
            <span class="">رقم ملف الأسرة</span>
        </button>
        <button class="btn btn-success  btn-sm progress-button ">
            <span class=""> <?php echo $basic_data_family["file_num"];?></span>
         </button>
         <button class="btn btn-add  btn-sm progress-button ">
             <span class="">فئة</span>
         </button>
             <button class="btn btn-add  btn-sm progress-button ">
             <span class=""><?php echo $basic_data_family["family_cat_name"];?></span>
         </button>
         
         
         
         
         
         
<?php }else{?>
    <button id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
            <span class="">رقم الطلب</span>
        </button>
        <button class="btn btn-success  btn-sm progress-button ">
            <span class=""> <?php echo $basic_data_family["id"];?></span>
         </button>
  <?php  } ?>
  
  
  
  <?php 
  
 // echo $_SESSION['role_id_fk'];
  if($_SESSION['role_id_fk'] == 1){ 
    
  
       if($basic_data_family["kadmat"] == 0){
    $display_name = '';
     $eqrar_display_name = 'none';
   }elseif($basic_data_family["kadmat"] == 1){ // جميع الخدمات التي تقدمها الجمعية 
     $display_name = '';
      $eqrar_display_name = 'none';
   }elseif($basic_data_family["kadmat"] == 2){ //  الإستفادة من خدمات البرامج والأنشطة
     $display_name = 'none';
     $eqrar_display_name = '';
   }else{
     $display_name = '';
      $eqrar_display_name = 'none';
   }
    
    ?>
    
    
    <div class="btn-group">
<button type="button" class="btn btn-sm  btn-info">اضافه - تعديل -استكمال </button>
<button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
<li><a  href="<?php echo base_url();?>family_controllers/Family/update_main_data/<?php echo $mother_num;?>">البيانات الأساسية  </a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/father/<?php echo $mother_num;?>">بيانات الأب  </a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/mother/<?php echo $mother_num;?>">بيانات الأم  </a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/add_wakel/<?php echo $mother_num;?>">بيانات الوكيل  </a></li>

<li><a  href="<?php echo base_url();?>family_controllers/Family/family_members/<?php echo $mother_num;?>/<?php  echo $person_account;?>/<?php   echo $agent_bank_account;?>">بيانات أفراد الأسرة</a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/house/<?php echo $mother_num;?>">بيانات السكن</a></li>
<li style="display:<?php echo $display_name; ?>"><a  href="<?php echo base_url();?>family_controllers/Family/devices/<?php echo $mother_num;?>">محتويات السكن </a></li>
<li style="display:<?php echo $display_name; ?>"><a  href="<?php echo base_url();?>family_controllers/Family/home_needs/<?php echo $mother_num;?>"> إحتياجات الأسرة </a></li>
<li style="display:<?php echo $display_name; ?>"><a  href="<?php echo base_url();?>family_controllers/Family/money/<?php echo $mother_num;?>">مصادر الدخل والإلتزامات </a></li>
<li style="display:<?php echo $display_name; ?>"><a  href="<?php echo base_url();?>family_controllers/Family/add_responsible_account/<?php echo $mother_num;?>"> بيانات الحساب البنكي</a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/attach_files/<?php echo $mother_num;?>">رفع الوثائق  </a></li>
</ul>
</div>




<div class="btn-group">
    <button type="button" class="btn btn-success">خطابات</button>
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
    
<li style="display:<?php echo $display_name; ?>"><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Civil_Status/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب الاحوال المدنيه </a></li>
<li style="display:<?php echo $display_name; ?>"><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Passports/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب الجوازات </a></li>
<li style="display:<?php echo $display_name; ?>"><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Insurance_letter_father/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب تأمينات ( الأب )  </a></li>
<li style="display:<?php echo $display_name; ?>"><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Insurance_letter/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب تأمينات ( الأم )  </a></li>
<li style="display:<?php echo $display_name; ?>"><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Retirement_letter/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب التقاعد  </a></li>
<li style="display:<?php echo $display_name; ?>"><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/daman_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب الضمان</a></li>

 <li style="display:<?php echo $eqrar_display_name; ?>"><a target="_blank" 
href="<?php echo base_url(); ?>family_controllers/Family_details/printEqrar_khdma/<?php echo $mother_num ?>">إقرار الخدمات</a></li>
 
    
  
    </ul>
</div>

<!-- new -->
<div class="btn-group mega-btn">
<button type="button" class="btn btn-danger"> اضافه الخطابات والمستندات</button>
<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
<li >
    <ul class="mega-col">
    <li class="mega-col-header">الخطابات</li>
        <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Civil_Status/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب الاحوال المدنيه </a></li>
        <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Passports/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب الجوازات </a></li>
        <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Insurance_letter_father/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب تأمينات ( الأب )  </a></li>    
        <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Insurance_letter/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب تأمينات ( الأم )  </a></li>
        <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Retirement_letter/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب التقاعد  </a></li>
        <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/daman_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب الضمان</a></li>
  
  
    </ul>
    <ul class="mega-col">
    <li class="mega-col-header">المستندات</li>
    <li><a  href=""
                                            data-toggle="modal"
                                            data-target="#modal-files-<?php echo $mother_num; ?>"
                                            style="padding: 0 4px;"> اضافه المستندات
                                    </a></li>

                                    <li>   <a  href=""
        onclick="print_prime_houe(<?=$mother_num?>);"
     >
        طباعة كروكي المنزل
        </a></li>
    
    </ul>
</li>

</ul>
</div>
<!--  -->










<!--  -->







<div class="btn-group">
    <a target="_blank" href="<?php echo base_url();?>family_controllers/Family_details/details/<?php echo $mother_num;?>">
        <button type="button" class="btn btn-primary btn-sm">إجراءات علي الملف</button></a>
</div>





<?php


if($basic_data_family['file_status'] ==0){
    $status_f_title =  ' حالة الملف';
    $status_Btn_class = 'info';
    $status_Btn_class_i = 'info';
}else{
    $status_f_title =  $basic_data_family['process_title'];
   $status_Btn_class = $basic_data_family['files_status_color'] ;
    $status_Btn_class_i = '';
} ?>

<div class="btn-group">
    <button style="color:black ; background-color:<?php echo $status_Btn_class; ?>  " data-toggle="modal"
            <?php if($basic_data_family['final_suspend'] !=4){?> disabled="disabled"  <?php } ?>
            data-target="#modal-FileConidtion"
            class="btn btn-sm btn-<?php echo $status_Btn_class_i;  ?> btn-sm" onclick="GetFileConidtion(<?php echo $basic_data_family['mother_national_num'];?>)"><i
            class="fa fa-list btn-<?php echo $status_Btn_class_i;  ?>"></i> <?php echo $status_f_title; ?>

    </button>


</div>

<div class="modal fade" id="modal-FileConidtion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="FileConidtion">



        </div>
    </div>
</div>







    <?php if($basic_data_family['file_update_date'] ==0){
        $f_title =  ' تحديث الملف';
        $Btn_class = 'info';
    }else{
        $f_title =  $basic_data_family['file_update_date'];
        $Btn_class = 'add';
    } ?>

<div class="btn-group">
        <button data-toggle="modal" <?php if($basic_data_family['final_suspend'] !=4){?> disabled="disabled"  <?php } ?>
                data-target="#modal-file_update"
                class="btn btn-sm btn-<?php echo $Btn_class; ?>" onclick="GetFileUpdate(<?php echo $basic_data_family['mother_national_num'];?>)"><i
                class="fa fa-list btn-<?php echo $Btn_class; ?>"></i>

            <?php echo $f_title; ?>


            <br />
        </button>  
</div>

  <div class="modal fade" id="modal-file_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width: 80%;">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle" style="color:red;"> تحديث حاله ملف  الأسره </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            </button>
                        </div>
                        <div class="modal-body" id="FileUpdate"></div>
                        <div class="modal-footer" style="display: inline-block; width: 100%;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>








<div class="btn-group">
    <button type="button" class="btn btn-warning">الطباعة</button>
    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li><a target="_blank" href="<?php echo base_url('family_controllers/Family_details/print_family').'/'.$basic_data_family['mother_national_num'] ?>"> طباعة الملف </a></li>
        <li><a target="_blank" href="<?php echo base_url('family_controllers/Family_details/print_card').'/'.$basic_data_family['mother_national_num'] ?>"> طباعة البطاقة  </a></li>

    </ul>
</div>








<div class="btn-group">
<button data-toggle="modal" data-target="#modal-file_tracking" class="btn btn-sm btn-info "
        onclick="GetFileTracking(<?php echo $basic_data_family['mother_national_num'];?>)">
    <i class="fa fa-list btn-info"></i> تتبع الملف</button>


    <div class="modal fade"  id="modal-file_tracking" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " style="width: 90%" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <div style="color:red;"> تفاصيل الإجراءات  اللجنة </div>
                    </h5>

                </div>
                <div class="modal-body row" id="FileTracking">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>

</div>







 <button data-toggle="modal" data-target="#modal-link-family" class="btn btn-sm btn-success">
     <i class="fa fa-list btn-success"></i>
     
     <?php if (isset($employees) && !empty($employees)) {
    foreach ($employees as $row_user) {
        if ($row_user->id == $basic_data_family["researcher_id"]) {
            echo $row_user->person_name;
        }

    }

} else {
    echo "   ربط الأسرة بباحث ";
}

?>
     
 </button>

 <a target="_blank" href="<?=base_url()."family_controllers/FamilyCalender/Calender/".$basic_data_family['mother_national_num'];?>">
 <button class="btn btn-sm btn-success">
     <i class="fa fa-calendar-check-o btn-success"></i> سجل الزيارات
 </button>
 </a>


<!--------------------------------------------------------------------->
<div class="modal fade" id="modal-link-family" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <div style="color:red;">ربط الاسرة</div>
                </h5>
            </div>
            <div class="modal-body ">
                <div class="col-sm-12">
                    <label class="label label-green  half"> اختار الموظف </label>
                    <input type="hidden" name="data[mother_national_id_fk]" class="form_researcher_id"
                           value="<?=$basic_data_family['mother_national_num']; ?>"/>
                    <select name="data[emp_id_fk]" class="form-control half  selectpicker form_researcher_id"
                            data-validation="required" aria-required="true" data-show-subtext="true"
                            data-live-search="true">
                        <option value="">اختر</option>
                        <?php if (isset($employees) && !empty($employees)) {
                            foreach ($employees as $row_user) {
                                $selected = '';
                                if ($row_user->id == $basic_data_family["researcher_id"]) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option value="<?= $row_user->id ?>" <?= $selected ?>>
                                    <?= $row_user->person_name ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block; width: 100%;">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                <input type="hidden" name="go" value="<?php echo $basic_data_family['id']; ?>" class="form_researcher_id" />
                <button type="button" onclick="put_researcher_id();" class="btn btn-warning ">حفظ
                </button>
            </div>
          
        </div>
    </div>
</div>
<!--------------------------------------------------------------------->                    

    
    
    
    
    
  <?php }else{ ?>
   
  
   
  

  

  
  
  
  
<?php

if(!empty($FamilyOperationsPermissions )){
if($FamilyOperationsPermissions->f_add_data ==1){ ?>
<div class="btn-group">
<button type="button" class="btn btn-sm  btn-info">اضافه - تعديل -استكمال </button>
<button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
<li><a  href="<?php echo base_url();?>family_controllers/Family/father/<?php echo $mother_num;?>">بيانات الأب  </a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/mother/<?php echo $mother_num;?>">بيانات الأم  </a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/add_wakel/<?php echo $mother_num;?>">بيانات الوكيل  </a></li>

<li><a  href="<?php echo base_url();?>family_controllers/Family/family_members/<?php echo $mother_num;?>/<?php  echo $person_account;?>/<?php   echo $agent_bank_account;?>">بيانات أفراد الأسرة</a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/house/<?php echo $mother_num;?>">بيانات السكن</a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/devices/<?php echo $mother_num;?>">محتويات السكن </a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/home_needs/<?php echo $mother_num;?>"> إحتياجات الأسرة </a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/money/<?php echo $mother_num;?>">مصادر الدخل والإلتزامات </a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/add_responsible_account/<?php echo $mother_num;?>"> بيانات الحساب البنكي</a></li>
<li><a  href="<?php echo base_url();?>family_controllers/Family/attach_files/<?php echo $mother_num;?>">رفع الوثائق  </a></li>
</ul>
</div>
<?php } }?>

<?php


if(!empty($FamilyOperationsPermissions)){
if($FamilyOperationsPermissions->f_letters ==1){ ?>
<div class="btn-group">
    <button type="button" class="btn btn-success">خطابات</button>
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
    
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Civil_Status/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب الاحوال المدنيه </a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Passports/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب الجوازات </a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Insurance_letter_father/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب تأمينات ( الأب )  </a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Insurance_letter/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب تأمينات ( الأم )  </a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Retirement_letter/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب التقاعد  </a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/daman_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب الضمان</a></li>


    
    
    
    <!--
        <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Civil_Status/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب الاحوال المدنيه </a></li>
        <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Insurance_letter/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب التأمينات  </a></li>
        <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/Retirement_letter/<?php echo $mother_num;?>/<?php echo $file_num; ?>">خطاب التقاعد  </a></li>
       <li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family_letter/daman_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب الضمان</a></li>
 -->
    </ul>
</div>
<?php } } ?>

<div class="btn-group">
    <a target="_blank" href="<?php echo base_url();?>family_controllers/Family_details/details/<?php echo $mother_num;?>">
        <button type="button" class="btn btn-primary btn-sm">إجراءات علي الملف</button></a>
</div>

<!---------------------------------------------------   حالة الملف-------------------------------------------------------->
<?php

if($basic_data_family['file_status'] ==0){
    $status_f_title =  ' حالة الملف';
    $status_Btn_class = 'info';
    $status_Btn_class_i = 'info';
}else{
    $status_f_title =  $basic_data_family['process_title'];
   $status_Btn_class = $basic_data_family['files_status_color'] ;
    $status_Btn_class_i = '';
} ?>
<?php if(!empty($FamilyOperationsPermissions)){ if($FamilyOperationsPermissions->f_file_status ==1){ ?>
<div class="btn-group">
    <button style="color:black ; background-color:<?php echo $status_Btn_class; ?>  " data-toggle="modal"
            data-target="#modal-FileConidtion"
            class="btn btn-sm btn-<?php echo $status_Btn_class_i;  ?> btn-sm" onclick="GetFileConidtion(<?php echo $basic_data_family['mother_national_num'];?>)"><i
            class="fa fa-list btn-<?php echo $status_Btn_class_i;  ?>"></i> <?php echo $status_f_title; ?>

    </button>


</div>

<div class="modal fade" id="modal-FileConidtion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="FileConidtion">



        </div>
    </div>
</div>
<?php } } ?>
<!---------------------------------------------------   حالة الملف-------------------------------------------------------->

<!---------------------------------------------------  تحديث الملف-------------------------------------------------------->



    <?php if($basic_data_family['file_update_date'] ==0){
        $f_title =  ' تحديث الملف';
        $Btn_class = 'info';
    }else{
        $f_title =  $basic_data_family['file_update_date'];
        $Btn_class = 'add';
    } ?>
<?php  if(!empty($FamilyOperationsPermissions)){
if($FamilyOperationsPermissions->f_file_updating ==1){ ?>
<div class="btn-group">
        <button data-toggle="modal" <?php if($basic_data_family['final_suspend'] !=4){?> disabled="disabled"  <?php } ?>
                data-target="#modal-file_update"
                class="btn btn-sm btn-<?php echo $Btn_class; ?>" onclick="GetFileUpdate(<?php echo $basic_data_family['mother_national_num'];?>)"><i
                class="fa fa-list btn-<?php echo $Btn_class; ?>"></i>

            <?php echo $f_title; ?>


            <br />
        </button>  
</div>

  <div class="modal fade" id="modal-file_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" style="width: 80%;">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle" style="color:red;"> تحديث حاله ملف  الأسره </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            </button>
                        </div>
                        <div class="modal-body" id="FileUpdate"></div>
                        <div class="modal-footer" style="display: inline-block; width: 100%;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
<?php } } ?>
<!---------------------------------------------------  تحديث الملف-------------------------------------------------------->





<!---------------------------------------------------  الطباعة-------------------------------------------------------->
<?php
if(!empty($FamilyOperationsPermissions)){
if($FamilyOperationsPermissions->f_file_print ==1){ ?>
<div class="btn-group">
    <button type="button" class="btn btn-warning">الطباعة</button>
    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li><a target="_blank" href="<?php echo base_url('family_controllers/Family_details/print_family').'/'.$basic_data_family['mother_national_num'] ?>"> طباعة الملف </a></li>
        <li><a target="_blank" href="<?php echo base_url('family_controllers/Family_details/print_card').'/'.$basic_data_family['mother_national_num'] ?>"> طباعة البطاقة  </a></li>

    </ul>
</div>

<?php } } ?>
<!---------------------------------------------------  الطباعة-------------------------------------------------------->


<!---------------------------------------------------   تتبع الملف-------------------------------------------------------->
<?php
if(!empty($FamilyOperationsPermissions)){
if($FamilyOperationsPermissions->f_file_follow ==1){ ?>
<div class="btn-group">
<button data-toggle="modal" data-target="#modal-file_tracking" class="btn btn-sm btn-info "
        onclick="GetFileTracking(<?php echo $basic_data_family['mother_national_num'];?>)">
    <i class="fa fa-list btn-info"></i> تتبع الملف</button>


    <div class="modal fade"  id="modal-file_tracking" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " style="width: 90%" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        <div style="color:red;"> تفاصيل الإجراءات  اللجنة </div>
                    </h5>

                </div>
                <div class="modal-body row" id="FileTracking">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>

</div>
<?php } } ?>
<!---------------------------------------------------   تتبع الملف-------------------------------------------------------->
<?php  if(!empty($FamilyOperationsPermissions)){
if($FamilyOperationsPermissions->f_researcher ==1){
    $this->load->model("familys_models/Register");
    $employees= $this->Register->select_all_employee();  ?>
 <button data-toggle="modal" data-target="#modal-link-family" class="btn btn-sm btn-success">
     <i class="fa fa-list btn-success"></i> ربط الأسرة بباحث
 </button>

<!--------------------------------------------------------------------->
<div class="modal fade" id="modal-link-family" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    <div style="color:red;">ربط الاسرة</div>
                </h5>
            </div>
            <div class="modal-body ">
                <div class="col-sm-12">
                    <label class="label label-green  half"> اختار الموظف </label>
                    <input type="hidden" name="data[mother_national_id_fk]" class="form_researcher_id"
                           value="<?=$basic_data_family['mother_national_num']; ?>"/>
                    <select name="data[emp_id_fk]" class="form-control half  selectpicker form_researcher_id"
                            data-validation="required" aria-required="true" data-show-subtext="true"
                            data-live-search="true">
                        <option value="">اختر</option>
                        <?php if (isset($employees) && !empty($employees)) {
                            foreach ($employees as $row_user) {
                                $selected = '';
                                if ($row_user->id == $basic_data_family["researcher_id"]) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option value="<?= $row_user->id ?>" <?= $selected ?>>
                                    <?= $row_user->employee ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block; width: 100%;">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                <input type="hidden" name="go" value="<?php echo $basic_data_family['id']; ?>" class="form_researcher_id" />
                <button type="button" onclick="put_researcher_id();" class="btn btn-warning ">حفظ
                </button>
            </div>
          
        </div>
    </div>
</div>
<!--------------------------------------------------------------------->                    
<?php } } ?>

<? } ?>

<?php  if(!empty($FamilyOperationsPermissions)){
if($FamilyOperationsPermissions->f_calender ==1){ 
    ?>
  <a href="<?=base_url()."FamilyCalender/Calender/".$basic_data_family['mother_national_num'];?>">
 <button class="btn btn-sm btn-success">
     <i class="fa fa-list btn-success"></i> جدول الزيارات
 </button>
 </a>
<?php } } ?>
<!-------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------>                        
        </div>
    </div>  












    <!---------------------------->
  
    <?php

   
            if (isset($records) && $records != null) {
                foreach ($records as $record) { ?>


                    <div class="modal fade"
                         id="modal-files-<?php echo $mother_num; ?>"
                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-success" role="document"
                             style="width: 80%">
                            <form method="post"
                                  action="<?php echo base_url(); ?>family_controllers/Family/add_required_files/<?php echo $record->mother_national_num; ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">الملفات
                                            المطلوبة</h5>

                                    </div>
                                    <div class="modal-body">
                                        <div class="piece-box no-border ">
                                            <!--<div class="piece-heading">
                                            <div class="col-xs-4">
                                                <h5 class="no-margin">رقم الطلب : <?php echo $record->id; ?></h5>
                                            </div>
                                            <div class="col-xs-5 ">

                                            </div>
                                            <div class="col-xs-3">
                                                <h5 class="no-margin">التاريخ : <?= date('Y-m-d') ?></h5>
                                            </div>
                                        </div>
                                    </div>-->


                                            <table id=""
                                                   class="table table-striped table-bordered no-margin">
                                                <thead>
                                                <tr>
                                                    <th class="piece-heading">بيانات الاسرة</th>
                                                    <th>رقم الطلب
                                                        : <?php echo $record->id; ?></th>
                                                    <th colspan="2">التاريخ
                                                        : <?= date('Y-m-d') ?></th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                    <td>اسم الاسرة
                                                        / <?php echo $record->father_name; ?></td>
                                                    <td>السجل المدني
                                                        / <?php echo $mother_num; ?></td>

                                                    <td> المدينة
                                                        / <?php echo $record->madina; ?> </td>

                                                    <td> الحي / <?php echo $record->hai; ?></td>
                                                </tr>


                                                </tbody>
                                            </table>


                                            <?php if (isset($main_attach_files) && !empty($main_attach_files)) { ?>
                                                <table id=""
                                                       class="table table-striped table-bordered dt-responsive nowrap table-pd"
                                                       cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <td><input class="check_all_not"
                                                                   id="check_all_not<?php echo $mother_num; ?>"
                                                                   type="checkbox"
                                                                   onclick="check_all(<?php echo $mother_num; ?>);"><label
                                                                    class="checktitle">
                                                                تحديدالكل </label>

                                                        </td>
                                                        <td>نوع الطلب</td>
                                                        <td>حالة الطلب</td>
                                                        <td>ملاحظات</td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $status = array('غير محدد', 'تحت الطلب', 'تم التسلم');
                                                    $y = 1;

                                                    foreach ($main_attach_files as $file_row) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <input class="check_large2 check_large<?php echo $mother_num; ?> check_large2"
                                                                       type="checkbox"
                                                                    <?php
                                                                    if (isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])) {
                                                                        if ($record->required_files[$file_row->id_setting]->doc_id_fk == $file_row->id_setting) {
                                                                            echo 'checked';
                                                                        }
                                                                    }
                                                                    ?>
                                                                       name="doc_id_fk[]"
                                                                       value="<?= $file_row->id_setting ?>"/>
                                                            </td>
                                                            <td><?= $file_row->title_setting ?></td>
                                                            <td>

                                                                <select name="doc_status_fk[]"
                                                                        class=" no-padding form-control"
                                                                        aria-required="true">
                                                                    <option value="">اختر
                                                                    </option>
                                                                    <?php foreach ($status as $key => $value) { ?>
                                                                        <option value="<?= $key ?>"
                                                                            <?php
                                                                            if (isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])) {
                                                                                if ($record->required_files[$file_row->id_setting]->doc_status_fk == $key) {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        ><?= $value ?></option>
                                                                    <?php } ?>
                                                                </select>

                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?php
                                                                if (isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])) {

                                                                    echo $record->required_files[$file_row->id_setting]->doc_notes;
                                                                }
                                                                ?>" name="doc_notes[]"
                                                                       class="form-control half"/>

                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="background-color: #428bca; color: white;text-align: center;">
                                                            جوال التواصل ( الجمعية)
                                                        </td>
                                                        <td colspan="2">


                                                            <input type="text" maxlength="10"
                                                                   name="society_mob"
                                                                   value="<?php if ($record->society_mob) {
                                                                       echo $record->society_mob;
                                                                   } ?>"
                                                                   onkeypress="validate_number(event);"
                                                                   onkeyup="check_length_num(this,10,'span_society_mob');"
                                                                   class="form-control half"
                                                                   placeholder="أدخل البيانات"
                                                                   required="required">
                                                            <span id="span_society_mob"
                                                                  style="color: red;"></span>

                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>


                                            <?php } ?>
                                        </div>
                                        <div class="modal-footer">
        <button
        type="button" onclick="print_prime_houe(<?=$mother_num?>);"
        class="btn btn-labeled btn-purple pull-left ">
        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة كروكي المنزل
        </button>
        <button type="submit" name="go_submit"value="go_submit" class="btn btn-labeled btn-warning">
        <span class="btn-label"><i class="glyphicon glyphicon-floppy-saved"></i></span>
         حفظ</button>
        <button type="button" class="btn btn-labeled btn-danger" data-dismiss="modal">
          <span class="btn-label"><i class="glyphicon glyphicon-floppy-remove"></i></span>


        إغلاق التفاصيل</button>


                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                <?php }
            } ?>


   
<script>
    function GetFileConidtion(basic_id) {
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/GetFileConidtion',
            data:{basic_id:basic_id},
            dataType:'html',
            cache:false,
            success: function(html){
                $("#FileConidtion").html(html);
            }
        });
    }
</script>
<script>
    function GetFileUpdate(basic_id) {

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/GetFileUpdate',
            data:{basic_id:basic_id},
            dataType:'html',
            cache:false,
            success: function(html){
                $("#FileUpdate").html(html);
            }
        });
    }
</script>
<script>
    function GetFileTracking(basic_id) {
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>family_controllers/Family/GetFileTracking',
            data:{basic_id:basic_id},
            dataType:'html',
            cache:false,
            success: function(html){
                $("#FileTracking").html(html);
            }
        });
    }
</script>
<script>
    function change_file_status(process_id,title,mom){
        var reason_ids=[];
        $(".check"+mom+':radio:checked').each(function(){reason_ids.push($(this).val()); })
        if(reason_ids.length==0){
            alert("من فضلك اختر السبب اولا");
            return;
        }
        var reason=$(".check"+mom+':radio:checked').val();
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/Family/change_file_status",
            data:{process_id:process_id,title:title,mom:mom,reason:reason},
            success:function(d){
                alert("تم تغيير حاله الملف");
                location.reload();
            }
        });
    }
</script>

<script>
   function put_researcher_id(){
        var dataString = $(".form_researcher_id").serialize();
        $.ajax({
            type:'post',
            url: '<?php echo base_url().'family_controllers/Family/AddRelations_in/'.$basic_data_family['mother_national_num'] ?>',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
               alert("تم ربط الاسرة ");
                location.reload();
            }
        });
        return false;
    }


</script>

<script>
    function print_prime_houe(mother_num) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . '/family_controllers/Family/print_prime_houe'?>",
            type: "POST",
            data: {mother_num: mother_num},
        });
        request.done(function (msg) {
            //this code for print
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
           /* WinPrint.print();
            WinPrint.close();*/
            //    end code
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>


