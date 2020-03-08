
<tr id="<?=$_POST['length']?>">
    <td><?=$_POST['length']?></td>

    <td>
        <input class="form-control" type="text" name="video_link[]"><small class="" style="bottom:-13px;"  >
            برجاء إرفاق لينك الفيديو
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
