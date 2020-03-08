<style type="text/css">

    .reply-comment{
        display: inline-block;
        width: 100%;
        margin-bottom: 20px
    }
    .reply-img{
        width: 15%;
        float: right;
    }
    .reply-img img{
        width: 100%;
        max-width: 70px;
        height: 70px;
        border:1px solid #eee;
    }
    .reply-comment{
        float: right;
        width: 85%;
    }
    .label-inverse{
        background-color: #888;
        color: #fff;
    }
    .reply-comment  span.label{
        text-align: center;
        padding-right: 10px;
        display: inline-block;
        width: auto;
        font-size:14px;
    }
    .reply-comment .name{
        color: #888;
        font-size:15px;
    }
    .comments-sec .well{
        height: 100%;
    }
    .bubble-div img{
        width: 150px;
        max-width: 100%;
    }
    .btn-group>.btn, .btn-group>.btn+.btn, .btn-group>.btn:first-child, .fc .fc-button-group>* {
        margin: 0 0 0 0;
    }
</style>

<div class="col-sm-12 no-padding " >

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">  <?= $title?></h3>
         </div>
        <div class="panel-body" style="min-height: 485px;">
           <div class="vertical-tabs">
			<ul class="nav nav-tabs nav-tabs-vertical" role="tablist">
				<li class="nav-item active">
					<a class="nav-link " data-toggle="tab" href="#pag1" role="tab" aria-controls="pag1"><i class="fa fa-2x fa-keyboard-o "></i> تفاصيل المعاملة</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag2" role="tab" aria-controls="pag2"><i class="fa fa-2x fa-paperclip"></i> المرفقات</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag3" role="tab" aria-controls="pag3"><i class="fa fa-2x fa-folder-open-o"></i> العلاقات</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag4" role="tab" aria-controls="pag4"><i class="fa fa-2x fa-reply-all"></i> التحويلات</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag5" role="tab" aria-controls="pag5"><i class="fa fa-2x fa-comment-o"></i> التوجيهات / التأشيرات</a>
				</li>


			</ul>


			<div class="tab-content tab-content-vertical">
                <div class="tab-pane active" id="pag1" role="tabpanel">

                    <div class="col-xs-12 no-padding">
                        <div class="col-sm-9 col-xs-12">
                            <?php
                            if (isset($get_all) && !empty($get_all)){
                                ?>

                            <table class="table  table-striped table-bordered dt-responsive nowrap">
                                <tbody>
                                <tr>
                                    <th style="width: 110px"> رقم  الصادر</th>
                                    <td><?= $get_all->sader_rkm ?></td>

                                </tr>
                                <tr>
                                    <th>تاريخ التسجيل  </th>
                                    <td><?php if (!empty($get_all->tasgel_date)) {
                                            echo  $get_all->tasgel_date;
                                        } else{
                                            echo 'غير محدد' ;
                                        }
                                        ?></td>

                                </tr>
                                <tr>
                                    <th>تاريخ الارسال </th>
                                    <td><?php if (!empty($get_all->ersal_date)) {
                                            echo  $get_all->ersal_date;
                                        } else{
                                            echo 'غير محدد' ;
                                        }
                                        ?></td>

                                </tr>
                                <tr>
                                    <th> جهة الاختصاص </th>
                                    <td><?php if (!empty($get_all->geha_ekhtsas_n)) {
                                            echo  $get_all->geha_ekhtsas_n;
                                        } else{
                                            echo 'غير محدد' ;
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <th>المجلد</th>
                                    <td><?php if (!empty($get_all->folder_path)) {
                                            echo  $get_all->folder_path;
                                        } else{
                                            echo 'غير محدد' ;
                                        }
                                        ?></td>

                                </tr>
                                <tr>
                                    <th> نوع الخطاب</th>
                                    <td>
                                           <span class="label" style="background-color: #32e26b">
                                        <?php if (!empty($get_all->no3_khtab_n)) {
                                            echo  $get_all->no3_khtab_n;
                                        } else{
                                            echo 'غير محدد' ;
                                        }
                                        ?>
                                           </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>اسم الموضوع</th>
                                    <td>
                                         <span class="label" style="background-color: #ff8080">
                                        <?php if (!empty($get_all->mawdo3_name)) {
                                            echo  $get_all->mawdo3_name;
                                        } else{
                                            echo 'غير محدد' ;
                                        }
                                        ?></span></td>

                                </tr>
                                <tr>
                                    <th>الموضوع</th>
                                    <td><?php if (!empty($get_all->mawdo3_subject)) {
                                            echo  $get_all->mawdo3_subject;
                                        } else{
                                            echo 'غير محدد' ;
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                   <th>طريقة الارسال</th>
                                    <td><?php if (!empty($get_all->tarekt_ersal_n)) {
                                            echo  $get_all->tarekt_ersal_n;
                                        } else{
                                            echo 'غير محدد' ;
                                        }
                                        ?></td>

                                </tr>
                                <tr>
                                  <th> سري للغاية</th>
                                    <td><?php if ($get_all->is_secret==1) {
                                            echo  'نعم';
                                        } else if ($get_all->is_secret==2){
                                            echo 'لا' ;
                                        }
                                        ?></td>

                                </tr>
                                <tr>
                                   <th>الجهة المرسل اليها</th>
                                    <td><?php if (!empty($get_all->geha_morsel_n)) {
                                            echo  $get_all->geha_morsel_n;
                                        } else{
                                            echo 'غير محدد' ;
                                        }
                                        ?></td>

                                </tr>
                                <tr>
                                    <th>اسم المستلم</th>
                                    <td><?php if (!empty($get_all->mostlem_name)) {
                                            echo  $get_all->mostlem_name;
                                        } else{
                                            echo 'غير محدد' ;
                                        }
                                        ?></td>

                                </tr>
                                <tr>
                                   <th>الأولوية</th>
                                    <td>

                                        <?php if (!empty($get_all->awlawia_n)) {
                                            echo  $get_all->awlawia_n;
                                        } else{
                                            echo 'غير محدد' ;
                                        }
                                        ?>

                                    </td>
                                </tr>
                                <tr>
                                  <th>تاريخ الاستحقاق</th>
                                    <td><?php if (!empty($get_all->esthkak_date)) {
                                            echo  $get_all->esthkak_date;
                                        } else{
                                            echo 'غير محدد' ;
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <th> يحتاج متابعة</th>
                                    <td><?php if ($get_all->need_follow==1) {
                                            echo  'نعم';
                                        } else if ($get_all->need_follow==2){
                                            echo 'لا' ;
                                        }
                                        ?></td>

                                </tr>
                                <tr>
                                  <th>ملاحظات</th>
                                    <td><?php if (!empty($get_all->notes)) {
                                            echo  $get_all->notes;
                                        } else{
                                            echo 'غير محدد' ;
                                        }
                                        ?></td>

                                </tr>


                                </tbody>



                            </table>


                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-3">
                            <div class="left-archive-aside">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">الوقت المستغرق</h5>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table minutes-table">
                                            <tbody>
                                            <tr>
                                                <td>09</td>
                                                <td>08</td>
                                                <td>07</td>
                                                <td>06</td>
                                                <td>05</td>
                                            </tr>
                                            <tr>
                                                <td>ثانية</td>
                                                <td>دقيقة</td>
                                                <td>ساعة</td>
                                                <td>يوم</td>
                                                <td>شهر</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">الكود المختصر</h5>
                                    </div>
                                    <div class="panel-body">
                                        <p> ACS-ITD-INT-6392-9803-9 </p>

                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">تمت الإضافة بواسطة</h5>
                                    </div>
                                    <div class="panel-body">
                                        <h5>  alatheer</h5>

                                        <p>2019-07-16 1:56 pm
                                        </p>
                                        <p>IP : 192.168.1.12</p>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><i class="fa fa-folder-o"></i> قصاصات <a href="#" class="btn btn-default btn-labeled" style="float: left;"><span class="btn-label"><i class="fa fa-plus"></i></span>إضافة</a></h5>
                                    </div>
                                    <div class="panel-body">
                                        <p> لايوجد أى مستندات حتى الأن </p>

                                    </div>
                                </div>


                            </div>


                        </div>
                    </div>

                </div>
				<div class="tab-pane" id="pag2" role="tabpanel">



                        <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            ادراج مرفق جديد
                        </button>

                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="form-group padding-4 col-md-2 col-xs-12">
                                <label class="label ">     اسم المرفق</label>
                                <input type="text" class="form-control  testButton inputclass"
                                       name="title" id="title"
                                       readonly="readonly"
                                       onclick="$('#myModal').modal('show'); load_page(501);changePage('      اسم المرفق','title', '');"
                                       style="cursor:pointer;border: white;color: black;width: 80%;float: right;"

                                       value="">
                                <input type="hidden" id="page" data-id="" data-title="" data-typee="" data-colname="">
                                <button type="button"  onclick="$('#myModal').modal('show');load_page(501);changePage('      اسم المرفق','title', '');"
                                        class="btn btn-success btn-next" >
                                    <i class="fa fa-plus"></i></button>

                            </div>
                            <div class="form-group padding-4 col-md-2 col-xs-12">
                                <label class="label ">      المرفق</label>
                                <input type="file" class="form-control   " name="morfaq[]" id="morfaq">

                            </div>
                            <div class="  col-md-2">
                                <button type="button" onclick="upload_img(<?= $this->uri->segment(6)?>)" style="margin-top: 25px;"  class="btn btn-labeled btn-success " name="add" value="add"   >
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div><br>
                    <div class="col-xs-12" id="morfaq_result">


				
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
                    <table class="table example table-bordered table-striped table-hover">
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
                            $ext = pathinfo($morfaq->morfaq, PATHINFO_EXTENSION);

                            $Destination = $folder .'/'.$morfaq->morfaq;
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
                                    if (in_array($ext,$image)){
                                        ?>

                                        <i class="fa fa-picture-o" aria-hidden="true" style="color: #d93bff;"></i>
                                    <?php

                                    } elseif (in_array($ext,$file)){
                                       ?>
                                        <i class="fa fa-file-pdf-o" aria-hidden="true" style="color: red;"></i>
                                    <?php

                                    }
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
                                                        <img src="<?= base_url().$folder .'/'.$morfaq->morfaq?>"
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
                                         $file_n = 'uploads/archive/deals/';
                                        ?>
                                        <a target="_blank" href="<?=base_url()."all_secretary/archive/sader/Add_sader/read_file/".$folder.'/'.$morfaq->morfaq?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>


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

                                   <a href="<?= base_url().$folder.'/'.$morfaq->morfaq?>" download>  <i class="fa fa-download fa-2x" aria-hidden="true" ></i> </a>
                                   <!-- <a href="pdf_server.php?file=pdffilename">Download my eBook</a> -->



                                     <!--   <i class="fa fa-download fa-2x" aria-hidden="true"  download></i>-->

                                    <i class="fa fa-trash" style="cursor: pointer"
                                       onclick="delete_morfaq(<?= $morfaq->id ?>,<?= $morfaq->sader_id_fk ?>)"></i>
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
                    </div>

				</div>
				<div class="tab-pane" id="pag3" role="tabpanel">
                    <div class="form-group padding-4 col-md-3 col-xs-12">
                        <label class="label ">      ارفاق رقم المعاملة</label>
                        <input type="text" class="form-control  testButton inputclass"
                               name="mo3mla_rkm" id="mo3mla_rkm"
                               readonly="readonly"
                               onclick="$('#relationModal').modal('show'); "

                               style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                               value="">
                        <input type="hidden" name="type" id="type" value="">
                        <input type="hidden" name="realtion_id" id="realtion_id" value="">

                        <button type="button"
                                onclick="$('#relationModal').modal('show');"
                                class="btn btn-success btn-next" >
                            <i class="fa fa-plus"></i></button>




                    </div>
                    <div class="col-md-4 text-center">
                        <button style="margin-top: 25px;" class="btn btn-success btn-labeled" type="button" name="add" onclick="insert_realtion(<?= $this->uri->segment(6)?>)" value="add">  <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ</button>

                    </div>

                    <div class="clearfix"></div><br>
                    <div id="relations">
                        <?php
                        if (isset($relations) && !empty($relations)){
                            $x=1;
                            ?>
                            <table class="table example table-bordered table-striped table-hover">
                                <thead>
                                <tr class="greentd">
                                    <th>م</th>

                                    <th> رقم المعاملة </th>
                                    <th>نوع المعاملة</th>
                                    <th>الاجراء</th>

                                </tr>
                                </thead>
                                <tbody >
                                <?php
                                foreach ($relations as $row){
                                    ?>
                                    <tr>
                                        <td><?= $x++?></td>
                                        <td>
                                            <?php if (!empty($row->mo3mla_rkm)){
                                                echo $row->mo3mla_rkm;
                                            }
                                            else{
                                                echo 'غير محدد';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($row->type==1){
                                                echo 'وارد';
                                            }
                                            else if ($row->type==2){
                                                echo ' صادر';
                                            } else{
                                                echo 'غير محدد';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <i class="fa fa-trash" style="cursor: pointer"
                                               onclick="delete_relation(<?= $row->id ?>,<?= $row->sader_id_fk ?>)"></i>
                                            <i class="fa fa-pencil" style="cursor: pointer"
                                               onclick="get_relation(<?= $row->id ?>,<?= $row->mo3mla_rkm ?>,<?= $row->type ?>)"></i>
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
                    </div>

				</div>
				<div class="tab-pane" id="pag4" role="tabpanel">
                    <div class="col-xs-12 no-padding">
                        <div class="form-group padding-4 col-md-3 col-xs-12">
                            <label class="label ">    اسم المهمه</label>

                            <input type="text" name="mohema_n" id="mohema_n"
                                   value=""
                                   class="form-control  "   >

                        </div>
                        <div class="form-group padding-4 col-md-3 col-xs-12">
                            <label class="label ">     اسناد الي</label>
                            <input type="text" class="form-control  testButton inputclass"
                                   name="to_user_n" id="to_user_n"
                                   readonly="readonly"
                                   onclick="$('#tahwelModal').modal('show'); "

                                   style="cursor:pointer;border: white;color: black;width: 80%;float: right;"

                                   value="">
                            <input type="hidden" name="to_user_id" id="to_user_id" value="">
                            <input type="hidden" name="tahwel_type" id="tahwel_type" value="">
                            <input type="hidden" name="tawel_id" id="tawel_id" value="">

                            <button type="button"
                                    onclick="$('#tahwelModal').modal('show');"
                                    class="btn btn-success btn-next" >
                                <i class="fa fa-plus"></i></button>




                        </div>
                        <div class="form-group padding-4 col-md-1 col-xs-12">
                            <label class="label ">     الأولوية</label>

                            <select  type="text" name="awlawia_fk" id="awlawia_fk"
                                     class="form-control  "   >
                                <option value="">اختر</option>
                                <?php
                                $priority = array('1'=>'عادي','2'=>'هام','3'=>'هام جدا');
                                foreach ($priority as $key=>$value){
                                    ?>
                                    <option value="<?= $key?>"

                                    ><?= $value?></option>
                                    <?php
                                }
                                ?>
                            </select>


                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                            <label class="label"> تاريخ الاستحقاق  </label>
                            <input type="date" name="esthkak_date" id="esthkak_date"
                                   value="<?= date('Y-m-d')?>"
                                   class="form-control  "   >

                        </div>
                        <div class="form-group padding-4 col-md-3 col-xs-12">
                            <label class="label ">     الموضوع</label>

                            <input type="text" name="subject" id="subject"
                                   value=""
                                   class="form-control  "   >

                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-success btn-labeled" type="button" name="add" onclick="insert_tahwel(<?= $this->uri->segment(6)?>)" value="add"><span class="btn-label"><i class="fa fa-reply"></i></span>اسناد المهمة</button>



                    </div>
                    <div class="clearfix"></div><br>
                    <div id="tahwelat">
                    <?php
                    if (isset($tahwelat) && !empty($tahwelat)){
                        $x=1;
                        ?>
                    <table class="table example table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">

                            <th> رقم المعاملة </th>
                            <th>الموضوع</th>
                            <th>نوع الاجراء</th>
                            <th>تاريخ التحويل</th>
                            <th>محول من</th>
                            <th>محول الي</th>
                            <th>الاجراء</th>

                        </tr>
                        </thead>
                        <tbody id="">
                        <?php
                        foreach ($tahwelat as $row){
                            ?>

                        <tr>
                            <td><?= $x++?></td>

                            <td>
                                <?php if (!empty($row->subject)){
                                echo $row->subject;
                                }
                                else{
                                    echo 'غير محدد';
                                }
                                ?>
                            </td>
                            <td>
                                <?php if (!empty($row->mohema_n)){
                                    echo $row->mohema_n;
                                }
                                else{
                                    echo 'غير محدد';
                                }
                                ?>
                            </td>
                            <td>
                                <?php if (!empty($row->date_ar)){
                                    echo $row->date_ar;
                                }
                                else{
                                    echo 'غير محدد';
                                }
                                ?>
                            </td>
                            <td>
                                <?php if (!empty($row->from_user_n)){
                                    echo $row->from_user_n;
                                }
                                else{
                                    echo 'غير محدد';
                                }
                                ?>
                            </td>
                            <td>
                                <?php if (!empty($row->to_user_n)){
                                    echo $row->to_user_n;
                                }
                                else{
                                    echo 'غير محدد';
                                }
                                ?>
                            </td>
                            <td>

                                <i class="fa fa-trash" style="cursor: pointer"
                                   onclick="delete_tahwel(<?= $row->id ?>,<?= $row->sader_id_fk ?>)"></i>
                                <i class="fa fa-pencil" style="cursor: pointer"
                                   onclick="get_tahwel(<?= $row->id ?>)"></i>
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
                    </div>

					
				</div>

				<div class="tab-pane" id="pag5" role="tabpanel">
                    <div class="comments-sec">

                        <div class="col-xs-12 no-padding">
                            <form action="#" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="has-validation-callback">

                                <div class="col-xs-12 form-group">
                                    <label class="label ">إضافة</label>
                                    <input type="hidden" id="comment_id" value="">
                                    <textarea class="form-control" rows="3" name="comment" id="comment" ></textarea>
                                </div>

                                <div class="col-md-6 form-group">

                                </div>
                                <div class="col-md-3 form-group">
                                    <button class="btn btn-success btn-labeled" type="button" name="add" onclick="insert_comments(<?= $this->uri->segment(6)?>)" value="add"><span class="btn-label"><i class="fa fa-reply"></i></span>إرسال</button>



                                </div>
                            </form>
                        </div>
                        <div class="  col-xs-12 no-padding" id="comment_result">


                        <?php

                        if (isset($comments) && !empty($comments)) {
                            ?>
                            <div class=" well col-xs-12 no-padding">

                                    <?php
                                    foreach ($comments as $comment){
                                        ?>
                                        <article class="reply-comment">
                                            <div class="reply-img">
                                                <img src="<?php echo base_url(); ?>asisst/admin_asset/img/avatar.png" class="img-circle">
                                            </div>
                                            <div class="reply-comment ">
                                                <h5 class="name"><span class="label label-inverse"><?= $comment->publisher_name?> </span> <?= $comment->date_ar ?>

                                                    <div class="btn-group" role="group" aria-label="..." style="float:left;">
                                                        <?php
                                                        if ($_SESSION['role_id_fk'] ==1){
                                                            ?>
                                                            <button type="button" class="btn btn-default" onclick="delete_comment(<?= $comment->id?>,<?= $comment->sader_id_fk?>)"> <i class="fa fa-trash"> </i></button>
                                                            <button type="button" class="btn btn-default"  onclick="get_comment(<?= $comment->id?>,'<?= $comment->comment?>')"><i class="fa fa-pencil"> </i></button>

                                                            <?php
                                                        } else{

                                                          if ($_SESSION['emp_code']== $comment->publisher){
                                                              ?>
                                                        <button type="button" class="btn btn-default" onclick="delete_comment(<?= $comment->id?>,<?= $comment->sader_id_fk?>)"> <i class="fa fa-trash"> </i></button>
                                                        <button type="button" class="btn btn-default"  onclick="get_comment(<?= $comment->id?>,'<?= $comment->comment?>')"><i class="fa fa-pencil"> </i></button>

                                                        <?php
                                                        }


                                                        }
                                                        ?>



                                                    </div>

                                                </h5>
                                                <p> <?= $comment->comment?>  </p>
                                            </div>
                                        </article>

                                        <?php
                                    }
                                    ?>

                                </div>


                            <?php
                        }
                        ?>
                        </div>


                    </div>

				</div>
                
                <div class="tab-pane" id="pag6" role="tabpanel">
					
				</div>
                
                <div class="tab-pane" id="pag7" role="tabpanel">
					
				</div>



			</div>
		</div>
        
        
        </div>
    </div>
</div>

<!-- myModal Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  </h4>
            </div>
            <div class="modal-body">

                <div id="output">

                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- myModal Modal -->

<!-- tahwelModal Modal -->


<div class="modal fade"  id="tahwelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="radio-content">
                    <input type="radio" id="esnad1" name="esnad_to"  class="sarf_types" value="1" onclick="load_tahwel()">
                    <label for="esnad1" class="radio-label"> شخص</label>
                </div>
                <div class="radio-content">
                    <input type="radio" id="esnad2" name="esnad_to"  class="sarf_types" value="2" onclick="load_tahwel()">
                    <label for="esnad2" class="radio-label"> قسم</label>
                </div>
                </div>

                <div class="col-xs-12" id="tawel_result" style="display: none;">



                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- tahwelModal Modal -->
<!-- tahwelModal Modal -->


<div class="modal fade"  id="relationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">   رقم المعاملة</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="radio-content">
                        <input type="radio" id="type1" name="realtion_type"  class="sarf_types" value="1" onclick="load_realtion()">
                        <label for="type1" class="radio-label"> وارد</label>
                    </div>
                    <div class="radio-content">
                        <input type="radio" id="type2" name="realtion_type"  class="sarf_types" value="2" onclick="load_realtion()">
                        <label for="type2" class="radio-label"> صادر</label>
                    </div>
                </div>

                <div class="col-xs-12" id="realtion_result" style="display: none;">



                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- tahwelModal Modal -->

<script>
    function changePage(text,id,title) {
        $('.title').text(text);
        $('#page').data('id', id);
        $('#page').data('title', title);

    }
</script>
<script>
    function GetName(id, name) {
        var title_fk = $('#page').data("id");
        var title_n = $('#page').data("title");
        $('#' + title_fk).val(name);
        $('#' + title_n).val(name);
        $('#myModal').modal('hide');

    }
</script>
<script>
    function load_page(type) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/load_modal' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {

                $("#output").html(html);
            }
        });
    }
</script>

<script>

    function  upload_img(row)
    {


        var files = $('#morfaq')[0].files;
        var title = $('#title').val();
        //var row = $('#row').val();
        var error = '';
        var form_data = new FormData();
        for(var count = 0; count<files.length; count++)
        {
            var name = files[count].name;


            var extension = name.split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','PNG','jpeg','pdf','PDF','xls','xlsx',',doc','docx','txt']) == -1)
            {
                error += "Invalid " + count + " Image File"
            }
            else
            {
                form_data.append("files[]", files[count]);
                form_data.append("title",title );
                form_data.append("row",row );
            }
        }
        //
        if (title !='' && files !='' ) {


        if(error == '') {




            $.ajax({
                url:"<?php echo base_url(); ?>all_secretary/archive/sader/Add_sader/upload_morfaq", //base_url() return http://localhost/tutorial/codeigniter/
                method:"POST",
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function()
                {

                },
                success:function(data)
                {
                    // alert(data);

                    //$('#images').show();
                    swal("تم الاضافه بنجاح !");
                    $('#title').val('');
                    $('#morfaq').val('');
                    $("input:radio").attr("checked", false);
                    $('#morfaq_result').html(data);


                }
            });


        }
        } else{
           // alert('من فضلك تأكد الحقول الناقصه ! ');
            swal({
                title: "من فضلك تأكد من الحقول الناقصه ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });
        }



    }


</script>
<script>
    function delete_morfaq(row_id,sader_id) {
       // var deelete = 'delete';

        if(confirm('هل أنت متأكد من الحذف ؟ ')){

            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/delete_morfaq',
                data: {row_id:row_id,sader_id:sader_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    swal({
                            title: " تم الحذف بنجاح",
                        }
                    );
                    $('#morfaq_result').html(html);


                }
            });
        }

    }
</script>
<script>
    function insert_comments(sader_id) {
        var comment = $('#comment').val();
        var row_id = $('#comment_id').val();
       // alert(sader_id);
        if (comment !=''){
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/insert_comments',
                data: {sader_id:sader_id,comment:comment,row_id:row_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    if (row_id !=''){
                        swal({
                                title: " تم التعديل بنجاح",
                            }
                        );

                    }  else{

                        swal({
                                title: " تم الاضافه بنجاح",
                            }
                        );
                    }

                    $('#comment').val('');
                    $('#comment_id').val('');
                    $('#comment_result').html(html);


                }
            });
        }  else{
            swal({
                title: "من فضلك تأكد من الحقول الناقصه ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });

        }


    }
</script>
<script>
    function delete_comment(row_id,sader_id) {

        if(confirm('هل أنت متأكد من الحذف ؟ ')){

            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/delete_comment',
                data: {row_id:row_id,sader_id:sader_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    swal({
                            title: " تم الحذف بنجاح",
                        }
                    );
                    $('#comment_result').html(html);


                }
            });
        }

    }
</script>
<script>
     function get_comment(id,value) {
        $('#comment').val(value);
        $('#comment_id').val(id);

    }
</script>

<script>
    function load_tahwel() {
        $('#tawel_result').show();
        var type = $('input[name=esnad_to]:checked').val();
      //  alert(type);
        $('#tahwel_type').val(type);

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/load_tahwel' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {

                $("#tawel_result").html(html);
            }
        });
    }
</script>

<script>
    function GettahwelName(id, name) {

        $('#to_user_id').val(id);
        $('#to_user_n').val(name);
        $('#tahwelModal').modal('hide');


    }
</script>
<script>
    function insert_tahwel(sader_id) {

        var mohema_n = $('#mohema_n').val();
        var to_user_n = $('#to_user_n').val();
        var to_user_id = $('#to_user_id').val();
        var tahwel_type = $('#tahwel_type').val();
        var awlawia_fk = $('#awlawia_fk').val();
        var esthkak_date = $('#esthkak_date').val();
        var subject = $('#subject').val();
        var row_id = $('#tawel_id').val();

        if (mohema_n !='' && to_user_n !='' && tahwel_type !='' && esthkak_date !='' && awlawia_fk!=''){
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/insert_tahwel',
                data: {row_id:row_id,sader_id:sader_id,mohema_n:mohema_n,to_user_n:to_user_n,to_user_id:to_user_id,tahwel_type:tahwel_type,awlawia_fk:awlawia_fk,esthkak_date:esthkak_date,subject:subject},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    if (row_id!=''){
                        swal({
                                title: " تم التعديل بنجاح",
                            }
                        );
                    } else{
                        swal({
                                title: " تم الاضافه بنجاح",
                            }
                        );

                    }

                    $('#mohema_n').val('');
                    $('#to_user_n').val('');
                    $('#to_user_id').val('');
                    $('#tahwel_type').val('');
                    $('#awlawia_fk').val('');
                    $('#esthkak_date').val('<?= date('Y-m-d')?>');
                    $('#subject').val('');
                    $('#tawel_id').val('');
                    $('#tahwelat').html(html);
                    $("input:radio").attr("checked", false);
                    $('#tawel_result').hide();


                }
            });
        }  else{
            swal({
                title: "من فضلك تأكد من الحقول الناقصه ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });

        }


    }
</script>
<script>
    function delete_tahwel(row_id,sader_id) {

        if(confirm('هل أنت متأكد من الحذف ؟ ')){

            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/delete_tahwel',
                data: {row_id:row_id,sader_id:sader_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    swal({
                            title: " تم الحذف بنجاح",
                        }
                    );
                    $('#tahwelat').html(html);



                }
            });
        }

    }
