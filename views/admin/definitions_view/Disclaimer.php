<!------------------------------------------------>
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">

        <?php if(isset($result)):
    ?>
        <!--edit-->
            <div class="col-xs-12 r-inner-details">
                  <?php  echo form_open_multipart('Definitions/edit_release/'.$result[0]->id)?>
                  <div class="col-xs-12 ">
              <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data" >
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">إسم الموظف /الموظفة </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="employees_id_fk" id="employees_id_fk"   onchange="return lood($('#employees_id_fk').val());" class="selectpicker no-padding form-control choose-date form-control " data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                                    <option value="">إختر</option>
                                         <?php if(!empty($all_employees)):

                                        foreach ($all_employees as $record):
                                        $sel ='';
                                        if($record->id == $result[0]->employees_id_fk){
                                           $sel ='selected="selected"'; 
                                        }    ?>
                                            <option  value="<? echo $record->id;?>" <?php echo $sel; ?> ><? echo $record->employee;?></option>
                                        <?php  endforeach; endif;?>
                                </select>
                            </div>
                        </div>
                    </div>
              <div id="optionearea5" >
                    <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data" >
                     <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">السجل المدني </h4>
            </div>
            <div class="col-xs-6 r-input" >
            <input type="number" name="national_num" value="<?php echo $result[0]->national_num; ?>" class="form-control"  />
            </div>
            </div>
             </div>
             
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">المسمي الوظيفي </h4>
            </div>
            <div class="col-xs-6 r-input" id="">
            <input type="text" name="job_name" value="<?php echo $result[0]->job_name; ?>" class="form-control" data-validation="required"  />
            </div>
            </div>
            </div>
            </div>
              <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4 "> تاريخ العمل </h4>
                            </div>
                          <div class="col-xs-6 r-input">
                          <div class="docs-datepicker">
                          <div class="input-group">
                            <input type="text" class="form-control docs-date" name="release_date"  value="<?php echo $result[0]->release_date; ?>" placeholder="شهر / يوم / سنة " data-validation="required" >
                        </div>
                        </div>
                         </div>
                         </div>
                        </div> 
              <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4"> الإفادة بأي متعلقات لدى المذكور </h4>
            </div>
           
            </div>
            </div>
              <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4"> الشؤون الادارية </h4>
            </div>
           
            </div>
            </div>
              <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">هل يوجد متعلقات   </h4>
            </div>
            <div class="col-xs-6 r-input" >
             
             <?php
             $ch = '';
             $readonly = '  ';
              if($result[0]->adminstrative_status == 1){
              $ch = 'checked="checked"';  
              $readonly = '  ';
             }
              $ch2 = '';
              if($result[0]->adminstrative_status == 2){
              $ch2 = 'checked="checked"'; 
             $readonly = ' readonly="readonly" ';
             }
             
             
              ?>
            
              <input type="radio" name="adminstrative_status" <?php echo $ch;?> value="1" onclick="javascript:brd();"  > نعم<br>
              <input type="radio" name="adminstrative_status" <?php echo $ch2;?>  value="2" onclick="javascript:brd();" > لا<br>
           
            </div>
            <div class="col-xs-6">
            <h4 class="r-h4">( نوع المتعلقات إن وجدت ) </h4>
            </div>
            <div class="col-xs-6 r-input" >
            <input type="text" name="adminstrative_type" value="<?php echo $result[0]->adminstrative_type; ?>"  id="adminstrative_type" class="form-control" <?php echo $readonly; ?> />    
 
            </div>
            
            </div>
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">مسئول القسم </h4>
            </div>
            <div class="col-xs-6 r-input" >
            <input type="text" name="adminstrative_manage"  value="<?php echo $result[0]->adminstrative_manage; ?>"  id="adminstrative_manage" class="form-control" data-validation="required"  />    
            </div>
            </div>
            </div>
              <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            
            <div class="col-xs-6">
            <h4 class="r-h4">الشؤون المالية</h4>
            </div>
            </div>
            </div>
              <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">هل يوجد متعلقات   </h4>
            </div>
            <div class="col-xs-6 r-input" >
            
              <?php
             $ch3 = '';
             $readonly2 = '  ';
              if($result[0]->finance_status == 1){
              $ch3 = 'checked="checked"';  
              $readonly2 = '  ';
             }
              $ch4 = '';
              if($result[0]->finance_status == 2){
              $ch4 = 'checked="checked"'; 
             $readonly2 = ' readonly="readonly" ';
             }
             
             
              ?>
            
              <input type="radio" name="finance_status" <?php echo $ch3;?> value="1" onclick="javascript:brddd();"  > نعم<br>
              <input type="radio" name="finance_status" <?php echo $ch4;?> value="2" onclick="javascript:brddd();" > لا<br>
           
            </div>
            <div class="col-xs-6">
            <h4 class="r-h4">( نوع المتعلقات إن وجدت ) </h4>
            </div>
            <div class="col-xs-6 r-input" >
            <input type="text" name="finance_type"  id="finance_type" value="<?=$result[0]->finance_type ?>" class="form-control"  <?php echo $readonly2; ?> />    
 
            </div>
            
            </div>
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">مسئول القسم </h4>
            </div>
            <div class="col-xs-6 r-input" >
            <input type="text" name="finance_manage"  id="finance_manage" value="<?=$result[0]->finance_manage ?>" class="form-control"  data-validation="required" />    
            </div>
            </div>
            
              <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">مدير الجمعية </h4>
            </div>
            <div class="col-xs-6 r-input" >
            <input type="text" name="manage" value="<?=$result[0]->manage ?>" class="form-control" data-validation="required"  />
            </div>
            </div>
            
            
            </div>
          </div>
            </div>
            <div class="col-xs-12 r-inner-btn">
                <div class="col-xs-3"> </div>
                <div class="col-xs-3">
                    <input type="submit" role="button" name="edit" value="تعديل" class="btn pull-right">

                </div>
                <?php echo form_close()?>
                <div class="col-xs-2"></div>
            </div>
        <!--edit-->
 <?php else: ?>

            <div class="col-xs-12 r-inner-details">
                <?php  echo form_open_multipart('Definitions/Disclaimer')?>

                <div class="col-xs-12 ">
                    
                     <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data" >
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">إسم الموظف /الموظفة </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="employees_id_fk" id="employees_id_fk"   onchange="return lood($('#employees_id_fk').val());" class="selectpicker no-padding form-control choose-date form-control " data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                                    <option value="">إختر</option>

                                    <?php if(!empty($all_employees)):

                                        foreach ($all_employees as $record):    ?>
                                            <option value="<? echo $record->id;?>" ><? echo $record->employee;?></option>
                                        <?php  endforeach; endif;?>
                                </select>
                            </div>
                        </div>
                    </div>
                     <div id="optionearea5" >
                    <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data" >
                     <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">السجل المدني </h4>
            </div>
            <div class="col-xs-6 r-input" >
            <input type="number" name="national_num" class="form-control"  />
            </div>
            </div>
             </div>
             
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">المسمي الوظيفي </h4>
            </div>
            <div class="col-xs-6 r-input" id="">
            <input type="number" name="job_name" step="any" class="form-control" data-validation="required"  />
            </div>
            </div>
            </div>
            </div>
            
                     <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4 "> تاريخ العمل </h4>
                            </div>
                          <div class="col-xs-6 r-input">
                          <div class="docs-datepicker">
                          <div class="input-group">
                            <input type="text" class="form-control docs-date" name="release_date"  placeholder="شهر / يوم / سنة " data-validation="required" >
                        </div>
                        </div>
                         </div>
                         </div>
                        </div> 
            
                     <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4"> الإفادة بأي متعلقات لدى المذكور </h4>
            </div>
           
            </div>
            </div>
                    <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4"> الشؤون الادارية </h4>
            </div>
           
            </div>
            </div>
                    <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">هل يوجد متعلقات   </h4>
            </div>
            <div class="col-xs-6 r-input" >
              <input type="radio" name="adminstrative_status"  value="1" onclick="javascript:brd();"  > نعم<br>
              <input type="radio" name="adminstrative_status"   value="2" onclick="javascript:brd();" > لا<br>
           
            </div>
            <div class="col-xs-6">
            <h4 class="r-h4">( نوع المتعلقات إن وجدت ) </h4>
            </div>
            <div class="col-xs-6 r-input" >
            <input type="text" name="adminstrative_type"  id="adminstrative_type" class="form-control"  readonly="readonly" />    
 
            </div>
            
            </div>
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">مسئولة القسم </h4>
            </div>
            <div class="col-xs-6 r-input" >
            <input type="text" name="adminstrative_manage"  id="adminstrative_manage" class="form-control" data-validation="required"  />    
            </div>
            </div>
            </div>
            
                    <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            
            <div class="col-xs-6">
            <h4 class="r-h4">الشؤون المالية</h4>
            </div>
            </div>
            </div>
                    <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data" >
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">هل يوجد متعلقات   </h4>
            </div>
            <div class="col-xs-6 r-input" >
              <input type="radio" name="finance_status"  value="1" onclick="javascript:brddd();"  > نعم<br>
              <input type="radio" name="finance_status"  value="2" onclick="javascript:brddd();" > لا<br>
           
            </div>
            <div class="col-xs-6">
            <h4 class="r-h4">( نوع المتعلقات إن وجدت ) </h4>
            </div>
            <div class="col-xs-6 r-input" >
            <input type="text" name="finance_type"  id="finance_type" class="form-control"  readonly="readonly" />    
 
            </div>
            
            </div>
            <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">مسئولة القسم </h4>
            </div>
            <div class="col-xs-6 r-input" >
            <input type="text" name="finance_manage"  id="finance_manage" class="form-control"  data-validation="required" />    
            </div>
            </div>
            
              <div class="col-xs-12">
            <div class="col-xs-6">
            <h4 class="r-h4">مدير الجمعية </h4>
            </div>
            <div class="col-xs-6 r-input" >
            <input type="text" name="manage" class="form-control" data-validation="required"  />
            </div>
            </div>
            
            
            </div>

                </div>
            </div>
            <div class="col-xs-12 r-inner-btn" id="button" >
                <div class="col-xs-3"> </div>
                <div class="col-xs-3">
                    <input type="submit" role="button" name="add" value="حفظ" class="btn pull-right">

                </div>
                <?php echo form_close()?>
                <div class="col-xs-2"> </div>
            </div>

