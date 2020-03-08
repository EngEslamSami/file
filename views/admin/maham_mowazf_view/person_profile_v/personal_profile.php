<div class="profily">
    <div class="vertical-tabs">
        <ul class="nav nav-tabs nav-tabs-vertical" role="tablist" id="myTabs">
            <li class="nav-item active">
                <a class="nav-link " data-toggle="tab" href="#pag1" role="tab" aria-controls="pag1"><i
                            class="fa fa-2x fa-home"></i> الرئيسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pag2" role="tab" aria-controls="pag2"><i
                            class="fa fa-2x fa-user-o"></i> الملف الشخصي</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pag3" role="tab" aria-controls="pag3"><i
                            class="fa fa-2x fa-cart-arrow-down"></i> الطلبات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pag4" role="tab" aria-controls="pag4"><i
                            class="fa fa-2x fa-commenting-o"></i> الإستعلامات</a>
            </li>
            <!--
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pag5" role="tab" aria-controls="pag5"><i
                                        class="fa fa-2x fa-id-card-o"></i> المهام</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pag6" role="tab" aria-controls="pag6"><i
                                        class="fa fa-2x fa-volume-control-phone"></i> التراسل</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pag7" role="tab" aria-controls="pag7"><i
                                        class="fa fa-2x fa-sticky-note-o"></i> ملاحظات شخصية</a>
                        </li>
            -->
        </ul>


        <div class="tab-content tab-content-vertical">
            <div class="tab-pane active" id="pag1" role="tabpanel">


                <?php
                /*echo '<pre>';
                print_r($person_data);*/

                ?>

                <div class="col-md-3 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">بيانات الموظف</h5>
                        </div>
                        <div class="panel-body" style=" height: 347px;overflow: hidden;">
                            <div>
									<span class="profile-picture">

<?php
if ($_SESSION['role_id_fk'] == 3) { ?>
    <img id="profile-img-tag" class=" img-responsive" alt=""
         src="<?php echo base_url(); ?>uploads/human_resources/emp_photo/thumbs/<?php echo $person_data->img ?>"/>
<?php } else { ?>
    <img id="profile-img-tag" class=" img-responsive" alt=""
         src="<?php echo base_url() . "asisst/fav/apple-icon-120x120.png" ?>"/>
<?php }
?>										
                 



									</span>

                                <div class="space-4"></div>
                                <a href="#" class="btn btn-sm btn-block btn-success">
                                    <i class="ace-icon fa fa-user-circle bigger-120"></i>
                                    <span class="bigger-110">
     <?php
     if (isset($person_data) && (!empty($person_data))) {
         echo $person_data->name;
     }
     ?>
    </span>
                                </a>


                                <!--
                                <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                    <div class="inline position-relative">

                                    
                                  
<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
    <i class="ace-icon fa fa-circle light-green"></i>
    &nbsp;
    <span class="white">
    <?php
                                if (isset($person_data) && (!empty($person_data))) {
                                    echo $person_data->name;
                                }
                                ?>
    </span>
