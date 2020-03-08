<div class="col-sm-12 no-padding " >

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">المعاملات</h3>
            <a href="<?php echo base_url() ?>Dashboard/add_deal" class="btn btn-success btn-labeled" style="float: left;margin-left: 50px;color: #fff;    margin-top: 3px;"><span class="btn-label"><i class="fa fa-plus"></i></span>تسجيل معاملة جديدة</a>
        </div>
        <div class="panel-body" style="min-height: 485px;">
        
            <div class="col-xs-12 no-padding">
              <div class="col-md-2 col-sm-4 padding-4">
                 <select class="form-control">
                   <option>المجلد الرئيسي</option>
                   <option>مجلد الرعاية الإجتماعية</option>
                   <option>مجلد السكرتارية</option>
                 </select>
              </div>
              
              <div class="col-md-2 col-sm-4 padding-4">
                 <select class="form-control">
                   <option>نوع الإجراء</option>
                   <option>داخلى</option>
                   <option>صادر</option>
                   <option>وارد</option>
                   <option>أرشيف إلكترونى</option>
                 </select>
              </div>
              
              <div class="col-md-2 col-sm-4 padding-4">
                 <select class="form-control">
                   <option>نوع الخطاب</option>
                   <option>خطاب 1</option>
                   <option>خطاب 2</option>
                   
                 </select>
              </div>
              
              <div class="col-md-2 col-sm-4 padding-4">
                 <select class="form-control">
                   <option>المتابعة</option>
                 </select>
              </div>
              
              <div class="col-md-2 col-sm-4 padding-4">
                 <select class="form-control">
                   <option>حالة المعاملة</option>
                 </select>
              </div>
              
              <div class="col-md-12 col-sm-12 padding-4 text-center" style="margin-top: 10px;">
                 <button class="btn btn-success btn-labeled"><span class="btn-label"><i class="fa fa-search"></i></span>بحث</button>
                <button class="btn btn-warning btn-labeled" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                 <span class="btn-label"><i class="fa fa-search"></i></span>بحث متقدم</button>

              </div>
              
            </div>
            <div class="col-xs-12 no-padding">
               <div class="collapse" id="collapseExample">
                  <div class="well" style="margin-top: 10px;height: auto;display: inline-block;width:100%; margin-bottom: 0;">
                     <div class="col-md-3 col-sm-3 col-xs-6">
                       <label class="label">الموضوع <small>رقم المعاملة</small></label>
                       <input type="text" class="form-control" />
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
                     <div class="col-md-3 col-sm-3 col-xs-6">
                       <label class="label">الحساب</label>
                       <input type="text" class="form-control" style="width:85%; float: right;"/>
                       <button type="button" data-toggle="modal" data-target="#myModalInfo" class="btn btn-success btn-next" style="float: right;">
                            <i class="fa fa-plus"></i>  </button>
                     </div>
                     
                     <div class="col-md-3 col-sm-3 col-xs-6">
                       <label class="label">من تاريخ</label>
                       <input type="text" class="form-control" />
                     </div>
                     
                     <div class="col-md-3 col-sm-3 col-xs-6">
                       <label class="label">حتى تاريخ</small></label>
                       <input type="text" class="form-control" />
                     </div>
                     <div class="col-md-3 col-sm-3 col-xs-6">
                       <label class="label">تصنيفات المرفقات</small></label>
                       <select class="form-control">
                         <option>اختر</option>
                       </select>
                     </div>
                     <div class="col-md-3 col-sm-3 col-xs-6">
                       <label class="label">بحث فى المرفقات</small></label>
                       <input type="text" class="form-control" />
                     </div>
                     
                  </div>
                </div>
            </div>
            
            
            <div class="col-xs-12 no-padding" style="margin-top: 10px;">
            
               <table class="table table-bordered table-striped example">
                 <thead>
                   <tr class="greentd">
                      <th>رقم المعاملة</th>
                      <th>الموضوع</th>
                      <th>نوع الإجراء</th>
                      <th>التاريخ</th>
                      <th>من الجهه</th>
                      <th>إلى الجهه</th>
                      <th>حالة المعاملة</th>
                      <th>خيارات</th>
                   </tr>
                 </thead>
                 <tbody>
                  <tr>
                    <td>IMP-2018-0059-MMMM</td>
                    <td>تجهيز ملف كفالات الأسر المكفولة</td>
                    <td><span class="label label-success text-center">وارد</span></td>
                    <td>03/10/2019</td>
                    <td>إدارة الرعاية الإجتماعية</td>
                    <td>وزارة العمل والتنمية الاجتماعية</td>
                    <td><span class="label label-success text-center">تم الإنتهاء</span></td>
                    <td>
                         <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-danger">إجراءات</button>
                          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </div>
                         <a href="#" class="btn btn-primary btn-sm" style="padding: 1px 6px;"><i class="fa fa-list"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>IMP-2018-0059-MMMM</td>
                    <td>طلب كفالة مقدم من أسرة</td>
                    <td><span class="label label-success text-center">وارد</span></td>
                    <td>03/10/2019</td>
                    <td>إدارة الرعاية الإجتماعية</td>
                    <td>وزارة العمل والتنمية الاجتماعية</td>
                    <td><span class="label label-warning text-center">قيد التنفيذ</span></td>
                    <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-danger">إجراءات</button>
                          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </div>
                        <a href="#" class="btn btn-primary btn-sm" style="padding: 1px 6px;"><i class="fa fa-list"></i></a>
                        
                    </td>
                  </tr>
                  
                 
                 </tbody>
               </table>
            
            </div>
        
        </div>
    </div>
</div>