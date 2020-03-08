<style>
    .panel-body {
        padding: 15px;
    }

    .tab-content .panel-body {
        background: #fff;
        border: 1px solid gray;
        border-radius: 2px;
        padding: 10px;
        position: relative;
    }

    .tabs-left > li.active > a, .tabs-left > li.active > a:hover, .tabs-left > li.active > a:focus {
        border-bottom-color: #009688;
        border-right-color: #009688;
        background-color: #009688;
        color: #fff;
    }

    .nav > li > a:hover, .nav > li > a:focus {
        text-decoration: none;
        background-color: #eee;
        color: #0f0f0f;
    }

    .tabs-left > li.active > a, .tabs-left > li.active > a:hover, .tabs-left > li.active > a:focus {
        border-bottom-color: #009688;
        border-right-color: #009688;
        background-color: #009688;
        color: #fff !important;
    }

    ul.nav-tabs.holiday-month {
        border: 1px solid gray;
        height: 590px;
        overflow: scroll;
    }

    .nav-tabs > li > a:hover {
        border-color: #eee #eee #ddd;
    }

    ul.nav-tabs.holiday-month > li > a {
        color: #222;
        font-weight: 600;
        padding: 5px 5px;
        font-size: 13px;
    }
</style>



    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">

                <h4 class="panel-title"><?php echo $title; ?></h4>

            </div>
            <div class="panel-body">

                <?php
                if (isset($get_egraa) && !empty($get_egraa)) {
                    echo form_open_multipart('human_resources/egraat_settings/Egraat_settings/update_setting/' . $get_egraa->id);
                    $job_title_id_fk = $get_egraa->job_title_id_fk;
                    $job_title_n = $get_egraa->job_title_n;
                    $id = $get_egraa->id;
                    $person_type = $get_egraa->person_type;
                    $person_code = $get_egraa->person_code;
                    $person_name = $get_egraa->person_name;
                    $person_private_name = $get_egraa->person_private_name;
                    $person_edara = $get_egraa->person_edara;
                    $person_qsm = $get_egraa->person_qsm;
                    $person_img = $get_egraa->person_img;
                    $person_suspend = $get_egraa->person_suspend;
                } else {
                    echo form_open_multipart('human_resources/egraat_settings/Egraat_settings/add_setting');

                    $id = '';
                    $job_title_id_fk = '';
                    $job_title_n = '';
                    $person_type = '';
                    $person_code = '';
                    $person_name = '';
                    $person_private_name = '';
                    $person_edara = '';
                    $person_qsm = '';
                    $person_img = '';
                    $person_suspend = '';

                }
                ?>
                <?php
                if (isset($all_jobs) && !empty($all_jobs)) {
                ?>
                <div class="col-xs-12" >
                    <div class="col-xs-3 form-group padding-4">
                        <input type="hidden" name="job_title_id_fk" id="job_title_id_fk"  value="<?= $job_title_id_fk?>">
                        <label class="label">المسمي الوظيفي</label>
                        <input type="text" class="form-control code" name="job_title"
                               id="job_title"
                               readonly="readonly"
                               ondblclick="$('#ModalJob').modal('show');"
                               style="cursor:pointer;border: white;color: black;width: 87%;float: right;"
                               value="<?= $job_title_n ?>"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                        <button type="button" onclick="$('#ModalJob').modal('show');" class="btn btn-success btn-next"
                                style="float: right;">
                            <i class="fa fa-plus"></i></button>

                    </div>
                    <div class="col-xs-3 form-group padding-4">
                        <label class="label"> الكود</label>
                        <input type="hidden" name="person_type" id="person_type" value="<?= $person_type ?>">
                        <input type="text" class="form-control code" name="person_code"
                               id="person_code"
                               readonly="readonly"
                               onclick="$('#modalID').val();  "
                               ondblclick="get_members('');"
                               style="cursor:pointer;border: white;color: black;width: 87%;float: right;"
                               value="<?= $person_code ?>"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                        <button type="button" onclick="get_members('');" class="btn btn-success btn-next"
                                style="float: right;">
                            <i class="fa fa-plus"></i></button>


                    </div>
                    <div class="col-xs-3 form-group padding-4">
                        <label class="label"> الاسم</label>
                        <input type="text" class="form-control code" name="person_name"
                               id="person_name"
                               readonly="readonly"
                               style="cursor:pointer;border: white;color: black"
                               value="<?= $person_name ?>"
                               data-validation="required"
                               data-validation-has-keyup-event="true">

                    </div>
                    </div>
                    
                      <div class="col-xs-12" >
                    <div class="col-xs-3 form-group padding-4">
                        <label class="label"> الاسم المختصر</label>
                        <input type="text" class="form-control code" name="person_private_name"
                               id="person_private_name" value="<?= $person_private_name ?>"
                               data-validation="required"
                               data-validation-has-keyup-event="true">
                        <input type="hidden" class="form-control" name="person_edara"
                               id="person_edara"
                               value="<?= $person_edara ?>">
                        <input type="hidden" class="form-control " name="person_qsm"
                               id="person_qsm"
                               value="<?= $person_qsm ?>">

                    </div>
                    <!--
                    <div class="col-xs-3 form-group padding-4">
                        <label class="label"> الادارة</label>

                        <input type="text" class="form-control code" name="person_edara"
                               id="person_edara"
                               readonly="readonly"
                               style="cursor:pointer;border: white;color: black"
                               value="<?= $person_edara ?>"

                        >

                    </div>
                    <div class="col-xs-3 form-group padding-4">
                        <label class="label"> القسم</label>

                        <input type="text" class="form-control code" name="person_qsm"
                               id="person_qsm"
                               readonly="readonly"
                               style="cursor:pointer;border: white;color: black"
                               value="<?= $person_qsm ?>"

                        >

                    </div>
                    -->
                    <div class="col-xs-3 form-group padding-4">
                        <label class="label"> صورة التوقيع</label>
                        <input type="file" class="form-control code" name="person_img"
                               id="person_img"
                        >
                        <?php
                        if (!empty($person_img)) {
                            ?>
                            <a data-toggle="modal" data-target="#myModal-view-<?= $id ?>">
                                <i class="fa fa-eye" title=" قراءة"></i> </a>
                            <?php

                        }
                        ?>

                    </div>
                    <div class="col-xs-2 form-group padding-4">
                        <label class="label"> الحالة</label>
                        <select name="person_suspend"
                                class="form-control"
                        >
                            <option value="1" <?php
                            if ($person_suspend == 1) {
                                echo 'selected';
                            }
                            ?>
                            >نشط
                            </option>
                            <option value="2"
                                <?php
                                if ($person_suspend == 2) {
                                    echo 'selected';
                                }
                                ?>
                            > غير نشط
                            </option>

                        </select>


                    </div>
                    
                    
                    <div class="col-xs-4  padding-4">
                    <button type="submit" class="btn btn-labeled btn-success" name="add"
                            value="add"
                            style="margin-top: 26px; ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                    </div>

                </div>




                <?php
                echo form_close();
                ?>
                <?php
                   } else {
                ?>
                <div class="alert-danger alert">عفوا ... قد تم اضافة جميع الاجراءات !</div>

                <?php
                 }
                ?>

            </div>
        </div>

    </div>
    <?php
    if (isset($all_egraat) && !empty($all_egraat)) {
        $x = 1;
        ?>
        <div class="col-sm-12 no-padding">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
                <div class="panel-heading">
                    <h4 class="panel-title"><?php echo $title; ?></h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered example " role="table">
                        <thead>
                        <tr class="greentd">
                            <th style="font-size: 15px; width:88px !important; ">م</th>
                            <th style="font-size: 15px;" class="text-left">المسمي الوظيفي</th>
                            <th style="font-size: 15px;" class="text-left"> الكود</th>
                            <th style="font-size: 15px;" class="text-left"> الاسم</th>
                            <th style="font-size: 15px;" class="text-left"> الاسم المختصر</th>
                            <!--  <th style="font-size: 15px;" class="text-left">   الحالة</th> -->
                            <th style="font-size: 15px;" class="text-left"> الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($all_egraat as $row) {
                            ?>
                            <tr>
                                <td><?= $x++ ?></td>
                                <td><?= $row->job_title_n ?></td>
                                <td><?= $row->person_code ?></td>
                                <td><?= $row->person_name ?></td>
                                <td><?= $row->person_private_name ?></td>

                                <td>

                                    <a href="#" onclick='swal({
                                            title: "هل انت متأكد من التعديل ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-warning",
                                            confirmButtonText: "تعديل",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){
                                            window.location="<?php echo base_url(); ?>human_resources/egraat_settings/Egraat_settings/update_setting/<?php echo $row->id; ?>";
                                            });'>
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                    <a href="#" onclick='swal({
                                            title: "هل انت متأكد من الحذف ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "حذف",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: false
                                            },
                                            function(){
                                            swal("تم الحذف!", "", "success");
                                            window.location="<?= base_url() . "human_resources/egraat_settings/Egraat_settings/delete_setting/" . $row->id ?>";
                                            });'>
                                        <i class="fa fa-trash"> </i></a>
                                    <?php

                                    if ($row->person_suspend == 1) {
                                        // echo "نشط";
                                        ?>

                                        <button id="active<?= $row->id ?>" class="btn btn-success"
                                                onclick="update_status(<?= $row->id ?>,2)">نشط
                                        </button>
                                        <?php
                                    } elseif ($row->person_suspend == 2) {
                                        // echo "غير نشط";
                                        ?>
                                        <button id="unactive<?= $row->id ?>" class="btn btn-danger"
                                                onclick="update_status(<?= $row->id ?>,1)">غير نشط
                                        </button>

                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <?php
    }
    ?>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">الموظفيين </h4>
                </div>
                <div class="modal-body">
                    <?php
                    $k_type_arr = array('1' => 'الموظفيين', '2' => 'أعضاء مجلس الإدارة', '3' => ' أعضاء الجمعية العمومية ', '4' => 'المتطوعين');
                    if (isset($k_type_arr) && !empty($k_type_arr)) {
                        foreach ($k_type_arr as $key => $value) { ?>
                            <div class="radio-content">
                                <input type="radio" name="type" id="square-radio<?= $key ?>"
                                       onclick="get_members(<?= $key ?>)" value="<?= $key ?>"

                                    <?php if (!empty($$key)) {
                                        if ($key == 1) {
                                            ?> checked <?php }
                                    } ?>>
                                <label for="square-radio<?= $key ?>" class="radio-label"><?= $value ?></label>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div id="myDiv" style="display: none;">
                        <table id="js_table_members" class="table table-bordered " role="table">
                            <thead>
                            <tr class="greentd">
                                <th style="font-size: 15px; width:88px !important; ">#</th>
                                <th style="font-size: 15px;" class="text-left">الكود</th>
                                <th style="font-size: 15px;" class="text-left"> الاسم</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="ModalJob" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> المسمي الوظيفي </h4>
            </div>
            <div class="modal-body">
                <?php

                ?>
                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
                        <th style="font-size: 15px; width:88px !important; ">#</th>
                        <th style="font-size: 15px;" class="text-left">  المسمي الوظيفي</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($all_jobs) && !empty($all_jobs)){
                        $x= 1;
                        foreach ($all_jobs as $job){
                            ?>
                            <tr  onclick="">
                                <td>
                                    <input type="radio" name="job" onclick="get_job('<?= $job->title?>',<?= $job->id?>);" value="<?= $job->id?>">
                                </td>
                                <td><?= $job->title?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                    </tbody>
                </table>
                <?php  ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

    <!-- modal view -->
    <div class="modal fade" id="myModal-view-<?= $id ?>" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">صورة التوقيع</h4>
                </div>
                <div class="modal-body">
                    <img src="<?= base_url() . "uploads/human_resources/egraat_settings/" . $person_img ?>"
                         width="100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        إغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal view -->


<script>
    function get_members(valu) {
      var job_title_id_fk = $('#job_title_id_fk').val();
      var p_type = $('#square-radio'+valu).val();
      if (job_title_id_fk != ''){
          $('#myModal').modal('show');
          if (valu != ''){
         $('#myDiv').show();
      //  alert(job_title_id_fk);
        $('#person_type').val(valu);
        var Columns    = {aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }

            ]};
        var person_type = valu;
        var oTable_usergroup = $('#js_table_members').DataTable({
            'ordering':false,
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/egraat_settings/Egraat_settings/get_person/' + person_type +'/'+job_title_id_fk,

            Columns,

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
            destroy: true

        });
      } }else{

          swal({
              title: "من فضلك اختر المسمي الوظيفي اولا ",
              type: "warning",
              confirmButtonClass:"btn-warning",
              closeOnConfirm: false
          });
      }

    }

</script>

<script>

    function GetMemberName(valu) {
        var id = valu;
       var name = $("#member" + valu).data('name');
       var code = $("#member" + valu).data('code');
       var edara = $("#member" + valu).data('edara');
       var qsm = $("#member" + valu).data('qsm');
        $('#person_name').val(name);
        $('#person_private_name').val(name);
        $('#person_code').val(code);
        $('#person_qsm').val(qsm);
        $('#person_edara').val(edara);
        $('#myModal').modal('hide');


    }

</script>
<script>
    function update_status(id,value) {
      //  location.reload();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/egraat_settings/Egraat_settings/update_status',
            data: {id:id,value:value},
            dataType: 'html',
            cache: false,
            success: function () {
                if (value==1){
                    // btn-danger
                    $('#unactive'+id).removeClass('btn-danger');
                    $('#unactive'+id).addClass('btn-success');
                    $('#unactive'+id).text('نشط');


                }  else if(value==2){
                    $('#active'+id).removeClass('btn-success');
                    $('#active'+id).addClass('btn-danger');
                    $('#active'+id).text(' غير نشط');
                }

            }
        });

    }
</script>
<script>
    function get_job(title,id) {
        $('#job_title').val(title);
        $('#job_title_id_fk').val(id);
        $('#ModalJob').modal('hide');

    }
</script>



