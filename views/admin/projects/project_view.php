<style>
    .popup-news-sidebar {
        padding: 8px;
        background-color: #fff;
        box-shadow: 2px 2px 8px;
        min-height: 524px;
    }
    .popup-news-sidebar img{
        min-height: 170px;
    }

    p.time {
        padding: 10px 3px;
        background-color: #009e81;
        color: #fff;
        margin-top: 5px;
        padding-right: 8px;
    }
    p.views {
        padding: 10px 3px;
        background-color: #007b0f;
        color: #fff;
        margin-top: 5px;
        padding-right: 8px;
    }
    p.comments {
        padding: 10px 3px;
        background-color: #005f7b;
        color: #fff;
        margin-top: 5px;
        padding-right: 8px;
    }

    #popup-news-img {
        margin-bottom: 20px;
        border: 1px solid #999;
        box-shadow: 2px 2px 8px;
    }
    #popup-news-img .carousel-control {
        position: absolute;
        top: 44%;

        width: 30px;
        height: 30px;
        background-color: #999;
        font-size: 16px;

    }
    #popup-news-img .carousel-control span{
        margin-top: -13px;
        font-size: 23px;
    }

    .popup-news-title {
        text-align: center;
        background-color: #005f7b;
        padding: 8px 0;
        box-shadow: 2px 2px 8px #999;
    }
    .popup-news-title a{
        color: #fff;
        text-decoration: none;
    }

    .gradient{

        background: rgb(242,246,248); /* Old browsers */
        background: -moz-linear-gradient(top, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 50%, rgba(181,198,208,1) 51%, rgba(224,239,249,1) 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(top, rgba(242,246,248,1) 0%,rgba(216,225,231,1) 50%,rgba(181,198,208,1) 51%,rgba(224,239,249,1) 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to bottom, rgba(242,246,248,1) 0%,rgba(216,225,231,1) 50%,rgba(181,198,208,1) 51%,rgba(224,239,249,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f6f8', endColorstr='#e0eff9',GradientType=0 ); /* IE6-9 */
    }
    .inline-block{
        display: inline-block;
        width: 100%
    }
    p.details {
        line-height: 25px;
        font-size: 15px;
    }


    .modal.popup-news .modal-header .close {
        margin-top: -9px;
        background-color: #ff0000;
        opacity: 0.7;
        padding: 0px 5px;
        color: #fff;
        outline: none;
    }

    .modal.popup-news .modal-footer {
        padding: 3px 10px;
    }

</style>
<?php
if(isset($get_project) && $get_project!=null){
    $disp = 'block';

    $form = form_open_multipart("admin/projects/Project/Update/".$get_project->id);
} else{
    $disp = 'none';
    $form =form_open_multipart("admin/projects/Project/add_project");
}
?>
<?php echo  $form;?>

<div class="col-xs-12" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title">إضافة مشروعات الجمعية </h3>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 ">

                <div class="col-md-4 form-group padding-4">
                    <label class="">عنوان البرنامج</label>
                    <input type="text" class="form-control" placeholder="عنوان البرنامج" name="project_name" id="project_name"
                           value="<?php if(isset($get_project)){ echo $get_project->project_name;} ?>"  data-validation="required" >
                </div>
                <div class="col-md-4 form-group padding-4">
                    <label class="">نوع البرنامج</label>
                   <select class="form-control" name="project_type">
                       <option value="0">--اختر--</option>
                       <option value="1"
                           <?php
                       if (isset($get_project) && $get_project->project_type== 1){echo 'selected';}
                       ?>
                       >برامج الجمعية</option>
                       <option value="2" <?php
                       if (isset($get_project) && $get_project->project_type== 2){echo 'selected';}
                       ?>>برنامج طموح</option>
                       <option value="3" <?php
                       if (isset($get_project) && $get_project->project_type== 3){echo 'selected';}
                       ?>>برنامج الروضة</option>

                   </select>
                </div>
                <div class="col-md-4 form-group padding-4">
                    <label class="">الصورة الرئيسية للبرنامج</label>
                    <input type="file" class="form-control"  name="img"
                             >
                </div>
            </div>
            <div class="col-xs-12">
                <label class="">تفاصيل البرنامج</label>
                <textarea class="form-control" name="project_details" id="editor">
                      <?php if(isset($get_project)){ echo $get_project->project_details;} ?></textarea>

            </div>
            <div class="col-md-12">
                <input type="hidden" id="count_row" value="0" />
                <button type="button" class="btn btn-success btn-next add_attchments"
                        onclick="add_row()"

                >    اضافة عناصر البرنامج   <i class="fa fa-plus" aria-hidden="true"></i></button><br><br>

                <div class="col-md-6 "  id="show" style="display: <?= $disp?>">
                    <label >عرض في الموقع</label>
                    <input type="radio" name="approved" value="1" id="radio-one" class="form-radio"
                        <?php
                        if( isset($get_project) && $get_project->approved==1){ echo'checked';}
                        ?>
                    > <label for="radio-one">نعم </label>
                    <input type="radio" name="approved" value="0" id="radio-two" class="form-radio"
                        <?php
                        if( isset($get_project) && $get_project->approved==0){ echo'checked';}
                        ?>
                    > <label for="radio-two"> لا </label>
                </div>

                <?php if(isset($get_items) && $get_items != null){ ?>

                    <table class="table table-bordered"   id="details_table">
                        <thead >
                        <tr class="success">
                            <th>م</th>

                            <th style="text-align: center">اسم العنصر </th>
                            <th style="text-align: center">الوصف </th>
                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <?php if(isset($get_items) && !empty($get_items)){ ?>
                        <tbody  id="result">
                        <?php
                        $x=1;
                        foreach ($get_items as $d){ ?>
                            <tr>
                                <td><?= $x++?></td>

                                <td>

                                    <input type="hidden" class="attached_files" value="<?=$d->id?>" >
                                    <input type="text" class="form-control " placeholder=" " name="title[]" id="title"
                                           value="<?= $d->title?>">

                                </td>
                                <td>
                                    <input type="text" class="form-control " placeholder=" " name="details[]" id="details" value="<?= $d->details?>">

                                </td>

                                <td>
                                    <a href="<?php echo base_url().'admin/projects/Project/DeleteDetails/'.$d->id."/".$d->project_id_fk?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                        <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                                </td>



                            </tr>


                        <?php }
                        }  ?>
                        </tbody>

                    </table> <?php } else if (isset($get_items) && empty($get_items)) {
                    ?>
                    <table class="table table-bordered" id="details_table">
                        <thead>
                        <tr class="success">
                            <th>م</th>

                            <th style="text-align: center">اسم العنصر </th>
                            <th style="text-align: center">الوصف </th>
                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="result">
                        <tr id="no_details">
                            <td colspan="4" style="text-align: center;color: red"> لا يوجد عناصر  </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php
                }
                ?>



                <table class="table table-bordered"   id="details_table"  style="display: none">
                    <thead >
                    <tr class="success">
                        <th>م</th>

                        <th style="text-align: center">اسم العنصر </th>
                        <th style="text-align: center">الوصف </th>
                        <th style="text-align: center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody id="result">



                    </tbody>
                </table>

            </div>

            <div class="col-md-12">
                <input type="hidden" id="count_row" value="0" />
                <button type="button" class="btn btn-success btn-next add_attchments"
                        onclick="add_details()"

                >    اضافة المستفيدين   <i class="fa fa-plus" aria-hidden="true"></i></button><br><br>

                <?php if(isset($get_mostafed) && $get_mostafed != null){ ?>
                    <table class="table table-bordered"   id="mostafed_table">
                        <thead >
                        <tr class="success">
                            <th>م</th>

                            <th style="text-align: center">اسم المستفيد </th>
                            <th style="text-align: center">العدد </th>
                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <?php if(isset($get_mostafed) && !empty($get_mostafed)){ ?>
                        <tbody  id="result">
                        <?php
                        $x=1;
                        foreach ($get_mostafed as $m){ ?>
                            <tr>
                                <td><?= $x++?></td>

                                <td>

                                    <input type="hidden" class="attached_files" value="<?=$m->id?>" >
                                    <input type="text" class="form-control " placeholder=" " name="name[]" id="name"
                                           value="<?= $m->name?>">

                                </td>
                                <td>
                                    <input type="text" class="form-control " placeholder=" " name="number[]" id="number" value="<?= $m->number?>">

                                </td>

                                <td>
                                    <a href="<?php echo base_url().'admin/projects/Project/DeleteMostafed/'.$m->id."/".$m->project_id_fk?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                        <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                                </td>



                            </tr>


                        <?php }
                        }  ?>
                        </tbody>

                    </table> <?php } else if (isset($get_mostafed) && empty($get_mostafed)) {
                    ?>
                    <table class="table table-bordered" id="mostafed_table">
                        <thead>
                        <tr class="success">
                            <th>م</th>

                            <th style="text-align: center">اسم المستفيد </th>
                            <th style="text-align: center">العدد </th>
                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="result_mostafed">
                        <tr id="no_mostafed">
                            <td colspan="4" style="text-align: center;color: red"> لا يوجد مستفيدين  </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php
                }
                ?>



                <table class="table table-bordered"   id="mostafed_table"  style="display: none">
                    <thead >
                    <tr class="success">
                        <th>م</th>
                        <th style="text-align: center">اسم المستفيد </th>
                        <th style="text-align: center">العدد </th>
                        <th style="text-align: center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody id="result_mostafed">



                    </tbody>
                </table>

            </div>

            <div class="col-md-12">
                <input type="hidden" id="count_row" value="0" />
                <button type="button" class="btn btn-success btn-next add_attchments"
                        onclick="add_row_member()"

                > اضافة ألبوم صور   <i class="fa fa-plus" aria-hidden="true"></i></button><br><br>

                <?php if(isset($get_photos) && $get_photos != null){ ?>
                    <table class="table table-bordered"   id="mytable">
                        <thead >
                        <tr class="success">
                            <th>م</th>

                            <th style="text-align: center">الصورة </th>

                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <?php if(isset($get_photos) && !empty($get_photos)){ ?>
                        <tbody  id="result_Table">
                        <?php

                        $y=1;

                        foreach ($get_photos as $row){

                            ?>
                            <tr>
                                <td><?= $y++?></td>

                                <td>
                                    <img src="<?=base_url()."uploads/images/".$row->image?>" width="100px" height="100px">


                                </td>

                                <td>
                                    <input type="hidden" class="attached_files" value="<?=$row->id?>" >

                                    <a href="<?php echo base_url().'admin/library/Photos_library/downloads_new/'.$row->image ?>" download>
                                        <i class="fa fa-download" title="تحميل"></i> </a>
                                    <a  data-toggle="modal" data-target="#myModal-view-<?=$row->id?>" >
                                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                                    <a id="delete_img" href="<?php echo base_url().'admin/projects/Project/DeletePhoto/'.$row->id."/".$row->project_id_fk?>" >
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
                                            <img src="<?=base_url()."uploads/images/".$row->image?>" width="100%">
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

                    </table> <?php } else if (isset($get_photos) && empty($get_photos)) {
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
            <div class="col-md-12">
                <button type="button" class="btn btn-success btn-next add_attchments"
                        onclick="add_row_video()"

                >     ارفاق فيديو   <i class="fa fa-plus" aria-hidden="true"></i></button><br><br>

                <?php if(isset($get_videos) && $get_videos != null){ ?>
                    <table class="table table-bordered"   id="videotable">
                        <thead >
                        <tr class="success">
                            <th>م</th>
                            <th style="text-align: center">  لينك الفيديو</th>


                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <?php if(isset($get_videos) && !empty($get_videos)){ ?>
                        <tbody  id="result_video">
                        <?php
                        $i=1;
                        foreach ($get_videos as $video){
                            //$video_link = explode("?",$video->video_link);
                            ?>
                            <tr>
                                <td><?= $i++?></td>

                                <td>

                                    <input type="hidden" class="attached_files" value="<?=$video->id?>" >

                                  <iframe src="<?= "https://www.youtube.com/embed/".$video->video_link?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


                                </td>

                                <td>
                                    <a href="<?php echo base_url().'admin/projects/Project/DeleteVideo/'.$video->id."/".$video->project_id_fk?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                        <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                                </td>


                            </tr>
                        <?php }
                        }  ?>
                        </tbody>

                    </table> <?php } else if (isset($get_videos) && empty($get_videos)) {
                    ?>
                    <table class="table table-bordered" id="videotable">
                        <thead>
                        <tr class="success">
                            <th>م</th>

                            <th style="text-align: center">لينك الفيديو </th>

                            <th style="text-align: center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody id="result_video">
                        <tr id="empty">
                            <td colspan="5" style="text-align: center;color: red"> لا يوجد فيديوهات  </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php
                }
                ?>

                <table class="table table-bordered"   id="videotable"  style="display: none">
                    <thead >
                    <tr class="success">
                        <th>م</th>
                        <th style="text-align: center">لينك الفيديو </th>

                        <th style="text-align: center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody id="result_video">



                    </tbody>
                </table>

            </div>

            <div class="form-group col-sm-12 col-xs-12">
                <input type="submit" name="ADD" class="btn btn-purple w-md m-b-5" value="حفظ">


            </div>

        </div>
        </div>
</div>
<?php
if (isset($projects) && !empty($projects) ){
    $x = 1;
    ?>


<div class="col-xs-12">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">  مشروعات الجمعية</h3>
        </div>
        <div class="panel-body">
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                <thead>
                <tr>
                    <th>م</th>

                    <th>عنوان البرنامج</th>
                    <th>تفاصيل البرنامج</th>
                    <th> الصورة الرئيسية للبرنامج</th>
                    <th>عناصر البرنامج</th>
                    <th>الاجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($projects as $project){
                   // $project_details = word_limiter($project->project_details,20);
                    ?>
                    <tr>
                        <td><?= $x++?></td>
                        <td><?= $project->project_name?></td>
                        <td><?= word_limiter($project->project_details,20)?></td>
                        <td>
                            <?php
                            if (isset($project->img) && $project->img != null){
                                ?>
                                <img src="<?= base_url()."uploads/images/".$project->img?>" width="50px" height="50px">
                            <?php
                            }
                            ?>

                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#detailsModal<?= $project->id?>">التفاصيل</button>

                        </td>
                        <td>
                            <a href="<?=base_url()."admin/projects/Project/Delete/".$project->id?>"  onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                            <a href="<?=base_url()."admin/projects/Project/Update/".$project->id?>" title="تعديل" >
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
<!-- modal -->
<?php
if (isset($projects) && !empty($projects)){
    foreach ($projects as $item){
        ?>
<div class="popup-news modal fade" id="detailsModal<?= $item->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body inline-block gradient" style="">
                <div class="col-xs-12">
                    <h5 class="popup-news-title"><a href="#"><?= $item->project_name?></a></h5>
                    <hr>
                    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>م</th>
                            <th>اسم العنصر</th>
                            <th>الوصف</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($item->items) && !empty($item->items)){
                            $x= 1;
                        foreach ($item->items as $i){
                        ?>
                        <tr >
                            <td><?= $x++?></td>
                            <td><?= $i->title?></td>
                            <td><?= $i->details?></td>
                        </tr>
                            <?php
                            }
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
<?php
    }
}
?>

<!-- modal -->



<script>
    function add_row(){
        $("#details_table").show();
        $("#show").show();
        $("#no_details").remove();


        var x = document.getElementById('result');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;

            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>admin/projects/Project/get_project_details',
                data:dataString,
                dataType: 'html',

                cache:false,
                success: function(html){

                    $("#result").append(html);

                }
            });




    }
    //--------
    //-----------------------------------------------
</script>


<script>
    function add_details(){
        $("#mostafed_table").show();
        $("#no_mostafed").remove();


        var x = document.getElementById('result_mostafed');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;
       if (len <4){
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/projects/Project/get_mostafed',
            data:dataString,
            dataType: 'html',

            cache:false,
            success: function(html){

                $("#result_mostafed").append(html);

            }
        });

    }


    }
    //--------
    //-----------------------------------------------
</script>

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
            url: '<?php echo base_url() ?>admin/projects/Project/get_photos',
            data:dataString,
            dataType: 'html',

            cache:false,
            success: function(html){

                $("#result_Table").append(html);

            }
        });
    }


</script>

<script>
    function add_row_video(){
        $("#videotable").show();
        $("#empty").remove();

        var x = document.getElementById('result_video');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/projects/Project/get_videos',
            data:dataString,
            dataType: 'html',

            cache:false,
            success: function(html){

                $("#result_video").append(html);

            }
        });
    }


</script>
