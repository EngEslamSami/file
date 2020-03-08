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
       <a href="#" id="delPOIbutton" onclick="deleteRow(this);">
           <i class="fa fa-trash" aria-hidden="true"></i>
       </a>








  </tr>


