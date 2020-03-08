<style>
    @media (min-width: 992px) {
        .col-md-15 {
            float: right;
            width: 15%;
        }
        .col-md-20 {
            float: right;
            width: 20%;
        }
        .col-md-25 {
            float: right;
            width: 25%;
        }
        .col-md-30 {
            float: right;
            width: 30%;
        }
        .col-md-35 {
            float: right;
            width: 35%;
        }
        .col-md-40 {
            float: right;
            width: 40%;
        }
        .col-md-45 {
            float: right;
            width: 45%;
        }
        .col-md-50 {
            float: right;
            width: 50%;
        }
        .col-md-55 {
            float: right;
            width: 55%;
        }
    }
    .label-green-h {
        color: white;
        background-color: #428bca;
        border: 2px solid #428bca;
        margin: 0;
        padding: 8px 4px;
        font-size: 14px;
        height: 34px;
    }
    input[type=radio].pay_method {
    width: 20px;
        height: 20px;
}
    .radio-inline span{
        position: relative;
        top: 4px;
        margin-right: 3px;
    }
</style>
<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo$title;?></h3>
        </div>
        <div class="panel-body">



                <?php
                $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

                if(!empty($all_pills_inbox)){?>
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="example">
                        <thead>
                        <tr>
                            <th style="text-align: center !important;">م</th>
                            <th style="text-align: center !important;">رقم الإيصال</th>
                            <th style="text-align: center !important;">تاريخ الايصال</th>
                            <th style="text-align: center !important;">المحصل</th>
                            <th style="text-align: center !important;">البند </th>
                            <th style="text-align: center !important;">نوع الإيصال</th>
                            <th style="text-align: center !important;">طريقة التوريد</th>
                            <th style="text-align: center !important;">المبلغ </th>


                            <th style="text-align: center !important;">  <input class="check_all_not"  id="check_all_not" type="checkbox"
                                                                                onclick="check_all();"><label class="checktitle">  تحديدالكل </th>




                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x=0;
                        foreach($all_pills_inbox as $row){

                            if($row->person_type == 1){
                                if($row->person_type ==1){
                                    $name = $row->MemberDetails['k_name'];
                                }elseif ($row->person_type ==2){
                                    $name = $row->MemberDetails['d_name'];
                                }elseif ($row->person_type ==3){
                                    $name =$row->MemberDetails['name'];
                                }

                            }elseif($row->person_type == 0){
                                $name =$row->person_name;
                            }
                            ?>
                            <tr>
                                <td><?=$x+1?></td>
                                <td><?=$row->pill_num?></td>
                                <td><?=$row->pill_date?></td>
                                <td><?=$row->publisher_name?></td>
                                <td><?=$row->band_title?></td>
                                <td><?=$row->pill_type_title?></td>
                                <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
                                <td><?=$row->value?></td>


                                <td> <input class="check_large2 check_large"  type="checkbox">
                                        </td>

                            </tr>
                        <?php  $x++;   } ?>
                        </tbody>
                    </table>
                <?php  }  else { ?>
                    <div style="color: red; font-size: large;" class="col-sm-12">لم يتم  إضافة إيصالات !!</div>

                <?php } ?>

            <div class="clearfix"></div><br>

            <div class="col-md-12">
                <div class="form-group  col-md-40 col-sm-3 col-xs-12 no-padding" >
                    <div class="col-xs-3 no-padding">
                    <h5 class=" label-green-h   "> المحصلين  </h5>
                    </div>
                    <div class="col-xs-9 no-padding">
                    <select id="publisher" name="publisher" class="form-control  input-style"

                    <option value="">اختر</option>
                    <?php
                    if(isset($publishers)&&!empty($publishers)) {
                        foreach ($publishers as $row) {
                            ?>
                            <option value="<?php echo $row->publisher;?>"> <?php echo $row->publisher_name;?> </option>
                            <?php
                        }
                    }
                    ?>
                    </select>
                        </div>
                </div>


                <?php
                $method_arr =array(1=>'نقدي',2=>'شيك',3=>'تعاملات بنكيه');
                ?>
                <div class="form-group col-md-30 col-sm-3 col-xs-12 no-padding" >
                    <div class="col-xs-3 no-padding">
                    <h5 class="label-green-h "> طريقه التوريد  </h5>
                    </div>
                    <div class="col-xs-9 no-padding text-center">

                    <?php
                    if(isset($method_arr)&&!empty($method_arr)) {
                    foreach ($method_arr as $key=>$value) {
                    ?>

                    <label class="radio-inline" style="margin-top: 0px;">
                        <input type="radio" class="pay_method" name="pay_method" onchange="get_more($(this).val());" id="inlineRadio<?php echo $key?>" value="<?php echo $key ;?>">
                        <span><?php echo $value ;?></span>
                    </label>
                        <?php
                    }
                    }
                    ?>
                    </div>



                </div>
                <?php
              //  $multi_pays=array('إختر',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');
                 $multi_pays=array('اختر',3=>'شبكه',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');
                ?>
                <div class="form-group col-md-30 col-sm-3 col-xs-12 no-padding multi_sel" style="display: none;">
                    <div class="col-xs-4 no-padding">
                        <h5 class="label-green-h ">طريقة الدفع</h5>
                    </div>
                    <div class="col-xs-8 no-padding">
                        <select name="organization_employee[]"  id="type_pay"  class="choose-date selectpicker form-control  dep" multiple title="يمكنك إختيار أكثر من طريقه"  aria-required="true" data-show-subtext="true" data-live-search="true">
                            <option value=""> بـحــث . . . . </option>
                            <?php if(isset($multi_pays) && !empty($multi_pays) && $multi_pays !=null) {
                                foreach ($multi_pays  as $key=>$value){ ?>



                                    <option value="<?php echo $key ; ?>" ><?php echo $value ; ?></option>
                                <?php } }?>

                        </select>
                    </div>
                </div>
                </div>
            <div class="col-md-12">
                <div class="form-group col-md-25 col-sm-3 col-xs-12 no-padding ">
                    <div class="col-xs-4 no-padding">
                        <h5 class="label-green-h ">التاريخ من</h5>
                    </div>
                    <div class="col-xs-8 no-padding">
                        <input type="date" id="date_from" class="form-control">
                </div>
                </div>

                <div class="form-group col-md-25 col-sm-3 col-xs-12 no-padding " >
                    <div class="col-xs-4 no-padding">
                        <h5 class="label-green-h ">التاريخ الي</h5>
                    </div>
                    <div class="col-xs-8 no-padding">
                        <input type="date"  id="date_to" class="form-control">
                    </div>
                </div>
                
               <?php
                $arra =array('اختر', 1=>'قيد قديم',2=>'قيد حديث');
                ?>
                <div class="form-group col-md-25 col-sm-3 col-xs-12 no-padding" >
                    <div class="col-xs-4 no-padding">
                        <h5 class="label-green-h ">نوع القيد </h5>
                    </div>
                    <div class="col-xs-8 no-padding">

                        <select name=""  id=""  class="choose-date  form-control  dep">
                          
                            <?php if(isset($arra) && !empty($arra) && $arra !=null) {
                                foreach ($arra  as $key=>$value){ ?>



                                    <option value="<?php echo $key ; ?>" ><?php echo $value ; ?></option>
                                <?php } }?>

                        </select>
                    </div>  

            </div>

                <div class="col-md-25">
                    <button type="button" onclick="estlam();"   data-toggle="modal" data-target="#myModalInfo2" class="btn btn-success btn-next" style="float: right;">
                        استلام </button>

                </div>

        <div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width: 70%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                    </div>
                    <div class="modal-body">

                        <div  id="myDiv"></div>
                    </div>
                    <div class="modal-footer"  style="display: inline-block;width: 100%" >
                        <button type="submit" class="btn btn-success"
                                data-dismiss="modal">حفظ</button>
                        <button type="button" class="btn btn-danger"
                                 data-dismiss="modal">إغلاق</button>

                    </div>
                </div>
            </div>
        </div>


    </div>

    </div>

</div>
    <script>
        function estlam()
        {
            var date_to=$('#date_to').val();
            var date_from=$('#date_from').val();
            var publisher=$('#publisher').val();
            var pay_method= $(".pay_method:radio:checked").val();

            var type_pay=$('#type_pay').val();
            if(pay_method==3)
            {
              if(type_pay==null)
             {
                alert("من فضلك اختر نوع طريقه الدفع");
              return;
             }

           }
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>finance_accounting/box/pills/Pill/add_pill",
                data: {
                    publisher: publisher,
                    pay_method: pay_method,
                    date_to: date_to,
                    type_pay: type_pay,
                    date_from: date_from
                },
                success: function (d) {
                    if(d==0){
                        $('#myModalInfo').modal('hide');
                        alert("لايوجد ايصالات في هذه الفتره");
                    }else {
                        $('#myModalInfo').modal('show');
                        $('#myDiv').html(d);
                    }
                }

            });
        }



    </script>

<script>
    $('#my-select').multiSelect();

    function check_all() {

        var inputs = document.querySelectorAll('.check_large');
        var input = document.getElementById('check_all_not').checked;

        for (var i = 0; i < inputs.length; i++) {
            inputs[i].checked = input;

        }


    }

</script>

    <script>

        function get_more(id)
        {
           if(id==3)
           {
               $('.multi_sel').show();
           }else{
               $('.multi_sel').hide();

           }
        }

    </script>