
<div class="container mx-auto h-100 d-flex justify-content-center align-items-center">
    <div class="card shadow card0">
        <div class="d-flex flex-lg-row flex-column-reverse h-100">
            <div class="card card1">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-10 my-5">
                        <h4 class="fw-bold fs-2">Sign Up</h4>
                        <div class="line align-self-start mb-5"></div>

                        <!-- <div class="form-group mb-3 mt-3"><input type="text" id="email" name="email" placeholder="Email Address" class="form-control"> </div>
                        <div class="form-group"> <input type="password" id="psw" name="psw" placeholder="Password" class="form-control"> </div>
                        <div class="row justify-content-center"><button class="btn-block btn-color w-50 justify-self-center">Login</button></div>
                        <div class="row justify-content-center my-4"> <a href="#" class="d-flex justify-content-center"><small class="text-muted">Forgot Password?</small></a> </div> -->



                        <form class="row g-0 needs-validation" novalidate>
                            <div class="form-floating mb-3 w-100">
                                <input type="text" class=" form-control" placeholder="Juan" name="firstName" id="firstName" required>
                                <label for="floatingInput">First Name</label>
                            </div>

                            <div class="form-floating mb-3 w-100">
                                <input type="text" class=" form-control" placeholder="Dela Cruz" name="lastName" id="lastName" required>
                                <label for="floatingInput">Last Name</label>
                            </div>

                            <div class="form-floating mb-3 w-100">
                                <input type="email" class=" form-control" placeholder="name@example.com" name="email" id="email" required>
                                <label for="floatingInput">Email</label>
                                <div class="valid-tooltip">
                                    sdfnsdkfnsd
                                </div>
                                <div class="invalid-tooltip">
                                    ksdnfsdf
                                </div>
                            </div>

                            <div class="form-floating mb-3 w-100">
                                <input type="password" class=" form-control" placeholder="********" name="password" id="password" required>
                                <label for="floatingInput">Password</label>
                            </div>

                            <a href="#" class="btn-color btn btn-lg rounded text-white fw-bold w-100 mb-4" type="submit" id="submit_login">SIGN UP</a>

                        </form>
                        Already have an account?
                        <span><a href="/login" class="mt-4">Login</a></span>

                    </div>
                </div>
            </div>

            <div class="card card2 d-flex justify-content-center align-items-center px-md-5">
                <img src="assets/images/signup-bg.png" alt="">

                <div class="logo mb-3">
                    <img src="assets/images/gswd-white.png" alt="">
                </div>
                 <span class="fw-bold text-white lh-sm text">Ticket Management <br> System</span>

            </div>

        </div>
    </div>
</div>



<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {

        $('#submit_login').click(function() {

            const data = {
                first_name: document.getElementById('firstName').value,
                last_name: document.getElementById('lastName').value,
                email: document.getElementById('email').value,
                password: MD5.generate(document.getElementById('password').value),
            }
            // var hash_pass = md5(password);
            $.ajax({
                method: "POST",
                url: "<?php echo $domain . $user ?>",
                data: data,
                success: function(response) {

                    if (response['success']) {
                        //user created
                        console.log(response)
                    } else if (response['taken']) {
                        //gmail already taken
                        console.log(response)
                    } else if (response['error']) {
                        //error occured
                        console.log(response)
                    }

                },
                error: function(error) {
                    console.log(error)
                }
            })
        })
    })
</script>