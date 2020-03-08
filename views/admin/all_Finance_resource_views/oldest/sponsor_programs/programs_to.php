

<div class="col-sm-12  wow" >
    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <!-- open panel-body-->
            <?php if(isset($result)):
                $id = $result[0]->donor_id;
                $validation ='';
                $aria='';
            else:
                $id = 0;
                $validation ='required';
                $aria='true';
            endif; ?>
            <?php         echo form_open_multipart('all_Finance_resource/Sponsor_programs/programs_to/'.$id.'')?>
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">

                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> الكافل: </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="donor_id" id="donor_id" class="no-padding form-control"
                                    data-show-subtext="true" data-live-search="true"  data-validation="<?php   echo$validation;?>"  aria-required="<?php  echo$aria;?>">
                                <option value="">--قم بإختيار الكافل--</option>
                                <?php
                                if (!empty($donors)):
                                    foreach ($donors as $record):
                                        $selected = '';
                                        if(isset($result) && $record->id == $result[0]->donor_id)
                                            $selected = 'selected';
                                        ?>
                                        <option value="<? echo $record->id; ?>" <?php echo $selected ?>><? echo $record->name; ?></option>
                                        <?php
                                    endforeach;
                                endif; ?>
                            </select>
                        </div>
                    </div>

                </div>



                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">البرامج:  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <?php
                            if(isset($programs))
                                foreach($programs as $program){
                                    $checked = '';
                                    if(isset($result))
                                        for($x = 0 ; $x < count($result) ; $x++)
                                            if($program->id == $result[$x]->program_id_fk)
                                                $checked = 'checked';
                                    echo '<input type="checkbox" name="program_id_fk[]" value="'.$program->id.'" '.$checked.' />'.$program->program_name."<br />";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 r-inner-btn">
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn">
                        <input type="submit" role="button"  onclick="check_box();" name="add" value="حفظ" class="btn pull-right" />
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6 inner-details-btn"></div>
                </div>
            </div>
            <?php echo form_close()?>
            <?php if(isset($table) && $table != null):?>
                <div class="col-xs-12">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th width="2%">#</th>
                            <th class="text-center">إسم الكفيل</th>
                            <th class="text-center">إسم البرنامج</th>
                            <th class="text-center">قيمة البرنامج</th>
                            <th class="text-center">الإجمالي</th>
                            <th class="text-center">التحكم</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for($x = 0 ; $x < count($table) ; $x++){ 
                            $name = "";
                            if(isset($donors[key($table)]->name)) {
                                $name = $donors[key($table)]->name;
                            }
                            echo '<tr>
                                            <td rowspan="'.count($table[key($table)]).'">'.($x+1).'</td>
                                            <td rowspan="'.count($table[key($table)]).'">'.$name.'</td>';
                            $value = 0;
                            for($z = 0 ; $z < count($table[key($table)]) ; $z++){
                                $value += $programs[$table[key($table)][$z]->program_id_fk]->monthly_value;
                                echo '  <td>'.$programs[$table[key($table)][$z]->program_id_fk]->program_name.'</td>
                                                <td>'.$programs[$table[key($table)][$z]->program_id_fk]->monthly_value.'</td>';
                                if($z == (count($table[key($table)])-1))
                                    echo '<td>'.$value.'</td>
                                                  <td>
                                                    <a href="'.base_url().'all_Finance_resource/Sponsor_programs//programs_to/'.key($table).'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
        
                                                    <a  href="'.base_url().'all_Finance_resource/Sponsor_programs//delete_programs_to/'.key($table).'" onclick="return confirm(\'هل انت متأكد من عملية الحذف ؟\');"><i class="fa fa-trash" aria-hidden="true"></i> </a>
                                                    </td>
                                                  </tr>';
                                else
                                    echo '<tr>';
                            }
                            next($table);
                        }
                        ?>
                        </tbody>
                    </table>

                </div>
            <?php endif;?>



            <!-- close panel-body-->
        </div>
    </div>
</div>

<script>
    function check_box(){
        var atLeastOneIsChecked = false;
        $('input:checkbox').each(function () {
            if ($(this).is(':checked')) {
                atLeastOneIsChecked = true;
            }
        });
        if(atLeastOneIsChecked != true){
            alert("إختر على الأقل برنامج واحد");
            return false;
        }
    };
</script




