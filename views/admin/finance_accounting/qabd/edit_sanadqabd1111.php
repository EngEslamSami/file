<?php unset($_SESSION['sanad_sarf_'.$_SESSION["user_id"]]); ?>
<div class="col-xs-12 fadeInUp " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <div class="panel-body">





            <?php echo form_open_multipart('admin/Finance_accounting/sand_sarf',array('id' => 'myform','onsubmit' => "test()" ))?>
            <div class="col-md-6 r-sanad-col-md">
                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12 inner-side r-data">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  رقم السند  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="number" class="r-inner-h4 " readonly value="<?php echo $all_vouchers[0]->vouch_num; ?>" id="vouch_num" name="vouch_num" placeholder=" رقم السند " />
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  تاريخ السند  </h4>
                        </div>
                        <div class="col-xs-6 r-input ">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="text" class="form-control " id="receipt_date"  name="receipt_date" placeholder="شهر / يوم / سنة " value="<?php echo date('Y-m-d',$all_vouchers[0]->receipt_date); ?>" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> الحساب الدائن  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="account_code" id="account_code" class="selectpicker form-control" data-show-subtext="true" data-live-search="true"  >
                                <option value="">إختر</option>
                                <?php foreach($accout_groups  as $record):?>
                                    <?php $array_levels=array('','-','--','---','----','----','-----','------'); ?>
                                    <option value="<?php echo $record->code?>" <?php if(!empty($disabls['dis'.$record->id])){echo  $disabls['dis'.$record->id];}?>>
                                        <?php echo $array_levels[$record->level].$record->name?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> القيمة </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="number" id="value"  name="value" class="r-inner-h4" placeholder="القيمة" />
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  البيان </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" id="byan_sarf"  name="byan_sarf"   value="البيان" class="r-inner-h4"  />
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> طرق الدفع </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select id="r-style-resours" name="vouch_type" onchange="sanad($('#r-style-resours').val());"  readonly >
                                <option value=""> - اختر - </option>
                                <option value="1"  <?php if($all_vouchers[0]->vouch_type==1){?> selected="selected"  <?php } ?>> نقدي </option>
                                <option value="2"  <?php if($all_vouchers[0]->vouch_type==2){?> selected="selected" <?php } ?>> تحويل بنكي</option>
                                <option value="3" <?php if($all_vouchers[0]->vouch_type==3){?> selected="selected"  <?php } ?>> شيك </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data "<?php if($all_vouchers[0]->vouch_type==1){ ?> style="display: block" <?php } else{?> style="display: none;" <?php } ?>>
                        <div class="col-xs-6">
                            <h4 class="r-h4">  إسم الصندوق </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="box_name"  id="box_name" >
                                <option> - اختر - </option>
                                <option value="22"> - اختر2 - </option>
                                <?php if(isset($boxs) && $boxs !=null):
                                    foreach($boxs as $one_box): $select='';if($all_vouchers[0]->dayen == $one_box){ $select='selected';}?>
                                        <option value="<?php echo $one_box->code?>" <?php echo $select;?>>  <?php echo $one_box->name?></option>
                                    <?php endforeach; endif;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data "<?php if($all_vouchers[0]->vouch_type==2||$all_vouchers[0]->vouch_type==3){ ?> style="display: block" <?php } else{?> style="display: none;" <?php } ?>>
                        <div class="col-xs-6">
                            <h4 class="r-h4"> إختيار إسم البنك </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="bank_name"  id="bank_name" >
                                <option> - اختر - </option>
                                <option value="12"> - اختر3 - </option>
                                <?php if(isset($banks) && $banks !=null):
                                    foreach($banks as $one_bank):  $select='';if($all_vouchers[0]->dayen == $one_bank){ $select='selected';}?>
                                        <option value="<?php echo $one_bank->code?>" <?php echo $select;?>>  <?php echo $one_bank->name?></option>
                                    <?php endforeach; endif;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data "<?php if($all_vouchers[0]->vouch_type==2||$all_vouchers[0]->vouch_type==3){ ?> style="display: block" <?php } else{?> style="display: none;" <?php } ?>>
                        <div class="col-xs-6">
                            <h4 class="r-h4"> رقم الشيك</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="number"  name="check_num" id="check_num"class="r-inner-h4 " />
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data " <?php if($all_vouchers[0]->vouch_type==2){ ?> style="display: block" <?php } else{?> style="display: none;" <?php } ?>>
                        <div class="col-xs-6">
                            <h4 class="r-h4">  تاريخ الايداع  </h4>
                        </div>
                        <div class="col-xs-6 r-input ">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="date" name="recive_date" id="recive_date" class="form-control " placeholder="شهر / يوم / سنة " />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data " <?php if($all_vouchers[0]->vouch_type==3){ ?> style="display: block" <?php } else{?> style="display: none;" <?php } ?>>
                        <div class="col-xs-6">
                            <h4 class="r-h4">  تاريخ الاستحقاق  </h4>
                        </div>
                        <div class="col-xs-6 r-input ">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="date" name="recive_date"  id="recive_date" class="form-control "  placeholder="شهر / يوم / سنة "/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 r-input">
                        <input type="hidden" id="times" name="times" value="frist"  />
                        <input type="hidden" id="admin" value="<?php echo $_SESSION['user_id']?>" name="admin"  />
                        <button type="submit"  onclick="return AddAcount();" name="add" class="btn center-block r-manage-btn "> إضافة حساب </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 r-sanad-col-md  r-show-sanad-data">
                <!------------------------------------------------------------------------------------------------------------------------->
                <?php echo form_close()?>
                <div id="results" class="r-inner-details"></div>

            </div>
            <?php  if(!empty($all_vouchers)){
                ?>


                <table id="colored-bgg" class="table table-bordered success">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>اسم الحساب</th>
                        <th>القيمة</th>
                        <th>الأجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php    $all_value=0;  $i=1;for($x = 0 ; $x < count($all_vouchers) ; $x++){ ?>
                        <tr>
                            <td scope="row"><?php echo $i++?></td>
                            <td><?php echo $all_vouchers[$x]->account_name; ?></td>
                            <td><?php echo $all_vouchers[$x]->value;?></td>
                            <td>                          <a href="<?php echo  base_url('admin/Finance_accounting/delete_sand_qabd').'/'.$all_vouchers[$x]->id.'/'.$all_vouchers[$x]->vouch_num?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" >
                                    <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>

                        <?php $all_value += $all_vouchers[$x]->value  ;
                    } ?>
                    <tr>
                        <td colspan="2"> الإجمالى</td>
                        <td><?php echo $all_value ?></td><td></td>
                    </tr>
                    </tbody>
                </table>
            <? }
            ?>
        </div>
    </div>


    <script>


        function AddAcount(){
            var num=$('#vouch_num').val();
            var receipt_date=$('#receipt_date').val();
            var account_code=$('#account_code').val();
            var value=$('#value').val();
            var byan_sarf=$('#byan_sarf').val();
            var box_name= $('#box_name').val();
            var style=$('#r-style-resours').val();

            var bank_name=$('#bank_name').val();
            var check_num=$('#check_num').val();
            var recive_date=$('#recive_date').val();
            if(num==''||receipt_date==''||account_code==''||value==''||byan_sarf==''||style==''){
                alert("من فضلك املأ كافه الحقول");
                return;

            }
            if(style==1) {
                if(box_name==''){
                    alert("من فضلك ادخل اسم الصندوق");
                    return;
                }
            }

            if(style==2) {
                if(bank_name==''||check_num==''||recive_date=='') {
                    alert("من فضلك املا اسم البنك ورقم الشيك وتاريخ الايداع");
                    return;
                }
            }
            if(style==3) {
                if(bank_name==''||check_num==''||recive_date=='') {
                    alert("من فضلك املا اسم البنك ورقم الشيك وتاريخ الاستحقاق");
                    return;
                }
            }

            var dataString = $("#myform").serialize();
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>admin/Sessins_data/sanad_sarf_account',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#results').html(html);
                }
            });
            return false;
        }


    </script>