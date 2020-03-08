<div class="col-xs-12" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php //echo $title?> </h3>
            </div>
            <div class="panel-body">

            <!---form------>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);

?>

    </span>

            <?php if(isset($results)):?>

            <?php echo form_open_multipart('all_Finance_resource/Program_setting/update_account_settings/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

            <div class="details-resorce">

                <div class="col-xs-12 r-inner-details">
                           <div class="col-xs-12 r-inner-details">
                            <div class="col-xs-12">
                                <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                                    <div class="col-xs-12">
                                        <div class="col-sm-4">
                                            <h4 class="r-h4"> حسابات البرامج </h4>
                                        </div>
                                        <div class="col-sm-8 r-input">
                                            <input type="text" class="r-inner-h4 " name="title"  value="<?php echo $results['title'] ?>" placeholder=" حسابات البرامج" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                    

                    <div class="col-xs-4 " style="margin-right: 400px">
                        <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ" />
                    </div>

                </div>

</div>
                <?php else: ?>

                    <?php echo form_open_multipart('all_Finance_resource/Program_setting/add_account_settings',array('class'=>"",'role'=>"form" ))?>

                    <div class="details-resorce">


                        <div class="col-xs-12 r-inner-details">
                            <div class="col-xs-12">
                                <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">
                                    <div class="col-xs-12">
                                        <div class="col-sm-4">
                                            <h4 class="r-h4">  حسابات البرامج </h4>
                                        </div>
                                        <div class="col-sm-8 r-input">
                                            <input type="text" class="r-inner-h4 " name="title" placeholder=" حسابات البرامج " data-validation="required" value=""/>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-4 " style="margin-right: 400px">
                                <input type="submit" class="btn btn-blue btn-next"  name="save" value="حفظ" />
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
                                            <th class="text-center"> أسماء حساب الأشتراك </th>
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
                                                    <td>  <?php echo $record->title; ?> </td>
                                                    <td><a href="<?php echo base_url().'all_Finance_resource/Program_setting/delete_account_settings/'.$record->id?>"><i class="fa fa-trash button" aria-hidden="true"></i></a>/<a href="<?php echo base_url().'all_Finance_resource/Program_setting/update_account_settings/'.$record->id?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>

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
