
    <?php

if (isset($comments) && !empty($comments)) {
    ?>
    <div class=" well col-xs-12 no-padding">

            <?php
            foreach ($comments as $comment){
                ?>
                <article class="reply-comment">
                    <div class="reply-img">
                    <img src="<?php if( isset($_SESSION['user_login_image']) && $_SESSION['user_login_image']!= null ){
        if ($_SESSION['role_id_fk'] == 3) {
echo base_url().'uploads/human_resources/emp_photo/thumbs/'.$_SESSION['user_login_image'];

}else {
echo base_url().'uploads/images/'.$_SESSION['user_login_image'];

}
        }else {

            echo base_url().'asisst/admin_asset/img/avatar5.png';

         }

        ?>"
class="img-circle" width="45" height="45" alt="user">
                    </div>
                    <div class="reply-comment ">
                        <h5 class="name"><span class="label label-inverse"><?= $comment->publisher_name?> </span> <?= $comment->date_ar ?>

                            <div class="btn-group" role="group" aria-label="..." style="float:left;">
                                <?php
                                if ($_SESSION['role_id_fk'] ==1){
                                    ?>
                                    <button type="button" class="btn btn-default" onclick="delete_comment(<?= $comment->id?>,<?= $comment->sader_id_fk?>)"> <i class="fa fa-trash"> </i></button>
                                    <button type="button" class="btn btn-default"  onclick="get_comment(<?= $comment->id?>,'<?= $comment->comment?>','<?= $comment->to_user_id?>','<?= $comment->to_user_name?>')"><i class="fa fa-pencil"> </i></button>

                                    <?php
                                } else{

                                  if ($_SESSION['emp_code']== $comment->publisher){
                                      ?>
                                <button type="button" class="btn btn-default" onclick="delete_comment(<?= $comment->id?>,<?= $comment->sader_id_fk?>)"> <i class="fa fa-trash"> </i></button>
                                <button type="button" class="btn btn-default"  onclick="get_comment(<?= $comment->id?>,'<?= $comment->comment?>','<?= $comment->to_user_id?>','<?= $comment->to_user_name?>')"><i class="fa fa-pencil"> </i></button>

                                <?php
                                }


                                }
                                ?>



                            </div>

                        </h5>
                        <p> <?= $comment->comment?>  </p>
                    </div>
                </article>

                <?php
            }
            ?>

        </div>


    <?php
}
?>
