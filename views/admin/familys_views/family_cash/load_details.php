<div class="col-sm-12">

<?php if($main_sarf_data['bnod_help_fk'] ==4 ) { ?> 



    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="greentd">
         <th class="text-center">م </th>
            <th class="text-center">رقم الملف</th>
            <th class="text-center">إسم  الأسرة  </th>
    
      <th class="text-center">عدد الأفراد </th> 
       
  <th class="text-center">الفئة </th>
            
            <th class="text-center">قيمة الإيجار </th>
        </tr>
        </thead>
        <tbody class="text-center">
        
              
                         <?php

                         
                           $total =0;
              $all_afrad=0;
              $all_aramel=0;
              $all_aytam=0;
              $all_ble3en=0;
              $x=0;
              
           
              
               foreach ($sarf_details as $row){
                $x++;
              $total += $row->value;
             
             
             $all_afrad += ($row->mother_num+$row->young_num+$row->adult_num);
             $all_aramel  += $row->mother_num;
              $all_aytam  +=$row->young_num;
             $all_ble3en  +=$row->adult_num;
             
             
             ?>
        <tr>
            
            <td><?=$x;?></td>
            <td><?=$row->file_num?></td>
            <td><?=$row->father_full_name?></td>
        
         <td><?=($row->mother_num+$row->young_num+$row->adult_num)?></td> 

         <td><?=$row->fe2a_title?></td>
        <td><?=$row->value?></td>
            
            
            
            
        </tr>
        <?php  }?>
        <tr>
          <td colspan="3"> الاجمالى </td>
          
     <td><?=$all_afrad?></td> 
                  
          <td></td> 
    

          <td><?=$total?></td>
        </tr>
        
        </tbody>
        </table>
        




<?php }else{ ?>


    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="greentd">
         <th class="text-center">م </th>
            <th class="text-center">رقم الملف</th>
            <th class="text-center">إسم رب الأسرة  </th>
            <th class="text-center">مسؤول الحساب البنكي </th>
         <!--   <th class="text-center">عدد الأفراد </th> -->
          <?php
  
  // value_mostafed  value_yatem  value_armal
   if($main_sarf_data['value_yatem'] != 0 and $main_sarf_data['value_armal'] ==0 and $main_sarf_data['value_mostafed'] ==0){
   
    ?>
    <th class="text-center">يتيم </th>
 <?php }elseif($main_sarf_data['value_yatem'] == 0 and $main_sarf_data['value_armal'] != 0 and $main_sarf_data['value_mostafed'] ==0){ 
   
    ?>
    <th class="text-center">أرملة </th>
   <?php }elseif($main_sarf_data['value_yatem'] == 0 and $main_sarf_data['value_armal'] == 0 and $main_sarf_data['value_mostafed'] !=0){
   
    ?>
    <th class="text-center">مستفيد </th>
      <?php }elseif($main_sarf_data['value_yatem'] != 0 and $main_sarf_data['value_armal'] != 0 and $main_sarf_data['value_mostafed'] ==0){ 
        
        ?> 
            <th class="text-center">أرملة </th>
            <th class="text-center">يتيم </th>
      <?php }elseif($main_sarf_data['value_yatem'] != 0 and $main_sarf_data['value_armal'] == 0 and $main_sarf_data['value_mostafed'] !=0){
       
        ?>
              <th class="text-center">يتيم </th>
            <th class="text-center">مستفيد </th>
            
         <?php }elseif($main_sarf_data['value_yatem'] == 0 and $main_sarf_data['value_armal'] != 0 and $main_sarf_data['value_mostafed'] !=0){
            
            ?>   
          <th class="text-center">أرملة </th>
            <th class="text-center">مستفيد </th>
         <?php }elseif($main_sarf_data['value_yatem'] != 0 and $main_sarf_data['value_armal'] != 0 and $main_sarf_data['value_mostafed'] !=0){ 
            
            ?>
          <th class="text-center">أرملة </th>
            <th class="text-center">يتيم </th>
            <th class="text-center">مستفيد </th>
         
         <?php } ?>
         
         
         
         
         
         
         
         
         <!--
            <th class="text-center">أرملة </th>
            <th class="text-center">يتيم </th>
            <th class="text-center">مستفيد </th>
            -->
            
            <th class="text-center">إجمالى </th>
        </tr>
        </thead>
        <tbody class="text-center">
        
              
                         <?php

                         
                           $total =0;
              $all_afrad=0;
              $all_aramel=0;
              $all_aytam=0;
              $all_ble3en=0;
              $x=0;
              
           
              
               foreach ($sarf_details as $row){
                $x++;
              $total += $row->value;
             
             
             $all_afrad += ($row->mother_num+$row->young_num+$row->adult_num);
             $all_aramel  += $row->mother_num;
              $all_aytam  +=$row->young_num;
             $all_ble3en  +=$row->adult_num;
             
             
             ?>
        <tr>
            
            <td><?=$x;?></td>
            <td><?=$row->file_num?></td>
            <td><?=$row->father_full_name?></td>
                <td><?=$row->bank_responsible_name?></td>
       <!--     <td><?=($row->mother_num+$row->young_num+$row->adult_num)?></td> -->
                <?php 
    if($main_sarf_data['value_yatem'] != 0 and $main_sarf_data['value_armal'] ==0 and $main_sarf_data['value_mostafed'] ==0){ ?>
   <td><?=$row->young_num?></td>
 <?php }elseif($main_sarf_data['value_yatem'] == 0 and $main_sarf_data['value_armal'] != 0 and $main_sarf_data['value_mostafed'] ==0){ ?>
   <td><?=$row->mother_num?></td>
   <?php }elseif($main_sarf_data['value_yatem'] == 0 and $main_sarf_data['value_armal'] == 0 and $main_sarf_data['value_mostafed'] !=0){ ?>
     <td><?=$row->adult_num?></td>
      <?php }elseif($main_sarf_data['value_yatem'] != 0 and $main_sarf_data['value_armal'] != 0 and $main_sarf_data['value_mostafed'] ==0){  ?> 
           <td><?=$row->mother_num?></td>
            <td><?=$row->young_num?></td>
      <?php }elseif($main_sarf_data['value_yatem'] != 0 and $main_sarf_data['value_armal'] == 0 and $main_sarf_data['value_mostafed'] !=0){  ?>
              <td><?=$row->young_num?></td>
             <td><?=$row->adult_num?></td>
            
         <?php }elseif($main_sarf_data['value_yatem'] == 0 and $main_sarf_data['value_armal'] != 0 and $main_sarf_data['value_mostafed'] !=0){?>   
            <td><?=$row->mother_num?></td>
             <td><?=$row->adult_num?></td>
         <?php }elseif($main_sarf_data['value_yatem'] != 0 and $main_sarf_data['value_armal'] != 0 and $main_sarf_data['value_mostafed'] !=0){?>   
            <td><?=$row->mother_num?></td>
             <td><?=$row->young_num?></td>
             <td><?=$row->adult_num?></td>
         <?php } ?>
       
       
       
       
       <!--
            <td><?=$row->mother_num?></td>
            <td><?=$row->young_num?></td>
            <td><?=$row->adult_num?></td>
       -->
       
       
       
       
            <td><?=$row->value?></td>
            
            
            
            
        </tr>
        <?php  }?>
        <tr>
          <td colspan="4"> الاجمالى</td>
          
    <!--    <td><?=$all_afrad?></td> -->
                    <?php 
    if($main_sarf_data['value_yatem'] != 0 and $main_sarf_data['value_armal'] ==0 and $main_sarf_data['value_mostafed'] ==0){ ?>
  <th  style="font-size: 17px !important;"><?=$all_aytam?></th>
 <?php }elseif($main_sarf_data['value_yatem'] == 0 and $main_sarf_data['value_armal'] != 0 and $main_sarf_data['value_mostafed'] ==0){ ?>
   <th  style="font-size: 17px !important;"><?=$all_aramel?></th>
   <?php }elseif($main_sarf_data['value_yatem'] == 0 and $main_sarf_data['value_armal'] == 0 and $main_sarf_data['value_mostafed'] !=0){ ?>
      <th  style="font-size: 17px !important;"><?=$all_ble3en?></th>
      <?php }elseif($main_sarf_data['value_yatem'] != 0 and $main_sarf_data['value_armal'] != 0 and $main_sarf_data['value_mostafed'] ==0){  ?> 
            <th  style="font-size: 17px !important;"><?=$all_aramel?></th>
           <th  style="font-size: 17px !important;"><?=$all_aytam?></th>
      <?php }elseif($main_sarf_data['value_yatem'] != 0 and $main_sarf_data['value_armal'] == 0 and $main_sarf_data['value_mostafed'] !=0){  ?>
             <th  style="font-size: 17px !important;"><?=$all_aytam?></th>
               <th  style="font-size: 17px !important;"><?=$all_ble3en?></th>
            
         <?php }elseif($main_sarf_data['value_yatem'] == 0 and $main_sarf_data['value_armal'] != 0 and $main_sarf_data['value_mostafed'] !=0){?>   
           <th  style="font-size: 17px !important;"><?=$all_aramel?></th>
             <th  style="font-size: 17px !important;"><?=$all_ble3en?></th>
         <?php }elseif($main_sarf_data['value_yatem'] != 0 and $main_sarf_data['value_armal'] != 0 and $main_sarf_data['value_mostafed'] !=0){?>   
           <th  style="font-size: 17px !important;"><?=$all_aramel?></th>
            <th  style="font-size: 17px !important;"><?=$all_aytam?></th>
             <th  style="font-size: 17px !important;"><?=$all_ble3en?></th>
         <?php } ?>
          
    
    
    
    <!--
       <td><?=$all_aramel?></td>
       <td><?=$all_aytam?></td>
        <td><?=$all_ble3en?></td>
          -->
          <td><?=$total?></td>
        </tr>
        
        </tbody>
        </table>
        
        
  <?php } ?>       
        
        
        
        
</div>