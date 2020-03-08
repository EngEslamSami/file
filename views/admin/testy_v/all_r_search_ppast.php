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
            <h3 class="panel-title">تقرير الكفلاء</h3>
        </div>

        <div class="panel-body">

            <div class="col-sm-12">


                <div class="form-group col-md-3 col-sm-6 col-xs-12 padding-4">
                    <label class="label ">اسم المستفيد </label>
                    <input type="number" class="form-control " name="mosdafed_name" id="mosdafed_name" readonly
                           style="width: 78%;float: right">
                    <button type="button" data-toggle="modal"
                            data-target="#myModalInfo_mosdafed" class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                    <input type="hidden" name="table" value="" id="table_name">
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

                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label "> التصنيف </label>
                    <select name="person_cat" id="person_cat" class="form-control">
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

                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
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

                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label ">اسم الكافل </label>
                    <input type="number" class="form-control " name="k_num" id="k_num2" readonly
                           style="width: 78%;float: right">
                    <button type="button" data-toggle="modal" id="k_num" onclick="GetDiv('myDiv')"
                            data-target="#myModalInfo" class="btn btn-success btn-next" style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>

                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label "> نوع الكفالة </label>
                    <select name="kafala_type" id="kafala_type" class="form-control">
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
                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label "> حالة الكافل </label>
                    <select name="halat_kafel" id="halat_kafel" class="form-control">
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
                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
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

                <div class="col-sm-12 text-center">
                    <button type="button" class="btn btn-labeled btn-success search" id="" name="search"
                            onclick="get_result();">
                        <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">تقرير الكفلاء</h3>
        </div>

        <div class="panel-body">

            <div id="res">

            </div>
        </div>
    </div>


    <div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 70%">
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
        <div class="modal-dialog" role="document" style="width: 70%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">الكفلاء</h4>
                </div>
                <div class="modal-body">
                    <div class="radio-content">
                        <input type="radio" name="fe2a" id="square-radio1" onclick="Get_mosdafed('myDiv_mosdafed',1)"
                               value="1">
                        <label for="square-radio1" class="radio-label">ام</label>
                    </div>
                    <div class="radio-content">
                        <input type="radio" name="fe2a" id="square-radio2" onclick="Get_mosdafed('myDiv_mosdafed',2)"
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

        function GetMemberName(valu) {
            var id = valu;
            $('#k_num2').val(valu);
            $("#myModalInfo .close").click();


        }

    </script>

    <script>

        function Get_mosdafed(div, valu) {
            var table = ['', 'mother', 'f_members'];
            $('#table_name').val(table[valu]);
            var html;
            // if(valu ==1){
            html = '<div class="col-md-12"><table id="js_table_members_mosdafed" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> اسم المستفيد </th><th style="width: 50px;">  حالة المستفيد </th><th style="width: 170px;" >التصنيف</th>' +
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

        function GetMemberName_mosdafed(valu) {
            var id = valu;
            $('#mosdafed_name').val(valu);
            $("#myModalInfo_mosdafed .close").click();


        }

    </script>

    <script>


        function get_result() {

            var mosdafed_name = $('#mosdafed_name').val();
            var kafel_name = $('#k_num2').val();
            var person_hala = $('#person_hala').val();
            var person_cat = $('#person_cat').val();
            var family_cat = $('#family_cat').val();
            var kafala_type = $('#kafala_type').val();
            var halat_kafel = $('#halat_kafel').val();
            var kafala_hala = $('#kafala_hala').val();
            var table_name = $('#table_name').val();

            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>Testy/get_result",
                data: {
                    mosdafed_name: mosdafed_name,
                    kafel_name: kafel_name,
                    person_hala: person_hala,
                    person_cat: person_cat,
                    family_cat: family_cat,
                    kafala_type: kafala_type,
                    halat_kafel: halat_kafel,
                    kafala_hala: kafala_hala,
                    table_name: table_name
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
