


<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/responsive.css">


<style type="text/css">
	#cheque{
		color: #a96a61;
	/*	background: url(<?php echo base_url(); ?>asisst/admin_asset/img/sheek_imgs/elraghy.png);*/
		background-position: 100% 100% !important;
		background-size: 100% 100% !important;
		background-repeat: no-repeat !important;
		height: 9cm;
		width: 100%;
		margin: 0 auto;
	}
	.elbelad{
		display: inline-block;
		width: 75.6%;
		float: right;
	}
	@media print{
		html, body {
			width: 28.3cm;
			height: 9cm;
          
		}
        #cheque{
		color: #a96a61;
	/*	background: url(<?php echo base_url(); ?>asisst/admin_asset/img/sheek_imgs/elraghy.png);*/
		background-position: 100% 100% !important;
		background-size: 100% 100% !important;
		background-repeat: no-repeat !important;
		height: 9cm;
		width: 28.3cm;
		margin: 0 auto;
	}
	}
    
   
    
    
	.kaab{
		display: inline-block;
		width: 24.4%;
		float: right;
	}
	.divider1{
		height: 0.5cm;
	}
	.right-chick{
		z-index: 3;
	}
	.top-backs{
		padding: 0 ;
		
	}
	.pad-2{
		padding-left: 2px;
		padding-right: 2px;
	}
	.bond-header{
		height: 2cm;
		/*padding: 0 45px;
		float: right;*/
		width: 100%;
		overflow: hidden;
	}
	.bond-header .logo {
		text-align: center;
	}
	.bond-header .logo img {
		height: 50px;
		width: 180px;
	}
	.bond-header .logo h3 {
		margin: 2px  0;
		font-size: 12px;
		text-align: center;
	}
	.rightbond-header {
		padding-top: 10px;
		vertical-align: middle;
		/*width:45%;*/
	}
	.rightbond-header p{
		width: 100%;
		display: inline-block;
	}
	.line .left-lang{
		float: left;
	}
	.line .right-lang{
		float: right;
	}
	.line {
		/* border-bottom: 1px solid #a96a61; */
		text-align: right;
		display: inline-block;
		width: 100%;
		min-height: 0.7cm;
		margin-bottom: 0;
		vertical-align: middle;
		line-height: 0.5cm;
		position: relative;
	}
	.leftbond-header  {
		width:100%;
		margin-top: 15px;
		float: left;
	}
	.leftbond-header .line{
		border-bottom: 0;
	}
	.line strong {
		font-weight: bold;
		font-size: 18px;
		color: #333;
	}
	p strong {
		font-weight: bold;
		font-size: 18px;
		color: #333;
	}
	.line-pay {
		line-height: 0.3cm !important;
		min-height: 0.6cm !important;
	}
	.name-charity h5 {
		text-align: left;
		color: #000;
		margin: 2px 0;
		font-weight: 600;
	}
	.salary {
		display: inline-block;
		width: 100%;
	}
	.salary span {
		float: left;
		width: 38px;
		text-align: center;
		border-right: 1px solid;
	}
	.salary p {
		line-height: 40px;
		margin-left: 38px;
		margin-bottom: 0;
	}
	.border-box {
		padding: 5px 20px;
		border: 4px double #999;
		border-radius: 29px;
	}
	.border-box-h{
		padding: 10px 20px;
		color: #333;
		margin: 0;
	}
	.bond-body {
		display: inline-block;
		width: 100%;
		height: 5cm;
		
	}
	@page{
	/*size: landscape;*/
    size: 28.3cm 9cm;
		margin: 0;
	}
	page[size="28.3cm 9cm"] {  
		width: 28.3cm;
		height: 9cm; 
	}
	@media print{
	   
     /*    @page
   {
    size: 10.62992126in 3.543307087in;
    size: landscape;
  }*/
  
  
       
		.bond-header .logo img {
			height: 40px;
			width: 180px;
		}
		.bond-header .logo h3 {
			margin: 2px  0;
			font-size: 12px;

		}
		.bond-body {
			padding-top: 10px;

		}
		.rightbond-header .line{
			margin-bottom: 0
		}
	}
     @media print and (width: 27cm) and (height: 9cm) {
 @page {
 size: 10.62992126in 3.543307087in;
    size: landscape;
    margin: 0;
 }
}
    
    
	.bond-sidebar{
		padding: 7px 15px 7px 5px;
	}
	.line-3 .right-line-3 {
		float: right;
		margin-top: 7px;
		width: 13%;
	}
	.line-3 .left-line-3 {
		float: left;
		margin-top: 7px;
		width: 10%;
		direction: ltr;
	}
	.line-3  .text{
		border-bottom: 1px solid #999;
		text-align: center;
		display: inline-block;
		min-height: 15px;
		width: 77%;
	}
	p.hint-bottom {
		margin-bottom: 0;
		margin-right: 15%;
		margin-top: 25px;
	}
	.bond-sidebar .table-bordered>thead>tr>th, 
	.bond-sidebar .table-bordered>tbody>tr>th, 
	.bond-sidebar .table-bordered>tfoot>tr>th, 
	.bond-sidebar .table-bordered>thead>tr>td, 
	.bond-sidebar .table-bordered>tbody>tr>td, 
	.bond-sidebar .table-bordered>tfoot>tr>td {
		border: 1px solid #7f6c5d;
		padding: 3px 8px;
	}
	.label-blue{
		background-color: #5484be;
		color: #fff;
		box-shadow: 2px 2px 6px #001035 ;

	}
	.auto-width{
		width: auto;
	}
	.label-custom{
		width: 100%;
		font-size: 16px;
		height: 32px;
		float: right;
		border-radius: 0;
		line-height: 27px;
	}
	.label-custom2{
		width: 70%;
		font-size: 16px;
		height: 32px;
		float: right;
		border-radius: 0;
		line-height: 27px;
	}
	.form-group {
		display: inline-block;
		width: 100%;
		margin-bottom: 4px;
	}
	.custom-checkbox,.custom-radio {
		width: 25px;
		height: 25px;
	}
	.custom-checkbox2,.custom-radio2 {
		width: 25px;
		height: 25px;
		float: right;
		margin-left: 7px !important;
		margin-right: 0 !important;
	}
	.btn{
		border-radius: 4px;
		width: auto;
		padding: 9px 11px;
		font-size: 14px;
	}
	#quant{
		border: 1px solid #999;
		padding: 4px;
	}
    .boldWeight{
        font-weight: bold;
    }
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
    input[type=date]::-webkit-clear-button{
        display: none; 
        -webkit-appearance: none; 
    }
    .ft_12{
            font-size: 12px !important;
    }
