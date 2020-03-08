<style>
.table-bordered.table-details tbody > tr > td{
    font-size: 13px !important;
        white-space: pre-line;
}
</style>
<div class="col-md-2 no-padding" >
        
        <div class="user-profile">
             <?php 
                       
                $user_img="";
                if(isset($personal_data)){
                    $user_img=  $personal_data[0]->personal_photo ;
                }?>
			<span class="profile-picture">
				<img id="profile-img-tag" class="editable img-responsive" alt="<?php if(isset($personal_data)){  echo $personal_data[0]->employee;}?>" src="<?=base_url()?>/uploads/images/<?php echo $user_img ?>" onerror="this.src='<?php echo base_url()?>/asisst/fav/apple-icon-120x120.png'" />
				
			</span>

			<div class="space-4"></div>

			<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
				<div class="inline position-relative">
					<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
						<i class="ace-icon fa fa-circle light-green"></i>
						&nbsp;
						<span class="white"><?php if(isset($personal_data)){  echo $personal_data[0]->employee;}?></span>
					</a>

					<ul class="align-right dropdown-menu dropdown-caret dropdown-lighter">
						<li class="dropdown-header"> تغيير الحالة </li>

						<li>
							<table class="table-bordered table table-details" style="table-layout: fixed;">
                                <tbody>
                                    <tr>
                                           
                                         <td><strong class="text-danger "> إسم الموظف : </strong><?php if(isset($personal_data)){  echo $personal_data[0]->employee;}?></td>
                                    </tr>
                                    
                                    
                                     <tr>
                                         
                                         <td><strong class="text-danger ">الإدارة :</strong> <?php if(isset($personal_data)){ echo  $personal_data[0]->admin_name;}?></td>
                                    </tr>
                                    
                                     <tr>
                                       
                                         <td><strong class="text-danger ">القسم :</strong> <?php if(isset($personal_data)){ echo $personal_data[0]->depart_name;}?></td>
                                    </tr>
                                    
                                     <tr>
                                        
                                  
                                         <td><strong class="text-danger ">المسمى الوظيفى :  </strong> <?php if(isset($personal_data)){ echo  $personal_data[0]->degree_name;}?></td>
                                    </tr>
                                    
                                     <tr>
                                      
                                   
                                        <td ><strong class="text-danger ">المدير المباشر : </strong> <?php if(isset($personal_data)){ echo  $personal_data[0]->manger_name;}?></td>
                                    </tr>
                                    
                                </tbody>
                                
                                </table>
						</li>

						
                        
					</ul>
				</div>
			</div>
            
            
            <div class="space-6"></div>
    		<div class="profile-contact-info">
    			<div class="profile-contact-links align-right">
    				<a href="#" class="btn btn-link">
    					<i class="ace-icon fa fa-plus-circle bigger-120 green"></i>
    					تعديل بيانات حسابى
    				</a>
    
    				<a href="#" class="btn btn-link">
    					<i class="ace-icon fa fa-envelope bigger-120 pink"></i>
    					إرسال رسالة
    				</a>
    
    				<a href="#" class="btn btn-link">
    					<i class="ace-icon fa fa-globe bigger-125 blue"></i>
    					www.alexdoe.com
    				</a>
    			</div>
    
    		</div>
        
        
		</div>
        
        
</div>
        