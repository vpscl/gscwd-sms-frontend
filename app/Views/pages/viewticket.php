<?php
$page = 'View Ticket';
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

                            <a class="btn btn-sm btn-outline-secondary" href="<?php echo $local ?>/tickets">Back</a>

                       

                            <div class="d-flex">
                            <label class="form-check-label" for="toggle" style="margin-right: 27px;">Update</label>
                            <div class="form-chck form-switch">
                            <input class="form-check-input" type="checkbox" id="toggle">
                            </div>
                            </div>
                            
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-lg-3 col-md-4">
                                    <label class="form-label">Service Slip No.:</label>
                                    <input type="text" class="form-control" id="slip_no" disabled>
                                    <input type="text" class="form-control" id="id" hidden>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <label class="form-label">End User</label>
                                    <input id="end_user" type="text" class="form-control" disabled>
                                    <!-- <input type="text" id="end_user"> -->
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <label for="inputAddress" class="form-label">Office</label>
                                    <select name="office" id="office" class="form-select" disabled>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <label for="inputAddress2" class="form-label">Department</label>
                                    <select name="department" id="department" class="form-select" disabled>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <label for="inputCity" class="form-label">Division</label>
                                    <select name="division" id="division" class="form-select" disabled>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <label for="inputState" class="form-label">Category</label>
                                    <select name="category" id="category" class="form-select" disabled>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <label for="inputZip" class="form-label">Subcategory</label>
                                    <select name="sub_category" id="sub_category" class="form-select" disabled>
                                    </select>
                                </div>

                                <div class="col-lg-3 col-md-4">
                                    <label for="" class="form-label">Type of Support</label>
                                    <select name="category_type" id="category_type" class="form-select" disabled>
                                    <option value="Simple">Simple</option>
                                        <option value="Complex">Complex</option>
                                    </select>
                                </div>

                                <div class="col-lg-3 col-md-4">
                                    <label for="" class="form-label">Date Requested</label>
                                    <input type="date" id="date_requested" class="form-control" disabled>
                                </div>

                                <div class="col-lg-3 col-md-4">
                                    <label for="" class="form-label">Details</label>
                                    <!-- <input type="text" id="details" class="form-control" disabled> -->
                                    <textarea class="form-control" id="details" disabled></textarea>
                                </div>

                                
                                <div class="col-lg-3 col-md-4">
                                    <label for="" class="form-label">Assessment/Remarks</label>
                                    <!-- <input type="text" id="remarks" class="form-control" disabled> -->
                                    <textarea class="form-control" id="remarks" disabled></textarea>

                                </div>
                                
                                <div class="col-lg-3 col-md-4">
                                    <label for="" class="form-label">Date Accomplished</label>
                                    <input type="date" id="date_ended" class="form-control" disabled>
                                </div>


                                <div>
                                    <input type="text" id="slip_status" hidden>
                                </div>

                                <div class="col gap-1 d-flex justify-content-end">
                                
                                    <button hidden class="btn btn-primary" id="update_ticket">Save</button>
                                    <a href="/printslip?id=<?php echo $_GET['id'] ?>" hidden class="btn btn-info" id="print_ticket">Generate</a>
                                    <!-- <button type="submit" class="btn btn-info"  id="print_ticket" onclick="printbutton()">Print</button> -->
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                    <button hidden class="btn btn-dark" id="cancel_ticket">Cancel</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this ticket?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="delete_ticket">Confirm</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>



            </div>

            <!-- Content Row -->




        </div>
        <!-- /.container-fluid -->



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