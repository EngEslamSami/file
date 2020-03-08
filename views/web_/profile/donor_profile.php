<section class="contact-us">
    <div class="container-fluid">
        <div class="xs-heading row xs-mb-60"></div>
        <div class="col-sm-12 padding-30 white_background">
            <!---------------------------------------------------------------------------------->
            <div class="container">
                <div class="col-sm-3">
                    <ul class="nav nav-pills">
                        <li class="col-sm-12 active"><a data-toggle="pill" href="#menu0">البيانات الاساسية</a></li>
                        <li class="col-sm-12"><a data-toggle="pill" href="#menu3">سندات تبرع بالجمعية</a></li>
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="tab-content">
                        <div  id="menu0" class="tab-pane fade in active">
                            <!------------------1----------->
                        <?
                        $donor_type = array(1=>'فرد',2=>'مؤسسة');
                        $pay_method = array(1=>'نقدي',2=>'شبكة',3=>'حوالة بنكية',4=>'استقطاع',5=>'بنك',6=>'شيك');
                        $gender_type = array(1=>'ذكر',2=>'أنثى');
                        $job_type = array(1=>'موظف حكومي',2=>'موظف قطاع خاص',3=>'أعمال حرة',4=>'لا يعمل');
                        $identity_type =array(1=>'الهوية الوطنية',2=>'إقامة',3=>'وثيقة',4=>'جواز سفر');
                        ?>
                        <table class="table table-striped table-bordered dt-responsive nowrap">
                            <tbody>
                            <?php  foreach ($donors as $donor) { ?>
                                <tr>
                                    <td>نوع المتبرع</td>
                                    <td><?=$donor_type[$donor->donor_type]?></td>
                                </tr>

                                <tr>
                                    <td>الجنس</td>
                                    <td><?=$gender_type[$donor->gender]?></td>
                                </tr>

                                <tr>
                                    <td>إسم المستخدم</td>
                                    <td><?=$donor->user_name?></td>
                                </tr>

                                <tr>
                                    <td>الجنسية</td>
                                    <td><?=$donor->nationality?></td>
                                </tr>

                                <tr>
                                    <td>نوع الهوية</td>
                                    <td><?=$identity_type[$donor->identity_type]?></td>
                                </tr>

                                <tr>
                                    <td>رقم الهوية</td>
                                    <td><?=$donor->national_id?></td>
                                </tr>

                                <tr>
                                    <td>رقم الجوال</td>
                                    <td><?=$donor->mobile?></td>
                                </tr>

                                <tr>
                                    <td>المهنة</td>
                                    <td><?=$job_type[$donor->job_type]?></td>
                                </tr>

                                <tr>
                                    <td>جهة العمل</td>
                                    <td><?=$donor->job_place?></td>
                                </tr>

                                <tr>
                                    <td>البريد الإلكتروني</td>
                                    <td><?=$donor->email?></td>
                                </tr>

                                <tr>
                                    <td>طريقة السداد</td>
                                    <td><?=$pay_method[$donor->pay_method]?></td>
                                </tr>

                                <tr>
                                    <td>البنك</td>
                                    <td><?=$donor->bank?></td>
                                </tr>

                                <tr>
                                    <td>رقم الحساب</td>
                                    <td><?=$donor->account_number?></td>
                                </tr>

                                <tr>
                                    <td>ملاحظات</td>
                                    <td><?=$donor->note?></td>
                                </tr>

                                <tr>
                                    <td>الملفات المرفقة</td>
                                    <td>
                                        <?php if($donor->files != null) { ?>
                                            <a href="<?=base_url().'Finance_resource/download_donor_files/'.$donor->id?>"><i class="fa fa-download"></i></a>
                                        <? } ?>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                            <!------------------1----------->
                        </div>
                    <div id="menu3" class="tab-pane fade">
                            <!----------------------------->
                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>تارخ السند  </th>
                                    <th>قيمة  السند  </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  $x=1; foreach ($donor_pill as $pill) { ?>
                                    <tr>
                                        <td><?=$x++?></td>
                                        <td><?=date("Y-m-d",$pill->date)?></td>
                                        <td><?=$pill->value?></td>
                                    </tr>
                                <?php  } ?>
                                </tbody>
                            </table>
                            <!----------------------------->
                        </div>

                    </div>
                </div>
            </div>
            <!---------------------------------------------------------------------------------->
        </div>
    </div>
</section>





