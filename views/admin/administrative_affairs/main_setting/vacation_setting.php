<style type="text/css">
    .padd {padding: 0 15px !important;}
    .no-padding {padding: 0;}
</style>
<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo $title;?></h4>
                </div>
            </div>
            <div class="panel-body">
                <?php if(isset($result) && $result!=null):
                    $form ='Administrative_affairs/vacations_settings_edit/'.$result['id'];
                   $title= $result['title'];
                   $days_num= $result['days_num'];
                  $button = 'edit';
               else:
                   $form ='Administrative_affairs/vacations_settings/';
                   $title='';
                   $days_num='';
                   $button = 'add';
                endif?>

                <div class="details-resorce">
                    <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data r-inner-details">
                            <?php echo form_open_multipart($form)?>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                                <div class="col-xs-12" >
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> الإسم </h4>
                                    </div>
                                    <div class="col-xs-6 r-input" >
                                        <input type="text"   id="title" name="title"   value="<?php echo $title;?>"  data-validation="required" >
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12" >
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> عدد الأيام </h4>
                                    </div>
                                    <div class="col-xs-6 r-input" >
                                        <input type="number"   onkeypress="validate_number(event)" id="days_num" name="days_num"   value="<?php echo $days_num;?>"  data-validation="required" >
                                    </div>
                                </div>
                            </div>
                                <div class="col-sm-12 padd">
                                    <button type="submit" name="<?php echo $button;?>" value="<?php echo $button;?>" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                                </div>
                            </div>
                    <?php echo form_close()?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php if(isset($records)&&$records!=null):?>
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="col-md-12 fadeInUp wow">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>أجازات الموظفين</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="fade in active">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>م</th>
                                <th class="text-center">الإسم</th>
                                <th class="text-center">عدد الايام</th>
                                <th  class="text-center">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php if(isset($records)&&$records!=null):?>
                                <?php
                                $a=1;
                                foreach ($records as $record ){?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <td><?php echo$record->title; ?></td>
                                        <td><?php echo $record->days_num ?></td>
                                        <td>
                                            <a href="<?php echo base_url('Administrative_affairs/vacations_settings_edit').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                            <a onclick="$('#adele').attr('href', '<?=base_url()."Administrative_affairs/delete_vacations_settings/".$record->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                                        </td>

                                    </tr>
                                    <?php
                                    $a++;
                                }  ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php  endif;  ?>

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
                <a id="adele" href=""> <button type="button" name="save" value="save" class="btn btn-danger remove" >نعم</button></a>
            </div>
        </div>
    </div>
</div>

