



<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">


<style type="text/css">
     /*   @import url(fonts/ht/HacenTunisia.css);
        @import url(fonts/hl/HacenLinerScreen.css);
        @import url(fonts/ge/ge.css);

        body {
            font-family: 'hl';

        }
        */


        .effect-shadow{
            position: relative;
        }
        .effect-shadow:before, .effect-shadow:after
        {
            z-index: -1;
            position: absolute;
            content: "";
            bottom: 15px;
            left: 10px;
            width: 50%;
            top: 80%;
            max-width:300px;
            background: #777;
            -webkit-box-shadow: 0 15px 10px #777;
            -moz-box-shadow: 0 15px 10px #777;
            box-shadow: 0 15px 10px #777;
            -webkit-transform: rotate(-3deg);
            -moz-transform: rotate(-3deg);
            -o-transform: rotate(-3deg);
            -ms-transform: rotate(-3deg);
            transform: rotate(-3deg);
        }
        .effect-shadow:after
        {
            -webkit-transform: rotate(3deg);
            -moz-transform: rotate(3deg);
            -o-transform: rotate(3deg);
            -ms-transform: rotate(3deg);
            transform: rotate(3deg);
            right: 10px;
            left: auto;
        }
        .cart-kafel-header img{
            width: 100%;
        }
        .cart-print{

        }
        .cart-print .cart-kafel{
            width: 600px;
            margin: auto;
            border: 1px solid #eee;
        }

        .cart-kafel-details{
            padding: 0 40px;
        }
        .record {
            display: inline-block;
            width: 100%;
            margin-bottom: 20px
        }
        .record .answer{
            color: #96c73e;
        }
        .record h5{
            font-size: 22px
        }
        .no-pr {
            padding-right: 0
        }
        .no-pl {
            padding-left: 0
        }
        .boldic{
            font-weight: 600
        }

        .barcode img {
            max-width: 100%;
            max-height: 125px;
        }