</style>



<div class="col-sm-12 no-padding">

			<body id="page-top" data-spy="scroll" onload="checkEdits()">
				<?php
				$id = $this->uri->segment(6);
				$size = array(1=>'كبير', 2=>'صغير');
				if ($id == '') {
				//	echo form_open_multipart('finance_accounting/box/sheek_setting/Sheek_setting/add');
					$bank_id			 = '';
					$code_account_id	 = '';
					$size_sheek 		 = '';
					$full_width			 = '27';
					$full_height		 = '9';
					$sheek_date_right	 = '1.2';
					$sheek_date_top		 = '0';
					$sheek_horer_right	 = '1';
					$sheek_horer_top	 = '0';
					$sheek_benifit_right = '3.7';
					$sheek_benifit_top   = '0.2';
					$sheek_value_right   = '1.4';
					$sheek_value_top     = '0.6';
					$sheek_text_right 	 = '1.5';
					$sheek_text_top 	 = '0.5';
					$sheek_byan_right 	 = '1.5';
					$sheek_byan_top 	 = '0.8';
					$sheek_sarf_right	 = '8.9';
					$sheek_sarf_top		 = '0';
					$ka3b_num_right		 = '1';
					$ka3b_num_top		 = '0';
					$ka3b_date_right	 = '1';
					$ka3b_date_top		 = '0';
					$ka3b_to_right		 = '1';
					$ka3b_to_top 		 = '0';
					$ka3b_value_right	 = '1';
					$ka3b_value_top		 = '0';
					$horer_in			 = '';
					$quotation			 = '';
					$sheek_date			 = '';
					$benefit_name		 = '';
					$value_num 			 = '';
					$value_text			 = '';
					$byan   			 = '';
					$type				 = 1;
					$img				 = '';
					$bold				 = 0;
					$color 				 = 'a96a61';
					$font 				 = '14px';
					$required			 = 'required';
					$condition_text		 = '';
				}
				else {
				//	echo form_open_multipart('finance_accounting/box/sheek_setting/Sheek_setting/update/'.$id);
					$bank_id			 = $recordSheek['bank_id'];
					$code_account_id	 = $recordSheek['code_account_id'];
					$size_sheek 		 = $recordSheek['size'];
					$full_width			 = $recordSheek['full_width'];
					$full_height		 = $recordSheek['full_height'];
					$sheek_date_right	 = $recordSheek['sheek_date_right'];
					$sheek_date_top		 = $recordSheek['sheek_date_top'];
					$sheek_horer_right	 = $recordSheek['sheek_horer_right'];
					$sheek_horer_top	 = $recordSheek['sheek_horer_top'];
					$sheek_benifit_right = $recordSheek['sheek_benifit_right'];
					$sheek_benifit_top   = $recordSheek['sheek_benifit_top'];
					$sheek_value_right   = $recordSheek['sheek_value_right'];
					$sheek_value_top     = $recordSheek['sheek_value_top'];
					$sheek_text_right 	 = $recordSheek['sheek_text_right'];
					$sheek_text_top 	 = $recordSheek['sheek_text_top'];
					$sheek_byan_right 	 = $recordSheek['sheek_byan_right'];
					$sheek_byan_top 	 = $recordSheek['sheek_byan_top'];
					$sheek_sarf_right	 = $recordSheek['sheek_sarf_right'];
					$sheek_sarf_top		 = $recordSheek['sheek_sarf_top'];
					$ka3b_num_right		 = $recordSheek['ka3b_num_right'];
					$ka3b_num_top		 = $recordSheek['ka3b_num_top'];
					$ka3b_date_right	 = $recordSheek['ka3b_date_right'];
					$ka3b_date_top		 = $recordSheek['ka3b_date_top'];
					$ka3b_to_right		 = $recordSheek['ka3b_to_right'];
					$ka3b_to_top 		 = $recordSheek['ka3b_to_top'];
					$ka3b_value_right	 = $recordSheek['ka3b_value_right'];
					$ka3b_value_top		 = $recordSheek['ka3b_value_top'];
					$horer_in			 = $recordSheek['horer_in'];
					$quotation			 = $recordSheek['quotation'];
					$sheek_date			 = $recordSheek['sheek_date'];
					$benefit_name		 = $recordSheek['benefit_name'];
					$value_num 			 = $recordSheek['value'];
					$value_text			 = $recordSheek['value_text'];
					$byan   			 = $recordSheek['byan'];
					$type				 = $recordSheek['type'];
					$img				 = $recordSheek['img'];
					$bold				 = $recordSheek['bold'];
					$color				 = $recordSheek['color'];
					$font				 = $recordSheek['font'];
					$condition_text		 = $recordSheek['condition_text'];
					$required			 = '';
				}
				?>

				<?php 
                //echo form_close();
                 ?>

				<page size="A4">
					<div class="container-fluid">
						<div class="" id="cheque" data-src="path/to/image" data-caching-key="userImage">
							<div class="elbelad no-padding" id="fisrtDiv"  data-src="path/to/image" data-caching-key="userImage">
								<div class="right-chick  ">
									<div class="top-backs">
										<div class="bond-header">
											<div class="col-xs-6 pad-2">
												<div  class="rightbond-header">	
													<p style="right: <?=$sheek_date_right?>cm; top: <?=$sheek_date_top?>cm;" class="line" id="data-block1"><?=$sheek_date?></p>
													<p style="right: <?=$sheek_horer_right?>cm; top: <?=$sheek_horer_top?>cm;" class="line" id="data-block2"><?=$horer_in?></p>
												</div>
											</div>
											<div class="col-xs-6 pad-2">
												<div class="leftbond-header">
													<p style="right: <?=$ka3b_num_right?>cm; top: <?=$ka3b_num_top?>cm;" class="line"><span class="right-lang"><strong></strong></p>
                                                    	<p style="right: <?=$sheek_sarf_right?>cm; top: <?=$sheek_sarf_top?>cm;" class="line" id="data-block7"><?=$condition_text?></p>
												</div>
											</div>
										</div>
										<div class="divider1">
                                        <div class="col-xs-4 pad-2">
                                        </div>
											<div class="col-xs-4 pad-2">
											
											</div>
										</div>
										<div class="bond-body" id="updateDiv">
											<div class="col-xs-12 pad-2">
												<p style="right: <?=$sheek_benifit_right?>cm; top: <?=$sheek_benifit_top?>cm;" class="line line-pay" id="data-block3"><?=$benefit_name?></p>
											</div>
											<div class="col-xs-12 pad-2">
												<div class="col-xs-3 pad-2">
													<p style="right: <?=$sheek_value_right?>cm; top: <?=$sheek_value_top?>cm;" class="line" id="data-block4">
														<?=$quotation.$value_num.$quotation?> 
													</p>
												</div>
												<div class="col-xs-9 no-padding">
													<p style="right: <?=$sheek_text_right?>cm; top: <?=$sheek_text_top?>cm;" class="line" id="data-block5"><?=$value_text?></p>
													<p style="right: <?=$sheek_byan_right?>cm; top: <?=$sheek_byan_top?>cm;" class="line" id="data-block6"><?=$byan?></p>

												</div>
											</div>
											<div class="col-xs-12 pad-2">
												<div class="col-xs-9 no-padding">
													<div class="name-charity" style="float: left;">
													</div>
													<p style="right: <?=$sheek_sarf_right?>cm; top: <?=$sheek_sarf_top?>cm;" class="hint-bottom"></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="kaab no-padding" id="secondDiv">
								<div class="bond-sidebar">
									<p style="right: <?=$ka3b_num_right?>cm; top: <?=$ka3b_num_top?>cm;" class="line line-pay" id="data-block8"></p>
									<p style="right: <?=$ka3b_date_right?>cm; top: <?=$ka3b_date_top?>cm;" class="line line-pay" id="data-block9"><?=$sheek_date?></p>
									<p style="right: <?=$ka3b_to_right?>cm;top: <?=$ka3b_date_top?>cm;" class="line line-pay ft_12" id="data-block10"><?=$benefit_name?></p>
									<p style="right: <?=$ka3b_value_right?>cm; top: <?=$ka3b_value_top?>cm; font-size:12px !important;" class="line line-pay " id="data-block11"><?=$value_num?></p>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</page>	
                
			</body>
		</div>

