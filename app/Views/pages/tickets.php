<?php
$page = 'Tickets';
?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">



            <!-- Content Row -->

            <div class="row">
                <!-- Area Chart -->
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          <span>
                          Current Month Services: <i class='bx bxs-rectangle me-2' style='color:#d5eff2'></i>
                          
                           Last 7 days Pending: <i class='bx bxs-rectangle me-2' style='color:#ffdd47'></i>
                          
                           Last 8-14 days Pending: <i class='bx bxs-rectangle me-2' style='color:orange'></i>
                        
                           Last Month pending: <i class='bx bxs-rectangle me-2' style='color:#fc6900'></i>
                        </span>
                        </div>
                            <h6 class="m-0 font-weight-bold text-primary">
                                <a href="newticket" class="btn btn-primary" style="white-space: nowrap;">Add New Ticket</a>
                            </h6>
                            
                            
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="table-container">
                                <table id="ticket-table" class="display" style="width:100%">
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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