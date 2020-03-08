
<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="text-center">
            <h3>سلة المشتريات</h3>
        </div>
        <div class="hello_client background-white ptop-30 pbottom-30 text-center mbottom-40">
            <h5>أهلاً بك شريك النجاح</h5>
            <h5 class="green-color">ونشكر لك تسوقك في متجر جمعية الملك عبدالعزيز الأهلية النسائية
  </h5>
            <h4>أخلف الله عليك خيراً .. وبارك في رزقك</h4>
        </div>

        <div class="col-xs-12 no-padding">
            <div class="col-md-8 background-white">
                <div class="shopping-cart-table">
                    <h5 class="green-color text-center"><span><i class="fa fa-shopping-cart"></i></span>سلة المشتريات</h5>
                    <div class="cart-details ">
                        <div id="shopping-cart-results">
                            <div>
                                <form method="post" class="form-horizontal" role="form" action="<?php echo base_url() ?>paypal/create_payment_with_paypal">
                                <fieldset>
                                    <input title="item_name" name="item_name" type="hidden" value="Ahmed Ali Taha">
                                    <input title="item_number" id="" name="item_number" type="hidden" value="#12345">
                                    <input title="item_description" name="item_description" type="hidden" value="to buy samsung smart tv">
                                    <input title="item_tax" name="item_tax" type="hidden" value="1">
                                    <input title="item_price" name="item_price" type="hidden" value="200"  class="item_price_send">
                                    <input title="details_tax" name="details_tax" type="hidden" value="10">
                                    <input title="details_subtotal" name="details_subtotal" type="hidden" value="200" class="item_price_send">
                                    

<table class="table table-bordered table-hover table-striped"  >
				<thead>
					<tr>
						<th>م</th>
						<th>إسم المشروع</th>		
						<th> عدد الأسهم * السعر</th>
						<th>قيمة السهم</th>
						<th>الإجراء</th>
					</tr>	
				</thead>
				<tbody class="show-cart">
					<tr>
						<td>مشروع</td>
						<td>3</td>
						<td>200</td>
						<td>تبرع</td>
						<td><a href="#" class="red_trash"><i class="fa fa-trash"></i></a></td>
					</tr>
				</tbody>
			</table>
											</div>     
											<div class="clear"></div>   
											<div class="full-fee div-padding">
                                            <!--
												<p>لديك <span  class="count-cart"> 1 </span> منتج فى السلة</p>
												<p>إجمالى السعر <span  class="total-cart"> 200 </span> ريال سعودى</p> -->
												<button onclick="save_pro();" class="btn transition-5 btn-success" type="button" style="width: auto !important;"> إتمام الدفع </button>
											
