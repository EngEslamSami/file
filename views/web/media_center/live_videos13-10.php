
<style>
    .arqam-cont , .asmaa-cont{

        position: relative;
        font-size: 20px;
        display: flex;
        justify-content: center;

    }
    .arqam-cont div.square {
        margin: 1px 1px;
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
        
</style>



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

                                <li class="col-sm-12 no-padding">
                                    <div class="box-video">
                                        <div class="well well-sm" style="background: url(<?=base_url().'asisst/web_asset/'?>img/waqf-bg.png);">
                                            <div class="col-sm-3 col-xs-12 no-padding">
                                                 <div class="text-center">
                                                    <span class="rectangle-span">المنقضي</span>
                                                 </div>
                                                <div class="arqam-cont" style="font-family: 'arial';">
                                                     <div class="days square" id="Sdays<?=$x?>">0</div>
                                                    <div class="days square" id="Fdays<?=$x?>">0</div>
                                                    <div class="two-dot">:</div>
                                                    <div class="hours square" id="Shours<?=$x?>">0</div>
                                                    <div class="hours square" id="Fhours<?=$x?>">0</div>
                                                    
                                                    <div class="two-dot">:</div>
                                                    <div class="min square" id="Smin<?=$x?>">0</div>
                                                    <div class="min square" id="Fmin<?=$x?>">0</div>
                                                    
                                                    <div class="two-dot">:</div>
                                                    <div class="secends square" id="Ssecends<?=$x?>">0</div>
                                                    <div class="secends square" id="Fsecends<?=$x?>">0</div>
                                                    
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
                                                <!--<div class="arqam-cont" style="font-family: 'arial';">
                                                     <div class="days square" id="Sdays<?=$x?>">0</div>
                                                    <div class="days square" id="Fdays<?=$x?>">0</div>
                                                    <div class="two-dot">:</div>
                                                    <div class="hours square" id="Shours<?=$x?>">0</div>
                                                    <div class="hours square" id="Fhours<?=$x?>">0</div>
                                                    
                                                    <div class="two-dot">:</div>
                                                    <div class="min square" id="Smin<?=$x?>">0</div>
                                                    <div class="min square" id="Fmin<?=$x?>">0</div>
                                                    
                                                    <div class="two-dot">:</div>
                                                    <div class="secends square" id="Ssecends<?=$x?>">0</div>
                                                    <div class="secends square" id="Fsecends<?=$x?>">0</div>
                                                    
                                                </div>-->
                                                <div class="asmaa-cont">
                                                    <div class="days" >أيام</div>
                                                    <div class="hours" >ساعات</div>
                                                    <div class="min" >دقائق</div>
                                                    <div class="secends">ثواني</div>
                                                </div> 
                                            </div>


                                        </div>


                                        <iframe width="100%" height="515" src="https://www.youtube.com/embed/<?= $video->video_link?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </li>
                                <?php

                                $x++;}
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


<script>



function countDown () {
    var myarr = JSON.parse( '<?php echo json_encode($videos); ?>' );

 var i;
    for(i=0; i<myarr.length ; i++){

        var now         = new Date(),
           eventDate   = new Date(myarr[i].to_date_ar),
            currentTime = now.getTime(), // number of millisecends
            eventTime   = eventDate.getTime(), // number of millisecends
            remTime     = eventTime - currentTime ,

            sec  = Math.floor( remTime / 1000 ),
            min  = Math.floor( sec / 60 ),
            hur  = Math.floor( min / 60 ),
            days = Math.floor( hur / 24 );


        sec %= 60;
        min %= 60;
        hur %= 24;

        if ( days.toString().length == 2 ) {
              document.getElementById('Fdays'+i).textContent    = days.toString().split("")[0];
              document.getElementById('Sdays'+i).textContent    = days.toString().split("")[1];
        }
        else{
            document.getElementById('Fdays'+i).textContent    = "0";
            document.getElementById('Sdays'+i).textContent    = "0"; 
        }
        
        
        
        if ( hur.toString().length == 2 ) {
              document.getElementById('Fhours'+i).textContent     = hur.toString().split("")[0];
              document.getElementById('Shours'+i).textContent    = hur.toString().split("")[1];
        }
        else{
            document.getElementById('Fhours'+i).textContent    = "0";
            document.getElementById('Shours'+i).textContent    = "0"; 
        }
        
        
        if ( min.toString().length == 2 ) {
              document.getElementById('Fmin'+i).textContent     = min.toString().split("")[0];
              document.getElementById('Smin'+i).textContent    = min.toString().split("")[1];
        }
        else{
            document.getElementById('Fmin'+i).textContent    = "0";
            document.getElementById('Smin'+i).textContent    = "0"; 
        }
        
        if ( sec.toString().length == 2 ) {
              document.getElementById('Fsecends'+i).textContent     = sec.toString().split("")[0];
              document.getElementById('Ssecends'+i).textContent    = sec.toString().split("")[1];
        }
        else{
            document.getElementById('Fsecends'+i).textContent    = "0";
            document.getElementById('Ssecends'+i).textContent    = "0"; 
        }
        
        
        
        
    //    document.getElementById('days_title'+i).innerHTML    = '<i class="fa fa-calendar-o" style="color: #96c73e;"></i>' + ' منذ ' + days +' ايام ';
    //    document.getElementById('Fhours'+i).textContent   = hur;
   //     document.getElementById('Fmin'+i).textContent     = min;
    //    document.getElementById('Fsecends'+i).textContent = sec;


        setTimeout( countDown , 1000);

    }


};

countDown();

 
</script>

