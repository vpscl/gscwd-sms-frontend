<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="assets/images/north-logo.ico"
      type="image/x-icon"
    />

    <title></title>
  
<style>
.dataTables_wrapper .dataTables_filter {
float: right;
text-align: right;
visibility: hidden;
}

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");
/* COLORS */
html {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

input,
button,
textarea,
select {
  font: inherit;
}

/* SCROLL BAR */
::-webkit-scrollbar {
  width: 0.4375rem;
  height: 0.4375rem;
}

/* Track */
::-webkit-scrollbar-track {
  background: transparent;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: rgb(175, 175, 175);
  border-radius: 0.625rem;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: rgb(125, 125, 125);
}

/*  INPUT  */
::-webkit-input-placeholder {
  color: #9fa3b1;
  letter-spacing: 0.03ch;
}

.margin-0 {
  margin: 0 !important;
}

hr {
  border: solid black;
  border-width: 1px 0 0;
  clear: both;
  height: 0;
  width: 100%;
}

.row2 {
  display: flex;
  width: 100%;
  margin-top: 0.4375rem;
}
.row--space-between {
  justify-content: space-between;
}
.row--space-around {
  justify-content: space-around;
}
.row--end {
  justify-content: flex-end;
}
.row--center {
  justify-content: center;
}
.row--align-start {
  align-items: flex-start;
}
.row--align-center {
  align-items: center;
}

.column {
  display: flex;
  flex-direction: column;
  margin-top: 0.625rem;
}
.column--flex-center-all {
  justify-content: center;
  align-items: center;
}
.column--100 {
  width: 100%;
}
.column--px-50 {
  padding: 0 3.125rem;
}
.column--start {
  align-self: flex-start;
}
.column > div {
  margin-bottom: 0.5rem;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  margin: 0;
  line-height: 1.1;
  color: #222;
}

p {
  color: #222;
}

a,
a:visited,
a:active {
  text-decoration: none;
}

a {
  color: #222;
  cursor: pointer;
}

ul {
  list-style: none;
  color: #222;
}

li {
  color: #222;
}

i {
  font-style: normal;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  width: auto;
  height: auto;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 0.875rem;
}

body {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  /* background: #f1f2ee; */
  background: url(" assets/images/bg.png") repeat fixed;
  position: relative;
}

.summary__canvas {
  display: flex;
  justify-content: center;
  position: absolute;
  top: 0;
  width: 815px;
  min-height: 1000px;
  padding-bottom: 3.125rem;
  background: white;
}
.summary__canvas p {
  align-self: flex-start;
  margin-top: 0.9375rem;
  margin-bottom: 0.5rem;
}
.summary__header {
  width: 100%;
  padding: 1.875rem 3.125rem 3.125rem;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 1.875rem;
  position: absolute;
}
.summary__header .logo {
  width: 5.625rem;
  height: 5.625rem;
  left: 12.5rem;
  top: 2.1875rem;
}
.summary__header .socopab {
  height: 4.375rem;
  right: 10.625rem;
  top: 2.1875rem;
}
.summary__header div {
  font-size: 12px;
  text-align: center;
}
.summary__content {
  width: 100%;
  padding: 8.4375rem 3.125rem 3.125rem;
  display: flex;
  align-items: center;
  flex-direction: column;
}
.summary__title {
  font-size: 1.125rem;
  text-transform: uppercase;
  font-weight: 700;
  text-align: center;
  margin-bottom: 0.625rem;
}
.summary__support-type, .summary__date {
  font-size: 0.875rem;
  text-transform: uppercase;
  font-weight: 700;
  margin-bottom: 0.1875rem;
}
.summary__buttons {
  position: absolute;
  bottom: 2.5rem;
}

table, th, td {
  border: solid 1px black;
}

table {
  border-collapse: collapse;
  width: 103%;
  font-size: 0.875rem;
  margin: 0.9375rem 0;
  text-align: center;
}

th, td {
  padding: 0.4375rem 0.3125rem;
}

.button {
  padding: 0.5rem 0.75rem;
  cursor: pointer;
  border: none;
  border-radius: 0.3125rem;
  transition: 200ms;
  background: rgb(2, 133, 255);
  color: white;
}
.button2 {
  padding: 0.5rem 0.75rem;
  cursor: pointer;
  border: none;
  border-radius: 0.3125rem;
  transition: 200ms;
  background: rgb(125, 125, 125);
  color: white;
}
.button2:hover {
  letter-spacing: 0.25px;
  background: #222;
}

.button:hover {
  letter-spacing: 0.25px;
  background: #0069f7;
}

@page {
  size: auto 13in;
  margin: 0.75cm 0;
}
@media print {
  .noprint,
.noprint * {
    display: none !important;
  }

  .summary__canvas {
    height: 1000px;
  }
  .summary__header {
    padding-top: 0rem;
  }
  .summary__content {
    padding-top: 6.5625rem;
  }
}
</style>
</head>



  <body>
      
   
    <div class="summary__canvas">
      
      <div class="summary__header">
        <img class="logo" src="assets/images/logo.png" alt="" />
        <div>
          Republic of the Philippines
          <br />
          GENERAL SANTOS CITY WATER DISTRICT
          <br />
          E. Fernandez St., Lagao, General Santos City
          <br />
          Telephone No.: 552-3824; Telefax No.: 553-4960
          <br />
          Email Address: gscwaterdistrict@yahoo.com
        </div>
        <img class="socopab" src="assets/images/socopab.jpg" alt="" />
      </div>

      <div class="summary__content">
        <div class="summary__title">
          Service Slip Summary
        </div>
        
        <div class="summary__support-type"><span id="category"></span> support</div>
        <div class="summary__date">for the month of <span id="month"></span> 2022</div>

        <table id="print-table">
          <thead>
            <tr>
              <th rowspan="2">SERVICE <br> SLIP NO.</th>
            <th rowspan="2">END USER</th>
            <th rowspan="2">CATEGORY</th>
            <th rowspan="2">SUBCATEGORY</th>
            <th colspan="2">DATE</th>
            <th rowspan="2">ACCOMPLISHED BY</th>
            </tr>

            <tr>
              <th style="width: 120px;">REQUESTED</th>
              <th style="width: 120px;">ACCOMPLISHED</th>
            </tr>
          </thead>
          <tbody>
            </tbody>
        </table>

        <div class="row2 row--space-between" style="width: 550px; align-self: start;">
          <b>TOTAL</b>
          <!-- <b><span style="margin-right: 100px;">120</span></b> -->
        </div>  
        <div class="row2 row--space-between" style="width: 550px; align-self: start;">
          <b>RECEIVED REQUESTS</b>
          <b><span style="font-weight: 700; margin-right: 120px;">:</span><span id="requested" style="margin-right: 100px;"></span></b>
        </div>
        <div class="row2 row--space-between" style="width: 550px; align-self: start;">
          <b>ACCOMPLISHED REQUESTS</b>
          <b><span style="font-weight: 700; margin-right: 120px;">:</span><span id="accomplished" style="margin-right: 100px;"></span></b>
        </div>
        <br>
        <div class="row2" style="width: 550px; align-self: start;">
          <span style="margin-right: 275px;">Prepared by:</span> <span>Reviewed by:</span>
        </div>

        <div class="row2" style="width: 550px; align-self: start;">
        <b><u style="margin-right: 140px;" id="staff"></u></b>
        <!-- <b><u id="manager"> Engr. Michael Gabales, REE</u></b -->
        </div>
        <div class="row2 row--space-between" style="width: 530px; align-self: start;">
          <b>NAME & POSITION</b>
          <b>OIC - ICTO Department Manager</b>
        </div>


      <div class="summary__buttons noprint">
      <a href="/report?slip_status=<?php echo $_GET['slip_status'] ?>&category=<?php echo $_GET['category'] ?>&month=<?php echo $_GET['month'] ?>" class="button2 button--color" id="back-btn">Back</a>
        <button class="button button--color"id="print-btn"onclick="printPagereport()">
          Print
        </button>
      </div>
    </div>
    <script>
      
        function printPagereport() {
    var printBtn = document.getElementById("print-btn");
    var backBtn = document.getElementById("back-btn");
    printBtn.style.visibility = "hidden";
    backBtn.style.visibility = "hidden";
    window.print();
    printBtn.style.visibility = "visible";
    backBtn.style.visibility = "visible";
  }
    </script>
  </body>
</html>
