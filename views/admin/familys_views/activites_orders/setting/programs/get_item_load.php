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



echo '		<div class="col-md-12 no-padding">
<br>
<div class="form-group col-sm-4 col-xs-12 no-padding">
<label class="label label-green half"> إسم الفقرة   </label>
<input type="text" name="item_name'.$i.'" class="form-control half input-style docs-date" data-validation="required" />
</div>

<div class="form-group col-sm-4 col-xs-12">
<label class="label label-green half"> من  </label>
<input type="time" name="from'.$i.'" class="form-control half input-style" data-validation="required" />
</div>

<div class="form-group col-sm-4 col-xs-12">
<label class="label label-green half"> إلي  </label>
<input type="time" name="to'.$i.'" class="form-control half input-style" data-validation="required" />
</div>






</div>';

/*
echo '
<div class="details-resorce">
<div class="col-xs-12 r-inner-details">

<div class="col-xs-12 ">
<div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">







<div class="col-xs-12 ">
<div class="col-xs-6">
<h4 class="r-h4 "> إسم الفقرة   </h4>
</div>
<div class="col-xs-6 r-input ">


<input type="text" class="form-control "  name="name'.$i.'" placeholder="إسم الفقرة "  data-validation="required"  />


</div>


<div class="col-xs-6 r-input ">


<input type="text" class="form-control "  name="name'.$i.'" placeholder="من  "  data-validation="required"  />


</div>
</div>


</div>
</div>
</div>
</div>
';
        */                    
                            
                            
    }
}





?>

