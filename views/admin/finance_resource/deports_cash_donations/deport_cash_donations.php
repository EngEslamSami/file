<div class="col-sm-11 col-xs-12">
    <div class="details-resorce">

        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <!-- <div class="panel-heading"> -->
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1default" data-toggle="tab">نقدي </a></li>
                        <li><a href="#tab2default" data-toggle="tab">شيك</a></li>
                        <li><a href="#tab3default" data-toggle="tab">حوالة بنكية</a></li>
                        <li><a href="#tab4default" data-toggle="tab">استقطاع</a></li>
                        <li><a href="#tab5default" data-toggle="tab">بنك</a></li>
                        <li><a href="#tab6default" data-toggle="tab">شبكه</a></li>
                    </ul>
                    <!-- </div> -->
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active"  id="tab1default">
                            <?php if(isset($all_cach) && $all_cach!=null && !empty($all_cach) ){?>
                                <form id="form_cach">
                                    <table id="no-more-tables" class="table table-bordered" role="table">
                                        <thead>
                                        <tr>
                                            <th class="">
                                                <input type="checkbox" name=""  onclick="checkAll(this,'all_cach')">
                                            </th>
                                            <th class="">الإسم </th>
                                            <th class="">نوع التبرع </th>
                                            <th class="">القيمة  </th>
                                            <th class="">إسم الحساب   </th>
                                            <th class="">إسم البرنامج  </th>
                                            <th class=""> الصندوق   </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $count=1; foreach ($all_cach as $row){
                                            $total_value=$row->value;?>
                                            <?php
                                            $type='';
                                            $name='';
                                            if ($row->donate_type_id_fk ==1){
                                                $type='متبرع';
                                                $name=$row->person_name;
                                            }elseif($row->donate_type_id_fk ==2){
                                                $type='فاعل خير';
                                                $name=$row->name;
                                            }elseif($row->donate_type_id_fk ==3){
                                                $type='كفيل';
                                                $name=$row->person_name;
                                            }
                                            
                                            /*** Box Name **********/
                                            if($row->box == 1){
                                                $box_name = 'صندوق رجالي';
                                            }elseif($row->box == 2){
                                                  $box_name = 'صندوق نسائي';
                                            }else{
                                               $box_name = " غير محدد"; 
                                            }
                                            /***********************/
                                            
                                            
                                            ?>
                                            <tr>
                                                <td>
                                                <input type="checkbox" name="select-all[]" value="<?php  echo $total_value."-".$row->id; ?>" class="all_cach" required /></td>
                                                <td><?php echo $name;  ?></td>
                                                <td><?php echo $type; ?></td>
                                                <td><?php echo $row->value; ?></td>
                                                <td><?php echo $row->account_name; ?></td>
                                                <td><?php echo $row->program_name; ?></td>
                                                <td><?php echo $box_name; ?></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                    <div class="col-md-11">
                                        <input type="hidden" name="ADD" value="1" />
                                        <button type="button" onclick="deport('form_cach','option_cach');" style="width:10% !important;" class="btn-success"> تحويل </button>
                                    </div>
                                </form>
                                <div class="" id="option_cach"></div>
                            <?php }else{?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>لا يوجد !</strong> تبرعات إضافية  .
                                </div>
                            <?php } ?>
                        </div>
                        <div class="tab-pane fade" id="tab2default">
                            <?php if(isset($all_chek) && $all_chek!=null && !empty($all_chek) ){?>
                                <form id="form_all_chek">
                                    <table id="no-more-tables" class="table table-bordered" role="table">
                                        <thead>
                                        <tr>
                                            <th class="">
                                                <input type="checkbox" name=""  onclick="checkAll(this,'all_chek')">
                                            </th>
                                            <th class="">الإسم </th>
                                            <th class="">نوع التبرع </th>
                                            <th class="">القيمة  </th>
                                            <th class="">إسم الحساب   </th>
                                            <th class="">إسم البرنامج  </th>
                                            <th class="">إسم البنك   </th>
                                            <th class="">رقم حساب الشيك    </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $count=1; foreach ($all_chek as $row){
                                            $total_value=$row->value;?>
                                            <?php
                                            $type='';
                                            $name='';
                                            if ($row->donate_type_id_fk ==1){
                                                $type='متبرع';
                                                $name=$row->person_name;
                                            }elseif($row->donate_type_id_fk ==2){
                                                $type='فاعل خير';
                                                $name=$row->name;
                                            }elseif($row->donate_type_id_fk ==3){
                                                $type='كفيل';
                                                $name=$row->person_name;
                                            }
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="select-all[]" value="<?php  echo $total_value."-".$row->id; ?>" class="all_chek"></td>
                                                <td><?php echo $name;  ?></td>
                                                <td><?php echo $type; ?></td>
                                                <td><?php echo $row->value; ?></td>
                                                <td><?php echo $row->account_name; ?></td>
                                                <td><?php echo $row->program_name; ?></td>
                                                <td><?php echo $row->bank_name; ?></td>
                                                <td><?php echo $row->account_num; ?></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                    <div class="col-md-11">
                                        <input type="hidden" name="ADD" value="2" />
                                        <button type="button" onclick="deport('form_all_chek','option_all_chek');"  style="width:10% !important;" class="btn-success"> تحويل </button>
                                    </div>
                                </form>
                                <div class="" id="option_all_chek"></div>
                            <?php }else{?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>لا يوجد !</strong> تبرعات إضافية  .
                                </div>
                            <?php } ?>
                        </div>
                        <div class="tab-pane fade" id="tab3default">
                            <?php if(isset($all_bank_transfer) && $all_bank_transfer!=null && !empty($all_bank_transfer) ){?>
                                <form id="form_all_bank_transfer">
                                    <table id="no-more-tables" class="table table-bordered" role="table">
                                        <thead>
                                        <tr>
                                            <th class="">
                                                <input type="checkbox" name=""  onclick="checkAll(this,'all_bank_transfer')">
                                            </th>
                                            <th class="">الإسم </th>
                                            <th class="">نوع التبرع </th>
                                            <th class="">القيمة  </th>
                                            <th class="">إسم الحساب   </th>
                                            <th class="">إسم البرنامج  </th>
                                             <th class="">إسم البنك   </th>
                                            <th class="">رقم حساب الشيك    </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $count=1; foreach ($all_bank_transfer as $row){
                                            $total_value=$row->value;?>
                                            <?php
                                            $type='';
                                            $name='';
                                            if ($row->donate_type_id_fk ==1){
                                                $type='متبرع';
                                                $name=$row->person_name;
                                            }elseif($row->donate_type_id_fk ==2){
                                                $type='فاعل خير';
                                                $name=$row->name;
                                            }elseif($row->donate_type_id_fk ==3){
                                                $type='كفيل';
                                                $name=$row->person_name;
                                            }
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="select-all[]" value="<?php  echo $total_value."-".$row->id; ?>" class="all_bank_transfer"></td>
                                                <td><?php echo $name;  ?></td>
                                                <td><?php echo $type; ?></td>
                                                <td><?php echo $row->value; ?></td>
                                                <td><?php echo $row->account_name; ?></td>
                                                <td><?php echo $row->program_name; ?></td>
                                                <td><?php echo $row->bank_name; ?></td>
                                                <td><?php echo $row->account_num; ?></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                    <div class="col-md-11">
                                        <input type="hidden" name="ADD" value="3" />
                                        <button type="button" onclick="deport('form_all_bank_transfer','option_all_bank_transfer');" style="width:10% !important;" class="btn-success"> تحويل </button>
                                    </div>
                                </form>
                                <div class="" id="option_all_bank_transfer"></div>
                            <?php }else{?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>لا يوجد !</strong> تبرعات إضافية  .
                                </div>
                            <?php } ?>
                        </div>
                        <div class="tab-pane fade" id="tab4default">
                            <?php if(isset($all_recession) && $all_recession!=null && !empty($all_recession) ){?>
                                <form id="form_all_recession">
                                    <table id="no-more-tables" class="table table-bordered" role="table">
                                        <thead>
                                        <tr>
                                            <th class="">
                                                <input type="checkbox" name=""  onclick="checkAll(this,'all_recession')">
                                            </th>
                                            <th class="">الإسم </th>
                                            <th class="">نوع التبرع </th>
                                            <th class="">القيمة  </th>
                                            <th class="">إسم الحساب   </th>
                                            <th class="">إسم البرنامج  </th>
                                            <th class="">إسم البنك   </th>
                                            <th class="">رقم حساب الشيك    </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $count=1; foreach ($all_recession as $row){
                                            $total_value=$row->value;?>
                                            <?php
                                            $type='';
                                            $name='';
                                            if ($row->donate_type_id_fk ==1){
                                                $type='متبرع';
                                                $name=$row->person_name;
                                            }elseif($row->donate_type_id_fk ==2){
                                                $type='فاعل خير';
                                                $name=$row->name;
                                            }elseif($row->donate_type_id_fk ==3){
                                                $type='كفيل';
                                                $name=$row->person_name;
                                            }
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="select-all[]" value="<?php  echo $total_value."-".$row->id; ?>" class="all_recession"></td>
                                                <td><?php echo $name;  ?></td>
                                                <td><?php echo $type; ?></td>
                                                <td><?php echo $row->value; ?></td>
                                                <td><?php echo $row->account_name; ?></td>
                                                <td><?php echo $row->program_name; ?></td>
                                                <td><?php echo $row->bank_name; ?></td>
                                                <td><?php echo $row->account_num; ?></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                    <div class="col-md-11">
                                        <input type="hidden" name="ADD" value="4" />
                                        <button type="button" onclick="deport('form_all_recession','option_all_recession');" style="width:10% !important;" class="btn-success"> تحويل </button>
                                    </div>
                                </form>
                                <div class="" id="option_all_recession"></div>
                            <?php }else{?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>لا يوجد !</strong> تبرعات إضافية  .
                                </div>
                            <?php } ?>
                        </div>
                        <div class="tab-pane fade" id="tab5default">
                            <?php if(isset($all_bank) && $all_bank!=null && !empty($all_bank) ){?>
                                <form id="form_all_bank">
                                    <table id="no-more-tables" class="table table-bordered" role="table">
                                        <thead>
                                        <tr>
                                            <th class="">
                                                <input type="checkbox" name=""  onclick="checkAll(this,'all_bank')">
                                            </th>
                                            <th class="">الإسم </th>
                                            <th class="">نوع التبرع </th>
                                            <th class="">القيمة  </th>
                                            <th class="">إسم الحساب   </th>
                                            <th class="">إسم البرنامج  </th>
                                            <th class="">إسم البنك   </th>
                                            <th class="">رقم حساب الشيك    </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $count=1; foreach ($all_bank as $row){
                                            $total_value=$row->value;?>
                                            <?php
                                            $type='';
                                            $name='';
                                            if ($row->donate_type_id_fk ==1){
                                                $type='متبرع';
                                                $name=$row->person_name;
                                            }elseif($row->donate_type_id_fk ==2){
                                                $type='فاعل خير';
                                                $name=$row->name;
                                            }elseif($row->donate_type_id_fk ==3){
                                                $type='كفيل';
                                                $name=$row->person_name;
                                            }
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="select-all[]" value="<?php  echo $total_value."-".$row->id; ?>" class="all_bank"></td>
                                                <td><?php echo $name;  ?></td>
                                                <td><?php echo $type; ?></td>
                                                <td><?php echo $row->value; ?></td>
                                                <td><?php echo $row->account_name; ?></td>
                                                <td><?php echo $row->program_name; ?></td>
                                                <td><?php echo $row->bank_name; ?></td>
                                                <td><?php echo $row->account_num; ?></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                    <div class="col-md-11">
                                        <input type="hidden" name="ADD" value="5" />
                                        <button type="button" onclick="deport('form_all_bank','option_all_bank');" style="width:10% !important;" class="btn-success"> تحويل </button>
                                    </div>
                                </form>
                                <div class="" id="option_all_bank"></div>
                            <?php }else{?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>لا يوجد !</strong> تبرعات إضافية  .
                                </div>
                            <?php } ?>
                        </div>
                        <div class="tab-pane fade" id="tab6default">
                            <?php if(isset($all_network) && $all_network!=null && !empty($all_network) ){?>
                                <form id="form_all_network">
                                    <table id="no-more-tables" class="table table-bordered" role="table">
                                        <thead>
                                        <tr>
                                            <th class="">
                                                <input type="checkbox" name=""  onclick="checkAll(this,'all_network')">
                                            </th>
                                            <th class="">الإسم </th>
                                            <th class="">نوع التبرع </th>
                                            <th class="">القيمة  </th>
                                            <th class="">إسم الحساب   </th>
                                            <th class="">إسم البرنامج  </th>
                                            <th class="">نوع الشبكة </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php  $count=1; foreach ($all_network as $row){
                                            $total_value=$row->value;?>
                                            <?php
                                            $type='';
                                            $name='';
                                            if ($row->donate_type_id_fk ==1){
                                                $type='متبرع';
                                                $name=$row->person_name;
                                            }elseif($row->donate_type_id_fk ==2){
                                                $type='فاعل خير';
                                                $name=$row->name;
                                            }elseif($row->donate_type_id_fk ==3){
                                                $type='كفيل';
                                                $name=$row->person_name;
                                            }
                                            
                                              /*** Box Name **********/
                                            if($row->network == 1){
                                                $network_name = 'شبكة رجالي';
                                            }elseif($row->network == 2){
                                                  $network_name = 'شبكة نسائي';
                                            }else{
                                               $network_name = " غير محدد"; 
                                            }
                                            /***********************/
                                            
                                            
                                            
                                            ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="select-all[]" value="<?php  echo $total_value."-".$row->id; ?>" class="all_network"></td>
                                                <td><?php echo $name;  ?></td>
                                                <td><?php echo $type; ?></td>
                                                <td><?php echo $row->value; ?></td>
                                                <td><?php echo $row->account_name; ?></td>
                                                <td><?php echo $row->program_name; ?></td>
                                                <td><?php echo $network_name; ?></td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                    <div class="col-md-11">
                                        <input type="hidden" name="ADD" value="6" />
                                        <button type="button" onclick="deport('form_all_network','option_all_network');" style="width:10% !important;" class="btn-success"> تحويل </button>
                                    </div>
                                </form>
                                <div class="" id="option_all_network"></div>
                            <?php }else{?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>لا يوجد !</strong> تبرعات إضافية  .
                                </div>
                            <?php } ?>
                        </div>



                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

<script>
    function deport(name_form,div_name){
        var name_div =  "#"+div_name;
        var form_name =  "#"+name_form;
        var dataString = $(form_name).serialize();
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Finance_resource/DeportCashDonations',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $(name_div).html(html);
            }
        });
        return false;
    }
    //---------------------------------------------------------------------------------
    function checkAll(bx,class_name) {
        var cbs = document.getElementsByClassName(class_name);
        for(var i=0; i < cbs.length; i++) {
            if(cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
            }
        }
    }
</script>