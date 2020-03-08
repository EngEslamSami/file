


	<section class="sec">
		<div class="container-fluid">
			<div class="sign-up ">
				<p class="sec-p-title green">التبرع المباشر</p>
				<div class="text-center quran">
					<p>( مَّثَلُ الَّذِينَ يُنفِقُونَ أَمْوَالَهُمْ فِي سَبِيلِ اللَّهِ كَمَثَلِ حَبَّةٍ أَنبَتَتْ سَبْعَ سَنَابِلَ فِي كُلِّ سُنبُلَةٍ مِّائَةُ حَبَّةٍ ۗ وَاللَّهُ يُضَاعِفُ لِمَن يَشَاءُ ۗ وَاللَّهُ وَاسِعٌ عَلِيمٌ )</p>
					<p>كتب الله اجرك .. وبارك في رزقك .. واخلف عليك خيرا</p>
				</div>
				<form method="POST" action="" accept-charset="UTF-8">
					<div class="col-xs-12 no-padding">
						<div class="form-group form-log-in    col-md-6">
							<input type="text" class="form-control" id="name" placeholder="الاسم" name="name" value="فاعل خير ">
						</div>
						<div class="form-group form-log-in   col-md-6 ">
							<input type="number" class="form-control" id="number" placeholder="الجوال" name="phone" >
						</div>
						<div class="form-group form-log-in   col-md-6">
							<input type="email" class="form-control" id="email" placeholder="الايميل" name="email">
						</div>

						<div class="form-group form-log-in   col-md-6 ">
							<input type="number" class="form-control" id="number" placeholder="مبلغ التبرع" name="total" required>
						</div>
						<div class="form-group form-log-in   col-md-6 ">
							<select class="form-control selectpicker" name="city_id"><option selected="selected" value="">اختر المدينه</option><option value="7">بريدة</option><option value="11">جازان</option><option value="14">صنعاء</option><option value="15">القاهرة</option></select>
						</div>

						

						<div id="us3" style="width: 100%; height: 300px;"></div>
						<div class="clearfix">&nbsp;</div>
						<div class="form-group col-sm-6">
							<label>الموقع هنا:</label>
							<input type="text" class="form-control" id="us3-address" />
						</div>
						<div class="form-group col-sm-6">
							<label>مساحة الموقع:</label>
							<input type="text" class="form-control" id="us3-radius" style="font-family: arial" />
						</div>
						<div class="form-group col-sm-6">
							<label> (Lat):</label>

							<input type="text" name="lat_map" class="form-control" style="font-family: arial" id="us3-lat" />
						</div>
						<div class="form-group col-sm-6">
							<label> (Long):</label>
							<input type="text" name="lang_map" class="form-control" style="font-family: arial" id="us3-lon" />
						</div>








						<div class="form-group form-log-in   col-md-6">
							<div class="select-custom">
								<select class="selectpicker" data-live-search="true" name="donate_type_id"><option selected="selected" value="">اختر نوع التبرع</option>
									<option value="2">الأوقاف</option>
									<option value="9">الكفالات</option>
									<option value="11">الزكاة</option>
									<option value="12">تبرع عام</option>
									<option value="13">برامج متنوعة</option>
								</select>
							</div>

						</div>

						<div class="form-group form-log-in   col-md-6">
							<div class="select-custom">
								<select class="selectpicker" data-live-search="true" name="methood">

									<option value="VISA">فيزا</option>
									<option value="MASTER">ماستر كارد</option>

								</select>
							</div>


						</div>


						<div class="form-group form-log-in  col-md-4">
							<input type="text" class="form-control" id="card_num" placeholder="رقم البطاقة  " name="car_num" required>
						</div>

						<div class="form-group form-log-in col-md-2">
							<input type="password" class="form-control" id="car_cvv" placeholder="cvv " name="car_cvv" required>
						</div>
						<div class="form-group form-log-in col-md-3">
							<input type="text" class="form-control" max="4" id="email" placeholder="شهر الانتهاء " name="car_month" required>
						</div>
						<div class="form-group form-log-in col-md-3">
							<input type="text" class="form-control" max="4" id="email" placeholder="سنه الانتهاء " name="car_year" required>
						</div>

						<div class="col-xs-12 text-center btn-full-width ">
							<button type="submit" class="btn  add-sh btn10"><span>تاكيد</span></button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</section>






	<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyC4l5QxL27z4w0uuD_5X3g0IRhaUdvb0Q4&?sensor=false&libraries=places'></script>
	<script src="<?php echo base_url(); ?>asisst/store_asset/js/locationpicker.jquery.min.js"></script>
	<script>
		$('#us3').locationpicker({
			//mapTypeId: google.maps.MapTypeId.HYBRID,
			location: {
				latitude: 26.359285470651827,
				longitude: 43.96448145727538
			},

			radius: 30,
			zoom: 15,
			inputBinding: {
				latitudeInput: $('#us3-lat'),
				longitudeInput: $('#us3-lon'),
				radiusInput: $('#us3-radius'),
				locationNameInput: $('#us3-address')
			},

			enableAutocomplete: true,
			onchanged: function (currentLocation, radius, isMarkerDropped) {
            // Uncomment line below to show alert on each Location Changed event
            //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
        }
    });
</script>

