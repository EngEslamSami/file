<div class="col-sm-12 no-padding " >

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> اسناد مهمه  </h3>
         </div>
        <div class="panel-body" >
           <div class="vertical-tabs">
           <div class="col-sm-12 no-padding ">





<div class="col-xs-9 no-padding">

        <?php
if (isset($item) && !empty($item)) {
   
 
    $mohma_name=$item->mohma_name;
$subject=$item->subject;

$awlawya=$item->awlawya;

$esthkak_date=$item->esthkak_date;
$from_user_id=$item->from_user_id;
$from_user_name=$item->from_user_name;
$to_user_id=$item->to_user_id;
$to_user_name=$item->to_user_name;
$status=$item->status;
   
   



} else {
   
    $mohma_name='';
$subject='';

$awlawya='';
  
  $esthkak_date=date('Y-m-d');

  $from_user_id='';
$from_user_name='';
$to_user_id='';
$to_user_name='';
 $status='';

}
?>
   <?php
                    if (isset($item) && !empty($item)){
                    ?>
                    <form action="<?php echo base_url() . 'all_secretary/archive/mohma/Add_mohma/update/' . $item->id; ?>"
                          method="post" id="form1">

                        <?php } else{ ?>
                        <form action="<?php echo base_url(); ?>all_secretary/archive/mohma/Add_mohma/add"
                              method="post" id="form1">

                            <?php } ?>

                   
                    <div class="col-md-3 col-sm-4 padding-4">
                      <label class="label">اسم المهمه</label>
                      <input type="text" class="form-control" placeholder=""  id="mohma_name" name="mohma_name" data-validation="required" value="<?= $mohma_name ?>"/>
                    </div>
                   
                     <div class="col-md-4 col-sm-4 col-xs-6">
                         <label class="label">اسناد الي</label>
                        
                         <input type="text" class="form-control"
                         placeholder=" حدد المستخدم أو القسم" type="text" style="width: 78%;float: right;"
                                   name="to_user_n" id="to_user_n"  
                                   readonly="readonly"
                                   onclick="$('#tahwelModal').modal('show'); "

                                 

                                   value="">
                        
                            <input type="hidden" name="tahwel_type" id="tahwel_type" value="">
                            <input type="hidden" name="tawel_id" id="tawel_id" value="">

                            <button type="button"
                                    onclick="$('#tahwelModal').modal('show');"
                                    class="btn btn-success btn-next" >
                                <i class="fa fa-plus"></i></button>
                     </div>
                     
                    

                     <!--  -->
                     <div class="col-md-3 padding-4">
                        <label class="label ">الاولويه</label>
                        <select  name="awlawya"  data-validation="required" id="awlawya"
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            $arr = array(2=>'عادي',1 => 'هام', 0 => ' هام جدا');
                            foreach ($arr as $key => $value) {
                                $select = '';
                                if ($awlawya != '') {
                                    if ($key == $awlawya) {
                                        $select = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
                  </div>
                    
                   
                    
                    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label"> تاريخ الاستحقاق</label>
                      <input type="date" class="form-control" placeholder="" id="esthkak_date" name="esthkak_date"  data-validation="required" value="<?= $esthkak_date ?>"/>
                    </div>


                   



                    <div class="col-md-3 col-sm-4 padding-4">
                      <label class="label">الموضوع</label>
                      <input type="text" class="form-control" id="subject" name="subject" placeholder="" value="<?= $subject ?>"/>
                    </div>
                    <div class="col-md-3 col-sm-4 padding-4">
                        <label class="label ">الحاله</label>
                        <select  name="status"  data-validation="required" id="status_m"
                                class="form-control">
                            <option value="">إختر</option>
                            <?php
                            $arr = array(2=>'تم التنفيذ',1 => 'قيد التنفيذ');
                            foreach ($arr as $key => $value) {
                                $select = '';
                                if ($status != '') {
                                    if ($key == $status) {
                                        $select = 'selected';
                                    }
                                } ?>
                                <option
                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                <?php
                            }
                            ?>
                          
                        </select>
                  </div>

                    



              
         </div>
         <div class="col-xs-3 no-padding">
                       <h5>قائمة المستلمين</h5>
                       
                      
                       <div  class="recived-names">
                         <ol >
                            
                           
                           
                     
                            
                         </ol>
                       </div>
                    </div>  
         <br/>
         <br/>
         <br/>
         

        
         <div class="col-xs-12 text-center" style="margin-top: 0px;">
         <div  id="div_add_travel_type" style="display: block;">
         
         
                    <button type="button" 
                        
                           onclick="add_mohma()"
                   
                    
                  
                     class="btn btn-labeled btn-success " name="save" value="save">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>اسناد المهمه
                    </button>
                    
         </div>
         <div  id="div_update_travel_type" style="display: none;">

        
                    <button type="button" class="btn btn-labeled btn-yellow " name="save" value="save" id="update_travel_type">
                        <span class="btn-label"><i class="fa fa-search-plus"></i></span> تعديل المهمه
                    </button>
                   
          
    
          </div>  

          
                  
                    
                    
                   
    
         </div>















         </div>
         </div>
         </div>
         </div>
         </div>
       


</form>

<div class="modal fade"  id="tahwelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="radio-content">
                    <input type="radio" id="esnad1" name="esnad_to"  class="sarf_types" value="1" onclick="load_tahwel()">
                    <label for="esnad1" class="radio-label"> موظف</label>
                </div>
              
                </div>

                <div class="col-xs-12" id="tawel_result" style="display: none;">



                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-4">
    <div class="latest_notification">
    
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dash_tab1" aria-controls="home" role="dash_tab1" data-toggle="tab"><i class="fa fa-bell-o"></i> المهام الصادره</a></li>
        <li role="presentation"><a href="#dash_tab2" aria-controls="dash_tab2" role="tab" data-toggle="tab"><i class="fa fa-thumb-tack"></i>  المهام الوارد <span class="badge badge-warning">12</span></a></li>
        <li role="presentation"><a href="#dash_tab3" aria-controls="dash_tab3" role="tab" data-toggle="tab"><i class="fa fa-retweet"></i>  المهام التي تم تنفيذها <span class="badge badge-danger">5</span></a></li>
        <li role="presentation"><a href="#dash_tab4" aria-controls="dash_tab4" role="tab" data-toggle="tab"><i class="fa fa-reply"></i>  المهام التي لم يتم تنفيذها</a></li>
        
      </ul>
    
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="dash_tab1">
        
     
 <div id="my">

<?php

                        if (!empty($record)) { ?>
                            <table id="example8" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                               
                                    <th class="text-center">م </th>
                                    <th class="text-center">تاريخ المهمه</th>
                                    <th class="text-center">  اسم المهمه</th>
                                    <th class="text-center">محول من</th>
                                    <th class="text-center">محول الي</th>
                                    <th class="text-center"> الالوليه</th>
                                    <th class="text-center">تاريخ الاستحقاق</th>
                                    <th class="text-center">الحاله</th>
                                    <th class="text-center">الإجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                               
                                foreach ($record as $value) {
                                    if ($_SESSION['role_id_fk'] == 1 || $value->from_user_id==$_SESSION['emp_code']) {
                                         if($value->suspend==0){
                                    ?>
                                    <tr>
                                      
                                         
                                    <td><?= $value->id ?></td>
                                    <td><?= $value->date_ar ?></td>
                                        <td><?= $value->mohma_name ?></td>
                                        <td><?= $value->from_user_name ?></td>
                                        <td><?= $value->to_user_name ?></td>
                                        <td><?php if($value->awlawya ==1)
                                        {
                                            echo 'هام';

                                        }elseif($value->awlawya ==2)
                                        {
                                            echo 'عادي';

                                        }elseif($value->awlawya ==0)
                                        {
                                            echo 'هام جدا';

                                        }
                                        
                                        ?></td>
                                        <td><?= $value->esthkak_date ?></td>
                                        <td><?php if($value->status==1)
                                        {?>
                                        <span class="label label-warning">
                                        <?php
                                           
                                            echo 'قيد التنفيذ';
                                        } elseif($value->status==2){?>
                                        </span>
                                       <span class="label label-success">
                                           
                                            <?php
                                            echo 'تم التنفيذ';
                                            

                                        }
                                        
                                        
                                        
                                        ?></span>
                                        
                                        
                                        </td>
                                      
                                        <td>
                                          
                                          <a href="#" onclick="delete_travel_type(<?= $value->id ?>);"> <i class="fa fa-trash"> </i></a>

                                        <a href="#" onclick="update_travel_type(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        <a data-toggle="modal" data-target="#myModal-view_photo-<?= $value->id ?>">
                                    <i class="fa fa-cogs" title=" قراءة"></i> </a>
                                <!-- modal view -->
                                <div class="modal fade" id="myModal-view_photo-<?= $value->id ?>" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">حاله المهمه</h4>
                                            </div>
                                            <div class="modal-body">
                                           
                                           
                                            <form action="<?php echo base_url() . 'all_secretary/archive/mohma/Add_mohma/update_halat_mohma/' . $value->id; ?>"
                          method="post" id="form1">
                            <table id="exampleeee8" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <th width="2%">#</th>
                                    <th class="text-center">   انهاء المعامله</th>
                                    <th class="text-center">  النسبه</th>
                                   
                     
                                </tr>
                                </thead>
                                <tbody>
                               
                                    <tr>
                                        <td><input type="radio" name="radio_end" data-title="<?= $value->id ?>"
                                                   id="radio_end1<?= $value->id ?>"  onclick="get_abel(<?= $value->id ?>)" value="1"
                                                  >
                                                 
                                                  
                                                   
                                        </td>
                                        <td>تم الانتهاء بنسبه</td>
                                        <td>
                                        <input type="text" id="percentage1<?= $value->id ?>" name="percentage" value="" disabled />%
                                         </td>
                                        
                           
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="radio_end" data-title="<?= $value->id ?>"
                                                   id="radio_end2<?= $value->id ?>" onclick="get_abel2(<?= $value->id ?>)" value="2"
                                                  >
                                                  
                                                   
                                        </td>
                                        <td>لم يتم الانتهاء بنسبه</td>
                                        <td>
                                        <input type="text" id="percentage2<?= $value->id ?>" name="percentage" value="" disabled />%
                                         </td>
                                        
                           
                                    </tr>
                                  
                                  
                                </tbody>
                            </table>


                       
                        </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
            <button type="submit"
                                class="btn btn-labeled btn-success "  
                               >
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                        </form>
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>





















                                           
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                        
                                

                                        </td>
                                    </tr>
                                    <?php
                                }}}
                                ?>
                                </tbody>
                            </table>


                        <?php } ?>

</div>
        
        
        </div>
        <div role="tabpanel" class="tab-pane" id="dash_tab2">
        

       
<?php

                        if (!empty($record)) { ?>
                            <table id="example8" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                               
                                    <th class="text-center">م </th>
                                    <th class="text-center">تاريخ المهمه</th>
                                    <th class="text-center">  اسم المهمه</th>
                                    <th class="text-center">محول من</th>
                                    <th class="text-center">محول الي</th>
                                    <th class="text-center"> الالوليه</th>
                                    <th class="text-center">تاريخ الاستحقاق</th>
                                    <th class="text-center">الحاله</th>
                                    <th class="text-center">الاجراء</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                               
                                foreach ($record as $value) {
                                    if ($value->to_user_id==$_SESSION['emp_code']) {
                                            if($value->suspend==0){
                                    ?>
                                    <tr>
                                      
                                         
                                    <td><?= $value->id ?></td>
                                    <td><?= $value->date_ar ?></td>
                                        <td><?= $value->mohma_name ?></td>
                                        <td><?= $value->from_user_name ?></td>
                                        <td><?= $value->to_user_name ?></td>
                                        <td><?php if($value->awlawya ==1)
                                        {
                                            echo 'هام';

                                        }elseif($value->awlawya ==2)
                                        {
                                            echo 'عادي';

                                        }elseif($value->awlawya ==0)
                                        {
                                            echo 'هام جدا';

                                        }
                                        
                                        ?></td>
                                        <td><?= $value->esthkak_date ?></td>
                                        <td><?php if($value->status==1)
                                        {?>
                                        <span class="label label-warning">
                                        <?php
                                           
                                            echo 'قيد التنفيذ';
                                        } elseif($value->status==2){?>
                                        </span>
                                       <span class="label label-success">
                                           
                                            <?php
                                            echo 'تم التنفيذ';
                                            

                                        }
                                        
                                        
                                        
                                        ?></span>
                                        
                                        
                                        </td>
                                        <td>
                                     
                                        <a data-toggle="modal" data-target="#myModal-view_photo-<?= $value->id ?>">
                                    <i class="fa fa-cogs" title=" قراءة"></i> </a>
                                <!-- modal view -->
                                <div class="modal fade" id="myModal-view_photo-<?= $value->id ?>" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">حاله المهمه</h4>
                                            </div>
                                            <div class="modal-body">
                                           
                                           
                                            <form action="<?php echo base_url() . 'all_secretary/archive/mohma/Add_mohma/update_halat_mohma/' . $value->id; ?>"
                          method="post" id="form1">
                            <table id="exampleeee8" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <th width="2%">#</th>
                                    <th class="text-center">   انهاء المعامله</th>
                                    <th class="text-center">  النسبه</th>
                                   
                     
                                </tr>
                                </thead>
                                <tbody>
                               
                                    <tr>
                                        <td><input type="radio" name="radio_end" data-title="<?= $value->id ?>"
                                                   id="radio_end1<?= $value->id ?>"  onclick="get_abel(<?= $value->id ?>)" value="1"
                                                  >
                                                 
                                                  
                                                   
                                        </td>
                                        <td>تم الانتهاء بنسبه</td>
                                        <td>
                                        <input type="text" id="percentage1<?= $value->id ?>" name="percentage" value="" disabled />%
                                         </td>
                                        
                           
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="radio_end" data-title="<?= $value->id ?>"
                                                   id="radio_end2<?= $value->id ?>" onclick="get_abel2(<?= $value->id ?>)" value="2"
                                                  >
                                                  
                                                   
                                        </td>
                                        <td>لم يتم الانتهاء بنسبه</td>
                                        <td>
                                        <input type="text" id="percentage2<?= $value->id ?>" name="percentage" value="" disabled />%
                                         </td>
                                        
                           
                                    </tr>
                                  
                                  
                                </tbody>
                            </table>


                       
                        </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
            <button type="submit"
                                class="btn btn-labeled btn-success "  
                               >
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                        </form>
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>





















                                           
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                        
                               
                                        </td>
                                      
                                        
                                    </tr>
                                    <?php
                                }}}
                                ?>
                                </tbody>
                            </table>


                        <?php } ?>





        
        
        </div>
        <div role="tabpanel" class="tab-pane" id="dash_tab3">
        <?php
                      //  echo '<pre>'; print_r($reasons_settings);
                        
                        if (!empty($record)) { ?>
                            <table id="example8" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                               
                                    <th class="text-center">م </th>
                                    <th class="text-center">تاريخ المهمه</th>
                                    <th class="text-center">  اسم المهمه</th>
                                    <th class="text-center">محول من</th>
                                    <th class="text-center">محول الي</th>
                                    <th class="text-center"> الالوليه</th>
                                    <th class="text-center">تاريخ الاستحقاق</th>
                                    <th class="text-center">الحاله</th>
                                  
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                foreach ($record as $value) {
                                 if($value->suspend==1){
                                    if ($_SESSION['role_id_fk'] == 1 || $value->to_user_id==$_SESSION['emp_code'] || $value->from_user_id==$_SESSION['emp_code']) {
                                    ?>
                                    <tr>
                                      
                                         
                                    <td><?= $value->id ?></td>
                                    <td><?= $value->date_ar ?></td>
                                        <td><?= $value->mohma_name ?></td>
                                        <td><?= $value->from_user_name ?></td>
                                        <td><?= $value->to_user_name ?></td>
                                        <td><?php if($value->awlawya ==1)
                                        {
                                            echo 'هام';

                                        }elseif($value->awlawya ==2)
                                        {
                                            echo 'عادي';

                                        }elseif($value->awlawya ==0)
                                        {
                                            echo 'هام جدا';

                                        }
                                        
                                        ?></td>
                                        <td><?= $value->esthkak_date ?></td>
                                        <td><?php if($value->status==1)
                                        {?>
                                        <span class="label label-warning">
                                        <?php
                                           
                                            echo 'قيد التنفيذ';
                                        } elseif($value->status==2){?>
                                        </span>
                                       <span class="label label-success">
                                           
                                            <?php
                                            echo 'تم التنفيذ';
                                            

                                        }
                                        
                                        
                                        
                                        ?></span>
                                        
                                        </td>
                                      
                                        
                                    </tr>
                                    <?php
                                }}}
                                ?>
                                </tbody>
                            </table>


                        <?php } ?>
         
        </div>
        <div role="tabpanel" class="tab-pane" id="dash_tab4">
        <?php
                      //  echo '<pre>'; print_r($reasons_settings);
                        
                        if (!empty($record)) { ?>
                            <table id="example8" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                               
                                    <th class="text-center">م </th>
                                    <th class="text-center">تاريخ المهمه</th>
                                    <th class="text-center">  اسم المهمه</th>
                                    <th class="text-center">محول من</th>
                                    <th class="text-center">محول الي</th>
                                    <th class="text-center"> الالوليه</th>
                                    <th class="text-center">تاريخ الاستحقاق</th>
                                    <th class="text-center">الحاله</th>
                                  
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                foreach ($record as $value) {
                                 if($value->suspend==2){
                                    if ($_SESSION['role_id_fk'] == 1 || $value->to_user_id==$_SESSION['emp_code']|| $value->from_user_id==$_SESSION['emp_code']) {
                                    ?>
                                    <tr>
                                      
                                         
                                    <td><?= $value->id ?></td>
                                    <td><?= $value->date_ar ?></td>
                                        <td><?= $value->mohma_name ?></td>
                                        <td><?= $value->from_user_name ?></td>
                                        <td><?= $value->to_user_name ?></td>
                                        <td><?php if($value->awlawya ==1)
                                        {
                                            echo 'هام';

                                        }elseif($value->awlawya ==2)
                                        {
                                            echo 'عادي';

                                        }elseif($value->awlawya ==0)
                                        {
                                            echo 'هام جدا';

                                        }
                                        
                                        ?></td>
                                        <td><?= $value->esthkak_date ?></td>
                                        <td><?php if($value->status==1)
                                        {?>
                                        <span class="label label-warning">
                                        <?php
                                           
                                            echo 'قيد التنفيذ';
                                        } elseif($value->status==2){?>
                                        </span>
                                       <span class="label label-success">
                                           
                                            <?php
                                            echo 'تم التنفيذ';
                                            

                                        }
                                        
                                        
                                        
                                        ?></span>
                                        
                                        </td>
                                      
                                        
                                    </tr>
                                    <?php
                                }}}
                                ?>
                                </tbody>
                            </table>


                        <?php } ?>
            
         
        </div>
       
       
      </div>
    
    </div>
</div>

<script>
    function load_tahwel() {
        $('#tawel_result').show();
        var type = $('input[name=esnad_to]:checked').val();
      //  alert(type);
        $('#tahwel_type').val(type);

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/mohma/Add_mohma/load_tahwel' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {

                $("#tawel_result").html(html);
            }
        });
    }
