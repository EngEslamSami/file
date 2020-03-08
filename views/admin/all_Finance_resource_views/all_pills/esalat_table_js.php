


<script type="text/javascript">
    $(document).ready(function() {
        var oTable_usergroup = $('#js_table_customer').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>all_Finance_resource/all_pills/AllPills/data',
            "initComplete":function( settings, json){
                check_toggle();
            },


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
        function check_toggle() {
          // var oTable_usergroup = $('#js_table_customer').DataTable();

          var rowcollection = oTable_usergroup.$(".checkbox_toggle", {"page": "all"});
          rowcollection.each(function (index, obj) {
               $(this).bootstrapToggle({
                      on: 'نشط',
                      off: 'غير نشط'
                  });



          });
              }
    });
</script>

<script>




</script>
