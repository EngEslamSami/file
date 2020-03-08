<style>

@media (min-width: 768px){
    .sidebar-mini.sidebar-collapse .ace-responsive-menu > li:first-child:hover > a > span:not(.pull-right), 
    .sidebar-mini.sidebar-collapse .ace-responsive-menu > li:first-child:hover > ul{
     /*   display:none !important;*/
    }
}
</style>
<?php

//var_dump($this->my_side_bar[9]);die;
function createTreeView($array) {
    
  echo  '<ul id="respMenu" class="ace-responsive-menu flexcroll" data-menu-style="vertical">';
 /* echo  '<li class="active">
  <a href="'.base_url().'dash" ><i class="fa fa-home" style="background-color:#96c63e"></i><span class="blue_spanbackground mainLI">الرئيسية </span>

 </a>
</li>';*/
foreach ($array as $row){
  if(sizeof($row->sub) > 0 ){
   subLevels($row->sub,$row->page_title,$row->page_icon_code,$row->page_id,$row->bg_color);
 }else{
  echo  '<li><a href="'.base_url().$row->page_link.'">'.$row->page_title.'</a></li>';
}
          }
          echo  '</ul>';
        }


        function subLevels($array,$page_title ,$page_icon_code,$id,$bg_color,$level = false)
        {

          /*$link_to=base_url()."Dash/mian_group/".$id ;
          if ($level > 0) {
            $link_to=base_url()."Dash/sub_sub_main/".$id.'/'.$id ;
          }*/
          
            $link_to=base_url()."Dash/mian_group/".$id ;
          if(!empty($array)) {
              if ($level > 0 &&$array[0]->page_link==2) {
                  $link_to = base_url() . "Dash/sub_sub_main/" . $id . '/' . $id;
              }
          }
          
          
          echo '<li class="parent" >
          <a href="'.$link_to.'"  onclick="get_sub_pages('.$id.')" class="main-hd">
            <i class="'.$page_icon_code.'" style="background-color:'.$bg_color.'" ></i>

            <span class="title"  onclick="get_sub_pages('.$id.')">' . $page_title . ' </span>

          </a>';
          if (sizeof($array) > 0 && !empty($array)) {
            echo ' <ul class="">';
            //$link_to=base_url()."Dash/sub_sub_main/".$id.'/'.$id ;
            foreach ($array as $row) {
              if (isset($row->sub) && sizeof($row->sub) > 0) {
                $level = 1;
                if (isset($row->sub[0]->sub) && sizeof($row->sub[0]->sub) > 0) {
                  $level = false;
                }
                subLevels($row->sub, $row->page_title ,$row->page_icon_code,$row->page_id,$level);
              
              } else {
                echo '<li><a href="'.base_url().$row->page_link.'">' . $row->page_title . ' </a></li>';
              }
            }
            echo  '</ul>   ';
          }
          echo  ' </li>';
          
          

        }
        ?>
     
   

<aside class="main-sidebar">
  <div class="side-pad" id="firstDiv">
    <nav class="sidebar sidebar-index" id="">
      <div class="inner-sidebar">
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
          <h3>قائمة </h3>
          <button type="button" id="menu-btn">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->

         <?php if(isset($this->my_side_bar) && !empty($this->my_side_bar)){

          ?>
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