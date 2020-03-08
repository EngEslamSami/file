<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">ربط الإدارات بالأقسام </h3>
        </div>
        <div class="panel-body">
            <div class="col-xs-4 " >
            <button type="button" value="" id="" onclick="add_row_member()" class="btn btn-success btn-next"/>
            <i class="fa fa-plus"></i>  </button><br><br>
                </div>

            <div class="col-sm-12">
                <?php echo  form_open("society_system/Add_society_system/update_society_system");?>

                <table   class="table table-striped table-bordered " style="display: none" id="mytable" >
                    <thead>
                    <tr class="info">
                        <th>إدارة  النظام</th>
                        <th>إدارة  الجمعية</th>
                        <th>تعديل</th>
                    </tr>
                    </thead>
                    <tbody >
                    <tr>
                    <td>
                        <select name="name" id="name"  class=" form-control" data-validation="required">
                            <option value="">اختر</option>
                            <?php
                            if (isset($departments) && $departments != null){
                                foreach ($departments as $row ){
                                    ?>
                                    <option value="<?= $row->id?>"><?=$row->name?></option>
                            <?php
                                }

                            }
                            ?>
                            </select>

                    </td>
                    <td>
                        <select name="society_dep_name" id="society_dep_name"  class=" form-control"  data-validation="required">
                            <option value="">اختر</option>
                            <?php
                              if (isset($system) && $system != null ){
                                  foreach ($system as $record){
                                      ?>
                                      <option value="<?= $record->id?>"> <?= $record->society_dep_name?></option>
                            <?php
                                  }
                              }
                            ?>

                        </select>

                    </td>
                    <td>
                        <input type="submit" name="UPDTATE" class="btn btn-success" value="حفظ">

                    </td>
                    </tr>



                    </tbody>

                    </table>

                <?php  echo form_close()?>

            </div>
            <div class="col-sm-12">
                <?php
                if (isset($updated_system) && $updated_system!= null){
                $x= 1;
                ?>

                <table  class="table table-striped table-bordered ">
                    <thead>
                    <tr  class="info">
                      <th>م</th>
                        <th>إدارة  النظام</th>
                      <th>إدارة الجمعية</th>
                      <th>الإجراء</th>
                    </tr>


                    </thead>
                    <tbody>
                    <?php

                        foreach ($updated_system as $row){
                            ?>
                            <tr>

                    <td><?= $x++?></td>
                                <td><?=$row->name?></td>
                    <td><?= $row->society_dep_name?></td>
                    <td>
                       <!-- <?php /*echo  form_open("society_system/Add_society_system/system_set/".$row->id);*/?>
                        <input type="submit" name="SET" class="btn btn-success" value="تهيئة">-->
                        
                        <a href="<?=base_url()."society_system/Add_society_system/system_set/".$row->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                            <i class="fa fa-trash" aria-hidden="true"></i></a>

                        <a href="#" data-toggle="modal" data-target="#myModal<?=$row->id?>" title="تعديل" >
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                    </td>
                            </tr>
                    <?php    }
                    }
                    ?>


                    </tbody>
                    </table>



                </div>

            <!-- update modal -->
            <?php
            if (isset($updated_system) && $updated_system!= null){
            foreach ($updated_system as $row) {
                ?>
                <div id="myModal<?=$row->id?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">تعديل بيانات الاجهزة</h4>
                            </div>
                            <div class="modal-body">
                                <?php echo  form_open("society_system/Add_society_system/update_society_system");?>
                                <table class="table table-striped table-bordered " id="mytable">
                                    <thead>
                                    <tr class="info">
                                        <th>إدارة النظام</th>
                                        <th>إدارة الجمعية</th>
                                        <th>تعديل</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>

                                            <select name="name" id="name" class=" form-control"
                                                    data-validation="required">
                                                <option value="">اختر</option>

                                                <?php
                                                if (isset($departments) && $departments != null) {
                                                    foreach ($departments as $value) {
                                                        ?>
                                                        <option value="<?= $value->id ?>" <?php
                                                        if ($value->id == $row->system_dep_fk) {
                                                            echo "selected";
                                                        }
                                                        ?>><?= $value->name ?>

                                                        </option>
                                                        <?php
                                                    }

                                                }
                                                ?>
                                            </select>

                                        </td>
                                        <td>
                                            <select name="society_dep_name" id="society_dep_name" class=" form-control"
                                                    data-validation="required">
                                                <option value="">اختر</option>
                                                <option value="<?=$row->id?>" selected><?=$row->society_dep_name?></option>

                                                <?php
                                                if (isset($system) && $system != null) {
                                                    foreach ($system as $record) {
                                                        ?>
                                                        <option value="<?= $record->id ?>" <?php
                                                        if ($record->id == $row->id) {
                                                            echo "selected";
                                                        }
                                                        ?> > <?= $record->society_dep_name ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </select>

                                        </td>
                                        <td>

                                            <input type="submit" name="UPDTATE" class="btn btn-success" value="حفظ">


                                        </td>
                                    </tr>


                                    </tbody>

                                </table>
                                <?php  echo form_close()?>

                            </div>

                        </div>
                    </div>
                </div>


                <?php
            }}
            ?>
            <!-- update modal -->

        </div>
        </div>

</div>






<script>
    function add_row_member(){
        $("#mytable").show();



    }
</script>