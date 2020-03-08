<style type="text/css">
    .label-success {
        background-color: #50ab20 !important;
        border: 2px solid #50ab20 !important;
    }
</style>
<div class="col-xs-12 fadeInUp wow" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?></h3>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-bd">
                    <div class="col-sm-9">
                        <div class="space"></div>
                        <div id="calendar"></div>
                    </div>
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
                                    <p><a href="#" target="_blank">دليل الإستخدام</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12 fadeInUp wow" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">جدول البيانات</h3>
        </div>
        <div class="panel-body">
            <table id="examplee" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr class="greentd">
                        <th>#</th>
                        <th>رقم الطلب / رقم الملف</th>
                        <th>إسم رب الأسرة</th>
                        <th>موعد الزيارة</th>
                        <th>الغرض من الزيارة</th>
                        <th>حالة الزبارة</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $x = 1;
                $span = array('danger','warning','info','success');
                $status = array('لم تبدأ','لم تتم','تم تغيير الموعد','إنتهت');
                if(isset($records) && $records != null) {
                    foreach ($records as $value) {
                        $num = $value->order_num;
                        if($value->file_num != 0) {
                            $num = $value->file_num;
                        }
                ?>
                    <tr id="<?=$value->id?>">
                        <td><?=$x++?></td>
                        <td><?=$num?></td>
                        <td><?=$value->father_name?></td>
                        <td><?=date("Y-m-d",$value->visit_from_date)?></td>
                        <td><?=$value->title_setting?></td>
                        <td><span class="label label-sm label-<?=$span[$value->visit_status]?>"><?=$status[$value->visit_status]?></span></td>
                    </tr>
                <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>