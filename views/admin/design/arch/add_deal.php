<div class="col-sm-12 no-padding " >

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">تسجيل معاملة جديدة</h3>
         </div>
        <div class="panel-body" style="min-height: 485px;">
           <div class="vertical-tabs">
			<ul class="nav nav-tabs nav-tabs-vertical" role="tablist">
				<li class="nav-item active">
					<a class="nav-link " data-toggle="tab" href="#pag1" role="tab" aria-controls="pag1"><i class="fa fa-2x fa-keyboard-o "></i> تفاصيل المعاملة</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag2" role="tab" aria-controls="pag2"><i class="fa fa-2x fa-paperclip"></i> المرفقات</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag3" role="tab" aria-controls="pag3"><i class="fa fa-2x fa-folder-open-o"></i> العلاقات</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag4" role="tab" aria-controls="pag4"><i class="fa fa-2x fa-reply-all"></i> التحويلات</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag5" role="tab" aria-controls="pag5"><i class="fa fa-2x fa-comment-o"></i> التوجيهات / التأشيرات</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag6" role="tab" aria-controls="pag6"><i class="fa fa-2x fa-bell-o"></i> التنبيهات</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag7" role="tab" aria-controls="pag7"><i class="fa fa-2x fa-clock-o"></i> الأنشطة</a>
				</li>

			</ul>


			<div class="tab-content tab-content-vertical">
				<div class="tab-pane active" id="pag1" role="tabpanel">
				  <div class="col-xs-12 no-padding">
                    <div class="col-md-3 padding-4">
                      <label class="label">رقم المعاملة</label>
                      <input type="text" class="form-control" style="width: 33.33%;float: right;" placeholder="0071" disabled />
                      <input type="text" class="form-control" style="width: 33.33%;float: right;" placeholder="2019"  />
                      <input type="text" class="form-control" style="width: 33.33%;float: right;" placeholder=" "  />
                    </div>
                    
                    <div class="col-md-3 col-sm-4 padding-4">
                        <label class="label">الإدارة</label>
                         <select class="form-control">
                           <option>الرعاية الإجتماعية</option>
                           <option>تنمية الموارد المالية</option>
                           <option>تنمية الموارد البشرية</option>
                         </select>
                    </div>
                     <div class="col-md-3 col-sm-4 padding-4">
                        <label class="label">القسم</label>
                         <select class="form-control">
                           <option>الرعاية الإجتماعية</option>
                           <option>تنمية الموارد المالية</option>
                           <option>تنمية الموارد البشرية</option>
                         </select>
                    </div>
                    <div class="col-md-3 col-sm-4 padding-4">
                        <label class="label">نوع الإجراء</label>
                         <select class="form-control">
                           <option>اختر</option>
                            
                         </select>
                    </div>
                    <div class="col-md-4 col-sm-4 padding-4">
                        <label class="label">المجلد</label>
                         <select class="form-control">
                           <option>المجلد الرئيسي</option>
                           <option>مجلد الرعاية الإجتماعية</option>
                           <option>مجلد السكرتارية</option>
                         </select>
                    </div>
                    <div class="col-md-4 col-sm-4 padding-4">
                      <label class="label">الموضوع</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>
                    
                    <div class="col-md-4 col-sm-3 col-xs-6">
                       <label class="label">الحساب</label>
                       <input type="text" class="form-control" style="width:85%; float: right;"/>
                       <button type="button" data-toggle="modal" data-target="#myModalInfo" class="btn btn-success btn-next" style="float: right;">
                            <i class="fa fa-plus"></i>  </button>
                     </div>
                     <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label">رقم الهاتف</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-2 col-sm-4 padding-4">
                        <label class="label">نوع الخطاب</label>
                         <select class="form-control">
                           <option>خطاب 1</option>
                           <option>خطاب 2</option>
                           <option>خطاب 3</option>
                         </select>
                    </div>
                    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label">التاريخ</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>
                    
                    <div class="col-md-3 col-sm-3 col-xs-6">
                       <label class="label">من <small>الجهه</small></label>
                       <input type="text" class="form-control" style="width:85%; float: right;"/>
                       <button type="button" data-toggle="modal" data-target="#myModalInfo" class="btn btn-success btn-next" style="float: right;">
                            <i class="fa fa-plus"></i>  </button>
                     </div>
                     <div class="col-md-3 col-sm-3 col-xs-6">
                       <label class="label">إلى <small>الجهه</small></label>
                       <input type="text" class="form-control" style="width:85%; float: right;"/>
                       <button type="button" data-toggle="modal" data-target="#myModalInfo" class="btn btn-success btn-next" style="float: right;">
                            <i class="fa fa-plus"></i>  </button>
                     </div>
                     
                     <div class="col-md-3 col-sm-4 padding-4">
                        <label class="label">يحتاج متابعة</label>
                         <select class="form-control">
                           <option>نعم</option>
                           <option>لا</option>
                           
                         </select>
                    </div>
                    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label">الرقم السري</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-4 col-sm-4 padding-4">
                      <label class="label">إسناد المعاملة</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>
                    
                    <div class="col-md-3 col-sm-4 padding-4">
                      <label class="label">الإسم التجارى</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-3 col-sm-4 padding-4">
                      <label class="label">رقم الرخصة التجارية</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>
                     <div class="col-md-3 col-sm-4 padding-4">
                        <label class="label">نوع الرخصة</label>
                         <select class="form-control">
                           <option>نعم</option>
                           <option>لا</option>
                           
                         </select>
                    </div>
                    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label">تاريخ الإصدار</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label">تاريخ الإنتهاء</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label">عدد العاملين</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label">العنوان</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label">أنواع الخدمات</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>
                    <div class="col-md-6 col-sm-4 padding-4">
                      <label class="label">ملاحظات</label>
                      <input type="text" class="form-control" placeholder="" />
                    </div>
              
              
              
                  </div>
                  <div class="col-xs-12 text-center" style="margin-top: 15px;">
      
                    <button type="button" onclick="GetRedirectPage()" class="btn btn-labeled btn-success " name="save" value="save">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
    
                   
                    <button type="button" class="btn btn-labeled btn-danger ">
                        <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                    </button>
    
                    <button type="button" class="btn btn-labeled btn-purple ">
                        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                    </button>
                    
                    
                      <button type="button" class="btn btn-labeled btn-yellow " id="attach_button" data-target="#myModal_search" data-toggle="modal">
                        <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                    </button>
    
                </div>

				</div>
				<div class="tab-pane" id="pag2" role="tabpanel">
				
				</div>
				<div class="tab-pane" id="pag3" role="tabpanel">
				


				</div>
				<div class="tab-pane" id="pag4" role="tabpanel">
					
				</div>

				<div class="tab-pane" id="pag5" role="tabpanel">
					
				</div>
                
                <div class="tab-pane" id="pag6" role="tabpanel">
					
				</div>
                
                <div class="tab-pane" id="pag7" role="tabpanel">
					
				</div>



			</div>
		</div>
        
        
        </div>
    </div>
</div>