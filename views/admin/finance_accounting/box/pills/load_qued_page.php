<table class="table table-striped table-bordered dt-responsive nowrap" class="example">
    <thead>
    <tr class="info">
        <th style="text-align: center !important;">م</th>
        <th style="text-align: center !important;">رقم القيد</th>
        <th style="text-align: center !important;">حاله القيد</th>
        <th style="text-align: center !important;">نوع القيد</th> 
        <th style="text-align: center !important;">تاريخ القيد </th>
        <th style="text-align: center !important;">قيمة القيد </th>



    </tr>
    </thead>
    <tbody>
    <?php
    $x=1;

    if(!empty($records)){
        foreach($records as $row){

            ?>
            <tr onclick="get_row(<?php echo $x;?>);" >
                <td><?=$x?></td>
                <td class="rkm<?php echo $x;?>"><?=$row->rkm?></td>
                <td><?=$row->halet_qued_name?></td>
                <td><?=$row->no3_qued_name?></td>
                <td><?=date('d-m-Y', $row->qued_date)?></td>
                 <td><?=$row->total_value?></td>




            </tr>

            <?php  $x++;   } }?>

    </tbody>
</table>