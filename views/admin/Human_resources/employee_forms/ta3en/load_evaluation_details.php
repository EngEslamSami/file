



<div class="col-xs-12">

    <input type="hidden" id="row_id" value="<?=$get_all->id ?>">
    <input type="hidden" id="emp_id" value="<?=$get_all->emp_id_fk ?>">
    <table class="table">
        <tbody>
        <tr>
            <td style="width: 105px;">
               <strong>  إسم الموظف </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->emp_data->emp_name)){ echo $get_all->emp_data->emp_name ;}?></td>
            <td style="width: 135px;"><strong>  الإدارة</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->emp_data->edara_n)){ echo $get_all->emp_data->edara_n ;}?></td>
            <td style="width: 150px;"><strong>القسم </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->emp_data->qsm_n)){ echo $get_all->emp_data->qsm_n ;}?></td>
        </tr>
        <tr>
            <td> <strong> المسمى الوظيفي </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->emp_data->job_title_n)){ echo $get_all->emp_data->job_title_n ;}?></td>
            <td>  <strong>تاريخ بدايه التعيين </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->emp_data->date_from_m)){ echo date('Y/m/d', strtotime($get_all->emp_data->date_from_m))  ;} ?></td>
            <td><strong>تاريخ انتهاء فتره التجربه </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->emp_data->date_to_m)){ echo date('Y/m/d' , strtotime($get_all->emp_data->date_to_m))  ;}?></td>

        </tr>
        <tr>
            <td><strong>   التقييم </strong></td>
            <td><strong>:</strong></td>
            <td><?php
                $types=array(1=>"ممتاز",2=>"جيد جدا",3=>"جيد",4=>'مقبول',5=>'غير مرضي');
                foreach ($types as $key=>$value){
                    if ($key == $get_all->taqdeer){
                        echo $value;
                    }

                }
                ?></td>
            <td><strong> نتيجه التقييم     </strong></td>
            <td><strong>:</strong></td>
            <td><?php

                                if ($get_all->result_tagraba==1){
                                    echo " تثبيت الموظف";
                                } elseif ($get_all->result_tagraba==2){
                                    echo "  ترقيه لوظيفه اعلي";
                                }elseif ($get_all->result_tagraba==3){
                                    echo "    الاستغناء عن الموظف";
                                }
                              ?>
            </td>

        </tr>

        </tbody>
    </table>


</div>

<?php
if (isset($get_all->positives) && !empty($get_all->positives)){
  $x = 1;

            ?>
<div class="col-xs-6">
            <table class="table table-bordered table-striped">
                <thead>
                <tr class="info">
                    <th>م</th>
                    <th>نقاط القوة (الإيجابيات)</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($get_all->positives as $positive){
                    ?>

                <tr>
                    <td><?= $x++?></td>
                    <td><?= $positive->title?></td>
                </tr>
                    <?php
                }
                ?>
                </tbody>

            </table>
</div>
<?php


}
?>


<?php
if (isset($get_all->negatives) && !empty($get_all->negatives)){
    $y = 1;

    ?>
    <div class="col-xs-6">


    <table class="table table-bordered table-striped">
        <thead>
        <tr class="info">
            <th>م</th>
            <th>نقاط الضعف(السلبيات)</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($get_all->negatives as $negative){
            ?>

            <tr>
                <td><?= $y++?></td>
                <td><?= $negative->title?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>

    </table>
    </div>
    <?php


}
?>


