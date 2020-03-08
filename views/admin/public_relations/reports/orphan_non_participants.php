
<!--------------------------------------------------------------------->
<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data_main['donations']='donations';
         //  $this->load->view('admin/finance_resource/main_tabs',$data_main); ?>
            <div class="details-resorce">
                <?php
                if(!empty($members) && isset($members) && $members!=null ):?>
                    <div class="col-xs-12">
                        <div class="panel-body">

                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="text-center">م</th>
                                        <th class="text-center">إسم اليتيم</th>
                                        <th class="text-center">رقم هوية الأم</th>
                                        <th class="text-center">إسم الأب</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php $a=0;
                                    foreach ($members as $row){ $a++;
                                        if( $row->programs >0 ){
                                            continue;
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td> <?php echo $row->member_name ;?></td>
                                            <td> <?php if(!empty($mother_name[$row->mother_national_num_fk]->mother_national_num_fk)){ echo $mother_name[$row->mother_national_num_fk]->mother_national_num_fk;} ;?></td>
                                            <td> <?php if(!empty($father_name[$row->mother_national_num_fk]->f_first_name)){ echo $father_name[$row->mother_national_num_fk]->f_first_name;} ;?></td>
                                        </tr>
                                    <?php   }  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php else :?>
                    <div class="col-lg-12 alert alert-danger" >
                        لا توجدأيتام غير مشتركين ببرامج
                    </div>

                <?php endif;?>

            </div>
        </div>
    </div>
</div>


<!----------------------------------------------------->




