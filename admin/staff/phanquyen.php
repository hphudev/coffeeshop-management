<div class="card">
    <div class="card-header card-header-primary card-header-icon">
        <h3 class="card-title">Chi tiết bảng phân quyền</h3>
    </div>
    <div class="card-body">
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
                            <div id="chucVuSelect" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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
                    <div class="col-md-12">
                        <h4>
                            KHÁCH HÀNG
                        </h4>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="kh0" class="form-check-input" type="checkbox" value="" disabled>
                                            Xem thông tin khách hàng
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="kh1" class="form-check-input" type="checkbox" value="" disabled>
                                            Chỉnh sửa/ thêm/ xóa thông tin khách hàng
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="kh2" class="form-check-input" type="checkbox" value="" disabled>
                                            Xem thông tin hạng thành viên
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="kh3" class="form-check-input" type="checkbox" value="" disabled>
                                            Chỉnh sửa/ Thêm/ Xóa thông tin hạng thành viên
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="kh4" class="form-check-input" type="checkbox" value="" disabled>
                                            Xem thông tin khuyến mãi
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="kh5" class="form-check-input" type="checkbox" value="" disabled>
                                            Thêm/ Xóa/Chỉnh sửa thông tin khuyến mãi. Đổi điểm tích lũy
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4>
                            TÀI CHÍNH
                        </h4>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
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
                    <div class="col-md-12">
                        <h4>
                            BÁN HÀNG
                        </h4>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
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
                                <div class="col-md-12">
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
                                <div class="col-md-12">
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
                    <div class="col-md-12">
                        <h4>
                            MÓN
                        </h4>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="mon0" class="form-check-input" type="checkbox" value="" disabled>
                                            Xem danh sách món
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="mon1" class="form-check-input" type="checkbox" value="" disabled>
                                            Thực hiện các thao tác với món
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4>
                            NHÂN SỰ
                        </h4>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
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
                                <div class="col-md-12">
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
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="nhansu2" class="form-check-input" type="checkbox" value="" disabled>
                                            Xem thông tin chức vụ
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
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
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="nhansu4" class="form-check-input" type="checkbox" value="" disabled>
                                            Xem thông tin bảng phân quyền
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input id="nhansu5" class="form-check-input" type="checkbox" disabled>
                                            Chỉnh sửa thông tin bảng phân quyền
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4>
                            KHO
                        </h4>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
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
                                <div class="col-md-12">
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

<script>
    $(document).ready(function() {
        isViewPQ = false

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
                            "Thất bại",
                            "Bạn không có quyền thực hiện chức năng này!",
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

        // Bang phan quyen
        $('.dropdown-item').click(function() {
            if ($('#btnEditPQ').prop('disabled') == true) {
                Swal.fire(
                    'Lưu ý!',
                    'Vui lòng lưu lại chỉnh sửa hiện tại!',
                    'warning'
                )
            } else {
                isViewPQ = true
                $('.form-check-input').prop('checked', false);
                $('#btnSelectCVPQ').html($(this).text())
                $('.selected-CV').removeClass('selected-CV')
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
            checkPhanQuyen('nhansu3', function() {
                if (isViewPQ) {
                    $('.form-check-input').prop('disabled', false)
                    $('#btnEditPQ').prop('disabled', true)
                    $('#btnSaveEditPQ').removeClass('invisible')
                    $('#btnCancelEditPQ').removeClass('invisible')
                } else {
                    Swal.fire(
                        'Thất lại!',
                        'Vui lòng chọn chức vụ cần chỉnh sửa',
                        'warning'
                    )
                }
            })
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
            $('#btnBangPQ').click()
        })
    })
</script>