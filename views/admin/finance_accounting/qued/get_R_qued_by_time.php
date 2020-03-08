
<div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php //echo $title?> </h3>
        </div>
        <div class="panel-body">

  <?php if( isset($tables) && !empty($tables) && $tables !=null ){?>

  
        <?php foreach ($tables as $row ){?>
   <table id="" class="table table-bordered table-hover table-striped" style="">
  <thead> 
       <tr >
            <th class="text-center"> تاريخ القيد :</th>
            <th class="text-center"> <?php  echo $row->qued_num?> </th>
            <th class="text-center"> رقم القيد :</th>
            <th class="text-center">  <?php echo date("Y-m-d",$row->date) ?> </th>
             
       </tr>
       <tr>
        <td class="text-center"> م </td>
            <td class="text-center">المدين </td>
            <td class="text-center"> الدائن </td>
            <td class="text-center"> إسم الحساب  </td>  
       </tr>
    <thead>     
       <tbody>   
      
            <?php $r=1; foreach ($row->sub  as $row_sub ){
              if($row_sub->maden == 0 && $row_sub->dayen != 0  ){
				   $dayen_value=$row_sub->value;
				   $maden_value ="-";
				   $name =$row_sub->dayen_name;
			  }elseif($row_sub->maden != 0 && $row_sub->dayen == 0 ){
                   $dayen_value="-";
				   $maden_value =$row_sub->value;				
				   $name =$row_sub->maden_name;
			  } ?>
		<tr>		
               <td class="text-center"><?php echo $r++ ;?></td>
               <td class="text-center"><?php echo $maden_value?></td>
               <td class="text-center"><?php echo $dayen_value?></td>
               <td class="text-center"><?php echo $name?></td>
        <tr>        
		<?php }?>
    </tbody>
</table>


        <?php }?>

 <?php }else{
    echo '<div class="alert alert-danger">
          <strong>لا يوجد قيود !</strong> خلال الفترة من   الى .
         </div>';
 }?>
</div>
</div>
</div>