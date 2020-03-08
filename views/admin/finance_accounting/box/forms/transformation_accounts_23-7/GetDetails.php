

<table class="table table-striped table-bordered" style="table-layout: fixed;" id="mytable">
    <thead>
    <tr class="info">
        <th style="width: 30px; text-align:center;">م</th>
        <th style="width: 50px; text-align:center;">المبلغ</th>
        <th   style="width: 72px;text-align:center;">الحساب المحول منه</th>
        <th  style="width: 80px;text-align:center;">الحساب المحول إليه</th>
    </tr>
    </thead>

    <tbody id="QuodresultTable">
    <?php
    /*
    echo '<pre>';
    print_r($result_details);*/
    $counter =1; if(!empty($result_details)){
        foreach ($result_details as $row_detail){

            $rkm_from = substr($row_detail->from_ayban_rkm_full, -12);
            $rkm_to = substr($row_detail->to_ayban_rkm_full, -12);
        //$this->test($rest);
            ?>
            <tr >
                <td style="text-align:center;"><?php echo$counter?></td>
                <td style="text-align:center;"><?php echo $row_detail->arabic_value['value'] .'-'. $row_detail->arabic_value['title']?></td>
                <td style="text-align:center;"><?php echo$rkm_from.'-'.$row_detail->from_general_hesab_name;?></td>
                <td style="text-align:center;"><?php echo$rkm_to.'-'.$row_detail->to_general_hesab_name;?></td>
            </tr>
            <?php $counter++;  } }  ?>

    </tbody>
</table>
