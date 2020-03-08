
<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <!-- open panel-body-->
    <?php if(isset($result)):?>
        <!-- <form class="form-horizontal">-->
        <?php echo form_open_multipart('Public_relation/update_endowment/'.$result['id'])?>
       
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> إسم الوقف:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                        <input type="text" class="r-inner-h4" name="end_title" value="<?=$result['end_title']?>" data-validation="required">
                        </div>
                    </div>
                </div>
               <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> الصورة :  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                         <input type="file"  name="end_photo" class="form-control  input-style" accept="image/*"   placeholder="أدخل البيانات"  />
                       <img src="<?php echo base_url('uploads/files/'.$result['end_photo'])?>" width="50px" height="50px" />
                        </div>
                    </div>
                    </div>
                    
                     <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> ملف الPDF :  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                         <input type="file"  name="end_pdf" class="form-control  input-style" accept="application/pdf,application/vnd.ms-excel"  placeholder="أدخل البيانات"  />
                         <a href="<?php echo base_url('Public_relation/download/'.$result['end_pdf']) ?>"><i class="fa fa-download" aria-hidden="true"></i></a> /
                         <a href="<?php echo base_url('Public_relation/read_file/'.$result['end_pdf']); ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                 
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
        <?php echo form_open_multipart('Public_relation/endowment')?>
     
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> إسم الوقف:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                        <input type="text" class="r-inner-h4" name="end_title" data-validation="required">
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> الصورة :  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                         <input type="file"  name="end_photo" class="form-control  input-style" accept="image/*"   placeholder="أدخل البيانات" data-validation="required" />
                        </div>
                    </div>
                    </div>

 <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                  <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> ملف الPDF :  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                         <input type="file"  name="end_pdf" class="form-control  input-style" accept="application/pdf,application/vnd.ms-excel"  placeholder="أدخل البيانات" data-validation="required" />
                        </div>
                    </div>
                    </div>
                <div class="col-xs-12 r-inner-btn">
                    <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                        <input type="submit"  name="add" value="حفظ" class="btn btn-primary" >
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
            <th  class="text-center">اسم الوقف </th>
            <th  class="text-center">الصورة</th>
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
                <td ><?php echo $record->end_title?></td>
                <td ><img src="<?php echo base_url('uploads/files/'.$record->end_photo)?>" width="50px" height="50px" /></td>               
                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'Public_relation/update_endowment/'.$record->id?>">
                        <i class="fa fa-pencil " aria-hidden="true"></i></a>
                    <a href="<?php echo base_url().'Public_relation/delete_endowment/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
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


