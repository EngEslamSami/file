


<script type="text/javascript">
    $(document).ready(function() {
        var oTable_usergroup = $('#js_table_customer').DataTable({

            // Processing indicator
            "processing": true,
            // DataTables server-side processing mode
            "serverSide": true,
            // Initial no order.
            "order": [],//"paging": false as default true
            "dom": 'Bfrtip',
            "buttons": [
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
            // Load data from an Ajax source
            "ajax": {
                "url": '<?php echo base_url(); ?>all_Finance_resource/sponsors/Sponsor/getLists/',//getLists=data
                "type": "POST"
            },
            //Set column definition initialisation properties
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }],





            //"ajax": '<?php //echo base_url(); ?>//all_Finance_resource/sponsors/Sponsor/data',
            
            
            

            
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



