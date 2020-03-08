
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
                    <!--        <th style="text-align: center !important;">المحصل</th>-->
                </tr>
                </thead>
            </table>


<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

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
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var oTable_usergroup = $('#js_table_asnaf').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>st/esalat/Esalat_estlam/display_data',
            aoColumns:[
                { "bSortable": true },
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

</script>
