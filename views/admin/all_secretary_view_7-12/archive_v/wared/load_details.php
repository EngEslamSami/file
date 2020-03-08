<div class="col-xs-12 padding-4">

    <input type="hidden" id="sader_id" value="<?= $get_all->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  رقم  الوارد </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $get_all->rkm ?></td>
            <td style="width: 135px;"><strong> تاريخ التسجيل </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->tsgeel_date)) {
                    echo  $get_all->tsgeel_date;
                } else{
                    echo 'غير محدد' ;
                }
                ?>

        </tr>
        <tr>
            <td style="width: 105px;">
                <strong>    جهة الاختصاص </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->geha_ekhtsas_name)) {
                    echo  $get_all->geha_ekhtsas_name;
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
            <td><?php if (!empty($get_all->title)) {
                    echo  $get_all->title;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

            <td style="width: 135px;"><strong>  الموضوع </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->subject)) {
                    echo  $get_all->subject;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td style="width: 150px;"><strong>   طريقة الاستلام</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->tarekt_estlam_name)) {
                    echo  $get_all->tarekt_estlam_name;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>

        </tr>
        <tr>
            <td style="width: 105px;">
                <strong>     سري للغاية</strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if ($get_all->is_secret==1) {
                    echo  'نعم';
                } else if ($get_all->is_secret==2){
                    echo 'لا' ;
                }
                ?></td>

            <td style="width: 135px;"><strong>  جهه الارسال</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->geha_morsla_name)) {
                    echo  $get_all->geha_morsla_name;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <td style="width: 150px;"><strong>اسم المرسل</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->morsel_name)) {
                    echo  $get_all->morsel_name;
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
            <td><?php 
                       if($get_all->awlawya==1){echo 'هام';}elseif($get_all->awlawya==2){echo ' عادي  ';}elseif($get_all->awlawya==0){echo 'هام جدا  ';}  ?></td>

            <td style="width: 135px;"><strong>    تاريخ الاستحقاق </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (!empty($get_all->esthkak_date)) {
                    echo  $get_all->esthkak_date;
                } else{
                    echo 'غير محدد' ;
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



