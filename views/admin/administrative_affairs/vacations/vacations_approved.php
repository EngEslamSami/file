<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>إعتماد أجازات الموظفين</h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab0default" data-toggle="tab">الاجازات الوارده </a></li>
                            <li class=""><a href="#tab1default" data-toggle="tab">الاجازات المقبوله</a></li>
                            <li class=""><a href="#tab2default" data-toggle="tab">الاجازات المرفوضه </a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab0default">
                                <?php if(isset($vacation_recived)&& $vacation_recived!=null && !empty($vacation_recived)):?>
                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>م</th>
                                                <th class="text-center">اسم الموظف</th>
                                                <th class="text-center">الموظف القائم بالعمل</th>
                                                <th class="text-center">مدة الاجازة</th>
                                                <th  class="text-center">تاريخ البداية </th>
                                                <th  class="text-center">تاريخ النهاية</th>

                                                <th  class="text-center">إعتماد رئيس القسم</th>
                                                <th  class="text-center">الاعتماد</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                            $a=1;
                                            foreach ($vacation_recived as $record ):
                                                $date1 = new DateTime($record->from_date);
                                                $date2 = new DateTime($record->to_date);
                                                $diff = $date2->diff($date1)->format("%a");
                                                ?>
                                                <tr>
                                                 <td><?php echo $a ?></td>
                                                 <td ><?php echo $record->emp_name ?></td>
                                                 <td ><?php echo $record->emp_assigned_name?></td>
                                                 <td ><?php echo $diff; ?></td>
                                                 <td ><?php echo $record->from_date ?></td>
                                                 <td ><?php echo $record->to_date ?></td>

                                                 <?php 

                                                 if($_SESSION['role_id_fk'] == 1 && $_SESSION['head_dep_id_fk'] == 1){ ?>
                                                 <?php 
                                                 $class_app='';
                                                 if( $record->head_approved  == 1){
                                                     echo '<td> تمت الاعتماد من قبل رئيس القسم</td>'; 
                                                     $class_app='';  
                                                 }elseif($record->head_approved  == 2){
                                                     echo '<td> تمت الرفض من قبل رئيس القسم</td>'; 
                                                     $class_app='';
                                                 }else{
                                                     echo '<td>لم يتم إتخاذ القرار </td>'; 
                                                    // $class_app ='disabled="disabled"';
                                                 }

                                                 ?>
                                                 <td class="text-right"> <button type="button" <?php echo $class_app;?> style="width: 100px;"  class="btn btn-success btn-xs " data-toggle="modal" data-target="#myModala-<?php echo $record->id; ?>"> موافقة </button>
                                                     <button type="button" <?php echo $class_app;?> style="width: 100px;"  class="btn btn-danger btn-xs " data-toggle="modal" data-target="#myModalr-<?php echo $record->id; ?>"> رفض </button></td>

                                                     <?php   }elseif($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){?>

                                                     <td class="text-right"> <button type="button"   style="width: 100px;"  class="btn btn-success btn-xs " data-toggle="modal" data-target="#myModalahead-<?php echo $record->id; ?>"> موافقة </button>
                                                         <button type="button"  style="width: 100px;"  class="btn btn-danger btn-xs " data-toggle="modal" data-target="#myModalrhead-<?php echo $record->id; ?>"> رفض </button></td>

                                                         <td class="text-right"> <button type="button" disabled="disabled" style="width: 100px;"  class="btn btn-success btn-xs " data-toggle="modal" data-target="#myModala-<?php echo $record->id; ?>"> موافقة </button>
                                                             <button type="button"  style="width: 100px;" disabled="disabled"  class="btn btn-danger btn-xs " data-toggle="modal" data-target="#myModalr-<?php echo $record->id; ?>"> رفض </button></td>

                                                             <?php   }
                                                             ?>


                                                         </tr>
                                                         <?php
                                                         $a++;
                                                         endforeach;  ?>
                                                     </tbody>
                                                 </table>
                                                 <?php
                                                 $a=1;
                                                 foreach ($vacation_recived as $record ):
                                                    $date1 = new DateTime($record->from_date);
                                                    $date2 = new DateTime($record->to_date);
                                                    $diff = $date2->diff($date1)->format("%a");
                                                    ?>

                                                    <div class="modal fade" id="myModala-<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content" >
                                                                <div class="modal-header">

                                                                    <h4 class="modal-title">الإجراء</h4>
                                                                </div>
                                                                <?php echo form_open_multipart('Administrative_affairs/suspend_DoVacationsApproved/'.$record->id.'')?>
                                                                <div class="col-md-10">
                                                                   <div class="col-md-10">
                                                                    <label for="inputUser" class="col-lg-5 control-label">سبب الموافقة</label>
                                                                    <textarea name="reason" id="reason" style="margin: 0px; width: 566px; height: 93px;" required cols="30" rows="10" style="margin: 0px; width: 369px; height: 92px;"></textarea>
                                                                </div>
                                                                <div class="col-md-10">
                                                                   <input type="hidden" name="id" value="<? echo $record->id;?>" >
                                                                   <input style="    margin-right: 160px;margin-bottom: 20px;" type="submit"  name="accept" value="موافقة"  class="btn btn-success btn-xs " >
                                                               </div>
                                                           </div>
                                                           <?php echo form_close()?>
                                                           <div class="modal-footer">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="myModalahead-<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content" >
                                                        <div class="modal-header">

                                                            <h4 class="modal-title">الإجراء</h4>
                                                        </div>
                                                        <?php echo form_open_multipart('Administrative_affairs/suspend_DoVacationsApproved2/'.$record->id.'')?>
                                                        <div class="col-md-10">
                                                           <div class="col-md-10">
                                                            <label for="inputUser" class="col-lg-5 control-label">سبب الموافقة</label>
                                                            <textarea name="head_reason" id="reason" style="margin: 0px; width: 566px; height: 93px;" required cols="30" rows="10" style="margin: 0px; width: 369px; height: 92px;"></textarea>
                                                        </div>
                                                        <div class="col-md-10">
                                                           <input type="hidden" name="id" value="<? echo $record->id;?>" >
                                                           <input style="    margin-right: 160px;margin-bottom: 20px;" type="submit"  name="accept" value="موافقة"  class="btn btn-success btn-xs " >
                                                       </div>
                                                   </div>
                                                   <?php echo form_close()?>
                                                   <div class="modal-footer">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="myModalr-<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" >
                                                <div class="modal-header">

                                                    <h4 class="modal-title">الإجراء</h4>
                                                </div>
                                                <?php echo form_open_multipart('Administrative_affairs/suspend_DoVacationsApproved/'.$record->id.'')?>
                                                <div class="col-md-10">
                                                    <div class="col-md-10">
                                                        <label for="inputUser" class="col-lg-5 control-label">سبب الرفض </label>
                                                        <textarea name="reason" id="reason" style="margin: 0px; width: 566px; height: 93px;" required cols="30" rows="10" style="margin: 0px; width: 369px; height: 92px;"></textarea>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="hidden" name="id" value="<? echo $record->id;?>" >
                                                        <input style="    margin-right: 160px;margin-bottom: 20px;"type="submit"  name="refuse" value="رفض" class="btn btn-danger btn-xs " >
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    
                                                </div>
                                                <?php echo form_close()?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="myModalrhead-<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" >
                                                <div class="modal-header">

                                                    <h4 class="modal-title">الإجراء</h4>
                                                </div>
                                                <?php echo form_open_multipart('Administrative_affairs/suspend_DoVacationsApproved2/'.$record->id.'')?>
                                                <div class="col-md-10">
                                                    <div class="col-md-10">
                                                        <label for="inputUser" class="col-lg-5 control-label">سبب الرفض </label>
                                                        <textarea name="head_reason" id="reason" style="margin: 0px; width: 566px; height: 93px;" required cols="30" rows="10" style="margin: 0px; width: 369px; height: 92px;"></textarea>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="hidden" name="id" value="<? echo $record->id;?>" >
                                                        <input style="    margin-right: 160px;margin-bottom: 20px;"type="submit"  name="refuse" value="رفض" class="btn btn-danger btn-xs " >
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                 
                                                </div>
                                                <?php echo form_close()?>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $a++;
                                    endforeach;  ?>



                                <?php else: ?>
                                    <div class="alert alert-danger" > لا يوجد اجازات واردة </div>
                                <?php endif; ?>
                            </div>
                            <div class="tab-pane fade" id="tab1default">

                                <?php if(isset($vacation_accept)&& $vacation_accept!=null && !empty($vacation_accept)):?>
                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>م</th>
                                                <th class="text-center">اسم الموظف</th>
                                                <th class="text-center">الموظف القائم بالعمل</th>
                                                <th class="text-center">مدة الاجازة</th>
                                                <th  class="text-center">تاريخ البداية </th>
                                                <th  class="text-center">تاريخ النهاية</th>

                                                <th  class="text-center">إعتماد رئيس القسم</th>
                                                <th  class="text-center">إعتماد المدير العام</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                            $a=1;
                                            foreach ($vacation_accept as $record ):
                                                $date1 = new DateTime($record->from_date);
                                                $date2 = new DateTime($record->to_date);
                                                $diff = $date2->diff($date1)->format("%a");
                                                ?>
                                                <tr>
                                                    <td><?php echo $a ?></td>
                                                    <td ><?php echo $record->emp_name ?></td>
                                                    <td ><?php echo $record->emp_assigned_name?></td>
                                                    <td ><?php echo $diff; ?></td>
                                                    <td ><?php echo $record->from_date ?></td>
                                                    <td ><?php echo $record->to_date ?></td>
                                                    <?php  

                                                    if($_SESSION['role_id_fk'] == 1 && $_SESSION['head_dep_id_fk'] == 1){?>


                                                    <?php 

                                                    if( $record->head_approved  == 1){
                                                     echo '<td> تمت الاعتماد من قبل رئيس القسم</td>'; 

                                                 }elseif($record->head_approved  == 2){
                                                     echo '<td> تمت الرفض من قبل رئيس القسم</td>'; 

                                                 }else{
                                                     echo '<td>لم يتم إتخاذ القرار </td>'; 

                                                 }

                                                 ?>
                                                 <td  class="text-right"> <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/0'?>" title="استرجاع"><button type="button"  style="width: 100px;"  class="btn btn-warning btn-xs " > إسترجاع </button></a>
                                                    <button type="button"  style="width: 100px;"  class="btn btn-danger btn-xs " data-toggle="modal" data-target="#myModalr-<?php echo $record->id; ?>"> رفض </button></td>

                                                    <?php }elseif($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){ ?>

                                                    <td class="text-right"> <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved2/'.$record->id.'/0'?>" title="استرجاع"><button type="button"  style="width: 100px;"  class="btn btn-warning btn-xs " > إسترجاع </button></a>
                                                        <button type="button" style="width: 100px;"  class="btn btn-danger btn-xs " data-toggle="modal" data-target="#myModalrhead-<?php echo $record->id; ?>"> رفض </button></td>
                                                        <td class="text-right"> <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/0'?>" title="استرجاع"><button type="button" disabled="disabled" style="width: 100px;"  class="btn btn-warning btn-xs " > إسترجاع </button></a>
                                                            <button type="button" disabled="disabled" style="width: 100px;"  class="btn btn-danger btn-xs " data-toggle="modal" data-target="#myModalr-<?php echo $record->id; ?>"> رفض </button></td>

                                                            <?php }?>
                                                        </tr>
                                                        <?php
                                                        $a++;
                                                        endforeach;  ?>
                                                    </tbody>
                                                </table>

                                                <?php
                                                $a=1;
                                                foreach ($vacation_accept as $record ):
                                                    $date1 = new DateTime($record->from_date);
                                                    $date2 = new DateTime($record->to_date);
                                                    $diff = $date2->diff($date1)->format("%a");
                                                    ?>

                                                    <div class="modal fade" id="myModalr-<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content" >
                                                                <div class="modal-header">

                                                                    <h4 class="modal-title">الإجراء</h4>
                                                                </div>
                                                                <?php echo form_open_multipart('Administrative_affairs/suspend_DoVacationsApproved/'.$record->id.'')?>
                                                                <div class="col-md-10">
                                                                    <div class="col-md-10">
                                                                        <label for="inputUser" class="col-lg-5 control-label">سبب الرفض </label>
                                                                        <textarea name="reason" id="reason" style="margin: 0px; width: 566px; height: 93px;" required cols="30" rows="10" style="margin: 0px; width: 369px; height: 92px;"></textarea>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <input type="hidden" name="id" value="<? echo $record->id;?>" >
                                                                        <input style="    margin-right: 160px;margin-bottom: 20px;"type="submit"  name="refuse" value="رفض" class="btn btn-danger btn-xs " >
                                                                    </div>

                                                                
                                                                </div>

                                                <div class="modal-footer">
                                                   
                                                </div>
                                                                <?php echo form_close()?>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="myModalrhead-<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content" >
                                                                <div class="modal-header">

                                                                    <h4 class="modal-title">الإجراء</h4>
                                                                </div>
                                                                <?php echo form_open_multipart('Administrative_affairs/suspend_DoVacationsApproved2/'.$record->id.'')?>
                                                                <div class="col-md-10">
                                                                    <div class="col-md-10">
                                                                        <label for="inputUser" class="col-lg-5 control-label">سبب الرفض </label>
                                                                        <textarea name="head_reason" id="reason" style="margin: 0px; width: 566px; height: 93px;" required cols="30" rows="10" style="margin: 0px; width: 369px; height: 92px;"></textarea>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <input type="hidden" name="id" value="<? echo $record->id;?>" >
                                                                        <input style="    margin-right: 160px;margin-bottom: 20px;"type="submit"  name="refuse" value="رفض" class="btn btn-danger btn-xs " >
                                                                    </div>

                                                                
                                                                </div>

                                                <div class="modal-footer">
                                               
                                                </div>
                                                                <?php echo form_close()?>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $a++;
                                                    endforeach;  ?>


                                                <?php else: ?>
                                                    <div class="alert alert-danger" >لا يوجد اجازات مقبولة</div>
                                                <?php endif; ?>

                                            </div>
                                            <div class="tab-pane fade" id="tab2default">

                                                <?php if(isset($vacation_refuse)&& $vacation_refuse!=null && !empty($vacation_refuse)):?>
                                                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>م</th>
                                                                <th class="text-center">اسم الموظف</th>
                                                                <th class="text-center">الموظف القائم بالعمل</th>
                                                                <th class="text-center">مدة الاجازة</th>
                                                                <th  class="text-center">تاريخ البداية </th>
                                                                <th  class="text-center">تاريخ النهاية</th>
                                                                <th  class="text-center">إعتماد رئيس القسم</th>
                                                                <th  class="text-center">إعتماد المدير العام</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                                            <?php
                                                            $a=1;
                                                            foreach ($vacation_refuse as $record ):
                                                                $date1 = new DateTime($record->from_date);
                                                                $date2 = new DateTime($record->to_date);
                                                                $diff = $date2->diff($date1)->format("%a");
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $a ?></td>
                                                                    <td ><?php echo $record->emp_name ?></td>
                                                                    <td ><?php echo $record->emp_assigned_name?></td>
                                                                    <td ><?php echo $diff; ?></td>
                                                                    <td ><?php echo $record->from_date ?></td>
                                                                    <td ><?php echo $record->to_date ?></td>
                                                                    <?php  

                                                                    if($_SESSION['role_id_fk'] == 1 && $_SESSION['head_dep_id_fk'] == 1){?>
                                                                    <?php 

                                                                    if( $record->head_approved  == 1){
                                                                     echo '<td> تمت الاعتماد من قبل رئيس القسم</td>'; 

                                                                 }elseif($record->head_approved  == 2){
                                                                     echo '<td> تمت الرفض من قبل رئيس القسم</td>'; 

                                                                 }else{
                                                                     echo '<td>لم يتم إتخاذ القرار </td>'; 

                                                                 }

                                                                 ?>


                                                                 <td class="text-right">
                                                                    <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/0'?>" title="استرجاع"><button type="button"  style="width: 100px;"  class="btn btn-warning btn-xs " > إسترجاع </button></a>
                                                                    <button type="button"  style="width: 100px;"  class="btn btn-success btn-xs " data-toggle="modal" data-target="#myModala-<?php echo $record->id; ?>"> موافق </button></td>

                                                                    <?php }elseif($_SESSION['role_id_fk'] == 3 && $_SESSION['head_dep_id_fk'] == 1){ ?>
                                                                    <td class="text-right">
                                                                        <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved2/'.$record->id.'/0'?>" title="استرجاع"><button type="button"  style="width: 100px;"  class="btn btn-warning btn-xs " > إسترجاع </button></a>
                                                                        <button type="button"   style="width: 100px;"  class="btn btn-success btn-xs " data-toggle="modal" data-target="#myModalahead-<?php echo $record->id; ?>"> موافق </button></td>


                                                                        <td class="text-right">
                                                                            <a href="<?php  echo base_url().'Administrative_affairs/DoVacationsApproved/'.$record->id.'/0'?>" title="استرجاع"><button type="button" disabled="disabled" style="width: 100px;"  class="btn btn-warning btn-xs " > إسترجاع </button></a>
                                                                            <button type="button" disabled="disabled" style="width: 100px;"  class="btn btn-success btn-xs " data-toggle="modal" data-target="#myModala-<?php echo $record->id; ?>"> موافق </button></td>

                                                                            <?php } ?>
                                                                        </tr>
                                                                        <?php
                                                                        $a++;
                                                                        endforeach;  ?>
                                                                    </tbody>
                                                                </table>
                                                                <?php
                $a=1;
                foreach ($vacation_refuse as $record ):
                    $date1 = new DateTime($record->from_date);
                    $date2 = new DateTime($record->to_date);
                    $diff = $date2->diff($date1)->format("%a");
                    ?>
                    <div class="modal fade" id="myModala-<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" >
                                <div class="modal-header">

                                    <h4 class="modal-title">الإجراء</h4>
                                </div>
                                <?php echo form_open_multipart('Administrative_affairs/suspend_DoVacationsApproved/'.$record->id.'')?>
                                <div class="col-md-10">
                                    <div class="col-md-10">
                                        <label for="inputUser" class="col-lg-5 control-label">سبب الموافقة</label>
                                        <textarea name="reason" id="reason" style="margin: 0px; width: 566px; height: 93px;" required cols="30" rows="10" style="margin: 0px; width: 369px; height: 92px;"></textarea>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="hidden" name="id" value="<? echo $record->id;?>" >
                                        <input style="    margin-right: 160px;margin-bottom: 20px;" type="submit"   name="accept" value="موافق" class="btn btn-success btn-xs " >
                                    </div>
                                </div>

                                <?php echo form_close()?>
                                <div class="modal-footer">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="myModalahead-<?php echo $record->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" >
                                <div class="modal-header">

                                    <h4 class="modal-title">الإجراء</h4>
                                </div>
                                <?php echo form_open_multipart('Administrative_affairs/suspend_DoVacationsApproved2/'.$record->id.'')?>
                                <div class="col-md-10">
                                    <div class="col-md-10">
                                        <label for="inputUser" class="col-lg-5 control-label">سبب الموافقة</label>
                                        <textarea name="head_reason" id="head_reason" style="margin: 0px; width: 566px; height: 93px;" required cols="30" rows="10" style="margin: 0px; width: 369px; height: 92px;"></textarea>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="hidden" name="id" value="<? echo $record->id;?>" >
                                        <input style="    margin-right: 160px;margin-bottom: 20px;" type="submit"   name="accept" value="موافق" class="btn btn-success btn-xs " >
                                    </div>
                                </div>

                                <?php echo form_close()?>
                                <div class="modal-footer">
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $a++;
                    endforeach;  ?>

                <?php else: ?>
                    <div class="alert alert-danger" > لا يوجد اجازات مرفوضة </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>