 <?php
 //--------------------------------------------------------
  if(isset($result_id) && $result_id !=null):   
    $out['form']='Public_settings/UpdateJobRoleSetting/'.$result_id['defined_id'];
    $out['input']='UPDTATE';
    $out['input_title']='تعديل ';
   
   $out['title']=$result_id['defined_title'];
   
    else:
 
    $out['form']='Public_settings/AddJobRoleSetting';

    $out['input']='INSERT';
    $out['input_title']='حفظ ';
     $out['title']="";
    
    endif; ?>


<div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">
         <!--------------------------------------------->
           <?php  echo form_open_multipart($out['form'])?>
         <div class="form-group col-sm-12">
             <div class="col-sm-6">
                    <label class="label label-green  half">المسمي الوظيفي  </label>
                    <input type="text" name="title" value="<?php echo $out['title']?>" class="form-control half input-style" placeholder="أدخل البيانات" data-validation="required">
             </div>
              <div class="col-sm-6">
               <button type="submit" class="btn btn-purple w-md m-b-5" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?php echo $out['input_title']?></button>
              </div>
         </div>     
            <?php echo form_close()?>  
            
           <?php if(isset($table)&& $table!=null && !empty($table) ):?>
           <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
             <thead>
            <tr>
                <th >#</th>
                <th  class="text-center">المسمي الوظيفي  </th>
                <th  class="text-center">الإجراء</th>
            </tr>
            </thead>
            <tbody>
            
               <?php $x=0; foreach($table as $row){?>
               <tr>
                 <td><?=$x++?></td>
               <td><?php echo $row->defined_title?></td>
                 <td data-title="الإجراء" class="text-center">
                    <a href="<?php  echo base_url().'Public_settings/UpdateJobRoleSetting/'.$row->defined_id?>">
                        <i class="fa fa-pencil " aria-hidden="true"></i></a>
                    <a href="<?php  echo base_url().'Public_settings/DeleteJobRoleSetting/'.$row->defined_id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                </td>
               </tr>
             <?php  }?>
           </table>
           </tbody>
           <?php endif;?>
        <!--------------------------------------------->
        </div>
    </div>
</div>        