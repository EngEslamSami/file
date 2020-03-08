<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"> <?php echo $title; ?></h3>
    </div>
    <div class="panel-body">

        <div class="form-group col-md-3 padding-4">
            <label class="label">من تاريخ</label>
            <input type="date" class="form-control"  oninput="load_filter();" name="date_from" id="date_from" value="<?= date('Y-m-d')?>">

        </div>
        <div class="form-group col-md-3 padding-4">
            <label class="label">الي تاريخ</label>
            <input type="date" class="form-control"  oninput="load_filter();" name="date_to" id="date_to" value="<?= date('Y-m-d')?>">

        </div>
        <div class="form-group col-md-3 padding-4">
            <label class="label"> مستقبل الزياره</label>
            <select class="form-control" name="degree_id" id="degree_id" onchange="load_filter();">
                 <option value="">اختر</option>
                <?php
                  if (isset($all_emps) && !empty($all_emps)){
                      foreach ($all_emps as $row){
                          ?>
                          <option value="<?= $row->id ?>"><?= $row->employee?></option>

                          <?php
                      }
                      ?>

                <?php
                  }
                ?>
            </select>

        </div>
        <div id="body_table_filter">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="example">
                <thead>
                <tr class="greentd">
                    <th>م</th>
                    <th>التاريخ</th>
                    <th>وقت وصول الزائر</th>
                    <th>اسم الزائر </th>
                    <th>رقم الجوال </th>
                    <th>الفئه </th>
                    <th>الغرض من الزيارة </th>
                    <th>يرغب بالتواصل </th>
                    <th>وقت انتهاء الزيارة</th>
                    <th>الوقت المستغرق</th>

                    <th>الاجراء</th>
                    <th>مستقبل الزيارة</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $x=1;
                foreach($records as $row){
                    if($row->twasol==1)
                    {
                        $color="green";
                    }else{
                        $color="red";
                    }
                    $timeIn = strtotime($row->visit_time_start);
                    $timeOUT = strtotime($row->visit_time_end);
                    $defrent =  $timeOUT - $timeIn;
                    $hours = floor($defrent / 3600);
                    $minutes = floor(($defrent / 60) % 60);
                    $time_def ='اقل من دقيقة';
                    if($minutes > 0){
                        $time_def =$minutes.' دقيقة  ';
                        if($hours > 0){
                            $time_def .= $hours.' و ساعة ' ;
                        }
                    }




                    if(isset($f2at_arr[$row->fe2a]) and $f2at_arr[$row->fe2a] != null ){
                        $f2at =  $f2at_arr[$row->fe2a];
                    }else{ $f2at =  'غير محدد ';}


                    if(isset($row->name) and $row->name != null ){
                        $visitor_name =  $row->name;
                    }else{ $visitor_name =  'غير محدد ';}

                    if(isset( $yes_no[$row->twasol]) and  $yes_no[$row->twasol] != null ){
                        $twasol =   $yes_no[$row->twasol];
                    }else{ $twasol =  'غير محدد ';}






                    ?>
                    <tr>
                        <td><?php echo $x;?></td>
                        <td><?php echo date("Y-m-d",$row->visit_date);?></td>
                        <td><?php echo $row->visit_time_start ;?></td>
                        <td style="padding: 0;"><?php echo $visitor_name;
                            ?></td>
                        <td><?php echo $row->mob ;?></td>
                        <td><?php echo  $f2at ;?></td>
                        <td><?php echo word_limiter($row->purpose, 4) ;?>
                            <!-- <button type="button" class="btn btn-sm btn-primary"
                                        data-text="<?=$row->purpose?>" onclick="get_details($(this).attr('data-text'))" data-toggle="modal" data-target="#purpose_detail">
                                        المزيد
                                    </button>-->
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    onclick="get_text('<?= $row->purpose ?>','<?= $row->natega_visit ?>')"
                                    data-target="#purpose_detail">
                                تفاصيل
                            </button>
                        </td>
                        <td style="background-color: <?php echo $color;?>">
                            <?php echo $twasol ;?> </td>
                        <td><?php echo $row->visit_time_end ;?></td>
                        <td><?php echo $time_def ;?></td>

                        <td>
                            <!--***********/////////////////////////////********* 11 *****************//////////////-->
                            <?php
                            if($_SESSION['role_id_fk'] ==3) {
                                if ((isset($roles)) && (!empty($roles))) {
                                    if ($roles->edit == 1) {
                                        ?>
                                        <a href="<?php echo base_url(); ?>Public_relation/addGam3iaVisitors/<?php echo $row->id; ?>"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                    <?php }if ($roles->delet == 1) {
                                        ?>
                                        <a href="<?php echo base_url(); ?>Public_relation/deleteGam3iaVisitors/<?php echo $row->id; ?>"
                                           onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i
                                                class="fa fa-trash" aria-hidden="true"></i> </a>
                                    <?php }
                                    ?>


                                <?php } }else {
                                ?>
                                <a href="<?php echo base_url(); ?>Public_relation/addGam3iaVisitors/<?php echo $row->id; ?>"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                                <a href="<?php echo base_url(); ?>Public_relation/deleteGam3iaVisitors/<?php echo $row->id; ?>"
                                   onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i
                                        class="fa fa-trash" aria-hidden="true"></i> </a>
                                <?php
                            }
                            ?>
                            <!--///////////////////////***************************//////////////////////////////////****************-->
                        </td>





                        <td><?php if(!empty($row->degree_name)){
                                echo $row->degree_name;}else{
                                echo 'غير محدد';
                            }?></td>


                    </tr>
                    <?php
                    $x++;
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</div>


    <div class="modal fade" id="purpose_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-success" style="h">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تفاصيل الزيارة</h5>

                </div>
                <div class="modal-body">
                    <div class="panel panel-warning" style="box-shadow: 2px 2px 8px #000;">
                        <div class="panel-heading">
                            <h5 class="text-center">الغرض من الزيارة</h5>
                        </div>
                        <div class="panel-body">
                            <p id="ghared">
                            </p>
                        </div>
                    </div>


                    <div class="panel panel-info" style="box-shadow: 2px 2px 8px #000;">
                        <div class="panel-heading">
                            <h5 class="text-center">نتيجة الزيارة</h5>
                        </div>
                        <div class="panel-body">
                            <p id="natega"></p>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        function load_filter() {
            var date_from = $('#date_from').val();
            var date_to = $('#date_to').val();
            var degree_id = $('#degree_id').val();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>Public_relation/load_filter_page',
                data: {date_from:date_from,date_to:date_to,degree_id:degree_id},
                dataType: 'html',
                cache: false,
                success: function (html) {


                    $('#body_table_filter').html(html);

                }
            });
        }
    </script>
    <script>
        function get_text(ghared, natega) {
            $('#ghared').text(ghared);
            $('#natega').text(natega);
        }
    </script>