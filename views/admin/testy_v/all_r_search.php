<style>
    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
    
 
    
    
    
</style>


<?php
?>

<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">تقرير الكفالات</h3>
        </div>

        <div class="panel-body">

            <div class="col-sm-12">


                <div class="form-group col-md-3 col-sm-6 col-xs-12 padding-4">
                    <label class="label ">اسم المستفيد </label>
                    <input type="text" class="form-control " name="mosdafed_name" id="mosdafed_name" readonly
                           style="width: 86%;float: right">
                    <button type="button" data-toggle="modal"
                            data-target="#myModalInfo_mosdafed" class="btn btn-success btn-next"
                             style="float: right;">
                        <i class="fa fa-plus"></i></button>
                    <input type="hidden" name="table" value="" id="table_name">
                    <input type="hidden" name="table" value="" id="table2_name">
                    <input type="hidden" name="mosdafed_id" value="" id="mosdafed_id">
                </div>
                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label "> حالة الملف </label>
                    <select name="file_status" id="file_status" class="form-control">
                        <option value=""> - الكل -</option>

                        <?php $hala_arr = array(1 => 'نشط كليا', 2 => 'نشط جزئيا', 3 => 'موقوف مؤقتا', 4 => 'موقوف نهائيا');
                        foreach ($hala_arr as $key => $value) {
                            ?>
                            <option value="<?= $key ?>"><?= $value ?></option>
                            <?php
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label "> حالة المستفيد </label>
                    <select name="person_hala" id="person_hala" class="form-control">
                        <option value=""> - الكل -</option>

                        <?php $hala_arr = array(1 => 'نشط كليا', 2 => 'نشط جزئيا', 3 => 'موقوف مؤقتا', 4 => 'موقوف نهائيا');
                        foreach ($hala_arr as $key => $value) {
                            ?>
                            <option value="<?= $key ?>"><?= $value ?></option>
                            <?php
                        }

                        ?>
                    </select>

                </div>

                <div class="form-group col-md-1 col-sm-6 col-xs-12 padding-4">
                    <label class="label "> التصنيف </label>
                    <select name="person_cat" id="person_cat" class="form-control"
                            onchange="  if ($(this).val() == 1)
   $('#table_name').val('mother');
else $('#table_name').val('f_members');
">
                        <option value=""> - الكل -</option>

                        <?php $cat_arr = array(1 => 'أرملة', 2 => 'يتيم', 3 => 'مستفيد', 4 => 'أخرى');
                        foreach ($cat_arr as $key => $value) {
                            ?>
                            <option value="<?= $key ?>"><?= $value ?></option>
                            <?php
                        }

                        ?>
                    </select>

                </div>

                <div class="form-group col-md-1 col-sm-6 col-xs-12 padding-4">
                    <label class="label "> فئة الأسرة </label>
                    <select name="family_cat" id="family_cat" class="form-control">
                        <option value=""> - الكل -</option>

                        <?php
                        if (isset($family_cat) && (!empty($family_cat))) {
                            foreach ($family_cat as $value) {
                                ?>
                                <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                                <?php
                            }
                        }

                        ?>
                    </select>

                </div>

                <div class="form-group col-md-3 col-sm-6 col-xs-12 padding-4">
                    <label class="label ">اسم الكافل </label>
                    <input type="text" class="form-control " name="k_num" id="k_num2" readonly
                           style="width: 86%;float: right">
                    <button type="button" data-toggle="modal" id="k_num" onclick="GetDiv('myDiv')"
                            data-target="#myModalInfo" class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                    <input type="hidden" name="k_num_id" id="k_num_id" value="">
                </div>

                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label "> نوع الكفالة </label>
                    <select name="kafala_type" id="kafala_type" class="form-control" onchange="if ($(this).val() == 4 ){
                        $('#table_name').val('mother'); }
                   else
                       { $('#table_name').val('f_members');}">
                        <option value=""> - الكل -</option>

                        <?php $kafala_type_arr = array(1 => 'كفالة شاملة', 2 => 'نصف كفالة', 3 => 'كفالة مستفيد', 4 => 'كفالة أرملة');
                        foreach ($kafala_type_arr as $key => $value) {
                            ?>
                            <option value="<?= $key ?>"><?= $value ?></option>
                            <?php
                        }

                        ?>
                    </select>

                </div>
                <div class="form-group col-md-1 col-sm-6 col-xs-12 padding-4">
                    <label class="label "> حالة الكافل </label>
                    <select name="halat_kafel" id="halat_kafel" class="form-control"
                            onchange="$('#table2_name').val('fr_sponsor')">
                        <option value=""> - الكل -</option>

                        <?php
                        if (isset($halat_kafel) && (!empty($halat_kafel))) {
                            foreach ($halat_kafel as $value) {
                                ?>
                                <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group col-md-1 col-sm-6 col-xs-12 padding-4">
                    <label class="label "> حالة الكفالة </label>
                    <select name="kafala_hala" id="kafala_hala" class="form-control">
                        <option value=""> - الكل -</option>
                        <?php $kafala_hala_arr = array(1 => 'منتظم', 2 => 'موقوف');
                        foreach ($kafala_hala_arr as $key => $value) {
                            ?>
                            <option value="<?= $key ?>"><?= $value ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                
              <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label "> طريقة التوريد </label>
                    <!--
                    <select id="pay_method" name="pay_method" class="form-control"
                            data-validation="required" aria-required="true">-->
         <select id="pay_method" name="pay_method" class="form-control selectpicker"  multiple="" data-actions-box="true"
                data-validation="required" aria-required="true">
                        <option value="">- الكل -</option>
                        <?php
                        $pay_method_arr = array('- الكل -', 1 => 'نقدي', 2 => 'شيك', 3 => 'شبكة', 4 => 'إيداع نقدي', 5 => 'إيداع شيك', 6 => 'تحويل', 7 => 'أمر مستديم');

                        if (isset($pay_method_arr) && !empty($pay_method_arr)) {
                            for ($a = 1; $a < sizeof($pay_method_arr); $a++) {
                                ?>
                                <option value="<?php echo $a; ?>"
                                    <?php if (!empty($pay_method)) {
                                        if ($pay_method == $a) {
                                            echo 'selected';
                                        }
                                    } ?>>
                                    <?php echo $pay_method_arr[$a]; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>


                </div>
                
                
                
                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label "> الكفالة منتهية </label>
                    <select name="kafala_end" id="kafala_end" class="form-control" onchange="if($(this).val()==2)
                        $('.end_kafala').show();
                    else $('.end_kafala').hide();
                            ">
                            <option value="">- الكل -</option>
                        <?php $arr = array(1 => 'لا', 2 => 'نعم');
                        foreach ($arr as $key => $value) {
                            ?>
                            <option value="<?= $key ?>"><?= $value ?></option>
                            <?php
                        }
                        ?>
                    </select>

                </div>

                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4 end_kafala" style="display: none">
                    <label class="label "> الكفالة منتهية من : </label>
                    <input type="date" class="form-control" name="end_from" id="end_from">

                </div>

                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4 end_kafala" style="display: none">
                    <label class="label "> الكفالة منتهية إلى : </label>
                    <input type="date" class="form-control" name="end_to" id="end_to">

                </div>

                <div class="col-sm-12 text-center">
                    <button type="button" class="btn btn-labeled btn-success search" id="" name="search"
                            onclick="get_result();">
                        <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                    </button>
                </div>
            </div>

            <div class="col-xs-12 no-padding">
                <div id="res"> </div>
            </div>
        </div>
    </div>
</div>




    <div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 95%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">الكفلاء</h4>
                </div>
                <div class="modal-body">

                    <div id="myDiv"></div>
                </div>
                <div class="modal-footer" style="display: inline-block;width: 100%">
                    <button type="button" class="btn btn-danger"
                            style="float: left;" data-dismiss="modal">إغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModalInfo_mosdafed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 95%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">الكفلاء</h4>
                </div>
                <div class="modal-body">
                    <div class="radio-content">
                        <input type="radio" name="fe2a" id="square-radio1" onclick="Get_mosdafed('myDiv_mosdafed',1);
                        $('#kafala_type').val(4); $('#person_cat').val(1);"
                               value="1">
                        <label for="square-radio1" class="radio-label">الأرامل</label>
                    </div>
                    <div class="radio-content">
                        <input type="radio" name="fe2a" id="square-radio2" onclick="Get_mosdafed('myDiv_mosdafed',2);
 $('#kafala_type').val(''); $('#person_cat').val('');"
                               value="2">
                        <label for="square-radio2" class="radio-label">الأبناء</label>
                    </div>
                    <div id="myDiv_mosdafed"></div>
                </div>
                <div class="modal-footer" style="display: inline-block;width: 100%">
                    <button type="button" class="btn btn-danger"
                            style="float: left;" data-dismiss="modal">إغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
function GetDiv(div) {
    var html;
    // if(valu ==1){
    html = '<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
        '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> كود الكافل </th><th style="width: 50px;"> الإسم </th><th style="width: 170px;" >الجوال</th>' +
        '</tr></thead><table><div id="dataMember"></div></div>';
    // }
    $("#" + div).html(html);

    // $('#person_type').val(valu);
    $('#js_table_members').show();
    // var F2aType = valu;
    var oTable_usergroup = $('#js_table_members').DataTable({
        dom: 'Bfrtip',
        "ajax": '<?php echo base_url(); ?>Testy/get_khafel',
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
        destroy: true

    });

}
    </script>

    <script>

        function GetMemberName(valu_name, valu_id) {
            var id = valu_id;
            $('#k_num2').val(valu_name);
            $('#k_num_id').val(valu_id);
            $("#myModalInfo .close").click();


        }

    </script>

    <script>
/*
        function Get_mosdafed(div, valu) {
            var table = ['', 'mother', 'f_members'];
            $('#table_name').val(table[valu]);
            var html;
            // if(valu ==1){
            html = '<div class="col-md-12"><table id="js_table_members_mosdafed" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr><th style="width: 50px;">#</th><th style="width: 170px;">رقم الملف</th><th style="width: 50px;"> اسم المستفيد </th><th style="width: 50px;">  حالة المستفيد </th><th style="width: 170px;" >التصنيف</th><th style="width: 170px;" >رقم الكافل</th><th style="width: 170px;" >إسم الكافل</th>' +
                '</tr></thead><table><div id="dataMember"></div></div>';
            // }
            $("#" + div).html(html);

            // $('#person_type').val(valu);
            $('#js_table_members_mosdafed').show();
            // var F2aType = valu;
            var oTable_usergroup = $('#js_table_members_mosdafed').DataTable({
                dom: 'Bfrtip',
                "ajax": '<?php echo base_url(); ?>Testy/get_mosdafed/' + valu,
                aoColumns: [
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
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
                destroy: true

            });

        }
        */
        
          function Get_mosdafed(div, valu) {
        var table = ['', 'mother', 'f_members'];
        $('#table_name').val(table[valu]);
        var html;
        if(valu ==1){
        html = '<div class="col-md-12"><table id="js_table_members_mosdafed" class="table table-striped table-bordered dt-responsive nowrap " >' +
        '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> رقم الملف </th><th style="width: 50px;"> اسم المستفيد </th><th style="width: 50px;">  حالة المستفيد </th><th style="width: 170px;" >التصنيف</th><th style="width: 50px;">  رقم الكافل</th><th style="width: 50px;">   اسم الكافل  </th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        }else if(valu == 2) {
          html = '<div class="col-md-12"><table id="js_table_members_mosdafed" class="table table-striped table-bordered dt-responsive nowrap " >' +
              '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> رقم الملف </th><th style="width: 50px;"> اسم المستفيد </th><th style="width: 50px;">  حالة المستفيد </th><th style="width: 170px;" >التصنيف</th>'+
              '<th style="width: 170px;" >نوع الكفالة</th><th style="width: 170px;" >رقم الكافل </th><th style="width: 170px;" >اسم الكافل</th><th style="width: 170px;" >رقم الكافل التاني</th><th style="width: 170px;" >اسم الكافل الثاني</th>' +
              '</tr></thead><table><div id="dataMember"></div></div>';
        }
        $("#" + div).html(html);

        // $('#person_type').val(valu);
        $('#js_table_members_mosdafed').show();
        // var F2aType = valu;
        if (valu == 1) {
          var oTable_usergroup = $('#js_table_members_mosdafed').DataTable({
              dom: 'Bfrtip',
              "ajax": '<?php echo base_url(); ?>Testy/get_mosdafed/' + valu,

              aoColumns: [
                  {"bSortable": true},
                  {"bSortable": true},
                  {"bSortable": true},
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
              destroy: true

          });

        }else if(valu == 2) {
          var oTable_usergroup = $('#js_table_members_mosdafed').DataTable({
              dom: 'Bfrtip',
              "ajax": '<?php echo base_url(); ?>Testy/get_mosdafed/' + valu,

              aoColumns: [
                  {"bSortable": true},
                  {"bSortable": true},
                  {"bSortable": true},
                  {"bSortable": true},
                  {"bSortable": true},
                  {"bSortable": true},
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
              destroy: true

          });

        }
    }  
        
    </script>

    <script>

        function GetMemberName_mosdafed(valu_name, valu_id) {
            var id = valu_id;
            $('#mosdafed_name').val(valu_name);
            $('#mosdafed_id').val(id);
            $("#myModalInfo_mosdafed .close").click();


        }

    </script>

    <script>


        function get_result() {
            var pay_method = $('#pay_method').val();
            var mosdafed_name = $('#mosdafed_id').val();
            var kafel_name = $('#k_num_id').val();
            var person_hala = $('#person_hala').val();
            var file_status = $('#file_status').val();
            var person_cat = $('#person_cat').val();
            var family_cat = $('#family_cat').val();
            var kafala_type = $('#kafala_type').val();
            var halat_kafel = $('#halat_kafel').val();
            var kafala_hala = $('#kafala_hala').val();
            var table_name = $('#table_name').val();
            var table2_name = $('#table2_name').val();
            var kafala_end = $('#kafala_end').val();
            var end_from = $('#end_from').val();
            var end_to = $('#end_to').val();

            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>Testy/get_result",
                data: {
                    mosdafed_name: mosdafed_name,
                    kafel_name: kafel_name,
                    person_hala: person_hala,
                    file_status: file_status,
                    person_cat: person_cat,
                    family_cat: family_cat,
                    kafala_type: kafala_type,
                    pay_method: pay_method,
                    halat_kafel: halat_kafel,
                    kafala_hala: kafala_hala,
                    table_name: table_name,
                    table2_name: table2_name,
                    kafala_end: kafala_end,
                    end_from: end_from,
                    end_to: end_to
                },
                beforeSend: function () {
                    $('#res').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },

                success: function (d) {


                    $('#res').html(d);
                }

            });
        }
    </script>
