<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
<?php $father_status = array('حي','متوفي'); ?>
<?php $card_type = array('وثيقة وطنية ','اقامة ','جواز سفر'); ?>
<?php $group = array('أرملة','مطلقة ','زوج سجين','زوج مريض','متخلى عنها ','عزباء متخلى عنها ','دخل محدود ','أخرى'); ?>
<?php $house_type = array('من سميرا'); ?>         
<?php $healthy_type = array('جيد','متوسط','ضعيف'); ?>
<?php $job = array(' يعمل',' لا يعمل '); ?>
<?php $education_level= array('تعليم جامعي','الثانوية','المتوسطة','الإبتدائية','غير متعلم '); ?>  
    </span>
    <?php if(isset($result)):?>
    <!-- <form class="form-horizontal">-->
    <?php echo form_open_multipart('dashboard/update_area_settings/'.$result['id'])?>
  
        <div class="col-xs-12">
            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> عنوان المنطقة:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <input type="text" class="r-inner-h4" value="<?php echo $result['title']; ?>" name="title" />
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
 
    <?php echo form_close()?>
    <?php else: ?>
    <?php echo form_open_multipart('dashboard/add_person')?>
  
    
        <div class="col-xs-12">
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> رقم الملف:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <input type="number" class="r-inner-h4"  name="file_num" required="" >
                    </div>
                </div>
                
            </div>
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> إسم الحالة (الام):  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <input type="text" class="r-inner-h4"  name="name" required="" >
                    </div>
                </div>
            </div>
            
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> حالة الأب:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="father_status" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر حالة الأب</option>
                    <?php for($x=0 ; $x<sizeof($father_status);$x++){ ?>
                    <option value="<?php echo $x ?>"><?php echo $father_status[$x]; ?></option>
          
                    <?php } ?>
                    </select>
                  
                    </div>
                </div>
            </div>
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> رقم الهوية:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                     <input type="number" class="r-inner-h4"  name="card_id" required="" >
                    </div>
                </div>
            </div>
            
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> نوع الهوية:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="card_type" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر نوع الهوية</option>
                    <?php for($x=0 ; $x<sizeof($card_type);$x++){ ?>
                    <option value="<?php echo $x ?>"><?php echo $card_type[$x]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> تاريخ الميلاد:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                     <input type="date" class="r-inner-h4"  name="birth_date" required="" >
                    </div>
                </div>
            </div>
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> الفئة:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="group" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر الفئة</option>
                    <?php for($xe=0 ; $xe<sizeof($group);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $group[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> هاتف المنزل:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                     <input type="number" class="r-inner-h4"  name="tele" required="" >
                    </div>
                </div>
            </div>
            
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> رقم الجوال:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                     <input type="number" class="r-inner-h4"  name="mob"  required="" >
                    </div>
                </div>
            </div>
            
            
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> الجنسية:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="nationality_id_fk" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر الجنسية</option>
                    <?php foreach($nationality as $nationality_data){ ?>
                    <option value="<?php echo $nationality_data->id; ?>"><?php echo $nationality_data->title; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
            
         
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> نوع السكن:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="house_type" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر نوع السكن</option>
                    <?php for($xe=0 ; $xe<sizeof($house_type);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $house_type[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
         
            
            <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> مكان السكن:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="house_palce" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر مكان السكن</option>
                    <?php foreach($area as $area_data){ ?>
                    <option value="<?php echo $area_data->id; ?>"><?php echo $area_data->title; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
            
            

             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> الحالة الصحية:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="healthy_type" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر الحالة الصحية</option>
                    <?php for($xe=0 ; $xe<sizeof($healthy_type);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $healthy_type[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
    
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> العمل:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="job" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر العمل</option>
                    <?php for($xe=0 ; $xe<sizeof($job);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $job[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
  
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> المستوي التعليمي:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <select name="education_level" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" required>
                    <option value="">إختر المستوي التعليمي</option>
                    <?php for($xe=0 ; $xe<sizeof($education_level);$xe++){ ?>
                    <option value="<?php echo $xe; ?>"><?php echo $education_level[$xe]; ?></option>
          
                    <?php } ?>
                    </select>
                    </div>
                </div>
            </div>
            
             <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> نوع الصرف:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <input type="text" class="r-inner-h4"  name="sarf_type"  required="" >
                    </div>
                </div>
            </div>
            
            <div class="col-md-8  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> الملاحظات:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                    <textarea class="r-inner-h4"  name="notes"  required="" ></textarea>
                    
                    </div>
                </div>
            </div>
            
            
           <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4">الافراد:  </h4>
                    </div>
                    <div class="col-xs-6 r-input"> 
                    <input type="text" id="total" value="0" name="total" class="form-control" readonly="readonly" placeholder="" >
                </div>
            </div>
         </div>
           <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4">ذكور:  </h4>
                    </div>
                    <div class="col-xs-6 r-input"> 
                    <input type="text" id="male_num"  name="male_num" onkeypress="return isNumberKey(event)" onkeyup="return calc($('#male_num').val(),$('#femal_num').val());" class="form-control  " placeholder="ذكور" >
                </div>
            </div>
        </div>
       <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4">إناث:  </h4>
                    </div>
                    <div class="col-xs-6 r-input"> 
                    <input type="text" id="femal_num"  name="femal_num" onkeypress="return isNumberKey(event)" onkeyup="return calc($('#male_num').val(),$('#femal_num').val());" class="form-control  " placeholder="إناث" >
                </div>
            </div>
        </div>
        <div id="optionearea1"></div>
            
            
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
</div>
<div class="col-md-11  col-sm-11 col-xs-11 inner-side r-data">
<?php if(isset($records)&&$records!=null):?>
    <div class="col-xs-12">
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
         <thead>
        <tr>
            <th width="2%">#</th>
            <th  class="text-center">إسم الحالة</th>
            <th width="35%" class="text-center">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($records as $record):?>
            <tr>
                <td data-title="#" class="text-center"><span class="badge"><?php echo  $record->id?></span></td>
                <td data-title="" class="text-center"><?php echo $record->name?> </td>
                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/update_person/'.$record->id?>">
                        <i class="fa fa-pencil " aria-hidden="true"></i></a>
                    <a href="<?php echo base_url().'dashboard/delete_area_settings/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                </td>
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
</div>
<?php endif;?>
</div>
</div>
<script>

function calc(male,female)
{
    var old_family_num = 0;
    if(male == '')
        male = 0;
    if(female == '')
        female = 0;
    if($('#old_family_num').val())
        old_family_num = $('#old_family_num').val();
        
    total = parseInt(male) + parseInt(female) + parseInt(0);
    $('#total').val(total);

    if($('#total').val() > parseInt(0) && $('#total').val()>old_family_num)
    {
        if(old_family_num > 0){
        var dataString = 'num=' + (old_family_num) + '&before=' + ($('#total').val() - parseInt(0));
    }else{
        var dataString = 'num=' + ($('#total').val() - parseInt(0)); 
    }
        $.ajax({

            type:'post',
            url: '<?php echo base_url() ?>/dashboard/add_person',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
            $('#optionearea1').html(html);
            } 
        });
        return false;
    } 
    else
    {
        $('#total').val(0);
        $('#optionearea1').html('');
        return false;
    }  
    
}
</script>
<script>

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

</script>