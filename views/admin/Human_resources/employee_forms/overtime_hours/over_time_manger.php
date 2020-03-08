<!-- <pre>
<?php //print_r($over_time_manger) ?>
</pre> -->

<?php if (isset($over_time_manger)&&(!empty($over_time_manger))) {?>
  <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr class="greentd visible-md visible-lg">
                        <th>مسلسل</th>
                        <th>الرقم الوظيفي</th>
                        <th>إسم الموظف</th>

                        <th> الاجراء</th>
                        <th>الحالة</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($over_time_manger as $row) { ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $row->emp_code_fk; ?></td>
                            <td><?php echo $row->emp_name; ?></td>
                            <td>
                                <a data-toggle="modal" data-target="#details_Modal" class="btn btn-xs btn-info"
                                   style="padding:1px 5px;" onclick="load_page(<?= $row->id ?>);">
                                    <i class="fa fa-list "></i> </a>


                            </td>
                            <td>
                            <?php if ($row->suspend == 0) {
                                $text_btn1='استلام';
                                $btn1_class='btn-warning';
                                $btn1_click='';
                                $btn2_display='none';

                            }else{
                                $text_btn1='تم الاستلام';
                                $btn1_class='btn-success';
                                $btn1_click='';
                                $btn2_display='inline';
                            }

                            if ($row->suspend == 2) {
                                $text_btn2='تم الانتهاء';
                                $btn2_class='btn-success';
                                $btn2_click=0;
                                // $btn2_display='block'

                            }elseif ($row->suspend == 3){
                                $text_btn2=' لم يتم الانتهاء';
                                $btn2_class='btn-danger';
                                $btn2_click=0;
                                // $btn2_display='block'
                            }else {
                                $text_btn2=' الانتهاء';
                                $btn2_class='btn-warning';
                                $btn2_click=0;
                                // $btn2_display='block'
                            }
                            
                            
                            ?>
                            <button class="btn <?=$btn1_class ?> " id="btn<?=$row->id ?>"  
                            <?=$btn1_click ?> ><?=$text_btn1 ?> </button>

                            <button class="btn <?=$btn2_class ?>  " id="btn_finish<?= $row->id ?>" style="display:<?=$btn2_display ?>" 
                            <?php  if ($btn2_click == 1){?>}
                            onclick='swal({
                                        title: "هل تم الانتهاء من التكليف الاضافي ؟",
                                        text: "",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonClass: "btn-warning",
                                        confirmButtonText: "نعم",
                                        cancelButtonText: "لا",
                                        closeOnConfirm: true
                                        },
                                        function(isConfirm){
                                            if (isConfirm) {
                                                end_task(<?= $row->id ?>,2)
                                            }else{
                                                end_task(<?= $row->id ?>,3)
                                                }
                                        });'
                            <?php } ?>
                             ><?=$text_btn2 ?> </button>
                            </td>
                        </tr>
                        <?php $x++;
                    } ?>
                    </tbody>
                </table>
    
<?php } ?>

<div class="modal fade" id="details_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 85%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#details_Modal').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل </h4>
            </div>
            <div class="modal-body" style="padding: 10px" id="result_page">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button
                        type="button" onclick="print_order(document.getElementById('order_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>

                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#details_Modal').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<script>
    function estlam_task(btn_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/estlam_task",
            data: {id: btn_id},
            
            success: function (d) {
                if (d === '1') {
                    $('#btn'+btn_id).text('تم الاستلام');
                    $('#btn'+btn_id).removeClass('btn-warning');
                    $('#btn'+btn_id).addClass('btn-success');
                    $('#btn_finish'+btn_id).show('slow');
                }

            }
        });
    }
</script>
<script>
function end_task(btn_id,value) {
    $.ajax({
        type: 'post',
        url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/estlam_task",
        data: {id: btn_id,value:value},
        
        success: function (d) {
            if (d === '2') {
                $('#btn_finish'+btn_id).text('تم الانتهاء');
                $('#btn_finish'+btn_id).removeClass('btn-warning');
                $('#btn_finish'+btn_id).removeClass('btn-danger');
                $('#btn_finish'+btn_id).addClass('btn-success');
                
            }else if(d === '3'){
                $('#btn_finish'+btn_id).text(' لم تم الانتهاء ');
                $('#btn_finish'+btn_id).removeClass('btn-warning');
                $('#btn_finish'+btn_id).addClass('btn-danger');
            }

        }
    });
}
</script>

<script>
    function load_page(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#result_page').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#result_page').html(d);
            }
        });
    }
</script>