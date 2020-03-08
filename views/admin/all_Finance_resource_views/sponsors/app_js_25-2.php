


<script type="text/javascript">
    $(document).ready(function() {
        var oTable_usergroup = $('#js_table_customer').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/data',
            
            
            
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
                     //    { "bSortable": true },
              //  { "bSortable": false }
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


<div class="modal fade" id="modal-kafal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">الكفالات</h4>
            </div>

            <div class="modal-body">
                <div id="khafal_data"></div>
                
            </div>
            <div class="modal-footer" style="display: inline-!block;width: 100%">
                <button type="button" class="btn btn-danger"  style="float: left" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-attach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
            </div>

            <div class="modal-body">
                <div id="khafal_attachment"></div>

            </div>
            <div class="modal-footer" style="display: inline-!block;width: 100%">
                <button type="button" class="btn btn-danger"  style="float: left" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>



