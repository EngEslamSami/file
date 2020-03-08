<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
            <?php if(isset($results)):?>

            <?php echo form_open_multipart('dashboard/update_main_department/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

            <div class="details-resorce">

                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-6">
                                    <h4 class="r-h4"> عنوان الإدارة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 " name="name"
                                           value="<?php echo $results['name'];?>"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-4 " style="margin-right: 400px">
                        <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ" />
                    </div>

                </div>


                <?php else: ?>

                    <?php echo form_open_multipart('dashboard/add_main_department',array('class'=>"",'role'=>"form" ))?>

                    <div class="details-resorce">


                        <div class="col-xs-12 r-inner-details">
                            <div class="col-xs-12">
                                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                    <div class="col-xs-12">
                                        <div class="col-sm-6">
                                            <h4 class="r-h4"> عنوان الإدارة </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text" class="r-inner-h4 " name="name"
                                                  />
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-4 " style="margin-right: 400px">
                                <input type="submit" class="btn btn-blue btn-next"  name="add" value="حفظ" />
                            </div>

                        </div>

                        <?php echo form_close()?>

                    </div>
                    <!--end-form------>

                    <?php if(isset($records)&&$records!=null):?>
                        <div class="col-xs-12 r-secret-table">
                            <div class="panel-body">

                                <div class="fade in active">
                                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th class="text-center"> م </th>
                                            <th class="text-center"> الإدارة </th>
                                            <th class="text-center"> الاجراء </th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">

                                        <?php if(isset($records)&&$records!=null):?>

                                            <?php
                                            $a=1;
                                            foreach ($records as $record ): ?>
                                                <tr>
                                                    <td><?php echo $a ?> </td>
                                                    <td>  <?php echo $record->name; ?> </td>
                                                    <td>
                                                        <?php if($record->count>0):?>
                                                            <a href="#"> لا يمكن الحذف </a>
                                                    <?php else:?>
                                                        <a href="<?php echo base_url('dashboard/delete_main_department').'/'.$record->id ?>"> حذف </a><?php endif;?> <span>/</span> <a href="<?php echo base_url('dashboard/update_main_department').'/'.$record->id ?>"> تعديل </a> </td>
                                                </tr>
                                                <?php
                                                $a++;
                                            endforeach;  ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--end-table------>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>