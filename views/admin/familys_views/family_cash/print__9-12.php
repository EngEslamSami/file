<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;

        window.location = "<?php echo base_url('family_controllers/FamilyCashing'); ?>";

    }
</script>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title> طباعة</title>
    <link rel="stylesheet" type="text/css" href="<?=base_url().'asisst/admin_asset/'?>css/bootstrap-arabic.min.css">
    <link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
</head>

<style>
    body {
        font-family: 'Cairo', sans-serif;
    }

    .r-table {
        margin-bottom: 15px;
    }

    .r-table th {
        width: 20%;
        color: #000;
        border: 1px solid #333;
        padding: 4px 10px;
        font-size: 14px;
    }

    .r-table td {
        border: 1px solid #333;
        padding: 4px 10px;
        font-size: 14px;
    }

    .text-print h6 {
        margin: 5px 0;
    }

    .input {
        position: relative;
        top: 5px;
        left: 11px;
        width: 17px;
        height: 17px;
    }
    .gray_background{
        background-color: #eee;
    }
    @page  {
        margin:160px 20px 200px;
    }
</style>

<body onload="return printDiv('printdiv')" id="printdiv">
    <!--<header class="col-xs-12">
        <div class="container">
            <div class="col-xs-5 text-print" style="margin-top: 30px">
                <h4> الجمعية الخيريه لرعاية الايتام ببريد </h4>
                <h6>مسجله بوزاره الشؤون الاجتماعية <span>  462 </span></h6>
            </div>
            <div class="col-xs-2">
                <img src="<?=base_url().'asisst/admin_asset/'?>img/logo.png" alt="" class="center-block" width="110px">
            </div>
            <div class="col-xs-5 text-print" style="margin-top: 30px">
                <h6 class="text-center"> الادارة <span> القسم </span></h6>
                <h6 class="text-center"> القسم / الرعاية الاجتماعية </h6>
            </div>

        </div>
    </header>-->

    <div class="col-xs-12" style="margin-top: 15px; margin-bottom: 15px">
        <div class="container" style="padding: 0">
            <div class="col-xs-12">
                <div class="col-xs-12" style="padding: 0; margin-bottom:15px;">
                    <h4 class="text-center"><b style="border-bottom:1px solid">
                     محضر اجتماع لجنه الرعايه الاجتماعية رقم (<?php echo $record[0]->lagna_member[0]->lagna_num;?>) </b></h4>

                </div>
                <div class="col-xs-12" style="margin-bottom: 15px; padding: 0">
                    <h4>
                    <b style="border-bottom:1px solid">
                    الحمد لله وحده والصلاه والسلام علي من لانبي بعده وبعد :
                    </b>
                    </h4>
                    <h4>في هذا اليوم الموافق (<?php echo date('d-m-Y',$record[0]->sarf_date);?>) عقدت لجنه الرعايه الاجتماعية إجتماعها رقم (<?php echo $record[0]->lagna_member[0]->lagna_num;?>)
                    لمناقشة التالي : 
                    
                    </h4>
                    <br>
                    <h4> 1-  <?=$record[0]->about ?> .</h4>
                    <h4 class="text-center">بعد الإجتماع والمناقشة قررت اللجنة</h4>
                    <h4>إعتماد <?=$record[0]->about ?> وفقاَ للبيان التالى :- </h4>

                    <table class="r-table" style="width:100%">
                        <tr>
                            <th class="text-center" style="width: 20%">
                                <h5 style="margin: 2px; font-weight: bold;">عدد الاسر </h5>
                            </th>
                            <th class="text-center" style="width: 20%">
                                <h5 style="margin: 2px;font-weight: bold;">فئه المستفدين</h5>
                            </th>
                            <th class="text-center">
                                <h5 style="margin: 2px;font-weight: bold;"> العدد </h5>
                            </th>
                            <th class="text-center" style="width: 20%">
                                <h5 style="margin: 2px;font-weight: bold;"> مبلغ المساعده </h5>
                            </th>
                            <th class="text-center" style="width: 20%">
                                <h5 style="margin: 2px;font-weight: bold;"> الاجمالي </h5>
                            </th>

                        </tr>

                        <tr>
                            <td class="text-center">
                                <h5 style="font-weight: bold;" ><?=$record[0]->member?></h5>
                            </td>
                            <td class="text-center">
                                <h5 style="font-weight: bold;" >ايتام</h5>
                            </td>
                            <td class="text-center" >
                                <h5 style="font-weight: bold;" >1000</h5>
                            </td>
                            <td class="text-center">
                                <h5 style="font-weight: bold;" ><?=$record[0]->value_money?></h5>
                            </td>
                            <td class="text-center">
                                <h5 style="font-weight: bold;" ><?=$record[0]->total_value ?></h5>
                            </td>

                        </tr>


                    </table>


<br>
                    <h5 class="text-center" style="margin-bottom: 5px;"><b style="border-bottom:1px solid"> اعضاء اللجان </b></h5>

                    <?php if(isset($record[0]->lagna_member)&&!empty($record[0]->lagna_member)){?>

                    <table class="r-table" style="width:100%">
                        <tr class="gray_background">
                            <td class="text-center" style="width: 10%">
                                <h6 style="margin: 2px; font-weight: bold;">م </h6>
                            </td>
                            <td class="text-center" style="width: 40%">
                                <h6 style="margin: 2px;  font-weight: bold;">الاسم</h6>
                            </td>
                            <td class="text-center">
                                <h6 style=" font-weight: bold;"> الصفه </h6>
                            </td>
                            <td class="text-center">
                                <h6 style=" font-weight: bold;"> التوقيع </h6>
                            </td>



                        </tr>
                        <?php
                        $x=1;
                        foreach($record[0]->lagna_member as $row){ ?>
                        <tr>
                            <td class="text-center gray_background">
                                <h5 style="margin-right: 15px; font-weight: bold;"><?php echo $x;?></h5>
                            </td>
                            <td class="text-center">
                                <h5 style="margin-right: 15px; font-weight: bold;"><?php echo $row->member_name;?></h5>
                            </td>
                            <td class="text-center">
                                <h5 style="margin-right: 15px; font-weight: bold;"><?php echo $row->member_job;?></h5>
                            </td>
                            <td class="text-center">
                                <h5 style="margin-right: 15px; font-weight: bold;"></h5>
                            </td>


                        </tr>
                        <?php
                        $x++;
                        } ?>
                        </table>
                    <?php } ?>

                </div>


            </div>

        </div>
    </div>

    <script src="<?=base_url().'asisst/admin_asset/'?>js/bootstrap-arabic.min.js "></script>
    <script src="<?=base_url().'asisst/admin_asset/'?>js/jquery-1.10.1.min.js "></script>

</body>