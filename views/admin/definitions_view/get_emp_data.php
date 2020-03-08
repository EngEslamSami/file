<?php 
if(isset($employees) && $employees != null){
?> 

 <input type="number" name="national_num" value="<?php echo $employees['id_num']  ?>" class="form-control" data-validation="required" />    
<?php     
}
?>