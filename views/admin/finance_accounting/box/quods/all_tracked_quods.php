




<div class="col-sm-12 col-md-12 col-xs-12  " style="padding: 0;">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>شاشة القيود</h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-12 col-xs-12">
                <div class="tab-content">
                  
                        <div class="panel-body">
                            <?php

if(isset($tracked_quods) and $tracked_quods != null){ 
    ?>
    <table id="example" class="table table-bordered" role="table">
        <thead>
            <tr class="info">
                <th>م</th>
                <th class="text-left">رقم القيد</th>
                <th class="text-left">تاريخ القيد</th>
                 <th class="text-left">قيمة القيد</th>
                <th class="text-left">نوع القيد </th>
                <th class="text-left">حالة القيد</th>
               <th class="text-left">الإجراء المتخذ</th> 
                <th class="text-left">وقت الإجراء</th>
                <th class="text-left">القائم بالإجراء</th>
                
          
            </tr>
        </thead>
        <tbody>
            <?php

          
                $x = 1;
                foreach ($tracked_quods as $One_qued) {
                    ?>
                    <tr>
                        <td><?=$x++?></td>
                        <td><?=$One_qued->rkm?></td>
                        <td><?=$One_qued->qued_date_ar?></td>
                        <td><?=$One_qued->total_value?></td>
                        <td><?=$One_qued->no3_qued_name?></td>
                        <td><?=$One_qued->halet_qued_name?></td>
                        <td style="color:white; background-color:<?php echo $One_qued->action_color;  ?>;"><?=$One_qued->action_name?></td>       
                        <td style="background-color: #b9b9b9; font-size: 13px;"><?=$One_qued->date_time?></td>
                        <td>
                        <span style="font-size: 13px; color: white !important; font-weight: normal;" class="badge badge-add">
                          <i style="color: white;" class="fa fa-cog fa-spin"></i>
                           <?=$One_qued->publisher_do_action?></span>
                        
                        
                        </td>
                        
                        
                    </tr>
                    <?php
                }
          
            ?>
        </tbody>
    </table>                           
                                
                                
                            <?php  }  else { ?>
                                <div style="color: red; font-size: large;" class="col-sm-12">لم يتم  إضافة قيود غير مرحلة !!</div>

                            <?php  } 
                            ?>


                        </div>
                    
                 
                 
       
                </div>

            </div>
        </div>
    </div>
</div>

