 <div class="col-md-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>أجازات الموظفين</h4>
                </div>
            </div>
            
            <div class="panel-body">
                <!------------------------------------------------------------------------------>
                <?php if(isset($result)):?>
                    <div class="details-resorce">
                        <div class="col-xs-12 r-inner-details">
                            <?php  echo form_open_multipart('Administrative_affairs/update_vacation/'.$result['id'])?>
                            <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> تاريخ اليوم </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <div class="docs-datepicker">
                                            <div class="input-group">
                                                <input type="text" id="day_date" name="day_date" placeholder="تاريخ اليوم" value="<?php  if(!empty($result['day_date'])){echo $result['day_date'];}?>"  class="form-control date_melady" data-validation="required" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php   if($_SESSION['role_id_fk'] ==1){?>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> الإدارة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="main_dep_f_id" id="main_dep_f_id"   disabled>
                                            <option value="">إختر</option>
                                            <?php if(!empty($admin)):
                                            foreach ($admin as $record):
                                                $select ='';
                                                if(!empty($employ_name[$result['emp_id']])){
                                                    if($employ_name[$result['emp_id']][0]->administration ==  $record->id ){
                                                        $select ='selected';
                                                    }
                                                }
                                                ?>
                                                <option value="<? echo $record->id;?>" <?echo $select ;?>><? echo $record->name;?></option>
                                            <?php  endforeach; endif;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 " >
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> الموظف </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="emp_id" id="emp_id" disabled  >
                                            <option value="">إختر</option>
                                            <?php if(!empty($all_empolyees[$employ_name[$result['emp_id']][0]->administration])):
                                            foreach ($all_empolyees[$employ_name[$result['emp_id']][0]->administration] as $records):
                                                $select ='';
                                                if($result['emp_id'] ==  $records->id ){
                                                    $select ='selected';
                                                }
                                                ?>
                                                <option value="<? echo $records->id;?>" <? echo $select;?>><? echo $records->employee;?></option>
                                            <?php  endforeach; endif;?>
                                        </select>
                                    </div>
                                </div>
                                <?php }elseif($_SESSION['role_id_fk'] ==3){ ?>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> الموظف </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <?php if($_SESSION['head_dep_id_fk'] ==1):?>
                                            <select name="emp_id" id="emp_id" disabled  class="selectpicker form-control" data-show-subtext="true" data-live-search="true" style="width:100%;" onchange="return back($('#emp_id').val() );">
                                                <option value="">إختر</option>
                                                <?php if($emp_name): foreach ($emp_name as $record): if($result['emp_id'] ==$record->id  ){$select='selected';}else{$select='';} ?>
                                                    <option value="<?php echo $record->id;?>"   <?php echo $select;?> ><?php echo $record->employee;?></option>
                                                <?php endforeach; endif;?>
                                            </select>
                                        <?php elseif($_SESSION['head_dep_id_fk'] ==2):?>
                                            <input type="text" class="r-inner-h4" name="emp_id" value="<?if(!empty($select[$result['emp_id']][0]->employee)): echo  $select[$result['emp_id']][0]->employee ; endif;?>"  readonly>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <?php }?>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ بداية الأجازة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                                <input type="text" class="form-control date_melady"  id="from_date" name="from_date" placeholder="شهر / يوم / سنة " value="<? echo $result['from_date'];?>"  onchange="getVacationEnd(this.value)">
                                    </div>
                                </div>

                            </div>
                                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                  <!--  <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> تاريخ الأجازة </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <div class="docs-datepicker">
                                                <div class="input-group">
                                                    <input type="text" id="vacation_date" name="vacation_date" placeholder="تاريخ الأجازة"  value="<?php  if(!empty($result['vacation_date'])){echo $result['vacation_date'];}?>"  class="form-control date_melady" data-validation="required" >
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    -->
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> نوع الأجازة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="vacation_id"  id="vacation_id" class="form-control" data-validation="required"  onchange="getVacationEnd($('#from_date').val()); getAvailableDays();" >
                                            <option value="">--إختر--</option>
                                            <?php
                                            if(isset($holidays) && $holidays != null)
                                            foreach ($holidays as $value) {
                                                $select='';
                                                if($value->id ==$result['vacation_id']){
                                                    $select='selected';
                                                }
                                                ?>
                                                <option value="<? echo $value->id; ?>" <? echo $select;?>><? echo $value->title; ?></option>
                                            <? } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  الموظف القائم بالعمل </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="emp_assigned_id" data-validation="required" id="emp_assigned_id" class="form-control"   >
                                            <option value="">إختر </option>
                                            <?php
                                            if(!empty($all_empolyees[$employ_name[$result['emp_id']][0]->administration])):
                                                foreach($all_empolyees[$employ_name[$result['emp_id']][0]->administration] as $record):
                                                    $select ='';
                                                    if($record->id == $result['emp_id']){
                                                        continue;
                                                    }
                                                    if($record->id == $result['emp_assigned_id']){
                                                        $select ='selected';
                                                    }
                                                    ?>
                                                    <option value="<? echo $record->id;?>" <? echo $select;?>><? echo $record->employee;?></option>
                                                <? endforeach; endif;?>
                                            </select>
                                        </div>
                                    </div>
                                    
                               <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 "> عدد أيام الاجازة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">

                                      <input type="number" class="form-control "   id="vacations_days" name="vacations_days"  placeholder="أدخل البيانات " value="<? echo $result['vacations_days'];?>" onkeyup="getAvailableDays()" >

                                    </div>
                                </div>
                                    
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 "> تاريخ نهاية الأجازة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">

                                      <input type="text" class="form-control date_melady"   id="to_date" name="to_date" placeholder="شهر / يوم / سنة " value="<? echo $result['to_date'];?>" readonly>

                                    </div>
                                </div>
                                    <!--<div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">تفاصيل الأجازة  </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <textarea class="r-textarea"  name="vacation_detail"><? echo $result['vacation_detail'];?></textarea>
                                        </div>
                                    </div>-->
                                </div>
               <!------------------------------------------------------------------------------>
                 <div class="col-md-12" id="option_data_vacation">
                     <?php if(isset($data_vacation ) && $data_vacation!=null && !empty($data_vacation)):?>
    <table id="" class="display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>نوع الاجازة</th>
            <th>رصيد سابق</th>
            <th>رصيد حالى </th>
            <th>الرصيد المستنفذ</th>
            <th>الاجمالى</th>
           
        </tr>
        </thead>
        <tbody>
        <?php $x = 0; foreach($data_vacation as $row):?>
            <tr>
                <td ><?php echo $row->title?> </td>
                <td > <?php echo $row->past_num?> </td>
                <td > <?php echo $row->current_num?> </td>
                <td > <?php echo $row->take_vacation?> </td>
                <td > <?php echo $row->past_num + $row->current_num - $row->take_vacation ?> </td>

            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
