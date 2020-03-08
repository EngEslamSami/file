<div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php //echo $title?> </h3>
        </div>
        <div class="panel-body">
            <!-- open panel-body-->
                    <div class="col-xs-12">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">    تحديد جهة / معاملة </h4>
                                </div>
                                <div class="col-xs-6 ">
                                    <form class="r-block">
                                        <?php if(isset($results)):?>
                                            <?php if($results['type_id_fk']==2): ?>
                                                <input type="radio" class="r-radio"  name="" id="r-style" checked="" /> معاملة
                                            <?php else: ?>
                                                <input type="radio" class="r-radio" name=""  id="r-geha" checked="" /> جهة
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <input type="radio" class="r-radio" name="gender"  id="r-geha" checked /> جهة
                                            <input type="radio" class="r-radio"  name="gender" id="r-style" /> معاملة
                                        <?php endif; ?>


                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        </div>
                    </div>
            <?php if(isset($results)):?>
                <div class="col-xs-12">
                <?php if($results['type_id_fk']==2): ?>
                    <?php echo form_open_multipart('admin/Secretary/update_secretary_part/'.$results['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

                        <div class="col-md-6  col-sm-6 col-xs-12 inner-side r-data">
                        <div class="col-xs-12 r-geha">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> اسم المعاملة    </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text" class="r-inner-h4 " width="100px" value="<?php echo $results['name'] ?> " name="name">
                            </div>
                            <div class="col-xs-12 r-input">
                                <input type="submit" class="btn btn-blue btn-next"  name="update_part" value="حفظ و إستمرار" />
                            </div>
                        </div>
                        </div>

                    <?php echo form_close()?>

                <?php else: ?>
                    <?php echo form_open_multipart('admin/Secretary/update_secretary_part/'.$results['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                <div class="col-xs-12 r-geha">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> اسم الجهة    </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 " value=" <?php echo $results['name'] ?>" name="name">
                                    </div>
                                </div>
                                <div class="col-xs-12 r-geha">
                                    <div class="col-xs-6">
                                        <h4 class="r-h4"> العنوان  </h4>
                                    </div>
                                    <div class="col-xs-6 r-input">
                                        <input type="text" class="r-inner-h4 "  value=" <?php echo $results['address'] ?>" name="address" >
                                    </div>
                                </div>
                        </div>

                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4">   الجوال  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="text" class="r-inner-h4 "  value=" <?php echo $results['mob'] ?>" name="mob" >
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الايميل  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="email" class="r-inner-h4 " value=" <?php echo $results['email'] ?>" name="email" >
                                </div>

                            </div>
                            <div class="col-xs-12 ">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الفاكس  </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <input type="number" class="r-inner-h4 " name="fax" data-validation="required">
                                </div>
                            </div>
                            <div class="col-xs-12 ">
                            <div class="col-xs-7 r-input">
                                <input type="submit" class="btn btn-blue btn-next"  name="update" value="حفظ و إستمرار" />
                            </div>
                            </div>

                        </div>
                    <?php echo form_close()?>

                <?php endif; ?>

                </div>
            <?php else: ?>
            <div class="col-xs-12 r-style">
                <?php echo form_open('admin/Secretary/secretary_part',array('class'=>"",'role'=>"form" ))?>
                <div class="col-md-6  col-sm-12 col-xs-12 ">

                        <div class="col-xs-12 ">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> اسم المعاملة    </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text" class="r-inner-h4 " name="name" data-validation="required">
                            </div>
                            <div class="col-xs-4 r-input">
                                <input type="submit" class="btn btn-blue btn-next"  name="submit" value="حفظ و إستمرار" />
                            </div>
                        </div>

                </div>
                <?php echo form_close()?>
            </div>

            <div class="col-xs-12 r-geha">
                <?php echo form_open('admin/Secretary/secretary_part',array('class'=>"",'role'=>"form" ))?>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12 ">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> اسم الجهة    </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 "  name="name" data-validation="required">
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> العنوان  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " name="address" data-validation="required">
                        </div>

                    </div>

                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12 ">
                        <div class="col-xs-6">
                            <h4 class="r-h4">   الجوال  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="number" class="r-inner-h4 " name="mob" data-validation="required">
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6">
                            <h4 class="r-h4">   الفاكس  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="number" class="r-inner-h4 " name="fax" data-validation="required">
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> الايميل  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="email" class="r-inner-h4 " name="email" data-validation="required">
                        </div>
                    </div>
                    <div class="col-xs-12 ">
                        <div class="col-xs-4 r-input">
                            <input type="submit" class="btn btn-blue btn-next"  name="add" value="حفظ " />
                        </div>
                    </div>
                </div>
                <?php echo form_close()?>

            </div>
            <?php endif; ?>


            <?php if(isset($records)&&$records!=null):?>
            <div class="col-xs-12 r-inner-details table-geha">


                <table id="" class="example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                            <th> م </th>
                            <th> اسم الجهة </th>
                            <th> الجوال </th>
                            <th> العنوان</th>
                            <th> الاصدار </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach ($records as $record): ?>

                            <tr>
                                <td> <?php echo $x; ?> </td>
                                <td>  <?php echo $record->name  ?> </td>
                                <td>  <?php echo $record->mob  ?> </td>
                                <td>  <?php echo $record->address  ?> </td>
                                <td> <a href="<?php echo base_url('admin/Secretary/delete_secretary_part').'/'.$record->id ?>"  onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                        <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span> <a href="<?php echo base_url('admin/Secretary/update_secretary_part').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                            </tr>
                            <?php
                            $x++;
                        endforeach; ?>
                    </tbody>
                    </table>

            </div>
            <?php endif; ?>

            <?php if(isset($parts)&&$parts!=null):?>
            <div class="col-xs-12 r-inner-details table-style">
                <table id="" class="example table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th> م </th>
                        <th> اسم المعاملة </th>
                        <th> الاصدار </th>
                    </tr>
                    </thead>
                <tbody>
                    <?php
                    $x=1;

                    foreach ($parts as $record): ?>

                        <tr>
                            <td> <?php echo $x; ?> </td>
                            <td> <?php echo $record->name  ?> </td>
                            <td> <a href="<?php echo base_url('admin/Secretary/delete_secretary_part').'/'.$record->id ?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span> /
                                    </span> <a href="<?php echo base_url('admin/Secretary/update_secretary_part').'/'.$record->id ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                        </tr>
                        <?php
                        $x++;
                    endforeach; ?>
                </tbody>
                </table>



            </div>
            <?php endif; ?>


        </div>
    </div>
</div>