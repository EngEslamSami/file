<?php
 $numtel = $_POST['num'];
if($numtel>5){
    echo '<div class="alert alert-danger" >
              أقصى عدد 5
              </div>';

}
elseif($numtel<=10)
{
    for($i=1;$i<=$numtel;$i++){

echo '<div class="col-xs-12 ">
          <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
             <div class="col-xs-12 ">
                <div class="col-xs-6">
                 <h4 class="r-h4 "> إسم العضو  </h4>
                </div>
             <div class="col-xs-6 r-input ">
                <input type="text" class="form-control "  name="name'.$i.'" placeholder="إسم العضو"  data-validation="required"  />
             </div>
</div>
</div>
</div>                   ';
                            
                            
                            
    }
}
?>

