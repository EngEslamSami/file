
<tr>

    <td>
        <select class="form-control " id="device_id_fk<?=$_POST['len']?>"   name="device_id_fk[]" class="form-control"   data-validation="required">

            <option value="">اختر</option>

            <?php
            if(isset($devices) && !empty($devices)){
            foreach ($devices as $row){
                ?>
                <option value="<?php echo $row->id_setting;?>"><?php echo $row->title_setting;?></option>

            <?php }} else { ?>
                <option value="">لايوجد اجهزة مضافة</option>
            <?php } ?>
        </select>
    </td>
    <?php

    ?>
    <td>
        <select class="form-control " id="bank_id_fk_d<?=$_POST['len']?>"  onchange="get_accounts(this.value,<?=$_POST['len']?>)"   name="bank_id_fk[]" class="form-control" data-validation="required">

            <option value="">- أختر -</option>
            <?php
            if(isset($banks) && !empty($banks)){ ?>
                <?php  foreach ($banks as $row){
                    ?>
                    <option value="<?php echo $row->bank_id_fk;?>"><?php echo $row->bank_name;?></option>

                <?php }} else { ?>
                <option value="">لايوجد بنوك مضافة</option>
            <?php } ?>
        </select>
    </td>


    <td>
        <select class="form-control " id="account_id_fk_d<?=$_POST['len']?>"     name="account_id_fk[]"  onchange="get_accounts_nums(this.value,<?=$_POST['len']?>)"  data-validation="required">

            <option value="">اختر</option>

        </select>
        
    </td>
    
    <td>
        <select class="form-control " id="account_num_id_fk<?=$_POST['len']?>"     name="account_num_id_fk[]"  data-validation="required">

            <option value="">اختر</option>

        </select>

    </td>


   <td><a readonly href="#" id="delPOIbutton"  onclick="deleteRow(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td>







  </tr>



