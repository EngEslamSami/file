<div class="col-sm-12  " >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">

            <div class="col-md-12">
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">اسم اللجنه</label>
                    <select id="lagna_name" class="form-control half input-style" onchange="get_lagna_code($(this).val());">
                        <option value="" selected="selected">اختر</option>
                        <?php if (isset($all_lagna) && !empty($all_lagna)) {
                            foreach ($all_lagna as $row){


                                ?>

                                <option value="<?php echo $row->id_lagna;?>-<?php echo $row->lagna_code;?>"> <?php echo $row->lagna_name;?>  </option>
                                <?php
                            }
                        }
                        ?>

                    </select>

                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">كود اللجنه</label>
                    <input type="text"  id="lagna_num" class="form-control half input-style" placeholder=""
                           data-validation="required"  readonly="readonly" name=""
                           value="">
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">رقم الجلسة</label>
                    <input type="text"  value="<?php echo $session_num+1;?>" id="galsa_num" readonly="readonly" class="form-control half input-style" placeholder=""
                           data-validation="required">
                </div>
                <div class="form-group col-sm-6">
                    <label class="label label-green  half">تاريخ الجلسة </label>
                    <input  type="date" id="lagna_date" class="form-control half input-style" data-validation="required" value="" >
                </div>
            </div>
            <div class="col-md-12">
                </br>
                <div id="member_table">


                </div>

                <button style="width: 90px;"   class="btn btn-sm btn-info status" onclick="save_member();"> حفظ</button>
                <br>
            </div>

            <?php
            if(isset($session_members)&&!empty($session_members)) {
                ?>

                <table id="" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="info">
                        <th>مسلسل</th>
                        <th>اللجنة</th>
                        <th>رقم الجلسة</th>
                        <th>تاريخ  الجلسة</th>
                        <th>حالة الجلسة</th>
                        <th>اسم العضو</th>
                        <th>الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($session_members) && !empty($session_members)) {
                        $x=1;
                        foreach($session_members as $record){
                            $count = sizeof($record->members);
                            ?>
                            <tr>
                            <td style=""
                                rowspan="<?php echo $count; ?>"><?php echo $x; ?></td>
                            <td style=""
                                rowspan="<?php echo $count; ?>"><?php echo $record->name; ?> </td>
                            <td style=""
                                rowspan="<?php echo $count; ?>"><?php echo $record->session_number; ?></td>
                            <td style=""
                                rowspan="<?php echo $count; ?>"><?php echo date("Y-m-d",$record->date); ?> </td>
                            <td style=""
                                rowspan="<?php echo $count; ?>"><?php if($record->suspend == 1){
                                                                           echo "نشط";
                                                                           }else{
                                                                           echo "غير نشط "; } ?> </td>
                            <?php
                            if (isset($record->members) && !empty($record->members)){
                                foreach ($record->members as $member) {
                                    $z = 1;
                                    ?>
                                    <td <?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                                        <?php echo $member->member_name; ?>
                                    </td>
                                    <td <?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                                        <a href="<?php echo base_url(); ?>family_controllers/LagnaSetting/delete_session_member/<?php echo $member->id;?>"onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                    </tr>
                                    <?php
                                    $z++;
                                }
                            }?>
                            </tr>
                            <?php
                            $x++;
                        }
                    }
                    ?>
                    </tbody>
                </table>
                <?php
            }
            ?>

        </div>

    </div>
</div>

<script>
    function save_member()
    {
        var member_name=[];
        var member_type=[];
        var member_id=[];
        var lagna_name=$("#lagna_name option:selected").text();

        var lagna_num_post=$('#lagna_name').val();
        var lagna_num_data=lagna_num_post.split("-");
        var lagna_num=lagna_num_data[0];

        var lagna_date=$('#lagna_date').val();
        var galsa_num=$('#galsa_num').val();
        $(".member:checkbox:checked").each(function () {
            member_name.push($(this).attr('member_name'));
        });
        $(".member:checkbox:checked").each(function () {
            member_type.push($(this).attr('member_type'));
        });
        $(".member:checkbox:checked").each(function () {
            member_id.push($(this).attr('member_id'));
        });

        if(lagna_date !="" && lagna_num != "" && lagna_name!="" && member_id!="" ){
            var data_post ={member_id:member_id,member_type:member_type,member_name:member_name,
                lagna_name:lagna_name,lagna_num:lagna_num,lagna_date:lagna_date,galsa_num:galsa_num};
            $.ajax({
                type:'post',
                url:"<?php echo base_url();?>family_controllers/LagnaSetting/add_selected_member",
                data:data_post,
                success:function(d){
                    alert(d);
                    location.reload();
                }
            });
        }else{
            alert("تأكد من إدخال جميع البيانات ");
        }

    }
</script>



<script>

    function get_lagna_code(valu)
    {
        var valu=valu.split("-");
        $('#lagna_num').val(valu[1]);
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/LagnaSetting/get_lagna_member",
            data:{id:valu[0]},
            success:function(d){
                $('#member_table').html(d);
            }
        });

    }



</script>