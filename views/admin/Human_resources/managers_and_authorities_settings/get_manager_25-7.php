
<tr>
     <td>
         <select class="form-control   selectchange "  data-validation="required" aria-required="true"   onchange="get_new_option($(this).val());"
                name="depart_id_fk[]">
             <option value="">إختر</option>
             <?php
             if(!empty($mainDepartments)){
             foreach ($mainDepartments as $value){
                
                if( $value->sub > 0){
    continue;
}


                 ?>
                 <option value="<?php echo $value->id; ?>" ><?php echo  $value->name;?> </option>
             <?php } } ?>
         </select>


     </td>
    <td>
        <select class="form-control selectpicker "  data-show-subtext="true" data-live-search="true"   name="emp_id_fk[]"    data-validation="required" aria-required="true"  >
            <option value="">إختر</option>
            <?php
            if(!empty($employees)){
            foreach ($employees as $value){?>
                <option value="<?php echo $value->id; ?>" ><?php echo  $value->employee;?> </option>
            <?php } } ?>
        </select> </td>
    <td><input type="file" name="sign_img[]" id="sign_img[]"></td>
</tr>






<script type="text/javascript">
    $('.selectpicker').selectpicker("refresh");
</script>
