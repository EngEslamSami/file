
<?php if (isset($all_data) && !empty($all_data) && $all_data !=null ){
        $s3odi =  0 ;
        $mokim = 0 ;

foreach($all_data as $record){


        if ($record->nationality == 1 ){
            $s3odi++;
        }else{
            $mokim++;
        }

}
        ?>
        <table  style="width: 50%;margin-right: 30%;" class=" display table table-bordered   responsive nowrap" cellspacing="0" >
            <thead>
            <tr class="info">
                <th>عدد المحكوم عليهم سعوديون</th>
                <th>عدد المحكوم عليهم سعوديون</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $s3odi;?></td>
                    <td><?php echo $mokim;?></td>
                </tr>

            </tbody>
        </table>
        <table id="" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="info">
                <th>#</th>
                <th>إسم المتبرع</th>
                <th>عدد المتابعات</th>
            </tr>
            </thead>
            <tbody>
            <?php  $s=0;foreach ($all_data as $record){ $s++;?>
                <tr>
                    <td><?php  echo $s;?></td>
                    <td><?php  echo  $record->nazeel_name?></td>
                    <td><?php  echo  $record->num?></td>
                </tr>

            <?php }?>
            </tbody>
        </table>



    <?php }else{
        echo '<div class=" col-sm-12 alert alert-info alert-dismissable">
                    <a href="#" class="" style="color: black"  data-dismiss="alert" aria-label="close">
                        <i class="fa fa-times-circle-o fa-lg" aria-hidden="true"></i></a>
                    <strong> لأ توجد تقارير  متابعة السجناء خلال فترة  !</strong> .
                </div>';
    }
    ?>




