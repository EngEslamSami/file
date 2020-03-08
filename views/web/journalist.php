<?php

$ar_months = array(
        1   =>  'يناير',
        2   =>  'فبراير',
        3   =>  'مارس',
        4   =>  'ابريل',
        5   =>  'مايو',
        6   =>  'يونيو',
        7   =>  'يوليو',
        8   =>  'أغسطس',
        9   =>  'سبتمبر',
        10  =>  'أكتوبر',
        11  =>  'نوفمبر',
        12  =>  'ديسمبر'
    );
 ?>

<section id="blog">
    <div class="container">
        <div class="section-title text-center">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2 class="text-uppercase line-bottom-center mt-0">أخر  <span class="text-theme-colored font-weight-600">أخبار</span> الجمعية</h2>
                    <div class="title-icon">
                        <i class="flaticon-charity-hand-holding-a-heart"></i>
                    </div>
                 
                </div>
            </div>
        </div>


        <div class="section-content">
            <div class="row">
               <?php if(isset($records) && $records != null){
                      foreach($records as $jo){ ?>
                   <div class="col-xs-12 col-sm-6 col-md-4">
                    <article class="post clearfix mb-sm-30 bg-silver-light">
                        <div class="entry-header">
                            <div class="post-thumb thumb">
                                <?php $photo = unserialize($jo->image); ?>
                           <?php if(isset($photo)){
                            $src='"'.base_url().'"asisst/web_asset/img/news/1.jpg"';
                           }else{
                            $src ='"'.base_url().'uploads/images/'.$photo[0].'"';
                           } ?>
                           	<img class="img-responsive" src="<?php echo $src; ?>" alt="img">
						
                           
                            </div>
                        </div>
                        <div class="bg-theme-colored p-5 text-center">
                         <!--   <span class=""><i class="fa fa-share-alt text-white"></i>24 مشاركة</span>
                            <span class=""><i class="fa fa-commenting-o  text-white"></i> 214 تعليق</span>
                            <span class=""><i class="fa fa-heart-o  text-white"></i> 895 إعجاب</span>-->
                        </div>
                        <div class="entry-content p-20 pr-10">
                            <div class="entry-meta media">
                                <div class="entry-date media-left text-center flip bg-theme-colored ">
                                    <ul>
                                        <li class=""><?php echo date('d',$jo->date_day);?></li>
                                        <li class=""><?php echo $ar_months[date('n',$jo->date_day)]; ?></li>
                                    </ul>
                                </div>
                                <div class="media-body">
                                    <div class="event-content pull-left flip">
                                        <h4 class="entry-title text-white text-uppercase"><a href="<?php //echo base_url().'Web/news_details/'.$jo->id ?>"> <?php  echo $jo->title?></a></h4>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-10"><?php echo character_limiter($jo->content,40) ; ?></p>
                            <a href="<?php //echo base_url().'Web/news_details/'.$jo->id ?>" class="btn btn-default btn-sm btn-theme-colored mt-10">قراءة الخبر</a>
                        </div>
                    </article>
                </div>
              <?php 
              
              }
               } ?>
       
          
            </div>
            <div class="row text-center">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                       <?php if(isset($links) && $links != null){
                            echo $links;
                        } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>





