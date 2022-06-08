    <!---------- view ticket ------------------------------------------------------------------->
    <?php if (current_url() == base_url() . "/viewticket") {
        $id = $_GET['id'];
    ?><script>
            $(document).ready(function() {
                $.ajax({
                    method: "GET",
                    url: "<?php echo $domain ?>/view" + "/" + "<?php echo $id ?>",
                    success: function(response) {
                        // console.log(response)
                        if (!response['error']) {
                            var off = $("#office");
                            var dept = $("#department");
                            var div = $("#division");
                            var category = $("#category");
                            var sub = $("#sub_category");
                            var type = $("#category_type");

                            document.getElementById("slip_no").value = "MIS-" + response['id'];
                            document.getElementById("id").value = response['id'];
                            document.getElementById("end_user").value = response['end_user'];
                            off.append('<option hidden value="' + response['office'] + '">' + response['office'] + '</option>');
                            dept.append('<option hidden value="' + response['department'] + '">' + response['department'] + '</option>');
                            div.append('<option hidden value="' + response['division'] + '">' + response['division'] + '</option>');
                            category.append('<option hidden value="' + response['category'] + '">' + response['category'] + '</option>');
                            sub.append('<option hidden value="' + response['sub_category'] + '">' + response['sub_category'] + '</option>');
                            type.append('<option selected hidden value="' + response['category_type'] + '">' + response['category_type'] + '</option>');
                            document.getElementById("details").value = response['details'];
                            document.getElementById("date_requested").value = response['date_requested'];
                            document.getElementById("date_ended").value = response['date_ended'];
                            document.getElementById("slip_status").value = response['slip_status'];
                            document.getElementById("remarks").value = response['remarks'];
                            if(document.getElementById("slip_status").value == 'done'){
                    $("#print_ticket").prop("hidden", false);

                }
                        } else if (response['error']) {
                            console.log(response['error']);
                        }

                    },
                    error: function(error) {
                        console.log(error)

                    }
                })

               

                $('input[type="checkbox"]').click(function() {
              if($(this).prop("checked") == true) {
                $("input[type=text]").prop("disabled", false);
                $("input[type=date]").prop("disabled", false);
                    $("select").prop("disabled", false);
                    $("textarea").prop("disabled", false);
                    $("#update_ticket").prop("hidden", false);
                    $("#cancel_ticket").prop("hidden", false);
                    $("#edit_ticket").prop("hidden", true);
              }
              else if($(this).prop("checked") == false) {
                $("input[type=text]").prop("disabled", true);
                $("input[type=date]").prop("disabled", true);
                    $("select").prop("disabled", true);
                    $("textarea").prop("disabled", true);
                    $("#update_ticket").prop("hidden", true);
                    $("#cancel_ticket").prop("hidden", true);
                    $("#edit_ticket").prop("hidden", false);
              }
            });



                //cancel ticket
                $('#cancel_ticket').click(function() {
                    $("input[type=text]").prop("disabled", true);
                    $("input[type=date]").prop("disabled", true);
                    $("select").prop("disabled", true);
                    $("textarea").prop("disabled", true);
                    $("#update_ticket").prop("hidden", true);
                    $("#cancel_ticket").prop("hidden", true);
                    $("#edit_ticket").prop("hidden", false);
                    $('input[type="checkbox"]').prop("checked", false);
              
              
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/view" + "/" + "<?php echo $id ?>",
                        success: function(response) {
                            // console.log(response)
                            if (!response['error']) {
                                var off = $("#office");
                                var dept = $("#department");
                                var div = $("#division");
                                var category = $("#category");
                                var sub = $("#sub_category");
                                var type = $("#category_type");

                                document.getElementById("slip_no").innerHTML = "Service Slip No: MIS-" + response['id'];
                                document.getElementById("id").value = response['id'];
                                document.getElementById("end_user").value = response['end_user'];
                                off.append('<option hidden value="' + response['office'] + '">' + response['office'] + '</option>');
                                dept.append('<option hidden value="' + response['department'] + '">' + response['department'] + '</option>');
                                div.append('<option hidden value="' + response['division'] + '">' + response['division'] + '</option>');
                                category.append('<option hidden value="' + response['category'] + '">' + response['category'] + '</option>');
                                sub.append('<option hidden value="' + response['sub_category'] + '">' + response['sub_category'] + '</option>');
                                type.append('<option hidden value="' + response['category_type'] + '">' + response['category_type'] + '</option>');
                                document.getElementById("details").value = response['details'];
                                document.getElementById("date_requested").value = response['date_requested'];
                                document.getElementById("date_ended").value = response['date_ended'];
                                document.getElementById("slip_status").value = response['slip_status'];
                                document.getElementById("remarks").value = response['remarks'];
                                if(document.getElementById("slip_status").value == 'done'){
                                $("#print_ticket").prop("hidden", false);}
                            } else if (response['error']) {
                                console.log(response['error']);
                            }

                        },
                        error: function(error) {
                            console.log(error)

                        }
                    })

                })
                //update ticket
                $('#update_ticket').click(function() {
                    $("input[type=text]").prop("disabled", true);
                    $("input[type=date]").prop("disabled", true);
                    $("select").prop("disabled", true);
                    $("textarea").prop("disabled", true);
                    $("#update_ticket").prop("hidden", true);
                    $("#cancel_ticket").prop("hidden", true);
                    $("#edit_ticket").prop("hidden", false);
                    $('input[type="checkbox"]').prop("checked", false);
                    if (document.getElementById('date_ended').value) {
                        var slip_status = 'done'
                    }
                    var name = Cookies.get('name');
                    const data = {
                        end_user: document.getElementById('end_user').value,
                        office: document.getElementById('office').value,
                        department: document.getElementById('department').value,
                        division: document.getElementById('division').value,
                        category: document.getElementById('category').value,
                        category_type: document.getElementById('category_type').value,
                        sub_category: document.getElementById('sub_category').value,
                        details: document.getElementById('details').value,
                        slip_status: slip_status,
                        date_requested: document.getElementById('date_requested').value,
                        date_ended: document.getElementById('date_ended').value,
                        remarks: document.getElementById('remarks').value,
                        updated_by: name
                    }

                    $.ajax({
                        method: "PUT",
                        url: "<?php echo $domain ?>/ticket" + "/" + "<?php echo $id ?>",
                        data: data,
                        success: function(response) {
                            // console.log(response)
                            if (!response['error']) {
                                console.log(response)
                                document.getElementById("id").innerHTML = response['id'];
                                document.getElementById("end_user").value = response['end_user'];
                                document.getElementById("office").value = response['office'];
                                document.getElementById("department").value = response['department'];
                                document.getElementById("division").value = response['division'];
                                document.getElementById("date_requested").value = response['date_requested'];
                                document.getElementById("date_ended").value = response['date_ended'];
                                document.getElementById("category").value = response['category'];
                                document.getElementById("sub_category").value = response['sub_category'];
                                document.getElementById("category_type").value = response['category_type'];
                                document.getElementById("details").value = response['details'];
                                document.getElementById("slip_status").value = response['slip_status'];
                                if(response['slip_status'] == 'done'){
                                $("#print_ticket").prop("hidden", false);}
                                document.getElementById("remarks").value = response['remarks'];
                                alert("Update Successful");
                            } else if (response['error']) {
                                console.log(response['error']);
                            }
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    })
                })

                $('#delete_ticket').click(function() {
                    var name = Cookies.get('name');
                    const data = {
                        status: 'deleted',
                        slip_status: 'cancel',
                        updated_by: name
                    }

                    $.ajax({
                        method: "PUT",
                        url: "<?php echo $domain ?>/ticket" + "/" + "<?php echo $id ?>",
                        data: data,
                        success: function(response) {
                            // console.log(response)
                            if (!response['error']) {
                                location.href = "<?php echo $local ?>/tickets";
                            } else if (response['error']) {
                                console.log(response['error']);
                            }
                        },
                        error: function(error) {
                            console.log(error)
                        }
                    })
                })

                //get category
                $.ajax({
                    method: "GET",
                    url: "<?php echo $domain ?>/task",
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
                        url: "<?php echo $domain ?>/sub_task/" + sub_category,
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
                    url: "<?php echo $domain ?>/office",
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



                //get department
                $("#office").change(function() {
                    var office_code = $(this).val();
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/department" + "/" + office_code,
                        success: function(response) {
                            // console.log(response)
                            var data = response;
                            if (!response['error']) {
                                var sel = $("#department");
                                sel.empty();
                                sel.append('<option value="" hidden >Department</option>')
                                for (var i = 0; i < data.length; i++) {
                                    sel.append('<option value="' + data[i].code + '">' + data[i].code + '</option>');
                                }
                            } else if (response['error']) {
                                var sel = $("#department");
                                sel.empty();
                                sel.append('<option value="" hidden >Department</option>')
                                sel.append('<option value="no dept">No Dep</option>');
                            }

                        },
                        error: function(error) {
                            console.log(error)

                        }
                    })
                });

                //get division
                $("#department").change(function() {
                    var department_code = $(this).val();
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/division" + "/" + department_code,
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
                                sel.append('<option value="no Div">No division</option>');
                            }

                        },
                        error: function(error) {
                            console.log(error)

                        }
                    })
                });


            })
        </script>
    <?php } ?>
