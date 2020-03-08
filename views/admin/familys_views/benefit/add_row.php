<tr>

  <td>
          <?php
          $male = 0;
          $female = 0;
          $category  = array(
              '1'=>'أرملة',
              '2'=>'يتيم',
              '3'=>'مستفيد',

          );

          ?>

              <select id="benef<?php echo $len;?>" name="tasnef[]" onchange="check_type($(this).val());"   class="form-control half benfit" data-validation="required" >
                  <option value="">إختر</option>
                  <?php
                      foreach ($category as $key=>$row){

                          if($key == 3){
                        if(isset($armal) && !empty($armal)){
                                      continue;
                              
                            }
                          }else if($key == 1){
                              if(isset($yatem) && !empty($yatem)){
                                  if(count($yatem) == 2){
                                      continue;
                                  }
                                  foreach ($yatem as $r1){

                                          if($r1->gender_fk == 1){
                                              $male = 1;
                                          }
                                          if($r1->gender_fk ==  2){
                                              $female = 2;
                                          }
                                      }


                              }
                          } else {
                              if(isset($mostfed) && !empty($mostfed)){
                                  foreach ($mostfed as $r1){
                                      if(isset($r1->count) && $r1->count ==2){
                                          continue;
                                      } else {
                                          if($r1->gender_fk == 1){
                                              $male = 1;
                                          }
                                          if($r1->gender_fk ==  2){
                                              $female = 2;
                                          }
                                      }
                                  }

                              }
                          }
                          ?>
                          <option  value="<?=$key ?>"><?=$row ?></option>
                      <?php }  ?>
              </select>

    </td>
    <td>
        <?php
        $gender  = array(
            '1'=>'ذكر',
            '2'=>'انثي',

        );

        ?>


        <select id="gender<?php echo $len;?>" name="gender_fk[]"   class="form-control half benfit" data-validation="required" >
            <option value="">إختر تصنيف اولا</option>

        </select>
    </td>

    <td>
      <input type="text"  data-validation="required" onkeypress="validate_number(event)" value="" class="form-control valu" name="from_age[]">
    </td>


    <td>

        <input type="text"   data-validation="required" onkeypress="validate_number(event)" value="" class="form-control valu" name="to_age[]">

    </td>

<?php if(isset($categories)&& !empty($categories)){
    $i = 0;
                      foreach ($categories as $row){

                          ?>

    <td>

        <input type="checkbox"  value="<?=$row->id?>" class="center-block valu" style="width: 18px;height: 18px" name="cat_details<?=$len?>[]">

    </td>
    <?php $i++;  }   } ?>



   <td>
       <a href="#" id="delPOIbutton" onclick="deleteRow(this);">
           <i class="fa fa-trash" aria-hidden="true"></i>
       </a>








  </tr>


