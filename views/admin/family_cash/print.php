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

        window.location = "<?php echo base_url('FamilyCashing'); ?>";

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
        background-color: #333;
        color: #fff;
        border: 1px solid #333;
        padding: 7px 0;
        font-size: 13px;
    }
    
    .r-table td {
        border: 1px solid #333;
        padding: 10px 0;
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
</style>

<?php 
echo 'saddad';
print_r($records);
?>

<body onload="return printDiv('printdiv')" id="printdiv">
    <header class="col-xs-12">
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
    </header>

    <div class="col-xs-12" style="margin-top: 15px; margin-bottom: 15px">
        <div class="container" style="padding: 0">
            <div class="col-xs-12">
                <div class="col-xs-12" style="padding: 0; margin-bottom:15px;">
                    <h5 class="text-center"><b> أمر صرف </b></h5>
                    <hr style="width:10%; border-color: #000; margin-top: 0;margin-bottom: 0">
                </div>
                <div class="col-xs-12" style="margin-bottom: 15px; padding: 0">
                    <p> بناء علي قرار لجنه الرعاية والمساعدات رقم 333 الرجاء الموافقه علي تغذية بطاقات الاسرة لشهر اغسطس 2018 وللاسماء الموضحه بياناتها بالكشف وهي كالاتي</p>
                    <table class="r-table" style="width:100%">
                        <tr>
                            <td class="text-center" style="width: 9%">
                                <h6 style="margin: 2px"> م </h6>
                            </td>
                            <td class="text-center" style="width: 9%">
                                <h6 style="margin: 2px"> رقم الملف</h6>
                            </td>
                            <td class="text-center">
                                <h6 style="margin: 2px"> الاسرة </h6>
                            </td>
                            <td class="text-center" style="width: 9%">
                                <h6 style="margin: 2px"> عدد الافراد </h6>
                            </td>
                            <td class="text-center" style="width: 9%">
                                <h6 style="margin: 2px"> ارملة </h6>
                            </td>
                            <td class="text-center" style="width: 9%">
                                <h6 style="margin: 2px"> يتيم </h6>
                            </td>
                            <td class="text-center" style="width: 9%">
                                <h6 style="margin: 2px"> مستفيد </h6>
                            </td>
                            <td class="text-center" style="width: 9%">
                                <h6 style="margin: 2px"> إجماع المبلغ </h6>
                            </td>
                        </tr>
                        <?php 
                        $i = 1;
                        $total1 = $total2 = $total3 = $total4 = $total5 = 0;
                        foreach ($records as $record) { 
                        ?>
                        <tr>
                            <td class="text-center">
                                <h5><?=$i++?></h5>
                            </td>
                            <td class="text-center">
                                <h5><?=$record->file_num?></h5>
                            </td>
                            <td>
                                <h5 style="margin-right: 15px"><?=$record->full_name?></h5>
                            </td>
                            <td class="text-center">
                                <h5><?=$record->all_num?></h5>
                            </td>
                            <td class="text-center">
                                <h5><?=$record->mother_num?></h5>
                            </td>
                            <td class="text-center">
                                <h5><?=$record->young_num?></h5>
                            </td>
                            <td class="text-center">
                                <h5><?=$record->adult_num?></h5>
                            </td>
                            <td class="text-center">
                                <h5><?=$record->value?></h5>
                            </td>
                        </tr>
                        <?php 
                            $total1 += $record->all_num;
                            $total2 += $record->mother_num;
                            $total3 += $record->young_num;
                            $total4 += $record->adult_num;
                            $total5 += $record->value;
                        } 
                        ?>
                        <tr>
                            <td colspan="3">
                                <h5 class="text-center" style="margin: 2px"> الاجمالي</h5>
                            </td>
                            <td class="text-center">
                                <h5 class="text-center" style="margin: 2px"><?=$total1?> </h5>
                            </td>
                            <td class="text-center">
                                <h5 class="text-center" style="margin: 2px"><?=$total2?> </h5>
                            </td>
                            <td class="text-center">
                                <h5 class="text-center" style="margin: 2px"><?=$total3?> </h5>
                            </td>
                            <td class="text-center">
                                <h5 class="text-center" style="margin: 2px"><?=$total4?> </h5>
                            </td>
                            <td class="text-center">
                                <h5 class="text-center" style="margin: 2px"><?=$total5?> </h5>
                            </td>
                        </tr>
                    </table>
                    <div class="col-xs-3">
                        <h5>علما بأنه تم </h5>
                    </div>
                    <div class="col-xs-3">
                        <input type="radio" class="input"> تم البحث
                    </div>
                    <div class="col-xs-3" style="padding: 0">
                        <input type="radio" class="input"> تم مراجعه المستندات
                    </div>
                    <div class="col-xs-3">
                        <input type="radio" class="input"> تم اعتماد المساعده
                    </div>

                </div>
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h5><b> الاسم  /  عبدالله صالح المرزوق </b></h5>
                    </div>
                    <div class="col-xs-6">
                        <h5><b> الموافق ..../...../ 2018 مـ </b></h5>
                    </div>
                </div>
                <div class="col-xs-12" style="margin-top: 20px;">
                    <div class="col-xs-4">
                        <h5 class="text-center">مدير الرعاية الاجتماعية</h5>
                        <h5 class="text-center">صالح بن ابراهيم القريعان </h5>
                    </div>
                    <div class="col-xs-4">
                        <h5 class="text-center">المحاسب </h5>
                        <h5 class="text-center"> ماجد محمد صالح الركبان </h5>
                    </div>
                    <div class="col-xs-4">
                        <h5 class="text-center">مدير الشؤون المالية </h5>
                        <h5 class="text-center"> سامي نايف الحربي </h5>
                    </div>
                </div>
                <div class="col-xs-12" style="margin-top: 20px;">
                    <div class="col-xs-4" style="padding: 0">
                        <h5 class="text-center"><b> مدير عام الجمعية </b></h5>
                        <h5 class="text-center"><b>سليمان بن محمد الجاسر </b></h5>
                    </div>
                    <div class="col-xs-4" style="padding: 0">
                        <h5 class="text-center"><b>أمين الصندوق عضو مجلسا الاداره </b></h5>
                        <h5 class="text-center"><b> عبدالله عبدالعزيز ناصر الصبيحي </b></h5>
                    </div>
                    <div class="col-xs-4" style="padding: 0">
                        <h5 class="text-center"><b> رئيس مجلس الادارة </b></h5>
                        <h5 class="text-center"><b> عبدالرحمن محمد سليمان البليهي </b></h5>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="<?=base_url().'asisst/admin_asset/'?>js/bootstrap-arabic.min.js "></script>
    <script src="<?=base_url().'asisst/admin_asset/'?>js/jquery-1.10.1.min.js "></script>

</body>