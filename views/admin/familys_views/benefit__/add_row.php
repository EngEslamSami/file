<tr>

  <td>
          <?php
          $category  = array(
              '1'=>'يتيم',
              '2'=>'مستفيد',
              '3'=>'أرملة',
          );
          ?>

              <select id="benef<?php echo $len;?>" name="tasnef[]" onchange="check_type($(this).val());"   class="form-control half benfit" data-validation="required" >
                  <option value="">إختر</option>
                  <?php
                      foreach ($category as $key=>$row){
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
            <option value="">إختر</option>
            <?php
                foreach ($gender as $key=>$row){
                    ?>
                    <option  value="<?=$key ?>"><?=$row ?></option>
                <?php  } ?>
        </select>
    </td>

    <td>
      <input type="text"  data-validation="required" value="" class="form-control valu" name="from_age[]">
    </td>


    <td>

        <input type="text"   data-validation="required" value="" class="form-control valu" name="to_age[]">

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


