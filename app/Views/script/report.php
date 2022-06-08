    <?php

 if (current_url() == base_url() . "/report") {
        
        ?>
        <script>
            $(document).ready(function() {
                var role = Cookies.get('role');
                if (role == 'Admin') {
                    const d = new Date();
                    let current_month = d.getMonth()+1;

                    <?php if(isset($_GET['staff']) && isset($_GET['slip_status'] ) && $_GET['staff'] == "All" && $_GET['slip_status'] == "All" && $_GET['category'] == "All" ){ ?>
                        const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const staff = urlParams.get('staff')
                const status = urlParams.get('slip_status')
                const category = urlParams.get('category')
                const month = urlParams.get('month')
                if(status == "Pending"){
                var slipstatus = "pending"
            }else if(status == "Done"){
                var slipstatus = "done"
            }
                                document.getElementById("staff-name").value = staff;
                                document.getElementById("staff-name").innerHTML = staff;
                                document.getElementById("status-name").value = status;
                                document.getElementById("status-name").innerHTML = status;
                                document.getElementById("category-name").value = category;
                                document.getElementById("category-name").innerHTML = category;
                                document.getElementById("month-name").value = month;
                                document.getElementById("month-name").innerHTML = month;
                    
                    if (role == 'Admin') {
                        const ticketTable = $('#ticket-table').DataTable({
                            dom: "ftpr",
                            bSort: false,
                            responsive: true,
                            pageLength: 6,
                            language: {
                                search: "_INPUT_",
                                searchPlaceholder: "Search",
                                // paginate: {
                                //     next: ">",
                                //     previous: "<"
                                // },
                            },
                            "order": [
                                [0, "desc"]
                            ],
                            "ajax": {
                                method: "GET",
                                url: "<?php echo $domain ?>/report-ticket"+"/"+month,
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
                                    "data": "date_ended",
                                    render: function(data) {
                                        if(data == "0000-00-00"){
                                              return '<span class="badge bg-warning text-dark text-uppercase">Pending</span>';
                                        } else{
                                            const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;}
                                }},
                                {
                                    "data": "created_by"
                                }
                            ],
                            fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                                
                                const split = aData.date_requested.split('-');
                                const month = split[1];
                                
                                if (current_month == month) {
                                  $(nRow).find('td:eq(0)').css('background-color', '#d5eff2');
                                } else {
                                  $(nRow).find('td:eq(0)').css('background-color', '');
                                }
                                // const cancel = aData.status;
                                // if (cancel == "deleted") {
                                //   $(nRow).find('td:eq(0)').css('background-color', '#ffe3e0');
                                // }
                            }
                        });
                          //count pending tickets admin
                 $.ajax({
                            method: "GET",
                            url: "<?php echo $domain ?>/report-ticket"+"/"+month,
                            success: function(response) {
                                var this_month = new Date();
                                var count = 0;
                                for (i = 0; i < response.length; i++) {
                                    var data = response[i];
                                    var status = data['slip_status'];
                                    var pending = status['Pending'];
                                    var dt = new Date(data['date_created']);
                                    var date = dt.getMonth();
                                    var month = this_month.getMonth();
                                        if (date == month & status == "pending") {
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
                        // count all tickets admin
                        $.ajax({
                            method: "GET",
                            url: "<?php echo $domain ?>/report-ticket"+"/"+month,
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
                    }      

    
                <?php }else if(isset($_GET['staff']) && isset($_GET['slip_status'] ) && isset($_GET['category'] ) && isset($_GET['month'] ) ) {?>

                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const staff = urlParams.get('staff')
                const status = urlParams.get('slip_status')
                const category = urlParams.get('category')
                const filter_month = urlParams.get('month')
                if(status == "Pending"){
                var slipstatus = "pending"
            }else if(status == "Done"){
                var slipstatus = "done"
            }
                                document.getElementById("staff-name").value = staff;
                                document.getElementById("staff-name").innerHTML = staff;
                                document.getElementById("status-name").value = status;
                                document.getElementById("status-name").innerHTML = status;
                                document.getElementById("category-name").value = category;
                                document.getElementById("category-name").innerHTML = category;
                                var months = ["","January","February","March","April","May","June","July","August","September","October","November","December"];
                                document.getElementById("month-name").value = filter_month;
                                document.getElementById("month-name").innerHTML = months[filter_month];
                    if(staff != "All"){
                                $.ajax({
                    method: "GET",
                    url: "<?php echo $domain ?>/user"+"/"+ staff,
                    success: function(response) {
                        // console.log(response)
                        var data = response;
                        if (response) {
                                document.getElementById("staff-name").value = data['id']
                                document.getElementById("staff-name").innerHTML = data['first_name']+" "+data['last_name'];
                                document.getElementById("status-name").value = status;
                                document.getElementById("status-name").innerHTML = status;
                        } else {
                            console.log('Get request error');
                        }

                    },
                    error: function(error) {
                        console.log(error)

                    }
                });}
                //if slip status and cat not "All"
                <?php  if($_GET['staff'] == "All" && $_GET['slip_status'] != "All" && $_GET['category'] != "All" ){ ?>
            
                
                if(status == "Pending"){
                var slipstatus = "pending"
            }else if(status == "Done"){
                var slipstatus = "done"
            }
                
                if (role == 'Admin') {
                    const ticketTable = $('#ticket-table').DataTable({
                        
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        pageLength: 6,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                            // paginate: {
                            //     next: ">",
                            //     previous: "<"
                            // },
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/"+ slipstatus + "/"+ category +"/"+ filter_month,
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
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                          return '<span class="badge bg-warning text-dark text-uppercase">Pending</span>';
                                    } else{
                                        const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month) {
                              $(nRow).find('td:eq(0)').css('background-color', '#d5eff2');
                            } else {
                              $(nRow).find('td:eq(0)').css('background-color', '');
                            }
                        }
                    });

                    //count pending tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/"+ slipstatus + "/"+ category +"/"+ filter_month,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var slipstatus = data['slip_status'];
                                var dt = new Date(data['date_created']);
                                var date = dt.getMonth();
                                var month = this_month.getMonth();
                                    if (date == month & slipstatus == "pending") {
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
                // count all tickets admin 
                $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/"+ slipstatus + "/"+ category +"/"+ filter_month,
                        success: function(response) {
                           
                            if (response.length > 0) {
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
                            } else {
                                var count = 0;
                                document.getElementById("total_ticket").innerHTML = count;
                            }

                        },
                        error: function(error) {
                            console.log(error)

                        }
                    })
                }
                
                // All reports Admin
                //slip status done
                <?php } else if($_GET['slip_status'] == "Done" && $_GET['staff'] != "All" && $_GET['category'] != "All"){ ?>
                var role = Cookies.get('role');
                if(status == "Pending"){
                var slipstatus = "pending"
            }else if(status == "Done"){
                var slipstatus = "done"
            }
                if (role == 'Admin') {
                    const ticketTable = $('#ticket-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        pageLength: 6,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                            // paginate: {
                            //     next: ">",
                            //     previous: "<"
                            // },
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/donestaff"+"/"+staff+"/"+category+"/"+filter_month,
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
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                          return '<span class="badge bg-warning text-dark text-uppercase">Pending</span>';
                                    } else{
                                        const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month) {
                              $(nRow).find('td:eq(0)').css('background-color', '#d5eff2');
                            } else {
                              $(nRow).find('td:eq(0)').css('background-color', '');
                            }
                        }
                    });

                    //count pending tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/donestaff"+"/"+staff+"/"+category+"/"+filter_month,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var status = data['slip_status'];
                                var pending = status['Pending'];
                                var dt = new Date(data['date_created']);
                                var date = dt.getMonth();
                                var month = this_month.getMonth();
                                    if (date == month & status == "pending") {
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
                // count all tickets admin 
                $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/donestaff"+"/"+staff+"/"+category+"/"+filter_month,
                        success: function(response) {
                           
                            if (response.length > 0) {
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
                            } else {
                                var count = 0;
                                document.getElementById("total_ticket").innerHTML = count;
                            }

                        },
                        error: function(error) {
                            console.log(error)

                        }
                    })
                }
                
                // slip status pending
                <?php  } else if ($_GET['slip_status'] == "Pending" && $_GET['staff'] != "All" && $_GET['category'] != "All"){?> 
                    var role = Cookies.get('role');
                    
                    if (role == 'Admin') {
                    const ticketTable = $('#ticket-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        pageLength: 6,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                            // paginate: {
                            //     next: ">",
                            //     previous: "<"
                            // },
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/pending2"+"/"+staff+"/"+category+"/"+filter_month,
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
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                          return '<span class="badge bg-warning text-dark text-uppercase">Pending</span>';
                                    } else{
                                        const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month) {
                              $(nRow).find('td:eq(0)').css('background-color', '#d5eff2');
                            } else {
                              $(nRow).find('td:eq(0)').css('background-color', '');
                            }
                        }
                    });
                             //count pending tickets admin
             $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/pending2"+"/"+staff+"/"+category+"/"+filter_month,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var status = data['slip_status'];
                                var pending = status['Pending'];
                                var dt = new Date(data['date_created']);
                                var date = dt.getMonth();
                                var month = this_month.getMonth();
                                    if (date == month & status == "pending") {
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
                    // count all tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/pending2"+"/"+staff+"/"+category+"/"+filter_month,
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
                }

                //slip status done
                <?php } else if($_GET['slip_status'] == "All" && $_GET['staff'] != "All" && $_GET['category'] != "All" ){ ?>
                var role = Cookies.get('role');
                    
                if (role == 'Admin') {
                    const ticketTable = $('#ticket-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        pageLength: 6,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                            // paginate: {
                            //     next: ">",
                            //     previous: "<"
                            // },
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/slip_status"+"/"+staff+"/"+category+"/"+filter_month,
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
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                          return '<span class="badge bg-warning text-dark text-uppercase">Pending</span>';
                                    } else{
                                        const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month) {
                              $(nRow).find('td:eq(0)').css('background-color', '#d5eff2');
                            } else {
                              $(nRow).find('td:eq(0)').css('background-color', '');
                            }
                        }
                    });

                    //count pending tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/slip_status"+"/"+staff+"/"+category+"/"+filter_month,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var status = data['slip_status'];
                                var pending = status['Pending'];
                                var dt = new Date(data['date_created']);
                                var date = dt.getMonth();
                                var month = this_month.getMonth();
                                    if (date == month & status == "pending") {
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
                // count all tickets admin
                $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/slip_status"+"/"+staff+"/"+category+"/"+filter_month,
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
                }
                
                //slip status done
                <?php } else if($_GET['slip_status'] == "All" && $_GET['staff'] == "All" && $_GET['category'] != "All" ){ ?>
                var role = Cookies.get('role');
                    
                if (role == 'Admin') {
                    const ticketTable = $('#ticket-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        pageLength: 6,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                            // paginate: {
                            //     next: ">",
                            //     previous: "<"
                            // },
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/category"+"/"+category+"/"+filter_month,
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
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                          return '<span class="badge bg-warning text-dark text-uppercase">Pending</span>';
                                    } else{
                                        const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month) {
                              $(nRow).find('td:eq(0)').css('background-color', '#d5eff2');
                            } else {
                              $(nRow).find('td:eq(0)').css('background-color', '');
                            }
                        }
                    });

                    //count pending tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/category"+"/"+category+"/"+filter_month,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var status = data['slip_status'];
                                var pending = status['Pending'];
                                var dt = new Date(data['date_created']);
                                var date = dt.getMonth();
                                var month = this_month.getMonth();
                                    if (date == month & status == "pending") {
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
                // count all tickets admin
                $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/category"+"/"+category+"/"+filter_month,
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
                }
                
                //slip status done
                <?php } else if($_GET['slip_status'] == "Done" && $_GET['staff'] == "All" && $_GET['category'] == "All" ){ ?>
                var role = Cookies.get('role');
                    
                if (role == 'Admin') {
                    const ticketTable = $('#ticket-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        pageLength: 6,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                            // paginate: {
                            //     next: ">",
                            //     previous: "<"
                            // },
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/done-all"+"/"+filter_month,
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
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                          return '<span class="badge bg-warning text-dark text-uppercase">Pending</span>';
                                    } else{
                                        const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month) {
                              $(nRow).find('td:eq(0)').css('background-color', '#d5eff2');
                            } else {
                              $(nRow).find('td:eq(0)').css('background-color', '');
                            }
                        }
                    });

                    //count pending tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/done-all"+"/"+filter_month,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var status = data['slip_status'];
                                var pending = status['Pending'];
                                var dt = new Date(data['date_created']);
                                var date = dt.getMonth();
                                var month = this_month.getMonth();
                                    if (date == month & status == "pending") {
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
                // count all tickets admin
                $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/done-all"+"/"+filter_month,
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
                }
                
                <?php } else if($_GET['slip_status'] == "Pending" && $_GET['staff'] == "All" && $_GET['category'] == "All" ){ ?>
                var role = Cookies.get('role');
                    
                if (role == 'Admin') {
                    const ticketTable = $('#ticket-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        pageLength: 6,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                            // paginate: {
                            //     next: ">",
                            //     previous: "<"
                            // },
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/pending"+"/"+filter_month,
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
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                          return '<span class="badge bg-warning text-dark text-uppercase">Pending</span>';
                                    } else{
                                        const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const day = split[2];
                            const month = split[1];
                            const year = split[0];
                            if (current_month == month) {
                              $(nRow).find('td:eq(0)').css('background-color', '#d5eff2');
                            } else {
                              $(nRow).find('td:eq(0)').css('background-color', '');
                            }
                        }
                    });

                    //count pending tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/pending"+"/"+filter_month,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var status = data['slip_status'];
                                var pending = status['Pending'];
                                var dt = new Date(data['date_created']);
                                var date = dt.getMonth();
                                var month = this_month.getMonth();
                                    if (date == month & status == "pending") {
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
                // count all tickets admin
                $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/pending"+"/"+filter_month,
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
                }
                
                <?php } else if($_GET['slip_status'] == "Done" && $_GET['staff'] != "All" && $_GET['category'] == "All" ){ ?>
                var role = Cookies.get('role');
                    
                if (role == 'Admin') {
                    const ticketTable = $('#ticket-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        pageLength: 6,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                            // paginate: {
                            //     next: ">",
                            //     previous: "<"
                            // },
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/print-done/staff"+"/"+staff+"/"+filter_month,
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
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                          return '<span class="badge bg-warning text-dark text-uppercase">Pending</span>';
                                    } else{
                                        const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month) {
                              $(nRow).find('td:eq(0)').css('background-color', '#d5eff2');
                            } else {
                              $(nRow).find('td:eq(0)').css('background-color', '');
                            }
                        }
                    });

                    //count pending tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/print-done/staff"+"/"+staff+"/"+filter_month,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var status = data['slip_status'];
                                var pending = status['Pending'];
                                var dt = new Date(data['date_created']);
                                var date = dt.getMonth();
                                var month = this_month.getMonth();
                                    if (date == month & status == "pending") {
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
                // count all tickets admin
                $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/print-done/staff"+"/"+staff+"/"+filter_month,
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
                }
                
                <?php } else if($_GET['slip_status'] == "Pending" && $_GET['staff'] != "All" && $_GET['category'] == "All" ){ ?>
                var role = Cookies.get('role');
                    
                if (role == 'Admin') {
                    const ticketTable = $('#ticket-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        pageLength: 6,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                            // paginate: {
                            //     next: ">",
                            //     previous: "<"
                            // },
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/pending3"+"/"+staff+"/"+filter_month,
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
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                          return '<span class="badge bg-warning text-dark text-uppercase">Pending</span>';
                                    } else{
                                        const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month) {
                              $(nRow).find('td:eq(0)').css('background-color', '#d5eff2');
                            } else {
                              $(nRow).find('td:eq(0)').css('background-color', '');
                            }
                        }
                    });

                    //count pending tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/pending3"+"/"+staff+"/"+filter_month,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var status = data['slip_status'];
                                var pending = status['Pending'];
                                var dt = new Date(data['date_created']);
                                var date = dt.getMonth();
                                var month = this_month.getMonth();
                                    if (date == month & status == "pending") {
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
                // count all tickets admin
                $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/pending3"+"/"+staff+"/"+filter_month,
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
                }


                <?php } else if($_GET['slip_status'] == "All" && $_GET['staff'] != "All" && $_GET['category'] == "All" ){ ?>
                var role = Cookies.get('role');
                    
                if (role == 'Admin') {
                    const ticketTable = $('#ticket-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        pageLength: 6,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                            // paginate: {
                            //     next: ">",
                            //     previous: "<"
                            // },
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/ticket2"+"/"+staff+"/"+filter_month,
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
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                          return '<span class="badge bg-warning text-dark text-uppercase">Pending</span>';
                                    } else{
                                        const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month && aData.slip_status == "done") {
                              $(nRow).find('td:eq(0)').css('background-color', '#d5eff2');
                            } else {
                              $(nRow).find('td:eq(0)').css('background-color', '');
                            }

                        }
                    });

                    //count pending tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/ticket2"+"/"+staff+"/"+filter_month,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var status = data['slip_status'];
                                var pending = status['Pending'];
                                var dt = new Date(data['date_created']);
                                var date = dt.getMonth();
                                var month = this_month.getMonth();
                                    if (date == month & status == "pending") {
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
                // count all tickets admin
                $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/ticket2"+"/"+staff+"/"+filter_month,
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
                }
                
              
                
                <?php } ?>
                //all tickets
                <?php } else {?>  
                   var role = Cookies.get('role');
                    
                if (role == 'Admin') {
                    const ticketTable = $('#ticket-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        pageLength: 6,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                            // paginate: {
                            //     next: ">",
                            //     previous: "<"
                            // },
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
                                "data": "end_user"
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
                                "targets": -2,
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                          return '<span class="badge bg-warning text-dark text-uppercase">Pending</span>';
                                    } else{
                                        const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month) {
                              $(nRow).find('td:eq(0)').css('background-color', '#d5eff2');
                            } else {
                              $(nRow).find('td:eq(0)').css('background-color', '');
                            }
                        }
                    });
                      //count pending tickets admin
             $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/ticket",
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var status = data['slip_status'];
                                var pending = status['Pending'];
                                var dt = new Date(data['date_created']);
                                var date = dt.getMonth();
                                var month = this_month.getMonth();
                                    if (date == month & status == "pending") {
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
                }      

            <?php }?>  
                //get staff
                $.ajax({
                    method: "GET",
                    url: "<?php echo $domain ?>/user",
                    success: function(response) {
                        // console.log(response)
                        var data = response;
                        if (response) {
                            var sel = $("#staff");
                            for (var i = 0; i < data.length; i++) {
                                sel.append('<option value="' + data[i].id+'">' + data[i].first_name + " "+data[i].last_name +  '</option>');
                            }
                            sel.append('<option value="All">All</option>');
                        } else {
                            console.log('Get request error');
                        }

                    },
                    error: function(error) {
                        console.log(error)

                    }
                })

            }
                });
          
                </script>
    <?php } ?>