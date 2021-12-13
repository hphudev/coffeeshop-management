<div class="card">
    <div class="card-header card-header-primary card-header-icon">
        <h3 class="card-title">Danh sách khách hàng</h3>
        <div>
            <button id="btnAddKH" type="button" rel="tooltip" class="btn btn-success float-right">
                <i class="material-icons">add</i>
                Thêm khách hàng
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tableNhanVien" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-info'>Mã khách hàng</th>
                                    <th class='text-center text-info'>Họ tên</th>
                                    <th class='text-center text-info'>SĐT</th>
                                    <th class='text-center text-info'>Giới tính</th>
                                    <th class='text-center text-info'>Loại thành viên</th>
                                    <th class='text-center text-info'>Điểm tích lũy</th>
                                    <th class='text-center text-info'>Ngày đăng ký</th>
                                    <th class='text-center text-info'>Tổng chi (VNĐ)</th>
                                    <th class='text-center text-info'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center text-info'>Mã khách hàng</th>
                                    <th class='text-center text-info'>Họ tên</th>
                                    <th class='text-center text-info'>SĐT</th>
                                    <th class='text-center text-info'>Giới tính</th>
                                    <th class='text-center text-info'>Loại thành viên</th>
                                    <th class='text-center text-info'>Điểm tích lũy</th>
                                    <th class='text-center text-info'>Ngày đăng ký</th>
                                    <th class='text-center text-info'>Tổng chi (VNĐ)</th>
                                    <th class='text-center text-info'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($DSKhachHang != null) {
                                    for ($i = 0; $i < count($DSKhachHang); $i++) {
                                        echo "<tr class='text-center' id='" . $DSKhachHang[$i]->get_MaKH() . "'>";
                                        echo "<td class='text-center makh' >" . $DSKhachHang[$i]->get_MaKH() . "</td>";
                                        echo "<td class='text-center hoten' >" . $DSKhachHang[$i]->get_HoTen() . "</td>";
                                        echo "<td class='text-center sdt' >" . $DSKhachHang[$i]->get_SDT() . "</td>";
                                        echo "<td class='text-center gioitinh' >" . $DSKhachHang[$i]->get_GioiTinh() . "</td>";
                                        echo "<td class='text-center loaitv' >" . $DSKhachHang[$i]->get_LoaiTV()->get_TenLoaiTV() . "</td>";
                                        echo "<td class='text-center diemtv' >" . $DSKhachHang[$i]->get_DiemTV() . "</td>";
                                        echo "<td class='text-center ngaydk' >" . date('Y-m-d', $DSKhachHang[$i]->get_NgayDK()) . "</td>";
                                        echo "<td class='text-center tongchi' >" . $DSKhachHang[$i]->get_TongChi() . "</td>";
                                ?>
                                        <td class="td-actions text-center">
                                            <button <?php
                                                    echo 'id="' . $DSKhachHang[$i]->get_MaKH() . '"'
                                                    ?> type="button" rel="tooltip" class="btn btnEditKH btn-link btn-warning btn-just-icon" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa thông tin">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button <?php
                                                    echo 'id="' . $DSKhachHang[$i]->get_MaKH() . '"'
                                                    ?> type="button" rel="tooltip" class="btn btnDeleteKH btn-link btn-danger btn-just-icon" data-toggle="tooltip" data-placement="top" title="Xóa khách hàng">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                <?php
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modalKhachHang" tabindex="-1" role="dialog" aria-labelledby="modalKhachHang" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm khách hàng</h5>
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
                        <h2 class="card-title">Thông tin khách hàng</h2>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="bmd-label-floating">Họ và tên
                                    </label>
                                    <input id="inputHoTen" type="text" class="form-control personal_info" value=" ">
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6">
                                    <label class="bmd-label-floating">Số điện thoại</label>
                                    <input id="inputSDT" type="text" class="form-control personal_info" value="0">
                                </div>
                                <div class=" col-md-6">
                                    <label class="bmd-label-floating">Ngày đăng ký</label>
                                    <input id="inputNgayDK" type="date" class="form-control personal_info" value="<?php
                                                                                                                    $now = new DateTime('now');
                                                                                                                    echo $now->format("Y-m-d")
                                                                                                                    ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <div class="fields-group align-items-center">
                                            <p class="input-label text-left">Giới tính: </p>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="material-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span id="inputGioiTinh">Chọn giới tính</span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <p class='dropdown-item mater-gender-opt'>Nam</p>
                                                    <p class='dropdown-item mater-gender-opt'>Nữ</p>
                                                    <p class='dropdown-item mater-gender-opt'>Khác</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <div class="fields-group align-items-center">
                                            <p class="input-label text-left">Loại thành viên: </p>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle important-info" type="button" id="material-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                                                    <span id="inputLoaiTV">Chọn loại thành viên</span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <?php
                                                    for ($i = 0; $i < count($DSLoaiKH); $i++) {
                                                        echo " <p class='dropdown-item mater-rank-opt'>" . $DSLoaiKH[$i]->get_TenLoaiTV() .  "</p>";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" col-md-6">
                                    <label class="bmd-label-floating">
                                        Điểm thành viên
                                    </label>
                                    <input id="inputDiemTV" type="number" class="form-control personal_info important-info" value="0" disabled>
                                </div>
                                <div class=" col-md-6">
                                    <label class="bmd-label-floating">
                                        Tổng chi (VNĐ)
                                    </label>
                                    <input id="inputTongChi" type="text" class="form-control personal_info important-info" value="0" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnCancel" type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button id="btnConfirm" type="button" class="btn btn-success">Lưu</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var modal = $('#modalKhachHang')
        var selectedKHID = ""
        var tableNV = $('#tableNhanVien').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        })

        $('.tongchi').each(function() {
            $(this).html(toMoney($(this).html()))
        })

        $('#inputTongChi').on('input', function() {
            if ($(this).val() == "")
                $(this).val("0")
            var tongchi = toInt($(this).val())
            $(this).val(toMoney(tongchi))
        })

        function initModalData($row) {
            selectedKHID = $row.find('.makh').html()
            $('#inputHoTen').attr('value', $row.find('.hoten').html())
            $('#inputSDT').attr('value', $row.find('.sdt').html())
            $('#inputNgayDK').attr('value', $row.find('.ngaydk').html())
            $('#inputDiemTV').attr('value', $row.find('.diemtv').html())
            $('#inputTongChi').attr('value', $row.find('.tongchi').html())
            $("#inputGioiTinh").text($row.find('.gioitinh').text());
            $("#inputLoaiTV").text($row.find('.loaitv').text());
        }

        function clearModalData() {
            var now = new Date();
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear() + "-" + (month) + "-" + (day);
            $('#inputHoTen').attr('value', '')
            $('#inputSDT').attr('value', '')
            $('#inputNgayDK').attr('value', today)
            $('#inputDiemTV').attr('value', '0')
            $('#inputTongChi').attr('value', '0')
        }

        function updateKH() {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                data: {
                    action: 'update',
                    id: selectedKHID,
                    hoten: $('#inputHoTen').val(),
                    sdt: $('#inputSDT').val(),
                    ngaydk: $('#inputNgayDK').val(),
                    gioitinh: $('#inputGioiTinh').text(),
                    loaitv: $('#inputLoaiTV').text(),
                    diemtv: $('#inputDiemTV').val(),
                    tongchi: toInt($('#inputTongChi').val())
                },
                beforeSend: function() {

                },
                success: function(response) {
                    // Swal.fire({
                    //     title: response
                    // })
                    if (response.includes("success")) {
                        modal.modal('hide')
                        Swal.fire({
                            title: 'Thành công!',
                            text: "Thông tin khách hàng đã được cập nhật!",
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            $('#btnDSKH').click()
                        })
                    } else
                        Swal.fire(
                            'Thất bại!',
                            '.Đã xảy ra lỗi. Vui lòng thử lại',
                            'error'
                        )
                },
                complete: function() {},
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
        }

        function checkNgayDK() {
            var today = new Date()
            var ngayDK = new Date($('#inputNgayDK').val())
            if (today < ngayDK) {
                return false
            } else {
                return true
            }
        }

        function checkInfo() {
            if ($('#inputHoTen').val() == "" ||
                $('#inputSDT').val() == "" ||
                $('#inputNgayDK').val() == "" ||
                $('#inputGioiTinh').text() == "" ||
                $('#inputLoaiTV').text() == "" ||
                $('#inputDiemTV').val() == "" ||
                $('#inputTongChi').val() == "") {
                Swal.fire(
                    "Thất bại",
                    "Vui lòng nhập đủ thông tin!",
                    "warning"
                )
                return false;
            } else if (!checkNgayDK()) {
                Swal.fire(
                    "Thất bại",
                    "Ngày đăng ký không được sau ngày hiện tại!",
                    "warning"
                )
                return false;
            } else if (!checkSDT($('#inputSDT').val())) {
                Swal.fire(
                    "Thất bại",
                    "Số điện thoại không đúng định dạng!",
                    "warning"
                )
                return false;
            }
            return true;
        }

        function addKH() {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                data: {
                    action: "add",
                    hoten: $('#inputHoTen').val(),
                    sdt: $('#inputSDT').val(),
                    ngaydk: $('#inputNgayDK').val(),
                    gioitinh: $('#inputGioiTinh').text(),
                    loaitv: $('#inputLoaiTV').text(),
                    diemtv: $('#inputDiemTV').val(),
                    tongchi: toInt($('#inputTongChi').val())
                },
                beforeSend: function() {

                },
                success: function(response) {
                    // Swal.fire({
                    //     title: response,
                    // })
                    if (response.includes("success")) {
                        modal.modal('hide')
                        Swal.fire({
                            title: 'Thành công!',
                            text: 'Thông tin khách hàng đã được thêm mới',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then(result => {
                            $('#btnDSKH').click()
                        })
                    } else if (response.includes("phone")) {
                        Swal.fire(
                            'Thất bại!',
                            'Số điện thoại đã được sử dụng!',
                            'error'
                        )
                    } else {
                        Swal.fire(
                            'Thất bại!',
                            'Đã xảy ra lỗi. Vui lòng thử lại',
                            'error'
                        )
                    }
                },
                complete: function() {},
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
        }

        function deleteKH(id) {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                data: {
                    action: "delete",
                    id: id,
                },
                beforeSend: function() {

                },
                success: function(response) {
                    // Swal.fire({
                    //     title: response
                    // })
                    if (response.includes("success")) {
                        modal.modal('hide')

                        Swal.fire({
                            title: 'Thành công!',
                            text: 'Thông tin khách hàng đã được xóa',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then(result => {
                            $('#btnDSKH').click()
                        })
                    } else {
                        Swal.fire(
                            'Thất bại!',
                            'Đã xảy ra lỗi. Vui lòng thử lại',
                            'error'
                        )
                    }
                },
                complete: function() {},
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
            $('#btnDSKH').click()
        }

        $(".mater-gender-opt").each(function(index) {
            $(this).on("click", function() {
                $("#inputGioiTinh").text($(this).text());
            });
        });

        $(".mater-rank-opt").each(function(index) {
            $(this).on("click", function() {
                $("#inputLoaiTV").text($(this).text());
            });
        });

        $('#btnAddKH').click(function() {
            checkPhanQuyen('kh1', function() {
                modal.modal('show')
                clearModalData()
            })
        })

        $('.btnEditKH').click(function() {
            var $row = $(this).closest('tr')
            checkPhanQuyen('kh1', function() {
                $("#btnConfirm").addClass('view')
                modal.modal('show')
                initModalData($row)
                checkPhanQuyenNoAlert('admin', function() {
                    $('.important-info').attr('disabled', false)
                })
            })
        })

        $('.btnDeleteKH').click(function() {
            var $row = $(this).closest('tr')
            checkPhanQuyen('kh1', function() {
                Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa khách hàng?',
                    text: "Việc làm này sẽ không thể hoàn tác!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteKH($row.find('.makh').html())
                    }
                })
            })
        })

        $("#btnConfirm").click(function() {
            if (checkInfo()) {
                if ($(this).hasClass('view')) {
                    updateKH()
                } else {
                    addKH()
                }
            }
        })

        $("#btnCancel").click(function() {
            let func = {};
            func.name = 'deleteOrderFail';
            $.ajax({
                type: "POST",
                url: "../models/M_BanHang.php",
                data: {
                    func: JSON.stringify(func)
                },
                success: function(response) {
                    deleteOrderFail();
                }
            });
        })
    })
</script>