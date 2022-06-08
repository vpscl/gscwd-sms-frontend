<?php
$page = 'Dashboard';
?>

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->

      <!-- Content Row -->
      <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-lg-6  mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  <script>
                  const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                  var date =  new Date();
                  var month = months[date.getMonth()];
                  document.write('Total number of Tickets this '+month)
                  </script>
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <span id='total_ticket'></span>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-ticket fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- Pending Requests Card Example -->
        <div class="col-lg-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                  <script>  
                  document.write('Total number of Pending Tickets this '+month)
                  </script>
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <span id='pending_ticket'></span>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-list-check fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Content Row -->

      <div class="row">
        <!-- Area Chart -->
        <div class="col-12">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  <span>
                  Current Month Services: <i class='bx bxs-rectangle' style='color:#d5eff2'  ></i>
                  </span>
            </div> 
            <div>
              <!-- staff -->
              <?php if($_COOKIE['role'] == "Staff" && isset($_GET['slip_status']) && isset($_GET['category'])  && $_GET['slip_status']  == "Done"){
                $slip_status = $_GET['slip_status'];
                $category = $_GET['category'];
                $month = $_GET['month'];
            ?>
            <a  href="/printreport-staff?slip_status=<?php echo $slip_status ?>&category=<?php echo $category ?>&month=<?php echo $month ?>" class="btn btn-info m-0 font-weight-bold" >
            <i class='bx bxs-printer'></i>
          </a>
            
            <?php } ?>
            <!-- admin -->
            <?php if(isset($_GET['staff']) && isset($_GET['slip_status']) && isset($_GET['category']) && $_GET['slip_status']  == "Done"){
                $staff = $_GET['staff'];
                $slip_status = $_GET['slip_status'];
                $category = $_GET['category'];
                $month = $_GET['month'];
           
            ?> 
            <a href="/printreport?staff=<?php echo $staff ?>&slip_status=<?php echo $slip_status ?>&category=<?php echo $category ?>&month=<?php echo $month ?>" class="btn btn-primary m-0 font-weight-bold">
            <i class='bx bxs-printer'></i>
          </a>
            
            <?php } ?>
            <button class="btn btn-info m-0 font-weight-bold" data-bs-toggle="modal" data-bs-target="#filterModal">Filter</button>
            <a href="/report"  class="btn btn-danger m-0 font-weight-bold"><i class='bx bx-reset' style='color:#ffffff'></i></a>
            </div>  
             
             
            
            <!-- Modal -->
            <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">  
                    <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <form action="">
                     <?php $role = $_COOKIE['role'];
                     if($role == "Admin"){?>
                            <label for="" class="form-label">Select Staff</label>
                            <select name="staff" id="staff" class="form-select" required>
                            <option hidden value="" id="staff-name">--</option>
                            </select>
                      <?php }?>
                            <br>
                            <label for="" class="form-label">Select Status</label>
                            <select name="slip_status" id="status" class="form-select" required>
                            <option hidden value="" id="status-name">--</option>
                            <option  value="Done">Done</option>
                            <option  value="Pending">Pending</option>
                            <option  value="All">All</option>
                            </select>
                            <br>
                            <label for="" class="form-label">Select Category</label>
                            <select name="category" id="category" class="form-select" required>
                            <option hidden value="" id="category-name">--</option>
                            <option  value="Software">Software</option>
                            <option  value="Hardware">Hardware  </option>
                            <option  value="All">All</option>
                            </select>
                            <br>
                            <label for="" class="form-label">Select Month</label>
                            <select name="month" id="month" class="form-select" required>
                            <option hidden value="" id="month-name">--</option>
                            <option  value="1">January</option>
                            <option  value="2">February</option>
                            <option  value="3">March</option>
                            <option  value="4">April</option>
                            <option  value="5">May</option>
                            <option  value="6">June</option>
                            <option  value="7">July</option>
                            <option  value="8">August</option>
                            <option  value="9">September</option>
                            <option  value="10">October</option>
                            <option  value="11">November</option>
                            <option  value="12">December</option>
                            </select>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="filter">Filter</button>
                    <?php ?>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->

            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="table-container">
                <table id="ticket-table" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Service Slip No.</th>
                      <th>End User</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Date Requested</th>
                      <th>Date Accomplished</th>
                      <th>Assigned To</th>
                    </tr>
                  </thead>
                  <tbody id="dashboard-tbody">
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Content Row -->
    </div>   
  </div>
  
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>&copy; 2022</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class='bx bxs-up-arrow'></i>
</a>
