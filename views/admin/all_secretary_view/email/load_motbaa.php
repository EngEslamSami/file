




<?php if(isset($all) &&!empty($all)){

$title ='';

$name ='';

if ($type==1){

    $title = 'الاسم';

    $name = 'employee';
    $type=1;
    

} else if ($type==2){

    $title = 'القسم';

    $name = 'name';
    $type=2;

}

else if ($type==3){

    $title = 'الاداره';

    $name = 'name';
    $type=3;
}





?>







<table id="motbaa" class="motbaa display table  table-bordered table-striped" role="table">

    <thead>

    <tr class="greentd">

    <th >

                                        <input type="checkbox" onclick="check_all(this,'motbaa')"  style="width: 90px;height: 20px;"/>



                                        </th>

        <th class="text-center"><?= $title?></th>



    </tr>

    </thead>

    <tbody>

    <?php

    $x = 1;

    foreach ($all as $row) {

        $row_n = $row->$name;

        ?>

        <tr>

        <!-- <input type="checkbox" id="myCheck"  onclick="myFunction()"> -->

            <td><input style="width: 90px;height: 20px;" type="checkbox" name="<?= $row->id ?>" id="myCheck<?= $row->id ?>2"  data-id="<?= $row->id ?>"

            class="checkbox  radio"  value="<?= $row_n?>"    data-type="2"     onchange="GettahwelName(<?= $row->id ?>,'<?= $row_n?>',2)"></td>



            <td><?= $row_n ?></td>



        </tr>

        <?php

    }

    ?>

    </tbody>

</table>





<?php } else{

?>

<div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>



<?php

}

?>



<script type="text/javascript" src="<?php echo base_url();?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url();?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>asisst/admin_asset/js/tables/dataTables.buttons.min.js"></script>
<!-- <script src="<?php echo base_url();?>asisst/admin_asset/js/tables/buttons.flash.min.js"></script>

<script src="<?php echo base_url();?>asisst/admin_asset/js/tables/jszip.min.js"></script>
<script src="<?php echo base_url();?>asisst/admin_asset/js/tables/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>asisst/admin_asset/js/tables/vfs_fonts.js"></script> -->
<script src="<?php echo base_url();?>asisst/admin_asset/js/tables/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>asisst/admin_asset/js/tables/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>asisst/admin_asset/js/tables/buttons.colVis.min.js"></script> 
<!-- <script src="<?php echo base_url();?>asisst/admin_asset/js/tables/dataTables.colReorder.min.js"></script> -->

<script>



$('#motbaa').DataTable( {

    dom: 'Bfrtip',

    buttons: [

        'pageLength',

        'copy',

        'csv',

        'excelHtml5',

        {

            extend: "pdfHtml5",

            orientation: 'landscape'

        },



        {

            extend: 'print',

            exportOptions: { columns: ':visible'},

            orientation: 'landscape'

        },

        'colvis'

    ],

    colReorder: true

} );



</script>







<script>

function check_all(elem,table_id) {

    var oTable = $('.'+table_id).dataTable();

var rowcollection = oTable.$(".checkbox", {"page": "all"});

rowcollection.each(function (index, obj) {

obj.checked = elem.checked;



console.log(obj);

var id= obj.name;
var type=2;
var name= obj.value;

if(obj.checked)

{

Gettahwel(id,name);

}

else{

$("#"+id).remove();

$("#type"+id).remove();

$("#to_user_fk"+id).remove();

$("#to_user_fk_name"+id).remove();

}



}







);

}

</script>



<script>

function Gettahwel(id,name,type) {

   

 



// $('#text111').hide();


$('#text111').hide();


$("ol").append("<li name=f id='"+id+"'>"+name+"</li>");
$('#to_user_n').append("<input type='hidden'  id='to_user_fk"+id+"' name='to_user_fk[]' value='"+id+"'/>"+
"<input type='hidden'  data-validation='required' id='to_user_fk_name"+id+"'  name='to_user_fk_name[]' value='"+name+"'/><input type='hidden'  data-validation='required' id='type"+id+"' name='type[]' value='"+type+"'/>");



}

</script>
