<style type="text/css">
    .bs-callout {
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

    .bs-callout .sidebar .panel-success > .panel-heading {
        background-color: #95c11f;
        border-color: #d6e9c6;
        background-image: none;
        color: #002542;
        margin: 0;
    }

    .bs-callout .sidebar .panel-success > .panel-heading h5 {
        margin: 0
    }

    .bs-callout .sidebar ul li {
        padding: 7px 5px;
    }

    .bs-callout .sidebar ul li a {
        color: #002542;
        font-size: 16px;

    }

    hr {
        margin-top: 5px;
        margin-bottom: 7px;
        border: 0;
        border-top: 1px solid #eee;
    }

    .panel-success > .panel-heading {
        color: #3c763d;
        background-color: #96c73e;
        border-color: #d6e9c6;
        background-image: none;
        color: #002542;
    }

    .panel-success > .panel-heading h5 {
        margin: 0
    }

    .panel-group .panel-heading .panel-title a {
        font-size: 18px;
        color: #002542;
    }

    .md-content h3 {
        background: #96c73e;
    }

    .btn-rounded {
        border-radius: 2em;
    }

    .btn-warning:after {
        content: "";
        position: absolute;
        left: 0;
        width: 0;
        transition: 0.3s all ease-in;

    }

    .btn-warning:hover:after {
        width: 100%;
        background-color: #96c73e;

    }


    .button8 {
        color: rgba(255, 255, 255, 1);
        -webkit-transition: all 0.5s;
        -moz-transition: all 0.5s;
        -o-transition: all 0.5s;
        transition: all 0.5s;
        border: 1px solid rgba(255, 255, 255, 0.5);
        position: relative;
        border-radius: 2em:
    }

    .button8 a {
        color: rgba(51, 51, 51, 1);
        text-decoration: none;
        display: block;
    }

    .button8 span {
        z-index: 2;
        /* display: block; */
        /* position: absolute; */
        width: 100%;
        height: 100%;
        color: #fff;
        position: relative;
    }

    .button8::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0%;
        height: 100%;
        z-index: 1;
        opacity: 0;
        background-color: rgba(150, 199, 62, 0.9);
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
        border-radius: 30px;


    }

    .button8:hover::before {
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

    .profile-sidebar .nav > li > a {

        padding: 10px 4px;
    }

    .profile-sidebar .panel-body {
        padding: 5px;
    }

    .profile-sidebar .btn-compose-email {
        font-size: 18px;
        margin-bottom: 15px;
    }

    .profile-sidebar .nav-pills > li.active > a,
    .profile-sidebar .nav-pills > li.active > a:hover,
    .profile-sidebar .nav-pills > li.active > a:focus {
        color: #fff;
        background-color: #96c73e;
    }

    .panel-default .panel-heading {
        background: rgba(226, 226, 226, 1);
        background: -moz-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(226, 226, 226, 1)), color-stop(35%, rgba(219, 219, 219, 1)), color-stop(60%, rgba(209, 209, 209, 1)), color-stop(100%, rgba(254, 254, 254, 1)));
        background: -webkit-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        background: -o-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        background: -ms-linear-gradient(top, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        background: linear-gradient(to bottom, rgba(226, 226, 226, 1) 0%, rgba(219, 219, 219, 1) 35%, rgba(209, 209, 209, 1) 60%, rgba(254, 254, 254, 1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e2e2e2', endColorstr='#fefefe', GradientType=0);

    }

</style>
<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php
                $data['id_page']=$id_page;
                $data['name_page']=$name_page;
                $this->load->view('web/family_profile/profile_sidebar',$data); ?>
            </div>
            <div class="col-sm-9">

                <!-- resumt -->

                <div class="panel panel-success ">
                    <div class="panel-heading resume-heading">
                        <h5>طلب خدمة</h5>
                    </div>
                    <div class="bs-callout bs-callout-danger">
                    <div class="col-md-12">
                        <div class="col-sm-6 col-md-3 padding-4">
                            <label class="label label-green  ">تقارير مساعدة </label>
                            <select name="" id="help_typ" class="form-control input-style" data-validation="required">
                                <option value="">-إختر-</option>
                                <option value="1">مساعدة مالية</option>
                                <option value="2">مساعدة عينية</option>
                                <option value="3">الكل</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-3 padding-4">
                            <label class="label label-green  ">من </label>
                            <input type="date" id="from_date_sarf" value="" name="" class="form-control input-style" placeholder=""
                                   data-validation="required">
                        </div>
                        <div class="col-sm-6 col-md-3 padding-4">
                            <label class="label label-green  ">إلي </label>
                            <input type="date" id="to_date_sarf" value="" name="" class="form-control input-style" placeholder=""
                                   data-validation="required">
                        </div>

                        <div class="col-sm-6 col-md-3 padding-4">
                            <button type="submit" onclick="show_sarf_table(document.getElementById('help_typ'))" class="btn btn-success">بحث</button>
                        </div>
                    </div>
                    </div>

                        <div class="col-sm-12" id="table_sarf" >

                        </div>



                </div>

            </div>

            <!-- resume -->

        </div>
    </div>
    <div class="modal fade " id="modal-sm-data" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-success modal-lg " role="document" style="width:80%;">
            <div class="modal-content ">
                <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.9;">
                        <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">تفاصيل الصرف </h3>
                </div>
                <div class="modal-body ">
                    <div id="option_details">

                    </div>
                </div>
                <div class="modal-footer " style="display: inline-block; width: 100%;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>

        </div>

    </div>
</section>
<script>
    function show_sarf_table(obj) {
        console.log('select value = '+obj.value);
        if((obj.value =='')){
            alert('من فضلك نوع مساعدة ');
            return false;
        }
    if(obj.value == 1){
        var  from_date_sarf=document.getElementById('from_date_sarf').value;
        var  to_date_sarf=document.getElementById('to_date_sarf').value;
        if((from_date_sarf =='')||(to_date_sarf == '')){
            alert('من فضلك ادخل فترة زمنية من إلى صحيحة');
            return false;
        }
        console.log('from value = '+from_date_sarf);
        console.log('to value = '+to_date_sarf);
        var mother_num='<?=$_SESSION['mother_national_num']?>';
        var request = $.ajax({
            url: "<?php echo base_url() . 'web/get_data_sarf_report'?>",
            type: "POST",
            data: {from: from_date_sarf,to:to_date_sarf, mother_national_num: mother_num},
        });
        request.done(function (msg) {
            $('#table_sarf').html(msg);
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }
    }

    function get_details(sarf_num, mother_num) {
        var request = $.ajax({
            url: "<?php echo base_url() . 'web/get_dtailes'?>",
            type: "POST",
            data: {sarf_num: sarf_num, mother_national_num: mother_num},
        });
        request.done(function (msg) {
            $('#option_details').html(msg);
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }


</script>

