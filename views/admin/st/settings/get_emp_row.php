<tr >

    <td id="<?=$_POST['length']?>">


        <select class="form-control " id="edara_id_fk<?=$_POST['length']?>"   name="edara_name[]"  onchange="get_qsm(this.value,<?=$_POST['length']?>);"  class="form-control"   data-validation="required">

            <option value="">اختر</option>

            <?php
            if(isset($adminstations) && !empty($adminstations)){
                foreach ($adminstations as $row){
                    ?>
                    <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>

                <?php }} else { ?>
                <option value="">لايوجد ادارات مضافة</option>
            <?php } ?>
        </select>
    </td>

    <td>
        <select class="form-control " id="qsm_id_fk<?=$_POST['length']?>"     name="qsm_name[]"  onchange="get_emp(this.value,<?=$_POST['length']?>);"    data-validation="required" style="width: 100px;">

            <option value="">اختر</option>

        </select>

    </td>

    <td>
        <select class="form-control " id="emp_id<?=$_POST['length']?>"     name="emp_id[]"  data-validation="required">

            <option value="">اختر</option>

        </select>

    </td>
    <td>
        <select class="form-control " id="storage_fk<?=$_POST['length']?>"   name="storage_fk[]"    class="form-control"   data-validation="required">

            <option value="">اختر</option>

            <?php
            if(isset($storage) && !empty($storage)){
                foreach ($storage as $row){
                    ?>
                    <option value="<?php echo $row->id_setting;?>"

                    ><?php echo $row->title_setting;?></option>

                <?php }} ?>
        </select>
    </td>
    <td>
        <select class="form-control " id="process<?=$_POST['length']?>"   name="process[]"    class="form-control"   data-validation="required">

            <option value="">اختر</option>

            <?php
            $process = array(1=>'إضافة',2=>'صرف');

            foreach ($process as $key=>$value){
                ?>
                <option value="<?= $key;?>"

                ><?= $value;?></option>

            <?php } ?>
        </select>
    </td>
    <td>

        <input type="text" class="form-control testButton inputclass" name="rkm_hesab[]"
               id="rkm_hesab<?=$_POST['length']?>"
               readonly=""
               onclick="$('#modalID').val(<?=$_POST['length']?>); $(this).removeAttr('readonly');"
               ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');"
               style="cursor:pointer;" autocomplete="off"
               onkeypress="return isNumberKey(event);"
               onblur="$(this).attr('readonly','readonly')"
               onkeyup="getAccountName($(this).val(),<?= $_POST['length'] ?>);"
               value="">
    </td>
    <td>
        <input type="text" class="form-control inputclass" name="hesab_name[]"
               data-validation="required"
               aria-required="true" readonly=""
               id="hesab_name<?=$_POST['length']?>"
               style="width: 100% !important;"
               value=""
        >

    </td>
    <td>
        <input type="text" class="form-control testButton inputclass" name="rkm_hesab_moshtriat[]"
               id="rkm_hesab_moshtriat<?=$_POST['length']?>"
               readonly=""
               onclick="$('#modalID_m').val(<?=$_POST['length']?>); $(this).removeAttr('readonly');"
               ondblclick="$(this).attr('readonly','readonly'); $('#myModal_M').modal('show');"
               style="cursor:pointer;" autocomplete="off"
               onkeypress="return isNumberKey(event);"
               onblur="$(this).attr('readonly','readonly')"
               onkeyup="getAccountName($(this).val(),<?= $_POST['length'] ?>);"
               value="">
    </td>
    <td>
        <input type="text" class="form-control inputclass" name="hesab_moshtriat_name[]"
               data-validation="required"
               aria-required="true" readonly=""
               id="hesab_moshtriat_name<?=$_POST['length']?>"
               style="width: 100% !important;"
               value=""
        >
    </td>
    <td>
        <a readonly href="#" id="delempTable"  onclick="deleteRow(this,'empTable')"><i class="fa fa-trash" aria-hidden="true"></i></a>
        <a href="#" onclick="add_row();" class="plus-btn"><i class="fa fa-plus"></i>
        </a>
    </td>
</tr>

