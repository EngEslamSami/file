<style type="text/css">

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }

    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>
<div class="col-sm-12">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <table id="js_table_asnaf" style="table-layout: fixed;"
                   class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline">
                <thead>
                <tr class="greentd">
                    <th style="text-align: center !important; width: 50px;">م</th>
                    <th style="text-align: center !important; width: 100px;">رقم الإيصال</th>
                    <th style="text-align: center !important;width: 100px;">التاريخ</th>
                    <th style="text-align: center !important;width: 100px;">نوع الإيصال</th>
                    <th style="text-align: center !important;">طريقة التوريد</th>
                    <th style="text-align: center !important;width: 100px;">المبلغ</th>
                    <th style="text-align: center !important;width: 120px;">الإسم</th>
                    <th style="text-align: center !important;">البند</th>
                    <th style="text-align: center !important;">التفاصيل</th>
                    <th style="text-align: center !important;">الإجراء</th>
                </tr>
                </thead>
            </table>

            <script type="text/javascript"
                    src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" style="width:80%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                        </div>
                        <div class="modal-body" id="optionearea1">

                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                                <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal_tbar3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" style="width:90%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                        </div>
                        <?php echo form_open_multipart(base_url() . 'st/esalat/Esalat_estlam/add_ezn_edafa');
                        ?>
                        <div class="modal-body" id="form_tabr3">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-labeled btn-success" name="save" value="save"
                                    id="myBtn">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                            <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                                <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                            </button>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>

            <div class="modal fade" id="myModal_asnaf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document" style="width: 70%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"> الأصناف </h4>
                        </div>
                        <div class="modal-body">
                            <div id="myDiv_sanfe"></div>
                        </div>
                        <div class="modal-footer" style="display: inline-block;width: 100%">
                            <button type="button" class="btn btn-danger"
                                    style="float: left;" data-dismiss="modal">إغلاق
                            </button>
                        </div>
                    </div>
                </div>
            </div>
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


        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var oTable_usergroup = $('#js_table_asnaf').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>st/esalat/Esalat_estlam/display_data_store_deport',
            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
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
            colReorder: true


        });
    });
</script>

<script>

    function GetTable(valu) {
        if (valu != 0 && valu != '') {
            var dataString = 'id=' + valu;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/esalat/Esalat_estlam/GetDetails',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#optionearea1").html(html);
                }
            });

        }

    }

    function GetTable_tbar3(valu) {
        if (valu != 0 && valu != '') {
            var dataString = 'id=' + valu;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/esalat/Esalat_estlam/GetTable_tbar3',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#form_tabr3").html(html);
                }
            });

        }

    }
