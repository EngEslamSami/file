<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>

        </div>
        <div class="panel-body" >
            <?php
              if (isset($all_families) && !empty($all_families)){
                  $x=1;
                  ?>
                  <table id="example" class="table  table-bordered table-striped table-responsive table-hover">
                      <thead>
                      <tr class="greentd">
                          <th class="text-center"> م</th>
                          <th class="text-center">رقم الملف</th>
                          <th class="text-center"> اسم رب الأسرة</th>
                          <th class="text-center"> رقم الهويه</th>
                          <th class="text-center"> اسم الام </th>
                          <th class="text-center"> رقم الهويه</th>
                          <th class="text-center"> الفئة</th>
                           <th class="text-center"> نصيب الفرد</th>

                      </tr>
                      </thead>
                      <tbody>
                      <?php
                        foreach ($all_families as $row){
                            ?>
                            <tr>
                                <td><?= $x++?></td>
                                <td><?= $row->file_num?></td>
                                <td><?= $row->father_name?></td>
                                <td><?= $row->father_national_num?></td>
                                <td><?php
                                    if( !empty($row->mother)){

                                        $mother_name = $row->mother->full_name;
                                    }else{

                                        $mother_name = $row->full_name_order;

                                    }
                                    echo $mother_name;
                                    ?></td>
                                <td><?= $row->mother_national_num?>
                                </td>
                                
                                <td><?php echo $row->mem_naseb; ?></td>
                                <td><span class="label label-pill" style="background-color: <?= $row->fe2a_color?>"><?= $row->fe2a_name?></span></td>


                            </tr>
                      <?php
                        }
                      ?>

                      </tbody>
                  </table>
            <?php

              }
            ?>

        </div>
    </div>

</div>