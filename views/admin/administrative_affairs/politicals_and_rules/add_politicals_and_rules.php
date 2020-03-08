

<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <?php if(isset($result)):
                $id = $result['id'];
                $validation ='';
                $aria='';
            else:
                $id = 0;
                $validation ='required';
                $aria='true';
            endif; ?>
            <?php         echo form_open_multipart('Administrative_affairs/add_politicals_and_rules/'.$id.'')?>
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> تاريخ اليوم: </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="date" name="date_ar" class="form-control" value="<?php if(isset($result['date_ar'])){echo $result['date_ar'];}?>" data-validation="<?php echo $validation;?>">
                        </div>
                    </div>

                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> رقم التعيم: </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="number" name="number" class="form-control" value="<?php if(isset($result['number'])){echo $result['number'];}?>" data-validation="<?php echo $validation;?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">ملف مرفق: </h4>
                        </div>
                        <div class="col-xs-5 r-input">
                            <input type="file" data-validation="<?php echo $validation;?>"  name="file" >
                        </div>
                        <?php if(isset($result['file'])):?>
                        <a href="<?php echo base_url() . 'Administrative_affairs/read_file/'.$result['file'] ?>" class="btn btn-info btn-xs "><i class="fa fa-eye" aria-hidden="true"></i> </a>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">التفاصيل: </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <textarea name="details"  data-validation="<?php echo $validation;?>" class="form-control" cols="30" rows="10"><?php if(isset($result['details'])){echo $result['details'];}?></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 r-inner-btn">
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                        <input type="submit" role="button"  name="add" value="حفظ" class="btn pull-right" />
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                </div>
            </div>
            <?php echo form_close()?>
                <div class="col-xs-12">
                    <?php if (!empty($records)): ?>
                        <table id="" class="table table-bordered" role="table">
                            <thead>
                            <tr>
                                <th>مسلسل</th>
                                <th>تاريخ اليوم</th>
                                <th>رقم التعميم</th>
                                <th>الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x = 0;
                            foreach ($records as $record) {
                                $x++; ?>
                                <tr>
                                <td><?php echo $x ?></td>
                                <td><?php echo $record->date_ar; ?> </td>
                                <td><?php echo $record->number; ?> </td>
                                 <td>
                                     <a href="<?php echo base_url() . 'Administrative_affairs/add_politicals_and_rules/' . $record->id ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                     <a href="<?php echo base_url() . 'Administrative_affairs/delete_politicals_and_rules/' . $record->id ?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                                     <a href="<?php echo base_url() . 'Administrative_affairs/downloads/'.$record->file ?>" class="btn btn-warning btn-xs "><i class="fa fa-download" aria-hidden="true"></i> </a>
                                     <a href="<?php echo base_url() . 'Administrative_affairs/read_file/'.$record->file ?>" class="btn btn-info btn-xs "><i class="fa fa-eye" aria-hidden="true"></i> </a>
                                 </td>

                            <?php } ?>

                            </tbody>
                        </table>

                    <?php endif; ?>

                </div>
            <!-- close panel-body-->
        </div>
    </div>
</div>





