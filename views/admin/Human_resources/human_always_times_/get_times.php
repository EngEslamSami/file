<br>

<?php
$days_en =array("saturday","sunday","monday","tuesday","wednesday","thursday","friday");
$days_ar =array("السبت","الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة");
if(!empty($_POST['num'])){  for ($a=0;$a<sizeof($days_ar);$a++){ ?>
    <input type="checkbox" class="day" name="<?php echo $days_en[$a];?>" id="<?php echo $days_en[$a];?>" value="<?=$days_en[$a]?>" style="margin-right: 20px">
    <label for=""><?php echo $days_ar[$a];?></label>
 <?php }  ?>



    <table class="table table-striped table-bordered">
        <thead>
        <tr class="info">
            <th>الفترة</th>
            <th>من</th>
            <th>إلي</th>
            <th> الحضور من</th>
            <th>الحضور إلي</th>
            <th> الإنصراف من</th>
            <th>الإنصراف إلي</th>
            <th>الإجراء</th>
        </tr>
        </thead>

        <tbody>
        <?php  $x=1;for ($a=0;$a<$_POST['num'];$a++){ ?>
        <tr>


            <td><?php echo $a+1;?></td>
            <td><input type="time" name="period_from[]" id="period_from<?php echo $x;?>"></td>
            <td><input type="time" name="period_to[]" id="period_to<?php echo $x;?>"></td>
            <td><input type="time" name="attend_from[]" id="attend_from<?php echo $x;?>"></td>
            <td><input type="time" name="attend_to[]" id="attend_to<?php echo $x;?>"></td>
            <td><input type="time" name="leave_from[]" id="leave_from<?php echo $x;?>"></td>
            <td><input type="time" name="leave_to[]" id="leave_to<?php echo $x;?>"></td>
            <td><input type="button"  id="button<?php echo $x;?>" name="add" value="إضافة" onclick="SendForm(<?php echo $x;?>)" class="btn btn-success"></td>

        </tr>

        <?php $x++; } ?>
        </tbody>

    </table>

<?php } ?>
