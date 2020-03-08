



<input type="hidden" id="order_id" value="<?php echo $result->id ?>">
<div class="col-xs-12 no-padding">
    <table class="table">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  إسم الموظف </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($result->emp_name)){ echo $result->emp_name ;} ?></td>
            <td style="width: 135px;"><strong>  الرقم الوظيفي</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($result->emp_code_fk)){ echo $result->emp_code_fk ;} ?></td>
            <td style="width: 150px;"><strong>المسمى الوظيفي </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($result->mosama_wazefy)){ echo $result->mosama_wazefy ;}?></td>
        </tr>
        <tr>
            <td> <strong>  الإدارة </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($result->edara_n)){ echo $result->edara_n ;}?></td>
            <td>  <strong> القسم </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($result->qsm_n)){ echo $result->qsm_n ;}?></td>
            <td><strong> التاريخ </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($result->order_date_ar)){ echo $result->order_date_ar ;} ?></td>

        </tr>
       
        </tbody>
    </table>



</div>

<div class="piece-box">
    <div class="piece-heading">
        <h6>&nbsp  المدير المباشر</h6>
    </div>
    <div class="piece-body" >
        <div class="col-xs-12 ">
            <h5 class="text-center">الأستاذ / <?=$result->direct_manger_n?>   المحترم</h5>

            <h5>  &nbsp &nbsp&nbsp&nbsp مسمى الوظيفة : <?=$result->direct_manger_mosama_wazefy?></h5>

            <h6>  &nbsp &nbsp&nbsp&nbsp نظراً لـ <?=$result->nazran_to?> فقد تم تكليفكم بإنجاز العمل التالي :</h6><br>

            <h6>&nbsp &nbsp&nbsp&nbsp  -	<?= nl2br($result->work_assigned_details)?></h6>

            <!--  <h6 class="text-center">&nbsp   على أن يتم ذلك خلال اليوم/الأيام والأوقات المحددة أدناه </h6><br>
                                                            <h6 class="text-center">وألا تتجاوز عدد الساعات (  <?=$result->total_hours?>   ) ساعة / ساعات .     وجزاكم الله خيراً ،،،</h6><br>

-->
        </div>
        <div class="clearfix"></div> <br>
        <div class="col-xs-12 no-padding">
            <?php if(!empty($result->details)){ ?>
                <table class="table table-bordered table-striped ">
                    <thead>
                    <tr class="greentd">
                        <th>التاريخ</th>
                        <th>من الساعة</th>
                        <th>إلى الساعة</th>
                        <th>المدة</th>
                        <th>البدل الأضافي</th>
                        <th>العمل المكلف بإنجازه</th>
                    </tr>
                    </thead>
                    <?php $z=1; foreach ($result->details as $record){

                        ?>
                        <?php $bdal_type_arr =array(0=>'بدل نقدي',1=>'بدل أيام الراحة');?>
                        <tbody >
                        <tr class="">
                            <td><?=$record->date_ar ?></td>
                            <td><?=$record->from_hour?></td>
                            <td><?=$record->to_hour?></td>
                            <td><?=$record->num_hours?></td>
                            <td>   <?php if($record->bdal_type_fk ==1){ echo 'بدل أيام الراحة';}elseif($record->bdal_type_fk ==0){ echo'بدل نقدي';}?></td>
                            <td><?=$record->work_assigned?></td>
                        </tr>

                        </tbody>
                        <?php $z++;} ?>
                </table>
            <?php } ?>
        </div>

    </div>

</div>
