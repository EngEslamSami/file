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

<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($result) && !empty($result)) {
                $geha_name = $result->geha_name;
                $subscriber_name = $result->subscriber_name;
                $subscription_number = $result->subscription_number;
                $mrakz_tklfa_id_fk = $result->mrakz_tklfa_id_fk;
                $rkm_hesab = $result->rkm_hesab;
                $hesab_name = $result->hesab_name;
                $alert_time = $result->alert_time;
                $subscription_type = $result->subscription_type;
                $button1 = 'display:none';
                $button2 = '';
                $form_action = 'finance_accounting/add_fatora/Add_fatora/update/'.$result->id;
            } else {
                $geha_name = '';
                $subscriber_name = '';
                $subscription_number = '';
                $mrakz_tklfa_id_fk = '';
                $rkm_hesab = '';
                $hesab_name = '';
                $alert_time = '';
                $subscription_type = '';
                $button2 = 'display:none';
                $button1 = '';
                $form_action = 'finance_accounting/add_fatora/Add_fatora/insert';
            }
            ?>

            <div class="col-sm-12 form-group">
                       <?php if(!empty($records)){ ?>
                           <?php
                           echo form_open_multipart('finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/convert_fatora', array('id' => 'myForms'));

                           ?>

                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
                        <th width="2%">#</th>
                        <th class="text-left">إسم الجهة</th>
                        <th class="text-left">إسم المشترك</th>
                        <th class="text-left">رقم المشترك/رقم الحساب</th>
                        <th class="text-left"> مركز التكلفة</th>
                        <th class="text-left">رقم الحساب</th>
                        <th class="text-left">إسم الحساب</th>
                        <th class="text-left">تاريخ الفاتورة</th>
                        <th class="text-left">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($records as $value) {

                        ?>
                        <tr>
                            <td><input type="checkbox" class="checkInput" name="checkInput[]" data-id="<?php echo $value->id ?>" value="<?php echo $value->id ?>" id="selected"></td>
                            <td><?php echo $value->geha_name ?></td>
                            <td><?php echo $value->moshtrk_name ?></td>
                            <td><?php echo $value->moshtrk_num ?></td>
                            <td><?php echo $value->mrakz_tklfa_title ?></td>
                            <td><?php echo $value->rkm_hesab ?></td>
                            <td><?php echo $value->hesab_name ?></td>
                            <td><?php echo $value->date_ar ?></td>

                            <td>
                              <button type="button"  data-toggle="modal" onclick="GetFatoraData(<?php echo $value->id ?>)" data-target="#myModalcomplete" class="btn btn-success btn-xs">إستكمال</button>

                            </td>
                        </tr>
                        <?php
                    }

                    ?>
                    </tbody>
                </table>

                           <div><br>
                               <button type="button" style="float: left" onclick="convert()" class="btn btn-success  ">تسديد الفواتير</button></div>
                           <?php echo form_close() ?>
                               <?php } ?>

            </div>

        </div>


    </div>


</div>


<div class="modal  modal-success fade" id="myModalcomplete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">إستكمال البيانات</h4>
            </div>
            <div class="modal-body">
                <div id="FatoraDataDiv"></div>

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button"   onclick="completeFatora()" class="btn btn-success">حفظ</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">صورة الملف</h4>
            </div>
            <div class="modal-body">
                <img  id="my_image" src="" width="50%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<script>

    function GetFatoraData(value) {


        if(value !=''){
            var  dataString = 'id='+ value;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/GetFatoraData',
                data:dataString,
                dataType: 'html',
                cache:false,
                beforeSend: function() {
                    $("#FatoraDataDiv").html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
                },
                success: function(html){
                    $("#FatoraDataDiv").html(html);
                }
            });
        }
    }

</script>


<script>

     function completeFatora() {

         var inputArr =[];

         $(".insertClass").each(function(){
             var value =$(this).val();
             if(value !='' && value !=0){
                 inputArr.push($(this).val());
             }
         });
         if(inputArr.length == 5){
             $('#myform').submit();

         }else {
             alert(' من فضلك أكمل إدخال البيانات !!');
         }

     }
</script>


<script>
    function convert() {

        var fatoraIdArr=[];
        $(".checkInput").each(function(){
            if($(this).prop("checked") == true){
                fatoraIdArr.push($(this).attr('data-id'));
            }
        });

        if(fatoraIdArr.length >0){

            $('#myForms').submit();
        }else{
           alert(' من فضلك إختر فاتورة !!');

        }
    }

</script>