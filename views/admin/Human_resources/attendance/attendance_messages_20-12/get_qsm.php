

<?php if (isset($qsm) && !empty($qsm) && $qsm != null) {
                        foreach ($qsm as $row) { ?>


                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                        <?php }
                    } ?>



