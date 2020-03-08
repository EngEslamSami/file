<div class="col-xs-12" >

            <!-- open panel-body-->

            <div class="r-cont">
                <?php  if (isset($groups) && $groups!=null && !empty($groups)) { ?>
                    <?php foreach ($groups as $row): ?>
                    	<?php if($row->count_level > 0){
								$link_to="Dash/mian_group/".$row->sub[0]->page_id ;
							}else{
								$link_to="Dash/sub_sub_main/".$row->sub[0]->page_id.'/'.$row->sub[0]->page_id ;
							}?>
                        <div class="col-md-3 col-sm-6">
                            <div class="r-stores">
                                <a href="<?php echo base_url().$link_to ?>">
          <img src="<?php echo base_url().'uploads/pages_images/thumbs/'.$row->page_image ?>"
           onerror="this.src='<?php echo base_url()."asisst/admin_asset/"?>img/logo.png'"
            alt="" class="center-block" />
                                    <h3 class="text-center"> <?php echo  $row->page_title?> </h3>
                                </a>
                            </div>
                        </div>
                    <?php endforeach;
                } ?>
            </div>

</div>    