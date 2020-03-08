







<link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />

<link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/bootstrap-arabic.min.css" />

<link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/style.css">









<style type="text/css">

    .print_forma{

        border:1px solid ;

        padding: 15px;

    }

    .print_forma table th{

        text-align: right;

    }

    .print_forma table tr th{

        vertical-align: middle;

    }

    .body_forma{

        margin-top: 40px;

    }

    .no-padding{

        padding: 0;

    }

    .heading{

        font-weight: bold;

        text-decoration: underline;

    }

    .print_forma hr{

        border-top: 1px solid #000;

        margin-top: 7px;

        margin-bottom: 7px;

    }



    .myinput.large{

        height:22px;

        width: 22px;

    }



    .myinput.large[type="checkbox"]:before{

        width: 20px;

        height: 20px;

    }

    .myinput.large[type="checkbox"]:after{

        top: -20px;

        width: 16px;

        height: 16px;

    }

    .checkbox-statement span{

        margin-right: 3px;

        position: absolute;

        margin-top: 5px;

    }

    .header p{

        margin: 0;

    }

    .header img{

        height: 90px;

    }

    .no-border{

        border:0 !important;

    }

    .table-ghas tr td{



        min-height: 20px

    }

    .table-ghas tr td,

    .table-ghas tr th

    {

        text-align: center;

    }

    .gray_background{

        background-color: #000;

        color: #fff;



    }

    table.th-no-border th,

    table.th-no-border td

    {

        border-top: 0 !important;

    }

    .allpad-12{

        padding: 20px 0 20px 0;

    }

    .fhelvetic{

        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;

    }

    /*@page{

        margin: 20px 0px;

    }*/



    @page {

        size: A4;

        /*	margin: 180px 0 135px;*/

        margin: 60px 20px 200px 20px;

        border: none;



    }

    /***************************************************/

    .ahwal_style h5{



        font-weight: bold;



    }



    .ahwal_signs label{



        display: inline-block;

        max-width: 100%;

        margin-bottom: 5px;

        font-weight: bold !important;

        font-size: 24px !important;

    }



    .ahwal_signs h5{

        font-weight: bold;

        font-size: 24px !important;



    }



    .ahwal_signs {

        font-weight: bold;

        font-size: 20px !important;



    }







    .table-bordered>thead>tr>th,

    .table-bordered>tbody>tr>th,

    .table-bordered>tfoot>tr>th,

    .table-bordered>thead>tr>td,

    .table-bordered>tbody>tr>td,

    .table-bordered>tfoot>tr>td {

        border: 1px solid #000 !important;

            text-align: center !important;

    }



    .justify  {

        text-align: justify;

        text-justify: inter-word;

        line-height: 40px;





    }



    .justify_another{

        text-align: justify;

        text-justify: inter-word;

        line-height: 18px !important;

        margin: 0;

    }

    /*******************************************************************************************/

    .radio label, .checkbox label {



        font-size: 17px !important;

        font-weight: bold !important;



    }





    .final_table table>thead>tr>th, 

    .table>tbody>tr>th, .table>tfoot>tr>th,

     .table>thead>tr>td, .table>tbody>tr>td,

      .table>tfoot>tr>td {



        padding: 4px !important;



    }

    .final_table_back_color{

        background-color: #cacaca !important;

        color: #000 !important;



    }

    table tbody td{

        background-color: #fff !important;

    }



.greentd td, .greentd th {

    color: #000;

    font-size: 16px !important;

    background-color: #c5c5c5 !important;

border-radius: 0px !important;

}



.print_head p {

    

    font-size: 16px;

    font-weight: bold;

    

}

</style>











<body onload="printDiv('printDiv')" id="printDiv">



    <div class="col-xs-9"></div>

    <div class="col-xs-3 text-center print_head" style="font-weight: 600;padding-left: 0; ">

        <p class="fhelvetic no-margin"><?=$get_all->year.'/'. $get_all->emp_depart_code .'/'.$get_all->sader_rkm?></p>

        <p class="fhelvetic no-margin">

        <?php if (!empty($get_all->tasgel_date)) {
echo  $get_all->tasgel_date;
} else{
echo 'غير محدد' ;
}
?>
 م
        </p>

        <p class="fhelvetic no-margin ">0</p>

        <p style="margin-top: 8px;" class="fhelvetic no-margin" >( <?php if (!empty($get_all->mawdo3_subject)) {
echo  $get_all->mawdo3_subject;
} else{
echo 'غير محدد' ;
}
?>)</p>

    </div>

    </body>




<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        var divElements = document.getElementById(divID).innerHTML;
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();
        window.close();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
    }
</script> 


