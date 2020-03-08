<tr >

    <td id="<?=$_POST['length']?>">


        <select class="form-control " id="edara_id_fk<?=$_POST['length']?>"   name="edara_id_fk[]"  onchange="get_qsm(this.value,<?=$_POST['length']?>);"  class="form-control"   data-validation="required">

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
        <select class="form-control " id="qsm_id_fk<?=$_POST['length']?>"     name="qsm_id[]"  onchange="get_emp(this.value,<?=$_POST['length']?>);"    data-validation="required" style="width: 100px;">

            <option value="">اختر</option>

        </select>

    </td>

    <td>
        <select class="form-control " id="emp_id<?=$_POST['length']?>"     name="emp_id_fk[]"  data-validation="required">

            <option value="">اختر</option>

        </select>

    </td>
    <td>
        <input class="form-control" name="emp_order[]" id="emp_order<?=$_POST['length']?>">
    </td>
    <td>
        <a readonly href="#" id="delempTable"  onclick="deleteRow(this,'empTable')"><i class="fa fa-trash" aria-hidden="true"></i></a>
        <a href="#" onclick="add_row();" class="plus-btn"><i class="fa fa-plus"></i>
        </a>
    </td>
</tr>