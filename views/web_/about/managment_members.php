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

<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/profile-bg.png);">
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
        <div class="col-md-3 col-sm-4 col-xs-12"  id="firstDiv" >
            <h4 class="sidebar_title"> من نحن </h4>
            <?php
            $data['id_page']=$id_page;
            $this->load->view('web/about/menu_sidebar_about',$data); ?>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12 " id="secondDiv">
        
        
        <div class="background-white content_page">


              <!--  <h2 class="subtitle">الرئيس الفخري للجمعية</h2>-->
                <!--<div class="managment_member" style="display: inline-block;width: 100%;">
                    <div class="col-sm-3 text-center col-xs-12">
                        <img src="<?=base_url().'asisst/web_asset/'?>img/hossam.jpg" class="img-circle">
                    </div>
                    <div class="col-sm-9 col-xs-12">
                        <h4>الرئيس الفخري للجمعية</h4>
                        <p>صاحب السمو الملكي الأمير الدكتور حسام بن سعود بن عبدالعزيز آل سعود أمير منطقة الباحة</p>


                    </div>
                </div>-->
       <div class="managment_member" style="display: inline-block;width: 100%;">
                    <div class="col-sm-3 text-center col-xs-12">
                        <img src="<?=base_url().'uploads/md/magls_edara/'.$fakhry_data->fakhry_img?>"  onerror="this.src='<?=base_url()."asisst/web_asset/img/logo_default.png"?>'" class="img-circle">
                    </div>
                    <div class="col-sm-9 col-xs-12">
                        <h4><?=$fakhry_data->manseb?></h4>
                        <p> <?=$fakhry_data->name?></p>

                    </div>
                </div> 


                <h2 class="subtitle"> أعضاء مجلس الإدارة</h2>
                <?php
                if (isset($magls_edara) && !empty($magls_edara)){
                    $membership_jobtitle_arr =array(1=>'رئيس مجلس الإدارة',2=>'نائب رئيس مجلس الإدارة',3=>'عضو');
                  //  foreach ($magls as $key=>$value){
                        foreach ($magls_edara as $record){

                ?>

                <div class="managment_member col-sm-6 col-xs-12">
                    <div class="col-sm-4 text-center col-xs-12 no-padding">
 <img src="<?=base_url()."uploads/md/gam3ia_omomia_members/".$record->memb_img?>"/>
                    </div>
                    <div class="col-sm-8 col-xs-12 padding-4">
                    
                    
                        <h4>
                            <?php
                          /*  if (isset($record->job_title_id_fk) && !empty($record->job_title_id_fk) ){
                                if ($record->job_title_id_fk==1){
                                    echo "رئيس مجلس الإدارة";
                                }
                                elseif ($record->job_title_id_fk==2){
                                    echo "نائب رئيس مجلس الإدارة";
                                }
                                elseif ($record->job_title_id_fk==3){
                                    echo "أمين الصندوق";
                                }
                                 elseif ($record->job_title_id_fk==4){
                                   echo "عضو مجلس إدارة";
                                }
                                 
                                
                                
                            }*/
                            ?>
                        </h4>
                        <h4 style="font-weight: 600; color: #002542;font-size: 16px;">
                             <?php  /*$record->emp_surname*/ ?>    <?= $record->mem_name?> </h4>

                        <p>  <?= $record->mansp_title?></p>
                       <!-- <p> البريد الإلكترونى : <?= $record->email?></p> -->
                    </div>
                </div>
                <?php
                } }
                //}
                ?>


            </div>
            
            

        </div>
    </div>
</section>


