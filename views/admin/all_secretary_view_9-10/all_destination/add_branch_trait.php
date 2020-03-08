<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <?php
            
            if($this->uri->segment(4)){
             echo form_open_multipart('all_secretary/Secretary/update_branch/'.$this->uri->segment(4).'');
            }else{
                 echo form_open_multipart('all_secretary/Secretary/add_branch_trait');
            }
                     ?>
                <div class="col-md-12">
                    
                    <div class="form-group col-sm-4">
                <label class="label label-green  half">المعامله الرئسيه</label>
                <select class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true" name="main_trait">
                    <option value=""  style="display: none;">اختر المعامله</option>
                    <?php
                     if(isset($branch)&&!empty($branch)){
                    foreach($branch  as $row){
                    ?>
                    <option value="<?php echo $row->id;?>"<?php if(isset($all->form_id)&&$row->id==$all->form_id){?> selected="" <?php } ?>><?php echo $row->name;?></option>
                    <?php
                    }
                    }
                    ?>
                </select>
            </div>
                    
            <div class="form-group col-sm-4">
                <label class="label label-green  half">اسم المعامله التابعه</label>
                <input type="text" class="form-control half input-style" placeholder="" data-validation="required" name="branch_trait" value="<?php if(isset($all->name)) echo $all->name;?>">
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group col-sm-6">
                <input type="submit"name="add" value="اضافه" class="btn-success form-control">
            </div>
            </div>
                </div>
                
               
           
           
            </form>
        </div>
    </div>
</div>
<!-- update Modal1 -->

<div class="col-sm-12 col-md-12 col-xs-12" style="padding-top: 0;">
    <div class="top-line"></div><!--message of delete will be showen here-->
    <div class="panel panel-bd lobidrag" style="padding-top: 0;">
        <div class="panel-heading" style="">
            
        </div>
        <div class="panel-body">
            <?php 
            
            if(isset($records)&&!empty($records)){
                
               
                
                
                ?>
            
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>مسلسل</th>
                    <th>اسم المعامله الرئسيه</th>
                    <th>المعاملات الفرعيه </th>
                    
                    <th>الاجراء</th>
                </tr>
               
                </thead>
                <tbody>
                   
            <?php
            $x = 0;
            foreach($records as $record){$x++; ?>
                <tr>
                <td rowspan="<?php echo sizeof($record->branch);?>"><?php echo $x;?></td>
                <td rowspan="<?php echo sizeof($record->branch);?>"><?php echo$record->name;?> </td>
                <?php  if(!empty($record->branch)){ foreach ($record->branch as $row){?>
                    <td><?php echo $row->name; ?></td>
                    <td data-title="التحكم" class="text-center">
                        <a href="<?php echo base_url();?>/all_secretary/Secretary/update_branch/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="<?php echo base_url();?>/all_secretary/Secretary/delete_branch/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                    </td>
                    </tr>
                <?php }  } }?>

           
                </tbody>
            </table>
            <?php
            }
            ?>
        </div>
        
    </div>
</div>


