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
                <h4><?php echo $title; ?></h4>
            </div>
        </div>
        <div class="panel-body">
      <!--  <div class="col-md-7 col-sm-12 col-xs-12 padding-4">

        </div>
   -->     
        
        <!---------------------------------------------------------------------------->
        
        <div class="col-md-2 col-sm-12 col-xs-12 padding-4">

        </div>
        <div class=" col-md-8 col-sm-12 col-xs-12 padding-4" >
        <h5 class="no-margin">شجرة دليل الحسابات</h5>
                <div class="panel-body" style="height: 400px; overflow-y: scroll;">
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
        
        <div class="col-md-2 col-sm-12 col-xs-12 padding-4">

        </div>
        
        
        
        
    </div>
</div>

<!---------------------------------------------------------------------------->




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