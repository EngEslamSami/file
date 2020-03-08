<style type="text/css">

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }


    .tb-table tbody th, .tb-table tbody td,
    .tb-table tfoot td, .tb-table tfoot th {
        padding: 0px !important;
        text-align: center;
    }

    td input[type=radio] {
        height: 20px;
        width: 20px;
    }
    
    .label {
    font-size: 14px !important;
    text-align: center !important;
    color: white !important;
    }
    
</style>


<!------------------------------------------>
<?php if ((isset($all_data)) && (!empty($all_data))) { ?>

    <div class="col-xs-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                <table class="table-bordered table  example">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th>رقم الإذن</th>
                        <th>نوع الإذن</th>
                        <th>تاريخ الإذن</th>
                        <th>المستودع</th>
                        <th>الاسم</th>
                        <th> الجوال</th>
                        <th> الإجراءات</th>
                       <!-- <th> القائم بالاضافة</th> -->
                        <th> القائم بالترحيل</th>
                        <th> تاريخ الترحيل</th>
                        <th> الحالة</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $x = 1;
                    foreach ($all_data as $datum) { ?>
                        <tr>
                            <td><?= $x ?></td>
                            <td><?= $datum->ezn_rkm ?></td>
                            <td>
                                <?php if ($datum->type_ezn == 1) {
                                    echo 'تبرعات عينيه';
                                } else {
                                    echo 'مشتريات عينيه';
                                }
                                ?>
                            </td>
                            <td><?= $datum->ezn_date_ar ?></td>
                            <td><?= $datum->storage_name ?></td>
                            <td>
                                <?= $datum->person_name ?>
                            </td>
                            <td> <?= $datum->person_jwal ?></td>

                            <td>
                                <?php if ($datum->type_ezn == 1) { ?>
                                    <a type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                       style="padding: 1px 5px;"
                                       data-target="#myModalInfo_asnafe"
                                       onclick="get_details_sanf('<?= $datum->id ?>')"></i> <i class="fa fa-list"></i>
                                    </a>

                                <?php } else { ?>

                                    <a type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                       style="padding: 1px 5px;"
                                       data-target="#detailsModal" onclick="load_page(<?= $datum->id ?>);"><i
                                                class="fa fa-list"></i>
                                    </a>
                                  
   
                                <?php } ?>
                                
                                
                                
                              <a onclick="print_ezn_edafa(<?= $datum->id ?>)" title="طباعه"><i
                                            class="fa fa-print"></i></a>                            
                                
      <button type="button" class="btn  btn-labeled btn-inverse " id="attach_button" onclick="$('#set').val(<?php echo $datum->id;?>)" data-toggle="modal" data-target="#myModal_attach">
    <span class="btn-label" style="padding: 1px 6px;"><i class="glyphicon glyphicon-cloud-upload"></i></span>
    عرض مرفق
</button>                            

                            </td>
                            <!--
                            <td>
  <span style="font-size: 12px; color: white !important; font-weight: normal;background-color: #c57400;    width: 150px;"
        class="badge badge-add"><?php echo $datum->publisher_name; ?></span></td>-->
        
        
        
        
         <td> <?php 
         if(isset($datum->finance_deport_publisher_name) and $datum->finance_deport_publisher_name != null){
           $finance_deport_publisher_name =   $datum->finance_deport_publisher_name; 
            $finance_deport_publisher_class = 'success';
        }else{
           $finance_deport_publisher_name =  'غير محدد '; 
           $finance_deport_publisher_class = 'danger';  
        } ?>
         <span class="label label-<?php echo $finance_deport_publisher_class; ?>"><?php echo $finance_deport_publisher_name; ?></span>
        
        </td>
         <td> <?php 
         if(isset($datum->finance_deport_date_ar) and $datum->finance_deport_date_ar != null){
           $finance_deport_date_ar = $datum->finance_deport_date_ar;
             $finance_deport_date_ar_class = 'success';   
        }else{
           $finance_deport_date_ar =   'غير محدد '; 
           $finance_deport_date_ar_class = 'danger';    
        }    
       ?>
       <span class="label label-<?php echo $finance_deport_date_ar_class; ?>"><?php echo $finance_deport_date_ar; ?></span>
        
       
       </td>
        <td> <?php 
        if(isset($datum->qued_rkm_fk) and $datum->qued_rkm_fk != null){
          // $qued_rkm_fk =   $datum->qued_rkm_fk;
           $qued_rkm_fk =   'تم التنفيذ';  
           $qued_class = 'success';
        }else{
           $qued_rkm_fk =   'قيد التنفيذ ';  
           $qued_class = 'warning'; 
        }
         ?>
         <span style="color: black !important;" class="label label-<?php echo $qued_class; ?>"><?php echo $qued_rkm_fk; ?></span>

         
         </td>
        
        
        

                        </tr>
                        <?php $x++;
                    } ?>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
<?php }
?>

