

<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <?php
        if (isset($programs) && !empty($programs)){
            ?>

        <div class="single_project">
            <div class="project_details pbottom-30 ptop-30">
                <div class="col-sm-4 col-xs-12">
                    <img src="<?=base_url().'uploads/images/'.$programs->img?>">
                </div>
                <div class="col-sm-8 col-xs-12">
                    <h3> <?= $programs->title?> </h3>
                    <p class="paragraph">
                        <?=nl2br($programs->details)?>
                        </p>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="background-white tbra_progress col-xs-12 no-padding" >
                    <div class="col-md-12 col-sm-12 col-xs-12 ptop-10 no-padding">
                        <div class="col-md-2 col-sm-12 col-xs-12">
                            <div class="pay_txt">سهم <?= $programs->title?></div>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="pay_m"><?= $programs->num_sahm_sell * $programs->sahm_price  ?> ريال سعودي (<?= $programs->sahm_amount - $programs->num_sahm_sell ?> سهم متبقي)</div>
                        </div>
                        <?php
                        $nesba= $programs->num_sahm_sell/$programs->sahm_amount;
                        $nesba2=$nesba*100;

                        ?>
                        <div class="col-md-2 col-sm-12 col-xs-12">
                            <div class="pay_add_1 pay_add_m_1_1">تبرع</div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="progress">
                            <div class="progress-bar  progress-bar-success  progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: <?=$nesba2?>%;">
                                90%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tbra_for_project background-white mtop-40 pbottom-30">
                <div class="forms_head mbottom-10">التبرع للمشروع</div>

                <form>
                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                        <label>عدد الاسهم </label>
                        <input type="number" id="num_sahm" style="width: 100px;"  onKeyUp="if(this.value>99){this.value='<?= $programs->sahm_amount?>';}else if(this.value<0){this.value='0';}" class="form-control" min="1" max="<?= $programs->sahm_amount?>" value="" /><br />
                    </div>
                    <div class="form-group col-md-4 col-sm-6 col-xs-12">
                        <label>قيمة السهم</label>
                        <input id="cost-sahm" style="width: 20%;" readonly class="form-control" min="10" value="<?= $programs->sahm_price?>" /><br />

                            <button class="addToCart btn-button btn10" data-name="<?php echo $programs->title ;?>"    data-price="<?php echo $programs->sahm_price ;?>"  data-ID="<?php echo $programs->id ;?>-<?php echo $programs->main_cat_id_fk ;?>-<?php echo $programs->sub_cat_id_fk ;?>" type="button" title="" ><span><i class="fa fa-cart-plus"></i> اضافة الي السلة </span></button>


                       <!-- <a class="btn btn-success " target="_blank" href="<?=base_url().'Web/shopping_cart/'.$programs->id?>"> إتمام الدفع بعد أضف للسلة</a>-->
                    </div>
                    <div class="form-group col-md-4 col-sm-6 col-xs-12">

                    </div>
                    <div class="form-group col-md-4 col-sm-6 col-xs-12">

                    </div>
                </form>
            </div>
        </div>
            <?php
        }
        ?>


    </div>
</section>




