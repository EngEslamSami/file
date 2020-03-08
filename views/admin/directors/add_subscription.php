<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title?></h3>
    </div>
    <div class="panel-body">
<!---form------>


<div class="col-xs-12">
<?php  echo form_open_multipart('Directors/Directors/add_subscription')?>
                    <div class="col-xs-12">
                        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> التاريخ  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                <input type="text" class="form-control date_melady" name="date" placeholder="شهر / يوم / سنة " data-validation="required" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> إسم العضو </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="member_id" id="member_id" class="selectpicker no-padding form-control choose-date form-control " data-show-subtext="true" data-live-search="true" data-validation="required" aria-required="true">
                                        <option value="">إختر العضو</option>
                                        <?php if (!empty($members)):
                                            foreach ($members  as  $member):?>
                                                <option value="<?php echo $member->id;?>"> <?php echo $member->name;?></option>
                                         <?  endforeach;
                                        endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">قيمة الإشتراك </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" id="value" name="value" class="form-control" data-validation="required">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 ">

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 r-inner-btn">
                    <div class="col-xs-3">
                    </div>
                    <div class="col-xs-3">
                        <input type="submit" role="button" name="save" value="حفظ" class="btn pull-right">
                    </div>
                    <?php echo form_close()?>
                    <div class="col-xs-7"></div>
                </div>
                <div class="col-sm-12 col-xs-12 r-inner-details">
                  <?php if(!empty($records)):?>
                    <table class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer" style="width: 70%;margin-right: 160px">
                        <thead><tr>
                            <th >م</th>
                            <th >إسم العضو</th>
                            <th >تاريخ الإشتراك</th>
                            <th >قيمة الإشتراك</th>
                            <th >الإجراء</th>
                        </tr></thead>
                        <tbody>
                      <?php  $serial = 0;
                        foreach($records as $record):
                            $serial++; ?>
                        <tr>
                            <td><?php echo $serial ?></td>
                                  <td><?php
                                      if (!empty($name[$record->member_id])):
                                          echo $name[$record->member_id][0]->name;
                                      endif;
                                      ?></td>
                                  <td><?php echo date('Y-m-d',$record->date);?></td>
                            <td><?php echo $record->value;?></td>
                            <td> <a href="<?php echo base_url('Directors/Directors/delete_subscription').'/'.$record->id ?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span></td>
                        </tr>
                    <?php endforeach ;?>
                        </tbody>
                    </table>
                    <?php endif;?>
                </div>
            </div>
        </div>