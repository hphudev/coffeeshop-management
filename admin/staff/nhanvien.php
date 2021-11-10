<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">assignment</i>
                </div>
                <h2 class="card-title">Danh sách nhân viên</h2>
                <div>
                    <button id="btnAddNV" type="button" rel="tooltip" class="btn btn-success">
                        <i class="material-icons">add</i>
                        Thêm nhân viên
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="tableNV" class="table table-hover ">
                                    <thead class="text-primary">
                                        <th>ID</th>
                                        <th>Họ tên đệm</th>
                                        <th>Tên</th>
                                        <th>Chức vụ</th>
                                        <th>Ngày vào làm</th>
                                        <th>Lương</th>
                                        <th class="text-right">Thao tác</th>
                                    </thead>
                                    <tbody>
                                        <?php

                                        for ($i = 0; $i < count($NhanVienList); $i++) {
                                            echo "<tr id='row" . $NhanVienList[$i]->get_MaNV() . "'>";
                                            echo "<td>" . $NhanVienList[$i]->get_MaNV() . "</td>";
                                            echo "<td>" . $NhanVienList[$i]->get_HoTenDem() . "</td>";
                                            echo "<td>" . $NhanVienList[$i]->get_Ten() . "</td>";
                                            echo "<td>" . $NhanVienList[$i]->get_ChucVu()->get_TenCV() . "</td>";
                                            echo "<td>" . date('d/m/Y', $NhanVienList[$i]->get_NgayVaoLam()) . "</td>";
                                            echo "<td>" . $NhanVienList[$i]->get_Luong() . "</td>";

                                        ?>
                                            <td class="td-actions text-right">
                                                <button <?php
                                                        echo 'id="' . $NhanVienList[$i]->get_MaNV() . '"'
                                                        ?> type="button" rel="tooltip" class="btn btn-View-NV btn-link btn-info btn-just-icon" data-toggle="tooltip" data-placement="top" title="Thông tin chi tiết">
                                                    <i class="material-icons">person</i>
                                                </button>
                                                <button <?php
                                                        echo 'id="' . $NhanVienList[$i]->get_MaNV() . '"'
                                                        ?> type="button" rel="tooltip" class="btn btn-Edit-NV btn-link btn-warning btn-just-icon" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa thông tin">
                                                    <i class="material-icons">edit</i>
                                                </button>
                                                <button <?php
                                                        echo 'id="' . $NhanVienList[$i]->get_MaNV() . '"'
                                                        ?> type="button" rel="tooltip" class="btn btn-Delete-NV btn-link btn-danger btn-just-icon" data-toggle="tooltip" data-placement="top" title="Xóa nhân viên">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>

                                        <?php
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <th>ID</th>
                                        <th>Họ tên đệm</th>
                                        <th>Tên</th>
                                        <th>Chức vụ</th>
                                        <th>Ngày vào làm</th>
                                        <th>Lương</th>
                                        <th class="text-right">Thao tác</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal NhanVien -->
<div class="modal fade bd-example-modal-lg" id="addNVModel" tabindex="-1" role="dialog" aria-labelledby="addNVModel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm nhân viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h2 class="card-title">Thông tin cá nhân</h2>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Họ và tên đệm
                                        </label>
                                        <input id="inputHoTenDem" type="text" class="form-control personal_info">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Tên</label>
                                        <input id="inputTen" type="text" class="form-control personal_info">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">CMND/CCCD</label>
                                        <input id="inputCMND" type="text" class="form-control personal_info">
                                    </div>
                                </div>
                                <div class=" col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Số điện thoại</label>
                                        <input id="inputSDT" type="number" class="form-control personal_info">
                                    </div>
                                </div>
                                <div class=" col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Ngày sinh</label>
                                        <input id="inputNgaySinh" type="datetime-local" class="form-control personal_info" value="<?php
                                                                                                                                    $now = new DateTime('now');
                                                                                                                                    echo $now->format("Y-m-d\TH:i")
                                                                                                                                    ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-5">
                                    <div class="form-group">
                                        <label for="genderPicker">Giới tính</label>
                                        <select id="inputGioiTinh" class="form-control personal_info selectpicker" data-style="btn btn-link">
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                            <option value="Khác">Khác</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-12">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">
                                            Địa chỉ
                                        </label>
                                        <input id="inputDiaChi" type="text" class="form-control personal_info">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h2 class="card-title">Thông tin làm việc</h2>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">
                                            Mã nhân viên
                                        </label>
                                        <input id="inputMaNV" type="text" class="form-control personal_info" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="genderPicker">
                                            Vị trí công việc
                                        </label>
                                        <select id="inputChucVu" class="form-control personal_info selectpicker" data-style="btn btn-link">
                                            <?php
                                            for ($i = 0; $i < count($ChucVuList); $i++) {
                                                echo "<option>" . $ChucVuList[$i]->get_TenCV() . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Ngày vào làm</label>
                                        <input id="inputNgVaoLam" type="datetime-local" class="form-control personal_info" value="<?php
                                                                                                                                    $now = new DateTime('now');
                                                                                                                                    echo $now->format("Y-m-d\TH:i")
                                                                                                                                    ?>">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Lương</label>
                                        <input id="inputLuong" type="number" class="form-control personal_info">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Tên tài khoản cung cấp cho nhân viên</label>
                                        <input id="inputTaiKhoan" type="text" class="form-control personal_info">
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Mật khẩu tài khoản</label>
                                        <input id="inputMatKhau" type="password" class="form-control personal_info">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button id="btnConfirmAddNV" type="button" class="btn btn-success">Lưu</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var tableNV = $('#tableNV').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        $("#btnAddNV").click(function() {
            // if (checkPhanQuyen()) {
                $("#addNVModel").modal('show');
            // } else {
            //     Swal.fire(
            //         'Thất bại!',
            //         'Bạn không có quyền thực hiện chức năng này',
            //         'error'
            //     )
            // }
        })

        $(".btn-View-NV").click(function() {
            var nvID = $(this).attr('id')
            window.location.href = "../admin/index.php?page=staff&id=" + nvID;
        });

        $(".btn-Delete-NV").click(function() {
            Swal.fire({
                title: 'Xóa nhân viên?',
                text: "Bạn không thể hoàn tác thao tác này, tiếp tục?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    var nvID = $(this).attr('id')
                    var xmlhttp = new XMLHttpRequest();
                    var url = "../../coffeeshopmanagement/controllers/C_NhanVien.php?page=staff&id=" + nvID + "&delete";
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            if (this.responseText == 'success') {
                                Swal.fire(
                                    'Đã xóa!',
                                    'Nhân viên đã được xóa khỏi hệ thống',
                                    'success'
                                )
                                $('#row' + nvID).remove();
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
                }
            })
        });

        $('#btnConfirmAddNV').click(function() {
            if (checkNVInfomation()) {
                var xmlhttp = new XMLHttpRequest();
                var url = "../../coffeeshopmanagement/controllers/C_NhanVien.php?page=staff&id=" + $('#inputMaNV').val() + '&add' +
                    "&HoTenDem=" + $('#inputHoTenDem').val() +
                    "&Ten=" + $('#inputTen').val() +
                    "&CMND=" + $('#inputCMND').val() +
                    "&NgaySinh=" + $('#inputNgaySinh').val() +
                    "&GioiTinh=" + $('#inputGioiTinh').val() +
                    "&SDT=" + $('#inputSDT').val() +
                    "&DiaChi=" + $('#inputDiaChi').val() +
                    "&MaNV=" + $('#inputMaNV').val() +
                    "&NgayVaoLam=" + $('#inputNgVaoLam').val() +
                    "&ChucVu=" + $('#inputChucVu').val() +
                    "&Luong=" + $('#inputLuong').val() +
                    "&TaiKhoan=" + $('#c').val() +
                    "&MatKhau=" + $('#inputMatKhau').val();

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == 'success') {
                            Swal.fire(
                                'Thành công!',
                                'Thông tin nhân viên đã được thêm',
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
            }
        });

        function checkPhanQuyen() {
            var xmlhttp = new XMLHttpRequest();
            var url = "../../coffeeshopmanagement/controllers/C_PhanQuyen.php?check&quyen=nhansu1";

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 'true') {
                        return true;
                    } else {
                        return false;
                    }
                }
            };

            xmlhttp.open("GET", url, true);
            xmlhttp.send();
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
            if (!check)
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
        }

        function checkSDT() {
            const regex = /(84|0[3|5|7|8|9])+([0-9]{8})/
            return regex.test(String($('#inputSDT').val()));
        }

        function checkNgaySinh() {
            var dob = new Date(Date.parse($('#inputNgaySinh').val()))
            const today = new Date()

            var age = today.getFullYear() - dob.getFullYear()
            if (age < 18)
                return false
            if (age > 18)
                return true
            if (age == 18) {
                var month = today.getMonth() - dob.getMonth();
                if (month < 0)
                    return false
                if (month > 0)
                    return true
                if (month == 18) {
                    var day = today.getDay() - dob.getDay();
                    if (day < 0)
                        return false
                    if (day > 0)
                        return true
                }
            }
        }
    })
</script>