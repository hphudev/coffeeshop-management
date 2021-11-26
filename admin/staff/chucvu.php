<!-- Table Chuc Vu va Phan Quyen -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#profile" data-toggle="tab">
                                    <i class="material-icons">info</i> Thông tin chức vụ
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#messages" data-toggle="tab">
                                    <i class="material-icons">code</i> Chi tiết bảng phân quyền
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                        <div>
                            <button id="btnAddCV" type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">add</i>
                                Thêm chức vụ
                            </button>
                        </div>
                        <table id="tableType" class="table table-hover">
                            <thead class="text-primary">
                                <th>Mã chức vụ</th>
                                <th>Tên chức vụ</th>
                                <th>Mức trợ cấp</th>
                                <th>Thao tác</th>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($ChucVuList); $i++) {
                                    echo "<tr>";
                                    echo "<td>" . $ChucVuList[$i]->get_MaCV() . "</td>";
                                    echo "<td>" . $ChucVuList[$i]->get_TenCV() . "</td>";
                                    echo "<td>" . $ChucVuList[$i]->get_MucTroCap() . "</td>";
                                ?>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" class="btn btnEditCV btn-link btn-warning btn-just-icon" data-placement="top" title="Chỉnh sửa thông tin">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" class="btn btnDeleteCV btn-link btn-danger btn-just-icon" data-placement="top" title="Xóa chức vụ">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                <?php
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane" id="messages">
                        <div class="container-fluid">
                            <div>
                                <button id="btnEditPQ" type="button" rel="tooltip" class="btn btn-warning">
                                    <i class="material-icons">edit</i>
                                    Chỉnh sửa
                                </button>
                                <button id="btnSaveEditPQ" type="button" rel="tooltip" class="btn btn-success invisible">
                                    <i class="material-icons">save</i>
                                    Lưu chỉnh sửa
                                </button>
                                <button id="btnCancelEditPQ" type="button" rel="tooltip" class="btn btn-danger invisible">
                                    <i class="material-icons">cancel</i>
                                    Hủy bỏ
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="dropdown">
                                            <button id="btnSelectCVPQ" class="btn  btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Lựa chọn chức vụ
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <?php
                                                for ($i = 0; $i < count($ChucVuList); $i++) {
                                                    echo '<a class="dropdown-item"';
                                                    echo "id=" . $ChucVuList[$i]->get_MaCV() . ">";
                                                    echo  $ChucVuList[$i]->get_TenCV() . '</a>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>
                                            TÀI CHÍNH
                                        </h4>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="thongke0" class="form-check-input" type="checkbox" value="" disabled>
                                                            Xem thông tin thống kê
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>
                                            BÁN HÀNG
                                        </h4>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="order0" class="form-check-input" type="checkbox" value="" disabled>
                                                            Xem trang bán hàng
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="order1" class="form-check-input" type="checkbox" value="" disabled>
                                                            Thanh toán hóa đơn
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="order2" class="form-check-input" type="checkbox" value="" disabled>
                                                            Phục vụ món
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>
                                            NHÂN SỰ
                                        </h4>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="nhansu0" class="form-check-input" type="checkbox" value="" disabled>
                                                            Xem thông tin nhân viên
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="nhansu1" class="form-check-input" type="checkbox" value="" disabled>
                                                            Chỉnh sửa/thêm/xóa thông tin nhân viên
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="nhansu2" class="form-check-input" type="checkbox" value="" disabled>
                                                            Xem thông tin chức vụ/ bảng phân quyền
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="nhansu3" class="form-check-input" type="checkbox" disabled>
                                                            Chỉnh sửa/thêm/xóa thông tin chức vụ
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>
                                            KHO
                                        </h4>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="kho0" class="form-check-input" type="checkbox" value="" disabled>
                                                            Xem danh sách nguyên vật liệu
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="kho1" class="form-check-input" type="checkbox" value="" disabled>
                                                            Thực hiện các thao tác trong kho
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal ChucVu -->
<div class="modal fade bd-example-modal-lg" id="addCVModel" tabindex="-1" role="dialog" aria-labelledby="addCVModel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="addNVModel">Thêm chức vụ</h2>
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
                        <h2 class="card-title">Thông tin chức vụ</h2>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Mã chức vụ
                                        </label>
                                        <input id="inputMaChucVu" value=" " type="text" class="form-control chucvu_info" disabled>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Tên chức vụ
                                        </label>
                                        <input id="inputTenChucVu" value=" " type="text" class="form-control chucvu_info">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Mức trợ cấp (VNĐ)</label>
                                        <input id="inputMucTroCap" value=" " type="text" class="form-control chucvu_info">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button id="btnConfirmAddCV" type="button" class="btn btn-success">Lưu</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Table Chuc Vu
        var tableType = $('#tableType').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        $('#btnAddCV').click(function() {
            if (checkPhanQuyen()) {
                $('#addCVModel').modal('show')
                $('#inputMaChucVu').attr('value', '')
                $('#inputTenChucVu').attr('value', '')
                $('#inputMucTroCap').attr('value', '')
            } else {
                Swal.fire(
                    'Thất bại!',
                    'Bạn không có quyền thực hiện chức năng này',
                    'error'
                )
            }
        })

        $(".btnEditCV").click(function() {
            if (checkPhanQuyen()) {
                $('#addCVModel').modal('show')
                var $row = $(this).closest('tr')
                var $columns = $row.find('td');
                $('#btnConfirmAddCV').addClass('edit')
                $('#inputMaChucVu').attr('value', $columns[0].innerHTML)
                $('#inputTenChucVu').attr('value', $columns[1].innerHTML)
                $('#inputMucTroCap').attr('value', $columns[2].innerHTML)
            } else {
                Swal.fire(
                    'Thất bại!',
                    'Bạn không có quyền thực hiện chức năng này',
                    'error'
                )
            }
        });

        $(".btnDeleteCV").click(function() {
            Swal.fire({
                title: 'Xóa chức vụ?',
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
                                    'Chức vụ đã được xóa khỏi hệ thống',
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

        $('#btnConfirmAddCV').click(function() {
            if ($(this).hasClass('edit')) {
                deleteCV()
            } else {
                checkCVInfomation()
            }
        });

        function checkCVInfomation() {
            if (
                $('#inputTenChucVu').val() == "" ||
                $('#inputMucTroCap').val() == "") {
                Swal.fire(
                    'Thất bại!',
                    'Vui lòng nhập đầy đủ thông tin',
                    'error'
                )
            } else if (!checkMucTroCap()) {

            } else {
                checkTenChucVu()
            }
        }

        function checkTenChucVu() {
            var xmlhttp = new XMLHttpRequest();
            var url = "../../coffeeshopmanagement/controllers/C_ChucVu.php?check=" + $('#inputTenChucVu').val();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 'exist') {
                        Swal.fire(
                            'Thất bại!',
                            'Đã tồn tại chức vụ trong hệ thống, vui lòng kiểm tra lại!',
                            'error'
                        )
                    } else {
                        if ($('#btnConfirmAddCV').hasClass('edit')) {
                            editChucVu()
                        } else {
                            addChucVu()
                        }
                    }
                }
            };

            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        function checkMucTroCap() {
            var TroCap = $('#inputMucTroCap').val();
            if (TroCap < 0) {
                Swal.fire(
                    'Thất bại!',
                    'Mức trợ cấp không thể là số âm, vui lòng kiểm tra lại',
                    'error'
                )
                return false
            } else
                return true

        }

        function addChucVu() {
            var xmlhttp = new XMLHttpRequest();
            var url = "../../coffeeshopmanagement/controllers/C_ChucVu.php?add" +
                "&TenCV=" + $('#inputTenChucVu').val() +
                "&TroCap=" + $('#inputMucTroCap').val();

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

        function editChucVu() {
            var xmlhttp = new XMLHttpRequest();
            var url = "../../coffeeshopmanagement/controllers/C_ChucVu.php?update=" + $('#inputMaChucVu').val() +
                "&TenCV=" + $('#inputTenChucVu').val() +
                "&TroCap=" + $('#inputMucTroCap').val();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 'success') {
                        Swal.fire(
                            'Thành công!',
                            'Thông tin chức vụ đã được chỉnh sửa',
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

        function deleteCV() {
            var xmlhttp = new XMLHttpRequest();
            var url = "../../coffeeshopmanagement/controllers/C_ChucVu.php?delete=" + $('#inputMaChucVu').val();

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 'error') {
                        Swal.fire(
                            'Thất bại!',
                            'Đã có lỗi xảy ra, vui lòng thử lại!',
                            'error'
                        )
                    } else {
                        checkCVInfomation()
                    }
                }
            };

            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }

        // Bang phan quyen
        $('.dropdown-item').click(function() {
            if ($('#btnEditPQ').prop('disabled') == true) {
                Swal.fire(
                    'Lưu ý!',
                    'Vui lòng lưu lại chỉnh sửa hiện tại!',
                    'warning'
                )
            } else {
                $('.form-check-input').prop('checked', false);
                $('#btnSelectCVPQ').html($(this).text())
                $(this).addClass('selected-CV')
                var xmlhttp = new XMLHttpRequest();
                var url = "../../coffeeshopmanagement/controllers/C_ChucVu.php?phanquyen=" +
                    $(this).attr('id')
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == 'error') {
                            Swal.fire(
                                'Thất bại!',
                                'Đã xảy ra lỗi. Vui lòng thử lại',
                                'error'
                            )
                        } else {
                            var PhanQuyenList = this.responseText.split("</br>")
                            PhanQuyenList.forEach(element => {
                                $("#" + element).prop('checked', true);
                            });
                        }
                    }
                };
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
        })
        $('#btnEditPQ').click(function() {
            // if (checkPhanQuyen()) {
            if ($('#chucVuSelect').val() != "Lựa chọn...") {
                $('.form-check-input').prop('disabled', false)
                $(this).prop('disabled', true)
                $('#btnSaveEditPQ').removeClass('invisible')
                $('#btnCancelEditPQ').removeClass('invisible')
            } else {
                Swal.fire(
                    'Thất lại!',
                    'Vui lòng chọn chức vụ cần chỉnh sửa',
                    'warning'
                )
            }
            // } else {
            //     Swal.fire(
            //         'Thất bại!',
            //         'Bạn không có quyền thực hiện chức năng này',
            //         'error'
            //     )
            // }
        })
        $('#btnSaveEditPQ').click(function() {
            $('.form-check-input').prop('disabled', true)
            $(this).addClass('invisible')
            $('#btnEditPQ').prop('disabled', false)
            $('#btnCancelEditPQ').addClass('invisible')

            var dsQuyen = ""

            $('.form-check-input:checked').each(function() {
                if ($(this).attr('id') != "") {
                    dsQuyen += $(this).attr('id')
                    dsQuyen += "-"
                }
            })

            var xmlhttp = new XMLHttpRequest();
            var url = "../../coffeeshopmanagement/controllers/C_ChucVu.php?id=" + $('.selected-CV').attr('id') + "&updatePQ=" + dsQuyen;

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 'success') {
                        Swal.fire(
                            'Thành công!',
                            'Thông tin phân quyền đã được lưu lại',
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
        })
        $('#btnCancelEditPQ').click(function() {
            $('.form-check-input').prop('disabled', true)
            $(this).addClass('invisible')
            $('#btnEditPQ').prop('disabled', false)
            $('#btnSaveEditPQ').addClass('invisible')
            Swal.fire(
                'Lưu ý!',
                'Thông tin chỉnh sửa đã không được lưu',
                'warning'
            )
        })

        function checkPhanQuyen() {
            var xmlhttp = new XMLHttpRequest();
            var url = "../../coffeeshopmanagement/controllers/C_PhanQuyen.php?check&quyen=nhansu3";

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
    });
</script>