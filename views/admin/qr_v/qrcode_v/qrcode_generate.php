<style>
/*	.scanqr{
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
	}*/
</style>
	<style type="text/css">
		.landing-wrapper{
			background-color: #d3dbda;
            position: relative;
            margin-bottom: 30px;
		}
		.landing-wrapper:before {
			content: "";
			height: 222px;
			position: absolute;
			top: 0;
			width: 100%;
			z-index: 0;
			background-color: #1ebea5;
		}
		.hdoor-insraf{
			padding-top: 10px;
            padding-bottom:25px;
		}
		.system-name{
			margin-bottom: 35px;
		}
		.system-name h3{
			color: #fff;
			font-size: 25px
		}
		.system-name img{
			width: 60px;
		}

		.hdoor-box{
			display: inline-block;
			width: 100%;
			background-color: #fff;
			border:1px solid #f5f5f5;
			/*box-shadow: -2px 2px 8px #fff;*/
			padding: 50px;
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
		}

		.qr-img img{
			width: 264px;
			height: 264px
		}
		.video-hdoor {
			display: inline-block;
			width: 100%;
			background-color: #f8f9fa;
			padding: 72px 60px;
		}
		.instructions h5{
			font-size: 24px;

</style>


        
        
	<div class="landing-wrapper">
		<section class="hdoor-insraf">
			<div class="container">
				<div class="system-name text-center">
<!--
					<h3><img src="<?php echo base_url();?>asisst/qr/design/fingerprint.png">
                      نظام الأثير للحضور و الإنصراف</h3>-->
				</div>
				<div class="col-xs-12 hdoor-box">
                
					<div class="col-md-4">
						<div class="instructions">
							<h5>كيفية تشغيل نظام البصمة :</h5>

							<ol>
								<li>افتح البرنامج على جوالك</li>
								<li>وجه الجوال نحو ال QR Code</li>
								<li>يتم التوصيل </li>

							</ol>
						</div>

					</div>
                    
                    	<div class="col-md-4">
					

					</div>
					<div class="col-md-4">
						<div class="qr-img" id="img_qrcode">
							<img id="img_generate" src="<?php echo base_url();?>asisst/qr/images/<?php echo $img ;?>">

 
 
                            
                            
						</div>
					</div>
				</div>
			
			</div>

		</section>
	</div>






    
 <script>
 /*
 setInterval(function(){
           $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>qr_c/QrController/qrcodeGenerator_pertime",
            data: {},
            success: function (d) {
                
              
                 var url_mg="<?php echo base_url();?>asisst/qr/images/"+d;
               $('#img_generate').attr('src',url_mg); 
              // img_qrcode
            }
        });
    
    }
    , 5000);
     */
 </script>
 
  <script>
  /*
 setInterval(function(){
           $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>qr_c/QrController/update_qrcode",
            data: {},
            success: function (d) {
                
             // alert(d);
            }
        });
    
    }
    , 30000);
    */
 </script>


 