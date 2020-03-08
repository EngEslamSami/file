<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
<!---form------>
<span id="message">
<?php
if(isset($_SESSION['message']))
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
<?php $member_type = array('إختر','دائم','غير دائم','رجل اعمال','عضوية نسائية');

 ?>
</span>
 <div class="col-xs-12">
 <?php if(isset($results)):?>
 <?php echo form_open_multipart('Directors/Directors/update_magls/'.$results['id'],array('class'=>"",'role'=>"form" )); ?>

                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
         <div class="form-group col-sm-12 col-xs-12">
         <label class="label label-green  half">اختر كود المجلس  </label>
         <select name="council_id_fk" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
         <option value="">-اختر-</option>
         <?php foreach ($magls as $mag): ?>
          <?php
              $selected='';
              if($results['council_id_fk']== $mag->id){
              $selected='selected';
          }
          ?>
         <option value="<?php echo $mag->id ?>" <?php echo $selected ?> ><?php echo $mag->id ?> </option>
         <?php endforeach; ?>
        </select>
        </div>
                                    
                           
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">رقم العضو </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="member_code" value="<?php echo $results['member_code'] ?>"  readonly=""/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">إسم العضو </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="member_name" value="<?php echo $results['member_name'] ?>" data-validation="required">
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-xs-12 r-input">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
          <div class="form-group col-sm-12 col-xs-12">
         <label class="label label-green  half">اختر وظيفة العضو  </label>
         <select name="job_title_id_fk" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
         <option value=""> - اختر - </option>
         <?php foreach ($job_title as $job): ?>
          <?php
            $selected2='';
          if($results['job_title_id_fk']== $job->id){
          $selected2='selected';
          }?>
         
         <option value="<?php echo $job->id ?>" <?php echo $selected2 ?> ><?php echo $job->name ?> </option>
         <?php endforeach; ?>
         </select>
         </div>
          <div class="form-group col-sm-12 col-xs-12">
         <label class="label label-green  half">اختر نوع العضوية  </label>
          <select name="member_type_id_fk" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                                            <option value=""></option>
          <?php 
          for( $x=0;$x<sizeof($member_type) ;$x++){ 
            
           
            $selected3='';
          if($results['member_type_id_fk']== $x){
          $selected3='selected';
          }
            ?>
         <option value="<?php echo $x; ?>" <?= $selected3;?> ><?php echo $member_type[$x]; ?> </option>
         <?php } ?>
                                            
                                           
          </select>
         </div> 
                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ التعيين </h4>
                                    </div>
                                    <div class="col-xs-6 ">
                                     <input type="date" class="form-control " 
                                     value="<?php echo date('Y-m-d',$results['appointment_date']) ?>" name="appointment_date" placeholder="شهر / يوم / سنة " data-validation="required" >    
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ الانتهاء </h4>
                                    </div>
                                    <div class="col-xs-6">
                                      <input type="date" class="form-control " 
                                      value="<?php echo date('Y-m-d',$results['expired_date']) ?>"
                                       name="expired_date"
                                        placeholder="شهر / يوم / سنة " 
                                        data-validation="required" >
                                        
                                        
                                        
                                         
                                           
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="col-xs-4"></div>
                        <div class="col-xs-3">
                            <input type="submit" class="btn center-block r-manage-btn2 "   name="update" value="تعديل" />
                        </div>
                          <div class="col-xs-7"></div>
                    </div>

                </div>
            <?php echo form_close()?>
            <?php else: ?>
            <?php echo form_open_multipart('Directors/Directors/add_magls',array('class'=>"",'role'=>"form" ))?>

            <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                
                                
         <div class="form-group col-sm-12 col-xs-12">
         <label class="label label-green  half">اختر كود المجلس  </label>
         <select name="council_id_fk" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
         <option value="">-اختر-</option>
         <?php foreach ($magls as $mag): ?>
         <option value="<?php echo $mag->id ?>" ><?php echo $mag->id ?> </option>
         <?php endforeach; ?>
        </select>
        </div>
                           <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">رقم العضو </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" value="<?php echo ($last_member+1)?>" class="r-inner-h4 " name="member_code" readonly=""/>
                                    </div>
                                </div>
                           </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">إسم العضو </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " name="member_name" value=""  data-validation="required"  />
                                    </div>
                                </div>
                     

                            </div>
                        </div>
                        <div class="col-xs-12 r-input">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">     
          <div class="form-group col-sm-12 col-xs-12">
         <label class="label label-green  half">اختر وظيفة العضو  </label>
         <select name="job_title_id_fk" class="selectpicker no-padding form-control choose-date form-control half"  data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true" >
         <option value=""> - اختر - </option>
         <?php foreach ($job_title as $job): ?>
         <option value="<?php echo $job->id ?>" ><?php echo $job->name ?> </option>
         <?php endforeach; ?>
         </select>
         </div>
                    
         <div class="form-group col-sm-12 col-xs-12">
         <label class="label label-green  half">اختر نوع العضوية  </label>
          <select name="member_type_id_fk" class="selectpicker no-padding form-control choose-date form-control half" data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                                           <option value=""></option>
          <?php 
          for( $x=0;$x<sizeof($member_type) ;$x++){ ?>
         <option value="<?php echo $x; ?>" ><?php echo $member_type[$x]; ?> </option>
         <?php } ?>
                                            
                                           
          </select>
         </div>        
         

                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ التعيين </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                    <input type="date" class="form-control" name="appointment_date" placeholder="شهر / يوم / سنة " data-validation="required" >  
                                    </div>
                                </div>
                                <div class="col-xs-12 ">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4 ">  تاريخ الانتهاء </h4>
                                    </div>
                                    <div class="col-xs-6 r-input ">
                                     <input type="date" class="form-control " 
                                     name="expired_date" placeholder="شهر / يوم / سنة " 
                                     data-validation="required" >
                                    </div>
                                </div>
                                
                    
                                
                                
                                
                            </div>
                        </div>
                        <div class="col-xs-4"></div>
                        <div class="col-xs-3">
                            <input type="submit" class="btn center-block r-manage-btn2 "   name="add" value="حفظ" />
                        </div>
                        <div class="col-xs-7"></div>
                        <?php echo form_close()?>
                    </div>
 <?php endif; ?>

