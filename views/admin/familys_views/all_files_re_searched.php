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
/*
.radio label::before{
    left: auto;
    right: 0;
}*/
.radio input[type="radio"] {
    opacity: 1;
}
</style>


<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php  echo $title?> </h3>
        </div>
        <div class="panel-body">

<?php
/*
echo '<pre>';
print_r($records);
echo '<pre>';*/
?>
            <?php if(isset($records)&& $records!=null):?>
            <div class="col-xs-12">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                                <tr>
                                    <th class="text-center">م</th>
                                      <th class="text-center">رقم الملف</th>
                                      <th class="text-center">إسم رب الأسرة</th> 
                                        <th class="text-center">رقم الهوية</th> 
                                  
                                   
                                    <th class="text-center">إسم الأم</th>
                                     <th class="text-center">هوية الأم</th>
                                  <!--  <th class="text-center">رقم الجوال</th> -->
                                
                                    <th class="text-center">تعديل البيانات</th>
                                <th class="text-center">إجراءات علي الملف</th> 
                                  <!--  <th class="text-center">رأي الباحث</th> -->
                                    <th class="text-center"> حالة الملف </th>
                                  <!--      <th class="text-center"> حالة الملف</th> -->
                                    <th class="text-center">تحديث الملف </th>
                                    <th class="text-center">طباعه</th>
                                    <th class="text-center">تتبع الملف </th>
                                 <!--   <th class="text-center">ربط الاسرة بالباحثين</th> -->
                                 <!-- <th class="text-center">احالة </th>  -->
                                </tr>
                                </thead>
                          <tbody class="text-center">
                                <?php  $x=1; foreach ($records as $record ):?>
                                    <tr>
                                        <td><?php echo $x++ ?></td>
                                          <td><?php echo $record->file_num; ?></td>
                                            <td><?php echo $record->father_name; ?></td>
                                            <td><?php echo $record->father_national; ?></td> 
                                      
             <td><?php if($record->mother_name != ''){ echo $record->mother_name; }else{
                                                echo '<button type="button" class="btn btn-warning w-md m-b-5"> إستكمل البيانات</button>'; }   ?> </td>
                                                  <td><?php echo $record->mother_new_card; ?></td>
                                      <!-- <td><?php echo $record->mother_mob; ?></td> -->
                                   
<td>
<div class="btn-group">
<button type="button" class="btn btn-success">تعديل</button>
<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
<!--
<td>
    <a target="_blank" href="<?php echo base_url();?>family_controllers/Family/SocialResearcher/<?php echo $record->mother_national_num;?>">إضافة رأي الباحث</a>
</td>
-->
<!--
<td style="color: black; background-color: <?php echo $record->files_status_color ?>;">
<?php echo $record->process_title;?></td>
-->
    <?php if($record->file_status ==0){
             $status_f_title =  ' حالة الملف';
             $status_Btn_class = 'info';
             $status_Btn_class_i = 'info';
              }else{ 
               $status_f_title =  $record->process_title;
                 $status_Btn_class = $record->files_status_color ;
                     $status_Btn_class_i = '';  
                    } ?> 

<td>




 <button style="color:black ; background-color:<?php echo $status_Btn_class; ?>  " data-toggle="modal"
         data-target="#modal-info<?php echo $record->id;?>"
         class="btn btn-sm btn-<?php echo $status_Btn_class_i;  ?>"><i
        class="fa fa-list btn-<?php echo $status_Btn_class_i;  ?>"></i> <?php echo $status_f_title; ?>
</button>
</td>





<td style="color: black;">
    <?php if($record->file_update_date ==0){
             $f_title =  ' تحديث الملف';
             $Btn_class = 'info';
              }else{ 
               $f_title =  $record->file_update_date;
                 $Btn_class = 'add';  
                    } ?> 


<button data-toggle="modal" <?php if($record->suspend!=4){?> disabled="disabled"  <?php } ?>
        data-target="#modal-update<?php echo $record->id;?>"
        class="btn btn-sm btn-<?php echo $Btn_class; ?>"><i
        class="fa fa-list btn-<?php echo $Btn_class; ?>"></i>
        
        <?php echo $f_title; ?>
        
        
 <br /> 
</button>

</td>
  <td><a href = "<?php echo base_url('family_controllers/Family_details/print_family').'/'.$record->mother_national_num ?>" target = "_blank" >
                                                <i class="fa fa-print" aria-hidden = "true" ></i > </a>
                                                
                                                <a  href = "<?php echo base_url('family_controllers/Family_details/print_card').'/'.$record->mother_national_num ?>" target = "_blank" >
