<div class="col-sm-12">
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
         <th class="text-center">م</th>
            <th class="text-center">رقم الملف</th>
            <th class="text-center">إسم رب الأسرة  </th>
          <!--  <th class="text-center">مسؤول الحساب البنكي </th> -->
         <!--    <th class="text-center">هوية رقم  </th>-->
            <th class="text-center">عدد الأفراد </th>
            <th class="text-center">أرملة </th>
            <th class="text-center">يتيم </th>
            <th class="text-center">مستفيد </th>
            <th class="text-center">إجمالى </th>
        </tr>
        </thead>
        <tbody class="text-center">
        
              
                         <?php  $total =0;
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
           <!-- <td><?=$x;?></td>
            <td><?=$row->file_num_basic?></td>
            <td><?=$row->mother_name?></td>
            <td><?=$row->mother_national_num_fk?></td>
            <td><?=($row->mother_num_in+$row->down_child+$row->up_child)?></td>
            <td><?=$row->mother_num_in?></td>
            <td><?=$row->down_child?></td>
            <td><?=$row->up_child?></td>
            <td><?=$row->value?></td>-->
            
            <td><?=$x;?></td>
            <td><?=$row->file_num?></td>
            <td><?=$row->father_full_name?></td>
      <!--      <td><?=$row->bank_responsible_name?></td> -->
     <!--        <td><?=$row->bank_responsible_national_num?></td> -->
             
            <td><?=($row->mother_num+$row->young_num+$row->adult_num)?></td>
            <td><?=$row->mother_num?></td>
            <td><?=$row->young_num?></td>
            <td><?=$row->adult_num?></td>
            <td><?=$row->value?></td>
            
            
            
            
        </tr>
        <?php  }?>
        <tr>
          <td colspan="3"> الاجمالى</td>
          
        <td><?=$all_afrad?></td>
       <td><?=$all_aramel?></td>
       <td><?=$all_aytam?></td>
        <td><?=$all_ble3en?></td>
          
          <td><?=$total?></td>
        </tr>
        
      <?php /* ?>
      
        <?php  $total =0;$x=1; foreach ($sarf_details as $row){
             $total += $row->value?>
        <tr>
            <td><?=$x++;?></td> 
            <td><?=$row->file_num_basic?></td>
            <td><?=$row->father_full_name?></td>
            <td><?=$row->person_name?></td>
            <td><?=$row->bank_account_num?></td>
            <td><?=$row->bank_name?></td>
            <td><?=($row->mother_num_in+$row->down_child+$row->up_child)?></td>
            <td><?=$row->mother_num_in?></td>
            <td><?=$row->down_child?></td>
            <td><?=$row->up_child?></td>
            <td><?=$row->value?></td>
        </tr>
        <?php  }?>
        <tr>
          <td colspan="9"> الاجمالى</td>
          <td><?=$total?></td>
        </tr>
        <?php */ ?>
        </tbody>
        </table>
</div>