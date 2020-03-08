                                <style>
                                .inner-heading {
                                    background-color: #9ed6f3;
                                    padding: 10px;
                                }
                                .pop-text{
                                    background-color: #428bca;
                                    color: #fff;
                                    padding: 7px;
                                    font-size: 14px;
                                    margin-bottom: 3px;
                                    margin-top: 3px;
                                }
                                .pop-text1{
                                    background-color:#eee;
                                     padding: 7px;
                                      font-size: 14px;
                                      margin-bottom: 3px;
                                       margin-top: 3px;
                                }
                                .pop-title-text{
                                    margin-top: 4px;
                                    margin-bottom: 4px;
                                    padding: 6px;
                                    background-color: #9ed6f3;
                                }
                                </style>
                                
                                <script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
     var printContents = document.getElementById('mydiv').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
    }

</script>
                                <?php if(isset($records)&&$records!=null):?>
                              <div class="col-xs-12" id="mydiv" >  
               <button class="btn btn-xs-avatar-title hidden-print" style="margin-right: 90%;" onclick="PrintElem('#mydiv')" >
               <i class="fa fa-print" aria-hidden="true"></i> طباعة</button> 
                                <div class="col-xs-12">
                                
                                <div class="panel-body">
                                
                                <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                <th class="text-center">م</th>
                                <th class="text-center">إسم المستفيد</th>
                                <th class="text-center">عدد الإجهزة المطلوبة</th>
                                <th class="text-center">عدد الإجهزة التي تم تسليمها</th>
                                <th class="text-center">تسليم جزئي</th>
                                <th class="text-center">تلسيم كلي</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php
                                $x=1;
                                $result =0;
                                foreach ($records as $record ):?>
                                <tr>
                                <td><?php echo $x++ ?></td>
                                <td><?php echo $record->person_name; ?></td>
                                <td><?php echo $record->num_of_amount; ?></td>
                                <td><?php if($record->num_of_amount_accepted == ''){ echo 'لا يوجد أجهزة تم تسليمها ' ;}else{ echo $record->num_of_amount_accepted ;}  ?>
                                <?php 
                                if($record->num_of_amount_accepted == ''){
                                     $result = -1;
                                }else{
                                     $result = ($record->num_of_amount - $record->num_of_amount_accepted);   
                                }
                                 ?>
                                 <?php 
                                 if($result ==  -1){
                                   $partial= '<i class="fa fa-times" aria-hidden="true"></i>'; 
                                   $General= '<i class="fa fa-times" aria-hidden="true"></i>';  
                                 }else{
                                 if($result == 0){
                                   $partial= '<i class="fa fa-times" aria-hidden="true"></i>'; 
                                   $General= '<i class="fa fa-check" aria-hidden="true"></i>';  
                                    
                                 }else{
                                   $partial= '<i class="fa fa-check" aria-hidden="true"></i>'; 
                                   $General= '<i class="fa fa-times" aria-hidden="true"></i>';     
                                 }   
                                 }
                                  ?>
                                <td><?php echo  $partial; ?></td>
                                <td><?php echo  $General; ?></td>
                                </tr>
                                <?php
                                endforeach;  ?>
                                <?php else: ?>
                                <div class="alert alert-danger"> 
                                <h6> عفوا لا يوجد بيانات </h6>
                                </div>
                                <?php endif; ?>
                                </tbody>
                                </table>
                                </div>
                                </div>
                                </div>
                                </div>