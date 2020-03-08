



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
                        <h5> إضافة تفاصيل الكفالة</h5>
                    </div>
                    <br>
                    <div class="bs-callout bs-callout-danger" >

                        <?php
                        echo form_open('Web/add_kaflat/'.$_SESSION['k_num'])
                        ?>

                        <button type="button" value="" id="" onclick="add_kafala_row()" class="btn btn-success btn-next"/>
                        <i class="fa fa-plus"> </i>  إضافة تفاصيل الكفالة </button><br><br>
                        <table   class="table table-striped table-bordered fixed-table "    <?php if(empty($result->details)){ ?>
                            style="display: none; "  <?php } ?>  id="kafala_table" >
                            <thead>
                            <tr class="info">
                                <th style="width: 12%"  class="text-center" >نوع الكفالة</th>
                                <th style="width: 12%"  class="text-center" >عدد الافراد</th>
                                <th style="width: 20%;" class="text-center" > مدة الكفاله</th>
                                <th class="text-center" >المبلغ</th>
                                <th class="text-center" > الاجمالي </th>
                                <th style="width: 140px" class="text-center" > طريقة السداد </th>

                                <th class="text-center" > الإجراء</th>
                            </tr>
                            </thead>
                            <tbody id="kafala_table_rows">
                            <?php if(!empty($result->details)){
                                foreach ($result->details as $row_detail){
                                    ?>
                                    <tr >
                                        <td style=" width:12%;text-align: center!important;">


                                            <select name="" id="" data-validation="required" class=" form-control" disabled="disabled" >
                                                <option value="">إختر</option>
                                                <?php
                                                if(!empty($kfalat_types) && isset($kfalat_types)) {
                                                    foreach ($kfalat_types as $kfala){
                                                        $select = '';
                                                        if($row_detail->kafala_type == $kfala->id){
                                                            $select = 'selected';
                                                        }?>
                                                        <option <?=$select?> value="<?php echo $kfala->id;?>"
                                                        ><?php echo $kfala->title;?></option>
                                                    <?php   } } ?>
                                            </select></td>
                                        <td style="width:7%;text-align: center!important;">
                                            <input type="text" value="<?=$row_detail->member_num?>" class="form-control" data-validation="required" disabled="disabled" >
                                        </td>
                                        <td style="width:7%;text-align: center!important;">
                                            <?php  $kafala_period = array(
                                                '1' => 'شهر', '2' => 'شهرين', '3' => '3 أشهر', '4' => '4 أشهر', '5' => '5 أشهر','6' => '6 أشهر',
                                                '7' => '7 أشهر', '8' => '8 أشهر','9' => '9 أشهر','10' => '10 أشهر','11' => '11 أشهر','12' => 'سنة',

                                            );
                                            ?>
                                            <select   data-validation="required" class=" form-control" disabled="disabled" >
                                                <option value="">إختر</option>
                                                <?php
                                                foreach ($kafala_period as $key=>$value){
                                                    $select = '';
                                                    if($row_detail->kafala_period == $key){
                                                        $select = 'selected';
                                                    }
                                                    ?>
                                                    <option <?=$select?> value="<?= $key?>"><?= $value?></option>
                                                <?php }?>


                                            </select>
                                        </td>

                                        <td style="width:10%;text-align: center!important;">
                                            <input type="text" value="<?=$row_detail->kafala_value?>" class="form-control" disabled="disabled"   data-validation="required" >
                                        </td>

                                        <td style="width:21%;text-align: center!important;">
                                            <input type="text" value="<?=$row_detail->all_kafala_value?>" readonly="readonly" class="form-control"   data-validation="required" >

                                        </td>
                                        <td style=" width:15%;text-align: center!important;">

                                            <select   data-validation="required" disabled="disabled" class=" form-control" >
                                                <option value="">إختر</option>
                                                <?php $pay_method_arr =array('إختر','نقدي','شيك','إيداع نقدي','إيداع شيك','تحويل','شبكة','أمر مستديم');
                                                if(isset($pay_method_arr)&&!empty($pay_method_arr)) {
                                                    for($a=1;$a<sizeof($pay_method_arr);$a++){
                                                        ?>
                                                        <option value="<?php echo$a;?>"
                                                            <?php if(!empty($pay_method_arr)){
                                                                if($a == $row_detail->pay_method ){ echo 'selected'; }
                                                            } ?>> <?php echo $pay_method_arr[$a];?></option >
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td style="text-align: center!important;">
                                            <?php   $link ='onclick="modalLlink('.$row_detail->id.','.$result->id.');"';  ?>
                                            <a data-toggle="modal" <?= $link ?> data-target="#modal-delete"
                                               title="حذف"> <i class="fa fa-trash"
                                                               aria-hidden="true"></i> </a>

                                            <a type="button" class="" data-toggle="modal" data-target="#myModal<?=$row_detail->id?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                        </td>


                                    </tr>

                                <?php } } ?>

                            </tbody>

                        </table>

                    </div>

                    <div class="form-group col-md-4 col-sm-6 padding-4" id="show_save" style="display: none">

                        <button type="submit" id="save" name="add" value="addSponsor_maindata"
                                class="btn btn-success">
                            <span><i class="fa fa-floppy-o"></i></span> حفظ الطلب
                        </button>
                    </div>



                </div>
                <?php
                echo form_close();
                ?>
            </div>




        </div>
    </div>

</section>

<script>

    function add_kafala_row() {

//            var x=document.getElementById('sdds').cloneNode(true);  //get the table
//         $("#resultTable").append(x);

        $("#kafala_table").show();
        $("#show_save").show();
        var x = document.getElementById('kafala_table_rows');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>Web/getkafalaRow',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#kafala_table_rows").append(html);
            }
        });

    }
</script>



