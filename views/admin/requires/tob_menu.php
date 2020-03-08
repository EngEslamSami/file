


<?php




if(isset($this->groups_top_menu) && $this->groups_top_menu!=null && !empty($this->groups_top_menu)){?>
  <section class="content-header col-xs-12">


  <div class="col-lg-12 col-xs-12">
    <div class="middle-navbar">
      <ul class="list-unstyled">
        <?php $x=0; foreach ($this->groups_top_menu as $row):
            if($row->page_link=='#'){
                continue;
            }
        
        
         $page_link=explode("/",$row->page_link);
                $total=count($page_link);
                 $method= $page_link[$total-1];

;





        
        
        
        
                       $check_url_two=$this->uri->segment(1)."/".$this->uri->segment(2);
                        $check_url_three=$this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3);
                       $actived="";
                       $color = '';

                     
                          if(base_url(uri_string())===base_url().$row->page_link) {

                            $actived='class="active"';
                            $color =  'red';
                            

                     }
                       
                ?>
                <li <?php  echo $actived; ?>  >
                        <a  href="<?php echo base_url().$row->page_link ?>"><?php echo $row->page_title?></a>
                    </li>
                    <?php   $x++; endforeach;?>

      </ul>
    </div>

  </div>

</section>
<?php  }?>



<div class="content" id="Main-content" >
 <div class="row">
  <div id="preloading"></div><!--loading will be showen here-->


  <div class="box-body">
    <div id="messagebox">
    <?php if (isset($_SESSION['message'])):?>
    <?php echo $_SESSION["message"];unset($_SESSION["message"])?>
    <?php endif;?>
    </div>
</div>
