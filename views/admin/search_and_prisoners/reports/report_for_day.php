
<div class="panel panel-bd lobidrag">
    <div class="panel-heading">
        <div class="panel-title">
            <h4><?php echo $title?></h4>
        </div>
    </div>
    <div class="panel-body">
        <?php if (isset($records) && !empty($records) && $records !=null ){?>
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                    <th>#</th>
                    <th>إسم السجين</th>
                    <th>الجنسية</th>
                    <th>رقم الهوية</th>
                    <th>نوع القضية</th>
                    <th>الجهة المحال إليها</th>
                    <th>رقم المعاملة</th>
                    <th>تاريخ الأحالة</th>
                    <th>طريقة المتابعة</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($records as $record){
                    $arr = array('لا يوجد','عامة','الجزائية','الاستئناف','التجارة','الادارية');
                    $arr_motab3a = array('لا يوجد','رسمي','أخري');
                    ?>
                    <tr>
                        <?php $nationality_arr =array('لا يوجد','سعودي','مقيم');?>
                        <td></td>
                        <td><?php  echo  $record->nazeel_name?></td>
                        <td><?php  echo  $nationality_arr[$record->nationality]?></td>
                        <td><?php  echo  $record->sgl_mdny?></td>
                        <td><?php  echo  $record->name?></td>
                        <td><?php  echo  $arr[$record->elgeha]?></td>
                        <td><?php  echo  $record->mo3amla?></td>
                        <td><?php  echo  $record->e7ala_date?></td>
                        <td><?php  echo  $arr_motab3a[$record->motab3a_type]?></td>
                    </tr>

                <?php }?>
                </tbody>
            </table>
        <?php }else{
            echo '<div class=" col-sm-12 alert alert-info alert-dismissable">
                    <a href="#" class="" style="color: black"  data-dismiss="alert" aria-label="close">
                        <i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i></a>
                    <strong> لأ توجد تقارير  اليوم  !</strong> .
                </div>';
        }
        ?>
    </div>
</div>


