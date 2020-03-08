


<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/profile-bg.png);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?=base_url().'Web'?>">الرئيسية</a></li>
            <li><a href="<?=base_url().'Web/king_word'?>">من نحن</a></li>
            <li class="active">موظفي الجمعية التنفيذيين</li>
        </ol>
    </div>
</section>

<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">
        <div class="col-md-3 col-sm-4 col-xs-12"  id="firstDiv" >
            <h4 class="sidebar_title"> من نحن </h4>
            <?php
            $data['id_page']=$id_page;
            $this->load->view('web/about/menu_sidebar_about',$data); ?>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12 " id="secondDiv">
      
            <?php
                if (isset($all) && !empty($all)){
                
                ?>
            <div class="background-white content_page">

                <h2 class="subtitle"> الإدارة التنفيذية</h2>


                <?php
                if (isset($all) && !empty($all)){
                foreach ($all as $member){
                ?>
                <div class="managment_member col-sm-6 col-xs-12">
                    <div class="col-sm-4 text-center col-xs-12 no-padding">
                        <img src="<?=base_url().'uploads/images/'.$member->emp->personal_photo?>"
                             onerror="this.src=<?=base_url().'asisst/web_asset/img/logo.png'?>" 
                             class="img-circle">
                    </div>
                    <div class="col-sm-8 col-xs-12 padding-4">
                        <h4><?php echo $member->degree_name; ?> </h4>
                         <h4 style="font-weight: 600; color: #002542;font-size: 16px;">سعادة الأستاذ / ة <?php echo $member->emp_name; ?></h4>
                        <!--<p> الهاتف : <?php echo $member->emp->phone; ?></p>
                        <p> البريد الإلكترونى : <?php echo $member->emp->email; ?></p> -->
                    </div>
                </div>

                    <?php
                }
                }
                ?>


                 </div>
				      <?php
               
                }
                ?>
        </div>
    </div>
</section>

