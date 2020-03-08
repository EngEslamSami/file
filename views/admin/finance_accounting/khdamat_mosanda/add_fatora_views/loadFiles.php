<?php if (!empty($all_files)) {

    $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
    $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
    ?>
    <?php $x = 1;
    foreach ($all_files as $row_img) {
        $ext = pathinfo($row_img->file, PATHINFO_EXTENSION) ?>

        <?php if (!empty($row_img->file)) {


            $img_url = "uploads/images/finance_accounting/khdamat_mosanda/" . $row_img->file;
        } else {
            $img_url = "asisst/web_asset/img/logo.png";


        } ?>
        <tr class="<?= $x ?>" style="text-align: center">

            <td><?php echo $row_img->title; ?></td>
            <td><?php echo $row_img->img_type; ?></td>
            <td><?php echo $row_img->publisher_name; ?></td>
            <td><?php echo $row_img->date_ar; ?></td>
            <td>
                <a href="#" onclick="DeleteFileRow(<?= $x ?>,<?= $row_img->id ?>)"><i class="fa fa-trash"></i></a>
                <?php
                if (in_array($ext, $image)) {
                    ?>

                    <a data-toggle="modal" data-target="#myModal-view"
                       onclick="$('#my_image').attr('src','<?php echo base_url() . $img_url ?>');"><i class="fa fa-eye"
                                                                                                      title=" قراءة"></i></a>

                    <?php
                } else if (in_array($ext, $file)) {
                    ?>

                    <a target="_blank"
                       href="<?php echo base_url() . 'finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/read_file/' . $row_img->file; ?>"><i
                                class="fa fa-eye" title=" قراءة"></i></a>
                    <?php
                }
                ?>
            </td>

        </tr>
        <?php $x++;
    }
}else{  ?>


<tr><td colspan="5" style="text-align: center;color: red"> لا توجد مرفقات !!</td></tr>


<?php  } ?>

<script>

    function DeleteFileRow(num,fileID){
        $("." + num).remove();
        var dataString = 'id=' + fileID ;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>finance_accounting/khdamat_mosanda/add_fatora/Add_fatora/Delete_attach',
            data:dataString,
            cache:false,
            success: function(json_data){
                var JSONObject = JSON.parse(json_data);
                console.log(JSONObject);

            }
        });

    }
</script>






















