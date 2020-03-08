
<?php
$class = '';
if ($_POST['table_max'] % 2 == 0) {
    $class = 'open_green';
}
?>

<tr class="<?=$class?>" id="tr<?=$_POST['table_max']?>">
    <td><input type="date" class="form-control" name="date[]" id="date" data-validation="required" value="<?php echo date("Y-m-d");?>"></td>
    <td><input type="time" class="form-control "   data-validation="required" name="from_hour[]"   id="from_time<?php echo$_POST['table_max'];?>"
               onchange="count(<?= $_POST['table_max']?>)"></td>
    <td><input type="time" class="form-control " data-validation="required"  name="to_hour[]" id="to_time<?php echo$_POST['table_max'];?>"
               onchange="count(<?= $_POST['table_max']?>)" ></td>
    <td><input type="text"    class="control num_hours calc" name="num_hours[]" id="num_hours<?php echo$_POST['table_max'];?>" readonly style="width: 107px">
        <input type="hidden"    class="minutes" name="" id="minutes<?php echo$_POST['table_max'];?>" readonly style="width: 107px">
    </td>
    <td><select name="bdal_type_fk[]" id="bdal_type" class="form-control "  data-validation="required" aria-required="true">
            <option value="">إختر</option>
            <?php $bdal_type_arr =array(0=>'بدل نقدي',1=>'بدل أيام الراحة');?>
            <?php for ($a=0;$a<sizeof($bdal_type_arr);$a++){ ?>
                <option value="<?=$a?>"><?=$bdal_type_arr[$a]?></option>
            <?php } ?>
        </select></td>
    <td><textarea class="form-control" name="work_assigned[]" style="margin: 0px; width: 193px; height: 69px;"  cols="30" data-validation="required" rows="10"></textarea></td>
    <td>

        <a href="#"
           onclick="  RemoveMe('tr<?=$_POST['table_max']?>' );"><i class="fa fa-trash"
                                                                         aria-hidden="true"></i> </a>
    </td>
</tr>

<script>
    function RemoveMe(valu) {
        $('#' + valu).remove();
        count(1);
    }
    
</script>
