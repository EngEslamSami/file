
<?php
function createTreeView($array) {
    //var_dump($array);
  echo  '<ul id="respMenu" class="ace-responsive-menu flexcroll" data-menu-style="vertical">';
  echo  '<li class="active">
  <a href="'.base_url().'dash" ><i class="fa fa-home"></i><span class="blue_spanbackground">الرئيسية </span>

 </a>
</li>';
foreach ($array as $row){
  if(sizeof($row->sub) > 0 ){
   subLevels($row->sub,$row->page_title,$row->page_icon_code,$row->page_id/*,$row->sub[0]->page_id,$row->count_level*/);
 }else{
  echo  '<li><a href="'.base_url().$row->page_link.'">'.$row->page_title.'</a></li>';
}
          }
          echo  '</ul>';
        }


        function subLevels($array,$page_title ,$page_icon_code,$id/*,$group_id_fk,$level*/)
        {
                /*if($level > 0){
                  $link_to="Dash/mian_group/".$row->sub[0]->page_id ;
                }else{
                  $link_to="Dash/sub_sub_main/".$row->sub[0]->page_id.'/'.$row->sub[0]->page_id ;
                }*/
          echo '<li class="parent" >
          <a href=""  onclick="get_sub_pages('.$id.')" class="main-hd">
            <i class="'.$page_icon_code.'"></i>

            <span class="title"  onclick="get_sub_pages('.$id.')">' . $page_title . ' </span>

          </a>';
          if (sizeof($array) > 0 && !empty($array)) {
            echo ' <ul class="">';
            foreach ($array as $row) {
              if (isset($row->sub) && sizeof($row->sub) > 0) {
                subLevels($row->sub, $row->page_title ,$row->page_icon_code,$id);
              } else {
                echo '<li><a href="'.base_url().$row->page_link.'">' . $row->page_title . ' </a></li>';
              }
            }
            echo  '</ul>   ';
          }
          echo  ' </li>';
        }
        ?>
     <!--   <aside class="main-sidebar">
         
          <div class="sidebar">
            
            <?php if(isset($this->my_side_bar) && !empty($this->my_side_bar)){?>
            <?php createTreeView($this->my_side_bar);?>
            <?php }else{?>
            <ul class="sidebar-menu">

              <li class="active">
                <a href="<?php  echo  base_url()."Dash"?>"><i class="fa fa-tachometer"></i><span>home</span>
                  <span class="pull-right-container">
                  </span>
                </a>
              </li>
              <?php if(isset($this->main_groups) && $this->main_groups !=null  && !empty($this->main_groups)){
                foreach ($this->main_groups as $row){?>

                <?php if($row->count_level > 0){
                  $link_to="Dash/mian_group/".$row->sub[0]->page_id ;
                }else{
                  $link_to="Dash/sub_sub_main/".$row->sub[0]->page_id.'/'.$row->sub[0]->page_id ;
                }?>

                <li class="treeview">
                  <a href="<?php echo base_url().$link_to ?>">
                    <i class="<?php echo $row->sub[0]->page_icon_code?>"></i><span><?php echo $row->sub[0]->page_title?></span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <?php if(!empty($row->sub_pages)){ ?>
                  <ul class="treeview-menu">
                    <?php
                    foreach ($row->sub_pages as $one_page ) { ?>
                    <li><a href="<?php  echo base_url().$link_to ?>"><?php  echo $one_page->page_title?></a></li>
                    <?php }   ?>

                  </ul>
                  <?php }   ?>
                </li>

                <?php }   }?>
              </ul>
              <?php }?>
            </div>
          </aside>


 
-->
   

