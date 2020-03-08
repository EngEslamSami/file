<style>
    body {
        font-family: 'Cairo', sans-serif;
    }
    
    .rr-table td {
        padding: 5px 0;
    }
    
    .rr-title {
        font-weight: bold;
        font-size: 15px;
    }
    
    .rr-title span {
        font-weight: normal;
        padding-right: 5px;
    }
    
    .rr-high {
        height: 25px;
    }

</style>

   <div class="col-xs-12">
        <div class="container">

            <table class="rr-table" style="width: 100%">
<a style="margin-right: 97%;background-color: #e8f1f3;"
 href="<?php echo  base_url('Directors/Directors/print_data').'/'.$_POST['valu'] ?>">
<i class="fa fa-print" aria-hidden="true"></i> طباعة</a>  


              
     <?php if(isset($all_items_desions)&&$all_items_desions!=null){
          foreach ($all_items_desions as $record ) {?>
                     <tr class="rr-high"></tr>                                 
                  <tr>
                    <td class="rr-title"> الموضوع  : <span><?php echo $record->item_title;?></span></td>

                 </tr> 
                 <tr>
                    <td class="rr-title"> القرار : <span> <?php echo $record->decision_title;?></span></td>

                   </tr>    
                    <tr class="rr-high"></tr> 
      
             
              
              
     <?php } } ?>  

       
                  <?php
                  $val = $_POST['valu'];
                  
               
               /*
               echo '<pre>';
               print_r($all_items_desions);
               
                 echo '<pre>';*/
               
               ?>
               
               


            </table>
        </div>
    </div>
    
    <?php 
    /*
      <!--                
                  if(isset($val)){
                  if (!empty($select_all_bydate[$val])):?>
               
                <?php $a=1;
                foreach ($select_all_bydate[$val] as $record ):?>
<a style="margin-right: 97%;background-color: #e8f1f3;"
 href="<?php echo  base_url('Directors/Directors/print_data').'/'.$_POST['valu'] ?>">
<i class="fa fa-print" aria-hidden="true"></i> طباعة</a>    
                  <?php if (!empty($decisions[$record->council_id_fk])):
                  foreach ($decisions[$record->council_id_fk] as $row):
                                                   
                                                    ?>
                                 
                                                    
                 <tr class="rr-high"></tr>                                 
                  <tr>
                    <td class="rr-title"> الموضوع <?=$a?> : <span><?php echo $row->item_title;?></span></td>

                 </tr> 
                 <tr>
                    <td class="rr-title"> القرار : <span> <?php echo $row->decision_title;?></span></td>

                   </tr>    
                    <tr class="rr-high"></tr>           
                <?php   $a++; endforeach;endif;?>
              
                        <?php
                      
                        endforeach;  ?>
                        <?php endif; ?>    
<?  }?>

-->
    */
    
    
    ?>
    
    