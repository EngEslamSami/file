<?php if (isset($emp) && !empty($emp) && $emp != null) {
                        foreach ($emp as $row) { ?>


                            <option value="<?php echo $row->id; ?>"><?php echo $row->employee; ?></option>
                        <?php }
                    } ?>