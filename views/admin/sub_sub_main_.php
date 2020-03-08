<section class="sub_sub_icons col-xs-12">


  <?php  if (isset($sub_groups) && $sub_groups!=null && !empty($sub_groups)) { ?>
  
  <ul class="list-unstyled">
    <?php $x=0; foreach ($sub_groups as $row): ?>
    <li <?php if ($x ==0) {echo 'class="active"';}  ?>  >
      <a  href="<?php echo base_url().$row->page_link ?>">
        <div class="box_icon">
          
        <!--  <i class="<?php echo $row->page_icon_code?> fa-5x"></i> -->
            <img src="<?php echo base_url().'uploads/pages_images/thumbs/'.$row->page_image ?>" 
            onerror="this.src='<?php echo base_url()."asisst/admin_asset/"?>img/logo.png'"
             alt="" class="center-block"  width="100px" height="100px"/>
       
          <div class="text-center box_bottom">
            <a  href="<?php echo base_url().$row->page_link ?>"><?php echo $row->page_title?> 
          
            
            </a>
          </div>
        </div>
      </a>
    </li>
    <?php   $x++; endforeach;?>
  </ul>

  <?php  }?>
  <!--  -->





</section>
