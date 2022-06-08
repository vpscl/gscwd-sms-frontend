
    <?php

if (current_url() == base_url() . "/report") { ?>
    <script>
$(document).ready(function() {
    var role = Cookies.get('role');
    if (role == 'Staff') {
                    const d = new Date();
                    let current_month = d.getMonth()+1;
                    var role = Cookies.get('role');
                    var staff_id = Cookies.get('id');
                    const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const status = urlParams.get('slip_status')
                const category = urlParams.get('category')
                const filter_month = urlParams.get('month')
                                document.getElementById("status-name").value = status;
                                document.getElementById("status-name").innerHTML = status;
                                document.getElementById("category-name").value = category;
                                document.getElementById("category-name").innerHTML = category;
                                var months = ["","January","February","March","April","May","June","July","August","September","October","November","December"];
                                document.getElementById("month-name").value = filter_month;
                                document.getElementById("month-name").innerHTML = months[filter_month];
                    <?php if(isset($_GET['category']) && isset($_GET['slip_status'] ) && $_GET['slip_status'] == "All" && $_GET['category'] == "All" ){ ?>
       
                    var role = Cookies.get('role');
                    var staff_id = Cookies.get('id');

                    if (role == 'Staff') {
                        const ticketTable = $('#ticket-table').DataTable({
                            dom: "ftpr",
                            bSort: false,
                            responsive: true,
                            pageLength: 6,
                            language: {
                                search: "_INPUT_",
                                searchPlaceholder: "Search",
                                
                            },
                            "order": [
                                [0, "desc"]
                            ],
                            "ajax": {
                                method: "GET",
                                url: "<?php echo $domain ?>/ticket2"+"/"+staff_id+"/"+filter_month,
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
                                            return '<span class="badge  text-dark bg-warning  text-uppercase">pending</span>';
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
                                var req = new Date(aData.date_requested);
                            var diffTime = d.getTime() - req.getTime();
                            var diffDays = Math.ceil(diffTime /(1000 * 3600 * 24))-1;
                            
 
                            }
                        });
                          //count pending tickets admin
                 $.ajax({
                            method: "GET",
                            url: "<?php echo $domain ?>/ticket2"+"/"+staff_id+"/"+filter_month,
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
                            url: "<?php echo $domain ?>/ticket2"+"/"+staff_id+"/"+filter_month,
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

                    // slip = done/pending , category = all
                <?php }else if(isset($_GET['category']) && isset($_GET['slip_status'] ) && $_GET['slip_status'] != "All" && $_GET['category'] == "All" ){ ?>

                if(status == "Pending"){
                var slipstatus = "pending"
            }else if(status == "Done"){
                var slipstatus = "done"
            }

                    var role = Cookies.get('role');
                    var staff_id = Cookies.get('id');

                    if (role == 'Staff') {
                        const ticketTable = $('#ticket-table').DataTable({
                            dom: "ftpr",
                            bSort: false,
                            responsive: true,
                            pageLength: 6,
                            language: {
                                search: "_INPUT_",
                                searchPlaceholder: "Search",
                                
                            },
                            "order": [
                                [0, "desc"]
                            ],
                            "ajax": {
                                method: "GET",
                                url: "<?php echo $domain ?>/staff"+"/"+staff_id+"/"+slipstatus+"/"+filter_month,
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
                                            return '<span class="badge  text-dark bg-warning  text-uppercase">pending</span>';
                                        } else{
                                             const d = new Date(data);
                                    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                                    const month = d.getMonth();
                                    const day = d.getDate();
                                    const year = d.getFullYear();
                                        return months[month]+" "+day+", "+year;
                                        }
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

                                var req = new Date(aData.date_requested);
                            var diffTime = d.getTime() - req.getTime();
                            var diffDays = Math.ceil(diffTime /(1000 * 3600 * 24))-1;
                            
 
                            }
                        });
                          //count pending tickets admin
                 $.ajax({
                            method: "GET",
                            url: "<?php echo $domain ?>/print-done/staff"+"/"+staff_id+"/"+filter_month,
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
                            url: "<?php echo $domain ?>/print-done/staff"+"/"+staff_id+"/"+filter_month,
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
                        

                    // Status ALL , Category = hardware/software
                    <?php }else if(isset($_GET['category']) && isset($_GET['slip_status'] ) && $_GET['slip_status'] == "All" && $_GET['category'] != "All" ){ ?>
                if(status == "Pending"){
                var slipstatus = "pending"
            }else if(status == "Done"){
                var slipstatus = "done"
            }
              
                                document.getElementById("status-name").value = status;
                                document.getElementById("status-name").innerHTML = status;
                                document.getElementById("category-name").value = category;
                                document.getElementById("category-name").innerHTML = category;
                    var role = Cookies.get('role');
                    var staff_id = Cookies.get('id');

                    if (role == 'Staff') {
                        const ticketTable = $('#ticket-table').DataTable({
                            dom: "ftpr",
                            bSort: false,
                            responsive: true,
                            language: {
                                search: "_INPUT_",
                                searchPlaceholder: "Search",
                                
                            },
                            "order": [
                                [0, "desc"]
                            ],
                            "ajax": {
                                method: "GET",
                                url: "<?php echo $domain ?>/slip_status"+"/"+staff_id+"/"+category+"/"+filter_month,
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
                                            return '<span class="badge  text-dark bg-warning  text-uppercase">pending</span>';
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

                                var req = new Date(aData.date_requested);
                            var diffTime = d.getTime() - req.getTime();
                            var diffDays = Math.ceil(diffTime /(1000 * 3600 * 24))-1;
                            
 
                            }
                        });
                          //count pending tickets admin
                 $.ajax({
                            method: "GET",
                            url: "<?php echo $domain ?>/slip_status"+"/"+staff_id+"/"+category+"/"+filter_month,
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
                            url: "<?php echo $domain ?>/slip_status"+"/"+staff_id+"/"+category+"/"+filter_month,
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

    

                    // Status ALL , Category = hardware/software
                <?php }else if(isset($_GET['category']) AND isset($_GET['slip_status'] ) AND $_GET['slip_status'] != "All" AND $_GET['category'] != "All" ){ ?>
                if(status == "Pending"){
                var slipstatus = "pending"
            }else if(status == "Done"){
                var slipstatus = "done"
            }
              
                                document.getElementById("status-name").value = status;
                                document.getElementById("status-name").innerHTML = status;
                                document.getElementById("category-name").value = category;
                                document.getElementById("category-name").innerHTML = category;
                    var role = Cookies.get('role');
                    var staff_id = Cookies.get('id');

                    if (role == 'Staff') {
                        const ticketTable = $('#ticket-table').DataTable({
                            dom: "ftpr",
                            bSort: false,
                            responsive: true,
                            language: {
                                search: "_INPUT_",
                                searchPlaceholder: "Search",
                                
                            },
                            "order": [
                                [0, "desc"]
                            ],
                            "ajax": {
                                method: "GET",
                                url: "<?php echo $domain ?>/report/staff"+"/"+staff_id+"/"+slipstatus+"/"+category+"/"+filter_month,
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
                                            return '<span class="badge  text-dark bg-warning  text-uppercase">pending</span>';
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
                                var req = new Date(aData.date_requested);
                            var diffTime = d.getTime() - req.getTime();
                            var diffDays = Math.ceil(diffTime /(1000 * 3600 * 24))-1;
                            
 
                            }
                        });
                          //count pending tickets admin
                 $.ajax({
                            method: "GET",
                            url: "<?php echo $domain ?>//report/staff"+"/"+staff_id+"/"+slipstatus+"/"+category+"/"+filter_month,
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
                            url: "<?php echo $domain ?>/report/staff"+"/"+staff_id+"/"+slipstatus+"/"+category+"/"+filter_month,
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

    
                <?php } else { ?>     

              
                                document.getElementById("status-name").value = "";
                                document.getElementById("status-name").innerHTML = "--";
                                document.getElementById("category-name").value = "";
                                document.getElementById("category-name").innerHTML = "--";
                                document.getElementById("month-name").value = "";
                                document.getElementById("month-name").innerHTML = "--";
                    var role = Cookies.get('role');
                    var staff_id = Cookies.get('id');

                    if (role == 'Staff') {
                        const ticketTable = $('#ticket-table').DataTable({
                            dom: "ftpr",
                            bSort: false,
                            responsive: true,
                            pageLength: 6,
                            language: {
                                search: "_INPUT_",
                                searchPlaceholder: "Search",
                                
                            },
                            "order": [
                                [0, "desc"]
                            ],
                            "ajax": {
                                method: "GET",
                                url: "<?php echo $domain ?>/Ticket"+"/"+staff_id,
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
                                            return '<span class="badge  text-dark bg-warning  text-uppercase">pending</span>';
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
                                const cancel = aData.status;
                                if (cancel == "deleted") {
                                   $(nRow).find('td:eq(0)').css('background-color', '#f59a9a');
                                }
                                var req = new Date(aData.date_requested);
                            var diffTime = d.getTime() - req.getTime();
                            var diffDays = Math.ceil(diffTime /(1000 * 3600 * 24))-1;
                            
 
                            }
                        });
                          //count pending tickets admin
                 $.ajax({
                            method: "GET",
                            url: "<?php echo $domain ?>/Ticket"+"/"+staff_id,
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
                            url: "<?php echo $domain ?>/Ticket"+"/"+staff_id,
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

    }
                            });
    </script>
    
    <?php } ?>