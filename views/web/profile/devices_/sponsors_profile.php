<section class="contact-us">
    <div class="container-fluid">
        <div class="xs-heading row xs-mb-60"></div>
        <div class="col-sm-12 padding-30 white_background">
        <!---------------------------------------------------------------------------------->
            <div class="container">
                <div class="col-sm-3">
                    <ul class="nav nav-pills">
                        <li class="col-sm-12 active"><a data-toggle="pill" href="#menu0">البيانات الاساسية</a></li>
                        <li  class="col-sm-12"><a data-toggle="pill"  href="#menu1">البرامج المشارك بها </a></li>
                        <li class="col-sm-12"><a data-toggle="pill" href="#menu2">الايتام المكفولين </a></li>
                        <li class="col-sm-12"><a data-toggle="pill" href="#menu3">سندات تبرع بالجمعية</a></li>
                    </ul>
                </div>
                <div class="col-sm-9">
                <div class="tab-content">
                  <div  id="menu0" class="tab-pane fade in active">
                        <!------------------1----------->
                        <?
                        $type = array(1=>'فرد',2=>'مؤسسة');
                        $sponsor_type = array(1=>'كفالة مادية',2=>'كفالة مادية مع برنامج',3=>'كفالة أخرى');
                        $pay_method = array(1=>'نقدي',2=>'شبكة',3=>'حوالة بنكية',4=>'استقطاع',5=>'بنك',6=>'شيك');
                        $gender_type = array(1=>'ذكر',2=>'أنثى');
                        $job_type = array(1=>'موظف حكومي',2=>'موظف قطاع خاص',3=>'أعمال حرة',4=>'لا يعمل');
                        $identity_type =array(1=>'الهوية الوطنية',2=>'إقامة',3=>'وثيقة',4=>'جواز سفر');
                        ?>
                        <table class="table table-striped table-bordered dt-responsive nowrap">
                            <tbody>
                        <?php  foreach ($sponsors as $sponsor) { ?>
                        <tr>
                             <td>فرد / مؤسسة</td>
                            <td><?=$type[$sponsor->type]?></td>
                        </tr>

                        <tr>
                             <td>الجنس</td>
                            <td><?=$gender_type[$sponsor->gender]?></td>
                        </tr>

                        <tr>
                            <td>إسم المستخدم </td>
                            <td><?=$sponsor->user_name?></td>
                        </tr>

                        <tr>
                             <td>الجنسية</td>
                            <td><?=$sponsor->nationality?></td>
                        </tr>

                        <tr>
                            <td>نوع الهوية</td>
                            <td><?=$identity_type[$sponsor->identity_type]?></td>
                        </tr>

                        <tr>
                            <td>   رقم الهوية</td>
                            <td><?=$sponsor->national_id?></td>
                        </tr>

                        <tr>
                            <td>   رقم الجوال</td>
                            <td><?=$sponsor->mobile?></td>
                        </tr>

                        <tr>
                            <td>   المهنة</td>
                            <td><?=$job_type[$sponsor->job_type]?></td>
                        </tr>

                        <tr>
                            <td>   جهة العمل</td>
                            <td><?=$sponsor->job_place?></td>
                        </tr>
                        <tr>
                            <td>       البريد الإلكتروني   </td>
                            <td><?=$sponsor->email?></td>
                        </tr>

                        <tr>
                            <td>طريقة السداد</td>
                            <td><?=$pay_method[$sponsor->pay_method]?></td>
                        </tr>

                        <tr>
                            <td>البنك   </td>
                            <td><?=$sponsor->bank?></td>
                        </tr>
                        <tr>
                            <td>رقم الحساب</td>
                            <td><?=$sponsor->account_number?></td>
                        </tr>

                        <tr>
                            <td>تاريخ تسجيل الكفالة</td>
                            <td><?=date("Y-m-d",$sponsor->register_date)?></td>
                        </tr>

                        <tr>
                            <td>تاريخ بداية الكفالة</td>
                            <td><?=date("Y-m-d",$sponsor->date_from)?></td>
                        </tr>

                        <tr>
                            <td>تاريخ نهاية الكفالة</td>
                            <td><?=date("Y-m-d",$sponsor->date_to)?></td>
                        </tr>

                        <tr>
                            <td>عددالدفعات</td>
                            <td><?=$sponsor->payments_num?></td>
                        </tr>

                        <tr>
                            <td>عدد الايتام المكفولين</td>
                            <td><?=$sponsor->orphans_num?></td>
                        </tr>

                        <tr>
                            <td>مبلغ الكفالة</td>
                            <td><?=$sponsor->value?></td>
                        </tr>

                        <tr>
                            <td>نوع  الكفالة</td>
                            <td><?=$sponsor_type[$sponsor->sponsor_type]?></td>
                        </tr>

                        <tr>
                            <td>ملاحظات</td>
                            <td><?=$sponsor->note?></td>
                        </tr>

                        <tr>
                            <td>الملفات المرفقة</td>
                            <td>
                                <?php if($sponsor->files != null) { ?>
                                    <a href="<?=base_url().'Finance_resource/download_sponsor_files/'.$sponsor->id?>"><i class="fa fa-download"></i></a>
                                <? } ?>
                            </td>
                        </tr>
                        <!-----------------1------------>
                        <?php } ?>
                            </tbody>
                        </table>
                  </div>
                  <div id="menu1" class="tab-pane fade">
                      <!----------------------------->
                      <table class="table table-striped table-bordered dt-responsive nowrap">
                          <thead>
                          <tr>
                              <th>#</th>
                              <th>اسم البرنامج </th>
                              <th>قيمة البرنامج </th>
                          </tr>
                          </thead>
                          <tbody>
                      <?php  $x=1; 
                      if(isset($sponsors_prog) and !empty($sponsors_prog) and $sponsors_prog != null){
                      foreach ($sponsors_prog as $pog) { ?>
                          <tr>
                              <td><?=$x++?></td>
                              <td><?=$pog->program_name?></td>
                              <td><?=$pog->monthly_value?></td>
                          </tr>
                      <?php  } ?>
                        <?php  } ?>
                      
                          </tbody>
                      </table>
                        <!----------------------------->
                  </div>
                  <div id="menu2" class="tab-pane fade">
                      <!----------------------------->
                      <table class="table table-striped table-bordered dt-responsive nowrap">
                          <thead>
                          <tr>
                              <th>#</th>
                              <th>اسم اليتيم </th>

                          </tr>
                          </thead>
                          <tbody>
                          <?php
                             if(isset($sponsors_orphan) and !empty($sponsors_orphan) and $sponsors_orphan != null){
                            $x=1; foreach ($sponsors_orphan as $orphan) { ?>
                              <tr>
                                  <td><?=$x++?></td>
                                  <td><?=$orphan->member_full_name?></td>
                              </tr>
                          <?php  } ?>   <?php  } ?>
                          </tbody>
                      </table>
                        <!----------------------------->
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
                          <?php 
                             if(isset($sponsors_pill) and !empty($sponsors_pill) and $sponsors_pill != null){
                           $x=1; foreach ($sponsors_pill as $pill) { ?>
                              <tr>
                                  <td><?=$x++?></td>
                                  <td><?=date("Y-m-d",$pill->date)?></td>
                                  <td><?=$pill->value?></td>
                              </tr>
                          <?php  } ?>   <?php  } ?>
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





