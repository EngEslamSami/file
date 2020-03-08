<div class="col-xs-12" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php //echo $title?> </h3>
            </div>
            <div class="panel-body">

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#order" aria-controls="order" role="tab" data-toggle="tab">طلبات  الوادة</a></li>
            <li role="presentation"><a href="#accept" aria-controls="accept" role="tab" data-toggle="tab">طلبات  الموافق عليها</a></li>
            <li role="presentation"><a href="#refuse" aria-controls="refuse" role="tab" data-toggle="tab">طلبات  المرفوضة</a></li>
        </ul>

        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="order">
                <?php if(isset($all_records) && $all_records!=null){?>

        <!-------------------------------------------------------------------------------------------------------------------------->
        <div class="panel-body">
            <a href="<?php echo base_url()?>finance_resource/donors/"><div class="r-add pull-right">
<!--                    <img src="<?php /*echo base_url()*/?>asisst/admin_asset/img/add-file.png" alt="" title=" اضافة فئة " class="button">
-->                </div>
            </a>

            <div class="fade in active" id="optionearead">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" >
                    <thead>
                     <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم المتعفف</th>
                                        <th class="text-center">التليفون</th>
                                        <th class="text-center">الحالة</th>
                                        <th class="text-center">العنوان</th>
                                        <th class="text-center">التحكم</th>
                                        <th class="text-center">الإعتماد</th>
                                       
                                    </tr>
                    </thead>
                    <tbody class="text-center">

                    <?php
                    $x=1;
                    foreach ($all_records as $record):
                         echo '<tr>
                                            <td>'.($x++).'</td>
                                            <td>'.$record->name.'</td>
                                            <td>'.$record->tele.'</td>
                                            <td>'.$record->status.'</td>
                                            <td>
                                               '.$record->address.'
                                            </td>
                                            <td>
                                            <a href="'.base_url().'all_Finance_resource/Program_setting/add_abstinent/'.$record->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="'.base_url().'all_Finance_resource/Program_setting/delete_abstinent/'.$record->id.'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                            </td> ';
                                            if($record->approved == 0){
                                                $approved_type ='لم يتم اتخاذ القرار بعد';
                                            }elseif($record->approved == 1){
                                              
                                               $approved_type ='تم القبول';
                                            }elseif($record->approved == 2){
                                                 
                                                 $approved_type ='تم الرفض';
                                            }
                                            echo'
                                            
                                            <td>'.$approved_type.'
                                            </td>
                                          </tr>';
                                          
                                    
                                
                                ?>  
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>

        </div>
                <?php }else{
                    echo '   <div class="alert alert-danger col-lg-12 col-md-12 col-sm-12">
  <strong>عذرا!</strong> لا يوجد نتائج للعرض 
</div>';
                    
                }?>

            </div>
            <div role="tabpanel" class="tab-pane" id="accept">
                <?php if(isset($approve) && $approve!=null){ ?>

                <div class="panel-body">
                    <a href="<?php echo base_url()?>finance_resource/donors/"><div class="r-add pull-right">
<!--                            <img src="<?php /*echo base_url()*/?>asisst/admin_asset/img/add-file.png" alt="" title=" اضافة فئة " class="button">
-->                        </div>
                    </a>

                    <div class="fade in active" id="optionearead">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                           <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم المتعفف</th>
                                        <th class="text-center">التليفون</th>
                                        <th class="text-center">الحالة</th>
                                        <th class="text-center">العنوان</th>
                                        <th class="text-center">التحكم</th>
                                        <th class="text-center">الإعتماد</th>
                                       
                                    </tr>
                            </thead>
                            <tbody class="text-center">

                            <?php
                            $x=1;
                            foreach ($approve as $record):
                               echo '<tr>
                                            <td>'.($x++).'</td>
                                            <td>'.$record->name.'</td>
                                            <td>'.$record->tele.'</td>
                                            <td>'.$record->status.'</td>
                                            <td>
                                               '.$record->address.'
                                            </td>
                                            <td>
                                            <a href="'.base_url().'all_Finance_resource/Program_setting/add_abstinent/'.$record->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="'.base_url().'all_Finance_resource/Program_setting/delete_abstinent/'.$record->id.'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                            </td> ';
                                            if($record->approved == 0){
                                                $approved_type ='لم يتم اتخاذ القرار بعد';
                                            }elseif($record->approved == 1){
                                              
                                               $approved_type ='تم القبول';
                                            }elseif($record->approved == 2){
                                                 
                                                 $approved_type ='تم الرفض';
                                            }
                                            echo'
                                            
                                            <td>'.$approved_type.'
                                            </td>
                                          </tr>';
                                          ?>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <?php }else{
                    echo '   <div class="alert alert-danger col-lg-12 col-md-12 col-sm-12">
  <strong>عذرا!</strong> لا يوجد نتائج للعرض 
</div>';
                    
                }?>


</div>

            <div role="tabpanel" class="tab-pane" id="refuse">
                <?php if(isset($refuse) && $refuse!=null){ ?>

                <div class="panel-body">
                    <a href="<?php echo base_url()?>finance_resource/donors/"><div class="r-add pull-right">
                            <!--<img src="<?php /*echo base_url()*/?>asisst/admin_asset/img/add-file.png" alt="" title=" اضافة فئة " class="button">-->
                        </div>
                    </a>

                    <div class="fade in active" id="optionearead">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                          <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم المتعفف</th>
                                        <th class="text-center">التليفون</th>
                                        <th class="text-center">الحالة</th>
                                        <th class="text-center">العنوان</th>
                                        <th class="text-center">التحكم</th>
                                        <th class="text-center">الإعتماد</th>
                                       
                                    </tr>
                            </thead>
                            <tbody class="text-center">

                            <?php
                            $x=1;
                            foreach ($refuse as $record):
                                echo '<tr>
                                            <td>'.($x++).'</td>
                                            <td>'.$record->name.'</td>
                                            <td>'.$record->tele.'</td>
                                            <td>'.$record->status.'</td>
                                            <td>
                                               '.$record->address.'
                                            </td>
                                            <td>
                                            <a href="'.base_url().'all_Finance_resource/Program_setting/add_abstinent/'.$record->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="'.base_url().'all_Finance_resource/Program_setting/delete_abstinent/'.$record->id.'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                            </td> ';
                                            if($record->approved == 0){
                                                $approved_type ='لم يتم اتخاذ القرار بعد';
                                            }elseif($record->approved == 1){
                                              
                                               $approved_type ='تم القبول';
                                            }elseif($record->approved == 2){
                                                 
                                                 $approved_type ='تم الرفض';
                                            }
                                            echo'
                                            
                                            <td>'.$approved_type.'
                                            </td>
                                          </tr>';
                                          ?>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <?php }else{
                    echo '   <div class="alert alert-danger col-lg-12 col-md-12 col-sm-12">
  <strong>عذرا!</strong> لا يوجد نتائج للعرض 
</div>';
                    
                }?>


            </div>

            </div>
</div>



    </div>