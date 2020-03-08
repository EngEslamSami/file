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
                                <div class="col-xs-12 fadeInUp wow" >
                                <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                                <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $title?> </h3>
                                </div>
                                <div class="panel-body">
                                <?php if(isset($records)&&$records!=null):?>
                                <div class="col-xs-12">
                                <div class="panel-body">
                                
                                <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                <th class="text-center">م</th>
                                <th class="text-center">إسم المستفيد</th>
                                <th class="text-center">عدد الطلبات الواردة</th>
                                <th class="text-center">عدد الإجهزة المطلوبة</th>
                                <th class="text-center">عدد الإجهزة التي تم تسليمها</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php
                                $x=1;
                                foreach ($records as $record ):?>
                                <tr>
                                <td><?php echo $x++ ?></td>
                                <td><?php echo $record->p_name; ?></td>
                                <td><?php echo $record->num_of_orders; ?></td>
                                <td><?php echo $record->num_of_amount; ?></td>
                                <td><?php if($record->num_of_amount_accepted == ''){ echo 'لا يوجد أجهزة تم تسليمها ' ;}else{ echo $record->num_of_amount_accepted ;}  ?>
                                </td>
                                </tr>
                                <?php
                                endforeach;  ?>
                                <?php endif; ?>
                                </tbody>
                                </table>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>