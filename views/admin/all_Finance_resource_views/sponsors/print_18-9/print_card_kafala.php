
<style>
    body {
        font-family: 'Cairo', sans-serif;
    }

    .no-padding {
        padding: 0;
    }

    .profile-card-3 {
        position: relative;
        overflow: hidden;
        width: 100%;
        border: none;
        max-width: 400px;
    }

    .profile-card-3 .background-block {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .profile-card-3 .background-block .background {
        width: 147%;
        opacity: 0.9;
    }

    .profile-card-3 .card-content {
        width: 100%;
        padding: 1px 12px;
        color: #232323;
        background: #eee;
        border-radius: 0 0 5px 5px;
        position: relative;
        min-height: 100px;
        z-index: 9999;
    }

    .profile-card-3 .card-content::before {
        content: '';
        background: #eee;
        width: 120%;
        height: 100%;
        left: 11px;
        bottom: 51px;
        position: absolute;
        z-index: -1;
        transform: rotate(-13deg);
    }

    .profile-card-3 .profile {
        border-radius: 50%;
        position: absolute;
        bottom: 64%;
        left: 84%;
        max-width: 100px;
        opacity: 1;
        box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
        border: 2px solid rgba(255, 255, 255, 1);
        -webkit-transform: translate(-50%, 0%);
        transform: translate(-50%, 0%);
        z-index: 99999;
    }

    .card-content h3 {
        margin: 0;
        font-size: 19px;
        font-weight: bold;
    }

    .card-content table {
        margin: 10px 0;
    }

    .card-content table h4 {
        font-size: 14px;
    }

    .card-content table td {
        padding-right: 12px;
    }

    .card-define {
        background-color: #fff;
        border-radius: 20px;
        margin: 20px 0;
    }

    .border-left {
        border-left: 2px solid #eee;
    }

</style>
<div id = "printdiv" >
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <body>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12"></div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="card profile-card-3 center-block">
                        <div class="background-block">
                            <img src="<?php echo base_url()?>uploads/images/profile-bg.jpg" alt="profile-sample1" class="background" />
                        </div>
                        <div class="profile-thumb-block">
                            <img src="<?php echo base_url();?>uploads/images/logo.png"alt="profile-image" class="profile" />
                        </div>


                        <div class="card-content col-xs-12">
                            <h3 class="text-center"> كارت كفالة</h3>
                            <div class="col-xs-12 no-padding card-define">
                                <table width="100%">
                                    <?php
                                   if (isset($all_kafalat) &&!empty($all_kafalat)){
                                    $gender = 'ذكر';
                                       foreach ($all_kafalat as $row){
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

                                            <tr>
                                                <td class="border-left">
                                                    <h4> رقم الكافل </h4>

                                                </td>
                                                <td>
                                                  <h4><?php if (!empty($result->k_num)) {
                                                            echo $result->k_num;
                                                        } else {
                                                            echo 'غير محدد';
                                                        } ?> </h4>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border-left">
                                                    <h4> إسم الكافل </h4>
                                                </td>
                                                <td>
                                             <h4><?php if (!empty($result->k_name)) {
                                                            echo $result->k_name;
                                                        } else {
                                                            echo 'غير محدد';
                                                        } ?> </h4>

                                                </td>

                                            <tr>


                                                <td class="border-left">
                                                    <h4> إسم المستفيد </h4>
                                                </td>

                                                <td>
                                               <h4><?= $row->person_name?></h4>

                                                </td>
                                            </tr>
                                            <tr>


                                                <td class="border-left">
                                                    <h4> الجنس </h4>
                                                </td>



                                                <td>
                                              <h4><?= $gender?></h4>


                                                </td>
                                            </tr>
                                            <tr>


                                                <td class="border-left">
                                                    <h4> تاريخ الميلاد </h4>
                                                </td>
                                                <?php
                                                if( $row->person_type == 1) {

                                                    $birth_date= $row->person_data['m_birth_date_hijri'];
                                                }else{
                                                    $birth_date=$row->person_data['member_birth_date_hijri'];
                                                }
                                                ?>

                                                <td>
                                                 <h4><?= $birth_date ?> </h4>

                                                </td>
                                            </tr>
                                            <tr>


                                                <td class="border-left">
                                                    <h4> العمر </h4>
                                                </td>


                                                <td>
                                           <h4><?= $age?></h4>


                                                </td>
                                            </tr>
                                            <tr>


                                                <td class="border-left">
                                                    <h4> نوع الكفالة </h4>
                                                </td>

                                                <td>
                                                  <h4><?=$row->kafala_name?></h4>

                                                </td>
                                            </tr>
                                            <tr>


                                                <td class="border-left">
                                                    <h4> بداية الكفالة </h4>
                                                </td>

                                                <td>
                                                      <h4><?= $row->first_date_from_ar

                                                   ?> </h4>

                                                </td>
                                            </tr>
                                            <tr>


                                                <td class="border-left">
                                                    <h4> نهاية الكفالة </h4>
                                                </td>

                                                <td>
                                                    <h4><?= $row->first_date_to_ar?></h4>

                                                </td>
                                            </tr>


                                            </tr>







                                 



                                </table>

                            </div>
                            <div class="col-xs-12 no-padding" style="margin-bottom: 20px;">
                                <img src="<?php echo base_url()?>uploads/images/barcode.png" alt="" width="55px" class="pull-right">
                                <h5 class="pull-left" style="margin: 0;line-height: 26px;font-weight: bold;"> الجمعية الخيرية لرعاية الأيتام <br> ببريــــدة ( أبنـــــاء ) رقـــم (463)</h5>
                            </div>
<?php
}
}
?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js "></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js "></script>



<script >

    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
    setTimeout(function () {
        window.location.href ="<?php echo base_url();?>all_Finance_resource/sponsors/Sponsor/addKfala_data/"+'<?php if (!empty($result->k_num)) {
                echo $result->k_num;
            }
             ?>';
    },2000);

</script >

