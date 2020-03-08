
  
                   <div class="col-md-12 ">
                        <h4><i class="fa fa-paperclip"></i> المرفقات</h4>
                        <div class="row">
                            <?php foreach ($files as $files) { ?>
                                <div class="  col-sm-2 col-xs-4">
                                    <div class="card">
                                        <img class="img-thumbnail img-responsive card-img-top" alt="attachment"
                                             style="width: 100px;height: 100px;"
                                             src="<?php echo base_url() ?>/uploads/emails/<?= $files->file; ?>">
                                        <div class="card-body">
                                            <div class="card-footer ">
                                                <div class="col-md-12">
                                                    <?php
                                                    if (!empty($files->file) || $files->file != 0) {
                                                        $ext = pathinfo($files->file, PATHINFO_EXTENSION);
                                                        $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                                        $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                                        if (in_array($ext, $img)) {
                                                            ?>
                                                            <div class="col-md-2">
                                                                <a onclick="$('#email_img').attr('src','<?= base_url() . "uploads/emails/" . $files->file ?>')"
                                                                   data-toggle="modal" data-target="#exampleModal"
                                                                   class="btn btn-info btn-xs">
                                                                    <i class="fa fa-eye" title=" قراءة"></i> </a>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="col-md-2">
                                                            <a href="<?= base_url() . "all_secretary/email/Emails/download_file/" . $files->file ?>"
                                                               class="btn btn-info btn-xs" download>
                                                                <i class="fa fa-download " aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                        <?php
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
  
  
  
