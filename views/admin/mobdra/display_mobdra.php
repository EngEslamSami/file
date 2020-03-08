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



<div class="col-xs-12">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> تقرير المبادرات</h3>
        </div>

        <div class="panel-body">

            <?php
            if(isset($display_publisher_data)&& $display_publisher_data != null ){
            $x = 1;
            $span ='';
            ?>
            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>م</th>
                    <th>تاريخ المبادرة</th>
                    <th>عنوان المبادرة</th>
                    <th>حالة المبادرة</th>
                    <th> عدد الكومنتات</th>
                    <th> عدد الزوار</th>
                    <th>تفاصيل المبادرة</th>
                    <th>الاجراء</th>
                </tr>
                </thead>
                <tbody>

                <?php

                foreach ($display_publisher_data as $row){

                    if(isset($row->n_status) && $row->n_status==1 ){
                        $span = "<span  class=\"label label-pill
                         \" style=\"
                         color:black ; background-color:#00ff00;font-size: 14px;  \">نشط
                      </span>";
                    }
                    elseif (isset($row->n_status) && $row->n_status==2){
                        $span = "<span  class=\"label label-pill
                         \" style=\"
                         color:black ; background-color:#ff0000;font-size: 14px;  \">غير نشط
                      </span>";
                    }
                    else{
                        $span = "غير محدد";
                    }

                    ?>
                    <tr>
                        <td><?= $x++?></td>
                        <td ><?=$row->date?></td>
                        <?php
                        $original_string = $row->title;
                        $limited_string = word_limiter($original_string ,5, '');
                        $rest_of_string = trim(str_replace($limited_string, "", $original_string));
                        ?>
                        <td ><?=word_limiter($row->title,5)?></td>
                        <td><?= $span;?></td>
                        <td></td>
                        <td><?php if(isset($row->num_views) && $row->num_views != null ){ echo $row->num_views;}
                            else{echo "لا يوجد";}?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PhotoModal<?= $row->id?>">التفاصيل</button>
                        </td>
                        <td>
                            <a href="<?=base_url()."mobadra/Mobdra/DeletePublisher/".$row->id?>"  onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>
                            <a href="<?=base_url()."mobadra/Mobdra/UpdateNews/".$row->id?>" title="تعديل" >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        </td>

                    </tr>

                    <?php
                }
                }
                ?>


                </tbody>
            </table>


            <!-- Modal -->
            <?php
            if (isset($display_publisher_data) && $display_publisher_data != null){

                foreach ($display_publisher_data as $row){
//                    if($row->news_type==1){
//                        $news_type = "اخبار الجمعية";
//                    } else if($row->news_type==2){
//                        if(isset($row->newspaper_name) && $row->newspaper_name != null){
//                            $news_type = $row->newspaper_name  ;
//                        }
//                    }
                    ?>


                    <div class="popup-news modal fade" id="PhotoModal<?= $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body inline-block gradient" style="">
                                    <div class="col-xs-12">
                                        <div class="col-sm-3 no-padding popup-news-sidebar">
                                            <?php
                                            if ($_SESSION['role_id_fk']==3 || $_SESSION['role_id_fk']==4){
                                                $path = "uploads/images";
                                            }
                                            else if ($_SESSION['role_id_fk']==1){
                                                $path = "asisst/admin_asset/img/section";
                                            }
                                            ?>

                                            <img src="<?=base_url()."$path/".$photo_view?>" width="100%">

                                            <div class="boxInfo">
                                                <ul class="list-unstyled">

                                                    <li><p  class="time"> <i class="fa fa-clock-o"></i> منذ 3 ساعات</p></li>

                                                    <li><p class="views"><i class="fa fa-eye"></i> المشاهدات : <?=$row->count_views ?> </p></li>
                                                    <li><p class="comments"><i class="fa fa-comment-o"></i> التعليقات : 255 </p></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <h5 class="popup-news-title"><a href="#"> <?= $row->title?></a></h5>
                                            <p><i class="fa fa-calendar"></i>  <?= $row->date?> -- <i class="fa fa-user"></i> الناشر :  <?= $row->publisher_name?>

                                            </p>
                                            <hr>
                                            <p class="details">

                                                <?= nl2br($row->details) ?>

                                            </p>

                                            <br>
                                            <?php
                                            if (isset($row->img ) && $row->img  != null ) {
                                                ?>
                                                <div id="popup-news-img" class="carousel slide" data-ride="carousel">
                                                    <!-- Indicators -->
                                                    <ol class="carousel-indicators">
                                                        <?php
                                                        // if (isset($row->img ) && $row->img  != null ){
                                                        $a = 0;
                                                        foreach ($row->img as $photo) {

                                                            ?>
                                                            <li data-target="#popup-news-img" data-slide-to="<?= $a ?>"
                                                                class="<?php if ($a == 0) {
                                                                    echo "active";
                                                                } ?>"></li>


                                                            <?php
                                                            $a++;
                                                        }

                                                        ?>

                                                    </ol>

                                                    <!-- Wrapper for slides -->
                                                    <div class="carousel-inner" role="listbox">

                                                        <?php
                                                        if (isset($row->img) && $row->img != null) {
                                                            $x = 0;
                                                            foreach ($row->img as $record) {

                                                                ?>
                                                                <div class="item <?php if ($x == 0) {
                                                                    echo "active";
                                                                } ?>">
                                                                    <img src="<?= base_url()."uploads/images/public_relations/news/".$record->img ?>"
                                                                         width="100%" height="350">

                                                                    <div class="carousel-caption">
                                                                        ...
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                $x++;
                                                            }
                                                        }
                                                        ?>


                                                    </div>

                                                    <!-- Controls -->
                                                    <a class="left carousel-control" href="#popup-news-img" role="button" data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                    <a class="right carousel-control" href="#popup-news-img" role="button"
                                                       data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                            <!-- -->

                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer" style="display: inline-block;width: 100%">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php

                }
            }
            ?>
            <!-- Modal -->

        </div>
    </div>
</div>
<script>
    $(document).ready(function(e) {
        $(".carousel-indicators").click(function(){
            $(".carousel").carousel('prev');
        })
        $(".left").click(function(){
            $(".carousel").carousel('prev');
        })
        $(".right").click(function(){
            $(".carousel").carousel('next');
        })
    });
</script>
