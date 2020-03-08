

<style type="text/css">
  /*  label.label{
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
*/
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

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
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
    .box-h .box-span2{
        color: #d88200;
        border: 1px solid #649c48;
        padding: 5px;
        margin-left: 5px;
        border-radius: 5px;
    }

    .my_style{

        color: #222;
        font-size: 15px;
        font-weight: 500;

    }
</style>

<div class="col-sm-12 no-padding " >
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title;  ?></h3>
            </div>
            <div class="panel-body">
                <form id="myform">


                <div class="col-xs-12  no-padding">
                    <div class="form-group col-md-3 col-sm-6">
                        <label class="label ">  الفترة من </label>
                        <input type="date" name="date_from" id="date_from" value="<?php  echo date("Y-m-d");?>" class="form-control  bottom-input">
                    </div>


                    <div class="form-group col-md-3 col-sm-6 ">
                        <label class="label ">  الفترة إلي </label>
                        <input type="date" name="date_to" value="<?php  echo date("Y-m-d");?>" id="date_to" class="form-control  bottom-input">
                    </div>

                    <div class="form-group col-md-2 col-sm-6  ">

                        <input type="checkbox" name="type_ezn" value="1" id="radio-one">
                        <label for="radio-one">تبرعات عينية </label>
                        <br>
                        <input type="checkbox" name="type_ezn" value="2" id="radio-two">
                        <label for="radio-two"> مشتريات عينية </label>
                        <br>
                        <input type="checkbox" name="all_type" onclick="check_all();" value="0" id="radio-two">
                        <label for="radio-two">  الكل </label>
                    </div>

                    <div class="form-group col-md-4 col-sm-6 ">
                        <label class="label"> إسم المتبرع </label>
                        <input type="text" name="motbr3_name" id="motbr3_name" readonly value=""
                               style="width:86%; float: right;"
                               class="form-control "

                               data-validation-has-keyup-event="true">
                        <button type="button" data-toggle="modal" data-target="#myModalInfo"
                                class="btn btn-success btn-next" style="float: right;" onclick="GetDiv('myDiv')">
                            <i class="fa fa-plus"></i></button>
                    </div>

                </div>

                <div class="col-xs-12 text-center">
                    <button type="button" class="btn btn-labeled btn-success" name="search" style="margin-top: 20px;"   onclick="SearchTable()">
                        <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                    </button>
                </div>
                </form>
            </div>
        </div>


</div>



<div class="col-sm-12 " id="search_result" style="display: none;">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">نتيجة البحث</h3>
        </div>
        <div class="panel-body" style="">
            <div class="col-md-12 no-padding" id="result">


            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> المتبرعين </h4>
            </div>
            <div class="modal-body">
                <div id="myDiv"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function GetDiv(div) {
        html = '<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> الإسم </th><th style="width: 170px;" >الجوال </th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members').show();
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>st/reports/Contributions_report/getConnection',

            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},

                {"bSortable": true}
            ],

            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });
    }
</script>
<script>
    function GetMemberName(obj) {

        console.log(' obj :' + obj.dataset.name);
        var name = obj.dataset.name;
        var mob = obj.dataset.mob;
        var id = obj.dataset.id;
        document.getElementById('motbr3_name').value = name;

        $("#myModalInfo .close").click();

    }
</script>

<script>

    function SearchTable() {
        var date_from = $('#date_from').val();
        var date_to = $('#date_to').val();
        var motbr3_name = $('#motbr3_name').val();
        var  type = [];
        $('input[name="type_ezn"]:checked').each(function() {
            type.push(this.value);

        });
        var all = [];
        $('input[name="all_type"]:checked').each(function() {
            all.push(this.value);

        });


        $('#search_result').show();

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>st/reports/Contributions_report/search_result',
            data:{date_from:date_from,date_to:date_to,motbr3_name:motbr3_name,type:type,all:all},
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
<script>
    function check_all() {
        if ($('input[name="all_type"]:checked')){

            $('input[name=type_ezn]').attr('checked', true);
        } else{
          //  $('input[name=type_ezn]').attr('checked', false);
         $('input[name=type_ezn]').removeAttr('checked');
        }
    }

</script>
