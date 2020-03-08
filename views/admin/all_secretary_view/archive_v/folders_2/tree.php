<div style="overflow: auto;height: 350px">
    <ul id="tree1">
        <?php if(isset($folders)&&!empty($folders)){

            foreach ($folders as $row){?>

                <li><?php echo $row->en_title;?><div class="pull-right">

                    </div>

                    <?php get_li($row->sub);  ?>

                </li>


            <?php } } ?>


    </ul>
</div>


<?php
function get_li($arr)
{

    if(isset($arr)&&!empty($arr)){?>
        <ul>
            <?php foreach ($arr as $row){?>
                <li><?php echo $row->en_title;?><div class="pull-right">
                    </div>


                    <?php get_li($row->sub);  ?>


                </li>

            <?php } ?>

        </ul>
    <?php }
}
?>

<script>


    $('#tree1').treed();
    //$('#tree2').treed({

</script>
