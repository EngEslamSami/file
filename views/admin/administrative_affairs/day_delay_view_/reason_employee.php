<style>
    .table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
        border: 1px solid #aaa;
    }
table td{
    background-color: #fff;
}

</style>



            <?php if(isset($delayies)&&!empty($delayies)) {
                foreach ($delayies as $row) {

                    ?>


                    <table id="data<?php echo $row->num;?>" class="table table-bordered" cellspacing="0">

                        <thead>
                        <tr>

                            <th class="text-center">اسم الموظف</th>
                            <th class="text-center"> رقم المسائله</th>
                            <th class="text-center"> عدد ايام الغياب</th>
                            <th class="text-center">الاجراء</th>

                        </tr>
                        </thead>
                        <tbody class="text-center">



                        <tr>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->num; ?></td>
                            <td><?php echo $row->day_delay; ?></td>
                            <td>

                                <input type="button" value="توضيح الأسباب" class="class="btn btn-danger show""  data-toggle="modal" data-target="#modal_<?php echo $row->num;?>">

                            </td>
                        </tr>

                        </tbody>
                    </table>
                    </br></br>
<div class="modal fade" id="modal_<?php echo $row->num;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo $row->name;?></h4>
            </div>
            <div class="modal-body">


                <table id=""  class="table table-bordered" cellspacing="0">

                    <thead>
                    <tr>

                        <th class="text-center">#</th>
                        <th class="text-center">اكتب السبب</th>
                        <th class="text-center">التاريخ</th>
                        <th class="text-center">وقت الحضور</th>
                        <th class="text-center">السبب</th>

                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <form action="<?php echo base_url();?>Administrative_affairs/update_day" method="post">
                        <?php if(isset($row->days)&&!empty($row->days)) {
                            $z=1;
                            foreach ($row->days as $row2) {

                                ?>


                                <tr>
                                    <td><?php echo $z;?></td>
                                    <td><input type="checkbox"  class="sheck"name="check[]" value="<?php echo $row2->id;?>" </td>
                                    <td><input type="date" disabled="" class="day<?php echo $row2->id;?>" value="<?php echo $row2->day;?>" name="date[]"> </td>
                                    <td><input type="time" disabled="" class="time<?php echo $row2->id;?>" value="<?php echo $row2->time;?>" name="time[]"></td>
                                    <td>
                                        <textarea class="text<?php echo $row2->id;?>" disabled="" name="reason[]"></textarea>
                                    </td>
                                </tr>
                                <?php
                                $z++;
                            }
                        }
                        ?>

                    </tbody>
                </table>


                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="حفظ التغيرات"></input>
                    </form>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right;">اغلاق</button>

                </div>
            </div>
        </div>
    </div>

                    <div class="modal fade" id="modal_<?php echo $row->num;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"><?php echo $row->num;?></h4>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right;">اغلاق</button>
                                    <button type="button" class="btn btn-primary">حفظ التغيرات</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

                }
            }else{?>

                <div  class="alert alert-danger">لاتوجد اي مساءلات لهذا الموظف</div>
                    <?php
            }
            ?>










<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>

<script>
$('.show').click(function(){
    num=$(this).attr('name');

    $("#table"+num).css("display", "block");
    $("#data"+num).css("display", "none");
})



</script>

     <script>
$('.sheck').change(function(){
    var id=$(this).val();
    if($(this).is(':checked')){




        $('.text'+id).attr('disabled', false);
    }
    if(!$(this).is(':checked')){




        $('.text'+id).attr('disabled', true);
    }

})


     </script>


