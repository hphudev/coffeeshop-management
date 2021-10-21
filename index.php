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
  <link rel="stylesheet" href="style_master.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
  <script src="assets/js/core/jquery.min.js"></script>
  <!-- #endregion -->

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Ephesis&display=swap");

    body {
      -ms-overflow-style: none;
      /* IE and Edge */
      scrollbar-width: none;
    }

    body::-webkit-scrollbar {
      display: none;
    }
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
            <h1 style="text-align: center; font-family: 'Ephesis', cursive">
              Coffee Family
            </h1>
            <h3 style="font-family: 'Ephesis', cursive">
              Với hơn 20 năm đồng hành cùng khách hàng, Coffee Family tự hào
              vì là một giải pháp phần mềm hiệu quả cho các nhà quản lý kinh
              doanh trong lĩnh vực ăn uống. <br />
              Đầy đủ, linh hoạt và hiệu quả là mục tiêu mà chúng tôi hướng đến
              cho bạn.
            </h3>
          </div>
          <div class="container-fluid text-center" style="margin-top: -50px">
            <button id="btnDK" class="btn btn-round bg-success text-light" style="width: 30%; font-weight: bold">
              Đăng ký
            </button>
            <button class="btn btn-round bg-danger text-light" data-toggle="modal" data-target="#loginModal" type="button" style="width: 30%; margin-left: 30px; font-weight: bold">
              Đăng nhập
            </button>
          </div>
        </div>
        <div class="col text-right" style="width: 100%; padding: 0%">
          <img src="./resources/images/shop-img.png" alt="Coffee Family" />
        </div>
      </div>
    </div>
  </div>
  <!-- #region Đăng nhập -->

  <div class="modal fade" id="loginModal" tabindex="-1" role="" style="padding-top: 8%">
    <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
        <div class="card card-signup card-plain">
          <div class="modal-header bg-dark">
            <div class="card-header card-header-danger text-center" style="width: 9rem">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="material-icons text-light">clear</i>
              </button>

              <h4 class="card-title">Đăng nhập</h4>
            </div>
          </div>
          <div class="modal-body">
            <form class="form" method="" action="">
              <p class="description text-center text-dark h4">ĐĂNG NHẬP</p>
              <div class="card-body">
                <div class="form-group bmd-form-group has-success">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="material-icons">face</i>
                      </div>
                    </div>
                    <input id="inputUsername" style="height: 3rem" type="text" class="form-control" placeholder="Tên đăng nhập..." />
                  </div>
                </div>
                <div class="form-group bmd-form-group has-success" style="margin-top: -15px">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </div>
                    </div>
                    <input id="inputPassword" style="height: 3rem" type="password" placeholder="Mật khẩu" class="form-control" />
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer justify-content-center">
            <a id="btnLogin" class="btn btn-danger btn-round btn-wd btn-lg" style="font-weight: bold">ĐĂNG NHẬP</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- #endregion -->

  <!-- #region Đăng ký -->

  <div class="modal fade" id="signupModal" tabindex="-1" role="" style="padding-top: 1%">
    <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
        <div class="card card-signup card-plain">
          <div class="modal-header bg-dark">
            <div class="card-header card-header-success text-center" style="width: 10rem">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="material-icons text-light">clear</i>
              </button>

              <h4 class="card-title">Sign up</h4>
            </div>
          </div>
          <div class="modal-body">
            <form class="form" method="" action="">
              <p class="description text-center text-dark h4">ĐĂNG KÝ</p>
              <div class="card-body">
                <div class="form-group bmd-form-group has-success" style="margin-top: -15px">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="material-icons">face</i>
                      </div>
                    </div>
                    <input style="height: 3rem" type="text" class="form-control" placeholder="Họ và tên..." />
                  </div>
                </div>

                <div class="form-group bmd-form-group has-success" style="margin-top: -15px">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="material-icons">transgender</i>
                      </div>
                    </div>
                    <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
                      <option>Nam</option>
                      <option>Nữ</option>
                      <option>Giới tính thứ 3</option>
                    </select>
                  </div>
                </div>

                <div class="form-group bmd-form-group has-success" style="margin-top: -15px">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="material-icons">phone</i>
                      </div>
                    </div>
                    <input style="height: 3rem" type="text" class="form-control" placeholder="Số điện thoại..." />
                  </div>
                </div>

                <div class="form-group bmd-form-group has-success" style="margin-top: -15px">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="material-icons">email</i>
                      </div>
                    </div>
                    <input style="height: 3rem" type="text" class="form-control" placeholder="Email..." />
                  </div>
                </div>
                <div class="form-group bmd-form-group has-success" style="margin-top: -15px">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="material-icons">account_circle</i>
                      </div>
                    </div>
                    <input style="height: 3rem" type="password" placeholder="Tên đăng nhập..." class="form-control" />
                  </div>
                </div>

                <div class="form-group bmd-form-group has-success" style="margin-top: -15px">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </div>
                    </div>
                    <input style="height: 3rem" type="password" placeholder="Mật khẩu..." class="form-control" />
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer justify-content-center">
            <a href="admin/home.php" class="btn btn-success btn-round btn-wd btn-lg" style="font-weight: bold">ĐĂNG KÝ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- #endregion -->

  <!-- #region  -->

  <script>
    $(document).ready(function() {
      $('#btnLogin').click(function() {
        checkUserInfo();
      })
    })

    function checkUserInfo() {
      var username = $('#inputUsername').val();
      var password = $('#inputPassword').val();

      <?php

      ?>
    }
  </script>
  <!--   Core JS Files   -->

  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>

  <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <!-- #endregion -->
</body>

</html>