
<style>
h2.subtitle {
font-size: 26px;
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
            <li><a href="<?=base_url().'Web'?>">الرئيسية</a></li>
            <li><a href="<?=base_url().'Web/king_word'?>">من نحن</a></li>
            <li class="active">الهيكل التنظيمى</li>
        </ol>
    </div>
</section>

<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" id="firstDiv" >
            <h4 class="sidebar_title"> من نحن </h4>
            <?php
            $data['id_page']=$id_page;
            $this->load->view('web/about/menu_sidebar_about',$data); ?>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"  id="secondDiv">
            <div class="background-white content_page">

              <!--  <div class="well well-sm">الهيكل التنظيمى</div> -->
                <?php if (isset($imgs) && (!empty($imgs))) { ?>
                 <?php foreach ($imgs as $key => $img) { ?>
                  <div class="paragraph">
                  
                    <h2 class="subtitle"> <?= $img->title ?></h2>
                </div>
                 
                  <div class="text-center pbottom-20">
                    <img src=" <?php echo base_url() . 'uploads/images/' . $img->img ?>"  class="img-responsive img-thumbnail img-center" alt="">
                </div>
                
                
                     <?php } ?>
                     
                         <?php } ?>

              <!--  <div class="text-center pbottom-20">
                    <img src="<?=base_url().'asisst/web_asset/'?>img/structure.png"  class="img-responsive img-thumbnail img-center" alt="">
                </div>

                <div class="paragraph">
                    <p> الريادة في العمل الاجتماعي التطوعي وفق الأصول العلمية , وتوفير رعاية متكاملة وحياة أسرية متوازنة للأيتام.</p>
                </div>
                -->



            </div>
        </div>
    </div>
</section>



