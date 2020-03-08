<?php
if(isset($emps)&& !empty($emps)){
    $x=1;

    foreach ($emps as $row){?>
<?php if($row->type==1){
                     $class="success";
                      $type="حضور";
                      }
                      else {
                     $class="danger";
                      $type="انصراف";
                      }
                      ?>



             <tr>
                    <td><?php echo $x ;?></td>

                    <td><?php echo $row->name ;?></td>
                    <td><?php echo $row->emp_national_num ;?></td>
                    <td><?php echo $row->adminstration ;?></td>
                    <td><?php echo $row->department ;?></td>
                    <td><?php echo $row->dwam ;?></td>
                   <td> <button class="btn btn-<?php echo $class ; ?>"> <?php echo $type ; ?></button> </td>
                     <td><?php echo $row->time_hdoor_absence ;?></td>

                </tr>

        <?php  $x++ ;  } } ?>