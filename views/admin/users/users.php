
<div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php //echo $title?> </h3>
        </div>
        <div class="panel-body">
            <!-- open panel-body-->



            <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
            <?php 
          //  $roll = array('مدير على النظام'=>1,'رئيس قسم'=>2,'موظف'=>3);
             $roll = array('مدير على النظام'=>1,'عضو مجلس إدارة'=>2,'موظف'=>3);
            if(isset($result)){
                $id = $result['user_id'];
                $required = '';
                if($result['role_id_fk'] ==1){
                $style_div='style="display: none"';   
                $emp_div='style="display: none"'; 
                $magls_div='style="display: none"';  
                }elseif($result['role_id_fk'] ==2){
                  $style_div='style="display: none"';   
                $emp_div='style="display: none"'; 
                $magls_div='style="display: block"';   
                }elseif($result['role_id_fk'] ==3){
                $style_div='style="display: none"';   
                $emp_div='style="display: block"'; 
                $magls_div='style="display: none"';    
                }
                $style_div="";
                $disabled ='disabled="disabled"';
            }
            else{
                $id = 0;
                $required = 'required';
                $style_div="display: none;";
                $emp_div='style="display: none"'; 
                $magls_div='style="display: none"';
                $disabled =''; 
            }
            ?>
      
            <?php
            echo form_open_multipart('User/add_user/'.$id.'',array('class'=>"myform"));
            ?>
            <div class="col-xs-12">
    
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-6 col-xs-4">
                            <h4 class="r-h4 text-center"> إسم العضو </h4>
                        </div>
                        <div class="col-sm-6 col-xs-8 r-input">
                            <input type="text" class="r-inner-h4" onchange=" check_username($('#user_name').val());" id="user_name" name="user_name" placeholder="إسم العضو" value="<?php if(isset($result)) echo $result['user_name'] ?>"  required>
                        </div>
                    </div>
    
                    <div class="col-xs-12">
                        <div class="col-sm-6 col-xs-4">
                            <h4 class="r-h4 text-center"> كلمه المرور </h4>
                        </div>
                        <div class="col-sm-6 col-xs-8 r-input">
                            <input type="password" class="r-inner-h4 " name="user_pass" onkeyup="return check_pass($('#user_pass').val(),$('#user_pass_validate').val())" id="user_pass" placeholder=" كلمه المرور " autocomplete="off" value="" <?php $required ?>>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-sm-6 col-xs-4">
                            <h4 class="r-h4 text-center"> البريد الالكتروني </h4>
                        </div>
                        <div class="col-sm-6 col-xs-8 r-input">
                            <input type="email" class="r-inner-h4 " name="user_email" placeholder=" البريد الالكتروني " value="<?php if(isset($result)) echo $result['user_email'] ?>" required>
                        </div>
                    </div>
    
                    <div class="col-xs-12">
                        <div class="col-sm-6 col-xs-4">
                            <h4 class="r-h4 text-center"> الدور الوظيفي </h4>
                        </div>
                        <div class="col-sm-6 col-xs-8 r-input">
                            <select class="form-control" name="role_id_fk" id="role_id_fk" onchange="load_dep($('#role_id_fk').val(),'<?php echo $id ?>');" required  <?=$disabled?>  >
                                <option value="0">--قم بإختيار الدور الوظيفي--</option>
                                <?php
                                foreach ($roll as $key => $value) {
                                    $select = '';
                                    if (isset($result) && $value == $result['role_id_fk'])
                                        $select = 'selected';
                                    echo'<option value="'.$value.'" '.$select.'>'.$key.'</option>';
                                }
                                ?>
                                <?php
                                
                                if(isset($result)){ ?>
                                
                                <input  type="hidden" name="role_id_fk" value="<?=$result['role_id_fk']?>"/>    
                                <?php 
                                
                                }
                                ?>

                            </select>
                        </div>
                    </div>

                    
                    
                    <div class="col-xs-12"  id="emp_div" <?=$emp_div?>  >
                        <div class="col-sm-6 col-xs-4">
                            <h4 class="r-h4 text-center"> الموظف </h4>
                        </div>
                        <div class="col-sm-6 col-xs-8 r-input" id="emp_code">
                            <select name="emp_code" class="form-control" <?=$disabled?>  >
                                <option value="">--قم بإختيار الموظف--</option>    
                               <?php 
                               if(isset($result) && $result!= null){ 
                                
                                foreach($all_emps as $all_emp){
                                     $select = '';
                                    if ( $all_emp->id == $result['emp_code'])
                                        $select = 'selected';     
                                    echo'<option value="'.$all_emp->id.'" '.$select.'>'.$all_emp->employee.'</option>';
                                }
                                ?>
                                <input  type="hidden" name="emp_code" value="<?=$result['emp_code']?>"/>
                                <?php
                                             
                              }else{
                                
                               
                               ?>
                                <?php
                                foreach($emps as $emp){
                                 echo'<option value="'.$emp->id.'" >'.$emp->employee.'</option>';
                                }
                                }
                                ?> 
                            </select>
                        </div>
                    </div>

                     <div class="col-xs-12"  id="magls_div" <?=$magls_div?>   >
                        <div class="col-sm-6 col-xs-4">
                            <h4 class="r-h4 text-center"> عضو مجلس الإدارة </h4>
                        </div>
                        <div class="col-sm-6 col-xs-8 r-input"   id="magles_mem_code"   >
                            <select class=" form-control"   name="magles_mem_code" <?=$disabled?> >
                                <option value="">--قم بإختيار عضو مجلس الإدارة --</option>    
                                <?php 
                                if(isset($result) && $result != null){
                                 foreach($all_magls as $all_magl){
                                    $select = '';
                                    if ($all_magl->id == $result['magles_mem_code'])
                                        $select = 'selected';
                                    echo'<option value="'.$all_magl->id.'" '.$select.'>'.$all_magl->member_name.'</option>';
                                }
                                ?>
                                <input  type="hidden" name="magles_mem_code" value="<?=$result['magles_mem_code']?>"/>
                                <?php    
                                }else{
                                    
                                
                                foreach($magls as $magl){
                                 
                                    echo'<option value="'.$magl->id.'">'.$magl->member_name.'</option>';
                                }
                                }
                                ?> 
                            </select>
                        </div>
                    </div>
                    
    
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-sm-6 col-xs-4">
                            <h4 class="r-h4 text-center"> إسم المستخدم </h4>
                        </div>
                        <div class="col-sm-6 col-xs-8 r-input">
                            <input type="text" class="r-inner-h4 " name="user_username" placeholder="إسم المستخدم" value="<?php if(isset($result)) echo $result['user_username'] ?>" required>
                        </div>
                    </div>
    
                    <div class="col-xs-12">
                        <div class="col-sm-6 col-xs-4">
                            <h4 class="r-h4 text-center"> كلمه المرور </h4>
                        </div>
                        <div class="col-sm-6 col-xs-8 r-input">
                            <input type="password" class="r-inner-h4 " onkeyup="return check_pass($('#user_pass').val(),$('#user_pass_validate').val())" name="user_pass_validate" id="user_pass_validate" placeholder=" كلمه المرور " value="" <?php $required ?>>
                        </div>
                    </div>
    
                    <div class="col-xs-12">
                        <div class="col-sm-6 col-xs-4">
                            <h4 class="r-h4 text-center"> رقم التليفون </h4>
                        </div>
                        <div class="col-sm-6 col-xs-8 r-input">
                            <input type="text" class="r-inner-h4 " name="user_phone" placeholder=" رقم التليفون" value="<?php if(isset($result)) echo $result['user_phone'] ?>" required>
                        </div>
                    </div>
    
                    <div class="col-xs-12">
                        <div class="col-sm-6 col-xs-4">
                            <h4 class="r-h4 text-center"> الصوره </h4>
                        </div>
                        <div class="col-sm-6 col-xs-8 r-input">
                            <input type="file" class="r-inner-h4 " name="user_photo" <?php echo($required) ?> />
                            <?php if(isset($result)){ ?>

                            <img src="<?php if(isset($result)) echo(base_url().'uploads/images/'.$result['user_photo']) ?>" class="img-rounded" width="110" height="80"></br>
                            <span class="alert-danger"><?php if(isset($result)) echo 'لعدم تغيير الصورة لا تقم بإختيار أي شيء'; ?></span>
                            <?php } ?>
                        </div>
                    </div>
                    
                </div>
                <div class="col-xs-12">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3 col-xs-6">
                        <button name="add" value="add" type="submit" class="btn  r-manage-btn-1 "> حفظ </button>
                    </div>
                </div>
    
            </div>
        <?php echo form_close()?>
        </div>
    </div>
    <div class="col-xs-12">
    
        <div class="panel-body">
            <div class="fade in active">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">م</th>
                            <th class="text-center">الاسم </th>
                            <th class="text-center">البريد الالكتروني </th>
                            <th class="text-center"> رقم التليفون </th>
                            <th class="text-center">التحكم </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $x = 0 ;
                        foreach($table as $record){
                            echo '<tr>
                                    <td>'.($x+1).'</td>
                                    <td>'.$record->user_name.'</td>
                                    <td>'.$record->user_email.'</td>
                                    <td>'.$record->user_phone.'</td>
                                    <td><a href="'.base_url().'User/add_user/'.$record->user_id.'"><i class="fa fa-pencil-square-o " aria-hidden="true"></i></a> 
                                    <span class="r-user-span"></span>'; ?>
                                     <a onclick="$('#adele').attr('href', '<?=base_url()."User/delete_user/".$record->user_id?>');" data-toggle="modal" data-target="#modal-delete" aria-hidden="true"> <i class="fa fa-trash"></i></a>
                                   <?php echo'</td>
                                </tr>';
                            $x++;
                        }
                        ?>
                    </tbody>
                </table>
                
                
                		<div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
			        <div class="modal-dialog" role="document">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                    <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
			                </div>
			                <div class="modal-body">
			                    <p id="text">هل أنت متأكد من الحذف؟</p>
			                </div>
			                <div class="modal-footer">
			                    <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
			                    <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove">نعم</button></a>
			                </div>
			            </div>
			        </div>
			    </div>
                
            </div>
        </div>
    </div>


            <!-- close panel-body-->
        </div>
    </div>
