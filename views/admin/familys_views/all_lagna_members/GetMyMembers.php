<?php


if(!empty($members)){ foreach ($members as $row ){ ?>


  <li data-value='<?=$row->id?>'><?=$row->member_num?></li>



<?php } } ?>

