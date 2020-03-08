<?php if(isset($this->groups) && $this->groups!=null && !empty($this->groups)){?>
  <section class="content-header col-xs-12">


  <div class="col-lg-12 col-xs-12">
    <div class="middle-navbar">
      <ul class="list-unstyled">
        <?php $x=0; foreach ($this->groups as $row): 
                     $check_url_two=$this->uri->segment(1)."/".$this->uri->segment(2);
                     $check_url_three=$this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                     $actived="";
                     $color = '';
                     if($this->uri->segment(2) == "sub_sub_main" ){
                        if ($x ==0) {
                            $actived='class="active"';
                            $color =  'red';
                            
                            }
                     }
                     if($check_url_two == $row->page_link || $check_url_three == $row->page_link){
                        $actived='class="active"';
                          $color =  'red';
                     } 
                       
                ?>
                <li <?php  echo $actived; ?>  >
                        <a style="color: <?php echo $color; ?>;"  href="<?php echo base_url().$row->page_link ?>"><?php echo $row->page_title?></a>
                    </li>
                    <?php   $x++; endforeach;?>

      </ul>
    </div>

  </div>

</section>
<?php  }?>



<div class="content" id="Main-content">
 <div class="row">
  <div id="preloading"></div><!--loading will be showen here-->


  <div class="box-body">
    <div id="messagebox">
    <?if (isset($_SESSION['message'])):?>
    <?php echo $_SESSION["message"];unset($_SESSION["message"])?>
    <?php endif;?>
    </div>
</div>
