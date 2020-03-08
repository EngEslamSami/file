



<div class="col-xs-10 padding-4">

    <input type="hidden" id="sarf_id" value="<?=$get_sarf->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  الادارة </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?=$get_sarf->edara_name ?></td>
            <td style="width: 135px;"><strong> القســـــــم  </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?=$get_sarf->qsm_name ?></td>

            <td style="width: 150px;"><strong>  الموظف </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?=$get_sarf->emp_name ?></td>
        </tr>
        <tr>
            <td> <strong> المستودع </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_sarf->storage_name ?></td>
            <td>  <strong>العمليـــــــه </strong></td>
            <td><strong>:</strong></td>
            <td><?php
                if ($get_sarf->process == 1){
                    echo "إضافة";
                } elseif ($get_sarf->process == 2){
                    echo "صرف";
                }
              ?></td>
            <td><strong>كود الحساب </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_sarf->rkm_hesab ?></td>

        </tr>
        <tr>
            <td><strong>
                    اسم الحساب </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_sarf->hesab_name ?></td>

            <td><strong>كود حساب المشتريات   </strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_sarf->rkm_hesab_moshtriat ?></td>
            <td><strong>
                    اسم حساب المشتريات</strong></td>
            <td><strong>:</strong></td>
            <td><?=$get_sarf->hesab_moshtriat_name ?></td>
        </tr>

        </tbody>
    </table>


</div>

<div class="col-xs-2 padding-4">

    <?php
    if (isset($get_sarf->emp_img) && !empty($get_sarf->emp_img)){
        ?>
        <img src="<?= base_url()."uploads/images/".$get_sarf->emp_img?>" width="100%" height="" alt="">
        <?php
    }
    ?>

</div>