<?php endif;?>
                 </div>
                <!------------------------------------------------------------------------------>
                                
                        <div class="form-group col-sm-12 col-xs-12">
                            <button type="submit" name="update"  id="button" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                        </div>
                        <?php echo form_close()?>
                    </div>
                </div>
                <?php else: ?>
                <!------------------------------------------------------------------------------>
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <?php echo form_open_multipart('Administrative_affairs/add_vacation')?>
                        <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> تاريخ اليوم </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" id="" name="day_date" placeholder="تاريخ اليوم"
                                              value="<?php echo date('Y-m-d');?>"  class="form-control date_melady" readonly >

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if($_SESSION['role_id_fk'] ==1){?>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الإدارة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="main_dep_f_id" id="main_dep_f_id" onchange="return sub($('#main_dep_f_id').val());" data-validation="required">
                                        <option value="">إختر</option>
                                        <?php if(!empty($admin)):
                                        foreach ($admin as $record):?>
                                        <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
                                        <?php  endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12" id="optionearea5">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الموظف </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                        <select name="emp_id" id="emp_id"  class="selectpicker form-control" data-show-subtext="true" data-live-search="true"  disabled data-validation="required">
                                            <option value="">إختر</option>
                                        </select>
                                </div>
                            </div>
                            <?php }elseif($_SESSION['role_id_fk'] ==3){ ?>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الموظف </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <?php if($_SESSION['head_dep_id_fk'] ==1):?>
                                        <select name="emp_id" id="emp_id"   class="selectpicker form-control" data-show-subtext="true" data-live-search="true" style="width:100%;" onchange="back($('#emp_id').val() ); data_vacation($(this).val());" data-validation="required">
                                            <option value="">إختر</option>
                                            <?php if($emp_name): foreach ($emp_name as $record): ?>
                                                <option value="<?php echo $record->id;?>" ><?php echo $record->employee;?></option>
                                            <?php endforeach; endif;?>
                                        </select>
                                    <?php elseif($_SESSION['head_dep_id_fk'] ==2):?>
                                        <input type="text" class="r-inner-h4" name="emp_id_" value="<?if(!empty($select[$_SESSION['emp_code']][0]->employee)): echo  $select[$_SESSION['emp_code']][0]->employee ; endif;?>"  readonly>
                                        <input type="hidden" name="emp_id" value="  <?php echo $_SESSION['emp_code']; ?>" />
                                    <?php endif;?>
                                </div>
                            </div>
                            <? }?>
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 "> تاريخ بداية الأجازة </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                            <input type="date" data-validation="required" class="form-control  " name="from_date" id="from_date" placeholder="شهر / يوم / سنة " onchange="getVacationEnd(this.value)">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                           <!-- <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> تاريخ الأجازة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" id="vacation_date" name="vacation_date" placeholder="تاريخ الأجازة"  class="form-control date_melady" data-validation="required" >
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> نوع الأجازة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="vacation_id" id="vacation_id" class="form-control" data-validation="required"  onchange="getVacationEnd($('#from_date').val());getAvailableDays();">
                                        <option value="">--إختر--</option>
                                        <?php 
                                        if(isset($holidays) && $holidays != null){
                                            foreach ($holidays as $value) {
                                                ?>
                                                <option value="<?=$value->id?>"><?=$value->title?></option>
                                                <? 
                                            }
                                        } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 " id="optionearea55">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  الموظف القائم بالعمل </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <select name="emp_assigned_id" data-validation="required"  class="form-control" disabled>
                                            <option value="">إختر </option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            
                                  <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 "> عدد أيام الاجازة </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">

                                      <input type="number" class="form-control "   id="vacations_days" name="vacations_days" placeholder="أدخل البيانات " onkeyup="getAvailableDays()" />

                                    </div>
                                </div>
                            
                            
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  تاريخ نهاية الأجازة </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                  
                                            <input type="text" class="form-control date_melady" data-validation="required" name="to_date" id="to_date" placeholder="شهر / يوم / سنة " readonly>
                                     
                                </div>
                            </div>
                            
                            <?php if($_SESSION['role_id_fk'] ==3){?>
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4 ">  الموظف القائم بالعمل </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="emp_assigned_id" data-validation="required" id="emp_assigned_id" class="form-control">
                                        <option value="">إختر </option>
                                        <option value="2">إختر3 </option>
                                        <?php foreach($all_employees as $record): ?>
                                            <option value="<? echo $record->id;?>"><? echo $record->employee;?></option>
                                        <? endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <?php } ?>
                            <!--<div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">تفاصيل الأجازة  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <textarea class="r-textarea" name="vacation_detail"   data-validation="required" ></textarea>
                                </div>
                            </div>
                            -->
                        </div>
               <!------------------------------------------------------------------------------>
                 <div class="col-md-12" id="option_data_vacation">
                  <?php if($_SESSION['head_dep_id_fk'] ==2):?>
                  <?php if(isset($data_vacation ) && $data_vacation!=null && !empty($data_vacation)):?>
    <table id="" class="display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>نوع الاجازة</th>
            <th>رصيد سابق</th>
            <th>رصيد حالى </th>
            <th>الرصيد المستنفذ</th>
            <th>الاجمالى</th>
           
        </tr>
        </thead>
        <tbody>
        <?php $x = 0; foreach($data_vacation as $row):?>
            <tr>
                <td ><?php echo $row->title?> </td>
                <td > <?php echo $row->past_num?> </td>
                <td > <?php echo $row->current_num?> </td>
                <td > <?php echo $row->take_vacation?> </td>
                <td > <?php echo $row->past_num + $row->current_num - $row->take_vacation ?> </td>

            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
