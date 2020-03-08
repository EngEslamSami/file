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
</style>
<?php if(isset($result) && $result!=null){
           $form= form_open_multipart("person_controllers/Person/update_basic/".$result->id);
          $person_national_num=$result->person_national_num;
          $user_name=$result->user_name;
          $person_mob=$result->person_mob;
          $validation ='';
          $button ='تعديل ';
           $register_place=$result->register_place;
     }else{
          $form= form_open_multipart("person_controllers/Person/Add_Register");
          $person_national_num="";
          $user_name='';
          $person_mob='';
          $validation ='data-validation="required"';
          $button ='حفظ';
          $register_place='';
     }
?>
<div class="col-xs-12  " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">

            <?php if(isset($records)&&$records!=null){ ?>

                <div class="col-xs-12">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                       <tr class="greentd">
                                    <th class="text-center">م</th>
                                        <th class="text-center">رقم الطلب</th> 
                                        <th class="text-center">إسم رب الأسرة</th> 
                                        <th class="text-center">رقم الهوية</th> 
                                    
                                    
                                    <th class="text-center">هوية الأم </th>
                                    <th class="text-center">إسم الأم</th>
                                 <!--   <th class="text-center">رقم الجوال</th> -->
                                  <!--  <th class="text-center">الاجراء</th> -->
                                    <th class="text-center">استكمال البيانات</th>
                                <th class="text-center">إجراءات علي الملف</th> 
                                    <th class="text-center">رأي الباحث</th>
                                   <!-- <th class="text-center"> حاله الملف </th>
                                    <th class="text-center">إجراءات حالات الملف</th>
                                    <th class="text-center">تحديث الملف </th>-->
                                    <th class="text-center">طباعه الملف</th>
                               <!--     <th class="text-center">ربط الاسرة بباحث</th> -->
                              <!--    <th class="text-center">تحويل الملف </th> -->
                                </tr>
                                    </thead>
                          <tbody class="text-center">
                                <?php  $x=1; foreach ($records as $record ):?>
                                    <tr>
                                        <td><?php echo $x++ ?></td>
                                        <td><?php echo $record->id; ?></td>
                                           <td><?php echo $record->father_name; ?></td>
                                            <td><?php echo $record->father_national; ?></td> 
                                       
                                        <td><?php if($record->mother_name != ''){ echo $record->mother_name; }else{
                                                echo '<button type="button" class="btn btn-warning w-md m-b-5"> إستكمل البيانات</button>'; }   ?> </td>
                                                 <td><?php echo $record->mother_national_num; ?></td>
                                                
                                     <!--   <td><?php echo $record->mother_mob; ?></td> -->
   
   <!-- <td> <a href="<?php echo base_url('family_controllers/Family/update_register_2').'/'.$record->id?>">
            <i class="fa fa-pencil " aria-hidden="true"></i> </a>
        <a href="<?php echo  base_url('family_controllers/Family/delete_basic').'/'.$record->mother_national_num ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
            <i class="fa fa-trash" aria-hidden="true"></i></a>
    </td> -->
<td>
<div class="btn-group">
<button type="button" class="btn btn-danger">اضافه</button>
<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/father/<?php echo $record->mother_national_num;?>">بيانات الأب  </a></li>
<li><a target="_blank"  href="<?php echo base_url();?>family_controllers/Family/mother/<?php echo $record->mother_national_num;?>">بيانات الأم  </a></li>
<li><a target="_blank"  href="<?php echo base_url();?>family_controllers/Family/add_wakel/<?php echo $record->mother_national_num;?>">بيانات الوكيل  </a></li>

<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/family_members/<?php echo $record->mother_national_num;?>/<?php echo $record->person_account;?>/<?php echo $record->agent_bank_account;?>">بيانات أفراد الأسرة</a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/house/<?php echo $record->mother_national_num;?>">بيانات السكن</a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/devices/<?php echo $record->mother_national_num;?>">محتويات السكن </a></li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/home_needs/<?php echo $record->mother_national_num;?>"> إحتياجات الأسرة </a></li>

<li>
    <a target="_blank" href="<?php echo base_url();?>family_controllers/Family/money/<?php echo $record->mother_national_num;?>">مصادر الدخل والإلتزامات </a>
</li>
<li>
    <a target="_blank" href="<?php echo base_url();?>family_controllers/Family/add_responsible_account/<?php echo $record->mother_national_num;?>"> بيانات الحساب البنكي</a>
</li>
<li><a target="_blank" href="<?php echo base_url();?>family_controllers/Family/attach_files/<?php echo $record->mother_national_num;?>">رفع الوثائق  </a></li>
</ul>
</div>
</td>

    <td>
        <a target="_blank" href="<?php echo base_url();?>family_controllers/Family_details/details/<?php echo $record->mother_national_num;?>">إجراءات</a>
    </td>
    
    <td>
        <a target="_blank" href="<?php echo base_url();?>family_controllers/Family/SocialResearcher/<?php echo $record->mother_national_num;?>">إضافة رأي الباحث</a>
    </td>
    
    <!--
    <td style="color: black;"><?php echo $record->process_title;?></td>
    <td> <button data-toggle="modal"
                 data-target="#modal-info<?php echo $record->id;?>"
                 class="btn btn-sm btn-info"><i
                class="fa fa-list btn-info"></i>حاله الملف
        </button>
    </td>
    <td style="color: black;">
        <button data-toggle="modal" <?php if($record->suspend!=4){?> disabled="disabled"  <?php } ?>
                data-target="#modal-update<?php echo $record->id;?>"
                class="btn btn-sm btn-info"><i
                class="fa fa-list btn-info"></i>تحديث حاله الملف
        </button>
    </td>
    -->
    <td><a href = "<?php echo base_url('family_controllers/Family_details/print_family').'/'.$record->mother_national_num ?>" target = "_blank" >
            <i class="fa fa-print" aria-hidden = "true" ></i > </a></td>
  <!--
  <td style="color: black;">
            <button data-toggle="modal" data-target="#modal-link-family-<?php echo $record->id;?>" class="btn btn-sm btn-success"><i
                    class="fa fa-list btn-success"></i> ربط الأسرة بباحث
            </button>
       </td>
       -->
       <!--
    <td style="color: black;">
        <button data-toggle="modal" data-target="#modal-process-procedure-<?php echo $record->id;?>" class="btn btn-sm btn-info"><i
                class="fa fa-list btn-info"></i>تحويل الملف
        </button>
    </td>
       -->

                                            
                                    </tr>
                                  <?php endforeach;  ?>
                          </tbody>
</table>    
   
</div>
</div>
</div>   
<?php } ?>
   
</div>
</div>
</div>
