



<style type="text/css">
    .bs-callout{
        display: inline-block;
        width: 100%;
        padding: 0 5px 5px 0;
    }
    .bs-callout label {
        font-size: 16px;
        margin-bottom: 0px;
        color: #002542;
        display: block;
        text-align: right;
    }
    .bs-callout .title {
        margin: 23px 0 0 0;
        padding: 8px 5px 8px 0;
        background-color: #95c11f;
        font-size: 18px;
        color: #002542;
        border-radius: 4px;
    }
    .bs-callout .sidebar .panel-success>.panel-heading {
        background-color: #95c11f;
        border-color: #d6e9c6;
        background-image: none;
        color: #002542;
        margin: 0;
    }
    .bs-callout .sidebar .panel-success>.panel-heading h5{
        margin: 0
    }

    .bs-callout .sidebar ul li {
        padding: 7px 5px;
    }
    .bs-callout .sidebar ul li a{
        color: #002542;
        font-size: 16px;

    }
    hr {
        margin-top: 5px;
        margin-bottom: 7px;
        border: 0;
        border-top: 1px solid #eee;
    }
    .panel-success>.panel-heading {
        color: #3c763d;
        background-color: #96c73e;
        border-color: #d6e9c6;
        background-image: none;
        color: #002542;
    }
    .panel-success>.panel-heading h5{
        margin: 0
    }
    .panel-group .panel-heading .panel-title a{
        font-size: 18px;
        color: #002542;
    }
    .md-content h3{
        background: #96c73e;
    }
    .btn-rounded {
        border-radius: 2em;
    }
    .btn-warning:after{
        content: "";
        position: absolute;
        left: 0;
        width: 0;
        transition: 0.3s all ease-in;

    }
    .btn-warning:hover:after{
        width: 100%;
        background-color: #96c73e;

    }



    .button8{
        color: rgba(255,255,255,1);
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        border: 1px solid rgba(255,255,255,0.5);
        position: relative;
        border-radius: 2em:
    }
    .button8 a{
        color: rgba(51,51,51,1);
        text-decoration: none;
        display: block;
    }
    .button8 span{
        z-index: 2;
        /* display: block; */
        /* position: absolute; */
        width: 100%;
        height: 100%;
        color: #fff;
        position: relative;
    }
    .button8::before{
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0%;
        height: 100%;
        z-index: 1;
        opacity: 0;
        background-color: rgba(150,199,62,0.9);
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
        border-radius: 30px;



    }
    .button8:hover::before{
        opacity: 1;
        width: 100%;

    }
    .profile-sidebar {
        background-color: #fff;
        border: 1px solid #eee;
        padding: 5px;
        border-radius: 6px;
        box-shadow: -2px 2px 8px #999;
    }
    .profile-sidebar .nav>li>a {

        padding: 10px 4px;
    }

    .profile-sidebar .panel-body {
        padding: 5px;
    }
    .profile-sidebar .btn-compose-email{
        font-size: 18px;
        margin-bottom: 15px;
    }
    .profile-sidebar .nav-pills>li.active>a,
    .profile-sidebar .nav-pills>li.active>a:hover,
    .profile-sidebar .nav-pills>li.active>a:focus {
        color: #fff;
        background-color: #96c73e;
    }

    .panel-default .panel-heading{
        background: rgba(226,226,226,1);
        background: -moz-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 35%, rgba(209,209,209,1) 60%, rgba(254,254,254,1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(226,226,226,1)), color-stop(35%, rgba(219,219,219,1)), color-stop(60%, rgba(209,209,209,1)), color-stop(100%, rgba(254,254,254,1)));
        background: -webkit-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 35%, rgba(209,209,209,1) 60%, rgba(254,254,254,1) 100%);
        background: -o-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 35%, rgba(209,209,209,1) 60%, rgba(254,254,254,1) 100%);
        background: -ms-linear-gradient(top, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 35%, rgba(209,209,209,1) 60%, rgba(254,254,254,1) 100%);
        background: linear-gradient(to bottom, rgba(226,226,226,1) 0%, rgba(219,219,219,1) 35%, rgba(209,209,209,1) 60%, rgba(254,254,254,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe', GradientType=0 );

    }

    .open_green{
        background-color: #eeffcf;
    }
    .table-ft th,.table-ft td{
        font-size: 16px;
        color: #002542;
    }
</style>
<?php // echo $_SESSION['k_num'];?>
<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="profile-sidebar">
                    <a href="<?= base_url()."Web/logout"?>" class="btn btn-danger btn-block btn-compose-email"><i class="fa fa-sign-out"></i> تسجيل الخروج </a>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="sidebar-heading">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSide1" aria-expanded="true" aria-controls="collapseSide1">
                                        البيانات
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSide1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="sidebar-heading">
                                <div class="panel-body">
                                    <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
                                        <li>
                                            <a href="<?= base_url()."Web/profile"?>">
                                                <i class="fa fa-list"></i> بيانتي <span class="label pull-right">7</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?= base_url()."Web/kafel_details_edit/".$_SESSION['k_num']?>">
                                                <i class="fa fa-cog"></i> إعدادات الحساب
                                            </a>
                                        </li>



                                    </ul><!-- /.nav -->
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="sidebar-heading2">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSide2" aria-expanded="false" aria-controls="collapseSide2">
                                        بيانات الكفالات
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSide2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sidebar-heading2">
                                <div class="panel-body">
                                    <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                                        <li class="active">
                                            <a href="<?= base_url()."Web/add_kaflat/".$_SESSION['k_num']?>">
                                                <i class="fa fa-plus"></i> إضافة كفالة
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-question"></i> طلب تغيير حساب
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url()."Web/kafalt_data/".$_SESSION['k_num']?>">
                                                <i class="fa fa-question"></i> بيانات الكفالات
                                            </a>
                                        </li>

                                    </ul><!-- /.nav -->
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="sidebar-heading3">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSide3" aria-expanded="false" aria-controls="collapseSide3">
                                        التقارير
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSide3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sidebar-heading3">
                                <div class="panel-body">
                                    <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                                        <li><a href="<?= base_url()."Web/sponsors_pill/".$_SESSION['k_num']?>"> <i class="fa fa-file-o"></i> تقارير التسديدات</a></li>
                                        <li><a href="#"> <i class="fa fa-file-o"></i> تقارير المصروفات</a>
                                        </li>



                                    </ul><!-- /.nav -->
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="sidebar-heading4">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSide4" aria-expanded="false" aria-controls="collapseSide4">
                                        الإشعارات
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSide4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sidebar-heading4">
                                <div class="panel-body">
                                    <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                                        <li>
                                            <a href="#"><i class="fa fa-bell"></i> إشعارات التسديدات <span class="label label-info pull-right inbox-notification">5</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-bell"></i> إشعارات المصروفات <span class="label label-info pull-right inbox-notification">5</span></a>
                                        </li>


                                    </ul><!-- /.nav -->
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="sidebar-heading5">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSide5" aria-expanded="false" aria-controls="collapseSide5">
                                        تواصل معنا
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSide5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sidebar-heading5">
                                <div class="panel-body">
                                    <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                                        <li>
                                            <a href="#"><i class="fa fa-envelope-o"></i> الدردشة </a>
                                        </li>


                                    </ul><!-- /.nav -->
                                </div>
                            </div>
                        </div>

                    </div>




                </div>
            </div>
            <div class="col-sm-9 padding-4">

                <!-- resumt -->
                <div class="panel panel-success ">
                    <div class="panel-heading resume-heading">
                        <h5>بيانات الكفالة</h5>
                    </div>

                    <div class="bs-callout bs-callout-danger" >
                        <?php
                        if (isset($kafal_details) && !empty($kafal_details)){
                            foreach ($kafal_details as $kafal_details){
                                ?>



                        <table class="table table-bordered table-ft" style="table-layout: fixed;">
                            <tbody>



                            <tr>
                                <th style="width: 20%" class="open_green">اسم المستفيد</th>
                                <td><?= $kafal_details->person_name?></td>
                                <!--
                                <th style="width: 20%" class="open_green">التفاصيل </th>
                                <td></td> -->
                            </tr>
                            <tr>

                                <th style="width: 20%" class="open_green">نوع الكفالة </th>
                                <td  style="background-color: <?php echo $kafal_details->kafala_color;   ?>;">
                                    <?php echo $kafal_details->kafala_name;   ?>
                                </td>

                                <th style="width: 20%" class="open_green">حالة الكفالة</th>
                                <td style="background-color: <?php echo $kafal_details->halet_kafel_color;   ?>;">
                                    <?php echo $kafal_details->halet_kafel_title;   ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 20%" class="open_green">بداية الكفالة</th>
                                <td>
                                    <?php echo $kafal_details->first_date_from_ar;   ?>
                                </td>
                                <th style="width: 20%" class="open_green">	نهاية الكفالة </th>
                                <td>
                                    <?php echo $kafal_details->first_date_to_ar;   ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 20%" class="open_green"> قيمة الكفالة	</th>
                                <td>
                                    <?php echo $kafal_details->first_value;   ?>
                                </td>
                                <th style="width: 20%" class="open_green"> طريقة التوريد </th>
                                <td>
                                    <?php
                                    $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
                                    if(!empty($pay_method_arr[ $kafal_details->pay_method])){
                                        echo $pay_method_arr[ $kafal_details->pay_method]; }?>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 20%" class="open_green"> متبقي علي انتهاء الكفالة</th>
                                <td>
                                    <?php
                                    $startDate = strtotime("now");
                                    $endDate = $kafal_details->first_date_to;
                                    $seconds_left = ($endDate - $startDate);
                                    $days_left = floor($seconds_left / 3600 / 24);
                                    //echo $days_left;
                                    if($days_left >= 0){
                                        $class_days_left = 'success';
                                    }elseif($days_left < 0){
                                        $class_days_left = 'danger';
                                    }


                                    ?>

                                    <button type="button" class="btn btn-sm btn-<?php echo $class_days_left; ?> btn-rounded">
                                        <i style="color: white;" class="fa fa-cog fa-spin"></i>
                                        <?php echo $days_left;



                                        ?> &nbsp;  أيام   </button>
                                </td>


                            </tbody>

                        </table>
                        <?php
                            }
                        }

                        ?>

                    </div>


                </div>
            </div>
            <!-- resume -->

        </div>
    </div>

</section>


