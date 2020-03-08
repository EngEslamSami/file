


<script type="text/javascript">
    $(document).ready(function() {
        var oTable_usergroup = $('#js_table_asnaf').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>st/asnaf/Asnaf/display_data',
            
            
            
            aoColumns:[
                { "bSortable": true },
              //  { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                 { "bSortable": true },
                   { "bSortable": true },
                   { "bSortable": true },
                   //  { "bSortable": true },
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
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>st/asnaf/Asnaf/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#result').html(d);

            }

        });

    }
</script>
