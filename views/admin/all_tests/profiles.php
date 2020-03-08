     
   <div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h6><?=$title?></h6>
                </div>
            </div>  
       <div class="panel-body">
     <?php
     /*
     echo '<pre>';
     print_r($records);
     echo '<pre>';*/
     ?>
     
      <link href="<?php echo base_url()?>asisst/admin_asset/ali/css/stylecrm2.css" rel="stylesheet" type="text/css"/>
     
     
     
     
    <?php if(isset($records)&&$records!=null){?>
      <?php foreach ($records as $record ){ 
        
        $standard = array("0","1","2","3","4","5","6","7","8","9");
$eastern_arabic_symbols = array("٠","١","٢","٣","٤","٥","٦","٧","٨","٩");
$current_date = date('d').'-'.date('m').'-'.date('Y');
$arabic_date = str_replace($standard , $eastern_arabic_symbols , $current_date);
        ?>
    
                   <div class="col-sm-12 col-md-3">
                     <div class="card" style="background: #078d91c7;color: white;">
                        <div class="card-header">
                           <div class="card-header-headshot"></div>
                        </div>
                        <div class="card-content"> 
                           <div class="card-content-member text-center">
                              <h6 class="m-t-0 text-violet "><?php echo $record->program; ?></h6>
                              <p class="m-t-0 text-violet"><?php echo $record->activity; ?></p>
                              <p class="m-t-0 text-violet"> من <?php echo $record->from_date; ?> إلي <?php echo $record->to_date; ?> </p>
                           </div>
                           <!--
                           <div class="card-content-languages">

                                       <table class="table table-bordered table-striped table-hover">
                                          <thead>
                                             <tr class="info">
                                                <th>Event Name</th>
                                                <th>start date</th>
                                             
                                             
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>العدد المستهدف </td>
                                                <td>25</td>
                                              
                                                
                                             </tr>
                                             <tr>
                                                <td>بيانات مالية </td>
                                                <td>500</td>
                                              
                                             
                                             </tr>
                                             <tr>
                                                <td> المسجلين حتي الأن </td>
                                                <td>6</td>
                                              
                                             
                                             </tr>
                                             
                                          </tbody>
                                       </table>
                                                           
                           </div> -->
                           <div class="card-content-summary">
                              <p><?php echo $record->prog_goals; ?></p>
                           </div>
                        </div>
                       
                        
                        
                        <div class="card-footer">
                           <div class="card-footer-stats">
                              <div style="background: #50ab20;">
                                 <p> مستهدفين</p>
                                 <i class="fa fa-users"></i><span style="font-size: 11px;"><?php echo $record->num; ?></span>
                              </div>
                              <div style="background: #428bca;" >
                                 <p> مسجلين</p>
                                 <i class="hvr-buzz-out fa fa-registered"></i><span style="font-size: 11px;"><?php echo   $record->all_members_registered ?></span>
                              </div>
                              <div style="background: #d49000;" >
                                 <p>تقدير مالي </p>
                                <i class="hvr-buzz-out fa fa-money"></i> <span style="font-size: 11px;"> <?php echo   $record->sum_finance ?> ريال</span>
                              </div>
                           </div>
                           <div class="card-footer-message">
                              <h6><i class="fa fa-comments"></i> التسجيل</h6>
                           </div>
                        </div>
                     </div>
                  </div>
    
    
    <?php } ?>
     <?php } ?>
   
  </div>  </div>  </div> </div>