


<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<!--<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/custom.js"></script>-->
<script>
    $(".modal-startup").modal('show');

</script>
<!-- datatables-->
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/dataTables.colReorder.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/plugin.js"></script>


<!-- ChartJs JavaScript -->
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
<!-- End Page Lavel Plugins
=====================================================================-->
<script type="text/javascript">
    $(document).ready(function () {
        function chartlist() {
            "use strict"; // Start of use strict
            //bar chart
            var ctx = document.getElementById("barChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
                    datasets: [
                        {
                            label: "إجمالى المساعدات بالريال السعودى",
                            data: [<?php echo $orders[0];?>, <?php echo $orders[1];?>, <?php echo $orders[2];?>, <?php echo $orders[3];?>, <?php echo $orders[4];?>, <?php echo $orders[5];?>, <?php echo $orders[6];?>, <?php echo $orders[7];?>, <?php echo $orders[8];?>, <?php echo $orders[9];?>, <?php echo $orders[10];?>, <?php echo $orders[11];?>],
                            borderColor: "rgba(124, 177, 0, 0.76)",
                            borderWidth: "0",
                            //backgroundColor: "rgba(99, 142, 0, 0.76)"
                            backgroundColor: ["rgb(149, 206, 255)", "rgba(99, 142, 0, 0.76)", "rgb(67, 67, 72)", "rgb(247, 163, 92)", "rgb(128, 133, 233)", "rgb(241, 92, 128)", "rgb(228, 211, 84)", "rgb(43, 144, 143)", "rgb(244, 91, 91)", "rgb(145, 232, 225)", "rgb(124, 181, 236)", "rgb(67, 67, 72)"],
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });


            var ctx2 = document.getElementById("barChart-esalat");
            var myChart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
                    datasets: [
                        {
                            label: "إجمالى الإيصالات",
                            data: [574200, 541250, 547850, 554650, 572350, 572850, 579850, 827850, 747850, 327850, 657850, 117850],
                            borderColor: "rgba(124, 177, 0, 0.76)",
                            borderWidth: "0",
                            //backgroundColor: "rgba(99, 142, 0, 0.76)"
                            backgroundColor: ["rgb(149, 206, 255)", "rgba(99, 142, 0, 0.76)", "rgb(67, 67, 72)", "rgb(247, 163, 92)", "rgb(128, 133, 233)", "rgb(241, 92, 128)", "rgb(228, 211, 84)", "rgb(43, 144, 143)", "rgb(244, 91, 91)", "rgb(145, 232, 225)", "rgb(124, 181, 236)", "rgb(67, 67, 72)"],
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });


            var ctx3 = document.getElementById("barChart-income");
            var myChart3 = new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
                    datasets: [
                        {
                            label: "إجمالى الإيرادات ",
                            data: [14200, 25000, 63000, 410000, 52777, 105000, 827850, 117850, 327850, 542000, 574200, 554650],
                            borderColor: "rgba(124, 177, 0, 0.76)",
                            borderWidth: "0",
                            //backgroundColor: "rgba(99, 142, 0, 0.76)"
                            backgroundColor: "rgba(99, 142, 0, 0.76)",
                        },
                        {
                            label: "إجمالى المصروفات",
                            data: [574200, 541250, 547850, 554650, 572350, 572850, 579850, 827850, 747850, 327850, 657850, 117850],
                            borderColor: "#e72c2d",
                            borderWidth: "0",
                            //backgroundColor: "rgba(99, 142, 0, 0.76)"
                            backgroundColor: "rgb(244, 91, 91)",
                        }

                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });


        }

        chartlist();

    });
</script>


<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>

    /***************************************/


    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    /*
      var today = cal1.getDate();
 var dd = today.getDate();

 var mm = today.getMonth()+1;
 var yyyy = today.getFullYear();
 if(dd<10)
 {
     dd='0'+dd;
 }

 if(mm<10)
 {
     mm='0'+mm;
 }

 melady_date = dd+'/'+mm+'/'+yyyy;
  alert(melady_date);
 /***********************/




    <?php
    if(!isset($result) && empty($result))
    { ?>
    date1.setAttribute("value", cal1.getDate().getDateString());

    date2.setAttribute("value", cal2.getDate().getDateString());
    <?php }?>
    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    <?php
    if(!isset($result) && empty($result))
    { ?>
    setDateFields1();
    <?php }?>

    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal2.setTime(cal1.getTime());
        setDateFields1();
    };

    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal1.setTime(cal2.getTime());
        setDateFields1();
    };


    cal1.onHide = function () {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function () {
        cal2.show(); // prevent the widget from being closed
    };

    function setDateFields1() {
        date1.value = cal1.getDate().getDateString();
        date2.value = cal2.getDate().getDateString();
        <?php
        if(!isset($result) && empty($result))
        { ?>
        date1.setAttribute("value", cal1.getDate().getDateString());
        date2.setAttribute("value", cal2.getDate().getDateString());
        <?php }?>
    }

    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }

    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();


    }


</script>

<script>


    var calEnd1 = new Calendar(),
        calEnd2 = new Calendar(true, 0, true, true),
        dateEnd1 = document.getElementById('date-Miladi-end'),
        dateEnd2 = document.getElementById('date-Hijri-end'),
        calEnd1Mode = calEnd1.isHijriMode(),
        calEnd2Mode = calEnd2.isHijriMode();

    <?php
    if(!isset($result) && empty($result))
    { ?>
    dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
    dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());
    <?php }?>
    document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
    document.getElementById('cal-end-2').appendChild(calEnd2.getElement());


    calEnd1.show();
    calEnd2.show();
    <?php
    if(!isset($result) && empty($result))
    { ?>
    setDateFieldsEnd1();


    <?php }?>


    calEnd1.callback = function () {
        if (calEnd1Mode !== calEnd1.isHijriMode()) {
            calEnd2.disableCallback(true);
            calEnd2.changeDateMode();
            calEnd2.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd2.setTime(calEnd1.getTime());
        setDateFieldsEnd1();
    };

    calEnd2.callback = function () {
        if (calEnd2Mode !== calEnd2.isHijriMode()) {
            calEnd1.disableCallback(true);
            calEnd1.changeDateMode();
            calEnd1.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd1.setTime(calEnd2.getTime());
        setDateFieldsEnd1();
    };


    calEnd1.onHide = function () {
        calEnd1.show(); // prevent the widget from being closed
    };

    calEnd2.onHide = function () {
        calEnd2.show(); // prevent the widget from being closed
    };


    function setDateFieldsEnd1() {
        dateEnd1.value = calEnd1.getDate().getDateString();
        dateEnd2.value = calEnd2.getDate().getDateString();
        <?php
        if(!isset($result) && empty($result))
        { ?>
        dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
        dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());

        <?php }?>


        var birth_date = calEnd2.getDate().getDateString();
        var res = birth_date.split("/");
        var year_birth = res[2];

        var current_year = '<?php echo $current_hijry_year?>';
        var ageYear = parseFloat(current_year) - parseFloat(year_birth);
        // alert(ageYear);
        $('#age').val(ageYear + 'سنه');
    }


    function showCalEnd1() {
        if (calEnd1.isHidden())
            calEnd1.show();
        else
            calEnd1.hide();
    }

    function showCalEnd2() {

        if (calEnd2.isHidden())
            calEnd2.show();

        else
            calEnd2.hide();


    }


    //# sourceURL=pen.js

</script>


</body>
</html>
