<div class="col-xs-12 padding-4">

    <input type="hidden" id="sader_id" value="<?= $get_all->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  رقم  الصادر </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td>  <?=$get_all->year.'/'. $get_all->emp_depart_code .'/'.$get_all->sader_rkm?></td>
            <td style="width: 135px;"><strong> تاريخ التسجيل </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->tasgel_date)) {
                    echo  $get_all->tasgel_date;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td style="width: 150px;"><strong> تاريخ الارسال</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
     <td><?php if (!empty($tareket_estlam)) {
                foreach($tareket_estlam as $tareqa){
                    echo  $tareqa->estlam_fk_name;
                    echo ' , ';
                }} else{
                    echo 'غير محدد' ;
                }
                ?></td>

        </tr>
        <tr>
            <td style="width: 105px;">
                <strong>    جهة الاختصاص </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->geha_ekhtsas_n)) {
                    echo  $get_all->geha_ekhtsas_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

            <td style="width: 135px;"><strong>  المجلد </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->folder_path)) {
                    echo  $get_all->folder_path;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td style="width: 150px;"><strong>  نوع الخطاب</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->no3_khtab_n)) {
                    echo  $get_all->no3_khtab_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

        </tr>

        <tr>
            <td style="width: 105px;">
                <strong>     اسم الموضوع </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->mawdo3_name)) {
                    echo  $get_all->mawdo3_name;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

            <td style="width: 135px;"><strong>  الموضوع </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->mawdo3_subject)) {
                    echo  $get_all->mawdo3_subject;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td style="width: 150px;"><strong>   طريقة الارسال</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->tarekt_ersal_n)) {
                    echo  $get_all->tarekt_ersal_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

        </tr>
        <tr>
            <td style="width: 105px;">
                <strong> درجه السريه</strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php
                           // $arr = (1 => 'نعم', 0 => 'لا');
                           if (!empty($get_all->is_secret)) {
                            foreach ($arr as $key) {
                                $select = '';
                                if ($get_all->is_secret != '') {
                                    if ($key->id == $get_all->is_secret) {
                                         echo $key->title; 
                                    }
                                } }
                            } else{
                                echo 'غير محدد' ;
                            } ?></td>

            <td style="width: 135px;"><strong>  الجهة المرسل اليها </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->geha_morsel_n)) {
                    echo  $get_all->geha_morsel_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td style="width: 150px;"><strong>اسم المستلم</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->mostlem_name)) {
                    echo  $get_all->mostlem_name;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

        </tr>
        <tr>
            <td style="width: 105px;">
                <strong>      الأولوية</strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->awlawia_n)) {
                    echo  $get_all->awlawia_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

            <td style="width: 135px;"><strong>    تاريخ الاستحقاق </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->esthkak_date)) {
                    echo  $get_all->esthkak_date;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td style="width: 150px;"><strong> يحتاج متابعة</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if ($get_all->need_follow==1) {
                    echo  'نعم';
                } else if ($get_all->need_follow==2){
                    echo 'لا' ;
                }
                ?></td>

        </tr>
        <tr>
            <td style="width: 135px;"><strong>     ملاحظات </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->notes)) {
                    echo  $get_all->notes;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
        </tr>



        </tbody>
    </table>


</div>



