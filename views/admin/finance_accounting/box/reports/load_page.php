<?php

$pay_method_qabd=array(1=>'نقدي',2=>'شيك');
$pay_method_sarf=array(1=>'نقدي',2=>'شيك من الصندوق',3=>'شيك من البنك');
if($type==1){?>

       <option value=""> اختر</option>
    <option value="1"> نقدي</option>
    <option value="2"> شيك</option>



<?php }else{
?>
    <option value=""> اختر</option>
    <option value="1"> نقدي</option>
    <option value="2"> شيك من الصندوق</option>
    <option value="3"> شيك من البنك</option>



<?php } ?>
