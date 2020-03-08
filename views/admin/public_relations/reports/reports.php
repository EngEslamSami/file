
<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
    </span>
    <?php if(isset($result)):?>
        <!-- <form class="form-horizontal">-->
        <?php echo form_open_multipart('public_relation/updatereports/'.$result['id'])?>

        <div class="col-xs-12">



            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> تاريخ التقرير:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <input type="text" class="r-inner-h4 date_melady" value="<?php echo date('Y-m-d',$result['date']) ?>" name="date" data-validation="required" />
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> عنوان التقرير:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <input type="text" class="r-inner-h4" value="<?php echo $result['title'] ?>" name="title" data-validation="required" />
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> صورة التقرير:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <input type="file" class="r-inner-h4"  name="img"  >
                        <img src="<?php echo base_url('uploads/thumbs/'.$result['img'])?>" alt="الصورة " class="img-rounded" width="50px" height="50px">
                    </div>
                </div>

            </div>

            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">


                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> تفاصيل التقرير:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <textarea  class="r-inner-h4" style="height: 80px" name="details" data-validation="required" ><?php echo $result['details'] ?></textarea>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> ملف مرفق:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <input type="file" class="r-inner-h4"  name="file" >
                    </div>
                    <div class="col-xs-6 r-input">
                        <?php

                        $name ='';
                        if($result['file'] == "null"){
                            $name ='no file found ';

                        }elseif($result['file'] != "null"){

                            $name = $result['file'];

                        }
                        if($result['file'] == "null"){
                            echo $name;
                        }else{?>
                            <a href="<?php echo base_url().'public_relation/download/'.$result['file']?>" class="btn btn-sm btn-info col-lg-11"><i class="fa fa-cloud-download"></i> تحميل الملف </a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>


            <div class="col-xs-12 r-inner-btn">
                <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                    <input type="submit" name="update_report" value="تعديل" class="btn btn-primary" >
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
            </div>

        </div>

        <?php echo form_close()?>
    <?php else: ?>
        <?php echo form_open_multipart('public_relation/addreports')?>


        <div class="col-xs-12">
            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> تاريخ التقرير:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <input type="text" class="r-inner-h4 date_melady"  name="date" data-validation="required" />
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> عنوان التقرير:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <input type="text" class="r-inner-h4"  name="title" data-validation="required" />
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> صورة التقرير:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <input type="file" class="r-inner-h4"  name="img" data-validation="required" />
                    </div>
                </div>

            </div>

            <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">


                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> تفاصيل التقرير:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <textarea  class="r-inner-h4" style="height: 80px" name="details" data-validation="required" ></textarea>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="col-xs-6">
                        <h4 class="r-h4"> ملف مرفق:  </h4>
                    </div>
                    <div class="col-xs-6 r-input">
                        <input type="file" class="r-inner-h4"  name="file" >
                    </div>

                </div>
            </div>
            <div class="col-xs-12 r-inner-btn">
                <div class="col-md-5 col-sm-3 col-xs-6 inner-details-btn"></div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                    <input type="submit"  name="add_report" value="حفظ" class="btn btn-primary" >
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
            </div>
        </div>

        <!-- </form>-->
        <?php echo form_close()?>
    <?php endif?>
</div>
</div>
</div>
<div class="col-md-11  col-sm-11 col-xs-11 inner-side r-data">
    <?php if(isset($records)&&$records!=null):?>
        <div class="col-xs-12">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>

                    <th width="2%">#</th>

                    <th  class="text-center">عنوان التقرير</th>
                    <th  class="text-center">الملف</th>

                    <th width="20%" class="text-center">التحكم</th>

                    <th class="text-center">حالة التقرير</th>

                </tr>
                </thead>
                <tbody>
                <?php $x = 0; ?>
                <?php foreach($records as $record):?>
                    <?php
                    $x++;
                    if($record->suspend == 1)
                    {
                        $class = 'success';
                        $title = 'نشط';
                    }
                    else
                    {
                        $class = 'danger';
                        $title = 'غير نشط';
                    }

                    ?>
                    <tr>
                        <td data-title="#" class="text-center"><span class="badge"><?php echo $x?></span></td>
                        <td data-title="" class="text-center"><?php echo $record->title?> </td>
                        <td class="text-center">
                            <?php $name ='';if($record->file == "null"){$name ='no file found ';}elseif($record->file != "null"){$name = $record->file;}?>
                            <?php if($record->file == "null"){echo $name;}else{?>
                                <a href="<?php echo base_url().'public_relation/download/'.$record->file?>" class="btn btn-sm btn-info col-lg-11"><i class="fa fa-cloud-download"></i> تحميل الملف </a>
                                <?php } ?>
                        </td>
                        <td data-title="التحكم" class="text-center">
                            <a href="<?php echo base_url().'public_relation/updatereports/'.$record->id?>">
                                <i class="fa fa-pencil " aria-hidden="true"></i></a>
                            <a href="<?php echo base_url().'public_relation/deletereports/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                        </td>
                        <td data-title="" class="text-center">

                            <a href="<?php echo base_url().'public_relation/suspendreports/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-6"><?php echo $title ?> </a>

                        </td>
                    </tr>
                <?php endforeach ;?>
                </tbody>
            </table>
        </div>
    <?php endif;?>
</div>