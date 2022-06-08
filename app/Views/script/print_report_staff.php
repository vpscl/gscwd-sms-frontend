<?php if (current_url() == base_url() . "/printreport-staff") { ?>
 
 <script>
$(document).ready(function() {
    var role = Cookies.get('role');

    if (role == 'Staff') {
        var staff_id = Cookies.get('id');
        const d = new Date();
        let current_month = d.getMonth()+1;
        var date = new Date();
        const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const status = urlParams.get('slip_status')
                const category = urlParams.get('category')
                const filter_month = urlParams.get('month')
        var months = ["","January","February","March","April","May","June","July","August","September","October","November","December"];
                document.getElementById("month").innerHTML = months[filter_month];
                document.getElementById("category").innerHTML = category;
        document.getElementById("staff").innerHTML = Cookies.get('name');;
        
        <?php if(isset($_GET['category']) && isset($_GET['slip_status'] ) && $_GET['slip_status'] == "Done" && $_GET['category'] == "All"){ ?>

                var role = Cookies.get('role');  
                if(status == "Pending"){
                var slipstatus = "pending"
            }else if(status == "Done"){
                var slipstatus = "done"
            }
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
                            url: "<?php echo $domain ?>/print-done/staff"+"/"+staff_id+"/"+filter_month,
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
                        url: "<?php echo $domain ?>/print-done/staff"+"/"+staff_id+"/"+filter_month,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var slipstatus = data['slip_status'];
                                var dt = new Date(data['date_created']);
                                var date = dt.getMonth();
                                var month = this_month.getMonth();
                                    if (slipstatus == "done") {
                                        count++
                                    }
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
                        url: "<?php echo $domain ?>/print-done/staff"+"/"+staff_id+"/"+filter_month,
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
                                    if (slipstatus == "done") {
                                        count++
                                    }
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
                


                    <?php }else if(isset($_GET['category']) && isset($_GET['slip_status'] ) && $_GET['slip_status'] == "Done" && $_GET['category'] != "All"){ ?>

                var role = Cookies.get('role');  
                if(status == "Pending"){
                var slipstatus = "pending"
            }else if(status == "Done"){
                var slipstatus = "done"
            }
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
                        url: "<?php echo $domain ?>/report/staff"+"/"+staff_id+"/"+slipstatus+"/"+category+"/"+filter_month,
                        success: function(response) {
                            var this_month = new Date();
                            var count = 0;
                            for (i = 0; i < response.length; i++) {
                                var data = response[i];
                                var slipstatus = data['slip_status'];
                                var dt = new Date(data['date_created']);
                                var date = dt.getMonth();
                                var month = this_month.getMonth();
                                    if (slipstatus == "done") {
                                        count++
                                    }
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
                        url: "<?php echo $domain ?>/report/staff"+"/"+staff_id+"/"+slipstatus+"/"+category+"/"+filter_month,
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
                                    if (slipstatus == "done") {
                                        count++
                                    }
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
                


          
<?php }?>




}

});
</script>            
<?php } ?>