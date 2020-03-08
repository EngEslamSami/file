<?php  foreach ($branches as $row){?>
    <option>اختر النوع</option>
    <option value="<?php echo $row->id;?>"><?php echo '===>'. $row->name;?></option>
    <?php get_option($row->branch,'=>');?>

<?php } ?>




<?php
function get_option($arr,$conn)
{
    $x=1;
foreach ($arr as $record)

{?>
    <option value="<?php echo $record->id;?>"><?php echo $conn. $record->name;?></option>
<?php
    get_option($record->branch,$x.'-');
    $x++;
}
}
?>