<?php endif;?>
                  <?php endif;?>
                 </div>
                <!------------------------------------------------------------------------------>
                        <div class="form-group col-sm-12 col-xs-12">
                            <button type="submit" name="add" value="حفظ"  id="button" class="btn btn-purple w-md m-b-5" onclick="return myFunction()"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                        </div>
                        <?php echo form_close()?>
                    </div>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>



<?php if(isset($records_table)&& !empty($records_table) &&  $records_table!=null):?>
<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>أجازات الموظفين</h4>
                </div>
            </div>
            <div class="panel-body">
            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>م</th>
                            <th class="text-center">اسم الموظف</th>
                            <th class="text-center">الموظف القائم بالعمل</th>
                            <th class="text-center">مدة الاجازة</th>
                            <th  class="text-center">حاله الأجازة</th>
                            <th  class="text-center">الإجراء</th>
                            <th  class="text-center">التفاصيل</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php if(isset($records_table)&&$records_table!=null):?>
                            <?php
                            $a=1;
                            foreach ($records_table as $record ):

                                $date1 = new DateTime($record->from_date);
                                $date2 = new DateTime($record->to_date);
                                $diff = $date2->diff($date1)->format("%a");

                                if($record->suspend == 1)
                                {
                                    $class = 'success';
                                    $title = 'نشط';
                                }
                                else
                                {
                                    $class = 'danger';
                                    $title = 'غير نشط';
                                }
                                $query_dif =$this->db->query('SELECT * FROM `vacations` WHERE `emp_id`='.$record->emp_id.' And `deleted`=1  and approved = 1 and year = '.$year.'  ');
                                $arr_dif=array();
                                foreach ($query_dif->result() as  $row2_dif) {
                                    $arr_dif[] = $row2_dif;
                                }

                                $diff = 0;
                              foreach ($arr_dif as $row_1):
                                    $date_f = new DateTime($row_1->from_date);
                                    $date_t = new DateTime($row_1->to_date);

                                    $diff += $date_t->diff($date_f)->format("%a");
                                endforeach;
                                ?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <td ><?   if(!empty($record->emp_id)) :echo $employ_name[$record->emp_id][0]->employee; endif;?></td>
                                    <td ><? if(!empty($record->emp_assigned_id)) : echo $employ_name[$record->emp_assigned_id][0]->employee; endif; ?></td>
                                    <td ><? echo $diff; ?></td>
                                    <td>
                                        <a href="<?php echo base_url().'Administrative_affairs/suspend_vacation/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-8"><?php echo $title ?> </a>
                                    </td>
                                    <td> 
                                        <a href="<?php echo base_url('Administrative_affairs/update_vacation').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                        <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/delete_vacation/".$record->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                    </td>
                                    <td> <button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button>
                                        <?php
                                        $query2 =$this->db->query('SELECT vacations.*,employees.employee,vacations_settings.title FROM `vacations` LEFT JOIN `employees` on (`employees`.`id`=`vacations`.`emp_assigned_id`)
                                            LEFT JOIN `vacations_settings` ON (`vacations`.`vacation_id`=`vacations_settings`.`id`)
                                         WHERE `vacations`.`emp_id`='.$record->emp_id.' And `vacations`.`deleted`=1  and `vacations`.`approved` = 1 and `vacations`.`year` = '.$year.'  ');
                                        $arr=array();
                                        foreach ($query2->result() as  $row2) {
                                            $arr[] = $row2;
                                        }
                                        ?>
                                        <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content" >
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">تفاصيل أجازات الموظف </h4>
                                                    </div>
                                                    <div class="row" style="margin-right:10px">
                                                        <div class="col-sm-3">
                                                            <h5> إسم الموظف:</h5>
                                                        </div>
                                                        <div class="col-sm-9 text-left">
                                                            <h5><?   if(!empty($record->emp_id)) :echo $employ_name[$record->emp_id][0]->employee; endif;?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body">
                                                        <? if (!empty($arr)) :?>
                                                        <table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
                                                <thead>
                                                    <tr>
                                                        <th width="5%" class="text-right">م</th>
                                                        <th  class="text-right">القائم بالعمل</th>
                                                        <th  class="text-right">المدة</th>
                                                        <th  class="text-right">نوع الأجازة</th>
                                                        <th  class="text-right">تاريخ النهاية</th>
                                                        <th class="text-right">اريخ البداية</th>
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                        <tr>
                                                            <?
                                                            $count=0;
                                                            $sum=0;
                                                            foreach ($arr as $row):
                                                                $count++;
                                                                $date1 = new DateTime($row->from_date);
                                                                $date2 = new DateTime($row->to_date);
                                                                $diff += $date2->diff($date1)->format("%a");
                                                                ?>
                                                                <td><? echo $count;?></td>
                                                                <td><? echo $row->employee;?></td>
                                                                <td><? echo $diff;?></td>
                                                                <td><? echo $row->title;?></td>
                                                                <td><? echo $row->to_date;?></td>
                                                                <td><? echo $row->from_date;?></td>
                                                            </tr>
                                                        <? endforeach;?>

                                                    </tbody>
                                            </table>
                                                    <? else:
                                                    echo'<div class="alert alert-info">لم يتم الموافقة على الأجازة من قبل المدير العام</div>';
                                                    endif;?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $a++;
                                endforeach;  ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  endif; ?>
<div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                </div>
                <div class="modal-body">
                    <p id="text">هل أنت متأكد من الحذف؟</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                    <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove" >نعم</button></a>
                </div>
            </div>
        </div>
    </div>
<!------------------------------------------------>
<script>
    function back(valuesx)
    {
        if(valuesx)
        {
            var depart = <?php echo $_SESSION['administration_id']?>;
            var dataString = 'valuesx=' + valuesx + '&depart='+ depart ;
            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/Administrative_affairs/add_vacation',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea55').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea55').html('');
            return false;
        }

    }

    function sub(values)
    {
        if(values)
        {
            var dataString = 'values=' + values;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Administrative_affairs/add_vacation',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea5').html(html);
                }
            });
            return false;
        }
        else
        {
            $('#optionearea5').html('');
            return false;
        }
    }