<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> المتبرعين </h4>
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

<div class="modal fade" id="myModalInfo_asnafe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 85%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> التفاصيل </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="details_body">


            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <!--                print_pop -->
                <input type="hidden" id="ezn_id_pop_h" value="">

                <button onclick="print_rescrv(document.getElementById('ezn_id_pop_h').value)"
                        type="button"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> الأصناف </h4>
            </div>
            <div class="modal-body">
                <div id="myDiv_sanfe"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal_attach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">
           
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
            </div>
            

            <div class="modal-body">
            
         
           
            <?php echo form_open_multipart(base_url() . 'st/ezn_edafa/Ezn_edafa/add_attach') ?>
        <input type="hidden" name="set"  id="set"  value=''/>
<button type="button" onclick="add_row()" class="btn btn-success btn-next"/>
                <i class="fa fa-plus"></i> إضافة </button><br><br>
                <div class="AttachTable">
                    <table class="table table-striped table-bordered fixed-table mytable "
                      >
                        <thead>
                        <tr class="info">

                            <th class="text-center"> إسم المرفق</th>
                            <th class="text-center">المرفق</th>
                            <th class="text-center"> الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class="attachTable">
                        <tr id="row_1">
                        <td><input type="input" name="title[]" id="title"  class="form-control" data-validation="reuqired"></td>
<td><input type="file" name="file[]"
           class="form-control testButton inputclass"
           id="file" value=""

    /></td>


<td><a id="1" onclick=" $(this).closest('tr').remove();"><i
                class="fa fa-trash"></i></a></td>
</tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <!--<input type="hidden" name="id" id="id" >-->
                <button type="submit" class="btn btn-success" style="display: inline-block;padding: 6px 12px;"
                        onclick="GetAttachTable()"
                        name="add_attach" id="saves" data-dismiss="modal">حفظ
                </button>
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </form>
                
                
            </div>
            
        </div>
    </div>
</div>

<!-- attach Modal-->


<!--Search Modal -->


