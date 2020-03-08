<div class="profile-sidebar">
    <a href="<?php echo base_url() . 'Web/family_log_out' ?>"
       class="btn btn-danger btn-block btn-compose-email"><i
            class="fa fa-sign-out"></i> تسجيل الخروج </a>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="sidebar-heading">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseSide1" aria-expanded="true" aria-controls="collapseSide1">
                        البيانات
                    </a>
                </h4>
            </div>

            <div id="collapseSide1" class="panel-collapse collapse <?php  if ($name_page =='data' )echo  'in';else echo ''; ?>"
                 role="tabpanel"
                 aria-labelledby="sidebar-heading">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
                        <li class="<?php  if (($id_page =='1')&&($name_page =='data' ) )echo  'active';else echo ''; ?>">
                            <a href="<?php echo base_url() . 'Web/profile_family' ?>">
                                <i class="fa fa-list"></i> معلومات الملف <span class="label pull-right">7</span>
                            </a>
                        </li>

                        <li class="<?php  if (($id_page =='2')&&($name_page =='data' ) )echo  'active';else echo ''; ?>">
                            <a href="#">
                                <i class="fa fa-cog"></i> إعدادات الحساب
                            </a>
                        </li>


                    </ul><!-- /.nav -->
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="sidebar-heading2">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseSide2" aria-expanded="false" aria-controls="collapseSide2">
                        طلب خدمات
                    </a>
                </h4>
            </div>
            <div id="collapseSide2" class="panel-collapse collapse <?php  if ($name_page =='service' )echo  'in';else echo ''; ?>" role="tabpanel"
                 aria-labelledby="sidebar-heading2">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                        <li class="<?php  if (($id_page =='1')&&($name_page =='service' ) )echo  'active';else echo ''; ?>">
                            <a href="<?php echo base_url() . 'web/service_order' ?>">
                                <i class="fa fa-question"></i> طلب خدمة
                            </a>
                        </li>
                        <li class="<?php  if (($id_page =='2')&&($name_page =='service' ) )echo  'active';else echo ''; ?>">
                            <a href="#">
                                <i class="fa fa-question"></i> طلب تغيير حساب
                            </a>
                        </li>

                    </ul><!-- /.nav -->
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="sidebar-heading3">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseSide3" aria-expanded="false" aria-controls="collapseSide3">
                        الإستعلامات
                    </a>
                </h4>
            </div>
            <div id="collapseSide3" class="panel-collapse collapse <?php  if ($name_page =='report' )echo  'in';else echo ''; ?>" role="tabpanel"
                 aria-labelledby="sidebar-heading3">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                        <li class="<?php  if (($id_page =='1')&&($name_page =='report' ) )echo  'active';else echo ''; ?>"><a href="<?php echo base_url() . 'Web/report_sarf' ?>"> <i
                                    class="fa fa-file-o"></i> تقارير
                                المساعدات</a></li>
                        <li class="<?php  if (($id_page =='2')&&($name_page =='report' ) )echo  'active';else echo ''; ?>"><a href="#"> <i class="fa fa-file-o"></i> تقارير الأنشطة والبرامج</a>
                        </li>


                    </ul><!-- /.nav -->
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="sidebar-heading4">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseSide4" aria-expanded="false" aria-controls="collapseSide4">
                        الإشعارات
                    </a>
                </h4>
            </div>
            <div id="collapseSide4" class="panel-collapse collapse <?php  if ($name_page =='notification' )echo  'in';else echo ''; ?> " role="tabpanel"
                 aria-labelledby="sidebar-heading4">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                        <li class="<?php  if (($id_page =='1')&&($name_page =='notification' ) )echo  'active';else echo ''; ?>">
                            <a href="#"><i class="fa fa-bell"></i> إشعارات ملف <span
                                    class="label label-info pull-right inbox-notification">5</span></a>
                        </li>
                        <li class="<?php  if (($id_page =='2')&&($name_page =='notification' ) )echo  'active';else echo ''; ?>">
                            <a href="#"><i class="fa fa-bell"></i> إشعارات المساعدات المالية <span
                                    class="label label-info pull-right inbox-notification">5</span></a>
                        </li>
                        <li class="<?php  if (($id_page =='3')&&($name_page =='notification' ) )echo  'active';else echo ''; ?>">
                            <a href="#"><i class="fa fa-bell"></i> إشعارات المساعدات العينية <span
                                    class="label label-info pull-right inbox-notification">5</span></a>
                        </li>
                        <li class="<?php  if (($id_page =='4')&&($name_page =='notification' ) )echo  'active';else echo ''; ?>">
                            <a href="#"><i class="fa fa-bell"></i> إشعارات الأنشطة والبرامج <span
                                    class="label label-info pull-right inbox-notification">5</span></a>
                        </li>

                    </ul><!-- /.nav -->
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="sidebar-heading5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseSide5" aria-expanded="false" aria-controls="collapseSide5">
                        تواصل معنا
                    </a>
                </h4>
            </div>
            <div id="collapseSide5" class="panel-collapse collapse <?php  if ($name_page =='chat' )echo  'in';else echo ''; ?>" role="tabpanel"
                 aria-labelledby="sidebar-heading5">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                        <li class="<?php  if (($id_page =='1')&&($name_page =='chat' ) )echo  'active';else echo ''; ?>">
                            <a href="#"><i class="fa fa-envelope-o"></i> الدردشة </a>
                        </li>


                    </ul><!-- /.nav -->
                </div>
            </div>
        </div>

    </div>


</div>