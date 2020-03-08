

<!------------------------------------------------>

<div class="col-sm-11 col-xs-12 left_side padding-4">
    <?php 
    
    $data_main['add_today_donations']='add_today_donations';
  // $this->load->view('admin/finance_resource/main_tabs',$data_main); ?>
    <?php if(isset($result)):?>
        <!--edit-->
        <div class="details-resorce">
            <div class="col-xs-12 r-inner-details">
                <?php  echo form_open_multipart('finance_resource/edit_today_donations/'.$result[0]->id)?>
                <div class="col-xs-12 ">
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12 ">
                            <div class="col-xs-6">
                                <h4 class="r-h4 "> تاريخ اليوم </h4>
                            </div>
                            <div class="col-xs-6 r-input ">
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="date" name="birth_date" id="birth_date" readonly class="form-control" value="<?php echo date('Y-m-d',time()); ?>"placeholder="تاريخ اليوم "  >
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
               
               
                 <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> حسابات البرامج </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="account_settings_id_fk" id="account_settings_id_fk"   onchange="return lood($('#account_settings_id_fk').val());">
                                    <option value="">إختر</option>

                                    <?php if(!empty($account_settings)):
                                      
                                        foreach ($account_settings as $record): 
                                          $sect='';
                                        if( $result[0]->account_settings_id_fk ==$record->id ){
                                            $sect ='selected';
                                        }
                                           ?>
                                            <option value="<? echo $record->id;?>" <?php echo $sect; ?> ><? echo $record->title;?></option>
                                        <?php  endforeach; endif;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12" id="optionearea1">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> البرامج  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select  name="program_id_fk">
                                  <?php //echo $result[0]->program_id_fk;
if(!empty($account_settings)):
    foreach ($program_settings as $record):
        $select='';
        if($record[0]->id == $result[0]->program_id_fk ){
            $select='selected';
        }
        ?>
        <option value="<? echo $record[0]->id;?>" <? echo $select;?>><? echo $record[0]->program_name;?></option>
    <?php  endforeach; endif;?>
                                </select>
                            </div>
                        </div>




               
               
                        


                    </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> النوع </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="type"  id="type" onchange="return load($('#type').val());">
                                    <?php if($result[0]->donate_type_id_fk ==1){?>
                                        <option value="1">متبرع</option>
                                        <option value="2">فاعل خير</option>
                                        <option value="3">كفيل</option>
                                    <?}elseif($result[0]->donate_type_id_fk ==2){?>
                                        <option value="2">فاعل خير</option>
                                        <option value="3">كفيل</option>
                                        <option value="1">متبرع</option>
                                    <?}elseif($result[0]->donate_type_id_fk ==3){?>
                                        <option value="3">كفيل</option>
                                        <option value="1">متبرع</option>
                                        <option value="2">فاعل خير</option>
                                    <?}?>
                                </select>
                            </div>
                        </div>
                        </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="optionearea5">

                        <?php if($result[0]->donate_type_id_fk ==1):?>
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> المتبرعون </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select class=" form-control" name="person_id"  id="person_id"  data-show-subtext="true" data-live-search="true">
                                        <option value="">إختر</option>
                                        <?php if($donors): foreach ($donors as $record):
                                            $select='';
                                            if($record->id == $result[0]->person_id){
                                                $select='selected';
                                            }
                                            ?>
                                            <option value="<?php echo $record->id;?>" <?php echo $select;?>><?php echo $record->user_name;?></option>
                                        <?php endforeach; endif;?>
                                    </select>
                                </div>
                            </div>


                        <?php elseif ($result[0]->donate_type_id_fk ==2):?>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الإسم </h4>
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


                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">الإسم</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4" name="name" value="<?php echo $result[0]->name?>" >
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">رقم الهاتف</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4" name="mob" value="<?php echo $result[0]->mob?>" >
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">رقم البطاقة</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4" name="card_id"  value="<?php echo $result[0]->card_id?>"  >
                                </div>
                            </div>


                        <?php elseif ($result[0]->donate_type_id_fk ==3):?>


                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الكفلاء </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select class=" form-control" name="person_id"  id="person_id"  data-show-subtext="true" data-live-search="true">
                                        <?php if($guarantees): foreach ($guarantees as $record):
                                            $select='';
                                            if($record->id == $result[0]->person_id){
                                                $select='selected';
                                            }
                                            ?>
                                            <option value="<?php echo $record->id;?>" <?php echo $select;?>><?php echo $record->user_name;?></option>
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
                                <input type="number" class="r-inner-h4" name="value" value="<?php echo $result[0]->value?>"  >
                            </div>
                        </div>
    
    
    
    
 <div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">إختر نوع الدفع </h4>
        </div>
        <div class="col-xs-6 r-input">
  <select name="payment_type"  id="payment_type" onchange="return load2($('#payment_type').val());">
                    <?php if($result[0]->paid_type ==1){
                         $select_nakdy='selected="selected"';  
                        }else{
                           $select_nakdy='';    
                        }?>
                        <?php if($result[0]->paid_type ==2){
                         $select_cheek='selected="selected"';  
                        }else{
                           $select_cheek='';    
                        }?>
                         <?php if($result[0]->paid_type ==3){
                         $select_7wala='selected="selected"';  
                        }else{
                           $select_7wala='';    
                        }?>
                         <?php if($result[0]->paid_type ==4){
                         $select_stekta3='selected="selected"';  
                        }else{
                           $select_stekta3='';    
                        }?>
                         <?php if($result[0]->paid_type ==5){
                         $select_bank='selected="selected"';  
                        }else{
                           $select_bank='';    
                        }?>
                        
                                    <option value="">إختر</option>
                                    <option value="1" <?php echo $select_nakdy;?> >نقدي</option>
                                    <option value="2" <?php echo $select_cheek;?> >شيك</option>
                                    <option value="3" <?php echo $select_7wala;?> >حوالة بنكية</option>
                                    <option value="4" <?php echo $select_stekta3;?>  >إستقطاع </option>
                                     <option value="5" <?php echo $select_bank;?> >بنك </option>

      </select>
        </div>
        
    </div>
   <div  id="optionearea6">
