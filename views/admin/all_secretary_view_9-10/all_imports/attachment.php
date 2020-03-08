<?php
$numtel = $_POST['num'];
if($numtel!=0 && $numtel<=5)  {
    for($i = 1 ; $i <= $numtel ; $i++) {  ?>

        <div class="form-group col-sm-6">
            <label class="label label-green  half"><?=$i?>  -المرفق </label>
            <input type="text" name="title<?=$i?>" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
        </div>
        <div class="form-group col-sm-6">
            <label class="label label-green  half">  -ارفاق المرفق<?=$i?> </label>
            <input type="file" name="img<?=$i?>" class="form-control half input-style" placeholder="أدخل البيانات" accept="application/pdf" data-validation="required" >
        </div>


<?php   }
        }?>