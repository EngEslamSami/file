<div class=" col-xs-11">

    <?php // $this->load->view('admin/finance_resource/main_tabs'); ?>


    <div class="col-xs-12 r-inner-details">

        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#order" aria-controls="order" role="tab" data-toggle="tab">طلبات  الوادة</a></li>
            <li role="presentation"><a href="#accept" aria-controls="accept" role="tab" data-toggle="tab">طلبات  الموافق عليها</a></li>
            <li role="presentation"><a href="#refuse" aria-controls="refuse" role="tab" data-toggle="tab">طلبات  المرفوضة</a></li>
        </ul>

        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="order">
                <?php if(isset($all_records) && $all_records!=null):?>

        <!-------------------------------------------------------------------------------------------------------------------------->
        <div class="panel-body">
            <a href="<?php echo base_url()?>finance_resource/donors/"><div class="r-add pull-right">
<!--                    <img src="<?php /*echo base_url()*/?>asisst/admin_asset/img/add-file.png" alt="" title=" اضافة فئة " class="button">
-->                </div>
            </a>

            <div class="fade in active" id="optionearead">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">رقم المتبرع</th>
                        <th class="text-center">إسم المتبرع</th>
                        <th class="text-center">فرد - مؤسسة </th>
                        <!--                            <th class="text-center">طريقة الدفع</th>
                        -->                            <th class="text-center">رقم الجوال</th>
                        <!--                            <th class="text-center">صفة المتبرع</th>
                        -->                            <th class="text-center">عرض</th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">

                    <?php
                    $x=0;
                    foreach ($all_records as $record):
                        $donor_type =array('','فرد','مؤسسة');
                        $pay = array('إختر','نقدي','شيك','تحويل','استقطاع','شبكه');
                        $x++;?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <td><?php echo $record->id;?></td>
                            <td><?php echo $record->user_name;?></td>
                            <td><?php echo $donor_type[$record->donor_type];?></td>
                            <!--                            <td><?php /*echo $pay[$record->pay_method_id_fk];*/?></td>
-->                            <td><?php echo $record->guaranty_mob;?></td>
                            <!--                            <td><?php /*echo $record->character_person;*/?></td>
-->                              <td><a href="<?php echo base_url().'Finance_resource/edit_donors_guaranty/'.$record->id.'/view'?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                            <td data-title="التحكم" class="text-center">

                                <a href="<?php echo base_url().'Finance_resource/approve/'.$record->id?>" class="btn btn- btn-xs col-lg-5"><i class="fa fa-pencil"></i> قبول</a>

                                <a  href="<?php echo base_url().'Finance_resource/refuse/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الرفض ؟');" class="btn btn- btn-xs   col-lg-5"><i class="fa fa-trash"></i> رفض</a>

                            </td>                                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>

        </div>
                <?php endif;?>

            </div>
            <div role="tabpanel" class="tab-pane" id="accept">
                <?php if(isset($approve) && $approve!=null):?>

                <div class="panel-body">
                    <a href="<?php echo base_url()?>finance_resource/donors/"><div class="r-add pull-right">
<!--                            <img src="<?php /*echo base_url()*/?>asisst/admin_asset/img/add-file.png" alt="" title=" اضافة فئة " class="button">
-->                        </div>
                    </a>

                    <div class="fade in active" id="optionearead">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="text-center">م</th>
                                <th class="text-center">رقم المتبرع</th>
                                <th class="text-center">إسم المتبرع</th>
                                <th class="text-center">فرد - مؤسسة</th>
                                <!--                            <th class="text-center">طريقة الدفع</th>
                                -->                            <th class="text-center">رقم الجوال</th>
                                <!--                            <th class="text-center">صفة المتبرع</th>
                                -->                            <th class="text-center">عرض</th>
                                <th class="text-center">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">

                            <?php
                            $x=0;
                            foreach ($approve as $record):
                                $donor_type =array('','فرد','مؤسسة');
                                $pay = array('إختر','نقدي','شيك','تحويل','استقطاع','شبكه');
                                $x++;?>
                                <tr>
                                    <td><?php echo $x;?></td>
                                    <td><?php echo $record->id;?></td>
                                    <td><?php echo $record->user_name;?></td>
                                    <td><?php echo $donor_type[$record->donor_type];?></td>
                                    <!--                            <td><?php /*echo $pay[$record->pay_method_id_fk];*/?></td>
-->                            <td><?php echo $record->guaranty_mob;?></td>
                                    <!--                            <td><?php /*echo $record->character_person;*/?></td>
-->                              <td><a href="<?php echo base_url().'Finance_resource/edit_donors_guaranty/'.$record->id.'/view'?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                                    <td data-title="التحكم" class="text-center">

                                        <a href="<?php echo base_url().'Finance_resource/approve/'.$record->id?>" class="btn btn- btn-xs col-lg-5"><i class="fa fa-pencil"></i> قبول</a>

                                        <a  href="<?php echo base_url().'Finance_resource/refuse/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الرفض ؟');" class="btn btn- btn-xs   col-lg-5"><i class="fa fa-trash"></i> رفض</a>

                                    </td>                                    </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <?php endif;?>


</div>

            <div role="tabpanel" class="tab-pane" id="refuse">
                <?php if(isset($refuse) && $refuse!=null):?>

                <div class="panel-body">
                    <a href="<?php echo base_url()?>finance_resource/donors/"><div class="r-add pull-right">
                            <!--<img src="<?php /*echo base_url()*/?>asisst/admin_asset/img/add-file.png" alt="" title=" اضافة فئة " class="button">-->
                        </div>
                    </a>

                    <div class="fade in active" id="optionearead">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="text-center">م</th>
                                <th class="text-center">رقم المتبرع</th>
                                <th class="text-center">إسم المتبرع</th>
                                <th class="text-center">فرد - مؤسسة</th>
                                <!--                            <th class="text-center">طريقة الدفع</th>
                                -->                            <th class="text-center">رقم الجوال</th>
                                <!--                            <th class="text-center">صفة المتبرع</th>
                                -->                            <th class="text-center">عرض</th>
                                <th class="text-center">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">

                            <?php
                            $x=0;
                            foreach ($refuse as $record):
                                $donor_type =array('','فرد','مؤسسة');
                                $pay = array('إختر','نقدي','شيك','تحويل','استقطاع','شبكه');
                                $x++;?>
                                <tr>
                                    <td><?php echo $x;?></td>
                                    <td><?php echo $record->id;?></td>
                                    <td><?php echo $record->user_name;?></td>
                                    <td><?php echo $donor_type[$record->donor_type];?></td>
                                    <!--                            <td><?php /*echo $pay[$record->pay_method_id_fk];*/?></td>
-->                            <td><?php echo $record->guaranty_mob;?></td>
                                    <!--                            <td><?php /*echo $record->character_person;*/?></td>
-->                              <td><a href="<?php echo base_url().'Finance_resource/edit_donors_guaranty/'.$record->id.'/view'?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
                                    <td data-title="التحكم" class="text-center">

                                        <a href="<?php echo base_url().'Finance_resource/approve/'.$record->id?>" class="btn btn- btn-xs col-lg-5"><i class="fa fa-pencil"></i> قبول</a>

                                        <a  href="<?php echo base_url().'Finance_resource/refuse/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الرفض ؟');" class="btn btn- btn-xs   col-lg-5"><i class="fa fa-trash"></i> رفض</a>

                                    </td>                                    </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <?php endif;?>


            </div>

            </div>
</div>



    </div>