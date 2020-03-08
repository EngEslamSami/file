<?php if(!empty($table)){ ?>

    <br><br>


    <table id="" class=" table table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
            <th width="2%">م</th>
            <th class="text-center">الجهة</th>
            <th class="text-center">رقم الجوال </th>
            <th class="text-center">العنوان </th>
              <th class="text-center">الإجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach ($table  as  $value) {
            ?>
            <tr>
                <td> <input type="radio" name="radio" data-title="<?= $value->title ?>"
                  id="radio" ondblclick="getTitle($(this).attr('data-title'))"></td>
                <td><?= $value->title ?></td>
                <td ><?=$value->mob ?></td>
                <td ><?=$value->address ?></td>
                    <td>

                        <a href="#" onclick="delte_geha(<?= $value->id?>);"> <i class="fa fa-trash"> </i></a>
                        <a href="#" onclick="update_geha(<?= $value->id?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>


<?php }else{ ?>

 <div class="alert alert-danger">لاتوجد  بيانات !!</div>
<?php } ?>


<script>
    function getTitle(value) {
        if(value !=''){
           $('#geha_name').val(value);
            $('#geha_name'). removeAttr('readonly');
            $('#myModalInfo').modal('hide');
        }
    }
</script>
