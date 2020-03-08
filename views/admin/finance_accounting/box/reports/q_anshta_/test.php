<?php 
/*
echo '<pre>';
print_r($all_details);*/

?>

id	qued_rkm_fk	qued_rkm_id_fk	maden	dayen	value	rkm_hesab	hesab_name	byan	marg3


  <table class="table table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>qued_rkm_fk</th>
        <th>qued_rkm_id_fk</th>
        <th>maden</th>
        <th>dayen</th>
        <th>value</th>
        <th>rkm_hesab</th>
        <th>hesab_name</th>
        <th>byan</th>
        <th>marg3</th>
        <th>date</th>
        <th>date_ar</th>
        
      </tr>
    </thead>
    <tbody>
    
    <?php foreach( $all_details as $row) { ?>
    <tr>
    <td><?=$row->id?></td>
    <td><?=$row->qued_rkm_fk?></td>
    <td><?=$row->qued_rkm_id_fk?></td>
    <td><?=$row->maden?></td>
    <td><?=$row->dayen?></td>
    <td><?=$row->value?></td>
    <td><?=$row->rkm_hesab?></td>
    <td><?=$row->hesab_name?></td>
    <td><?=$row->byan?></td>
    <td><?=$row->marg3?></td>
    
    <td><?=$row->qued_date?></td>
    <td><?=$row->qued_date_ar?></td>
    </tr>
    
    
        
     <?php  } ?>
    
    </tbody>
  </table>