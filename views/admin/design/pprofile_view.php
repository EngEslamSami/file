


<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 0px;
  margin-left: 0px;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #5A55A3;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
  background-color: #5A55A3;
  background-image: #5A55A3;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
  content: '';
  position: absolute;
  left: 100%;
  top: 50%;
  margin-top: -13px;
  border-left: 0;
  border-bottom: 13px solid transparent;
  border-top: 13px solid transparent;
  border-left: 10px solid #5A55A3;
}

div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}
.all_cont{
    padding: 0 !important;
}
</style>


	<div class="col-xs-12 all_cont">

        <div class="col-lg-12 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
            <div class="col-lg-1 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                  <h4 class="glyphicon glyphicon-plane"></h4><br/>البروفايل
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-road"></h4><br/>الطلبات
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-home"></h4><br/>الإستعلامات
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-cutlery"></h4><br/>المهام
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-credit-card"></h4><br/>التراسل
                </a>
                 <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon  glyphicon-user"></h4><br/>ملاحظات شخصية
                </a>
              </div>
            </div>
            <div class="col-lg-11 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->
                <div class="bhoechie-tab-content active">
                    <center>
                    <!--
                      <h1 class="glyphicon glyphicon-plane" style="font-size:14em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Flight Reservation</h3>-->
                      	<div class="col-xs-12">
		<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<!--	<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
				<button class="btn btn-default" style="background-color: #85b558;color: #fff;" title="ملف الموظف">
					<i class="ace-icon fa fa-file-o faa-horizontal animated"></i> ملف الموظف
				</button>

				<button class="btn btn-default" style="background-color: #0088b1;color: #fff;" title="الإجازات">
					<i class="ace-icon fa fa-address-card-o faa-vertical animated"></i> الإجازات
				</button>

				<button class="btn btn-default" style="background-color: #da9300;color: #fff;" title="الأذونات">
					<i class="ace-icon fa fa-id-badge faa-shake animated"></i> الأذونات
				</button>

				<button class="btn btn-default" style="background-color: #E5343D;color: #fff;" title="المهمات الموظيفية">
					<i class="ace-icon fa fa-cogs faa-passing animated"></i> المهامات الموظيفية
				</button>
				<button class="btn btn-default" style="background-color: #d54c7e;color: #fff;" title="الساعات الإضافية">
					<i class="ace-icon fa fa-clock-o faa-burst animated"></i> الساعات الإضافية
				</button>
				<button class="btn btn-default" style="background-color: #a971a4;color: #fff;" title="ملاحظات شخصية">
					<i class="ace-icon fa fa-list faa-falling animated"></i> ملاحظات شخصية
				</button>
				
			</div>
