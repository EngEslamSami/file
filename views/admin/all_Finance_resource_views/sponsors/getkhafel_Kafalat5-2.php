
<?php
if(isset($records) && !empty($records)){?>
<table class="table table-bordered" style="margin-top:4px">
    <tr class="closed_green">

        <td class="text-center" style="width: 5%"> م </td>
        <td class="text-center" style="width: 20%"> إسم الكافل</td>

        <td class="text-center" style="width: 20%"> اسم المستفيد بالكفاله </td>
        <td class="text-center" style="width: 20%"> نوع الكفاله </td>
        <td class="text-center" style="width: 20%"> مقدار  الكفاله </td>
        <td class="text-center" style="width: 20%"> تاريخ بدايه  الكفاله </td>

        <td class="text-center" style="width: 20%"> تاريخ نهايه  الكفاله </td>




    </tr>

    <?php
    if(isset($records) && !empty($records)){
$x=1;
        foreach ($records as $record){

    ?>
    <tr class="">
        <td><?php echo $x ;?>  </td>
        <td><?php echo  $record->kafel_name ;?></td>
        <td><?php echo  $record->person_name ;?></td>
        <td><?php echo  $record->kafala_name ;?></td>
        <td><?php echo  $record->first_value ;?></td>
        <td><?php echo  $record->first_date_from_ar ;?></td>
        <td><?php echo  $record->first_date_to_ar ;?></td>




    </tr>
    <?php

        $x++;
        } } ?>
</table>
<?php } else{?>
<div class="alert alert-danger">عفوا !... لا توجد كفالات لهذا الكفيل</div>


<?php } ?>