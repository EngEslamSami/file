
<style>
    .arqam-cont , .asmaa-cont{

        position: relative;
        font-size: 20px;
        display: flex;
        justify-content: center;

    }
    .arqam-cont div.square {
        margin: 1px 4px;
        color: #fff;

        border-radius: 3px;
        width: 35px;
        height: 35px;
        line-height: 38px;
        text-align: center;
        font-size: 18px;
        background: rgba(25,32,49,1);
        background: -moz-linear-gradient(top, rgba(25,32,49,1) 0%, rgba(25,32,49,1) 29%, rgba(25,32,49,1) 49%, rgba(31,39,57,1) 50%, rgba(31,39,57,1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(25,32,49,1)), color-stop(29%, rgba(25,32,49,1)), color-stop(49%, rgba(25,32,49,1)), color-stop(50%, rgba(31,39,57,1)), color-stop(100%, rgba(31,39,57,1)));
        background: -webkit-linear-gradient(top, rgba(25,32,49,1) 0%, rgba(25,32,49,1) 29%, rgba(25,32,49,1) 49%, rgba(31,39,57,1) 50%, rgba(31,39,57,1) 100%);
        background: -o-linear-gradient(top, rgba(25,32,49,1) 0%, rgba(25,32,49,1) 29%, rgba(25,32,49,1) 49%, rgba(31,39,57,1) 50%, rgba(31,39,57,1) 100%);
        background: -ms-linear-gradient(top, rgba(25,32,49,1) 0%, rgba(25,32,49,1) 29%, rgba(25,32,49,1) 49%, rgba(31,39,57,1) 50%, rgba(31,39,57,1) 100%);
        background: linear-gradient(to bottom, rgba(25,32,49,1) 0%, rgba(25,32,49,1) 29%, rgba(25,32,49,1) 49%, rgba(31,39,57,1) 50%, rgba(31,39,57,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#192031', endColorstr='#1f2739', GradientType=0 );
        
            }
    .asmaa-cont div {
        margin: 3px 10px;
        font-size: 14px;
        text-align: center;
        width: 35px;
        color: #122236;

    }
    /*.arqam-cont:before{
        content: "";
        position: absolute;
        right:0;
        top:50%;
        border-top: 10px solid transparent;
        border-right: 10px solid #96c73e;
        border-bottom: 10px solid transparent;
        border-left: 10px solid transparent;
    }
    .arqam-cont:after{
        content: "";
        position: absolute;
        left:0;
        top:50%;
        border-top: 10px solid transparent;
        border-left: 10px solid #96c73e;
        border-bottom: 10px solid transparent;
        border-right: 10px solid transparent;
    }*/
    
    .two-dot{
        font-size:25px
    }
    #myList li {
        display: block !important;
    }
    .box-video .well{
        padding: 0 1px;
        background-position: center !important;
        background-size: 100% 100% !important;
    }
     .box-video  .waqf-middle img{
        height: 100px;
        
        }
    .rectangle-span{
       background-color: #95ba52;
        border-top-right-radius: 25px;
        border-bottom-left-radius: 25px;
        color: #fff;
        padding: 1px 25px;
    }
    .box-video .rectangle-span {
        margin: 5px 0;
        display: inline-block;
    }
    
    .live-imgs{
       max-width: 100%;
         
        margin: auto; 
        box-shadow: -2px 2px 8px #999;
    }
    #live-banner .carousel-inner {
        max-width: 100%;
        width: 100%;
    
    }
    #live-banner .carousel-inner img{
        width: 100%;
        height: 370px;
    }
        
</style>


<section class="banner_page" style=" background: url(<?=base_url().'asisst/web_asset/'?>img/img2.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">الرئيسية</a></li>
            <li><a href="#">البث المباشر</a></li>
      
        </ol>
    </div>

</section>

<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">
<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" id="firstDiv">
<h4 class="sidebar_title"> المركز الإعلامى </h4>
<div class="menu_sidebar">
    <ul class="list-unstyled" >
        <li class=""><a href="<?=base_url().'Web/news'?>"> أخبار الجمعية </a></li>
        <li><a href="<?=base_url().'Web/gallery'?>"> مكتبة الصور</a></li>
        <li><a href="<?=base_url().'Web/videos'?>"> مكتبة الفيديوهات</a></li>
        <li class="active"><a href="<?=base_url().'Web/live_videos'?>">فيديوهات البث المباشر</a></li>
        <li><a href="#"> الجمعية فى الصحافة</a></li>
        <li><a href="<?=base_url().'Web/reports'?>"> التقارير</a></li>
        <li><a href="<?=base_url().'Web/system'?>"> الأنظمة و اللوائح</a></li>
        <li><a href="<?=base_url().'Web/plans'?>"> الخطة التشغيلية</a></li>
        <li><a href="<?=base_url().'Web/mhader_magles'?>"> إجتماعات الجمعية العمومية</a></li>
    </ul>
