<?php 
        $id = $_GET['id'];
    ?><script>
            $(document).ready(function() {
                $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/Division",
                        success: function(response) {
                            // console.log(response)
                            var data = response;
                            if (!response['error']) {
                                var sel = $("#division");
                                sel.empty();
                                sel.append('<option value="" hidden>Division</option>')
                                for (var i = 0; i < data.length; i++) {
                                    sel.append('<option value="' + data[i].name + '">' + data[i].name + '</option>');
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


                     function list() {
                         $.ajax({
                    method: "GET",
                    url: "<?php echo $domain ?>/Incident" + "/" + "<?php echo $id ?>",
                    success: function(response) {
                        // console.log(response)
                        if (!response['error']) {
                            var functional = $("#functional");
                            var informational = $("#informational");
                            var recoverability = $("#recoverability");
                            var functional = $("#functional");
                            document.getElementById("slip_no").value = "IR-" + response['id'];
                            document.getElementById("id").value = response['id'];
                            document.getElementById("incident").value = response['incident'];
                            document.getElementById("reporter_name").value = response['reporter_name'];
                            document.getElementById("contact_number").value = response['contact_number'];
                            document.getElementById("email").value = response['email'];
                            document.getElementById("division").value = response['division'];
                            document.getElementById("assets").value = response['assets'];
                            document.getElementById("information_source").value = response['information_source'];
                            document.getElementById("details").value = response['details'];
                            document.getElementById("attack_vector").value = response['attack_vector'];
                            functional.append('<option selected hidden value="' + response['functional'] + '">' + response['functional'] + '</option>');
                            informational.append('<option selected hidden value="' + response['informational'] + '">' + response['informational'] + '</option>');
                            recoverability.append('<option selected hidden value="' + response['recoverability'] + '">' + response['recoverability'] + '</option>');
                            document.getElementById("action_taken").value = response['action_taken'];
                            document.getElementById("report_date").value = response['report_date'];

                          
                        } else if (response['error']) {
                            console.log(response['error']);
                        }

                    },
                    error: function(error) {
                        console.log(error)

                    }
                })
            }
            list(); 
           
    
            // update
            $('input[type="checkbox"]').click(function() {
              if($(this).prop("checked") == true) {
                $("input[type=text]").prop("disabled", false);
                $("input[type=date]").prop("disabled", false);
                $("input[type=email]").prop("disabled", false);
                    $("select").prop("disabled", false);
                    $("textarea").prop("disabled", false);
                    $("#update_ticket").prop("hidden", false);
                    $("#cancel_ticket").prop("hidden", false);
                    $("#edit_ticket").prop("hidden", true);
              }
              else if($(this).prop("checked") == false) {
                $("input[type=text]").prop("disabled", true);
                $("input[type=date]").prop("disabled", true);
                $("input[type=email]").prop("disabled", false);
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

                    list(); 
                })

                $('#update_ticket').click(function() {
                    $("input[type=text]").prop("disabled", true);
                    $("input[type=date]").prop("disabled", true);
                    $("input[type=email]").prop("disabled", true);
                    $("select").prop("disabled", true);
                    $("textarea").prop("disabled", true);
                    $("#update_ticket").prop("hidden", true);
                    $("#cancel_ticket").prop("hidden", true);
                    $("#edit_ticket").prop("hidden", false);
                    $('input[type="checkbox"]').prop("checked", false);
                   var id  = document.getElementById('id').value;
                    const data = {
                    incident: document.getElementById('incident').value,
                    report_date: document.getElementById('report_date').value,
                    reporter_name: document.getElementById('reporter_name').value,
                    contact_number: document.getElementById('contact_number').value,
                    email: document.getElementById('email').value,
                    division: document.getElementById('division').value,
                    assets: document.getElementById('assets').value,
                    information_source: document.getElementById('information_source').value,
                    details: document.getElementById('details').value,
                    attack_vector: document.getElementById('attack_vector').value,
                    functional: document.getElementById('functional').value,
                    informational: document.getElementById('informational').value,
                    recoverability: document.getElementById('recoverability').value,
                    action_taken: document.getElementById('action_taken').value
                }
                $.ajax({
                    method: "PUT",
                    url: "<?php echo $domain ?>/Incident/"+"/"+id,
                    data: data,
                    success: function(response) {
                        // console.log(response)
                        var data = response;
                        if (data['success']) {
                            alert("Update Successful");

                        } else if (response['error']) {
                            alert("Error " +response['error']);
                        }

                    },
                    error: function(error) {
                        console.log(error)

                    }
                })
                })

            })
        </script>