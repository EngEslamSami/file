<style type="text/css">
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: !block !important;
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
        display: inline-!block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-!block;
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
        display: inline-!block;
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


    .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td {
        border: 1px solid #ffffff !important;
        background: #e8e8e8;
        border-radius: 7px !important;
        font-size: 12px !important;
        color: black;
    }
    /***/

    .btn-close-model,
    .btn-close-model:hover,
    .btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -4px;
    }

    .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu {
        top: 100% !important;
        bottom: auto !important;
        margin-bottom: 1px !important;
    }
    .btn-group .dropdown-menu {
        min-width: 100px;
        max-width: 110px;
    }
    .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td {
        border: 1px solid #ffffff !important;
        background: #e8e8e8;
        border-radius: 7px !important;
        font-size: 14px !important;
        color: black;
        font-weight: bold;
    }
    .greentd td, .greentd th {
        color: #fff;
        font-size: 13px !important;
        background-color: #09704e !important;
        border-radius: 7px !important;
    }

</style>
<?php
$this->load->view('admin/requires/header');?>
<?php $this->load->view('admin/requires/tob_menu');

?>



<div class="col-sm-12 no-padding " >
    <table id="js_table_customer2"
           style="table-layout:fixed;width: 100% !important;"
           class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
        <thead>
        <tr class="greentd">
            <th style="width: 45px;">م </th>
            <th style="width: 65px;">رقم الايصال </th>
            <th style="width: 65px;">التاريخ  </th>
            <th style="width: 140px;" > نوع الايصال</th>
            <th style="width: 65px;" > ألية التوريد</th>
            <th style="width: 60px;" > المبلغ</th>
            <th style="width: 170px;"> الاسم</th>
            <th style="width: 170px;">البند </th>
            <th style="width: 136px;">الاجراء</th>
        </tr>
        </thead>
    </table>

</div>


<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var oTable_usergroup = $('#js_table_customer2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>all_Finance_resource/motab3a_da3men/Motab3a_da3men/all_esalat_json/2',
            aoColumns:[

                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }

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
                    exportOptions: { columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true



        });
    });
</script>







<?php      $this->load->view('admin/requires/footer'); ?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body" id="optionearea1">

            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-mota3a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">متابعة إيصال</h4>
            </div>
            <form action="<?php echo base_url();?>all_Finance_resource/motab3a_da3men/Motab3a_da3men/update_motab3a" method="post">
            <div class="modal-body">
                    <input type="hidden" name="pill_id_fk" id="pill_id_fk">
                    <input type="hidden" name="pill_num_fk" id="pill_num_fk">
                <div id="optionearea2">

                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="submit"  name="add" class="btn btn-success" >حفظ</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function add_hidden(obj) {
       $('#pill_id_fk').val(obj.attr('data-id'));
       $('#pill_num_fk').val(obj.attr('data-pill_num'));
    }
</script>


<script>
    function getFunc(obj) {
        $('#pill_id_fk').val(obj.attr('data-id'));
        $('#pill_num_fk').val(obj.attr('data-pill_num'));
        var dataString = 'id=' + obj.attr('data-id') ;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_Finance_resource/motab3a_da3men/Motab3a_da3men/get_motab3a_data',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#optionearea2").html(html);
            }
        });
    }
</script>
<script>

    function GetTable(valu) {
        //alert(valu);

        if (valu !=0 &&   valu!='') {
            var dataString = 'id=' + valu ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/all_pills/AllPills/GetDetails',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });

        }

    }


</script>

<script>
    function delete_row(valu)
    {
        //alert(valu);
        var link='<?= base_url();?>all_Finance_resource/all_pills/AllPills/DeletePill/'+valu;
        $('#adele').attr('href',link);
    }

</script>

<script>
    function img_attach(valu)
    {
        //alert(valu);
        var link='<?= base_url();?>uploads/images/'+valu;
        $('#my_image').attr('src',link);
    }


</script>