</a>

                                        <ul class="align-right dropdown-menu dropdown-caret dropdown-lighter">
                                            <li class="dropdown-header"> تغيير الحالة</li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-circle green"></i>

                                                    <span class="green">Available</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-circle red"></i>

                                                    <span class="red">Busy</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ace-icon fa fa-circle grey"></i>

                                                    <span class="grey">Invisible</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
               -->

                            </div>

                            <div class="space-6"></div>


                            <div class="profile-contact-info">
                                <div class="profile-contact-links align-right">

                                    <?php
                                    if ($_SESSION['role_id_fk'] == 1) { ?>

                                    <?php } elseif ($_SESSION['role_id_fk'] == 3) { ?>

                                        <a href="#" class="btn btn-link">
                                            <i class="ace-icon fa fa-credit-card bigger-120 green"></i>
                                            الرقم الوظيفي : <?php echo $person_data->employe_code; ?>
                                        </a>
                                        <a href="#" class="btn btn-link">
                                            <i class="ace-icon fa fa-group	 bigger-120 green"></i>
                                            الإدارة : <?php echo $person_data->edara; ?>
                                        </a>
                                        <a href="#" class="btn btn-link">
                                            <i class="ace-icon fa fa-map-o	 bigger-120 green"></i>
                                            <?php echo $person_data->job; ?>
                                        </a>
                                        <?php if (isset($person_data) && (!empty($person_data))) { ?>

                                            <a href="#" class="btn btn-link">
                                                <i class="ace-iconfa fa-address-book-o bigger-120 green"></i>
                                                المدير المباشر : <?= $person_data->name ?>
                                            </a>
                                        <?php } ?>

                                        <?php if ($_SESSION['role_id_fk'] == 3) {
                                            ?>


                                        <?php }

                                        ?>


                                        <?php
                                    } ?>
                                    <a href="#" class="btn btn-link">
                                        <?php $rol_arr = array(1 => 'مدير على نظام', 2 => 'عضو مجلس ادارة', 3 => 'موظف علي النظام', 4 => 'عضو جمعية عمومية ', 5 => 'متطوع على نظام ') ?>
                                        <i class="ace-icon fa fa-user-o bigger-120 green"></i>
                                        الدور على النظام : <?= $rol_arr[$_SESSION['role_id_fk']] ?>
                                    </a>
                                </div>


                            </div>

                        </div>
                        <div class="panel-footer" id="myTabs">
                            <!-- <button type="button" data-toggle="modal" data-target="#modal-data"
                                     class="btn btn-success btn-labeled " name="" id="button"
                                     value=""><span
                                         class="btn-label"><i class="fa fa-pencil-square-o"></i></span>تحديث البيانات
                             </button> -->

                            <button type="button" class="btn  btn-sm btn-primary btn-labeled "
                                    onclick="show_tab('pag2');"
                                    style="float: left"><span class="btn-label"><i class="fa fa-ellipsis-h"></i></span>المزيد
                            </button>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">الإستحقاقات</h5>
                        </div>
                        <div class="panel-body" style=" height: 347px;overflow: hidden;">
                            <ol class="dd-list">
                                <!--   <li class="dd-item">
                                      <div class="dd-handle"> راتب أساسي : 2000 ريال</div>
                                  </li>
                                       <li class="dd-item">
                                      <div class="dd-handle"> بدل السكن : 100 ريال </div>
                                  </li>
                                    <li class="dd-item">
                                      <div class="dd-handle"> بدل النقل : 100 ريال </div>
                                  </li>


                                       <li class="dd-item">
                                      <div class="dd-handle"> بدل طبيعه عمل : 100 ريال </div>
                                  </li>
                              -->

                                <?php if ($_SESSION['role_id_fk'] == 3) { ?>


                                    <?php

                                    if (isset($person_data->finance_Data['badlat']) && (!empty($person_data->finance_Data['badlat']))) { ?>

                                        <?php foreach ($person_data->finance_Data['badlat'] as $badel) {
                                            if ($badel->type == 1) {
                                                ?>
                                                <li class="dd-item">
                                                    <div class="dd-handle"> <?= $badel->title ?>
                                                        : <?= $badel->badalat->value ?> ريال
                                                    </div>
                                                </li>

                                            <?php }
                                        }
                                    }

                                    ?>
                                    <li class="dd-item">
                                        <div class="dd-handle"> الإجازة السنوية : 30 يوم</div>
                                    </li>
                                    <li class="dd-item">
                                        <div class="dd-handle">الإجازة الإضطرارية : 5 يوم</div>
                                    </li>
                                    <li class="dd-item">
                                        <div class="dd-handle"></div>
                                    </li>


                                <?php } ?>


                            </ol>
                        </div>
                        <div class="panel-footer" id="myTabs">


                            <button type="button" class="btn btn-sm btn-primary btn-labeled "
                                    style="float: left"><span class="btn-label"><i class="fa fa-ellipsis-h"></i></span>المزيد
                            </button>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">الطلبات</h5>
                        </div>
                        <div class="panel-body" style=" height: 347px;overflow: hidden;">
                            <!--<div class="alert alert-sm alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                <i class="fa fa-exclamation-triangle"></i><strong>تنبيه!</strong> رصيد الإجازة الخاص بك
                                20 يوم
                            </div>-->

                            <div class="clerk-orders">
                                <ul class="list-unstyled">
                                    <li><a href="#" data-toggle="modal" onclick="get_agaza()"
                                           data-target="#ezn_Modal"><i
                                                    class="fa fa-check" aria-hidden="true"></i> طلب اجازة</a></li>
                                    <li><a href="#" data-toggle="modal" onclick="get_ezn()" data-target="#ezn_Modal"><i
                                                    class="fa fa-check" aria-hidden="true"></i> طلب إستئذان</a></li>
                                    <!--
                                                                        <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i> طلب / سلفة عهده</a>
                                                                        </li>
                                                                        <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i> إخلاء طرف</a></li>
                                                                        <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i> طلب تأمين صحي</a>
                                                                        </li>
                                                                        <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i> طلب أصل</a></li>
                                                                        -->
                                </ul>
                            </div>

                        </div>
                        <div class="panel-footer">

                            <button type="button" class="btn  btn-sm btn-primary btn-labeled " name="" id="button"
                                    value=""
                                    onclick="show_tab('pag3');"
                                    style="float: left"><span class="btn-label"><i class="fa fa-ellipsis-h"></i></span>المزيد
                            </button>

                        </div>

                    </div>
                </div>
                <!---------------------------------------------------------------------------->

                <div class="col-md-3 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">الإستعلامات</h5>
                        </div>
                        <div class="panel-body" style=" height: 347px;overflow: hidden;">

                            <div class="clerk-orders">
                                <ul class="list-unstyled">
                                    <li><a onclick=" show_tab('pag4');show_tab('task-tab1')"><i class="fa fa-check"
                                                                                                aria-hidden="true"></i>
                                            إستعلام عن طلب اجازة
                                        </a></li>
                                    <li><a onclick="show_tab('pag4');show_tab('task-tab2')"><i class="fa fa-check"
                                                                                               aria-hidden="true"></i>
                                            استعلام عن طلب
                                            إستئذان</a></li>

                                    <!--  <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i> طلب / سلفة عهده</a>
                                      </li>
                                      <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i> إخلاء طرف</a></li>
                                      <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i> طلب تأمين صحي</a>
                                      </li>
                                      <li><a href="#"><i class="fa fa-check" aria-hidden="true"></i> طلب أصل</a></li>-->
                                </ul>
                            </div>

                        </div>
                        <div class="panel-footer">

                            <button type="button" class="btn  btn-sm btn-primary btn-labeled " name="" id="button"
                                    value=""
                                    onclick="show_tab('pag4');"
                                    style="float: left"><span class="btn-label"><i class="fa fa-ellipsis-h"></i></span>المزيد
                            </button>

                        </div>

                    </div>
                </div>

                <!-------------------------------------------------------------------------->
                <!--    <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">الراتب الحالي</h5>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered no-margin">
                                    <thead>
                                    <tr class="greentd">
                                        <th>أيام العمل</th>
                                        <th>الراتب الأساسى</th>
                                        <th>إجمالي البدلات</th>
                                        <th>إجمالي الإستقطاعات</th>
                                        <th>السلف</th>
                                        <th>الغياب</th>
                                        <th>التأخيرات</th>
                                        <th>الصافى</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>30</td>
                                        <td>2000</td>
                                        <td>400</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>2400</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 padding-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">ملفاتي المؤرشفة</h5>
                            </div>
                            <div class="panel-body">

                            </div>
                            <div class="panel-footer">

                                <button type="" class="btn btn-info btn-labeled " name="" id="button" value=""
                                        style="float: left"><span class="btn-label"><i class="fa fa-ellipsis-h"></i></span>المزيد
                                </button>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 padding-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">المهام المطلوب تنفيذها</h5>
                            </div>
                            <div class="panel-body">

                            </div>
                            <div class="panel-footer">

                                <button type="" class="btn btn-info btn-labeled " name="" id="button" value=""
                                        style="float: left"><span class="btn-label"><i class="fa fa-ellipsis-h"></i></span>المزيد
                                </button>

                            </div>
                        </div>
                    </div>
    -->
            </div>

            <!--------------------------------------------------------------->
 
 
 
             <div class="tab-pane" id="pag2" role="tabpanel">
                <div id="user-profile-1" class="user-profile ">

                    <div class="col-xs-12">
                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                                <button class="btn btn-default" style="background-color: #85b558;color: #fff;"
                                        title="ملف الموظف" data-toggle="tab" href="#main_data" role="tab"
                                        aria-controls="main_data">
                                    <i class="ace-icon fa fa-file-o faa-horizontal animated"></i> ملف الموظف
                                </button>
                                <?php if ($_SESSION['role_id_fk'] == 3) { ?>

                                    <button class="btn btn-default" style="background-color: #0088b1;color: #fff;"
                                            title="بيانات الوظفية" data-toggle="tab" href="#job_data" role="tab"
                                            aria-controls="job_data">
                                        <i class="ace-icon fa fa-address-card-o faa-vertical animated"></i> بيانات
                                        الوظفية
                                    </button>

                                    <button class="btn btn-default" style="background-color: #da9300;color: #fff;"
                                            title="بيانات التعاقد" data-toggle="tab" href="#contract_data" role="tab"
                                            aria-controls="contract_data">
                                        <i class="ace-icon fa fa-id-badge faa-shake animated"></i> بيانات التعاقد
                                    </button>

                                    <button class="btn btn-default" style="background-color: #E5343D;color: #fff;"
                                            title="بيانات المالية " data-toggle="tab" href="#Finance_data" role="tab"
                                            aria-controls="Finance_data">
                                        <i class="ace-icon fa fa-cogs faa-passing animated"></i> بيانات المالية
                                    </button>
                                    <button class="btn btn-default" style="background-color: #d54c7e;color: #fff;"
                                            title="بيانات الدوام " data-toggle="tab" href="#work_data" role="tab"
                                            aria-controls="work_data">
                                        <i class="ace-icon fa fa-clock-o faa-burst animated"></i> بيانات الدوام
                                    </button>
                                    <button class="btn btn-default" style="background-color: #d54c7e;color: #fff;"
                                            title="بيانات المستندات  " data-toggle="tab" href="#files_data" role="tab"
                                            aria-controls="work_data">
                                        <i class="ace-icon fa fa-clock-o faa-burst animated"></i> بيانات المستندات
                                    </button>
                                <?php } ?>

                            </div>


                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-9">

                        <div class="tab-content tab-content-vertical">
                            <div class="tab-pane active" id="main_data" role="tabpanel">
                                <div class="space-12"></div>

                                <div class="profile-user-info profile-user-info-striped">
                                    <?php if ($_SESSION['role_id_fk'] == 3) {
                                        ?>
                                        <div class="profile-info-row">

                                            <div class="profile-info-name"> كود الوظيفي</div>

                                            <div class="profile-info-value">
                                                <?php if (isset($person_data) && (!empty($person_data))) { ?>

                                                    <span class="editable"
                                                          id="username"><?= $person_data->emp_code ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <?php
                                    } ?>
                                    <div class="profile-info-row">

                                        <div class="profile-info-name"> الإسم</div>

                                        <div class="profile-info-value">
                                            <?php if (isset($person_data) && (!empty($person_data))) { ?>

                                                <span class="editable" id="username"><?= $person_data->name ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <?php if ($_SESSION['role_id_fk'] == 3) {
                                        ?>
                                        <div class="profile-info-row">

                                            <div class="profile-info-name"> رقم الجوال</div>

                                            <div class="profile-info-value">
                                                <?php if (isset($person_data) && (!empty($person_data))) { ?>

                                                    <span class="editable"
                                                          id="username"><?= $person_data->phone ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="profile-info-row">

                                            <div class="profile-info-name"> رقم الهوية</div>

                                            <div class="profile-info-value">
                                                <?php if (isset($person_data) && (!empty($person_data))) { ?>

                                                    <span class="editable"
                                                          id="username"><?= $person_data->card_num ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="profile-info-row">

                                            <div class="profile-info-name"> المسمي الوظيفي</div>

                                            <div class="profile-info-value">
                                                <?php if (isset($person_data) && (!empty($person_data))) { ?>
                                                    <span class="editable" id="username"><?= $person_data->job ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <?php
                                    } ?>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> الإدارة</div>
                                        <?php if (isset($person_data) && (!empty($person_data))) { ?>

                                            <div class="profile-info-value">
                                                <span class="editable"><?= $person_data->edara ?></span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <?php if ($_SESSION['role_id_fk'] == 3) {
                                        ?>
                                        <div class="profile-info-row">

                                            <div class="profile-info-name"> القسم</div>

                                            <div class="profile-info-value">
                                                <?php if (isset($person_data) && (!empty($person_data))) { ?>

                                                    <span class="editable"
                                                          id="username"><?= $person_data->department ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <?php
                                    } ?>
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> الدور على النظام</div>

                                        <div class="profile-info-value">
                                            <?php $rol_arr = array(1 => 'مدير على نظام', 2 => 'عضو مجلس ادارة', 3 => 'موظف علي النظام', 4 => 'عضو جمعية عمومية ', 5 => 'متطوع على نظام ') ?>

                                            <span class="editable"
                                                  id="country"><?= $rol_arr[$_SESSION['role_id_fk']] ?></span>
                                        </div>
                                    </div>

                                </div>

                                <div class="space-20"></div>
                            </div>
                            <?php if ($_SESSION['role_id_fk'] == 3) {
                                ?>
                                <div class="tab-pane " id="job_data" role="tabpanel">
                                    <?php if (isset($person_data) && (!empty($person_data)) && (($person_data->employee_type !=0))) { ?>

                                        <div class="col-md-12 center">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">بيانات الوظفية</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table table-responsive">
                                                        <tr>
                                                            <th>حاله الموظف</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->employee_type_title ?></td>
                                                            <th>الدرجه العلميه</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->employee_degree_title ?></td>
                                                            <th>المؤهل العلمي</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->employee_qualification_title ?></td>
                                                            <th>الفئه الوظيفيه</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->cat_manager_title ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>الاداره</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->edara ?></td>
                                                            <th>القسم</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->department ?></td>
                                                            <th>المسمي الوظيفي</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->job ?></td>
                                                            <th>المدير المباشر</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->manager_name ?></td>
                                                        </tr>
                                                    </table>

                                                </div>

                                            </div>


                                        </div>
                                    <?php } else { ?>
                                        <div class="col-md-12 center alert alert-danger">
                                            <h4>لا يوجد بيانات </h4>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="tab-pane " id="contract_data" role="tabpanel">
                                    <?php if (isset($person_data->contract_employe) && (!empty($person_data->contract_employe))) { ?>

                                        <div class="col-md-12 center">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">بيانات التعاقد</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table ">
                                                        <tr>
                                                            <th>طبيعة العقد</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->contract_nature_title ?></td>
                                                            <th>طبيعة العمل</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->job_type_title ?></td>
                                                            <th>أيام العمل خلال الشهر</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->contract_employe->num_days_in_month ?></td>
                                                            <th>ساعات العمل</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->contract_employe->hours_work ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>أجر الساعة</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->contract_employe->hour_value ?></td>
                                                            <th>فترات العمل</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->work_period_title ?></td>
                                                            <th>الأجازة السنوية</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->contract_employe->year_vacation_num ?></td>
                                                            <th>الأجازة الاضطرارية</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->contract_employe->casual_vacation_num ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>رصيد الاجازة السنوية السابقة</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->contract_employe->vacation_previous_balance ?></td>
                                                            <th>طريقة دفع الراتب</th>
                                                            <th>:</th>
                                                            <td><?= $person_data->pay_method_title ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </table>

                                                </div>

                                            </div>


                                        </div>
                                    <?php } else { ?>
                                        <div class="col-md-12 center alert alert-danger">
                                            <h4>لا يوجد بيانات </h4>
                                        </div>
                                    <?php } ?>

                                </div>

                                <div class="tab-pane " id="Finance_data" role="tabpanel">
                                    <?php if (isset($person_data->finance_Data['badlat']) && (!empty($person_data->finance_Data['badlat']))) { ?>

                                        <div class="col-md-12 center">
                                            <div class="col-md-6">

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title">بيانات الاستحقاقات</h5>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table table-responsive" id="finance_Data_1"
                                                               style="display:none;">
                                                            <thead>
                                                            <tr>
                                                                <th style="color: red;" class="text-center">إسم
                                                                    البند
                                                                </th>
                                                                <th style="color: red;" class="text-center">القيمه
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($person_data->finance_Data['badlat'] as $badel) {
                                                                $count1 = 0;
                                                                if ($badel->type == 1) {
                                                                    $count1++;
                                                                    ?>
                                                                    <tr>
                                                                        <td><?= $badel->title ?></td>
                                                                        <td><?= $badel->badalat->value ?></td>
                                                                    </tr>
                                                                <?php }
                                                            } ?>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th class="text-center">إجمالي</th>
                                                                <td class="text-center"><?= $person_data->finance_Data['get_having_value'] ?></td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>

                                                        <div class="alert alert-danger" id="no_data_1"
                                                             style="display: none">
                                                            <h4>لا يوجد بيانات </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title">بيانات الاستقطاعات</h5>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table table-responsive " id="finance_Data_2"
                                                               style="display: none">
                                                            <thead>
                                                            <tr>
                                                                <th style="color: red;" class="text-center">إسم
                                                                    البند
                                                                </th>
                                                                <th style="color: red;" class="text-center">القيمه
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($person_data->finance_Data['badlat'] as $badel) {
                                                                $count2 = 0;

                                                                if ($badel->type == 2) {
                                                                    $count2++;

                                                                    ?>
                                                                    <tr>
                                                                        <td><?= $badel->title ?></td>
                                                                        <td><?= $badel->badalat->value ?></td>
                                                                    </tr>
                                                                <?php }
                                                            } ?>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <th class="text-center">إجمالي</th>
                                                                <td class="text-center"><?= $person_data->finance_Data['get_discut_value'] ?></td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                        <div class="alert alert-danger" id="no_data_2"
                                                             style="display: none">
                                                            <h4>لا يوجد بيانات </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 text-center">
                                                <h4>صافي المرتب :
                                                    <span><?= $person_data->finance_Data['get_having_value'] - $person_data->finance_Data['get_discut_value'] ?> </span>
                                                </h4>

                                            </div>
                                        </div>
                                    <?php }else { ?>
                                        <div class="col-md-12 center alert alert-danger">
                                            <h4>لا يوجد بيانات </h4>
                                        </div>
                                    <?php } ?>

                                </div>

                                <div class="tab-pane" id="work_data" role="tabpanel">
                                    <div class="col-md-12 text-center">

                                        <?php if (isset($person_data->my_always) && (!empty($person_data->my_always))) { ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">بيانات الدوام</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center">م</th>
                                                            <th class="text-center"> إسم الدوام</th>
                                                            <th class="text-center">وقت الحضور</th>
                                                            <th class="text-center"> وقت الانصراف</th>
                                                            <th class="text-center">من تاريخ</th>
                                                            <th class="text-center"> الى تاريخ</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php $count = 1;
                                                        foreach ($person_data->my_always as $record) { ?>
                                                            <tr>
                                                            <td rowspan="<?php echo sizeof($record->period_num); ?>"><?php echo $count++; ?></td>
                                                            <td rowspan="<?php echo sizeof($record->period_num); ?>"><?php echo $record->name; ?></td>
                                                            <?php if (!empty($record->period_num)) {
                                                                $a = 1;
                                                                foreach ($record->period_num as $row) { ?>
                                                                    <td><?= $row->attend_time ?></td>
                                                                    <td><?= $row->leave_time ?></td>
                                                                    <td><?= $row->from_date_ar ?></td>
                                                                    <td><?= $row->to_date_ar ?></td>
                                                                    </tr>
                                                                    <?php $a++;
                                                                }
                                                            } ?>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>

                                                </div>

                                            </div>

                                        <?php } else { ?>
                                            <div class=" alert alert-danger">
                                                <h4>لا يوجد بيانات </h4>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>
                                <div class="tab-pane" id="files_data" role="tabpanel">
                                    <div class="col-md-12 text-center">

                                        <?php if (isset($person_data->files) && (!empty($person_data->files))) { ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">بيانات المستندات </h5>
                                                </div>
                                                <div class="panel-body">

                                                    <table class=" table">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center"> م</th>
                                                            <th class="text-center">إسم المرفق</th>
                                                            <th class="text-center"> المستند</th>
                                                            <th class="text-center">هل يوجد تاريخ</th>
                                                            <th class="text-center">من تاريخ</th>
                                                            <th class="text-center">إلي تاريخ</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        foreach ($person_data->files as $data_file) {
                                                            $x = 1;
                                                            ?>
                                                            <tr>
                                                                <td><?= $x++ ?></td>
                                                                <td><?= $data_file->title_name ?></td>
                                                                <td>
                                                                    <?php
                                                                    $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                                                    $file = array('DOC', ' DOCX', 'HTML  ', 'HTM', 'ODT', 'pdf', 'XLS ', ' XLSX', 'ODS', 'PPT  ', 'PPTX', 'TXT', 'pdf', 'xls', 'xlsx', 'doc', 'docx', 'txt');
                                                                    $ext = pathinfo($data_file->emp_file, PATHINFO_EXTENSION);
                                                                    if (in_array($ext, $image)) {
                                                                        ?>
                                                                        <a data-toggle="modal"
                                                                           onclick="$('#img_pop_view').attr('src', '<?php echo base_url() . "uploads/human_resources/emp_mostnad_files/" . $data_file->emp_file ?>');"
                                                                           data-target="#myModal-view">
                                                                            <i class="fa fa-eye" title=" قراءة"></i>
                                                                        </a>
                                                                        <?php

                                                                    } elseif (in_array($ext, $file)) {
                                                                        ?>
                                                                        <a target="_blank"
                                                                           href="<?= base_url() . "human_resources/Human_resources/read_emp_file/" . $data_file->emp_file ?>">
                                                                            <i class="fa fa-eye" title=" قراءة"></i>
                                                                        </a>

                                                                        <?php
                                                                    }
                                                                    ?>

                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($data_file->have_date == 1) {
                                                                        echo "نعم";
                                                                    } elseif ($data_file->have_date == 2) {
                                                                        echo "لا";
                                                                    }

                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?= $data_file->from_date ?>
                                                                </td>
                                                                <td>
                                                                    <?= $data_file->to_date ?>
                                                                </td>

                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        </tbody>

                                                    </table>

                                                </div>

                                            </div>

                                            <div class="modal fade" id="myModal-view" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel"> عرض
                                                                المستند </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img id="img_pop_view" src=""
                                                                 onerror="this.src='<?php echo base_url('asisst/fav/apple-icon-120x120.png') ?>'"
                                                                 width="100%">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">إغلاق
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        <?php } else { ?>
                                            <div class="alert alert-danger">
                                                <h4>لا يوجد بيانات </h4>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3 center">
                        <div>
                        									<span class="profile-picture">

<?php
if ($_SESSION['role_id_fk'] == 3) { ?>
    <img id="profile-img-tag" class=" img-responsive" alt=""
         src="<?php echo base_url(); ?>uploads/human_resources/emp_photo/thumbs/<?php echo $person_data->img ?>"/>
<?php } else { ?>
    <img id="profile-img-tag" class=" img-responsive" alt=""
         src="<?php echo base_url() . "asisst/fav/apple-icon-120x120.png" ?>"/>
<?php }
?>




									</span>
                            <!--	<span class="profile-picture">
				<img id="profile-img-tag_profile" class="editable img-responsive" alt="Alex's Avatar"
                     style="width: 275px;height: 250px;"
                     src="<?php echo base_url() . "uploads/images/profie/thumbs/" . $person_data->user_photo; ?>"
                     onerror="this.src='<?php echo base_url() . "asisst/fav/apple-icon-120x120.png" ?>'"
                />
				<input class="changeImg" type="file" accept="image/*"
                       onchange="loadFile(event,'profile-img-tag_profile') ;">


			</span>-->

                            <div class="space-4"></div>
                            <a href="#" class="btn btn-sm btn-block btn-success">
                                <i class="ace-icon fa fa-user-circle bigger-120"></i>
                                <span class="bigger-110">
     <?php
     if (isset($person_data) && (!empty($person_data))) {
         echo $person_data->name;
     }
     ?>
    </span>
                            </a>
                        </div>

                        <div class="space-6"></div>

                        <div class="profile-contact-info">
                            <div class="profile-contact-links align-right">


                                <?php if ($_SESSION['role_id_fk'] == 3) {
                                    ?>

                                    <?php if (isset($person_data) && (!empty($person_data))) { ?>

                                        <a class="btn btn-link">
                                            <i class="ace-icon fa fa-credit-card bigger-120 green"></i>
                                            الرقم الوظيفي :<?= $person_data->emp_code ?>
                                        </a>
                                        <a class="btn btn-link">
                                            <i class="ace-icon fa fa-group	 bigger-120 green"></i>
                                            الإدارة : <?= $person_data->edara ?>
                                        </a>
                                        <a class="btn btn-link">
                                            <i class="ace-icon fa fa-user-o bigger-120 green"></i>
                                            القسم : <?= $person_data->department ?>
                                        </a>

                                        <a class="btn btn-link">
                                            <i class="ace-iconfa fa-address-book-o bigger-120 green"></i>
                                            المدير المباشر : <?= $person_data->manager_name ?>
                                        </a>
                                        <a class="btn btn-link">
                                            <i class="ace-icon fa fa-map-o	 bigger-120 green"></i>
                                            <?= $person_data->job ?>
                                        </a>
                                    <?php } ?>


                                    <?php
                                } ?>
                                <a class="btn btn-link">
                                    <?php $rol_arr = array(1 => 'مدير على نظام', 2 => 'عضو مجلس ادارة', 3 => 'موظف علي النظام', 4 => 'عضو جمعية عمومية ', 5 => 'متطوع على نظام ') ?>
                                    <i class="ace-icon fa fa-user-o bigger-120 green"></i>
                                    الدور على النظام : <?= $rol_arr[$_SESSION['role_id_fk']] ?>
                                </a>
                            </div>


                        </div>


                        <div class="space-6"></div>

                        <div class="profile-contact-info">
                            <div class="profile-contact-links align-right">
                                <a class="btn btn-link" data-toggle="modal"
                                   data-target="#modal-data">
                                    <i class="ace-icon fa fa-plus-circle bigger-120 green"></i>
                                    تعديل بيانات حسابى
                                </a>


                            </div>

                            <div class="space-6"></div>

                            <?php
                            if ($_SESSION['role_id_fk'] == 3) {
                                if (isset($person_data) && (!empty($person_data))) { ?>

                                    <div class="profile-social-links align-center">

                                        <?php if (isset($person_data) && (!empty($person_data->snap_chat))) { ?>

                                            <a href="<?= $person_data->snap_chat ?>" class="tooltip-info" title=""
                                               data-original-title="Visit my Facebook">
                                                <i class="middle ace-icon fa fa-snapchat-square fa-2x blue"></i>
                                            </a>
                                        <?php } ?>
                                        <?php if (isset($person_data) && (!empty($person_data->twiter))) { ?>

                                            <a href="<?= $person_data->twiter ?>" class="tooltip-info" title=""
                                               data-original-title="Visit my Twitter">
                                                <i class="middle ace-icon fa fa-twitter-square fa-2x light-blue"></i>
                                            </a>
                                        <?php } ?>

                                    </div>
                                <?php }
                            } ?>                        </div>


                    </div>


                </div>
            </div>



            <!--------------------------------------------------------------->
            <div class="tab-pane" id="pag3" role="tabpanel">
                <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">قسم التوظيف</h5>
                        </div>
                        <div class="panel-body">
                            <div class="orders-btns">
                                <a href="#" data-toggle="modal" onclick="get_Job_request()" data-target="#ezn_Modal"
                                   class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                class="fa fa-book"></i></span> طلب احتياج وظيفة</a>
                                <a href="#" data-toggle="modal" onclick="get_Disclaimer()" data-target="#ezn_Modal"
                                   class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                class="fa fa-book"></i></span> إخلاء طرف</a>
                                <!--
                <a href="#" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                class="fa fa-book"></i></span> طلب خطاب</a>
                <a href="#" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                class="fa fa-book"></i></span> تقديم إستقالة</a>-->
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">قسم الإجازات</h5>
                        </div>
                        <div class="panel-body">
                            <div class="orders-btns">
                                <a data-toggle="modal" onclick="get_ezn()"
                                   data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                class="fa fa-book"></i></span> طلب إستئذان</a>
                                <a data-toggle="modal" onclick="get_agaza()"
                                   data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                class="fa fa-book"></i></span> طلب إجازة</a>
                                <!--<a href="#" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                class="fa fa-book"></i></span> مباشرة عمل بعد الإجازة</a>-->
                                <a href="#" data-toggle="modal" onclick="get_Mandate_order()"
                                   data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                class="fa fa-book"></i></span> طلب إنتداب</a>
                                <a href="#" data-toggle="modal" onclick="get_Overtime_hours_orders()"
                                   data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                class="fa fa-book"></i></span> طلب تكليف اضافي</a>
                                <a href="#" data-toggle="modal" onclick="get_Volunteer_hours()"
                                   data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                class="fa fa-book"></i></span>طلب ساعات التطوع</a>
                            </div>
                        </div>

                    </div>
                </div>


    <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">قسم المالية والسلف </h5>
                                        </div>
                                        <div class="panel-body">
                                            <div class="orders-btns">
                                                <a href="#" data-toggle="modal" onclick="get_solaf()"
                                   data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                                class="fa fa-book"></i></span> طلب سلفة</a>
                                                <!--<a href="#" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                                class="fa fa-book"></i></span> طلب تأمين صحي</a>-->

                                            </div>
                                        </div>

                                    </div>
                                </div>


                <!--
                                <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">قسم المالية والسلف </h5>
                                        </div>
                                        <div class="panel-body">
                                            <div class="orders-btns">
                                                <a href="#" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                                class="fa fa-book"></i></span> طلب سلفة / عهده</a>
                                                <a href="#" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                                class="fa fa-book"></i></span> طلب تأمين صحي</a>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                -->
                <!--
                                <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">قسم المشتريات </h5>
                                        </div>
                                        <div class="panel-body">
                                            <div class="orders-btns">
                                                <a href="#" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                                class="fa fa-book"></i></span> طلب قرطاسية / أصل </a>
                                                <a href="#" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                                class="fa fa-book"></i></span> طلب مطبوعات</a>
                                                <a href="#" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                                class="fa fa-book"></i></span> طلب شراء</a>

                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">قسم البحوث والإستقصاء </h5>
                                        </div>
                                        <div class="panel-body">
                                            <div class="orders-btns">
                                                <a href="#" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                                class="fa fa-book"></i></span> إستقصاء مقابلة ترك خدمة </a>
                                                <a href="#" class="btn btn-default btn-labeled"><span class="btn-label"><i
                                                                class="fa fa-book"></i></span> إستبيان الرضى الوظيفي</a>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                -->
            </div>
            <!---------------------------------------------------------->

        
            <div class="tab-pane" id="pag4" role="tabpanel">
                <div class="col-md-3 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">الاجازات</h5>
                        </div>
                        <div class="panel-body" style=" height: 347px;overflow: hidden;">
                            <ol class="dd-list">
                                <li><a href="#" data-toggle="modal" onclick="get_agaza_tab('mine_1','طلباتي')"
                                    data-target="#ezn_Modal">
                                        <i class="fa fa-check" aria-hidden="true"></i> طلباتي<span class="badge "
                                        style="float: left;color: #fff !important;"><?php if (!empty($user_orders)) {
                                                                        echo count($user_orders);
                                                                    } else {
                                                                        echo 0;
                                                                    } ?></span></a>
                                </li>

                                <li><a href="#" data-toggle="modal" onclick="get_agaza_tab('follow_1','متابعة طلباتي')"
                                    data-target="#ezn_Modal">
                                        <i class="fa fa-check" aria-hidden="true"></i> متابعة طلباتي<span class="badge "
                                        style="float: left;color: #fff !important;"> <?php if (!empty($user_orders)) {
                                                                        echo count($user_orders);
                                                                    } else {
                                                                        echo 0;
                                                                    } ?></span></a>
                                </li>

                                <li><a href="#" data-toggle="modal" onclick="get_agaza_tab('comming_1','الوارد')"
                                    data-target="#ezn_Modal">
                                        <i class="fa fa-check" aria-hidden="true"></i> الوارد<span class="badge "
                                        style="float: left;color: #fff !important;"><?php if (!empty($coming_records)) {
                                                                        echo count($coming_records);
                                                                    } else {
                                                                        echo 0;
                                                                    } ?></span></a>
                                </li>


                            </ol>
                        </div>
                    
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">الأذونات</h5>
                        </div>
                        <div class="panel-body" style=" height: 347px;overflow: hidden;">
                            <ol class="dd-list">
                                <li><a href="#" data-toggle="modal" onclick="get_ezen_tab(1,'طلباتي')"
                                       data-target="#ezn_Modal">
                                        <i class="fa fa-check" aria-hidden="true"></i> طلباتي<span class="badge "
                                       style="float: left;color: #fff !important;"><?php if (!empty($ozonat_records)) {
                                                echo count($ozonat_records);
                                            } else {
                                                echo 0;
                                            } ?></span></a>
                                </li>

                                <li><a href="#" data-toggle="modal" onclick="get_ezen_tab(2,'متابعة طلباتي')"
                                       data-target="#ezn_Modal">
                                        <i class="fa fa-check" aria-hidden="true"></i> متابعة طلباتي<span class="badge "
                                            style="float: left;color: #fff !important;"><?php if (!empty($ozonat_records)) {
                                                echo count($ozonat_records);
                                            } else {
                                                echo 0;
                                            } ?></span></a>
                                </li>

                                <li><a href="#" data-toggle="modal" onclick="get_ezen_tab(3,'الوارد')"
                                       data-target="#ezn_Modal">
                                        <i class="fa fa-check" aria-hidden="true"></i> الوارد<span class="badge "
                                    style="float: left;color: #fff !important;"><?php if (!empty($ozonat_coming)) {
                                                echo count($ozonat_coming);
                                            } else {
                                                echo 0;
                                            } ?></span></a>
                                </li>


                            </ol>
                        </div>
      
                    </div>
                </div>

           <div class="col-md-3 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">السلف</h5>
                        </div>
                        <div class="panel-body" style=" height: 347px;overflow: hidden;">
                            <ol class="dd-list">
                                <li><a href="#" data-toggle="modal" onclick="get_solaf_tab('mine_1','طلباتي')"
                                    data-target="#ezn_Modal">
                                        <i class="fa fa-check" aria-hidden="true"></i> طلباتي<span class="badge "
                                        style="float: left;color: #fff !important;"><?php if (!empty($user_solaf_orders)) {
                                                                        echo count($user_solaf_orders);
                                                                    } else {
                                                                        echo 0;
                                                                    } ?></span></a>
                                </li>

                                <li><a href="#" data-toggle="modal" onclick="get_solaf_tab('follow_1','متابعة طلباتي')"
                                    data-target="#ezn_Modal">
                                        <i class="fa fa-check" aria-hidden="true"></i> متابعة طلباتي<span class="badge "
                                        style="float: left;color: #fff !important;"> <?php if (!empty($user_solaf_orders)) {
                                                                        echo count($user_solaf_orders);
                                                                    } else {
                                                                        echo 0;
                                                                    } ?></span></a>
                                </li>

                                <li><a href="#" data-toggle="modal" onclick="get_solaf_tab('comming_1','الوارد')"
                                    data-target="#ezn_Modal">
                                        <i class="fa fa-check" aria-hidden="true"></i> الوارد<span class="badge "
                                        style="float: left;color: #fff !important;"><?php if (!empty($coming_solaf_records)) {
                                                                        echo count($coming_solaf_records);
                                                                    } else {
                                                                        echo 0;
                                                                    } ?></span></a>
                                </li>


                            </ol>
                        </div>
                                            
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">الشئون المالية</h5>

                        </div>
                        <div class="panel-body" style=" height: 347px;overflow: hidden;">
                            <ol class="dd-list">
                                <li><a href="#" data-toggle="modal" onclick="get_sadad_fatora(1,'طالبات تسديد فواتير')"
                                       data-target="#ezn_Modal">
                                        <i class="fa fa-check" aria-hidden="true"></i> طالبات تسديد فواتير<span
                                                class="badge "
                                                style="float: left;color: #fff !important;"><?php if (!empty($sadad_fatora)) {
                                                echo sizeof($sadad_fatora);
                                            } else {
                                                echo 0;
                                            } ?></span></a>
                                </li>


                            </ol>
                        </div>
                    </div>
                </div>




                    <div class="col-md-3 col-sm-6 col-xs-12 padding-10">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">التكليف الاضافي </h5>

                                </div>
                                <div class="panel-body" style=" height: 347px;overflow: hidden;">
                                    <ol class="dd-list">
                                        <li><a href="#" data-toggle="modal" onclick="get_over_time_emp(1,'طالبات  تكليف الاضافي')" data-target="#ezn_Modal">
                                                <i class="fa fa-check" aria-hidden="true"></i> طالبات  تكليف الاضافي<span class="badge " style="float: left;color: #fff !important;">
                                                <?php if (!empty($over_time_emp)) {
                                                        echo sizeof($over_time_emp);
                                                    } else {
                                                        echo 0;
                                                    } ?></span></a>
                                        </li>


                                    </ol>
                                </div>
                            </div>
                    </div>

            </div>


        </div>
    </div>

</div>


<div class="modal fade " id="modal-data" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-success modal-lg " role="document">
        <div class="modal-content ">
            <div class="modal-header ">

                <h1 class="modal-title">تعديل البيانات الشخصية </h1>
            </div>
            <div class="modal-body row">
                <?php echo form_open_multipart("maham_mowazf/person_profile/Personal_profile/update_users/" . $person_data->user_id); ?>
                <!--------------------------------------------------------------->

                <div class="col-sm-12 col-xs-12">

                    <div class="col-sm-10 col-xs-12">
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label ">إسم المستخدم </label>
                            <input type="text" class="form-control   " id="user_name"
                                   name="user_name" data-validation="required"
                                   value="<?= $person_data->user_name ?>">
                        </div>
                        <!--<div class="form-group col-sm-4 col-xs-12">
                            <label class="label ">رقم الجوال </label>
                            <input type="number" class="form-control    " name="user_phone"
                                   placeholder=" رقم الجوال" value="<? /*= $person_data->user_phone */ ?>"
                                   data-validation="required">
                        </div>

                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label ">رقم الهوية </label>
                            <input type="number" name="id_number" id="id_number" data-validation="required"
                                   value="<? /*= $person_data->user_id_number */ ?>"
                                   class="form-control  " placeholder=" رقم الهوية"/>
                        </div>-->

                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label "> كلمة المرور <strong></strong> </label>
                            <input type="password" id="user_pass" class="form-control  "
                                   name="user_pass"
                                   onkeyup="return valid('validate1','user_pass','button_update');"
                                   autocomplete="off" placeholder=" كلمه المرور "/>
                            <span id="validate1" class="span-validation"></span>
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label ">تاكيد كلمة المرور <strong></strong> </label>
                            <input type="password" id="user_pass_validate" class="form-control  "
                                   placeholder="تأكيد كلمة المرور"
                                   onkeyup="return valid2('validate','user_pass_validate','button_update','user_pass');"/>
                            <span id="validate" class="span-validation"> </span>
                        </div>
                    </div>

                    <div class="col-sm-2 col-xs-12">
                        <?php if (file_exists("uploads/images/" . $person_data->user_photo)) { ?>
                            <div class="form-group">
                                <img style="width: 100px;" class="media-object img-circle"
                                     src="<?php echo base_url() . "uploads/images/profie/" . $person_data->user_photo; ?>"
                                     accesskey=""
                                     onerror="this.src='<?php echo base_url() . "asisst/fav/apple-icon-120x120.png" ?>'">
                            </div>
                        <?php } ?>

                        <input type="file" name="user_photo" class="form-control "/>
                        <small class="small" style="bottom:-13px;">
                            <?php if (file_exists("uploads/images/profie/" . $person_data->user_photo)) { ?>
                            <?php } else { ?>
                                برجاء إرفاق صورة
                            <?php } ?>
                        </small>
                    </div>
                </div>


                <!--------------------------------------------------------------->
            </div>

            <div class="modal-footer ">
                <input type="hidden" name="role_id_fk" value="1">
                <button type="submit" name="ADD" value="ADD" id="button_update"
                        class="btn btn-labeled btn-success "
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                </button>
                <?php echo form_close() ?>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
                <!--                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>-->

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="ezn_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%;height: 90%;overflow: auto">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modal_header"></h4>
            </div>
            <div class="modal-body" id="ezn_Modal_body">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/analogue-time-picker.js"></script>
<script src="<?php echo base_url(); ?>asisst/admin_asset/js/mdtimepicker.js"></script>

<!--  14-7-om -->
<?php if ($_SESSION['role_id_fk'] == 3) { ?>
    <?php 
     if (isset($count2)) {
    if ($count2 > 0) { ?>
        <script>
            $(document).ready(function () {
                console.log("ready!");
                $('#finance_Data_2').show();

            });
        </script>
    <?php } else {
        ?>

        <script>
            $(document).ready(function () {
                console.log("ready!");
                $('#no_data_2').show();

            });
        </script>
        <?php
    } 
    }
    ?>
    <?php
     if (isset($count1)) {
     if ($count1 > 0) { ?>
        <script>
            $(document).ready(function () {
                console.log("ready!");
                $('#finance_Data_1').show();

            });
        </script>
    <?php } else {
        ?>

        <script>
            $(document).ready(function () {
                console.log("ready!");
                $('#no_data_1').show();

            });
        </script>
        <?php
    }
    }
} ?>

<script type="text/javascript">
    var loadFile = function (event, input_id) {
        var output = document.getElementById(input_id);
        output.src = URL.createObjectURL(event.target.files[0]);
        console.log('file :' + output.src);
        console.log('file :' + event.target.files[0].name);
        upload_img(event.target.files[0]);

    };
</script>

<script>

    function upload_img(obj) {


        var files = obj;
        var error = '';
        var form_data = new FormData();
        // for(var count = 0; count<files.length; count++)
        // {
        var name = files.name;


        var extension = name.split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            error += "Invalid   Image File"
        } else {
            form_data.append("files", files);
            form_data.append("id", '<?=$person_data->user_id?>');
        }
        // }
        if (error == '') {

            $.ajax({
                url: "<?php echo base_url(); ?>person_profile/Personal_profile/upload_img", //base_url() return http://localhost/tutorial/codeigniter/
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('#images').html('<img src="<?php echo base_url();?>asisst/web_asisst/img/material-loader.gif">');
                },
                success: function (data) {
                    // alert(data);

                    //$('#images').show();
                    $('#images').html(data);


                }
            })

        }


    }


</script>

<script>
    function valid(div1, div2, button) {
        if ($("#" + div2).val().length < 4) {
            document.getElementById(div1).style.color = '#F00';
            document.getElementById(div1).innerHTML = 'كلمة المرور اكثر من اربع حروف';
            document.getElementById(button).setAttribute("disabled", "disabled");
        }
        if ($("#" + div2).val().length > 4 && $("#user_pass").val().length < 10) {
            document.getElementById(div1).style.color = '#F00';
            document.getElementById(div1).innerHTML = 'كلمة المرور ضعيفة';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        }
        if ($("#" + div2).val().length > 10) {
            document.getElementById(div1).style.color = '#00FF00';
            document.getElementById(div1).innerHTML = 'كلمة المرور قوية';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        }
    }

    function valid2(div2, div3, button, input) {
        if ($("#" + input).val() == $("#" + div3).val()) {
            document.getElementById(div2).style.color = '#00FF00';
            document.getElementById(div2).innerHTML = 'كلمة المرور متطابقة';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        } else {
            document.getElementById(div2).style.color = '#F00';
            document.getElementById(div2).innerHTML = 'كلمة المرور غير متطابقة';
            document.getElementById(button).setAttribute("disabled", "disabled");
        }
    }

</script>


<script>
    // $('').click(function (e) {
    //     e.preventDefault();
    function show_tab(id) {
        $('a[href="#' + id + '"]').tab('show');
    }

    // });
</script>
<script>
    /*function get_ezn() {
        $('#modal_header').text('طلب الأذن');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/talabat/all_ozonat/Ezn_order",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $('#from_time').mdtimepicker(); //Initializes the time picker
                $('#to_time').mdtimepicker(); //Initializes the time picker

                console.log('profile agaza ezn_order ');
            }
        });
    }

   function get_agaza() {
        $('#modal_header').text('طلب اجازة');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/talabat/agazat/Vacation/add_vacation",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);

                console.log('profile agaza ezn_order ');
            }
        });
    }*/
 function get_ezn() {
    $('#modal_header').text('طلب الأذن');
    $.ajax({
        type: 'post',
        url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order",
        data: {
            from_profile: 1
        },
        beforeSend: function() {
            $('#ezn_Modal_body').html(
                '<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>'
                );
        },
        success: function(d) {
            $('#ezn_Modal_body').html(d);
          
           $.validate({
                validateHiddenInputs: true // for live search required
            });

            var oTable_usergroup = $('#js_table_ozonat').DataTable({
            dom: 'Bfrtip',
           
            ajax: {
                    type: 'post',
                    url: "<?php echo base_url(); ?>human_resources/employee_forms/all_ozonat/Ezn_order/display_data",
                    data: {
                        from_profile: 1
                    }
                },


            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                 { "bSortable": true },
                 { "bSortable": true },
                //  { "bSortable": true }
                  // { "bSortable": true },
                  


            ],

                buttons: [
        'pageLength',
        'copy',
        'excelHtml5',
        {
            extend: "pdfHtml5",
            orientation: 'landscape'
        },

        {
            extend: 'print',
            exportOptions: { columns: ':visible'},
            orientation: 'landscape'
        },
        'colvis'
        ],
        colReorder: true,
        scrollX: true
        });
        set_time();
        //console.log('profile get_Job_request');
        }
    });
}

function set_time() {
    $('#from_time').mdtimepicker(); //Initializes the time picker
    $('#to_time').mdtimepicker(); //Initializes the time picker
}
    function get_agaza() {
        $('#modal_header').text('طلب اجازة');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation",
            data: {
                from_profile: 1
            },
            beforeSend: function() {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function(d) {
                $('#ezn_Modal_body').html(d);
                 $.validate({
                    validateHiddenInputs: true // for live search required
                });

                console.log('profile agaza ezn_order ');
            }
        });
    }

    
    function get_Job_request() {
        $('#modal_header').text('طلب احتياج وظيفة');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

                var oTable_usergroup = $('#js_table').DataTable({
                    dom: 'Bfrtip',
                    ajax: {
                        type: 'post',
                        url: "<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/display_data",
                        data: {from_profile: 1}
                    },

                    aoColumns: [
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true}


                    ],

                    buttons: [
                        'pageLength',
                        'copy',
                        'excelHtml5',
                        {
                            extend: "pdfHtml5",
                            orientation: 'landscape'
                        },

                        {
                            extend: 'print',
                            exportOptions: {columns: ':visible'},
                            orientation: 'landscape'
                        },
                        'colvis'
                    ],
                    colReorder: true


                });


            }
        });
    }

    function get_Disclaimer() {
        $('#modal_header').text('إخلاء طرف');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Disclaimer/addDisclaimer",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });


//console.log('profile get_Job_request');
            }
        });
    }

    function get_Mandate_order() {
        $('#modal_header').text('طلب انتداب');
        //"ajax": '<?php //echo base_url(); ?>//human_resources/employee_forms/job_requests/Job_request/display_data',

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });


//console.log('profile get_Job_request');
            }
        });
    }

    function get_Overtime_hours_orders() {
        $('#modal_header').text('طلب تكليف إضافى');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_overtime_hours_orders",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });


            }
        });
    }

    function get_Volunteer_hours() {
        $('#modal_header').text('طلب ساعات التطوع');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/add_volunteer_hours",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }


</script>
<script>
    function edite_Job_request(id) {
        $('#modal_header').text('تعديل طلب الوظيفة');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/Update_requset",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                var oTable_usergroup = $('#js_table').DataTable({
                    dom: 'Bfrtip',
                    ajax: {
                        type: 'post',
                        url: "<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/display_data",
                        data: {from_profile: 1}
                    },

                    aoColumns: [
                        {"bSortable": true},
                        //  { "bSortable": true },
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true}


                    ],

                    buttons: [
                        'pageLength',
                        'copy',
                        'excelHtml5',
                        {
                            extend: "pdfHtml5",
                            orientation: 'landscape'
                        },

                        {
                            extend: 'print',
                            exportOptions: {columns: ':visible'},
                            orientation: 'landscape'
                        },
                        'colvis'
                    ],
                    colReorder: true


                });

                console.log('profile agaza ');
            }
        });
    }

    function edite_Disclaimer(id) {
        $('#modal_header').text('تعديل طلب إخلاء طرف ');
        //"ajax": '<?php //echo base_url(); ?>//human_resources/employee_forms/job_requests/Job_request/display_data',

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Disclaimer/updateDisclaimer",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });


//console.log('profile get_Job_request');
            }
        });
    }

    function edit_Mandate_order(id) {
        $('#modal_header').text('تعديل طلب  انتداب ');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/edit_Mandate_order",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

            }
        });
    }

    function edit_Overtime_hours_orders(id) {
        $('#modal_header').text('تعديل طلب  تكليف إضافى ');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/edit_overtime_hours_orders",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

            }
        });
    }

    function edit_Volunteer_hours(id) {
        $('#modal_header').text('تعديل طلب  ساعات التطوع ');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/edit_volunteer_hours",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

            }
        });
    }
