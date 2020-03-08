
<?php

                if (isset($details) && $details != null){
                    $x= 1;

                    foreach ($details as $row){

                     
                                ?>
                                <tr >
                                    <td><?=$x++?></td>

                                    <td>
                                       <?= $row->ezn_rkm?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row->type_ezn==1){
                                            echo "تبرعات عينية";
                                        } elseif ($row->type_ezn==2){
                                            echo "مشتريات عينية";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $row->ezn_date_ar?></td>
                                    <td><?= $row->storage_name?></td>
                                    <td><?= $row->person_name?></td>
                                    <td><?= $row->person_jwal?></td>

                                </tr>
                                <?php

                    }
                    ?>





                    <?php
                }else{

                ?>
                    
                    <tr >
                        <td colspan="7">
                            <div class="col-md-12 alert alert-danger">عفوا لايوجد نتائج</div>

                        </td>
                    </tr>









<?php } ?>
<script>

    $('.myalert').attr('colspan',$('.myclass').length);
</script>
