<?php
if(isset($emala)&& !empty($emala)){
    $count=2;
foreach ($emala as $row) {
    ?>
    <tr>
        <td>
            <?= $row->job_title_n?>

        </td>
        <td>  <?= $row->salary?></td>

        <td>
            <!--  <button type="button" onclick="update_emala(<?= $row->id ?>,<?= $count ?>)"
                                                    id="add_emala" class="btn btn-labeled btn-warning ">
                                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                            </button> -->
            <?php
            //   $arr = array('job_title_n','salary');
            ?>
            <i class="fa fa-pencil" style="cursor: pointer"
               onclick="get_emala(<?= $row->id ?>,<?= $row->job_title_fk ?>,'<?= $row->job_title_n ?>',<?= $row->salary ?>)"></i>

            <i class="fa fa-trash" style="cursor: pointer"
               onclick="delete_members(<?= $row->id ?>,'emala_result','add_emala')"></i>


        </td>

    </tr>
    <?php
    $count++; }}
?>