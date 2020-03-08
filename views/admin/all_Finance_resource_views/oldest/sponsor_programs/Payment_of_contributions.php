


<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <!-- open panel-body-->
            <?php if(isset($result)):
                $id = $result['donor_id'];
                $out['date']=date("Y-m-d",$result['date']);
                $validation ='';
                $aria='';
            else:
                $id = 0;
                $out['date']=date("Y-m-d");
                $validation ='required';
                $aria='true';
            endif; ?>

            <?php if(isset($result)):
                echo form_open_multipart('all_Finance_resource/Sponsor_programs/edit_contributions/'.$id.'/'.$result['pill_num'])?>
            <div class="col-xs-12">
                <?php
                $style ='none';
                $value='';
                $acc_number_value='';
                if($result['pay_method_id_fk'] >1 && $result['pay_method_id_fk'] !=4  ){
                    $style='block';
                    $value= 'selected' ;
                    $acc_number_value=$result['acc_number'];
                } ?>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> رقم السند: </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="form-control " value="<?php echo  $result['pill_num']; ?>"  data-validation="<?php   echo$validation;?>" name="pill_num"  readonly="readonly">
                        </div>
                    </div>

                </div>

                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> تاريخ اليوم: </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="date" class="form-control " value="<?php echo $out['date'];?>" name="date" placeholder="شهر / يوم / سنة ">
                        </div>
                    </div>

                </div>


                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">الكافل:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="donor_id" id="donor_id" onchange="return sent($('#donor_id').val());"  data-validation="<?php   echo$validation;?>"  aria-required="<?php  echo$aria;?>">
                                <option value="">إختر</option>
                                <?php



                                if (!empty($donors)):
                                    foreach ($donors as $record){
                                        $selected = '';
                                        if(isset($result) && $record->id == $result['donor_id']){
                                            $selected = 'selected';
                                        }

                                        echo' <option  '.$selected.' value="'.$record->id.'">'.$record->name.'</option>'; ?>

                                <?php
                                    }

                                endif;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>




                <div id="optionearea2">
                    <?php $pay_method = array('إختر','نقدي','شيك','حوالة بنكية','إستقطاع','بنك','شبكة');?>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">نوع الدفع:  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="pay_method_id_fk" id="pay_method_id_fk"   onchange="return change();" disabled="disabled"   data-validation="<?php   echo$validation;?>"  aria-required="<?php  echo$aria;?>">
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
                    </div>

                    <input type="hidden" name="pay_method_id_fk"  value="<?php echo $donors[$result['donor_id']]->pay_method ;?>" />
                    <!----------------------------------start-->
                    <?php if($donors[$result['donor_id']]->pay_method == 1){ ?>

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="bank_id">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">إختار الصندوق:</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="box_type" data-validation="<?php   echo$validation;?>"  aria-required="<?php  echo$aria;?>" >
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
                                        <option <?php echo $sel ;?> value="1" >صندوق رجالي</option>
                                        <option <?php echo $sel2 ;?> value="2" >صندوق نسائي</option>
                                    </select>
                                </div>
                            </div>
                        </div>



                    <?php   }elseif($donors[$result['donor_id']]->pay_method == 6){ ?>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="bank_id" >
                            <div class="col-xs-6">
                                <h4 class="r-h4">إختار الشبكة:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="network"  data-validation="<?php   echo$validation;?>"  aria-required="<?php  echo$aria;?>" >
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

                                <select name="bank_id" disabled="disabled" data-validation="<?php   echo$validation;?>"  aria-required="<?php  echo$aria;?>" >
                                    <option value="">إختر</option>
                                    <?php
                                    foreach ($banks as $bank):
                                        if($bank->id == $donors[$result['donor_id']]->bank_id_fk){
                                            $selected_='selected="selected"';
                                        }else{
                                            $selected_='';
                                        } ?>
                                        <option <?php echo $selected_ ;?> value="<?php echo $bank->id; ?>" ><?php echo $bank->bank_name; ?></option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                                <input type="hidden" name="bank_id" value="<?php echo $donors[$result['donor_id']]->bank_id_fk;?>" />
                            </div>
                        </div>

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data" id="acc_number"  >
                            <div class="col-xs-6">
                                <h4 class="r-h4">رقم الحساب:</h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="number"  class="r-inner-h4" name="acc_number" value="<?php echo  $donors[$result['donor_id']]->account_number?>" disabled="">
                                <!-- dina 21/11 -->
                                <input type="hidden" name="acc_number" value="<?php echo $donors[$result['donor_id']]->account_number;?>" />
                                <!--end -->

                            </div>
                        </div>

                    <?php   }?>
                    <!----------------------------------end_start-->

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

                                <?php
                                $val = $result['donor_id'];
                                $x=0;
                                ?>
                                <!-- dina 21/11 -->
                                <input type="hidden" name="max" value="<?php echo count($table[$val]);?>" />
                                <!-- dina end -->
                                <?php        $value = 0;
                                $final_result =0;
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


                                ?>


                                </tbody>
                            </table>

                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4">قيمة مشاركة الكفالة : </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="number" name="" min="0" id="value" value="<?php echo $final_result ;?>" disabled="disabled" class="form-control" data-validation="<?php   echo$validation;?>" placeholder="قيمة مشاركة الكفالة "/>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-12 r-inner-btn">
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                            <input type="submit" role="button"  onclick="return check_box();"   name="update" value="تعديل" class="btn pull-right" />
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                    </div>
                </div>
            </div>



            <?php echo form_close();

                 else:?>

         <!---------------------------insert-------------------------->
                     <?php echo form_open_multipart('all_Finance_resource/Sponsor_programs/add_Payment_of_contributions')?>
            <div class="col-xs-12">
                     <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                         <div class="col-xs-12">
                             <div class="col-xs-6">
                                 <h4 class="r-h4">رقم السند : </h4>
                             </div>
                             <div class="col-xs-6 r-input">

                                 <input type="text" class="form-control " value="<?php echo $last_id; ?>"  name="pill_num"  data-validation="<?php   echo$validation;?>">
                             </div>
                         </div>
                     </div>


                     <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                         <div class="col-xs-12">
                             <div class="col-xs-6">
                                 <h4 class="r-h4">تاريخ اليوم: </h4>
                             </div>
                             <div class="col-xs-6 r-input">
                                 <input type="date" class="form-control " data-validation="<?php   echo$validation;?>" name="date" >
                             </div>
                         </div>

                     </div>


                     <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                         <div class="col-xs-12">
                             <div class="col-xs-6">
                                 <h4 class="r-h4">الكافل: </h4>
                             </div>
                             <div class="col-xs-6 r-input">
                                 <select name="donor_id" id="donor_id"   onchange="return sent($('#donor_id').val());" class="selectpicker no-padding form-control" data-show-subtext="true" data-live-search="true" data-validation="<?php   echo$validation;?>"  aria-required="<?php  echo$aria;?>" >
                                     <option value="">إختر</option>
                                     <?php
                                     if (!empty($donors)):
                                         foreach ($donors as $record):  ?>
                                             <option value="<?php echo $record->id; ?>" ><?php echo $record->name; ?></option>
                                             <?php
                                         endforeach;
                                     endif;
                                     ?>
                                 </select>
                             </div>
                         </div>

                     </div>
                     <div id="optionearea2"></div>
         <!---------------------------insert-------------------------->

                     <div class="col-xs-12 r-inner-btn">
                         <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                         <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                             <input type="submit"  id="button"  role="button" name="add"   value="حفظ" class="btn pull-right" />
                         </div>
                         <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                     </div>
                </div>
                 <?php echo form_close();  endif;?>

            <!-- table-->

            <?php if(isset($all_records) && $all_records!=null):?>
        <div class="col-xs-12">
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
                                        
                                        <td><?php echo date("Y-m-d",$record->date);?></td>

                                        <?php

                                        $this->db->select('*');
                                        $this->db->from('sponsors');
                                        $this->db->where('id',$record->donor_id);
                                        $query=$this->db->get();
                                        if ($query->num_rows() > 0) {
                                        foreach ($query->result() as $row) {?>
                                            <td><?php echo $row->name;?></td>
                                        <?php } }else{
                                        ?>
                                            <td></td>
                                            <? } ?>
                                        <td>
                                            <a href="<?php echo base_url().'all_Finance_resource/Sponsor_programs/delete_contributions/'.$record->id.'/'.$record->pill_num?>"><i class="fa fa-trash button" aria-hidden="true"></i></a>
                                            /<a href="<?php echo base_url().'all_Finance_resource/Sponsor_programs/edit_contributions/'.$record->id.'/'.$record->pill_num?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            /   <a href="<?php echo base_url().'all_Finance_resource/Sponsor_programs/print_programs_depart/'.$record->id?>" ><i class="fa fa-print" aria-hidden="true"></i></a>



                                        </td>
                                    </tr>
                                <?php endforeach;?>

                                </tbody>
                            </table>
                            <?php endif;?>
            <!-- table-->
        </div>
        </div>

    </div>
</div>

    <!---------------------------------------------------------------------------------->

<script>
    function sent(valu)
    {
        //    alert(valu);
        if(valu)
        {
            var dataString = 'valu=' + valu;
            $.ajax({

                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/Sponsor_programs/add_Payment_of_contributions',
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
