<?php 
if(isset($in) && $in!=null):
?>    
 هذا الرقم موجود من قبل 
 
<?php else: ?>
<script>
$("#lenth").css('color' , 'green');
</script>
 هذا الرقم  متاح 
<?php endif; ?> 