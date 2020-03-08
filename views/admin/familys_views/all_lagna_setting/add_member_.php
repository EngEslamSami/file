<style>
    button.add_lgna {
        width: auto;
        background-color: #4a59b4;
        border-color: #4c59a7;
        color: #fff;
        padding: 5px 25px;
        border-radius: 0;
    }
    button.add_lgna:hover{
        color: #fff;
        -webkit-transition-duration: .3s;
        transition-duration: .3s;
    }
    .top{
        background-color: #f5f5f5  !important;
        padding:10px  !important;
    }
    .top2{
        background-color: #d9edf7  !important;
        padding:10px  !important;
    }
    .th-back{
        background-color: #6096b3 !important;
        color: #fff;
    }

</style>
<div class="col-xs-12 " >

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <div class="col-xs-12 col-sm-12 ">
                <!-- Button trigger modal -->

                <button type="button" class="btn btn-purple w-md m-b-5 " data-toggle="modal" data-target="#myModal" style="background-color: #6096b3; color: #fff;padding: 5px 6px;font-size: 16px;">
                    <span><i class="fa fa-plus-o" ></i></span>  إضافة أعضاء اللجان
                </button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="display: inline-block;width:100%;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                <div class="form-group col-md-6">
                                    <label class="label label-green half">اسم اللجنه:</label>
                                    <input type="hidden"  name="lagna_name"  id="lgna_name" value="">


                                    <select name="lagna_num_show" id="lagna_num_show" onchange="get_name();" class="selectpicker form-control half"  data-validation="required" aria-required="true" data-show-subtext="true" data-live-search="true">
                                        <option value="">إختر</option>
                                        <?php foreach ($all_legan as $row){?>
                                            <option value="<?=$row->id_lagna.'-'.$row->lagna_name?>" <?php if(isset($result_id)){if($row->id_lagna == $result_id->lagna_id_fk){ echo "selected";}}?>><?=$row->lagna_name?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="label label-green half">رقم اللجنه:</label>
                                    <input type="text" name="lgna_num" readonly="" id="lgna_num" value="" class="form-control half input-style">

                                </div>



                                <div class="clearfix"></div>
                                <ul class="nav nav-tabs" role="tablist" style="background-color: #c1e2ff;">
                                    <li role="presentation" class="active"><a href="#tab_forma1"
                                                                              aria-controls="tab_forma1"
                                                                              role="tab" data-toggle="tab">
                                            أعضاء مجلس الإدارة</a></li>
                                    <li role="presentation"><a href="#tab_forma2" aria-controls="tab_forma2"
                                                               role="tab" data-toggle="tab">الجمعية العمومية </a>
                                    </li>
                                    <li role="presentation"><a href="#tab_forma3" aria-controls="tab_forma3"
                                                               role="tab" data-toggle="tab">         موظفين الجمعية </a></li>
                                    <li role="presentation"><a href="#tab_forma4" aria-controls="tab_forma4"
                                                               role="tab" data-toggle="tab">أعضاء اخرى</a></li>
                                </ul>
                            </div>
                            <div class="modal-body">

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="tab_forma1">



                                        <div class="col-xs-8">
                                            <input type="text" class="myInputFilter" onkeyup="myFunction()" placeholder="بحث عن عضو" title="يمكنك البحث بأى كلمة">

                                            <table  id="find-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">اختيار الموظف</th>
                                                    <th class="text-center">إسم الموظف</th>
                                                    <th>الإدارة</th>

                                                </tr>
                                                </thead>
                                                <tbody class="FilterTable">
                                                <?php
                                                if(isset($all_member['magls_member'])&&!empty($all_member['magls_member'])) {
                                                    foreach ($all_member['magls_member'] as $row) {
                                                        ?>
                                                        <td><input type="checkbox" name="checkbox" class="tmcheckbox"
                                                                   value="<?php echo $row->id;?>"/></td>
                                                        <td class="heading"><?php echo $row->member_name;?></td>
                                                        <td><input type="radio" id="<?php echo 'id'. $row->id;?>" name="<?php echo $row->id;?>" class="type_job"  value="عضو عادي">عضو عادي
                                                            <input type="radio"id="<?php echo 'id2'. $row->id;?>" name="<?php echo $row->id;?>"  class="type_job"  value="رئيس لجنه"> رئيس لجنه</td>


                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>



                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-xs-4">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">الأعضاء الذين تم اختيارهم</h6>
                                                </div>
                                                <div class="panel-body">
                                                    <ul class="list-unstyled results" id="results">

                                                    </ul>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="col-xs-12">
                                            <!--    <button id="add_lgna" type="button" class="btn btn-purple w-md m-b-5 add_lgna"  >-->
                                            <!--        <span><i class="fa fa-disk-o" ></i></span>   حفظ-->
                                            <!--    </button><br>-->
                                            <button type="button" id="add_lgna" name="add_lgna" value="1"
                                                    class="btn btn-purple w-md m-b-5 add_lgna" >
                                                <span><i class="fa fa-disk-o" ></i></span> حفظ
                                            </button>
                                        </div>



                                    </div>
                                    <div role="tabpanel" class="tab-pane fade " id="tab_forma2">

                                        <div class="col-xs-8">
                                            <input type="text" class="myInputFilter" onkeyup="myFunction()" placeholder="بحث عن عضو" title="يمكنك البحث بأى كلمة">

                                            <table  class="table table-striped table-bordered dt-responsive nowrap table1" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">م</th>
                                                    <th class="text-center">إسم الموظف</th>
                                                    <th>الوظيفه</th>

                                                </tr>
                                                </thead>
                                                <tbody class="FilterTable">
                                                <?php
                                                if(isset($all_member['assembly_member'])&&!empty($all_member['assembly_member'])) {
                                                    foreach ($all_member['assembly_member'] as $row2) { ?>
                                                        <tr>
                                                            <td><input type="checkbox" name="checkbox"
                                                                       class="tmcheckbox2"
                                                                       value="<?php echo $row2->id;?>"/></td>
                                                            <td class="heading"><?php echo $row2->name;?></td>
                                                            <td><input type="radio" id="<?php echo 'id'. $row2->id;?>" name="<?php echo $row2->id;?>" class="type_job2"  value="عضو عادي">عضو عادي
                                                                <input type="radio"id="<?php echo 'id2'. $row2->id;?>" name="<?php echo $row2->id;?>"  class="type_job2"  value=" رئيس لجنه"> رئيس لجنه</td>



                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-xs-4">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">الأعضاء الذين تم اختيارهم</h6>
                                                </div>
                                                <div class="panel-body">
                                                    <ul class="list-unstyled results" id="results">

                                                    </ul>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="col-xs-12">

                                            <button type="button" id="add_lgna" name="add_lgna" value="2"
                                                    class="btn btn-purple w-md m-b-5 add_lgna">
                                                <span><i class="fa fa-disk-o" ></i></span> حفظ
                                            </button>
                                        </div>


                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_forma3">


                                        <div class="col-xs-8">
                                            <input type="text" class="myInputFilter" onkeyup="myFunction()" placeholder="بحث عن عضو" title="يمكنك البحث بأى كلمة">

                                            <table  class="table table-striped table-bordered dt-responsive nowrap table1" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">م</th>
                                                    <th class="text-center">إسم الموظف</th>
                                                    <th>الوظيفه</th>

                                                </tr>
                                                </thead>
                                                <tbody class="FilterTable">
                                                <?php
                                                if(isset($all_member['employee_member'])&&!empty($all_member['employee_member'])) {
                                                    foreach ($all_member['employee_member'] as $row3) { ?>
                                                        <tr>
                                                            <td><input type="checkbox" name="checkbox"
                                                                       class="tmcheckbox3"
                                                                       value="<?php echo $row3->id;?>"/></td>
                                                            <td class="heading"><?php echo $row3->employee;?></td>
                                                            <td><input type="radio" id="<?php echo 'id'. $row3->id;?>" name="<?php echo $row3->id;?>" class="type_job3"  value="عضو عادي">عضو عادي
                                                                <input type="radio"id="<?php echo 'id2'. $row3->id;?>" name="<?php echo $row3->id;?>"  class="type_job3"  value="رئيس لجنه"> رئيس لجنه</td>



                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col-xs-4">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">الأعضاء الذين تم اختيارهم</h6>
                                                </div>
                                                <div class="panel-body">
                                                    <ul class="list-unstyled results" id="results">

                                                    </ul>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="col-xs-12">

                                            <button type="button" id="add_lgna" name="add_lgna" value="3"
                                                    class="btn btn-purple w-md m-b-5 add_lgna">
                                                <span><i class="fa fa-disk-o" ></i></span> حفظ
                                            </button>
                                        </div>

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade " id="tab_forma4">
                                        <div class="form-group col-xs-8">
                                            <label class="label label-green half">عدد الاعضاء:</label>
                                            <input type="text"   name="num_member_out"  id="num_member_out" value="" class="form-control half input-style error">
                                            <div id="load_form">

                                            </div>

                                        </div>

                                        <div class="col-xs-4">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h6 class="panel-title">الأعضاء الذين تم اختيارهم</h6>
                                                </div>
                                                <div class="panel-body">
                                                    <ul class="list-unstyled results" id="results">

                                                    </ul>
                                                </div>
                                            </div>


                                        </div>


                                    </div>

                                </div>




                            </div>
                            <div class="modal-footer" style="display: inline-block;width:100%;">
                                <button  onclick="reload();" type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 ">

                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center th-back">م</th>
                        <th class="text-center th-back">اسم اللجنه</th>
                        <th class="th-back">رقم اللجنه</th>
                        <th class="th-back">حذف اللجنه</th>
                        <th class="th-back">اسماء اعضاء اللجنه</th>
                        <th class="th-back">وظيفه العضو</th>
                        <th class="th-back">حذف العضو</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x=1;

                    if(isset($records)&&!empty($records)) {
                        foreach ($records as $record) {
                            $count = sizeof($record->members);

                            ?>

                            <tr>

                            <td style="border-bottom: 3px solid #ddd !important"
                                rowspan="<?php echo $count; ?>"><?php echo $x; ?></td>
                            <td style="border-bottom: 3px solid #ddd !important"
                                rowspan="<?php echo $count; ?>"><?php echo $record->lagna_name; ?> </td>
                            <td style="border-bottom: 3px solid #ddd !important"
                                rowspan="<?php echo $count; ?>"><?php echo $record->lagna_num; ?></td>
                            <td style="border-bottom: 3px solid #ddd !important"
                                rowspan="<?php echo $count; ?>">

                                <a href="<?php echo base_url(); ?>family_controllers/LagnaSetting/delete_lgna/<?php echo $record->lagna_num;?>"onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </br> <small style="color: red;">تنبيه هام جدا! عند الضغط ع هذا الزر</br> يتم حذف اللجنه بالكامل</small>
                            </td>
                            <?php
                            if (isset($record->members) && !empty($record->members)){

                                foreach ($record->members as $member) {
                                    $z = 1;
                                    ?>
                                    <td <?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                                        <?php echo $member->member_num; ?>
                                    </td>
                                    <td<?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                                        <?php echo $member->member_job; ?>
                                    </td>
                                    <td <?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                                        <a href="<?php echo base_url(); ?>family_controllers/LagnaSetting/delete_member/<?php echo $member->id;?>"onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                    </tr>


                                    <?php
                                    $z++;
                                }
                            }?>




                            <?php
                            $x++;
                        }

                    }else{?>
                        <td colspan="6"><div style="color: red; font-size: large"> لم يتم اضافه اي لجان الي الان</div> </td>

                    <?php  }?>



                    </tbody>
                </table>




            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>
    // $("div.tab-pane").each(function(){
    $(".tmcheckbox").change(function() {

        var value = $(this).val(),
        //$list = $(this).closest(".tab-pane").find(".results");
            $list=$('.results');

        if (this.checked) {
            var allData = $(this).closest('tr').find('.heading').text();

            $list.append("<li data-value='" + value + "'>" + allData + "</li>");
        }
        else {
            $list.find('li[data-value="' + value + '"]').slideUp("fast", function() {
                $(this).remove();
            });
        }
    });
    // });
</script>
<script>
    // $("div.tab-pane").each(function(){
    $(".tmcheckbox2").change(function() {

        var value = $(this).val(),
        // $list = $(this).closest(".tab-pane").find(".results");
            $list=$('.results');

        if (this.checked) {
            var allData = $(this).closest('tr').find('.heading').text();

            $list.append("<li data-value='" + value + "'>" + allData + "</li>");
        }
        else {
            $list.find('li[data-value="' + value + '"]').slideUp("fast", function() {
                $(this).remove();
            });
        }
    });
    // });
</script>
<script>
    // $("div.tab-pane").each(function(){
    $(".tmcheckbox3").change(function() {

        var value = $(this).val();


        //  $list = $(this).closest(".tab-pane").find(".results");
        $list=$('.results');


        if (this.checked) {
            var allData = $(this).closest('tr').find('.heading').text();

            $list.append("<li data-value='" + value + "'>" + allData + "</li>");
        }
        else {
            $list.find('li[data-value="' + value + '"]').slideUp("fast", function() {
                $(this).remove();
            });
        }
    });
    // });
</script>

<script>
    $(".add_lgna").click(function() {



        var job_array=[];
        var member_ids=[];
        var magls_member=[];


        var type=$(this).val();




        if(type==1){


            $(".type_job:radio:checked").each(function(){ member_ids.push($(this).attr('name')); })

            $(".type_job:radio:checked").each(function(){ job_array.push($(this).val()); })



            $(".tmcheckbox:checkbox:checked").each(function(){magls_member.push($(this).val()); })


        }


        if(type==2) {

            $(".type_job2:radio:checked").each(function () {
                member_ids.push($(this).attr('name'));
            })

            $(".type_job2:radio:checked").each(function () {
                job_array.push($(this).val());
            })


            $(".tmcheckbox2:checkbox:checked").each(function () {
                magls_member.push($(this).val());
            })

        }

        if(type==3) {

            $(".type_job3:radio:checked").each(function () {
                member_ids.push($(this).attr('name'));
            })

            $(".type_job3:radio:checked").each(function () {
                job_array.push($(this).val());
            })


            $(".tmcheckbox3:checkbox:checked").each(function () {
                magls_member.push($(this).val());
            })

        }




        if(magls_member.length!==job_array.length){
            alert("من فضلك ادخل لكل عضو وظيفته");
            return;
        }
        if(magls_member.length==0||job_array.length==0){
            alert("من فضلك اختر الاعضاء اولا");
            return;
        }

        var lgna_name=$('#lgna_name').val();
        var lgna_num=$('#lgna_num').val();
        if(lgna_name==''||lgna_num==''){
            alert("من فضلك ادخل اسم اللجنه ورقم اللجنه");
            return;
        }


        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/LagnaSetting/add_lagna_member",
            data:{member_ids:member_ids,job_array:job_array,lgna_name:lgna_name,lgna_num:lgna_num,type:type},
            success:function(d){

                alert(d);
                $('.type_job3').prop('checked', false);
                $('.type_job2').prop('checked', false);
                $('.type_job').prop('checked', false);
                $('.tmcheckbox3').prop('checked', false);
                $('.tmcheckbox').prop('checked', false);
                $('.tmcheckbox2').prop('checked', false);



            }

        });


    });
</script>
<script>
    $('#num_member_out').keyup(function(){
        var num=$(this).val();

        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/LagnaSetting/make_form",
            data:{num:num},
            success:function(d){
                $('#load_form').html(d);





            }

        });
    })




</script>

<script>
    function get_name() {
        var totalData=$('#lagna_num_show').val();
        var res = totalData.split("-");
        $('#lgna_num').val(res[0]);
        $('#lgna_name').val(res[1]);
    }
</script>


<script>
    function reload()
    {
        location.reload();
    }
</script>