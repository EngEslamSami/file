
<tr id="<?=$_POST['length']?>">
    <td><?=$_POST['length']?></td>
    <td><input type="text" name="title[]" data-validation="required" class="form-control"></td>
    <td><input type="date" name="from_date[]" data-validation="required" class="form-control"></td>
    <td><input type="date" name="to_date[]" data-validation="required" class="form-control"></td>
    <td>
        <input class="form-control" type="text" data-validation="required" name="video_link[]"><small class="" style="bottom:-13px;"  >
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



<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });

    });
</script>