      <?php
      function createTreeView($array) {
          echo  '<ul class="sidebar-menu">';
          echo  '<li class="active">
                      <a href="#" ><i class="fa fa-home"></i><span class="blue_spanbackground">الرئيسية </span>
      									<span class="pull-right-container">
      									</span>
                      </a>
                  </li>';
          foreach ($array as $row){
              if(sizeof($row->sub) > 0 ){
                   subLevels($row->sub,$row->page_title,$row->page_icon_code);
              }else{
                  echo  '<li><a href="'.base_url().$row->page_link.'">'.$row->page_title.'</a></li>';
              }
          }// end foreach
          echo  '</ul>';
      }
      function subLevels($array,$page_title ,$page_icon_code)
      {
          echo '<li class="treeview">
                   <a href="">
                          <i class="'.$page_icon_code.'"></i>
                          
                          <span class="menu_title">' . $page_title . ' </span>
      									<span class="pull-right-container">
      										<i class="fa fa-angle-left pull-right"></i>
      									</span>
                      </a>';
          if (sizeof($array) > 0 && !empty($array)) {
          echo ' <ul class="treeview-menu">';
              foreach ($array as $row) {
                  if (isset($row->sub) && sizeof($row->sub) > 0) {
                      subLevels($row->sub, $row->page_title ,$row->page_icon_code);
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
          <!-- sidebar -->
          <div class="sidebar">
              <!-- sidebar menu -->
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