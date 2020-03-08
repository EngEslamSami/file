<table class="table table-striped table-bordered"  style="table-layout: fixed">
    <tbody>
    <tr>
        <td class="closed_green" style="    width: 15%;"> نوع القيد </td>
        <td> <span class=""  ><?=$result->no3_qued_name?></span></td>
        <td class="closed_green">حالة القيد </td>
        <td><span class=" " ><?=$result->halet_qued_name	?></span></td>
        <td class="closed_green">رقم القيد </td>
        <td><span class=" " ><?=$result->rkm	?></span></td>
        <td class="closed_green">التاريخ </td>
        <td><span class=" " ><?=$result->qued_date_ar	?></span></td>
    </tr>


    </tbody>

</table>

<table class="table table-striped table-bordered" style="table-layout: fixed;" id="mytable">
    <thead>
    <tr class="info">
        <th style="width: 100px;">مدين</th>
        <th style="width: 100px;">دائن</th>
        <th style="width: 100px;">رقم الحساب</th>
        <th style="width: 20%;">إسم الحساب</th>
        <th style="width: 150px;" >رقم المرجع</th>
        <th style="width: 150px;" >البيان</th>

    </tr>
    </thead>

    <tbody id="QuodresultTable">
    <?php $counter =1; if(!empty($result->details)){
        foreach ($result->details as $row_detail){
            ?>
            <tr id="<?=$row_detail->id?>">
                <td><?=$row_detail->maden?></td>
                <td><?=$row_detail->dayen?></td>
                <td><?=$row_detail->rkm_hesab?> </td>
                <td><?=$row_detail->hesab_name?></td>
                <td><?=$row_detail->marg3?></td>
                <td><?=$row_detail->byan?></td>
            </tr>
            <?php $counter++;  } }  ?>

    </tbody>
    <tfoot>
    <tr>
        <td ><?=$result->total_value?></td>
        <td > <?=$result->total_value?></td>
        <td colspan="4" style=" text-align:center;color: red">الإجمالي</td>
    </tr>
    </tfoot>
</table>
