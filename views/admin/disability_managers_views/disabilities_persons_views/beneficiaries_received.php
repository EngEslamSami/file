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
        <?php 
                 /** Social Array ***/
            $scoial_status = array('متزوج','أعزب','أرمل');
            
            	 ?> 
        
                    <?php if(isset($records)&&$records!=null):?>
                <div class="col-xs-12">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">رقم المستفيد</th>
                                            <th class="text-center">إسم المستفيد</th>
                                            <th class="text-center">نوع الاعاقة</th>
                                            <th class="text-center">تفاصيل</th>
                                            <th class="text-center">تأكيد </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php
                                    $a=1;
                                    $x=1;
                                    foreach ($records as $record ):?>
                                        <tr>
<td><?php echo $x++ ?></td>
<td><?php echo $record->p_num; ?></td>
<td><?php echo $record->p_name; ?></td>
<td>
 <?php if(!empty($types)):
                foreach ($types as $recordeee):
                if($recordeee->id == $record->disability_type_id_fk):
                ?>
              <?php echo $recordeee->title;?>
               <?php endif; endforeach; endif;?>
</td>
<td>
<button type="button" class="btn  btn-info btn-sm" data-toggle="modal" data-target="#myModal<?php echo $record->id  ?>" > <i class="fa fa-list"></i>التفاصيل</button>

<div class="modal" id="myModal<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
					            	<div class="modal-header">
					                	<button type="button" class="close" data-dismiss="modal">&times;</button>
					                	<h4 class="modal-title"> التفاصيل  </h4>
					             	</div>
                                    <div class="modal-body">
                                    <div class="row">
                                    <div class="col-md-12">
                                     <div class="col-md-12">
                            <h5 class="text-center pop-title-text">بيانات الشخصية</h5>
                            </div>
                                    <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>رقم المستفيد:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->p_num?></h6>
                                      </div>
                                   </div>
                                   
                                   <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>إسم المستفيد:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->p_name?></h6>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>تاريخ الميلاد:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->p_date_birth?></h6>
                                      </div>
                                   </div>
                             
                             <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>العنوان :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->p_address?></h6>
                                      </div>
                                   </div>
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>الهاتف :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->p_mob?></h6>
                                      </div>
                                   </div>
                             <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>السجل المدني :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->p_national_num?></h6>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>الجنسية  :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?php if(!empty($nationality_settings)){
                            foreach ($nationality_settings as $nationality){
                            
                            if($record->p_natonality_id_fk == $nationality->id){ ?>
                            <?=$nationality->title?>
                            <?php  }
                            }
                            }?> </h6>
                                      </div>
                                   </div>
                                   
                             <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>الحالة الإجتماعية :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?php 
                for($x=0 ; $x < sizeof($scoial_status) ;$x++){
                if($record->p_scoial_status_id_fk== $x){ ?>
                  <?=$scoial_status[$x]?>
                <?php }
                }
                ?></h6>
                                      </div>
                                   </div>
                            <div class="col-md-12">
                            <h5 class="text-center pop-title-text">بيانات الاعاقة</h5>
                            </div>
                            
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>نوع الإعاقة :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?php if(!empty($types)):
                            foreach ($types as $recordeee):
                            if($recordeee->id == $record->disability_type_id_fk):
                            ?>
                            <?php echo $recordeee->title;?>
                            <?php endif; endforeach; endif;?></h6>
                                      </div>
                                   </div>
                           <?php if($record->disability_type_id_fk == 1){ ?>
                           
                           <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>إثبات حالة :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->proof_status?></h6>
                                      </div>
                                   </div>
                                    <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>إحالة للمستشفي:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->referral_to_hospital?></h6>
                                      </div>
                                   </div>
                                    <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>إحالة للمركز:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->referral_to_center?></h6>
                                      </div>
                                   </div>
       
                              <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>تقرير طبي:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->medical_report?><a style="position: absolute; left: 15px;" href="<?php echo base_url('disability_managers/Disability_manage/download/'.$record->medical_report) ?>"><i class="fa fa-download" aria-hidden="true"></i></a></h6>
                                      </div>
                                   </div>

                            
                            <?php }else{  ?>
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>درجة الإعاقة :</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->disability_degree?></h6>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>هل تستخدم أجهزة مساعدة:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?
                              if($record->use_devices == 1){
                                echo 'نعم ';
                              }else{
                               echo 'لا ';  
                              }
                              ?></h6>
                                      </div>
                                   </div>
                                   
                                   
                            
                            
                            
                            <?php 
                            
                            if($record->use_devices == 1){ ?>
                             <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>إذا كان الجواب بنعم أذكرها:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->use_devices_details?></h6>
                                      </div>
                                   </div>
                                  
                            <?php  }else{ ?>
                             
                            <?php  } ?>
                            
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>هل أنت مسجل لدي جمعية اخري:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?
                              if($record->be_in_another_society == 1){
                                echo 'نعم ';
                              }else{
                               echo 'لا ';  
                              }
                              ?></h6>
                                      </div>
                                   </div>
                               
                            
                            <?php 
                            
                            if($record->be_in_another_society == 1){ ?>
                            
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>:إذا كان الجواب بنعم أذكرها</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->society_name?></h6>
                                      </div>
                                   </div>
                                   
                            <?php  }else{ ?>
                             
                            <?php  } ?>
                            
                          <?php  }
                             ?>
                             
                              <div class="col-md-12">
                            <h5 class="text-center pop-title-text">بيانات الاتصال</h5>
                            </div>
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>جوال:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->contact_mob?></h6>
                                      </div>
                                   </div>
                            <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>هاتف:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->contact_phone?></h6>
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>جوال ولي الامر:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->contact_father_mob?></h6>
                                      </div>
                                   </div>
                             <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>إسم ولي الأمر:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->contact_father_name?></h6>
                                      </div>
                                   </div>
                               <div class="col-md-6">
                                      <div class="col-md-6" style="padding: 0;">			
                          				<h6 class="text-left pop-text"><b>بريد الكتروني:</b></h6>
         						      </div>
                                      <div class="col-md-6" style="padding: 0;">	
                                        <h6 class="text-left pop-text1"><?=$record->contact_email?></h6>
                                      </div>
                                   </div>
                            
                             
                             <div class="col-md-12">
                            <h5 class="text-center pop-title-text">المرفقات </h5>
                            </div>
                            
                                  <div class="col-xs-12">
                                  <table class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%;">
                            <thead>
                            <tr>
                                <th style="color: #ffffff; background-color: #428bca;">م</th>
                                <th style="color: #ffffff; background-color: #428bca;">المرفق</th>
                                <th style="color: #ffffff; background-color: #428bca; ">تحميل </th>
                            </tr>
                            </thead>
                            <tbody>
                         <?php if(!empty($record->photos)):
                             $a=1;
                             foreach ($record->photos as $row):
                            ?>
                         <tr>  
                        <td><?php  echo $a ;?></td>
                        <td> <?php echo $row->file?></td>
                        <td><a href="<?php echo base_url('disability_managers/Disability_manage/download/'.$row->file) ?>"><i class="fa fa-download" aria-hidden="true"></i></a>
                              </td>
                       </tr>
                        <?php  $a++;  endforeach; endif;?>
                        </tbody>
                        </table>  
</div>
   
      				                </div>
                                    </div>
                                    </div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
</div>
</div>
</div>
</div>
<!----------------------------------------------------------------->
</td>
<td> <a href="<?php echo base_url('disability_managers/Disability_manage/accepet_received').'/'.$record->id?>"> 
<i class="fa fa-check" aria-hidden="true"></i> </a> 
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
        </div>