<?php
echo 'مقدم الطلب'.'->';
if(isset($records)&& !empty($records)){

    foreach ($records as $row) {
       echo $row->talab_in_title.'->';
    }
}else{?>
    <div class="alert alert-danger">الطلب مازال عند الموظف</div>
<?php } ?>