<style type="text/css">
    .padd {padding: 0 3px !important;}
    .no-padding {padding: 0;}
    .no-margin {margin: 0;}
    h4 {margin-top: 0;}
    .btn-group>.btn, .btn-group>.btn+.btn, .btn-group>.btn:first-child, .fc .fc-button-group>* {
        height: 34px!important;
        border-radius: 4px!important;
        margin: 0!important;
    }
    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: 92% !important;
    }
</style>

<div class="col-sm-12 col-md-8 col-xs-12 fadeInUp wow" style="padding-right: 0;">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?=$title?></h4>
            </div>
        </div>
        <div class="panel-body">
        <?php
        $id = $this->uri->segment(4);
        $readonly = 'readonly';
        if($id != "") {
            echo form_open_multipart('guide/Guide/update/'.$id,array('id'=>'MyFormDalil'));
            if(isset($details)) {
                if($details['hesab_no3'] == 1) {
                    $readonly = '';
                }
            }
        }
        else {
            echo form_open_multipart('guide/Guide/addAccount',array('id'=>'MyFormDalil'));
        }
        $mainAccount = array(1=>'الأصول',2=>'الخصومات',3=>'الإيرادات',4=>'المصروفات');
        $types = array(1=>'رئيسي',2=>'فرعي');
        $nature = array('إختر','مدين','دائن');
        $follow = array(1=>'تابع ميزانية',2=>'تابع قائمة الأنشطة');
        ?>
            <div class="form-group col-sm-12 col-xs-12 no-padding">
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green half"> الحساب الرئيسي </label>
                    <select class="choose-date selectpicker form-control half" id="parent" name="parent" data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true" onchange="getCode();" <?=$disabled?>>
                        <option value=""> إختر</option>
                        <?php
                        if(isset($accounts) && $accounts != null) {
                            foreach($accounts as $account) {
                                $selected = '';
                                if(isset($details) && $details['parent'] == $account->id) {
                                    $selected = 'selected';
                                }
                        ?>
                        <option code="<?=$account->code?>" level="<?=$account->level?>" value="<?=$account->id?>" <?=$selected?>><?=$account->name?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green half">رقم الحساب</label>
                    <input type="text" id="code" name="code" value="<?php if(isset($details)) echo $details['code'] ?>" class="form-control half input-style" placeholder="رقم الحساب" data-validation="required" <?=$readonly?>>
                </div>

                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half"> إسم الحساب</label>
                    <input type="text" id="name" name="name" value="<?php if(isset($details)) echo $details['name'] ?>" class="form-control half input-style" placeholder="إسم الحساب" data-validation="required">
                </div>
                
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green half">نوع الحساب</label>
                    <?php
                    foreach ($types as $key => $value) {
                        $check = '';
                        if(isset($details) && $details['hesab_no3'] == $key) {
                            $check = 'checked';
                        }
                    ?>
                    <input type="radio" name="hesab_no3" value="<?=$key?>" style="margin-top: 11px; margin-right: 10px;" data-validation="required" <?=$check?>> <?=$value?>
                    <?php
                    }
                    ?>
                </div>

                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half">طبيعة الحساب</label>
                    <select name="hesab_tabe3a" id="hesab_tabe3a" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                        <?php
                        foreach ($nature as $key => $value) {
                            $select = '';
                            if(isset($details) && $details['hesab_tabe3a'] == $key) {
                                $select = 'selected';
                            }
                        ?>
                        <option value="<?=$key?>" <?=$select?>><?=$value?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group col-sm-6 col-xs-12">
                    <label class="label label-green  half">تبويب الحساب</label>
                    <select name="hesab_report" id="hesab_report" class="form-control half" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true">
                        <option value="">إختر</option>
                        <?php
                        foreach ($follow as $key => $value) {
                            $select = '';
                            if(isset($details) && $details['hesab_report'] == $key) {
                                $select = 'selected';
                            }
                        ?>
                        <option value="<?=$key?>" <?=$select?>><?=$value?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                
                <div class="col-xs-12">
                    <input type="hidden" name="level" id="level" value="<?php if(isset($details)) echo $details['level'] ?>" />
                    <input type="hidden" name="id" id="id" value="<?php if($this->uri->segment(4) != '') echo $id; else echo 0; ?>">
                    <button type="submit" id="add_code" name="add_code" value="add_code" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ</button>
                </div>
            </div>
        <?php echo form_close()?>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-4 col-xs-12 fadeInUp wow" style="padding: 0;">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>شجرة الدليل الحسابي</h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-12 col-xs-12"> 
                <?php function buildTree($tree) { ?>
                <ul id="tree3">
                    <?php 
                    foreach ($tree as $record) { 
                        $href = '#';
                        if ($record->parent != 0) {
                            $href = base_url().'guide/Guide/editAccount/'.$record->id;
                        }
                    ?>
                    <li>
                        <a href="<?=$href?>"><?=$record->name?></a>
                        <?php
                        if ($record->parent != 0) {
                        ?>
                        <a style="margin: 0 26px 0 7px;" onclick="$('#adele').attr('href', '<?=base_url()."guide/Guide/deleteAccount/".$record->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"><i class="fa fa-trash"></i></a>
                        <?php
                        }
                        if (isset($record->subs)) {
                            buildTree($record->subs);
                        }
                        ?>
                    </li>      
                    <?php } ?>
                </ul>
                <?php 
                }
                if (isset($tree) && $tree!=null) {
                    buildTree($tree);
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    function getCode() 
    {
        var level = parseFloat($('#parent').find('option:selected').attr('level'))+1;
        $('#level').val(level);

        if($('#parent').val()) {
            var dataString = 'id=' + $('#parent').val() ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>guide/Guide/getLastSubCode',
                data:dataString,
                cache:false,
                success: function(result){
                    if(result) {
                        code = parseFloat(result)+1;
                    }
                    if(result == 0 && (level-1) > 0) {
                        code = $('#parent').find('option:selected').attr('code');
                        for(i = 1 ; i < (level-1) && i < 3 ; i++){
                            code = code + 0;
                        }
                        code = code + 1;
                    }
                    $('#code').val(code); 
                }
            });
        }
    }
</script>