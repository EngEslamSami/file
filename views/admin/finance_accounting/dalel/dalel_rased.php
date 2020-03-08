<style type="text/css">
    .padd {padding: 0 3px !important;}
    .no-padding {padding: 0;}
    .no-margin {margin: 0;}
    h4 {margin-top: 0;}
    .btn-group>.btn, .btn-group>.btn+.btn, .btn-group>.btn:first-child, .fc .fc-button-group>* {
        height: 34px!important;
        border-radius: 4px!important;
        margin: 0!important;
    }
    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: 92% !important;
    }
    .btn-label {
        left: 12px;
    }
    .tree ul {
        margin-right: 10px;
        position: relative;
        margin-left: 0;
    }
    .tree ul li {
        padding-left: 0;
    }
    .tree ul ul {
        margin-left: 0;
    }
    @media (min-width: 992px){
        .col_md_10{
            width: 10%;
            float:right;
        }
        .col_md_15{
            width: 15%;
            float:right;
        }
        .col_md_20{
            width: 20%;
            float:right;
        }
        .col_md_25{
            width: 25%;
            float:right;
        }
        .col_md_30{
            width: 30%;
            float:right;
        }
        .col_md_35{
            width: 35%;
            float:right;
        }
        .col_md_40{
            width: 40%;
            float:right;
        }
        .col_md_45{
            width: 45%;
            float:right;
        }
        .col_md_50{
            width: 50%;
            float:right;
        }
        .col_md_60{
            width: 60%;
            float:right;
        }
        .col_md_70{
            width: 70%;
            float:right;
        }
        .col_md_75{
            width: 75%;
            float:right;
        }
        .col_md_80{
            width: 80%;
            float:right;
        }
        .col_md_85{
            width: 85%;
            float:right;
        }
        .col_md_90{
            width: 90%;
            float:right;
        }
        .col_md_95{
            width: 95%;
            float:right;
        }
        .col_md_100{
            width: 100%;
            float:right;
        }
    }
    .label_title_2 {
        width: 100%;
        color: #000;
        height: auto;
        margin: 0;
        font-family: 'hl';
        padding-right: 0px;
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
        display: inline-block;
    }
    .input_style_2 {
        border-radius: 0px;
        width: 100%;
    }
  
    ul span { display: inline!important; }
    
    span.dalel-num{
      padding: 1px 4px;
      border-radius: 2px;
        
    }
   .scrol_width ::-webkit-scrollbar {
        width: 15px;
        height: 5px;
    }
    
    .tree li a{
       font-size: 16px;
    }
    
</style><?php//------------------------start functions -----------------------		function recorrer_niveles(&$array, $nivel, &$parent, &$original){    $nivel++;    if (isset($array) and $array != null) {        foreach ($array as $key => $item) {            //  $cantidad = $array[$key]["num"];            $cantidad = 0;            $array[$key]["Total_maden"] = $cantidad;            $array[$key]["Total_dayen"] = $cantidad;            $array[$key]["all_total_sabeq_maden"] = $cantidad;            $array[$key]["all_total_sabeq_dayen"] = $cantidad;            $cuenta =0;            if(isset($parent) and $parent != null){                $cuenta = count($parent);            }            for ($i = $nivel; $i < $cuenta; $i++) {                unset($parent[$i]);            } // for                $all_total_sabeq_maden = $array[$key]["total_sabeq"][0];                $all_total_sabeq_dayen = $array[$key]["total_sabeq"][1];            sum_original($original, $parent, $array[$key]["all_maden"], $array[$key]["all_dayen"],$all_total_sabeq_maden,$all_total_sabeq_dayen);            $parent[$nivel] = $array[$key]["code"];            recorrer_niveles($array[$key]["children"], $nivel, $parent, $original);        } // foreach    }} // functionfunction sum_original(&$original, $parent, $cantidad, $cantidad2,$cantidad3,$cantidad4){    if (!is_array($parent)) return 0;    if (isset($original) and $original != null) {        foreach ($original as $key => $value) {            if (isset($original[$key]["code"]) && in_array($original[$key]["code"], $parent)) {                $original[$key]["Total_maden"] += $cantidad;                $original[$key]["Total_dayen"] += $cantidad2;                $original[$key]["all_total_sabeq_maden"] += $cantidad3;                $original[$key]["all_total_sabeq_dayen"] += $cantidad4;            } // if            sum_original($original[$key]["children"], $parent, $cantidad, $cantidad2,$cantidad3,$cantidad4);        } // foreach    }} // function$parent = null;recorrer_niveles($records, -1, $parent, $records);//---------------------------end functions ------?>

