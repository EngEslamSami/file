
<tr id="<?php echo $_POST['length']?>">gathering_place_id_fk
    <td><input type="text" data-validation="required" style="width: 80px;" onkeyup="put_total();" class="form-control valu" value="" name="value[]"></td>
    <td><input type="date"  data-validation="required" name="date[]" style="width: 150px;" class="form-control" value="<?php echo date("Y-m-d");?>"/> </td>
    <td>         <select name="start_laqb[]" id="start_laqb"
                         class="selectpicker no-padding form-control  form-control "
                         data-show-subtext="true" data-live-search="true" aria-required="true">
            <option value="">اختر</option>
            <?php if (!empty($titles)) {
                foreach ($titles as $title) { ?>
                    <option data-title="<?= $title->title_setting ?>" value="<?= $title->id_setting ?>"

                    > <?= $title->title_setting ?> </option>
                <?php }
            } ?>
        </select></td>

    <td>
        <input type="hidden" name="geha_id_fk[]" id="geha_id_fk<?php echo $_POST['length']?>"/>
        <input type="text" data-validation="required"  name="geha_name[]" id="geha_name<?php echo $_POST['length']?>" readonly value=""
                       class="form-control input-style" style="width: 100%;float: right">
        <button type="button" onclick="get_len();" data-toggle="modal"
                data-target="#myModalInfo" class="btn btn-success btn-next"
                style="float: right;">
            <i class="fa fa-plus"></i></button></td>
    <td>        <select name="end_laqb[]" id="end_laqb"
                        class="selectpicker no-padding form-control  form-control "
                        data-show-subtext="true" data-live-search="true" aria-required="true">
            <option value="">اختر</option>
            <?php if (!empty($greetings)) {
                foreach ($greetings as $greeting) { ?>
                    <option data-title="<?= $greeting->title_setting ?>"
                            value="<?= $greeting->id_setting ?>"



                    > <?= $greeting->title_setting ?> </option>
                <?php }
            } ?>
        </select> </td>
    <td> <input type="text" name="pill_num[]" class="form-control"/> </td>
    <td><textarea class="form-control" name="byan[]"></textarea></td>
    <td> <select name="markz[]" id="markz"
                 class=" form-control   "
                 data-show-subtext="true" data-validation="required" data-live-search="true" aria-required="true">
            <option value="">اختر</option>
            <option> مركز1</option>
            <option> مركز2</option>
        </select></td>

    <td>        <a href="#" onclick="$('#<?php echo $_POST['length']?>').remove();  put_total();"  >
            <i class="fa fa-trash" aria-hidden="true"></i></a></td>
</tr>











