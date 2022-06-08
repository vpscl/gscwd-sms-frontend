<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Service Slip</title>
  
  <style>
     * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  width: auto;
  height: auto;
  font-family: Arial, Helvetica, sans-serif;
}

body {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}


.canvas {
  display: flex;
  flex-direction: column;
  align-items: center;
  position: relative;
  width: 815px;
  height: 624px;
  padding: 0 20px;
}

.iso {
  position: absolute;
  top: 25px;
  right: 30px;
  font-size: 12px;
}

.header {
  width: 100%;
  padding: 25px 40px 20px;
  display: flex;
  justify-content: center;
  position: relative;
}
.header img {
  width: 90px;
  height: 90px;
  position: absolute;
  left: 150px;
  top: 15px;
}
.header div {
  font-size: 12px;
  text-align: center;
}

.title {
  font-size: 14px;
  font-weight: bold;
  margin-bottom: 5px;
}

table {
  font-size: 12px;
  width: 100%;
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

td, th {
  height: 5px;
  padding: 7px 5px;
}

th {
  text-align: left;
}

.th-center {
  text-align: center;
}

.td-category {
  display: flex;
  gap: 30px;
}



.checkboxes {
  margin-top: 5px;
  font-size: 10.5px;
  display: grid;
}
.checkboxes-col3 {
  grid-template-columns: repeat(3, 1fr);
}
.checkboxes-col2 {
  grid-template-columns: repeat(2, 1fr);
}
.checkboxes-col1 {
  grid-template-columns: 1fr;
}

.check {
  display: flex;
  align-items: center;
  line-height: 11px;
  gap: 3px;
  margin-bottom: 3px;
  
}

.btns{
  position: absolute;
  bottom: 50px;
}

input[type=checkbox] + label {
  margin: 5px 0;
}

input[type=checkbox] {
  display: none;
}

input[type=checkbox] + label:before {
  content: "\2714";
  border: 1px solid #0d41e1;
  border-radius: 0.2em;
  display: inline-block;
  width: 1.25em;
  height: 1.25em;
  margin-right: 0.5em;
  padding-left: .15em;
  vertical-align: center;
  color: transparent;
}

input[type=checkbox]:checked + label:before {
  background: #0d41e1;
  border-color: #0d41e1;
  color: #fff;
}

input[type=checkbox]:checked + label {
color: #0d41e1;
font-weight: 700;
}

input[type=checkbox]:disabled + label:before {
  border-color: #aaa;
}

input[type=checkbox]:checked:disabled + label:before {
  background: #0d41e1;
  border-color:#0d41e1;
  color: white;
}

@page {
  size: auto 6.5in;
  margin: 0;
}

@media print{
  .noprint,
.noprint * {
    display: none !important;
  }

  table{
    min-width: 875px;
  }

  .canvas{
  padding: 20px 20px 0;
  }

  .iso{
    top: 45px;
    right: -25px;
  }

  .td-category {
  gap: 40px;
}

input[type=checkbox]:checked:disabled + label:before {
  color: #0d41e1;
  background-color: #0d41e1;
}

}


  </style>
   </head>
<body>


   <div class="canvas">

      <div class="iso">
         ICT-006-1
      </div>

   <div class="header">
      <img src="assets/images/logo.png" alt="" />
      <div>
        Republic of the Philippines
        <br />
        <span style="font-weight: bold; color: rgb(63, 114, 209);">GENERAL SANTOS CITY WATER DISTRICT</span>
        <br />
        E. Fernandez St., Lagao, General Santos City
        <br />
        Telephone No.: 552-3824; Telefax No.: 553-4960
        <br />
        Email Address: gscwaterdistrict@yahoo.com
      </div>
    </div>

    <div class="title">
       SERVICE SLIP
    </div>
    
<table align="center" >
<tr>
    <th style="width: 150px;">End-User</th>
    <td colspan="2" id="end_user" style="width: 170px;"></td>
    <th rowspan="2" style="width: 150px;">Service Slip no.</th>
    <td rowspan="2" colspan="2" id="slip_no" style="width: 170px;"></td>
</tr>


<tr>
    <th>Office</th>
    <td colspan="2" id="office"></td>
  </tr>

<tr>
    <th>Department</th>
    <td colspan="2" id="department"></td>
    <th>Date Requested</th>
    <td colspan="2" id="date_requested"></td>
</tr>

<tr>
    <th>Division</th>
    <td colspan="2" id="division"></td>
    <th>Date Accomplished</th>
    <td colspan="2" id="date_ended"></td>
    
</tr>

<tr>
    <th>Category</th>
    <td colspan="2" id="category"></td>
    <th>Type of Support</th>
    <td colspan="2" id="category_type"></td>

</tr>




<tr>
    <th colspan="3" class="th-center" >DETAILS</th>
    <th colspan="3" class="th-center" >ASSESSMENT/ACTION TAKEN/REMARKS</th>
</tr>

<tr>
    <td colspan="3" class="th-center" style="height:80px;" id="details"></td>
    <td colspan="3" class="th-center" id="remarks"></td>
</tr>

<tr>
    <td colspan="6">
<div class="td-category">
    <div class="td-category-col">
       <span id="Hardware">HARDWARE</span>
        <div class="checkboxes checkboxes-col3" style="width: 340px;">
        <div class="check">
            <input type="checkbox" id="Internet" name="" value="">
            <label for="Internet">Internet</label>
        </div>
      <div class="check">
        <input type="checkbox" id="IP_Phone" name="" value="">
        <label for="IP_Phone">IP Phone</label>
      </div>
      <div class="check">
        <input type="checkbox" id="Face_Scanner" name="" value="">
        <label for="Face_Scanner">Face Scanner</label>
      </div>
      <div class="check">
        <input type="checkbox" id="Printer" name="" value="">
        <label for="Printer">Printer</label>
      </div>
     <div class="check">
        <input type="checkbox" id="Microsoft_Office" name="" value="">
        <label for="Microsoft_Office">Microsoft Office</label>
     </div>
     <div class="check">
        <input type="checkbox" id="System_Unit" name="" value="">
        <label for="System_Unit">System Unit</label>
     </div>
     <div class="check">
        <input type="checkbox" id="Monitor" name="" value="">
        <label for="Monitor">Monitor</label>
     </div>
     <div class="check">
        <input type="checkbox" id="Antivirus" name="" value="">
        <label for="Antivirus">Antivirus</label>
     </div>
     <div class="check">
        <input type="checkbox" id="Operating_System" name="" value="">
        <label for="Operating_System">Operating System</label>
     </div>
     <div class="check">
        <input type="checkbox" id="UPS" name="" value="">
        <label for="UPS">UPS</label>
     </div>
     <div class="check">
        <input type="checkbox" id="Shared_Folder" name="" value="">
        <label for="Shared_Folder">Shared Folder</label>
     </div>
     <div class="check">
        <input type="checkbox" id="Power_Connection" name="" value="">
        <label for="Power_Connection">Power Connection</label>
     </div>
     <div class="check">
        <input type="checkbox" id="Charger" name="" value="">
        <label for="Charger">Charger</label>
     </div>
     <div class="check">
        <input type="checkbox" id="App_Installation" name="" value="">
        <label for="App_Installation">App. Installation</label>
     </div>
     <div class="check">
        <input type="checkbox" id="File_Server" name="" value="" >
        <label for="File_Server">File Server</label>
     </div>

     

    </div>
    </div>


    <div class="td-category-col">
    <span id="software">SOFTWARE</span>
        <div class="checkboxes checkboxes-col2" style="width: 200px;">
        <div class="check">
            <input type="checkbox" id="TCMS" name="" value="">
            <label for="TCMS">TCMS</label>
        </div>
      <div class="check">
        <input type="checkbox" id="TUBS" name="" value="">
        <label for="TUBS">TUBS</label>
      </div>
      <div class="check">
        <input type="checkbox" id="TWMS" name="" value="">
        <label for="TWMS">TWMS</label>
      </div>
     <div class="check">
        <input type="checkbox" id="HRIS" name="" value="">
        <label for="HRIS">HRIS</label>
     </div>
     <div class="check">
        <input type="checkbox" id="SRMS" name="" value="">
        <label for="SRMS">SRMS</label>
     </div>
     <div class="check">
        <input type="checkbox" id="BAMS" name="" value="">
        <label for="BAMS">BAMS</label>
     </div>
     <div class="check">
        <input type="checkbox" id="MRBS" name="" value="">
        <label for="MRBS">MRBS</label>
     </div>
     <div class="check">
      <input type="checkbox" id="Queuing" name="" value="">
      <label for="Queuing">Queuing</label>
   </div>
     <div class="check">
        <input type="checkbox" id="eTTMS" name="" value="">
        <label for="eTTMS">eTTMS</label>
     </div>
     <div class="check">
      <input type="checkbox" id="APES" name="" value="">
      <label for="APES">APES</label>
   </div>
     
    </div>
    </div>

    <div class="td-category-col">
    <span id="others">OTHERS</span>
      <div class="checkboxes checkboxes-col1">
      
   <div class="check">
      <input type="checkbox" id="it_eq" name="" value="">
      <label for="it_eq">Requisition of IT Equipment</label>
    </div>
   <div class="check">
      <input type="checkbox" id="jl" name="" value="">
      <label for="jl">Justification Letter</label>
   </div>

   
  </div>
  </div>
</div>
    </td>
</tr>

<tr>
    <th class="th-center" colspan="2">Conformed by</th>
    <th colspan="2" class="th-center">Accomplished by</th>
    <th colspan="2" class="th-center">Checked by</th>
</tr>

<tr>
    <td  colspan="2" style="height: 50px;"></td>
    <td colspan="2"></td>
    <td colspan="2"></td>
</tr>
</table>
</div>

<div class="btns">
<?php  $id = $_GET['id']; ?>
<button class="btn btn-sm btn-primary noprint" id="print-btn" onclick="printPage()">Print</button>
<a class="text-white noprint" href="<?php echo $local ?>/viewticket?id=<?php echo $id ?>"><button class="btn btn-sm btn-secondary" id="back-btn" type="button">Back</button></a>
</div>
<script>
    $(document).ready(function() {
                $.ajax({
                    method: "GET",
                    url: "<?php echo $domain ?>/view" + "/" + "<?php echo $id ?>",
                    success: function(response) {
                        // console.log(response)
                        if (!response['error']) {

                            document.getElementById("slip_no").innerHTML = "MIS-" + response['id'];
                            document.getElementById("end_user").innerHTML = response['end_user'];
                            document.getElementById("office").innerHTML = response['office'];
                            document.getElementById("department").innerHTML = response['department'];
                            document.getElementById("division").innerHTML = response['division'];
                            document.getElementById("category").innerHTML = response['category'];
                            const d = new Date(response['date_requested']);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                    const date_req= months[month]+" "+day+", "+year;
                            document.getElementById("date_requested").innerHTML = date_req;
                            document.getElementById("category_type").innerHTML = response['category_type'];
                            const e = new Date(response['date_ended']);
                                    const months2 = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month2 = e.getMonth();
                                    const day2 = e.getDate();
                                    const year2 = e.getFullYear();
                                    const date_end = months2[month2]+" "+day2+", "+year2;
                            document.getElementById("date_ended").innerHTML = date_end;
                            // document.getElementById(response['sub_category']).innerHTML = "sds";
                            document.getElementById("details").innerHTML = response['details'];
                            document.getElementById("remarks").innerHTML = response['remarks'];
                            if(response['sub_category'] == "IP phone"){
                              var sub = "#IP_Phone";
                            }else if(response['sub_category'] == "Microsoft Office"){
                              var sub = "#Microsoft_Office";
                            }else if(response['sub_category'] == "Shared Folder"){
                              var sub = "#Shared_Folder";
                            }else if(response['sub_category'] == "Application Installation"){
                              var sub = "#App_Installation";
                            }else if(response['sub_category'] == "Face Scanner"){
                              var sub = "#Face_Scanner";
                            }else if(response['sub_category'] == "System unit"){
                              var sub = "#System_Unit";
                            }else if(response['sub_category'] == "Operation System"){
                              var sub = "#Operation_System";
                            }else if(response['sub_category'] == "Power Connection"){
                              var sub = "#Power_Connection";
                            }else if(response['sub_category'] == "File Server"){
                              var sub = "#File_Server";
                            }else if(response['sub_category'] == "Requisition of IT Equipment"){
                              var sub = "#it_eq";
                            }else if(response['sub_category'] == "Justification Letter "){
                              var sub = "#jl";
                            }else{
                              var sub = "#"+response['sub_category'];
                            }
                            $(sub).prop("checked", true);
                            $("input[type=checkbox]").prop("disabled", true);
                            
                            // document.getElementById("slip_status").value = response['slip_status'];

                        } else if (response['error']) {
                            console.log(response['error']);
                        }

                    },
                    error: function(error) {
                        console.log(error)

                    }
                })
              })    
</script>
</body>
</html>
