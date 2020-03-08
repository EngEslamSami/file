



<div class="col-xs-12">

    <input type="hidden" id="qrar_id" value="<?=$get_all->id ?>">
    <table class="table">
        <tbody>
        <tr>
            <td style="width: 105px;">
               <strong>  إسم الموظف </strong>
            </td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->emp_name)){ echo $get_all->emp_name ;} ?></td>
            <td style="width: 135px;"><strong>  الإدارة</strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->edara_n)){ echo $get_all->edara_n ;} ?></td>
            <td style="width: 150px;"><strong>القسم </strong></td>
            <td style="width: 10px;"><strong>:</strong></td>
            <td><?php if (isset($get_all->qsm_n)){ echo $get_all->qsm_n ;}?></td>
        </tr>
        <tr>
            <td> <strong> المسمى الوظيفي </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->job_title_n)){ echo $get_all->job_title_n ;}?></td>
            <td>  <strong>الرئيس المباشر </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->direct_manager_n)){ echo $get_all->direct_manager_n ;}?></td>
            <td><strong>الراتب الإساسي </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->salary)){ echo $get_all->salary ;} ?></td>

        </tr>
        <tr>
            <td><strong>  بدل السكن </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->bdal_skan)){ echo $get_all->bdal_skan ;} ?></td>
            <td><strong>بدل المواصلات     </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->bdal_mowaslat)){ echo $get_all->bdal_mowaslat ;}?></td>
            <td><strong>  بدلات أخرى</strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->bdal_other)){ echo $get_all->bdal_other ;} ?></td>
        </tr>
        <tr>
            <td><strong> إجمالي الراتب </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->total_salary)){ echo $get_all->total_salary ;}?></td>
            <td><strong>   تاريخ مباشرة العمل</strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->work_date_m)){ echo date('Y/m/d', strtotime($get_all->work_date_m)) ;}?></td>
            <td><strong> مدة الفترة التجريبية من </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->date_from_m)){ echo date('Y/m/d',strtotime($get_all->date_from_m));}?></td>
            <td><strong>  الي </strong></td>
            <td><strong>:</strong></td>
            <td><?php if (isset($get_all->date_to_m)){ echo date('Y/m/d', strtotime($get_all->date_to_m)) ;}?></td>

        </tr>
        </tbody>
    </table>


</div>


