<div class="piece-box" style="margin-top: 10px">
<input type="hidden" name="" value="<?php echo $rows[0]->id;?>" id="print_id"/>
    <div class="col-xs-11 col-xs-offset-1">
        <h3 style="font-weight: bold;    margin-top: 10px;"><?php echo $rows[0]->start_laqb_name;?>/<?php echo $rows[0]->to_geha_name;?><span style="float: left;"><?php echo $rows[0]->end_laqb_name;?> </span> </h3>
    </div>
    <div class="col-xs-12 padding-4">
        <?php if(isset($rows[0]->salam) && !empty($rows[0]->salam)){?>
            <h5><?=$rows[0]->salam ?></h5>
        <?php } else{
            echo '<h5> السلام عليكم ورحمة الله وبركاته ،،وبعد،،،</h5>';
        }
        ?>
        <?php if(isset($rows[0]->debaga) && !empty($rows[0]->debaga)){?>
            <h5><?=$rows[0]->debaga ?></h5>
        <?php } else{
            echo ' <h5>نرفع لسعادتكم الفواتير والمطالبات المستحقة الموضحة بالجدول أدناه و بيانها كالتالي :-   </h5>';
        }
        ?>

    </div>
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
                    مركز التكلفه
                </th>
                <th class="text-center" style="text-align: center;">
                    البيــــــــــــــــــــــان

                </th>

                <th class="text-center" style="text-align: center;">
                    المبلغ

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
                        <td><?php echo $row->markz_name;?></td>
                        <td><?php echo $row->byan;?></td>

                        <td><?php echo $row->f_value;?></td>
                    </tr>

                    <?php $x++ ;  } } ?>


            </tbody>
            <tfoot>
            <th colspan="6" class="gray_background" style="text-align: center;"><?=$total_ar?></th>
            <th><?php echo $rows[0]->total_value;?></th>
            </tfoot>
        </table>
    </div>

</div>