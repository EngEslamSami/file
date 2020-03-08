      
      
      
       <div class="col-sm-1 col-xs-12 padding-2 r-side-icon">
           <?php if(isset($this->main_groups) && $this->main_groups !=null  && !empty($this->main_groups)){
           foreach ($this->main_groups as $row){?>

               <?php if($row->count_level > 0){
                   $link_to="Dash/mian_group/".$row->sub[0]->page_id ;
               }else{
                   $link_to="Dash/sub_sub_main/".$row->sub[0]->page_id.'/'.$row->sub[0]->page_id ;
               }?>

           <a href="<?php echo base_url().$link_to ?>" class="tooltip">
               <img src="<?php echo base_url().'uploads/pages_images/thumbs/'.$row->sub[0]->page_image?>" alt="" class="center-block">
               <span class="tooltiptext"> <?php echo $row->sub[0]->page_title?> </span>
           </a>
           <?php }   }?>
          
            </div>
            