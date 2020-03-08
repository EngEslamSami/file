
<tr id="<?=$_POST['length']?>">
    <td><?=$_POST['length']?></td>


    <td>
        <input type="text" class="form-control " placeholder=" " name="title[]" data-validation="required" >

    </td>
    <td>
        <textarea id="editor" class="form-control " placeholder=" " name="details[]" ></textarea>

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
