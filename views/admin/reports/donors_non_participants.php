
<!--------------------------------------------------------------------->
<div class="r-program">
    <div class="container">
        <div class="col-sm-11 col-xs-12">
            <?php
            $data_main['donations']='donations';
         //   $this->load->view('admin/finance_resource/main_tabs',$data_main); ?>
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
                                        <th class="text-center">إسم الكفيل</th>
                                        <th class="text-center">نوع الكافل</th>
                                        <th class="text-center">رقم الجوال</th>
                                        <th class="text-center">عرض</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    <?php $a=0;
                                    foreach ($members as $row){ $a++;
                                        $type=array(1=>'فرد',2=>' مؤسسة');
                                        if( $row->programs >0 ){
                                            continue;
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td> <?php echo $row->user_name ;?></td>
                                            <td> <?php echo $type[$row->donor_type] ;?></td>
                                            <td> <?php echo $row->guaranty_mob ;?></td>
                                            <td><a href="<?php echo base_url().'Finance_resource/edit_donors_guaranty/'.$row->id.'/view'?>"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
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




