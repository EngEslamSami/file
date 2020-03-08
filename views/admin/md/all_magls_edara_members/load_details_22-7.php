<?php if (isset($all_members) && (!empty($all_members))) { ?>
    <div class="col-md-12 no-padding">
        <div class="col-md-10 padding-4">
     

            <table class="table table-bordered ">
                <tr>
                    <th>كود المجلس :</th>
                    <td> <?= $all_members[0] ->mgls_code ?></td>
                    <th>رقم العضوية   :</th>
                    <td> <?= $all_members[0] ->rkm_odwia_full ?></td>
                </tr>
                <tr>
                    <th>إسم العضو:</th>
                    <td> <?= $all_members[0] ->mem_name ?></td>
                    <th>نوع العضوية :</th>
                    <td> <?= $all_members[0] ->no3_odwia_title ?></td>
                </tr>
                <tr>
                    <th>منصب العضو:</th>
                    <td> <?= $all_members[0] ->mansp_title  ?></td>
                    <th>تاريخ التعيين الهجري :</th>
                    <td> <?= $all_members[0] ->ta3en_date_h  ?></td>
                </tr>
                <tr>
                    <th>تاريخ التعيين الميلادي:</th>
                    <td> <?= $all_members[0] ->ta3en_date_m  ?></td>
                    <th>تاريخ تاريخ الإنتهاء الهجري :</th>
                    <td> <?= $all_members[0] ->end_date_h  ?></td>
                </tr>
                <tr>
                    <th>تاريخ الإنتهاء الميلادي:</th>
                    <td> <?= $all_members[0]->end_date_m  ?></td>
                    <th>حالة العضوية بالمجلس:</th>
                    <td> <?= $all_members[0] ->status_title  ?></td>
                </tr>
            </table>


        </div>
        <?php if($all_members[0]->status  ==2){?>
        <div class="col-sm-2 padding-4">

            <label class="label">صورة انهاء العضويه المجلس</label>
            <?php
            $morfaq_end = $all_members[0]->morfaq_end;
          //  echo '<pre>'; print_r($morfaq_end);
            if (!empty($morfaq_end)) {
                $type = pathinfo($morfaq_end)['extension'];
                $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                $arr_doc = array('DOC', ' DOCX', 'HTML  ', 'HTM', 'ODT', 'PDF', 'XLS ', ' XLSX', 'ODS', 'PPT  ', 'PPTX', 'TXT');
                if (in_array($type, $arry_images)) {
                    ?>
                    <img data-toggle="modal"
                         data-target="#myModal2"
                         onclick="$('#my_image').attr('src',$(this).attr('src'));"
                         id="magles_image" class="media-object center-block"
                         src="<?php if (!empty($morfaq_end)) {
                             echo base_url() . 'uploads/md/magls_edara_members/' . $morfaq_end;
                         } else {
                             echo base_url().'asisst/fav/apple-icon-120x120.png';
                         } ?>"
                         style="width: 100%;height: auto;"/>
                    <?php
                } elseif (in_array(strtoupper($type), $arr_doc)) {
                    ?>
                    <iframe src="https://docs.google.com/gview?url=<?= base_url() . 'uploads/md/magls_edara_members/' . $morfaq_end ?>&embedded=true"
                            frameborder="0" width="100%"></iframe>


                    <div class="col-sm-12">
                        <a target="_blank"
                           href="https://docs.google.com/gview?url=<?= base_url() . 'uploads/md/magls_edara_members/' . $morfaq_end ?>&embedded=true"><i
                                    class="col-sm-2 fa fa-eye"></i></a>
                        <div class="col-sm-8">

                        </div>
                        <a href="<?php echo base_url() . 'md/all_magls_edara/All_magls_edara/magls_edara_members/' . $morfaq_end ?>"
                           target="_blank">
                            <i class="col-sm-2 fa fa-download"></i></a>
                    </div>
                    <?php
                }
            }}
            ?>


        </div>    </div>

<?php } else {
    ?>
    <div class="alert alert-danger">لا يوجد تفاصيل</div>
    <?php
} ?>
