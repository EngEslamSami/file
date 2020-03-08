<?php
if(isset($record) && !empty($record) && $record!=null){
    echo form_open_multipart('family_controllers/Setting/UpdateSitting/'.$id.'/'.$type);
}
else{
    echo form_open_multipart('family_controllers/Setting/AddSitting/'.$type);
}
?>
<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-sm-2 col-md-2 col-xs-2">
        <button type="button" class="btn btn-success w-md m-b-5 " onclick="window.location.href = '<?=base_url()?>family_controllers/Setting';">
            <i class="fa fa-reply"></i> رجوع  </button>
    </div>
</div>

<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>

            <div class="panel-body">
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green half"> الإسم</label>
                    <input type="text" name="title_setting" value="<?php if(isset($record)) echo $record['title_setting'] ?>" class="form-control half input-style" autofocus data-validation="required">
                <input type="hidden" name="type_name" value="<?=$type_name?>"/>
                </div>
               <!-- <div class="form-group col-sm-12 col-xs-12">
                    <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
                            <i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                </div>-->
                  <div class="form-group col-sm-12 col-xs-12">                
                <div class="form-group col-xs-6">
   
                    <button type="submit" name="add_save" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
                    <i class="fa fa-floppy-o" aria-hidden="true"></i></span>  حفظ  </button>  
                                      
                    <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span>
                    <i class="fa fa-floppy-o" aria-hidden="true"></i></span>  حفظ وإضافة </button>                                       
                </div>
                  <div class="form-group col-sm-12 col-xs-12">                
                <div class="form-group col-xs-6">
   
                <span style="color: red;">في حالة الحفظ سيتم البقاء في نفس الشاشة لإستكمال بيانات أخري</span><br />
                <span style="color: red;">في حالة الحفظ والرجوع سيتم الرجوع لشاشة الإعدادات العامة</span>
               </div></div>
                </div> 
            </div>
        </div>
    </div>
</div>