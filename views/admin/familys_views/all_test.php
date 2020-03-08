            <?php if(isset($records)&& $records!=null) {?>
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
                             <th class="text-center">إجراءات علي الملف</th>
      
                             <th class="text-center">حالة الملف</th> 
                              <th class="text-center">تحديث الملف</th> 
                               <th class="text-center">الطباعه</th>     
                            <!--      <th class="text-center">إجراءات علي الملف</th> 
                  
                        -->
                        
                      
                       
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

<td>

<div class="reset-button">
    
     <a target="_blank" href="<?php echo base_url();?>family_controllers/Family/father/<?php echo $record->mother_national_num;?>" 
     class="btn btn-sm btn-add"> <i class="fa fa-pencil " aria-hidden="true"></i> تعديل</a>
  </div>

<div class="reset-button">
    
     <a target="_blank" href="<?php echo base_url();?>family_controllers/Family_details/details/<?php echo $record->mother_national_num;?>"
         class="btn btn-sm btn-add"> <i class="hvr-buzz-out fa fa-recycle" aria-hidden="true">
             </i> إجراءات</a>
  
  
  </div>


</td>

<td>
    <?php if($record->file_status ==0){
             $status_f_title =  ' حالة الملف';
             $status_Btn_class = 'info';
             $status_Btn_class_i = 'info';
              }else{ 
               $status_f_title =  $record->process_title;
                 $status_Btn_class = $record->files_status_color ;
                     $status_Btn_class_i = '';  
                    } ?> 

 <button style="color:black ; background-color:<?php echo $status_Btn_class; ?>  " data-toggle="modal"
         data-target="#modal-info<?php echo $record->id;?>"
         class="btn btn-sm btn-<?php echo $status_Btn_class_i;  ?>"><i
        class="fa fa-list btn-<?php echo $status_Btn_class_i;  ?>"></i> <?php echo $status_f_title; ?>
</button>
</td>



<!--
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
                
                
                
                <div class=" col-xs-12 text-center top_radio">
                                <?php
                if(isset($reasons_types)&&!empty($reasons_types)){
                    foreach($reasons_types as $row){ ?>
                    
<div class="radio">
  <label>
  <input type="radio" name="check<?php echo $record->mother_national_num;?>" class="check<?php echo $record->mother_national_num;?>" value="<?php echo $row->id;?>"
                        <?php if(isset($record->reason)&&$record->reason==$row->id){?> checked="checked"  <?php } ?>>
                        <?php echo $row->title;?></br>
                     
                    
   </label>
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
-->



<!--
<td>
    <a target="_blank" href="<?php echo base_url();?>family_controllers/Family_details/details/<?php echo $record->mother_national_num;?>">إجراءات</a>
</td>
-->








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

 <!--                                          
<td style="color: black;">
    <button data-toggle="modal" data-target="#modal-lagna-family-<?php echo $record->id;?>" class="btn btn-sm btn-info"><i
            class="fa fa-list btn-info"></i> تتبع الملف
    </button>
</td> -->
                                          
                                    </tr>
                                  <?php endforeach;  ?>
                          </tbody>
                </table>
            </div>
   <?php } ?>         