<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow" style="padding: 0;">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?php echo $title; ?></h4>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-sm-12 col-xs-12 no-padding"> 
				<table id="" class=" table table-bordered scrollingtable my_table" role="table" style="table-layout: fixed">             
                    <thead>
                        <tr class="greentd text-center">							<!--<th class="text-center">رمز الحساب</th>-->							<th  style="width: 380px;">تفاصيل الحساب</th>							<th style="text-align: center;" class="text-center">رصيد سابق مدين</th>							<th style="text-align: center;" class="text-center">رصيد سابق دائن</th>							<th style="text-align: center;" class="text-center">حركة مدين</th>							<th style="text-align: center;" class="text-center">حركة دائن</th>							<th style="text-align: center;" class="text-center">إجمالى مدين</th>							<th style="text-align: center;" class="text-center">إجمالى دائن</th>							<th style="text-align: center;" class="text-center">رصيد حالى مدين</th>							<th style="text-align: center;" class="text-center">رصيد حالى دائن</th>						</tr>
                    </thead>
                    <tbody>							<?php							if (isset($records) && $records!=null) {								buildTreeTable($records);							}?>												</tbody>						<tfoot>					<tr class="orangetd">						<td style="color: #000;text-align: center;">الإجمالي</td>												<td style="color: #000;" class="result1">0</td>						<td style="color: #000;" class="result2">0</td>						<td style="color: #000;" class="result3">0</td>						<td style="color: #000;" class="result4">0</td>						<td style="color: #000;" class="result5">0</td>						<td style="color: #000;" class="result6">0</td>						<td style="color: #000;" class="result7">0</td>						<td style="color: #000;" class="result8">0</td>					</tr>					</tfoot>										<?php	//---------------------------start function buildtreetable ------		function buildTreeTable($tree, $count=1){	$s =0;	$arr =array();	foreach ($tree as $record) {		$rased_sabek_madeen = $record['total_sabeq'][0];		$rased_sabek_dayen = $record['total_sabeq'][1];		if (empty($record['children'])) {			$dayen =$record['all_dayen'];			$maden =$record['all_maden'];		 		  $all_total_sabeq_maden = $rased_sabek_madeen;		  $all_total_sabeq_dayen = $rased_sabek_dayen;		}else{			$dayen =$record['Total_dayen'];			$maden =$record['Total_maden'];		   $all_total_sabeq_maden = $record['all_total_sabeq_maden'];		   $all_total_sabeq_dayen = $record['all_total_sabeq_dayen'];		}		if($record['type'] ==2){			$rased_dayen = ($dayen +$all_total_sabeq_dayen) - ($maden + $all_total_sabeq_maden);			$rased_madeen =0;		}elseif ($record['type'] ==1){			$rased_madeen = ($maden + $all_total_sabeq_maden) - ($dayen +$all_total_sabeq_dayen);			$rased_dayen =0;		}		/*if( $dayen == 0.00 && $maden == 0.00  && $all_total_sabeq_maden ==  0.00 &&  $all_total_sabeq_dayen == 0.00){			$arr[] =$record['code'];		}*/		?>				<tr class="text-center">					<td class="requirementRight" onclick="load_page(<?=$record['code']?>);" style="text-align: right;">						<span style="width: 100px;text-align: left;display: inline-block;"><?=$record['code'] ?></span>						<span style="width: 280px;float: left;display: inline-block;"> - <?=$record['name']?> </span>					</td>										<td class="td1" data-type="<?php if (isset($record['children'])) { echo 1;					}else{ echo 0; }?>" data-number="<?=$all_total_sabeq_maden?>"><?php echo number_format($all_total_sabeq_maden,2); ?>					</td>										<td class="td2" data-type="<?php if (isset($record['children'])) { echo 1;					}else{ echo 0; }?>" data-number="<?=$all_total_sabeq_dayen?>"><?php echo number_format($all_total_sabeq_dayen,2); ?></td>					<td class="td3" data-type="<?php if (isset($record['children'])) { echo 1;					}else{ echo 0; }?>" data-number="<?=$maden?>"><?php echo number_format($maden,2);?></td>					<td class="td4" data-type="<?php if (isset($record['children'])) { echo 1;					}else{ echo 0; }?>" data-number="<?=$dayen?>"><?php echo number_format($dayen,2);?></td>					<td class="td5" data-type="<?php if (isset($record['children'])) { echo 1;					}else{ echo 0; }?>" data-number="<?php echo ($all_total_sabeq_maden+ $maden);?>"><?php echo number_format($all_total_sabeq_maden+ $maden,2);?></td>					<td class="td6" data-type="<?php if (isset($record['children'])) { echo 1;					}else{ echo 0; }?>" data-number="<?php echo ($all_total_sabeq_dayen+ $dayen);?>"><?php echo number_format($all_total_sabeq_dayen+ $dayen,2);?></td>					<td class="td7" data-type="<?php if (isset($record['children'])) { echo 1;					}else{ echo 0; }?>" data-number="<?=$rased_madeen?>"><?php echo number_format($rased_madeen,2); ?></td>					<td class="td8" data-type="<?php if (isset($record['children'])) { echo 1;					}else{ echo 0; }?>" data-number="<?=$rased_dayen?>"><?php  echo number_format($rased_dayen,2);?></td>				</tr>		<?php				if (isset($record['children'])) {					$count = buildTreeTable($record['children'], $count++);				}				$s++;}			return $count;	}//---------------------------end function --------
                    ?>					
                </table>
            </div>
        </div>
    </div>
