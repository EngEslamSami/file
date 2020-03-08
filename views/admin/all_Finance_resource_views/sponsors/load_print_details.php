<style type="text/css">

.cart-print .cart-kafel {
    width: 400px;
    margin: auto;
    border: 1px solid #eee;
}
.cart-kafel-details {
    padding: 0 15px;
}
.record h5 {
    font-size: 14px !important;
    line-height: 5px !important;
    font-weight: bold !important;
}
.record {
    display: inline-block;
    width: 100%;
    margin-bottom: 1px;
}


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
        height: 180px;
    }
    .cart-print{

    }
   
    .record .answer{
        color: #96c73e;
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
        max-height: 85px;
    }


@media print {
  a[href]:after {
    content: none !important;
      display: none;
      visibility: hidden;
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
        margin-bottom: 14px
    }
    .record h5 {
        font-size: 22px !important;
        line-height: 5px !important;
        font-weight: bold !important;
    }
}
</style>
<section class="cart-print">
    <div class="col-xs-12">
        <div class="col-sm-6">
            <div class="cart-kafel" id="image-wrap">
                <figure class="cart-kafel-header">
                    <img src="<?= base_url()?>asisst/admin_asset/img/pills/card-kafel-header.png">
                </figure>
                <div class="cart-kafel-details">
                    <input type="hidden" id="kafel_id" value="<?= $kafel_id?>">
                    <input type="hidden" id="kafala_id" value="<?= $kafala_id?>">
                    <?php
                    /*
                    print_r($result);
                    echo '<pre>';
                    print_r($all_kafalat);*/
                    
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
                                <h5>   إسم الكافل <b>:</b>
                                <span class="answer boldic">
                                    <?php if (!empty($result->k_name)) {
                                        echo $result->k_name;
                                    } else {
                                        echo 'غير محدد';
                                    } ?>
                                </span>
                                </h5>
                            </div>
    
    
                            <div class="record">
                                <div class="col-xs-6 no-pr">
                                    <h5>رقم الكافل <b>:</b> <span class="boldic"> <?php if (!empty($result->k_num)) {
                                                echo $result->k_num;
                                            } else {
                                                echo 'غير محدد';
                                            } ?></span></h5>
                                </div>
                                <div class="col-xs-6 no-pl">
                                    <h5>رقم الملف <b>:</b> <span class="boldic"> <?= $file_num?></span></h5>
                                </div>
                            </div>
                            <div class="record">
                                <div class="col-xs-6 no-pr">
                                    <h5>إسم المكفول <b>:</b> <span class="answer boldic"><?php echo word_limiter( $row->person_name,1)?></span></h5>
                                </div>
                                <div class="col-xs-6 no-pl">
                                    <h5>الجنس <b>:</b> <span class="boldic"> <?=  $gender?> </span></h5>
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
    
                                    <h5>تاريخ الميلاد <b>:</b> <span class="boldic"> <?= $date_birth?> </span></h5>
                                </div>
                                <div class="col-xs-6 no-pl">
                                    <h5>العمر <b>:</b> <span class="boldic"> <?= $age?> </span></h5>
                                </div>
                            </div>
    
    
    
    
                            <div class="record">
                                <div class="col-xs-6 no-pr">
                                    <h5>نوع الكفالة <b>:</b> </h5>
                                </div>
                                <div class="col-xs-6 no-pl">
                                    <h5 class="boldic answer"> <?=$row->kafala_name?></h5>
                                </div>
                            </div>
    
    
                            <div class="record">
                                <div class="col-xs-6 no-pr">
                                    <h5>بداية الكفالة <b>:</b> </h5>
    
                                </div>
                                <div class="col-xs-6 no-pl">
                                    <h5 class="boldic "> <?= date('Y/m/d',strtotime($row->first_date_from_ar)).' '.'م'?></h5>
                                </div>
                            </div>
    
                            <div class="record">
                                <div class="col-xs-6 no-pr">
                                    <h5>نهاية الكفالة <b>:</b> </h5>
                                </div>
                                <div class="col-xs-6 no-pl">
                                    <h5 class="boldic "> <?= date('Y/m/d',strtotime($row->first_date_to_ar)).' '.'م' ?></h5>
                                </div>
                            </div>
    
                            <div class="record">
                                <div class="col-xs-5 no-pr">
                                    <div class="barcode">
                                        <img src="<?= base_url()?>asisst/admin_asset/img/pills/qrcode.png">
                                    </div>
                                </div>
                                <div class="col-xs-7 no-pl text-center">
    
                                <h5>  <i class="fa fa-mobile" aria-hidden="true"></i> للتواصل  </h5>
                                <!--<h5 class=" boldic">0553851511</h5>-->
                                   <!--
                                   <h5 class=" boldic">
      <img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="40" alt="966553851511">
                                <span>966553851511+ </span>   <span><i style="color: #015c8e !important; font-size: 30px !important;" class="fa fa-male" aria-hidden="true"></i></span>                               
                                -->
                                 <h5 class=" boldic" style="margin: 0;">
                                
                                    <a style="font-size: 16px !important;" href="https://wa.me/966553851511" target="_blank" style="float:left;margin-left: 58px;">
                    				<img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="30" alt="966553851511">
                                    <span>966553851511</span> <span> <i style="color: #015c8e !important; font-size: 30px !important;" class="fa fa-male" aria-hidden="true"></i></span></a>
                                    
                                </h5>
                                   <h5 class=" boldic" style="margin: 0;">
       <!--
        		<img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="40" alt="966553851411">
                                <span>966553851411+ </span>   <span><i style="color: #015c8e !important; font-size: 30px !important;" class="fa fa-female" aria-hidden="true"></i></span>                           
    -->
    
    
                                <a style="font-size: 16px !important;" href="https://wa.me/966553851411" target="_blank" style="float:left;margin-left: 58px;">
                				<img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="30" alt="966553851411">
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
        <div class="col-sm-6 text-center">
        <!----------------------------------------->
