

<section class="main_content">
    <div class="container-fluid">

        <div class="news_page">

            <div class="col-md-8">
                <div class="news_item_details">
                    <div class="title">
                        <h5><?php  echo $records['title'];?> </h5>
                        <p class="publisher"><i class="fa fa-user"></i> الناشر :  <?php  echo $records['publisher'];?>  <span>/</span> <i class="fa fa-calendar"></i> تاريخ اليوم :<?php  echo date('Y-m-d',$records['date']);?> </p>
                    </div>
                    <div id="single_news_slider" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                        <?php if(isset($records_images) && $records_images != null){
								    $x=0;
                                    foreach($records_images as $images){
								     if($x == 0){
								        $active ='class="active"';
								     }else{
								        $active='';
								     } ?>
                                     <li data-target="#single_news_slider" data-slide-to="<?php echo $x; ?>" <?php echo $active; ?> ></li>
                                     <?php
                                     $x++;   
								    }
								} ?>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            
                            <?php if(isset($records_images) && $records_images != null){
								    $xz=0;
                                    foreach($records_images as $imagesd){
                                        if($xz == 0){
								        $active_item ='active';
								     }else{
								        $active_item='';
								     }
                                       $xz++;
                                       ?>
                                <div class="item <?php echo $active_item; ?>">
                                <img src="<?php echo base_url().'uploads/images/'?><?php echo $imagesd->img; ?>" alt="...">
                                <div class="carousel-caption">

                                </div>
                                </div>
                                
                                       <?php
                                       
                                        }
                                        }
                                        ?>

                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#single_news_slider" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#single_news_slider" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="details">
                        <p >"<?php  echo $records['content'];?>"</p>
                    </div>
                </div>
                <div class="share text-center">
                    <!-- AddToAny BEGIN -->
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                        <a class="a2a_button_facebook"></a>
                        <a class="a2a_button_twitter"></a>
                        <a class="a2a_button_google_plus"></a>
                    </div>
                    <script>
                        var a2a_config = a2a_config || {};
                        a2a_config.linkname = "Alrashed";
                        a2a_config.linkurl = "http://demoatheer.xyz/design/alrashed/";
                        a2a_config.num_services = 22;
                    </script>
                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                    <!-- AddToAny END -->




                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="title">
                        <h6>أخبار متعلقة</h6>
                    </div>
                    <div class="related_news">
                        <ul class="list-unstyled">
                           
                           <?php  
                                if(isset($records_others)&& $records_others != null ){
                                foreach($records_others as $other){ ?>
                                <li>
                                <a href="<?php echo base_url().'Web/news_details/'.$other->id ?>">
                                     <?php if(isset($other->photos)){
                            $src='"'.base_url().'"asisst/web_asset/img/news/1.jpg"';
                           }else{
                            $src ='"'.base_url().'uploads/images/'.$other->photos[0]->img.'"';
                           } ?>
                           	<img class="img-responsive" src="<?php echo $src; ?>" width="80" height="80">
					        	<p><?php echo character_limiter($other->title,40) ; ?></p>
                                    <p class="publisher"><i class="fa fa-user"></i> الناشر :  <?php echo $other->publisher;  ?>  <span>/</span> <i class="fa fa-calendar"></i> تاريخ اليوم :<?php echo date('Y-m-d',$other->date);  ?> </p>
                                </a>
                            </li>
                            
                            <?php 
                            }
                            }
                            ?>
                           
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>





