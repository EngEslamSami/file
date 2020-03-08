<?php 
/*if(isset($data_vacation ) && $data_vacation!=null && !empty($data_vacation)):?>
    <table id="" class="display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">نوع الاجازة</th>
            <th class="text-center">رصيد سابق</th>
            <th class="text-center">رصيد حالى </th>
            <th class="text-center">الرصيد المستنفذ</th>
            <th class="text-center">الاجمالى</th>
           
        </tr>
        </thead>
        <tbody>
        <?php $x = 0; foreach($data_vacation as $row):?>
            <tr>
                <td ><?php echo $row->title?> </td>
                <td > <?php echo $row->past_num?> </td>
                <td > <?php echo $row->current_num?> </td>
                <td > <?php echo $row->take_vacation?> </td>
                <td > <?php echo $row->past_num + $row->current_num - $row->take_vacation ?> </td>

            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
<?php endif;
*/
?>

<?php if(isset($data_vacation ) && $data_vacation!=null && !empty($data_vacation)):?>
    <table id="" class="display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="text-center">نوع الاجازة</th>
            <th class="text-center">رصيد سابق</th>
            <th class="text-center">رصيد حالى </th>
            <th class="text-center">الرصيد المستنفذ</th>
            <th class="text-center">الاجمالى</th>
            <th class="text-center">الرصيد البياني</th>
           
        </tr>
        </thead>
        <tbody>
        <?php $x = 0; foreach($data_vacation as $row):?>
            <tr>
                <td ><?php echo $row->title?> </td>
                <td > <?php echo $row->past_num?> </td>
                <td > <?php echo $row->current_num?> </td>
                <td > <?php echo $row->take_vacation?> </td>
                <td > <?php echo $row->past_num + $row->current_num - $row->take_vacation ?> </td>
                <td id="<?php echo $row->vacation_type;?>" class="byan">0</td>
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
<?php endif;?>