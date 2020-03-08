
<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <!-- open panel-body-->
    <?php if(isset($row)):?>
        <!-- <form class="form-horizontal">-->
        <?php echo form_open_multipart('Public_relation/update_type/'.$row->id)?>
       
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> نوع العضوية :  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                        <input type="text" class="r-inner-h4" name="title" value="<?php echo $row->title;?>" data-validation="required">
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-12 r-inner-btn">
                    <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                        <input type="submit" name="edit" value="تعديل" class="btn btn-primary" >
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                </div>
            </div>
      
        <!-- </form>-->
        <!-- </form>-->
        <?php echo form_close()?>
    <?php else: ?>
        <?php echo form_open_multipart('Public_relation/add_type')?>
     
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> نوع العضوية :  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                        <input type="text"  class="r-inner-h4" name="type" data-validation="required">
                        </div>
                    </div>
                  


                </div>
                

                     <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  
                        <input type="submit"  name="add" value="حفظ" class="btn btn-primary" >
                    </div>
                 
                </div>

      
        <!-- </form>-->
        <?php echo form_close()?>
    <?php endif?>




<?php if(isset($records)&&$records!=null):?>
 
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-center">اسم المصرف</th>
            <th  class="text-center">الاجراء</th></th>
            
            
          
        </tr>
        </thead>
        <tbody>
        <?php $s = 1; ?>
        <?php foreach($records as $record):?>
        <?php 
            
          
        ?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $s?></span></td>
                <td ><?php echo $record->title?></td>
                
                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'Public_relation/update_type/'.$record->id?>">
                        <i class="fa fa-pencil " aria-hidden="true"></i></a>
                    <a href="<?php echo base_url().'Public_relation/delete_type/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                </td>
            </tr>
            
        <?php 
        $s++;
        endforeach ;?>
        </tbody>
    </table>
    
  
<?php endif;?>
 <!-- close panel-body-->
    </div>
    </div>
 </div>


