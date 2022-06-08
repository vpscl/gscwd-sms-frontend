 
 <!-- login ajax -->
 <?php if (current_url() == base_url() . "/login") { ?>
        <script>
            $(document).ready(function() {

                $('form').submit(function(e) {
                    e.preventDefault(); // prevent actual form submit
                    var form = $(this);
                    var url = form.attr('action');
                    // var hash_pass = md5(password);
                    const data = {
                        username: document.getElementById('username').value,
                        password: MD5.generate(document.getElementById('password').value),
                    }
                    $.ajax({
                        method: "GET",
                        url: url,
                        data: data,
                        success: function(response) {
                            console.log(response)
                            var data = response['success']
                            if (response['success']) {
                                // sessionStorage.setItem('id', data['id']);
                                // console.log(sessionStorage.getItem('id'));
                                if (data['role'] == 'Staff') {
                                    var expire = new Date(new Date().getTime() + 1 * 60 * 60 * 1000);
                                    var name = data['first_name'] + " " + data['last_name'];
                                    Cookies.set("id", data['id'], {
                                        expires: expire
                                    });
                                    Cookies.set("name", name, {
                                        expires: expire
                                    });
                                    Cookies.set("role", data['role'], {
                                        expires: expire
                                    });
                                    location.href = "<?php echo $local ?>/dashboard";
                                } else if (data['role'] == 'Admin') {
                                    var expire = new Date(new Date().getTime() + 1 * 60 * 60 * 1000);
                                    var name = data['role'];
                                    Cookies.set("id", data['id'], {
                                        expires: expire
                                    });
                                    Cookies.set("name", name, {
                                        expires: expire
                                    });
                                    Cookies.set("role", data['role'], {
                                        expires: expire
                                    });
                                    location.href = "<?php echo $local ?>/dashboard";
                                }
                            } else if (response['error']) {
                                location.href = "<?php echo $local ?>/login?error= incorrect username or password";
                            }

                        },
                        error: function(error) {
                            console.log(error)

                        }
                    })
                })
            })
        </script>
    <?php } ?>
