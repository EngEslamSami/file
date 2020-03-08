<tr>

  <td> <select class="form-control badl_setting<?=$type?>" onchange="get_option($(this).val(),<?=$type?>);" id="badl<?=$type?><?php echo $len;?>"  name="badl_discount_id_fk[]" class="form-control" data-validation="required">

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
      <select  name="method_to_count[]" id="pay_paid<?=$type?><?php echo $len;?>" class="form-control" 
  
      <?php if($type==2){ ?> onchange="get_tamin_value($(this).val(),<?php echo $len;?>);"
<?php } ?>

      data-validation="required" >

        <option>اختر</option>
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

        <option value="0">اختر </option>
        <?php
        foreach ($yes_no as $key=>$value){?>
        <option value="<?=$key?>"><?=$value?></option>

        <?php } ?>

      </select>

    </td>


    <td><input type="date" disabled="disabled" id="date_from<?=$type?><?php echo $len;?>" value="" class="form-control" name="date_from[]" data-validation="required"  style="width: 130px;"> </td>
    <td><input type="date"  disabled="disabled"  id="date_to<?=$type?><?php echo $len;?>"  value="" class="form-control" name="date_to[]" data-validation="required"  style="width: 130px;"> </td>
  
  <?php if($type == 1){ ?> 
    <td><input type="checkbox" money="0" class="check_value<?=$type?>" onchange="get_checked_value(<?=$type?>);"  id="check<?=$type?><?php echo $len;?>" value="1" name="insurance_affect[]" ></td>
<?php } ?>

    <td><select name="dalel_code[]" class="form-control" id="hesab_name<?=$type?><?php echo $len;?>" data-validation="required">

      <option>اختر</option>
      <option value="1">1</option>
      <option value="2">2</option>


    </select></td>







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
