
<tr>
    <td>
        <select class="form-control " id="device_id_fk_fk<?=$_POST['len']?>"  onchange="get_accounts(this.value,<?=$_POST['len']?>)"   name="device_id_fk[]" class="form-control" data-validation="required">

            <option value="">- أختر -</option>
            <?php
            if(isset($devices) && !empty($devices)){ ?>
                <?php  foreach ($devices as $row){
                    ?>
                    <option value="<?php echo $row->device_id_fk;?>"><?php echo $row->device_id_fk;?></option>

                <?php }} else { ?>
                <option value="">لايوجد اجهزه مضافة</option>
            <?php } ?>
        </select>
    </td>

    <td>
        <select class="form-control " id="edara_id_fk<?=$_POST['len']?>"   name="edara_id_fk[]"  onchange="get_qsm(this.value,<?=$_POST['len']?>);"  class="form-control"   data-validation="required">

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
        <select class="form-control " id="qsm_id_fk<?=$_POST['len']?>"     name="qsm_id_fk[]"  onchange="get_emp(this.value,<?=$_POST['len']?>);"    data-validation="required" style="width: 100px;">

            <option value="">اختر</option>

        </select>

    </td>

    <td>
        <select class="form-control " id="emp_id<?=$_POST['len']?>"     name="emp_id[]"  data-validation="required">

            <option value="">اختر</option>

        </select>

    </td>


    <td><a readonly href="#" id="delempTable"  onclick="deleteRow(this,'empTable')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>





    


</tr>



