<div class="sidebar-quick-links-fixed hidden-xs">
    <a href="javascript:void(0);" class="side-btn">تسجيل الدخول</a>
    <ul>
        <li>
            <a href="#">
                <i class="fa fa-home"></i>
                <span>دخول الموظفين</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-users"></i>
                <span>دخول مستفيدين</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-leaf"></i>
                <span>دخول متعفف </span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-money"></i>
                <span>دخول  متبرع</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-leaf"></i>
                <span>دخول  كفيل</span>
            </a>
        </li>

    </ul>
</div>
<!-- Sidebar Quick Links -->


<div class="social-sidebar hidden-xs" dir="ltr">
    <ul>
        <li class="facebook">
            <a href="#" target="_blank">
                <i class="fa fa-facebook"></i>
                <span>تابعنا على فيسبوك</span>
            </a>
        </li>
        <li class="twitter">
            <a href="#" target="_blank">
                <i class="fa fa-twitter"></i>
                <span>تابعنا على تويتر</span>
            </a>
        </li>
        <li class="instagram">
            <a href="#" target="_blank">
                <i class="fa fa-instagram"></i>
                <span>تابعنا على انستجرام</span>
            </a>
        </li>
        <li class="youtube">
            <a href="#" target="_blank">
                <i class="fa fa-youtube-play"></i>
                <span>تابعنا على يوتيوب</span>
            </a>
        </li>
        <li class="snapchat">
            <a href="#" target="_blank">
                <i class="fa fa-snapchat-ghost"></i>
                <span>تابعنا على سناب شات</span>
            </a>
        </li>
    </ul>
</div>


<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/profile-bg.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">الرئيسية</a></li>
            <li class="active"><a href="#">اتصل بنا</a></li>
        </ol>
    </div>
</section>
<!-- <pre>
<?php print_r( $this->main_data);?> -->
<section class="main_content pbottom-30 ptop-30">
    <div class="container">
    <table class="table table-striped table-hover">
    <tbody>
    <tr>
        <td colspan="2">
			<p style="font-weight:bold;">
                رقم    <?php  
                if(isset( $this->main_data->name)&&!empty($this->main_data->name))
                {
               echo $this->main_data->name; }?>
			</p>
			<p style="font-weight: bold;font-size: 30px;">
				 (920004565)   
			</p>			
			<p>
				البريد الإلكتروني للخدمات الإلكترونية 
                <a href="mailto:E-Services@rdcci.org.sa">
				    <label style="color:#0072c6; font-weight:bold;">
                    <?php
                    if(isset( $this->main_data->emails)&&!empty($this->main_data->emails))
                {
               foreach( $this->main_data->emails as $row){
                 echo $row->email;
                
               } }?>
                    </label>
			    </a>
			</p>			
        </td>
    </tr>
    
    <tr>
        <td>
            <label style="font-weight:bold;">هاتف
            
            </label>
        </td>
        <td>
            <label style="font-weight:bold;">
            <?php
                    if(isset( $this->main_data->telphon)&&!empty($this->main_data->telphon))
                {
               foreach( $this->main_data->telphon as $row){
                 echo $row->tele;
                 echo ' - ';
                
               } }?>
            </label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight:bold;">فاكس</label>
        </td>
        <td>
            <label style="font-weight:bold;">
            <?php
                    if(isset( $this->main_data->faxs)&&!empty($this->main_data->faxs))
                {
               foreach( $this->main_data->faxs as $row){
                 echo $row->fax;
                
               } }?>
            
            </label>
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight:bold;">العنوان</label>
        </td>
        <td>
            <label style="font-weight:bold;">
            <?php  
                if(isset( $this->main_data->address)&&!empty($this->main_data->address))
                {
               echo $this->main_data->address; }?>
            
            
            </label>
        </td>
    </tr>
    
	<tr>
		<td colspan="2" style="font-weight: bold;padding: 36px;background-color: lightgray;"><span style="color:red;">ملاحظة هامة :</span> خدمات المشتركين (التصاديق-التصاريح...الخ) غير متوفرة في المركز الرئيسي للغرفة ، ويمكن الحصول عليها من خلال <a href="https://mybusiness.chamber.sa/Login.aspx?ReturnUrl=%2f">بوابة أعمالي</a> (الخدمات الإلكترونية لغرفة الرياض) أو يسعدنا خدمتك عبر زيارتك للفرع الأقرب لك من قائمة <a href="/Home/Branches">فروع الغرفة</a>  داخل أو خارج الرياض .</td>
	</tr>
</tbody>
</table>
<br>
<div id="ctl00_ctl39_g_dfbad9e9_8619_429b_8ffb_443d7ffe2378_ctl00_contactUsMapTitle" class="yellow-title">
    <h2>خريطة  <?php  
                if(isset( $this->main_data->name)&&!empty($this->main_data->name))
                {
               echo $this->main_data->name; }?>  </h2>
</div>
<div id="ctl00_ctl39_g_dfbad9e9_8619_429b_8ffb_443d7ffe2378_ctl00_mapDiv">
    <div id="contactUsMap" class="scrolloff">
		<iframe width="100%" height="270" frameborder="0" style="border:0" src="https://maps.google.com/maps?q=<?= $this->main_data->lat_map ?>,<?= $this->main_data->lang_map ?>&hl=es;z=14&amp;output=embed" allowfullscreen=""></iframe>
   
            <!-- <iframe src="https://maps.google.com/maps?q=<?= $this->main_data->lat_map ?>,<?= $this->main_data->lang_map ?>&hl=es;z=14&amp;output=embed"
                width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> -->
   
    </div>
</div>
<br>
        <div class="background-white content_page">
            <div class="well well-sm">إتصل بنا</div>
           
             <?php

            echo form_open('Web/contact',array('id'=>"myform" ));

            ?> 
      <?php echo validation_errors(); ?>
         

       

                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>الإسم ثلاثى *</label>
                    <input type="text" id="name"  name="name" class="form-control" placeholder=""  data-validation="required"   >
                    <input type="hidden" class="btn btn-success mtop-10" name="ADD" value="أرسل">
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>البريد الإلكتروني *</label>
                    <input type="email" id="email"  name="email" class="form-control" placeholder=""  data-validation="required" >
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>رقم الجوال *</label>
                    <input type="number" id="phone" name="phone" class="form-control" placeholder=""  data-validation="required" >
                </div>
                <div class="form-group col-xs-12">
                    <label>العنوان *</label>
                    <input type="text" id="address" name="address" class="form-control" placeholder=""  data-validation="required" >
                </div>
                <div class="form-group col-xs-12">
                    <label>الرسالة *</label>
                    <textarea id="message"  name="message" class="form-control" placeholder="" style="height: 150px"  data-validation="required" ></textarea>
                </div>
                <div class="form-group col-xs-12">
                 <button type="button" class="btn btn-success mtop-10" id="send" name="ADD"  onclick="check_form()"> أرسل </button> 
                    <!-- <input type="submit" class="btn btn-success mtop-10" name="ADD" value="أرسل"> -->
                </div>
            <?php
            echo form_close();
            ?>

        </div>
    </div>
</section>


<script type="text/javascript">
function check_form() {
    // my_form
    var name=$('#name').val();
    var email=$('#email').val();
    var phone=$('#phone').val();
    var address=$('#address').val();
    var message=$('#message').val();
    
    if (name !='' && email !='' && phone !=''  && address !='' && message!='' ) {
      //  alert('naannn');
        $('#myform').submit();
    } else {
       alert('من فضلك ادخل الحقول الناقصه');
    }
}
</script>