.record h5 {
    font-size: 22px !important;
    line-height: 5px !important;
    font-weight: bold !important;
}
@media print {
  a[href]:after {
    content: none !important;
      display: none;
      visibility: hidden;
  }
}

    </style>
    <body onload="printDiv('printDiv')" id="printDiv">

    <section class="cart-print">
        <div class="container">
            <div class="cart-kafel">
                <figure class="cart-kafel-header">
                    <img src="<?= base_url()?>asisst/admin_asset/img/pills/card-kafel-header.png">
                </figure>

                <div class="cart-kafel-details">
                    <?php
                    if (isset($all_kafalat) &&!empty($all_kafalat)){
                    $gender = 'ذكر';
                    foreach ($all_kafalat as $row){
                        if (!empty($row->file_num)){
                            $file_num= $row->file_num;
                        } else{
                            $file_num ='غير محدد';
                        }
                    if( $row->kafala_type_fk ==4) {


                        if (!empty($row->person_data['m_gender'])) {

                            if ($row->person_data['m_gender'] == 2) {
                                $gender = 'أنثى';
                            }
                        }


                        if (!empty ($row->person_data['m_birth_date_hijri_year'])) {

                            $age = $current_hijry_year - $row->person_data['m_birth_date_hijri_year'];

                        } else {

                            $age = 0;
                        }
                    } else{
                        if (!empty($row->person_data['member_gender'])) {

                            if ($row->person_data['member_gender'] == 2) {
                                $gender = 'أنثى';
                            }
                        }


                        if (!empty ($row->person_data['member_birth_date_hijri_year'])) {

                            $age = $current_hijry_year - $row->person_data['member_birth_date_hijri_year'];

                        } else {

                            $age = 0;
                        }

                    }

                    ?>
                    <div class="record">
                    <h5>   إسم الكافل :
                    <span class="answer boldic">
                    <?php if (!empty($result->k_name)) {
                                echo $result->k_name;
                            } else {
                                echo 'غير محدد';
                            } ?>
                    </span>
                        
                        
                        </h5>
                        <!--<h5 class="answer boldic">
                            <?php if (!empty($result->k_name)) {
                                echo $result->k_name;
                            } else {
                                echo 'غير محدد';
                            } ?>
                        </h5>-->
                    </div>


                        <div class="record">
                            <div class="col-xs-6 no-pr">
                                <h5>رقم الكافل : <span class="boldic"> <?php if (!empty($result->k_num)) {
                                            echo $result->k_num;
                                        } else {
                                            echo 'غير محدد';
                                        } ?></span></h5>
                            </div>
                            <div class="col-xs-6 no-pl">
                                <h5>رقم الملف : <span class="boldic"> <?= $file_num?></span></h5>
                            </div>
                        </div>
                        <div class="record">
                            <div class="col-xs-6 no-pr">
                                <h5>إسم المكفول: <span class="answer boldic"><?php echo word_limiter( $row->person_name,1)?></span></h5>
                            </div>
                            <div class="col-xs-6 no-pl">
                                <h5>الجنس : <span class="boldic"> <?=  $gender?> </span></h5>
                            </div>
                        </div>



                        <div class="record">
                            <?php
                            if( $row->person_type == 1) {

                                $birth_date= $row->person_data['m_birth_date_hijri'];
                            }else{
                                $birth_date=$row->person_data['member_birth_date_hijri'];
                            }
                            $date_birth = explode('/', $birth_date)[2] . '/' . explode('/', $birth_date)[1] . '/' . explode('/', $birth_date)[0];

                            ?>
                            <div class="col-xs-6 no-pr">

                                <h5>تاريخ الميلاد : <span class="boldic"> <?= $date_birth?> </span></h5>
                            </div>
                            <div class="col-xs-6 no-pl">
                                <h5>العمر : <span class="boldic"> <?= $age?> </span></h5>
                            </div>
                        </div>




                        <div class="record">
                        <div class="col-xs-6 no-pr">
                            <h5>نوع الكفالة : </h5>
                        </div>
                        <div class="col-xs-6 no-pl">
                            <h5 class="boldic answer"> <?=$row->kafala_name?></h5>
                        </div>
                    </div>


                    <div class="record">
                        <div class="col-xs-6 no-pr">
                            <h5>بداية الكفالة : </h5>

                        </div>
                        <div class="col-xs-6 no-pl">
                            <h5 class="boldic "> <?= date('Y/m/d',strtotime($row->first_date_from_ar)).' '.'م'?></h5>
                        </div>
                    </div>

                    <div class="record">
                        <div class="col-xs-6 no-pr">
                            <h5>نهاية الكفالة : </h5>
                        </div>
                        <div class="col-xs-6 no-pl">
                            <h5 class="boldic "> <?= date('Y/m/d',strtotime($row->first_date_to_ar)).' '.'م' ?></h5>
                        </div>
                    </div>

                    <div class="record">
                        <div class="col-xs-6 no-pr">
                            <div class="barcode">
                                <img src="<?= base_url()?>asisst/admin_asset/img/pills/qrcode.png">
                            </div>
                        </div>
                        <div class="col-xs-6 no-pl text-center">

                            <h5>  <i class="fa fa-mobile" aria-hidden="true"></i> للتواصل  </h5>
                            <!--<h5 class=" boldic">0553851511</h5>-->
                               <!--
                               <h5 class=" boldic">
  <img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="40" alt="966553851511">
                            <span>966553851511+ </span>   <span><i style="color: #015c8e !important; font-size: 30px !important;" class="fa fa-male" aria-hidden="true"></i></span>                               
                            -->
                            
                             <h5 class=" boldic">
                            <a style="font-size: 20px !important;" href="https://wa.me/966553851511" target="_blank" style="float:left;margin-left: 58px;">
            				<img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="40" alt="966553851511">
                            <span>966553851511</span> <span> <i style="color: #015c8e !important; font-size: 30px !important;" class="fa fa-male" aria-hidden="true"></i></span></a>
                            
                            </h5>
                               <h5 class=" boldic">
   <!--
    		<img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="40" alt="966553851411">
                            <span>966553851411+ </span>   <span><i style="color: #015c8e !important; font-size: 30px !important;" class="fa fa-female" aria-hidden="true"></i></span>                           
-->


                            <a style="font-size: 20px !important;" href="https://wa.me/966553851411" target="_blank" style="float:left;margin-left: 58px;">
            				<img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="40" alt="966553851411">
                            <span>966553851411 </span>   <span><i style="color: #015c8e !important; font-size: 30px !important;" class="fa fa-female" aria-hidden="true"></i></span> </a>
                            
                            </h5>
                            
                        </div>
                      </div>

                        <?php
                    }
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/custom.js"></script>

<script language="javascript" type="text/javascript">
/*
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
        window.close();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
    */
</script>