<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">بحث</h4>
            </div>
            <div class="modal-body" id="div_search">

                <div class="col-md-12">

                    <div class="col-md-1">
                        <h6 class="label_title_2 label-blue ">بحث ب </h6>
                    </div>
                    <div class="col-md-3  no-padding">
                        <?php
                        $array_search = array(
                            'ezn_rkm' => ' رقم الإذن ',
                            'type_ezn' => ' نوع الإذن ',
                            'ezn_date_ar' => ' تاريخ الإذن ',
                            'storage_fk' => '  المستودع ',
                            'person_name' => ' الاسم ',
                            'person_jwal' => ' رقم الجوال ',
                            'pay_method' => ' طريقة الشراء ',
                            'no3_tabro3' => '  نوع التبرع ',
                            'geha_name' => '  اسم الجهة ',
                            'mostand_rkm' => ' رقم المستند '
                        );
                        ?>

                        <select id="array_search_id" class="form-control   "
                                aria-required="true" onchange="check_val($(this).val())">
                            <option value="">إختر</option>

                            <?php foreach ($array_search as $key => $row_search) { ?>
                                <option value="<?= $key ?>"><?= $row_search ?> </option>
                            <?php } ?>
                        </select>


                    </div>


                    <div class="col-md-3  no-padding input_search_id" style="display:none; margin-left: 0;">


                        <input id="input_search_id" name="name" value="" class="form-control   "
                               aria-required="true">


                    </div>

                    <div class="col-md-4  no-padding input_search_id3" style="display:none; margin-left: 0;">

                        <select id="select_search_id1" class="form-control   "
                                aria-required="true">
                            <option value=""> اختر</option>
                        </select>

                    </div>


                    <div class="col-md-3  padding-4 input_search_id4" style="display:none; margin-left: 0;">

                        <select id="select_search_id2" class="form-control   "
                                aria-required="true">
                            <option value=""> اختر</option>
                            <?php
                            $process = array(1 => 'نقدي', 2 => 'آجل');

                            foreach ($process as $key => $value) {
                                ?>
                                <option value="<?= $key; ?>"

                                ><?= $value; ?></option>

                            <?php } ?>
                        </select>

                    </div>

                    <div class="col-md-3  padding-4 input_search_id5" style="display:none; margin-left: 0;">

                        <select id="select_search_id5" class="form-control   "
                                aria-required="true">
                            <option value=""> اختر</option>
                            <?php
                            $type = array(1 => 'تبرعات عينيه', 2 => 'مشتريات عينيه');

                            foreach ($type as $key => $value) {
                                ?>
                                <option value="<?= $key; ?>"

                                ><?= $value; ?></option>

                            <?php } ?>
                        </select>

                    </div>
                    <button type="button" onclick="searchResults()" class="btn btn-success btn-next"/>
                    <i class="fa fa-search-plus"></i> بحث </button><br><br>

                </div>


                <table id="table" class="table example table-striped table-bordered" style="display: none;">

                    <thead>
                    <tr class="info myTable">
                        <th class="text-center myclass"> #</th>

                        <th>رقم الإذن</th>
                        <th>نوع الإذن</th>
                        <th>تاريخ الإذن</th>
                        <th>المستودع</th>
                        <th>الاسم</th>
                        <th> الجوال</th>

                    </tr>
                    </thead>
                    <tbody class="result_search_modal">

                    </tbody>
                </table>


            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">

                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>

            </div>
        </div>
    </div>
</div>


