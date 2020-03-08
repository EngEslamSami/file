

<div class="col-xs-12 " >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
        </div>
        <?php
        /*
        echo '<pre>';
        print_r($records);
        echo '<pre>';
*/


        ?>


        <div class="panel-body">
            <?php if(!empty($records)){ ?>


                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" 
                cellspacing="0" width="100%">

                    <thead>
                    <tr>
                        <th class="text-center">م</th>
                        <th class="text-center">رقم الملف </th>
                        <th class="text-center">اسم العائلة </th>
                        <th class="text-center">إسم الام</th>
                        <th class="text-center">رقم هوية الام  </th>
                        <th class="text-center"> جوال التواصل</th>
                        <th class="text-center">الفئة </th>
                        <th class="text-center">عدد الافراد </th>
                        <th class="text-center">أرملة </th>
                        <th class="text-center">يتيم </th>
                        <th class="text-center">مستفيد </th>
                        <th class="text-center">حالة الملف </th>

                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php
                    $x=1;
                    $total_armal=0;
                    $total_yatem=0;
                    $total_mostafed=0;
                    $total_all=0;
                    $total_value=0;
                    foreach ($records as $record ){
                        if($record->file_status == 1 ){
                            $file_status = 'نشط كليا';
                            $file_colors = '#00ff00';
                        }elseif($record->file_status == 2 ){
                            $file_status = 'نشط جزئيا';
                            $file_colors = '#00d9d9';
                        }elseif($record->file_status == 3 ){
                            $file_status = 'موقوف مؤقتا';
                            $file_colors = '#ffff00';
                        }elseif($record->file_status == 4 ){
                            $file_status = 'موقوف نهائيا';
                            $file_colors = '#ff0000';
                        }elseif($record->file_status == 0){
                            $file_status = 'جـــــــــاري';
                            $file_colors = '#62d0f1';
                        }


                        if(!empty($record->nasebElfard)){
                            $color ='';
                            if(!empty($record->nasebElfard['f2a']->color)){
                                $color =$record->nasebElfard['f2a']->color;
                            }

                            $title ='';
                            if(!empty($record->nasebElfard['f2a']->title)){
                                $title =$record->nasebElfard['f2a']->title;
                            }


                            $Fe2z_name =
                                '<span title="نصيب الفرد = '.round($record->nasebElfard['naseb']).'ريال" class="label label-pill
                         "  style="color:black ;border-radius: 4px;vertical-align: middle;padding-top: 5px;
                           font-size: 14px; background-color:'.$color.'" >
                      '.$title.'</span>';
                            $naseb_elfard =  '<span class="label label-pill label-info " style="color: black"  >'.round($record->nasebElfard['naseb']).'</span>';
                        }else{
                            $Fe2z_name = '<span title=" ريال 0 " class="label label-pill " style="color:black ; 
                    border-radius: 4px;vertical-align: middle;padding-top: 5px; font-size: 14px;
                    background-color:#62bd0f">أ</span>';
                        }


                        $total_all = ($record->ff_yatem + $record->ff_armal + $record->up_child) ;

                        $total_yatem += $record->ff_yatem;
                        $total_mostafed += $record->up_child;

                        $total_armal +=$record->ff_armal;
                        ?>
                        <tr>
                            <td><?php echo $x++ ?></td>
                            <td><?php echo $record->file_num; ?></td>
                            <td><?php if(!empty($record->father_name)){
                                    echo $record->father_name;}else{echo "غير مضاف";} ?>
                            </td>
                            <td>
                                <?php if(!empty($record->mother_name)){
                                    echo $record->mother_name;}else{echo "غير مضاف";} ?>
                            </td>
                            <td>
                                <?php if(!empty($record->mother_national_num)){
                                    echo $record->mother_national_num;}else{echo "غير مضاف";} ?>
                            </td>
                            <td><?php echo (!empty($record->bank_details))? $record->bank_details->person_mob : "لا يوجد رقم تواصل"; ?></td>
                            <td><?=$title?></td>
                            <td><?php  echo $total_all; ?></td>
                            <td><?php echo $record->ff_armal; ?></td>
                            <td><?php echo $record->ff_yatem; ?></td>
                            <td><?php echo $record->up_child;?></td>
                            <td>
                               <!-- <button style="color:black ; background-color:<?=$file_colors?> "
                                        data-toggle="modal" data-target="#modal-info" class="btn btn-sm btn-">
                                    <i class="fa fa-list btn-"></i> <?=$file_status?></button>-->
                                 <?php echo $file_status;?>   
                            </td>
                        </tr>
                    <?php } ?>
                    <?php

                     'total_armal = '. $total_armal .'<br/>' ;
                     'total_yatem = '. $total_yatem .'<br/>';
                     'total_mostafed = '. $total_mostafed .'<br/>';

                    ?>

                    </tbody>
                </table>
            <?php }  ?>

        </div>

    </div>
</div>
</div>

