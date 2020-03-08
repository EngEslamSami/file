<style>
    button.add_lgna {
        width: auto;
        background-color: #4a59b4;
        border-color: #4c59a7;
        color: #fff;
        padding: 5px 25px;
        border-radius: 0;
    }
    button.add_lgna:hover{
        color: #fff;
        -webkit-transition-duration: .3s;
        transition-duration: .3s;
    }
    .top{
        background-color: #f5f5f5  !important;
        padding:10px  !important;
    }
    .top2{
        background-color: #d9edf7  !important;
        padding:10px  !important;
    }
    .th-back{
        background-color: #6096b3 !important;
        color: #fff;
    }

</style>
<div class="col-xs-12 " >

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-sm-12 ">
                <!-- Button trigger modal -->

               <a href="<?php echo base_url(); ?>family_controllers/LagnaMembers/member_form">
                   <button type="button" class="btn btn-purple w-md m-b-5 "
                           style="background-color: #6096b3; color: #fff;padding: 5px 6px;font-size: 16px;">
                    <span><i class="fa fa-plus-o" ></i></span>  إضافة أعضاء اللجان
                </button></a>

                <!-- Modal -->
            </div>
            <div class="col-xs-12 col-sm-12 ">

                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center th-back">م</th>
                        <th class="text-center th-back">اسم اللجنه</th>
                        <th class="th-back">رقم اللجنه</th>
                        <th class="th-back">حذف اللجنه</th>
                        <th class="th-back">اسماء اعضاء اللجنه</th>
                        <th class="th-back">وظيفه العضو</th>
                        <th class="th-back">حذف العضو</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x=1;

                    if(isset($records)&&!empty($records)) {
                        foreach ($records as $record) {
                            $count = sizeof($record->members);

                            ?>

                            <tr>

                            <td style="border-bottom: 3px solid #ddd !important"
                                rowspan="<?php echo $count; ?>"><?php echo $x; ?></td>
                            <td style="border-bottom: 3px solid #ddd !important"
                                rowspan="<?php echo $count; ?>"><?php echo $record->lagna_name; ?> </td>
                            <td style="border-bottom: 3px solid #ddd !important"
                                rowspan="<?php echo $count; ?>"><?php echo $record->lagna_num; ?></td>
                            <td style="border-bottom: 3px solid #ddd !important"
                                rowspan="<?php echo $count; ?>">

                                <a href="<?php echo base_url(); ?>family_controllers/LagnaMembers/delete_lgna/<?php echo $record->lagna_num;?>"onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </br> <small style="color: red;">تنبيه هام جدا! عند الضغط ع هذا الزر</br> يتم حذف اللجنه بالكامل</small>
                            </td>
                            <?php
                            if (isset($record->members) && !empty($record->members)){

                                foreach ($record->members as $member) {
                                    $z = 1;
                                    ?>
                                    <td <?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                                        <?php echo $member->member_num; ?>
                                    </td>
                                    <td<?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                                        <?php echo $member->member_job; ?>
                                    </td>
                                    <td <?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                                        <a href="<?php echo base_url(); ?>family_controllers/LagnaMembers/delete_member/<?php echo $member->id;?>"onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                    </tr>


                                    <?php
                                    $z++;
                                }
                            }?>




                            <?php
                            $x++;
                        }

                    }else{?>
                        <td colspan="6"><div style="color: red; font-size: large"> لم يتم اضافه اي لجان الي الان</div> </td>

                    <?php  }?>



                    </tbody>
                </table>




            </div>
        </div>
    </div>
</div>