<script>

    function GetDiv(div) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> الإسم </th><th style="width: 170px;" >الهوية </th><th style="width: 170px;" >الجوال</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members').show();
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>st/ezn_edafa/Ezn_edafa/getConnection',

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
    function GetDiv_sanfe(div, row_id) {
        var storage_fk = $('#storage_fk').val();

        // var store_id = $('#storage_fk').val();
        //alert(store_id);

        if (storage_fk === '') {
            swal({
                title: "من فضلك اختر المستودع اولا ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false
            });

        } else {
            $('#myModal').modal('show');
            console.log('storage_fk :' + storage_fk);
            html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> كود الصنف </th><th style="width: 170px;" >أسم الصنف  </th><th style="width: 170px;" >الوحدة</th>' +
                '</tr></thead><table><div id="dataMember"></div></div>';
            $("#" + div).html(html);
            $('#js_table_members2').show();
            var oTable_usergroup = $('#js_table_members2').DataTable({
                dom: 'Bfrtip',
                "ajax": '<?php echo base_url(); ?>st/ezn_edafa/Ezn_edafa/getConnection2/' + row_id + '/' + storage_fk,

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
    }
</script>
<script>

    function GetMemberName(obj) {

        console.log(' obj :' + obj.dataset.name);
        var name = obj.dataset.name;
        var mob = obj.dataset.mob;
        var id = obj.dataset.id;
        document.getElementById('motbr3_name').value = name;
        document.getElementById('motbr3_jwal').value = mob;
        document.getElementById('motbr3_id_fk').value = id;

        $("#myModalInfo .close").click();

    }

    function Get_sanfe_Name(obj, id) {

        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var code = obj.dataset.code;
        var code_br = obj.dataset.code_br;
        var whda = obj.dataset.whda;
        var price = obj.dataset.price;
        var slahia = obj.dataset.slahia;
        var sanf_rased = parseFloat(obj.dataset.all_rased);
        if (parseInt(slahia) == 1) {
            document.getElementById('sanf_salahia_date' + id).type = 'date';
            document.getElementById('sanf_salahia_date' + id).value = '<?=date('Y-m-d')?>';
        } else {
            document.getElementById('sanf_salahia_date' + id).type = 'text';
            $('#sanf_salahia_date' + id).attr('readonly', 'readonly');
            $('#sanf_salahia_date' + id).val('');

        }
        document.getElementById('sanf_name' + id).value = name;
        document.getElementById('sanf_code' + id).value = code;
        // document.getElementById('sanf_coade_br' + id).value = code_br;
        document.getElementById('sanf_whda' + id).value = whda;
        document.getElementById('sanf_one_price' + id).value = price;
        document.getElementById('sanf_rased' + id).value = sanf_rased;

        $("#myModal .close").click();

    }

    function add_row_sanfe() {
        var table = document.getElementById('asnafe_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;

        var row = ' <tr id="row_1" >\n' +
            '                        <td>' + (len + 1) + '</td>\n' +
            '                        <td> <input type="text" class="form-control testButton " name="sanf_code[]" id="sanf_code' + (len + 1) + '" value=""  ondblclick=" GetDiv_sanfe(\'myDiv_sanfe\',' + (len + 1) + ')" readonly/></td>\n' +
            //'                        <td> <input type="text" class="form-control testButton " name="sanf_coade_br[]" id="sanf_coade_br' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton " name="sanf_name[]" id="sanf_name' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton " name="sanf_whda[]" id="sanf_whda' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton " name="sanf_rased[]" id="sanf_rased' + (len + 1) + '" value="" readonly /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton " name="sanf_amount[]" onkeyup="get_diff_money()" oninput="get_total(this,' + (len + 1) + ')" id="sanf_amount' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton " name="sanf_one_price[]" id="sanf_one_price' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton " name="all_egmali[]" id="all_egmali' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text" class="form-control testButton " name="sanf_salahia_date[]" id="sanf_salahia_date' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" class="form-control testButton " name="lot[]" id="lot' + (len + 1) + '" value="" /></td>\n' +
            '                        <td> <input type="text" readonly class="form-control testButton " name="rased_hali[]" id="rased_hali' + (len + 1) + '" value="" /></td>\n' +
            '\n' +
            '                        <td><a id="1" onclick=" $(this).closest(\'tr\').remove(); set_sum();"><i class="fa fa-trash"></i></a></td>\n' +
            '                    </tr>';

        var new_row = table.insertRow(table.rows.length);
        new_row.innerHTML = row;
        new_row.id = 'row_' + (table.rows.length);

        get_diff_money();
    }

    function get_details_sanf(id) {
        document.getElementById('ezn_id_pop_h').value = id;
        var request = $.ajax({
            url: "<?=base_url() . 'st/ezn_edafa/Ezn_edafa/get_detailes'?>",
            type: "POST",
            data: {id: id}
        });
        request.done(function (msg) {
            //   alert(msg);

            $('#details_body').html(msg);

        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }

    function delete_table() {
        var table = document.getElementById('orders_details_body');
        var len = table.rows.length;
        console.log('lenthg  table : ' + len);
        $("#orders_details_body").find("tr").remove();


    }
</script>

<script>

    function GEtF2a(value, type) {
        if (value != 0 && value > 0 && value != 0) {

            var dataString = 'id=' + value + '&type=' + type;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/ezn_edafa/Ezn_edafa/GetData',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    //   console.log(JSONObject);
                    if (type === 'fe2a') {
                        //  if(JSONObject.length > 1) {
                        var html = '<option value="">إختر </option>';
                        //}
                        for (i = 0; i < JSONObject.length; i++) {
                            html += '<option value="' + JSONObject[i].id + '" data-from_id="' + JSONObject[i].from_id + '"> ' + JSONObject[i].title + '</option>';
                        }
                        $("#fe2a").html(html);

                    } else if (type === 'band') {
                        if (JSONObject.length > 1) {
                            var html = '<option value="">إختر </option>';
                        }
                        for (i = 0; i < JSONObject.length; i++) {
                            html += '<option value="' + JSONObject[i].id + '" data-from_id="' + JSONObject[i].from_id + '"> ' + JSONObject[i].title + '</option>';
                        }
                        $("#band").html(html);

                    }
                }
            });
        }

    }

    function get_total(amount, id) {
        console.log('amount :' + amount.value + " all_egmali: " + parseFloat($('#sanf_one_price' + id).val()));
        var sanf_rased = (parseInt($('#sanf_rased' + id).val()));
        //  if (amount.value <= sanf_rased) {
        $('#all_egmali' + id).val((amount.value * parseFloat($('#sanf_one_price' + id).val())));
        $('#rased_hali' + id).val(parseFloat(sanf_rased) + parseFloat(amount.value));
        set_sum();
        //   }else {
        //        amount.value=0;
        //        $('#all_egmali' + id).val(0);
        //        $('#rased_hali' + id).val(0);
        //        set_sum();

        //  }
        get_diff_money();
    }

    function set_sum() {
        var all_egmali = document.getElementsByName('all_egmali[]');
        var sum = 0;
        for (var i = 0; i < all_egmali.length; i++) {
            sum = sum + parseFloat(all_egmali[i].value);
        }
        console.log('sum :' + sum);

        $('#total').text(sum);
    }

    function print_rescrv(id) {
        var request = $.ajax({
            url: "<?=base_url() . 'st/ezn_edafa/Ezn_edafa/print_pop/'?>",
            type: "POST",
            data: {id: id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();

        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>

<script>
    function get_form(valu) {
        if (valu == 2) {
            $('#tabro3').fadeIn(2000);
            $('#moshtrat').fadeOut(2000);
        } else {
            $('#tabro3').fadeOut(2000);
            $('#moshtrat').fadeIn(2000);

        }
    }
</script>


<script>
    function getCode(id) {
        var type = $("input[name='type_ezn']:checked").val();
        var dataString = 'id=' + id;

        if (type == 2) {

            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/ezn_edafa/Ezn_edafa/get_code',
                data: dataString,
                dataType: 'html',

                cache: false,
                success: function (html) {
                    //   alert(html);
                    if (html == 0) {
                        swal({
                            title: "من فضلك راجع بيانات المستودع",
                            type: "warning",
                            confirmButtonClass: "btn-warning",
                            closeOnConfirm: false
                        });
                    } else {
                        arr = JSON.parse(html);
                        $('#rkm_ezn_edafa').val(arr.rkm_hesab_moshtriat);
                        $('#ezn_edafa_name').val(arr.hesab_moshtriat_name);
                    }


                }
            });
        } else {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/ezn_edafa/Ezn_edafa/get_code',
                data: dataString,
                dataType: 'html',

                cache: false,
                success: function (html) {
                    //   alert(html);

                    if (html == 0) {
                        swal({
                            title: "من فضلك راجع بيانات المستودع",
                            type: "warning",
                            confirmButtonClass: "btn-warning",
                            closeOnConfirm: false
                        });
                    } else {
                        arr = JSON.parse(html);
                        $('#rkm_ezn_edafa').val(arr.rkm_hesab);
                        $('#ezn_edafa_name').val(arr.hesab_name);

                    }

                }
            });

        }

    }
</script>

<script>
    function get_supplier(name2, jwal, id) {

        $('#name').val(name2);
        $('#jwal').val(jwal);
        $('#supplier_fk').val(id);
        $('#myModal2').modal('hide');

    }


</script>
<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>st/ezn_edafa/Ezn_edafa/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#details_result').html(d);

            }

        });

    }
