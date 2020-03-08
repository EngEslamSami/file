<?php
/*
echo '<pre>';
print_r($all_process);
echo '<pre>';*/

//$time = strtotime('2010-04-28 17:25:43');

/*echo time();
echo '<br/>';

    $action_time = 1534009633; 
      $time =  1534008311;

echo 'event happened '.humanTiming($time).' ago';

function humanTiming ($time)
{
   $action_time = 1534009633;
      $time =  1534008311;

    $time = $action_time - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}
*/
?>



<?php if(isset($all_process) && $all_process!=null):?>
    <div class="col-xs-12 " >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">جميع العمليات علي الأسر  </h3> 
            </div>
            <div class="panel-body">
                <!--------------------------------------------------------------------------------------------------------->
                <table class=" display table table-bordered table-striped table-hover">
                    <tr class="info">
                        <th>م </th>
                         <th>المستفيد </th>
                        <th>نوع العملية</th>
                        <th>من</th>
                        <th> الي</th>
                        <th>المطلوب تنفيذه </th> 
                        <th>التاريخ </th>
                        <th>الوقت</th>
                        <th>الإجراء علي الملف </th>
                        <th> ملاحظات </th>
                        <th> الطلب الأن عند  </th>
                        <th> الطلب الأن  </th>
                        <th>منذ</th>
                        
                    </tr>  <!-- Y-m-d H:i:s -->
                    <?php
                    /*
                    echo '<pre>';
                    print_r($all_process);
                    echo '<pre>';*/
                    $count=1; foreach($all_process as $row):?>
                        <tr>
                            <td><?php echo $row->id?></td>
                            <td><?php echo $row->mother_name ?></td>
                            <td><span class="label label-success m-r-15"> طلبات الأسر </span></td>
                            <td><?php //echo  $jobs_name[$row->family_file_from]->name 
                            echo  $row->user_name_from;
                            
                            ?></td>
                            <td><?php //echo  $jobs_name[$row->family_file_to]->name
                              echo  $row->user_name_to;
                            ?></td>
                            <td><?php
                               /* if($row->process ==1){
                                    $title =  ' قبول الملف';
                                    $class = 'success  ';
                                }elseif($row->process ==2){
                                     $title =  'رفض الملف';
                                      $class = 'danger';
                                }elseif($row->process ==3){
                                  //  echo 'للإطلاع عند'.$jobs_name[$row->family_file_to]->name;
                                  $title =  'تحويل الملف';
                                   $class = 'warning';
                                }elseif($row->process ==4){
                                     $title =   'اعتماد الملف';
                                      $class = 'success';
                                }*/
                                ?>
                                
                                <span class="label label-primary m-r-15"><?php echo $row->process_procedures_name; ?> </span>
                                
                            </td>
                            <td> <?php echo date("Y-m-d",$row->date);?></td>
                            <td> <?php  echo date(" H:i:s",$row->date_s)  ?></td>
                            <td><?php if($row->transformation_type ==1){
                                      $title_f =  ' قبول الملف';
                                       $class_f = 'success  ';
                                }elseif($row->transformation_type ==2){
                                   $title_f =  'رفض الملف';
                                       $class_f = 'danger';
                                }elseif($row->transformation_type ==3){
                                     $title_f =  'تحويل الملف';
                                      $class_f = 'warning';
                                }elseif($row->transformation_type ==4){
                                    $title_f =   'اعتماد الملف';
                                      $class_f = 'success';
                                }?>
                              
                                <span class="label label-<?php echo $class_f; ?> m-r-15"><?php echo $title_f; ?> </span>    
                                
                            </td>
                            <td><?php echo $row->transformation_note ?>
                           
                            </td>
                            <td><?php       echo  $row->user_name_to; ?>
                            <!--<button type="button" class="btn btn-warning btn-rounded"><i class="fa fa-cog fa-spin"></i></button>
                         -->
                            </td>
                            <td><?php
                            if( $row->action == 1){
                                      $title_action =   'تمت المهمة لديه';
                                      $class_action = 'success';
                                      $spn = 's';
                               
                           }elseif( $row->action == 0){
                                  $title_action =   'الطلب عنده الأن ';
                                  $class_action = 'warning';  
                                    $spn = '';
                           }
                            
                            ?>
                            <button type="button" class="btn btn-<?php echo $class_action; ?> btn-rounded">
                                 <i style="color: white;" class="fa fa-cog fa-spin<?php echo $spn; ?>"></i>
                                  <?php echo $title_action; ?> </button>
                            
                            </td>
                            <td>
                             <button type="button" class="btn btn-success btn-rounded">
                                 <i style="color: white;" class="fa fa-cog fa-spin"></i>
                                  <?php echo $row->time_ago;; ?> </button> 
                             
                            
                          </td>
                            
                        </tr>
                    <?php endforeach;?>
                </table>
                <!--------------------------------------------------------------------------------------------------------->
            </div>
        </div>
    </div>
<?php endif?>