<!--												<button class="clear-cart btn btn-danger transition-5" style="width: auto !important;">تفريغ السلة</button>-->
											</div>
                                            </fieldset>

							</form>  
                            </div>
                            <div class="clear"></div>
                            <div class="full-fee div-padding">
                             <!--   <p>لديك <span  id="count-cart"> 1 </span> منتج فى السلة</p>
                                <p>إجمالى السعر <span  id="total-cart"> 200 </span> ريال سعودى</p>-->
                                <!--<button class="btn btn-green transition-5"> أضف إلى الشراء </button>

                                <button id="clear-cart" class=" btn transition-5 btn-green-borderd">تفريغ السلة</button>-->
                            </div>

                        </div>
                        
                    </div>
                </div>
           
            <div class="col-md-4">
                <div class="complete_payment padding-7 pbottom-10 background-white">
                    <div class="forms_head mbottom-10">إتمام الدفع</div>
                    <form>
                    
                    <!--	    <div class="form-group">
                            <label>المدينه</label>
                            <select id="country" onchange="get_center($(this).val());"  name="country" class="form-control required">
                                <option value="">اختر</option>
                               <?php if(isset($city)&&!empty($city)){
                                   foreach ($city as $row){
                                   ?>
                                       <option value="<?php echo $row->title;?>"><?php echo $row->title;?></option>
                                <?php } } ?>
                            </select>
                            <div class="country" style="color: red; display: none;">هذا الحقل مطلوب</div>
                        </div>
                        <div class="form-group">
                            <label>المركز</label>
                            <select id="twon" onchange="$('.twon').hide();" name="twon" class="form-control required">
                                <option value="">اختر</option>
                                <?php if(isset($centers)&&!empty($centers)){
                                    foreach ($centers as $row){
                                        ?>
                                        <option value="<?php echo $row->title;?>"><?php echo $row->title;?></option>
                                    <?php } } ?>
                            </select>
                            <div class="twon" style="color: red; display: none;">هذا الحقل مطلوب</div>
                        </div>-->
                    
                      <!--  <div class="form-group">
                            <label>المنطقة</label>
                            <select id="country" onchange="$('.country').hide();"  name="country" class="form-control required">
                                <option value="الباحة" selected="selected">الباحة</option>
                                <option value="الرياض">الرياض</option>
                                <option value="مكة المكرمة">مكة المكرمة</option>
                               
                                <option value="المدينة المنورة">المدينة المنورة</option>
                                <option value="القصيم">القصيم</option>
                                <option value="المنطقة الشرقية">المنطقة الشرقية</option>
                                <option value="عسير">عسير</option>
                                <option value="تبوك">تبوك</option>
                                <option value="حائل">حائل</option>
                                <option value="الحدود الشمالية">الحدود الشمالية</option>
                                <option value="جازان">جازان</option>
                                  <option value="نجران">نجران</option>
                                  
                                    <option value="الجوف">الجوف</option>
                            </select>
                            <div class="country" style="color: red; display: none;">هذا الحقل مطلوب</div>
                        </div>
                        <div class="form-group">
                            <label>المدينة</label>
                            
                            <select id="twon" onchange="$('.twon').hide();" name="twon" class="form-control required">
                                <option value="جدة" selected="selected">جدة</option>
                                <option value="الرياض">الرياض</option>
                                <option value="الدمام">الدمام</option>
                            </select>
                            <div class="twon" style="color: red; display: none;">هذا الحقل مطلوب</div>
                        </div>-->
                        
                        
                        <div class="form-group">
                            <label>المنطقة</label>
                            <select id="country" onchange="$('.country').hide();"  name="country" class="form-control required">
                                <option value="الباحة" selected="selected">الباحة</option>
                                <option value="الرياض">الرياض</option>
                                <option value="مكة المكرمة">مكة المكرمة</option>
                               
                                <option value="المدينة المنورة">المدينة المنورة</option>
                                <option value="القصيم">القصيم</option>
                                <option value="المنطقة الشرقية">المنطقة الشرقية</option>
                                <option value="عسير">عسير</option>
                                <option value="تبوك">تبوك</option>
                                <option value="حائل">حائل</option>
                                <option value="الحدود الشمالية">الحدود الشمالية</option>
                                <option value="جازان">جازان</option>
                                  <option value="نجران">نجران</option>
                                  
                                    <option value="الجوف">الجوف</option>
                            </select>
                            <div class="country" style="color: red; display: none;">هذا الحقل مطلوب</div>
                        </div>
                        <div class="form-group">
                            <label>المدينة</label>
                            
                                 <input type="text" id="twon" name="twon" class="form-control required"/>
                               <div class="twon" style="color: red; display: none;">هذا الحقل مطلوب</div>
                        </div> 
                        
                  
                        
                        
                        
                        
                        
                        <div class="form-group">
                            <label>الإسم </label>
                            <input type="text" onfocus="$('.name').hide();"  id="name" name="name" class="form-control required">
                            <div class="name" style="color: red; display: none;">هذا الحقل مطلوب</div>
                        </div>
                        <div class="form-group">
                            <label>الجوال </label>
                            <input type="text"  onfocus="$('.phone').hide();" id="phone" name="phone" class="form-control required">
                            <div class="phone" style="color: red; display: none;">هذا الحقل مطلوب</div>
                        </div>
                        <div class="form-group">
                            <label>البريد الإلكترونى </label>
                            <input type="text" onfocus="$('.email').hide();"  id="email" name="country" class="form-control required">
                            <div class="email" style="color: red; display: none;">هذا الحقل مطلوب</div>
                        </div>
                       <!-- <div class="form-group">
                            <label>نوع التبرع</label>
                            <select id="" name="country" class="form-control required">
                                <option value="" selected="selected">تبرع عبر البطاقة الإئتمانية</option>
                                <option value="">تبرع عن طريق التحويل البنكى</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>رقم البطاقة</label>
                            <input type="text"  id="" name="country" class="form-control required">
                        </div>
                        <div class="form-group">
                            <label>CCV </label>
                            <input type="text"  id="" name="country" class="form-control required">
                        </div>
                        <div class="form-group">
                            <label>الإسم على البطاقة  </label>
                            <input type="text"  id="" name="country" class="form-control required">
                        </div>
                        <div class="form-group">
                            <label>شهر الإنتهاء</label>
                            <select id="" name="country" class="form-control required">
                                <option value="" selected="selected">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>سنة الإنتهاء</label>
                            <select id="" name="country" class="form-control required">
                                <option value="" selected="selected">2018</option>
                                <option value="">2019</option>
                                <option value="">2020</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">أرسل</button>
                        </div>-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


