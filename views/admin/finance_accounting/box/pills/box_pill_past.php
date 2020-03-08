<style>
    @media (min-width: 992px) {
        .col-md-10 {
            float: right;
            width: 10%;
        }
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
    font-weight: 600;
    color: #000;
    /* background-color: #428bca; */
    /* border: 2px solid #428bca; */
    margin: 0;
    padding: 8px 4px;
    font-size: 16px;
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
    
    .bs-actionsbox .btn-group button {
    width: 50% !important;
    float: right !important;
    margin: 0 !important;
}
    
    
    
    
        #circle_counter{
            float: right;
     width: 200px;
   /*  height: 50px;*/
    border: 2px solid;
    line-height: 24px;
    padding: 4px 8px;
    border-radius: 5px;
    background-color: #5b69bc;
    margin-right: 20px;
    color: white;
}
    #circle_counter  .counter{
    font-size: 20px;
    color: #f8ffbf;
    font-weight: bold;
    float: left;
}
  td input[type=checkbox],td  input[type=radio] ,
  th  input[type=checkbox],th  input[type=radio]{
    width: 18px;
    height: 18px;
    }  
    .form-group{
        font-family: 'hl';
    }
    .input-style {
    border-radius: 0px;
    border-right: 1px solid #ccc;
}
    
</style>

<!---------------------------------------------------------------------->
  
  <!--  <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">رصيد الصندوق</h3>
        </div>
        <div class="panel-body">
        
        <?php 

$total_naqdi = $all_qabd_naqdi - $all_sarf_naqdi;
$total_sheek = $all_qabd_sheek - $all_sarf_sheek;
        
  //echo $all_sandoq['total_nakdy'];   
  //$all_sandoq['total_cheq'];   
        ?>
        
         <div class="col-md-12 col-xs-12" >
            <div id="circle_counter" style="background: green;">
            <div class=" counter" data-count="<?php echo $total_naqdi; ?>">0 </div> 
            <span>نقدي</span>
            </div>

            <div id="circle_counter"  style="background: #b77b09;">
            <div class=" counter" data-count="<?php echo $total_sheek; ?>">0 </div> 
            <span>شيك</span> 
            </div>

            
             <div id="circle_counter" style="background: #6d2147; float: left;">
            <div class=" counter" data-count="0">0</div> 
            <span>عهد نقدية</span>
            </div> 
            
             </div>

</div>

</div>
-->


<!----------------------------------------------------------------------->

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo$title;?></h3>
        </div>
     <div class="panel-body"> 
      
      



                <?php
                $pay_method_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');


                ?>
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="example">
                        <thead>
                        <tr class="greentd">
                            <th style="text-align: center !important;">م</th>
                            <th style="text-align: center !important;">رقم الإيصال</th>
                            <th style="text-align: center !important;">تاريخ الايصال</th>
                            <th style="text-align: center !important;">المحصل</th>
                            <th style="text-align: center !important;">اسم المتبرع</th>
                            <th style="text-align: center !important;">البند </th>

                            <th style="text-align: center !important;">طريقة التوريد</th>
                            <th style="text-align: center !important;">المبلغ </th>


<th style="text-align: center !important;">  <input class="check_all_not"  id="check_all_not" type="checkbox"
onclick="check_all();"><label class="checktitle">  تحديدالكل </th>






                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(isset($all_pills_inbox)&&!empty($all_pills_inbox)){
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
                                <td><?=$row->person_name ?></td>
                                <td><?=$row->band_title?><?php if (!empty($row->band_title2)){ echo '/'. $row->band_title2 ; }?></td>

                                <td><?php if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?></td>
                                <td><?=$row->value?></td>

<!--
                                <td> <input class="check_large2 check_large"  type="checkbox">
                                        </td>-->
    <td><input class="check_large2 check_large checkbox_esal" value="<?= $row->pill_num ?>" type="checkbox">
        </td>
                                        

                            </tr>
                        <?php  $x++;   }} ?>
