
    <div class="col-sm-12 no-padding" >

            <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $title;  ?></h3>
                </div>
                <!--<div class="panel-body">
                    <div class="col-sm-12">

                    </div>
               </div>-->
                <div class="panel-body">
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#mine_1" aria-controls="mine_1" role="tab" data-toggle="tab"><span>طلباتي</span></a></li>
    <li role="presentation" class=""><a href="#follow_1" aria-controls="follow_1" role="tab" data-toggle="tab"><span>متابعة طلباتي</span></a></li>
    <li role="presentation" class=""><a href="#comming_1" aria-controls="comming_1" role="tab" data-toggle="tab"><span>الوارد</span></a></li>
</ul>

                    <div class="tab-content" id="tab-content1">
                        <br>
                        <div role="tabpanel" class="tab-pane fade active in" id="mine_1">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                                    <th>م</th>
                                    <th>نوع الإجازة</th>
                                    <th>بداية الإجازة</th>
                                    <th>نهاية الإجازة</th>
                                    <th>عدد الأيام المطلوبة</th>
                                    <th>التفاصيل</th>
                                    <th>الإجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($user_orders)) {
                                    $x=1;
                                    foreach ($user_orders as $row){
                                        $days = (strtotime($row->agaza_to_date_m) - strtotime($row->agaza_from_date_m)) / (60 * 60 * 24);

                                        ?>
                                        <tr>
                                            <td><?php echo $x;?></td>
                                            <td><?php echo $row->no3_title;?></td>
                                            <td><?php echo $row->agaza_from_date_m;?></td>
                                            <td><?php echo $row->agaza_to_date_m;?></td>
                                            <td><?=$days?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-xs"
                                              data-toggle="modal" data-target="#transformm">التفاصيل sdfsdf</button>
                                            </td>
                                            <td>
                                                <!--<a target="_blank" href="#">
                                                    <i class="fa fa-print" aria-hidden="true"></i> </a>-->
                                            </td>
                                        </tr>

                                        <?php $x++;} }else{ ?>
                                    <tr><td colspan="7" style="text-align: center;color: red">لا توجد طلبات  !</td></tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="follow_1">
                            <div class="modal modal-primary fade" id="followOrder15" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="width: 80%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">متابعة سير الطلب</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="quote-container">
                                                <blockquote class="note yellow">
                                                    عبدالرحمن محمد عبدالرحمن العجلان                                                <cite class="author text-center">طلب الأجازة</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سلطان محمد سليمان الجاسر                                                <cite class="author text-center">الموظف البديل</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    HASHIM ADAM OSMAN ABRAHIM                                                <cite class="author text-center">المدير المباشر</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سامي سليمان عبدالله العرف                                                <cite class="author text-center">شئون الموظفين (الموظف المختص)</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal modal-primary fade" id="followOrder16" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="width: 80%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">متابعة سير الطلب</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="quote-container">
                                                <blockquote class="note yellow">
                                                    صالح إبراهيم صالح القريعان                                                <cite class="author text-center">طلب الأجازة</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سلطان محمد سليمان الجاسر                                                <cite class="author text-center">الموظف البديل</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سامي سليمان عبدالله العرف                                                <cite class="author text-center">المدير المباشر</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سامي سليمان عبدالله العرف                                                <cite class="author text-center">شئون الموظفين (الموظف المختص)</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal modal-primary fade" id="followOrder14" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="width: 80%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">متابعة سير الطلب</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="quote-container">
                                                <blockquote class="note yellow">
                                                    مسعد السيد عبدالعزيز أحمد                                                <cite class="author text-center">طلب الأجازة</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    فاخر ماجد المرار الغزالي                                                <cite class="author text-center">الموظف البديل</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سلطان محمد سليمان الجاسر                                                <cite class="author text-center">المدير المباشر</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    HASHIM ADAM OSMAN ABRAHIM                                                <cite class="author text-center">شئون الموظفين (الموظف المختص)</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سامي سليمان عبدالله العرف                                                <cite class="author text-center">شئون الموظفين (مدير الشئون الإدارة)</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal modal-primary fade" id="followOrder12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="width: 80%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">متابعة سير الطلب</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="quote-container">
                                                <blockquote class="note yellow">
                                                    مسعد السيد عبدالعزيز أحمد                                                <cite class="author text-center">طلب الأجازة</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    وليد عبدالمجيد عبدالوهاب سراج الدين                                                <cite class="author text-center">الموظف البديل</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سليمان عبدالعزيز سليمان الراضي                                                <cite class="author text-center">المدير المباشر</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سامي سليمان عبدالله العرف                                                <cite class="author text-center">شئون الموظفين (الموظف المختص)</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    تركي بن علي منصور التركي                                                 <cite class="author text-center">شئون الموظفين (مدير الشئون الإدارة)</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سلطان محمد سليمان الجاسر                                                <cite class="author text-center">إعتماد المدير العام</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal modal-primary fade" id="followOrder13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="width: 80%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">متابعة سير الطلب</h5>
                                        </div>
                                        <div class="modal-body row">
                                            <div class="quote-container">
                                                <blockquote class="note yellow">
                                                    مسعد السيد عبدالعزيز أحمد                                                <cite class="author text-center">طلب الأجازة</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سامي سليمان عبدالله العرف                                                <cite class="author text-center">الموظف البديل</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سليمان عبدالعزيز سليمان الراضي                                                <cite class="author text-center">المدير المباشر</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سامي سليمان عبدالله العرف                                                <cite class="author text-center">شئون الموظفين (الموظف المختص)</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    تركي بن علي منصور التركي                                                 <cite class="author text-center">شئون الموظفين (مدير الشئون الإدارة)</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                                <blockquote class="note yellow">
                                                    سلطان محمد سليمان الجاسر                                                <cite class="author text-center">إعتماد المدير العام</cite>

                                                    <span class="word">أوافق</span>
                                                </blockquote>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                                    <th>م</th>
                                    <th>نوع الإجازة</th>
                                    <th>بداية الإجازة</th>
                                    <th>نهاية الإجازة</th>
                                    <th>عدد الأيام المطلوبة</th>
                                    <th>الطلب عند</th>
                                    <th>حالة الطلب</th>
                                    <th>طباعة الطلب</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($user_orders)) {
                                    $x=1;
                                    foreach ($user_orders as $row){
                                        $days = (strtotime($row->agaza_to_date_m) - strtotime($row->agaza_from_date_m)) / (60 * 60 * 24);

                                        ?>
                                        <tr>
                                            <td><?php echo $x;?></td>
                                            <td><?php echo $row->no3_title;?></td>
                                            <td><?php echo $row->agaza_from_date_m;?></td>
                                            <td><?php echo $row->agaza_to_date_m;?></td>
                                            <td><?=$days?></td>
                                            <td><?php echo $row->talab_in_title;?></td>
                                            <td><?php echo $row->talab_msg;?></td>
                                            <td>
                                                <!--<a target="_blank" href="#">
                                                    <i class="fa fa-print" aria-hidden="true"></i> </a>-->
                                            </td>
                                        </tr>

                                        <?php $x++;} }else{ ?>
                                    <tr><td colspan="7" style="text-align: center;color: red">لا توجد طلبات  !</td></tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="comming_1">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr class="info">
                                    <th>م</th>
                                    <th>نوع الإجازة</th>
                                    <th>بداية الإجازة</th>
                                    <th>نهاية الإجازة</th>
                                    <th>عدد الأيام المطلوبة</th>
                                     <th>level</th>
                                    <th>التفاصيل</th>
                                    <th>طباعة الطلب</th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php if(!empty($coming_records)) {
                                      $x=1;
                                    foreach ($coming_records as $row){
                                        $days = (strtotime($row->agaza_to_date_m) - strtotime($row->agaza_from_date_m)) / (60 * 60 * 24);

                                    ?>
                                    <tr>
                                        <td><?php echo $x;?></td>
                                        <td><?php echo $row->no3_title;?></td>
                                        <td><?php echo $row->agaza_from_date_m;?></td>
                                        <td><?php echo $row->agaza_to_date_m;?></td>
                                        <td><?=$days?></td>
                                         <td><?=$row->level?></td>
                                        
                                        <td>
                                            <button type="button" class="btn btn-warning btn-xs"
                                                    onclick="$('#transformLabel').html($(this).html());
                                                transformRequest(<?php echo $row->level;?>,
                                                    <?php echo $row->agaza_rkm;?>,<?php echo $row->current_from_user_id;?>,<?php echo $row->current_to_user_id;?>)" data-toggle="modal" data-target="#transform">التفاصيل</button>
                                        </td>
                                        <td>
                                            <!--<a target="_blank" href="#">
                                                <i class="fa fa-print" aria-hidden="true"></i> </a>-->
                                        </td>
                                    </tr>

                                <?php $x++;} }else{ ?>
                                    <tr><td colspan="7" style="text-align: center;color: red">لا توجد طلبات واردة !</td></tr>
                                <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>

    </div>




<!-------------------------------modals--------------------------->

<div class="modal  modal-success  fade" id="transform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"  id="transformLabel"></h4>
            </div>
            <div id="transformRequest"></div>
        </div>
    </div>
</div>



<script type="text/javascript">
    function transformRequest(level,agaza_rkm,fromUser,toUser) {

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations/Get_load_page',
            data:{level:level,agaza_rkm:agaza_rkm,fromUser:fromUser,toUser:toUser},
            dataType: 'html',
            cache:false,
            success: function(html){
                $("#transformRequest").html(html);
            }
        });

    }

</script>