-->

		</div>
	
	<div class="col-xs-12 col-sm-9">
		
		<div class="center">
			<span class="btn btn-app btn-sm btn-light no-hover">
				<span class="line-height-1 bigger-170 blue"> 21 يوم </span>

				<br />
				<span class="line-height-1 smaller-90"> رصيد إجازاتى </span>
			</span>

			<span class="btn btn-app btn-sm btn-yellow no-hover">
				<span class="line-height-1 bigger-170"> 3 ساعة </span>

				<br />
				<span class="line-height-1 smaller-90"> رصيد أذونات </span>
			</span>

			<span class="btn btn-app btn-sm btn-pink no-hover">
				<span class="line-height-1 bigger-170"> 4 </span>

				<br />
				<span class="line-height-1 smaller-90"> مهامات </span>
			</span>

			<span class="btn btn-app btn-sm btn-grey no-hover">
				<span class="line-height-1 bigger-170"> 5000 ريال </span>

				<br />
				<span class="line-height-1 smaller-90"> الراتب </span>
			</span>

			<span class="btn btn-app btn-sm btn-success no-hover">
				<span class="line-height-1 bigger-170"> 4900 ريال </span>

				<br />
				<span class="line-height-1 smaller-90"> المستحق </span>
			</span>

			<span class="btn btn-app btn-sm btn-primary no-hover">
				<span class="line-height-1 bigger-170"> 100 ريال </span>

				<br />
				<span class="line-height-1 smaller-90"> الخصم </span>
			</span>
		</div>

		<div class="space-12"></div>

		<div class="profile-user-info profile-user-info-striped">
			<div class="profile-info-row">
				<div class="profile-info-name"> الإسم </div>

				<div class="profile-info-value">
					<span class="editable" id="username">محمد محمد إبراهيم الدوسري</span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> الوظيفة </div>

				<div class="profile-info-value">
					<i class="fa fa-user light-orange bigger-110"></i>
					<span class="editable" id="country">مدير قسم الحسابات</span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> العمر </div>

				<div class="profile-info-value">
					<span class="editable" id="age">38</span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> تاريخ التعيين </div>

				<div class="profile-info-value">
					<span class="editable" id="signup">2010/06/20</span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> آخر تحديث </div>

				<div class="profile-info-value">
					<span class="editable" id="login">منذ 3 ساعات</span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> الإدارة التابع لها </div>

				<div class="profile-info-value">
					<span class="editable" id="about">إدارة الشئون المالية</span>
				</div>
			</div>
		</div>

		<div class="space-20"></div>

		<div class="widget-box transparent">
			<div class="widget-header widget-header-small">
				<h4 class="widget-title  smaller">
					<i class="ace-icon fa fa-rss orange"></i>
					آخر الأنشطة 
				</h4>

				<div class="widget-toolbar action-buttons">
					<a href="#" data-action="reload">
						<i class="ace-icon fa fa-refresh blue"></i>
					</a>

					<a href="#" class="pink">
						<i class="ace-icon fa fa-trash-o"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main padding-8">
					<div id="profile-feed-1" class="profile-feed">
						<div class="profile-activity clearfix">
							<div>
								<img class="pull-left" alt="Alex Doe's avatar" src="<?=base_url();?>asisst/admin_asset/img/avatars/avatar5.png" />
								<a class="user" href="#"> لقد قمت بتغيير الصورة الشخصية لحسابك .</a>
								<a href="#" class="pink float-left">
									<i class="ace-icon fa fa-trash-o"></i>
								</a>

								<div class="time">
									<i class="ace-icon fa fa-clock-o bigger-110"></i>
									منذ ساعة و 45 دقيقة
								</div>
							</div>

							<div class="tools action-buttons">
								<a href="#" class="blue">
									<i class="ace-icon fa fa-pencil bigger-125"></i>
								</a>

								<a href="#" class="red">
									<i class="ace-icon fa fa-times bigger-125"></i>
								</a>
							</div>
						</div>

						<div class="profile-activity clearfix">
							<div>
								<img class="pull-left" alt="Alex Doe's avatar" src="<?=base_url();?>asisst/admin_asset/img/avatars/avatar1.png" />
								<a class="user" href="#"> لقد قمت بتغيير الصورة الشخصية لحسابك .</a>
								<a href="#" class="pink float-left">
									<i class="ace-icon fa fa-trash-o"></i>
								</a>

								<div class="time">
									<i class="ace-icon fa fa-clock-o bigger-110"></i>
									منذ ساعة و 45 دقيقة
								</div>
							</div>

							<div class="tools action-buttons">
								<a href="#" class="blue">
									<i class="ace-icon fa fa-pencil bigger-125"></i>
								</a>

								<a href="#" class="red">
									<i class="ace-icon fa fa-times bigger-125"></i>
								</a>
							</div>
						</div>

						<div class="profile-activity clearfix">
							<div>
								<img class="pull-left" alt="Alex Doe's avatar" src="<?=base_url();?>asisst/admin_asset/img/avatars/avatar5.png" />
								<a class="user" href="#"> لقد قمت بتغيير الصورة الشخصية لحسابك .</a>
								<a href="#" class="pink float-left">
									<i class="ace-icon fa fa-trash-o"></i>
								</a>

								<div class="time">
									<i class="ace-icon fa fa-clock-o bigger-110"></i>
									منذ ساعة و 45 دقيقة
								</div>
							</div>

							<div class="tools action-buttons">
								<a href="#" class="blue">
									<i class="ace-icon fa fa-pencil bigger-125"></i>
								</a>

								<a href="#" class="red">
									<i class="ace-icon fa fa-times bigger-125"></i>
								</a>
							</div>
						</div>

						<div class="profile-activity clearfix">
							<div>
								<img class="pull-left" alt="Alex Doe's avatar" src="<?=base_url();?>asisst/admin_asset/img/avatars/avatar1.png" />
								<a class="user" href="#"> لقد قمت بتغيير الصورة الشخصية لحسابك .</a>
								<a href="#" class="pink float-left">
									<i class="ace-icon fa fa-trash-o"></i>
								</a>

								<div class="time">
									<i class="ace-icon fa fa-clock-o bigger-110"></i>
									منذ ساعة و 45 دقيقة
								</div>
							</div>

							<div class="tools action-buttons">
								<a href="#" class="blue">
									<i class="ace-icon fa fa-pencil bigger-125"></i>
								</a>

								<a href="#" class="red">
									<i class="ace-icon fa fa-times bigger-125"></i>
								</a>
							</div>
						</div>

						<div class="profile-activity clearfix">
							<div>
								<img class="pull-left" alt="Alex Doe's avatar" src="<?=base_url();?>asisst/admin_asset/img/avatars/avatar4.png" />
								<a class="user" href="#"> لقد قمت بتغيير الصورة الشخصية لحسابك .</a>
								<a href="#" class="pink float-left">
									<i class="ace-icon fa fa-trash-o"></i>
								</a>

								<div class="time">
									<i class="ace-icon fa fa-clock-o bigger-110"></i>
									منذ ساعة و 45 دقيقة
								</div>
							</div>

							<div class="tools action-buttons">
								<a href="#" class="blue">
									<i class="ace-icon fa fa-pencil bigger-125"></i>
								</a>

								<a href="#" class="red">
									<i class="ace-icon fa fa-times bigger-125"></i>
								</a>
							</div>
						</div>

						<div class="profile-activity clearfix">
							<div>
								<img class="pull-left" alt="Alex Doe's avatar" src="<?=base_url();?>asisst/admin_asset/img/avatars/avatar4.png" />
								<a class="user" href="#"> لقد قمت بتغيير الصورة الشخصية لحسابك .</a>
								<a href="#" class="pink float-left">
									<i class="ace-icon fa fa-trash-o"></i>
								</a>

								<div class="time">
									<i class="ace-icon fa fa-clock-o bigger-110"></i>
									منذ ساعة و 45 دقيقة
								</div>
							</div>

							<div class="tools action-buttons">
								<a href="#" class="blue">
									<i class="ace-icon fa fa-pencil bigger-125"></i>
								</a>

								<a href="#" class="red">
									<i class="ace-icon fa fa-times bigger-125"></i>
								</a>
							</div>
						</div>

						<div class="profile-activity clearfix">
							<div>
								<img class="pull-left" alt="Alex Doe's avatar" src="<?=base_url();?>asisst/admin_asset/img/avatars/avatar5.png" />
								<a class="user" href="#"> لقد قمت بتغيير الصورة الشخصية لحسابك .</a>
								<a href="#" class="pink float-left">
									<i class="ace-icon fa fa-trash-o"></i>
								</a>

								<div class="time">
									<i class="ace-icon fa fa-clock-o bigger-110"></i>
									منذ ساعة و 45 دقيقة
								</div>
							</div>

							<div class="tools action-buttons">
								<a href="#" class="blue">
									<i class="ace-icon fa fa-pencil bigger-125"></i>
								</a>

								<a href="#" class="red">
									<i class="ace-icon fa fa-times bigger-125"></i>
								</a>
							</div>
						</div>

						<div class="profile-activity clearfix">
							<div>
								<img class="pull-left" alt="Alex Doe's avatar" src="<?=base_url();?>asisst/admin_asset/img/avatars/avatar4.png" />
								<a class="user" href="#"> لقد قمت بتغيير الصورة الشخصية لحسابك .</a>
								<a href="#" class="pink float-left">
									<i class="ace-icon fa fa-trash-o"></i>
								</a>

								<div class="time">
									<i class="ace-icon fa fa-clock-o bigger-110"></i>
									منذ ساعة و 45 دقيقة
								</div>
							</div>

							<div class="tools action-buttons">
								<a href="#" class="blue">
									<i class="ace-icon fa fa-pencil bigger-125"></i>
								</a>

								<a href="#" class="red">
									<i class="ace-icon fa fa-times bigger-125"></i>
								</a>
							</div>
						</div>

						<div class="profile-activity clearfix">
							<div>
								<img class="pull-left" alt="Alex Doe's avatar" src="<?=base_url();?>asisst/admin_asset/img/avatars/avatar1.png" />
								<a class="user" href="#"> لقد قمت بتغيير الصورة الشخصية لحسابك .</a>
								<a href="#" class="pink float-left">
									<i class="ace-icon fa fa-trash-o"></i>
								</a>

								<div class="time">
									<i class="ace-icon fa fa-clock-o bigger-110"></i>
									منذ ساعة و 45 دقيقة
								</div>
							</div>

							<div class="tools action-buttons">
								<a href="#" class="blue">
									<i class="ace-icon fa fa-pencil bigger-125"></i>
								</a>

								<a href="#" class="red">
									<i class="ace-icon fa fa-times bigger-125"></i>
								</a>
							</div>
						</div>

						<div class="profile-activity clearfix">
							<div>
								<img class="pull-left" alt="Alex Doe's avatar" src="<?=base_url();?>asisst/admin_asset/img/avatars/avatar3.png" />
								<a class="user" href="#"> لقد قمت بتغيير الصورة الشخصية لحسابك .</a>
								<a href="#" class="pink float-left">
									<i class="ace-icon fa fa-trash-o"></i>
								</a>

								<div class="time">
									<i class="ace-icon fa fa-clock-o bigger-110"></i>
									منذ ساعة و 45 دقيقة
								</div>
							</div>

							<div class="tools action-buttons">
								<a href="#" class="blue">
									<i class="ace-icon fa fa-pencil bigger-125"></i>
								</a>

								<a href="#" class="red">
									<i class="ace-icon fa fa-times bigger-125"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="hr hr2 hr-double"></div>

		<div class="space-6"></div>

		<div class="center">
			<button type="button" class="btn btn-sm btn-primary btn-white btn-round">
				<i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
				<span class="bigger-110">رؤية مزيد من الأنشطة</span>

				<i class="icon-on-right ace-icon fa fa-arrow-left"></i>
			</button>
		</div>
	</div>

	<div class="col-xs-12 col-sm-3 center">
		<div>
			<span class="profile-picture">
				<img id="profile-img-tag" class="editable img-responsive" alt="Alex's Avatar" src="<?=base_url();?>asisst/admin_asset/img/avatars/profile-pic.jpg" />
				<input class="changeImg" type="file" accept="image/*" onchange="loadFile(event)">


			</span>

			<div class="space-4"></div>

			<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
				<div class="inline position-relative">
					<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
						<i class="ace-icon fa fa-circle light-green"></i>
						&nbsp;
						<span class="white">محمد محمد إبراهيم الدوسري</span>
					</a>

					<ul class="align-right dropdown-menu dropdown-caret dropdown-lighter">
						<li class="dropdown-header"> تغيير الحالة </li>

						<li>
							<a href="#">
								<i class="ace-icon fa fa-circle green"></i>

								<span class="green">Available</span>
							</a>
						</li>

						<li>
							<a href="#">
								<i class="ace-icon fa fa-circle red"></i>

								<span class="red">Busy</span>
							</a>
						</li>

						<li>
							<a href="#">
								<i class="ace-icon fa fa-circle grey"></i>

								<span class="grey">Invisible</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="space-6"></div>

		<div class="profile-contact-info">
			<div class="profile-contact-links align-right">
				<a href="#" class="btn btn-link">
					<i class="ace-icon fa fa-plus-circle bigger-120 green"></i>
					تعديل بيانات حسابى
				</a>

				<a href="#" class="btn btn-link">
					<i class="ace-icon fa fa-envelope bigger-120 pink"></i>
					إرسال رسالة
				</a>

				<a href="#" class="btn btn-link">
					<i class="ace-icon fa fa-globe bigger-125 blue"></i>
					www.alexdoe.com
				</a>
			</div>

			<div class="space-6"></div>

			<div class="profile-social-links align-center">
				<a href="#" class="tooltip-info" title="" data-original-title="Visit my Facebook">
					<i class="middle ace-icon fa fa-facebook-square fa-2x blue"></i>
				</a>

				<a href="#" class="tooltip-info" title="" data-original-title="Visit my Twitter">
					<i class="middle ace-icon fa fa-twitter-square fa-2x light-blue"></i>
				</a>

				<a href="#" class="tooltip-error" title="" data-original-title="Visit my Pinterest">
					<i class="middle ace-icon fa fa-pinterest-square fa-2x red"></i>
				</a>
			</div>
		</div>

		<div class="hr hr12 dotted"></div>

		<div class="clearfix">
			<div class="grid2">
				<span class="bigger-175 blue">25</span>

				<br />
				نشاط من الآخرين
			</div>

			<div class="grid2">
				<span class="bigger-175 blue">12</span>

				<br />
				نشاط لك
			</div>
		</div>

		<div class="hr hr16 dotted"></div>
	</div>