</div>





    <script>
function check_pass(pass1, pass2){
    if(pass1 != pass2){
        document.getElementById("user_pass").style.color = "#E34234";
        document.getElementById("user_pass_validate").style.color = "#E34234";
    }
    else{
        document.getElementById("user_pass").style.color = "#000";
        document.getElementById("user_pass_validate").style.color = "#000";
    }       
}

function check_username(username){
    if(username){
        var dataString = 'username=' + username ;
        $.ajax({
            type:"post",
            url: "<?php echo base_url(); ?>User/check",
            data:dataString,
            success:function(response){
               // alert(response);
               /* if (response === 0 ) {}
                else
                    alert('يوجد مستخدم بهذا الإسم .. برجاء تغييره'); */
            }
        });
        return false;
    }
}

function load_dep(rol_id, id)
{
  // alert(rol_id);
   
    if(rol_id &&  rol_id == 3){
    $('#admin_div').show();
    $('#emp_div').show();  
    $('#magls_div').hide();
       // return false;
    }else if(rol_id == 0 || rol_id == 1 ){
          $('#admin_div').hide();
          $('#emp_div').hide(); 
          $('#magls_div').hide();
    }else if(rol_id &&  rol_id == 2){
          $('#magls_div').show();
          $('#emp_div').hide(); 
    }
}

function load_emp(dep_id, id)
{
    $('#emp_code').html('<select name="emp_code" ><option value="">--قم بإختيار الموظف--</option></select>');
    if(dep_id){
        var dataString = 'dep_id=' + dep_id;
        
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>User/add_user/'+id,
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $('#emp_code').html(html);
            }
        });
        return false;
    }
}
</script>