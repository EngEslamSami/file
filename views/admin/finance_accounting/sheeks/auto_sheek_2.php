	<style type="text/css">
		.elbelad{
			/*display: inline-block;
			width: 100%;*/
			color: #a96a61;
			background: url(img/albelad-backs.jpg);
			background-position: 100% 20% !important;
			background-size: 100% 100% !important;
			background-repeat: no-repeat !important;
			border-bottom: 1px solid #a96a61;
		}
		.right-chick{
			border:1px solid #a96a61;
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
			height: 87px;
			padding: 0 45px;
			float: right;
			width: 100%;
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
			width:45%;
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
			border-bottom: 1px solid #a96a61;
			text-align: center;
			display: inline-block;
			width: 100%;
			min-height: 25px;
		}
		.leftbond-header  {
			width:45%;
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

		.line-pay .right-lang{
			margin-top: 20px;
		}
		.name-charity h5 {
			text-align: left;
			color: #000;
			margin: 2px 0;
			font-weight: 600;
		}
		.salary {
			border: 1px solid #7f6c5d;
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
			padding: 25px 35px 0px 20px;
			display: inline-block;
			width: 100%;
			
		}
		@page{
			size: landscape;
			margin: 10px
		}

		@media print{
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

		/*************************/
		

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
            border: 2px solid #5484be;
		}
		.label-custom2{
			width: 70%;
			font-size: 16px;
			height: 32px;
			float: right;
			border-radius: 0;
			line-height: 27px;
            border: 2px solid #5484be;
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
	</style>

	<style type="text/css">
		/* prevent users from selecting text in draggable items */
		/*[draggable] {
			-moz-user-select: none;
			-khtml-user-select: none;
			-webkit-user-select: none;
			user-select: none;
		}*/
		@media print{
			.draggable{
				display: block !important;
				opacity: 1 !important;
			}
		}
		.toolbar span {
			display:inline-block;
			float:left;
		}
		.toolbar img {
			margin: 10px;
		}
		.canvas {
			position:relative;
			height:550px;
			width:100%;
			/* background:Yellow url("http://www.mapstop.co.uk/images/uploaded/lrg_wg2668.6a40d0d.jpg") no-repeat;*/
		}
		.canvas img {
			position:absolute;
		}
		#sortable2 li{
			font-size: 18px;
			color: #555;
		}
		.btn{

			border-radius: 4px;
			width: auto;
			padding: 9px 11px;
			font-size: 14px;

		}

	</style>






	<div class="container-fluid">
		<div class="col-md-8 col-xs-12 no-padding">
			<div class="col-md-6">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">البنك</label>
					</div>
					<div class="col-xs-8">
						<select class="form-control">
							<option value="">اختر</option>
							<option value="1">البلاد</option>
							<option value="2">إنماء</option>
							<option value="3">الراجحى</option>
						</select>
					</div>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">حجم الشيك</label>
					</div>
					<div class="col-xs-8">
						<select class="form-control">
							<option value="">اختر</option>
							<option value="1">كبير</option>
							<option value="2">صغير</option>
						</select>
					</div>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">العرض</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control" value="" id="chick-width" onblur="">
					</div>

				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">الإرتفاع</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control" value="" id="chick-height">
					</div>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="col-md-12 col-xs-12 no-padding">
					<div class="form-group ">
						<label class="label label-custom label-blue auto-width">بيانات الشيك</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-xs-4 no-padding">
							<label class="label label-custom label-blue auto-width">التاريخ</label>
						</div>
						<div class="col-xs-6 no-padding">
							<input type="text" name="" value="" id="addNew1" class="form-control">
						</div>
						<div class="col-xs-2">
							<button class="btn btn-success" onclick=" return addItem('addNew1','data-block1','12','1070','addItem1','editItem1')" id="addItem1">أضف </button>
							<button class="btn btn-success" onclick="return editItem('addNew1','data-block1')" id="editItem1" style="display: none"> تعديل </button>
						</div>

					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-xs-4 no-padding">
							<label class="label label-custom label-blue auto-width">حرر فى</label>
						</div>
						<div class="col-xs-6 no-padding">
							<input type="text" name="" value="" id="addNew2" class="form-control">
						</div>
						<div class="col-xs-2">
							<button class="btn btn-success" onclick=" return addItem('addNew2','data-block2','43','1092','addItem2','editItem2')" id="addItem2">أضف</button>

							<button class="btn btn-success" onclick="return editItem('addNew2','data-block2')" id="editItem2" style="display: none"> تعديل </button>
						</div>

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-xs-4 no-padding">
							<label class="label label-custom label-blue auto-width">المستفيد</label>
						</div>
						<div class="col-xs-6 no-padding">
							<input type="text" name="" value="" id="addNew3" class="form-control">
						</div>
						<div class="col-xs-2">
							<button class="btn btn-success" onclick=" return addItem('addNew3','data-block3','128','693','addItem3','editItem3')"  id="addItem3">أضف</button>
							<button class="btn btn-success" onclick="return editItem('addNew3','data-block3')" id="editItem3" style="display: none"> تعديل </button>
						</div>

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-xs-4 no-padding">
							<label class="label label-custom label-blue auto-width">المبلغ</label>
						</div>
						<div class="col-xs-6 no-padding">
							<input type="text" name="" value="" id="addNew4" class="form-control">
						</div>
						<div class="col-xs-2">
							<button class="btn btn-success" onclick=" return addItem('addNew4','data-block4','192','1087','addItem4','editItem4')" id="addItem4">أضف</button>
							<!--<button class="btn btn-success" onclick="editItem4();" id="editItem4" style="display: none"> تعديل </button>-->
							<button class="btn btn-success" onclick="return editItem('addNew4','data-block4')" id="editItem4" style="display: none"> تعديل </button>
						</div>

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-xs-4 no-padding">
							<label class="label label-custom label-blue auto-width">التفقيط</label>
						</div>
						<div class="col-xs-6 no-padding">
							<input type="text" name="" value="" id="addNew5" class="form-control">
						</div>
						<div class="col-xs-2">
							<button class="btn btn-success" onclick=" return addItem('addNew5','data-block5','178','518','addItem5','editItem5')" id="addItem5">أضف</button>
							<button class="btn btn-success" onclick="return editItem('addNew5','data-block5')" id="editItem5" style="display: none"> تعديل </button>
						</div>

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-xs-4 no-padding">
							<label class="label label-custom label-blue auto-width">البيان</label>
						</div>
						<div class="col-xs-6 no-padding">
							<input type="text" name="" value="" id="addNew6" class="form-control">
						</div>
						<div class="col-xs-2">
							<button class="btn btn-success" onclick=" return addItem('addNew6','data-block6','231','588','addItem6','editItem6')" id="addItem6">أضف</button>
							<button class="btn btn-success" onclick="return editItem('addNew6','data-block6')" id="editItem6" style="display: none"> تعديل </button>
						</div>

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-xs-4 no-padding">
							<label class="label label-custom label-blue auto-width">التوقيع</label>
						</div>
						<div class="col-xs-6 no-padding">
							<input type="text" name="" value="" id="addNew7" class="form-control">
						</div>
						<div class="col-xs-2">
							<button class="btn btn-success" onclick=" return addItem('addNew7','data-block7','330','1052','addItem7','editItem7')" id="addItem7">أضف</button>
							<button class="btn btn-success" onclick="return editItem('addNew7','data-block7')" id="editItem7" style="display: none"> تعديل </button>
						</div>

					</div>
				</div>
				<div class="col-md-12 col-xs-12 no-padding">
					<div class="form-group ">
						<label class="label label-custom label-blue auto-width">بيانات الكعب</label>
					</div>
				</div>



				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-xs-4 no-padding">
							<label class="label label-custom label-blue auto-width">رقم</label>
						</div>
						<div class="col-xs-6 no-padding">
							<input type="text" name="" value="" id="addNewK1" class="form-control">
						</div>
						<div class="col-xs-2">
							<button class="btn btn-success" onclick=" return addItem('addNewK1','data-block8','3','112','addItemK1','editItemK1')" id="addItemK1">أضف</button>
							<button class="btn btn-success" onclick="return editItem('addNewK1','data-block8')" id="editItemK1" style="display: none"> تعديل </button>
						</div>

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-xs-4 no-padding">
							<label class="label label-custom label-blue auto-width">التاريخ</label>
						</div>
						<div class="col-xs-6 no-padding">
							<input type="text" name="" value="" id="addNewK2" class="form-control">
						</div>
						<div class="col-xs-2">
							<button class="btn btn-success" onclick=" return addItem('addNewK2','data-block9','31','107','addItemK2','editItemK2')" id="addItemK2">أضف</button>
							<button class="btn btn-success" onclick="return editItem('addNewK2','data-block9')" id="editItemK2" style="display: none"> تعديل </button>
						</div>

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-xs-4 no-padding">
							<label class="label label-custom label-blue auto-width">إلى</label>
						</div>
						<div class="col-xs-6 no-padding">
							<input type="text" name="" value="" id="addNewK3" class="form-control">
						</div>
						<div class="col-xs-2">
							<button class="btn btn-success"  onclick=" return addItem('addNewK3','data-block10','58','77','addItemK3','editItemK3')" id="addItemK3">أضف</button>
							<button class="btn btn-success" onclick="return editItem('addNewK3','data-block10')" id="editItemK3" style="display: none"> تعديل </button>
						</div>

					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group ">
						<div class="col-xs-4 no-padding">
							<label class="label label-custom label-blue auto-width">ريال</label>
						</div>
						<div class="col-xs-6 no-padding">
							<input type="text" name="" value="" id="addNewK4" class="form-control">
						</div>
						<div class="col-xs-2">
							<button class="btn btn-success" onclick=" return addItem('addNewK4','data-block11','83','120','addItemK4','editItemK4')"  id="addItemK4">أضف</button>
							<button class="btn btn-success" onclick="return editItem('addNewK4','data-block11')" id="editItemK4" style="display: none"> تعديل </button>
						</div>

					</div>
				</div>


			</div>
		</div>
		<div class="col-md-4 col-xs-12 ">


			<button  type="button" class="btn btn-success" id="btnConvert">تحويل</button>
			<button  type="button" class="btn btn-success" id="btnSave">حفظ الشيك</button>
			<button  type="button" class="btn btn-success" onclick="printCanvas()" >طباعة</button>
			<!--<button  type="button" class="btn btn-success" onclick="printDiv('printSec')" >طباعة</button>-->


			<br><br>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<label class="label label-custom label-blue auto-width">معاينة إعدادات الطباعة</label>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">التاريخ</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control">
					</div>

				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">المستفيد</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">المبلغ</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control">
					</div>

				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">التفقيط</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="form-group ">
					<div class="col-xs-4 no-padding">
						<label class="label label-custom label-blue auto-width">البيان</label>
					</div>
					<div class="col-xs-8">
						<input type="number" name="" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-12 col-xs-12 no-padding">
				<div class="col-xs-6">
					<div class="form-group ">
						<label class="label label-custom label-blue auto-width">اعدادت الخلفية</label>
					</div>
					<div class="form-group ">
						<label>اختر الخلفية</label>
						<input type="file" name="fileupload" value="fileupload" id="fileupload">
					</div>
				</div>
				<div class="col-xs-6">
					<div class="form-group ">
						<label class="label label-custom label-blue auto-width">اعدادت اللون</label>
					</div>

					<input class="jscolor" value="a96a61">
				</div>
				<!--<div class="col-xs-6">
					<div class="form-group ">
						<label class="label label-custom label-blue auto-width">اعدادت الخط</label>
					</div>

					<button class="btn btn-success fzincrease">+</button>
					<button class="btn btn-danger fzdecrease">-</button>
				</div>-->

			</div>
		</div>

		
		


	</div>
    
    
    
	<div class="container-fluid">
		<div class="col-xs-12">
			<div class="listBlock">			
				<h2>ما سيتم كتابته سيظهر هنا " يمكنك تحريكه "</h2>
				<section id="Printable">
					<div id="sortable2" class="droptrue ui-sortable" unselectable="on" style="min-height: 128px;position: relative;">
						<div class="elbelad" id="cheque" data-src="path/to/image" data-caching-key="userImage" style="height: 450px;">
							<div id="sortable1" class="droptrue ui-sortable" unselectable="on" style="min-height: 128px;">
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>


	<div class="container-fluid">
		<div id="printSec">
			<div id="img-out"></div>
		</div>
	</div>

    <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
   	<script src="<?php echo base_url() ?>asisst/admin_asset/js/sheeks/jscolor.js"></script>




	<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/sheeks/saving/html2canvas.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/sheeks/saving/base64.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/sheeks/saving/canvas2image.js"></script>


	<script language="JavaScript" type="text/javascript">

		$(function() {
			$("div.droptrue").sortable({
				connectWith: 'div',
				opacity: 0.6,
				update : updatePostOrder
			});

			$("#sortable1, #sortable2").disableSelection();
			$("#sortable1, #sortable2").css('minHeight',$("#sortable1").height()+"px");
			updatePostOrder();
		});

		function updatePostOrder() { 
			var arr = [];
			$("#sortable2 h5").each(function(){
				arr.push($(this).attr('id'));
			});
			$('#postOrder').val(arr.join(','));
		}


		/*function addID(){
			var list = document.getElementsByClassName("ui-draggable");
			for (var i = 0; i < list.length; i++) {
				list[i].setAttribute("id", "data-block" + parseInt(i+1));
			}
		}*/
		function editItem(id,datablock) {
			var valu = $("#"+id).val();
			$("#"+datablock).html(valu);
		}
		function addItem(inputID,datablock,topCss,leftCss,addId,editId){
			var valu = $("#"+inputID).val();
			$("#sortable2").append("<h5 class='draggable ui-draggable' id='"+datablock+"'  style='opacity: 1;position: absolute;top: "+topCss+"px;    left: "+leftCss+"px;'>"+ valu +"</h5>")
			$( ".draggable" ).draggable();
			/*addID();*/
			/*$("#addNew1").attr("disabled","disabled");*/
			$("#"+addId).css("display","none");
			$("#"+editId).css("display","block");

		}
		$(".jscolor").blur(function() {
			var jscolor=$(this).val();
			$(".ui-draggable").css("color", "#"+jscolor);
		});
	</script>

	<script language="javascript">
		$(function() { 
			$("#btnConvert").click(function() { 
				html2canvas($("#Printable"), {
					onrendered: function(canvas) {
						theCanvas = canvas;
						document.body.appendChild(canvas);

                // Convert and download as image 
                Canvas2Image.convertToImage(canvas); 
                $("#img-out").html(canvas);
                // Clean up 
                //document.body.removeChild(canvas);
            }
        });
			});

			$("#btnSave").click(function() { 
				html2canvas($("#Printable"), {
					onrendered: function(canvas) {
						theCanvas = canvas;
						document.body.appendChild(canvas);
                // Convert and download as image 
                Canvas2Image.saveAsPNG(canvas); 
                /* $("#img-out").html(canvas);*/
                // Clean up 
                //document.body.removeChild(canvas);
            }
        });
			});


		}); 
		function printDiv(divName) {
            //Get the HTML of div
            var divElements = document.getElementById(divName).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;

            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = 
            "<html><head><title></title></head><body>" + 
            divElements + "</body>";

            //Print Page
            window.print();

            //Restore orignal HTML
            document.body.innerHTML = oldPage;


        }
        function printCanvas()  
        {  
        	var dataUrl = document.getElementById('canvas').toDataURL(); 
        	/*attempt to save base64 string to server using this var  */
        	var windowContent = '<!DOCTYPE html>';
        	windowContent += '<html>'
        	windowContent += '<head><title>Print canvas</title></head>';
        	windowContent += '<body>'
        	windowContent += '<img src="' + dataUrl + '">';
        	windowContent += '</body>';
        	windowContent += '</html>';
        	var printWin = window.open('','','width=100%,height=auto');
        	printWin.document.open();
        	printWin.document.write(windowContent);
        	printWin.document.close();
        	printWin.focus();
        	printWin.print();
        	printWin.close();
        }

    </script>

    <script type="text/javascript">
    	$(".fzincrease").click(function() {
    		var fontSize = parseInt($(".ui-draggable").css("font-size"));
    		fontSize = fontSize + 1 + "px";
    		$('.ui-draggable').css({'font-size':fontSize});
    	});
    	$(".fzdecrease").click(function() {
    		var fontSize = parseInt($(".ui-draggable").css("font-size"));
    		fontSize = fontSize - 1 + "px";
    		$('.ui-draggable').css({'font-size':fontSize});
    	});
    </script>

    <script>
    	function readURL(input) {

    		if (input.files && input.files[0]) {
    			var reader = new FileReader();

    			reader.onload = function (e) {
				//$('#blah').attr('src', e.target.result);
				$(".elbelad").css('background','url('+e.target.result+')');
				$(".elbelad").attr("data-src",e.target.result)
				imgData = e.target.result;
				localStorage.setItem("imgData", imgData);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#fileupload").change(function(){
		readURL(this);
	});

	function checkEdits(){
		var dataImage = localStorage.getItem('imgData');
		$(".elbelad").css('background','url('+dataImage+')');
		/*bannerImg.src = "data:image/png;base64," + dataImage;*/
	}

</script>
<script>
	$( function() {
		$( ".draggable" ).draggable();
		$( ".resizable" ).resizable();
	} );
</script>
