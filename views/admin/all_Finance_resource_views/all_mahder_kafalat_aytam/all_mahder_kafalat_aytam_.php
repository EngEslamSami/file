
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
            <?php  foreach ($table as $firstRow){?>
                <tr>
                    <td colspan="7" style="text-align: center; color: red"><?php echo $firstRow->mehwar_title;?></td>
                </tr>
                <?php if(!empty($firstRow->mehwer_details)){
                    foreach ($firstRow->mehwer_details as $SecondRow){?>
            <tr>
                <td><?php echo$SecondRow->file_num;?></td>
                <td><?php echo$SecondRow->family_data->father_name;?></td>
                <td><?php echo$SecondRow->family_data->father_national_num;?></td>
                <td><?php echo$SecondRow->family_data->process_title;?></td>
                <td><?php echo$SecondRow->family_data->mostafed_number;?></td>
                <td><?php echo$SecondRow->lagna_reason_title;?></td>
                <td>
                    <a type="button" onclick="GetMembers(<?php echo$SecondRow->family_data->mother_national_num;?>,<?php echo $firstRow->mehwar_id_fk;?>)" class="btn btn-sm btn-primary" style="padding: 1px 6px;" title="التفاصيل"
                       data-toggle="modal" data-target="#membersModal"><span class="fa fa-list"></span> </a>
                   </td>
            </tr>
                <?php } } ?>
            <?php  } ?>
            </tbody>
        </table>
        <?php } ?>
    </div>
</div>




<div class="modal fade modal-success" id="membersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body" id="membersDiv">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

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