</script>


<script>
    function get_tahwel(row_id) {

        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/update_tahwel',
            data: {row_id:row_id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                var obj = JSON.parse(html);
                $('#tawel_id').val(obj.id);
              $('#mohema_n').val(obj.mohema_n);
              $('#from_user_id').val(obj.from_user_id);
              $('#from_user_n').val(obj.from_user_n);
              $('#tahwel_type').val(obj.tahwel_type);
              $('#to_user_id').val(obj.to_user_id);
              $('#to_user_n').val(obj.to_user_n);
              $('#awlawia_fk').val(obj.awlawia_fk);
              $('#awlawia_n').val(obj.awlawia_n);
              $('#esthkak_date').val(obj.esthkak_date);
              $('#subject').val(obj.subject);

            }
        });

    }
</script>
<script>
    function load_realtion() {
        $('#realtion_result').show();
        var type = $('input[name=realtion_type]:checked').val();
        //  alert(type);
        $('#type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/load_realtion' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {

                $("#realtion_result").html(html);
            }
        });
    }
</script>
<script>
    function GetrealtionName(rkm) {
        $('#mo3mla_rkm').val(rkm);
        $('#relationModal').modal('hide');
    }
</script>
<script>
    function insert_realtion(sader_id) {

        var mo3mla_rkm = $('#mo3mla_rkm').val();
        var type = $('#type').val();
        var row_id = $('#realtion_id').val();
      //  alert(mo3mla_rkm+'type'+type);

        if (mo3mla_rkm !='' && type !='' ){
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/insert_realtion',
                data: {row_id:row_id,sader_id:sader_id,mo3mla_rkm:mo3mla_rkm,type:type},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    if (row_id!=''){
                        swal({
                                title: " تم التعديل بنجاح",
                            }
                        );
                    } else{
                        swal({
                                title: " تم الاضافه بنجاح",
                            }
                        );

                    }

                    $('#mo3mla_rkm').val('');
                    $('#type').val('');
                    $('#realtion_id').val('');
                    $('#relations').html(html);
                    $("input:radio").attr("checked", false);
                    $('#realtion_result').hide();


                }
            });
        }  else{
            swal({
                title: "من فضلك تأكد من الحقول الناقصه ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });

        }


    }
</script>

<script>
    function delete_relation(row_id,sader_id) {

        if(confirm('هل أنت متأكد من الحذف ؟ ')){

            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/delete_relation',
                data: {row_id:row_id,sader_id:sader_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    swal({
                            title: " تم الحذف بنجاح",
                        }
                    );
                    $('#relations').html(html);



                }
            });
        }

    }
</script>
<script>
    function get_relation(id,rkm,type) {
        $('#mo3mla_rkm').val(rkm);
        $('#realtion_id').val(id);
        $('#type').val(type);

    }
</script>
<script>

</script>
