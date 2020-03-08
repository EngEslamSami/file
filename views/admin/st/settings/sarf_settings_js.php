


<script type="text/javascript">
    $(document).ready(function() {
        var oTable_usergroup = $('#js_table_settings').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>st/settings/Edafa_sarf_setting/display_data',
            
            
            
            aoColumns:[
                { "bSortable": true },
               // { "bSortable": true },
               // { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                 { "bSortable": true },
                   { "bSortable": true },
                  /* { "bSortable": true },
                   { "bSortable": true },
                   { "bSortable": true },
                   { "bSortable": true },*/
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
        "scrollX": true,
        colReorder: true
            // columnDefs: [
            //     { width: '20%', targets: [1,3,9,7] }
            // ],
            // fixedColumns: true

            
            
        });
    });
</script>