<div class="col-md-12">
<div class="panel with-nav-tabs panel-default">
<div class="panel-heading">
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab0default" data-toggle="tab">المجلس الحالى</a></li>
    <li class=""><a href="#tab1default" data-toggle="tab">المجالس الاخرى</a></li>    
</ul>
</div>
<div class="panel-body">
<div class="tab-content">
<div class="tab-pane fade in active" id="tab0default">
<!--  srart 1   ------------------------------------------------------------------------------------------------>
<?php if(isset($on_magls)&&$on_magls!=null):?>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">كود العضوية</th>
            <th class="text-center">أسم العضو </th>
            <th class="text-center">تاريخ التعيين</th>
            <th class="text-center">تاريخ الانتهاء </th>
            <th class="text-center">الاجراء</th>
            <th class="text-center">الحالة</th>
        </tr>
    </thead>
    <tbody class="text-center">
    <?php $a=1; foreach ($on_magls as $key=>$value):
    foreach ($value as $record):
    if($record->expired_date < time()){
        $state='danger';
        $title='عضوية منتهية';
    }elseif($record->expired_date > time()){
        $state='primary';
        $title='عضوية سارية';   
     
    }?>
        
        <tr>
            <td><?php echo $a ?></td>
            <td><?php echo $record->member_code ?></td>
            <td><?php echo $record->member_name ?></td>
            <td><?php echo $record->appointment_date_ar ?></td>
            <td><?php echo $record->expired_date_ar ?></td>
            <td><a href="<?php echo base_url().'Directors/Directors/update_magls/'.$record->id?>">
                  <i class="fa fa-pencil " aria-hidden="true"></i> </a>
              
                <a href="<?php echo base_url().'Directors/Directors/delete_magls/'.$record->id?>"
                 onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                  <i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
            <td>
              <button type="button" class="btn btn-sm btn-<?php echo $state?>"> <?php echo $title?></button>
          </td>
        </tr>

        <?php $a++;  endforeach; endforeach; ?>
  
    </tbody>
</table>
<?php else:?>
<div class="alert alert-danger" >
    لم يتم اضافة اعضاء للمجاس الحالى
          </div>
<?php endif;?>
<!---  end  1   ------------------------------------------------------------------------------------------------> 
</div>                                                                                   
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<div class="tab-pane fade" id="tab1default">
<!--  srart 2   ------------------------------------------------------------------------------------------------>
<?php if(isset($off_magls)&&$off_magls!=null):?>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  
    <tbody class="text-center">
    <?php $a=1; foreach ($off_magls as $key=>$value):?>
    <tr> <td colspan="2">كود المجلس :</td> 
         <td colspan="1"><?php echo $all_magls[$key]->id?></td>
         <td colspan="2">رقم قرار التعين : </td>  
         <td colspan="2"><?php echo $all_magls[$key]->appointment_decison_number?></td>
    </tr>
      
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">كود العضوية</th>
            <th class="text-center">أسم العضو </th>
            <th class="text-center">تاريخ التعيين</th>
            <th class="text-center">تاريخ الانتهاء </th>
            <th class="text-center">الاجراء</th>
            <th class="text-center">الحالة</th>
        </tr>
   
   <?php foreach ($value as $record): if($record->expired_date < time()){
        $state='danger';
        $title='عضوية منتهية';
    }elseif($record->expired_date > time()){
        $state='primary';
        $title='عضوية سارية';   
    }?>
        <tr>
            <td><?php echo $a ?></td>
            <td><?php echo $record->member_code ?></td>
            <td><?php echo $record->member_name ?></td>
            <td><?php echo  date('d-m-Y',$record->appointment_date) ?></td>
            <td><?php echo  date('d-m-Y',$record->expired_date) ?></td>
            <td><a href="<?php echo base_url().'Directors/Directors/update_magls/'.$record->id?>">
                  <i class="fa fa-pencil " aria-hidden="true"></i> </a>
              
                <a href="<?php echo base_url().'Directors/Directors/delete_magls/'.$record->id?>">
                  <i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
            <td>
              <button type="button" class="btn btn-<?php echo $state?>"> <?php echo $title?></button>
          </td>
        </tr>

        <?php $a++;  endforeach; endforeach; ?>
  
    </tbody>
</table>
<?php else:?>
<div class="alert alert-danger" >
    لا يوجد اعضاء
          </div>
<?php endif;?>

<!---  end  2   ------------------------------------------------------------------------------------------------> 
</div>
<!--------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------->
<!---  end Tabs ----------------------------------------------------------------------------------------------------->                  
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        
<!---  end All ----------------------------------------------------------------------------------------------------->                  
 <?php  //endif; ?>