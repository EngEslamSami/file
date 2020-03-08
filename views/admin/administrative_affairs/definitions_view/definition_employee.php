<!------------------------------------------------>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
<div class="col-xs-12">
    <?php if(isset($result)):
    
    
    ?>
        <!--edit-->
        <div class="details-resorce">
            <div class="col-xs-12 r-inner-details">
                <?php  echo form_open_multipart('Administrative_affairs/edit_definition_employee/'.$result[0]->id)?>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12 ">
                        <div class="col-xs-6">
                        <h4 class="r-h4 "> تاريخ العمل </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                        <div class="docs-datepicker">
                        <div class="input-groupp">
                        <input type="date" class="form-control " value="<?php echo $result[0]->work_date;?>" 
                           name="work_date"  placeholder="شهر / يوم / سنة " data-validation="required" >
                        </div>
                        </div>
                        </div>
                        </div> 
                        </div> 
                        
                        
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" >
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">إسم الموظف /الموظفة </h4>
                            </div>
                            <input type="hidden" name="employees_id_fk" id="employees_id_fk_post" value="<?=$result[0]->employees_id_fk?>" /> 
                            <div class="col-xs-6 r-input">
                                <select name="" id="employees_id_fk"   onchange="set_data();" class="selectpicker no-padding form-control choose-date form-control " data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                                    <option value="">إختر</option>

                                    <?php if(!empty($all_employees)):

                                        foreach ($all_employees as $record):
                                        $sel ='';
                                        if($record->id == $result[0]->employees_id_fk){
                                           $sel ='selected="selected"'; 
                                        }    ?>
                                            <option  value="<? echo $record->id."-".$record->salary."-".$record->id_num;?>" <?php echo $sel; ?> ><? echo $record->employee;?></option>
                                        <?php  endforeach; endif;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" >
                     <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">السجل المدني </h4>
            </div>
            <div class="col-xs-6 r-input" id="optionearea5">
            <input type="number" id="national_num" name="national_num" value="<?php echo $result[0]->national_num; ?>" class="form-control"  />
            </div>
            </div>
             </div>
             
            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">الراتب الشهري </h4>
            </div>
            <div class="col-xs-6 r-input" id="">
            <input type="number" id="salary" name="salary" value="<?php echo $result[0]->salary; ?>" step="any" class="form-control" data-validation="required"  />
            </div>
            </div>
            </div>
            
            
            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">مدير /مديرة الجمعية</h4>
            </div>
            <div class="col-xs-6 r-input" id="">
            <input type="text" name="manager" value="<?php echo $result[0]->manager; ?>"  class="form-control" data-validation="required"  />
            </div>
            </div>
            </div>
                        
                        
       </div>
        <div class="col-xs-12 r-inner-btn">
                <div class="col-xs-3">
                </div>
                <div class="col-xs-3">
                    <input type="submit" role="button" name="edit" value="تعديل" class="btn pull-right">

                </div>
                <?php echo form_close()?>
                <div class="col-xs-2">

                </div>
            </div>

        </div>
        <!--edit-->
 <?php else: ?>
        <div class="details-resorce">
            <div class="col-xs-12 r-inner-details">
                <?php  echo form_open_multipart('Administrative_affairs/Definition_employee')?>

                <div class="col-xs-12 ">
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12 ">
                            <div class="col-xs-6">
                                <h4 class="r-h4 "> تاريخ العمل </h4>
                            </div>
                          <div class="col-xs-6 r-input">
                          <div class="docs-datepicker">
                          <div class="input-groupp">
                            <input type="date" class="form-control" 
                            
                            name="work_date"  placeholder="شهر / يوم / سنة " data-validation="required" >
                        </div>
                        </div>
                         </div>
                        </div> 
                        </div> 
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" >
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">إسم الموظف /الموظفة </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                              <input type="hidden" name="employees_id_fk" id="employees_id_fk_post" value="" /> 
                           
                                <select  id="employees_id_fk"   onchange="set_data();" class="selectpicker no-padding form-control choose-date form-control " data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                                    <option value="">إختر</option>

                                    <?php if(!empty($all_employees)):

                                        foreach ($all_employees as $record):    ?>
                                            <option value="<? echo $record->id."-".$record->salary."-".$record->id_num;?>" ><? echo $record->employee;?></option>
                                        <?php  endforeach; endif;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" >
                     <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">السجل المدني </h4>
            
            </div>
            <div class="col-xs-6 r-input" id="optionearea5">
            <input type="number" id="national_num" name="national_num" class="form-control"  />
            </div>
            </div>
             </div>
             
            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">الراتب الشهري </h4>
            </div>
            <div class="col-xs-6 r-input" id="">
            <input type="number" name="salary" id="salary" step="any" class="form-control" data-validation="required"  />
            </div>
            </div>
            </div>
            
            
            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">مدير /مديرة الجمعية</h4>
            </div>
            <div class="col-xs-6 r-input" id="">
            <input type="text" name="manager"  class="form-control" data-validation="required"  />
            </div>
            </div>
            </div>
             
             </div>
            </div>


            <div class="col-xs-12 r-inner-btn" id="button" >
                <div class="col-xs-3">
                </div>
                <div class="col-xs-3">
                    <input type="submit" role="button" name="add" value="حفظ" class="btn pull-right">

                </div>
                <?php echo form_close()?>
                <div class="col-xs-2">

                </div>
            </div>

        </div>




        <!---table------>
        <?php if(isset($records)&&$records!=null):?>
            <div class="col-xs-12 r-inner-details">
                <div class="panel-body">

                    <div class="fade in active">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>م</th>
                                <th>اسم الموظف</th>
                                <th>تاريخ الإضافة</th>
                                <th>تفاصيل</th>
                                <th>الإجراء</th>
                                <th>طباعة</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php
                            $a=1;
                            foreach ($records as $record ):?>
                            <tr>
                                    <td><?php echo $a ?></td>
                                    <td> <?php echo $all_emp[$record->employees_id_fk]; ?></td>
                                    <td> <?php echo $record->date_ar; ?></td>
                                    <td>
                                    <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myModal<?=$record->id?>"><span class="glyphicon glyphicon-list"></span> تفاصيل </button>
                                    </td>
                                    <td>
                                     <a href="<?php echo base_url('Administrative_affairs/delete_definition_employee').'/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span>
                                     </span> 
                                     <a href="<?php echo base_url('Administrative_affairs/edit_definition_employee').'/'.$record->id ?>" > <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                                    </td>
                                    <td>
                                    <a href="<?php echo base_url('Administrative_affairs/printer_employee').'/'.$record->id ?>"> <i class="fa fa-print" aria-hidden="true"></i> </a>
                                    </td>
                            </tr>
                                <?php
                                $a++;
                                endforeach;  ?>
                            </tbody>
                        </table>
                        
                         <?php foreach ($records as $record_total ){  ?>
                <div class="modal fade" id="myModal<?=$record_total->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content col-xs-12" style="width:150%">
                            <div class="modal-header">
                                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="gridSystemModalLabel">تفاصيل  </h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-xs-12">
                                    <div class="col-sm-6">
                                        <h5>إسم الموظف :</h5>
                                    </div>
                                    <div class="col-sm-6 text-left">
                                        <h5><?=$all_emp[$record_total->employees_id_fk];?></h5>
                                    </div>

                                    <div class="col-sm-6">
                                        <h5>سجل مدني رقم:</h5>
                                    </div>
                                    <div class="col-sm-6 text-left">
                                        <h5><?=$record_total->national_num;?></h5>
                                    </div>
                                </div>
                                <div class="col-sm-12" >
                                    <div class="col-sm-6">
                                        <h5>تاريخ العمل:</h5>
                                    </div>
                                    <div class="col-sm-6">
                                      <h5><?=$record_total->work_date.'هـ';?></h5>
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <h5>الراتب الشهري :</h5>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5><?=$record_total->salary?></h5>
                                    </div>
                                </div>
                                
                                  <div class="col-sm-12" >
                                    <div class="col-sm-6">
                                        <h5>مدير/مديرة الجمعية:</h5>
                                    </div>
                                    <div class="col-sm-6">
                                      <h5><?=$record_total->manager;?></h5>
                                    </div>
                                
                                </div>
                           
                            </div>
                            <div class="modal-footer col-xs-12">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                ?>
                    </div>
                </div>
            </div>
        <?php  endif; endif; ?>
    <!---table------>
</div>
</div>
</div>

 <script>
   function set_data(){
   
        var totalarray=$('#employees_id_fk').val();
        var res = totalarray.split("-");
        var salaryCode=res[1];
        var nationCode=res[2];
          $("#national_num").val(nationCode);
          $("#salary").val(salaryCode);
          $("#employees_id_fk_post").val(res[0]);
        
   }
   
 
 
 </script>
 
 
<script>
    function lood(num){
        if(num>0 && num != '')
        {
            var id = num;
            var dataString = 'admin_num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Administrative_affairs/Definitions/Definition_employee',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea5").html(html);
                }
            });
            return false;
        }
        else
        {
            $("#vid_num").val('');
            $("#optionearea5").html('');
        }
    }
</script>


