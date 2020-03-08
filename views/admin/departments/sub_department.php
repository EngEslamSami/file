<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php $this->load->view('admin/administrative_affairs/main_tabs'); ?>
            <?php if(isset($results)):?>

            <?php echo form_open_multipart('dashboard/update_sub_department/'.$results['id'],array('class'=>"",'role'=>"form" ))?>

            <div class="details-resorce">

                <div class="col-xs-12 r-inner-details">
                    <div class="col-xs-12">
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <h4 class="r-h4"> الإدارة </h4>
                                </div>
                                <div class="col-xs-6 r-input">
                                    <select name="from_id_fk" id="from_id_fk" >
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
                        </div>
                        <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-xs-12">
                                <div class="col-sm-6">
                                    <h4 class="r-h4"> القسم </h4>
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

                    <?php echo form_open_multipart('dashboard/add_sub_department',array('class'=>"",'role'=>"form" ))?>

                    <div class="details-resorce">


                        <div class="col-xs-12 r-inner-details">
                            <div class="col-xs-12">
                                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                    <div class="col-xs-12">
                                        <div class="col-xs-6">
                                            <h4 class="r-h4"> الإدارة </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <select name="from_id_fk" id="from_id_fk" >
                                                <option value="">إختر</option>
                                                <?php if(!empty($records)):
                                                    foreach ($records as $record):?>
                                                        <option value="<? echo $record->id;?>"><? echo $record->name;?></option>
                                                    <?php  endforeach; endif;?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                                    <div class="col-xs-12">
                                        <div class="col-sm-6">
                                            <h4 class="r-h4"> القسم </h4>
                                        </div>
                                        <div class="col-xs-6 r-input">
                                            <input type="text" class="r-inner-h4 " name="name" required/>
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
                                            <th class="text-center"> القسم </th>
                                            <th class="text-center"> الاجراء </th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        <?php if(isset($records)&&$records!=null):?>

                                        <?php
                                        $a=1;
                                        foreach ($records as $record ): ?>
                                        <tr>
                                            <td rowspan="<?php echo sizeof($record->sub_departments)?>"><?php echo $a++ ?></td>
                                            <td rowspan="<?php echo sizeof($record->sub_departments)?>"><?php echo $record->name; ;?></td>
                                            <?php if(!empty($record->sub_departments)): foreach($record->sub_departments as  $sub): ?>
                                            <td> <?php echo $sub->name; ?> </td>
                                            <td data-title="التحكم" class="text-center">
                                                <a href="<?php  echo base_url().'dashboard/update_sub_department/'.$sub->id?>" class="btn btn-warning btn-xs "><i class="fa fa-pencil"></i> تعديل</a>
                                                <a  href="<?php  echo base_url().'dashboard/delete_sub_department/'.$sub->id."/advertising/addadver"?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف</a>
                                            </td>
                                        </tr>
                                        <?php     endforeach; else: ?>
                                                <td> لايوجد أقسام </td>
                                                 <td>لا يوجد الحذف والتعديل</td>
                                                </tr>
                                            <?php endif;?>
                                        <?php
                                        $a++;
                                        endforeach;  ?>
                                        <?php endif; ?>

                                                       <!---->


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