


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
                         { "bSortable": true },
                { "bSortable": false }
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





