<?php
$page = 'Add New Ticket';
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
                           
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                                <form class="row g-3">
                                    <div class="col-lg-3 col-md-4">
                                        <label class="form-label">End User:</label>
                                        <input type="text" class="form-control" id="end_user" required>
                                        <!-- <input type="text" class="form-control" id="id" hidden> -->
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <label for="inputAddress" class="form-label">Office</label>
                                        <select name="office" id="office" class="form-select" required>
                                            <option hidden value="">Office</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <label for="inputAddress2" class="form-label">Department</label>
                                        <select name="department" id="department" class="form-select" required>
                                            <option hidden value="">Department</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <label for="inputCity" class="form-label">Division</label>
                                        <select name="division" id="division" class="form-select" required>
                                            <option hidden value="">Division</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <label for="inputState" class="form-label">Category</label>
                                        <select name="category" id="category" class="form-select" required>
                                            <option hidden value=""></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <label for="inputZip" class="form-label">Subcategory</label>
                                        <select name="sub_category" id="sub_category" class="form-select" required>
                                            <option hidden value=""></option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 col-md-4">
                                        <label for="" class="form-label">Type of Support</label>
                                        <select name="category_type" id="category_type" class="form-select" required>
                                            <option hidden value=""></option>
                                            <option value="Simple">Simple</option>
                                            <option value="Complex">Complex</option>
                                        </select>
                                    </div>

                                   


                                    <div class="col-lg-3 col-md-4">
                                        <label for="" class="form-label">Date Requested</label>
                                        <input type="date" id="date_requested" class="form-control" value="<?php echo date("Y-m-d"); ?>" required>
                                    </div>

                                    <input hidden type="text" id="created_by" class="form-control" required>
                                    <input hidden type="text" id="staff_id" class="form-control" required>


                                    <div class="col-lg-3 col-md-4">
                                    <label for="" class="form-label">Details</label>
                                    <textarea class="form-control" id="details"></textarea>
                                </div>

                                

                                    <script>
                                        var name = Cookies.get('name');
                                        var id = Cookies.get('id');
                                        document.getElementById("created_by").value = name;
                                        document.getElementById("staff_id").value = id;
                                    </script>

                                    <div class="gap-1 d-flex justify-content-end">
                                        <button class="btn btn-primary" id="submit_ticket">Submit</button>
                                    </div>
                                </form>


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