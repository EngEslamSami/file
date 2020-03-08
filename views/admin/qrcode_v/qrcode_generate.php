 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

<style>
	.scanqr{
		border: 2px solid #eee;
		box-shadow: -2px 2px 8px ;
		display: inline-block;
		width: 100%;
		padding: 15px;
	}
	.qrimg img{
		width: 264px;
		height: 264px;
	}
	.welcome-div img{
		width: 300px;
		max-width: 100%
	}
	.instructions ol li {
		line-height: 32px;
		font-size: 18px;
	}
</style>





	<div class="container-fluid">
		<div class="scanqr">
			<div class="col-sm-6 col-md-6 col-xs-12">
				<h5 class="text-center">ملف الأسرة</h5><br>
				<div class="qrimg text-center">
					<img src="img/download.png">
				</div>
			</div>
			<div class="col-sm-6 col-md-6 col-xs-12">
				<div class="welcome-div">
					<img src="img/logo.png">
					<h4>لإستخدام الملف اعمل سكان بالجوال</h4>
                    <div id="img_qrcode"> <img  style="width: 200px"id="img_generate" src="<?php echo base_url();?>images/<?php echo $img ;?>"></div>
 
 
					</div>
				<div class="instructions">
					<ol>
						<li>افتح الجوال بتطبيق QR</li>
						<li>وجه هاتفك إلى ال QR الى أن يفتح</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

















 
 
 <script>
 setInterval(function(){
    
 
    
           $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>QrController/qrcodeGenerator_pertime",
            data: {},
            success: function (d) {
             
                 var url_mg="<?php echo base_url();?>images/"+d;
                $('#img_generate').attr('src',url_mg); 
              // img_qrcode
 
               

            }

        });
    
    
    
    }
    
    
    , 1000);
 </script>

 <!--
  <script>
 setInterval(function(){
    
 
    
           $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>QrController/update_qrcode",
            data: {},
            success: function (d) {
             
 
               //alert(d);

            }

        });
    
    
    
    }
    
    
    , 30000);
 </script>
 -->
 