<i   style="background-color: #0a568c" class="fa fa-print" aria-hidden = "true" ></i > </a>
                                                
                                                
                                                </td>
                                  <!--    <td style="color: black;">
                                                <button data-toggle="modal" data-target="#modal-link-family-<?php echo $record->id;?>" 
                                                   class="btn btn-sm btn-success"><i
                                                        class="fa fa-list btn-success"></i> ربط الأسرة بباحث
                                                </button>
                                           </td>
                                           -->
                                           <!--
                                        <td style="color: black;">
                                            <button data-toggle="modal" data-target="#modal-process-procedure-<?php echo $record->id;?>" class="btn btn-sm btn-info"><i
                                                    class="fa fa-list btn-info"></i> احالة  الملف
                                            </button>
                                        </td> -->
                                           
                                       <td style="color: black;">
                                            <button data-toggle="modal" data-target="#modal-lagna-family-<?php echo $record->id;?>" class="btn btn-sm btn-info"><i
                                                    class="fa fa-list btn-info"></i> تتبع الملف
                                            </button>
                                        </td>
                                            
                                    </tr>
                                  <?php endforeach;  ?>
                          </tbody>
                </table>
            </div>
                 <?php  $x=1; foreach ($records as $record ):
                 
                $validation = 'data-validation="required" ';
                  $button ='حفظ';
                 ?>
                    <!-- start  -->
                    
                    
 <!------------------------------------ الملف تحديث----------------------------------------------->
  
	                    <div class="modal fade" id="modal-update<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="width: 80%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"> تحديث حاله ملف  الأسره </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  method="post" action="<?php echo base_url();?>family_controllers/Family/update_file_status">
                                        <div class="col-md-12">
                                            <input type="hidden" name="mother_national" value="<?php echo $record->mother_national_num;?>">
                                            <?php
                                            $file_num
                                            ?>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> رقم الملف  <strong class="astric">*</strong> </label>
                                                <input type="text" readonly="readonly" class="form-control half input-style"  name="file_num"
                                                       value=" <?php  if($record->file_num!=0){ echo  $record->file_num; }
                                                       else {  echo  ($file_num + 1) ;}?>"
                                                       id="file_num"   <?=$validation?> />
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12" >
                                                <label class="label label-green  half"> تاريخ فتح  الملف  <strong class="astric">*</strong> </label>
                                                <input type="date" class="form-control half input-style " <?php if($record->file_update_date!=0){ ?>  readonly="readonly"  <?php   } ?>  name="date_suspend" value="<?php echo  date("Y-m-d");?>"   id="date_suspend"   name="date_suspend"  <?=$validation?> />
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12" >
                                                <label class="label label-green  half">تاريخ اخر تحديث<strong class="astric">*</strong> </label>
                                                <input type="date" class="form-control half input-style" <?php if($record->file_update_date!=0){ ?>  readonly="readonly"  <?php   } ?>  onchange="get_peroid_update($(this).val(),<?php echo $record->id;?>);"
                                                       name="last_update_date" value="<?php if(isset($record->file_update_date)&&$record->file_update_date!=0){ echo $record->file_update_date; }else { echo  date("Y-m-d"); } ?>"

                                                       id="update_date_last<?php echo $record->id;?>"
                                                    <?=$validation?> />
                                            </div>



                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> فتره التحديث <strong class="astric">*</strong> </label>
                                                <select id="peroid_update<?php echo $record->id;?>" name="peroid_update" class="form-control half input-style"
                                                        onchange="get_peroid($(this).val(),<?php echo $record->id;?>);">
                                                    <option value="0">اختر</option>
                                                    <?php
                                                    if(isset($all_options)&&!empty($all_options)) {
                                                        foreach ($all_options as $row) {
                                                            ?>
                                                            <option value="<?php echo $row->num_of_day;?>" <?php if(isset($record->peroid_update )&&!empty($record->peroid_update)&&$record->peroid_update==$row->num_of_day ){?>    <?php } ?>> <?php echo $row->title;?> </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-sm-6 col-xs-12" >
                                                <label class="label label-green  half"> تاريخ  التحديث<strong class="astric">*</strong> </label>
                                                <input type="date" class="form-control half input-style"
                                                       name="update_date" value=""

                                                       id="update_date<?php echo $record->id;?>"
                                                    <?=$validation?> />
                                            </div>


                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-purple w-md m-b-5" 
                                                name="register" id="register" value="register">
                                                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                    </span> <?=$button?></button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>      
        <!--            
                    <div class="modal fade" id="modal-update<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document" style="width: 80%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"> تحديث حاله ملف  الأسره </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form  method="post" action="<?php echo base_url();?>family_controllers/Family/update_file_status">
                                        <div class="col-md-12">
                                            <input type="hidden" name="mother_national" value="<?php echo $record->id;?>">
                                            <?php
                                            $file_num
                                            ?>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> رقم الملف  <strong class="astric">*</strong> </label>
                                                <input type="text" readonly="readonly" class="form-control half input-style"  name="file_num"
                                                       value=" <?php  if($record->file_num!=0){ echo  $record->file_num; }
                                                       else {  echo  ($file_num + 1) ;}?>"
                                                       id="file_num"   <?=$validation?> />
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12" >
                                                <label class="label label-green  half"> تاريخ اعتماد الملف  <strong class="astric">*</strong> </label>
                                                <input type="date" class="form-control half input-style "  name="date_suspend" value="<?=$record->date_suspend?>"   id="date_suspend"   name="date_suspend"  <?=$validation?> />
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green  half"> فتره التحديث <strong class="astric">*</strong> </label>
                                                <select id="peroid_update" name="peroid_update" class="form-control half input-style"
                                                        onchange="get_peroid($(this).val(),<?php echo $record->id;?>);">
                                                    <option value="0">اختر</option>
                                                    <?php
                                                    if(isset($all_options)&&!empty($all_options)) {
                                                        foreach ($all_options as $row) {
                                                            ?>
                                                            <option value="<?php echo $row->num_of_day;?>" <?php if(isset($record->peroid_update )&&!empty($record->peroid_update)&&$record->peroid_update==$row->num_of_day ){?> selected="selected"<?php } ?>> <?php echo $row->title;?> </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-6 col-xs-12" >
                                                <label class="label label-green  half"> تاريخ التحديث<strong class="astric">*</strong> </label>
                                                <input type="date" class="form-control half input-style"
                                                  name="update_date" value="<?=$record->file_update_date?>" 
                                                  readonly="readonly" 
                                                    id="update_date<?php echo $record->id;?>" 
                                                      <?=$validation?> />
                                            </div>
                                            <div class="col-md-3">
                                                <button type="submit" class="btn btn-purple w-md m-b-5" 
                                                name="register" id="register" value="register">
                                                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                    </span> <?=$button?></button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
 <!---------------------------------------------------------------------->                   
    
    <div class="modal fade" id="modal-info<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><div style="color:red;" ><?php echo $record->process_title;?> </div></h5>
                <button type="button" style="position: relative;
    top: -22px;" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body row">
               <!-- <div class="col-md-12">
                <?php
                if(isset($reasons_types)&&!empty($reasons_types)){
                    foreach($reasons_types as $row){ ?>
                        <input type="radio" name="check<?php echo $record->mother_national_num;?>" class="check<?php echo $record->mother_national_num;?>" value="<?php echo $row->id;?>"
                        <?php if(isset($record->reason)&&$record->reason==$row->id){?> checked="checked"  <?php } ?>>
                        <?php echo $row->title;?></br>


                <?php } } ?>
                </div>
                -->
                
                
                
                <div class=" col-xs-12 text-center top_radio">
                                <?php
                if(isset($reasons_types)&&!empty($reasons_types)){
                    foreach($reasons_types as $row){ ?>
 
 <div class="col-sm-6">                   
<div class="radio">
  <label>
  <input type="radio" name="check<?php echo $record->mother_national_num;?>" class="check<?php echo $record->mother_national_num;?>" value="<?php echo $row->id;?>"
                        <?php if(isset($record->reason)&&$record->reason==$row->id){?> checked="checked"  <?php } ?>>
                        <?php echo $row->title;?></br>
                     
                    
   </label>
</div>
</div>
                    
                
               <?php } } ?>     
                  </div>
                
                
                <div class="col-md-12" style="padding-top: 20px !important;">
                    <?php if(isset($file_status)&&!empty($file_status)) {
                        foreach ($file_status as $row) {
                            ?>
                            <div class="col-md-3">
                                <button value="<?php echo $row->id;?>" 
                                  onclick="change_file_status($(this).val(),$(this).attr('title'),$(this).attr('mom'));" 
                                       style="background-color:<?php echo $row->color;?>; color: black;"
                                        title="<?php echo $row->title;?>"
                                        mom="<?php echo $record->mother_national_num;?>"
                                        class="btn btn-sm btn-info status">
                                    </i> <?php echo $row->title;?>
                                </button>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

    
                    
<!--
                    <div class="modal fade" id="modal-info<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle"><div style="color:red;" ><?php echo $record->process_title;?> </div></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12">
                                            <label class="label label-green  half">من فضلك اذكر السبب</label>
                            <textarea   class="form-control half  reason<?php echo $record->mother_national_num;?>" style="width: 100%;" rows="4" data-validation="required" >
                        </textarea>
                                        </div>
                                    <div class="col-md-12" style="padding-top: 20px !important;">
                                        <?php if(isset($file_status)&&!empty($file_status)) {
                                            foreach ($file_status as $row) {
                                                ?>
                                                <div class="col-md-3">
                                                    <button value="<?php echo $row->id;?>" onclick="change_status($(this).val(),$(this).attr('title'),$(this).attr('mom'));" style="background-color:<?php echo $row->color;?>;"
                                                            title="<?php echo $row->title;?>"
                                                            mom="<?php echo $record->mother_national_num;?>"
                                                            class="btn btn-sm btn-info status">
                                                        </i> <?php echo $row->title;?>
                                                    </button>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    
 -->                   
                    
                    
<!--
                    <div class="modal fade" id="modal-process-procedure-<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <?php echo  form_open_multipart("TransformationProcess/TransformationOfRegester/3/".$record->mother_national_num);?>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <div style="color:red;" >تحويل الملف  </div>
                                    </h5>

                                </div>
                                <div class="modal-body row">
                                    <div class="col-sm-12">
                                        <label class="label label-green  half">  الى  </label>
                                        <input type="hidden" name="family_file" value="<?=$record->mother_national_num;?>" />
                                      
                                        <select name="user_to" class="form-control half selectpicker" data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                                            <option value="">اختر</option>
                                            <?php if(isset($select_user)&&!empty($select_user)) {
                                            foreach ($select_user as $row_user) {
                                                   $out_name=  $row_user->user_name ;
                                                  if($row_user->role_id_fk == 3){
                                                  $out_name=  $row_user->employee ;
                                                  }
                                                  ?>
                                            <option value="<?=$row_user->user_id."-".$row_user->role_id_fk."-".$row_user->system_structure_id_fk?>">
                                            <?=$out_name?></option>
                                            <?php }
                                                  }?>
                                          </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <label class="label label-green  half">  الاجراء  </label>
                                        <select class="form-control half " name="process_procedure_id_fk" data-validation="required" aria-required="true">
                                            <option value="">اختر</option>
                                           <?php if(isset($select_process_procedures)&&!empty($select_process_procedures)) {
                                            foreach ($select_process_procedures as $row_process_procedures) {?>
                                            <option value="<?=$row_process_procedures->id?>"><?=$row_process_procedures->title?></option>
                                            <?php }
                                                  }?>
                                        </select>
                                    </div>
                            <div class="col-sm-12">
                            <label class="label label-green  half" >ملاحظات: </label>
                            <textarea class="form-control half input-style"  rows="3" name="reason"  data-validation="required"  ></textarea>
                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" name="go" value="<?php echo $record->id;?>" class="btn btn-warning">حفظ </button>
                                </div>
                                <?php  echo form_close()?>
                            </div>
                        </div>
                    </div>
                    
    -->                
                    
                    
                    <!--------------------------------------------------------------------->
 <!--                   
<div class="modal fade" id="modal-link-family-<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <?php echo  form_open_multipart("family_controllers/Family/AddRelations/$record->mother_national_num");?>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <div style="color:red;" >ربط الاسرة بالباحثين</div>
                                    </h5>

                                </div>
                                <div class="modal-body row">
                                    <div class="col-sm-12">
                                        <label class="label label-green  half">  اختار الموظف  </label>
                                        <input type="hidden" name="data[mother_national_id_fk]" value="<?=$record->mother_national_num;?>" />

                                        <select name="data[emp_id_fk]" class="form-control half  selectpicker"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                                            <option value="">اختر</option>
                                            <?php if(isset($employees)&&!empty($employees)) {
                                                foreach ($employees as $row_user) {
                                                    $selected= '' ;
                                                    if($row_user->id == $record->researcher_id){
                                                        $selected=  'selected' ;
                                                    }
                                                    ?>
                                                    <option value="<?=$row_user->id ?>" <?=$selected?>>
                                                        <?= $row_user->employee ?></option>
                                                <?php }
                                            }?>
                                        </select>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" name="go" value="<?php echo $record->id;?>" class="btn btn-warning">حفظ </button>
                                </div>
                                <?php  echo form_close()?>
                            </div>
                        </div>
                    </div>
                    -->
	     <!--------------------------------------------------------------------->
                    <div class="modal fade"  id="modal-lagna-family-<?php echo $record->id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered " style="width: 90%" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <div style="color:red;"> تفاصيل الإجرات  اللجنة </div>
                                    </h5>

                                </div>
                                <div class="modal-body row">
                                    <?php
                                    if(isset($record->transformation_lagna) && $record->transformation_lagna!=null):?>
                                        <div class="col-sm-12">
                                            <!--------------------------------------------------------------------------------------------------------->
                                            <table class="  table table-bordered table-striped table-hover">
                                                <tr class="info">
                                                    <th>م </th>
                                                    <th>من</th>
                                                    <th> الي الجنة </th>
                                                    <th> تاريخ  التحويل</th>
                                                    <th>الاجراءات </th>
                                                    <th>قرار اللجنة</th>
                                                    <th>تاريخ القرار </th>
                                                    <th> القرار ملاحظات </th>
                                                </tr>
                                                <?php $count=1; foreach($record->transformation_lagna as $row): ?>
                                                    <tr>
                                                        <td><?php echo $count++?></td>
                                                        <td><?php echo $row->user_name?></td>
                                                        <td><?php echo $row->main_lagna_name?></td>
                                                        <td><?php echo date("Y-m-d",$row->date)?></td>
                                                        <td><?php echo $row->procedures_option_lagna_title?></td>
                                                        <td><?php if($row->approved == 1){
                                                                echo "قبول الملف";
                                                            }elseif($row->approved == 2){
                                                                echo "رفض الملف ";
                                                            }elseif($row->approved == 0){
                                                                echo "لم يتم إتخاز القرار ";
                                                            } ?></td>
                                                        <td><?php echo $row->approved_date_ar?></td>
                                                        <td><?php echo $row->reason_lagna?></td>

                                                    </tr>
                                                <?php  endforeach;?>
                                            </table>
                                            <!--------------------------------------------------------------------------------------------------------->
                                        </div>
                                    <?php  else:
                                          echo '<div class="alert alert-danger">
                                                 <strong>لا يوجد إجراءات !</strong> .
                                                </div>';
                                            endif?>
                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                        <div style="color:red; padding-right: 15px;"> تتبع الملف </div>
                                    </h5>
                                    <?php $all_operation=$record->file_opration;
                                    if(isset($all_operation) && $all_operation!=null):?>
                                        <div class="col-sm-12">
                                            <!--------------------------------------------------------------------------------------------------------->
                                            <table class="  table table-bordered table-striped table-hover">
                                                <tr class="info">
                                                    <th>م </th>
                                                    <th>من</th>
                                                    <th> الي</th>
                                                    <th>التاريخ </th>
                                                    <th>الوقت</th>
                                                    <th>الاجراءات </th>
                                                    <th> ملاحظات </th>
                                                </tr>
                                                <?php $count=1; foreach($all_operation as $row): ?>
                                                    <tr>
                                                        <td><?php echo $count++?></td>
                                                        <td> <?php  if($row->role_id_fk_from == 3){
                                                                echo $row->from_employee;
                                                            }else{
                                                                echo $row->from_user_name;
                                                            }?>
                                                        </td>
                                                        <td><?php  if($row->role_id_fk_to == 3){
                                                                echo $row->to_employee;
                                                            }else{
                                                                echo $row->to_user_name;
                                                            }?></td>
                                                        <td> <?php echo date("Y-m-d",$row->date);?></td>
                                                        <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                                                        <td><?php if($row->transformation_type ==1){
                                                                echo ' قبول الملف';
                                                            }elseif($row->transformation_type ==2){
                                                                echo 'رفض الملف';
                                                            }elseif($row->transformation_type ==3){
                                                                echo 'تحويل الملف';
                                                            }elseif($row->transformation_type ==4){
                                                                echo 'اعتماد الملف';
                                                            }?>
                                                        </td>
                                                        <td><?php echo $row->transformation_note ?></td>
                                                    </tr>
                                                <?php endforeach;?>
                                            </table>
                                            <!--------------------------------------------------------------------------------------------------------->
                                        </div>
                                    <?php  else:
                                        echo '<div class="alert alert-danger">
                                                 <strong>لا يوجد إجراءات !</strong> .
                                                </div>';
                                    endif?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>



                <?php endforeach;  ?>

            <?php endif; ?>
            <!---------------------------->
        </div>
    </div>
</div>
<script>
    function get_banck_code(valu)
    {
        var valu=valu.split("-");
        $('#om_bank_code').val(valu[1]);
    }
    function get_banck_code_wakeel(valu2)
    {
        var valu2=valu2.split("-");
        $('#wakeel_bank_code').val(valu2[1]);
    }
</script>
<script>
    /*
     function chek_length(inp_id)
     {
     var inchek_id="#"+inp_id;
     var inchek =$(inchek_id).val();
     if(inchek.length > 10){
     document.getElementById('lenth_mob').style.color = '#F00';
     document.getElementById('lenth_mob').innerHTML = 'رقم الجوال مكون من عشر ارقام';
     var inchek_out= inchek.substring(0,10);
     $(inchek_id).val(inchek_out);
     }
     }
     */
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
    function length_hesab_wakeel(length) {
        var len=length.length;
        if(len<24){
            alert(" رقم الحساب  لابد الايقل عن 24 حرف او رقم");
        }
        if(len>24){
            alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
            //  document.getElementById('register').setAttribute("disabled", "disabled");
        }
        if(len==24){
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
    }
    function chek_length(inp_id)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(inchek_id).val();
        if(inchek.length < 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('register').setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);
        }
        if(inchek.length > 10){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('register').setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $(inchek_id).val(inchek_out);
        }
        if(inchek.length == 10){
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
    }
    function chek_len_mother_mob(valu)
    {
        if(valu.length < 10){
            document.getElementById("lenth_mob").style.color = '#F00';
            document.getElementById("lenth_mob").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById('register').setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,10);
            $('#mother_mob').val(inchek_out);
        }
        if(valu.length > 10){
            document.getElementById("lenth_mob").style.color = '#F00';
            document.getElementById("lenth_mob").innerHTML = 'أقصي عدد 10 ارقام';
            var inchek_out= inchek.substring(0,10);
            $('#mother_mob').val(inchek_out);
        }
        if(valu.length == 10){
            document.getElementById('register').removeAttribute("disabled", "disabled");
        }
    }
    function valid()
    {
        if($("#user_pass").val().length < 4){
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور اكثر من اربع حروف';
        }else if($("#user_pass").val().length > 4 &&  $("#user_pass").val().length < 10){
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور ضعيفة';
        }else if($("#user_pass").val().length > 10){
            document.getElementById('validate1').style.color = '#00FF00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور قوية';
        }
    }
    function valid2()
    {
        if($("#user_pass").val() == $("#user_pass_validate").val()){
            document.getElementById('validate').style.color = '#00FF00';
            document.getElementById('validate').innerHTML = 'كلمة المرور متطابقة';
        }else{
            document.getElementById('validate').style.color = '#F00';
            document.getElementById('validate').innerHTML = 'كلمة المرور غير متطابقة';
        }
    }
    function valid3()
    {
        if($("#user_pass_2").val().length < 4){
            document.getElementById('validate2').style.color = '#F00';
            document.getElementById('validate2').innerHTML = 'كلمة المرور اكثر من اربع حروف';
        }else if($("#user_pass_2").val().length > 4 &&  $("#user_pass").val().length < 10){
            document.getElementById('validate2').style.color = '#F00';
            document.getElementById('validate2').innerHTML = 'كلمة المرور ضعيفة';
        }else if($("#user_pass_2").val().length > 10){
            document.getElementById('validate2').style.color = '#00FF00';
            document.getElementById('validate2').innerHTML = 'كلمة المرور قوية';
        }
    }
    function valid4()
    {
        if($("#user_pass_2").val() == $("#user_pass_validate_2").val()){
            document.getElementById('validate3').style.color = '#00FF00';
            document.getElementById('validate3').innerHTML = 'كلمة المرور متطابقة';
        }else{
            document.getElementById('validate3').style.color = '#F00';
            document.getElementById('validate3').innerHTML = 'كلمة المرور غير متطابقة';
        }
    }
    function pass_name(){
        //-----------------------------------------------------
        var num =$("#mother_national_num").val();
        $("#user_name").val(num);
        if($("#mother_national_num").val().length < 10){
            document.getElementById('lenth').style.color = '#F00';
            document.getElementById('lenth').innerHTML = 'إسم المستخدم مكون من عشر ارقام';
        }else if($("#mother_national_num").val().length > 10){
            var mother_new=num.substring(0,10);
            $("#mother_national_num").val(mother_new);
            $("#user_name").val(mother_new);
            document.getElementById('lenth').innerHTML = '';
        }
        //-------------------------------------------------------
        var user_username=$('#mother_national_num').val();
        if(user_username != "" &&  user_username !=0 &&  user_username.length >= 10){
            var dataString ='mother_national_num_chik='+ user_username ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Family/Add_Register',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#lenth").html(html);
                    // $("#lenth_mob").css('display' , 'none');
                }
            });
        }
    }// end function
</script>
<script>
    function pass_name_2(){
        //-----------------------------------------------------
        var num_2 =$("#mother_national_num_2").val();
        $("#user_name_2").val(num_2);
        if($("#mother_national_num_2").val().length < 10){
            document.getElementById('lenth_2').style.color = '#F00';
            document.getElementById('lenth_2').innerHTML = 'إسم المستخدم مكون من عشر ارقام';
        }else if($("#mother_national_num_2").val().length > 10){
            var mother_new_2 =num_2.substring(0,10);
            $("#mother_national_num_2").val(mother_new_2);
            $("#user_name_2").val(mother_new_2);
            document.getElementById('lenth_2').innerHTML = '';
        }
        //-------------------------------------------------------
        var user_username_2 =$('#mother_national_num_2').val();
        if(user_username_2 != "" &&  user_username_2 !=0 &&  user_username_2.length >= 10){
            var dataString_2 ='mother_national_num_chik ='+ user_username_2 ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>family_controllers/Family/Add_Register',
                data:dataString_2,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#lenth_2").html(html);
                    // $("#lenth_mob").css('display' , 'none');
                }
            });
        }
    }// end function
</script>
<script>
    function getPerson_response(valu) {
        var response =valu;
        if(response ==0){
            document.getElementById("agent_name").value="";
            document.getElementById("agent_card").value="";
            document.getElementById("agent_relationship").value="";
            document.getElementById("agent_mob").value="";
            document.getElementById("agent_card_source").value="";
            document.getElementById("agent_bank_account").value="";
            document.getElementById("bank_account_id2").value="";
            document.getElementById("agent_name").setAttribute("disabled", "disabled");
            document.getElementById("agent_card").setAttribute("disabled", "disabled");
            document.getElementById("agent_relationship").setAttribute("disabled", "disabled");
            document.getElementById("agent_mob").setAttribute("disabled", "disabled");
            document.getElementById("agent_bank_account").setAttribute("disabled", "disabled");
            document.getElementById("agent_card_source").setAttribute("disabled", "disabled");
        }
        if(response ==1){
            document.getElementById("agent_name").removeAttribute("disabled", "disabled");
            document.getElementById("agent_card").removeAttribute("disabled", "disabled");
            document.getElementById("agent_relationship").removeAttribute("disabled", "disabled");
            document.getElementById("agent_mob").removeAttribute("disabled", "disabled");
            document.getElementById("agent_card_source").removeAttribute("disabled", "disabled");
            document.getElementById("agent_bank_account").removeAttribute("disabled", "disabled");
            document.getElementById("wakeel_bank_num").removeAttribute("disabled", "disabled");
            //=====
            document.getElementById("person_account").value="";
            document.getElementById("person_account").setAttribute("disabled", "disabled");
            document.getElementById("bank_account_id1").setAttribute("disabled", "disabled");
            document.getElementById("om_bank_code").setAttribute("disabled", "disabled");
            document.getElementById("om_bank_num").setAttribute("disabled", "disabled");
            //========
        }
    }
</script>
<script>
    function checkPerson_account() {
        var person_account =$('#person_account').val();
        if(person_account ==0){
            document.getElementById("bank_account_id1").setAttribute("disabled", "disabled");
            document.getElementById("om_bank_num").setAttribute("disabled", "disabled");
            //  document.getElementById("om_bank_num").value="";
        }else{
            document.getElementById("bank_account_id1").removeAttribute("disabled", "disabled");
            document.getElementById("om_bank_num").removeAttribute("disabled", "disabled");
        }
    }
    function checkAgent_bank_account() {
        var agent_bank_account =$('#agent_bank_account').val();
        var person_account =$('#person_account').val();
        if(person_account == 1){
            document.getElementById("agent_bank_account").value="";
            document.getElementById("agent_bank_account").setAttribute("disabled", "disabled");
        }else{
            if (agent_bank_account == 0) {
                document.getElementById("bank_account_id2").setAttribute("disabled", "disabled");
                // document.getElementById("bank_account_id2").value="";
                document.getElementById("wakeel_bank_num").setAttribute("disabled", "disabled");
            } else {
                document.getElementById("bank_account_id2").removeAttribute("disabled", "disabled");
                document.getElementById("wakeel_bank_num").removeAttribute("disabled", "disabled");
            }
        }
    }
</script>
<script>
    function get_peroid_update(from_date,id)
    {
        var peroid= $('#peroid_update'+id).val();
        if(peroid==0)
        {
            $('#update_date'+id).val('');
            return;
        }
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/get_date_update",
            data:{from_date:from_date,peroid:peroid},
            success:function(d){
               $('#update_date'+id).val(d);

            }
        });
    }