</script>
<script>

    function getCode(id) {
        var dataString = 'id=' + id;


        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/esalat/Esalat_estlam/get_code',
            data: dataString,
            dataType: 'html',

            cache: false,
            success: function (html) {
                arr = JSON.parse(html);
                $('#rkm_ezn_edafa').val(arr.rkm_hesab);
                $('#ezn_edafa_name').val(arr.hesab_name);
            }
        });
    }

    function add_row_sanfe() {
        var table = document.getElementById('asnafe_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;

        var row = ' <tr id="row_1" >\n' +
            '                        <td>' + (len + 1) + '</td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_code[]"  data-validation="required"\n' +
            '               data-validation-has-keyup-event="true" id="sanf_code' + (len + 1) + '" value=""  ondblclick="$(\'#myModal_asnaf\').modal(\'show\'); GetDiv_sanfe(\'myDiv_sanfe\',' + (len + 1) + ')" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_coade_br[]" id="sanf_coade_br' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_name[]" id="sanf_name' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_whda[]" id="sanf_whda' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_rased[]" id="sanf_rased' + (len + 1) + '" value="" readonly /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_amount[]"  data-validation="required"\n' +
            '               data-validation-has-keyup-event="true" oninput="get_total(this,' + (len + 1) + ')" id="sanf_amount' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_one_price[]" id="sanf_one_price' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="all_egmali[]" id="all_egmali' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="sanf_salahia_date[]" id="sanf_salahia_date' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="lot[]" id="lot' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton inputclass" name="rased_hali[]" id="rased_hali' + (len + 1) + '" value="" /></td>\n' +
            '\n' +
            '                        <td><a id="1" onclick=" $(this).closest(\'tr\').remove(); set_sum();"><i class="fa fa-trash"></i></a></td>\n' +
            '                    </tr>';

        var new_row = table.insertRow(table.rows.length);
        new_row.innerHTML = row;
        new_row.id = 'row_' + (table.rows.length);


    }

    function GetMemberName(obj) {

        console.log(' obj :' + obj.dataset.name);
        var name = obj.dataset.name;
        var mob = obj.dataset.mob;
        var id = obj.dataset.id;
        document.getElementById('motbr3_name').value = name;
        document.getElementById('motbr3_jwal').value = mob;
        document.getElementById('motbr3_id_fk').value = id;

        $("#myModalInfo .close").click();

    }

    function Get_sanfe_Name(obj, id) {

        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var code = obj.dataset.code;
        var code_br = obj.dataset.code_br;
        var whda = obj.dataset.whda;
        var price = obj.dataset.price;
        var slahia = obj.dataset.slahia;
        var sanf_rased = parseFloat(obj.dataset.all_rased);
        if (parseInt(slahia) == 1) {
            document.getElementById('sanf_salahia_date' + id).type = 'date';
        } else {
            document.getElementById('sanf_salahia_date' + id).type = 'text';
            $('#sanf_salahia_date' + id).attr('readonly', 'readonly');
            $('#sanf_salahia_date' + id).val('');
        }
        document.getElementById('sanf_name' + id).value = name;
        document.getElementById('sanf_code' + id).value = code;
        document.getElementById('sanf_coade_br' + id).value = code_br;
        document.getElementById('sanf_whda' + id).value = whda;
        document.getElementById('sanf_one_price' + id).value = price;
        document.getElementById('sanf_rased' + id).value = sanf_rased;

        $("#myModal_asnaf .close").click();

    }

</script>

<script>
    function GetDiv(div) {
        html = '<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> الإسم </th><th style="width: 170px;" >الهوية </th><th style="width: 170px;" >الجوال</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members').show();
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>st/esalat/Esalat_estlam/getConnection3',

            aoColumns: [
                {"bSortable": true},
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
    function GetDiv_sanfe(div, row_id) {
        var storage_fk = $('#storage_fk').val();
        console.log('storage_fk :' + storage_fk);
        html = '<div class="col-md-12"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> كود الصنف </th><th style="width: 170px;" >أسم الصنف  </th><th style="width: 170px;" >الوحدة</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>st/esalat/Esalat_estlam/getConnection2/' + row_id + '/' + storage_fk,

            aoColumns: [
                {"bSortable": true},
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
    function get_total(amount, id) {
        console.log('amount :' + amount.value + " all_egmali: " + parseFloat($('#sanf_one_price' + id).val()));
        var sanf_rased = (parseInt($('#sanf_rased' + id).val()));
        //  if (amount.value <= sanf_rased) {
        $('#all_egmali' + id).val((amount.value * parseFloat($('#sanf_one_price' + id).val())));
        $('#rased_hali' + id).val(parseFloat(sanf_rased) + parseFloat(amount.value));
        set_sum();
        //   }else {
        //        amount.value=0;
        //        $('#all_egmali' + id).val(0);
        //        $('#rased_hali' + id).val(0);
        //        set_sum();

        //  }
        get_diff_money();
    }

    function set_sum() {
        var all_egmali = document.getElementsByName('all_egmali[]');
        var sum = 0;
        for (var i = 0; i < all_egmali.length; i++) {
            sum = sum + parseFloat(all_egmali[i].value);
        }
        console.log('sum :' + sum);

        $('#total').text(sum);
    }

</script>

