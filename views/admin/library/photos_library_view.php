
<div class="col-xs-12 " >

    <?php
    if(isset($get_images) && $get_images!=null){
        $form = form_open_multipart("admin/library/Photos_library/Update/".$get_images["id"]);
    } else{
        $form =form_open_multipart("admin/library/Photos_library/photos");
    }
    ?>
    <?php echo  $form;
?>
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> مكتبة الصور</h3>
        </div>
        <div class="panel-body">
            <div class="form-group col-md-5  col-sm-6 padding-4">
                <label class=""> عنوان الألبوم</label>
                <input type="text" name="title" id="title"
                       class="form-control "
                       data-validation="required"
                       value="<?php if(isset($get_images)){ echo $get_images["title"];} ?>">

            </div>
            <div class="form-group col-md-5  col-sm-6 padding-4">
                <label class=""> تاريخ الانشاء</label>
                <input type="date" name="date" id="date"
                       class="form-control "
                       data-validation="required"
                       value="<?php if(isset($get_images)){ echo $get_images["date"];} ?>" >

            </div>
            <div class="form-group col-md-5  col-sm-6 padding-4">
                <label class="">صورة الألبوم</label>
                <input type="file" name="image" id="image"
                       class="form-control"

                     >

            </div>

            <div class="col-md-12">
                <input type="hidden" id="count_row" value="0" />
                <button type="button" class="btn btn-success btn-next add_attchments"
                        onclick="add_row_member()"

                > اضافة ألبوم صور   <i class="fa fa-plus" aria-hidden="true"></i></button><br><br>

                <?php if(isset($result) && $result != null){ ?>
                    <table class="table table-bordered"   id="mytable">
                        <thead >
                        <tr class="success">
                            <th>م</th>

                            <th style="text-align: center">الصورة </th>

                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <?php if(isset($result) && !empty($result)){ ?>
                        <tbody  id="result_Table">
                        <?php

                        $y=1;

                        foreach ($result as $row){

                            ?>
                            <tr>
                                <td><?= $y++?></td>

                                <td>
                                    <img src="<?=base_url()."uploads/images/".$row->img?>" width="100px" height="100px">


                                </td>

                                <td>
                                    <input type="hidden" class="attached_files" value="<?=$row->id?>" >

                                    <a href="<?php echo base_url().'admin/library/Photos_library/'.$row->img ?>" download>
                                        <i class="fa fa-download" title="تحميل"></i> </a>
                                    <a  data-toggle="modal" data-target="#myModal-view-<?=$row->id?>" >
                                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                                    <a id="delete_img" href="<?php echo base_url().'admin/library/Photos_library/DeletePhoto/'.$row->id."/".$row->library_id_fk?>" >
                                        <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                                </td>


                            </tr>
                            <!-- photo modal-->
                            <div class="modal fade" id="myModal-view-<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                        </div>
                                        <div class="modal-body">
                                            <img src="<?=base_url()."uploads/images/".$row->img?>" width="100%">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- photo modal-->


                        <?php }
                        }  ?>
                        </tbody>

                    </table> <?php } else if (isset($result) && empty($result)) {
                    ?>
                    <table class="table table-bordered" id="mytable">
                        <thead>
                        <tr class="success">
                            <th>م</th>

                            <th style="text-align: center">الصورة </th>

                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="result_Table">
                        <tr id="first_one">
                            <td colspan="3" style="text-align: center;color: red"> لا يوجد صور  </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php
                }
                ?>

                <table class="table table-bordered"   id="mytable"  style="display: none">
                    <thead >
                    <tr class="success">
                        <th>م</th>

                        <th style="text-align: center">الصورة </th>

                        <th style="text-align: center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody id="result_Table">



                    </tbody>
                </table>


            </div>

            <div class="col-xs-12">
                <input  type="submit" id="button" name="ADD"  value="حفظ ">

            </div>
            <?php
            echo  form_close();
            ?>



        </div>

    </div>

</div>
<?php
if (isset($images) && !empty($images)){
$x = 1;
?>
<div class="col-xs-12">


        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> مكتبة الصور</h3>
            </div>
            <div class="panel-body">

                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>م</th>

                        <th>عنوان الألبوم</th>
                        <th>تاريخ الانشاء</th>
                        <th>صورة الألبوم</th>
                        <th>الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($images as $img){
                    ?>
                    <tr>
                        <td><?= $x++?></td>
                        <td><?= $img->title?></td>
                        <td><?= $img->date?></td>
                        <td>
                            <img src="<?=base_url()."uploads/images/".$img->img?>" width="50px" height="50px">
                        </td>
                        <td>
                            <a href="<?=base_url()."admin/library/Photos_library/Delete/".$img->id?>"  onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                            <a href="<?=base_url()."admin/library/Photos_library/Update/".$img->id?>" title="تعديل" >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        </td>

                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>


                </table>
                <?php
//
//

                }
                ?>


            </div>


        </div>


</div>



<script>
    function add_row_member(){
        $("#mytable").show();
        $("#first_one").remove();
        //  alert('show');

        var x = document.getElementById('result_Table');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/library/Photos_library/get_library_photo',
            data:dataString,
            dataType: 'html',

            cache:false,
            success: function(html){

                $("#result_Table").append(html);

            }
        });
    }


</script>
