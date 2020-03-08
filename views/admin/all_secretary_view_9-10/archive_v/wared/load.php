<!-- yara -->





				
                    <?php
                    if (isset($morfqat) && !empty($morfqat)){
                        $x=1;
                        $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                        $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                        if (isset($folder_path) && !empty($folder_path)){
                            $folder= $folder_path;
                        } else{
                            $folder ='';
                        }
                        ?>
                    <table  id="example88" class="table example table-bordered table-striped table-hover">
                        <thead>
                          <tr class="greentd">
                              <th>م</th>
                              <th>نوع الملف</th>
                              <th>اسم الملف</th>
                              <th> الملف</th>
                              <th>الحجم</th>
                              <th>التاريخ</th>
                              <th>بواسطة</th>
                              <th>الاجراء</th>

                          </tr>
                        </thead>
                        <tbody >
                        <?php
                        foreach ($morfqat as $morfaq){
                            $ext = pathinfo($morfaq->file, PATHINFO_EXTENSION);
                           //  $Destination = 'uploads/archive/deals/1bec9894697603bd9a45630d73230be5.jpg';

                            $Destination = $folder .'/'.$morfaq->file;
                            if (file_exists($Destination)){
                                $bytes=  filesize($Destination) ;
                            } else{
                                $bytes ='';
                            }

                             $size = '';
                            if ($bytes >= 1073741824)
                            {
                                $size = number_format($bytes / 1073741824, 2) . ' GB';
                            }
                            elseif ($bytes >= 1048576)
                            {
                                $size = number_format($bytes / 1048576, 2) . ' MB';
                            }
                            elseif ($bytes >= 1024)
                            {
                                $size = number_format($bytes / 1024, 2) . ' KB';
                            }
                            elseif ($bytes > 1)
                            {
                                $size = $bytes . ' bytes';
                            }
                            elseif ($bytes == 1)
                            {
                                $size = $bytes . ' byte';
                            }
                            else
                            {
                                $size = '0 bytes';
                            }
                            ?>
                            <tr>
                                <td><?= $x++?></td>
                                <td>
                                    <?php
                                    if (in_array($ext,$image)){?>
                                    <i class="fa fa-picture-o" aria-hidden="true" style="color: #d93bff;"></i>
                                   <?php } elseif (in_array($ext,$file)){?>
                                    <i class="fa fa-file-pdf-o" aria-hidden="true" style="color: red;"></i>

                                  <?php  }
                                    ?>

                                </td>
                                <td>
                                    <?php
                                    if (!empty($morfaq->title)){
                                        echo $morfaq->title;
                                    } else{
                                        echo 'لا يوجد ' ;
                                    }
                                    ?>

                                </td>
                                <td>
                                    <?php
                                    if (in_array($ext,$image)){
                                        ?>
                                        <a data-toggle="modal" data-target="#myModal-view-<?= $morfaq->id ?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                                        <!-- modal view -->
                                        <div class="modal fade" id="myModal-view-<?= $morfaq->id ?>" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="<?= base_url().$folder .'/'.$morfaq->file?>"
                                                             width="100%" alt="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                                            إغلاق
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal view -->
                                    <?php
                                    } elseif (in_array($ext,$file)){
                                        ?>
                                        <a target="_blank" href="<?=base_url()."all_secretary/archive/wared/Add_wared/read_file/".$folder.'/'.$morfaq->file?>">
                                            <i class="fa fa-upload" title=" قراءة"></i> </a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?= $size?>
                                </td>
                                <td>
                                    <?php
                                    if (!empty($morfaq->date_ar)){
                                        echo $morfaq->date_ar;
                                    } else{
                                        echo 'غير محدد  ' ;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (!empty($morfaq->publisher_name)){
                                        echo $morfaq->publisher_name;
                                    } else{
                                        echo 'غير محدد  ' ;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <i class="fa fa-trash" style="cursor: pointer"
                                       onclick="delete_morfq(<?= $morfaq->id ?>,<?= $morfaq->wared_id_fk ?>)"></i>
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
                   
                   <script>




$('#example88').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'pageLength',
        'copy',
        'csv',
        'excelHtml5',
        {
            extend: "pdfHtml5",
            orientation: 'landscape'
        },

        {
            extend: 'print',
            exportOptions: { columns: ':visible'},
            orientation: 'landscape'
        },
        'colvis'
    ],
    colReorder: true
} );



</script>



<!-- yara -->