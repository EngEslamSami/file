<style>
.message-sidebar{
    padding: 20px 0;
    background-color: #f5f5f5;
}
.message-sidebar .linkat{
    color:#222;
}
.well {
    padding: 10px 0;
    height: 100%;
    display: inline-block;
    width: 100%;
}
.recived-names {
    height: 150px;
    overflow: auto;
    border: 2px solid #eee;
    padding: 5px;
}

</style>

<div class="col-xs-12 no-padding">
     <div class="well" style="    padding: 10px 0;height: 100%;">
         <div class="col-md-2 padding-4">
            <div class="message-sidebar">
               <div class="text-center">
                  <button class="btn btn-default btn-labeled"><span class="btn-label"><i class="fa fa-plus"></i></span>رسالة جديدة</button>
               </div>
               <br />
               
               <div>
                  <ul class="list-unstyled linkat" style="padding-right: 20px;">
                     <li><a href="#">البريد الوارد</a></li>
                      <li><a href="#">المرسل</a></li>
                       <li><a href="#">المسودة</a></li>
                        <li><a href="#">سلة المحذوفات</a></li>
                  </ul>
               </div>
               
               <div class="text-center">
                  <input  class="form-control" placeholder="إنشاء المجلد" style="width: 63%;float:right" />
                  <button class="btn btn-default "><i class="fa fa-plus"></i> إضافة</button>
               </div>
               
               
            </div>
         </div>
         <div class="col-md-10 padding-4">
             <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-plus-square"></i> رسالة جديدة </h3>
                </div>
                <div class="panel-body " style="background-color: #fff;">
                    <div class="col-sm-8 padding-4">
                       <div class="form-group col-xs-12 no-padding">
                         <label class="label">إلى</label>
                         <input class="form-control" placeholder=" حدد المستخدم أو القسم" type="text" style="width: 93%;float: right;" />
                         <button class="btn btn-success "><i class="fa fa-plus"></i> </button>
                       </div>
                       
                       <div class="form-group col-sm-6 padding-4">
                         <label class="label">نسخة للمتابعة</label>
                         <input class="form-control" placeholder="" type="text" style="width: 88%;float: right;" />
                         <button class="btn btn-success "><i class="fa fa-plus"></i> </button>
                       </div>
                       
                       <div class="form-group col-sm-6 padding-4">
                         <label class="label">نسخة للإطلاع</label>
                         <input class="form-control" placeholder=" " type="text" style="width: 88%;float: right;" />
                         <button class="btn btn-success "><i class="fa fa-plus"></i> </button>
                       </div>
                       
                       <div class="form-group col-sm-6 padding-4">
                         <label class="label">تحتاج الرد</label>
                         <select class="form-control">
                            <option>اختر</option>
                            <option>نعم</option>
                            <option>لا</option>
                         </select>
                         
                       </div>
                       
                       <div class="form-group col-sm-6 padding-4">
                         <label class="label">درجة الأهمية</label>
                          <select class="form-control">
                            <option>اختر</option>
                            <option>هام</option>
                            <option>هام جدا َ</option>
                         </select>
                         
                       </div>
                       
                       
                       <div class="form-group col-xs-12 no-padding">
                         <label class="label">عنوان الرسالة</label>
                         <input class="form-control" placeholder="" type="text" />
                         
                       </div>
                      
                       
                    </div>
                    <div class="col-sm-4 padding-4">
                       <h5>قائمة المستلمين</h5>
                       <div class="alert alert-danger" style="color: #BD000A;">قم بإضافة قسم أو إدارة أو شخص لإستلام رسالتك <br /> يمكنك إضافة أكثر من شخص أو قسم</div>
                       <div  class="recived-names">
                         <ol >
                            <li>محمد علام</li>
                            <li>محمد علام</li>
                            <li>محمد علام</li>
                            <li>محمد علام</li>
                            <li>محمد علام</li>
                            <li>محمد علام</li>
                            <li>محمد علام</li>
                            <li>محمد علام</li>
                         </ol>
                       </div>
                    </div>
                    
                    <div class="col-xs-12 padding-4">
                        <div class="form-group">
                        <label class="label">نص الرسالة</label>
                         <textarea class="form-control" placeholder="" id="editor" ></textarea>
                         
                       </div>
                    </div>
                </div>
             </div>   
         </div>
     </div>
</div>