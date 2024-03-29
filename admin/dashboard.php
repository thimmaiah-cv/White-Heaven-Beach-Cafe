<?php
require "../conn.php";
session_start();

if (!isset($_SESSION['authAdmin'])) {
?>
    <script>
        window.location.href = "./index.php";
    </script>
<?php
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <title>White Heaven Beach Cafe</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/styleAdminDashboard.css">
    <link rel="stylesheet" href="../font/stylesheet.css">
    <link rel="stylesheet" href="../font/lato_stylesheet.css">
</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-2 d-flex justify-content-between py-4 bg-white sideNavBar">
                <img src="../images/logo_transparent.png" alt="White Heaven Beach Cafe" class="brandLogoImg d-flex align-self-center justify-content-center">

                <div class="navLinksDiv container d-flex py-3">
                    <ul class="row row-gap-4 m-0 p-0">
                        <li class="navBarItem activeNavItem rounded">
                            <a href="./dashboard.php" class="d-flex gap-1 align-items-center fw-medium py-2 px-2">
                                <img src="../icons/dashboard_white.png" alt="dashboard">
                                Dashboard
                            </a>
                        </li>
                        <li class="navBarItem">
                            <a href="./orders.php" class="d-flex gap-1 align-items-center fw-medium py-1 px-2">
                                <img src="../icons/orders_black.png" alt="orders">
                                Orders
                            </a>
                        </li>
                        <li class="navBarItem">
                            <a href="./tables.php" class="d-flex gap-1 align-items-center fw-medium py-1 px-2">
                                <img src="../icons/tables_black.png" alt="tables">
                                Tables
                            </a>
                        </li>
                        <li class="navBarItem">
                            <a href="./foodcategory.php" class="d-flex gap-1 align-items-center fw-medium py-1 px-2">
                                <img src="../icons/foodcategory_black.png" alt="food category">
                                Food Category
                            </a>
                        </li>
                        <li class="navBarItem">
                            <a href="./fooditem.php" class="d-flex gap-1 align-items-center fw-medium py-1 px-2">
                                <img src="../icons/fooditem_black.png" alt="food item">
                                Food Item
                            </a>
                        </li>
                    </ul>
                </div>

                <?php
                $admin_id = $_SESSION['adminUserId'];
                $adminName = $_SESSION['adminUsername'];
                $adminEmailID = $_SESSION['adminEmail'];
                $adminPhone = $_SESSION['adminPhone'];
                $adminRole = $_SESSION['adminRole'];

                $queryGetProfilePic = "SELECT * FROM admin WHERE admin_id='$admin_id'";
                $result = mysqli_query($conn, $queryGetProfilePic);
                $row = mysqli_fetch_array($result);
                $photo = base64_encode(base64_decode($row['admin_photo']));
                ?>

                <div class="profileSection d-flex flex-column row-gap-2 container">
                    <div class="row container d-flex profileDiv" onclick="document.location.href='./adminProfile.php'">
                        <?php echo '<img src="data:image;base64,' . $photo . '" alt="Profile Picture" class="d-flex rounded m-0 p-0 justify-content-center col-sm-3 profilePic">'; ?>
                        <div class="row col-sm-8 mx-0 d-flex">
                            <span class="h6 m-0 p-0 fw-bold"><?php echo "$adminName"; ?></span>
                            <span class="h6 m-0 p-0 fw-medium"><?php echo "$adminRole"; ?></span>
                        </div>
                    </div>
                    <button onclick="document.location.href='./logoutAdmin.php'" class="logoutBtn rounded d-flex align-items-center justify-content-center gap-1">
                        <img src="../icons/logout_white.png" alt="Logout" class="logoutIcon">
                        Logout
                    </button>
                </div>
            </div>

            <div class="col-sm-10 d-flex flex-column p-2 dashboardBodyDiv">
                <div class="bg-success container d-flex flex-column align-items-center">
                    <h1 class="h4 fw-medium bg-warning align-self-start">Welcome, <?php echo "$adminName"; ?></h1>
                    <div class="row row-cols-5 m-0 p-0 bg-warning">
                        <div class="col m-2 bg-danger">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, eos odio? Hic, aperiam iusto. Laborum maxime unde eveniet ullam et.</div>
                        <div class="col m-2 bg-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, eos odio? Hic, aperiam iusto. Laborum maxime unde eveniet ullam et.</div>
                        <div class="col m-2 bg-primary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, eos odio? Hic, aperiam iusto. Laborum maxime unde eveniet ullam et.</div>
                        <div class="col m-2 bg-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, eos odio? Hic, aperiam iusto. Laborum maxime unde eveniet ullam et.</div>
                        <div class="col m-2 bg-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, eos odio? Hic, aperiam iusto. Laborum maxime unde eveniet ullam et.</div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>