</div>  <!---------------- start pop-up (report dalel details) --------------------><div class="modal fade" id="details_Modal" tabindex="-1" role="dialog"     aria-labelledby="myModalLabel">    <div class="modal-dialog" role="document" style="width: 80%">        <div class="modal-content">            <div class="modal-header">                <button type="button" class="close" onclick="$('#details_Modal').modal('hide')" aria-label="Close">                    <span aria-hidden="true">&times;</span></button>                <h4 class="modal-title" style="text-align: center;">التفاصيل </h4>            </div>            <div class="modal-body" id="result_page">            </div>            <div class="modal-footer" style="display: inline-block;width: 100%">                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#details_Modal').modal('hide')">                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق                </button>            </div>        </div>    </div></div><!----------------end pop-up (report dalel details) -------------------->
 <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>   <script>    /*alert(ConvertToDecimal(123.01));*/    function ConvertToDecimal(num) {        var n = parseFloat(num);        if (isInt(n)) {            return num;        }        else {            /*num = num.toString();            num = num.slice(0, (num.indexOf(".")) + 3);            return(Number(num));*/            return  num.toFixed(2);        }    }    function isInt(value){        return (parseFloat(value) == parseInt(value)) && !isNaN(value);    }</script><script>    function formatMoney(n, c, d, t) {        var c = isNaN(c = Math.abs(c)) ? 2 : c,            d = d == undefined ? "." : d,            t = t == undefined ? "," : t,            s = n < 0 ? "-" : "",            i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),            j = (j = i.length) > 3 ? j % 3 : 0;        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");    };</script><script>    function removeCommas(str) {        while (str.search(",") >= 0) {            str = (str + "").replace(',', '');        }        return str;    }</script><script>    function GetSum(div_class) {        var  sum=0;        $("." +div_class).each(function(){            if(parseInt($(this).attr('data-type')) == 0) {                sum += parseFloat($(this).attr('data-number'));            }        });        return ( ConvertToDecimal(formatMoney(sum)));    }</script><script>    $(".result1").text( GetSum('td1'));    $(".result2").text( GetSum('td2'));    $(".result3").text( GetSum('td3'));    $(".result4").text( GetSum('td4'));    $(".result5").text( GetSum('td5'));    $(".result6").text( GetSum('td6'));    $(".result7").text( GetSum('td7'));    $(".result8").text( GetSum('td8'));</script><script>    $('.scrollingtable').DataTable({        "ordering": false,        dom: 'Bfrtip',        buttons: [            'pageLength',            'copy',            'excelHtml5',            {                extend: "pdfHtml5",                orientation: 'landscape'            },            {                extend: 'print',                // orientation: 'landscape',                customize: function (win) {                    $(win.document.body).append("<style> body{background-color: #fff;} @page{size:  350mm 255mm;margin:10px 15px 40px 15px;}</style>");                    $(win.document.body).find('.my_table').attr('class','table table-bordered my_table');                    var bodyht =  '<div class="first-part" data-spy="scroll">'+                        '<table class="report-container">'+                        '<thead class="report-header">'+                        '<tr>'+                        '<th class="report-header-cell">'+                        '<div class="header-space">&nbsp;</div>'+                        '</th>'+                        '</tr>'+                        '</thead>'+                        '<tbody class="report-content">'+                        '<tr>'+                        '<td class="report-content-cell">'+                        '</td>'+                        '</tr>'+                        '</tbody>'+                        '<tfoot class="report-footer">'+                        '<tr>'+                        '<td class="report-footer-cell">'+                        '<div class="footer-space">&nbsp;</div>'+                        '</td>'+                        '</tr>'+                        '</tfoot>'+                        '</table>'+                        '</div>';                    $(win.document.body).append(bodyht);                    var headerpage = '<div class="header-info">'+                        '<div class="bond-header">'+                        '<div class="col-xs-4 pad-2">'+                        '<div class="right-img">'+                        '<img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol1.png">'+                        '</div>'+                        '</div>'+                        '<div class="col-xs-4 pad-2">'+                        '</div>'+                        '<div class="col-xs-4 pad-2">'+                        '<div class="left-img">'+                        '<img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol2.png">'+                        '</div>'+                        '</div>'+                        '</div>'+                        '</div>';                    var headerfatra= '<div class="col-xs-12" style="margin-top: -16px;"> '+                        '<div class=" gray-background">'+                        '<div class="col-xs-3 no-padding"></div>'+                        '<div class="col-xs-6 text-center">'+                        '<h5 class="alperiod"> خلال الفترة من <?php                         $date_from = strtotime($this->input->post('from'));                        echo date("d-m-Y",$date_from); ?> إلي <?php                          $date_to = strtotime($this->input->post('to'));                        echo date("d-m-Y",$date_to); ?></h5>'+                        '</div>'+                        '<div class="col-xs-3 text-center"></div>'+                        '</div>'+                        '</div>';                    $(win.document.body).find('.page-print-header').append(headerpage);                    $(win.document.body).find('.header-fatra').append(headerfatra);                    $(win.document.body).find('.my_table').wrap('<div class="tablearea">');                    var  contentcell =$(win.document.body).find('.report-content-cell')                    $(win.document.body).find('.tablearea').appendTo(contentcell);                    /***********************/                    $(win.document.body).find('.my_table tbody tr td:nth-child(3)').attr('class','td1');                    $(win.document.body).find('.my_table tbody tr td:nth-child(4)').attr('class','td2');                    $(win.document.body).find('.my_table tbody tr td:nth-child(5)').attr('class','td3');                    $(win.document.body).find('.my_table tbody tr td:nth-child(6)').attr('class','td4');                    $(win.document.body).find('.my_table tbody tr td:nth-child(7)').attr('class','td5');                    $(win.document.body).find('.my_table tbody tr td:nth-child(8)').attr('class','td6');                    $(win.document.body).find('.my_table tbody tr td:nth-child(9)').attr('class','td7');                    $(win.document.body).find('.my_table tbody tr td:nth-child(10)').attr('class','td8');                    /************************/                                                                                                    //   var  headercell =$(win.document.body).find('.report-header-cell')                    // $(win.document.body).find('.mpage-header').appendTo(headercell);                                      /*  $(win.document.body).find('.tablearea thead tr')                    .before('<tr class=" text-center">'+                        '<th  class="text-center" colspan="2"> تفاصيل الحساب</th>'+                        '<th colspan="2" class="text-center">رصيد ماقبل</th>'+                        '<th colspan="2" class="text-center">الحركة</th>'+                        '<th colspan="2" class="text-center">الإجمالي</th>'+                          '<th colspan="2" class="text-center">الرصيد</th>'+                    '</tr>'); */                                                            $(win.document.body).find('.tablearea tbody tr:last-child')                    .after('<tr>'+                    '<td class="text-center" >الإجمالي</td>'+                    '<td class="result1">'+GetSum('td1')+'</td>'+                    '<td class="result2">'+GetSum('td2')+'</td>'+                    '<td class="result3">'+GetSum('td3')+'</td>'+                    '<td class="result4">'+GetSum('td4')+'</td>'+                    '<td class="result5">'+GetSum('td5')+'</td>'+                    '<td class="result6">'+GetSum('td6')+'</td>'+                    '<td class="result7">'+GetSum('td7')+'</td>'+                    '<td class="result8">'+GetSum('td8')+'</td>'+                    '</tr>');                                                             $(win.document.body).find('.my_table').after('<div class=" col-xs-12">'+                                        '<br><br>'+                                                                    '<div class="col-xs-4 text-center">'+                                            '<label> المحاسب </label><br><br><p  style="font-size:22px">محمد عبدالله الربدي</p>'+                                        '</div>'+                                        '<div class="col-xs-4 text-center">'+                                            '<label> مدير الشئون المالية </label><br><br><p  style="font-size:22px">تركي بن علي التركي</p>'+                                        '</div>'+                                        '<div class="col-xs-4 text-center">'+                                                                        '<label>مدير عام الجمعية </label><br><br>'+                                             '<p style="font-size:22px">سلطان بن محمد الجاسر</p><br>'+                                        '</div>'+                                        '<br><br>'+                                                                '</div>' );                     $(win.document.body).find('table')                        .addClass('compact')                        .css('table-layout', 'fixed');                                                $(win.document.body).find('thead tr th:nth-child(1)').css("width", "410px");                     $(win.document.body).find('tbody tr td:nth-child(1)').css("text-align", "right");                  //  $(win.document.body).find('thead tr:last-child th:nth-child(1)').css("width", "100px");                    //$(win.document.body).find('thead tr:last-child th:nth-child(2)').css("width", "250px");                },                exportOptions: {                    modifier: {                        page: 'current'                    }                },                autoPrint: false,            },            'colvis'        ],        scrollY: '50vh',        scrollCollapse: true,        paging: false,        info: false,        colReorder: true    });</script>
<script>
    function getCode() 
    {
        var level = parseFloat($('#parent').find('option:selected').attr('level'))+1;
        $('#level').val(level);

        if($('#parent').val()) {
            var dataString = 'id=' + $('#parent').val() ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/getLastSubCode',
                data:dataString,
                cache:false,
                success: function(result){
                    if(result) {
                        code = parseFloat(result)+1;
                    }
                    if(result == 0 && (level-1) > 0) {
                        code = $('#parent').find('option:selected').attr('code');
                        for(i = 1 ; i < (level-1) && i < 3 ; i++){
                            code = code + 0;
                        }
                        code = code + 1;
                    }
                    $('#code').val(code); 
                }
            });

            var dataString = 'id=' + $('#parent').val() ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/getParentData',
                data:dataString,
                cache:false,
                success: function(result){
                    if (result) {
                        var obj = JSON.parse(result);
                        $('#hesab_tabe3a').val(obj['hesab_tabe3a']);
                        $('#hesab_report').val(obj['hesab_report']);
                    }
                }
            });
        }
    }
</script><script>    function load_page(code) {        $('#details_Modal').modal('show');        $.ajax({            type: 'post',            url: "<?php echo base_url();?>finance_accounting/dalel/Dalel/load_dalel_details",            data: {code: code},            beforeSend: function () {                $('#result_page').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');            },            success: function (d) {                $('#result_page').html(d);            }        });    }</script>