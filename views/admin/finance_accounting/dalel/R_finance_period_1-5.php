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
        border: 1px solid #abc572;
    }

    /***/

    .btn-close-model,
    btn-close-model:hover,
    btn-close-model:focus {
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
        margin-right: -28px;
        width: 23px;
        height: 23px;
        margin-left: 5px;
    }

</style>

<div class="col-sm-12 no-padding ">
    <form id="myform">
        <div class="col-md-12 no-padding">
            <div class="form-group col-md-3 col-sm-6 padding-4 text-center">
                <label class="label " style="text-align: center;">  نوع العرض</label>
                <?php $array =array(1=>'تفصيلي',2=>'إجمالي تفصيلي');?>

                <?php foreach ($array as  $key=>$value){ ?>
                    <label class="radio-inline"><input <?php if($key ==1){echo'checked'; }?> type="radio" value="<?php echo $key;?>" onclick="view_function($(this).val())" name="status" id="status_value"><?php echo $value;?></label>

                <?php }  ?>

            </div>
            <div class="form-group col-md-2 col-sm-6 ">
                <label class="label "> الفترة من </label>
                <input type="date" name="from_date" id="from_date" value="<?php echo date('Y-m-d'); ?>" class="form-control ">
            </div>


            <div class="form-group col-md-2 col-sm-6 ">
                <label class="label "> الفترة إلي </label>
                <input type="date" name="to_date" id="to_date" value="<?php echo date('Y-m-d'); ?>"  class="form-control ">
            </div>

         <div class="form-group col-md-2 col-sm-6 " id="zero_account" style="display: none">
            <div class="skin-square">
                <div class="i-check"  style="margin-top: 21px;">
                    <input tabindex="9" name="zero"  type="checkbox" id="zero" checked >
                    <label for="square-checkbox-1">عدم إظهار الأرصدة الصفرية </label>
                </div>

            </div>
            </div>

            <button type="button" class="btn btn-labeled btn-success search" id="" name="add"
                    onclick="SearchTable();">
                <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
            </button>

            <div class="form-group col-xs-12 padding-4 text-center">

            </div>


        </div>


    </form>



    <div class="col-md-12 no-padding result">
        <div class="alert alert-info" style="color: #0bc4a2;"> الرجاء ادخال بيانات البحث والبحث لاظهار
            النتيجة
        </div>
    </div>

</div>





<script>


    function SearchTable() {

        var from = $('#from_date').val();
        var to = $('#to_date').val();
        var status = $('#status_value').val();

        if($("#zero").is(':checked')) {
        var zero_account = $('#zero').val();
         }else{
            var zero_account = 0;
        }


        if (from !=0 &&  from  != ''&& to !=0 &&  to  != ''){
        var dataString = 'from=' + from + '&to=' + to  + '&zero_account=' + zero_account +'&status=' + status;
       // alert(dataString)
            //return;
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>finance_accounting/dalel/Dalel/get_finance_period_data",
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

        } else {
            alert(' من فضلك أدخل معطيات البحث !!');
        }




    }



    function view_function(value) {
        if (value == 2) {
            $('#zero_account').show();
        } else {
            $('#zero_account').hide();
        }
    }

</script>

