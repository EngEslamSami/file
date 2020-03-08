
<?php
// print_r($result);
 ?>
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">نوع القيد   : <?=$result->no3_qued_name?></th>
      <th scope="col">حالة القيد  : <?=$result->halet_qued_name?> </th>
      <th scope="col">رقم القيد   : <?=$result->rkm?></th>
      <th scope="col">التاريخ     : <?=$result->qued_date_ar?></th>
      <th scope="col">مدخل القيد  : <?=$result->publisher_name?></th>
      
      
    </tr>
  </thead>
  <tbody>
  <!--
    <tr>
      <th><span class = "label label-default"><?=$result->no3_qued_name?></th>
      <td><span class = "label label-primary"><?=$result->halet_qued_name?></span></td>
      <td><span class = "label label-success"><?=$result->rkm?></span></td>
      <td><span class = "label label-info"><?=$result->qued_date_ar?></span></td>
    </tr>-->
  </tbody>
</table>

<!--
<table class="table table-striped table-bordered"  style="table-layout: fixed">
    <tbody>
    <tr>
        <td class="closed_green" style="    width: 15%;"> نوع القيد </td>
        <td> <span class=""  ><?=$result->no3_qued_name?></span>
        <span class="label label-primary">Primary Label</span>
        </td>
        <td class="closed_green">حالة القيد </td>
        <td><span class=" " ><?=$result->halet_qued_name	?></span></td>
        <td class="closed_green">رقم القيد </td>
        <td><span class=" " ><?=$result->rkm	?></span></td>
        <td class="closed_green">التاريخ </td>
        <td><span class=" " ><?=$result->qued_date_ar	?></span></td>
    </tr>
    </tbody>
</table>
-->
<table class="table table-striped table-bordered" style="table-layout: fixed;" id="mytable">
    <thead>
    <tr class="redblacktd">
        <th style="width: 55px;">مدين</th>
        <th style="width: 55px;">دائن</th>
        <th style="width: 70px;">رقم الحساب</th>
        <th style="width: 13%;">إسم الحساب</th>
        <th style="width: 50px;" >رقم المرجع</th>
       <!-- <th style="width: 70px;" >العملية</th>-->
        <th style="width: 200px;" >البيان</th>


    </tr>
    </thead>

    <tbody id="QuodresultTable">
    
    
        <?php
    
  
    if($total_value_elqeed == 0){ ?>
      
      <?php 
          $x =1; if(!empty($elqeed_zero_details)){
        foreach ($elqeed_zero_details as $row_qued){
            ?>
            <tr id="<?=$row_qued->id?>">
                <td><?=$row_qued->maden?></td>
                <td><?=$row_qued->dayen?></td>
                <td><?=$row_qued->rkm_hesab?> </td>
                <td><?=$row_qued->hesab_name?></td>
                <td><?=$row_qued->marg3?></td>
               <!-- <td><?=$row_qued->harka_name?></td> -->
                <td><?=$row_qued->byan?></td>
            </tr>
            <?php $x++;  } }  ?>
    
      
    <?php  }else{ ?>
      <?php
       $counter =1; if(!empty($result->details)){
        foreach ($result->details as $row_detail){
            ?>
            <tr id="<?=$row_detail->id?>">
                <td><?=$row_detail->maden?></td>
                <td><?=$row_detail->dayen?></td>
                <td><?=$row_detail->rkm_hesab?> </td>
                <td><?=$row_detail->hesab_name?></td>
                <td><?=$row_detail->marg3?></td>
               <!-- <td><?=$row_detail->harka_name?></td> -->
                <td><?=$row_detail->byan?></td>
            </tr>
            <?php $counter++;  } }  ?>
      
   <?php  } ?>
    

    
    <?php

    /*
    $counter =1; if(!empty($result->details)){
        foreach ($result->details as $row_detail){
            ?>
            <tr id="<?=$row_detail->id?>">
                <td><?=$row_detail->maden?></td>
                <td><?=$row_detail->dayen?></td>
                <td><?=$row_detail->rkm_hesab?> </td>
                <td><?=$row_detail->hesab_name?></td>
                <td><?=$row_detail->marg3?></td>
               <!-- <td><?=$row_detail->harka_name?></td> -->
                <td><?=$row_detail->byan?></td>
            </tr>
            <?php $counter++;  } } */ ?>

    </tbody>
    <tfoot>
    <tr>
        <td style="background-color: #563838; text-align:center;color: white" ><?=$result->total_value?></td>
        <td style=" background-color: #563838; text-align:center;color: white" > <?=$result->total_value?></td>
        <td colspan="4" style="background-color: #563838; text-align:center;color: white">الإجمالي</td>
    </tr>
    </tfoot>
</table>
