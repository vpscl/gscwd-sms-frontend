    <!-- create ticket -->
    <?php if (current_url() == base_url() . "/newticket") { ?>
        <script>
            $(document).ready(function() {
                //get category
                $.ajax({
                    method: "GET",
                    url: "<?php echo $domain ?>/Task",
                    success: function(response) {
                        // console.log(response)
                        var data = response['task_list']

                        if (response['task_list']) {
                            var sel = $("#category");
                            for (var i = 0; i < data.length; i++) {
                                sel.append('<option value="' + data[i].category + '">' + data[i].category + '</option>');
                            }
                        } else if (response['error']) {
                            console.log('Get request error');
                        }

                    },
                    error: function(error) {
                        console.log(error)

                    }
                })
                $("#category").change(function() {
                    //get sub category
                    var sub_category = $(this).val();
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/Sub_task/" + sub_category,
                        success: function(response) {
                            // console.log(response)
                            var data = response;
                            console.log(data);
                            if (data) {
                                var sel = $("#sub_category");
                                sel.empty();
                                sel.append('<option value=" " hidden >Sub Category</option>');
                                for (var i = 0; i < data.length; i++) {
                                    sel.append('<option value="' + data[i].sub_category + '">' + data[i].sub_category + '</option>');
                                }
                            } else if (response['error']) {
                                sel.append('<option value=" " hidden >Sub Category</option>');
                                console.log('Get request error');
                            }

                        },
                        error: function(error) {
                            console.log(error)

                        }
                    })
                });


                //get office

                $.ajax({
                    method: "GET",
                    url: "<?php echo $domain ?>/Office",
                    success: function(response) {
                        // console.log(response)
                        var data = response;
                        if (response) {
                            var sel = $("#office");
                            for (var i = 0; i < data.length; i++) {
                                sel.append('<option value="' + data[i].code + '">' + data[i].code + '</option>');
                            }
                        } else {
                            console.log('Get request error');
                        }

                    },
                    error: function(error) {
                        console.log(error)

                    }
                })


            })

            //get department
            $("#office").change(function() {
                var office_code = $(this).val();
                $.ajax({
                    method: "GET",
                    url: "<?php echo $domain ?>/Department" + "/" + office_code,
                    success: function(response) {
                        // console.log(response)
                        var data = response;
                        if (!response['error']) {
                            var sel = $("#department");
                            sel.empty();
                            sel.append('<option value=" " hidden >Department</option>')
                            for (var i = 0; i < data.length; i++) {
                                sel.append('<option value="' + data[i].code + '">' + data[i].code + '</option>');
                            }
                        } else if (response['error']) {
                            var sel = $("#department");
                            sel.empty();
                            sel.append('<option value=" " hidden >Department</option>')
                            sel.append('<option value="No Department">No Dep</option>');
                        }

                    },
                    error: function(error) {
                        console.log(error)

                    }
                })
            });

            //get department
            $("#department").change(function() {
                var department_code = $(this).val();
                $.ajax({
                    method: "GET",
                    url: "<?php echo $domain ?>/Division" + "/" + department_code,
                    success: function(response) {
                        // console.log(response)
                        var data = response;
                        if (!response['error']) {
                            var sel = $("#division");
                            sel.empty();
                            sel.append('<option value="" hidden>Division</option>')
                            for (var i = 0; i < data.length; i++) {
                                sel.append('<option value="' + data[i].code + '">' + data[i].code + '</option>');
                            }
                        } else if (response['error']) {
                            var sel = $("#division");
                            sel.empty();
                            sel.append('<option value="" hidden>Division</option>')
                            sel.append('<option value="No Division">No division</option>');
                        }

                    },
                    error: function(error) {
                        console.log(error)

                    }
                })
            });

            $('form').submit(function() {
                // e.preventDefault(); // prevent actual form submit
                // var form = $(this);
                // var url = form.attr('action');
                // var hash_pass = md5(password);
                const data = {
                    end_user: document.getElementById('end_user').value,
                    staff_id: document.getElementById('staff_id').value,
                    created_by: document.getElementById('created_by').value,
                    office: document.getElementById('office').value,
                    department: document.getElementById('department').value,
                    division: document.getElementById('division').value,
                    category: document.getElementById('category').value,
                    category_type: document.getElementById('category_type').value,
                    sub_category: document.getElementById('sub_category').value,
                    details: document.getElementById('details').value,
                    date_requested: document.getElementById('date_requested').value
                }
                $.ajax({
                    method: "POST",
                    url: "<?php echo $domain ?>/Ticket",
                    data: data,
                    success: function(response) {
                        // console.log(response)
                        var data = response;
                        if (data['success']) {
                            location.href = "<?php echo $local ?>/tickets";
                        } else if (response['error']) {
                            console.log('Get request error');
                        }

                    },
                    error: function(error) {
                        console.log(error)

                    }
                })
            })
        </script>
    <?php } ?>