<script>
    $(document).ready(function() {


        const incidentTable = $('#incident-table').DataTable({
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
                            url: "<?php echo $domain ?>/incident",
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
                                "data": "incident"
                            },
                            {
                                "data": "reporter_name"
                            },
                            {
                                "data": "division"
                            }, 
                            {
                                "targets": -1,
                                "data": "information_source",
                                render: function(data) {
                                    if(data == 'RED'){
                                        return '<span class="badge bg-danger text-uppercase">'+ data +'</span>';
                                    } else if (data == 'AMBER'){
                                        return '<span class="badge bg-warning text-uppercase">'+ data +'</span>';
                                    }else if (data == 'GREEN'){
                                        return '<span class="badge bg-success text-uppercase">'+ data +'</span>';
                                    }else if (data == 'WHITE'){
                                        return '<span class="badge text-dark bg-light text-uppercase">'+ data +'</span>';
                                    }else{return null;}
                            }},
                            {
                                "data": "attack_vector"
                            },
                            {
                                "targets": -1,
                                "data": "report_date",
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
                                "data": "id",
                                render: function(data, type, row) {
                                    return "<a href='<?php echo $local ?>/view-incident" + "?id=" + data + "' id='view_button' class='btn btn-sm btn-primary me-2 view_button'><i class='fa-solid fa-pen-to-square'></i></a>";
                                }
                            }
                        ]
                    });

    })
</script>