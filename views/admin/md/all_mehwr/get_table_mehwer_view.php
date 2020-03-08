<div class="row">
    <?php if (isset($result) && (!empty($result))) { ?>
        <table class="table table-striped table-bordered table-result">
            <tbody>
            <?php $x = 1;
            foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $row->mehwar_title; ?></td>
                </tr>
                <?php
                $x++;
            }
            ?>
            </tbody>
        </table>


    <?php } ?>
</div>