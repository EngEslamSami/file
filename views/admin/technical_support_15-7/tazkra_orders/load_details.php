


<table class="table " style="table-layout: fixed">
    <tbody>
    <tr>
        <td style="width: 105px;"><input type="hidden" id="order_id" value="<?=$get_all->id ?>">
            <strong>  رقم التذكرة </strong>
        </td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?=$get_all->tazkra_num ?></td>

        <td style="width: 135px;"><strong>   التاريخ </strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?php
            $full_date_arr = $get_all->date_ar;
            $full_date = explode(' ',$full_date_arr);
            $date = $full_date[0];
            $time = $full_date[1];
            echo $date;
            ?></td>

    </tr>
    <tr>
        <td> <strong>   الوقت </strong></td>
        <td><strong>:</strong></td>
        <td><?= $time ?></td>
        <td>  <strong> القسم  </strong></td>
        <td><strong>:</strong></td>
        <td><?=$get_all->qsm_n ?></td>


    </tr>
    <tr>
        <td> <strong>   موضوع التذكرة </strong></td>
        <td><strong>:</strong></td>
        <td><?= $get_all->tazkra_mawdo3 ?></td>
        <td>  <strong> نوع التذكره  </strong></td>
        <td><strong>:</strong></td>
        <td><?=$get_all->tazkra_no3_n ?></td>


    </tr>
    <tr>
        <td> <strong>    الأولوية </strong></td>
        <td><strong>:</strong></td>
        <td><?= $get_all->importance_n ?></td>
        <td>  <strong>  تفاصيل التذكره  </strong></td>
        <td><strong>:</strong></td>
        <td><?=$get_all->tazkra_content ?></td>


    </tr>



    </tbody>
</table>