<?php endif; ?>
        <!---table------>
        <?php if(isset($records)&&$records!=null):?>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>م</th>
                                <th>اسم الموظف</th>
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
                                    
                                    <td>
                                    <button type="button" class="btn btn-sm btn-info " data-toggle="modal" data-target="#myModal<?=$record->id?>"><span class="glyphicon glyphicon-list"></span> تفاصيل </button>
                                    </td>
                                    <td>
                                     <a href="<?php echo base_url('Definitions/delete_release').'/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> 
                                     </span> 
                                     <a href="<?php echo base_url('Definitions/edit_release').'/'.$record->id ?>" > <i class="fa fa-pencil" aria-hidden="true"></i> </a>
                                    </td>
                                    <td>
                                    <a href="<?php echo base_url('Definitions/printer_release').'/'.$record->id ?>"> <i class="fa fa-print" aria-hidden="true"></i> </a>
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
                                        <h5>الإفادة بأي متعلقات لدى المذكور:</h5>
                                    </div>
                                    <div class="col-sm-12">
                                      <h5>الشؤون الادارية</h5>
                                    </div>
                                
                                    
                                </div>
                                
                                 <div class="col-sm-12" >
                                    <div class="col-sm-6">
                                        <h5>هل يوجد متعلقات:</h5>
                                    </div>
                                    <div class="col-sm-6">
                                      <h5><?php 
                                      if($record_total->adminstrative_status == 1){
                                        echo 'نعم';
                                      }else{
                                        echo 'لا';
                                      }
                                      
                                      ?></h5>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <h5>نوع المتعلقات:</h5>
                                    </div>
                                    <div class="col-sm-6">
                                      <h5><?php 
                                     echo $record_total->adminstrative_type; 
                                      
                                      ?></h5>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <h5>مسئولة القسم :</h5>
                                    </div>
                                    <div class="col-sm-6">
                                      <h5><?php 
                                     echo $record_total->adminstrative_manage; 
                                      
                                      ?></h5>
                                    </div>
                                    
                                    
                                     <div class="col-sm-12" >
                                    
                                    <div class="col-sm-12">
                                      <h5>الشؤون المالية</h5>
                                    </div>
                                
                                    
                                </div>
                                
                                 <div class="col-sm-12" >
                                    <div class="col-sm-6">
                                        <h5>هل يوجد متعلقات:</h5>
                                    </div>
                                    <div class="col-sm-6">
                                      <h5><?php 
                                      if($record_total->finance_status == 1){
                                        echo 'نعم';
                                      }else{
                                        echo 'لا';
                                      }
                                      
                                      ?></h5>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <h5>نوع المتعلقات:</h5>
                                    </div>
                                    <div class="col-sm-6">
                                      <h5><?php 
                                     echo $record_total->finance_type; 
                                      
                                      ?></h5>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <h5>مسئول القسم :</h5>
                                    </div>
                                    <div class="col-sm-6">
                                      <h5><?php 
                                     echo $record_total->finance_manage; 
                                      
                                      ?></h5>
                                    </div>
                                
                                
                                    
                                </div>
                                
                                <div class="col-sm-12" >
                                    <div class="col-sm-6">
                                        <h5>تاريخ العمل:</h5>
                                    </div>
                                    <div class="col-sm-6">
                                      <h5><?=$record_total->release_date.'هـ';?></h5>
                                    </div>
                                
                                    
                                </div>
                                
                                
                                  <div class="col-sm-12" >
                                    <div class="col-sm-6">
                                        <h5>مدير/ الجمعية:</h5>
                                    </div>
                                    <div class="col-sm-6">
                                      <h5><?=$record_total->manage;?></h5>
                                    </div>
                                
                                </div>
                           
                            </div>
                            <div class="modal-footer col-xs-12">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            <?php   } ?>
        <?php  endif; ?>
         <!---table------>
    </div>
</div>


<script>
    function lood(num){
        if(num>0 && num != '')
        {
            var id = num;
            var dataString = 'admin_num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Definitions/Disclaimer',
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
<script type="text/javascript">
  function brd() {
    var value = $('[name="adminstrative_status"]:checked').val()
    if (value == 1){
        $('#adminstrative_type').prop('readonly', false);
    }else{
      $('#adminstrative_type').prop('readonly', true);   
    }
    
    }
</script>

<script type="text/javascript">
  function brddd() {
    var value = $('[name="finance_status"]:checked').val()
    if (value == 1){
        $('#finance_type').prop('readonly', false);
    }else{
      $('#finance_type').prop('readonly', true);   
    }
    
    }
</script>
