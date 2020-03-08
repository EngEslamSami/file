
            <?php 
            
            if(isset($all_wared_end)&&!empty($all_wared_end)){?>
               <table  class="table example table-striped table-bordered">
            <!-- <table  class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%"> -->
                <thead>
                <tr class="info">
                    <th>م</th>
                    <th>   رقم الوارد</th>
              
                    <th> تاريخ الاستلام</th>
                    <th>جهه الاختصاص</th> 
                     <th>الجهه المرسله</th> 
                     <th>  عنوان الموضوع</th>
                     <th> طريقه الاستلام</th>
                     <th> الاولويه</th>
                 
                    <th>الاجراء</th>
                   
                </tr>
               
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach($all_wared_end as $row){?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->rkm;?></td>
                        <td><?php echo $row->estlam_date;?></td>
                      <td><?php echo $row->geha_ekhtsas_name;?></td> 
                      <td><?php echo $row->geha_morsla_name;?></td> 
                      <td><?php echo $row->title;?></td>
                      <td><?php echo $row->tarekt_estlam_name;?></td>
                      
                    
                       <td><?php 
                       if($row->awlawya==1){echo 'هام';}elseif($row->awlawya==2){echo ' عادي  ';}elseif($row->awlawya==0){echo 'هام جدا  ';}  ?>
                    
                    
                    </td>
                        <td>
                        <button 
                                data-toggle="modal" data-target="#myModal_print"   
                                
                                onclick="get_print('<?php echo  $row->title?>','<?php echo  $row->date_ar?>' ,'<?php echo  $row->rkm?>');" 
                                class="btn btn-success">طباعه الباركود</button>




                        <div class="btn-group">
                  <button type="button" class="btn btn-warning">إجراءات</button>
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a  href="<?php echo base_url();?>/all_secretary/archive/wared/Add_wared/compelete_details/<?php echo $row->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i> اطلاع علي البيانات</a></li>
                   
                  </ul>
                </div> 
                <div id="span_reason">  
                </div>    
  
                        </td>
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