</div>
</div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 " id="secondDiv">
            <div class="background-white content_page">
                <div class="gallery_videos pbottom-20">

                    <ul id="myList" class="list-unstyled">
                        <?php
                        if (isset($videos) && !empty($videos)){
                            $x=0;
                            foreach ($videos as  $video){

                                if(!empty($video->from_date_ar)){
                                    $form_date =explode('-',$video->from_date_ar);
                                    $form_date =$form_date[2].'-'.$form_date[1].'-'.$form_date[0];

                                }else{
                                    $form_date ='';
                                }
                                if(!empty($video->to_date_ar)){
                                    $to_date =explode('-',$video->to_date_ar);
                                    $to_date =$to_date[2].'-'.$to_date[1].'-'.$to_date[0];
                                }else{
                                    $to_date ='';
                                }
                                ?>

                                <div class="col-sm-12 no-padding">
                                    <div class="box-video">
                                        <div class="col-md-12 col-xs-12 no-padding">
                                            <div class="well well-sm" style="background: url(<?=base_url().'asisst/web_asset/'?>img/waqf-bg.png);">
                                                <div class="col-sm-3 col-xs-12 no-padding">
                                                     <div class="text-center">
                                                        <span class="rectangle-span">المنقضي</span>
                                                     </div>
                                                    <div class="arqam-cont" style="font-family: 'arial';">
                                                         <div class="days square" id="days_a<?=$x?>">0</div>
                                                       
                                                        <div class="two-dot">:</div>
                                                        <div class="hours square" id="hours_a<?=$x?>">0</div>
                                                        
                                                        
                                                        <div class="two-dot">:</div>
                                                        <div class="min square" id="min_a<?=$x?>">0</div>
                                                    
                                                        
                                                        <div class="two-dot">:</div>
                                                        <div class="secends square" id="secends_a<?=$x?>">0</div>
                                                    
                                                        
                                                    </div>
                                                    <div class="asmaa-cont">
                                                        <div class="days" >أيام</div>
                                                        <div class="hours" >ساعات</div>
                                                        <div class="min" >دقائق</div>
                                                        <div class="secends">ثواني</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-12 padding-4 waqf-middle">
                                                    <!--<h6><?= $video->title?></h6>-->
                                                    <img src="<?=base_url().'asisst/web_asset/'?>img/waqf-middle.png" class="" />
                                                </div>
                                                <div class="col-sm-3 col-xs-12 no-padding">
                                                    <div class="text-center">
                                                        <span class="rectangle-span">المتبقي</span>
                                                     </div>
                                                    <div class="arqam-cont" style="font-family: 'arial';">
                                                         <div class="days square" id="days<?=$x?>">0</div>
                                                       
                                                        <div class="two-dot">:</div>
                                                        <div class="hours square" id="hours<?=$x?>">0</div>
                                                    
                                                        
                                                        <div class="two-dot">:</div>
                                                        <div class="min square" id="min<?=$x?>">0</div>
                                                    
                                                        
                                                        <div class="two-dot">:</div>
                                                        <div class="secends square" id="secends<?=$x?>">0</div>
                                                    
                                                        
                                                    </div>
                                                    <div class="asmaa-cont">
                                                        <div class="days" >أيام</div>
                                                        <div class="hours" >ساعات</div>
                                                        <div class="min" >دقائق</div>
                                                        <div class="secends">ثواني</div>
                                                    </div> 
                                                </div>
    
    
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                           <div class="live-imgs text-center">
                    
                                            <div id="live-banner" class="carousel slide" data-ride="carousel">
                                                  <!-- Indicators -->
                                                  <ol class="carousel-indicators">
                                                    <li data-target="#live-banner" data-slide-to="0" class="active"></li>
                                                    <li data-target="#live-banner" data-slide-to="1"></li>
                                                    <li data-target="#live-banner" data-slide-to="2"></li>
                                                  </ol>
                                                
                                                  <!-- Wrapper for slides -->
                                                  <div class="carousel-inner" role="listbox">
                                                    <div class="item active">
                                                      <img src="<?=base_url().'asisst/web_asset/'?>img/img2.jpg" />
                                                      
                                                    </div>
                                                    <div class="item">
                                                      <img src="<?=base_url().'asisst/web_asset/'?>img/img2.jpg" />
                                                     
                                                    </div>
                                                  
                                                  </div>
                                                
                                                  <!-- Controls -->
                                                  <a class="left carousel-control" href="#live-banner" role="button" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                  </a>
                                                  <a class="right carousel-control" href="#live-banner" role="button" data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                  </a>
                                            </div>
                    
                                        </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <iframe  width="100%" height="370" src="https://www.youtube.com/embed/<?= $video->video_link?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>


  





                                 
                                    </div>
                                </div>
                                <?php

                                $x++;}
                        }
                        ?>

                    </ul>

                    <div class="col-xs-12 text-center">
                        <button class="btn btn-load read-more" id="loadMore">مشاهدة أكثر</button>
                       
                    </div>

                </div>


            </div>
        </div>
    </div>
</section>


