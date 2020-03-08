
<style>
.content_page img.img-center {
    margin: 9px 0px 1px 14px !important;
}

h2.subtitle {
font-size: 20px;
    color: #96c73e;
    font-weight: bold;
    border-right: 9px solid #ffb61e;
    padding-right: 8px;
    line-height: 40px;
}


</style>

<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">الرئيسية</a></li>
            <li><a href="#">من نحن</a></li>
            <li class="active"> <a href="<?= base_url() . 'Web/about_us/'.base64_encode($page_data->main_page) ?>"  style="color: #96c73e;"> <?= $page_data->page_title ?> </a> </li>
        </ol>
    </div>
</section>


<section class="main_content pbottom-20 ptop-20"> 
    <div class="container-fluid">
        <div class="col-md-3 col-sm-4 col-xs-12"  id="firstDiv" >
            <h4 class="sidebar_title"> من نحن </h4>
            <?php
            $data['id_page']=$id_page;
            $this->load->view('web/about/menu_sidebar_about',$data); ?>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12 " id="secondDiv">
            <div class="background-white content_page">
<?php if ((isset($page_data->subs))&&(!empty($page_data->subs))){
    foreach ($page_data->subs as $sub){
        ?>
        <h2 class="subtitle"><strong><?=$sub->title?> </strong>:</h2>
        
       <div class="text-center pbottom-20">
        
           <img src="<?= base_url() . 'uploads/images/' . $page_data->img ?>" id="img-president" class="img-responsive img-thumbnail img-center" alt="<?= $page_data->title ?>">
         </div> 
        
        
        <div class="paragraph">
            <p><?=$sub->content?></p>
        </div>
                <?php
                    }
                } ?>

            </div>
        </div>
    </div>
</section>
<!--28-1-om-->
<script>

    var title_page = '<?=$page_data->page_title?>';
    var title_web = document.title;
    console.log('title web : ' + title_web);
    console.log('title page : ' + title_page);
    document.title = title_page + "-" + title_web;
</script>
<!--28-1-om-->


