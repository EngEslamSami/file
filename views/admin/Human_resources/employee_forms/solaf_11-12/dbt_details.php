<div class="col-xs-10 padding-4">
 
<?php


if (isset($solaf_dawabt) && (!empty($solaf_dawabt))) { ?>
                            
 


<table class="table " style="table-layout: fixed">
        <tbody>
      
        <tr>
            
        <td ><strong><?= $solaf_dawabt[0]->type_n;?></strong></td>
        <td  ><strong>:</strong></td>
            <?php  $i = 0;
           // echo '<pre>'; print_r($solaf_dawabt);
        foreach ($solaf_dawabt as $solfa) { ?>
       
      
            <td  >
            <?= ++$i ?>  -  <?= $solfa->title ?>
                                        <?php }} ?>
            
            
            </td>
           
           
        </tr>
        
        
                        




                         
						  
						  
        </tbody>
    </table>
   



</div>



</div>