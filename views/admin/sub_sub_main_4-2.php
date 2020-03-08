<style>

    @media (min-width: 992px){
        .col-md-20 {
            width: 20%;
        }

    }
    .index-icons .box {
        height: 180px;
    }




    #circle_counter{
        /* float: right; */
        width: 200px;
        /* height: 50px; */
        border: 2px solid;
        line-height: 24px;
        padding: 4px 8px;
        border-radius: 5px;
        background-color: #5b69bc;
        margin-right: 20px;
        color: white;
        display: inline-block;
        width: 200px;
        height: 150px;
    }
    #circle_counter  .counter{

        margin-top: 18px;
        display: block;
        font-size: 20px;
        color: #f8ffbf;
        font-weight: bold;

    }
    #circle_counter span{
        font-size: 20px;
    }
</style>



<section class="sub_sub_icons col-xs-12" style="padding-top: 0;">

  <?php
  $image_name ='asisst/admin_asset/img/logo-atheer.png';
  if(isset($_SESSION['main_data_info'])) {

    $image_name = 'uploads/images/' . $_SESSION['main_data_info']->logo;

    if (file_exists($image_name) == 1) {
      $image_name = "uploads/images/" . $_SESSION['main_data_info']->logo;
    } else {
      $image_name = 'asisst/admin_asset/img/logo-atheer.png';
    }
  }

  ?>
  <?php  if (isset($sub_groups) && $sub_groups!=null && !empty($sub_groups)) { ?>
  
  <ul class="list-unstyled">
    <?php $x=0; foreach ($sub_groups as $row): ?>
    <li <?php if ($x ==0) {echo 'class="active"';}  ?>  >
      <a  href="<?php echo base_url().$row->page_link ?>">
        <div class="box_icon">
          
        <!--  <i class="<?php echo $row->page_icon_code?> fa-5x"></i> -->
           <!-- <img src="<?php echo base_url().'uploads/pages_images/thumbs/'.$row->page_image ?>" 
            onerror="this.src='<?php echo base_url()."asisst/admin_asset/"?>img/logo.png'"
             alt="" class="center-block"  width="100px" height="100px"/>  -->
             
                       <img    src="<?php echo base_url().'uploads/pages_images/thumbs/'.$row->page_image ?>"
               onerror="this.src='<?php echo base_url()."$image_name"?>'"
               alt="" class="center-block " width="100px" height="100px" />
       
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
<!------------------------------------------------------------------------------------->

    <!-------------------------------------------------->
    <style>
        .balance_title{
            margin: 0;
            padding: 7px 0px;
            background-color: #1a5113;
            color: #fff;
        }
        .counter{
            /*display: block;
            width:100px;*/
        }
    </style>
    <?php if($this->uri->segment(4)==482) {
        $disp="block";
    }else{
        $disp="none";
    }
    ?>




    <div class="col-xs-12 no-padding" style="margin-top: 30px;display: <?= $disp ?>">

        <div class="col-md-12 text-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h2 style="margin: 0; color: white !important; font-size: 20px;">
                           إحصائيات الكفلاء
                        </h2>
                    </div>
                    <div class="panel-body">

                        <div id="circle_counter" style="background: green;">

                            <span>الأيتام</span>
                            <div class=" counter" data-count="<?php echo $all_data_count['aytam']['num']; ?>">0 </div>

                            <div style="width:50%;float: right;text-align: center">
                                <h5>غير مكفول</h5>
                                <div class=" counter" data-count="<?php echo $all_data_count['aytam']['not_guaranteed']; ?>">0 </div>
                            </div>
                            <div style="width:50%;float: right;text-align: center">
                                <h5> مكفول</h5>
                                <div class=" counter" data-count="<?php echo $all_data_count['aytam']['guaranteed']; ?>">0 </div>
                            </div>
                        </div>

                        <div id="circle_counter"  style="background: #b77b09;">

                            <span>الأرامل</span>
                            <div class=" counter" data-count="<?php echo $all_data_count['armal']['num']; ?>">0 </div>

                            <div style="width:50%;float: right;text-align: center">
                                <h5>غير مكفول</h5>
                                <div class=" counter" data-count="<?php echo $all_data_count['armal']['not_guaranteed']; ?>">0 </div>
                            </div>
                            <div style="width:50%;float: right;text-align: center">
                                <h5> مكفول</h5>
                                <div class=" counter" data-count="<?php echo $all_data_count['armal']['guaranteed']; ?>">0 </div>
                            </div>
                        </div>


                        <div id="circle_counter" style="background: #6d2147;">
                            <span>المستفيد البالغ</span>
                            <div class=" counter" data-count="<?php echo $all_data_count['mostafed']['num']; ?>">0</div>

                            <div style="width:50%;float: right;text-align: center">
                                <h5>غير مكفول</h5>
                                <div class=" counter" data-count="<?php echo $all_data_count['mostafed']['not_guaranteed']; ?>">0 </div>
                            </div>
                            <div style="width:50%;float: right;text-align: center">
                                <h5> مكفول</h5>
                                <div class=" counter" data-count="<?php echo $all_data_count['mostafed']['guaranteed']; ?>">0 </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>



  
        </div>
    </div>










</section>