/*
    function edite_agaza(id) {
        $('#modal_header').text('تعديل طلب الاجازة');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url(); ?>maham_mowazf/talabat/agazat/Vacation/edit_vacation",
            data: {id: id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                console.log('profile agaza ');
            }
        });
    }
*/

      function edite_agaza(id) {
        $('#modal_header').text('تعديل طلب الاجازة');
        //"ajax": '<?php //echo base_url(); ?>//human_resources/employee_forms/job_requests/Job_request/display_data',

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/edit_vacation",
            data: {
                id: id,
                from_profile: 1
            },
            beforeSend: function() {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function(d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });


                //console.log('profile get_Job_request');
            }
        });
    }
   
    /*function edite_ezn(id) {
        $('#modal_header').text('تعديل طلب الأذن');

        $.ajax({
            type: 'post',
            url: "<?php echo base_url(); ?>maham_mowazf/talabat/all_ozonat/Ezn_order/Upadte_ezn",
            data: {id: id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $('#from_time').mdtimepicker(); //Initializes the time picker
                $('#to_time').mdtimepicker(); //Initializes the time picker

                console.log('profile agaza ');
            }
        });
    }*/

    function edite_ezn(id) {
    $('#modal_header').text('تعديل طلب الأذن');

    $.ajax({
        type: 'post',
        url: "<?php echo base_url(); ?>human_resources/employee_forms/all_ozonat/Ezn_order/Upadte_eznn",
        data: {
            id: id,
            from_profile: 1
        },
        beforeSend: function() {
            $('#ezn_Modal_body').html(
                '<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>'
                );
        },
        success: function(d) {
            $('#ezn_Modal_body').html(d);
            $.validate({
                validateHiddenInputs: true // for live search required
            });
            var oTable_usergroup = $('#js_table_ozonat').DataTable({
                dom: 'Bfrtip',
                ajax: {
                    type: 'post',
                    url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order/display_data",
                    data: {
                        from_profile: 1
                    }
                },

                aoColumns: [{
                        "bSortable": true
                    },
                
                    {
                        "bSortable": true
                    },
                    {
                        "bSortable": true
                    },
                    {
                        "bSortable": true
                    },
                    {
                        "bSortable": true
                    }
                    ,
                    {
                        "bSortable": true
                    }
                    ,
                    {
                        "bSortable": true
                    }


                ],

                buttons: [
                    'pageLength',
                    'copy',
                    'excelHtml5',
                    {
                        extend: "pdfHtml5",
                        orientation: 'landscape'
                    },

                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        },
                        orientation: 'landscape'
                    },
                    'colvis'
                ],
                colReorder: true


            });
            set_time();
          //  console.log('profile agaza ');
        }
    });
}
</script>

<script>
    function get_agaza_tab(tab_id, text) {
        $('#modal_header').text(text);
        // $('#ezn_Modal_body').css();

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations",
            data: {tab_id: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

                console.log('profile agaza agaza_tab ');
            }
        });
    }

    function get_ezen_tab(tab_id, text) {
        $('#modal_header').text(text);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/get_orders",
            data: {valu: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

                console.log('profile agaza agaza_tab ');
            }
        });
    }

</script>
<script>
    function get_sadad_fatora(tab_id, text) {
        $('#modal_header').text(text);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/person_profile/Personal_profile/get_sadad_fatora",
            data: {valu: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);


                console.log('profile agaza agaza_tab ');
            }
        });
    }

</script>
<!---------------------------------------------------------------------------->

<script>
function get_solaf() {
        $('#modal_header').text('طلب سلفة');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/add_solaf",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }
function edit_solaf(id) {
        $('#modal_header').text('تعديل طلب سلفة ');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/edit_solaf",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

            }
        });
    }


function get_solaf_tab(tab_id, text) {
        $('#modal_header').text(text);
        // $('#ezn_Modal_body').css();

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/All_transformations",
            data: {tab_id: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

                console.log('profile agaza agaza_tab ');
            }
        });
    }

</script>

