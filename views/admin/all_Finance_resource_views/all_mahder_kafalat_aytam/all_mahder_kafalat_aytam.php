
<style type="text/css">
    .btn-group > .btn, .btn-group > .btn + .btn, .btn-group > .btn:first-child, .fc .fc-button-group > * {
        height: 34px !important;
        border-radius: 4px !important;
        margin: 0 !important;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: 92% !important;
    }

    .btn-label {
        left: 12px;
    }



    .list::-webkit-calendar-picker-indicator {
        display: none;
    }

    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }

    input[type=date]::-webkit-clear-button {
        display: none;
        -webkit-appearance: none;
    }


    .fa-plus.sspan {
        background-color: #5b69bc;
        padding: 3px 6px;
        color: #fff;
        border-radius: 5px;
    }



    td .fa-trash {
        border-radius: 7px !important;
    }

    .fa-plus.sspan {

        border-radius: 7px !important;
        font-size: 15px !important;
    }






    .radio label, .checkbox label {

        font-size: 17px !important;
        font-weight: bold !important;

    }



    .bootstrap-select > .btn {
        width: 100%;
        padding-right: 5px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important;
        left: 4px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }



    .btn-group .dropdown-menu > li > a {
        color: #0f0f0f;
        font-weight: 600;
        padding: 5px 5px;
    }

    .btn-group .dropdown-menu {
        left: 0;
        right: auto;
    }




    td input[type=radio] {
        height: 20px;
        width: 20px;
    }



</style>

<div class="col-sm-12 no-padding " >

<!-- panel panel-bd lobidisable lobipanel lobipanel-sortable -->
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;  ?></h3>
        </div>
    </div>
    <div class="panel-body" >
        <?php if(!empty($table)){ ?>

            <?php  foreach ($table as $firstRow){?>


                <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title"><?php echo $firstRow->mehwar_title;?></h5>
                        </div>
                        <div class="panel-body">
                            <?php if(!empty($firstRow->mehwer_details)){?>


                            <table   class="table table-bordered table-hover table-responsive table-striped" style="table-layout: fixed">
                                <thead>
                                <tr class="info">
                                    <th style="width: 80px;">رقم الملف</th>
                                    <th style="width: 300px;">إسم رب الأسرة</th>
                                    <th style="width: 105px;">رقم الهوية</th>
                                    <th style="width: 100px">حالة الملف</th>
                                    <th style="width: 100px">عدد المستفيدين</th>
                                    <th style="width: 20%;">سبب الإجراء</th>
                                    <th style="width: 10%;">الإجراء المتخذ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach ($firstRow->mehwer_details as $SecondRow){?>
                                    <tr>
                                        <td><?php echo$SecondRow->file_num;?></td>
                                        <td><?php echo$SecondRow->family_data->father_name;?></td>
                                        <td><?php echo$SecondRow->family_data->father_national_num;?></td>
                                        <td><?php echo$SecondRow->family_data->process_title;?></td>
                                        <td><?php echo$SecondRow->family_data->mostafed_number;?></td>
                                        <td><?php echo$SecondRow->lagna_reason_title;?></td>
                                        <td>
                                            <a type="button" onclick="GetMembers(<?php echo$SecondRow->family_data->mother_national_num;?>,<?php echo $firstRow->mehwar_id_fk;?>); GetTitle('<?php echo $firstRow->mehwar_title;?>');"
                                               class="btn btn-sm btn-primary" style="padding: 1px 6px;" title="التفاصيل"
                                               data-toggle="modal" data-target="#membersModal"><span class="fa fa-list"></span> </a>
                                        </td>
                                    </tr>
                                <?php } } ?>

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>


        <?php  } } ?>
    </div>
</div>




