
<?php
if(isset($transformation_lagna) && $transformation_lagna !=null):?>
    <div class="col-sm-12">
        <!--------------------------------------------------------------------------------------------------------->
        <table class="  table table-bordered table-striped table-hover">
            <tr class="info">
                <th>م </th>
                <th>من</th>
                <th> الي الجنة </th>
                <th> تاريخ  التحويل</th>
                <th>الاجراءات </th>
                <th>قرار اللجنة</th>
                <th>تاريخ القرار </th>
                <th> القرار ملاحظات </th>
            </tr>
            <?php $count=1; foreach($transformation_lagna as $row): ?>
                <tr>
                    <td><?php echo $count++?></td>
                    <td><?php echo $row->user_name?></td>
                    <td><?php echo $row->main_lagna_name?></td>
                    <td><?php echo date("Y-m-d",$row->date)?></td>
                    <td><?php echo $row->procedures_option_lagna_title?></td>
                    <td><?php if($row->approved == 1){
                            echo "قبول الملف";
                        }elseif($row->approved == 2){
                            echo "رفض الملف ";
                        }elseif($row->approved == 0){
                            echo "لم يتم إتخاز القرار ";
                        } ?></td>
                    <td><?php echo $row->approved_date_ar?></td>
                    <td><?php echo $row->reason_lagna?></td>

                </tr>
            <?php  endforeach;?>
        </table>
        <!--------------------------------------------------------------------------------------------------------->
    </div>
<?php  else:
    echo '<div class="alert alert-danger"> <strong>لا يوجد إجراءات !</strong> .
                                                </div>';
endif?>
<h5 class="modal-title" id="exampleModalLongTitle">
    <div style="color:red; padding-right: 15px;"> تتبع الملف </div>
</h5>
<?php $all_operation = $file_opration;
if(isset($all_operation) && $all_operation!=null){?>
    <div class="col-sm-12">
        <!--------------------------------------------------------------------------------------------------------->
        <table class="  table table-bordered table-striped table-hover">
            <tr class="info">
                <th>م </th>
                <th>من</th>
                <th> الي</th>
                <th>التاريخ </th>
                <th>الوقت</th>
                <th>الاجراءات </th>
                <th> ملاحظات </th>
            </tr>
            <?php $count=1; foreach($all_operation as $row): ?>
                <tr>
                    <td><?php echo $count++?></td>
                    <td> <?php  if($row->role_id_fk_from == 3){
                            echo $row->from_employee;
                        }else{
                            echo $row->from_user_name;
                        }?>
                    </td>
                    <td><?php  if($row->role_id_fk_to == 3){
                            echo $row->to_employee;
                        }else{
                            echo $row->to_user_name;
                        }?></td>
                    <td> <?php echo date("Y-m-d",$row->date);?></td>
                    <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                    <td><?php if($row->transformation_type ==1){
                            echo ' قبول الملف';
                        }elseif($row->transformation_type ==2){
                            echo 'رفض الملف';
                        }elseif($row->transformation_type ==3){
                            echo 'تحويل الملف';
                        }elseif($row->transformation_type ==4){
                            echo 'اعتماد الملف';
                        }?>
                    </td>
                    <td><?php echo $row->transformation_note ?></td>
                </tr>
            <?php endforeach;?>
        </table>
        <!--------------------------------------------------------------------------------------------------------->
    </div>
<?php  }else{
    echo '<div class="alert alert-danger">
                 <strong>لا يوجد إجراءات !</strong> .
                     </div>';
} ?>

