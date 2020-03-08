<?php
if(isset($records)&&!empty($records))
{
    $x=0;
foreach ($records  as $row){
    $x++;
    ?>
    <tr>
        <td><?php echo $x ;?></td>
        <td> <?php echo $row->k_num;?></td>
        <td> <?php echo $row->k_name;?></td>
       <td> <?php echo $row->k_mob;?></td>
    </tr>
<?php } }else{?>
<tr>
    <td colspan="4">
        <div class="col-md-12 alert alert-danger">عفوا لايوجد نتائج</div>

    </td>
</tr>

 <?php
}
?>