</script>

<script>
    function print_moshtriat(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'st/ezn_edafa/Ezn_edafa/Print_moshtriat'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>
<script>
   /* function checkInputs() {

        var inputsNotEmprty = [];
        $(".").each(function () {
            if ($(this).val() != '') {
                inputsNotEmprty.push($(this).val());
            }
        });

        $("#attach_button").attr('data-target', '#myModal_attach');


    }*/
      function checkInputs() {

        var inputsNotEmprty = [];
        $(".").each(function () {
            if ($(this).val() != '') {
                inputsNotEmprty.push($(this).val());
            }
        });

        $("#attach_button").attr('data-target', '#myModal_attach');


    }
</script>


<script>
/*
    function GetAttachTable() {
        $('#AttachTableDiv').html('');
        $(".AttachTable").clone().appendTo('#AttachTableDiv');
        $("#myModal_attach .close").click();
    }*/
    
     function GetAttachTable() {
        $('#AttachTableDiv').html('');
        $(".AttachTable").clone().appendTo('#AttachTableDiv');
        $("#myModal_attach .close").click();
    }
</script>
<script>
   /* function add_row() {
        $(".mytable").show();
        //var x = document.getElementById('resultTable');
        var len = $(".attachTable").length + 1;
        // alert(len);

        $(".attachTable").append('<tr class="' + len + '">'

            + '</td><td><input type="input" name="title[]" id="title"  class="form-control" data-validation="reuqired"></td><td><input type="file" name="file[]" id="file"  class="form-control " data-validation="reuqired"></td><td><a href="#"  onclick="DeleteRowImg(' + len + ')"> <i class="fa fa-trash" ></i> </a></td></tr>');
    }*/
    function add_row() {
        $(".mytable").show();
        //var x = document.getElementById('resultTable');
        var len = $(".attachTable").length + 1;
        // alert(len);

        $(".attachTable").append('<tr class="' + len + '">'

            + '</td><td><input type="input" name="title[]" id="title"  class="form-control" data-validation="reuqired"></td><td><input type="file" name="file[]" id="file"  class="form-control " data-validation="reuqired"></td><td><a href="#"  onclick="DeleteRowImg(' + len + ')"> <i class="fa fa-trash" ></i> </a></td></tr>');
    }

/*
    function DeleteRowImg(valu) {
        $('.' + valu).remove();
        // var x = document.getElementById('resultTable');
        var len = $(".attachTable").length;
        if (len == 0) {
            $(".mytable").hide();
        }
    }*/

  function DeleteRowImg(valu) {
        $('.' + valu).remove();
        // var x = document.getElementById('resultTable');
        var len = $(".attachTable").length;
        if (len == 0) {
            $(".mytable").hide();
        }
    }
</script>
<script>
    function get_diff_money() {
        var all_value = $('#all_value').val();

        var total = $('#total').text();
        var all_value = parseInt(all_value);
        var total = parseInt(total);
        if (total > all_value) {
            alert("انتبه ! ... الاجمالي اكبر من المبلغ المدفوع");
            $('#myBtn').hide();
        } else {
            $('#myBtn').show();
        }


    }
</script>


<!--------------------------------------------------------------->

<script>

    function check_val(valu) {

        $("th").remove(".myRow");
        $('.result_search_modal').html('   <tr >\n' +
            '                        <th colspan="6" class="myalert"><div style="color: red;"> لا توجد نتائج للبحث !!</div></th>\n' +
            '\n' +
            '                    </tr>');
        if (valu === 'ezn_rkm' || valu === 'person_name' || valu === 'person_jwal' || valu === 'geha_name' || valu === 'geha_name') {
            $('.input_search_id').show();
            $('#input_search_id').attr('type', 'text');
            $('#input_search_id').val('');
            $('.input_search_id4').hide();
            $('.input_search_id5').hide();
            $('.input_search_id3').hide();

        } else if (valu === 'ezn_date_ar') {
            $('.input_search_id').show();
            $('#input_search_id').attr('type', 'date');
            $('#input_search_id').val('');
            $('.input_search_id4').hide();
            $('.input_search_id5').hide();
            $('.input_search_id3').hide();

        } else if (valu == 'no3_tabro3') {
            $('#select_search_id1').length = 0;
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>st/ezn_edafa/Ezn_edafa/get_tabr3",

                success: function (d) {
                    jeson_data = JSON.parse(d);
                    $('#select_search_id1').html('');
                    $('#select_search_id1').append('<option value="">اختر </option>');

                    for (var i = 0; i < jeson_data.length; i++) {

                        $('#select_search_id1').append('<option value="' + jeson_data[i].code + '"> ' + jeson_data[i].title + ' </option>');
                    }
                }

            });

            $('.input_search_id3').show();
            $('.input_search_id2').hide();
            $('.input_search_id').hide();
            $('.input_search_id4').hide();
            $('.input_search_id5').hide();


        } else if (valu == 'storage_fk') {

            $('#select_search_id1').length = 0;
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>st/ezn_edafa/Ezn_edafa/get_storage",

                success: function (d) {
                    // alert(d);
                    //return;
                    jeson_data = JSON.parse(d);
                    $('#select_search_id1').html('');
                    $('#select_search_id1').append('<option value="">اختر </option>');

                    for (var i = 0; i < jeson_data.length; i++) {

                        $('#select_search_id1').append('<option value="' + jeson_data[i].id_setting + '"> ' + jeson_data[i].title_setting + ' </option>');
                    }
                }

            });

            $('.input_search_id3').show();
            $('.input_search_id2').hide();
            $('.input_search_id').hide();
            $('.input_search_id4').hide();
            $('.input_search_id5').hide();
        } else if (valu == 'pay_method') {
            //  $('#select_search_id1').length=0;

            $('.input_search_id4').show();
            $('.input_search_id2').hide();
            $('.input_search_id').hide();
            $('.input_search_id3').hide();


        } else if (valu == 'type_ezn') {
            $('.input_search_id5').show();
            $('.input_search_id4').hide();
            $('.input_search_id2').hide();
            $('.input_search_id').hide();
            $('.input_search_id3').hide();

        }


    }
