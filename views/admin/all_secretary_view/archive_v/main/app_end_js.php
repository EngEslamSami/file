


<script type="text/javascript">
    $(document).ready(function() {
        var oTable_usergroup = $('#js_table_end').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>all_secretary/archive/main/Main/end_data',
            
            
            
            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                 { "bSortable": true },
                   
                     
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





