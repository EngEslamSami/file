<div class="col-xs-12 padding-4">

    <input type="hidden" id="row_id" value="<?= $note->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>   النوع </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <?php
            if ($note->type==1){
                $type_n = 'ملاحظة';
                $className = 'btn-warning';
                $color = '#ffc751';

            } elseif ($note->type==2){
                $type_n = 'موعد';
                $className = 'btn-success';
                $color = '#50ab20';
            }
            elseif ($note->type==3){
                $type_n = 'حدث';
                $className = 'btn-danger';

                $color = '#E5343D';
            }
            elseif ($note->type==4){
                $type_n = 'مهمة';
                $className = 'btn-info';
                $color = '#3a87ad';
            }
            ?>
            <td>
                <label class=" label " style="color: <?= $color?>"><?= $type_n?></label>

            </td>
            <td style="width: 135px;"><strong> التاريخ</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php
                if (!empty($note->date)){
                    echo $note->date;
                }else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td style="width: 150px;"><strong> القسم</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php
                if (!empty($note->qsm)){
                    echo $note->qsm;
                }else{
                    echo 'غير محدد' ;
                }
                ?></td>

            <td style="width: 150px;"><strong> التصنيف</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php
                if (!empty($note->tasnef)){
                    echo $note->tasnef;
                }else{
                    echo 'غير محدد' ;
                }
                ?></td>
        </tr>
        <tr>
            <td><strong> التفاصيل </strong></td>
            <td><strong>:</strong></td>
            <td><?php
                if (!empty($note->details)){
                    echo nl2br($note->details) ;
                }else{
                    echo 'غير محدد' ;
                }
                ?></td>

        </tr>


        </tbody>
    </table>


</div>



