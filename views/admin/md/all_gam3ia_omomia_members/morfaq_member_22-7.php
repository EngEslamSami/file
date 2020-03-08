<?php
if (isset($result) && !empty($result)) {

    $morfaqs = array($result->morfaq1, $result->morfaq2, $result->morfaq3, $result->morfaq4);
} ?>
    <input type="hidden" name="id" value="<?= $result->id ?>"/>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr class="info">
            <th> مرفق</th>
            <th><a onclick="apen('morfaq_option','morfaq','file',4);">
                    <i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
            </th>

        </tr>
        </thead>

        <tbody id="morfaq_option">
        <?php
        if (isset($morfaqs) && !empty($morfaqs)) {
            foreach ($morfaqs as $key => $item1) {
                if (!empty($item1)) { ?>
                    <tr>
                        <!--<td><input class="form-control" type="file" name="morfaq[]"
                                   onchange="console.log('file'+this.value);get_value(this);">
                            <input type="hidden" id="morfaq_name<?= ++$key ?>" name="morfaq_name[]"
                                   value="<?= $item1 ?>">
                        </td>-->
                        <td colspan="2"><a href="#" onclick="remove(this)"><i class="fa fa-trash"
                                                                              aria-hidden="true"></i></a>
                            <br>

                            <a target="_blank"
                               href="https://docs.google.com/gview?url=<?= base_url() . 'uploads/md/gam3ia_omomia_members/' . $item1 ?>&embedded=true"><i
                                        class="fa fa-eye"></i></a>
                        </td>

                    </tr>
                <?php }
            }
        }
        ?>
        </tbody>
    </table>

<?php


?>