<button class="btn btn-default print-link">طباعه الشيك</button>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?=base_url().'asisst/admin_asset/'?>js/jQuery.print.js"></script>

<script >
    $(function() {
        $('.print-link').on('click', function() {
            //Print ele4 with custom options
            $("page").print({
                //Use Global styles
                globalStyles : true,
                //Add link with attrbute media=print
                mediaPrint : true,
       
                timeout: 750
                //Don't print this
               
            });
        });
    });
</script>
<script>
function chooseBank(sel)
    {
        if (sel.value==1) {
            $("#chick-width").val(16);
            $("#chick-height").val(9);
            setWidHigh();
        }
        else if (sel.value==10){
            $("#chick-width").val(27);
            $("#chick-height").val(9);
            setWidHigh();
        }
        else if (sel.value==19){
            $("#chick-width").val(27);
            $("#chick-height").val(9);
            setWidHigh();
        }

    }
	
    function setWidHigh() {
        var chickwidth =$("#chick-width").val();
        var chickheight =$("#chick-height").val();

        $("#cheque").css("width",chickwidth+"cm");
        $("#cheque").css("height",chickheight+"cm");

        if (chickwidth<=20) {
            $(".elbelad").css("width",chickwidth+"cm"); 
        }
        else{
            $(".elbelad").css("width",20.4+"cm");
        }
    }

    function changeWidth(value) {
        $("#cheque").css("width",value+"cm");

        if (value<=20) {
            $(".elbelad").css("width",value+"cm");  
        }
    }

    function changeHeight(value) {
        $("#cheque").css("height",value+"cm");
    }
