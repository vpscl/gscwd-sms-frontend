<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php if (current_url() === base_url() . "/login") {
            echo "Login | Service Management System";
        } elseif (current_url() === base_url() . "/signup") {
            echo "Sign Up | Service Management System";
        } elseif (current_url() === base_url() . "/dashboard") {
            echo "Dashboard | Service Management System";
        }  elseif (current_url() === base_url() . "/tickets" || 
        current_url() === base_url() . "/newticket" ||
        current_url() === base_url() . "/viewticket")
        {
            echo "Tickets | Service Management System";
        } elseif (current_url() === base_url() . "/report" ||
        current_url() === base_url() . "/printreport" ||
        current_url() === base_url() . "/printreport-staff") {
            echo "Reports | Service Management System";
        } elseif (current_url() === base_url() . "/printslip") {
            echo "Service Slip";
        } elseif (current_url() === base_url() . "/incident" ||
        current_url() === base_url() . "/view-incident" ||
        current_url() === base_url() . "/new-incident") {
            echo "Incident Report";
        }
        ?>
    </title>
    
    <script src="assets/js/jquery.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
    <script src="assets/js/js.cookie.min.js"></script>


 <?php  if (current_url() !== base_url() . "/printreport" && current_url() !== base_url() . "/printreport-staff" && current_url() !== base_url() . "/printslip" ) {?>
    <link rel="stylesheet" href="assets/css/globals/boilerplate.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <?php }
?>

    <?php if (current_url() === base_url() . "/login") {
        echo "<link rel='stylesheet' href='assets/css/login.css'>
        <script>if (Cookies.get('id') != null) {location.href = '$local/dashboard';}</script>";
    }  if (current_url() !== base_url() . "/login" && current_url() !== base_url() . "/signup") {
        echo "<link rel='stylesheet' href='assets/css/style.css'>
        <link href='assets/css/navbar.css' rel='stylesheet'>
        <script>if (Cookies.get('id') == null) {location.href = '$local/login';}</script>
        ";
    } elseif (current_url() === base_url() . "/signup") {
        echo "<link rel='stylesheet' href='assets/css/signup.css'>";
    }
    ?>

</head>


<body>

<?php 
if(current_url() !== base_url() . "/login" && current_url() !== base_url() . "/signup" && current_url() !== base_url() . "/printslip" && current_url() !== base_url() . "/printreport" && current_url() !== base_url() . "/printreport-staff"){?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

   
    <div class="header__toggle">
        <i class='bx bx-menu fs-3 mt-2' id="header-toggle"></i>
      </div>


      <p class="h4 mb-0 text-gray-800">
      <?php if (current_url() === base_url() . "/dashboard") {
            echo "Dashboard";
        } elseif (current_url() === base_url() . "/tickets") {
            echo "Tickets";
        }elseif (current_url() === base_url() . "/newticket") {
            echo "New Ticket";
        }elseif (current_url() === base_url() . "/viewticket") {
            echo "View Ticket";
        }elseif (current_url() === base_url() . "/report") {
            echo "Reports";
        }elseif (current_url() === base_url() . "/printreport") {
            echo "Reports";
        }elseif (current_url() === base_url() . "/printreport-staff") {
            echo "Reports";
        }elseif (current_url() === base_url() . "/incident") {
            echo "Incident Report";
        }elseif (current_url() === base_url() . "/view-incident") {
            echo "View Incident Report";
        }elseif (current_url() === base_url() . "/new-incident") {
            echo "New Incident Report";
        }
        ?>
      </p>


      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span id="user_name" class="mr-2 d-none d-lg-inline text-gray-600">
              <script>var name = Cookies.get('name');
              document.write(name);
            </script>
            </span>
            <i class='bx bxs-user-circle' style='color:#4361ee; font-size: 24px;'></i>
          </a>
        </li>
      </ul>
    </nav>
    
<?php }
?>
