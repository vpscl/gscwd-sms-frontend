   <!-----------Print Reports  ---------------------------------------------->

   <?php if (current_url() == base_url() . "/printreport") {
        
        ?>

        <script>
            var role = Cookies.get('role');  
            $(document).ready(function() {
                const d = new Date();
                let current_month = d.getMonth()+1;
    
                <?php if(isset($_GET['staff']) && isset($_GET['slip_status'] ) && isset($_GET['category'] )){ ?>
                    const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const staff = urlParams.get('staff')
                const status = urlParams.get('slip_status')
                const category = urlParams.get('category')
                const filter_month = urlParams.get('month')
                var months = ["","January","February","March","April","May","June","July","August","September","October","November","December"];
                document.getElementById("month").innerHTML = months[filter_month];
                document.getElementById("category").innerHTML = category;


                //if slip status not "All"
                <?php  if($_GET['staff'] == "All" && $_GET['slip_status'] == "Done" && $_GET['category'] != "All" ){ ?>
                var role = Cookies.get('role');  
                if(status == "Pending"){
                var slipstatus = "pending"
            }else if(status == "Done"){
                var slipstatus = "done"
            }

                if (role == 'Admin') {
                    const ticketTable = $('#print-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        bPaginate: false,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                           
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/"+ slipstatus + "/"+ category +"/"+ filter_month ,
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
                                "data": "date_requested"
                            },
                            {
                                "targets": -1,
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                        return '<span class="badge bg-warning text-dark text-uppercase">pending</span>';
                                    } else{
                                        return data;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month) {
                                $('td', nRow).css('background-color', '#DEF1F5');
                            } else {
                                $('td', nRow).css('background-color', '');
                            }
                        }
                    });

                    //count pending tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/"+ slipstatus + "/"+ category +"/"+ filter_month ,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                count++
                            }
                            if (response) {
                                document.getElementById("accomplished").innerHTML = count;
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
                        url: "<?php echo $domain ?>/"+ slipstatus + "/"+ category +"/"+ filter_month ,
                        success: function(response) {
                           
                            if (response.length > 0) {
                                //count all ticket in current month    
                                var count = 0;
                                var this_month = new Date();
                                for (i = 0; i < response.length; i++) {
                                    count++
                                }
                                document.getElementById("requested").innerHTML = count;
                            } else {
                                var count = 0;
                                document.getElementById("requested").innerHTML = count;
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
            
                if (role == 'Admin') {
                    const ticketTable = $('#print-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        bPaginate: false,
                        search: {
                            search: category
                            },
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                           
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/donestaff"+"/"+ staff +"/"+ category+"/"+ filter_month,
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
                                "data": "date_requested"
                            },
                            {
                                "targets": -1,
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                        return '<span class="badge bg-warning text-dark text-uppercase">pending</span>';
                                    } else{
                                        return data;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month) {
                                $('td', nRow).css('background-color', '#DEF1F5');
                            } else {
                                $('td', nRow).css('background-color', '');
                            }
                        }
                        
                    });
                   
                // count all tickets admin 
                $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/donestaff"+"/"+ staff +"/"+ category+"/"+ filter_month,
                        success: function(response) {
                           
                            if (response.length > 0) {
                                //count all ticket in current month    
                                var count = 0;
                                var this_month = new Date();
                                for (i = 0; i < response.length; i++) {
                                    count++
                                }
                                document.getElementById("requested").innerHTML = count;
                                document.getElementById("accomplished").innerHTML = count;
                            } else {
                                var count = 0;
                                document.getElementById("requested").innerHTML = count;
                                document.getElementById("accomplished").innerHTML = count;
                            }

                        },
                        error: function(error) {
                            console.log(error)

                        }
                    })
                    
                }
                
                <?php } else if($_GET['staff'] != "All" && $_GET['slip_status'] == "Done" && $_GET['category'] == "All" ){ ?>
                var role = Cookies.get('role');  
                if(status == "Pending"){
                var slipstatus = "pending"
            }else if(status == "Done"){
                var slipstatus = "done"
            }

                if (role == 'Admin') {
                    const ticketTable = $('#print-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        bPaginate: false,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                           
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/print-done"+"/staff"+"/"+staff+"/"+filter_month ,
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
                                "data": "date_requested"
                            },
                            {
                                "targets": -1,
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                        return '<span class="badge bg-warning text-dark text-uppercase">pending</span>';
                                    } else{
                                        return data;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month) {
                                $('td', nRow).css('background-color', '#DEF1F5');
                            } else {
                                $('td', nRow).css('background-color', '');
                            }
                        }
                    });

                    //count pending tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/print-done"+"/staff"+"/"+staff+"/"+filter_month ,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                count++
                            }
                            if (response) {
                                document.getElementById("accomplished").innerHTML = count;
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
                        url: "<?php echo $domain ?>/print-done"+"/staff"+"/"+staff+"/"+filter_month,
                        success: function(response) {
                           
                            if (response.length > 0) {
                                //count all ticket in current month    
                                var count = 0;
                                var this_month = new Date();
                                for (i = 0; i < response.length; i++) {
                                    count++
                                }
                                document.getElementById("requested").innerHTML = count;
                            } else {
                                var count = 0;
                                document.getElementById("requested").innerHTML = count;
                            }

                        },
                        error: function(error) {
                            console.log(error)

                        }
                    })
                }
            <?php } else if($_GET['staff'] == "All" && $_GET['slip_status'] == "Done" && $_GET['category'] == "All" ){ ?>
                var role = Cookies.get('role');  
                if(status == "Pending"){
                var slipstatus = "pending"
            }else if(status == "Done"){
                var slipstatus = "done"
            }

                if (role == 'Admin') {
                    const ticketTable = $('#print-table').DataTable({
                        dom: "ftpr",
                        bSort: false,
                        responsive: true,
                        bPaginate: false,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: "Search",
                           
                        },
                        "order": [
                            [0, "desc"]
                        ],
                        "ajax": {
                            method: "GET",
                            url: "<?php echo $domain ?>/done-all"+"/"+filter_month ,
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
                                "data": "date_requested"
                            },
                            {
                                "targets": -1,
                                "data": "date_ended",
                                render: function(data) {
                                    if(data == "0000-00-00"){
                                        return '<span class="badge bg-warning text-dark text-uppercase">pending</span>';
                                    } else{
                                        return data;}
                            }},
                            {
                                "data": "created_by"
                            }
                        ],
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month) {
                                $('td', nRow).css('background-color', '#DEF1F5');
                            } else {
                                $('td', nRow).css('background-color', '');
                            }
                        }
                    });

                    //count pending tickets admin
                    $.ajax({
                        method: "GET",
                        url: "<?php echo $domain ?>/done-all"+"/"+filter_month ,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                count++
                            }
                            if (response) {
                                document.getElementById("accomplished").innerHTML = count;
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
                        url: "<?php echo $domain ?>/done-all"+"/"+filter_month ,
                        success: function(response) {
                           
                            if (response.length > 0) {
                                //count all ticket in current month    
                                var count = 0;
                                var this_month = new Date();
                                for (i = 0; i < response.length; i++) {
                                    count++
                                }
                                document.getElementById("requested").innerHTML = count;
                            } else {
                                var count = 0;
                                document.getElementById("requested").innerHTML = count;
                            }

                        },
                        error: function(error) {
                            console.log(error)

                        }
                    })
                }
                
 
                <?php } ?>
                //all tickets
                <?php } ?>
            });
                </script>
    <?php } ?>