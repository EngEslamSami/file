
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
		margin: 160px 20px 200px 20px;
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


.final_table table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
    
    padding: 4px !important;
    
}
.final_table_back_color{
    background-color: #cacaca !important;
    color: #000 !important;
    
}

    
    </style>





    <div id="printdiv">


        <section class="main-body">
            <div class="container">
                <div class="print_forma <?php if ($letter_type !=4){ ?> no-border <? } ?>   col-xs-12 allpad-12" <?php if ($letter_type ==4){ ?> style="border-radius: 30px;"<? } ?>>
                   <div class="col-xs-12">
                    <div class="personality">
                        <?php if($letter_type ==1){ ?>
                            <div class="col-xs-11 col-xs-offset-1 ahwal_style">
                                <h4 class=""  style="font-weight: bold !important;font-size: 20px !important;">سعادة / مدير الأحوال المدنية بالقصيم &nbsp  &nbsp &nbsp   &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp  &nbsp  &nbsp   &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp سلمه الله </h4>
                               <br />
                                <h5 style="font-weight: normal !important;">السلام عليكم ورحمة الله وبركاتة ، وبعد :  </h5>
                            </div>
                        <?php }elseif ($letter_type ==2){ ?>
                            <div class="col-xs-11  ahwal_style" style="margin-right: 5px;">
                                <h5 class=""  style="font-size: 18px; ">سعادة / مدير المؤسسة العامة للتأمينات الإجتماعية بمنطقة القصيم &nbsp  &nbsp &nbsp  &nbsp &nbsp سلمه الله </h5>
                                <h5 style="font-weight: normal !important;" >السلام عليكم ورحمة الله وبركاتة ... وبعد :  </h5>
                            </div>
                            <?php }elseif ($letter_type ==5){ ?>
                            <div class="col-xs-11  ahwal_style" style="margin-right: 5px;">
                                <h5 class=""  style="font-size: 18px; ">سعادة / مدير المؤسسة العامة للتأمينات الإجتماعية بمنطقة القصيم &nbsp  &nbsp &nbsp  &nbsp &nbsp سلمه الله </h5>
                                <h5 style="font-weight: normal !important;" >السلام عليكم ورحمة الله وبركاتة ... وبعد :  </h5>
                            </div>
                        <?php }elseif ($letter_type ==3){ ?>
                            <div class="col-xs-10 col-xs-offset-1 ahwal_style">
                                <h4  style="font-weight: bold !important;font-size: 20px !important;" >سعادة / مدير مكتب المؤسسة العامة للتقاعد ببريدة    &nbsp &nbsp  &nbsp  &nbsp  &nbsp  &nbsp حفظه  الله </h4>
                                <h5 class="" style="font-weight: normal !important;">السلام عليكم ورحمة الله وبركاتة ، وبعد :  </h5>
                            </div>
                        <?php }elseif ($letter_type ==4){ ?>

                            <div class="col-xs-10 col-xs-offset-1 ahwal_style">
                                <h4 style="font-weight: bold !important;font-size: 20px !important;" >سعادة / مدير مكتب الضمان الاجتماعي بمدينة بريدة &nbsp   &nbsp  &nbsp  &nbsp   &nbsp  &nbsp  &nbsp حفظه  الله </h4>
                                <h5 class="" style="font-weight: normal !important;">السلام عليكم ورحمة الله وبركاتة ، وبعد :  </h5>
                            </div>

                        <?php } ?>


                        <div class="col-xs-12 no-padding">
                            <table style="margin-bottom: 10px !important;" class="table table-bordered table-ghas">
                                <thead>
                                <tr>
                                    <?php if ($letter_type ==1){ ?>
                                    <th class="gray_background">م</th>
                                    <?php } ?>
                                    <th class="gray_background">الإسم</th>
                                    <th class="gray_background">رقم السجل المدنى</th>
                                    <?php if ($letter_type !=1 and $letter_type != 4 ){ ?>
                                    <th class="gray_background">رقم الحفيظة</th>
                                    <?php } ?>
                                    <th class="gray_background">مكان الإصدار</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x=0;
                                if(isset($records)&&!empty($records)){

                                    foreach ($records as $row){
                                        $x++;
                                        ?>


                                        <tr >
                                            <?php if ($letter_type ==1){ ?>
                                            <td><?=$x?></td>
                                            <?php } ?>
                                            <td ><?php if(isset($row->full_name[0]->full_name)){ echo  $row->full_name[0]->full_name; } else{ echo  $row->full_name[0]->member_full_name;   }?></td>
                                          <td> <?php echo $row->person_national_num; ?></td>
                                        <?php if ($letter_type !=1  and $letter_type != 4){ ?>
                                            <td> <?php /*echo $row->person_national_num; */?></td>
                                        <?php } ?>
                                            <td> <?php echo $row->full_name[0]->dest_card;?></td>


                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                          
                            <?php if($letter_type ==1){ ?>
                            <div class="col-xs-10 col-xs-offset-1 ">
                                <h4 class="justify fhelvetic">حيث تقدم إلينا المذكورة بياناتها أعلاه للإستفادة من خدمات الجمعية لذا نأمل من سعادتكم توضيح أحوالها من حيث الزواج أو عدمه حسب البيانات المسجلة لديكم حتى تاريخه ، كما نأمل من سعادتكم التكرم بتزويدنا ببرنت كامل عن أحوالها . </h4>
                              
                            </div>
                            <div class="clearfix"></div>
                            <h5 class="text-center">ولكم منا جزيل الشكر والامتنان ،،،</h5>



                                    </div>
                                </div>

                                <div class="special col-xs-12 ">
                                  

                                    <div class="col-xs-4 text-center">

                                    </div>
                                    <div class="col-xs-3 text-center">

                                    </div>
                                    <div class="col-xs-5 text-center ">

                                        <label class="ahwal_signs ">مدير عام الجمعية </label><br> <br><br>
                                        <h5 class="ahwal_signs" >سلطان بن محمد الجاسر</h5><br>
                                    </div>
                                    <br><br>

                                </div>
                   </div>
                            <?php }elseif($letter_type ==3){ ?>
                                <div class="col-xs-10 col-xs-offset-1">
                                    <h4 class= "justify_another fhelvetic">تقدمت لنا ورثة الموضحة بياناته أعلاه وذلك للاستفادة من خدمات الجمعية ، وحيث أنه من الضروري معرفة مصادر الدخل المختلفة للإسرة ، لذا نأمل منكم التكرم بالإفادة عن بيانات المتوفى المسجلة لديكم عن طريق تعبئة الخانات المدونة أسفل الصفحة .   </h4>
                                    <br />
                                    
                                  
                                </div>

                                       <!--    <div class="clearfix"></div> -->
                                                          


                                        </div>
                                    </div>

                                    <div class="special col-xs-12 ">
                                        

                                        <div class="col-xs-5 text-center">
                                        <h5 class="text-center">ولكم منا جزيل الشكر والامتنان ،،، </h5>
                                        </div>
                                        <div class="col-xs-3 text-center">

                                        </div>
                                        <div class="col-xs-4 text-center">

                                            <label  class="ahwal_signs ">مدير عام الجمعية </label><br> <br>
                                            <h5  class="ahwal_signs " >سلطان بن محمد الجاسر</h5>
                                        </div>
                                       

                                    </div>
                            </div>
<div class="print_forma  col-xs-12 " style="border-radius: 30px;">
    <div class="personality">
        <h4 class="" style="font-weight: bold;" class="ahwal_style" >سعادة / مدير الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp حفظه  الله </h4>
        <h5 class="" style="font-weight: bold;" class="ahwal_style" >السلام عليكم ورحمة الله وبركاتة ، وبعد :  </h5>
        
            <div class="col-xs-12 no-padding">
                <h4 class=" justify fhelvetic">بناء على ما ورد لنا بشأن الاستفسار عن مصادر دخل ورثة المتوفى الموضح اسمه أعلاه ، وبعد الرجوع لسجلات المتقاعدين نفيدكم بأنه : </h4>
             
        
                <ul class="list-unstyled">
                    <li class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            خاضع لنظام التقاعد ، ويصرف للورثة وعددهم (&nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp   &nbsp  &nbsp  &nbsp  ) راتب شهري وقدره ( &nbsp  &nbsp &nbsp  &nbsp &nbsp  &nbsp  &nbsp  &nbsp &nbsp  &nbsp  &nbsp  &nbsp   ) ريال.   .
                        </label>
                    </li>
                    <li class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            غير مسجل بمؤسسة التقاعد  .
                        </label>
                    </li>
                </ul>
                <br />
                <div class="col-xs-2 col-xs-offset-10">
                <label> الختم </label>
                
                </div>
            
           </div>
    </div>
</div>

                            <div class="special col-xs-12 ">
                               

                                <div class="col-xs-3 text-center">
                                    
                                </div>
                                <div class="col-xs-1 text-center">

                                </div>
                                <div class="col-xs-8 text-center">
                                <br>
                                    <h6  class="ahwal_signs ">تقبلوا بالغ تحياتنا ،،، </h6>
                                    <label class="ahwal_signs ">مدير مكتب المؤسسة العامة للتقاعد ببريدة </label><br>
                                    <p></p><br>
                                </div>
                                

                            </div>
    </div>
                            <?php }elseif ($letter_type ==2){ ?>

<div class="col-xs-10 col-xs-offset-1">
<h4 class="justify_another fhelvetic">تقدمت لنا الموضحة بياناتها أعلاه وذلك للإستفادة من خدمات الجمعية ، وحيث أنه من الضرورى معرفة مصادر الدخل المختلفة للأسرة ، لذا نأمل منكم التكرم بالإفادة عن البيانات  المسجلة لديكم عن طريق تعبئة الخانات المدونة أسفل الصفحة . </h4>


</div>
<div class="clearfix"></div>

</div>
</div>

<div class="special col-xs-12 ">



<div class="col-xs-5 text-center">

<h6 class="text-center">ولكم منا جزيل الشكر والامتنان ،،، <br> 
والسلام عليكم ورحمة الله وبركاته ،،،</h6>

</div>
   <div class="col-xs-2 text-center">
 
</div>
<div class="col-xs-5 text-center ">

    <label class="ahwal_signs">مدير عام الجمعية </label><br><br>
    <h6 class="ahwal_signs">سلطان بن محمد الجاسر</h6>
</div>


</div>
</div>
<div class="print_forma  col-xs-12 " style="border-radius: 30px;">
<div class="personality">
    <h4 style="font-weight: bold;" class="ahwal_style">سعادة / مدير الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp  &nbsp سلمه الله </h4>
    <h5 style="font-weight: bold;" class="ahwal_style">السلام عليكم ورحمة الله وبركاتة ، وبعد :  </h5>

    <div class="col-xs-12 no-padding">
        <h4  class="fhelvetic"> بناء علي ما ورد لنا بشأن الإستفسار عن مصادر الدخل   للموضح إسمها أعلاه وبعد الرجوع لسجلات التأمينات نفيدكم بأنها : </h4>
     

        <ul class="list-unstyled">
            <li class="checkbox">
                <label>
                    <input style="font-size: 14px !important; font-weight: bold !important;" type="checkbox" value="">
                    لم يسبق لها التسجيل فى النظام .
                </label>
            </li>
            <li class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    مسجلة فى النظام وحتى تاريخه لم يصرف لها .
                </label>
            </li>
            <li class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    مسجلة فى النظام ولا يستحق لها الصرف حتى تاريخه .
                </label>
            </li>
            <li class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    سبق وصرف لها مبلغ دفعة واحدة وقدره 
                    (&nbsp &nbsp &nbsp &nbsp  &nbsp 
                      &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp  ) بتاريخ 
                      (&nbsp &nbsp &nbsp  &nbsp  &nbsp 
                      &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp 
                      &nbsp &nbsp &nbsp  &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp 
                       )
                </label>
            </li>
            <li class="checkbox">
                <label>
                    <input type="checkbox" value="">
                    مسجله في النظام ويصرف لها راتب شهري وقدره  (&nbsp &nbsp &nbsp &nbsp  &nbsp 
                    &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp
                     )
                </label>
            </li>


        </ul>
       

    </div>
</div>



                                    </div>
                                                <div class="special col-xs-12 ">


                                                 
<br />
                                                    <div class="col-xs-3 text-center">
                                                        <label  style="font-size: 18px !important;" > الختم </label>
                                                    </div>
                                                    <div class="col-xs-1 text-center">

                                                    </div>
                                                    <div class="col-xs-8 text-center">
                                                        <h5 class="text-center">تقبلوا بالغ تحياتنا ،،، <br></h5>
                                                        <label style="font-size: 18px !important;" >مدير مكتب المؤسسة العامة للتأمينات الإجتماعية بالقصيم </label><br>
                                                        <p></p><br>
                                                    </div>
                                                    <br><br>

                                                </div>
                                </div>
 <?php }elseif ($letter_type ==5){ ?>
                                <div class="col-xs-10 col-xs-offset-1">
 <!--
 <h4 class="justify_another fhelvetic">تقدم لنا الموضح بياناته أعلاه وذلك للإستفادة من خدمات الجمعية ، وحيث أنه من الضرورى معرفة مصادر الدخل المختلفة للأسرة ، لذا نأمل منكم التكرم بالإفادة عن البيانات  المسجلة لديكم عن طريق تعبئة الخانات المدونة أسفل الصفحة .
  </h4>
-->
<h4 class="justify_another fhelvetic">تقدمت لنا ورثة الموضحة بياناته أعلاه وذلك للإستفادة من خدمات الجمعية ، وحيث أنه
    من الضرورى معرفة مصادر الدخل المختلفة للأسرة ، لذا نأمل منكم التكرم بالإفادة عن بيانات المتوفي المسجلة لديكم عن
    طريق تعبئة الخانات المدونة أسفل الصفحة . </h4>


  
  


                                </div>
                                <div class="clearfix"></div>

                                </div>
                                </div>

                                <div class="special col-xs-12 ">



                                    <div class="col-xs-5 text-center">

                                        <h6 class="text-center">ولكم منا جزيل الشكر والامتنان ،،، <br>
                                            والسلام عليكم ورحمة الله وبركاته ،،،</h6>

                                    </div>
                                    <div class="col-xs-2 text-center">

                                    </div>
                                    <div class="col-xs-5 text-center ">

                                        <label class="ahwal_signs">مدير عام الجمعية </label><br><br>
                                        <h6 class="ahwal_signs">سلطان بن محمد الجاسر</h6>
                                    </div>


                                </div>
                                </div>
                                <div class="print_forma  col-xs-12 " style="border-radius: 30px;">
                                    <div class="personality">
                                        <h4 style="font-weight: bold;" class="ahwal_style">سعادة / مدير الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp  &nbsp سلمه الله </h4>
                                        <h5 style="font-weight: bold;" class="ahwal_style">السلام عليكم ورحمة الله وبركاتة ، وبعد :  </h5>

                                        <div class="col-xs-12 no-padding">
  <!--<h4  class="fhelvetic"> بناء علي ما ورد لنا بشأن الإستفسار عن مصادر الدخل   للموضح اسمه أعلاه وبعد الرجوع لسجلات التأمينات نفيدكم بأنه : </h4>
-->
<h4 class="fhelvetic"> بناء علي ما ورد لنا بشأن الإستفسار عن مصادر دخل ورثة المتوفي الموضح اسمه أعلاه وبعد الرجوع
    لسجلات التأمينات نفيدكم بأنه : </h4>


                                            <ul class="list-unstyled">
                                                <li class="checkbox">
                                                    <label>
                                                        <input style="font-size: 14px !important; font-weight: bold !important;" type="checkbox" value="">
                                                        لم يسبق له التسجيل فى النظام .
                                                    </label>
                                                </li>
                                                <li class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="">
                                                        مسجل  فى النظام وحتى تاريخه لم يصرف له .
                                                    </label>
                                                </li>
                                                <li class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="">
                                                        مسجل فى النظام ولا يستحق له الصرف حتى تاريخه .
                                                    </label>
                                                </li>
                                                <li class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="">
                                                        سبق وصرف له مبلغ دفعة واحدة وقدره
                                                        (&nbsp &nbsp &nbsp &nbsp  &nbsp
                                                        &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp  ) بتاريخ
                                                        (&nbsp &nbsp &nbsp  &nbsp  &nbsp
                                                        &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp
                                                        &nbsp &nbsp &nbsp  &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp  &nbsp
                                                        )
                                                    </label>
                                                </li>
                                                <li class="checkbox">
                                                    <!--<label>
                                                        <input type="checkbox" value="">
                                                        مسجل في النظام ويصرف له راتب شهري وقدره  (&nbsp &nbsp &nbsp &nbsp  &nbsp
                                                        &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp
                                                        )
                                                    </label>-->
<label>
    <input type="checkbox" value="">
    مسجل في النظام ويصرف للمستفيدين مبلغ وقدره (&nbsp &nbsp &nbsp &nbsp &nbsp
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp )
    لعدد (&nbsp &nbsp &nbsp &nbsp &nbsp
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp )
    
</label>                                       
                                                </li>


                                            </ul>


                                        </div>
                                    </div>



                                </div>
                                <div class="special col-xs-12 ">



                                    <br />
                                    <div class="col-xs-3 text-center">
                                        <label  style="font-size: 18px !important;" > الختم </label>
                                    </div>
                                    <div class="col-xs-1 text-center">

                                    </div>
                                    <div class="col-xs-8 text-center">
                                        <h5 class="text-center">تقبلوا بالغ تحياتنا ،،، <br></h5>
                                        <label style="font-size: 18px !important;" >مدير مكتب المؤسسة العامة للتأمينات الإجتماعية بالقصيم </label><br>
                                        <p></p><br>
                                    </div>
                                    <br><br>

                                </div>
                                </div>
                            
                            <?php }elseif ($letter_type ==4){ ?>

<h4 class="fhelvetic justify_another">تقدم لنا الموضحة بياناته أعلاه وذلك للاستفادة من خدمات الجمعية، وحيث أنه من الضروري معرفة دخل الأسرة،لذا نأمل منكم التكرم بالإفادة من بياناته المسجلة لديكم عن طريق تعبئة الخانات المدونة أسفل الصفحة . </h4>
        </div>
        </div>

                                <div class="special col-xs-12 ">
                                    <br>

                                    <div class="col-xs-4 text-center">
                                    <h6 class="text-center">ولكم منا جزيل الشكر والامتنان ،،،</h6>
                                    
                                    </div>
                                    <div class="col-xs-1 text-center">

                                    </div>
                                    <div class="col-xs-7 text-center ahwal_signs">

                                        <label style="font-size: 20px !important;" class="ahwal_signs">مدير عام الجمعية </label><br>
                                        <h5 style="font-size: 20px !important;" class="ahwal_signs" >سلطان بن محمد الجاسر</h5>
                                    </div>
                                   

                                </div>
                                </div>
                                </div>
<div class="print_forma no-border col-xs-12 no-padding ">
    <div class="personality">
        <div class="col-xs-10 col-xs-offset-1">
            <h4 style="font-weight: bold;" class="ahwal_style">سعادة / مدير الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء &nbsp  &nbsp  &nbsp   &nbsp  &nbsp  &nbsp  سلمه الله </h4>
            <h5 style="font-weight: bold;" class="ahwal_style">السلام عليكم ورحمة الله وبركاتة ، وبعد :  </h5>
        </div>
        <div class="col-xs-12 no-padding">
            <h4 style="line-height: 20px !important;" class=" fhelvetic">بناء على ما ورد لنا بشأن الاستفسار عن مصادر دخل الموضح اسمها أعلاه ، وبعد الرجوع لسجلات المستفيدين نفيدكم بالبيانات التالية : </h4>
           

            <table style="margin-bottom: 0 !important;" class="table table-bordered table-ghas final_table">
                <thead>
                <tr>
                    <th class="final_table_back_color">م</th>
                    <th class="final_table_back_color">نوع الدعم</th>
                    <th class="final_table_back_color">المبلغ</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="final_table_back_color">1</td>
                    <td> بدل غلاء معيشة </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="final_table_back_color">2</td>
                    <td> دعم الغذاء </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="final_table_back_color">3</td>
                    <td>دعم الكهرباء </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="final_table_back_color">4</td>
                    <td>معاش الضمان لعدد (    &nbsp  &nbsp   &nbsp  &nbsp &nbsp  &nbsp   ) أفراد شامل الاسم أعلاه </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" class="final_table_back_color">المجموع</td>
                    
                    <td></td>
                </tr>
                </tbody>
            </table>



        



        </div>
    </div>

    <div class="special col-xs-12 ">
<br />

        <div class="col-xs-4 text-center">
            <label> الختم </label>
        </div>
        <div class="col-xs-2 text-center">
   
        </div>
        <div class="col-xs-6 text-center">
 <h6 style="font-size: 18px !important;"  class="text-center">ولكم من بالغ تحياتنا ،،،   </h6>
            <label style="font-size: 18px !important;"  >مدير الضمان الاجتماعي بمدينة بريدة </label><br>

        </div>
        <br><br>

    </div>

</div>
                                </div>
                            <?php } ?>





            </div>
        </section>


    </div>


    <!--
    <script >
        var divElements = document . getElementById("printdiv") . innerHTML;
        var oldPage = document . body . innerHTML;
        document . body . innerHTML =
            "<html><head><title></title></head><body><div id='printdiv'>" +
            divElements + "</div></body>";
        window .print();
        setTimeout(function () {
            window.location.href ="<?php echo base_url();?>family_controllers/Family_letter/<?php echo $func;?>/<?php echo $this->uri->segment(4);?>/<?php echo $letter_type;?> ";
        }, 1000);
    </script >


-->