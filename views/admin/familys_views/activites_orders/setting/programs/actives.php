<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            
            <div class="panel-body">
                <?php if(isset($results)):?>
                    <?php echo form_open_multipart('family_controllers/activites_orders/Settings/update_actives/'.$results['id'],array('class'=>"",'role'=>"form" ))?>
                    <div class="details-resorce">
                        <div class="col-xs-12 r-inner-details">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> البرنامج </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="from_id_fk" id="from_id_fk" data-validation="required" aria-required="true">
                                        <option value="">إختر</option>
                                        <?php if(!empty($records)):
                                        foreach ($records as $record):
                                            $select='';
                                            if($results['from_id_fk'] ==$record->id){
                                                $select ='selected';
                                            }
                                            ?>
                                            <option value="<? echo $record->id;?>" <?php echo $select;?>><? echo $record->name;?></option>
                                        <?php  endforeach; endif;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-sm-6">
                                    <h4 class="r-h4"> النشاط </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " data-validation="required" name="name" placeholder="النشاط"
                                    value="<?php echo $results['name'];?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="form-group col-sm-12 col-xs-12">
                                <button type="submit" name="update" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <?php echo form_open_multipart('family_controllers/activites_orders/Settings/add_actives',array('class'=>"",'role'=>"form" ))?>
                    <div class="details-resorce">
                        <div class="col-xs-12 r-inner-details">
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> البرنامج </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="from_id_fk" id="from_id_fk" data-validation="required" aria-required="true" >
                                        <option value="">إختر</option>
                                        <?php if(!empty($records)):
                                        foreach ($records as $record):?>
                                        <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
                                    <?php  endforeach; endif;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-sm-6">
                                <h4 class="r-h4"> النشاط </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text" class="r-inner-h4 " name="name" data-validation="required" placeholder="النشاط" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="form-group col-sm-12 col-xs-12">
                            <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); endif; ?>
            </div>
        </div>
    </div>
</div>

<?php if($this->uri->segment(5) == ""){ ?>
<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>بيانات البرامج</h4>
                </div>
            </div>
            
            <div class="panel-body">
                <?php if(isset($records)&&$records!=null){?>
                <div class="col-xs-12 r-secret-table">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center"> م </th>
                                        <th class="text-center"> البرنامج </th>
                                        <th class="text-center"> النشاط </th>
                                        <th class="text-center"> الاجراء </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                        <?php
                                        $a=1;
                                        foreach ($records as $record ): ?>
                                        <tr>
                                            <td rowspan="<?php echo sizeof($record->sub_departments)?>"><?php echo $a++ ?></td>
                                            <td rowspan="<?php echo sizeof($record->sub_departments)?>"><?php echo $record->name; ;?></td>
                                            <?php if(!empty($record->sub_departments)){foreach($record->sub_departments as  $sub){ ?>
                                                <td> <?php echo $sub->name; ?> </td>
                                                <td data-title="التحكم" class="text-center">
                                                    <a href="<?php echo base_url('family_controllers/activites_orders/Settings/update_actives').'/'.$sub->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                </td>
                                           </tr>
                                        <?php     }}else{ ?>
                                        <td> لايوجد انشطة </td>
                                        <td><button class="btn btn-sm btn-danger">لا يوجد الحذف والتعديل</button></td>
                                    </tr>
                                <?php } ?>
                                <?php
                                $a++;
                                endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php }
        else{ echo'<div class="alert alert-danger">لا توجد بيانات</div>';}
        ?>
    </div>
</div>
</div>
</div>
<?php }
?>
