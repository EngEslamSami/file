
<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <!-- open panel-body-->
    <?php if(isset($result)):?>
        <!-- <form class="form-horizontal">-->
        <?php echo form_open_multipart('Public_relation/update_Assembly_accounts/'.$result['id'])?>
       
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> إسم المصرف:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                        <input type="text" class="r-inner-h4" name="account_name" value="<?=$result['account_name']?>" data-validation="required">
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  
                  <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> رقم الحساب:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                        <input type="text" class="r-inner-h4" name="account_number" value="<?=$result['account_number']?>" data-validation="required">
                        </div>
                    </div> 
                    
                </div>
                <div class="col-xs-12 r-inner-btn">
                    <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                        <input type="submit" name="update" value="تعديل" class="btn btn-primary" >
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                </div>
            </div>
      
        <!-- </form>-->
        <!-- </form>-->
        <?php echo form_close()?>
    <?php else: ?>
        <?php echo form_open_multipart('Public_relation/Assembly_accounts')?>
     
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> إسم المصرف:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                        <input type="text" class="r-inner-h4" name="account_name" data-validation="required">
                        </div>
                    </div>
                  


                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> رقم الحساب:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                        <input type="text" class="r-inner-h4" name="account_number" data-validation="required">
                        </div>
                    </div>
                    </div>

                <div class="col-xs-12 r-inner-btn">
                    <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                        <input type="submit"  name="add_news" value="حفظ" class="btn btn-primary" >
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                </div>
</div>
      
        <!-- </form>-->
        <?php echo form_close()?>
    <?php endif?>




<?php if(isset($records)&&$records!=null):?>
    <div class="col-xs-12">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-center">اسم المصرف</th>
            <th  class="text-center">رقم الحساب</th>
            
            <th  class="text-center">التحكم</th>
          
        </tr>
        </thead>
        <tbody>
        <?php $serial = 0; ?>
        <?php foreach($records as $record):?>
        <?php 
            $serial++; 
          
        ?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $serial?></span></td>
                <td ><?php echo $record->account_name?></td>
                <td ><?php echo $record->account_number?></td>
                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'Public_relation/update_Assembly_accounts/'.$record->id?>">
                        <i class="fa fa-pencil " aria-hidden="true"></i></a>
                    <a href="<?php echo base_url().'Public_relation/delete_Assembly_accounts/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                </td>
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
    <div class="col-xs-12 mt30 text-center">
        <?php echo  $links?>
    </div>
    </div>
<?php endif;?>
 <!-- close panel-body-->
    </div>
    </div>
    </div>


