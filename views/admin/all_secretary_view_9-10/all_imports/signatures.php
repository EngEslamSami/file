<?php
$numtel = $_POST['num'];
if($numtel!=0 && $numtel<=5)  {
    for($i = 1 ; $i <= $numtel ; $i++) {  ?>

        <div class="form-group col-sm-6">
            <label class="label label-green  half"><?=$i?> -الإسم </label>
            <input type="text" name="name<?=$i?>" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
        </div>
        <div class="form-group col-sm-6">
            <label class="label label-green  half">  <?=$i?>  -الوظيفة </label>
            <input type="text" name="job<?=$i?>" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required" >
        </div>


    <?php   }
}?>