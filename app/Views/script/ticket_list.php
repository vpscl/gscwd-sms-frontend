    <!-- ticket list table -->
    <?php if (current_url() == base_url() . "/tickets") { ?>
        <script>
            $(document).ready(function() {
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
                        "columns": [
                            {
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
                            }}, 
                            {
                                "targets": -1,
                                "data": "slip_status",
                                render: function(data) {
                                    if(data == 'pending'){
                                        return '<span class="badge bg-warning  text-dark text-uppercase">'+ data +'</span>';
                                    } else if (data == 'done'){
                                        return '<span class="badge bg-success text-uppercase">'+ data +'</span>';
                                    } else{return null;}
                            }}, 
                            {
                                "targets": -1,
                                "data": "id",
                                render: function(data, type, row) {
                                    return "<a href='<?php echo $local ?>/viewticket" + "?id=" + data + "' id='view_button' class='btn btn-sm btn-primary me-2 view_button'><i class='fa-solid fa-pen-to-square'></i></a>";
                                        // '<a href="#" id="edit_button" class="btn btn-sm btn-success me-2 view_button"><i class="fa-solid fa-pen-to-square"></i></a>';
                                        // '<a href="#" id="delete_button" class="btn btn-sm btn-danger me-2 view_button"><i class="fa-solid fa-trash-can"></i></a>';

                                }
                            }
                        ],
                        
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const d = new Date();
                            const current_month = d.getMonth()+1;
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
                            

                            if(aData.slip_status == "pending"){
                            console.log(diffDays)
                            if (diffDays <= 7) {
                                // $('td', nRow).css('background-color', '#ffdd47');
                                $(nRow).find('td:eq(0)').css('background-color', '#ffdd47');
                            } else if (diffDays <= 14) {
                                $(nRow).find('td:eq(0)').css('background-color', 'orange');
                            }else if (diffDays > 14) {
                                $(nRow).find('td:eq(0)').css('background-color', '#fc6900');
                            }
                        }
                        }
                    });
                }
                if (role == 'Staff') {
                    var id = Cookies.get('id');
                    const ticketTable = $('#ticket-table').DataTable({
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
                            }}, 
                            {
                                "targets": -1,
                                "data": "id",
                                render: function(data, type, row) {
                                    return "<a href='<?php echo $local ?>/viewticket" + "?id=" + data + "' id='view_button' class='btn btn-sm btn-primary me-2 view_button'><i class='fa-solid fa-pen-to-square'></i></a>";
                                        // '<a href="#" id="edit_button" class="btn btn-sm btn-success me-2 view_button"><i class="fa-solid fa-pen-to-square"></i></a>';
                                        // '<a href="#" id="delete_button" class="btn btn-sm btn-danger me-2 view_button"><i class="fa-solid fa-trash-can"></i></a>';

                                }
                            }
                        ],
                        
                        fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                            
                            const d = new Date();
                            const current_month = d.getMonth()+1;
                            const split = aData.date_requested.split('-');
                            const month = split[1];

                            if (current_month == month && aData.slip_status == "done") {
                                $(nRow).find('td:eq(0)').css('background-color', '#d5eff2');
                            } else {
                                $(nRow).find('td:eq(0)').css('background-color', '');
                            }

                            var req = new Date(aData.date_requested);
                            var diffTime = d.getTime() - req.getTime();
                            var diffDays = Math.ceil(diffTime /(1000 * 3600 * 24))-1;
                            

                            if(aData.slip_status == "pending"){
                            console.log(diffDays)
                            if (diffDays <= 7) {
                                // $('td', nRow).css('background-color', '#ffdd47');
                                $(nRow).find('td:eq(0)').css('background-color', '#ffdd47');
                            } else if (diffDays <= 14) {
                                $(nRow).find('td:eq(0)').css('background-color', 'orange');
                            }else if (diffDays > 14) {
                                $(nRow).find('td:eq(0)').css('background-color', '#fc6900');
                            }
                        }
                        }
                    });
                }
            });
        </script>
    <?php } ?>