<div class="col-xs-12 r-side-table">
    <div class="col-sm-9">
        <h4> <span> <i class="fa fa-briefcase" aria-hidden="true"></i></span>  الموارد المالية </h4>
    </div>
    <div class="col-sm-3">
     <h5> <?php echo $_SESSION['user_username']?></h5>
     <h5>   اخر دخول  :  <?php echo date("Y-m-d",$_SESSION['last_login'])?></h5>
    </div>
</div>
<div class="col-xs-12 r-bottom">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
        <!--    <li class="active"><a href="<?php echo base_url()?>Finance_resource/donors"> المتبرعون  </a></li>
            <li><a href="<?php echo base_url()?>Finance_resource/all_guaranty"> الكفالات </a></li>
            <li><a href="<?php echo base_url()?>Finance_resource/all_endowments"> الاوقاف </a></li>
          -->  
            
             <?php
             
             
                 /* $arr=array('all_donors'=>"المتبرعون",
                              'all_guaranty'=>"الكفالات",
                              'all_endowments'=>"الاوقاف",
                              'donors'=>"إضافة متبرع",
                              'guaranty'=>"إضافة كفالة",
                              'add_endowments'=>"إضافة وقف"); */
                              
                       $arr=array('add_donors_guaranty'=>"إضافة كفيل - متبرع ",
                                  'all_guaranty'=>"الكفلاء",
                                  'all_donors'=>"المتبرعين ",
                                  'guaranty_application'=>"طلبات المتبرعين الواردة  ",
                                 'donors_application'=>"طلبات الكفلاء الواردة "
                              );       
                              
                              
                              
                              
                              ?>
                                          
                              
                      <?php foreach($arr as $key=>$value):
                          $active=''; 
                          if(isset($update_link) && $update_link !=null){
                           if($update_link == $key){ $active='class="active"';} 
                          }else{
                            if($this->uri->segment(2)== $key){ $active='class="active"';}  
                          } 
                           ?>
                              <li <?php echo $active;?>  ><a  href="<?php echo base_url()."Finance_resource/".$key?>">
                                          <?php echo $arr[$key]; ?> </a></li>
                       <?php endforeach; ?>
          <!--  
           <li class="<?php if(isset($ADD_MEMBER)) echo 'active' ?>"><a href="<?php echo base_url()?>General_assembly/add_member">إضافة عضو جمعية عمومية </a></li>
     -->
                
<li class="<?php if(isset($program)) echo 'active' ?>"><a href="<?php echo base_url()?>Programs_depart/programs/0">إضافة برنامج </a></li>
<li class="<?php if(isset($program_to)) echo 'active' ?>"><a href="<?php echo base_url()?>Programs_depart/programs_to/0">إضافة برنامج لكفيل </a></li>
<li class="<?php if(isset($program_to_oph)) echo 'active' ?>"><a href="<?php echo base_url()?>Programs_depart/ProgramsToOrphan">إضافة برنامج لليتيم </a></li>
           <li class="<?php if(isset($add_Payment_of_contributions)) echo 'active' ?>"> <a href="<?php echo base_url()?>Programs_depart/add_Payment_of_contributions">إشتراكات الكفلاء</a></li>
         
       <li class="<?php if(isset($program_to_3)) echo 'active' ?>"><a href="<?php echo base_url()?>Programs_depart/programs_to_kafel/0"> تقرير الكفيل </a></li>
       <li class="<?php if(isset($program_to_4)) echo 'active' ?>"><a href="<?php echo base_url()?>Programs_depart/programs_to_orphan/0"> تقرير الايتام </a></li>
       <li class="<?php if(isset($program_to_5)) echo 'active' ?>"><a href="<?php echo base_url()?>Programs_depart/programs_to_orphan_one/0"> تقرير اليتيم </a></li>
     <li class="<?php if(isset($program_to_6)) echo 'active' ?>"><a href="<?php echo base_url()?>Programs_depart/payment_kafel"> صرف إشتراكات</a></li>
  <li class="<?php if(isset($add_today_donations)) echo 'active' ?>"><a href="<?php echo base_url()?>Finance_resource/add_today_donations"> إضافة تبرعات إضافية </a></li>
  
  
  
   <?php
  $donationsS =  $this->uri->segment(2);
 
 ?>
        <li class="<?php if($donationsS == 'today_donations_period') echo 'active' ?>"><a href="<?php echo base_url()?>Finance_resource/today_donations_period">تقارير التبرعات خلال فترة </a></li>
 
 


        <li class="<?php if($donationsS == 'worthy_orphan_period') echo 'active' ?>">
        <a href="<?php echo base_url()?>Finance_resource/worthy_orphan_period">تقارير بما تم صرفه للأيتام خلال فترة </a></li>
 
  
 
 

        </ul>
    </div>

</div>