<?php if(isset($counting) && $counting != null){ ?>
<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="col-md-12 fadeInUp wow">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>سندات المورد</h4>
                </div>
            </div>
            <div class="panel-body"> 
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="2%">#</th>
                            <th width="20%" class="text-right">التاريخ</th>
                            <th width="20%" class="text-right">العملية</th>
                            <th width="20%" class="text-right">مدين</th>
                            <th width="20%" class="text-right">دائن</th>
                            <th width="20%" class="text-right">رصيد</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                		$x = 1;
                		$total = 0;
                		foreach ($counting as $value) {
                            $date = date("Y-m-d",$value->today);
                			if($value->type == 1) {
                				$dayen = $value->total;
                				$madeen = '-';
                				$total += $value->total;	
                				$operation = 'فاتورة شراء';
                			}
                			elseif($value->type == 2) {
                				$dayen = '-';
                				$madeen = $value->total;
                				$total -= $value->total;
                				$operation = 'سند قبض';
                			}
                            else {
                                $dayen = $value->total;
                                $madeen = '-';
                                $total += $value->total;
                                $date = '-';
                                $operation = 'رصيد أول';
                            }
                    	?>
                    	<tr>
                    		<td><?=($x++)?></td>
                    		<td><?=$date?></td>
                    		<td><?=$operation?></td>
                    		<td><?=$madeen?></td>
                    		<td><?=$dayen?></td>
                    		<td><?=$total?></td>
                    	</tr>
                    	<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php } ?>