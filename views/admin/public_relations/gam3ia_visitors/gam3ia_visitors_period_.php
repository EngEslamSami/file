<div class="col-xs-12  ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?=$title?></h3>
        </div>
        <div class="panel-body">
                 <div class="col-sm-12">

                       <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half">من تاريخ </label>
                          <input type="date" class="form-control  half input-style " id="from_date" name="from_date"  />

                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label label-green  half">إلي تاريخ </label>
                          <input type="date" class="form-control  half input-style " id="to_date" name="to_date"  />

                        </div>
                     <div class="col-sm-4 ">
                         <input type="button" value="ابحث" onclick="get_details()" class="btn btn-primary search center-block " />
                     </div>


                </div>

            <br/> <br/>

            <div id="area"></div>
        </div>
    </div>
 </div>
<script>

    function get_details() {
        var date_to = $('#to_date').val();
        var date_from = $('#from_date').val();
        if( date_to != '' && date_from != '') {




            var dataString = 'to_date='+date_to+'&from_date='+date_from;
            alert(dataString);
            return;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Public_relation/reportEmpGam3iaVisitors,
                data: dataString,
                cache:false,
                success: function (html) {

                    $('#area').html(html);
                }
            });





        }

    }


</script>

        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
<script type="text/javascript">
    function osama() {
        alert('dd');
    }
    function search(){

 alert('ddd');
         var to_date =$('#to_date').val();
         var from_date =$('#from_date').val();

         if( to_date != '' && from_date != ''){

         var dataString = 'to_date='+to_date+'&from_date='+from_date;
         $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Public_relation/reportEmpGam3iaVisitors,
                data: dataString,

                cache:false,
                success: function (html) {

            $('#area').html(html);
                }
            });

            }else{
              $('#area').html('');
              alert('تأكد من جميع التواريخ ');
            }
        }
        </script>
  