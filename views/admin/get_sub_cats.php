<h2 class="title" style="background-color:<?php echo $rapid[0]->bg_color; ?>"><i style="background-color:<?php echo $rapid[0]->bg_color; ?>" class="<?php echo $rapid[0]->page_icon_code; ?>"></i><?php echo $rapid[0]->page_title; ?></h2>
<?php
$this->my_side_bar=$rapid[0]->sub;
//$rapid[0]->page_title

function createTreeView3($array) {
   
    echo  '<ul  class="nav" >';
    foreach ($array as $row){
        if(!empty($row->sub) ){
            subLevels3($row->sub,$row->page_title,$row->page_link,$row->page_icon_code,$row->page_id,$row->bg_color);
        }else{
            echo  '<li><a href="'.base_url().$row->page_link.'">'.$row->page_title.'</a></li>';
        }
    }
    echo  '</ul>';
}


function subLevels3($array,$page_title ,$page_link,$page_icon_code,$id,$bg_color,$level = false)
{




    echo '<li>
                          <a href='.$page_link.' >
                            <i class="'.$page_icon_code.'" style="color:'.$bg_color.'" ></i>

                            <span>' . $page_title . ' </span>

                          </a>';
    if (!empty($array)) {
        echo ' <ul>';
        foreach ($array as $row2) {
            if (isset($row2->sub) && !empty($row2->sub) ) {
                $level = 1;
                if (isset($row2->sub[0]->sub) && !empty($row2->sub[0]->sub)) {
                    $level = false;
                }
                subLevels3($row2->sub, $row2->page_title ,$row2->page_link,$row2->page_icon_code,$row2->page_id,$level);

            } else {
                echo '<li><a href="'.base_url().$row2->page_link.'">' . $row2->page_title . ' </a></li>';
            }
        }
        echo  '</ul>   ';
    }
    echo  ' </li>';



}
?>


<div class="sliding-submenu slsubmenu3">
    <div class="menu-wrapper ">
        <?php if(isset($this->my_side_bar) && !empty($this->my_side_bar)){

            ?>
            <?php createTreeView3($this->my_side_bar);?>



        <?php }?>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>








<script type="text/javascript">
    $(function() {
        slidingMenu3();

        function slidingMenu3() {
            $nav = $(".slsubmenu3 .nav");
            $nav_item = $nav.find("li");
            $dropdown = $nav_item.has("ul").addClass("dropdown");
            $back_btn = $nav.find("ul").prepend("<li class='js-back'>رجوع</li>");

            // open sub-level
            $dropdown.on("click", function(e) {
                console.debug('$dropdown.on("click")');
                e.stopPropagation();
                //e.preventDefault();

                $(this).addClass("is-open");
                $(this)
                    .parent()
                    .addClass("slide-out");
            });

            // go back
            $back_btn.on("click", ".js-back", function(e) {
                console.debug('$back_btn.on("click")');
                e.stopPropagation();
                $(this)
                    .parents(".is-open")
                    .first()
                    .removeClass("is-open");
                $(this)
                    .parents(".slide-out")
                    .first()
                    .removeClass("slide-out");
            });
        }
    });

</script>





