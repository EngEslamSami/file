<div class="col-xs-12">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> اضافة نبذة مختصرة</h3>
        </div>
        <div class="panel-body">
            <?php
            if(isset($get_nabza) && $get_nabza!=null){
                $form = form_open_multipart("public_relations/website/nbza/Nbza/Update/".$get_nabza->id);
            } else{
                $form =form_open_multipart("public_relations/website/nbza/Nbza/add_nabza");
            }
            ?>
            <?php echo  $form;
            ?>
            <div class="col-md-12">
                <div class="col-md-5 form-group">
                    <label class="">العنوان</label>
                    <input type="text" name="title" id="title"
                           class="form-control"
                           data-validation="required"
                           value="<?php if(isset($get_nabza)){ echo $get_nabza->title;} ?>">
                </div>

                <div class="col-md-5 form-group">
                    <label class="">عنوان جانبي</label>
                    <input type="text" name="sub_title" id="sub_title"
                           class="form-control "
                           data-validation="required"
                           value="<?php if(isset($get_nabza)){ echo $get_nabza->sub_title;} ?>">
                </div>
            </div>
            <div class="col-md-12" >
                <label class="">التفاصيل</label>
                <textarea class="form-control" id="editor" name="details"><?php if(isset($get_nabza)){ echo $get_nabza->details;} ?></textarea>
            </div>

            <div class="col-xs-12 text-center">
                <button  type="submit"  id="button" name="ADD" value="ADD"  class="btn btn-success " style="font-size: 16px;width: 150px; ">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
            </div>
            <?php
            echo form_close();
            ?>


        </div>
    </div>

</div>



<div class="col-xs-12">
    <?php
    if (isset($nabza)&& !empty($nabza)){
        $x=1;
        ?>
        <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

            <div class="panel-heading">
                <h3 class="panel-title">  العضوية</h3>
            </div>
            <div class="panel-body">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="info">
                        <th>م</th>
                        <th>العنوان</th>
                        <th>عنوان جانبي</th>
                        <th>التفاصيل</th>


                        <th>الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($nabza as $row){
                        ?>
                        <tr>
                            <td><?= $x++?></td>
                            <td><?= $row->title?></td>
                            <td><?= $row->sub_title?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailsModal<?= $row->id?>">التفاصيل</button>

                            </td>
                            <td>
                                <a href="<?=base_url()."public_relations/website/nbza/Nbza/Delete/".$row->id?>"  onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                    <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                                <a href="<?=base_url()."public_relations/website/nbza/Nbza/Update/".$row->id?>">
                                    <i class="fa fa-pencil" aria-hidden="true" title="تعديل"></i> </a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<!-- Modal -->
<?php
if (isset($nabza)&& !empty($nabza)){
    foreach ($nabza as $item){
        ?>


        <div class="modal" id="detailsModal<?=$item->id?>">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"><?= $item->title?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <h5>التفاصيل : </h5>
                        <p>
                            <?php
                            echo nl2br($item->details);
                            ?>
                        </p>
                    </div>



                </div>
            </div>
        </div>
        <?php
    }
}
?>

<!-- Modal -->