<table class="table table-striped" cellspacing="0">
            <thead>
                <tr>
                    <th style="font-size: 16px;text-align: center;color: #195f87;" colspan="3">
                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>

                    بيانات التواصل</th>
                   
                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><h5 style="font-size: 16px;font-weight: bold;">
                     <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                    جوال القسم الرجالي</h5></td>
                    <td>    <h5 class=" boldic">
                                    
                    <a title="جوال القسم الرجالي" style="font-size: 16px !important;" href="https://wa.me/966553851511" target="_blank" style="float:left;margin-left: 58px;">
    				<img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="30" alt="966553851511">
                    <span>966553851511</span> <span> <i style="color: #015c8e !important; font-size: 30px !important;" class="fa fa-male" aria-hidden="true"></i></span></a>
                    
                </h5></td>
                
                </tr>
                <tr>
                     <td><h5 style="font-size: 16px;font-weight: bold;">
                      <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                     جوال القسم النسائي</h5></td>
                    <td> <h5 class=" boldic">
                                
                <a title="جوال القسم النسائي" style="font-size: 16px !important;" href="https://wa.me/966553851411" target="_blank" style="float:left;margin-left: 58px;">
				<img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="30" alt="966553851411">
                <span>966553851411</span> <span> <i style="color: #015c8e !important; font-size: 30px !important;" class="fa fa-female" aria-hidden="true"></i></span></a>
                
            </h5></td>
                 
                </tr>
                <tr>
                   <td> 
                   <h5 style="font-size: 16px;font-weight: bold;">
                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                   للتواصل مع الكافل </h5>
                   </td>
                    <td>       <h5 class=" boldic">

                <a title="جوال الكافل/ـة" style="font-size: 16px !important;" href="https://wa.me/<?php if (!empty($result->k_mob)) {
        echo '966'.$result->k_mob;
    } else {
        echo 'غير محدد';
    } ?>" target="_blank" style="float:left;margin-left: 58px;">
    			<img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="30" alt="<?php if (!empty($result->k_mob)) {
        echo '966'.$result->k_mob;
    } else {
        echo 'غير محدد';
    } ?>">
                <span><?php if (!empty($result->k_mob)) {
        echo '966'.$result->k_mob;
    } else {
        echo 'غير محدد';
    } ?> </span>   <span><i style="color: #015c8e !important; font-size: 30px !important;" class="fa fa-female" aria-hidden="true"></i></span> </a>
                
            </h5></td>
                </tr>
            </tbody>
        </table>
        
        
          <div class="text-center">
             <button type="button" class="btn btn-success" id="saveCard"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> جارى التحميل">تحميل الكارت</button>
             <p style="font-family: 'hl';">برجاء الضغط مرة واحدة وانتظار تجهيز الكارت للتحميل لمدة 15 - 20 ثانية</p>
          </div>
          
        
        
        <!----------------------------------------->
       <!-- <br /><h3>للتواصل : </h3><br />
            <h5 class=" boldic">
                                    
                    <a title="جوال القسم الرجالي" style="font-size: 20px !important;" href="https://wa.me/966553851511" target="_blank" style="float:left;margin-left: 58px;">
    				<img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="40" alt="966553851511">
                    <span>966553851511</span> <span> <i style="color: #015c8e !important; font-size: 30px !important;" class="fa fa-male" aria-hidden="true"></i></span></a>
                    
                </h5>
            <h5 class=" boldic">
                                
                <a title="جوال القسم النسائي" style="font-size: 20px !important;" href="https://wa.me/966553851411" target="_blank" style="float:left;margin-left: 58px;">
				<img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="40" alt="966553851411">
                <span>966553851411</span> <span> <i style="color: #015c8e !important; font-size: 30px !important;" class="fa fa-female" aria-hidden="true"></i></span></a>
                
            </h5>
               <h5 class=" boldic">

                <a title="جوال الكافل/ـة" style="font-size: 20px !important;" href="https://wa.me/<?php if (!empty($result->k_mob)) {
        echo '966'.$result->k_mob;
    } else {
        echo 'غير محدد';
    } ?>" target="_blank" style="float:left;margin-left: 58px;">
    			<img src="<?= base_url()?>asisst/admin_asset/img/icons/wp.png" width="40" alt="<?php if (!empty($result->k_mob)) {
        echo '966'.$result->k_mob;
    } else {
        echo 'غير محدد';
    } ?>">
                <span><?php if (!empty($result->k_mob)) {
        echo '966'.$result->k_mob;
    } else {
        echo 'غير محدد';
    } ?> </span>   <span><i style="color: #015c8e !important; font-size: 30px !important;" class="fa fa-female" aria-hidden="true"></i></span> </a>
                
            </h5>
            -->
            
        </div>
    </div>
</section>




<script src="<?php echo base_url()?>asisst/admin_asset/js/html2canvas.js"></script>
<script>
$("#saveCard").click(function(){
     var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 18000);
   
   
        html2canvas(document.getElementById("image-wrap")).then(function(canvas) {
            var link = document.createElement("a");
            document.body.appendChild(link);
            link.download = "<?php if (!empty($result->k_name)) {
                                        echo $result->k_name;
                                    } else {
                                        echo 'غير محدد';
                                    } ?>.png";
            link.href = canvas.toDataURL();
            link.target = '_blank';
            link.click();
        }); 
});
</script>