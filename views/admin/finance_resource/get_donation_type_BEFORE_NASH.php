<?php

$type=$_POST['values'];

if(isset($type)){?>



<?php if($type ==1):?>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> المتبرعون </h4>
            </div>
            <div class="col-xs-6 r-input">
                <select class=" form-control" name="person_id"  id="person_id"  data-show-subtext="true" data-live-search="true">
                    <option value="">إختر</option>
                    <?php if($donors): foreach ($donors as $record):?>
                        <option value="<?php echo $record->id;?>"><?php echo $record->user_name;?></option>
                    <?php endforeach; endif;?>
                </select>
            </div>
        </div>


 <?php elseif ($type ==2):?>
        
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">الإسم</h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="text" class="r-inner-h4" name="name" >
            </div>
        </div>

        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">رقم الهاتف</h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="number" class="r-inner-h4" name="mob" >
            </div>
        </div>

        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">رقم البطاقة</h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="number" class="r-inner-h4" name="card_id" >
            </div>
        </div>


  <?php elseif ($type ==3):?>


        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4"> الكفلاء </h4>
            </div>
            <div class="col-xs-6 r-input">
                <select class=" form-control" name="person_id"  id="person_id"  data-show-subtext="true" data-live-search="true">
                        <option value="">إختر</option>
                        <?php if($guarantees): foreach ($guarantees as $record):?>
                            <option value="<?php echo $record->id;?>"><?php echo $record->user_name;?></option>
                        <?php endforeach; endif;?>
                </select>
            </div>
        </div>

  <?php endif;?>
    <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">قيمة التبرع</h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="number" class="r-inner-h4" name="value" >
        </div>
    </div>
    
    
    
            <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">إختر نوع الدفع </h4>
        </div>
        <div class="col-xs-6 r-input">
                                      <select name="payment_type"  id="payment_type" onchange="return load($('#payment_type').val());">
                                    <option value="">إختر</option>
                                    <option value="1">نقدي</option>
                                    <option value="2">شيك</option>
                                    <option value="3">حوالة بنكية</option>
                                    <option value="4">إستقطاع </option>
                                     <option value="5">بنك </option>
                                     <option value="6">شبكة </option>

      </select>
        </div>
    </div>

<div  id="optionearea6">
</div>
    
    
    
    
    
        <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">وذلك لـ </h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="text" class="r-inner-h4" name="detail" >
        </div>
    </div>
    
    
    
    

<? }?>
 <!-- first if-->

<script>


    function load(values)
    {
        if(values)
        {
            var dataString = 'payment_type=' + values;
            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/Finance_resource/add_today_donations',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea6').html(html);
                    $('#button').show()
                }
            });
            return false;
        }
        else
        {
            $('#optionearea6').html('');
            return false;
        }

    }
</script>