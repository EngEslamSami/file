
<div class="col-xs-12">
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">   اضافة  الشروط والمستندات المطلوبة</h3>
        </div>
        <div class="panel-body">
            <?php

                echo form_open('admin/web_registraion/Conditions/condition_register');


            ?>

            <div class="form-group col-md-4 col-sm-6">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">
                        <th> شروط تسجيل المستفيدين</th>
                        <th><a  onclick="apen('conditions','conditions','text');" ><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></th>

                    </tr>
                    </thead>

                    <tbody id="conditions">

                       <?php
                       if (isset($get_cond)&& !empty($get_cond)){

                       ?>

                        <tr>
                            <td> <input class="form-control" type="text" name="conditions[]"  ></td>
                            <td><a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                       <?php
                       }
                       ?>

                    </tbody>
                </table>
            </div>

            <div class="form-group col-md-4 col-sm-6">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">
                        <th>   المستندات الأولية عند تقديم الطلب</th>
                        <th><a  onclick="apen('files_request','files_request','text');" ><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></th>

                    </tr>
                    </thead>

                    <tbody id="files_request">
                    <?php
                    if (isset($get_cond)&& !empty($get_cond)){

                    ?>

                    <tr>
                        <td> <input class="form-control" type="text" name="files_request[]" ></td>
                        <td><a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php
                    } ?>

                    </tbody>
                </table>
            </div>

            <div class="form-group col-md-4 col-sm-6">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">

                        <th>المستندات المطلوبة عند قبول الطلب للإعتماد </th>
                        <th><a  onclick="apen('files_accept','files_accept','text');" ><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></th>

                    </tr>
                    </thead>

                    <tbody id="files_accept">
                    <?php
                    if (isset($get_cond)&& !empty($get_cond)) {

                        ?>
                        <tr>
                            <td><input class="form-control" type="text" name="files_accept[]"></td>
                            <td><a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>


            <!-- <div class="col-md-12">
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
             -->



            <div class="col-xs-12 text-center">
                <button  type="submit"  id="button" name="ADD" value="ADD"  class="btn btn-success " >
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
                    <th>النوع</th>
                    <th>الشروط والمستندات المطلوبة</th>
                    <!--
                    <th> شروط تسجيل المستفيدين</th>
                    <th>المستندات الأولية عند تقديم الطلب</th>
                    <th>المستندات المطلوبة عند قبول الطلب للإعتماد</th>
                    -->

                    <th>الاجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($condtions as $item){

                    ?>
                    <tr>
                        <td><?=$x++?></td>
                        <td>
                            <?php
                            if (isset($item->type) && $item->type==1 ){
                                echo "شروط تسجيل المستفيدين";
                            }
                            else if (isset($item->type) && $item->type==2){
                                echo "المستندات الأولية عند تقديم الطلب";
                            }
                            else if(isset($item->type) && $item->type==3){
                                echo  "المستندات المطلوبة عند قبول الطلب للإعتماد";
                            }
                            ?>
                        </td>
                        <td>

                            <?php
                         if ($item->title !='0' ){
                                echo $item->title;
                     }
                          //else{
                              //echo "hhh";
                        //  }
                            ?>
                        </td>
                        <!--
                        <td><?= $item->conditions?></td>
                        <td><?= $item->files_request?></td>

                        <td><?= $item->files_accept?></td>
                        -->

                        <td>
                            <a href="<?=base_url()."public_relations/website/web_registraion/Conditions/Delete/".$item->id?>"  onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                <i class="fa fa-trash" aria-hidden="true" title="حذف"></i> </a>

                           <!-- <a href="#"><?= $item->type?></a>
                            <a href="#"><?= $item->id?></a> -->

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
    function apen(id,name_input,type) {

        var html = '<tr>' + '<td> <input class="form-control" type="'+type+'" name="'+name_input+'[]"  ></td> <td><a href="#" onclick="remove(this)"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>';

        $('#'+id).append(html);
    }
</script>
<script>
    function remove(name) {
        $(name).parents('tr').remove();
    }
</script>

<!--
<script>
    function add_row_member(){
        $("#mytable").show();
        $("#button").show();
        //
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
-->
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#example').each(function () {
            var Column_number_to_Merge = 2;
            var Previous_TD = null;
            var i = 1;
            $("tbody",this).find('tr').each(function () {

                var Current_td = $(this).find('td:nth-child(' + Column_number_to_Merge + ')');

                if (Previous_TD == null) {

                    Previous_TD = Current_td;
                    i = 1;
                    // i++;
                }
                else if (Current_td.text() == Previous_TD.text()) {

                    Current_td.remove();

                    Previous_TD.attr('rowspan', i + 1);
                    i = i + 1;
                }
                else {

                    Previous_TD = Current_td;
                    i = 1;
                }
            });
        });
    });
</script>

