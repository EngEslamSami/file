<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>طباعة</title>
    <link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>css/style.css">

    <style type="text/css">
        .print_forma{
            border:1px solid ;
            padding: 15px;
        }
        .print_forma table th{
            text-align: center;
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
    </style>

</head>
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
        window.location = "<?=base_url('disability_managers/DeviceOrders')?>";
    }
</script>

<body id="printdiv" onload="return printDiv('printdiv')">
<div class="header col-xs-12 no-padding">
    <div class="col-xs-6 text-center">
        <p>المملكة العربية السعودية</p>
        <p>الجمعية الخيرية لرعاية المعاقين بحائل (هدكا)</p>
        <p>مسجلة برقم (605)</p>
        <p>تحت إشراف وزارة الشئون الإجتماعية </p>
    </div>
    <div class="col-xs-6 text-center">
       <img src="<?=base_url()?>asisst/fav/logo.png">
    </div>
</div>
<div class="col-xs-12 Title">
    <h5 class="text-center"> <strong>نموذج طلب الأجهزة المساعدة والتعويضية</strong></h5>
</div>

<section class="main-body">
    <div class="container">
        <p style="text-align: left">نموذج رقم : <?=$detail[0]->order_num?></p>
        <div class="print_forma col-xs-12 no-padding">
            <div class="personality">
                <h5 class="text-center heading">البيانات الشخصية </h5>
                <div class="col-xs-12">
                    <label>● بيانات المستفيد :</label>
                </div>
                <div class="col-xs-6">
                    <p><strong>الإسم :</strong> <?=$person_data["p_name"]?> </p>
                    <p><strong>تاريخ الميلاد :</strong> <?=$person_data["p_date_birth"]?></p>
                    <p><strong>فئة الإعاقة :</strong> <?=$person_data["disability_title"]?></p>
                </div>
                <div class="col-xs-6">
                    <p><strong>رقم السجل المدنى :</strong> <?=$person_data["p_national_num"]?></p>
                    <p><strong>رقم الجوال :</strong><?=$person_data["p_mob"]?> </p>
                    <p><strong>رقم المستفيد :</strong> <?=$person_data["p_name"]?></p>
                </div>
                <div class="col-xs-12">
                  <!--  <p><strong>نوع الجهاز المطلوب : </strong>....</p>  -->
                     <?php if(isset($order_table) && !empty($order_table) && $order_table!=null ){?>
                <table id="" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th> إسم الجهاز   </th>
                        <th> العدد    </th>
                       
                    </tr>
                    </thead>
                    <tbody>
                    <?php $x=1;foreach ($order_table as $row){?>
                        <tr>
                            <td><?=$row->title?></td>
                            <td><?=$row->amount_device?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                <?php }?>
                </div>

                <div class="col-xs-12">
                    <p><br>أوافق على الضوابط التى وضعتها الجمعية لاستفادتى من هذا البرنامج .</p>
                    <p class="col-xs-6 no-padding"><strong>التوقيع :</strong>...........</p>
                    <p class="col-xs-6 no-padding"><strong>تاريخ تقديم الطلب :</strong><?=$detail[0]->order_date?> هـ</p>

                </div>


                <div class="col-xs-12"><hr></div>

            </div>
            <div class="days col-xs-12 ">
                <p><br>● تم التحقق من أهلية المتقدم :</p>
                <p class="col-xs-3 no-padding">● المتقدم بحاجة إلى الدعم :</p>
                <div class="col-xs-1">
                    <label class="checkbox-statement">
                        <input type="checkbox" <?php if($detail[0]->need_suport == 1){ echo 'checked';}?> class="myinput large"><span>نعم </span>
                    </label>
                </div>
                <div class="col-xs-1">
                    <label class="checkbox-statement">
                        <input type="checkbox" <?php if($detail[0]->need_suport == 2){ echo 'checked';}?> class="myinput large"><span>لا </span>
                    </label>
                </div>

                <div class="clearfix"></div>

               <?php if(isset($order_table) && !empty($order_table) && $order_table!=null ){?>
                <table id="" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th> إسم الجهاز   </th>
                        <th> العدد    </th>
                        <th>   المؤسسات الطبيه</th>
                        <th> الحالة </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $x=1;foreach ($order_table as $row){?>
                        <tr>
                            <td><?=$row->title?></td>
                            <td><?=$row->amount_device?></td>
                            <td>
           
                            <?php if($row->approved_device == 0){
                                     echo  ' لم يتم التحديد ';
                                 }elseif($row->approved_device == 1){
                                     echo 'متوافر لدى الجمعية '; 
                                 }elseif($row->approved_device == 2){
                                     echo ''.$row->company_name.''; 
                                 }
                                 ?>
                                  
                            </td>
                           
                            <td>
                             <?php if($row->confirm_sarf == 0){
                                     echo  ' لم يتم الاجراء ';
                                 }elseif($row->confirm_sarf == 1){
                                     echo '  تم الاعتماد  '; 
                                 }elseif($row->confirm_sarf == 2){
                                     echo '  تم رفض الاعتماد    ';
                                 }?>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                <?php }?>

                <div class="clearfix"></div>


                <p class="col-xs-3 no-padding">الجهاز متوفر لدى الجمعية:</p>
                <div class="col-xs-1">
                    <label class="checkbox-statement">
                        <input type="checkbox" name="" class="myinput large"><span>نعم </span>
                    </label>
                </div>
                <div class="col-xs-1">
                    <label class="checkbox-statement">
                        <input type="checkbox" name="" class="myinput large"><span>لا </span>
                    </label>
                </div>
                <div class="clearfix"></div>

                <p><br>● الجهاز غير متوفر حالياَ لدى الجمعية , ويتوقع توفره خلال مدة : .....  </p>
                <p class="col-xs-4 no-padding"><strong>الإسم :</strong>...........</p>
                <p class="col-xs-4 no-padding"><strong>التوقيع :</strong>...........</p>
                <p class="col-xs-4 no-padding"><strong>تاريخ تقديم الطلب :</strong>..../..../143 هـ</p>

                <div class="clearfix"><br><br></div>
                <div class="col-xs-12"><hr></div>

            </div>




            <div class="special col-xs-12 ">
                <br><br>
                <div class="col-xs-4 text-center">
                    <label>الإخصائى الإجتماعى </label><br><br>
                    <p>عبد الكريم بن عبد الرحمن الفايز</p><br>
                </div>
                <div class="col-xs-4 text-center">
                    <label>مراجعة المدير المالى </label><br><br>
                    <p>عثمان بن عمر المشعلى</p><br>
                </div>
                <div class="col-xs-4 text-center">

                    <label>إعتماد المدير التنفيذى </label><br><br>
                    <p>وليد بن محمد البكر</p><br>
                </div>
                <br><br>

            </div>






        </div>
    </div>
</section>



<script type="text/javascript" src="<?=base_url().'asisst/admin_asset/'?>js/jquery-1.10.1.min.js"></script>
<script src="<?=base_url().'asisst/admin_asset/'?>js/bootstrap-arabic.min.js"></script>
<script src="<?=base_url().'asisst/admin_asset/'?>js/custom.js"></script>
</body>
</html>
