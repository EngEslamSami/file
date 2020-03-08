<?php unset($_SESSION['sanad_sarf_'.$_SESSION["user_id"]]);
$max_id = $select_max_id_[0]->id+1; ?>
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
                            <input type="number" class="r-inner-h4 " value="<?php //echo $max_id; ?>" id="vouch_num" name="vouch_num" placeholder=" رقم السند " />
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  تاريخ السند  </h4>
                        </div>
                        <div class="col-xs-6 r-input ">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="date" class="form-control " id="receipt_date"  name="receipt_date" placeholder="شهر / يوم / سنة " />
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
                            <select id="r-style-resours" name="vouch_type" onchange="sanad($('#r-style-resours').val());" >
                                <option value=""> - اختر - </option>
                                <option value="1"> نقدي </option>
                                <option value="2"> تحويل بنكي</option>
                                <option value="3"> شيك </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data r-style-sanad">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  إسم الصندوق </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="box_name"  id="box_name" >
                                <option> - اختر - </option>
                               
                                <?php if(isset($boxs) && $boxs !=null):
                                    foreach($boxs as $one_box): ?>
                                        <option value="<?php echo $one_box->code?>">  <?php echo $one_box->name?></option>
                                    <?php endforeach; endif;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data r-style-sanad1">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> إختيار إسم البنك </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="bank_name"  id="bank_name" >
                                <option> - اختر - </option>
                                <option value="12"> - اختر3 - </option>
                                <?php if(isset($banks) && $banks !=null):
                                    foreach($banks as $one_bank): ?>
                                        <option value="<?php echo $one_bank->code?>">  <?php echo $one_bank->name?></option>
                                    <?php endforeach; endif;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data r-style-sanad2">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> رقم الشيك</h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="number"  name="check_num" id="check_num"class="r-inner-h4 " />
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data r-style-sanad3">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  تاريخ الايداع  </h4>
                        </div>
                        <div class="col-xs-6 r-input ">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="date" name="recive_date" id="recive_date" class="form-control " placeholder="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 inner-side r-data r-style-sanad4">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  تاريخ الاستحقاق  </h4>
                        </div>
                        <div class="col-xs-6 r-input ">
                            <div class="docs-datepicker">
                                <div class="input-group">
                                    <input type="date" name="recive_date_other"  id="recive_date" class="form-control "  placeholder=" "/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 r-input">
                        <input type="hidden" id="times" name="times" value="frist"  />
                        <input type="hidden" id="admin" value="<?php echo $_SESSION['user_id']?>" name="admin"  />
                        <button type="button"  onclick="return AddAcount();" name="add" class="btn center-block r-manage-btn "> إضافة حساب </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 r-sanad-col-md  r-show-sanad-data">
                <!------------------------------------------------------------------------------------------------------------------------->
                <?php echo form_close()?>
             <div id="results" class="r-inner-details"></div>

        </div>
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