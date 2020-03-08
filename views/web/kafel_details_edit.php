



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
<?php
//if (isset($_SESSION['k_num'])){
echo form_open('Web/kafel_details_edit/'.$_SESSION['k_num']);

// }
?>
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
											<a  href="<?= base_url()."Web/profile"?>">
												<i class="fa fa-list"></i> بيانتي <span class="label pull-right">7</span>
											</a>
										</li>

										<li>
                                            <?php
                                            if (isset($_SESSION['k_num'])){
                                                $k_num = $_SESSION['k_num'];
                                            }
                                            ?>

											<a  href="<?= base_url()."Web/kafel_details_edit/".$k_num?>">
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
            <?php
            if (isset($kafel_details)&& !empty($kafel_details) ){
                ?>

			<div class="col-sm-9 padding-4">

				<!-- resumt -->
				<div class="panel panel-success ">
					<div class="panel-heading resume-heading">
						<h5>تعديل البيانات الخاصة بى</h5>
					</div>


					<div class="bs-callout bs-callout-danger" >
						<div class="col-lg-12 col-xs-12 no-padding">
						<?php
                              if(($this->session->flashdata('success'))) {
                            ?>
                            <div class="col-md-12 alert alert-success alert-dismissable">  نجاح !...تمت تعديل البيانات بنجاح </div>

                            <?php
                        }
            ?>

							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">اسم الكافل </label>
								<input type="text" id="k_name" name="k_name" value="<?= $kafel_details[0]->k_name?>"  class="form-control input-style" placeholder="" data-validation="required">
							</div>
							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">الجنس </label>
								<select class="form-control" id="k_gender_fk" name="k_gender_fk">
                                    <option value="">إختر</option>
                                    <?php
                                    if(isset($gender_data)&&!empty($gender_data)) {
                                        foreach($gender_data as $row){?>
                                            <option value="<?php echo $row->id_setting;?>"
                                                <?php if(!empty( $kafel_details[0]->gender)){
                                                    if($row->title_setting==$kafel_details[0]->gender){ echo 'selected'; }
                                                } ?>> <?php echo $row->title_setting;?></option >
                                            <?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">الجنسيه</label>
								<select class="form-control" name="k_nationality_fk">
                                    <option value="">إختر</option>
                                    <?php
                                    foreach($nationality as $row){
                                        ?>
                                        <option value="<?php echo $row->id_setting;?>"
                                            <?php if(!empty( $kafel_details[0]->nationality)){
                                                if($row->title_setting== $kafel_details[0]->nationality){ echo 'selected'; }
                                            } ?>> <?php echo $row->title_setting;?></option >
                                        <?php
                                    }
                                    ?>
								</select>
							</div>
							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">الحالة الاجتماعية</label>
								<select class="form-control" name="social_status_id_fk">
                                    <option value="">إختر</option>
                                    <option value="0">(متوفي)</option>
                                    <?php
                                    if(isset($social_status)&&!empty($social_status)) {
                                        foreach($social_status as $row){
                                            ?>
                                            <option value="<?php echo $row->id_setting;?>"

                                                <?php if(!empty($kafel_details[0]->social_status)){
                                                    if($row->title_setting==$kafel_details[0]->social_status){ echo 'selected'; }
                                                } ?>> <?php echo $row->title_setting;?></option >
                                            <?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">جوال الكافل</label>
								<input type="text" name="k_mob"  class="form-control input-style" placeholder="" data-validation="required"
                                value="<?php if (isset($kafel_details[0]->k_mob)&& $kafel_details[0]->k_mob!=''){echo $kafel_details[0]->k_mob;}?>">
							</div>
							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">المدينة</label>
								<select class="form-control" id="city_id_fk" name="k_city"  onchange="getAhai($(this).val());" >
                                    <option value="">إختر</option>
                                    <?php
                                    if(isset($cities)&&!empty($cities)) {
                                        foreach($cities as $key=>$value){
                                            ?>
                                            <option value="<?php echo$key;?>"<?php if($value==$kafel_details[0]->city){ echo 'selected'; } ?>> <?php echo $value;?></option >
                                            <?php
                                        }
                                    }

                                    ?>
								</select>
							</div>
							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">الحي</label>
								<select class="form-control" id="hai_id_fk" name="k_hai" >
                                    <option value="">إختر</option>
                                    <?php if(isset($kafel_details[0]->hai) && !empty($kafel_details[0]->hai)){
                                        foreach ($ahais as $hay){
                                            $select ='';  if($hay->name == $kafel_details[0]->hai){$select = 'selected';}?>
                                            <option <?= $select?> value="<?=$hay->id ?>"><?=$hay->name ?></option>
                                        <?php } } ?>
								</select>
							</div>
							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">العنوان</label>
								<input type="text" name="k_addres"  class="form-control input-style" placeholder=""
                                       data-validation="required"
                value="<?php if (isset($kafel_details[0]->k_addres)&&  $kafel_details[0]->k_addres != ''){echo  $kafel_details[0]->k_addres;}?>">
							</div>
							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">التخصص</label>
								<select class="form-control" name="k_specialize_fk">
                                    <option value="">اختر</option>
                                    <?php
                                    if(isset($specialize)&&!empty($specialize)) {
                                        foreach($specialize as $row){
                                            ?>
                                            <option value="<?php echo $row->id_setting;?>"
                                                <?php if(!empty($kafel_details[0]->k_specialize_fk)){
                                                    if($row->title_setting==$kafel_details[0]->k_specialize_fk){ echo 'selected'; }
                                                } ?>> <?php echo $row->title_setting;?></option >
                                            <?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">الحياة العملية</label>
								<select class="form-control" name="work_id_fk" id="work_id_fk" >
                                    <option value="">اختر</option>
                                    <?php
                                    $works = array('لا', 'نعم');
                                    foreach($works as $key=>$value){
                                        ?>
                                        <option value="<?php echo $key;?>"
                                            <?php if(!empty($kafel_details[0]->work_id_fk)){
                                                if($key==$kafel_details[0]->work_id_fk){ echo 'selected'; }
                                            } ?>> <?php echo $value;?></option >
                                        <?php
                                    }
                                    ?>
								</select>
							</div>
							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">المهنة</label>
								<select class="form-control" name="k_job_fk" id="k_job_fk">
                                    <option value="">إختر</option>
                                    <?php
                                    if(isset($job_role)&&!empty($job_role)) {
                                        foreach($job_role as $row){?>
                                            <option value="<?php echo $row->id_setting;?>"
                                                <?php if(!empty($kafel_details[0]->k_job_fk)){
                                                    if($row->title_setting==$kafel_details[0]->k_job_fk){ echo 'selected'; }
                                                } ?>> <?php echo $row->title_setting;?></option >
                                            <?php
                                        }
                                    }
                                    ?>
								</select>
							</div>
							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">جهة العمل</label>
                                <input type="text" name="k_job_place"   class="form-control input-style" placeholder="" data-validation="required"
                                value="<?php if (isset($kafel_details[0]->k_job_place)&& $kafel_details[0]->k_job_place!=0){echo $kafel_details[0]->k_job_place;}?>">
							</div>
							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">البريد الإلكتروني</label>
								<input type="text" name="k_email"  class="form-control input-style" placeholder="" data-validation="required"
                                value="<?php if (isset($kafel_details[0]->k_email)&& $kafel_details[0]->k_email!=0){echo $kafel_details[0]->k_email;}?>">
							</div>
							<div class="col-sm-6 col-md-4 padding-4">
								<label class="label label-green  ">وقت التواصل</label>
							<!--	<input type="text" name=""  class="form-control input-style" placeholder="" data-validation="required">-->
                                <input placeholder="إدخل البيانات " id="m12h" type="text" class="form-control half"
                                       data-validation="!!required"
                                       name="right_time_from" value="<?php if (isset($kafel_details[0]->right_time_from)&& $kafel_details[0]->right_time_from!=0){echo $kafel_details[0]->right_time_from;}?>" >


                                <input placeholder="إدخل البيانات " id="m13h" class="form-control half input-style"
                                       type="text" data-validation="!!required"
                                       name="right_time_to" value="<?php if (isset($kafel_details[0]->right_time_to)&& $kafel_details[0]->right_time_to!=0){echo $kafel_details[0]->right_time_to;}?>" >

							<div class="col-xs-12 text-center no-padding">
							<br>
								<button type="submit" value="1" id="add" name="add"  class="btn btn-warning btn-rounded button8" style="font-size: 16px;width: 150px;"><span><i class="fa fa-floppy-o" aria-hidden="true"></i> حفظ </span> </button>

							</div>





						</div>

					</div>


				</div>
			</div>
                <?php
            }
            ?>

			<!-- resume -->

		</div>
	</div>

</section>
<?php
echo form_close();
?>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/analogue-time-picker.js"></script>


<script>
    timePickerInput({
        inputElement: document.getElementById("m12h"),
        mode: 12,
        // time: new Date()
    });
</script>
<script>
    timePickerInput({
        inputElement: document.getElementById("m13h"),
        mode: 12,
        // time: new Date()
    });
</script>

<script>
    function change_halet_kafel(value) {
        if(value !=8){
            document.getElementById("reasons_stop_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("reasons_stop_id_fk").value='';
        }else{
            document.getElementById("reasons_stop_id_fk").removeAttribute("disabled", "disabled");
        }

    }
</script>
<script>
    function getAhai(city_id){
        if(city_id != ''){
            var dataString='city_id='+city_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>Web/getAhai',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $('#hai_id_fk').addClass("selectpicker");
                    document.getElementById("hai_id_fk").removeAttribute("disabled", "disabled");
                    document.getElementById("hai_id_fk").setAttribute("data-validation", "!!required");
                    document.getElementById("hai_id_fk").setAttribute("data-show-subtext", "true");
                    document.getElementById("hai_id_fk").setAttribute("data-live-search", "true");
                    $('#hai_id_fk').html(html);
                    //  $('#hai_id_fk').selectpicker("refresh");
                }
            });
        }else if(city_id == '' ) {

            $('#hai_id_fk').removeClass("selectpicker");

            $("#hai_id_fk").val('');
            document.getElementById("hai_id_fk").removeAttribute("data-show-subtext", "true");
            document.getElementById("hai_id_fk").removeAttribute("data-live-search", "true");
            document.getElementById("hai_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("hai_id_fk").removeAttribute("data-validation", "!!required");
            //  $('#hai_id_fk').selectpicker("refresh");
        }
    }
</script>
<!--
<script>

    function change_status(value) {
        if(value !=0){
            document.getElementById("k_national_num").removeAttribute("disabled", "disabled");
            document.getElementById("k_mob").removeAttribute("disabled", "disabled");
        }else{
            document.getElementById("k_national_num").setAttribute("disabled", "disabled");
            document.getElementById("k_mob").setAttribute("disabled", "disabled");
            document.getElementById("k_national_num").value='';
            document.getElementById("k_mob").value='';
        }

    }




    function change_halet_kafel(value) {
        if(value !=8){
            document.getElementById("reasons_stop_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("reasons_stop_id_fk").value='';
        }else{
            document.getElementById("reasons_stop_id_fk").removeAttribute("disabled", "disabled");
        }

    }



    function change_work_status(value) {
        if(value ==0){
            document.getElementById("k_job_fk").setAttribute("disabled", "disabled");
            document.getElementById("k_job_fk").value='';
            document.getElementById("k_job_place").setAttribute("disabled", "disabled");
            document.getElementById("k_job_place").value='';
        }else{
            document.getElementById("k_job_fk").removeAttribute("disabled", "disabled");
            document.getElementById("k_job_place").removeAttribute("disabled", "disabled");
        }

    }
</script>
-->


