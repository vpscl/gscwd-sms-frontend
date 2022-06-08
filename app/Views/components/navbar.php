<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <div class="nav" id="navbar">
            <nav class="nav__container">
                <div>
                    <a href="/dashboard" class="nav__link nav__logo">
                        <img src="assets/images/gswd-icon-white.png" alt="">
                        <span class="nav__logo-name"> <span>Service Management</span> <br> System</span>
                    </a>

                    <div class="nav__list">
                        <div class="nav__items">

                            <a href="/dashboard" class="nav__link active">
                                <i class='bx bx-home nav__icon'></i>
                                <span class="nav__name">Dashboard</span>
                            </a>

                            <div class="nav__dropdown">
                                <a href="/tickets" class="nav__link">
                                    <i class='bx bx-user nav__icon'></i>
                                    <span class="nav__name">Tickets</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="/tickets" class="nav__dropdown-item">List</a>
                                        <a href="/newticket" class="nav__dropdown-item">Add New Ticket</a>
                                        <!-- <a href="#" class="nav__dropdown-item">Accounts</a> -->
                                    </div>
                                </div>
                            </div>
    
                            <a href="/report" class="nav__link">
                                    <i class='bx bx-file nav__icon'></i>
                                    <span class="nav__name">Reports</span>
                            </a>

                            <a href="/incident" class="nav__link">
                                    <i class='bx bx-error-alt nav__icon'></i>
                                    <span class="nav__name">Incident Report</span>
                            </a>                    
                            <a href="#" class="nav__link" id="logout">
                              <i class='bx bx-log-out nav__icon'></i>
                                 <span class="nav__name">Logout</span>
                             </a>

                        </div>

                    </div>

                   <div id="closeBtn" style="position: absolute; left: 50%; transform: translate(-50%, 0);"><i class='bx bxs-x-circle text-white mt-4 fs-5' style="cursor: pointer;"></i></div>
                </div>

                
            </nav>
        </div>