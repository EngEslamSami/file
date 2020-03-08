<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
            <?php
           if (isset($get_emp) && !empty($get_emp)){
              echo form_open('public_relations/website/edara_tanfezia/Edara_tanfezia/Update/'.$get_emp->id);

           } else {
               echo form_open('public_relations/website/edara_tanfezia/Edara_tanfezia/add_managment');
           }
            ?>
            <div class="col-x-12">
                <table class="table table-bordered" id="empTable">
                    <thead>
                    <tr class="info">
                        <th> الادارة</th>
                        <th> القسم</th>
                        <th> الموظف</th>
                        <th> الترتيب</th>
                        <?php
                       if (isset($get_emp)&& !empty($get_emp)){
                           ?>
                        <?php
                       } else{
                           ?>
                           <th>الإجراء</th>
                        <?php
                       }
                        ?>

                    </tr>
                    </thead>

                    <tbody  id="result">
                    <?php if(isset($get_emp) && !empty($get_emp)){ ?>

                            <tr>
                                <td>
                                    <select class="form-control " id="edara_id_fk<?= $get_emp->id ?>"   name="edara_id_fk"  onchange="get_qsm(this.value,<?= $get_emp->id ?>);"  class="form-control"   data-validation="required">

                                        <option value="">اختر</option>

                                        <?php
                                        if(isset($adminstations) && !empty($adminstations)){
                                            foreach ($adminstations as $row){
                                                ?>
                                                <option value="<?php echo $row->id;?>"
                                                    <?php
                                                    if ($get_emp->edara_id_fk==$row->id){
                                                        echo 'selected';
                                                    }
                                                    ?>><?php echo $row->name;?></option>

                                            <?php }} else { ?>
                                            <option value="">لايوجد ادارات مضافة</option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control " id="qsm_id_fk<?= $get_emp->id ?>"     name="qsm_id"  onchange="get_emp(this.value,<?= $get_emp->id ?>);"    data-validation="required" style="width: 100px;">

                                        <option value="<?= $get_emp->qsm_id?>"><?= $get_emp->qsm_name?></option>

                                    </select>

                                </td>

                                <td>
                                    <select class="form-control " id="emp_id<?= $get_emp->id ?>"     name="emp_id_fk"  >

                                        <option value="<?= $get_emp->emp_id_fk?>"><?= $get_emp->emp_name?></option>

                                    </select>

                                </td>
                                <td>
                                    <input class="form-control" name="emp_order" id="emp_order<?= $get_emp->id ?>" value="<?= $get_emp->emp_order?>">
                                </td>


                            </tr>


                        <?php
                    } else {
                        ?>
                        <tr >
                            <td id="1">


                            <select class="form-control " id="edara_id_fk1"   name="edara_id_fk[]"  onchange="get_qsm(this.value,<?= 1?>);"  class="form-control"   data-validation="required">

                                <option value="">اختر</option>

                                <?php
                                if(isset($adminstations) && !empty($adminstations)){
                                    foreach ($adminstations as $row){
                                        ?>
                                        <option value="<?php echo $row->id;?>"

                                        ><?php echo $row->name;?></option>

                                    <?php }} else { ?>
                                    <option value="">لايوجد ادارات مضافة</option>
                                <?php } ?>
                            </select>
                            </td>

                            <td>
                                <select class="form-control " id="qsm_id_fk1"     name="qsm_id[]"  onchange="get_emp(this.value,1);"    data-validation="required" style="width: 100px;">

                                    <option value="">اختر</option>

                                </select>

                            </td>

                            <td>
                                <select class="form-control " id="emp_id<?= 1?>"     name="emp_id_fk[]"  data-validation="required">

                                    <option value="">اختر</option>

                                </select>

                            </td>
                            <td>
                                <input class="form-control" name="emp_order[]" id="emp_order1">
                            </td>
                            <td>
                                <a readonly href="#" id="delempTable"  onclick="deleteRow(this,'empTable')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <a href="#" onclick="add_row();" class="plus-btn"><i class="fa fa-plus"></i>
                                </a>
                            </td>
                        </tr>

                        <?php
                    }  ?>
                    </tbody>




                </table>
            </div>
            <div class="col-xs-12 text-center">

                <button type="submit"  class="btn btn-labeled btn-success " name="save" value="save"  style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

            </div>
            <?php
            echo form_close();
            ?>


        </div>
    </div>

</div>
<?php
if (isset($all) && !empty($all)){
    $x=1;
    ?>


<div class="col-xs-12">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
            <div class="col-xs-12">
                <table class="table example table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>الادارة</th>
                        <th>القسم</th>
                        <th>الموظف</th>
                        <th>الترتيب</th>
                        <th>الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($all as $row){
                        ?>
                        <tr>
                            <td><?= $x++?></td>
                            <td><?= $row->edara_name?></td>
                            <td><?= $row->qsm_name?></td>
                            <td><?= $row->emp_name?></td>
                            <td><?= $row->emp_order?></td>
                            <td>
                             
                               <a href="#" onclick='swal({
                                    title: "هل انت متأكد من التعديل ؟",
                                    text: "",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "btn-warning",
                                    confirmButtonText: "تعديل",
                                    cancelButtonText: "إلغاء",
                                    closeOnConfirm: false
                                    },
                                    function(){

                                    window.location="<?= base_url().'public_relations/website/edara_tanfezia/Edara_tanfezia/Update/'.$row->id ?>";
                                    });'>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="#" onclick='swal({
                                    title: "هل انت متأكد من الحذف ؟",
                                    text: "",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "btn-danger",
                                    confirmButtonText: "حذف",
                                    cancelButtonText: "إلغاء",
                                    closeOnConfirm: false
                                    },
                                    function(){
                                    swal("تم الحذف!", "", "success");
                                    window.location="<?= base_url().'public_relations/website/edara_tanfezia/Edara_tanfezia/Delete/'.$row->id ?>";
                                    });'>
                                    <i class="fa fa-trash"> </i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    </table>

            </div>


        </div>
        </div>
</div>
    <?php
}
?>






<script>

    function get_emp(id_qsm,id_pop) {

      //  alert(id_qsm);
        if (id_qsm != 0 && id_qsm != "") {
            var dataString = "id_qsm=" + id_qsm;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>public_relations/website/edara_tanfezia/Edara_tanfezia/GetDepart',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {

                    $("#emp_id"+id_pop).html(html);
                }
            });
        }
    }
</script>


<script>

    function get_qsm(id_depart,id_pop) {
        // alert(id_depart);
        if (id_depart != 0 && id_depart != "") {
            var dataString = "id_depart=" + id_depart;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>public_relations/website/edara_tanfezia/Edara_tanfezia/GetDepart',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#qsm_id_fk"+id_pop).html(html);

                }
            });
        }
    }
</script>
<script>

    function deleteRow(row,tableId) {
        var i = row.parentNode.parentNode.rowIndex;

        document.getElementById(tableId).deleteRow(i);

    }

</script>


<script>
    function add_row(){


        var x = document.getElementById('result');
        var len = x.rows.length +1;
        var dataString   ='length=' + len;

        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>public_relations/website/edara_tanfezia/Edara_tanfezia/add_emp_row',
            data:dataString,
            dataType: 'html',

            cache:false,
            success: function(html){

                $("#result").append(html);

            }
        });
    }


</script>

