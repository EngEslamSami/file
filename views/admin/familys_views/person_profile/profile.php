<div class="col-sm-12" >
    <div class="col-sm-3  " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">البيانات الشخصية</h3>
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
                            $user_photo =$users[0]->user_photo;
                        }elseif($users[0]->role_id_fk == 2){
                            $name =  $users[0]->member_name;
                            $dep_name = 'مجلس الإدراة';
                            $finace =0;  // member_name_data
                            $name =  $users[0]->user_photo;;
                            $user_photo =$users[0]->user_photo;
                        }elseif($users[0]->role_id_fk == 3){
                            $name =  $users[0]->emp_name;
                            $dep_name= $users[0]->emp_data->depart_name;
							//replace
                            $finace = $users[0]->emp_data->sum_all_esthqaq ;
                            $role_name = 'موظف علي النظام ';
                            $user_photo=$users[0]->emp_data->personal_photo;
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
                                            <img style="width: 100px;" class="media-object center-block" src="<?php  echo base_url()."uploads/images/".$user_photo; ?>"
                                             onerror="this.src='<?php echo base_url()."asisst/fav/apple-icon-120x120.png"?>'" accesskey="" alt="image">
                                            <!--  <div class="text-wrap">
                                          <h4 class="list-group-item-heading"><?php echo $name; ?></h4>
                                       </div>-->
                                            <div class="clearfix"></div>
                                           
                                        </div>
                                         <a href="#" class="list-group-item" style="padding: 0;">
                                         <?php  if($users[0]->role_id_fk  == 1 || $users[0]->role_id_fk  == 3 ){?>
                                           
                                                <button type="button" style="width: 100%;font-size: 12px;" class="btn btn-success" data-toggle="modal" data-target="#modal-data">
                                                <i class="fa fa-pencil "  aria-hidden="true"></i>    إضغط لتعديل البيانات الشخصية  
                                                </button>
                                           
                                             <?php }?>
                                        </a>
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
    
    <div class="modal fade " id="modal-data" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-success modal-lg " role="document">
                <div class="modal-content ">
                    <div class="modal-header ">
                       
                        <h1 class="modal-title">تعديل البيانات الشخصية </h1>
                    </div>
                    <div class="modal-body row">
                    <?php echo form_open_multipart("family_controllers/PersonProfile/update_users/".$users[0]->user_id);?>
                      <!--------------------------------------------------------------->
                          <?php  if($users[0]->role_id_fk  == 1 || $users[0]->role_id_fk  == 3 ){?>
                         
                         <div class="col-sm-12 col-xs-12">
                         
                             <div class="col-sm-10 col-xs-12">
                                 <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label top-label">إسم المستخدم  </label>
                                    <input type="text" class="form-control   bottom-input" id="user_name" name="user_name" data-validation="required"  value="<?php  echo $users[0]->user_name; ?>"  >
                                </div>
                                 <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label top-label">رقم الجوال  </label>
                                    <input type="text" class="form-control   bottom-input " name="user_phone" placeholder=" رقم الجوال" value="<?php  echo $users[0]->user_phone;?>" data-validation="required" onkeypress="validate_number(event)">
                                </div>

                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label top-label">رقم الهوية  </label>
                                    <input type="text"  name="id_number" id="id_number"  data-validation="required" onkeypress="validate_number(event)"   value="<?php echo $users[0]->user_phone; ?>" class="form-control  bottom-input" placeholder=" رقم الهوية"  />
                                </div>
                                
                                    <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label top-label"> كلمة المرور <strong></strong> </label>
                                    <input type="password" id="user_pass" class="form-control  bottom-input"  name="user_pass" onkeyup="return valid('validate1','user_pass','button_update');" autocomplete="off"  placeholder=" كلمه المرور " />
                                    <span  id="validate1" class="span-validation"></span>
                                </div>
                                <div class="form-group col-sm-4 col-xs-12">
                                    <label class="label top-label">تاكيد كلمة المرور <strong></strong> </label>
                                    <input type="password"   id="user_pass_validate" class="form-control  bottom-input"  placeholder="تأكيد كلمة المرور" onkeyup="return valid2('validate','user_pass_validate','button_update','user_pass');"  />
                                    <span  id="validate" class="span-validation"> </span>
                                </div>
                              <!--  <div class="form-group col-sm-4">
                                <label class="label label-green  half">الصورة الشخصية </label>
                                <input type="file" name="user_photo" class="form-control half"  />
                                <small class="small" style="bottom:-13px;">
                                    <?php if (file_exists("uploads/images/".$user_photo) ){?>
                                        <a href="<?php echo base_url()?>uploads/images/<?php echo $user_photo;?>" download> <i class="fa fa-download"></i> </a>
                                       <?php }else{ ?>
                                    برجاء إرفاق صورة
                                    <?php } ?>
                                </small>
                                </div> -->
                             </div>
                        
                             <div class="col-sm-2 col-xs-12">
                              <?php if (file_exists("uploads/images/".$user_photo) ){?>
                              <div class="form-group">
                                <img style="width: 100px;" class="media-object img-circle" src="<?php  echo base_url()."uploads/images/".$user_photo; ?>" accesskey="" onerror="this.src='<?php echo base_url()."asisst/fav/apple-icon-120x120.png"?>'">
                              </div>
                             <?php } ?> 
                             
                             <input type="file" name="user_photo" class="form-control "  />
                                <small class="small" style="bottom:-13px;">
                                    <?php if (file_exists("uploads/images/".$user_photo) ){?>
                                       <?php }else{ ?>
                                    برجاء إرفاق صورة
                                    <?php } ?>
                                </small>
                             </div>
                         </div>
               
                        
                            <?php }?>
                      <!--------------------------------------------------------------->   
                    </div>
                  
                    <div class="modal-footer ">
                        <input type="hidden" name="role_id_fk" value="1">
                        <button type="submit" name="ADD" value="ADD" id="button_update" class="btn btn-success" >حفظ </button>
                     <?php  echo form_close()?>
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                   
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>



    <!---------------------------------------->
    <div class="col-sm-9  " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">المهام </h3>
            </div>
            <div class="panel-body"><br>
                <?php if(isset($mession_table) && !empty($mession_table) && $mession_table !=null){?>
                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="visible-md visible-lg">
                        <th>#</th>
                        <th>تـــاريخ اليوم </th>
                        <th>التوقيت</th>
                        <th>النوع </th>
                        <th>المهمة </th>
                        <th>رقم المستفيد </th>
                      <th>التفاصيل  </th> 
                        <th>الإجراء  </th> 
                    </tr>
                    </thead>
                    <tbody>
                    <?php $x=1; foreach ($mession_table as $row_mession){?>
                    <tr class="">
                        <td><?=$x++?></td>
                        <td><?=date("Y-m-d",$row_mession->date)?> </td>
                        <td><?=date("h:i:s A",$row_mession->date_s)?></td>
                        <td><?php if($row_mession->process == 1){
                                   echo "شؤون الاسر";
                            }else {
                                echo "غير معرف  ";
                            }?> </td>
                        <td><?=$row_mession->mession_title?> </td>
                        <td><?=$row_mession->family_file?></td>
                        <td><?=$row_mession->transformation_note?></td>
                      <td>   <a target="_blank" href="<?=base_url()."family_controllers/PersonProfile/AllDetails/".$row_mession->family_file."/".$row_mession->id?>">
                          <button type="button" class="btn btn-sm btn-info"><i class="fa fa-list btn-info"></i>
                          </button> </a> </td>
                 <!--       <td> <a href="<?=base_url()."family_controllers/PersonProfile/DoAction/1/".$row_mession->id?>" >
                                <i class="fa fa-check-square-o" aria-hidden="true"></i> </a>
                            <a href="<?=base_url()."family_controllers/PersonProfile/DoAction/2/".$row_mession->id?>" >
                                <i class="fa fa-times" aria-hidden="true"></i> </a>
                        </td>-->

                    </tr>
                  <?php }?>
                    </tbody>
                </table>
                <?php }else{
                    echo '<div class="alert alert-danger alert-dismissable">
                                <a href="#" class="" style="color: black"  data-dismiss="alert" aria-label="close">
                                    <i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i></a>
                                <strong> لا يوجد مهام  !</strong> .
                            </div>';
                }?>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------------------------->
<div class="col-sm-12" >

  <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">المهام المنتهية </h3>
            </div>
            <div class="panel-body"><br>
                <?php if(isset($finish_mession_table) && !empty($finish_mession_table) && $finish_mession_table !=null){?>
                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="visible-md visible-lg">
                        <th>#</th>
                        <th>تـــاريخ اليوم </th>
                        <th>التوقيت</th>
                        <th>النوع </th>
                        <th>المهمة </th>
                        <th>رقم المستفيد </th>
                       <!-- <th>التفاصيل  </th> -->
                        <th>التفاصيل  </th> 
                    </tr>
                    </thead>
                    <tbody>
                    <?php $x=1; foreach ($finish_mession_table as $row_mession){?>
                    <tr class="">
                        <td><?=$x++?></td>
                        <td><?=date("Y-m-d",$row_mession->date)?> </td>
                        <td><?=date("h:i:s A",$row_mession->date_s)?></td>
                        <td><?php if($row_mession->process == 1){
                                   echo "شؤون الاسر";
                            }else {
                                echo "غير معرف  ";
                            }?> </td>
                        <td><?=$row_mession->mession_title?> </td>
                        <td><?=$row_mession->family_file?></td>
                      <td>   <a target="_blank" href="<?=base_url()."family_controllers/PersonProfile/Details/".$row_mession->family_file."/".$row_mession->id?>">
                          <button type="button" class="btn btn-sm btn-info"><i class="fa fa-list btn-info"></i>
                          </button> </a> </td>
                 <!--       <td> <a href="<?=base_url()."family_controllers/PersonProfile/DoAction/1/".$row_mession->id?>" >
                                <i class="fa fa-check-square-o" aria-hidden="true"></i> </a>
                            <a href="<?=base_url()."family_controllers/PersonProfile/DoAction/2/".$row_mession->id?>" >
                                <i class="fa fa-times" aria-hidden="true"></i> </a>
                        </td>-->

                    </tr>
                  <?php }?>
                    </tbody>
                </table>
                <?php }else{
                    echo '<div class="alert alert-danger alert-dismissable">
                                <a href="#" class="" style="color: black"  data-dismiss="alert" aria-label="close">
                                    <i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i></a>
                                <strong> لا يوجد مهام  !</strong> .
                            </div>';
                }?>
            </div>
        </div>
</div>



<script>
    function getEmployeeDetails(employee_id) {
        if (employee_id !=0 &&  employee_id >0 &&  employee_id!='') {
            var dataString = 'employee_id=' + employee_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Dashboard/getEmployeeDetails',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject);
                    $('#employee_id_number').val(JSONObject['id_num']);
                    $('#employee_mob').val(JSONObject['phone_num']);
                    $('#employee_id_name').val(JSONObject['id_num']);
                }
            });
            return false;
        }
    }
</script>
<script>
    function valid(div1,div2,button) {
        if ($("#" + div2).val().length < 4) {
            document.getElementById(div1).style.color = '#F00';
            document.getElementById(div1).innerHTML = 'كلمة المرور اكثر من اربع حروف';
            document.getElementById(button).setAttribute("disabled", "disabled");
        }
        if ($("#" + div2).val().length > 4 && $("#user_pass").val().length < 10) {
            document.getElementById(div1).style.color = '#F00';
            document.getElementById(div1).innerHTML = 'كلمة المرور ضعيفة';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        }
        if ($("#" + div2).val().length > 10) {
            document.getElementById(div1).style.color = '#00FF00';
            document.getElementById(div1).innerHTML = 'كلمة المرور قوية';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        }
    }

    function valid2(div2,div3,button,input){
        if($("#"+input).val() == $("#" + div3).val()){
            document.getElementById(div2).style.color = '#00FF00';
            document.getElementById(div2).innerHTML = 'كلمة المرور متطابقة';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        }else{
            document.getElementById(div2).style.color = '#F00';
            document.getElementById(div2).innerHTML = 'كلمة المرور غير متطابقة';
            document.getElementById(button).setAttribute("disabled", "disabled");
        }
    }

</script>






