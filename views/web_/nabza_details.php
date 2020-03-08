
<!--
<section class="banner_page" style=" background: url(<?= base_url() . 'asisst/web_asset/' ?>img/profile-bg.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?= base_url() . 'Web' ?>">الرئيسية</a></li>
            <li><a href="#">من نحن</a></li>
            <li class="active"> <a href="<?= base_url() . 'Web/about_us/'.base64_encode($page_data->main_page) ?>">
            <?= $page_data->page_title ?></a></li>
        </ol>
    </div>
</section>
-->
<?php
if (isset($nabza)&&!empty($nabza) ){
    ?>

<section class="main_content pbottom-30 ptop-30">
    <div class="container">

        <div class="col-md-9 col-sm-8 col-xs-12 " id="secondDiv">
            <div class="background-white content_page">
                <div class="well well-sm"><?= $nabza->title?></div>
                <div class="well well-sm"><?= $nabza->sub_title?></div>
                <div class="text-center pbottom-20">

                </div>

                <div class="paragraph">
                    <p><?= nl2br($nabza->details) ?></p>
                </div>
            </div>
        </div>
    </div>
</section>


    <?php
}
?>

<!--
<script>

    var title_page = '<?=$page_data->page_title?>';
    var title_web = document.title;
    console.log('title web : ' + title_web);
    console.log('title page : ' + title_page);
    document.title = title_page + "-" + title_web;
</script>
-->


