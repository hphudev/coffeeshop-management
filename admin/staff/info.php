<div class="container-fluid">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">info</i>
                    </div>
                    <h2 class="card-title">Thông tin cá nhân</h2>
                    <div>
                        <button id="btnEditPersonalInfo" type="button" class="btn btn-warning">
                            <i class="material-icons">edit</i>
                            Chỉnh sửa thông tin
                        </button>
                        <button id="btnSavePersonalInfo" type="button" class="btn btn-success invisible">
                            <i class="material-icons">save</i>
                            Lưu chỉnh sửa
                        </button>
                        <button id="btnCancelEditPersonalInfo" type="button" class="btn btn-danger invisible">
                            <i class="material-icons">close</i>
                            Hủy bỏ
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Họ và tên đệm
                                    </label>
                                    <input id="inputHoTenDem" type="text" class="form-control personal_info" <?php
                                                                                                                echo 'value="' . $NhanVien->get_HoTenDem() . '"';
                                                                                                                ?> disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Tên</label>
                                    <input id="inputTen" type="text" class="form-control personal_info" <?php
                                                                                                        echo 'value="' . $NhanVien->get_Ten() . '"'
                                                                                                        ?> disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-5">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Ngày sinh</label>
                                    <input id="inputNgaySinh" type="date" class="form-control personal_info" value="<?php
                                                                                                                    echo date('Y-m-d', $NhanVien->get_NgaySinh())
                                                                                                                    ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-5">
                                <div class="form-group bmd-form-group">
                                    <label for="genderPicker">Giới tính</label>
                                    <select id="inputGioiTinh" disabled class="form-control personal_info selectpicker" data-style="btn btn-link">
                                        <option <?php if ($NhanVien->get_GioiTinh() == "Nam") echo "selected" ?> value="Nam">Nam</option>
                                        <option <?php if ($NhanVien->get_GioiTinh() == "Nữ") echo "selected" ?> value="Nữ">Nữ</option>
                                        <option <?php if ($NhanVien->get_GioiTinh() == "Khác") echo "selected" ?> value="Khác">Khác</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">CMND/CCCD</label>
                                    <input id="inputCMND" type="text" class="form-control personal_info" <?php
                                                                                                            echo 'value="' . $NhanVien->get_CMND() . '"'
                                                                                                            ?> disabled>
                                </div>
                            </div>
                            <div class=" col-md-5">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Số điện thoại</label>
                                    <input id="inputSDT" type="text" class="form-control personal_info" <?php
                                                                                                        echo 'value="' . $NhanVien->get_SDT() . '"'
                                                                                                        ?> disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Địa chỉ</label>
                                    <input id="inputDiaChi" type="text" class="form-control personal_info" <?php
                                                                                                            echo 'value="' . $NhanVien->get_DiaChi() . '"'
                                                                                                            ?> disabled>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">info</i>
                    </div>
                    <h2 class="card-title">Thông tin làm việc</h2>
                    <div>
                        <button id="btnEditWorkInfo" type="button" class="btn btn-warning">
                            <i class="material-icons">edit</i>
                            Chỉnh sửa thông tin
                        </button>
                        <button id="btnSaveWorkInfo" type="button" class="btn btn-success invisible">
                            <i class="material-icons">save</i>
                            Lưu chỉnh sửa
                        </button>
                        <button id="btnCancelEditWorkInfo" type="button" class="btn btn-danger invisible">
                            <i class="material-icons">close</i>
                            Hủy bỏ
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Mã nhân viên</label>
                                    <input id="inputMaNV" type="text" class="form-control" data-toggle="tooltip" data-placement="top" title="Bạn không thể thay đổi thông tin này" <?php
                                                                                                                                                                                    echo 'value="' . $NhanVien->get_MaNV() . '"'
                                                                                                                                                                                    ?> disabled>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Ngày vào làm</label>
                                    <input id="inputNgVaoLam" type="date" class="form-control work_info" value="<?php
                                                                                                                echo date('Y-m-d', $NhanVien->get_NgayVaoLam())
                                                                                                                ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-5">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Lương</label>
                                    <input id="inputLuong" type="text" class="form-control work_info" <?php
                                                                                                        echo 'value="' . $NhanVien->get_Luong() . '"'
                                                                                                        ?> disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-5">
                                <div class="form-group">
                                    <label for="inputChucVu">Chức vụ</label>
                                    <select id="inputChucVu" disabled class="form-control work_info selectpicker" data-style="btn btn-link">
                                        <?php
                                        for ($i = 0; $i < count($ChucVuList); $i++) {
                                            echo '<option';
                                            if ($ChucVuList[$i]->get_MaCV() == $NhanVien->get_ChucVu()->get_MaCV())
                                                echo ' selected ';
                                            echo ' value="' . $ChucVuList[$i]->get_TenCV();
                                            echo '">' . $ChucVuList[$i]->get_TenCV() . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Tên tài khoản được cấp</label>
                                    <input id="inputTaiKhoan" type="text" class="form-control work_info" <?php
                                                                                                            echo 'value="' . $NhanVien->get_TaiKhoan()->get_MaTK() . '"'
                                                                                                            ?> disabled>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating">Mật khẩu</label>
                                    <input id="inputMatKhau" type="password" class="form-control work_info" <?php
                                                                                                            echo 'value="' . $NhanVien->get_TaiKhoan()->get_MatKhau() . '"'
                                                                                                            ?> disabled>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        function checkPhanQuyen(PhanQuyen, Callback) {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_PhanQuyen.php",
                data: {
                    phanquyen: PhanQuyen,
                },
                beforeSend: function() {

                },
                success: function(response) {
                    // alert(response)
                    if (response == "true") {
                        Callback()
                    } else {
                        Swal.fire(
                            "Thất bại!",
                            "Bạn không có quyền truy cập mục này!",
                            "warning"
                        )
                    }
                },
                complete: function() {},
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
        }

        function checkNVInfomation() {
            if ($('#inputHoTenDem').val() == "" ||
                $('#inputTen').val() == "" ||
                $('#inputCMND').val() == "" ||
                $('#inputNgaySinh').val() == "" ||
                $('#inputGioiTinh').val() == "" ||
                $('#inputSDT').val() == "" ||
                $('#inputDiaChi').val() == "" ||
                $('#inputMaNV').val() == "" ||
                $('#inputNgVaoLam').val() == "" ||
                $('#inputChucVu').val() == "" ||
                $('#inputLuong').val() == "" ||
                $('#inputTaiKhoan').val() == "" ||
                $('#inputMa').val() == "") {
                Swal.fire(
                    'Thất bại!',
                    'Vui lòng nhập đầy đủ thông tin',
                    'error'
                )
                return false;
            };
            if (checkNgayVaoLam()) {

            }
            if (!checkNgaySinh()) {
                Swal.fire(
                    'Thất bại!',
                    'Nhân viên phải đủ 18 tuổi. Vui lòng kiểm tra lại',
                    'error'
                )
                return false;
            }
            if (!checkSDT()) {
                Swal.fire(
                    'Thất bại!',
                    'Số điện thoại không đúng định dạng. Vui lòng kiểm tra lại',
                    'error'
                )
                return false;
            }
            if (!checkNgayVaoLam()) {
                Swal.fire(
                    'Thất bại!',
                    'Nhân viên phải đủ 18 tuổi khi vào làm và ngày vào làm\nvà ngày vào làm phải trước ngày hiện tại\nVui lòng kiểm tra lại thông tin!',
                    'error'
                )
                return false;
            }
            return true;
        }

        function checkSDT() {
            const regex = /(84|0[3|5|7|8|9])+([0-9]{8})/
            return regex.test(String($('#inputSDT').val()));
        }

        function checkNgaySinh() {
            var dob = new Date(Date.parse($('#inputNgaySinh').val()))
            var ageDifMs = Date.now() - dob.getTime()
            var ageDate = new Date(ageDifMs)
            if (Math.abs(ageDate.getUTCFullYear() - 1970) >= 18)
                return true
            else
                return false
        }

        function checkNgayVaoLam() {
            var dow = new Date(Date.parse($('#inputNgVaoLam').val()))
            var dob = new Date(Date.parse($('#inputNgaySinh').val()))
 
            var workDifMs = dow.getTime() - dob.getTime()

            if (dow > new Date())
                return false

            var workDate = new Date(workDifMs)

            if (Math.abs(workDate.getUTCFullYear() - 1970) >= 18)
                return true
            else
                return false
        }

        $('#btnEditPersonalInfo').click(function() {
            checkPhanQuyen('nhansu1', function() {
                $(this).removeClass('btn-warning')
                $(this).prop("disabled", true)
                $('.personal_info').prop("disabled", false)
                $('#btnSavePersonalInfo').removeClass('invisible')
                $('#btnCancelEditPersonalInfo').removeClass('invisible')
            })
        });

        $('#btnSavePersonalInfo').click(function() {
            if (checkNVInfomation()) {
                var xmlhttp = new XMLHttpRequest();
                var url = "../../coffeeshopmanagement/controllers/C_NhanVien.php?page=staff&id=" + $('#inputMaNV').val() + '&update' +
                    "&HoTenDem=" + $('#inputHoTenDem').val() +
                    "&Ten=" + $('#inputTen').val() +
                    "&NgaySinh=" + $('#inputNgaySinh').val() +
                    "&CMND=" + $('#inputCMND').val() +
                    "&GioiTinh=" + $('#inputGioiTinh').val() +
                    "&SDT=" + $('#inputSDT').val() +
                    "&DiaChi=" + $('#inputDiaChi').val();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == 'success') {
                            Swal.fire(
                                'Thành công!',
                                'Thông tin chỉnh sửa đã được lưu lại',
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Thất bại!',
                                'Đã xảy ra lỗi. Vui lòng thử lại',
                                'error'
                            )
                        }
                    }
                };

                xmlhttp.open("GET", url, true);
                xmlhttp.send();

                $(this).addClass('invisible')
                $('.personal_info').prop("disabled", true)
                $('#btnEditPersonalInfo').prop("disabled", false)
                $('#btnEditPersonalInfo').addClass('btn-warning')
                $('#btnCancelEditPersonalInfo').addClass('invisible')
            }
        });

        $('#btnCancelEditPersonalInfo').click(function() {
            Swal.fire(
                'Ôi...',
                'Thông tin chỉnh sửa đã không được lưu lại',
                'error'
            )
            $(this).addClass('invisible')
            $('.personal_info').prop("disabled", true)
            $('#btnEditPersonalInfo').prop("disabled", false)
            $('#btnEditPersonalInfo').addClass('btn-warning')
            $('#btnSavePersonalInfo').addClass('invisible')
        });

        $('#btnEditWorkInfo').click(function() {
            checkPhanQuyen('nhansu1', function() {
                $(this).removeClass('btn-warning')
                $(this).prop("disabled", true)
                $('.work_info').prop("disabled", false)
                $('#btnSaveWorkInfo').removeClass('invisible')
                $('#btnCancelEditWorkInfo').removeClass('invisible')
            })
        });

        $('#btnSaveWorkInfo').click(function() {
            if (checkNVInfomation()) {
                var xmlhttp = new XMLHttpRequest();
                var url = "../../coffeeshopmanagement/controllers/C_NhanVien.php?page=staff&id=" + $('#inputMaNV').val() + '&updatework' +
                    "&NgayVaoLam=" + $('#inputNgVaoLam').val() +
                    "&ChucVu=" + $('#inputChucVu').val() +
                    "&Luong=" + $('#inputLuong').val() +
                    "&TaiKhoan=" + $('#inputTaiKhoan').val() +
                    "&MatKhau=" + $('#inputMatKhau').val();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == 'success') {
                            Swal.fire(
                                'Thành công!',
                                'Thông tin chỉnh sửa đã được lưu lại',
                                'success'
                            )
                        } else {
                            Swal.fire(
                                'Thất bại!',
                                'Đã xảy ra lỗi. Vui lòng thử lại',
                                'error'
                            )
                        }
                    }
                };

                xmlhttp.open("GET", url, true);
                xmlhttp.send();

                $(this).addClass('invisible')
                $('.work_info').prop("disabled", true)
                $('#btnEditWorkInfo').prop("disabled", false)
                $('#btnEditWorkInfo').addClass('btn-warning')
                $('#btnCancelEditWorkInfo').addClass('invisible')
            }
        });

        $('#btnCancelEditWorkInfo').click(function() {
            Swal.fire(
                'Ôi...',
                'Thông tin chỉnh sửa đã không được lưu lại',
                'error'
            )
            $(this).addClass('invisible')
            $('.work_info').prop("disabled", true)
            $('#btnEditWorkInfo').prop("disabled", false)
            $('#btnEditWorkInfo').addClass('btn-warning')
            $('#btnSaveWorkInfo').addClass('invisible')
        });
    })
</script>