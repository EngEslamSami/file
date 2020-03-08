<section class="main_content pbottom-30 ptop-30">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php
                $data['id_page']=$id_page;
                $data['name_page']=$name_page;
                $this->load->view('web/family_profile/profile_sidebar',$data); ?>
            </div>
            <div class="col-sm-9">

                <!-- resumt -->

<!--                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>-->
                <div class="panel panel-default">
                    <?php if ((isset($data))&&(!empty($data))){ ?>
                    <div class="panel-heading "  >
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="col-xs-12 col-sm-6">
                                    <ul class="list-group">
                                        <li class="list-group-item"><strong>الإسم الأب :</strong><?=$data[0]->father_name?>
                                        </li>
                                        <li class="list-group-item"><strong>رقم سجل الاب :</strong><?=$data[0]->f_national_id?></li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <ul class="list-group">
                                        <li class="list-group-item"><strong>الإسم الأم :</strong><?=$data[0]->mother_name?>
                                        </li>
                                        <li class="list-group-item"><strong>رقم سجل الأم :</strong><?=$data[0]->mother_national_num_fk?></li>
                                        </li>
                                        <li class="list-group-item"><i class="fa fa-phone"></i> <?=$data[0]->m_mob?></li>

                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <table class="table table-responsive  " style="background-color: white">
                                        <thead>
                                        <tr>
                                            <th>أسم الإبن</th>
                                            <th>رقم هوية الإبن</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($data as $key=>$row){
                                            if(!is_numeric($key)){
                                                break;
                                            }
                                            ?>
                                        <tr>
                                            <td><?=$row->member_full_name?></td>
                                            <td><?=$row->member_card_num?></td>
                                        </tr>
                                        <?php

                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div >
                    <?php } ?>
                    <div class="bs-callout bs-callout-danger">
                        <h4>البرامج المشترك بها</h4>

                    </div>
                    <div class="bs-callout bs-callout-danger">
                        <h4>البرامج المشترك بها</h4>
                        <ul class="list-group">
                            <li class="list-group-item">برنامج اكفلنى الخير القائم بالمملكة العربية العودية</li>
                            <li class="list-group-item">برنامج اكفلنى الخير القائم بالمملكة العربية العودية</li>
                            <li class="list-group-item">برنامج اكفلنى الخير القائم بالمملكة العربية العودية</li>
                            <li class="list-group-item">برنامج اكفلنى الخير القائم بالمملكة العربية العودية</li>
                            <li class="list-group-item">برنامج اكفلنى الخير القائم بالمملكة العربية العودية</li>
                            <li class="list-group-item">برنامج اكفلنى الخير القائم بالمملكة العربية العودية</li>
                            <li class="list-group-item">برنامج اكفلنى الخير القائم بالمملكة العربية العودية</li>

                        </ul>
                    </div>

                </div>

            </div>

                <!-- resume -->

        </div>
    </div>

</section>

