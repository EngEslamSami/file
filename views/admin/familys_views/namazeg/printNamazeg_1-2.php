



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





<div id="printdiv">

    <div class="col-xs-9"></div>
    <div class="col-xs-3 text-center print_head" style="font-weight: 600;padding-left: 0; ">
        <p class="fhelvetic no-margin"> <?php echo $result['letter_rkm_full'];?></p>
        <p class="fhelvetic no-margin">
            <?php echo $result['letter_date_ar'];?>
            م
        </p>
        <p class="fhelvetic no-margin ">0</p>
        <p style="margin-top: 8px;" class="fhelvetic no-margin" >(<?php echo $result['mawdo3']?>)</p>
    </div>
<div class="container">
    <div class="print_forma  no-border    col-xs-12 allpad-12">
     <br /> <br />
     
        <div class="col-xs-12">
            <div class="personality">

                <div class="col-xs-1"></div>
                <div class="col-xs-7 ahwal_style">
                    <h4 class="" style="font-weight: bold !important;font-size: 20px !important;"><?php if(!empty($titles[$result['start_laqb']])){ echo $titles[$result['start_laqb']]['title_setting'] .'/'; } ?><?php echo $result['geha_name'];?>  </h4>
                </div>
                <div class="col-xs-3">
                    <h4 class="" style="font-weight: bold !important;font-size: 20px !important;"><?php if(!empty($greetings[$result['end_laqb']])){ echo $greetings[$result['end_laqb']]['title_setting']; } ?> </h4>
                </div>


                <div class="col-xs-11 col-xs-offset-1 ahwal_style">
                    <br>

                    <h5 style="font-weight: normal !important;"><?php echo $result['header_name'];?></h5>
                </div>



                <div class="col-xs-12 no-padding">

                    <div class="form-group col-sm-12 col-xs-12">
                             <h4><?php echo$result['namozg_head'];?></h4>

                    </div>
                    <div class="form-group col-sm-12 col-xs-12">
                        <table class="table table-bordered ">
                            <thead>
                            <tr class="greentd">
                                <th class="text-center">إسم رب الأسرة</th>
                                <th class="text-center">السجل المدني</th>
                                <th class="text-center">رقم الملف</th>
                                <th class="text-center">عدد أفراد الأسرة</th>
                                <?php 
                                if(isset($result['responsable_name']) and  $result['responsable_name'] != null){?>
                                     <th class="text-center"> إسم المسئول</th>
                                <?php }
                                 ?>
                                 
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center"><?php echo $result['father_name']?></td>
                                <td class="text-center"><?php echo $result['father_national_num']?></td>
                                <td class="text-center"><?php echo $result['file_num']?></td>
                              <!--  <td class="text-center"><?php echo $family_members_num;?></td> -->
                               <td class="text-center"><?php echo $result['no_afrad']?></td>
                                <?php 
                                if(isset($result['responsable_name']) and  $result['responsable_name'] != null){?>
                                    <td class="text-center"><?php echo $result['responsable_name']?></td>
                                <?php }
                                 ?>
                              
                              
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-sm-12 col-xs-12">
                        <h4><?php echo$result['namozg_footer'];?></h4>

                    </div>


                </div>
                <br/>  <br/>
            </div>

            <div class="special col-xs-12 ">


                <div class="col-xs-4 text-center">

                </div>
                <div class="col-xs-3 text-center">

                </div>
                <div class="col-xs-5 text-center ">

                    <label class="ahwal_signs ">مدير عام الجمعية </label><br> <br><br>
                    <h5 class="ahwal_signs">سلطان بن محمد الجاسر</h5><br>
                </div>
                <br><br>

            </div>
        </div>



    </div>
</div>



</div>




<script >
      var divElements = document . getElementById("printdiv") . innerHTML;
      var oldPage = document . body . innerHTML;
      document . body . innerHTML =
          "<html><head><title></title></head><body><div id='printdiv'>" +
          divElements + "</div></body>";
      window .print();
      setTimeout(function () {
          window.location.href ="<?php echo base_url();?>family_controllers/namazegs/Namazeg";
        }, 1000);
</script >



