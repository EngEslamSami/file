<?php if ( (isset($last))&&($last == 0)) {
    $display="none";
}else{
    $display='block';
}?>
<div class="col-xs-12   " style="display: <?=$display?>">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">

            <div >
                <?php echo form_open_multipart(base_url() . "finance_accounting\open_finance_year\Open_finance_year/add_year") ?>
<br>
                <div class="col-sm-12" >
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half"> سنة </label>
                        <input type="number" class="form-control  half input-style " id="year" name="year"/>

                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half"> من </label>
                        <input type="date" class="form-control  half input-style " id="from_date" name="from_date"/>

                    </div>
                    <div class="form-group col-sm-4 col-xs-12">
                        <label class="label label-green  half"> الى </label>
                        <input type="date" class="form-control  half input-style " id="to_date" name="to_date"/>

                    </div>


                </div>
                <div class="col-sm-12">
                    <div class="form-group col-sm-4 col-xs-12"></div>
                    <div class="form-group col-sm-4 col-xs-12"></div>
                    <div class="col-sm-4 ">
                        <input type="submit" value=" حفظ " name="add" class="btn btn-primary search center-block "/>

                        <br/>
                    </div>
                </div>

                <?php echo form_close() ?>
             </div>


        </div>
    </div>
</div>

            <div class="col-xs-12  ">
                <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $title2 ?></h3>
                    </div>
                    <div class="panel-body">
                <table class=" table table-striped table-bordered dt-responsive nowrap dataTable "
                       cellspacing="0" width="100%">
                    <thead>
                    <tr class="info">
                        <th> م</th>
                        <th> السنة</th>
                        <th> من تاريخ</th>
                        <th> الى تاريخ</th>
                        <th> إجراء</th>
                    </tr>

                    </thead>
                    <tbody>
                    <?php if ((isset($all)) && (!empty($all))) {
                        foreach ($all as $key => $value) {
                            ?>
                            <tr>

                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $value->year; ?></td>
                                <td><?php echo $value->from_date_ar; ?></td>
                                <td><?php echo $value->to_date_ar; ?></td>

                                <td>
                                    <a href="<?php echo base_url() . "finance_accounting\open_finance_year\Open_finance_year/delet_year/" . $value->id ?>"
                                       onclick="return confirm('هل انت متاكد  من عمليه الحذف؟');"><i class="fa fa-trash"
                                                                                                     aria-hidden="true"></i>
                                    </a>
                                    <a data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil" aria-hidden="true" onclick="update('<?=$value->id?>','<?=$value->to_date_ar?>','<?=$value->from_date_ar?>','<?=$value->year?>')"></i>
                                    </a>


                                </td>
                            </tr>
                            <?php

                        }

                    } ?>


                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog" role="document" style="width: 80%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">تعديل السنة المالية </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body row">
                                <?php echo form_open_multipart(base_url() . "finance_accounting\open_finance_year\Open_finance_year/update_year") ?>

                                <div class="col-sm-12">
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> سنة </label>
                                        <input type="number" class="form-control  half input-style " id="year_up" name="year_up"/>

                                    </div>

                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> من </label>
                                        <input type="date" class="form-control  half input-style " id="from_date_up" name="from_date_up"/>

                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label class="label label-green  half"> الى </label>
                                        <input type="date" class="form-control  half input-style " id="to_date_up" name="to_date_up"/>
                                        <input type="hidden" class="form-control  half input-style " id="id" name="id" value=""/>

                                    </div>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">أغلاق</button>
                                <button type="submit" class="btn btn-primary"> حفظ</button>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>

    function update(id,to,from,year) {

        console.log("show value" + id +" , "+ to +" , "+from+" , "+year);
        $('#year_up').val(year);
        $('#from_date_up').val(from);
        $('#to_date_up').val(to);
        $('#id').val(id);

    }
</script>