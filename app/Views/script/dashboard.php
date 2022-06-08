   <!-- dashboard table -->
        <script>
            $(document).ready(function() {
                var role = Cookies.get('role');

                //  Admin Dashboard
                if (role == 'Admin') {
                    // count all tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/ticket",
                        success: function(response) {
                            // console.log(response)
                            if (response) {
                                //count all ticket in current month    
                                var count = 0;
                                var this_month = new Date();
                                for (i = 0; i < response.length; i++) {
                                    var array = response[i];
                                    var dt = new Date(array['date_created']);
                                    var date = dt.getMonth();
                                    var month = this_month.getMonth();
                                    if (date == month) {
                                        count++
                                    }
                                }
                                document.getElementById("total_ticket").innerHTML = count;
                            } else if (response['error']) {
                                console.log('Get request error');
                            }

                        },
                        error: function(error) {
                            console.log(error)

                        }
                    })
                    //count pending tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/ticket",
                        success: function(response) {

                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var status = data['slip_status'];
                                var pending = status['Pending'];
                                if (status == "pending") {
                                    count++
                                }
                            }
                            if (response) {
                                document.getElementById("pending_ticket").innerHTML = count;
                            } else if (response['error']) {
                                console.log('Get request error');
                            }

                        },
                        error: function(error) {
                            console.log(error)

                        }
                    })

                    const table = $('#dashboard-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        pageLength: 5,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/ticket",
                            "dataSrc": "",
                            error: function(error) {
                                console.log(error)
                            },
                        },
                        "columns": [{
                                "data": "id"
                            },
                            {
                                "data": "created_by"
                            },
                            {
                                "data": "end_user"
                            },
                            {
                                "data": "division"
                            },
                            {
                                "data": "category"
                            },
                            {
                                "data": "sub_category"
                            },
                            {
                               "targets": -1,
                                "data": "date_requested",
                                render: function(data) {
                                    const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;
                            }
                            },
                            {
                                "targets": -1,
                                "data": "slip_status",
                                render: function(data) {
                                    if(data == 'pending'){
                                        return '<span class="badge bg-warning text-dark text-uppercase">'+ data +'</span>';
                                    } else if (data == 'done'){
                                        return '<span class="badge bg-success text-uppercase">'+ data +'</span>';
                                    } else{return null;}
                            }
                            }
                            
                        ]
                    });
                }


                //  Staff Dashboard
                if (role == 'Staff') {
                    // count all tickets(per month) and pending tickets Staff
                    var id = Cookies.get('id');
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/ticket" + "/" + id,
                        success: function(response) {
                            // console.log(response)
                            if (!response['error']) {
                                //count all ticket in current month    
                                var count = 0;
                                var this_month = new Date();
                                for (i = 0; i < response.length; i++) {
                                    var array = response[i];
                                    var dt = new Date(array['date_created']);
                                    var date = dt.getMonth();
                                    var month = this_month.getMonth();
                                    if (date == month) {
                                        count++
                                    }
                                }
                                document.getElementById("total_ticket").innerHTML = count;

                                var count = 0;
                                if (response.length > 0) {
                                    var status = response['0'];
                                    var pending = status['slip_status']

                                    for (i = 0; i < response.length; i++) {
                                        var data = response[i];
                                        var status = data['slip_status'];
                                        var pending = status['Pending'];
                                        if (status == "pending") {
                                            count++
                                        }
                                    }
                                }
                                document.getElementById("pending_ticket").innerHTML = count;
                            } else if (response['error']) {
                                console.log(response['msg']);
                                document.getElementById("total_ticket").innerHTML = 0;
                            }
                        },
                        error: function(error) {
                            console.log(error)

                        }
                    })

                    const table = $('#dashboard-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        pageLength: 5,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                           
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/ticket" + "/" + id,
                            "dataSrc": "",
                            error: function(error) {
                                console.log(error)
                            },
                        },
                        "columns": [{
                                "data": "id"
                            },
                            {
                                "data": "end_user"
                            },
                            {
                                "data": "division"
                            },
                            {
                                "data": "category"
                            },
                            {
                                "data": "sub_category"
                            },                        
                            {
                               "targets": -1,
                                "data": "date_requested",
                                render: function(data) {
                                    const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;
                            }
                            },
                            {
                                "targets": -1,
                                "data": "slip_status",
                                render: function(data) {
                                    if(data == 'pending'){
                                        return '<span class="badge bg-warning text-dark text-uppercase">'+ data +'</span>';
                                    } else if (data == 'done'){
                                        return '<span class="badge bg-success text-uppercase">'+ data +'</span>';
                                    } else{return null;}
                            }
                            }
                        ]
                    });
                }
            });
        </script>