<div class="col-xs-12 no-padding">
     <div class=" " style=" ">
         <div class="col-md-2 padding-4">
            <div class="message-sidebar">
               <div class="text-center">
                  <a class="btn btn-default btn-labeled" 
                  href="<?=base_url()."all_secretary/email/Emails/inbox"?>"
                   ><span class="btn-label"><i class="fa fa-plus"></i></span>رسالة جديدة</a>
               </div>
               <br />
               
               <div>
                  <ul class="list-unstyled linkat" style="padding-right: 20px;">
                     <li><a  href="<?=base_url()."all_secretary/email/Emails/my_emails"?>">البريد الوارد</a></li>
                      <li><a href="<?=base_url()."all_secretary/email/Emails/my_sent_emails"?>">المرسل</a></li>
                       <!-- <li><a href="#">المسودة</a></li> -->
                        <li><a href=<?=base_url()."all_secretary/email/Emails/my_deleted_emails"?>>سلة المحذوفات</a></li>
                  </ul>
               </div>
               
               <div class="text-center">
                  <input  class="form-control" placeholder="إنشاء المجلد" style="width: 63%;float:right" />
                  <button class="btn btn-default "><i class="fa fa-plus"></i> إضافة</button>
               </div>
               
               
            </div>
         </div>
        
      