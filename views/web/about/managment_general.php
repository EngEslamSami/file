
<style>

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
            <li><a href="<?=base_url().'Web'?>">الرئيسية</a></li>
            <li><a href="<?=base_url().'Web/king_word'?>">من نحن</a></li>
            <li class="active">الإدارة التنفيذية</li>
        </ol>
    </div>
</section>

<section class="main_content pbottom-30 ptop-30 " >
    <div class="container-fluid">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12"  id="firstDiv" >
            <h4 class="sidebar_title"> من نحن </h4>
            <?php
            $data['id_page']=$id_page;
            $this->load->view('web/about/menu_sidebar_about',$data); ?>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12 " id="secondDiv">


                <?php
               /*echo '<pre>';
                print_r($all);
                */
                if (isset($all) && !empty($all)){
                
                ?>
            <div class="background-white content_page">

                <h2 class="subtitle"> الإدارة التنفيذية</h2>


                <?php
                /*
                echo '<pre>';
                print_r($all);*/
                if (isset($all) && !empty($all)){
                foreach ($all as $member){
                ?>
<div class="managment_member col-sm-6 col-xs-12">
<div class="col-sm-4 text-center col-xs-12 no-padding">
    <img src="<?=base_url().'uploads/human_resources/emp_photo/thumbs/'.$member->emp->personal_photo?>"
         onerror="this.src=<?=base_url().'asisst/web_asset/img/logo_default.png'?>"
         class="img-circle"> 
</div>
<div class="col-sm-8 col-xs-12 padding-4">
    <h4 style="font-size: 17px;font-weight: bold;" class="text-center"><?php echo $member->job_title_name; ?> </h4>
     <h4 style="font-size: 17px;font-weight: bold;"  class="text-center" style="font-weight: 600; color: #002542;font-size: 16px;"> 
     <?php if(isset($member->laqab) and $member->laqab !=null){
        echo $member->laqab;
     }else{
        echo 'الأستاذ/ة';
     } ?>
     
      / <?php echo $member->emp_name; ?></h4>
    <p style="font-size: 17px;font-weight: bold;"  class="inline-block" style="text-align: left;">
    <!--<a class="fade-icon droid" style="float: left;line-height: 40px;font-size: 20px;"><i title="جوال رقم " class="fa fa-mobile"></i><?php echo $member->emp->phone; ?> &nbsp</a>
        -->
       <a class="fade-icon droid" style="float: left;line-height: 40px;font-size: 20px;"><i title="تحويلة رقم" class="fa fa-volume-control-phone"></i> <?php echo $member->emp->tahwela_rkm; ?></a>    
    </p>

    <p style="font-size: 17px;font-weight: bold;"   class="inline-block" style="text-align: left;"><a class="fade-icon droid" style="float: left;line-height: 40px;font-size: 18px;"><i title="البريد الإلكتروني" class="fa fa-envelope-o"></i>    <?php echo $member->emp->email; ?></a></p>

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

