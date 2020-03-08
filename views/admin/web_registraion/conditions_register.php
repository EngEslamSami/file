
<div class="col-xs-12">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">   اضافة  الشروط والمستندات المطلوبة</h3>
        </div>
        <div class="panel-body">
            <?php
            echo form_open('admin/web_registraion/Conditions/condition_register');
            ?>

            <div class="col-md-12">
                <input type="hidden" id="count_row" value="0" />
                <button type="button" class="btn btn-success btn-next add_attchments"
                        onclick="add_row_member()"

                >    اضافة  الشروط والمستندات المطلوبة   <i class="fa fa-plus" aria-hidden="true"></i></button><br><br>





                <table class="table table-bordered"   id="mytable"  style="display: none">
                    <thead >
                    <tr class="success">
                        <th>م</th>

                        <th style="text-align: center">شروط تسجيل المستفيدين </th>
                        <th style="text-align: center">المستندات الأولية عند تقديم الطلب</th>
                        <th style="text-align: center">المستندات المطلوبة عند قبول الطلب للإعتماد  </th>
                        <th style="text-align: center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody id="result_Table">



                    </tbody>
                </table>
            </div>



            <div class="col-xs-12 text-center">
                <button  type="submit" id="button" name="ADD" value="ADD"  class="btn btn-success " style="font-size: 16px;width: 150px;">
                    <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>

</div>
<div class="col-xs-12">
    <?php
    if (isset($condtions) && !empty($condtions)){
    $x =1;
    ?>
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-heading">
            <h3 class="panel-title">  الشروط والمستندات المطلوبة</h3>
        </div>
        <div class="panel-body">

            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                    <th>م</th>
                    <th> شروط تسجيل المستفيدين</th>
                    <th>المستندات الأولية عند تقديم الطلب</th>
                    <th>المستندات المطلوبة عند قبول الطلب للإعتماد</th>

                    <th>الاجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($condtions as $item){

                    ?>
                    <tr>
                        <td><?=$x++?></td>
                        <td><?= $item->conditions?></td>
                        <td><?= $item->files_request?></td>

                        <td><?= $item->files_accept?></td>

                        <td>
                            <a href="<?=base_url()."admin/web_registraion/Conditions/Delete/".$item->id?>"  onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>

                        </td>

                    </tr>

                    <?php
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
    function add_row_member(){
        $("#mytable").show();
        $("#first_one").remove();
        //  alert('show');

        var x = document.getElementById('result_Table');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>admin/web_registraion/Conditions/get_details',
            data:dataString,
            dataType: 'html',

            cache:false,
            success: function(html){

                $("#result_Table").append(html);

            }
        });
    }
    //--------
    //-----------------------------------------------
</script>
