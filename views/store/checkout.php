

	<section class="checkout mtop-30 mbottom-50">
		<div class="container">
			<div class="stepwizard">
				<div class="stepwizard-row setup-panel">
					<div class="stepwizard-step">
						<a href="#step-1" type="button" class="btn btn-orange btn-circle">1</a>
						<p>السلة</p>
					</div>
					<div class="stepwizard-step">
						<a href="#step-2" type="button" class="btn btn-blue btn-circle" disabled="disabled">2</a>
						<p>الشحن</p>
					</div>
					<div class="stepwizard-step">
						<a href="#step-3" type="button" class="btn btn-blue btn-circle" disabled="disabled">3</a>
						<p>الدفع</p>
					</div>
				</div>
			</div>
			<form role="form">
				<div class="row setup-content" id="step-1">
					<div class="col-xs-12">
						<div class="col-md-12">
							<h5> سلة التبرعات</h5>
							<div class="bill">
								<table class="table table-bordered tb-table">
									<thead>
										<tr class="info">
											<th>م</th>
											<th>إسم المنتج</th>
											<th>عدد الأسهم </th>
											<th>قيمة السهم</th>
											<th>الإجمالى</th>
										</tr>
									</thead>
									<tbody class="show-cart2_pop">


									</tbody>
									<tfoot>
										<tr class="info">
											<th colspan="4">الإجمالى</th>
											<th class="total-cart"></th>
										</tr>
									</tfoot>
								</table>
								<br>
							</div>
							<div class="col-xs-12 text-center btn-full-width ">
								<button class="btn btn-primary btn10 nextBtn pull-right" type="button" style="width: 150px;">الدفع</button>
							</div>

							
						</div>
					</div>
				</div>
				<div class="row setup-content" id="step-2">
					<div class="col-md-1"></div>
					<div class="col-md-10 col-xs-12">
					<br>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title text-center">اختر وسيلة الدفع</h5>
							</div>
							<div class="panel-body">
								<div class="paymentCont">
									<div class="headingWrap">
										<h5 class="headingTop text-center">اختر وسيلة الدفع المناسبة لك <small>جارى العمل على باقى وسائل الدفع</small></h5>	
										
									</div>
									<div class="paymentWrap">
										<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
											<label class="btn paymentMethod active">
												<div class="method bank"></div>

												<input type="radio" name="options" checked>
											</label>
											<label class="btn paymentMethod" disabled="disabled">
												<div class="method cash"></div>
												<input type="radio" name="options"> 
											</label>


											<label class="btn paymentMethod " disabled="disabled">
												<div class="method visa"></div>
												<input type="radio" name="options"> 
											</label>
											<label class="btn paymentMethod" disabled="disabled">
												<div class="method master-card"></div>
												<input type="radio" name="options" > 
											</label>
											
											<label class="btn paymentMethod" disabled="disabled">
												<div class="method paypal"></div>
												<input type="radio" name="options" > 
											</label>
											

										</div>        
									</div>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title text-center">ملخص الطلب</h5>
							</div>
							<div class="panel-body">

								<table class="table">
									<tbody>
										<tr>
											<td>مجموع السلة</td>
											<td class="orders-num"></td>
										</tr>
										<tr>
											<td>إجمالي الطلب</td>
											<td><span class="label label-success total-cart"></span></td>
										</tr>
									</tbody>
								</table>

							</div>

						</div>
						<div class="col-xs-12 text-center btn-full-width ">
							<button onclick="save_pro();" class="btn btn-primary btn10 nextBtn pull-right" type="button" style="width: 150px;">الدفع</button>
						</div>
						

					</div>
					<div class="col-md-1"></div>

				</div>
				<div class="row setup-content" id="step-3">
					<div class="col-xs-12">
						<div class="col-md-12">
							<h3> Step 3</h3>
							<button class="btn btn-success btn10 btn-lg pull-right" type="submit">انتهاء!</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>










	<script type="text/javascript" src="<?php echo base_url(); ?>asisst/store_asset/js/jquery-1.10.1.min.js"></script>


	<script>
		$(document).ready(function () {

			var navListItems = $('div.setup-panel div a'),
			allWells = $('.setup-content'),
			allNextBtn = $('.nextBtn');

			allWells.hide();

			navListItems.click(function (e) {
				e.preventDefault();
				var $target = $($(this).attr('href')),
				$item = $(this);

				if (!$item.hasClass('disabled')) {
					navListItems.removeClass('btn-orange').addClass('btn-blue');
					$item.addClass('btn-orange');
					allWells.hide();
					$target.show();
					$target.find('input:eq(0)').focus();
				}
			});

			allNextBtn.click(function(){
				var curStep = $(this).closest(".setup-content"),
				curStepBtn = curStep.attr("id"),
				nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
				curInputs = curStep.find("input[type='text'],input[type='url']"),
				isValid = true;

				$(".form-group").removeClass("has-error");
				for(var i=0; i<curInputs.length; i++){
					if (!curInputs[i].validity.valid){
						isValid = false;
						$(curInputs[i]).closest(".form-group").addClass("has-error");
					}
				}

				if (isValid)
					nextStepWizard.removeAttr('disabled').trigger('click');
			});

			$('div.setup-panel div a.btn-orange').trigger('click');
		});
	</script>



