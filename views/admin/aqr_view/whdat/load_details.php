<div class="col-xs-12 padding-4">

    <input type="hidden" id="whda_id" value="<?= $get_all->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  رقم الوحدة </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->whda_rkm)&& !empty($get_all->whda_rkm)){echo  $get_all->whda_rkm;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 135px;"><strong>نوع الوحدة</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->whda_type_n)&& !empty($get_all->whda_type_n)){echo  $get_all->whda_type_n;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 150px;"><strong>تابع لعقار </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->to_akar_n)&& !empty($get_all->to_akar_n)){echo  $get_all->to_akar_n;}else{echo 'غير محدد';}  ?></td>

        </tr>
        <tr>
            <td><strong> حالة الوحدة </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->halt_whda_n)&& !empty($get_all->halt_whda_n)){echo  $get_all->halt_whda_n;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 150px;"><strong>  مواصفات الوحدة</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->note)&& !empty($get_all->note)){echo nl2br($get_all->note)  ;}else{echo 'غير محدد';}  ?></td>
            <td style="width: 150px;"><strong>  محتويات الوحدة</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->maugod)&& !empty($get_all->maugod)){echo nl2br($get_all->maugod)  ;}else{echo 'غير محدد';}  ?></td>

        </tr>


        </tbody>
    </table>


</div>



