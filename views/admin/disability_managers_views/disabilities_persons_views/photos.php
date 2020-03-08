<?php
$numtel = $_POST['num_photo'];
if($numtel>10){
    echo '<div class="alert alert-danger" >
              أقصى عدد 10
              </div>';

}
elseif($numtel<=10)
{
    for($i=1;$i<=$numtel;$i++){
        echo'


<div class="col-sm-12" >
                <div class="form-group col-sm-4 col-xs-12">
                    <label class="label label-green  half">المرفق رقم '.$i.'</label>
                    <input type="file" id="img" name="img'.$i.'" class="form-control half input-style"  accept="application/pdf,application/vnd.ms-excel" data-validation="required" >
                </div>
                </div>
        ';

    }
      
}


?>
