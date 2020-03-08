


<script type="text/javascript">
    $(document).ready(function() {
        var oTable_usergroup = $('#js_table_customer').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>Family/data',
            
            
            
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





<!--
<script type="text/javascript">
	    var table= $('#js_table_customer').DataTable( {
        dom: 'Bfrtip',
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

    } );
    $('#addSearchInputs').click( function () {
        $('#js_table_customer thead tr:eq(0) ').css("display" ,"table-row");
	       $("#js_table_customer thead tr:eq(0) th").each( function ( i ) {
            var select = $('<select class="selectpicker form-control"  data-show-subtext="true" data-live-search="true"><option value="">اختر</option></select>')
            .appendTo( $(this).empty() )
            .on( 'change', function () {
                table.column( i )
                .search( $(this).val() )
                .draw();
            } );

            table.column( i ).data().unique().sort().each( function ( d, j ) {
                select.append( '<option value="'+d+'">'+d+'</option>' )
            } );
            $('#js_table_customer thead tr:eq(0) th:first-child').html("");
            $('#js_table_customer thead tr:eq(0) th:last-child').html("");

        } );

    });
</script>
-->