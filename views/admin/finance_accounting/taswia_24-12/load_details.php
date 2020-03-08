<div class="col-xs-12 padding-4">

    <input type="hidden" id="row_id" value="<?= $get_all->id ?>">
    <table class="table " style="table-layout: fixed">
        <tbody>
        <tr>
            <td style="width: 105px;">
                <strong>  رقم الموازنه </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?= $get_all->rkm ?></td>
            <td style="width: 135px;"><strong>اسم البنك</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td>
                <?php
                if (!empty($get_all->bank_name)){
                    echo $get_all->bank_name;
                } else{
                    echo "غير محدد" ;
                }

                ?>
            </td>
            <td style="width: 150px;"><strong>اسم الحساب </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td>
                <?php
                if (!empty($get_all->hesab_name)){
                    echo $get_all->hesab_name;
                } else{
                    echo "غير محدد" ;
                }

                ?>
            </td>
        </tr>
        <tr>
            <td><strong>  الفتره </strong></td>
            <td><strong>:</strong></td>
            <td>
                <?php
                if (!empty($get_all->taswia_date_ar)){
                    echo $get_all->taswia_date_ar;
                } else{
                    echo "غير محدد" ;
                }

                ?>
            </td>
            <td><strong> رصيد الحساب </strong></td>
            <td><strong>:</strong></td>
            <td>
                <?php
                if (!empty($get_all->prog_total_rased)){
                    echo $get_all->prog_total_rased;
                } else{
                    echo "غير محدد" ;
                }

                ?>
            </td>

        </tr>


        </tbody>
    </table>

    <table id="" class="table double-border  table-bordered table-striped table-hover">
        <thead>
        <tr class="">

            <th style="text-align: center !important;"> البيـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــان


            </th>
            <th colspan="6" style="text-align: center !important;"> هـ   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      ريال

            </th>

        </tr>
        </thead>
        <tbody>
        <tr >
            <td>
                رصيد الجمعية حسب كشف  <?php
                if ( !empty($get_all->bank_name)){
                    echo 'ب'. $get_all->bank_name;
                }
                if ( !empty($get_all->hesab_name)){
                    echo '-'.' '.$get_all->hesab_name ;
                }
                ?>

            </td>
            <td >

                    <?php
                    if (!empty($get_all->rased_gam3ia)){
                        echo $get_all->rased_gam3ia;
                    } else{
                        echo "غير محدد" ;
                    }

                    ?>

            </td>


        </tr>
        <tr>
            <td>يضاف شيكات مقاصة لحساب الجمعية ولم تظهر بكشف البنك حتى تاريخه
            </td>
            <td>
                <?php
                if (!empty($get_all->sheek_makasa)){
                    echo $get_all->sheek_makasa;
                } else{
                    echo "غير محدد" ;
                }

                ?>
            </td>
        </tr>
        <tr>
            <td>يضاف فرق موازنة نقاط بيع لم تظهر بكشف حساب البنك
            </td>
            <td>

                <?php
                if (!empty($get_all->farq_mowazna)){
                    echo $get_all->farq_mowazna;
                } else{
                    echo "غير محدد" ;
                }

                ?>
            </td>
        </tr>
        <tr>
            <td>يخصم شيكات سحبها الغير لصالح الجمعية واضافها البنك ولم تقيد
            </td>
            <td>

                <?php
                if (!empty($get_all->sheek_sahb)){
                    echo $get_all->sheek_sahb;
                } else{
                    echo "غير محدد" ;
                }

                ?>
            </td>
        </tr>
        <tr>
            <td>يخصم شيكات سلمت ولم تصرف وسجلت بالجمعية
            </td>
            <td>

                <?php
                if (!empty($get_all->sheek_solmat)){
                    echo $get_all->sheek_solmat;
                } else{
                    echo "غير محدد" ;
                }

                ?>

            </td>

        </tr>
        <tr>
            <td>الرصيد وهو مطابق لرصيد حساب البنك بدفاتر الجمعية
            </td>
            <td>
  <?php
                if (!empty($get_all->prog_total_rased)){
                    echo $get_all->prog_total_rased;
                } else{
                    echo "غير محدد" ;
                }

                ?>
            </td>
        </tr>


        </tbody>
    </table>



</div>



