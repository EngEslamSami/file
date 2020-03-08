<?php if ((isset($ser)) && (!empty($ser))) { ?>
    <div class="n-modal-body green" style="min-height: 300px">
        <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"
                           data-parent="#accordion2" href="#collapseOne"
                           aria-expanded="true" aria-controls="collapseOne">
                            وصف الخدمة
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                     aria-labelledby="headingOne">
                    <div class="panel-body">
                        <ol>
                            <li id="ser_desc_details_pop"><?= $ser->description_ser ?></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse"
                           data-parent="#accordion2" href="#collapseTwo"
                           aria-expanded="false" aria-controls="collapseTwo">
                            الفئات المستهدفة
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <ol><?php if (isset($ser->cat_ser) && (!empty($ser->cat_ser)) && ($ser->cat_ser)) { ?>
                                <li id=""><?= $ser->cat_ser->title ?></li>
                            <?php } ?>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse"
                           data-parent="#accordion2" href="#collapseThree"
                           aria-expanded="false" aria-controls="collapseThree">
                            الضوابط والشروط
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="headingThree">
                    <div class="panel-body">
                        <ol><?php if (isset($ser->con) && (!empty($ser->con)) && ($ser->con)) {
                                foreach ($ser->con as $cond) {
                                    ?>
                                    <li id=""><?= $cond->cond_asked ?></li>
                                <?php }
                            } else { ?>
                                <li>لا توجد الضوابط والشروط
                                </li>
                            <?php } ?>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingFourth">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse"
                           data-parent="#accordion2" href="#collapseFourth"
                           aria-expanded="false" aria-controls="collapseFourth">
                            المستندات المطلوبة
                        </a>
                    </h4>
                </div>
                <div id="collapseFourth" class="panel-collapse collapse" role="tabpanel"
                     aria-labelledby="headingFourth">
                    <div class="panel-body">
                        <ol><?php if (isset($ser->doc) && (!empty($ser->doc)) && ($ser->doc)) {
                                foreach ($ser->doc as $cond) {
                                    ?>
                                    <li id=""><?= $cond->doc_asked ?></li>
                                <?php }
                            } else { ?>
                                <li>لا توجد المستندات المطلوبة
                                </li>
                            <?php } ?>
                        </ol>
                    </div>
                </div>
            </div>

        </div>


    </div>
<?php } else { ?>
    <div>
        <h3>لا توجد تفاصيل </h3>
    </div>
<?php } ?>