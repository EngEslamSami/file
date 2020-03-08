<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?= $title  ?></h4>

        </div>
        <div class="panel-body" style="min-height: 300px;">
            <div class="col-xs-12">
                <?php
                  if (isset($sponsors) && !empty($sponsors)){
                      $x =1;
                      ?>
                <table id="example" class="table  table-bordered table-striped table-hover">
                    <thead>
                    <tr class="greentd">
                        <th >م </th>
                        <th >كود الكافل </th>
                        <th  >اسم الكافل</th>
<!--                        <th > رقم الهوية</th>-->
                        <th>رقم الجوال</th>
                        <th >حاله الكافل</th>


                    </tr>
                    </thead>

                    <tbody>
                    <?php
                      foreach ($sponsors as $row){
                          ?>
                          <tr>
                              <td><?= $x++ ?></td>
                              <td>
                                  <?php
                                   if (!empty($row->k_num)){
                                       echo $row->k_num;
                                   } else{
                                       echo 'غير محدد' ;
                                   }
                                  ?>

                              </td>
                              <td>
                                  <?php
                                  if (!empty($row->k_name)){
                                      echo $row->k_name;
                                  } else{
                                      echo 'غير محدد' ;
                                  }
                                  ?>

                              </td>
                            <!--  <td>
                                  <?php

                                   if (!empty($row->k_national_num)){
                                       echo $row->k_national_num;
                                   } else{
                                       echo 'غير محدد' ;
                                   }
                                  ?>

                              </td> -->
                              <td>

                                  <?php
                                  if($row->fe2a_type == 1|| $row->fe2a_type == 3){
                                      $k_mob = $row->k_mob;
                                  }elseif($row->fe2a_type == 4|| $row->fe2a_type == 5 ||
                                      $row->fe2a_type == 6 ||  $row->fe2a_type == 7
                                  ){

                                      $k_mob= $row->w_mob;
                                  }else{
                                      $k_mob = 'غير محدد';
                                  }
                                  echo $k_mob ;

                               ?>

                              </td>

                              <td>
                                  <?php
                                  if (!empty($row->status_name)){
                                      $status_name = $row->status_name;
                                      ?>
                                      <button style="color: #fff;width: 70px;font-size: 15px;  background-color:<?= $row->status_color ?>  "  class="btn btn-sm ">
                                          <?= $status_name ?>
                                      </button>
                                  <?php
                                  }
                                  else{
                                     echo 'غير محدد' ;
                                  }
                                  ?>


                              </td>


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

</div>