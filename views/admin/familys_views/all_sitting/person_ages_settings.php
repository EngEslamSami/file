
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
                    $settings=array('اعمار المستفيدين') ;
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
                                        <?php if(isset($record) && !empty($record) && $record != null){ ?>
                                            <form method="post" action="<?= base_url()?>family_controllers/Setting/update_person_ages_setting/<?= $record->id ?>">
                                                <div class="form-group col-sm-12 col-xs-12">

                                                    <div class="form-group col-sm-6 col-xs-12">
                                                        <label class="label label-green half"> الاٍناث من سن </label>
                                                        <input type="text" name="from_age_female" value="<?php if(isset($record)) echo $record->from_age_female ?>" class="form-control half input-style" onkeypress="validate_number(event)" autofocus data-validation="required">

                                                    </div>
                                                    <div class="form-group col-sm-6 col-xs-12">
                                                        <label class="label label-green half"> الي سن </label>
                                                        <input type="text" name="to_age_female" value="<?php if(isset($record)) echo $record->to_age_female ?>" class="form-control half input-style" onkeypress="validate_number(event)" autofocus data-validation="required">

                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-12 col-xs-12">
                                                    <div class="form-group col-sm-6 col-xs-12">
                                                        <label class="label label-green half"> الذكور من سن</label>
                                                        <input type="text" name="from_age_male" value="<?php if(isset($record)) echo $record->from_age_male  ?>" class="form-control half input-style" onkeypress="validate_number(event)" autofocus data-validation="required">

                                                    </div>
                                                    <div class="form-group col-sm-6 col-xs-12">
                                                        <label class="label label-green half"> الي سن</label>
                                                        <input type="text" name="to_age_male" value="<?php if(isset($record)) echo $record->to_age_male ?>" class="form-control half input-style" onkeypress="validate_number(event)" autofocus data-validation="required">

                                                    </div>
                                                </div>
                                    </div>
                                </div>
                                   
                                                <div class="modal-footer">
                                                    <button type="submit" name="update" value="update"  class="btn btn-success">حفظ</button>


                                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>



                                            <?php } else { ?>
                                            <form method="post" action="<?= base_url()?>family_controllers/Setting/person_ages_setting">
                                                <div class="form-group col-sm-12 col-xs-12">

                                                    <div class="form-group col-sm-6 col-xs-12">
                                                        <label class="label label-green half"> الاٍناث من سن </label>
                                                        <input type="text" name="from_age_female" value="" class="form-control half input-style" onkeypress="validate_number(event)" autofocus data-validation="required">

                                                    </div>
                                                    <div class="form-group col-sm-6 col-xs-12">
                                                        <label class="label label-green half"> الي سن </label>
                                                        <input type="text" name="to_age_female" value="" class="form-control half input-style" onkeypress="validate_number(event)" autofocus data-validation="required">

                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-12 col-xs-12">
                                                    <div class="form-group col-sm-6 col-xs-12">
                                                        <label class="label label-green half"> الذكور من سن</label>
                                                        <input type="text" name="from_age_male" value="" class="form-control half input-style" onkeypress="validate_number(event)" autofocus data-validation="required">

                                                    </div>
                                                    <div class="form-group col-sm-6 col-xs-12">
                                                        <label class="label label-green half"> الي سن</label>
                                                        <input type="text" name="to_age_male" value="" class="form-control half input-style" onkeypress="validate_number(event)" autofocus data-validation="required">

                                                    </div>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="submit" name="add"  class="btn btn-success">حفظ</button>

                                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                </div>
                                            </form>
                                            <?php } ?>

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
                        <?php $i++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>




<script>
    function validate_number(evt) {
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