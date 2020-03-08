

<div class="col-sm-12 col-md-12 col-xs-12" style="padding-top: 0;">
    <div class="top-line"></div><!--message of delete will be showen here-->
    <div class="panel panel-bd lobidrag" style="padding-top: 0;">
        <div class="panel-heading" style="">

        </div>
        <div class="panel-body">
            <?php

            if(isset($records)&&!empty($records)){




                ?>

                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="visible-md visible-lg">
                        <th>مسلسل</th>
                        <th>رقم السند </th>

                        <th>قيمه السند</th>
                        <th>البيان </th>
                        <th>طريقه الدفع </th>
                        <th>الاجراء </th>

                    </tr>

                    </thead>
                    <tbody>
                    <?php
                    $x=1;
                    foreach($records as $row){?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <td><?php echo $row->id;?></td>
                            <td><?php echo $row->id;?></td>
                            <td><?php echo $row->id;?></td>
                            <td><?php echo $row->id;?></td>

                            <td>



<a href="<?php echo base_url();?>/all_secretary/Secretary/edit_trait/<?php echo $row->id;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

<a  href="<?php echo base_url();?>/all_secretary/Secretary/delete_trait/<?php echo $row->id;?>" onclick="return confirm('هل انت متاكد  من عمليه الحذفsssss؟');"><i class="fa fa-trash" aria-hidden="true"></i> </a>


                            </td>


                        </tr>
                        <?php
                        $x++;
                    }
                    ?>
                    </tbody>
                </table>
                <?php
            }
            ?>
        </div>

    </div>
</div>