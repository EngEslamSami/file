
<?php

                if (isset($details) && $details != null){
                    $x= 1;

                    foreach ($details as $row){

                     
                                ?>
                                <tr >
                                    <td><?=$x++?></td>

                                    <td>
                                       <?= $row->proc_rkm?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row->proc_type==1){
                                            echo " رصيد أول المدة";
                                        } elseif ($row->proc_type==2){
                                            echo " فروقات أرصدة";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $row->proc_date_ar?></td>
                                    <td><?= $row->storage_name?></td>


                                </tr>
                                <?php

                    }
                    ?>





                    <?php
                }else{

                ?>
                    
                    <tr >
                        <td colspan="5">
                            <div class="col-md-12 alert alert-danger">عفوا لايوجد نتائج</div>

                        </td>
                    </tr>









<?php } ?>
<script>

    $('.myalert').attr('colspan',$('.myclass').length);
</script>
