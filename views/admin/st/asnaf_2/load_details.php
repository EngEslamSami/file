



<div class="col-xs-10 padding-4">

    <input type="hidden" id="sanf_id" value="<?=$get_all->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;"><input type="hidden" id="sanf_id" value="<?=$get_all->id ?>">
               <strong> كود الصنف </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?=$get_all->code ?></td>
            <td style="width: 135px;"><strong>  كود الصنف الدولي (Barcode)</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?=$get_all->code_br ?></td>
            <td style="width: 150px;"><strong>كود الصنف(qr code) </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?=$get_all->code_qr ?></td>
        </tr>
        <tr>
            <td> <strong>اسم الصنف </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_all->name ?></td>
            <td>  <strong>الفئـــــــه </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_all->fe2a_name ?></td>
            <td><strong>التصنـيــــــف </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_all->tasnef_name ?></td>

        </tr>
        <tr>
            <td><strong> الوحدة الكلية </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_all->we7da_name ?></td>
            <td><strong>الكبـــــــــري     </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_all->sbig ?></td>
            <td><strong>  الصغــــــري</strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_all->ssmall ?></td>
        </tr>
        <tr>
            <td><strong>سعر الصنف </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_all->price ?></td>
            <td><strong>  تاريخ الصلاحيـة</strong></td>
            <td><strong>:</strong></td>
            <td><?php
                if ($get_all->slahia==0){
                    echo "لا";
                } elseif ($get_all->slahia==1){
                    echo "نعم";
                }
                ?></td>
            <td><strong>مواصفات الصنـف </strong></td>
            <td><strong>:</strong></td>
            <td><?php
                if (!empty($get_all->details)){
                    echo  nl2br($get_all->details);
                } else{
                    echo "لا يوجد تفاصيل" ;
                }
                ?></td>

        </tr>
        </tbody>
    </table>


</div>


<div class="col-xs-2 padding-4">

            <?php
            if (isset($get_all->img) && !empty($get_all->img)){
                ?>
                <img src="<?= base_url()."uploads/st/asnaf/".$get_all->img?>" width="100%" height="">
            <?php
            }
            ?>

</div>