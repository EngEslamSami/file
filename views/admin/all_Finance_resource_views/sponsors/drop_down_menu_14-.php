


<?php 
//print_r($k_status_data);

// echo $k_status_data['type_name'];


//if($K_status == 1 || $K_status == 2 ){
  
/*}else{
 $K_status_title =  'غير محدد ';
 $K_color =  '#62d0f1';     
    
}*/

if(isset($k_status) and $k_status != null ){
   $K_status_title =  $k_status['title'];
$K_color =  $k_status['color'];
}else{
  $K_status_title =  'حالة الكافل غير محدد  ';
 $K_color =  '#62d0f1';     
}


?>

&nbsp;&nbsp;
<button style="margin-right: 3px;" id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
      <span class="">  رقم الكافل </span></button>
<button class="btn btn-success  btn-sm progress-button ">
     <span class=""><?php if(!empty($result->k_num)){ echo $result->k_num; }?></span></button>

<div class="btn-group">
    <button type="button" class="btn btn-danger">إستكمال البيانات </button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
     <li><a href="<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/addSponsor_maindata">البيانات
                الاساسية </a></li>
        <li><a href="<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/addKfala_data/"> بيانات  الكفالة</a></li>

    </ul>
    
    
    <button style="background-color: <?php echo $K_color;  ?>;" class="btn btn-success  btn-sm progress-button ">
     <span class=""><?php if(!empty($K_status_title)){ echo $K_status_title; }?></span></button>
    
    
    
</div>