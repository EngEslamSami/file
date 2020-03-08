<?php
if(isset($from) && isset($to)){
    echo '<section class="barcode">';
    for($x = $from ; $x <= $to; $x++)
    {
        echo '
	<div class="col-sm-2 col-xs-3" id="for_print">
				<div class="box">
					<div class="logo">
						<img src="'.base_url().'barcodes/logo.png"  style=" width: 100%;">
					</div>
					<hr class="col-xs-10">
					<div class="num">
						<p class="left">'.$x.'</p>
					</div>
					<hr class="col-xs-10">
					<div class="bar-img">
						<img src="'.base_url().'barcodes/barcode.php?text='.$x.'"" alt="'.$x.'"   height="50px"/>
					</div>
				</div>
			</div>';
    }
 } ?>