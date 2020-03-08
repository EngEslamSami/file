
<?php
$val = $_POST['valu'];

if(!empty($val)){
    ?>
    <?php
   // echo "<pre>"; print_r($donors[$val]->pay_method_id_fk);
    //die;
    ?>
     <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4">نوع الدفع:</h4>
                            </div>
                    <?php 
                    $pay_method = array('إختر','نقدي','شيك','حوالة بنكية','استقطاع','بنك','شبكة');?>
                            <div class="col-xs-6 r-input">
                                <select name="pay_method_id_fk" id="pay_method_id_fk"   onchange="return change();" disabled="disabled"  >
                                  
                                    <?php
                                        for ($a=0;$a<sizeof($pay_method);$a++):  
                                        if($a == $donors[$val]->pay_method_id_fk){
                                            $selected='selected="selected"';
                                            
                                            
                                  echo  $pay_method[$a];
                                            
                                        }else{
                                           $selected=''; 
                                        }?>
                                            <option  <?php echo $selected;?> value="<?php echo $a; ?>"  ><?php echo $pay_method[$a]; ?></option>
                                            <?php
                                        endfor;
                                    ?>
                                </select>
                                  
                               <!--  dina pay_method_id_fk hidden  21/11  -->
                              <input type="hidden" name="pay_method_id_fk"  value="<?php echo $donors[$val]->pay_method_id_fk;?>" />
                              <!--  end  -->
                            </div>
                        </div>
                        <?php if($donors[$val]->pay_method_id_fk == 1){ ?>
                          
                          
                          <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="bank_id" >
                            <div class="col-xs-6">
                                <h4 class="r-h4">إختار الصندوق:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="box_type" required >
                                    <option value="">إختر</option>
                                   <option  value="1" >صندوق رجالي</option>
                                   <option  value="2" >صندوق نسائي</option>
                                  </select>
                            </div>
                        </div>
                            
                    <?php    }elseif($donors[$val]->pay_method_id_fk == 6){?>
                    
                           <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="bank_id" >
                            <div class="col-xs-6">
                                <h4 class="r-h4">إختار الشبكة:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="network" required >
                                    <option value="">إختر</option>
                                   <option  value="1" >شبكة رجالي</option>
                                   <option  value="2" >شبكة نسائي</option>
                                  </select>
                            </div>
                        </div>
                 
                         
                        
                 <?php   }else{?>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="bank_id" >
                            <div class="col-xs-6">
                                <h4 class="r-h4">إختار البنك:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="bank_id" disabled="disabled" >
                                    <option value="">إختر</option>
                                    <?php
                                   
                                    foreach ($banks as $bank): 
                                    if($bank->id == $donors[$val]->bank_code_fk){
                                            $selected_='selected="selected"';
                                        }else{
                                           $selected_=''; 
                                        } ?>
                                        <option <?php echo $selected_ ;?> value="<?php echo $bank->id; ?>" ><?php echo $bank->bank_name; ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                                <input  type="hidden" name="bank_id" value="<?php echo $donors[$val]->bank_code_fk ; ?>"/>
                            </div>
                        </div>

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="acc_number" >
                            <div class="col-xs-6">
                                <h4 class="r-h4">رقم الحساب:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="number"  class="r-inner-h4" name="acc_number" value="<?php echo $donors[$val]->bank_account_number;?>" readonly="readonly" >
                           <input  type="hidden" name="acc_number" value="<?php echo $donors[$val]->bank_account_number; ?>"/>
                          
                            </div>
                        </div>
                        <?php if($donors[$val]->pay_method_id_fk == 5){?>
                        <!--  dina required 21/11  -->
                           <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4">تاريخ الإستحقاق:</h4>
                            </div>
                            
                                      <div class="col-xs-6 r-input">
                            
				                        <div class="docsx-datepicker">
                                        <div class="input-group">
                                        <input type="text" class="form-control docsx-date" id="worth_date" name="worth_date" required placeholder="شهر / يوم / سنة ">
                                        </div>
                                        </div>
                                        
                                     </div>
                        </div>
                         <!--  end  -->
                           <?php
                           }
                           }
                           $day_date = date('Y-m-d');
                          // echo $day_date;
                           $donor_end_date = date('Y-m-d',$donors[$val]->guaranty_end);
                        
                        if($donor_end_date < $day_date){
                         echo'    <br />
<br />
        <div class="col-xs-12 alert alert-danger" >الكفالة منتهية</div>';
                        }else{
                                                  echo'    <br />
<br />
        <div class="col-xs-12 alert alert-success" >الكفالة غير منتهية</div>';
                        }
                        
                        
                        ?>
     <?php  $final_result =0;     
     if(isset($table[$val]))  { 
?>
<br />
<br />

 <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم البرنامج</th>
                                        <th class="text-center">قيمة البرنامج</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <!-- dina 21/11 -->
                                    <input type="hidden" name="max" value="<?php echo count($table[$val]);?>" />
                                    <!-- dina end -->   
                                <?php
                                    $x=0;
                            
                                      $value = 0; 
                                     
                                      
                                       for($z = 0 ; $z < count($table[$val]) ; $z++){
                                        $value += $programs[$table[$val][$z]->program_id_fk]->monthly_value;
                                        
                                        echo ' 
                                        
                                         <td>'.($x+1).'</td>
                                         <td>'.$programs[$table[$val][$z]->program_id_fk]->program_name.'</td>
                                         <td>'.$programs[$table[$val][$z]->program_id_fk]->monthly_value.'</td>';
                                         $final_result +=$programs[$table[$val][$z]->program_id_fk]->monthly_value;
                                        
                                        ?>
                                          <!-- dina 21/11 -->
                                         <input type="hidden" name="program_id_fk<?php echo $z;?>" value="<?php echo $programs[$table[$val][$z]->program_id_fk]->id;?>" />
                                         <input type="hidden" name="account_settings_id_fk<?php echo $z;?>" value="<?php echo $programs[$table[$val][$z]->program_id_fk]->account_settings_id_fk;?>" />
                                         <input type="hidden" name="value<?php echo $z;?>" value="<?php echo $programs[$table[$val][$z]->program_id_fk]->monthly_value;?>" />
                                         
                                          <!-- end -->
                                        <?php
             
                                       echo'</tr>
                                         '; 
                                         $x++;
                                          }
                                          
                                          echo'<tr>
                                       <td colspan="2">
                                       الإجمالي
                                       </td>
                                       <td>
                                       '.$final_result.'
                                       </td>
                                       </tr>';
                                       }else{
                                        echo('
                                        <br />
                                        <br />
                                         <div class="col-xs-12 alert alert-danger" >هذا الكفيل غير مشترك ببرامج </div>
                                        ');
                                       }
                                ?>   
                             
                                   
                                </tbody>
                            </table>
                                        
                            
                            
                                   <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">قيمة مشاركة الكفالة  :</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
				                <input type="number" value="<?php echo $final_result ;?>" min="0" id="" class="form-control" required="required" readonly="readonly" placeholder="قيمة مشاركة الكفالة "/>
                            </div>
                            
                            
                            <!--
                             <div class="col-xs-3">
                                <h4 class="r-h4">قيمة تبرع اضافية </h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
				                <input type="number" name="" min="0" id="value_addes" class="form-control" placeholder="قيمة تبرع اضافية "/>
                            </div>
                            -->
                        </div>
                     
                            
       

    <?php }else{ ?>
    <br />
<br />
        <div class="col-xs-12 alert alert-danger" >لا توجد  نتائج</div>
    <?php } 
    
    
     ?>
 <!--  dina datepicker  21/11  -->
<script>

$('#worth_date').click(function () {
  var $date = $('.docsx-date');
    var $container = $('.docsx-datepicker-container');
    var $trigger = $('.docsx-datepicker-trigger');
    var options = {
        show: function (e) {
            console.log(e.type, e.namespace);
        },
        hide: function (e) {
            console.log(e.type, e.namespace);
        },
        pick: function (e) {
            console.log(e.type, e.namespace, e.view);
        }
    };

    $date.on({
        'show.datepicker': function (e) {
            console.log(e.type, e.namespace);
        },
        'hide.datepicker': function (e) {
            console.log(e.type, e.namespace);
        },
        'pick.datepicker': function (e) {
            console.log(e.type, e.namespace, e.view);
        }
    }).datepicker(options);

    $('.docsx-options, .docsx-toggles').on('change', function (e) {
        var target = e.target;
        var $target = $(target);
        var name = $target.attr('name');
        var value = target.type === 'checkbox' ? target.checked : $target.val();
        var $optionContainer;

        switch (name) {
        case 'container':
            if (value) {
                value = $container;
                $container.show();
            } else {
                $container.hide();
            }

            break;

        case 'trigger':
            if (value) {
                value = $trigger;
                $trigger.prop('disabled', false);
            } else {
                $trigger.prop('disabled', true);
            }

            break;

        case 'inline':
            $optionContainer = $('input[name="container"]');

            if (!$optionContainer.prop('checked')) {
                $optionContainer.click();
            }

            break;

        case 'language':
            $('input[name="format"]').val($.fn.datepicker.languages[value].format);
            break;
        }

        options[name] = value;
        $date.datepicker('reset').datepicker('destroy').datepicker(options);
    });

    $('.docsx-actions').on('click', 'button', function (e) {
        var data = $(this).data();
        var args = data.arguments || [];
        var result;

        e.stopPropagation();

        if (data.method) {
            if (data.source) {
                $date.datepicker(data.method, $(data.source).val());
            } else {
                result = $date.datepicker(data.method, args[0], args[1], args[2]);

                if (result && data.target) {
                    $(data.target).val(result);
                }
            }
        }
    });

    $('[data-toggle="datepicker"]').datepicker();
});
</script>
<!-- end -->