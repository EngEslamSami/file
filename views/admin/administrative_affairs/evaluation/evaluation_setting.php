<div class="col-sm-12 col-md-12 col-xs-12">
    <br>
    <div class="top-line"></div>
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?=$title?></h4>
                </div>
            </div>
            
            <div class="panel-body">
                <div class="col-xs-12 r-inner-details">
                    <?php
                    if(isset($result) && $result!=null && !empty($result)){
                        $out['title']=$result['title'];
                        $out['grade']=$result['grade'];
                        $out['input']='
                        <div class="form-group col-sm-12 col-xs-12">
                        <button type="submit" name="UPDATE" value="تعديل" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                        </div>
                        ';
                        $out['form']='Administrative_affairs/UpdateEvaluationSetting/'.$result['id'];
                    }else{
                        $out['title']='';
                        $out['grade']='';
                        $out['input']='<div class="form-group col-sm-12 col-xs-12">
                        <button type="submit" name="ADD" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
                        </div>';
                        $out['form']='Administrative_affairs/EvaluationSetting';
                    }
                    ?>
                    <?php  echo form_open_multipart($out['form']);?>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                        <div class="col-xs-6">
                            <h4 class="r-h4">عنصر التقييم </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4" name="title" value="<?php echo $out['title'];?>" data-validation="required" />
                        </div>
                        
                    </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                        <div class="col-xs-6">
                            <h4 class="r-h4">درجة النهاية العظمى  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="number" class="r-inner-h4" name="grade" value="<?php echo $out['grade'];?>" data-validation="required" />
                        </div>

                    </div>
                    <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                        <?=$out['input']?>
                    </div>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php if(isset($records)&& $records!=null && !empty($records) ):?>
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="col-md-12 fadeInUp wow">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>بيانات الإدارة</h4>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="col-xs-12 r-inner-details">
                        <div class="panel-body">
                            <div class="fade in active">
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">م</th>
                                            <th class="text-center">عنصر التقييم</th>
                                            <th class="text-center">درجة النهاية العظمى</th>
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $a=1;
                                        foreach ($records as $record ):?>
                                        <tr>
                                            <td><?php echo $a ?></td>
                                            <td><? echo $record->title;?></td>
                                            <td><? echo $record->grade;?></td>
                                            <td><a href="<?php echo base_url().'Administrative_affairs/UpdateEvaluationSetting/'.$record->id ?>">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                            </tr>
                                            <?php
                                            $a++;
                                            endforeach;  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php  endif; ?>