</div>


                      
                      
                      
                      
                    </center>
                </div>
                <!-- train section -->
                <div class="bhoechie-tab-content">
                    <center>
                    <!--
                      <h1 class="glyphicon glyphicon-road" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Train Reservation</h3>-->
     	<div class="col-xs-12">  
         <div class="col-xs-3">                
      <div class="panel panel-default">
      <div class="panel-heading">الطلبات</div>
      <div class="panel-body">Panel Content</div>
    </div> </div>
    
    
   <div class="col-xs-3">    
<div class="panel panel-info">
    <div class="panel-heading">
       الطلبات
    </div>
    <div class="panel-body">
        body content here
    </div>
    <div class="panel-footer">
        footer content here
    </div>
</div>
  </div>  
    
    
             <div class="col-sm-3 col-md-4">
                     <!-- Default Panel -->
                     <div class="panel panel-info ">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Default Panel</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                  <ul id="myTab">
									<li class="active"><a href="#tabs1-pane1">External link to contorl Markup Tab</a></li>
									<li><a href="#tabs1-pane2">External link to contorl Twitter Docs Tab</a></li>
									<li><a href="#tabs1-pane3">External link to contorl Tab 3</a></li>
									<li><a href="#tabs1-pane4">External link to contorl Tab 4</a></li>
								</ul>
                        </div>
                        <div class="panel-footer">
                           This is standard panel footer
                        </div>
                     </div>
                  </div>  
    
    
    
    
    
    
                      
       </div>               
                    </center>
                </div>
    
                <!-- hotel search -->
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
                    </center>
                </div>
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
                    </center>
                </div>
                <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                    </center>
                </div>
                
                
                  <div class="bhoechie-tab-content">
                    <center>
                      <h1 class="glyphicon  glyphicon-user" style="font-size:12em;color:#55518a"></h1>
                      <h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
                      <h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
                    </center>
                </div>
            </div>
        </div>

</div>


<script>
$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});

</script>