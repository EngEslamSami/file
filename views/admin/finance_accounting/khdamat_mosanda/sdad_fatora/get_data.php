
<tr id="<?php echo $_POST['length']?>">gathering_place_id_fk
    <td><input type="text" onkeypress="validate_number(event);" data-validation="required" style="width: 80px;" onkeyup="put_total();" class="form-control valu f_value" value="" name="f_value[]"></td>
    <td><input type="date"  data-validation="required" name="date[]" style="width: 150px;" class="form-control date" value="<?php echo date("Y-m-d");?>"/> </td>
    <td>
        <input type="hidden" class="f_geha_id_fk" name="f_geha_id_fk[]" id="geha_id_fk<?php echo $_POST['length']?>"/>
        <input type="text" data-validation="required"  name="f_geha_name[]" id="geha_name<?php echo $_POST['length']?>" readonly value=""
               class="form-control input-style f_geha_name" style="width: 78%;float: right">
        <button type="button" onclick="get_len();" data-toggle="modal"
                data-target="#myModalInfo" class="btn btn-success btn-next"
                style="float: right;">
            <i class="fa fa-plus"></i></button></td>
    <td> <input type="text" onkeypress="validate_number(event);" name="rkm_fatora[]" class="form-control rkm_fatora"/> </td>
    <td><input type="text" name="byan[]" class="form-control byan"/></td>
    <td> <select name="f_markz_taklfa_id_fk[]" id="markz"
                 class=" form-control f_markz_taklfa_id_fk"
                 data-show-subtext="true" data-validation="required" data-live-search="true" aria-required="true">
            <option value="">اختر</option>
            <?php
            if(isset($markz)&& !empty($markz)){
                foreach ($markz as $markz){

                    ?>
                    <option value="<?=$markz->id_setting?>"><?=$markz->title_setting?></option>
                <?php } } ?>
        </select></td>

    <td>        <a href="#" onclick="$('#<?php echo $_POST['length']?>').remove();  put_total();"  >
            <i class="fa fa-trash" aria-hidden="true"></i></a>
            
            
            
           
                                   
            </td>
</tr>











