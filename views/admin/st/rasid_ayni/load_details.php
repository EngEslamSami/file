
<!--<h5 style="display: inline-block">رقم العملية : </h5>
<p style="display: inline-block"><?= $get_all->proc_rkm?></p>
<br>
<h5 style="display: inline-block">تاريخ العملية : </h5>
<p style="display: inline-block"><?= $get_all->proc_date_ar?></p>
<br>
<h5 style="display: inline-block">نوع العملية : </h5>
<p style="display: inline-block"><?= $get_all->proc_type_n?></p>
<br>
<h5 style="display: inline-block"> اسم المستودع : </h5>
<p style="display: inline-block"><?= $get_all->storage_name?></p>
-->


<table class="table " style="table-layout: fixed">
    <tbody>
    <tr>
        <td style="width: 105px;"><input type="hidden" id="rasid_id" value="<?=$get_all->id ?>">
            <strong>  رقم العملية </strong>
        </td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?=$get_all->proc_rkm ?></td>

        <td style="width: 135px;"><strong>   تاريخ العملية</strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?=$get_all->proc_date_ar ?></td>

    </tr>
    <tr>
        <td> <strong>  نوع العملية </strong></td>
        <td><strong>:</strong></td>
        <td><?=$get_all->proc_type_n ?></td>
        <td>  <strong>اسم المستودع  </strong></td>
        <td><strong>:</strong></td>
        <td><?=$get_all->storage_name ?></td>


    </tr>


    </tbody>
</table>

<?php
if (isset($get_all->details)&& !empty($get_all->details)){
    $x=1;
    $total = 0;
    ?>
    <h1>الأصناف</h1>
<table class="table table-striped table-bordered dt-responsive nowrap">
    <thead>
    <tr class="info">
        <th style="text-align: center"> م </th>
        <th style="text-align: center">كود الصنف </th>
        <th style="text-align: center">الباركود </th>
        <th style="text-align: center">اسم الصنف </th>
        <th style="text-align: center">الوحدة </th>
        <th style="text-align: center"> سعر الوحدة </th>
        <th style="text-align: center">الرصيد المتاح </th>
        <th style="text-align: center"> الكمية </th>
        <th style="text-align: center">  القيمة الإجمالية </th>
        <th style="text-align: center">   تاريخ الصلاحية </th>
        <th style="text-align: center">  التشغيلة </th>
        <th style="text-align: center">  الرصيد الحالي </th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($get_all->details as $item){
        $total += $item->all_egmali;
        ?>
        <tr>
            <td><?= $x++?></td>
            <td><?= $item->sanf_code?></td>
            <td><?= $item->sanf_coade_br?></td>
            <td><?= $item->sanf_name?></td>
            <td><?= $item->sanf_whda?></td>
            <td><?= $item->sanf_one_price?></td>
            <td><?= $item->sanf_rased?></td>
            <td><?= $item->sanf_amount?></td>
            <td><?= $item->all_egmali?></td>
            <td>
                <?php
                if ($item->sanf_salahia_date_ar != null){
                    echo $item->sanf_salahia_date_ar;
                } else{
                    echo "لا يوجد" ;
                }
                ?>
            </td>
            <td><?= $item->lot?></td>
            <td><?= $item->rased_hali?></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
    <tfoot>
    <tr class="info">
        <th colspan="8" style="text-align: center;">الإجمالي </th>
        <th colspan="1"  style="text-align: center;"><?= $total?></th>
        <th colspan="3"  style="text-align: center;"></th>
    </tr>
    </tfoot>


</table>
    <?php
}
?>
