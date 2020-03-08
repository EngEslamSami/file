
<?php
$x=0;
$all_value=0;
if(isset($all_sarf) &&!empty($all_sarf)){
    foreach($all_sarf as $row){

        $all_value=$all_value+$row->all_value;

        $x++;   } }
?>
<div class="col-xs-12">
    <div class="col-xs-6 text-center">
        <h5 style="padding: 10px; border: 2px solid #437500;"> عدد الأذونات : <span id="x" ><?= $x?></span>	</h5>
    </div>
    <div class="col-xs-6 text-center">
        <h5 style="padding: 10px; border: 2px solid #750000;"> المجموع :  <span id="t_total"><?= $all_value?></span></h5>


    </div>


</div>



<table class="table-bordered table table-responsive " id="example">
    <thead>
    <tr class="greentd">
        <th>م</th>
        <th>رقم إذن الصرف</th>
        <th>تاريخ الصرف</th>
        <th>المستودع</th>
        <th>رقم الملف</th>
        <th>الإسم</th>

    </tr>
    </thead>
    <tbody>
    <input type="hidden" name="rkm_quod" value="<?php echo $rkm_quod;?>" >`
    <?php $x = 1;
    foreach ($all_sarf as $all) {
        ?>
        <tr>
            <td><?= $x++ ?></td>
            <td><?= $all->ezn_rkm ?></td>
            <td><?= $all->ezn_date_ar ?></td>
            <td><?= $all->storage_name ?></td>

            <td><?= $all->sarf_to_fk ?></td>
            <td><?= $all->sarf_to_name ?></td>



        </tr>
        <?php
    }
    ?>

    </tbody>
</table>
