<?php
echo '<div class="col-xs-12 table-responsive">
      <table id="example" class=" display table table-bordered table-striped table-hover">
        <thead>
        <tr class="info">
            <th class=" ">الإسم اليتيم</th>
            <th class=" ">النوع</th>
            <th class=" ">المرحلة الدراسية</th>
            <th class=" ">تاريخ الميلاد</th>
            <th class="">العمر</th>
         
        </tr>
        </thead>
        <tbody>';
        
$x = 0;
$y = $_POST['num'];
if(isset($_POST['before'])){
    $x = $_POST['num'];
    $y = $_POST['before'];
}
       // var_dump($x);echo'<br>'; var_dump($_POST['before']);
for( ; $x < $y ; $x++){
    
    echo '<tr>
           <td><input type="text" id="f_name'.$x.'" name="f_name'.$x.'" class="form-control  " required="required" /></td>
          <td>
               <select id="type'.$x.'" name="f_type'.$x.'" class="form-control" onchange="return education('.$x.');" required="required" >
               <option value="">--قم بالإختيار--</option>
               <option value="1">زوجة</option>
               <option value="2">إبن</option>
               <option value="3">إبنة</option>
               </select>
           </td>
           <td>
               <select id="education'.$x.'" name="f_education'.$x.'" class="form-control" required="required">
               <option value="">--قم بالإختيار--</option>
               <option value="1">دون سن الدراسة</option>
               <option value="2">رياض أطفال</option>
               <option value="3">إبتدائي</option>
               <option value="4">متوسط</option>
               <option value="5">ثانوي</option>
               <option value="6">جامعي</option>
               <option value="7">خريج</option>
               </select>
           </td>
            <td><input type="date" id="f_birth_date'.$x.'" name="f_birth_date'.$x.'" class="form-control  " required="required" onblur="_calculateAge('.$x.')" /></td>
           <td><input type="text" readonly id="age'.$x.'" name="age'.$x.'"/></td>
           
          </tr>';
    
}

echo ' </tbody>
      </table>
      </div>';
?>

<style>

input[type=date]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
}

input[type=date]::-webkit-calendar-picker-indicator {
    -webkit-appearance: none;
    display: none;
}

</style>

<script>

 function education(num1)
 {
    id= '#education' + num1;
    
    id2= '#type' + num1;
    
    if($(id2).val() == 1)
    {
        $(id).attr("disabled", true);
        return false;
    } 
    else
    {
        $(id).attr("disabled", false);
        return false;
    }  
    
 }

</script>
<script>
function _calculateAge(x) { 
    /*var today = new Date();
    var birthDate = new Date($('#birth_date').val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
    {
        age--;
    }
    $('#age').val(age);*/
    if($('#f_birth_date'+x).val()){
     var now = new Date();
  var today = new Date(now.getYear(),now.getMonth(),now.getDate());
  var yearNow = now.getYear();
  var monthNow = now.getMonth();
  var dateNow = now.getDate();
  var dateString = $('#f_birth_date'+x).val(); 
  var dob = new Date(dateString.substring(0,4),
                     dateString.substring(5,7)-1,
                     dateString.substring(8,10)          
                     );
  var yearDob = dob.getYear();
  var monthDob = dob.getMonth();
  var dateDob = dob.getDate();
  var age = {};
  var ageString = "";
  var yearString = "";
  var monthString = "";
  var dayString = "";
  yearAge = yearNow - yearDob;
  if (monthNow >= monthDob)
    var monthAge = monthNow - monthDob;
  else {
    yearAge--;
    var monthAge = 12 + monthNow -monthDob;
  }
  if (dateNow >= dateDob)
    var dateAge = dateNow - dateDob;
  else {
    monthAge--;
    var dateAge = 31 + dateNow - dateDob;
    if (monthAge < 0) {
      monthAge = 11;
      yearAge--;
    }
  }
  age = {
      years: yearAge,
      months: monthAge,
      days: dateAge
      };
  if ( age.years > 1 ) yearString = " سنة";
  else yearString = " سنة";
  if ( age.months> 1 ) monthString = " شهر";
  else monthString = " شهر";
  if ( age.days > 1 ) dayString = " يوم";
  else dayString = " يوم";
  if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.years;
  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
    ageString = "فقط " + age.days + dayString ;
  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
    ageString = age.years ;
  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.years ;
  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.years ;
  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
    ageString = age.years;
  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.years  ;
  else alert("تنبيه، لا يمكن حساب تاريخ الميلاد .. برجاء كتابته صحيحاً.");
  $('#age'+x).val(ageString);
 }
 }
</script>