</script>
<script>
    function GettahwelName(id,name) {
       
        var checkBox = document.getElementById("myCheck"+id);
        var fieldHTML = '<div><input type="hidden" name="to_user_fk[]" value=""/></div>';
  if (checkBox.checked == true){
   // $('#text111').hide();
    
   $("ol").append("<li id='"+id+"'>"+name+"</li>");
 $('#to_user_n').append("<input type='hidden' id='to_user_fk"+id+"'  name='to_user_fk' value='"+id+"'/><input type='hidden'  data-validation='required' id='to_user_fk_name"+id+"' name='to_user_fk_name' value='"+name+"'/>");
    //$('#to_user_fk').val(id);
   //  $('#to_user_n').append(name);
   
  } else {
    $("#"+id).remove();
    
    $("#to_user_fk"+id).remove();
    $("#to_user_fk_name"+id).remove();

    

      //  $('#to_user_id').val(id);
        //$('#to_user_n').val(name);
       // $('#tahwelModal').modal('hide');


    }
    }
</script>


<script>
    function add_mohma()
    {
   
        var status_m=$('#status_m').val();
    var mohma_name=$('#mohma_name').val();
    var from_user_id=$('#from_user_id').val();
    var from_user_name=$('#from_user_name').val();
    var tahwel_type=$('#tahwel_type').val();
  //  var to_user_id=$('#to_user_fk').val();
  //  var to_user_name=$('#to_user_fk_name').val();
    var awlawya=$('#awlawya').val();
    var esthkak_date=$('#esthkak_date').val();
    var subject=$('#subject').val();
    var to_user_name = [];
    $("input[name='to_user_fk_name']").each(function(){
        to_user_name.push(this.value);
        });
        var to_user_id = [];
    $("input[name='to_user_fk']").each(function(){
        to_user_id.push(this.value);
        });


    console.log(to_user_name);
    console.log(to_user_id);
    if((mohma_name !='') && (to_user_name !='') && (awlawya!='') && (subject!='') )
{
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_secretary/archive/mohma/Add_mohma/add_mohma",
              type: "POST",
            data:{status_m:status_m,tahwel_type:tahwel_type,mohma_name:mohma_name,from_user_id:from_user_id,from_user_name:from_user_name,to_user_id:to_user_id,to_user_name:to_user_name,awlawya:awlawya,esthkak_date:esthkak_date,subject:subject},
            success:function(d){
               
                $('#mohma_name').val('');
           
$('#from_user_id').val('');
  $('#from_user_name').val('');
   $('#to_user_fk').val('');
    $('#to_user_fk_name').val('');
  $('#awlawya').val('');
   $('#esthkak_date').val('');
   $('#subject').val('');
   $('#tahwel_type').val('');
   $("#"+to_user_id).remove();
    
    $("#to_user_fk"+to_user_id).remove();
    $("#to_user_fk_name"+to_user_id).remove();
             
                swal({
    title: " تمت الاضافه بنجاح ",
    type: "success",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});
get_details_travel_type();
            }

        });
       } else{

     //   $('#result').html('برجاء اختيار الموظف');
        swal({
    title: " برجاء ادخال البيانات! ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});



        }
    }
</script>


<script>
    function get_details_travel_type(id) {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data:{id:id},
            url: "<?php echo base_url();?>all_secretary/archive/mohma/Add_mohma/load_travel_type",
            
            beforeSend: function () {
                $('#my').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#my').html(d);

            }

        });
    }
