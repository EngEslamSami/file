
<tr id="<?php echo $_POST['length']?>">
    <td><input type="text" name="title[]" data-validation="required" class="form-control"></td>
    <td >
        <select class="form-control "  name="edara_id_fk[]" data-validation="required" aria-required="true"
        onchange="getSubDepartment(this.value,<?php echo $_POST['length']?>)">
            <option value="">إختر</option>
            <?php if(!empty($mainDepartments)){ foreach ($mainDepartments as $row){?>
                <option value="<?=$row->id?>"><?=$row->name?></option>
            <?php } } ?>
        </select> </td>
    <td>
        <select class="form-control "  name="qsm_id_fk[]" id="qsm_id_fk<?php echo $_POST['length']?>" data-validation="required" aria-required="true"      >
            <option value="">إختر</option>

        </select> </td>
    <td>
        <select class="form-control "  name="emp_id_fk[]" data-validation="required" aria-required="true"      >
            <option value="">إختر</option>
            <?php if(!empty($employees)){ foreach ($employees as $row){?>
                <option value="<?=$row->id?>"><?=$row->employee?></option>
            <?php } } ?>
        </select> </td>
    <td>        <a href="#" onclick="$('#<?php echo $_POST['length']?>').remove();"  >
            <i class="fa fa-trash" aria-hidden="true"></i></a></td>
</tr>








<script>


    function getSubDepartment(valu,id) {

        if( valu !='' &&  valu !=0){
            var dataString = 'id=' + valu ;

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/settings/Finance_resource_settings/getSubDepartment',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);
                    var  html='<option>إختر </option>';

                    for(i=0; i<JSONObject.length ; i++){

                        html +='<option value=" ' + JSONObject[i].id + '"> ' + JSONObject[i].name + '</option>';

                    }
                    $("#qsm_id_fk" + id).html(html);
                }
            });

        }

    }

</script>