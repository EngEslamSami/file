<tr>

  <td>
          <?php
          //$all_catg;
          //$rent;
          ?>

              <select id="benef<?php // echo $len;?>" name="rent"   class="form-control half benfit" data-validation="required" >
                  <option value="">إختر</option>
                  <?php
                      foreach ($all_catg as $row){
                          if (!in_array($row->id,$rent)){
                          ?>
                          <option  value="<?=$row->id ?>"><?=$row->title ?></option>
                      <?php } } ?>
              </select>

    </td>
    <td> <input type="text" name="main"  > </td>
    <td> <input type="text" name="increase"  > </td>










   <td>
       <a href="#" id="delPOIbutton" onclick="deleteRow(this);">
           <i class="fa fa-trash" aria-hidden="true"></i>
       </a>








  </tr>


