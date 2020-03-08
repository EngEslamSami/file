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
    .btn-label {
        left: 12px;
    }
    .tree ul {
        margin-right: 10px;
        position: relative;
        margin-left: 0;
    }
    .tree ul li {
        padding-left: 0;
    }
    .tree ul ul {
        margin-left: 0;
    }
    @media (min-width: 992px){
        .col_md_10{
            width: 10%;
            float:right;
        }
        .col_md_15{
            width: 15%;
            float:right;
        }
        .col_md_20{
            width: 20%;
            float:right;
        }
        .col_md_25{
            width: 25%;
            float:right;
        }
        .col_md_30{
            width: 30%;
            float:right;
        }
        .col_md_35{
            width: 35%;
            float:right;
        }
        .col_md_40{
            width: 40%;
            float:right;
        }
        .col_md_45{
            width: 45%;
            float:right;
        }
        .col_md_50{
            width: 50%;
            float:right;
        }
        .col_md_60{
            width: 60%;
            float:right;
        }
        .col_md_70{
            width: 70%;
            float:right;
        }
        .col_md_75{
            width: 75%;
            float:right;
        }
        .col_md_80{
            width: 80%;
            float:right;
        }
        .col_md_85{
            width: 85%;
            float:right;
        }
        .col_md_90{
            width: 90%;
            float:right;
        }
        .col_md_95{
            width: 95%;
            float:right;
        }
        .col_md_100{
            width: 100%;
            float:right;
        }
    }
    .label_title_2 {
        width: 100%;
        color: white;
        background-color: #428bca;
        border: 2px solid #428bca;
        height: 34px;
        margin: 0;
        line-height: 34px;
        padding-right: 6px;
        font-size: 14px;
        margin-bottom: 5px;
    }
    .input_style_2 {
        border-radius: 0px;
        border-right: transparent;
        width: 100%;
    }
    .label-blue{
        background-color:#003665;
        border: 1px solid #003665;

        height: 34px;
        line-height: 25px !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        text-align: right !important;
    }
    ul span { display: inline!important; }
    .fa-pencil.sspan {
        background-color: #5a8a12;
        padding: 3px 6px;
        color: #fff;
        border-radius: 5px;
    }
    .fa-trash.sspan {
        background-color: #ff0000;
        padding: 3px 6px;
        color: #fff;
        border-radius: 5px;
    }
    .fa-plus.sspan {
        background-color: #5b69bc;
        padding: 3px 6px;
        color: #fff;
        border-radius: 5px;
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
        $id = $this->uri->segment(5);
        $readonly = '';
        $disabled = '';
        $submitEdit = 'button';
        $submitSave = 'button';
        if($id != "") {
            $submitEdit = '';
            echo form_open_multipart('finance_accounting/dalel/Dalel/update/'.$id,array('id'=>'MyFormDalil'));
            if(isset($details)) {
                if($details['hesab_no3'] != 1) {
                    $readonly = 'readonly';
                }
                if($details['branch'] != null) {
                    $disabled = 'disabled';
                }
            }
        }
        else {
            $submitSave = '';
            echo form_open_multipart('finance_accounting/dalel/Dalel/addAccount',array('id'=>'MyFormDalil'));
        }
        $mainAccount = array(1=>'الأصول',2=>'الخصومات',3=>'الإيرادات',4=>'المصروفات');
        $types = array(1=>'رئيسي',2=>'فرعي');
        $nature = array('إختر','مدين','دائن');
        $follow = array(1=>'ميزانية',2=>'قائمة الأنشطة');
        ?>
            <div class="form-group col-sm-12 col-xs-12 no-padding">
                <div class="col_md_50 col-sm-6 padding-4">
                    <div class="col-md-3 col-sm-6 no-padding">
                        <h6 class="label_title_2 ">الحساب الرئيسي </h6>
                    </div>
                    <div class="col-md-9 col-sm-6 no-padding">
                        <select class="choose-date selectpicker form-control input_style_2" id="parent" name="parent" data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true" onchange="getCode();" <?=$disabled?>>
                            <option value=""> إختر</option>
                            <?php
                            if(isset($accounts) && $accounts != null) {
                                foreach($accounts as $account) {
                                    $selected = '';
                                    if(isset($details) && $details['parent'] == $account->id) {
                                        $selected = 'selected';
                                    }
                            ?>
                            <option code="<?=$account->code?>" level="<?=$account->level?>" value="<?=$account->id?>" <?=$selected?>><?=$account->code.' '.$account->name?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col_md_50 col-sm-6 padding-4">
                    <div class="col-md-3 col-sm-6 no-padding">
                        <h6 class="label_title_2 ">رقم الحساب </h6>
                    </div>
                    <div class="col-md-9 col-sm-6 no-padding">
                        <input type="text" id="code" name="code" value="<?php if(isset($details)) echo $details['code'] ?>" class="form-control input_style_2 input-style" placeholder="رقم الحساب" data-validation="required" <?=$readonly?> <?=$disabled?>>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-12 col-xs-12 no-padding">
                <div class="col_md_50 col-sm-6 padding-4">
                    <div class="col-md-3 col-sm-6 no-padding">
                        <h6 class="label_title_2 ">إسم الحساب </h6>
                    </div>
                    <div class="col-md-9 col-sm-6 no-padding">
                        <input type="text" id="name" name="name" value="<?php if(isset($details)) echo $details['name'] ?>" class="form-control input_style_2 input-style" placeholder="إسم الحساب" data-validation="required">
                    </div>
                </div>

                <div class="col_md_50 col-sm-6 padding-4">
                    <div class="col-md-3 col-sm-6 no-padding">
                        <h6 class="label_title_2 ">نوع الحساب </h6>
                    </div>
                    <div class="col-md-9 col-sm-6 no-padding">
                        <?php
                        foreach ($types as $key => $value) {
                            $check = '';
                            if(isset($details) && $details['hesab_no3'] == $key) {
                                $check = 'checked';
                            }
                        ?>
                        <input type="radio" name="hesab_no3" class="input_style_2" value="<?=$key?>" style="margin-top: 11px; margin-right: 20px; width: 15px; height: 15px;" data-validation="required" <?=$check?> <?=$disabled?>> <label class="no-margin no-padding"><?=$value?></label>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-12 col-xs-12 no-padding">
                <div class="col_md_50 col-sm-6 padding-4">
                    <div class="col-md-3 col-sm-6 no-padding">
                        <h6 class="label_title_2 ">طبيعة الحساب </h6>
                    </div>
                    <div class="col-md-9 col-sm-6 no-padding">
                        <select name="hesab_tabe3a" id="hesab_tabe3a" class="form-control input_style_2" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true" <?=$disabled?>>
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
                </div>

                <div class="col_md_50 col-sm-6 padding-4">
                    <div class="col-md-3 col-sm-6 no-padding">
                        <h6 class="label_title_2 ">تبويب الحساب </h6>
                    </div>
                    <div class="col-md-9 col-sm-6 no-padding">
                        <select name="hesab_report" id="hesab_report" class="form-control input_style_2" data-validation="required" aria-required="true" tabindex="-1" aria-hidden="true" <?=$disabled?>>
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
                </div>
            </div>
                
            <div class="col-xs-12 text-center">
                <input type="hidden" name="level" id="level" value="<?php if(isset($details)) echo $details['level'] ?>" />
                <input type="hidden" name="id" id="id" value="<?php if($id != '') echo $id; else echo 0; ?>">
                <button type="<?=$submitSave?>" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

                <button type="<?=$submitEdit?>" class="btn btn-labeled btn-warning" style="color: #002342;" name="edit" value="edit">
                    <span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>تعديل
                </button>

                <button type="button" class="btn btn-labeled btn-danger">
                    <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                </button>

                <button type="button" class="btn btn-labeled btn-purple">
                    <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>بحث
                </button>
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
                <?php 
                function buildTree($tree) { 
                    $colorArray = array(1=>'btn-warning', 2=>'btn-success', 3=>'btn-purple', 4=>'btn-danger', 5=>'btn-inverse');
                ?>
                <ul id="tree3">
                    <?php foreach ($tree as $record) { ?>
                    <li>
                        <a href="<?=base_url().'finance_accounting/dalel/Dalel/editAccount/'.$record->id?>"> <span class="<?=$colorArray[$record->level]?>"> <?=$record->code?></span> <?=$record->name?></a>
                        <div class="pull-right">
                            <?php if ($record->parent != 0) { ?>
                            <a  onclick="$('#adele').attr('href', '<?=base_url()."finance_accounting/dalel/Dalel/deleteAccount/".$record->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"><i class="fa fa-trash sspan"></i></a>
                        <?php } ?> 
                            <a href="#"  title="إضافة" onclick="$('#parent').val(<?=$record->id?>).selectpicker('refresh');getCode();"><i class="fa fa-plus sspan"></i></a>

                            <a  href="<?=base_url()."finance_accounting/dalel/Dalel/editAccount/".$record->id?>" title="تعديل"><i class="fa fa-pencil sspan"></i></a>
                        </div>
                        <?php
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

<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow" style="padding: 0;">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>جدول البايانات</h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group col-sm-12 col-xs-12"> 
                <table id="example" class="table table-bordered" role="table">
                    <thead>
                        <tr class="info">
                            <th width="2%">#</th>
                            <th class="text-left">رقم الحساب</th>
                            <th class="text-left">إسم الحساب</th>
                            <th class="text-left">نوع الحساب</th>
                            <th class="text-left">طبيعة الحساب</th>
                            <th class="text-left">التبويب</th>
                            <th class="text-left">رصيد مدين</th>
                            <th class="text-left">رصيد دائت</th>
                            <th class="text-left">الصافي</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($tree) && $tree!=null) {
                        buildTreeTable($tree);
                    }
                    function buildTreeTable($tree, $count=1)
                    {
                        $types = array(1=>'رئيسي',2=>'فرعي');
                        $nature = array('','مدين','دائن');
                        $follow = array(1=>'ميزانية',2=>'قائمة الأنشطة');
                        $colorArray = array(1=>'#FFB61E', 2=>'#3c990b', 3=>'#5b69bc', 4=>'#E5343D', 5=>'#d9edf7');
                        foreach ($tree as $record) {
                    ?>
                        <tr style="background-color: <?=$colorArray[$record->level]?>">
                            <td><?=$count++?></td>
                            <td><?=$record->code?></td>
                            <td><?=$record->name?></td>
                            <td><?=$types[$record->hesab_no3]?></td>
                            <td><?=$nature[$record->hesab_tabe3a]?></td>
                            <td><?=$follow[$record->hesab_report]?></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    <?php
                            if (isset($record->subs)) {
                                $count = buildTreeTable($record->subs, $count++);
                            }
                        }
                        return $count;
                    }
                    ?>
                    </tbody>
                </table>
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
                url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/getLastSubCode',
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