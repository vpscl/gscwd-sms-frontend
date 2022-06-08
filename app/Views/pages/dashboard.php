<?php
$page = 'Dashboard';
?>


    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

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
                    Pending Tickets
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
              <h6 class="m-0 font-weight-bold text-primary">
              Service Slip
              </h6>
              <!-- <div class="dropdown no-arrow">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </div> -->
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="table-container">
                <table id="dashboard-table" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Service Slip No.</th>
                      <?php if($_COOKIE['role'] == "Admin"){ ?>
                      <th>Created By</th>
                      <?php }?>
                      <th>End User</th>
                      <th>Division</th>
                      <th>Category</th>
                      <th>Subcategory</th>
                      <th>Date Requested</th>
                      <th>Status</th>
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

<!-- Logout Modal-->
<!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Select "Logout" below if you are ready to end your current session.
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">
          Cancel
        </button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div> -->