<aside class="main-sidebar">
  <div class="side-pad" id="firstDiv">
    <nav class="sidebar sidebar-index" id="">
      <div class="inner-sidebar">
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
          <h3>قائمة المنتجات</h3>
          <button type="button" id="menu-btn">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->

         <?php if(isset($this->my_side_bar) && !empty($this->my_side_bar)){?>
            <?php createTreeView($this->my_side_bar);?>
            <?php }else{?>

        <ul id="respMenu" class="ace-responsive-menu flexcroll" data-menu-style="vertical">
             <li class="active">
                <a href="<?php  echo  base_url()."Dash"?>" class="main-hd">
                <i class="fa fa-tachometer"></i>
                <span>home</span>
                </a>
              </li>
             <?php if(isset($this->main_groups) && $this->main_groups !=null  && !empty($this->main_groups)){
                foreach ($this->main_groups as $row){?>

                <?php if($row->count_level > 0){
                  $link_to="Dash/mian_group/".$row->sub[0]->page_id ;
                }else{
                  $link_to="Dash/sub_sub_main/".$row->sub[0]->page_id.'/'.$row->sub[0]->page_id ;
                }?>


                 <li class="parent">
                  <a href="<?php echo base_url().$link_to ?>" class="main-hd">
                    <i class="<?php echo $row->sub[0]->page_icon_code?>"></i>
                    <span><?php echo $row->sub[0]->page_title?></span>
                  </a>
                  <?php if(!empty($row->sub_pages)){ ?>
                  <ul>
                    <?php
                    foreach ($row->sub_pages as $one_page ) { ?>
                    <li><a href="<?php  echo base_url().$link_to ?>"><?php  echo $one_page->page_title?></a></li>
                    <?php }   ?>

                  </ul>
                  <?php }   ?>
                </li>

              <?php }   }?>
              </ul>
              <?php }?>

       <!--   <li class="parent">
            <a href="javascript:;">
              <i class="fa fa-cube" aria-hidden="true"></i>
              <span class="title">لاصقات حماية الشاشة</span>

            </a>
            <ul>
              <li>
                <a href="#">منتج فرعى رقم 1</a>
              </li>
              <li>
                <a href="#">منتج فرعى رقم 2</a>
              </li>
              <li>
                <a href="#">منتج فرعى رقم 3</a>
              </li>
              <li>
                <a href="#">منتج فرعى رقم 4</a>
              </li>
            </ul>
          </li>

          <li class="parent">
            <a href="javascript:;">
              <i class="fa fa-crop" aria-hidden="true"></i>
              <span class="title"> كابلات </span>
            </a>
            <ul>
              <li>
                <a href="javascript:;">
                  <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                  منتج فرعى رقم 1           
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-database" aria-hidden="true"></i>
                  منتج فرعى رقم 2
                </a>
              </li>
              <li class="parent">
                <a href="javascript:;">
                  <i class="fa fa-amazon" aria-hidden="true"></i>
                  منتج فرعى رقم 3             
                </a>
                <ul>
                  <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>منتج فرعى من فرعى 1</a></li>
                  <li class="parent">
                    <a href="javascript:;">
                      <i class="fa fa-diamond" aria-hidden="true"></i>منتج فرعى من فرعى 2
                    </a>
                    <ul>
                      <li><a href="#"><i class="fa fa-trash" aria-hidden="true"></i>منتج فرعى من فرعى 1</a></li>
                      <li><a href="#"><i class="fa fa-dashcube" aria-hidden="true"></i>منتج فرعى من فرعى 2</a></li>
                      <li><a href="#"><i class="fa fa-dropbox" aria-hidden="true"></i>منتج فرعى من فرعى 3</a></li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>منتج فرعى من فرعى 3</a></li>
                </ul>
              </li>

              <li>
                <a href="#">
                  <i class="fa fa-database" aria-hidden="true"></i>
                  منتج فرعى رقم 4
                </a>
              </li>
            </ul>
          </li>
          <li class="parent">
            <a class="" href="javascript:;">
              <i class="fa fa-graduation-cap" aria-hidden="true"></i>
              <span class="title">شواحن</span>

            </a>
            <ul>
              <li>
                <a href="#">منتج فرعى رقم 1
                </a>
              </li>
              <li class="parent">
                <a href="javascript:;">منتج فرعى رقم 2              
                </a>
                <ul>
                  <li><a href="#">منتج فرعى من فرعى 1</a></li>
                  <li><a href="#">منتج فرعى من فرعى 2</a></li>
                  <li><a href="#">منتج فرعى من فرعى 3</a></li>
                </ul>
              </li>
              <li class="parent">
                <a href="javascript:;">منتج فرعى رقم 3              
                </a>
                <ul>
                  <li><a href="#">منتج فرعى من فرعى 1</a></li>
                  <li><a href="#">منتج فرعى من فرعى 1</a></li>
                  <li><a href="#">منتج فرعى من فرعى 1</a></li>
                </ul>
              </li>
              <li>
                <a href="#">منتج فرعى رقم 4
                </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-heart" aria-hidden="true"></i>
              <span class="title">باوربانك</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-heart" aria-hidden="true"></i>
              <span class="title">سماعات</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-heart" aria-hidden="true"></i>
              <span class="title">كروت ذاكرة</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-heart" aria-hidden="true"></i>
              <span class="title">ساعات ذكية</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-heart" aria-hidden="true"></i>
              <span class="title">نظارات الواقع الافتراضي</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span class="title">سماعات بلوتوث</span>
            </a>
          </li>
          <li class="last ">
            <a href="javascript:;">
              <i class="fa fa-cube" aria-hidden="true"></i>
              <span class="title">آخرى</span>

            </a>
            <ul>
              <li>
                <a href="#">منتج فرعى رقم 1</a>
              </li>
              <li>
                <a href="#">منتج فرعى رقم 2</a>
              </li>
              <li>
                <a href="#">منتج فرعى رقم 3</a>
              </li>
              <li>
                <a href="#">منتج فرعى رقم 4</a>
              </li>
            </ul>
          </li>-->
      </div>
    </nav>
  </div>
</aside>











          <script>
            function get_sub_pages(valu)
            {
              window.location.href = "<?php echo base_url();?>Dash/mian_group/"+valu;
            }


          </script>