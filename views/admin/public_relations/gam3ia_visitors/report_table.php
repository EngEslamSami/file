<?php
if (isset($result) && $result != null) {
    ?>
    <div class="col-xs-12" style="padding-top: 29px;">
        <div class="panel-body">

            <div class="fade in active">

                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <th>م</th>
                    <th style="text-align: center">اسم الموظف</th>
                    <th style="text-align: center">الادارة</th>
                    <th style="text-align: center">القسم</th>
                    <th style="text-align: center">عدد الحالات</th>
                    </thead>
                    <?php $i = 0;
                    foreach ($result as $val){ ?>
                    <tbody>
                    <tr>
                        <td style="text-align: center"><?= ++$i; ?></td>
                        <td style="text-align: center"><?= $val['name'] ?></td>
                        <td style="text-align: center"><?= $val['edara'] ?></td>
                        <td style="text-align: center"><?= $val['dept'] ?></td>
                        <td style="text-align: center"><?= $val['tatal'] ?></td>
                    </tr>
                    <? } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<? } else {
    echo '<div class="alert alert-danger col-xs-12" >
             عفوا لا يوجد بيانات 
    </div>';
} ?>