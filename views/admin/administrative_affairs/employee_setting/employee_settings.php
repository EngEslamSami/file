<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>

        <div class="panel-body">
            <div class="col-sm-12 col-xs-12">

                <table class="table table-bordered" id="tab_logic">
                    <thead>
                    <th>#</th>
                    <th style="text-align: center">نوع الاعداد</th>
                    <th style="text-align: center">الإجراء</th>
                    </thead>
                    <tbody>
                    <?php
                    $settings=array('اعدادات ميعاد الدوام','اعدادات أنواع البدلات','اعدادات الأذونات') ;
                    $i =1;
                    foreach($settings as $key =>$row): ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?php echo $row?> </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal<?=$key?>"><span class="fa fa-list"></span>اضافة</button>

                            </td>
                        </tr>

                        <div class="modal fade" id="myModal<?=$key?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document" style="width: <?php echo($key == 1)? '90%' : '60%'; ?>;">
                                <div class="modal-content" >
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><?=$row?></h4>
                                    </div>

                                        <div class="modal-body">
                                            <div class="row" style="padding: 20px">
                                            <?php if ($key == 1){
                                            $names=array('بدل سكن','بدل مواصلات','بدل طبيعه عمل','بدل غلاء معيشه','بدل اخري' );?>
                                                <form action="<?= base_url()?>administrative_affairs_setting/Employee_settings/insert_badlat" method="post">
                                                <?php if(!isset($badlat)) {  for ($i=0;$i<5;$i++){?>
                                                        <div class="form-group col-sm-4 col-xs-12">
                                                            <label class="label label-green half"><?php echo $names[$i];?></label>

                                                        </div>

                                                        <div class="form-group col-sm-4 col-xs-12">
                                                            <label class="label label-green half"> نسبه من الراتب الاساسي</label>
                                                            <input type="text" name="precent[]" value="" placeholder="نسبه من الراتب الاساسي" class="form-control half input-style" data-validation="required" required onkeypress="validate(event)">
                                                        </div>

                                                        <div class="form-group col-sm-4 col-xs-12">
                                                            <label class="label label-green half">الحد الادني</label>
                                                            <input type="text" name="minum[]" value="" placeholder="الحد الادني" class=" form-control half input-style" data-validation="required" required autocomplete="off" onkeypress="validate(event)">
                                                        </div>

                                                <?php }
                                                }else {

                                                  $i=0;  foreach ($badlat as $badl){?>
                                                          <div class="form-group col-sm-4 col-xs-12">
                                                              <label class="label label-green half"><?php echo $names[$i];?></label>

                                                          </div>

                                                          <div class="form-group col-sm-4 col-xs-12">
                                                              <label class="label label-green half"> نسبه من الراتب الاساسي</label>
                                                              <input type="text" name="precent[]" value="<?= $badl->percent?>" placeholder="نسبه من الراتب الاساسي" class="form-control half input-style" data-validation="required" required onkeypress="validate(event)">
                                                          </div>

                                                          <div class="form-group col-sm-4 col-xs-12">
                                                              <label class="label label-green half">الحد الادني</label>
                                                              <input type="text" name="minum[]" value="<?= $badl->mininum ?>" placeholder="الحد الادني" class=" form-control half input-style" data-validation="required" required autocomplete="off" onkeypress="validate(event)">
                                                          </div>

                                                  <?php $i++;
                                                }  } ?>


                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="add_badlat"  class="btn btn-success">حفظ</button>

                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </form>
                                    <?php }elseif($key == 0){ ?>
                                    <form action="<?= base_url()?>administrative_affairs_setting/Employee_settings/add_time_work" method="post">
                                        <h4>مواعيد العمل </h4>

                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label class="label label-green half">من</label>
                                            <input type="time" name="from" value="<?php  echo (isset($timeWork))? $timeWork->from : ""  ?>" class="form-control half input-style" data-validation="required" required >
                                        </div>

                                        <div class="form-group col-sm-6 col-xs-12">
                                            <label class="label label-green half">الي</label>
                                            <input type="time" name="to" value="<?php echo (isset($timeWork))? $timeWork->to : "" ?>" placeholder="الحد الادني" class=" form-control half input-style" data-validation="required" required autocomplete="off">
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="add_badlat"  class="btn btn-success">حفظ</button>

                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                                    </form>
                                    <?php } elseif($key == 2){ ?>
                                        <form action="<?= base_url()?>administrative_affairs_setting/Employee_settings/add_ozon" method="post">
                                            <h4>الاذونات </h4>
                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green half">أقصي عدد ساعات خلال اليوم</label>
                                                <input type="text" name="ozon_num_day" value="<?php  echo (isset($ozonat))? $ozonat->ozon_num_day : ""  ?>" placeholder="عدد الاذونات خلال اليوم" class="form-control half input-style" data-validation="required" required onkeypress="validate(event)">
                                            </div>

                                            <div class="form-group col-sm-6 col-xs-12">
                                                <label class="label label-green half">أقصي عدد ساعات خلال الشهر</label>
                                                <input type="text" name="ozon_num_month" value="<?php  echo (isset($ozonat))? $ozonat->ozon_num_month : ""  ?>" placeholder="عدد الاذونات خلال الشهر" class=" form-control half input-style" data-validation="required" required autocomplete="off" onkeypress="validate(event)">
                                            </div>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="add_badlat"  class="btn btn-success">حفظ</button>

                                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                    </div>
                                    </form>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <?php $i++; endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


<script>
    function validate(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>
