<style>
.popover {
    max-width: 350px;
    min-width: 300px;
}
.fc-event-container{
    text-align: center;
}
.fc-event-container .fc-day-grid-event.fc-h-event{
    display: inline-block;
    min-width: 90px;
}
.popover-title{
        background-color: #5db646;
    color: #fff;
}
.popover-content{
    white-space: pre-line;
    font-size: 14px;
}
.calend-bg{
    padding: 20px !important;
  background: url(<?php echo base_url()?>asisst/admin_asset/img/calendar-bg-4.jpg);
  background-position: center;
background-size: 100% 100%;
}
.fc-toolbar .fc-center h2{
    color: #fff;
}
.fc td, .fc th {
    background-color: transparent;
    color: #fff;
}
.fc-unthemed .fc-today {
    background: #fcf8e3;
    color: #000;
}
</style>
<div class="col-xs-12 fadeInUp wow" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading" style="margin-bottom: 0;">
            <h3 class="panel-title"><?php echo $title?></h3>
        </div>
        <div class="panel-body calend-bg" style="">

                       <?php
          //  echo form_open_multipart('all_secretary/archive/notes/Notes/add_notes');

            ?>

         <!--   <div class="col-xs-12 col-md-12">
                <div class="form-group col-md-4 col-sm-2 col-xs-12 padding-4">
                    <label class="label">   النوع  </label>

                        <div class="radio-content">
                            <input type="radio"   data-validation="required"id="type_sarf1" name="type"  class="sarf_types" value="1">
                            <label for="type_sarf1" class="radio-label">ملاحظة </label>
                        </div>

                        <div class="radio-content">
                            <input type="radio"  data-validation="required" id="type_sarf2" name="type"   class="sarf_types" value="2">
                            <label for="type_sarf2" class="radio-label">موعد </label>
                        </div>

                        <div class="radio-content">
                            <input type="radio"  data-validation="required" id="type_sarf3" name="type" class="sarf_types" value="3">
                            <label for="type_sarf3" class="radio-label">  حدث</label>
                        </div>

                        <div class="radio-content">
                            <input type="radio"  data-validation="required" id="type_sarf4" name="type"  class="sarf_types" value="4">
                            <label for="type_sarf4" class="radio-label">مهمة</label>

                        </div>

                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                    <label class="label">   التاريخ  </label>
                    <input type="date"  data-validation="required" name="date" value="<?= date('Y-m-d')?>" class="form-control">

                </div>
                <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                    <label class="label">   القسم  </label>
                    <input type="text"  data-validation="required" name="qsm" value="" class="form-control">

                </div>
                <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                    <label class="label">   التصنيف  </label>
                    <input type="text"  data-validation="required" name="tasnef" value="" class="form-control">

                </div>
                <div class="form-group col-md-3 col-sm-2 col-xs-12 padding-4">
                    <label class="label">   التفاصيل  </label>
                    <textarea name="details" class="form-control"></textarea>


                </div>
                <div class="  text-center col-md-3">
                    <button type="submit" style=" margin-top: 21px;"  class="btn btn-labeled btn-success " name="add" value="add"   >
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                </div>

            </div>-->
            <?php
         //    echo form_close();
            ?>
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-bd">
                    <div class="col-xs-12">
                        <div class="space"></div>
                        <div id="calendar" ></div>
                    </div>
                    <!--
                    <div class="col-sm-3" style="background-color: #eee;">
                        <div class="widget-box transparent">
                            <div class="widget-header">
                                <div class="panel-body">
                                    <h4>دليل الإستخدام</h4>
                                </div>
                            </div>
                            <div class="panel panel-bd hidden-xs hidden-sm" style="padding: 10px; border-radius: 15px;">
                                <div class="panel-body">
                                    <h4 class="m-t-0">إضافة أحداث</h4>
                                    <p>
                                        قم بالضغط على اليوم  أو مجموعة من الأيام المراد إنشاء حدث جديد به.
                                    </p>
                                    عند إسم الحدث قم بالضغط عليه ،ثم عدل الإسم ،ثم إحفظ.
                                    <p>
                                        التقويم يتيح لك تغيير تاريخ الحدث بسهولة عن طريق سحبه وإدراجه باليوم الجديد.
                                    </p>
                                    <p>
                                        أيضا يتيح لك تعديل مدة الحدث عن طريق  سحبه من أقصى اليمين بعدد الأيام المراد تخصيصها لهذا الحدث.
                                    </p>
                                    <p> عند تغيير يوم الحدث قم بسحب الحدث مرة أخرى من التقويم على اليوم المراد.</p>
                                    <p>عند تعديل أو حذف حدث قم بالضغط عليه فقط وإختر إجراء الحذف.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                    -->

                </div>
            </div>
        </div>
    </div>
</div>

