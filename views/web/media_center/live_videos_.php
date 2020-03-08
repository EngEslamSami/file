
<style>
.arqam-cont , .asmaa-cont{

    position: relative;
    font-size: 20px;
    display: flex;
    justify-content: center;
   
}
.arqam-cont div {
    margin: 1px 10px;
 color: #222;
    
    border-radius: 6px;
    width: 35px;
    height: 35px;
    line-height: 38px;
    text-align: center;
    font-size: 14px;

}
.asmaa-cont div {
    margin: 3px 10px;
    font-size: 14px;
    text-align: center;
    width: 35px;
    color: #222;

}
.arqam-cont:before{
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
                            foreach ($videos as  $video){
                                ?>

                                <li class="col-sm-12 ">
                                    <div class="box-video">
                                    <div class="well well-sm">
                                     <div class="col-sm-4 col-xs-12 padding-4">
                                        <h6><i class="fa fa-calendar-o" style="color: #96c73e;"></i>  منذ 10 أيام</h6>
                                     </div>
                                     <div class="col-sm-4 col-xs-12 padding-4">
                                            <h6><?= $video->title?></h6>
                                     </div>
                                     <div class="col-sm-4 col-xs-12 padding-4">
                                        <div class="arqam-cont">
                                            <div class="days" id="days">00</div>
                                            <div class="hours" id="hours">00</div>
                                            <div class="min" id="min">00</div>
                                            <div class="secends" id="secends">00</div>
                                         </div>
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

                            }
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


<script>



function countDown () {

    var now         = new Date(),
        eventDate   = new Date(2019, 11 , 20),
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

        document.getElementById('days').textContent    = days;
        document.getElementById('hours').textContent   = hur;
        document.getElementById('min').textContent     = min;
        document.getElementById('secends').textContent = sec;


        setTimeout( countDown , 1000);
};

countDown();

 
</script>

