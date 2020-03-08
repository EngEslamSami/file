



<input type="hidden" id="volunter_id" value="<?=$result->id ?>">
<div class="print_forma  col-xs-12 no-padding">
    <div class="piece-box">
        <div class="piece-heading   ">
            <h6>&nbsp بيانات الموظف</h6>
        </div>
        <div class="piece-body" style="padding-bottom: 0">
            <div class="col-xs-12 no-padding">
                <table class="table table-bordered" style="table-layout: fixed">
                    <tbody>
                    <tr>
                        <td style="width: 120px " class="green-bg">اسم الموظف</td>
                        <td><?php echo $result->emp_name ;?></span></td>
                        <td style="width: 120px " class="green-bg">الرقم الوظيفي</td>
                        <td style="width: 120px "><?php echo $result->emp_code ;?></td>
                        <td style="width: 120px " class="green-bg">رقم الهوية</td>
                        <td><?php echo $result->card_num ;?></td>
                    </tr>
                    </tbody>
                </table>

                <table class="table table-bordered" style="table-layout: fixed">
                    <tbody>
                    <tr>
                        <td style="width: 120px " class="green-bg">المسمى الوظيفي</td>
                        <td><?php echo $result->job_title ;?></span></td>
                        <td style="width: 70px " class="green-bg">الإدارة</td>
                        <td style=" "><?php echo $result->edara_name ;?></td>
                        <td style="width: 70px " class="green-bg">القسم</td>
                        <td><?php echo $result->qsm_name ;?></td>
                    </tr>
                    </tbody>
                </table>




            </div>
        </div>

    </div>
    <div class="piece-box">
        <div class="piece-heading  ">
            <div class="col-xs-3">
                <h6>المستفيد من خدمة التطوع </h6>
            </div>


            <div class="col-xs-3">
                <h6><?php if ($result->mostafed_type_fk ==0){echo "داخلى";}else{ echo "خارجى";}?></h6>


            </div>

        </div>

        <div class="piece-body" style="padding-bottom: 0">
            <div class="col-xs-12 no-padding">

                <table class="table table-bordered" style="table-layout: fixed">
                    <tbody>
                    <tr>
                        <td style="width: 120px " class="green-bg">الجهة/الإدارة</td>
                        <td><?php echo $result->mostafed_edara_name ;?></span></td>
                        <td style="width: 80px " class="green-bg">المسئول</td>
                        <td style=" "><?php echo $result->responsible ;?></td>
                        <td style="width: 80px " class="green-bg">الوظيفة</td>
                        <td><?php echo $result->job ;?></td>
                    </tr>
                    </tbody>
                </table>


                <table class="table table-bordered" style="table-layout: fixed">
                    <tbody>
                    <tr>
                        <td style="width: 80px " class="green-bg">الهاتف</td>
                        <td><?php echo $result->tele ;?></span></td>
                        <td style="width: 80px " class="green-bg">الجوال</td>
                        <td style=" "><?php echo $result->mob ;?></td>
                        <td style="width: 120px " class="green-bg">البريد الألكتروني</td>
                        <td><?php echo $result->email ;?></td>
                    </tr>
                    </tbody>
                </table>




            </div>
        </div>

    </div>


    <div class="piece-box">
        <div class="piece-heading ">
            <h6>&nbsp  الوصف</h6>
        </div>
        <div class="piece-body" >

            <table class="table table-bordered">
                <thead>
                <tr class="greentd">
                    <th>التاريخ</th>
                    <th>من الساعة</th>
                    <th>إلى الساعة</th>
                    <th>المدة</th>
                    <th>المكان</th>
                    <th>النشاط/البرنامج/الفعاليات</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $from_time = strtotime($result->from_time);
                $to_time = strtotime($result->to_time);
                ?>
                <tr>
                    <td><?php echo $result->volunteer_date_ar ;?></td>
                    <td><?php  if(!empty($from_time)){ echo date('h:ia',$from_time) ;}?></td>
                    <td><?php if(!empty($to_time)){  echo date('h:ia',$to_time); }?></td>
                    <td><?php echo $result->num_hours ;?></td>
                    <td><?php echo $result->place ;?></td>
                    <td> <?php echo $result->activities ;?></td>
                </tr>
                </tbody>

            </table>
            <div class="col-xs-12  under-line ">
                <h5>&nbsp  طبيعة العمل التطوعي</h5>
               <h5> <?php echo $result->volunteer_description ;?></h5>
            </div>
        </div>
    </div>
</div>