<!--                        --><?php
//                        if(isset($all_pills_inbox2)&&!empty($all_pills_inbox2)){
//                            $x=0;
//                            foreach($all_pills_inbox2 as $row){
//
//                                if($row->person_type == 1){
//                                    if($row->person_type ==1){
//                                        $name = $row->MemberDetails['k_name'];
//                                    }elseif ($row->person_type ==2){
//                                        $name = $row->MemberDetails['d_name'];
//                                    }elseif ($row->person_type ==3){
//                                        $name =$row->MemberDetails['name'];
//                                    }
//
//                                }elseif($row->person_type == 0){
//                                    $name =$row->person_name;
//                                }
//                                ?>
<!--                                <tr>-->
<!--                                    <td>--><?//=$x+1?><!--</td>-->
<!--                                    <td>--><?//=$row->pill_num?><!--</td>-->
<!--                                    <td>--><?//=$row->pill_date?><!--</td>-->
<!--                                    <td>--><?//=$row->publisher_name?><!--</td>-->
<!--                                    <td>--><?//=$row->person_name ?><!--</td>-->
<!--                                    <td>--><?//=$row->band_title?><!--</td>-->
<!--                                    <td>--><?//=$row->pill_type_title?><!--</td>-->
<!--                                    <td>--><?php //if(!empty($pay_method_arr[$row->pay_method])){ echo$pay_method_arr[$row->pay_method]; } ?><!--</td>-->
<!--                                    <td>--><?//=$row->value2?><!--</td>-->
<!---->
<!---->
<!--                                    <td> <input class="check_large2 check_large"  type="checkbox">-->
<!--                                    </td>-->
<!---->
<!--                                </tr>-->
<!--                                --><?php // $x++;   }} ?>
                        </tbody>
                    </table>



            <div class="clearfix"></div> 

            <div class="col-md-12" style="margin-top: 10px;">
                <div class="form-group col-sm-3 col-xs-12 padding-4" >
                   
                    <h5 class=" label-green-h   "> المحصلين  </h5>
                    
                    <select id="publisher" name="publisher" class="form-control  input-style">

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


                <?php
                $method_arr =array(1=>'نقدي',2=>'شيك',3=>'تعاملات بنكيه');
                ?>
                <div class="form-group  col-sm-3 col-xs-12 padding-4" >
                   
                    <h5 class="label-green-h "> طريقه التوريد  </h5>
                  

                    <?php
                    if(isset($method_arr)&&!empty($method_arr)) {
                    foreach ($method_arr as $key=>$value) {
                    ?>
                    <div class="radio-content">
                            <input type="radio" class="pay_method" name="pay_method" onchange="get_more($(this).val());" id="inlineRadio<?php echo $key?>" value="<?php echo $key ;?>">
                            <label for="inlineRadio<?php echo $key?>" class="radio-label"><?php echo $value ;?></label>
                        
                    </div>
                        <?php
                    }
                    }
                    ?>
                



                </div>
                <?php
              //  $multi_pays=array('إختر',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');
                 $multi_pays=array(3=>'شبكه',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');
                ?>
                <div class="form-group col-sm-2 col-xs-12 padding-4 multi_sel" style="display: none;">
                   
                        <h5 class="label-green-h ">طريقة الدفع</h5>
                    
                        <select name="organization_employee[]"  id="type_pay"  
                        data-actions-box="true"
                           class="choose-date selectpicker form-control  dep" 
                              multiple title="يمكنك إختيار أكثر من طريقه" 
                                  aria-required="true" data-show-subtext="true" data-live-search="true">
                           <!-- <option value="">إختر</option> -->
                            <?php if(isset($multi_pays) && !empty($multi_pays) && $multi_pays !=null) {
                                foreach ($multi_pays  as $key=>$value){ ?>



                                    <option value="<?php echo $key ; ?>" ><?php echo $value ; ?></option>
                                <?php } }?>

                        </select>
                   
                </div>
                
                <div class="form-group  col-sm-2 col-xs-12 padding-4 ">
                    
                        <h5 class="label-green-h ">التاريخ من</h5>
                   
                        <input type="date" id="date_from" class="form-control">
              
                </div>

                <div class="form-group col-sm-2 col-xs-12 padding-4 " >
                  
                        <h5 class="label-green-h ">التاريخ الي</h5>
                    
                        <input type="date"  id="date_to" class="form-control">
                    
                </div>

               <?php
                $arra =array('اختر', 1=>'عمل قيد محاسبي',2=>'إضافة إلي قيد محاسبي');
                ?>
                <div class="form-group col-sm-4 col-xs-12 padding-4 multi_sel" style="display: none;" >
                   
                        <h5 class="label-green-h ">نوع القيد </h5>
                   
                        <!--<select name=""  id=""  class="choose-date  form-control  dep">-->
                          
                            <?php if(isset($arra) && !empty($arra) && $arra !=null) {
                                for($a=1;$a<sizeof($arra);$a++){ ?>
                                
                                <div class="radio-content">
                                        <input type="radio" onchange="get_val($(this).val())"  class="pay_method dep" name="qued" 
                                          id="inlineRadios<?php echo $a?>" value="<?php echo $a ;?>">
                                          <label for="inlineRadios<?php echo $a?>" class="radio-label"><?php echo $arra[$a] ;?></label>
                                    
                                </div>
                    

                                    <!--<option value="<?php /*echo $key ; */?>" ><?php /*echo $value ; */?></option>-->
                                <?php } }?>

                        <!--</select>-->
                    

            </div>
                <div class="form-group  col-sm-2 col-xs-12 padding-4 qued_num"style="display: none;" >
                    
                        <h5 class="label-green-h ">رقم القيد </h5>
                    
                        <input type="text" readonly  ondblclick="get_qued();" style="" id="qued_num" class="form-control">

                  

                </div>


                <div class="col-md-1">
                    <button type="button" onclick="estlam();"   data-toggle="modal" data-target="#myModalInfo2" class="btn btn-success btn-labeled btn-next"  style="margin-top: 32px;">
                       <span class="btn-label"><i class="fa fa-money"></i></span> استلام </button>

                </div>

        <div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width: 70%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
                    </div>
                    <div class="modal-body">

                        <div  id="myDivs"></div>
                    </div>
                    <div class="modal-footer"  style="display: inline-block;width: 100%" >
                        <!--
                        <button type="submit" class="btn btn-success"
                                data-dismiss="modal">حفظ</button>-->

                        <button type="button" class="btn btn-danger"
                                 data-dismiss="modal">إغلاق</button>

                    </div>
                </div>
            </div>
        </div>


    </div>
                 

        </div>

</div>

    <!----------------------------------------------------------------------------->
    <div class="modal fade" id="qued" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 70%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">القيود</h4>
                </div>
                <div class="modal-body" style="height: 500px;overflow-y: scroll;">

                    <div  id="myDivs2"></div>
                </div>
                <div class="modal-footer"  style="display: inline-block;width: 100%" >
                    <!--
                    <button type="submit" class="btn btn-success"
                            data-dismiss="modal">حفظ</button>-->

                    <button type="button" class="btn btn-danger"
                            data-dismiss="modal">إغلاق</button>

                </div>
            </div>
        </div>
    </div>
    
<!--------------------------------------------------------------------------------->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<!--
<script>

    function t3amel()
    {
        $('#myModalInfo').modal('hide');
        Swal.fire({
            title: 'هل انت متأكد من إستلام الإيصالات ؟',
            text: "عند الموافقة الرجاء متابعه القيود",
            type: 'warning',
            showCancelButton: true,

            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ليس الان',
            confirmButtonText: 'نعم, قم بالإستلام!'
        }).then((result) => {
            if (result.value) {
        Swal.fire(
            'بنجاح!',
            'تم إستلام الإيصالات ',

        )
        $('#myform2').submit();
    }
    })
    }

</script>
  -->
  
  <script>

    function t3amel()
    {

        var x=$('#x').text();
        var t_total=$('#t_total').text();
        var last_quod=$('#last_quod').val();
        var t_text=   " سيتم ترحيل عدد "+x+" ايصال بمبلغ    " + t_total+" برقم قيد "+last_quod;

        $('#myModalInfo').modal('hide');
        Swal.fire({
            title: t_text,
            text: "عند الموافقة الرجاء متابعه القيود",
            type: 'warning',
            showCancelButton: true,

            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ليس الان',
            confirmButtonText: 'نعم, قم بالإستلام!'
        }).then((result) => {
            if (result.value) {
        Swal.fire(
            'بنجاح!',
            'تم إستلام الإيصالات ',

        )
        $('#myform2').submit();
    }
    })
    }

</script>  
    
    
    <!----------------------------------------------------------------------------->
    <script>
        function get_val(valu)
        {
           if(valu==2)
           {
               $('.qued_num').show();

           }else{
               $('.qued_num').hide();
               $('#qued_num').val('');
           }
        }

    </script>

    <script>
      
      /*     function estlam()
        {
            var date_to=$('#date_to').val();
            //qued_num
            var qued_num=$('#qued_num').val();

            var date_from=$('#date_from').val();
            var publisher=$('#publisher').val();
            var publisher_text=$('#publisher option:selected').text();

            var pay_method= $(".pay_method:radio:checked").val();

            var type_pay=$('#type_pay').val();
            if(pay_method==1 || pay_method==2)
            {
                if($('#publisher').val()=='')
                {
                    alert("من فضلك اختر اسم المحصل");
                    return;
                }


            }
            if(pay_method==3)
            {

                var dep= $(".dep:radio:checked").val();
               if(dep==2)
               {
                   var qued_num=$('#qued_num').val();
                  if($('#qued_num').val()=='')
                  {
                     // alert("من فضلك اختر رقم  القيد");
                      Swal.fire(
                          'عفوا!',
                          'من فضلك اختر رقم القيد',

                      )
                      return;
                  }

               //=========================================
               }

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
                    date_from: date_from,
                    publisher_text: publisher_text,
                    qued_num:qued_num
                },
                success: function (d) {
                    
                    if(d==0){
                        $('#myModalInfo').modal('hide');
                        alert("لايوجد ايصالات في هذه الفتره");
                    }else {
                        $('#myModalInfo').modal('show');
                        $('#myDivs').html(d);
                    }
                }

            });
        }
    */
    
      /* function estlam()
        {
            var date_to=$('#date_to').val();
            var date_from=$('#date_from').val();
            var publisher=$('#publisher').val();
            var publisher_text=$('#publisher option:selected').text();

            var pay_method= $(".pay_method:radio:checked").val();

            var type_pay=$('#type_pay').val();
            if(pay_method==1 || pay_method==2)
            {
                if($('#publisher').val()=='')
                {
                    alert("من فضلك اختر اسم المحصل");
                    return;
                }


            }
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
                    date_from: date_from,
                    publisher_text: publisher_text
                },
                success: function (d) {
                    if(d==0){
                        $('#myModalInfo').modal('hide');
                        alert("لايوجد ايصالات في هذه الفتره");
                    }else {
                        $('#myModalInfo').modal('show');
                        $('#myDivs').html(d);
                    }
                }

            });
        }*/


           function estlam()
        {
            var date_to=$('#date_to').val();
            //qued_num
            var qued_num=$('#qued_num').val();

            var date_from=$('#date_from').val();
            var publisher=$('#publisher').val();
            var publisher_text=$('#publisher option:selected').text();

            var pay_method= $(".pay_method:radio:checked").val();

            var type_pay=$('#type_pay').val();
                
                
                   var checkbox_value = [];

        var oTable = $('#example').dataTable();
        var rowcollection = oTable.$(".checkbox_esal:checked", {"page": "all"});
        rowcollection.each(function (index, elem) {
            // var checkbox_value = $(elem).val();
            checkbox_value.push($(elem).val());
        });
            
            
            if(pay_method==1 || pay_method==2)
            {
                if($('#publisher').val()=='')
                {
                    alert("من فضلك اختر اسم المحصل");
                    return;
                }


            }
            if(pay_method==3)
            {

                var dep= $(".dep:radio:checked").val();
               if(dep==2)
               {
                   var qued_num=$('#qued_num').val();
                  if($('#qued_num').val()=='')
                  {
                     // alert("من فضلك اختر رقم  القيد");
                      Swal.fire(
                          'عفوا!',
                          'من فضلك اختر رقم القيد',

                      )
                      return;
                  }

               //=========================================
               }

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
                    date_from: date_from,
                    publisher_text: publisher_text,
                    qued_num:qued_num,
                    checkbox_value: checkbox_value
                },
                success: function (d) {
                    
                    if(d==0){
                        $('#myModalInfo').modal('hide');
                        alert("لايوجد ايصالات في هذه الفتره");
                    }else {
                        $('#myModalInfo').modal('show');
                        $('#myDivs').html(d);
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

    <script>
        function get_qued()
        {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>finance_accounting/box/pills/Pill/get_all_qued",
                data: { },


                success: function (d) {

                    $('#qued').modal('show');
                    $('#myDivs2').html(d);
                }

            });
        }
    </script>

    <script>
        function get_row(valu)
        {
         var rkm=$('.rkm'+valu).text();
            $('#qued_num').val(rkm);
            $('#qued').modal('hide');
        }

    </script>
    
    
    

<script type="text/javascript">
    var a = 0;
    $(window).scroll(function() {

        var oTop = $('#counter_section').offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {

            $('.counter').each(function() {
                var $this = $(this),
                countTo = $this.attr('data-count');

                $({ countNum: $this.text()}).animate({
                    countNum: countTo
                },

                {

                    duration: 20000,
                    easing:'linear',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
      //alert('finished');
  }

});  

            });

            a = 1;
        }

    });
</script>