</script>
<script>
    function get_peroid(value,id)  //old 
    {
        var date_last= $('#update_date_last'+id).val();
        if(value==0)
        {
            $('#update_date'+id).val('');
            return;
        }

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/get_date",
            data:{value:value,date_last:date_last},
            success:function(d){
                $('#update_date'+id).val(d);
            }
        });
    }
/*
    function get_peroid(value,id)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/get_date",
            data:{value:value},
            success:function(d){
                $('#update_date'+id).val(d);
            }
        });
    }
    */
</script>
<!--
<script>
   function get_peroid(value)
   {
       $.ajax({
           type:'post',
           url:"<?php echo base_url();?>/family_controllers/Family/get_date",
           data:{value:value},
           success:function(d){
               $('#update_date').val(d);
           }
       });
   }
</script>
-->
<script>
    function change_status(process_id,title,mom)
    {
        var reason=$('.reason'+mom).val();
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/change_file_status",
            data:{process_id:process_id,title:title,mom:mom,reason:reason},
            success:function(d){
                alert("تم تغيير حاله الملف");
                location.reload();
            }
        });
    }
</script>













<!---------------------------------------------------------------------------->
<!--
<script>
   function get_peroid(value)
   {
       $.ajax({
           type:'post',
           url:"<?php echo base_url();?>/family_controllers/Family/get_date",
           data:{value:value},
           success:function(d){
               $('#update_date').val(d);
           }
       });
   }
