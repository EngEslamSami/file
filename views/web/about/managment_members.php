<style>
h2.subtitle {
font-size: 20px;
    color: #96c73e;
    font-weight: bold;
    border-right: 9px solid #ffb61e;
    padding-right: 8px;
    line-height: 40px;
}
.dawra-nums{
    display: inline-block;
    width:100%;
    padding-bottom: 20px;
    border-bottom: 3px dotted #999;
}
.dawra-style {
    position: relative;
       display: inline-block;
    width: 100%;
}
.dawra-style h5 {
    /* margin: 0px 0 0; */
    margin-right: 40px;
    padding: 10px 17px 10px 0;
    background-color: #ffb61e;
    border-bottom-left-radius: 18px;
}
.dawra-style i {
position: absolute;
    top: 5px;
    /* padding: 10px; */
    width: 50px;
    height: 50px;
    background-color: #95c63d;
    color: #fff;
    font-size: 30px;
    text-align: center;
    line-height: 50px;
    border-radius: 50%;
}

.dawra-style i:after {
  pointer-events: none;
  position: absolute;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  content: '';
  box-sizing: content-box;
  box-shadow: 0 0 0 3px #ffb61e;
  top: 0;
  left: 0;
  opacity: 0;
  transition: 300ms;
}

.dawra-style i:hover {
  background-color: #fff;
  color: #95c63d;
}

.dawra-style i:hover:after {
  opacity: 1;
  transform: scale(1.15);
}
.dawra-style .badge {
    background-color: #fff;
    color: #000;
    font-size: 16px;
    font-weight: 500;
    float: left;
    margin-left: 5px;
    margin-top: -2px;
}
/*
.managment_member p i{
    width: 40px !important;
    height: 40px !important;
    line-height: 40px !important;
    color: #000 !important;
    font-size: 28px !important;
        background: #e0e0e0 !important;
    text-align: center !important;
    border-radius: 50% !important;
}
*/
</style>

<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">الرئيسية</a></li>
            <li><a href="#">من نحن</a></li>
            <li class="active">مجلس الإدارة</li>
        </ol>
    </div>
</section> 

<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12"  id="firstDiv" >
            <h4 class="sidebar_title"> من نحن </h4>
            <?php
            $data['id_page']=$id_page;
            $this->load->view('web/about/menu_sidebar_about',$data); ?>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 " id="secondDiv">
        
 
        
        
        <div class="background-white content_page">


                <h2 class="subtitle">الرئيس الفخري للجمعية</h2>
                <div class="managment_member" style="display: inline-block;width: 100%;">
                    <div class="col-sm-3 text-center col-xs-12">
                        <img src="<?=base_url().'asisst/web_asset/'?>img/fysel_bn_mashal.jpg" class="img-circle">
                    </div>
                    <div class="col-sm-9 col-xs-12">
                        <h4>الرئيس الفخري للجمعية</h4>
                        <p>صاحب السمو الملكي الأمير الدكتور فيصل بن مشعل بن سعود بن عبدالعزيز آل سعود أمير منطقة القصيم </p>


                    </div>
                </div>



       <div class="dawra-nums">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="dawra-style">
              <a  class="hover-fx"><i class="fa fa-sort-numeric-asc"></i></a>
                <h5> رقم الدورة <span class="badge droid">  
                <?php
                if(isset($magls_data) and $magls_data != null){
                    echo  $magls_data[0]->mg_code;
                }
                 ?>
                </span></h5>
                 
                 
              </div>
            </div>
            
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="dawra-style">
              <a  class="hover-fx"><i class="fa fa-clock-o"></i></a>
                <h5> مدة الدورة <span class="badge droid">4 سنوات</span></h5>
                 
                 
              </div>
            </div>
            
            
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="dawra-style">
              <a  class="hover-fx"><i class="fa fa-calendar-minus-o"></i></a>
                <h5> بداية الدورة <span class="badge droid">
                <?php
                if(isset($magls_data) and $magls_data != null){
                    echo  $magls_data[0]->ta3en_date_h;
                }
                 ?>
                
              
                </span></h5>
                 
                 
              </div>
            </div>
            
            
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="dawra-style">
              <a  class="hover-fx"><i class="fa fa-calendar-plus-o"></i></a>
                <h5> نهاية الدورة <span class="badge droid">
                <?php
                if(isset($magls_data) and $magls_data != null){
                    echo  $magls_data[0]->end_date_h;
                }
                 ?>
                </span></h5>
                 
                 
              </div>
            </div>
        </div>


                <h2 class="subtitle"> أعضاء مجلس الإدارة</h2>
                <?php
                /* echo '<pre>';
                print_r($magls_data);
                */
                
               
                /*
                echo '<pre>';
print_r($all_data);*/
/*
                echo '<pre>';
print_r($all_members);*/
if (isset($all_members) && !empty($all_members)){ 
               foreach ($all_members as $record){
    ?>
    
      <div class="managment_member col-sm-6 col-xs-12">
            <div class="col-sm-4 text-center col-xs-12 no-padding">

                <img src="<?=base_url()."uploads/md/gam3ia_omomia_members/".$record->details_edow->mem_img?>" onerror="this.src='<?=base_url()."asisst/web_asset/img/logo_default.png"?>'"  class="img-circle">
            </div>
            <div class="col-sm-8 col-xs-12 padding-4">
            
            
                <h4 style="color: #053498 !important;" class="text-center">
                
                 <?php
                    echo $record->mansp_title;
                 
                    ?>
               
                   
                </h4>
                <h4 style="font-weight: 600; color: #002542;font-size: 19px;"> <?= $record->details_edow->laqb_title?>  /  <?= $record->details_edow->name?> </h4>
<!--
                <p class="droid"> <i style="font-size: 38px !important;" class="fa fa-mobile"></i> <?= $record->details_edow->jwal?></p>
                -->
                <p  style="font-weight:bold;float: left !important;line-height: 39px !important; ">
                <a class="fade-icon droid" style="font-size: 18px;"> <i class="fa fa-envelope-o"></i> <?= $record->details_edow->email?></a>
                </p>
                
            </div>
        </div> 
    
<?php 
}
} ?>



            </div>
            
            

        </div>
    </div>
</section>