</script>

<script>

    function searchResults() {
        $('.example').show();
        var select_search_id1 = $('#select_search_id1').val();
        var select_search_id2 = $('#select_search_id2').val();
        var select_search_id5 = $('#select_search_id5').val();
        var array_search_id = $('#array_search_id').val();
        var input_search_id = $('#input_search_id').val();
        //input_search_id  select_search_id
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>st/ezn_edafa/Ezn_edafa/get_search_result",
            data: {
                select_search_id1: select_search_id1,
                select_search_id2: select_search_id2,
                select_search_id5: select_search_id5,
                array_search_id: array_search_id,
                input_search_id: input_search_id
            },

            success: function (d) {
                //  alert(d);
                //     return;

                $('.result_search_modal').html(d);

            }

        });
    }
</script>


<script>
    function change_status(id, element) {
        $('#' + id).remove();


        $.ajax({
            url: "<?php echo base_url();?>st/ezn_edafa/Ezn_edafa/change_status",
            type: 'POST',
            data: {select5: id},
            dataType: 'JSON',
            success: function (data) {
                console.log('data :' + data);
                // $(id).closest('#select5').remove();
                // $('#'+id).remove();



            }
        });
    }
</script>

<!----------------------    28-5-om  ----------------------------------------->
<script>


    function GetValues() {

        var click_state = parseInt($('#myId').attr('data-click-state'));
        console.log(' click_state : ' + click_state);

        if ($('#myId').attr('data-click-state') < 4) {
            click_state += 1;
            $('#myId').attr('data-click-state', click_state);
            console.log('new  click_state : ' + click_state);

            var no3_tabro3 = $('option:selected', $('#no3_tabro3')).data('from_id');
            var fe2a = $('option:selected', $('#fe2a')).data('from_id');
            var band = $('option:selected', $('#band')).data('from_id');

            var dataString = 'erad_tbro3=' + no3_tabro3 + '&fe2a=' + fe2a + '&band=' + band;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>st/ezn_edafa/Ezn_edafa/GetData2',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    var html = '<option>إختر </option>';
                    for (i = 0; i < JSONObject.fe2a_type2_arr.length; i++) {
                        html += '<option value="' + JSONObject.fe2a_type2_arr[i].id + '" data-from_id="' + JSONObject.fe2a_type2_arr[i].from_id + '">' + JSONObject.fe2a_type2_arr[i].title + '</option>';
                    }
                    $("#fe2a_type" + click_state).html(html);
                }
            });

            $("#first_value").html('<input style="font-weight: 600 !important;" type="text" step="any" data-validation="required" ' +
                'name="value[]" class="form-control  value band1_value"  ' +
                'onkeyup="CheckValue(this);  $(\'#value1\').html($(this).val());" >');

            $("#ValuesDiv" + click_state).append(' <div class="form-group col-md-3 col-sm-6 padding-4">' +
                //  ' <label class="label"> الفئة </label>' +
                '<select  data-validation="required" onchange="GetBandType2($(\'option:selected\', this).data(\'from_id\'),' + click_state + ');" class="form-control  "' +
                ' id="fe2a_type' + click_state + '" name="fe2a_type[]"  aria-required="true">' +
                '<option value="">إختر  </option></select></div></div>');

            $("#ValuesDiv" + click_state).append('<div class="form-group col-md-3 col-sm-6 padding-4">' +
                //'<label class="label"> البند </label>' +
                '<select  data-validation="required" class="form-control "  ' +
                '  id="bnd_type' + click_state + '" name="bnd_type[]"  aria-required="true">' +
                '<option value="0">إختر  </option></select></div></div>');

            $("#ValuesDiv" + click_state).append('<div  class=" form-group col-md-1  padding-4" >' +
                '<input style="font-weight: 600 !important;" data-validation="required" type="text" step="any"' +
                ' name="value[]" class="form-control  value band_value' + click_state + '" ' +
                ' onkeyup="CheckValue(this);  $(\'#value2\').html($(this).val());" ></div>');


            $('#secondFe2aType').show();
            $('.about_td').attr('rowspan', '2');
            $('#value1').show();
        }


    }

    function minus_div() {
        var click_state = parseInt($('#myId_munis').attr('data-click-state'));
        console.log(' munis click_state : ' + click_state);
        if (click_state >= 2) {
            $('#secondFe2aType').hide();
            $('.about_td').attr('rowspan', '0');
            $('#value1').hide();
            $('#first_value' + click_state).html('');
            $('#ValuesDiv' + click_state).html('');
            click_state -= 1;
            $('#myId_munis').attr('data-click-state', click_state);
            $('#myId').attr('data-click-state', click_state);
        }
    }

    function GetBandType2(value, row_id) {

        var bands = [];
        $('select[name^=bnd_type]').each(function () {
            bands.push($(this).data('from_id'));
        });
        console.log(' bands : ' + bands[0]);
        bands = JSON.stringify(bands);
        var dataString = 'id=' + value + '&FirstBandValue=' + bands;

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>st/ezn_edafa/Ezn_edafa/GetBandType2',
            data: dataString,
            cache: false,
            success: function (json_data) {
                var JSONObject = JSON.parse(json_data);
                if (JSONObject.length > 1) {
                    var html = '<option>إختر </option>';
                }
                for (i = 0; i < JSONObject.length; i++) {
                    html += '<option value="' + JSONObject[i].id + '" data-from_id="' + JSONObject[i].from_id + '"> ' + JSONObject[i].title + '</option>';
                }
                $("#bnd_type" + row_id).html(html);
            }
        });


    }
</script>
<script>
    function print_ezn_edafa(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'st/ezn_edafa/Ezn_edafa/print_ezn_edafa'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
            WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }


</script>