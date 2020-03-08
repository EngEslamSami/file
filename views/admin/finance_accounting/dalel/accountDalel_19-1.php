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
        color: #000;
        height: auto;
        margin: 0;
        font-family: 'hl';
        padding-right: 0px;
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
        display: inline-block;
    }
    .input_style_2 {
        border-radius: 0px;
        width: 100%;
    }
  
    ul span { display: inline!important; }
    
    span.dalel-num{
      padding: 1px 4px;
      border-radius: 2px;
        
    }
   .scrol_width ::-webkit-scrollbar {
        width: 15px;
        height: 5px;
    }
    
    .tree li a{
       font-size: 16px;
    }
    
</style>


    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>إضافة حساب</h4>
            </div>
        </div>
        <div class="panel-body">
        <div class="col-md-7 col-sm-12 col-xs-12 padding-4">
        <?php
        $id = $this->uri->segment(5);
        $readonly = '';
        $disabled = '';
        $required = 'required';
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
                elseif ($details['level'] == 1) {
                    $disabled = '';
                    $required = '';
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
                <div class="col-md-5 col-sm-6 padding-4">
                  
                        <h6 class="label_title_2 ">الحساب الرئيسي </h6>
                  
                        <select class="selectpicker form-control input_style_2" id="parent" name="parent" data-validation="<?=$required?>" data-live-search="true" onchange="getCode(); $('#parent_code').val($(this).find('option:selected').attr('code')); $('#ttype').val($(this).find('option:selected').attr('ttype'));" <?=$disabled?>>
                            <option value=""> إختر</option>
                            <?php
                            if(isset($accounts) && $accounts != null) {
                                foreach($accounts as $account) {
                                    $selected = '';
                                    if(isset($details) && $details['parent'] == $account->id) {
                                        $selected = 'selected';
                                    }
                            ?>
                            <option ttype="<?=$account->ttype?>" code="<?=$account->code?>" level="<?=$account->level?>" value="<?=$account->id?>" <?=$selected?>><?=$account->code.' -- '.$account->name?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                  
                </div>

                <div class="col-md-2 col-sm-6 padding-4">
                  
                        <h6 class="label_title_2 ">رقم الحساب </h6>
          
                        <input type="text" id="code" name="code" value="<?php if(isset($details)) echo $details['code'] ?>" class="form-control input_style_2 input-style" placeholder="رقم الحساب" data-validation="required" <?=$readonly?> <?=$disabled?>>
             
                </div>

                <div class="col-md-5 col-sm-6 padding-4">
             
                        <h6 class="label_title_2 ">إسم الحساب </h6>
         
                        <input type="text" id="name" name="name" value="<?php if(isset($details)) echo $details['name'] ?>" class="form-control input_style_2 input-style" placeholder="إسم الحساب" data-validation="required">
         
                </div>

                <div class="col-md-4 col-sm-6 padding-4">
                                         
                     <h6 class="label_title_2 ">نوع الحساب </h6>
                 
                        <?php
                        foreach ($types as $key => $value) {
                            $check = '';
                            if(isset($details) && $details['hesab_no3'] == $key) {
                                $check = 'checked';
                            }
                        ?>
                        <div class="radio-content">
                            <input type="radio" id="rsd<?=$key?>" name="hesab_no3" class="input_style_2" value="<?=$key?>"   data-validation="required" <?=$check?> <?=$disabled?>> 
                            
                            <label class="radio-label" for="rsd<?=$key?>"><?=$value?></label>
                        </div>
                        <?php
                        }
                        ?>
                
                </div>

                <div class="col-md-3 col-sm-6 padding-4">

                        <h6 class="label_title_2 ">طبيعة الحساب </h6>

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

                <div class="col-md-5 col-sm-6 padding-4">

                        <h6 class="label_title_2 ">تبويب الحساب </h6>

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
                
            <div class="col-xs-12 text-center" >
            <br />
                <input type="hidden" name="level" id="level" value="<?php if(isset($details)) echo $details['level'] ?>" />
                <input type="hidden" name="id" id="id" value="<?php if($id != '') echo $id; else echo 0; ?>">
                <input type="hidden" name="ttype" id="ttype" value="<?php if($id != '') echo $details['ttype']; ?>">
                <input type="hidden" name="parent_code" id="parent_code" value="<?php if($id != '') echo $details['parent_code']; ?>">
                <button type="<?=$submitSave?>" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

                <button type="<?=$submitEdit?>" class="btn btn-labeled btn-warning" style="color: #002342;" name="edit" value="edit">
                    <span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>تعديل
                </button>

                <button type="button" class="btn btn-labeled btn-danger">
                    <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                </button>

                <button type="button" class="btn btn-labeled btn-purple" data-toggle="modal" data-target="#searchDalel"  data-ui-class="a-lightSpeed">
                    <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>بحث
                </button>
            </div>
        <?php echo form_close()?>
        </div>
        
        
        <!---------------------------------------------------------------------------->
        <div class=" col-md-5 col-sm-12 col-xs-12 padding-4" >
        <h5 class="no-margin">شجرة دليل الحسابات</h5>
                <div class="panel-body" style="height: 212px; overflow-y: scroll;">
                    <div class="col-sm-12 col-xs-12 no-padding"> 
                        <?php 
                        function buildTree($tree) { 
        //$color = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#145b5d', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');
                      
          $color = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#09b6bb', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');
                                
                      
                        ?>
                        <ul id="tree3">
                            <?php foreach ($tree as $record) { ?>
                            <li>
                                <a href="<?=base_url().'finance_accounting/dalel/Dalel/editAccount/'.$record->id?>"> 
                                <span class="dalel-num" style="background-color: <?=$color[$record->level]?>">
                                      <?=$record->code?></span> <?=' - '.$record->name?></a>
                                <div class="pull-right">
                                    <?php if ($record->parent != 0) { ?>
                                    <a  onclick="$('#adele').attr('href', '<?=base_url()."finance_accounting/dalel/Dalel/deleteAccount/".$record->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"><i class="fa fa-trash"></i></a>
                                <?php } ?> 
                                    <a href="#"  title="إضافة" onclick="$('#parent').val(<?=$record->id?>).selectpicker('refresh');getCode();"><i class="fa fa-plus-square"></i></a>
        
                                    <a  href="<?=base_url()."finance_accounting/dalel/Dalel/editAccount/".$record->id?>" title="تعديل"><i class="fa fa-pencil-square"></i></a>
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
</div>

<!---------------------------------------------------------------------------->

<div class="modal animate " id="searchDalel" tabindex="-1" role="dialog" aria-labelledby="searchDalel" data-backdrop="true" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">جدول الدليل الحسابي</h4>
            </div>
            <div class="modal-body">
                <table class="example table table-bordered" role="table">
                    <thead>
                        <tr class="info">
                            <th class="text-left">رقم الحساب</th>
                            <th class="text-left">إسم الحساب</th>
                            <th class="text-left">نوع الحساب</th>
                            <th class="text-left">مستوى الحساب</th>
                            <th class="text-left">طبيعة الحساب</th>
                            <th class="text-left">التبويب</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($tree) && $tree!=null) {
                        buildTreeTableModal($tree);
                    }
                    function buildTreeTableModal($tree)
                    {
                        $types = array(1=>'رئيسي',2=>'فرعي');
                        $nature = array('','مدين','دائن');
                        $follow = array(1=>'ميزانية',2=>'قائمة الأنشطة');
                        $color = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#145b5d', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');

                        foreach ($tree as $record) {
                    ?>
                        <tr style="background-color: <?=$color[$record->level]?>; cursor: pointer;" onclick="window.location.href = '<?=base_url().'finance_accounting/dalel/Dalel/editAccount/'.$record->id?>';">
                            <td><?=$record->code?></td>
                            <td><?=$record->name?></td>
                            <td><?=$types[$record->hesab_no3]?></td>
                            <td><?='المستوى'.$record->level?></td>
                            <td><?=$nature[$record->hesab_tabe3a]?></td>
                            <td><?=$follow[$record->hesab_report]?></td>
                        </tr>
                    <?php
                            if (isset($record->subs)) {
                                $count = buildTreeTableModal($record->subs);
                            }
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-labeled btn-danger"  data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
                
            </div>
        </div>
    </div>
</div>






<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow" style="padding: 0;">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4>جدول البيانات</h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-sm-12 col-xs-12 no-padding"> 
                <table id="example" class="table table-bordered" role="table" style="table-layout: fixed;">
                    <thead>
                        <tr class="info">
                            <th width="2%">#</th>
                            <th class="text-left" style="width: 90px;">رقم الحساب</th>
                            <th class="text-left" style=" width: 200px;">إسم الحساب</th>
                            <th class="text-left">نوع الحساب</th>
                            <th class="text-left">مستوى الحساب</th>
                            <th class="text-left">طبيعة الحساب</th>
                            <th class="text-left">التبويب</th>
                            <th class="text-left"> مدين</th>
                            <th class="text-left"> دائن</th>
                            <th class="text-left">الرصيد</th>
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
 //$color = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#145b5d', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');
 $color = array(1=>'#ec9732', 2=>'#c07852', 3=>'#75bf67', 4=>'#b6ab2d', 5=>'#09b6bb', 6=>'#3088d8', 7=>'#4d92a7', 8=>'#ef6c02', 9=>'#a69fb9', 10=>'#67351b', 11=>'#b6ea47', 12=>'#e18091', 13=>'#f5f44d', 14=>'#a63daa', 15=>'#fb1f73', 16=>'#9b9a92', 17=>'#8f0e0b', 18=>'#397631', 19=>'#074183', 20=>'#cab11e');
     
                        foreach ($tree as $record) {
                    ?>
                        <tr style="background-color: <?=$color[$record->level]?>">
                            <td class="forTd"><?=$count++?></td>
                            <td class="forTd"><?=$record->code?></td>
                            <td class="forTd"><?=$record->name?></td>
                            <td class="forTd"><?=$types[$record->hesab_no3]?></td>
                            <td class="forTd"><?='المستوى'.$record->level?></td>
                            <td class="forTd"><?=$nature[$record->hesab_tabe3a]?></td>
                            <td class="forTd"><?=$follow[$record->hesab_report]?></td>
                            <td class="forTd">0</td>
                            <td class="forTd">0</td>
                            <td class="forTd">0</td>
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

            var dataString = 'id=' + $('#parent').val() ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/getParentData',
                data:dataString,
                cache:false,
                success: function(result){
                    if (result) {
                        var obj = JSON.parse(result);
                        $('#hesab_tabe3a').val(obj['hesab_tabe3a']);
                        $('#hesab_report').val(obj['hesab_report']);
                    }
                }
            });
        }
    }
</script>