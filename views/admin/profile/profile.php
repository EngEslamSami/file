<div class="col-sm-12" >
<div class="col-sm-4  " >
	<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
		<div class="panel-heading">
			<h3 class="panel-title">ffffffffff</h3>
		</div>
      
		<div class="panel-body"><br>
            <div class="col-md-12">
  
                     <div class="panel lobidisable panel-bd">
                     
 
 
 <?php
 
 
 if($users[0]->role_id_fk  == 1){
  $name = $users[0]->user_name;
     $dep_name = 'مدير علي النظام';
     $finace = 0;
     $emp_code = $users[0]->user_name;
     $role_name = 'مدير علي النظام ';
    
 }elseif($users[0]->role_id_fk == 2){
     $name =  $users[0]->member_name;
      $dep_name = 'مجلس الإدراة';
      $finace =0;
       $role_name = 'مجلس الإدراة';
    
 }elseif($users[0]->role_id_fk == 3){
    
     $name =  $users[0]->emp_name;
     $dep_name= $users[0]->emp_data->depart_name; 
     $finace = $users[0]->emp_data->salary + $users[0]->emp_data->b_sakn + $users[0]->emp_data->b_mosalat 
                + $users[0]->emp_data->b_amal + $users[0]->emp_data->b_maesha - $users[0]->emp_data->k_tamen ; 
     
  $role_name = 'موظف علي النظام ';    
 }else{
    
 }
 
 
// echo $users[0]->user_id;
  

 
 /*
 echo '<pre>';
 print_r($users);
 echo '<pre>';

 
 */
 
 
 
 
 
 ?>
 
<!---------------------------->

                       
                        <div class="modal-body">
                           <div class="row">
                              
                              
                              <div class="col-md-12">
                                 <!-- User widget -->
                                 <div class="user-widget list-group">
                                    <div class="list-group-item heading">
                                    
                          
                                       <img style="width: 100px;" class="media-object img-circle" src="<?php echo base_url(); ?>asisst/admin_asset/img/avatar5.png" alt="image">
                                     <!--  <div class="text-wrap">
                                          <h4 class="list-group-item-heading"><?php echo $name; ?></h4>
                                       </div>-->
                                       <div class="clearfix"></div>
                                    </div>
                                    <a href="#" class="list-group-item">
                                       <p class="pull-right"> <?php echo $name; ?></p>
                                       <p class="list-group-item-text text-danger "><strong> الإسم :</strong></p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                       <p class="pull-right">  <?php echo $dep_name; ?></p>
                                       <p class="list-group-item-text text-danger"><strong>الإدارة :</strong></p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                       <p class="pull-right"> <?php echo $role_name; ?></p>
                                       <p class="list-group-item-text text-danger"><strong>الدور علي النظام :</strong></p>
                                    </a>
                                
                                 </div>
                              </div>
                           <div class="col-md-12">
                                 
                                 <div class="user-widget list-group">
                                    <div class="list-group-item heading">
                                       <div class="text-wrap">
                                          <h4 class="list-group-item-heading">بيانات مالية</h4>
                                       </div>
                                       <div class="clearfix"></div>
                                    </div>
                                    <a href="#" class="list-group-item">
                                       <p class="pull-right"> <?php echo $finace; ?> </p>
                                       <p class="list-group-item-text text-primary"><strong>الراتب :</strong></p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                       <p class="pull-right"> 0 </p>
                                       <p class="list-group-item-text text-primary"><strong>الخصومات:</strong></p>
                                    </a>
                                    <a href="#" class="list-group-item">
                                       <p class="pull-right"> <?php echo $finace; ?> </p>
                                       <p class="list-group-item-text text-primary "><strong>إجمالي الراتب:</strong></p>
                              
                                    </a>
                                 </div>
                              </div> 
                            <!--  <div class="form-horizontal col-md-12">
                                 <div class="panel panel-info">
                                    <div class="panel-heading">
                                       <div class="panel-title">
                                          <strong>بيانات مالية</strong>
                                       </div>
                                    </div>
                                    <div class="panel-body">
                                       <div class="">
                                          <label class="col-sm-6 control-label">
                                          <strong>الراتب  :</strong></label>
                                          <p class="form-control-static"><?php echo $finace; ?></p>
                                       </div>
                                       <div class="">
                                          <label class="col-sm-6 control-label">
                                          <strong>الخصومات  :</strong></label>
                                          <p class="form-control-static">0</p>
                                       </div>
                                       <div class="">
                                          <label class="col-sm-6 control-label">
                                          <strong>إجمالي الراتب :</strong></label>
                                          <p class="form-control-static"><?php echo $finace; ?></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           
                           -->
                           
                           
                           
                           </div>
                        </div>
                   





<!---------------------------->
                     </div>
                 




</div>
</div>
</div>

</div>



<!---------------------------------------->
<div class="col-sm-8  " >
	<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
		<div class="panel-heading">
			<h3 class="panel-title">ffffffffff</h3>
		</div>
      
		<div class="panel-body"><br>
            <div class="col-md-12">
  
                     <div class="panel lobidisable panel-bd">
                     
                      
                           <form>
                              <div class="form-group">
                                 <label>From</label>
                                 <select class="form-control">
                                    <option>Bank of asia</option>
                                    <option>Brac Bank</option>
                                    <option>National Bank</option>
                                    <option>Exim Bank</option>
                                    <option>datchbangla Bank</option>
                                    <option>Sonali Bank</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>To</label>
                                 <select class="form-control">
                                    <option>Bank of asia</option>
                                    <option>Brac Bank</option>
                                    <option>National Bank</option>
                                    <option>Exim Bank</option>
                                    <option>datchbangla Bank</option>
                                    <option>Sonali Bank</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Date</label>
                                 <div class=" input-group date form_date">
                                    <input id='minMaxExample' type="text" class="form-control years"><span class="input-group-addon"><a href="#"><i class="fa fa-calendar"></i></a></span>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Description</label>
                                 <input type="text" class="form-control" placeholder="Enter Short description" required>
                              </div>
                              <div class="form-group">
                                 <label>Amount</label>
                                 <input type="number" class="form-control" placeholder="Enter Amount" required>
                              </div>
                              <div class="form-group">
                                 <label>Tags</label>
                                 <input type="text" class="form-control" placeholder="Enter tags" required>
                              </div>
                              <div class="form-group">
                                 <button type="submit" class="btn btn-add"><i class="fa fa-check"></i> Submit
                                 </button>
                              </div>
                           </form>
                    
                     </div>
                 




</div>
</div>
</div>

</div>




</div>




