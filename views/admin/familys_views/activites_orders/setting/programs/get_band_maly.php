<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>

<style>
    .help-block.form-error{
        position: relative !important;
        bottom: auto !important;;
        right: auto !important;;
    }
</style>
<?php
$num = $_POST['band_num'];
if($num>10){
    echo '<div class="  col-sm-12 alert alert-danger" >
              أقصى عدد 10
    </div>';

}
elseif($num<=10)
{
    ?>
    <?php echo form_open_multipart('family_controllers/activites_orders/Settings/add_band_maly/'.$_POST['activity_id'])?>
    <table class="table table-bordered table-responsive" id="tab_logic">
        <thead>
        <th>م</th>
        <th style="text-align: center">إسم البند</th>
        <th style="text-align: center">التكلفة</th>
        <th style="text-align: center">ملاحظات</th>
        <th style="text-align: center">الإجراء</th>
        </thead>
        <tbody>

        <?php     for($i=1;$i<=$num;$i++){?>

            <tr >
                <td><?=$i ?></td>
                <td> <input type="text" name="band[<?= $i ?>][title]" placeholder='' style="width: 100%;"  class="form-control" data-validation="required" /></td>
                <td> <input type="text" name="band[<?= $i ?>][cost]" placeholder='' style="width: 100%;"  class="form-control" data-validation="required"  onkeypress='validate_number(event)'  /></td>
                <td><textarea name="band[<?= $i ?>][notes]"  style="width: 200px;height: 50px" class="form-control"  data-validation="required" cols="30" rows="10"></textarea></td>
                <td>
                    <i   style="margin-right: 20px" class="fa fa-trash-o fa-2x" onclick="deletFunction(this)" aria-hidden="true"></i>
                </td>
                <input type="hidden" name="band[<?= $i ?>][activity_id_fk]" value="<?php echo $_POST['activity_id'];?>">
            </tr>
        <?php   }?>
        </tbody>

    </table>
    <div class="col-xs-12">
        <button   id="button" type="submit" name="add_band_maly" value="add_band_maly"  class="btn btn-purple w-md m-b-5">
            <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
    </div>
    <?php echo form_close()?>
<?}?>
<script>

    $('#max').val(<? echo $_POST['band_num'] ; ?>);
    function deletFunction(o) {
        var p=o.parentNode.parentNode;
        p.parentNode.removeChild(p);
        $('#max').val(max-1);
    }
</script>
