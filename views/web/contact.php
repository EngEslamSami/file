<style>

ul.contact-textinfo li > i{
    color: #083188  !important;
}
ul.contact-textinfo li > span {
    color: black !important;
}
.contact-bg{
    background: url(<?=base_url().'asisst/web_asset/'?>img/contact-form-background.jpg) !important;
    background-position: center;
    background-size: 100% 100%;  
}
</style>

<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">الرئيسية</a></li>
            <li class="active"><a href="#">اتصل بنا</a></li>
        </ol>
    </div>
</section>
<!-- <pre>
<?php print_r( $this->main_data);?> -->
<section class="main_content pbottom-30 ptop-30 ">
    <div class="container">
    


<div class="container-fluid">

    <div class="col-md-4 col-sm-4 col-xs-12">
       <ul class="contact-textinfo list-unstyled">
       	<li><a  class="fade-icon"><i class="fa fa-home"></i></a><span>   مركز الاتصال   </span> 
            <?php  
            /*
                if(isset( $this->main_data->name)&&!empty($this->main_data->name))
                {
               echo $this->main_data->name; }*/
               ?> <span style="font-size: 24px !important;font-weight: bold !important;color: #ea2626  !important;"  class="droid">(0553851919) </span> </li>
               
    	<li><a  class="fade-icon "><i class="fa fa-globe"></i></a><span> <?php  
                    if(isset( $this->main_data->address)&&!empty($this->main_data->address))
                    {
                   echo $this->main_data->address; }?></span></li>
                   
    	<li><a  class="fade-icon "><i class="fa fa-phone"></i></a> <span class="droid"><?php
                        if(isset( $this->main_data->telphon)&&!empty($this->main_data->telphon))
                    {
                   foreach( $this->main_data->telphon as $row){
                     echo $row->tele;
                     echo ' - ';
                    
                   } }?></span></li>
    
    	<li><a  class="fade-icon "><i class="fa fa-fax"></i></a><span class="droid"><?php
                        if(isset( $this->main_data->faxs)&&!empty($this->main_data->faxs))
                    {
                   foreach( $this->main_data->faxs as $row){
                     echo $row->fax;
                    
                   } }?></span></li>
    
    
        	<li><a  class="fade-icon "><i class="fa fa-envelope-o"></i></a><span class="droid"><?php
                        if(isset( $this->main_data->emails)&&!empty($this->main_data->emails))
                    {
                   foreach( $this->main_data->emails as $row){
                     echo $row->email;
                    
                   } }?></span></li>
</ul>
    </div>




   <div class="col-md-8 col-sm-8 col-xs-12">
         <div id="ctl00_ctl39_g_dfbad9e9_8619_429b_8ffb_443d7ffe2378_ctl00_contactUsMapTitle" class="yellow-title">
            <h5>خريطة  <?php  
                        if(isset( $this->main_data->name)&&!empty($this->main_data->name))
                        {
                       echo $this->main_data->name; }?>  </h5>
        </div>
        <div id="ctl00_ctl39_g_dfbad9e9_8619_429b_8ffb_443d7ffe2378_ctl00_mapDiv">
            <div id="contactUsMap" class="scrolloff">
        		<iframe width="100%" height="300" frameborder="0" style="border:0" src="https://maps.google.com/maps?q=<?= $this->main_data->lat_map ?>,<?= $this->main_data->lang_map ?>&hl=es;z=14&amp;output=embed" allowfullscreen=""></iframe>
           
                    <!-- <iframe src="https://maps.google.com/maps?q=<?= $this->main_data->lat_map ?>,<?= $this->main_data->lang_map ?>&hl=es;z=14&amp;output=embed"
                        width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe> -->
           
            </div>
        </div>
    </div>
    
    

</div>

 
                
                
        <div class=" content_page">
            <div class="well well-sm text-center">اترك رسالتك</div>
           
             <?php

            echo form_open('Web/contact',array('id'=>"myform" ));

            ?> 
      <?php echo validation_errors(); ?>
         

       

                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>الإسم ثلاثى *</label>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" id="name"  name="name" class="form-control" placeholder=""  data-validation="required"   aria-describedby="inputGroupSuccess2Status">
                      </div>
      
                    
                    <input type="hidden" class="btn btn-success mtop-10" name="ADD" value="أرسل">
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label>البريد الإلكتروني *</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                    <input type="email" id="email"  name="email" class="form-control" placeholder=""  data-validation="required" >
                    </div>
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                    <label> نوع التواصل *</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-braille"></i></span>
                    <select  name="contact_type"
                             class="form-control" data-validation="required" >
                             <option value="">إختر</option>
                        <?php
                             $arr = array('1'=>'شكوي','2'=>'تقييم','3'=>'اقتراح','4'=>'استعلام');
                        foreach ($arr as $key=>$value){
                            ?>
                            <option value="<?= $key?>"
                               
                            ><?= $value?></option>
                            <?php
                        }
                        ?>

                    </select>
                    </div>
                 
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                
                    <label>رقم الجوال *</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                    <input type="number" id="phone" name="phone" class="form-control" placeholder=""  data-validation="required" >
                    </div>
                </div>
                <div class="form-group col-md-8 col-sm-6 col-xs-12">
                
                    <label>العنوان *</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                    <input type="text" id="address" name="address" class="form-control" placeholder=""  data-validation="required" >
                    </div>
                </div>
                <div class="form-group col-xs-12">
               
                    <label>الرسالة *</label>
                    <!-- <textarea id="message"  name="message" class="form-control" placeholder="" style="height: 150px"  data-validation="required" ></textarea> -->
                
                    <textarea id="message" name="message" placeholder="نص الرسالة (1000 حرف بحد أقصى)" maxlength="1000" onkeyup="tamanhoMensagem()" class="form-control"  style="height: 150px" data-validation="required"></textarea>
	   <label id="QtChar"> </label>
                
                </div>
                <div class="form-group col-xs-12 text-center">
                 
                 <button type="button" class="btn btn-success mtop-10" data-wipe="أرسل الأن" id="send" name="ADD"  onclick="check_form()"> أرسل </button> 
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
    var contact_type=$('#contact_type').val();
    
    if (name !='' && email !='' && phone !=''  && address !='' && message!='' && contact_type!='') {
      //  alert('naannn');
        $('#myform').submit();
    } else {
       alert('من فضلك ادخل الحقول الناقصه');
    }
}

</script>
<script>
  $(function()
	  {
	     $("#QtChar")[0].innerText = "المتبقي:"+ parseInt($("#message")[0].maxLength);
	  });
	  function tamanhoMensagem()
	  {
	     $("#QtChar")[0].innerText = "المتبقي:"+ parseInt($("#message")[0].maxLength - $("#message").val().length);	
	  }
</script>


