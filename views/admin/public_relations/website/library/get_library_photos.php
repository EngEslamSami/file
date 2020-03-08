
<tr id="<?=$_POST['length']?>">
    <td><?=$_POST['length']?></td>

    <td>
        <input type="file" name="img[]" id="img<?=$_POST['length']?>" class="form-control half" data-validation="required">
        <small class="" style="bottom:-13px;"  >
            برجاء إرفاق صورة
        </small>
    </td>

    <td>
        <a href="#" onclick="deleteRow(<?=$_POST['length']?>)">
            <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>

    </td>
</tr>

<script>
    function deleteRow(id){
        $("#" + id).remove();

    }
</script>
