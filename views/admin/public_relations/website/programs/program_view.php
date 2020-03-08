<?php
if(isset($get_program) && $get_program!=null){
    $disp = 'block';

    $form = form_open_multipart("public_relations/website/programs/Programs/Update/".$get_program->id);
} else{
    $disp = 'none';
    $form =form_open_multipart("public_relations/website/programs/Programs/add_program");
}
?>
<?php echo  $form;?>


<div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title">إضافة برامج الجمعية </h3>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 ">
                <div class="col-md-5 form-group padding-4">
                    <label class="">العنوان</label>
                    <input type="text" class="form-control" placeholder="العنوان " name="title" id="title"
                           value="<?php if(isset($get_program)){ echo $get_program->title;} ?>"  data-validation="required" >
                </div>

                <div class="col-md-5 form-group padding-4">
                    <label class="">صورة البرنامج الرئيسي للمتجر</label>
                    <input type="file" class="form-control"  name="img"
                    >
                </div>
            </div>

            <div class="col-xs-12">

                <div class="col-md-4 form-group padding-4">
                    <label class="">قيمة السهم</label>
                    <input type="number"  onkeyup="getSahmNumber();" class="form-control" placeholder="قيمة السهم " name="sahm_price" id="sahm_price"
                           value="<?php if(isset($get_program)){ echo $get_program->sahm_price;} ?>"   >
                </div>

                <div class="col-md-4 form-group padding-4">
                    <label class=""> الاجمالي المطلوب تحصيله</label>
                    <input type="number"   onkeyup="getSahmNumber();" class="form-control" placeholder="قيمة الاجمالي " name="total" id="total"
                           value="<?php if(isset($get_program)){ echo $get_program->total;} ?>"   >
                </div>
                <div class="col-md-4 form-group padding-4">
                    <label class="">   عدد الأسهم المطلوبة</label>
                    <input type="number" class="form-control" placeholder=" عدد الأسهم " name="sahm_amount" id="sahm_amount"
                           value="<?php if(isset($get_program)){ echo $get_program->sahm_amount;} ?>" readonly >
                </div>

            </div>



            <div class="col-xs-12">
                <label class=""> التفاصيل </label>
                <textarea class="form-control" name="details" id="editor">
                      <?php if(isset($get_program)){ echo $get_program->details;} ?></textarea>

            </div>

            <div class="form-group col-sm-12 col-xs-12">
                <input type="submit" name="ADD" class="btn btn-purple w-md m-b-5" value="حفظ">


            </div>




        </div>

    </div>

</div>
<?php
if (isset($programs) && !empty($programs)){
    $x = 1;
    ?>
    <div class="col-xs-12">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">  برامج الجمعية</h3>
            </div>
            <div class="panel-body">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>م</th>

                        <th> العنوان</th>
                        <th> قيمة السهم</th>
                        <th>الاجمالي المطلوب تحصيله</th>
                        <th>عدد الأسهم المطلوبة</th>
                        <th>صورة البرنامج الرئيسي للمتجر</th>
                        <th>التفاصيل</th>
                        <th>الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($programs as $program){
                        ?>
                        <tr>
                            <td><?= $x++?></td>
                            <td><?= $program->title?></td>
                            <td><?= $program->sahm_price?></td>
                            <td><?= $program->total?></td>
                            <td><?= $program->sahm_amount?></td>
                            <td>
                                <?php
                                if (isset($program->img) && $program->img!= null ){
                                    ?>
                                    <img src="<?= base_url()."uploads/images/".$program->img?>" width="50px" height="50px">
                                <?php
                                } else {
                                    echo "لا يوجد صورة";
                                }
                                ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#detailsModal<?= $program->id?>">التفاصيل</button>
                            </td>
                            <td>
                                <a href="<?=base_url()."public_relations/website/programs/Programs/Delete/".$program->id?>"  onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                    <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                                <a href="<?=base_url()."public_relations/website/programs/Programs/Update/".$program->id?>" title="تعديل" >
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>


                </table>
            </div>
        </div>


    </div>

    <?php
}
?>

<!-- The Modal -->
<?php
if (isset($programs) && !empty($programs)){
    foreach ($programs as $row){
        ?>

<div class="modal" id="detailsModal<?= $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content" role="document">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><?= $row->title?> </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
               <h4>التفاصيل : </h4>
                <p><?= nl2br( $row->details)?></p>
            </div>



        </div>
    </div>
</div>

        <?php
    }
}
?>


<script>
    function getSahmNumber() {
        if ($('#sahm_price').val() > 0) {
            var sahm_price = parseInt($('#sahm_price').val());
        } else {
            var sahm_price = 0;
        }
        if ($('#total').val() > 0) {
            var total = parseInt($('#total').val());
        } else {
            var total = 0;
        }
        var all =  total / sahm_price ;
        $('#sahm_amount').val(all);
    }
</script>