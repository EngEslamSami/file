<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <?php
            
            if($this->uri->segment(4)){
             echo form_open_multipart('all_secretary/Secretary/edit_trait/'.$this->uri->segment(4).'');
            }else{
                 echo form_open_multipart('all_secretary/Secretary/add_trait');
            }
                     ?>
                <div class="col-md-12">
            <div class="form-group col-sm-6">
                <label class="label label-green  half">اسم المعامله الرئسيه</label>
                <input type="text" class="form-control half input-style" placeholder="" data-validation="required" name="main_trait" value="<?php if(isset($all->name)) echo $all->name;?>">
            </div>
            <div class="form-group col-sm-6">
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
            
            if(isset($mains)&&!empty($mains)){
                
               
                
                
                ?>
            
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>مسلسل</th>
                    <th>اسم المعاملة</th>
                    
                    <th>الاجراء</th>
                </tr>
               
                </thead>
                <tbody>
                    <?php 
                    $x=1;
                    foreach($mains as $row){?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo $row->name;?></td>
                        
                        <td>
                            
                            
                           
                                            <a href="<?php echo base_url();?>/all_secretary/Secretary/edit_trait/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="<?php echo base_url();?>/all_secretary/Secretary/delete_trait/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                            
                 
                        </td>
                        
                        
                    </tr>
                    <?php
                    $x++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
            }
            ?>
        </div>
        
    </div>
</div>


