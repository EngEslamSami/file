
<?php
if(!empty($views) && isset($views) && $views!=null ):?>
    <div class="col-xs-12">
        <div class="panel-body">

            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr> <?php $arr =array(1=>'عطل عادى',2=>'حادثة');?>
                        <th class="text-center">م</th>
                        <th class="text-center">رقم العطل</th>
                        <th class="text-center">رقم السيارة</th>
                        <th class="text-center">إسم العطل</th>
                        <?php if($_POST['type'] =='all'):?>
                            <th class="text-center">نوع العطل</th>
                        <?php endif;?>
                        <th class="text-center">حالة العطل</th>
                        <th class="text-center">تاريخ الإضافة</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    $a=1;
                    foreach ($views as $record ):
                        $arr_status = array('لم يتم التصليح','جاري التصليح','تم التصليح');
                        ?>
                        <tr>
                            <td><?php echo $a ?></td>
                            <td><?php echo $record->crashe_num; ?></td>
                            <td><?php echo $cars[$record->car_id_fk]->car_code; ?></td>
                            <td><?php echo $record->crashe_name; ?></td>
                            <?php if($_POST['type'] =='all'):?>
                                <td><?php echo $arr[$record->crashe_type]; ?></td>
                            <?php endif;?>
                            <td><?php echo $arr_status[$record->crashe_status]; ?></td>
                            <td><?php echo date('Y-m-d',$record->date) ;?></td>
                        </tr>
                        <?php
                        $a++;
                    endforeach;  ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else :?>
    <div class="col-lg-12 alert alert-danger" >
        لا يوجدأعطال  خلال الفترة
    </div>

<?php endif;?>


