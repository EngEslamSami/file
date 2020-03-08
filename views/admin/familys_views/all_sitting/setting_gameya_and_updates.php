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
                    $settings=array('مواعيد الدوام للجمعيه','تنبيه تحديثات ملف الاسر') ;
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
                        <div class="modal-dialog modal-lg" role="document" style="width: 90%;">
                            <div class="modal-content" >
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><?=$row?></h4>
                                </div>

                                <div class="modal-body">
                                    <div class="row" style="padding: 20px">
                                        <?php if($key == 0){ ?>
                                <form action="<?= base_url()?>family_controllers/Setting/add_time_work_gameya" method="post">

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">من</label>
                                        <input type="time" name="from" value="<?php echo (isset($timeWork))? $timeWork->from : '' ?>" class="form-control half input-style" data-validation="required" required >
                                    </div>

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green half">الي</label>
                                        <input type="time" name="to" value="<?php echo (isset($timeWork))? $timeWork->to : '' ?>"  class=" form-control half input-style" data-validation="required" required autocomplete="off">
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="add_badlat"  class="btn btn-success">حفظ</button>

                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                        </form>
                        <?php } elseif($key == 1){ ?>
                        <form action="<?= base_url()?>family_controllers/Setting/add_file_day_num" method="post">

                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green half">بدأ التحديث قبل </label>
                                <input type="text" name="num_day" value="<?php echo (isset($numDays))? $numDays->num_days : '' ?>" placeholder="ادخل عدد الايام" class="form-control half input-style" data-validation="required" required onkeypress="validate(event)">
                            </div>

                            <div class="form-group col-sm-4 col-xs-12">
                                <label class="label label-green half">يوم</label>

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