</script>
<!------------------------------------------------>
<script>
        function getVacationEnd(start_date) {
            var vacation_id=$('#vacation_id').val();  // 
            var vacations_days=$('#vacations_days').val();
            if (start_date && vacation_id && vacations_days !="") {
                var dataString = 'start_date=' + start_date +'&vacation_id=' + vacation_id +"&vacations_days="+vacations_days;
            //   alert(dataString);
                $.ajax({
                    type:'post',
                    url: '<?php echo base_url() ?>Administrative_affairs/getVacationEnd',
                    data:dataString,
                    cache:false,
                    success: function(json_data){
                        console.log(json_data);
                        var JSONObject = JSON.parse(json_data);
                       // alert(JSONObject["vacation_end"]);
                       $('#to_date').val(JSONObject["vacation_end"]);
                    }
                });
                return false;
                
            }

        }

    </script>
<!------------------------------------------------>
 <script>
     function data_vacation(emp_id){
         var dataString = "get_emp_id="+emp_id;
       //  alert(dataString);
         $.ajax({
             type:'post',
             url: '<?php echo base_url() ?>Administrative_affairs/EmployeeDataVacation',
             data:dataString,
             dataType: 'html',
             cache:false,
             success: function(html){
                 $("#option_data_vacation").html(html);
             }
         });
         return false;
     }
 </script>
