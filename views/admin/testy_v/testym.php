

<?php

echo '<pre>';
print_r($records);



     echo "<pre>"; print_r($records); echo "</pre>";
        $parent = null;
        recorrer_niveles($records, -1, $parent, $records);

        echo "<pre>"; print_r($records); echo "</pre>";

        function recorrer_niveles(&$records, $nivel, &$parent, &$original){
	       $nivel++;
	       foreach($records as $key => $item){
		      $cantidad = $records[$key]["code"];
		      $records[$key]["total"] += $cantidad;
		      $cuenta = count($parent);
		      for($i=$nivel;$i<$cuenta;$i++){
			    unset($parent[$i]);
		      } // for
		      sum_original($original, $parent,  $records[$key]["code"]);
		      $parent[$nivel ] = $records[$key]["id"];
		      recorrer_niveles($records[$key]["children"], $nivel, $parent, $original);
             } // foreach
          } // function

     function sum_original(&$original ,$parent, $cantidad){
	     if(!is_array($parent)) return 0;
	     foreach($original as $key => $value){
		      if(isset($original[$key]["id"]) && in_array($original[$key]["id"], $parent)){
		    	$original[$key]["total"] += $cantidad;
		     } // if
		      sum_original($original[$key]["children"], $parent, $cantidad);
	     } // foreach
       } // function



/*
function getGroupTotal(&$records, &$total=0, $clear=0){
        if(isset($records['num_products']) && !$clear){
            $total += $records['num_products'];
            $clear = 1;
        }
        foreach($records as $key=>$data){
            if(isset($data['num_products'])){
                $total += $data['num_products'];
            }
            if(is_array($data)){
                getGroupTotal($data, $total, $clear);
            }
        }
        return $total;
    }

    function buildTotalProducts(&$records, &$total=0, &$init=[], $clear=0, &$gTotal=[]) {
        if(!$clear){
            $gTotal         = [];
            foreach ($records as $key => &$data) {
                $data['total']  = getGroupTotal($data);
                $gTotal[]       = $data['total'];
            }
            $clear = 1;
        }
        $y = 0;
        foreach($records as $key=>&$children){
            if(empty($init)){ $init = [0=>$key, 1=>$records];}

            if(is_array($children)){
                $numProd    = isset($children['num_products'])? $children['num_products']:0;
                $k          = &$children;
                if($clear==1){
                    $k['total'] = $gTotal[$y];
                    $gTotal[$y] -= $numProd;
                    $numProd = 0; $clear=2;
                }else {
                    $k['total'] = ($gTotal[$y] == 0)?$numProd : $gTotal[$y];
                    $gTotal[$y] -= $numProd;
                }
                if($init[1][$init[0]] == $records[$key]){
                    $y++;
                }
                buildTotalProducts($children, $total, $init, $clear, $gTotal);
            }
        }
        return $records;
    }


    var_dump( buildTotalProducts($records) );
   */



 ?>

<?php 


die;
    /*    $array = array();
        $array2 = array();
        $array3 = array();
    //    $array8 = array();
        $array16 = array();
        $array16[] = array("id" => 41, "num" => 1, "total" => 0, "sublevel" => array() );
        $array24 = array();
        $array24[] = array("id" => 101, "num" => 14, "total" => 0, "sublevel" => array() );
        $array3[] = array("id" => 7, "num" => 10, "total" => 0, "sublevel" => array());
        $array3[] = array("id" => 31, "num" => 15, "total" => 0, "sublevel" => $array16 );
      
        $array2[] = array ( "id" => 3, "num" => 0, "total" => 0, "sublevel" => $array3 );
        $array2[] = array( "id" => 10 , "num" => 2, "total" => 0, "sublevel" => array( array("id" => 11, "num" => 3, "total" => 0, "sublevel" => $array24)));
        $array2[] = array("id" => 111, "num" => 5, "total" => 0, "sublevel" => array());
        $array[] = array ( "id" => 1, "num" => 2, "total" => 0, "sublevel" => $array2 );
        $array5[] = array("id" => 27, "num" => 3, "total" => 0, "sublevel" => array() );
        $array[] = array("id" => 2, "num" => 2 , "total" => 0, "sublevel" => $array5 );

        echo "<pre>"; print_r($array); echo "</pre>";
        $parent = null;
        recorrer_niveles($array, -1, $parent, $array);

        echo "<pre>"; print_r($array); echo "</pre>";

        function recorrer_niveles(&$array, $nivel, &$parent, &$original){
	       $nivel++;
	       foreach($array as $key => $item){
		      $cantidad = $array[$key]["num"];
		      $array[$key]["total"] += $cantidad;
		      $cuenta = count($parent);
		      for($i=$nivel;$i<$cuenta;$i++){
			    unset($parent[$i]);
		      } // for
		      sum_original($original, $parent,  $array[$key]["num"]);
		      $parent[$nivel ] = $array[$key]["id"];
		      recorrer_niveles($array[$key]["sublevel"], $nivel, $parent, $original);
             } // foreach
          } // function

     function sum_original(&$original ,$parent, $cantidad){
	     if(!is_array($parent)) return 0;
	     foreach($original as $key => $value){
		      if(isset($original[$key]["id"]) && in_array($original[$key]["id"], $parent)){
		    	$original[$key]["total"] += $cantidad;
		     } // if
		      sum_original($original[$key]["sublevel"], $parent, $cantidad);
	     } // foreach
       } 
       */
       
       

