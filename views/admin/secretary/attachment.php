<?php echo form_open_multipart('dashboard/secretary_export',array('class'=>"form-horizontal",'role'=>"form" ))?>
<?php

$numtel = $_POST['num'];

if($numtel!=0 && $numtel<=20)
 {
    for($i = 1 ; $i <= $numtel ; $i++){
        echo'
                            
                                 
                                <div class="col-xs-6">
                                    <div class="col-sm-6">
                                        <h4 class="r-h4"> اسم المرفق '.$i.'</h4>
                                    </div>
                                    <div class="col-sm-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="title'.$i.'" >
                                    </div>
                                </div>
                           
                                  
                                <div class="col-xs-6">
                                    <div class="col-sm-6">
                                        <h4 class="r-h4"> ارفاق المرفق '.$i.'</h4>
                                    </div>
                                    <div class="col-sm-6 r-input">
                                        <input type="file" class="r-inner-h4 " name="img'.$i.'" />
                                    </div>
                                </div>
             ';
    }     
 }
 else
    echo '<div class="alert alert-danger" >
              أقصى عدد 20
              </div>';

?>

<?php echo form_close()?>