</script>


<script>
    function update_travel_type(id) {
        var id = id;
        $('#my').show();
        $('#div_add_travel_type').hide();
        $('#div_update_travel_type').show();


        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/mohma/Add_mohma/getById_travel_type",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                console.log(obj);
               console.log(obj.mohma_name);

                //$('#travel_type').val(obj.title_setting);


              
                $('#status_m').val(obj.status);
                $('#mohma_name').val(obj.mohma_name);
                $('#tahwel_type').val(obj.tahwel_type);
$('#from_user_id').val(obj.from_user_id);
  $('#from_user_name').val(obj.from_user_name);
 //  $('#to_user_fk').val(obj.to_user_id);
   $('#to_user_n').append("<input type='hidden' id='to_user_fk"+obj.to_user_id+"'  name='to_user_fk' value='"+obj.to_user_id+"'/><input type='hidden'  data-validation='required' id='to_user_fk_name"+obj.to_user_id+"' name='to_user_fk_name' value='"+obj.to_user_name+"'/>");
 //  $('#to_user_n').val(obj.to_user_name);
  $('#awlawya').val(obj.awlawya);
   $('#esthkak_date').val(obj.esthkak_date);
   $('#subject').val(obj.subject);

   $("ol").append("<li id='"+obj.to_user_id+"'>"+obj.to_user_name+"</li>");







            }

        });

        $('#update_travel_type').on('click', function () {
                    
    var status_m=$('#status_m').val();
    var tahwel_type=$('#tahwel_type').val();
    var mohma_name=$('#mohma_name').val();
    var from_user_id=$('#from_user_id').val();
    var from_user_name=$('#from_user_name').val();
    //var to_user_id=$('#to_user_fk').val();
  //  var to_user_name=$('#to_user_n').val();
    var awlawya=$('#awlawya').val();
    var esthkak_date=$('#esthkak_date').val();
    var subject=$('#subject').val();
    var to_user_name = [];
    $("input[name='to_user_fk_name']").each(function(){
        to_user_name.push(this.value);
        });
        var to_user_id = [];
    $("input[name='to_user_fk']").each(function(){
        to_user_id.push(this.value);
        });
        console.log(to_user_name);
    console.log(to_user_id);

    $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_secretary/archive/mohma/Add_mohma/update_mohma",
              type: "POST",
            data:{id:id,tahwel_type:tahwel_type,status_m:status_m,mohma_name:mohma_name,from_user_id:from_user_id,from_user_name:from_user_name,to_user_id:to_user_id,to_user_name:to_user_name,awlawya:awlawya,esthkak_date:esthkak_date,subject:subject},
            success:function(d){
            $('#mohma_name').val(' ');
            $('#status_m').val(' ');
$('#from_user_id').val(' ');
  $('#from_user_name').val(' ');
   $('#to_user_fk').val(' ');
    $('#to_user_n').val(' ');
    $('#tahwel_type').val('');
  $('#awlawya').val(' ');
   $('#esthkak_date').val(' ');
   $('#subject').val(' ');
   $("#"+to_user_id).remove();
    
    $("#to_user_fk"+to_user_id).remove();
    $("#to_user_fk_name"+to_user_id).remove();
             
                swal({
    title: " تمت التعديل بنجاح ",
    type: "success",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});
get_details_travel_type();

$('#div_add_travel_type').show();
        $('#div_update_travel_type').hide();
            }

        });

        });

    }

  
