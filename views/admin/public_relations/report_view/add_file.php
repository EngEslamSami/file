<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
           <?php
            
            if($this->uri->segment(3)){
             echo form_open_multipart('/Public_relation/update_file/'.$this->uri->segment(3).'');
            }else{
                 echo form_open_multipart('Public_relation/add_file');
            }
                     ?>
                <div class="col-md-12">
                    
                    <div class="form-group col-sm-4">
                <label class="label label-green  half">اسم الفئه</label>
                <select class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true" name="main_cat">
                    <option value=""  style="display: none;">اختر الفئه</option>
                    <?php
                     if(isset($branch)&&!empty($branch)){
                    foreach($branch  as $row){
                    ?>
                    <option value="<?php echo $row->id;?>"<?php if(isset($all->main_society_id_fk)&&$row->id==$all->main_society_id_fk){?> selected="" <?php } ?>><?php echo $row->title;?></option>
                    <?php
                    }
                    }
                    ?>
                </select>
            </div>
			<div class="form-group col-sm-4">
                <label class="label label-green  half">الاسم</label>
                <input type="text" class="form-control half input-style" placeholder="" data-validation="required" name="name" value="<?php if(isset($all->name)) echo $all->name;?>">
            </div>
                    
            <div class="form-group col-sm-4">
                <label class="label label-green  half">ارفع الملف</label>
                <input type="file" class="form-control half input-style" placeholder="" data-validation="" name="pdf" value="">
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
<?php 
            
            if(isset($files)&&!empty($row)){
                
               
                
                
                ?>

<div class="col-sm-12 col-md-12 col-xs-12" style="padding-top: 0;">
    <div class="top-line"></div><!--message of delete will be showen here-->
    <div class="panel panel-bd lobidrag" style="padding-top: 0;">
        <div class="panel-heading" style="">
            
			
			
        </div>
        <div class="panel-body">
            
             <?php 
                    $x=1;
                    foreach($files as $row){?>
					<h1><?php echo $row->title;?></h1>
					
            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>مسلسل</th>
                    <th>اسم الملف</th>
					<th>تحميل وقراءه الملف</th>
					<th>الاجراء</th>
					
                    
                    
                </tr>
               
                </thead>
                <tbody>
				<?php
                   $n=1;
				   
                    foreach($row->files as $row2){?>
                    <tr>
                        <td><?php echo $n;?></td>
                        <td><?php  if(isset($row2->name)){echo $row2->name; }else{ echo "لايوجد مرفقات" ; }?></td>
                        <td><?php  if($row2->file==0){?><a href="<?php echo base_url();?>Public_relation/downloads/<?php echo $row2->file;?>"><i class="fa fa-download" aria-hidden="true"></i> </a>/  <a href="<?php echo base_url();?>Public_relation/read_file/<?php echo $row2->file;?>"><i class="fa fa-bandcamp " aria-hidden="true"></i> </a><?php  }else{ echo "لايوجد مرفقات";} ?> </td>
                        <td>
                            
                            
                           
                                            <a href="<?php echo base_url();?>Public_relation/update_file/<?php echo $row2->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a  href="<?php echo base_url();?>Public_relation/delete_branch/<?php  echo $row2->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                            
                 
                        </td>
                        
                        
                    </tr>
                    <?php
                    $n++;
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
			<?php
			}
			?>



