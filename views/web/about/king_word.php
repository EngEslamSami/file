

<section class="banner_page" style=" background: url(<?= base_url() . 'asisst/web_asset/' ?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?= base_url() . 'Web' ?>">الرئيسية</a></li>
            <li><a href="#">من نحن</a></li>
            <li class="active"> <a href="<?= base_url() . 'Web/about_us/'.base64_encode($page_data->main_page) ?>"> <?= $page_data->page_title ?></a></li>
        </ol>
    </div>
</section>

<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">
        <div class="col-lg-2 col-md-2 col-xs-12" id="firstDiv">
            <h4 class="sidebar_title"> من نحن </h4>
<!--            C:\laragon\www\lastAbnaa_30\application\views\web\about\menu_sidebar_about.php-->
            <?php
            $data['id_page']=$id_page;
            $this->load->view('web/about/menu_sidebar_about',$data); ?>
<!--            <div class="menu_sidebar">-->
<!--                <ul class="list-unstyled">-->
<!--                    --><?php //if ((isset($this->pages_data)) && (!empty($this->pages_data))) {
//                        foreach ($this->pages_data as $page) {
//                            if ($page_data->page_id_fk == $page->id) {
//                                $class = 'active';
//                            } else {
//                                $class = '';
//                            }
//                            ?>
<!--                            <li class="--><?//= $class ?><!--"><a-->
<!--                                        href="--><?//= base_url() . 'Web/about_us/' . base64_encode($page->id) ?><!--">--><?//= $page->page_title ?><!-- </a>-->
<!--                            </li>-->
<!---->
<!--                            --><?php
//                        }
//                    } ?>
<!---->
<!--                    <li><a href="--><?//= base_url() . 'Web/managment_members' ?><!--">أعضاء مجلس الإدارة</a></li>-->
<!--                    <li><a href="--><?//= base_url() . 'Web/managment_general' ?><!--">موظفي الجمعية التنفيذيين</a></li>-->
<!--                    <li><a href="--><?//= base_url() . 'Web/structure' ?><!--">الهيكل التنظيمي العام</a></li>-->
<!--                </ul>-->
<!--            </div>-->
        </div>
        <div class="col-lg-10 col-md-10 col-xs-12 " id="secondDiv">
            <div class="background-white content_page">
                <div class="well well-sm"><?= $page_data->title ?></div>
                <div class="text-center pbottom-20">
                    <img src="<?= base_url() . 'uploads/images/' . $page_data->img ?>"
                         class="img-responsive img-thumbnail img-center"
                         alt="خادم الحرمين الشريفين الملك سلمان بن عبدالعزيز حفظه الله">
                </div>

                <div class="paragraph">
                    <p><?= $page_data->content ?></p>
                </div>
            </div>
        </div>
    </div>
</section>


<script>

    var title_page = '<?=$page_data->page_title?>';
    var title_web = document.title;
    console.log('title web : ' + title_web);
    console.log('title page : ' + title_page);
    document.title = title_page + "-" + title_web;
</script>


