<style>
    label.label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }

    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: none !important;
        font-weight: 500 !important;
    }

    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }

    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    .print_forma {
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {
        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;
    }

    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }

    .footer img {
        width: 100%;
        height: 120px;
    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
        border: 1px solid white !important;
    }

    /***/

    .btn-close-model,
    .btn-close-model:hover,
    .btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }


    .my_style {

        color: #222;
        font-size: 15px;
        font-weight: 500;

    }

    .radio input[type=radio],
    .radio-inline input[type=radio],
    .checkbox input[type=checkbox],
    .checkbox-inline input[type=checkbox],
    input[type=radio], input[type=checkbox] {
        position: absolute;
        margin-top: 4px \9;
        margin-right: -24px;
        width: 23px;
        height: 23px;
        margin-left: 5px;
    }
    .radio-inline+.radio-inline, .checkbox-inline+.checkbox-inline {
        margin-top: 0;
        margin-right: -6px;
    }

</style>

<div class="col-sm-12 no-padding ">
    <!-- <div class="col-sm-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
           <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
            </div>
            <div class="panel-body"> -->
                <form id="myform">
                    <div class="col-md-12 no-padding">

                      <div class="form-group col-md-1 col-sm-6 padding-4 text-center">
                            <label class="label " style="text-align: center;"> نوع العرض</label>
                            <?php $array = array(1 => 'تفصيلي', 2 => 'إجمالي '); ?>

                            <?php foreach ($array as $key => $value) { ?>
                                <label class="radio-inline"><input <?php if ($key == 1) {
                                        echo 'checked';
                                    } ?> type="radio"  value="<?php echo $key; ?>"  onclick="view_function($(this).val())" name="status">
                                  <span> <?php echo $value; ?></span> 
                                </label>

                            <?php } ?>

                        </div>
                       <div class="form-group col-md-2 col-sm-6 ">
                            <label class="label "> الفترة من </label>
                            <input type="date" name="from_date" id="from_date" value="<?php echo date('Y-m-d'); ?>" class="form-control ">
                        </div>


                        <div class="form-group col-md-2 col-sm-6 ">
                            <label class="label "> الفترة إلي </label>
                            <input type="date" name="to_date" id="to_date" value="<?php echo date('Y-m-d'); ?>"  class="form-control ">
                        </div>


                        <div class="form-group col-md-2 col-sm-6 ">
                            <label class="label ">رقم الحساب </label>
                            <input type="text" value="" class="form-control testButton" name="rkm_hesab[]" id="account_num"
                                   data-validation="required" aria-required="true" readonly=""
                                   onclick=" $(this).removeAttr('readonly');"
                                   ondblclick="$(this).attr('readonly','readonly'); GetbuildTreeTable(); $('#myModal').modal('show');"
                                   style="cursor:pointer;" autocomplete="off" onkeypress="return isNumberKey(event);"
                                   onblur="$(this).attr('readonly','readonly')"
                                   onkeyup="getAccountTitle($(this).val());">
                        </div>
                        <div class="form-group col-md-4 col-sm-6 padding-4">
                            <label class="label ">	إسم الحساب </label>
                            <input type="text" value="" class="form-control"
                                   name="hesab_name[]" id="account"
                                   data-validation="required" aria-required="true" readonly=""
                                   style="width: 100% !important;">
                        </div>

                        <input type="hidden" name="modalID" id="modalID">


                        <div class="form-group col-xs-12 padding-4 text-center " id="zero_account" style="display: none">
                            <div class="skin-square">
                                <div class="i-check"  style="margin-top: 21px;">
                                    <input tabindex="9" name="zero"  type="checkbox" id="zero" value="1">
                                    <label for="square-checkbox-1">عدم إظهار الأرصدة الصفرية </label>
                                </div>

                            </div>
                        </div>
                        <button type="button" class="btn btn-labeled btn-success search" id="" name="add"
                                onclick="SearchTable();" style="margin-top: 20px;">
                            <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                        </button>
                            
                            
                            
                        <div class="form-group col-xs-12 padding-4 text-center">






                            <!--   <button type="button"  name="add"  onclick="SearchTable()"
                                     class="btn btn-warning ">
                                 <span><i class="fa fa-floppy-o"></i></span> بحث
                             </button>
                           <span><span class="badge badge-info">برجاء الضغط مرتين لاظهار الطباعة</span>-->
                        </div>


                    </div>


                </form>
          
          
          
   <!--       
            </div>
        </div>


    </div>
-->

       
          
                <div class="col-md-12 no-padding result">
                    <div class="alert alert-info" style="color: #0bc4a2;"> الرجاء ادخال بيانات البحث والبحث لاظهار
                        النتيجة
                    </div>
                </div>
           
       

    
    
    
  <!--  <div class="col-sm-12 ">
        <div class=" panel panel-bd lobipanel-noaction  ">
            <div class="panel-heading">
                <h3 class="panel-title">نتيجة البحث</h3>
            </div>
        
            <div class="panel-body" style="">
                <div class="col-md-12 no-padding result">
                    <div class="alert alert-info" style="color: #0bc4a2;"> الرجاء ادخال بيانات البحث والبحث لاظهار
                        النتيجة
                    </div>
                </div>
            </div>
        </div>
    </div>
-->

</div>




<!------ modals --------------------------------------------->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">الدليل المحاسبي </h4>
            </div>
            <div class="modal-body" id="buildTreeTable">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!------ modals --------------------------------------------->
<script>


    function SearchTable() {

        var from = $('#from_date').val();
        var to = $('#to_date').val();
        var status = $('input[name=status]:checked').val();
        var rkm_hesab = $('#account_num').val();

        if($("#zero").is(':checked')) {
            var zero_account = $('#zero').val();
        }else{
            var zero_account = 0;
        }


        /*if (status != 0 && status != '' && rkm_hesab !=0 &&  rkm_hesab  != '' && from !=0 &&  from  != ''
            && to !=0 &&  to  != ''
        ){*/
            var dataString = 'from=' + from + '&to=' + to + '&status=' + status + '&rkm_hesab=' + rkm_hesab +'&zero_account=' + zero_account ;
            //alert(dataString);
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>finance_accounting/box/reports/Report/get_hesab_movement_report",
                data: dataString,
                dataType: 'html',
                cache: false,
                beforeSend: function() {
                    $('.result').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
                },
                success: function (html) {
                    $(".result").html(html);
                }
            });

        /*} else {
            alert(' من فضلك أدخل معطيات البحث !!');
        }*/




    }


</script>


<script>


    function getAccountTitle(code) {
        var dataString ='code=' + code;
        $.ajax({
            type:'post',
            url: '<?=base_url()?>finance_accounting/box/vouch_qbd/Vouch_qbd/getAccountName',
            data:dataString,
            cache:false,
            success: function(result){
                $('#account').val(result);
            }
        });
    }


</script>




<script>


    function GetbuildTreeTable() {
        var status = $('input[name=status]:checked').val();
        var dataString ='status=' + status;

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>finance_accounting/box/reports/Report/GetbuildTreeTable",
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#buildTreeTable").html(html);
            }
        });

    }


</script>


<script>


    function view_function(value) {
        if (value == 2) {
            $('#zero_account').show();
        } else {
            $('#zero_account').hide();
        }
    }

</script>