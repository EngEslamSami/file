
<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="all_projects">
            <h4>جديد المشروعات</h4>
            <?php
            if (isset($programs)&& !empty($programs)){
                foreach ($programs as $row){
                    ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="project_item">
                            <img src="<?=base_url().'uploads/images/'.$row->img?>">
                            <div class="project_item_info">
                                <h5 class="mtop-10 mbottom-10"><a href="#"> <?= $row->title?> </a></h5>
                                <p  class="mtop-10 mbottom-10">
                                    <?= nl2br($row->details)?>
                                    </p>
                            </div>
                            <div class="text-center ">
                                <a target="" href="<?=base_url().'Web/single_project/'.$row->id?>" class="btn btn-primary details_button"> التفاصيل </a>
                            </div>
                        </div>
                    </div>

            <?php
                }
            }
            ?>


            <!--
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="project_item">
                    <img src="<?=base_url().'asisst/web_asset/'?>img/projects/project-1.jpg">
                    <div class="project_item_info">
                        <h5 class="mtop-10 mbottom-10"><a href="#">سهم بيتى </a></h5>
                        <p  class="mtop-10 mbottom-10">"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات .</p>
                    </div>
                    <div class="text-center ">
                        <a href="<?=base_url().'Web/single_project'?>" class="btn btn-primary details_button"> التفاصيل </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="project_item">
                    <img src="<?=base_url().'asisst/web_asset/'?>img/projects/project-1.jpg">
                    <div class="project_item_info">
                        <h5 class="mtop-10 mbottom-10"><a href="#">سهم بيتى </a></h5>
                        <p  class="mtop-10 mbottom-10">"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات .</p>
                    </div>
                    <div class="text-center ">
                        <a href="<?=base_url().'Web/single_project'?>" class="btn btn-primary details_button"> التفاصيل </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="project_item">
                    <img src="<?=base_url().'asisst/web_asset/'?>img/projects/project-1.jpg">
                    <div class="project_item_info">
                        <h5 class="mtop-10 mbottom-10"><a href="#">سهم بيتى </a></h5>
                        <p  class="mtop-10 mbottom-10">"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات .</p>
                    </div>
                    <div class="text-center ">
                        <a href="<?=base_url().'Web/single_project'?>" class="btn btn-primary details_button"> التفاصيل </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="project_item">
                    <img src="<?=base_url().'asisst/web_asset/'?>img/projects/project-1.jpg">
                    <div class="project_item_info">
                        <h5 class="mtop-10 mbottom-10"><a href="#">سهم بيتى </a></h5>
                        <p  class="mtop-10 mbottom-10">"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات .</p>
                    </div>
                    <div class="text-center ">
                        <a href="<?=base_url().'Web/single_project'?>" class="btn btn-primary details_button"> التفاصيل </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="project_item">
                    <img src="<?=base_url().'asisst/web_asset/'?>img/projects/project-1.jpg">
                    <div class="project_item_info">
                        <h5 class="mtop-10 mbottom-10"><a href="#">سهم بيتى </a></h5>
                        <p  class="mtop-10 mbottom-10">"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أنكايديديونتيوت لابوري ات دولار ماجنا أليكيوا . يوت انيم أد مينيم فينايم,كيواس نوستريد أكسير سيتاشن يللأمكو لابورأس نيسي يت أليكيوب أكس أيا كوممودو كونسيكيوات .</p>
                    </div>
                    <div class="text-center ">
                        <a href="<?=base_url().'Web/single_project'?>" class="btn btn-primary details_button"> التفاصيل </a>
                    </div>
                </div>
            </div>
            -->

        </div>
    </div>
</section>







