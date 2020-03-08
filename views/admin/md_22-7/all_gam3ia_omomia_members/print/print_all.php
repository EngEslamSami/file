
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css" >
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/style.css" >

<style type="text/css">
    .cover-page {
        min-height: 480px;
    }
    .print_forma{
        border:1px solid ;
        padding: 15px;
    }
    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .body_forma{
        margin-top: 40px;
    }
    .no-padding{
        padding: 0;
    }
    .heading{
        font-weight: bold;
        text-decoration: underline;
    }
    .print_forma hr{
        border-top: 1px solid #000;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .myinput.large{
        height:22px;
        width: 22px;
    }

    .myinput.large[type="checkbox"]:before{
        width: 20px;
        height: 20px;
    }
    .myinput.large[type="checkbox"]:after{
        top: -20px;
        width: 16px;
        height: 16px;
    }
    .checkbox-statement span{
        margin-right: 3px;
        position: absolute;
        margin-top: 5px;
    }
    .header p{
        margin: 0;
    }
    .header img{
        height: 90px;
    }
    .no-border{
        border:0 !important;
    }
    .table-devices tr td{
        width: 30%;
        min-height: 20px
    }
    .gray_background{
        background-color: #eee;

    }
    table.th-no-border th,
    table.th-no-border td
    {
        border-top: 0 !important;
    }

    @media all {
        .page-break	{ display: none; }
    }

    @media print {
        .page-break	{ display: block; page-break-before: always; margin-bottom: 50px; }
    }

    table th {

        font-weight: 500;
    }

</style>

<div id = "printdiv" >



    <div class="page-break"></div>

    
        <div class="header col-xs-12 no-padding">
            <div class="col-xs-4 text-center">
                <p>المملكة العربية السعودية</p>
                <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
            </div>
            <div class="col-xs-4 text-center">
                <img src="<?php echo base_url();?>uploads/images/logo.png">
            </div>
            <div class="col-xs-4 text-center">
                <p>المملكة العربية السعودية</p>
                <p>الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  </p>
            </div>
        </div>
        <div class="col-xs-12 Title">
            <h5 class="text-center"><br><br> <strong>البيانات الأساسية</strong></h5><br>
        </div>

        <section class="main-body">
            <div class="container">
                <div class="print_forma no-border col-xs-12 no-padding">
                    <div class="personality">
                        <div class="col-xs-12 no-padding">
                            <?php
                            if ($records != '' && $records != null && !empty($records)) { 
                                $x=1;?>
                                <table class="table table-bordered table-devices">
                                    <thead>
                                    <tr class="info">
                                        <th>م</th>
                                        <th>رقم العضوية</th>
                                        <th>اسم العضو</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($records as $record){
                                        ?>
                                    
                                    <tr>
                                        <td><?= $x++?></td>
                                        <td><?php
                                            if (!empty($record->odwiat)){
                                                echo  $record->odwiat->rkm_odwia_full;
                                            } else{
                                                echo "غير محدد" ;
                                            }

                                            ?></td>
                                        <td><?= $record->name?></td>
                                   

                                    </tr>
                                        <?php
                                    }
                                    ?>


                                    </tbody>
                                </table>
                                <?php
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <div class="page-break"></div>
   
    <!-------------- بيانات الوظيفية ---------------->




</div>
</div>
</div>

<script >

    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url('md/all_gam3ia_omomia_members/Gam3ia_omomia_members/add_gam3ia_member') ?>";
    },100);

</script >
                

