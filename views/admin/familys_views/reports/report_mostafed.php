<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= $title ?></h4>
            </div>
        </div>

        <div class="panel-body">
            <form type="post" action="" id="search_form">
                <div class="col-md-12">
                    <div class="form-group col-md-2 padding-4 col-sm-4" style="width: 13%;">
                        <label class="label "> رقم الملف </label>
                        <input type="number" name="file_num" id="file_num" readonly style="width:60%; float: right;"
                               data-validation="required" class=" no-padding form-control  form-control "
                               aria-required="true"/>
                        <div style="display: flex;">
                            <button type="button" data-toggle="modal" data-target="#exampleModal" style="width: 50%;"
                                    onclick="GetDiv_emps('myDiv_emp')" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i></button>
                            <button type="button" class="btn btn-warning btn-sm " style="width: 50%;"
                                    onclick="$('#file_num').val(' ')">
                                <i class="fa  fa-minus"></i></button>
                        </div>
                    </div>
                    <?php $file_stause = $persons_status = array(1 => 'نشط كليا', 2 => 'نشط جزئيا', 3 => 'موقوف مؤقتا', 4 => 'موقوف نهائيا	'); ?>
                    <div class="form-group col-sm-2 col-xs-12 padding-4 ">
                        <label class="label"> حالة الملف</label>
                        <select name="file_stause" id="file_stause" class="no-padding form-control ">
                            <option value="all"> إختر</option>
                            <option value="all"> الكل</option>
                            <?php foreach ($file_stause as $key => $value) { ?>
                                <option value="<?= $key ?>"><?= $value ?> </option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group col-sm-2 col-xs-12 padding-4 ">
                        <label class="label"> حالة المستفيد</label>
                        <select name="persons_status" id="persons_status" class="no-padding form-control ">
                            <option value="all"> إختر</option>
                            <option value="all"> الكل</option>
                            <?php foreach ($persons_status as $key => $value) { ?>
                                <option value="<?= $key ?>"><?= $value ?> </option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group col-sm-1 col-xs-12 padding-4 ">
                        <label class="label">فئة الأسرة </label>
                        <select name="family_cat" id="family_cat" class="no-padding form-control ">
                            <option value="all"> إختر</option>
                            <option value="all"> الكل</option>
                            <?php foreach ($category as $value) { ?>
                                <option value="<?= $value->id ?>"><?= $value->title ?> </option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="form-group col-md-1 padding-4 col-sm-4">
                        <label class="label "> الفئة <strong></strong> </label>
                        <select name="type_member" id="type_member"
                                data-validation="required" class=" no-padding form-control  form-control "
                                aria-required="true">
                            <option value="">اختر</option>
                            <option value="0">الكل</option>
                            <option value="1"> الام</option>
                            <option value="2">الابناء</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-1 col-xs-12 padding-4 ">
                        <label class="label"> الجنس</label>
                        <select name="gender" id="gender" class="no-padding form-control ">
                            <option value="all"> إختر</option>
                            <option value="all"> الكل</option>
                            <option value="1"> ذكر</option>
                            <option value="2"> انثى</option>

                        </select>
                    </div>

                    <div class="form-group col-md-2 padding-4 col-sm-4" style="width: 12%;">
                        <label class="label "> العمر </label>
                        <input type="number" onchange="check_age()" name="age_from" id="age_from"
                               data-validation="required" placeholder="من"
                               class="form-control  form-control " style="width: 50%;float: right;"
                               aria-required="true"/>
                        <input type="number" onchange="check_age()" name="age_to" id="age_to"
                               data-validation="required"
                               placeholder="الى"
                               class="form-control  form-control " style="width: 50%;" aria-required="true"/>
                    </div>
                    <div class="form-group col-sm-2 col-xs-12 padding-4 ">
                        <label class="label">الحالة الدراسية </label>
                        <select name="education_status[]" id="education_status" multiple
                                title="يمكنك إختيار أكثر من طريقه" data-show-subtext="true"
                                class=" no-padding form-control   selectpicker  " data-live-search="true"
                                data-actions-box="true">
                            <option value="all"> إختر</option>
                            <option value="all"> الكل</option>
                            <option value="0">( دون سن الدراسة )</option>
                            <option value="unlettered">( امى )</option>
                            <option value="graduate">( متخرج )</option>
                            <option value="read_write"> ( يقرأو يكتب )</option>
                            <?php foreach ($education_status as $value) { ?>
                                <option value="<?= $value->id_setting ?>"><?= $value->title_setting ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-2 col-xs-12 padding-4 ">
                        <label class="label"> الحى </label>
                        <select name="h_village[]" id="h_village" multiple
                                title="يمكنك إختيار أكثر من طريقه" data-show-subtext="true"
                                class=" no-padding form-control   selectpicker  " data-live-search="true"
                                data-actions-box="true">
                            <option value="all"> إختر</option>
                            <option value="all"> الكل</option>
                            <?php foreach ($all_h_village as $value) { ?>
                                <option value="<?= $value->h_village_id_fk ?>"><?= $value->h_village_title ?> </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group col-sm-2 col-xs-12 padding-4 text-center">
                        <label class="label"> </label>

                        <button type="button" class="btn btn-labeled btn-warning" id="save"
                                name="note_save" value="save" onclick="make_search()">
                            <span class="btn-label"><i class="glyphicon glyphicon-search"></i></span>بحث
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="col-sm-12 no-padding " id="main_panal" style="display:none">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">نتائج البحث</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12" id="my_search">
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="myDiv_emp"></div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>

<script>

    function make_search() {
        /* var file_num =$('#file_num').val();
         var family_cat =$('#family_cat').val();
         var file_stause =$('#file_stause').val();
         var persons_status =$('#persons_status').val();
         var gender =$('#gender').val();
         var age_from =$('#age_from').val();
         var age_to =$('#age_to').val();
         var health_state =$('#health_state').val();
         var type_member =$('#type_member').val();
         var disease_id_fk=$('#disease_id_fk').val();
         // var dis_reason=$('#dis_reason').val();
         var date_reason=$('#date_reason').val();
         var dis_response_status=$('#dis_response_status').val();
         var dis_status=$('#dis_status').val();
         var m_comprehensive_rehabilitation=$('#m_comprehensive_rehabilitation').val();
          */
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/reports/Family_reports/report_mostafed_search',
            data: $('#search_form').serialize()
            /* data: {health_state: health_state,
                 file_num:file_num,
                 family_cat:family_cat,
                 file_stause:file_stause,
                 gender:gender,
                 persons_status:persons_status,
                 age_from:age_from,
                 age_to:age_to,
                 type_member:type_member,
                 disease_id_fk:disease_id_fk,
                 date_reason:date_reason,
                 dis_response_status:dis_response_status,
                 dis_status:dis_status,
                 m_comprehensive_rehabilitation:m_comprehensive_rehabilitation
                 }*/,
            dataType:
                'html',
            cache:
                false,
            beforeSend:

                function () {
                    $('#main_panal').show();
                    $('#my_search').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                }

            ,

            success: function (html) {
                $('#main_panal').show();
                $("#my_search").html(html);

            }
        })
        ;


    }


</script>


<script>

    function GetDiv_emps(div) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="info"><th style="width: 50px;">#</th><th style="width: 50px;"> رقم الملف  </th>' +
            '<th style="width: 170px;" >اسم رب الاسرة    </th>' +
            '<th style="width: 170px;" >اسم الام </th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>family_controllers/reports/Family_reports/getConnection_file_num/',

            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
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
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true,
            "order": [[1, 'asc']]

        });
    }

    function Get_file_num(obj) {
        var file_num = obj.dataset.file_num;
        document.getElementById('file_num').value = file_num;
        $("#exampleModal .close").click();


    }
</script>

<script>
    function check_age() {
      //  var age_from = $('#age_from').val();
     //   var age_to = $('#age_to').val();
     
      var age_from =parseInt($('#age_from').val());
        var age_to = parseInt($('#age_to').val());
        if ((age_to != "") && (age_from != '')) {
            if (age_from > age_to) {
                swal({
                    title: "التأكد من ادخال فترة العمر صحيح ",
                    type: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: "تم",
                }, function () {
                    $('#age_from').val(' ');
                    $('#age_to').val(' ');
                });
            }
        }
    }
</script>