 <!--  <style>
.r-pop-up {
    padding: 0;
}

.r-pop-up img {
    width: 93%;
    height: 150px;
}

.r-pop-up .chip {
    margin-top: 20px;
}

.r-pop-up .chip iframe {
    width: 96%;
    height: 180px;
}

.r-pop-up .closebtn {
    padding-left: 10px;
    color: #888;
    font-weight: bold;
    float: right;
    font-size: 20px;
    cursor: pointer;
    position: absolute;
    top: 0;
    right: 8%;
}

.r-pop-up .closebtn:hover {
    color: #000;
}
.modal1{
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    outline: 0;
}
.r-sss{
    width: 100px;
    height: auto;
    background-color: #0c1e56;
    color: #fff;

}
.r-sss:hover{
    color: #0c1e56;
    background-color: #fff;
}
</style> -->
      <div class="col-xs-12" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php //echo $title?> </h3>
            </div>
            <div class="panel-body">
<!-- open panel-body-->

            <?php
            $data['program'] = 'active'; 
          //  $this->load->view('admin/finance_resource/main_tabs',$data); 
            ?>

                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result))
                        $id = $result['id'];
                     else
                        $id = 0;
                    echo form_open_multipart('all_Finance_resource/Program_setting/programs/'.$id.'')?>
                    <div class="col-xs-12">
                    
<div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
<div class="col-xs-3">
<h4 class="r-h4">حسابات البرامج:</h4>
</div>

<div class="col-xs-3 r-input">
<select name="account_settings_id_fk" data-validation="required"  >
<option value="">إختر</option>
<?php

if (!empty($account_settings)):
foreach ($account_settings as $record):
echo $result[0]->account_settings_id_fk;

    $selected = '';
    if(isset($result) && $record->id == $result['account_settings_id_fk'])
        $selected = 'selected';
    ?>
    <option value="<?php echo $record->id; ?>" <?php echo $selected ?>><?php echo $record->title; ?></option>
    <?php
endforeach;
endif;
?>
</select>
</div>
</div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">إسم البرنامج:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
                                <input type="text" placeholder="إسم البرنامج" value="<?php if(isset($result)) echo $result['program_name'] ?>" class="r-inner-h4 " name="program_name" id="program_name" data-validation="required">
                            </div>
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">هل البرنامج يسمح بعملية التشارك؟:</h4>
                            </div>
                            
                            <?php
                            $yes = '';
                            $no = '';
                            if(isset($result)){
                                if($result['cooperate'] == 1)
                                    $yes = 'checked';
                                else
                                    $no = 'checked';
                            }
                            ?>
                            
                            <div class="col-xs-3 r-input">
                                <input type="radio" class="r-inner-h4 " <?php echo $yes ?> value="1" name="cooperate" id="cooperate" data-validation="required" > نعم 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" class="r-inner-h4 " <?php echo $no ?> value="0" name="cooperate" id="cooperate" data-validation="required" > لا
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">قيمة البرنامج الشهرية:</h4>
                            </div>
                            
                             <div class="col-xs-3 r-input">
				                <input type="number" min="0" step="any" value="<?php if(isset($result)) echo $result['monthly_value'] ?>" class="form-control" id="monthly_value" name="monthly_value" placeholder="قيمة البرنامج الشهرية" data-validation="required">
				            </div>
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">قيمة الفرد بالبرنامج:</h4>
                            </div>
                            
                             <div class="col-xs-3 r-input">
				                <input type="number" step="any" min="0" value="<?php if(isset($result)) echo $result['individual_value'] ?>" class="form-control" id="individual_value" name="individual_value" placeholder="قيمة الفرد بالبرنامج" data-validation="required">
				            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">فترة البرنامج من:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input ">
				                <div class="docs-datepicker">
								    <div class="input-groupp">
								        <input type="date" value="<?php if(isset($result)) echo date("Y-m-d",$result['program_from']) ?>" class="form-control " id="program_from" name="program_from" placeholder="شهر / يوم / سنة " data-validation="required">
								    </div>
								</div>
				            </div>
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">فترة البرنامج إلى:</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input ">
				                <div class="docs-datepicker">
								    <div class="input-groupp">
								        <input type="date" value="<?php if(isset($result)) echo date("Y-m-d",$result['program_to']) ?>" class="form-control" id="program_to" name="program_to" placeholder="شهر / يوم / سنة " data-validation="required">
								    </div>
								</div>
				            </div>
                            
                        </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        
                            <div class="col-xs-3 r-inner-btn" style="padding-top: 3px;">
                                <input type="submit" onclick="if($('#program_from').val() > $('#program_to').val()) {alert('لا يمكن لتاريخ البداية أن يكون قبل تاريخ النهاية'); return false;}" role="button" name="add" value="حفظ" class="btn pull-right" />
                            </div>
                            
                        </div>
                            
                        
                    </div>
                    <?php echo form_close()?>
                </div>
                <?php if(isset($table) && $table != null){ ?>
                <div class="col-xs-12 r-inner-details">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم البرنامج</th>
                                        <th class="text-center">فترة البرنامج من</th>
                                        <th class="text-center">فترة البرنامج إلى</th>
                                        <th class="text-center">حالة البرنامج</th>
                                        <th>التفاصيل</th>
                                        <th class="text-center">التحكم</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                $x = 1;
                                foreach($table as $record){
                                    if($record->program_to > strtotime(date("Y/m/d")))
                                        $status = 'جاري';
                                    else   
                                        $status = 'منتهي';
                                    if($record->cooperate == 1)
                                        $cooperate = 'نعم';
                                    else
                                        $cooperate = 'لا';
                                    echo '<tr>
                                            <td>'.($x++).'</td>
                                            <td>'.$record->program_name.'</td>
                                            <td>'.date("Y-m-d",$record->program_from).'</td>
                                            <td>'.date("Y-m-d",$record->program_to).'</td>
                                            <td>'.$status.'</td>
                                            <td>
                                                <a type="button" class="btn  btn-xs " data-toggle="modal" data-target=".bs-example-modal-lg'.$record->id.'"><span><i class="fa fa-search"></i></span>  </a>
                                            </td>
                                            <td>
                                            <a href="'.base_url().'all_Finance_resource/Program_setting/programs/'.$record->id.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="'.base_url().'all_Finance_resource/Program_setting/delete_programs/'.$record->id.'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                            </td>
                                          </tr>';
                                          

                                }
                                ?>   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php } ?>
                

        </div>
    </div>
</div>

 <?php if(isset($table) && $table != null){

 foreach($table as $record){ ?>
 <div class="modal fade bs-example-modal-lg<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel"> تفاصيل برنامج <?php  echo $record->program_name?></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-xs-12 ">
                                                            <div class="col-xs-3 ">
                                                                <h4 class="r-h4">إسم البرنامج:</h4>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <h6 class="r-h4"><?php  echo $record->program_name ?></h6>
                                                            </div>

                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">هل البرنامج يسمح بعملية التشارك؟</h4>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <h6 class="r-h4"><?php  echo $cooperate?></h6>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12">
                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">قيمة البرنامج الشهرية:</h4>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <h6 class="r-h4"><?php  echo $record->monthly_value?></h6>
                                                            </div>

                                                            <div class="col-xs-3">
                                                                <h4 class="r-h4">قيمة الفرد بالبرنامج:</h4>
                                                            </div>
                                                            <div class="col-xs-3">
                                                                <h6 class="r-h4"><?php  echo $record->individual_value?></h6>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default btn-add" data-dismiss="modal">إغلاق</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


 <?php } ?>
 <?php } ?>