<?php if($result[0]->paid_type == 1){
    
}elseif($result[0]->paid_type == 0){
    
}else{?>
             <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">إسم البنك</h4>
            </div>
            <div class="col-xs-6 r-input">
        
                  <select class=" form-control" name="bank_id_fk"  id="bank_id_fk" >
                        <option value=""> إختر البنك</option>
                        <?php if($banks){ 
                        foreach ($banks as $banks_data){
                        if($result[0]->bank_id_fk == $banks_data->id ){
                            $bank_id='selected="selected"';
                        }else{
                           $bank_id=''; 
                        }
                        ?>
                        <option value="<?php echo $banks_data->id;?>" <?php echo $bank_id ;?> >
                        <?php echo $banks_data->bank_name;?></option>
                        <?php } 
                        }?>
                </select>
                
            </div>
        </div>
        <div class="col-xs-12">
            <div class="col-xs-6">
                <h4 class="r-h4">رقم الحساب</h4>
            </div>
            <div class="col-xs-6 r-input">
                <input type="text" class="r-inner-h4" name="account_num" value="<?php echo $result[0]->account_num ;?>">
            </div>
        </div>
        
<?php 
}?>
</div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
                        
<div class="col-xs-12">
        <div class="col-xs-6">
            <h4 class="r-h4">وذلك لـ </h4>
        </div>
        <div class="col-xs-6 r-input">
            <input type="text" class="r-inner-h4" name="detail" value="<?php  echo $result[0]->detail ?>" >
        </div>
    </div>
                        
                        
                        
                        

                    </div>
                </div>
            </div>


            <div class="col-xs-12 r-inner-btn">
                <div class="col-xs-3">
                </div>
                <div class="col-xs-3">
                    <input type="submit" role="button" name="edit" value="حفظ" class="btn pull-right">

                </div>
                <?php echo form_close()?>
                <div class="col-xs-2">

                </div>
            </div>

        </div>
        <!--edit-->
    <?php else: ?>
        <div class="details-resorce">
            <div class="col-xs-12 r-inner-details">
                <?php  echo form_open_multipart('finance_resource/add_today_donations')?>

                <div class="col-xs-12 ">
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12 ">
                            <div class="col-xs-6">
                                <h4 class="r-h4 "> تاريخ اليوم </h4>
                            </div>
                            <div class="col-xs-6 r-input ">
                                <div class="docs-datepicker">
                                    <div class="input-group">
                                        <input type="date" name="birth_date" id="birth_date" readonly class="form-control" value="<?php echo date('Y-m-d',time()); ?>"placeholder="تاريخ اليوم "  >
                                    </div>
                                </div>
                            </div>
                        </div>



