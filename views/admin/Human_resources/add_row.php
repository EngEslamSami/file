<tr>
<!-- Nagwa 20-6 -->
  <td> <select class="form-control badl_setting<?=$type?>" onchange="get_rkm_hesab(<?= $type?>,this.value);get_option($(this).val(),<?=$type?>);" id="badl<?=$type?><?php echo $len;?>"  name="badl_discount_id_fk[]" class="form-control" data-validation="required">

    <option value="0">اختر</option>

    <?php
    if(isset($records)&&!empty($records)){
      foreach ($records as $row){
        ?>
        <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>


        <?php } } ?>

      </select>
    </td>
    <td>
        <!-- Nagwa 20-6 -->
      <select  name="method_to_count[]" id="pay_paid<?=$type?><?php echo $len;?>" class="form-control" 
  
      <?php if($type==2){ ?> onchange="get_tamin_value($(this).val(),<?php echo $len;?>);"
<?php } ?>

      data-validation="required" >

        <option value="">اختر</option>
        <option value="1">قيمه</option>
        <option value="2">نسبه</option>


      </select>
    </td>
    <?php
    $yes_no=array(1=>'نعم',2=>'لا');
    ?>
    <td>
      <input type="text" onkeyup="put_value(<?php echo $len;?>,<?php echo $type;?>);" id="value<?=$type?><?php echo $len;?>" data-validation="required" value=""class="form-control valu<?php echo $type;?>" name="value[]">
    </td>


    <td>

      <select class="form-control" onchange="get_peroid(<?=$type?>,<?php echo $len;?>);" id="peroid<?=$type?><?php echo $len;?>" value=""class="form-control" name="specific_period[]" data-validation="required">

        <option value="">اختر </option>
        <?php
        foreach ($yes_no as $key=>$value){?>
        <option value="<?=$key?>"><?=$value?></option>

        <?php } ?>

      </select>

    </td>


    <td><input type="date" disabled="disabled" id="date_from<?=$type?><?php echo $len;?>" value="" class="form-control" name="date_from[]" data-validation="required"  > </td>
    <td><input type="date"  disabled="disabled"  id="date_to<?=$type?><?php echo $len;?>"  value="" class="form-control" name="date_to[]" data-validation="required"  > </td>
  
  <?php if($type == 1){ ?> 
    <td>
      <div class="skin-square">
        <div class="i-check">
          <input type="checkbox" money="0" class="check_value<?=$type?>" onchange="get_checked_value(<?=$type?>);"  id="check<?=$type?><?php echo $len;?>" value="1" name="insurance_affect[]" >
        </div>                                        
      </div>
    </td>
<?php } ?>
    <!-- Nagwa 20-6 -->
    <td>
        <input name="dalel_code[]" id="dalel_code<?=$type?><?php echo $len;?>" class="form-control half"
               value="" readonly>
        <input name="dalel_name[]" id="dalel_name<?=$type?><?php echo $len;?>" class="form-control half"
               value="" readonly>


    </td>
    <!-- Nagwa 20-6 -->


   <td><a readonly type="button" id="delPOIbutton" value="حذف"  style="" onclick="deleteRow(this,<?php echo $type;?>);"><i class="fa fa-trash"></i></a></td>







  </tr>


  <script>

   function get_peroid(type,len)
   {
       //alert(type+len+valu);
       var valu=$("#peroid"+type+len).val();
       if(valu==1)
       {
         document.getElementById("date_to"+type+len).removeAttribute("disabled", "disabled");
         document.getElementById("date_from"+type+len).removeAttribute("disabled", "disabled");
       }else{

         document.getElementById("date_to"+type+len).setAttribute("disabled", "disabled");
         document.getElementById("date_from"+type+len).setAttribute("disabled", "disabled");
       }

     }



   </script>
   
   <script type="text/javascript" src="<?php echo base_url() ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>

<script>
 $('.skin-minimal .i-check input').iCheck({
     checkboxClass: 'icheckbox_minimal',
     radioClass: 'iradio_minimal',
     increaseArea: '20%'
 });
 
 $('.skin-square .i-check input').iCheck({
     checkboxClass: 'icheckbox_square-green',
     radioClass: 'iradio_square-green'
 });
 
 
 $('.skin-flat .i-check input').iCheck({
     checkboxClass: 'icheckbox_flat-red',
     radioClass: 'iradio_flat-red'
 });
 
 $('.skin-line .i-check input').each(function () {
     var self = $(this),
             label = self.next(),
             label_text = label.text();
 
     label.remove();
     self.iCheck({
         checkboxClass: 'icheckbox_line-blue',
         radioClass: 'iradio_line-blue',
         insert: '<div class="icheck_line-icon"></div>' + label_text
     });
 });
 
</script>  
