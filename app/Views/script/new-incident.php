<script>
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

     $('form').submit(function() {
                // e.preventDefault(); // prevent actual form submit
                // var form = $(this);
                // var url = form.attr('action');
                // var hash_pass = md5(password);
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
                    method: "POST",
                    url: "<?php echo $domain ?>/Incident",
                    data: data,
                    success: function(response) {
                        // console.log(response)
                        var data = response;
                        if (data['success']) {
                            location.href = "<?php echo $local ?>/incident";
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