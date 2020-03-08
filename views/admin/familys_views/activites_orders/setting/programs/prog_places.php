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
                <?php if(isset($results)){?>
                <?php echo form_open_multipart('family_controllers/activites_orders/Settings/update_place/'.$results['id'],array('class'=>"",'role'=>"form" ))?>
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-sm-6">
                                <h4 class="r-h4"> اسم المكان </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text" class="r-inner-h4 " name="name"
                                data-validation="required"   placeholder="اسم المكان
                                "   value="<?php echo $results['title'];?>"/>
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <button type="submit" name="update" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                        </div>

                    </div>
                </div>

                <?php }else{ ?>
                <?php echo form_open_multipart('family_controllers/activites_orders/Settings/add_places',array('class'=>"",'role'=>"form" ))?>
                <div class="details-resorce">
                    <div class="col-xs-12 r-inner-details">
                        <div class="col-md-6 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-sm-6">
                                <h4 class="r-h4"> اسم المكان </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text" class="r-inner-h4 " name="name"
                                data-validation="required" placeholder="اسم المكان
                                "   />
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-xs-12">
                            <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                        </div>

                    </div>
                </div>
                <?php echo form_close();}?>
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
                    <h4>بيانات الاماكن</h4>
                </div>
            </div>

            <div class="panel-body">
                <?php if(isset($records)&&$records!=null){ ?>
                <div class="col-xs-12 r-secret-table">
                    <div class="panel-body">
                        <div class="fade in active">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center"> م </th>
                                        <th class="text-center"> المكان </th>
                                        <th class="text-center"> الاجراء </th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php 
                                    $a=1;
                                    foreach ($records as $record ){
                                        ?>
                                        <tr>
                                            <td><?php echo $a ?> </td>
                                            <td>  <?php echo $record->title; ?> </td>
                                            <td>
                                                <a href="<?php echo base_url('family_controllers/activites_orders/Settings/update_place').'/'.$record->id ?>" title="تعديل"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                <span> </span>
                                                <a onclick="$('#adele').attr('href', '<?=base_url()."family_controllers/activites_orders/Settings/delete_place/".$record->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $a++;
                                    }  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <?php }
                else {echo '<div class="alert alert-danger">لا توجد بيانات</div>';}
                ?></div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                </div>
                <div class="modal-body">
                    <p id="text">هل أنت متأكد من الحذف؟</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                    <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove" id="Delete-Record">نعم</button></a>
                </div>
            </div>
        </div>
    </div>
    <? } ?>