</script>
-->
<script>
    function change_status(process_id,title,mom)
    {
        var reason=$('.reason'+mom).val();
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/change_file_status",
            data:{process_id:process_id,title:title,mom:mom,reason:reason},
            success:function(d){
                alert("تم تغيير حاله الملف");
                location.reload();
            }
        });
    }
</script>

<!--
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

            <?php if(isset($records)&&$records!=null){?>

                <div class="col-xs-12">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                              <th class="text-center">إسم الأم </th>
                                            <th class="text-center">رقم السجل المدني للام</th>
                                          
                                            <th class="text-center">رقم الجوال</th>
                                            <th class="text-center">الاجراء</th>
                                      
                                              <th class="text-center">تفاصيل</th>
                                           
                                                <th class="text-center">طباعه الملف</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $x=1;
                                    foreach ($records as $record ):?>
                                        <tr>
<td><?php echo $x++ ?></td>
<td><?php
if($record->mother_name != ''){ echo $record->mother_name; }else{ 
    echo '<button type="button" class="btn btn-warning w-md m-b-5"> إستكمل بيانات الأم</button>'; } 
?></td>
<td><?php echo $record->mother_national_num; ?></td>

<td><?php echo $record->mother_mob; ?></td>
<td> <a href="<?php echo base_url('family_controllers/Family/update_basic').'/'.$record->id?>"> 
<i class="fa fa-pencil " aria-hidden="true"></i> </a> 
<a href="<?php echo  base_url('family_controllers/Family/delete_basic').'/'.$record->id ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
<i class="fa fa-trash" aria-hidden="true"></i></a>
</td>

     
     <td>
   <a target="_blank" href="<?php echo base_url();?>family_controllers/Family_details/details/<?php echo $record->mother_national_num;?>">تفاصيل</a>
      
     </td>
     
     

     
     
     
   <td>
   
   <a href = "<?php echo base_url('family_controllers/Family_details/print_family').'/'.$record->mother_national_num ?>" target = "_blank" > <i class="fa fa-print" aria - hidden = "true" ></i > </a>
<a  href = "<?php echo base_url('family_controllers/Family_details/print_card').'/'.$record->mother_national_num ?>" target = "_blank" >
<i   style="background-color: #0a568c" class="fa fa-print" aria-hidden = "true" ></i > </a>
</td>


     
    </tr>






    <?php
  
endforeach;

  ?>
<?php }else{
        echo '
	<div class="alert alert-danger" role="alert">
لا يوجد ملفات
</div>';
	
    
} ?>
</tbody>
</table>    
   
</div>
</div>
</div>      
</div>
</div>
</div>

-->


<script>
    function change_file_status(process_id,title,mom)
    {
        var reason_ids=[];
        $(".check"+mom+':radio:checked').each(function(){reason_ids.push($(this).val()); })


        if(reason_ids.length==0){

            alert("من فضلك اختر السبب اولا");
            return;
        }


       var reason=$(".check"+mom+':radio:checked').val();

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>/family_controllers/Family/change_file_status",
            data:{process_id:process_id,title:title,mom:mom,reason:reason},
            success:function(d){
                alert("تم تغيير حاله الملف");
                location.reload();
            }
        });

    }
</script>


