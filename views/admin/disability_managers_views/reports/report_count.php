<!-- update Modal1 -->

<div class="col-sm-12 col-md-12 col-xs-12" style="padding-top: 0;">
    <div class="top-line"></div><!--message of delete will be showen here-->
    <div class="panel panel-bd lobidrag" style="padding-top: 0;">
        <div class="panel-heading" style="">
            
        </div>
        <div class="panel-body">
            <?php 
            
            if(isset($paid)&&!empty($paid)){
                
               
                
                
                ?>
            
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>مسلسل</th>
                    <th>اسم العضو</th>
                    <th>رقم العضويه</th>
                     <th>رسوم العضويه</th>
                    
                    <th>تم تسديد مصاريف العضويه</th>
                    <th>لم يتم تسديد مصاريف العضويه</th>
                     <th>المتبقي</th>
                </tr>
               
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach($paid as $row){
                       
                        
                        ?>
                    
                    
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->name;?></td>
                        <td><?php echo $row->membership_num;?></td>
                        <td><?php echo $row->membership_value;?></td>
                        <?php
                        if($row->debt==0){?>
                        <td> <i class="fa fa-check" aria-hidden="true" style="font-size: 18px;"></i></td>
                        <td><i style="color: red; font-size: 18px;" class="fa fa-times " aria-hidden="true"></i> </td>
                         <td style="color: blueviolet; font-size: larger;">0</td>
                       
                            
                           <?php
                           }else{?>
                            <td><i style="color: red; font-size: 18px;" class="fa fa-times " aria-hidden="true"></i></td>

                           <td> <i class="fa fa-check" aria-hidden="true" style="font-size: 18px;"></i></td>
                       
                        <td style="color: blueviolet; font-size: larger;"><?php echo $row->debt;?></td>
                         
                           <?php
                           }
                           ?> 
                           
                                            
                 
                      
                        
                        
                    </tr>
                    <?php
                    $x++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
            }
            ?>
        </div>
        
    </div>
</div>


