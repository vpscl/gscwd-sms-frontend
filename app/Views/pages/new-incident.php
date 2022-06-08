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

                            <a class="btn btn-sm btn-outline-secondary" href="<?php echo $local ?>/incident">Back</a>

                        
                            
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                        <form class="row g-3">
                            <div class="row g-3">
                                <div class="col-lg-3 col-md-4">
                                    <label class="form-label">Incident</label>
                                    <input id="incident" type="text" class="form-control" required >
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <label class="form-label">Reporter Name</label>
                                    <input id="reporter_name" type="text" class="form-control"  required>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <label class="form-label">Contact Number</label>
                                    <input id="contact_number" type="text" class="form-control" required >
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" id="email" class="form-control"  >
                                </div>
                                <div class="col-lg-3 col-md-4">
                                        <label for="inputCity" class="form-label">Division</label>
                                        <select name="division" id="division" class="form-select" required>
                                            <option hidden value="">Division</option>
                                        </select>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <label for="" class="form-label">Targeted Assets</label>
                                    <input type="text" id="assets" class="form-control"  required>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                        <label for="inputCity" class="form-label">Information Source</label>
                                        <select name="information_source" id="information_source" class="form-select" required>
                                            <option hidden value="">Select</option>
                                            <option style="color :red" value="RED">TLP: RED</option>
                                            <option style="color :#FFBF00" value="AMBER">TLP: AMBER</option>
                                            <option style="color :green" value="GREEN">TLP: GREEN</option>
                                            <option  value="WHITE">TLP: WHITE</option>
                                        </select>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                        <label for="inputCity" class="form-label">Threat Vectors</label>
                                        <select name="attack_vector" id="attack_vector" class="form-select" required>
                                            <option hidden value="">Select</option>
                                            <option value="Unknown">Unknown</option>
                                            <option value="Lost/Stolen Equipment">Lost/Stolen Equipment</option>
                                            <option value="Attrition">Attrition</option>
                                            <option value="Email Exploit">Email Exploit</option>
                                            <option value="Web Exploit">Web Exploit</option>
                                            <option value="Media Exploit">Media Exploit</option>
                                            <option value="Impersonation">Impersonation</option>
                                            <option value="Improper Usage">Improper Usage</option>
                                        </select>
                                </div>

                                <div class="col-lg-3 col-md-4">
                                        <label for="inputCity" class="form-label">Functional</label>
                                        <select name="functional" id="functional" class="form-select" required>
                                            <option hidden value="">Select</option>
                                            <option value="None">None</option>
                                            <option value="Low">Low</option>
                                            <option value="Medium">Medium</option>
                                            <option value="High">High</option>
                                        </select>
                                </div>

                                <div class="col-lg-3 col-md-4">
                                        <label for="inputCity" class="form-label">Informational</label>
                                        <select name="informational" id="informational" class="form-select" required>
                                            <option hidden value="">Select</option>
                                            <option value="None">None</option>
                                            <option value="Integrity">Integrity</option>
                                            <option value="Privacy">Privacy</option>
                                            <option value="Proprietary">Proprietary</option>
                                        </select>
                                </div>

                                <div class="col-lg-3 col-md-4">
                                        <label for="inputCity" class="form-label">Recoverability</label>
                                        <select name="recoverability" id="recoverability" class="form-select" required>
                                            <option hidden value="">Select</option>
                                            <option value="Not Applicable">Not Applicable</option>
                                            <option value="Regular">Regular</option>
                                            <option value="Supplemented">Supplemented</option>
                                            <option value="Extended">Extended</option>
                                            <option value="Not Recoverable">Not Recoverable</option>
                                        </select>
                                </div>

                                <div class="col-lg-3 col-md-4">
                                    <label for="" class="form-label">Date of Report</label>
                                    <input type="date" id="report_date" class="form-control" value="<?php  echo date("Y-m-d");?>" required>
                                </div>

                                <div class="col-lg-6">
                                    <label for="" class="form-label">Details</label>
                                    <textarea class="form-control" id="details" required ></textarea>
                                </div>
                                
                                <div class="col-lg-6">
                                    <label for="" class="form-label">Actions Taken</label>
                                    <textarea class="form-control" id="action_taken" required ></textarea>
                                </div>

                            </div>
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