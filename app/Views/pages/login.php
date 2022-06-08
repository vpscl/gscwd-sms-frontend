<div class="container mx-auto h-100 d-flex justify-content-center align-items-center">
    <div class="card shadow card0">
        <div class="d-flex flex-lg-row flex-column">
            <div class="card card1 d-flex justify-content-center align-items-center px-md-5">
                <img src="assets/images/login-bg.png" alt="">

                <div class="logo mb-3">
                    <img src="assets/images/gswd-white.png" alt="">
                </div>
                <!-- <div class="row justify-content-left mb-3"> <img class="logo" src="assets/images/gscwd-logo.png"> <img class="logo" src="assets/images/doctrack-logo.png" alt=""></div> -->
                <span class="fw-bold text-white lh-sm text">Service Management <br> System</span>

            </div>
            <div class="card card2">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-10 my-5">
                        <h4 class="fw-bold fs-2">Login</h4>
                        <div class="line align-self-start mb-5"></div>

                        <!-- <div class="form-group mb-3 mt-3"><input type="text" id="email" name="email" placeholder="Email Address" class="form-control"> </div>
                        <div class="form-group"> <input type="password" id="psw" name="psw" placeholder="Password" class="form-control"> </div>
                        <div class="row justify-content-center"><button class="btn-block btn-color w-50 justify-self-center">Login</button></div>
                        <div class="row justify-content-center my-4"> <a href="#" class="d-flex justify-content-center"><small class="text-muted">Forgot Password?</small></a> </div> -->



                        <form class="row g-0" action="<?php echo $domain ?>/check" novalidate>
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="text-danger"><?php echo $_GET['error'] ?></p>
                            <?php } ?>
                            <div class="form-floating mb-3 w-100">
                                <input class="login__input form-control" placeholder="name@example.com" name="username" id="username" required>
                                <label for="floatingInput">Username</label>
                                <!-- <div class="valid-tooltip">
                                    sdfnsdkfnsd
                                </div>
                                <div class="invalid-tooltip">
                                    ksdnfsdf
                                </div> -->
                            </div>
                            <div class="form-floating mb-3 w-100">
                                <input type="password" class="login__input form-control" placeholder="********" name="password" id="password" required>
                                <label for="floatingInput">Password</label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                <label class="form-check-label fst-italic" for="flexCheckChecked">
                                    Remember me
                                </label>
                            </div>

                            <!-- <button class="btn-color btn btn-lg rounded text-white fw-bold w-100 mb-4" type="submit" id="submit_login">LOGIN</button> -->
                            <button class="btn-color btn btn-lg rounded text-white fw-bold w-100 mb-4" type="submit" id="submit_login">LOGIN</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>