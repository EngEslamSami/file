


<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">


          <div class="col-sm-11 col-xs-12">
               
                <!--  -->
                	<?php //$this->load->view('admin/finance_accounting/sandat_qabd_tabs'); ?>
               <!--  --> 
 <?php unset($_SESSION['sanad_sarf_'.$_SESSION["user_id"]]);?>
 
  <?php echo form_open_multipart('admin/Finance_accounting/sand_qabd',array('id' => 'myform' ))?>       
                <div class="details-resorce">
                    <div class="col-md-6 r-sanad-col-md">
                        <div class="col-xs-12 r-inner-details">
                            <div class="col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  رقم السند  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4 " readonly="readonly" id="vouch_num" name="vouch_num" value="<?php echo $this->uri->segment(4);?>"/>
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  تاريخ السند  </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" readonly="readonly" value="<?php echo date("Y/m/d",$sand_item[1]->receipt_date);?>" class="form-control " id="receipt_date" name="receipt_date" placeholder="شهر / يوم / سنة " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الحساب المدين  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="account_code" id="account_code" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                        <option value=""> - اختر - </option>
                                       <?php foreach($accout_groups  as $record):?>
                                         <?php $array_levels=array('','-','--','---','----','----','-----','------'); ?>
                                          <option value="<?php echo $record->code?>" <?php if(!empty($disabls['dis'.$record->id])){echo  $disabls['dis'.$record->id];}?> >
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
                                    <input type="number" id="value"  name="value" class="r-inner-h4" placeholder="القيمة"/>
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  البيان </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text"  readonly="readonly"id="byan_sarf" value="<?php echo $sand_item[1]->details;?>"  name="byan_sarf"   value="البيان" class="r-inner-h4"  />
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> طرق الدفع </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select id="r-style-resours" name="vouch_type"  onchange="sanad($('#r-style-resours').val());" >
                                        <option value=""> - اختر - </option>
                                        <option value="1"  <?php if($sand_item[1]->vouch_type==1){?> selected="selected" <?php } ?>> نقدي </option>
                                        <option value="2"  <?php if($sand_item[1]->vouch_type==2){?> selected="selected" <?php } ?>> تحويل بنكي</option>
                                        <option value="3" <?php if($sand_item[1]->vouch_type==3){?> selected="selected" <?php } ?>> شيك </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data "<?php if($sand_item[1]->vouch_type==1){ ?> style="display: block" <?php } else{?> style="display: none;" <?php } ?>>
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  إسم الصندوق </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="box_name"  id="box_name" >
                                        <option value=""> - اختر - </option>
                                        <option value="33"> - اختر33 - </option>

                                        <?php if(isset($boxs) && $boxs !=null):
                                        foreach($boxs as $one_box): ?>
                                        <option value="<?php echo $one_box->code?>" <?php if($one_box->code==$sand_item[1]->maden){?> selected="selected"<?php } ?>>  <?php echo $one_box->name?></option>
                                        <?php endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data "<?php if($sand_item[1]->vouch_type==2||$sand_item[1]->vouch_type==3){ ?> style="display: block" <?php } else{?> style="display: none;" <?php } ?>>
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> إختيار إسم البنك </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="bank_name"  id="bank_name" >
                                        <option value=""> - اختر - </option>

                                      <?php if(isset($banks) && $banks !=null):
                                        foreach($banks as $one_bank): ?>
                                        <option value="<?php echo $one_bank->code?>" <?php if($one_bank->code==$sand_item[1]->maden){?> selected="selected"<?php } ?>>  <?php echo $one_bank->name?></option>
                                        <?php endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data "<?php if($sand_item[1]->vouch_type==2||$sand_item[1]->vouch_type==3){ ?> style="display: block" <?php } else{?> style="display: none;" <?php } ?>>
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> رقم الشيك</h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number"  name="check_num" id="check_num"class="r-inner-h4 " readonly="readonly" value="<?php echo $sand_item[1]->sheek_num;?>" />
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data " <?php if($sand_item[1]->vouch_type==2){ ?> style="display: block" <?php } else{?> style="display: none;" <?php } ?>>
                            <div class="col-xs-6">
                                    <h4 class="r-h4">  تاريخ الايداع  </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" readonly="readonly" value="<?php echo date("Y/m/d",$sand_item[1]->date_received);?>" name="recive_date" id="recive_date" class="form-control " >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 inner-side r-data " <?php if($sand_item[1]->vouch_type==3){ ?> style="display: block" <?php } else{?> style="display: none;" <?php } ?>>
                                <div class="col-xs-6">
                                    <h4 class="r-h4">  تاريخ الاستحقاق  </h4>
                                </div>
                                <div class="col-xs-6 r-input ">
                                    <div class="docs-datepicker">
                                        <div class="input-group">
                                            <input type="text" name="recive_date"  readonly="readonly" value="<?php echo date("Y/M/d",$sand_item[1]->date_received);?>" id="recive_date" class="form-control "  placeholder="شهر / يوم / سنة "/>
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
  <div id="results" class="r-inner-details"></div>
  <!----------------------------------------------------------------------------------------------------------->  
</div>

                </div>
                    <?php echo form_close()?>
            </div>

<!--==================================== start-data-table ==================================================-->
<div class="col-sm-12 col-md-12 col-xs-12" style="padding-top: 0;">
    <div class="top-line"></div><!--message of delete will be showen here-->
    <div class="panel panel-bd lobidrag" style="padding-top: 0;">
        <div class="panel-heading" style="">

        </div>
        <div class="panel-body">
            <?php

            if(isset($sand_item)&&!empty($sand_item)){




                ?>

                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="visible-md visible-lg">
                        <th>مسلسل</th>
                        <th>رقم القيد </th>
                        <th>اسم الحساب </th>
                        <th>طريقه الدفع </th>

                        <th>الاجراء</th>
                    </tr>

                    </thead>
                    <tbody>
                    <?php
                    $x=1;
                    $types=array(1=>'نقدي',2=>'شيك',3=>'تحويل بنكي');
                    foreach($sand_item as $row){?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <td><?php echo $row->vouch_num;?></td>
                            <td><?php echo $row->account_group;?></td>
                            <td><?php echo $types [$row->vouch_type];?></td>

                            <td>





                                <a  href="<?php echo base_url();?>admin/Finance_accounting/delete_sand/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>


                            </td>


                        </tr>
                        <?php
                        $x++;
                    }
                    ?>
                    </tbody>
                </table>
                <?php
            }
            ?>
        </div>

    </div>
</div>
        </div>
    </div>
</div>
<!--================================================= end-data-table =====================================-->
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
                url: '<?php echo base_url() ?>admin/Sessins_data/sanad_qabd_account',
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