<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            
            
    
            
            
            $data['add_Payment_of_contributions'] = 'active'; 
            //$this->load->view('admin/finance_resource/main_tabs',$data); 
            ?>
            <div class="details-resorce">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result)  && $result !=null){
                        $id = $result['id'];
                        $out['date']=date("Y-m-d",$result['date']);
                     }else{
                        $id = 0;
                        $out['date']=date("Y-m-d");
                        }?>
                        <?php
                        if(isset($result) && $result!= null){
                           ?> 
                           
                           
                            <?php echo form_open_multipart('Programs_depart/edit_contributions/'.$id)?>
                    <div class="col-xs-12">
                    
                    
                    
                             <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4">تاريخ اليوم:</h4>
                            </div>
                            
                            <div class="col-xs-6 r-input">
				             <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" value="<?php echo $out['date'];?>" name="date" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                            </div>
                        </div>

<!--
                        <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4">الكافل:</h4>
                            </div>
                            
                            <div class="col-xs-6 r-input">
				                <select name="donor_id" id="donor_id" onchange="return sent($('#donor_id').val());"     >
					               <option value="">إختر</option>
							         <?php 
                                     if (!empty($donors)):
			                             foreach ($donors as $record):
                                            $selected = '';
                                            if(isset($result) && $record->id == $result['donor_id'])
                                                $selected = 'selected';
                                            ?>
							                 <option value="<?php echo $record->id; ?>" <?php echo $selected ?>><?php echo $record->user_name; ?></option>
							         <?php  
                                        endforeach; 
                                     endif;
                                     ?>
								</select>
                            </div>
                        </div>
                        
                        -->
                                          <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4">الكافل:</h4>
                            </div>
                            
                            <div class="col-xs-6 r-input">
				              
                                
                                
                                                                
                                   <select name="donor_id" id="donor_id" onchange="return sent($('#donor_id').val());"     >
					               <option value="">إختر</option>
							         <?php 
                                     if (!empty($table)):
			                             for($x = 0 ; $x < count($table) ; $x++){
			                                   $selected = '';
                                            if(isset($result) && $donors[key($table)]->id == $result['donor_id'])
                                                $selected = 'selected';
                                          echo' <option  '.$selected.' value="'.$donors[key($table)]->id.'">'.$donors[key($table)]->user_name.'</option>';
                                            ?>
                            
							         <?php  
                                     next($table);
                                        }
                                     endif;
                                     ?>
								</select>
                                
                                
                                
                               
                            </div>
                        </div>

                         <?php  $style ='none';
                         $value='';
                         $acc_number_value='';
                         if($result['pay_method_id_fk'] >1 && $result['pay_method_id_fk'] !=4  ):
                             $style='block';
                             $value= 'selected' ;
                         $acc_number_value=$result['acc_number'];
                         endif;?>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4">نوع الدفع:</h4>
                            </div>
                            <?php $pay_method = array('إختر','نقدي','شيك','حوالة بنكية','إستقطاع','بنك');?>
                            <div class="col-xs-6 r-input">
                                <select name="pay_method_id_fk" id="pay_method_id_fk"   onchange="return change();"  >
                                    <option value="">إختر</option>
                                    <?php
                                    for ($a=0;$a<sizeof($pay_method);$a++):
                                        $select='';
                                        if($a ==$result['pay_method_id_fk']){ $select='selected';}
                                        ?>
                                        <option value="<?php echo $a; ?>"  <?php echo $select;?>><?php echo $pay_method[$a]; ?></option>
                                        <?php
                                    endfor;
                                    ?>
                                </select>
                            </div>
                        </div>



                        <?php if($donors[$result['donor_id']]->pay_method_id_fk == 1){ ?>
                          <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="bank_id" >
                            <div class="col-xs-6">
                                <h4 class="r-h4">إختار الصندوق:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="box_type" required >
                                    <option value="">إختر</option>
                                    <?php if($result['box_type'] == 1) {
                                        $sel = ' selected="selected"';
                                    }else{
                                      $sel='';  
                                    }
                                    
                                    
                                    if($result['box_type'] == 2) {
                                        $sel2 = ' selected="selected"';
                                    }else{
                                      $sel2='';  
                                    }
                                    ?>
                                   <option <?php echo $sel1 ;?> value="1" >صندوق رجالي</option>
                                   <option <?php echo $sel2 ;?> value="2" >صندوق نسائي</option>
                                  </select>
                            </div>
                        </div>
                            
                     <?php   }elseif($donors[$result['donor_id']]->pay_method_id_fk == 6){ ?>
                             <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="bank_id" >
                            <div class="col-xs-6">
                                <h4 class="r-h4">إختار الشبكة:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="network" required >
                                    <option value="">إختر</option>
                                    <?php if($result['network'] == 1) {
                                        $sell = ' selected="selected"';
                                    }else{
                                      $sell='';  
                                    }
                                    
                                    
                                    if($result['network'] == 2) {
                                        $sell2 = ' selected="selected"';
                                    }else{
                                      $sell2='';  
                                    }
                                    ?>
                                   <option <?php echo $sell ;?>  value="1" >شبكة رجالي</option>
                                   <option  <?php echo $sell2 ;?> value="2" >شبكة نسائي</option>
                                  </select>
                            </div>
                        </div>
                       <?php }else{ ?>
                            
                    

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="bank_id" >
                            <div class="col-xs-6">
                                <h4 class="r-h4">إختار البنك:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                              <!--  <select name="bank_id"  >
                                    <option value="">إختر</option>
                                    <?php
                                    foreach ($banks as $bank):
                                        $select='';
                                        if($bank->id == $result['bank_id']){ $select=$value;}?>
                                        <option value="<?php echo $bank->id; ?>"  <?php echo $select;?>><?php echo $bank->bank_name; ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select> -->
                                
                                <select name="bank_id" disabled="disabled" >
                                    <option value="">إختر</option>
                                    <?php
                                    foreach ($banks as $bank): 
                                    if($bank->id == $donors[$result['donor_id']]->bank_code_fk){
                                            $selected_='selected="selected"';
                                        }else{
                                           $selected_=''; 
                                        } ?>
                                        <option <?php echo $selected_ ;?> value="<?php echo $bank->id; ?>" ><?php echo $bank->bank_name; ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="acc_number"  >
                            <div class="col-xs-6">
                                <h4 class="r-h4">رقم الحساب:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="number"  class="r-inner-h4" name="acc_number" value="<?php echo  $donors[$result['donor_id']]->bank_account_number?>" disabled="">
                            </div>
                        </div>

 <?php   }?>
 <?php if($donors[$result['donor_id']]->pay_method_id_fk == 5){ ?>
          <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4">تاريخ الإستحقاق:</h4>
                            </div>
                            
                            <div class="col-xs-6 r-input">
				             <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date"  name="worth_date" value="<?php echo date('Y-m-d',$result['worth_date']);?>" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                            </div>
                        </div>
 <?php } ?>
 
 
 
 



<!--
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="bank_id" style="display: <? echo $style?>" >
                            <div class="col-xs-6">
                                <h4 class="r-h4">إختار البنك:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="bank_id"  >
                                    <option value="">إختر</option>
                                    <?php
                                    foreach ($banks as $bank):
                                        $select='';
                                        if($bank->id == $result['bank_id']){ $select=$value;}?>
                                        <option value="<?php echo $bank->id; ?>"  <?php echo $select;?>><?php echo $bank->bank_name; ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="acc_number" style="display: <? echo $style?>" >
                            <div class="col-xs-6">
                                <h4 class="r-h4">رقم الحساب:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="number"  class="r-inner-h4" name="acc_number" value="<?php echo $acc_number_value?>" >
                            </div>
                        </div>

-->





                         <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        <div id="optionearea2">
                        
                        
                         <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم البرنامج</th>
                                        <th class="text-center">قيمة البرنامج</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                <?php
                                $val = $result['donor_id'];
                                    $x=0;
                            
                                      $value = 0; 
                                      $final_result =0;     
                                       for($z = 0 ; $z < count($table[$val]) ; $z++){
                                        $value += $programs[$table[$val][$z]->program_id_fk]->monthly_value;
                                        
                                        echo ' 
                                        
                                         <td>'.($x+1).'</td>
                                         <td>'.$programs[$table[$val][$z]->program_id_fk]->program_name.'</td>
                                         <td>'.$programs[$table[$val][$z]->program_id_fk]->monthly_value.'</td>';
                                         $final_result +=$programs[$table[$val][$z]->program_id_fk]->monthly_value;
                                        ?>
              
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
                                    
                                       
                                ?>   
                             
                                   
                                </tbody>
                            </table>
                                        
                            
                            
                                   <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-3">
                                <h4 class="r-h4">قيمة مشاركة الكفالة </h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
				                <input type="number" name="value" min="0" id="value" value="<?php echo $result['value']?>" class="form-control" required="required" placeholder="قيمة مشاركة الكفالة "/>
                            </div>
                            
                            
                            
                            <div class="col-xs-3">
                                <h4 class="r-h4">قيمة تبرع اضافية</h4>
                            </div>
                            
                            <div class="col-xs-3 r-input">
				                <input type="number" name="value_added" min="0" id="value_addes" value="<?php echo $result['value_added']?>" class="form-control" placeholder="قيمة تبرع اضافية "/>
                            </div>
                            
                        </div>
                        
                        
                        
                        </div>
                        
                </div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                        
                            <div class="col-xs-5 r-inner-btn" style="">
                                <input type="submit" onclick="return check_box();" id="button" role="button" name="update" value="تعديل" class="btn pull-right" />
                            </div>
                            
                        </div>
                            
                        
                    </div>
                    <?php echo form_close()?>
                </div>
                           
                           
                        <?php 
                        }else{
                            
                        
                        
                        
                        ?>
                        
                        
                     <?php echo form_open_multipart('Programs_depart/add_Payment_of_contributions')?>
                    <div class="col-xs-12">

                             <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4">تاريخ اليوم:</h4>
                            </div>
                            
                            <div class="col-xs-6 r-input">
				             <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" class="form-control docs-date" required="" name="date" placeholder="شهر / يوم / سنة ">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4">الكافل:</h4>
                            </div>

                            <div class="col-xs-6 r-input">
				                <select name="donor_id" id="donor_id" onchange="return sent($('#donor_id').val());"   >
					               <option value="">إختر</option>
							         <?php
                                     if (!empty($donors)):
			                             foreach ($donors as $record):  ?>
							                 <option value="<?php echo $record->id; ?>" ><?php echo $record->user_name; ?></option>
							         <?php
                                        endforeach;
                                     endif;
                                     ?>
								</select>
                            </div>
                        </div>
                        
                        
                        
   <!--                     
                        
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-6">
                                <h4 class="r-h4">نوع الدفع:</h4>
                            </div>
                    <?php $pay_method = array('إختر','نقدي','شيك','حوالة بنكية','إستقطاع','بنك');?>
                            <div class="col-xs-6 r-input">
                                <select name="pay_method_id_fk" id="pay_method_id_fk"   onchange="return change();"  >
                                    <option value="">إختر</option>
                                    <?php
                                        for ($a=0;$a<sizeof($pay_method);$a++):  ?>
                                            <option value="<?php echo $a; ?>" ><?php echo $pay_method[$a]; ?></option>
                                            <?php
                                        endfor;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="bank_id" style="display: none">
                            <div class="col-xs-6">
                                <h4 class="r-h4">إختار البنك:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="bank_id"  >
                                    <option value="">إختر</option>
                                    <?php
                                    foreach ($banks as $bank):  ?>
                                        <option value="<?php echo $bank->id; ?>" ><?php echo $bank->bank_name; ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="acc_number" style="display: none">
                            <div class="col-xs-6">
                                <h4 class="r-h4">رقم الحساب:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="number"  class="r-inner-h4" name="acc_number" >
                            </div>
                        </div>

                         <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                         
                         
  -->                       
                         
                         
                        <div id="optionearea2"></div>
                        
                </div>

                      <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data" id="button" style="display: none">

                            <div class="col-xs-3 r-inner-btn" style="padding-top: 3px;">
                                <input type="submit" onclick="return check_box();" id="button" role="button" name="add" value="حفظ" class="btn pull-right" />
                            </div>

                        </div>
                            
                        
                    </div>
                    <?php echo form_close() ;
                    
                    }
                    ?>
                </div>
      <!---------------------------------------------------------------------------------------------->                
     <?php if(isset($all_records) && $all_records!=null):?>
                   <div class="details-resorce">
        <div class="col-xs-12 r-inner-details">
            <div class="panel-body">
                <div class="fade in active" id="optionearead">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">م</th>
                            <th class="text-center">تاريخ الإشتراك</th>
                            <th class="text-center">إسم الكافل</th>
                             
                            <th class="text-center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">

                       <?php
                       $x=0;
                       foreach ($all_records as $record):
                       
                           $x++;?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <td><?php echo date("Y/m/d",$record->date);?></td>
                            
                            <?php
                            
        $this->db->select('*');
        $this->db->from('donors_t');
        $this->db->where('id',$record->donor_id);
         $query=$this->db->get();
         foreach ($query->result() as $row) {?>
        <td><?php echo $row->user_name;?></td>
          <?php }
                            ?>
                           
  <td>
  <a href="<?php echo base_url().'Programs_depart/delete_contributions/'.$record->id?>"><i class="fa fa-trash button" aria-hidden="true"></i></a>
  /<a href="<?php echo base_url().'Programs_depart/edit_contributions/'.$record->id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
  /   <a href="<?php echo base_url().'Programs_depart/print_programs_depart/'.$record->id?>" ><i class="fa fa-print" aria-hidden="true"></i></a>
  
  
  
  </td>
                        </tr>
                            <?php endforeach;?>
                    
                        </tbody>
                    </table>
                </div>

            </div>
  

        </div>
    </div>
 <?php endif;?>
   <!------------------------------------------------------------------------------------------->             
            </div>
        </div>
        
        
        
    </div>
</div>







            <script>
                function sent(valu)
                {
                //    alert(valu);
                    if(valu)
                    {
                        var dataString = 'valu=' + valu;
                        $.ajax({

                            type:'post',
                            url: '<?php echo base_url() ?>Programs_depart/add_Payment_of_contributions',
                            data:dataString,
                            dataType: 'html',
                            cache:false,
                            success: function(html){
                                $('#optionearea2').html(html);
                                $('#button').show()
                            }
                        });
                        return false;
                    }
                    else
                    {
                        $('#optionearea2').html('');
                        return false;
                    }

                }
            </script>
<script>
    
    function change() {
         method =  $('#pay_method_id_fk').val();
         if(method >1  && method !=4){
             $('#bank_id').show();
             $('#acc_number').show();
         }else{
             $('#bank_id').hide();
             $('#acc_number').hide();
         }
        
    }
</script>