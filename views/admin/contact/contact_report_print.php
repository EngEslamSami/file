<body onload="printDiv('printDiv')" id="printDiv">
<?php foreach($result as $record){?>
    <div class="row">
<table class="table table-striped table-hover">
    <tbody>
    <tr>
        <td colspan="2">
			<p style="font-weight:bold;">
                رساله رقم  
			</p>
			<p style="font-weight: bold;font-size: 30px;">
				  <?php  
                if(isset( $record->id)&&!empty($record->id))
                {
               echo $record->id; }?>
			</p>			
			<p>
البريد الالكتروني
                <a href="mailto:E-Services@rdcci.org.sa">
				    <label style="color:#0072c6; font-weight:bold;">
                    <?php
                    if(isset( $record->email)&&!empty($record->email))
                {
              
                 echo $record->email;
                
                }?>
                    </label>
			    </a>
			</p>			
        </td>
    </tr>
    <tr>
        <td>
            <label style="font-weight:bold;">الاسم
            
            </label>
        </td>
        <td>
            <label style="font-weight:bold;">
            <?php
                    if(isset( $record->name)&&!empty($record->name))
                {
           
                 echo $record->name;
              
                
                }?>
            </label>
        </td>
    </tr>
    
    <tr>
        <td>
            <label style="font-weight:bold;">هاتف
            
            </label>
        </td>
        <td>
            <label style="font-weight:bold;">
            <?php
                    if(isset( $record->phone)&&!empty($record->phone))
                {
           
                 echo $record->phone;
              
                
                }?>
            </label>
        </td>
    </tr>
    
    <tr>
        <td>
            <label style="font-weight:bold;">العنوان</label>
        </td>
        <td>
            <label style="font-weight:bold;">
            <?php  
                if(isset( $record->address)&&!empty($record->address))
                {
               echo $record->address; }?>
            
            
            </label>
        </td>
    </tr>
    
	<tr>
		<td colspan="2" style="font-weight: bold;padding: 36px;background-color: lightgray;"><span style="color:red;">الرساله  :</span> 
		  <?php  
                if(isset( $record->message)&&!empty($record->message))
                {
               echo $record->message; }?>
		</td>
	</tr>
</tbody>
</table>
</div>
                <?php }?>
             
</body>
<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();
     //   window.close();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script> 