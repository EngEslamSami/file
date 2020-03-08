
<tr>

  <td>
          

              <select id="benef<?php echo $len;?>" name="bank_id_fk[]" onchange=""   class="form-control half " data-validation="required" >
                  <option value="">إختر البنك </option>
                  <?php
                  if(isset($banks)){
                  foreach ($banks as $bank){ ?>

                      <option value="<?=$bank->id?>"><?=$bank->title?></option>
                  <?php } } ?>

              </select>

    </td>
    <td>
        <select id="account_id_fk<?php echo $len;?>" name="account_id_fk[]"   class="form-control half benfit" data-validation="required" >
            <option value="">إختر الحساب</option>
          <?php  if(isset($accounts) ){
            foreach ($accounts as $account){ ?>

                <option value="<?=$account->id?>"><?=$account->title?></option>
            <?php } } ?>

        </select>
    </td>

    <td>
      <input type="text"  data-validation="required"  value="" class="form-control " onkeyup="check_len($(this).val())" maxlength="24" name="account_num[]">
        <input type="hidden" name="type[]" value="2" />
    </td>


    <td>
        <?php
        $status  = array(
        '0'=>'غير نشط',
        '1'=>'نشط',
        );
        ?>
        <select id="status<?php echo $len;?>" name="status[]"   class="form-control half " data-validation="required" >
            <option value="">إختر الحالة</option>
            <?php
                foreach ($status as  $key=>$row ){ ?>

                    <option value="<?=$key?>"><?=$row?></option>
                <?php  } ?>

        </select>
    </td>
    <td>
        <input type="text" class="form-control testButton" name="rqm_hesab[]" id="account_num<?=$len?>" data-validation="required" aria-required="true" readonly="" onclick="$('#modalID').val(<?=$len?>); $(this).removeAttr('readonly');" ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');" style="cursor:pointer;" autocomplete="off" onkeypress="return isNumberKey(event);" onblur="$(this).attr('readonly','readonly')"
               onkeyup="getVouchQbdAccountName($(this).val(),<?=$len?>);  ">
    </td>
    <td>
        <input type="text" class="form-control" name="name_hesab[]" id="account<?=$len?>" data-validation="required" aria-required="true" readonly="" >
    </td>



    <td>
       <a href="#" id="delPOIbutton" onclick="deleteRow(this);">
           <i class="fa fa-trash" aria-hidden="true"></i>
       </a>
       <input type="submit" id="submit_b" style="padding: 5px 14px;" name="add" class="btn btn-blue btn-close" value=" حفظ ">
   </td>
  










  </tr>


<!--
<tr>

  <td>
          

              <select id="benef<?php echo $len;?>" name="bank_id_fk[]" onchange=""   class="form-control half " data-validation="required" >
                  <option value="">إختر البنك </option>
                  <?php
                  if(isset($banks)){
                  foreach ($banks as $bank){ ?>

                      <option value="<?=$bank->id?>"><?=$bank->title?></option>
                  <?php } } ?>

              </select>

    </td>
    <td>
        <select id="account_id_fk<?php echo $len;?>" name="account_id_fk[]"   class="form-control half benfit" data-validation="required" >
            <option value="">إختر الحساب</option>
          <?php  if(isset($accounts) ){
            foreach ($accounts as $account){ ?>

                <option value="<?=$account->id?>"><?=$account->title?></option>
            <?php } } ?>

        </select>
    </td>

    <td>
      <input type="text"  data-validation="required"  value="" class="form-control " onkeyup="check_len($(this).val())" maxlength="24" name="account_num[]">
        <input type="hidden" name="type[]" value="2" />
    </td>


    <td>
        <?php
        $status  = array(
        '0'=>'غير نشط',
        '1'=>'نشط',
        );
        ?>
        <select id="status<?php echo $len;?>" name="status[]"   class="form-control half " data-validation="required" >
            <option value="">إختر الحالة</option>
            <?php
                foreach ($status as  $key=>$row ){ ?>

                    <option value="<?=$key?>"><?=$row?></option>
                <?php  } ?>

        </select>
    </td>
    <td>
        <input type="text" class="form-control testButton" name="rqm_hesab[]" id="account_num<?=$len?>" data-validation="required" aria-required="true" readonly="" onclick="$('#modalID').val(<?=$len?>); $(this).removeAttr('readonly');" ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');" style="cursor:pointer;" autocomplete="off" onkeypress="return isNumberKey(event);" onblur="$(this).attr('readonly','readonly')"
               onkeyup="getVouchQbdAccountName($(this).val(),<?=$len?>);  ">
    </td>
    <td>
        <input type="text" class="form-control" name="name_hesab[]" id="account<?=$len?>" data-validation="required" aria-required="true" readonly="" >
    </td>



    <td>
       <a href="#" id="delPOIbutton" onclick="deleteRow(this);">
           <i class="fa fa-trash" aria-hidden="true"></i>
       </a>
   </td>



  </tr>
-->


