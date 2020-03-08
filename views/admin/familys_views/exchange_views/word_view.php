<?php
header("Content-Type: application/vnd.ms-word");
header("Expires: 0");
header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
header("Content-disposition: attachment; filename=\"worddata.doc\"");
?>




<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">









<table  style="width: 100%">
    <tbody>
    <tr>
        <td class="text-center" style="width: 40%">
            <h6>الرقم : .............</h6>
            <h6>التاريخ :..............</h6>
            <h6>المرفقات : .............</h6>
            <h6>الموضوع :..............</h6>
        </td>
        <td  style="text-align: center; width: 30%;padding: 10px;">   <img src="<?php echo base_url()?>uploads/images/2d1820ca1e3d8939cef0023a91b0bc0a.png" >  </td>

        <td  class="text-center" style="width: 30%;">
            <h5>الجمعية الخيرية لرعاية الأيتام ببريدة (أبـناء)</h5>
            <p>مسجلة بوزارة العمل والتنمية الإجتماعية<br> تصريح رقم 463</p>
        </td>
    </tr>
    </tbody>
</table>
<div class="clearfix"></div>	<br>
<section class="main-body">

    <div class="container">
            <h5 style=" text-align: center">سعادة مدير عام الجمعية /        <strong style="float: left;" >سلمه الله</strong></h5>
            <h5  style=" text-align: center">السلام عليكم ورحمة الله وبركاته ...</h5>
            <h6  style=" text-align: center">أرجو من سعادتكم التكرم بالتوجيه إلى من يلزم بصرف التالى :-</h6>
        <div class="print_forma  col-xs-12 no-padding">
            <div class=" no-border">
                <br>
                <table border='1' style="width: 100%">
                    <tbody>
                    <tr>

                        <td><?=$sarf_data["total_value"]?></td>
                        <td  style="text-align: right; width: 30%;padding: 10px;">مبلغ وقدره  </td>
                    </tr>
                    <tr>
                        <td><?=$sarf_details[0]->mother_name?></td>
                        <td style="text-align: right; width: 30%;padding: 10px;">اسم الجهه / المستفيد</td>

                    </tr>
                    <tr>
                        <td><?=$sarf_data["about"]?></td>
                        <td style="text-align: right; width: 30%;padding: 10px;">عبارة عن </td>

                    </tr>
                    </tbody>
                </table>
                <br>
                <table border='1' style="width: 100%">
                    <tbody>
                    <tr>
                        <td> </td>
                        <td style="text-align: right; width: 30%;padding: 10px;">المسئول  :         </td>

                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: right; width: 30%;padding: 10px;">مدير الإدارة     </td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <table  border='1' style="width: 100%">
                    <tbody>
                    <tr>
                        <th  colspan="2" style="text-align: center;padding: 10px;background-color: #7db162">إفادة الشئؤون المالية        </th>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: right; width: 30%;padding: 10px;" >اسم البند(الحساب)   </td>

                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: right; width: 30%;padding: 10px;">ملاحظات  </td>

                    </tr>
                    <tr>
                        <td  > مدير الشؤون المالية</td>
                        <td style="text-align: right; width: 30%;padding: 10px;">المحاسب  </td>

                    </tr>
                    <tr>
                        <td > الأسم ،التوقيع </td>
                        <td  style="text-align: right; width: 30%;padding: 10px;">   الأسم ،التوقيع</td>

                    </tr>
                    </tbody>
                </table>
                <br>
                <table   border='1'  style="width: 100%">
                    <tbody>
                    <tr>
                        <th  colspan="4" style="text-align: center;padding: 10px;background-color: #7db162">إفادة الشئؤون المالية        </th>
                    </tr>
                    <tr>

                        <td style="padding: 10px;">
                                <h6><i class="fa fa-square-o" aria-hidden="true"></i> إصدار شيك</h6>
                        </td>
                        <td style="padding: 10px;">
                                <h6><i class="fa fa-square-o" aria-hidden="true"></i> تحويل </h6>
                        </td>
                        <td style="padding: 10px;">
                            <h6><i class="fa fa-square-o" aria-hidden="true"></i> نقداَ</h6>
                        </td>
                        <td style="padding: 10px;">
                            <h6><i class="fa fa-check-square-o" aria-hidden="true"></i> لا مانع من الصرف :</h6>

                        </td>

                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="col-xs-4 col-xs-offset-8">
                <h5 class="text-center">مدير عام الجمعية</h5>
                <h5 class="text-center">سلطان بن محمد الجاسر</h5>
            </div>

            <div class="col-xs-12">
                <h5  class="text-center">--------------------------------------------------------------------</h5>
                <h6  class="text-center" >إعتماد أمين الصندوق</h6>
                <h5  class="text-center">.....................................................................</h5>
            </div>
            <div class="col-xs-4 col-xs-offset-8">
                <h5 class="text-center">أمين الصندوق - عضو مجلس الإدارة</h5>
                <h5 class="text-center">عبدالله بن عبد العزيز الصبيحي</h5>
            </div>


            <div class="clearfix"></div>

        </div>
    </div>
</section>

<div class="footer">
    <p style="text-align: right">بريدة - المملكة العربية السعودية</p>
    <p  style="text-align: right">الهاتف : 063851919 &nbsp فاكس : 063837737 &nbsp جوال : 0553851919 </p>
    <p  style="text-align: right">س-ب 821 - بريدة 51421 &nbsp&nbsp&nbsp abnaa.bu@gmail.com</p>
</div>











<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>



