
<tr id="<?php echo $_POST['length']?>">gathering_place_id_fk
    <td><select class="form-control "  name="gathering_place_id_fk[]" data-validation="required"
                aria-required="true">
            <option value="">إختر</option>
            <?php if(!empty($gathering_place_arr)){ foreach ($gathering_place_arr as $row){?>
                <option value="<?=$row->id_setting?>"><?=$row->title_setting?></option>
            <?php } } ?>
        </select></td>
    <td >
        <select class="form-control "  name="edara_id_fk[]" data-validation="required" aria-required="true"
        onchange="getSubDepartment(this.value,<?php echo $_POST['length']?>)">
            <option value="">إختر</option>
            <?php if(!empty($mainDepartments)){ foreach ($mainDepartments as $row){?>
                <option value="<?=$row->id?>"><?=$row->name?></option>
            <?php } } ?>
        </select> </td>
    <td>
        <select class="form-control "  name="qsm_id_fk[]" id="qsm_id_fk<?php echo $_POST['length']?>"
                onchange="getEmp(this.value,<?php echo $_POST['length']?>)"data-validation="required" aria-required="true"      >
            <option value="">إختر</option>

        </select> </td>
    <td>
        <select class="form-control " id="emp_id_fk<?php echo $_POST['length']?>"  name="emp_id_fk[]" data-validation="required" aria-required="true"      >
            <option value="">إختر</option>
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
                   // console.log(JSONObject);
                    var  html='<option>إختر </option>';

                    for(i=0; i<JSONObject.length ; i++){

                        html +='<option value="' + JSONObject[i].id + '"> ' + JSONObject[i].name + '</option>';

                    }
                    $("#qsm_id_fk" + id).html(html);
                }
            });

        }

    }

</script>
<script>


    function getEmp(valu,id) {

        if( valu !='' &&  valu !=0){
            var dataString = 'id=' + valu ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/settings/Finance_resource_settings/getEmp',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);
                    var  html='<option>إختر </option>';

                    for(i=0; i<JSONObject.length ; i++){

                        html +='<option value="' + JSONObject[i].id + '"> ' + JSONObject[i].employee + '</option>';

                    }
                    $("#emp_id_fk" + id).html(html);
                }
            });

        }

    }

</script>


