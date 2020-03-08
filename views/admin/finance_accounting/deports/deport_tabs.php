<div class="col-xs-12 r-side-table">
    <div class="col-sm-9">
       <a href="<?php echo base_url()?>Dashboard/finance">  <h4> <span> <i class="fa fa-briefcase" aria-hidden="true"></i></span>   الشؤون المالية والمحاسبة  </h4> </a>
    </div>
    <div class="col-sm-3">
     <h5> <?php echo $_SESSION['user_username']?></h5>
     <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
    </div>
</div>
<div class="col-xs-12 r-bottom">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
     
            
            
            
           <li class="<?php if(isset($tab_1)) echo 'active' ?>"><a href="<?php echo base_url()?>">ترحيل  </a></li>
     
                

        </ul>
    </div>

</div>