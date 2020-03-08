<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"> <?php echo $title; ?></h3>
    </div>
    <div class="panel-body">

        <div class="form-group col-md-3 padding-4">
            <label class="label">من تاريخ</label>
            <input type="date" class="form-control"  oninput="load_filter();" name="date_from" id="date_from" value="<?= date('Y-m-d')?>">

        </div>
        <div class="form-group col-md-3 padding-4">
            <label class="label">الي تاريخ</label>
            <input type="date" class="form-control"  oninput="load_filter();" name="date_to" id="date_to" value="<?= date('Y-m-d')?>">

        </div>
        <div class="form-group col-md-3 padding-4">
            <label class="label"> مستقبل الزياره</label>
            <select class="form-control" name="degree_id" id="degree_id" onchange="load_filter();">
                 <option value="">اختر</option>
                <?php
                  if (isset($all_emps) && !empty($all_emps)){
                      foreach ($all_emps as $row){
                          ?>
                          <option value="<?= $row->degree_id ?>"><?= $row->degree_name?></option>

                          <?php
                      }
                      ?>

                <?php
                  }
                ?>
            </select>

        </div>
        <div id="body_table_filter">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="js_table_gm3ia">
                <thead>
                <tr class="greentd">
                    <th>م</th>
                    <th>التاريخ</th>
                    <th>وقت وصول الزائر</th>
                    <th>اسم الزائر </th>
                    <th>رقم الجوال </th>
                    <th>الفئه </th>
                    <th>الغرض من الزيارة </th>
                    <th>يرغب بالتواصل </th>
                    <th>وقت انتهاء الزيارة</th>
                    <th>الوقت المستغرق</th>

                    <th>الاجراء</th>
                    <th>مستقبل الزيارة</th>

                </tr>
                </thead>

            </table>
        </div>

    </div>
</div>


    <div class="modal fade" id="purpose_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-success" style="h">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تفاصيل الزيارة</h5>

                </div>
                <div class="modal-body">
                    <div class="panel panel-warning" style="box-shadow: 2px 2px 8px #000;">
                        <div class="panel-heading">
                            <h5 class="text-center">الغرض من الزيارة</h5>
                        </div>
                        <div class="panel-body">
                            <p id="ghared">
                            </p>
                        </div>
                    </div>


                    <div class="panel panel-info" style="box-shadow: 2px 2px 8px #000;">
                        <div class="panel-heading">
                            <h5 class="text-center">نتيجة الزيارة</h5>
                        </div>
                        <div class="panel-body">
                            <p id="natega"></p>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>

                </div>
            </div>
        </div>
    </div>





<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>
    $(document).ready(function() {

        var oTable_usergroup = $('#js_table_gm3ia').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>Public_relation/visitors_data',
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
            colReorder: true,
            "bDestroy": true,
            "scrollX": true



        });
    });
</script>

    <script>
        function load_filter() {
            var date_from = $('#date_from').val();
            var date_to = $('#date_to').val();
            var degree_id = $('#1degree_id').val();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>Public_relation/load_filter_page',
                data: {date_from:date_from,date_to:date_to,degree_id:degree_id},
                dataType: 'html',
                cache: false,
                success: function (html) {

                    $('#body_table_filter').html(html);
                  //  get_filter_data();

                }
            });
        }
    </script>
    <script>
        function get_text(ghared, natega) {
            $('#ghared').text(ghared);
            $('#natega').text(natega);
        }
    </script>

<script>
   function get_filter_data() {

        var oTable_usergroup = $('#js_table_load').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>Public_relation/visitors_data',
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
            colReorder: true,
            "bDestroy": true



        });
    }
</script>