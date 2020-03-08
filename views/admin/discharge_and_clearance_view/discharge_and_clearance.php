<style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 70%;
        margin: auto;
    }
</style>



<style type="text/css">

    .print_forma table th{
        text-align: center;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .body_forma{
        margin-top: 40px;
    }
</style>
<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <?php if(isset($result)):
                $out['form']='All_reports/update_discharge_and_clearance/'.$result['id'];
                $out['employee_id_fk']=$result['employee_id_fk'];
                $out['date']=$result['date_ar'];
                $out['id_number']=$result['id_number'];
                $out['personnel_section']=$result['personnel_section'];
                $validation ='';
                $aria='';
                else:
                    $out['form']='All_reports/add_discharge_and_clearance';
                    $out['employee_id_fk']='';
                    $out['date']='';
                    $out['id_number']='';
                    $out['personnel_section']='';
                    $validation ='required';
                    $aria='true';
                endif; ?>
                <?php    echo form_open_multipart($out['form'])?>
                 <div class="col-xs-12">
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> التاريخ:  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text" name="date" class="form-control date_melady" value="<?php echo $out['date'];?>" data-validation="<?php   echo$validation;?>">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> رقم السجل المدني: </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text" name="id_number"  class="form-control" id="id_number"  value="<?php echo $out['id_number'];?>">
                            </div>
                        </div>


                    </div>

                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> الموظف:  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <select name="employee_id_fk" id="employee_id_fk" class="no-padding form-control"
                                        data-show-subtext="true" data-live-search="true"  onchange="getId(this.value)" data-validation="<?php   echo$validation;?>"  aria-required="<?php  echo$aria;?>">
                                    <option value="">--قم بإختيار الموظف--</option>
                                    <?php
                                    if(isset($employees) && $employees != null)
                                        foreach($employees as $record){
                                            if(isset($out['employee_id_fk']) && $out['employee_id_fk'] == $record->emp_code)
                                                $select = 'selected';
                                            else
                                                $select = '';
                                            echo '<option value="'.$record->emp_code.'-'.$record->id_num.'" '.$select.'>'.$record->employee.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                      <!--  <div class="col-xs-12">
                            <div class="col-xs-6">
                                <h4 class="r-h4"> قسم شؤون الموظفين :  </h4>
                            </div>
                            <div class="col-xs-6 r-input">
                                <input type="text"  class="r-inner-h4 " name="personnel_section" id="personnel_section" value="<?php echo $out['personnel_section'];?>"  data-validation="<?php echo$validation;?>">
                            </div>
                        </div>
-->
                    </div>
                    <div class="col-xs-12 r-inner-btn">
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                            <input type="submit" role="button" name="add" value="حفظ" class="btn pull-right" />
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                    </div>
                </div>
                <?php echo form_close()?>
            <?php if(isset($records) && $records != null):?>
                <div class="col-xs-12">
                    <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="text-center">م</th>
                            <th class="text-center">التاريخ</th>
                            <th class="text-center">إسم الموظف</th>
                            <th class="text-center">التفاصيل</th>
                            <th class="text-center">الاجراء</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        $a=1;
                        foreach ($records as $row ):?>
                            <tr>
                                <td><?php echo $a ?></td>
                                <td><?php echo date('Y-m-d',$row->date);?></td>
                                <td><?php echo $row->name;?></td>
                                <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row->id;?>">التفاصيل</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal<?php echo $row->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">تفاصيل المخالصة</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <section class="print_forma">
                                                        <div class="container-fluid" id="printableArea<?php echo $row->id;?>">
                                                            <div class="header">
                                                                <table class="table table-bordered">
                                                                    <thead>
<th style="width:33.3%;" >جميعة بناء </th>
<th style="width:33.3%;">مخالصة و إبراء ذمة  </th>
<th style="width:33.3%;"><img src="<?php echo base_url()?>asisst/admin_asset/img/print_logo.png"></th>

                                                                    </thead>
                                                                </table>
                                                            </div>
                                                            <div class="body_forma">
                                                                <div class="form-group col-xs-6">
                                                                    <p><strong> اسم الموظفة :</strong> <?php echo $row->name;?>    </p>
                                                                </div>
                                                                <div class="form-group col-xs-6 text-center">
                                                                    <p><strong> السجل المدنى :</strong><?php echo $row->id_number;?>    </p>
                                                                </div>

<div class="content_form col-xs-12">
    <p>   أُقر أنا المـوقع أدناه بأنه قد وصلني من جميعة بناء  جميع مستحقاتي المالية و كافة حقوقي على مختلف أنواعها الناتجة عن عقد عملي و حتى انتهاء فترة خدمتي سواءً كان مصدرها الرواتب الأساسيـة أو البدلات النقـدية أو العينية أو ساعات العمل الإضافية أو الإجازات السنوية أو مدة الإنذار أو التعويض أو أي مصدر آخر عادي أو استثنائي .</p><br><br>

    <p>   وتبعاً لذلك فإنني أبرئ ذمة جميعة بناء  إبراءً شاملاً عاماً مطلقاً لا رجوع عنه مسقطاً لأي حق أو مطالبة حالية أو مستقبلية و من أي نوع أو شكل كان .</p>
</div>

                                                                <div class="form-group col-xs-6">
                                                                    <p><strong> اسم الموظف / الموظفة : </strong> <?php echo $row->name;?>    </p>
                                                                </div>
                                                                <div class="form-group col-xs-6 text-center">
                                                                    <p><strong> توقيع  : </strong> <?php echo $row->name;?>   </p>
                                                                </div>

                                                                <div class="form-group col-xs-12">
                                                                    <p><strong> التاريخ  : </strong>  .....................  </p>
                                                                    <br><br><br>
                                                                </div>




                                                                <div class="form-group col-xs-6">
                                                                    <p><strong> قسم شؤون الموظفين :  </strong> .....................    </p>
                                                                    <p><strong> التوقيع :  </strong> .....................    </p>
                                                                </div>
                                                                <div class="form-group col-xs-6 text-center">
                                                                    <p><strong> إدارة الجمعية   : </strong> .....................   </p>
                                                                    <p><strong> التوقيع :  </strong> .....................    </p>

                                                                </div>


                                                                <div class="form-group col-xs-12">
                                                                    <p><strong> التاريخ  : </strong>  <?php echo date('Y-m-d',$row->date);?> <strong> الموافق  :  </strong> <?php echo $row->date_ar;?></p>

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"   style="float-left: " class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </td>
                                <td> <a href="<?php  echo base_url().'All_reports/delete_discharge_and_clearance/'.$row->id.""?>"> <i class="fa fa-trash" aria-hidden="true"></i> </a> <span>
                                    </span>  <a href="<?php echo base_url().'All_reports/update_discharge_and_clearance/'.$row->id?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                               <button type="button"  onclick="printDiv('printableArea<?php echo $row->id;?>')" class="btn btn-info btn-xs" >طباعة</button></td>
                            </tr>

                            <?php
                            $a++;
                        endforeach;  ?>

                        </tbody>
                    </table>

                </div>
            <?php endif;?>

        </div>
    </div>
</div>




<script>
    function getId(num) {
        var str = num;
        var res = str.split("-");
        if(res[1]){
            document.getElementById("id_number").value = res[1];
            document.getElementById("id_number").readOnly = true;
        }
        if(res[1] ==''  && res[1] ==0){
            document.getElementById("id_number").value = '';
            $("#id_number").attr('data-validation','required');
        }
    }

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    
</script>
















<!------------------------------------------------------------->

