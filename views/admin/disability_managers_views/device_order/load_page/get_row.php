<tr>
    <td> <select name="divice[]" class="form-control"  data-validation="required">
            <option value=""> أختر </option>
            <?php if(isset($all_device) && !empty($all_device) && $all_device!=null){
                   foreach ($all_device as $row_device){ ?>
                <option value="<?=$row_device->id?>"> <?=$row_device->title?></option>
            <?php  }
                   }else{
               echo '<option value=""> لا يوجد أجهزة </option>';
            }?>
         </select>
    </td>
    <td> <input type="number" name="numbers[]" class="form-control"  data-validation="required">  </td>
    <td>    <button type='button' class='btn  btn-xs remove'>
            <i class='fa fa-trash-o'></i> </button>
        </a>
    </td>
</tr>


<script>
    $('table').on('click','tr button.remove',function(e){
        e.preventDefault();
        $(this).parents('tr').remove();

    });
</script>
