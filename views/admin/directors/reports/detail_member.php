<!-- update Modal1 -->
<?php
 $member_type = array('إختر','دائم','غير دائم','رجل اعمال','عضوية نسائية');
if(isset($record)&&!empty($record)){


?>

<div class="col-md-3" style="float: left;">
    <button style="float: left;" class="btn btn-success" onclick="printDiv('divName');"> طباعه</button>
</div>

<div class="col-sm-12 col-md-12 col-xs-12" style="padding-top: 20px;">
    <div class="top-line"></div><!--message of delete will be showen here-->
    <div class="panel panel-bd lobidrag" style="padding-top: 0;">
        <div class="panel-heading" style="">

        </div>
        <div id="divName">
            <div class="panel-body">
                <?php
                foreach ($record as $row) {
                     echo "اسم المجلس:" .$row->appointment_decison_number;
                    ?>


                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="visible-md visible-lg">
                            <th>مسلسل</th>

                            <th>اسم العضو</th>
                            <th>كود العضو</th>

                            <th>تاريخ التعيين</th>
                            <th>تاريخ الانتهاء</th>
                        <tbody>
                        <?php
                        if(isset($row->members)&&!empty($row->members )) {
                            $i=1;
                            foreach ($row->members as $row2) {
                                ?>

                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row2->member_name; ?></td>
                                    <td><?php echo $row2->member_code; ?></td>
                                    <td><?php echo date("Y-m-d",$row2->appointment_date);?> </td>
                                    <td><?php echo date("Y-m-d",$row2->expired_date);?> </td>



                                </tr>
                                <?php
                                $i++;
                            }
                        }else{?>
                            <tr>
                               <td colspan="5">لايوجد اعضاء</td>



                            </tr>
                            <?php
                        }
                        ?>



                        </tbody>
                    </table>
                    <?php
                }
                }
                ?>
            </div>
        </div>

    </div>
</div>

<script>
    function printDiv(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
