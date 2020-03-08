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
</span>
<div class="col-xs-12">
                <?php if(isset($results)):?>
                <?php echo form_open_multipart('Directors/Directors/update_council/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

                    <div class="details-resorce">
                        <div class="col-xs-12 r-inner-details">
                            <div class="col-xs-12">
                                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> كود المجلس </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
           <input type="text" name="" class="r-inner-h4 " 
           value="<?php echo $this->uri->segment(4); ?>" readonly=""/>
                                        </div>
                                    </div>
                                  
           <div class="col-xs-12 ">
                <div class="col-xs-6">
                    <h4 class="r-h4 ">  تاريخ التعيين </h4>
                </div>
                <div class="col-xs-6 r-input ">
                  <input type="date" class="form-control " 
                  value="<?php echo date('Y-m-d',$results['appointment_date']) ?>" 
                  name="appointment_date" data-validation="required" > 
                </div>
            </div>
                                   
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4">  صورة القرار </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                          <input type="file" name="decison_img" class="file_input_with_replacement-1" />
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                   <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> رقم قرار التعيين </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="number" name="appointment_decison_number" class="r-inner-h4 " value="<?php echo $results['appointment_decison_number'] ?>" data-validation="required">
                                        </div>
                                    </div>
<div class="col-xs-12 ">
<div class="col-xs-6">
<h4 class="r-h4 ">  تاريخ الانتهاء </h4>
</div>
<div class="col-xs-6 r-input ">
<input type="date" class="form-control " 
value="<?php echo date('Y-m-d',$results['expiration_date']) ?>
" name="expiration_date" data-validation="required" >
</div>
</div>
                                    
                                    <div class="col-xs-12 "> 
                                         <div class="col-xs-6"> 
                                             <img src="<?php echo base_url('uploads/images').'/'.$results['decison_img'] ?>" width="100px" height="100px" />
                                        </div></div>
                                    
                                </div>
                            </div>
                           
                             <div class="col-xs-4"></div>
                            <div class="col-xs-2">
                                <input type="submit" class="btn center-block r-manage-btn2"   name="update" value="تعديل" />

                            </div>
                         <div class="col-xs-6"></div>
                            <?php echo form_close()?>

                        </div>
                <?php else: ?>

                <?php echo form_open_multipart('Directors/Directors/add_council',array('class'=>"",'role'=>"form" ))?>


                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-xs-12">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> كود المجلس </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <?php ?>
         <input type="text" name="" class="r-inner-h4 " readonly=""
          readonly="" value="<?php echo (($last_id+1)) ?>" data-validation="required" >
                                    </div>
                                </div>
 <div class="col-xs-12 ">
    <div class="col-xs-6">
        <h4 class="r-h4 ">  تاريخ التعيين </h4>
    </div>
    <div class="col-xs-6 r-input ">
    <input type="date" class="form-control "
         name="appointment_date" 
               data-validation="required" />
    </div>
</div>

                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                 <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> رقم قرار التعيين </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="number" name="appointment_decison_number" class="r-inner-h4 " value="" data-validation="required"/>
                                    </div>
                                </div>
    <div class="col-xs-12 ">
        <div class="col-xs-6">
            <h4 class="r-h4 ">  تاريخ الانتهاء </h4>
        </div>
        <div class="col-xs-6 r-input ">
           <input type="date" class="form-control " name="expiration_date"
      data-validation="required"/>
        </div>
    </div>
                            </div>
                        </div>
                        <div class="col-xs-12 r-input">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4">  صورة القرار </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <div class="field manage-field">
                                            <input type="file" name="decison_img" class="file_input_with_replacement-1" data-validation="required"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-xs-4"></div>
                        <div class="col-xs-2">
                            <input type="submit" class="btn center-block"   name="add" value="حفظ" />
                        </div>
                        <div class="col-xs-6"></div>
                        <?php echo form_close()?>

                    </div>
</div>
<?php endif; ?>                    
                    <!---table------>
<?php if(isset($records)&&$records!=null):?>
                 <div class="col-xs-12">
                        <div class="panel-body">
                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">رقم قرار التعيين </th>
                                            <th class="text-center">تاريخ التعيين </th>
                                            <th class="text-center">تاريخ الانتهاء </th>
                                            <th class="text-center">الاجراء</th>
                                            <th class="text-center">التفاصيل</th>
                                            <th class="text-center">حالة </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
<?php $a=1;foreach ($records as $record ):
                 if($record->status == 1) {
                                    $class = 'manage-run';
                                    $title = 'نشط';
                                    $bt_class='success';
                                    $set=0;
                 }elseif($record->status == 0){
                                    $class = 'manage-work';
                                    $title = 'غير نشط';
                                    $bt_class='danger';
                                    $set=1;
                                }?>
<tr>
    <td><?php echo $a ?> </td>
    <td><?php echo $record->appointment_decison_number ?></td>
    <td><?php echo  date('Y-m-d',$record->appointment_date) ?></td>
    <td><?php echo  date('Y-m-d',$record->expiration_date) ?></td>
    <td class="text-center">
    <a href="<?php echo base_url().'Directors/Directors/update_council/'.$record->id?>">
    <i class="fa fa-pencil " aria-hidden="true" >
    </i>
    </a> 
    <a href="<?php echo base_url().'Directors/Directors/delete_council/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
    <i class="fa fa-trash" aria-hidden="true">
    </i>
    </a> 
       <!-- <a class="pop-manage" data-toggle="modal" data-target=".firstModal<?php echo $record->id ?>">
              <i class="fa fa-info" aria-hidden="true"></i></a>  -->
      </td>
       
    <td>
      <i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal" data-target="#firstModal<?php echo $record->id ?>"></i>
      </td>
    <td>  <a href="<?php echo base_url().'Directors/Directors/suspend_council/'.$record->id.'/'.$set?>"> 
    <button type="button" class="btn btn-sm btn-<?php echo $bt_class?>" ><?php echo $title ?></button>      </a></td>
</tr>
<!-------------------------------------------------------------------------------------------------------------->
<!--div class=" modal fade firstModal<?php echo $record->id ?>" tabindex="-1" id="firstModal<?php echo $record->id ?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-manage">
            <h4 class="pop-manage-h4"> جميع التفاصيل المتعلقة بالمجلس رقم <span class="pop-manage-span"> <?php echo $record->appointment_decison_number ?> </span></h4>
            <h4 class="pop-manage-h4"> تاريخ أنشاء المجلس : <span class="pop-manage-span"> <?php echo  date('Y-m-d',$record->appointment_date) ?> </span></h4>
            <h4 class="pop-manage-h4">تاريخ إنتهاء المجلس :<span class="pop-manage-span"><?php echo  date('Y-m-d',$record->expiration_date) ?> </span></h4>
            <h4 class="pop-manage-h4">حالة المجلس الأن :<span class="pop-manage-span"><?php echo $title ?></span></h4>
           <?php if(isset($get_members[$record->id]) && $get_members[$record->id]!=null){ ?>
            <h4 class="pop-manage-h4">عدد أعضاء المجلس :<span class="pop-manage-span">1</span> <button class="btn pop-member-manage"  data-toggle="modal" data-target=".inner-firstModal<?php echo $record->id ?>"> تفاصيل اللاعضاء</button></h4> 
            <div class="modal fade inner-firstModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-manage next-manage-pop"> 
                    <h4 class="pop-next-manage-h4">الاعضاء المقيدون بالمجلس</h4>
                     <?php $a=1; foreach($get_members[$record->id] as $row):?>  
                    <h4 class="pop-next-manage-h4"> <?php echo $a++?>- <?php echo $jobs[$row->job_title_id_fk]->name?> :
                                  <span class="pop-manage-span"><?php echo $row->member_name?></span>
                    </h4>
                <?php endforeach;?>
                </div>
            </div>
           <?php }?>
            <div class="modal-footer ">
                <button type="button" class="btn manage-close-pop" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div-->
    
    
<!-------------------------------------------------------------------------------------------------------------->


<div class="modal" id="firstModal<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
					            	<div class="modal-header">
					                	<button type="button" class="close" data-dismiss="modal">&times;</button>
					                	<h4 class="modal-title"> جميع التفاصيل المتعلقة بالمجلس رقم: <?=$record->appointment_decison_number?></h4>
					             	</div>
				       
				           			<div class="modal-body">
				       					<div class="row">
				       					

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>تاريخ أنشاء المجلس:</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=date('Y-m-d',$record->appointment_date)?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>تاريخ إنتهاء المجلس :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=date('Y-m-d',$record->expiration_date)?></h6>
					               				</div>
				               				</div>

				               				<div class="col-md-12 space">
				               					<div class="col-md-5">
						               				<h5><b>حالة المجلس الأن :</b></h5>
						               			</div>
					               				<div class="col-md-7">
					               					<h6><?=$title?></h6>
					               				</div>
				               				</div>
 <?php if(isset($get_members[$record->id]) && $get_members[$record->id]!=null){ ?>
            
            <div class="col-md-12 space">
	        <div class="col-md-5">
			<h5><b>عدد أعضاء المجلس :</b></h5>
			</div>
			<div class="col-md-7">
			<h6><?=sizeof($get_members[$record->id]);?></h6>
			</div>
			</div>
           
           <!--div class="col-md-12 space">
	        <div class="col-md-5">
			<h5><b>تفاصيل اللاعضاء:</b></h5>
			</div>
			<div class="col-md-7">
			 <?php $a=1; foreach($get_members[$record->id] as $row):?>  
              <h4 class="pop-next-manage-h4"> <?php echo $a++?>- <?php echo $jobs[$row->job_title_id_fk]->name?> :
              <span class="pop-manage-span"><?php echo $row->member_name?></span>
              </h4>
             <?php endforeach;?>
			</div>
			</div -->
           
   <div class="col-xs-12 space" >
   <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" style="position: absolute;
    top: -34px;left: 22%;">تفاصيل الاعضاء </button>
   <div id="demo" class="collapse">
  <div class="col-md-12" style="background-color: #eee; margin-top: 15px;">
			 <?php $a=1; foreach($get_members[$record->id] as $row):?>  
              <h4 class="pop-next-manage-h4" style="padding: 6px;"> <?php echo $a++?>- <?php echo $jobs[$row->job_title_id_fk]->name?> :
              <span class="pop-manage-span"><?php echo $row->member_name?></span>
              </h4>
             <?php endforeach;?>
			</div>
  </div>
  </div>
            
           <?php } ?>
  
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
</div>
</div>
</div>
</div>

<?php $a++;endforeach;  ?>
                                    
                                    
                                    
                                    
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
<?php endif; ?>   
</div>  
</div>    
</div>  
</div>      