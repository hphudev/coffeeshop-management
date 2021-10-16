<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSS Files -->
    <link href="../assets_control/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <style>
        body {
            border: 2px solid wheat;
            background-color: wheat;
            overflow: hidden;
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
        }

        body::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="orange" data-background-color="black" data-image="../assets_control/img/sidebar-1.jpg">
            <div class="logo">
                <a href="index.php?page=home" class="simple-text logo-normal">
                    Coffee family
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=statistic">
                            <i class="material-icons">insert_chart_outlined</i>
                            <p>THỐNG KÊ</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=sale">
                            <i class="material-icons">storefront</i>
                            <p>BÁN HÀNG</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=table">
                            <i class="material-icons">table_rows </i>
                            <p>QUẢN LÝ BÀN</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=staff">
                            <i class="material-icons">groups</i>
                            <p>QUẢN LÝ NHÂN SỰ</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=werehouse">
                            <i class="material-icons">sticky_note_2</i>
                            <p>QUẢN LÝ KHO</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=financial">
                            <i class="material-icons">attach_money</i>
                            <p>QUẢN LÝ TÀI CHÍNH</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=account">
                            <i class="material-icons">perm_contact_calendar</i>
                            <p>TÀI KHOẢN CỦA BẠN</p>
                        </a>
                    </li>
                    <li class="nav-item active-pro">
                        <a class="nav-link" href="../index.html">
                            <i class="material-icons">logout</i>
                            <p>ĐĂNG XUẤT</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel overflow-hidden">
            <!-- Navbar -->
            <nav class="
            navbar navbar-expand-lg navbar-transparent navbar-absolute
            fixed-top">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="scrollbar scrollbar-primary" style="height: 100%; width: 100%">
                <?php
                if (isset($_REQUEST['page'])) {
                    $page = $_REQUEST['page'];
                    switch ($page) {
                        case 'statistic':
                            include './statistic.php';
                            break;
                        case 'staff':
                            include './staff.php';
                            break;
                        case 'account':
                            include './account.php';
                            break;
                        case 'sale':
                            include './sale.php';
                            break;
                        case 'table':
                            include './table.php';
                            break;
                        case 'werehouse':
                            include './werehouse.php';
                            break;
                        case 'financial':
                            include './financial.php';
                            break;
                        default:
                            include './home.php';
                            break;
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- #region  -->

    <!--   Core JS Files   -->
    <script src="../assets_control/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="../assets_control/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets_control/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="../assets_control/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="../assets_control/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets_control/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets_control/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
    <!-- #endregion -->
</body>

</html>