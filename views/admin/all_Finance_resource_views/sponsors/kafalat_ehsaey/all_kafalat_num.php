<style type="text/css">
    /* .top-label {
         font-size: 13px;
         background-color: #428bca !important;
         border: 2px solid #428bca !important;
         text-shadow: none !important;
         font-weight: 500 !important;
     } */

    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }

    .print_forma {
        padding: 15px;
    }

    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-body {
        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;
    }

    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }

    .footer img {
        width: 100%;
        height: 120px;
    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th,
    .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td,
    .table-bordered>tfoot>tr>td {
        border: 1px solid #abc572;
    }
    /***/

    .btn-close-model,
    .btn-close-model:hover,
    .btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }


    .my_style{

        color: #222;
        font-size: 15px;
        font-weight: 500;

    }
    .striped-ul li:nth-child(2n+1){
        background-color: #e1edf7;
    }
    .striped-ul li{
        padding: 10px 0;
    }
    .striped-ul{
        margin-bottom: 20px;
    }

    .label-pill {

        display: inline-block;
        width: 27px;
        height: 27px;
    }

    .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td {
        border: 1px solid #ffffff !important;
        background: #e8e8e8;
        border-radius: 7px !important;
        font-size: 15px !important;
        color: black;
    }

</style>

<?php
if(isset($result)&&!empty($result))
{

    $k_yatem_full=$result->k_yatem_full;
    $k_yatem_half=$result->k_yatem_half;
    $k_armal=$result->k_armal;
    $k_mostafed=$result->k_mostafed;
    //  $k_status=$result->k_status;
    $k_status=$result->kafel_status;
    $start_kfala_date=$result->start_kfala_date;
    $num_days =$result->num_days ;
    $alert_type   =$result->alert_type ;
    $pay_method  =$result->pay_method ;
    $bank_id_fk   =$result->bank_id_fk ;
    $bank_account_num   =$result->bank_account_num ;
    $bank_branch  =$result->bank_branch ;
    $num  =$result->num  ;



}else{

    $k_yatem_full    ="";
    $k_yatem_half    ="";
    $k_armal    ="";
    $k_mostafed    ="";
    $start_kfala_date="";
    $k_status="";
    $alert_type   ="";
    $num_days   ="";
    $pay_method   ="";
    $bank_id_fk   ="";
    $bank_account_num   ="";
    $bank_branch  ="";
    $num ="";
}
?>





<div class="col-sm-12 no-padding " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;  ?></h3>
            <div class="pull-left">
                <?php if(isset($result) && !empty($result)){
                    $data_load['k_status'] = $k_status;
                    $this->load->view('admin/all_Finance_resource_views/sponsors/drop_down_menu', $data_load);
                }?>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered dt-responsive nowrap ">
                <thead>
                <tr class="greentd">
                    <th class="text-center">النوع</th>
                    <th class="text-center">الكل</th>
                    <th class="text-center"> مكفول </th>
                    <th class="text-center">غير مكفول</th>
                </tr>
                </thead>
                <tbody>
                <a>
                    <td class="text-center">الأيتام</td>
                    <td class="text-center">
                        <a onclick="LoadTable('aytam')" data-toggle="modal" data-target="#detailsModal"><?php echo $all_aytam['num'];?></a></td>
                    <td class="text-center">
                        <a onclick="LoadSubTable('aytam','guaranteed')" data-toggle="modal" data-target="#detailsModal2"><?php echo $all_aytam_shamla['num'] + $all_aytam_nos['num'];?></a></td>
                    <td class="text-center">
                        <a onclick="LoadSubTable('aytam','not_guaranteed')" data-toggle="modal" data-target="#detailsModal2">
                            <?php echo $all_aytam['num']-( $all_aytam_shamla['num'] + $all_aytam_nos['num']);?></a></td>
                </tr>
                <tr>
                    <td class="text-center">الأرامل</td>
                    <td class="text-center">
                        <a onclick="LoadTable('armal')" data-toggle="modal" data-target="#detailsModal">
                            <?php echo $all_armal['num'];?></a></td>
                    <td class="text-center">
                        <a onclick="LoadSubTable('armal','guaranteed')" data-toggle="modal" data-target="#detailsModal2">
                            <?php echo $all_armal_mkfol['num'];?></a></td>
                    <td class="text-center">
                        <a onclick="LoadSubTable('armal','not_guaranteed')" data-toggle="modal" data-target="#detailsModal2">
                            <?php echo $all_armal['num']-$all_armal_mkfol['num'];?></a></td>
                </tr>
                <tr>
                    <td class="text-center"> المستفيد البالغ</td>
                    <td class="text-center">
                        <a onclick="LoadTable('mostafed')" data-toggle="modal" data-target="#detailsModal"><?php echo $all_mostafed['num'];?></a></td>
                    <td class="text-center">
                        <a onclick="LoadSubTable('mostafed','guaranteed')" data-toggle="modal" data-target="#detailsModal2">
                            <?php echo $all_mostafed_mkfol['num'];?></a></td>
                    <td class="text-center">
                        <a onclick="LoadSubTable('mostafed','not_guaranteed')" data-toggle="modal" data-target="#detailsModal2">
                            <?php echo ($all_mostafed['num']-$all_mostafed_mkfol['num']);?></a></td>
                </tr>

                </tbody>
            </table>


        </div>
    </div>
</div>



<!------------------------------------------modals------------------------------------>
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">التفاصيل </h4>
            </div>
            <div class="modal-body " id="LoadDiv">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailsModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">التفاصيل </h4>
            </div>
            <div class="modal-body " id="LoadDiv2">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------modals------------------------------------>

<script>

    function LoadTable(value) {
        //$('#LoadDiv').html('');
        var type =value;

        if (type!='') {
            var dataString = 'type=' + type ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/GetAllPage',
                data:dataString,
                dataType: 'html',
                cache:false,
                beforeSend: function() {
                    $('#LoadDiv').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
                },
                success: function(html){
                    $("#LoadDiv").html(html);
                }
            });

        }

    }


    function LoadSubTable(value,personType) {

        var type =value;
        var personType =personType;

        if (type !='' && personType !='') {
            var dataString = 'type=' + type  +'&personType=' + personType;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/GetSubPage',
                data:dataString,
                dataType: 'html',
                cache:false,
                beforeSend: function() {
                    $('#LoadDiv2').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
                },
                success: function(html){
                    $("#LoadDiv2").html(html);
                }
            });

        }


    }


</script>