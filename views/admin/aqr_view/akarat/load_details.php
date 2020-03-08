<div class="col-xs-12 padding-4">

    <input type="hidden" id="aqr_id" value="<?= $get_all->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  رقم العقار </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $get_all->rkm ?></td>
            <td style="width: 135px;"><strong>اسم العقار</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $get_all->aname ?></td>
            <td style="width: 150px;"><strong>نوع العقار(الوحدة) </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $get_all->ttype ?></td>
        </tr>
        <tr>
            <td><strong> ملاحظات </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (!empty($get_all->notes)){echo nl2br( $get_all->notes);} else{ echo 'لا يوجد';}?></td>

        </tr>


        </tbody>
    </table>


</div>