</script>


<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#cheque").css('background','url('+e.target.result+')');
                $("#cheque").attr("data-src",e.target.result)
                imgData = e.target.result;
                localStorage.setItem("imgData", imgData);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#fileupload").change(function(){
        readURL(this);
    });
</script>

<?php if (isset($recordSheek) && $recordSheek != null) { ?>       
    <script type="text/javascript">
     /* $("#cheque").css('background','url(<?=base_url()."uploads/images/sheek/".$recordSheek["img"]?>)');*/
    </script>
<?php 
}
else {
?>
<script type="text/javascript">
    function checkEdits(){
        var dataImage = localStorage.getItem('imgData');
        $("#cheque").css('background','url('+dataImage+')');
        $('#img').val(dataImage);
    }
</script>
<?php } ?>


	
	
	<script type="text/javascript">
    $(".fzincrease").click(function() {
        var fontSize = parseInt($(".line").css("font-size"));
        fontSize = fontSize + 1 + "px";
        $('#quant').text(fontSize);
        $('#font').val(fontSize);
        $('.line').css({'font-size':fontSize});
    });
    $(".fzdecrease").click(function() {
        var fontSize = parseInt($(".line").css("font-size"));
        fontSize = fontSize - 1 + "px";
        $('#quant').text(fontSize);
        $('#font').val(fontSize);
        $('.line').css({'font-size':fontSize});
    });
    $(".fzbold").click(function() {
        $('.line').toggleClass("boldWeight");
        if ($('#bold').val() == 0) {
            $('#bold').val(1);
        }
        else {
            $('#bold').val(0);
        }
    });
</script>

<?php if (isset($recordSheek) && $recordSheek != null && $recordSheek['bold'] == 1) { ?>
    <script type="text/javascript">
        $(".fzbold").trigger("click");
        $('#bold').val(<?=$recordSheek['bold']?>);
    </script>
<?php } ?>

<?php if (isset($recordSheek) && $recordSheek != null) { ?>
    <script type="text/javascript">
        $('.line').css({'font-size':`<?=$recordSheek['font']?>`});
        $('.line').css({'color':`#<?=$recordSheek['color']?>`});
    </script>
<?php } ?>

<script type="text/javascript">
    $('#checkbox-Kaab').on('click',function(){
        if(this.checked){
            $('.cc').each(function(){
                this.checked = true;
            });
            $('#type').val(1);
        }else{
            $('.cc').each(function(){
                this.checked = false;
            });
            $('#type').val(2);
        }
    });
    $('.cc').on('click',function(){
        if($('.cc:checked').length == $('.cc').length){
            $('#checkbox-Kaab').prop('checked',true);
        }else{
            $('#checkbox-Kaab').prop('checked',false);
        }
        if ($('.cc:checked').length) {
            $('#type').val(1);
        }
        else {
            $('#type').val(2);
        }
    });
</script>