<div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> حسابات البرامج </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="account_settings_id_fk" id="account_settings_id_fk"   onchange="return lood($('#account_settings_id_fk').val());">
                                    <option value="">إختر</option>

                                    <?php if(!empty($account_settings)):

                                        foreach ($account_settings as $record):    ?>
                                            <option value="<? echo $record->id;?>" ><? echo $record->title;?></option>
                                        <?php  endforeach; endif;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12" id="optionearea1">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> البرامج </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select  name="program_id_fk">
                                    <option value="">إختر</option>
                                    <?php if(!empty($program_settings)):
                                        foreach ($program_settings as $record): ?>
                                            <option value="<? echo $record->id;?>" ><? echo $record->program_name;?></option>
                                        <?php  endforeach; endif;?>
                                </select>
                            </div>
                        </div>





                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" >
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> النوع </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="type"  id="type" onchange="return load($('#type').val());">
                                    <option value="">إختر</option>
                                    <option value="1">متبرع</option>
                                    <option value="2">فاعل خير</option>
                                    <option value="3">كفيل</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="optionearea5">
                    </div>
                </div>
            </div>


            <div class="col-xs-12 r-inner-btn" id="button" style="display: none">
                <div class="col-xs-3">
                </div>
                <div class="col-xs-3">
                    <input type="submit" role="button" name="add" value="حفظ" class="btn pull-right">

                </div>
                <?php echo form_close()?>
                <div class="col-xs-2">

                </div>
            </div>

        </div>




        <!---table------>
        <?php if(isset($records)&&$records!=null):?>
            <div class="col-xs-12 r-inner-details">
                <div class="panel-body">

                    <div class="fade in active">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>م</th>
                                <th>نوع التبرع</th>
                                <th>الإسم</th>
                                <th>القيمة</th>
                                <th>الإجراء</th>
                                <th>طباعة</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">


                            <?php
                            $a=1;
                            foreach ($records as $record ):?>
                                <tr>
                                    <td><?php echo $a ?></td>
                                    <?php
                                    $type='';
                                    $name='';
                                    if ($record->donate_type_id_fk ==1){
                                        $type='متبرع';
                                        $name=$get_name[$record->person_id]->user_name;
                                    }elseif($record->donate_type_id_fk ==2){
                                        $type='فاعل خير';
                                        $name=$record->name;
                                    }elseif($record->donate_type_id_fk ==3){
                                        $type='كفيل';
                                        $name=$get_name[$record->person_id]->user_name;
                                    }
                                    ?>
                                    <td> <?php echo $type; ?></td>
                                    <td> <?php echo $name; ?></td>
                                    <td> <?php echo $record->value ?></td>
                                    <td> <a href="<?php echo base_url('finance_resource/delete_today_donations').'/'.$record->id?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span>  <a href="<?php echo base_url('finance_resource/edit_today_donations').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                              
                              
                                  <td>
                                     
                                     <a href="<?php echo base_url('finance_resource/print_today_donations').'/'.$record->id ?>"> <i class="fa fa-print" aria-hidden="true"></i> </a>
                                     </td>
                                </tr>
                                <?php
                                $a++;
                            endforeach;  ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php  endif; endif; ?>
    <!---table------>
</div>
</div>
</div>




<script>


    function load(values)
    {
        if(values)
        {
            var dataString = 'values=' + values;
            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>/Finance_resource/add_today_donations',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#optionearea5').html(html);
                    $('#button').show()
                }
            });
            return false;
        }
        else
        {
            $('#optionearea5').html('');
            return false;
        }

    }
</script>

<script>
    function lood(num){
        if(num>0 && num != '')
        {
            var id = num;
            var dataString = 'admin_num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/Finance_resource/add_today_donations',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
            return false;
        }
        else
        {
            $("#vid_num").val('');
            $("#optionearea1").html('');
        }
    }
</script>
<script>


    function load2(values)
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