<!------------------------------------------------>

 <script>
   function getAvailableDays() {

       var type =$('#vacation_id').val();
       var days =$('#vacations_days').val();
       var emp_id =$('#emp_id').val();
       $('.byan').html(0);
      if(type !='' && days   !='' && emp_id  !=''){
      var dataString   = "emp_id=" + emp_id +'&type=' + type + '&days=' + days;
       $.ajax({
           type:'post',
           url: '<?php echo base_url() ?>Administrative_affairs/getAvailableDays',
           data:dataString,
           dataType: 'html',
           cache:false,
          success: function(json_data){
               var JSONObject = JSON.parse(json_data);
               console.log(JSONObject);

              if( JSONObject['days'] !=0 && JSONObject['days'] > JSONObject['raseed'] || JSONObject['days'] > JSONObject['allowed_days']){
                  if( JSONObject['days'] !=0 && JSONObject['days'] > JSONObject['allowed_days'] ){
                      alert( "الحد الأقصي " + JSONObject['allowed_days'] +'!!');
                      $('#button').attr('disabled', true);
                  }

                  if( type == 2) {
                      if (JSONObject['days'] != 0 && JSONObject['days'] > JSONObject['raseed']) {
                          alert(" لا يوجد رصيد أجازات !!");
                      }
                      $('#button').attr('disabled', true);
                  }
              }

              if(  JSONObject['days'] < JSONObject['raseed'] &&  JSONObject['days'] < JSONObject['allowed_days'] || JSONObject['days'] == JSONObject['allowed_days']){
                var  total =parseInt(JSONObject['raseed']) - parseInt(JSONObject['days']);
                  $('#' + type).html(total);
                  $('#button').removeAttr('disabled');
              }


           }
       });
    }

   }

 </script>