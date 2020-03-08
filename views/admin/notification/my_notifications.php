
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">


<?php
if(isset($notification)&& !empty($notification)){
?>

    <table class="table-bordered table  example">
    <thead>
    <tr class="greentd">
        <th>م</th>
        <th>الاشعار</th>
        <th>التاريخ</th>
        <th>الفتره</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(isset($notification)&& !empty($notification)){
        foreach ($notification as $row){

            $date_end=strtotime($row->date);
            $date_now=strtotime(date("Y-m-d H:i:s"));
            $diff = abs( $date_now -$date_end);
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 -$months*30*60*60*24)/ (60*60*24));
            $hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
            $minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);
            $seconds = floor(($diff - $years * 365*60*60*24- $months*30*60*60*24 - $days*60*60*24- $hours*60*60 - $minutes*60));




            ?>
    <tr>

        <td><?php echo '#';?></td>
        <td><?php echo $row->message; ?></td>
        <td><?php echo date("Y-m-d",$date_end); ?></td>
        <td>
            <?php
            if($years >0 && $months> 0 )
            {
                echo 'منذ '.$years.'سنوات ' .'و '.$months.'شهر' ;
            }
            elseif($years>0 && $months==0 )
            {
                echo 'منذ '.$years.'سنوات ' .'و '.$days.'يوم' ;
            }

            elseif($months>0 && $years==0 )
            {
                echo 'منذ '.$months.'شهر ' .'و '.$days.'يوم' ;
            }
            elseif($days > 0 && $months==0){
                echo 'منذ '.$days.'يوم ' .'و '.$hours.'ساعه' ;

            }

            elseif($hours > 0 && $days==0 ){
                echo 'منذ '.$hours.'ساعه ' .'و '.$minutes.'دقيقه' ;

            }
            elseif($minutes > 0 && $hours==0 ){
                echo 'منذ '.$minutes.'قيقه ' .'و '.$seconds.'ثانيه' ;

            }
            elseif($seconds > 0 && $minutes==0 ){
                echo 'منذ '.$seconds.'ثانيه '  ;

            }
            ?> </td>

    </tr>
    <?php } } ?>


    </tbody>
</table>

<?php } else{ ?>

<div class="alert alert-danger">عفوا!.....لاتوجد اشعارات</div>


<?php } ?>
            </div>
        </div>
        </div>
