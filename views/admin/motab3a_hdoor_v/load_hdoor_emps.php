<?php
if(isset($emps)&& !empty($emps)){
    $x=1;

    foreach ($emps as $row){?>



        <tr>
            <td><?php echo $x ;?></td>

            <td><?php echo $row->name ;?></td>
            <td><?php echo $row->emp_nationl_num ;?></td>
            <td><?php echo $row->adminstration ;?></td>
            <td><?php echo $row->department ;?></td>
            <td><?php echo date("h:i:s",$row->time_hdoor_absence) ;?></td>

        </tr>

        <?php  $x++ ;  } } ?>