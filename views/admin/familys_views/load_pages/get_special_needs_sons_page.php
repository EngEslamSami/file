




<?php $arr_yes_no =array(1=>'نعم',2=>'لا');?>


<tr>
    <td><?php echo $_POST['length'];?></td>
    <td><input type="text" name="name[]" class="form-control half"></td>
    <td><select name="gender[]" class=" no-padding form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
            <?php $gender_arr=array('','ذكر','أنثى');?>
            <option value="">اختر الجنس</option>
            <?php for ($a=1;$a<sizeof($gender_arr);$a++){ $select='';
                if($a== $member_gender){$select='selected';}?>
                <option value="<?php echo$a; ?>"
                    <?php echo $select;?>><?php echo$gender_arr[$a]; ?></option>
            <?php }?>

        </select></td>
    <td><input type="text"  onkeypress="validate_number(event)" name="id_number[]" class="form-control half"></td>
    <td><select name="disability_id_fk[]" class=" no-padding form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
            <option value="">اختر </option>
            <?php if(!empty($diseases)){ foreach ($diseases as $record){ ?>
                    <option value="<?php  echo $record->id_setting;?>" >
                        <?php  echo $record->title_setting;?></option>

            <?php  } }  ?>
        </select></td>
    <td>

        <select name=comprehensive_rehabilitation[]" class=" no-padding form-control  form-control half"  data-show-subtext="true" data-live-search="true"
                data-validation="required" aria-required="true" onchange="check_comprehensive_rehabilitation($(this).val(),<?php echo $_POST['length'];?>)" >
            <option value="">اختر</option>
            <?php foreach ($arr_yes_no as $key =>$value){ ?>
                <option value="<?php echo$key; ?>"><?php echo$value; ?></option>
            <?php } ?>
        </select></td>
    <td><input type="text"  disabled="disabled" onkeypress="validate_number(event)" name="comprehensive_rehabilitation_value[]" id="comprehensive_rehabilitation_value<?php echo $_POST['length'];?>"  class="form-control half"></td>


</tr>


























<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>

<script>


    function check_comprehensive_rehabilitation(value,id) {

        if(value ==1){
            document.getElementById("comprehensive_rehabilitation_value" + id).removeAttribute("disabled", "disabled");
            document.getElementById("comprehensive_rehabilitation_value" + id).setAttribute("data-validation", "required");


        } else {

            document.getElementById("comprehensive_rehabilitation_value" + id).setAttribute("disabled", "disabled");
            document.getElementById("comprehensive_rehabilitation_value" + id).removeAttribute("data-validation", "required");
            $('#comprehensive_rehabilitation_value' + id).val('');


        }



    }

</script>