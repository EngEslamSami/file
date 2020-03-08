<div class="col-md-12">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr class="info">
                <th colspan="2" style="text-align: center;">مرفقات</th>
            </tr>
            </thead>
            <tbody id="morfq_table">
            <?php
            if ((isset($result)) && !empty($result)) {
                $esal_id = $result->id;
                if ((isset($result->attaches)) && !empty($result->attaches)) {
                    $z = 1;
                    foreach ($result->attaches as $attach) {
                        ?>
                        <tr id="row_<?= $z ?>">

                            <td style="width: 80%"  >
                                <?php
                                $ext = pathinfo($attach->morfaq, PATHINFO_EXTENSION);
                                $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
                                if (in_array($ext, $image)) {
                                    ?>
                                    <a data-toggle="modal"
                                       onclick="$('#img_morfaq').attr('src','<?= base_url() . "uploads/st/esalat_estlam/" . $attach->morfaq ?>')"
                                       data-target="#myModal-view">
                                        <i class="fa fa-eye" title=" قراءة"></i> </a>

                                    <?php
                                } elseif (in_array($ext, $file)) {
                                    ?>
                                    <a target="_blank"
                                       href="<?= base_url() . "st/esalat/Esalat_estlam/read_file/" . $attach->morfaq ?>">
                                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        $z++;
                    }
                }
            } else { ?>
                <tr id="row_1" style="width: 80%">

                    <td><input type="file" name="morfaq[]"
                               class="form-control testButton inputclass"
                               id="morfaq1" value=""

                        /></td>


  
                </tr>
            <?php } ?>
            </tbody>
   

        </table>
    </div>
   



<!-- modal view -->
<!-- modal view -->
