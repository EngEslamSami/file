<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> </h3>
        </div>
        <div class="panel-body">
            <?php
            if(isset($result) && $result != null ){
                $x = 1;


            ?>
            <table id="example" class="table table-bordered" role="table">
                <thead>
                <tr>
                <th>م</th>
                <th>الاسم</th>
                <th>البريد الالكتروني</th>
                <th>رقم الجوال</th>
                <th>العنوان</th>
                <th>تفاصيل الرسالة</th>
                <th>الاجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($result as $row){
                    if ($row->seen ==1){
                        $span = "<span class=\"label label-pill
                         \" style=\"
                         color:black ; background-color:#00ff00;font-size: 14px;  \">مقروءة
                      </span>";
                    }
                    elseif ($row->seen ==0){
                        $span = "<span  class=\"label label-pill seen$row->id
                         \" style=\"
                         color:black ; background-color:#ff0000;font-size: 14px;  \">غير مقروءة
                      </span>";
                    }


                ?>
                <tr>
                <td><?= $x++?></td>
                <td><?= $row->name?></td>
                <td><?= $row->email?></td>
                <td><?= $row->phone?></td>
                <td><?= $row->address?></td>
                <td><button onclick="seen(<?=$row->id?>)" type="button" class="btn btn-info btn-xs"
                            data-toggle="modal" data-target="#myModal<?php echo $row->id?>">تفاصيل</td>
                <td>
                    <a  href="<?php echo base_url().'admin/reports/Contact_us/DeleteContacts/'.$row->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn  btn-xs   "><i class="fa fa-trash"></i> </a>

<?= $span?>
                </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
                <?php foreach($result as $record){?>

                    <div id="myModal<?php echo $record->id?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تفاصيل الرسالة</h4>
                            </div>
                            <div class="modal-body">


                                <div class="row">

                                    <div class="col-sm-4">
                                        <h5>نص الرسالة:</h5>


                                        <h5><?php echo $record->message?></h5>
                                    </div>



                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn  "  style="float: left" data-dismiss="modal">اغلاق</button>
                            </div>
                        </div>

                    </div>
                </div>

                <?php
            }}else{
                ?>
                <div class="alert-danger alert">عفوا...! لا يوجد بيانات متاحة</div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<script>
    function seen(id) {
       var id = id;
       var dataString ='id='+id;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/reports/Contact_us/update_message',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
               $('.seen'+id).css({"background-color": "#00ff00", "font-size": "14px"});
               $('.seen'+id).text('مقروءة');

            }
        });

    }
</script>