/*
$array = array ( "1" => array ( "id" => 1, 
                               "num_products" => 3, 
                                "total" => 0, 
                                "sublevel" => array( "id" => 2, "num_products" => 5, "total" => 0) )   );

function sum_recursive($array) {
    $sum = 0;
    foreach( $array as $key=>$value ) {
        if( isset($value['sublevel']) && is_array($value['sublevel']) && count($value['sublevel'])>0 ) {
            if( isset($value['num_products']) ) {
                $sum += $value['num_products'];
            }  
            $sum += sum_recursive($value);
        } else {
            if( isset($value['num_products']) ) {
                $sum += $value['num_products'];
            }
        }
    }
    return $sum;
}

$sum = sum_recursive($array);
echo "Sum is: ".$sum;
*/


echo '<pre>';
print_r($records);
die;
?>




   <div class="col-sm-11 col-xs-12">
   


<?php 
echo '<pre>';
print_r($records);

if(isset($records)&&$records!=null){
?>

<!--
<div style="float:left" >
<button onClick="window.print()" class="btn btn-sm  btn-success hidden-print" > <span class="glyphicon glyphicon-print"></span> طبـاعه </button>
</div> <br/> <br/>
-->

    <table id="no-more-tables" class="table table-bordered" role="table">

        <thead>

        <tr>

            <th width="2%">#</th>

            <th  class="text-right">إسم الحساب</th>
               <th  class="text-right">كود الحساب</th>
             <th  class="text-right">مدين</th>
            
            <th  class="text-right">دائن</th>
            
            <th class="text-right">القيمة</th>

        </tr>

        </thead>
        <tbody>
        
        <?php
        $count1 = 1;
        function drow($data, $count, $class, $sum=0 ,$eslam_maden=0, $sum_dayen=0){
            $total = 0;
            $total_madeen = 0;
            $total_dayen = 0;
            $count1 = $count;
            $neeeedam_mals =$eslam_maden;
            
            
            for($z = 0 ; $z < count($data) ; $z++){
                
              //  echo $data[$z]['children'].'<br/>';
                
                if(isset($data[$z]['children'])){
                    $class = 'btn-success';
                    $count = drow($data[$z]['children'], $count1,$neeeedam_mals, 'btn-info',$sum,$sum_dayen);
                  //  $sum = $data[$z]['last_value']+$data[$z]['value'];
                  $sum = 0+$count[1];
                    $count1 = $count[0];
                    
                    
                     $sum_madeen =0;
                    $sum_dayen = 0;
                  $eslam_maden =  $neeeedam_mals;
                    
                }   
                else{
                    $sum = $data[$z]['last_value'];
                    $eslam_maden = $data[$z]['all_madeen'];
                    $sum_madeen = 0;
                    $sum_dayen = 0;
                    }
                    /*
                         <!-- <td>'.sprintf("%.2f",$data[$z]['madeen']).'</td>
                      <td>'.sprintf("%.2f",$data[$z]['dayen']).'</td>-->
                    */
                    echo '<tr class="'.$class.'">
                          <td>'.($count1++).'</td>
                            <td>'.$data[$z]['code'].'</td>
                          <td>'.$data[$z]['name'].'</td>
                
                
                     <td>'.sprintf("%.2f",$eslam_maden).'</td>
                      <td>'.sprintf("%.2f",$data[$z]['all_dayen']).'</td>
                
                          <td>'.sprintf("%.2f",$sum).'</td>
                          </tr>';
                $total += $sum;
                $total_madeen += $sum_madeen;
                $total_dayen += $sum_dayen;
                
            }
            
      /*      echo 'total_madeen='.$total_madeen .'<br/>';
           echo 'total=  '. $total .'<br/>';
            echo 'count1= '. $count1 .'<br/>';*/
            
           // echo 'total_madeen= '. $total_madeen .'<br/>';
            
            return array($count1,$total,$total_madeen,$total_dayen);
        }
        $aal_all_madeen=0;
        $aal_all_dayen=0;
        for($x = 0 ; $x < count($records) ; $x++){
            if(isset($records[$x]['children'])){
                $count = drow($records[$x]['children'], $count1, 'btn-success');
               
             
                echo '<pre>';
                print_r($count);
                
                $sum = $count[1];
                $count1 = $count[0];
                
                $sum_madeen = 0;
                $sum_dayen = 0;
                
            }
            else{
                $sum = $records[$x]['last_value'];
                
               $sum_madeen = 0;
                $sum_dayen = 0;
                
                }
                
                
              //  echo $count[1].'<br/>';
                
            echo '<tr class="btn-warning">
                  <td>'.($count1++).'</td>
                    <td>'.$records[$x]['code'].'</td>
                  <td>'.$records[$x]['name'].'</td>
                  
                   <td>'.sprintf("%.2f",$sum_madeen).'</td>
                  <td>'.sprintf("%.2f",$sum_dayen).'</td>
                  <td>'.sprintf("%.2f",$sum).'</td>
                  </tr>';
        }
      
        ?>
        
        </tbody>

    </table>

<?php 
 }
else
echo '<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>تنبية!</strong> لا توجد حسابات
</div>';

?>

            </div>
            
            </fieldset>
            
            <?php //echo form_close()?>