<!--
<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="col-md-3 col-sm-4 col-xs-12" id="firstDiv">
            <h4 class="sidebar_title"> المركز الإعلامى </h4>
            <div class="menu_sidebar">
                <ul class="list-unstyled" >
                    <li class=""><a href="<?=base_url().'Web/news'?>">أخبار الجمعية </a></li>
                    <li><a href="<?=base_url().'Web/gallery'?>">مكتبة الصور</a></li>
                    <li><a href="<?=base_url().'Web/videos'?>">مكتبة الفيديوهات</a></li>
                    <li class="active"><a href="<?=base_url().'Web/live_videos'?>">فيديوهات البث المباشر</a></li>
                    <li><a href="#">الجمعية فى الصحافة</a></li>
                    <li><a href="<?=base_url().'Web/reports'?>">التقارير</a></li>
                    <li><a href="<?=base_url().'Web/system'?>">الأنظمة و اللوائح</a></li>
                    <li><a href="<?=base_url().'Web/plans'?>">الخطة التشغيلية</a></li>   
                </ul>
            </div>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12 " id="secondDiv">
            <div class="background-white content_page">
                <div class="gallery_videos pbottom-20">
                    <div class="well well-sm">فيديوهات البث المباشر</div>
                    <ul id="myList" class="list-unstyled">
                        <?php
                        if (isset($videos) && !empty($videos)){
                            $x=0;
                            foreach ($videos as  $video){
                                                 if(!empty($video->from_date_ar)){
                                                     $form_date =explode('-',$video->from_date_ar);
                                                     $form_date =$form_date[2].'-'.$form_date[1].'-'.$form_date[0];

                                                 }else{
                                                     $form_date ='';
                                                 }
                                                    if(!empty($video->to_date_ar)){
                                                    $to_date =explode('-',$video->to_date_ar);
                                                    $to_date =$to_date[2].'-'.$to_date[1].'-'.$to_date[0];
                                                    }else{
                                                        $to_date ='';
                                                    }
                                ?>

                                <li class="col-sm-12 ">
                                    <div class="box-video">
                                        <h5 class=""><?= $video->title?> <span style="float:left"> تاريخ بداية الوقف : <?= $form_date?>  - تاريخ نهاية الوقف <?= $to_date?> </span> </h5>
                                        <div class="arqam-cont">
                                            <div class="days" id="days<?=$x?>">00</div>
                                            <div class="hours" id="hours<?=$x?>">00</div>
                                            <div class="min" id="min<?=$x?>">00</div>
                                            <div class="secends" id="secends<?=$x?>">00</div>
                                         </div>
                                         <div class="asmaa-cont">
                                            <div class="days" >أيام</div>
                                            <div class="hours" >ساعات</div>
                                            <div class="min" >دقائق</div>
                                            <div class="secends">ثواني</div>
                                         </div>
                                        <iframe width="100%" height="515" src="https://www.youtube.com/embed/<?= $video->video_link?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </li>
                        <?php

                                $x++; }
                        }
                        ?>

                    </ul>

                    <div class="col-xs-12 text-center">
                        <button class="btn btn-load read-more" id="loadMore">مشاهدة أكثر</button>
                        <!--<button class="btn btn-load" id="showLess">مشاهدة أقل</button>-->

                    </div>

                </div>


            </div>
        </div>
    </div>
</section>-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<script>



function countDown () {
    var myarr = JSON.parse( '<?php echo json_encode($videos); ?>' );

 var i;
    for(i=0; i<myarr.length ; i++){





        var now         = new Date(),
            eventDateTo   = new Date(myarr[i].to_date_ar),
            currentTimeTo = now.getTime(), // number of millisecends
            eventTimeTo   = eventDateTo.getTime(), // number of millisecends
            remTimeTo     = eventTimeTo - currentTimeTo ,

            secTo  = Math.floor( remTimeTo / 1000 ),
            minTo  = Math.floor( secTo / 60 ),
            hurTo  = Math.floor( minTo / 60 ),
            daysTo = Math.floor( hurTo / 24 );


        secTo %= 60;
        minTo %= 60;
        hurTo %= 24;
        
        
        
        document.getElementById('days'+i).textContent    = daysTo;
        document.getElementById('hours'+i).textContent   = hurTo;
        document.getElementById('min'+i).textContent     = minTo;
        document.getElementById('secends'+i).textContent = secTo;











     var now         = new Date(),
            eventDateFrom   = new Date(myarr[i].from_date_ar),
            currentTimeFrom = now.getTime(), // number of millisecends
            eventTimeFrom   = eventDateFrom.getTime(), // number of millisecends
            remTimeFrom     =     currentTimeFrom  -  eventTimeFrom ,

            secFrom  = Math.floor( remTimeFrom / 1000 ),
            minFrom  = Math.floor( secFrom / 60 ),
            hurFrom  = Math.floor( minFrom / 60 ),
            daysFrom = Math.floor( hurFrom / 24 );


        secFrom %= 60;
        minFrom %= 60;
        hurFrom %= 24;


       document.getElementById('days_a'+i).textContent    = daysFrom;
        document.getElementById('hours_a'+i).textContent   = hurFrom;
        document.getElementById('min_a'+i).textContent     = minFrom;
        document.getElementById('secends_a'+i).textContent = secFrom;

        


        setTimeout( countDown , 1000);

    }


};

countDown();

 
</script>

