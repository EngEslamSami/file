
<?php
if(!empty($views) && isset($views) && $views!=null ):?>
    <div class="col-xs-12">
        <div class="panel-body">

            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">إسم المتطوع</th>
                        <th class="text-center">رقم الهوية</th>
                        <th class="text-center">الجوال</th>
                        <th class="text-center">حالة طلب العضوية</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">


                    <?php
                    $arr =array('إختر','جاري','موافق عليها','تم رفضها');
                    $a=1;
                    foreach ($views as $record ):
                        ?>
                        <tr>
                            <td><?php echo $a ?></td>
                            <td><?echo$record->name; ?></td>
                            <td><?echo$record->id_card; ?></td>
                            <td><?echo$record->mobile; ?></td>
                            <td><?echo$arr[$record->suspend]; ?></td>
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
        لا يوجد متطوعين خلال الفترة
    </div>

<?php endif;?>


