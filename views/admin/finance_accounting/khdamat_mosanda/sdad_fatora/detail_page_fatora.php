<div class="piece-box" style="margin-top: 10px">

  

    <div class="col-xs-12 padding-4">
        <table class="table table-bordered">
            <thead >
            <tr class="graytd">
                <th class="text-center" style="text-align: center;">
                    م
                </th>
                <th class="text-center" style="text-align: center;">
                    التاريخ

                </th>
                <th class="text-center" style="text-align: center;">
                    اسم الجهة/المستفيد

                </th>
                <th class="text-center" style="text-align: center;">
                    رقم الفاتورة/الحساب
                </th>

               

                <th class="text-center" style="text-align: center;">
                    المبلغ

                </th>
                <th class="text-center" style="text-align: center;">
                    الاجراء

                </th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($rows[0]->details) && !empty($rows[0]->details)){
                $x=1;
                foreach ($rows[0]->details as $row){  ?>

                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->date_ar;?></td>
                        <td><?php echo $row->f_geha_name;?></td>
                        <td><?php echo $row->rkm_fatora;?></td>
                    

                        <td><?php echo $row->f_value;?></td>
                     
                        <?php 
                        
                        
                        if (!empty($row->file)) { ?>
                           
                                     
                                
                                   
                      <td>
                      <a href="#modal_image"  data-toggle="modal" onclick="val_id(<?=$row->id ?>);" > <i class="fa fa-eye"> </i></a> 
     
                     <a  onclick=" delete_morfq(<?= $row->id ?>);"
                  
                    <i class="fa fa-trash"></i></a>


                                      
    

                        
                        </td>
                    </tr>

                    <?php $x++ ; } else{?>
                
                        <td>   <a title="عرض المرفق" href="#" onclick="put_val_id(<?=$row->id ?>);" data-toggle="modal" data-target="#myModal_attach"> <i class="fa fa-cloud-upload" aria-hidden="true"></i> </a>
                        </td>
                    </tr>
                <?php }} } ?>


            </tbody>
            
        </table>
    </div>

</div>

<script>
    function val_id(val_id)
    {
        $('#row_id').val(val_id);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/get_fatora_attach",
            data: {
                val_id: val_id,

            },
            success: function (d) {


                $(".attachimage").html(d);

            }

        });
    }


</script>
<!-- \yara -->
<script>
    function delete_morfq(val_id)
    {
        $('#row_id').val(val_id);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>finance_accounting/khdamat_mosanda/sdad_fatora/Sdad_fatora/delete_attach",
            data: {
                val_id: val_id,

            },
            success: function (d) {


                swal("تم الحذف بنجاح !");
               // $('#myModal_attach').modal('hide');
               $('#modal_details_fatora').modal('hide');
            }

        });

    }


</script>