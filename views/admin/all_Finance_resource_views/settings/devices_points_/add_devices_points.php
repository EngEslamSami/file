<style>
    .top-label {

        font-size: 13px;
    }
    .form-control{
        padding: 6px 0px;
    }
    .inner-heading-green{
        background-color: #5eab5e;
        padding: 10px;
        color: #fff;
    }
    .inner-heading-red{
        background-color: #c73e45;
        padding: 10px;
        color: #fff;
    }
    .no-padding {
        padding-left: 0px;
        padding-right: 0px;
    }

    table tr.green_background th,
    table tr.green_background td{
        background-color: #5eab5e;
        color: #fff;
        text-shadow: none;
        font-weight: 500;
    }
    table tr.red_background th,
    table tr.red_background td{
        background-color: #c73e45;
        padding: 10px;
        color: #fff;
        text-shadow: none;
        font-weight: 500;
    }
    table tr th,
    table tr td,
    table thead td,
    table thead th,
    table tfoot th,
    table tfoot td
    {
        padding: 3px 5px !important;
    }
</style>



<div class=" col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
            <div class="pull-left">

            </div>
        </div>

        <div class="panel-body">

            <?php echo form_open_multipart('all_Finance_resource/settings/DevicesPoints/addDevicesPoints'); ?>
            <div class="col-sm-12 no-padding">
                <h6 class="text-center inner-heading-green"><?php echo $title?></h6>
            </div>

            <button class="btn btn-add"  type="button" onclick="add_device_row()">اضافة </button>


            <table class="display table table-bordered responsive nowrap" id="POITable" cellspacing="0" width="100%" style="table-layout: auto;">
                <thead>
                <tr class="green_background">
                    <th style="">الجهاز</th>
                    <th style=""> البنك</th>
                    <th style=""> الحساب</th>
                    <th style=""> رقم الحساب </th>
                    <th style="">الاجراء</th>

                </tr>

                <tbody id="result">
                <?php
                if(isset($allData)&&!empty($allData)) {
                    foreach ($allData as $record) {

                        ?>
                        <tr>
                        <td <?php if($record->count>1){ ?> rowspan="<?= $record->count ?>"  <?php } ?>><?php echo$record->device_name;?> </td>
                           <?php  if(isset($record->banks)&&!empty($record->banks)) {
                            foreach ($record->banks as $bank ) { ?>
                            <td <?php if(count($bank->accounts)>1){ ?> rowspan="<?= count($bank->accounts) ?>"  <?php } ?>><?php echo $bank->bank_name;?> </td>
                            <?php  if(isset($bank->accounts)&&!empty($bank->accounts)) {
                            foreach ($bank->accounts as $account ) { ?>
                            <td><?= $account->account_name ?>  </td>
                                <td><?= $account->account_num ?>  </td>
                            <td><a href="<?=base_url().'all_Finance_resource/settings/DevicesPoints/deleteDevicesPoints/'.$account->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" id="delPOIbutton"  onclick="deleteRow(this)"><i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                                </td>
                        </tr>
                            <?php } } else { ?>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            </tr>
                   <?php   } } } else { ?>
                <td>==</td>
                <td>==</td>
                        <?php   } } }?>
                </tbody>


            </table>

            <div class="col-xs-12">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                </div>
                <div class="col-md-2">

                    <input type="submit" id="submit_b" style="padding: 5px 14px;" name="add" class="btn btn-blue btn-close" value=" حفظ ">
                </div>
            </div>

            <?php  echo form_close() ;
            ?>
        </div>
    </div>
</div>





<script>
    function add_device_row()
    {
        var x = document.getElementById('POITable');

        var len_tab1 = x.rows.length;

        len=len_tab1;



        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/settings/DevicesPoints/add_device_record",
            data:{len:len},
            success:function(d){
                $('#result').append(d);

            }

        });
    }

</script>




<script>
    function get_banks(device_id,thiss)
    {

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/settings/DevicesPoints/add_device_banks",
            data:{device_id:device_id},
            success:function(d){
                $('#bank_id_fk_d'+thiss).html(d);
            }

        });



    }

</script>


<script>
    function get_accounts(bank_id,thiss)
    {

        var device_id = $('#device_id_fk'+thiss).val();

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/settings/DevicesPoints/add_bank_accounts",
            data:{bank_id:bank_id,device_id:device_id},
            success:function(d){
                $('#account_id_fk_d'+thiss).html(d);
            }

        });



    }

</script>

<script>
    function get_accounts_nums(account_id,thiss)
    {

        var device_id = $('#device_id_fk'+thiss).val();
        var bank_id = $('#bank_id_fk_d'+thiss).val();

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>all_Finance_resource/settings/DevicesPoints/get_accounts_nums",
            data:{bank_id:bank_id,device_id:device_id,account_id:account_id},
            success:function(d){
                $('#account_num_id_fk'+thiss).html(d);
            }

        });



    }

</script>


<script>

    function deleteRow(row) {
        var i = row.parentNode.parentNode.rowIndex;

        document.getElementById('POITable').deleteRow(i);

    }

</script>















