


<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <?php if(isset($lagna_member)&&!empty($lagna_member)) { ?>

            <div class="col-md-12">
                <div class="form-group col-sm-3">
                    <label class="label label-green  half">اسم اللجنه</label>
                    <input type="text"  id="lagna_name" class="form-control half input-style" placeholder=""
                           data-validation="required" name=""
                           value="<?php echo $lagna_member[0]->lagna_name; ?>">
                </div>

                <div class="form-group col-sm-3">
                    <label class="label label-green  half">رقم اللجنه</label>
                    <input type="text"  id="lagna_num" class="form-control half input-style" placeholder=""
                           data-validation="required" name="main_trait"
                           value="<?php echo $lagna_member[0]->lagna_num; ?>">
                </div>
                <div class="form-group col-sm-3">
                    <label class="label label-green  half">رقم الجلسه</label>
                    <input type="text"  value="<?php echo $session_num+1;?>" id="galsa_num" class="form-control half input-style" placeholder=""
                           data-validation="required"
                           value="1">
                </div>
                <div class="form-group col-sm-3">
                    <label class="label label-green  half">تاريخ اللجنه </label>
                    <input  type="date" id="lagna_date" class="form-control half input-style "
                           data-validation="required" value=""
                           >
                </div>
            </div>
            <div class="col-md-6">
                </br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم العضو</th>
                        <th scope="col">الوظيفه داخل اللجنه</th>
                        <th scope="col">الوظيفه الأساسيه</th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $types=array(0=>"عضو خارجي",1=>"مجلس الاداره",2=>"الجمعيه العموميه",3=>"الموظفين");
                    if (isset($lagna_member) && !empty($lagna_member)) {
                        $x=1;
                        foreach ($lagna_member as $row){
                    ?>
                        <tr>
                            <th scope="row"><input type="checkbox" member_name="<?php echo $row->member_name;?>" member_type="<?php echo $row->type;?>" member_id="<?php echo $row->member_id;?>" class="member"></th>
                            <td><?php echo $row->member_name;?></td>

                            <td><?php echo $row->member_job;?></td>
                            <td><?php echo $types[$row->type];?></td>


                        </tr>
                        <?php
                            $x++;
                    }
                    }
                    ?>


                    </tbody>
                </table>
                <button style="width: 90px;"   class="btn btn-sm btn-info status" onclick="save_member();"> حفظ</button>



            </div>
                </div>



                <?php
            } else { ?>
                <div class="alert alert-dander">لا توجد اي لجان </div>
                <?php
            }
?>

        </div>
    </div>


<?php
if(isset($session_members)&&!empty($session_members)) {


?>
<div class="col-sm-12 col-md-12 col-xs-12" style="padding-top: 0;">
    <div class="top-line"></div><!--message of delete will be showen here-->
    <div class="panel panel-bd lobidrag" style="padding-top: 0;">
        <div class="panel-heading" style="">

        </div>
        <div class="panel-body">


            <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                   width="100%">
                <thead>
                <tr class="visible-md visible-lg">
                    <th>مسلسل</th>
                    <th>رقم اللجنه</th>

                    <th>رقم الجلسه</th>
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
                        <td style="border-bottom: 3px solid #ddd !important"
                            rowspan="<?php echo $count; ?>"><?php echo $x; ?></td>
                        <td style="border-bottom: 3px solid #ddd !important"
                            rowspan="<?php echo $count; ?>"><?php echo $record->lagna_number; ?> </td>
                        <td style="border-bottom: 3px solid #ddd !important"
                            rowspan="<?php echo $count; ?>"><?php echo $record->session_number; ?></td>
                        <?php

                        if (isset($record->members) && !empty($record->members)){

                        foreach ($record->members as $member) {
                        $z = 1;
                        ?>
                        <td <?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                            <?php echo $member->member_name; ?>
                        </td>

                        <td <?php if ($x == 1) { ?> class="top" <?php } ?> <?php if ($x > 1) { ?> class="top2" <?php } ?>>
                            <a href="<?php echo base_url(); ?>family_controllers/Lagna/delete_session_member/<?php echo $member->id;?>"onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

            </div>

        </div>
    </div>
    <?php
}
?>
<script>
    function save_member()
    {

        var member_name=[];
        var member_type=[];
        var member_id=[];
         var lagna_name=$('#lagna_name').val();
        var lagna_num=$('#lagna_num').val();
        var lagna_date=$('#lagna_date').val();
        var galsa_num=$('#galsa_num').val();



        $(".member:checkbox:checked").each(function () {
            member_name.push($(this).attr('member_name'));
        })
        $(".member:checkbox:checked").each(function () {
            member_type.push($(this).attr('member_type'));
        })
        $(".member:checkbox:checked").each(function () {
            member_id.push($(this).attr('member_id'));
        })


        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/Lagna/add_selected_member",
            data:{member_id:member_id,member_type:member_type,member_name:member_name,lagna_name:lagna_name,lagna_num:lagna_num,lagna_date:lagna_date,galsa_num:galsa_num},
            success:function(d){

                alert(d);
              location.reload();
               



            }

        });

    }
</script>