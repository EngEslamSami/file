<?php
                      //  echo '<pre>'; print_r($reasons_settings);
                        
                        if (!empty($record)) { ?>
                            <table id="example822" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                               
                               <th class="text-center">م </th>
                               <th class="text-center">تاريخ المهمه</th>
                               <th class="text-center">  اسم المهمه</th>
                               <th class="text-center">محول من</th>
                               <th class="text-center">محول الي</th>
                               <th class="text-center"> الالوليه</th>
                               <th class="text-center">تاريخ الاستحقاق</th>
                               <th class="text-center">الحاله</th>
                               <th class="text-center">الإجراء</th>
                           </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                foreach ($record as $value) {
                                    if ($_SESSION['role_id_fk'] == 1 || $value->from_user_id==$_SESSION['emp_code']) {
                                        if($value->suspend==0){
                                    ?>
                                   <tr>
                                      
                                         
                                      <td><?= $value->id ?></td>
                                      <td><?= $value->date_ar ?></td>
                                          <td><?= $value->mohma_name ?></td>
                                          <td><?= $value->from_user_name ?></td>
                                          <td><?= $value->to_user_name ?></td>
                                          <td><?php if($value->awlawya ==1)
                                          {
                                              echo 'هام';
  
                                          }elseif($value->awlawya ==2)
                                          {
                                              echo 'عادي';
  
                                          }elseif($value->awlawya ==0)
                                          {
                                              echo 'هام جدا';
  
                                          }
                                          
                                          ?></td>
                                          <td><?= $value->esthkak_date ?></td>
                                          <td><?php if($value->status==1)
                                          {
                                              echo 'قيد التنفيذ';
                                          }
                                          elseif($value->status==2){
                                              echo 'تم التنفيذ';
  
                                          }
                                          
                                          
                                          
                                          ?>
                                          
                                          </td>
                                        
                                          <td>
                                            
                                            <a href="#" onclick="delete_travel_type(<?= $value->id ?>);"> <i class="fa fa-trash"> </i></a>
  
                                          <a href="#" onclick="update_travel_type(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
  
                                        
                                        <a data-toggle="modal" data-target="#myModal-view_photo-<?= $value->id ?>">
                                    <i class="fa fa-cogs" title=" قراءة"></i> </a>
                                <!-- modal view -->
                                <div class="modal fade" id="myModal-view_photo-<?= $value->id ?>" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">حاله المهمه</h4>
                                            </div>
                                            <div class="modal-body">
                                           
                                           
                                            <form action="<?php echo base_url() . 'all_secretary/archive/mohma/Add_mohma/update_halat_mohma/' . $value->id; ?>"
                          method="post" id="form1">
                            <table id="exampleeee8" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <th width="2%">#</th>
                                    <th class="text-center">   انهاء المعامله</th>
                                    <th class="text-center">  النسبه</th>
                              
                     
                                </tr>
                                </thead>
                                <tbody>
                               
                                    <tr>
                                        <td><input type="radio" name="radio_end" data-title="<?= $value->id ?>"
                                                   id="radio_end1"  onclick="get_abel()" value="1"
                                                  >
                                                 
                                                  
                                                   
                                        </td>
                                        <td>تم الانتهاء بنسبه</td>
                                        <td>
                                        <input type="text" id="percentage1" name="percentage" value="" disabled />%
                                         </td>
                                        
                           
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="radio_end" data-title="<?= $value->id ?>"
                                                   id="radio_end2" onclick="get_abel2()" value="2"
                                                  >
                                                  
                                                   
                                        </td>
                                        <td>لم يتم الانتهاء بنسبه</td>
                                        <td>
                                        <input type="text" id="percentage2" name="percentage" value="" disabled /> %
                                         </td>
                                         
                           
                                    </tr>
                                  
                                  
                                </tbody>
                            </table>


                       
                        </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
            <button type="submit"
                                class="btn btn-labeled btn-success "  
                               >
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                        </form>
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>





















                                           
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                        
                               

                                          
  
  
                                          </td>
                                      </tr>
                                   
                                    <?php
                                }}}
                                ?>
                                </tbody>
                            </table>


                        <?php }  ?>
                        <script>




    $('#example822').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    } );



</script>

