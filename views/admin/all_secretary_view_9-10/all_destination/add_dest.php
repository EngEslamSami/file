<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <?php
            
            if($this->uri->segment(4)){
             echo form_open_multipart('all_secretary/Secretary/update_main/'.$this->uri->segment(4).'');
            }else{
                 echo form_open_multipart('all_secretary/Secretary/add');
            }
                     ?>
                <div class="col-md-12">
            <div class="form-group col-sm-6">
                <label class="label ">إسم الجهه الاساسيه</label>
                <input type="text" class="form-control" placeholder="" data-validation="required" name="main_dest" value="<?php if(isset($all->name)) echo $all->name;?>">
            </div>
            <div class="form-group col-sm-6">
                <label class="label ">الجوال</label>
                <input type="number" name="phone" class="form-control  " placeholder="" data-validation="required" value="<?php if(isset($all->mob)) echo $all->mob;?>">
            </div>
                </div>
                <div class="col-md-12">
            <div class="form-group col-sm-6">
                <label class="label ">العنوان</label>
                <input type="text" class=" some_class_2 form-control  "name="adress"data-validation="required" value="<?php if(isset($all->address)) echo $all->address;?>">
            </div>
            <div class="form-group col-sm-6">
                <label class="label "> الفاكس </label>
                <input type="number" class=" some_class form-control  " data-validation="required" name="fax" value="<?php if(isset($all->fax)) echo $all->fax;?>">
            </div>
                </div>
                <div class="col-md-12">
            <div class="form-group col-sm-6">
                <label class="label "> البريد الالكتروني</label>
                <input type="email" class=" some_class form-control  "data-validation="required" name="email" value="<?php if(isset($all->email)) echo $all->email;?>">
            </div>
            <div class="form-group col-sm-6">
                <input type="submit"name="add" value="اضافه" class="btn-success form-control">
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
            
            if(isset($mains)&&!empty($mains)){?>
            
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>مسلسل</th>
                    <th>اسم الجهه</th>
                    <!-- <th>الجوال</th> -->
                    <th>عنوان الجهه</th>
                       <!--    <th>الايميل</th>-->
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
                       <!--  <td><?php echo $row->mob;?></td> -->
                        <td><?php echo $row->address;?></td>
                      <!--   <td><?php echo $row->email;?></td>-->
                        <td>
                            
                            
                           
                                            <a href="<?php echo base_url();?>/all_secretary/Secretary/update_main/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="<?php echo base_url();?>/all_secretary/Secretary/delete/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                            
                 
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
