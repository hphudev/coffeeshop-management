<!DOCTYPE html>
<html lang="en">

<head>
    <!-- #region  -->
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" , name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--  Fonts and icons  -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- Material Kit CSS -->
    <link href="assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
    <link rel="stylesheet" href="../style_master.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- #endregion -->

    <style>

    </style>

    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
    <div class="vw-100 vh-100" style="width: fit-content; background-color: black">
        <img src="./resources/images/coffee_logo_expand.png" alt="Coffee Family" style="background-color: rgb(0, 0, 0); margin: 10px" />
        <div class="container-fluid" style="margin-top: 5vh; overflow: hidden">
            <div class="row" style="width: 100vw; overflow: hidden">
                <div class="col">

                    <div class="text-light text-center" style="margin-top: 20vh; transform: translateY(-50%)">
                        <h1> 404 - NOT FOUND</h1>

                        <h3>
                            Dường như địa chỉ bạn đang cố truy cập không tồn tại hoặc đã bị gỡ bỏ
                        </h3>

                        <button id="btnMainPage" class="btn btn-danger">
                            Về trang chủ
                        </button>
                    </div>
                </div>
                <div class="col text-right" style="width: 100%; padding: 0%">
                    <img src="./resources/images/shop-img.png" alt="Coffee Family" />
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#btnMainPage').click(function() {
                window.location.href = '../index.php'
            })
        })
    </script>
    <!--   Core JS Files   -->

    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>

    <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <!-- #endregion -->
</body>

</html>