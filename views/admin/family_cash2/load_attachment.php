<div class="col-sm-12">

   <?php   echo form_open_multipart("FamilyCashing/SarfAttachments/".$sarf_num_fk_attach);?>
    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">إسم المرفق </th>
            <th class="text-center">المرفق  </th>
            <th class="text-center"> <i class="fa fa-plus-square" aria-hidden="true" onclick="get_row_attach();"></i> </th>
        </tr>
        </thead>
        <tbody class="text-center" id="body_attach">
         <?php if(isset($sarf_attachments) && !empty($sarf_attachments)){
               foreach ($sarf_attachments as $row){ ?>
               <tr>
                   <td><?=$row->attachment_title?></td>
                   <td><img src="<?=base_url()."uploads/images/".$row->attachment?>" class="" width="100" height="100"></td>
                   <td>
                       <a href="<?=base_url()."FamilyCashing/downloads/".$row->attachment?>">
                           <i class="fa fa-cloud-download fa-2x" aria-hidden="true"></i>
                       </a>
                       <a href="" onclick="delete_attach(this,'<?=$row->id?>');">
                           <i class="fa fa-trash" aria-hidden="true"></i></a>
                   </td>
               </tr>
               <?php }?>
         <?php }?>
        </tbody>
    </table>
    <button type="submit" name="Add_Attach" value="Add_Attach" id="Add_Attach" disabled="" class="btn btn-success" > حفظ </button>
    <?php  echo form_close()?>
</div>

<script>
    function get_row_attach() {

        var html='<tr>' +
                  '<td> <input type="text" name="attachment_title[]" class="form-control" data-validation="required"></td>'+
                  '<td><input type="file" name="attachment[]" class="form-control" data-validation="required"> </td>'+
                  '<td> <a href="" onclick="$(this).parents(\'tr\').remove();"> <i class="fa fa-trash" aria-hidden="true"></i></a> </td>'+
                  '</tr> ';
        $("#body_attach").append(html);
        $('#Add_Attach').removeAttr("disabled");
    }

    function delete_attach(this_value,id_attach) {
        var out_confirm = confirm('هل انت متأكد من عملية الحذف ؟');
        if(out_confirm == true){
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>FamilyCashing/DeleteAttachments/'+id_attach,
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $(this_value).parents('tr').remove();
                }
            });
        }
    }
</script>