<div class="modal fade modal-success" id="membersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title " id="modalName">التفاصيل</h4>
            </div>
            <div class="modal-body" id="membersDiv">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade in" id="modal-rabt_kafel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="FileConidtion">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><div style="color:red;">الإجراء </div></h5>
                <button type="button" style="position: relative;
    top: -22px;" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body row">
                <div class=" col-xs-12 text-center top_radio">

                    <div class="col-sm-6">
                        <div class="radio">
                            <label>
                                <input type="radio" name="check" class="check" value="1" onclick="CloseFunction(' تم الربط بكافل')">
                                الربط بكافل <br>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="radio">
                            <label>
                                <input type="radio" name="check" class="check" value="2" onclick="CloseFunction('عدم الربط فلا الوقت الحالي')">
                                عدم الربط فلا الوقت الحالي<br>
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="idValue" value="">
                    <input type="hidden" name="type" id="typeValue" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document" style="width: 95%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">إضافة بيانات كفالة</h5>
            </div>
            <form id="kafalaForm">
            <div class="modal-body">
                <div  id="edit_div"></div>

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button  type="button"   onclick="saveForma()" id="save" name="add" value="add" class="btn btn-success edit_modal_but">حفظ</button>
                <button type="button" style="" class="btn btn-danger " data-dismiss="modal">إغلاق</button>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل الكافل</h4>
            </div>
            <div class="modal-body">
                <div  id="myDiv"></div>
            </div>
            <div class="modal-footer"  style="display: inline-block;width: 100%" >
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">صورة الأمر المستديم</h4>
            </div>
            <div class="modal-body">
                <img  id="my_image" src="" width="50%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>
    
    function GetMembers(FileNum,MehwerType) {

        if(FileNum !=''){
            var dataString ='motherNum='+ FileNum +'&&mehwerType='+ MehwerType;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/all_mahder_kafalat_aytam/All_mahder_kafalat_aytam/GetMembers',
                data:dataString,
                dataType: 'html',
                cache:false,
                beforeSend: function() {
                    $("#membersDiv").html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
                },
                success: function(html){
                    $("#membersDiv").html(html);
                }
            });

        }
    }
    
</script>

<script>
    function GetTitle(value) {
      $('#modalName').html(value);

    }
</script>


<script>
    function CloseFunction(value) {
        var  idValue =$('#idValue').val();
        var  type =$('#typeValue').val();
        var status = $('input[name=check]:checked').val();
        //alert(idValue);
        var dataString='id='+ idValue + '&type=' + type + '&status=' + status;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_Finance_resource/all_mahder_kafalat_aytam/All_mahder_kafalat_aytam/get_kafel_rabt',
            data:dataString,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
                console.log(JSONObject);
                $('#button_'+idValue).text(value);
                $("#modal-rabt_kafel .close").click();
            }
        });

    }

</script>


<script>
    table= $('.js_all_kafels').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
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


</script>

<script>
    function GetDiv(valu) {
        //alert(valu);

        var checkVal = $('input[name=kafala_type_fk]:checked').val();
 //alert(checkVal);
        if(checkVal !='' && checkVal >0){
           $('#myModalInfo').modal();
        var div='myDiv';
        var html;
        html ='<div class="col-md-12 no-padding"><table id="table1" class="table table-striped table-bordered dt-responsive nowrap js_all_kafels" >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> كود الكافل </th><th style="width: 50px;"> الإسم </th><th style="width: 120px;" >الجوال</th><th style="width: 120px;" >البريد</th><th style="width: 30px;" >يتيم</th><th style="width: 30px;" >أرمل</th><th style="width: 30px;" >مستفيد</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        var Columns    = {aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }

            ]};

        $("#" + div).html(html);
        $('#person_type').val(valu);
        $('.js_all_kafels').show();
        var F2aType = valu;
        var oTable_usergroup = $('.js_all_kafels').DataTable({
            'ordering':false,
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>all_Finance_resource/all_mahder_kafalat_aytam/All_mahder_kafalat_aytam/getConnection/' + F2aType,

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
        }else {
            alert('رجاء إختار نوع الكفالة !!');
            return false;
        }

    }

</script>


<script>

    function getKafelData(kafel) {
        var person_id_fk = $('#mostafed_id').val();
        var name =kafel.attr('data-name');
        var idValue =kafel.attr('data-id');
        $('#kafel_name').val(name);
        $('#kafel_id').val(idValue);

        var checkVal = $('input[name=kafala_type_fk]:checked').val();


        var dataString ='kafel_id_fk='+ idValue +'&kafala_type_fk=' + checkVal + '&person_id_fk=' + person_id_fk;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_Finance_resource/all_mahder_kafalat_aytam/All_mahder_kafalat_aytam/getFormData',
            data:dataString,
            dataType: 'html',
            cache:false,
            beforeSend: function() {
                $("#FormData").html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function(html){
                $("#FormData").html(html);
            }
        });

        $("#myModalInfo .close").click();
 //alert(name);
    }

</script>




<script>


    function saveForma() {
        var dataString = $('#kafalaForm').serialize();
       // var dataString =  'ahmed=22';
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_Finance_resource/all_mahder_kafalat_aytam/All_mahder_kafalat_aytam/insertKfala',
            data:dataString,

            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
                console.log(JSONObject);
                $("#myModal_edit .close").click();
            }
        });
    }

</script>
