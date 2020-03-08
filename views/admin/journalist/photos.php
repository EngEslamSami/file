<?php echo form_open_multipart('dashboard/add_journalist',array('class'=>"form-horizontal",'role'=>"form" ))?>
<?php

$numtel = $_POST['num'];
if($numtel>10){
    echo '<div class="alert alert-danger" >
              أقصى عدد 10
              </div>';

}
elseif($numtel<=10)
{
    for($i=1;$i<=$numtel;$i++){
        echo'

<div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الصورة '.$i.' </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    
       <input type="file" id="img" name="img'.$i.'" style="height: auto;" class="form-control text-right"/>     
                            
                            
                                </div>
                                
                                
                            </div>
            <br/><br/><br/>
        ';

    }
      
}


?>
<?php echo form_close()?>