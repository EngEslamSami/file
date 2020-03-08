
<?php
$class = '';
if ($_POST['table_max'] % 2 == 0) {
    $class = 'open_green';
}
?>

<tr class="<?=$class?>" id="tr<?=$_POST['table_max']?>">

    <td>
        <input type="hidden" id="post_id" value="<?=$_POST['table_max']?>">
        <input type="date" class="form-control" name="date[]" id="date" data-validation="required" value="<?php echo date("Y-m-d");?>"></td>
    <td><input type="text" class="form-control "   data-validation="required" name="from_hour[]"   id="m12h<?php echo$_POST['table_max'];?>"
               onchange="count(<?= $_POST['table_max']?>)"></td>
    <td><input type="text" class="form-control " data-validation="required"  name="to_hour[]" id="m13h<?php echo$_POST['table_max'];?>"
               onchange="count(<?= $_POST['table_max']?>)" ></td>
    <td><input type="text"    class="control form-control num_hours calc" name="num_hours[]" id="num_hours<?php echo$_POST['table_max'];?>" readonly >
        <input type="hidden"    class="minutes" name="" id="minutes<?php echo$_POST['table_max'];?>" readonly style="width: 107px">
    </td>
    <td><select name="bdal_type_fk[]" id="bdal_type" class="form-control "  data-validation="required" aria-required="true">
            <option value="">إختر</option>
            <?php $bdal_type_arr =array(0=>'بدل نقدي',1=>'بدل أيام الراحة');?>
            <?php for ($a=0;$a<sizeof($bdal_type_arr);$a++){ ?>
                <option value="<?=$a?>"><?=$bdal_type_arr[$a]?></option>
            <?php } ?>
        </select></td>
    <td><textarea name="work_assigned[]" class="form-control" cols="30"
                  data-validation="required" rows="2"></textarea></td>
    <td class="text-center">

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

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/analogue-time-picker.js"></script>
<script src="<?php echo base_url(); ?>asisst/admin_asset/js/mdtimepicker.js"></script>


<script>

        var id = "<?=$_POST['table_max']?>";
       // alert(id);

       $('#m12h'+id).mdtimepicker();



</script>

<script>

      var id_to = "<?=$_POST['table_max']?>";

       $("#m13h"+id_to).mdtimepicker();

</script>
