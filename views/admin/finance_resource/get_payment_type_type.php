
<?php

$type=$_POST['payment_type'];

if(isset($type)){ ?>
 <?php if($type ==1 ):?>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">اختر صندوق</h4>
            </div>
            <div class="col-xs-6 r-input">

                <select class=" form-control" name="box"  id="box"  data-show-subtext="true" data-live-search="true" required>
                    <option value=""> اختر نوع الصندوق</option>
                    <option value="1">صندوق رجالي</option>
                    <option value="2">صندوق نسائي</option>

                </select>

            </div>
        </div>
        <?php elseif($type== 5) :?>
 <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">إسم البنك</h4>
            </div>
            <div class="col-xs-6 r-input">

                <select class=" form-control" name="bank_id_fk"  id="bank_id_fk"  data-show-subtext="true" data-live-search="true" required>
                    <option value=""> إختر البنك</option>
                    <?php if($banks): foreach ($banks as $record):?>
                        <option value="<?php echo $record->id;?>"><?php echo $record->bank_name;?></option>
                    <?php endforeach; endif;?>
                </select>

            </div>
        </div>
        <div class="col-xs-12 ">
            <div class="col-xs-6">
                <h4 class="r-h4 "> تاريخ الإستحقاق </h4>
            </div>
            <div class="col-xs-6 r-input ">
                <div class="docs-datepicker">
                    <div class="input-group">
                        <input type="date" name="worth_date" id="worth_date"  class="form-control text-left"  required>
                    </div>
                </div>
            </div>
        </div>


       
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">رقم الشيك</h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="number" class="r-inner-h4" name="account_num" required >
            </div>
        </div>
    <?php elseif($type== 6) :?>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">اختر شبكة</h4>
            </div>
            <div class="col-xs-6 r-input">

                <select class=" form-control" name="network"  id="network"  data-show-subtext="true" data-live-search="true" required>
                    <option value=""> اختر نوع شبكة</option>
                    <option value="1">شبكة رجالي</option>
                    <option value="2">شبكة نسائي</option>

                </select>

            </div>
        </div>


    <?php else :?>
         <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">إسم البنك</h4>
            </div>
            <div class="col-xs-6 r-input">
        
                  <select class=" form-control" name="bank_id_fk"  id="bank_id_fk"  data-show-subtext="true" data-live-search="true" required>
                        <option value=""> إختر البنك</option>
                        <?php if($banks): foreach ($banks as $record):?>
                        <option value="<?php echo $record->id;?>"><?php echo $record->bank_name;?></option>
                        <?php endforeach; endif;?>
                </select>
                
            </div>
        </div>
          <div class="col-xs-12 ">
            <div class="col-xs-6">
                <h4 class="r-h4 "> تاريخ الإستحقاق </h4>
            </div>
            <div class="col-xs-6 r-input ">
                <div class="docs-datepicker">
                    <div class="input-group">
                        <input type="date" name="worth_date" id="worth_date"  class="form-control text-left"  required>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">رقم الشيك </h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="number" class="r-inner-h4" name="account_num" required >
            </div>
        </div>
        
 <?php endif?>
  <?php  
}?>




<!--
<?php

$type=$_POST['payment_type'];


if(isset($type)){ ?>
 <?php if($type ==1):?>
 <?php else :?>
         <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">إسم البنك</h4>
            </div>
            <div class="col-xs-6 r-input">
        
                  <select class=" form-control" name="bank_id_fk"  id="bank_id_fk"  data-show-subtext="true" data-live-search="true" required>
                        <option value=""> إختر البنك</option>
                        <?php if($banks): foreach ($banks as $record):?>
                        <option value="<?php echo $record->id;?>"><?php echo $record->bank_name;?></option>
                        <?php endforeach; endif;?>
                </select>
                
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">رقم الحساب</h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="number" class="r-inner-h4" name="account_num" required >
            </div>
        </div>
        
 <?php endif?>
  <?php  
}

?>

-->