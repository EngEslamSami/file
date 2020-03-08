<?php if (isset($one_data) && (!empty($one_data))) { ?>
    <div class="col-md-12 no-padding">
        <div class="col-md-10 padding-4">
            <?php $one_data->ta3en_date_m = explode('/', $one_data->ta3en_date_m)[2] . '/' . explode('/', $one_data->ta3en_date_m)[1] . '/' . explode('/', $one_data->ta3en_date_m)[0];
            $one_data->ta3en_date_h = explode('/', $one_data->ta3en_date_h)[2] . '/' . explode('/', $one_data->ta3en_date_h)[1] . '/' . explode('/', $one_data->ta3en_date_h)[0];
            $one_data->end_date_m = explode('/', $one_data->end_date_m)[2] . '/' . explode('/', $one_data->end_date_m)[1] . '/' . explode('/', $one_data->end_date_m)[0];
            $one_data->end_date_h = explode('/', $one_data->end_date_h)[2] . '/' . explode('/', $one_data->end_date_h)[1] . '/' . explode('/', $one_data->end_date_h)[0]; ?>

            <table class="table table-bordered ">
                <tr>
                    <th>كود المجلس :</th>
                    <td> <?= $one_data->mg_code ?></td>
                    <th>رقم قرار التعيين :</th>
                    <td> <?= $one_data->qrar_rkm ?></td>
                </tr>
                <tr>
                    <th>تاريخ التعيين ميلادي :</th>
                    <td> <?= $one_data->ta3en_date_m ?></td>
                    <th>تاريخ التعيين هجري :</th>
                    <td> <?= $one_data->ta3en_date_h ?></td>
                </tr>
                <tr>
                    <th>تاريخ الإنتهاء ميلادي :</th>
                    <td> <?= $one_data->end_date_m ?></td>
                    <th>تاريخ الإنتهاء هجري :</th>
                    <td> <?= $one_data->end_date_h ?></td>
                </tr>
            </table>


        </div>
        <div class="col-sm-2 padding-4">

            <?php
            $qrar_mgls_morfaq = $one_data->qrar_mgls_morfaq;

            if (!empty($qrar_mgls_morfaq))
                ?>
            <label class="label">صورة قرار المجلس</label>
<?php
        $type = pathinfo($qrar_mgls_morfaq)['extension'];
                $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                $arr_doc = array('DOC', ' DOCX', 'HTML  ', 'HTM', 'ODT', 'PDF', 'XLS ', ' XLSX', 'ODS', 'PPT  ', 'PPTX', 'TXT');
                if (in_array($type, $arry_images)) {
                    ?>
                    <img id="magles_image" class="media-object center-block"
                         src="<?php if (!empty($qrar_mgls_morfaq)) {
                             echo base_url() . 'uploads/md/magls_edara/' . $qrar_mgls_morfaq;
                         } else {
                             echo base_url('asisst/fav/apple-icon-120x120.png');
                         } ?>"
                         style="max-width: 100%;height: 150px;"/>
                    <?php
                } elseif (in_array(strtoupper($type), $arr_doc)) {
                    ?>
                    <iframe src="https://docs.google.com/gview?url=<?= base_url() . 'uploads/md/magls_edara/' . $qrar_mgls_morfaq ?>&embedded=true"
                            frameborder="0" width="100%"></iframe>


                    <div class="col-sm-12">
                        <a target="_blank"
                           href="https://docs.google.com/gview?url=<?= base_url() . 'uploads/md/magls_edara/' . $qrar_mgls_morfaq ?>&embedded=true"><i
                                    class="col-sm-2 fa fa-eye"></i></a>
                        <div class="col-sm-8">

                        </div>
                        <a href="<?php echo base_url() . 'md/all_magls_edara/All_magls_edara/read_file/' . $qrar_mgls_morfaq ?>"
                           target="_blank">
                            <i class="col-sm-2 fa fa-download"></i></a>
                    </div>
                    <?php
                }
            }
            ?>


        </div>    </div>

<?php } else {
    ?>
    <div class="alert alert-danger">لا يوجد تفاصيل</div>
    <?php
} ?>
