<style type="text/css">

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
    .btn-close-model:hover,
    .btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }

    .box-h {
        border-radius: 4px;
        padding: 1px 5px;
        margin-bottom: 4px;
        font-weight: bold;
        font-size: 16px;
    }

    .box-h .box-span1 {
        color: #d88200;
        border: 1px solid #649c48;
        padding: 5px;
        margin-left: 5px;
        border-radius: 5px;
        width: 120px;
        display: inline-block;
        text-align: center;
    }

    .box-h .box-span2 {
        color: #d88200;
        border: 1px solid #649c48;
        padding: 5px;
        margin-left: 5px;
        border-radius: 5px;
    }

    .my_style {

        color: #222;
        font-size: 15px;
        font-weight: 500;

    }
</style>

<div class="col-sm-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <div class="col-xs-12  no-padding">
                <div class="form-group col-md-3 col-sm-6 ">
                    <label class="label"> البنود </label>
                    <select class="form-control " id="band_fk" class="form-control" data-validation="required">
                        <option value="">اختر</option>
                        <?php
                        if (isset($bnod) && !empty($bnod)) {
                            foreach ($bnod as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>">
                                    <?php echo $row->title; ?></option>

                            <?php }
                        } ?>
                    </select>
                </div>

                <div class="form-group col-md-3 col-sm-6">
                    <label class="label "> الفترة من </label>
                    <input type="date" name="date_from" id="date_from" value="<?php echo date("Y-m-d"); ?>"
                           class="form-control  bottom-input">
                </div>


                <div class="form-group col-md-3 col-sm-6 ">
                    <label class="label "> الفترة إلي </label>
                    <input type="date" name="date_to" value="<?php echo date("Y-m-d"); ?>" id="date_to"
                           class="form-control  bottom-input">
                </div>


                <div class="form-group col-md-3 col-sm-6 ">
                    <label class="label"> المستودع </label>
                    <select class="form-control" name="storage_fk" id="storage_fk" class="form-control" data-validation="required">
                        <option value="">اختر</option>
                        <?php
                        if (isset($storage) && !empty($storage)) {
                            foreach ($storage as $row) {
                                ?>
                                <option value="<?php echo $row->id_setting; ?>">
                                    <?php echo $row->title_setting; ?></option>

                            <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 text-center">
                <button type="button" class="btn btn-labeled btn-success" name="search" style="margin-top: 20px;"   onclick="SearchTable()">
                    <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                </button>
            </div>
        </div>
    </div>

</div>
<div class="col-sm-12 " id="search_result" style="display: none;">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">نتيجة البحث</h3>
        </div>
        <div class="panel-body" style="">
            <div class="col-md-12 no-padding" id="result">


            </div>
        </div>
    </div>
</div>

<script>

    function SearchTable() {
        var date_from = $('#date_from').val();
        var date_to = $('#date_to').val();
        var storage_fk = $('#storage_fk').val();

        $('#search_result').show();

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>st/reports/bnod_movement/Bnod_report/search_result',
            data:{date_from:date_from,date_to:date_to,storage_fk:storage_fk},
            dataType: 'html',
            cache:false,
            beforeSend: function() {
                $('#result').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function(html){
                $("#result").html(html);
                window.scroll(0,300);

            }
        });
    }

</script>