</script>
<script>
  
    
  function delete_travel_type(id) {
  //  confirm('?? ??? ????? ?? ????? ????? ?');
       var r = confirm('هل تريد حذف المعامله؟');
  if (r == true) {
      $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>all_secretary/archive/mohma/Add_mohma/delete_travel_type',
          data: {id: id},
          dataType: 'html',
          cache: false,
          success: function (html) {
           
            
              swal({
                  title: "تم الحذف بنجاح!",


  }
  );
  get_details_travel_type();

          }
      });
  }

}
</script>
<script>

function get_abel(id)
{
    document.getElementById("percentage1"+id).removeAttribute("disabled", "disabled");
    document.getElementById("percentage2"+id).setAttribute("disabled", "disabled");

}
</script>
<script>

function get_abel2(id)
{
    document.getElementById("percentage2"+id).removeAttribute("disabled", "disabled");
 
    document.getElementById("percentage1"+id).setAttribute("disabled", "disabled");
}
</script>

<script>
  
  function add_reason(id) {

    

var id=id;
    var value=$('#reason_id_fk').val();
    var name=$('#reason_name').val();
      if (value != 0 && value != '' ) {
         
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_reason_end',
              data: {id:id,value:value,name:name},
              dataType: 'html',
              cache: false,
              success: function (html) {

                $('#myModal-view_photo'+id).modal('hide');
          
                  swal({
                      title: "تم انهاء المعامله بنجاح!",


      }
      );
    
//$('#update_reason').hide();
$('#span_reason').append("<span class='label label-success' style='min-width: 140px;''>تم انهاءالمعامله </span>");
              }
          });
      }
      else
      {
        swal({
                      title: "برجاء اختيار سبب لايقاف المعامله!",


      }
      );
    

      }

  }


</script>