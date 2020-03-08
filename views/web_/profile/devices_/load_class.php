<?php if(isset($all_classroom) && !empty($all_classroom) && $all_classroom !=null ){  ?>
     <option>إختر الصف </option> 
<?php  foreach ($all_classroom as $one_class){ ?>  
     <option value="<?php echo $one_class->id?>"><?php echo $one_class->name?> </option>
<?php }  
      }else{?> 
     <option>لا يوجد صفوف للمرحلة</option>
<?php }?>       