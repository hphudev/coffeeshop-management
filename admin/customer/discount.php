<div class="card">
    <div class="card-header card-header-primary card-header-icon">
        <h3 class="card-title">Danh sách khuyến mãi</h3>
        <div>
            <button id="btnAddKM" type="button" rel="tooltip" class="btn btn-success float-right">
                <i class="material-icons">add</i>
                Thêm khuyến mãi
            </button>
            <button id="btnExchangeKM" type="button" rel="tooltip" class="btn btn-info float-right">
                <i class="material-icons">add</i>
                Đổi mã khuyến mãi
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tableKhuyenMai" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-info'>Mã khuyến mãi</th>
                                    <th class='text-center text-info'>Tên khuyến mãi</th>
                                    <th class='text-center text-info'>Thời gian bắt đầu</th>
                                    <th class='text-center text-info'>Thời gian kết thúc</th>
                                    <th class='text-center text-info'>Số lượng phát hành</th>
                                    <th class='text-center text-info'>Phần trăm khuyến mãi</th>
                                    <th class='text-center text-info'>Trị giá tối đa</th>
                                    <th class='text-center text-info'>Hóa đơn áp dụng tối thiểu</th>
                                    <th class='text-center text-info'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center text-info'>Mã khuyến mãi</th>
                                    <th class='text-center text-info'>Tên khuyến mãi</th>
                                    <th class='text-center text-info'>Thời gian bắt đầu</th>
                                    <th class='text-center text-info'>Thời gian kết thúc</th>
                                    <th class='text-center text-info'>Số lượng phát hành</th>
                                    <th class='text-center text-info'>Phần trăm khuyến mãi</th>
                                    <th class='text-center text-info'>Trị giá tối đa</th>
                                    <th class='text-center text-info'>Hóa đơn áp dụng tối thiểu</th>
                                    <th class='text-center text-info'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($DSKhuyenMai); $i++) {
                                    echo "<tr class='text-center' id='" . $DSKhuyenMai[$i]->get_MaKM() . "'>";
                                    echo "<td class='text-center code' >" . $DSKhuyenMai[$i]->get_Code() . "</td>";
                                    echo "<td class='text-center tenkm' >" . $DSKhuyenMai[$i]->get_TenKM() . "</td>";
                                    echo "<td id='" . date("Y-m-d\TH:i", $DSKhuyenMai[$i]->get_ThoiGianBD()) . "' class='text-center ngaybd' >" . date("Y-m-d", $DSKhuyenMai[$i]->get_ThoiGianBD()) . "</td>";
                                    echo "<td id='" . date("Y-m-d\TH:i", $DSKhuyenMai[$i]->get_ThoiGianKT()) . "' class='text-center ngaykt' >" . date("Y-m-d", $DSKhuyenMai[$i]->get_ThoiGianKT()) . "</td>";
                                    echo "<td class='text-center soluong' >" . $DSKhuyenMai[$i]->get_SoLuong() . "</td>";
                                    echo "<td class='text-center phantram' >" . $DSKhuyenMai[$i]->get_PhanTramKM() . "</td>";
                                    echo "<td class='text-center toida' >" . $DSKhuyenMai[$i]->get_TienKMToiDa() . "</td>";
                                    echo "<td class='text-center toithieu' >" . $DSKhuyenMai[$i]->get_TienHDToiThieu() . "</td>";

                                ?>
                                    <td class="td-actions text-center">
                                        <button <?php
                                                echo 'id="' . $DSKhuyenMai[$i]->get_MaKM() . '"'
                                                ?> type="button" rel="tooltip" class="btn btnEditKM btn-link btn-warning btn-just-icon" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa thông tin">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button <?php
                                                echo 'id="' . $DSKhuyenMai[$i]->get_MaKM() . '"'
                                                ?> type="button" rel="tooltip" class="btn btnDeleteKM btn-link btn-danger btn-just-icon" data-toggle="tooltip" data-placement="top" title="Xóa khách hàng">
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
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalKhuyenMai" tabindex="-1" role="dialog" aria-labelledby="modalKhachHang" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Thêm khuyến mãi</p>
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
                        <h4 class="card-title">Thông tin khuyến mãi</h4>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class=" col-md-12">
                                    <label class="bmd-label-floating">Mã khuyến mãi</label>
                                    <input id="inputCode" type="text" class="form-control personal_info" value="">
                                </div>
                                <div class=" col-md-12">
                                    <label class="bmd-label-floating">Tên khuyến mãi</label>
                                    <input id="inputName" type="text" class="form-control personal_info" value="">
                                </div>
                                <div class=" col-md-12">
                                    <label class="bmd-label-floating">Ngày bắt đầu</label>
                                    <input id="inputNgayBD" type="datetime-local" class="form-control personal_info" value="<?php
                                                                                                                            $now = new DateTime('now');
                                                                                                                            echo $now->format("Y-m-d\TH:i")
                                                                                                                            ?>">
                                </div>
                                <div class=" col-md-12">
                                    <label class="bmd-label-floating">Ngày kết thúc</label>
                                    <input id="inputNgayKT" type="datetime-local" class="form-control personal_info" value="<?php
                                                                                                                            $now = new DateTime('now');
                                                                                                                            echo $now->format("Y-m-d\TH:i")
                                                                                                                            ?>">
                                </div>
                                <div class=" col-md-6">
                                    <label class="bmd-label-floating">Số lượng phát hành</label>
                                    <input id="inputAmount" type="number" class="form-control personal_info" value="">
                                </div>
                                <div class=" col-md-6">
                                    <label class="bmd-label-floating">Phần trăm khuyến mãi</label>
                                    <input id="inputPercent" type="number" class="form-control personal_info" value="">
                                </div>
                                <div class=" col-md-6">
                                    <label class="bmd-label-floating">Trị giá tối đa</label>
                                    <input id="inputMaximum" type="number" class="form-control personal_info" value="">
                                </div>
                                <div class=" col-md-6">
                                    <label class="bmd-label-floating">Hóa đơn áp dụng</label>
                                    <input id="inputMinimum" type="number" class="form-control personal_info" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button id="btnConfirm" type="button" class="btn btn-success">Lưu</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDoiMaKM" tabindex="-1" role="dialog" aria-labelledby="modalKhachHang" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Thêm khuyến mãi</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <h4 class="card-title">Thông tin khách hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="bmd-label-floating">Số điện thoại</label>
                                    <input id="inputSDTKH" type="text" class="form-control personal_info" value="">
                                </div>
                                <div class="col-md-4">
                                    <button id="btnFindKHInfo" type="button" rel="tooltip" class="btn btn-info float-right">
                                        Tìm kiếm
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">Tên khách hàng</label>
                                    <input id="khName" type="text" class="form-control personal_info" value="" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">Điểm tích lũy</label>
                                    <input id="khPoint" type="number" class="form-control personal_info" value="" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header card-header-success card-header-icon">
                        <h4 class="card-title">Thông tin khuyến mãi</h4>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="bmd-label-floating">Mã khuyến mãi</label>
                                    <input id="inputKMCode" type="text" class="form-control personal_info" value="">
                                </div>
                                <div class="col-md-4">
                                    <button id="btnAutoGenerate" type="button" rel="tooltip" class="btn btn-info float-right">
                                        Tạo mã
                                    </button>
                                </div>
                                <div class="col-md-12">
                                    <label class="bmd-label-floating">Tên khuyến mãi</label>
                                    <input id="inputKMName" type="text" class="form-control personal_info" value="Đổi thưởng khách hàng" disabled>
                                </div>
                                <div class="col-md-12">
                                    <label class="bmd-label-floating">Trị giá (VNĐ)</label>
                                    <input id="inputKMValue" type="number" class="form-control personal_info" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button id="btnCreateKM" type="button" class="btn btn-success">Lưu</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var selectedKMID = ""
        var selectedKHID = ""
        var modal = $('#modalKhuyenMai')
        var modal2 = $('#modalDoiMaKM')
        var tableNV = $('#tableKhuyenMai').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        })

        function initModalData($row) {
            $('#inputCode').attr('value', $row.find('.code').html())
            $('#inputName').attr('value', $row.find('.tenkm').html())
            $('#inputNgayBD').attr('value', $row.find('.ngaybd').attr('id'))
            $('#inputNgayKT').attr('value', $row.find('.ngaykt').attr('id'))
            $('#inputAmount').attr('value', $row.find('.soluong').html())
            $('#inputPercent').attr('value', $row.find('.phantram').html())
            $('#inputMaximum').attr('value', $row.find('.toida').html())
            $('#inputMinimum').attr('value', $row.find('.toithieu').html())
        }

        function clearModalData() {
            $('#inputCode').attr('value', '')
            $('#inputName').attr('value', '')
            $('#inputNgayBD').attr('value', '')
            $('#inputNgayKT').attr('value', '')
            $('#inputAmount').attr('value', '')
            $('#inputPercent').attr('value', '')
            $('#inputMaximum').attr('value', '')
            $('#inputMinimum').attr('value', '')
        }

        function updateKhuyenMai() {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                data: {
                    action: 'updateKM',
                    id: selectedKMID,
                    code: $('#inputCode').val(),
                    tenkm: $('#inputName').val(),
                    ngaybd: $('#inputNgayBD').val(),
                    ngaykt: $('#inputNgayKT').val(),
                    soluong: $('#inputAmount').val(),
                    tyle: $('#inputPercent').val(),
                    toida: $('#inputMaximum').val(),
                    toithieu: $('#inputMinimum').val()
                },
                beforeSend: function() {

                },
                success: function(response) {
                    Swal.fire({
                        title: response
                    })
                    // if (response.includes("success"))
                    //     Swal.fire(
                    //         'Thành công!',
                    //         'Thông tin khuyến mãi đã được cập nhật',
                    //         'success'
                    //     )
                    // else
                    //     Swal.fire(
                    //         'Thất bại!',
                    //         '.Đã xảy ra lỗi. Vui lòng thử lại',
                    //         'error'
                    //     )
                },
                complete: function() {
                    modal.modal('hide')
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
        }

        function addKhuyenMai() {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                data: {
                    action: 'addKM',
                    code: $('#inputCode').val(),
                    tenkm: $('#inputName').val(),
                    ngaybd: $('#inputNgayBD').val(),
                    ngaykt: $('#inputNgayKT').val(),
                    soluong: $('#inputAmount').val(),
                    tyle: $('#inputPercent').val(),
                    toida: $('#inputMaximum').val(),
                    toithieu: $('#inputMinimum').val()
                },
                beforeSend: function() {

                },
                success: function(response) {
                    Swal.fire({
                        title: response,
                    })
                    // if (response.includes("success"))
                    //     Swal.fire(
                    //         'Thành công!',
                    //         'Thông tin đã tạo mã khuyến mãi thành công!\nMã đã tạo: ' + $('#inputCode').val(),
                    //         'success'
                    //     )
                    // else if (response.includes("exist"))
                    //     Swal.fire(
                    //         'Thất bại!',
                    //         'Mã khuyến mãi đã tồn tại!',
                    //         'error'
                    //     )
                    // else {
                    //     Swal.fire(
                    //         'Thất bại!',
                    //         'Đã xảy ra lỗi. Vui lòng thử lại',
                    //         'error'
                    //     )
                    // }
                },
                complete: function() {
                    modal.modal('hide')
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
        }

        function generateCode() {
            var result = '';
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < 8; i++) {
                result += characters.charAt(Math.floor(Math.random() *
                    charactersLength));
            }
            return result;
        }

        function checkPoint() {
            var point = $('#khPoint').val()
            var giatri = $('#inputKMValue').val() / 1000
            if (point == "") {
                Swal.fire(
                    "Thất bại",
                    "Không tìm thấy thông tin khách hàng!",
                    "error"
                )
            } else if (point < giatri) {
                Swal.fire(
                    "Thất bại",
                    "Không đủ điểm tích lũy!\nVui lòng nhập giá trị nhỏ hơn!",
                    "error"
                )
            } else {
                createKM(giatri)
            }
        }

        function createKM(point) {
            var date = new Date()
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                data: {
                    action: 'addKM',
                    code: $('#inputKMCode').val(),
                    tenkm: $('#inputKMName').val(),
                    ngaybd: date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + (date.getDate() + 1),
                    ngaykt: (date.getFullYear() + 1) + "-" + (date.getMonth() + 1) + "-" + (date.getDate() + 1),
                    soluong: 1,
                    tyle: 100,
                    toida: $('#inputKMValue').val(),
                    toithieu: 0,
                    khID: selectedKHID,
                    point: point,
                },
                beforeSend: function() {

                },
                success: function(response) {
                    // Swal.fire({
                    //     title: response,
                    // })
                    if (response.includes("success"))
                        Swal.fire(
                            'Thành công',
                            'Mã khuyến mãi đã được tạo!',
                            'success'
                        )
                    else if (response.includes("exist"))
                        Swal.fire(
                            'Thất bại!',
                            'Mã khuyến mãi đã tồn tại!',
                            'error'
                        )
                    else {
                        Swal.fire(
                            'Thất bại!',
                            'Đã xảy ra lỗi. Vui lòng thử lại',
                            'error'
                        )
                    }
                },
                complete: function() {
                    modal.modal('hide')
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })

        }

        function deleteKM() {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                data: {
                    action: 'deleteKM',
                    id: selectedKMID,
                },
                beforeSend: function() {

                },
                success: function(response) {
                    // Swal.fire({
                    //     title: response,
                    // })
                    if (response.includes("success"))
                        Swal.fire(
                            'Thành công',
                            'Mã khuyến mãi đã được xóa khỏi hệ thống',
                            'success'
                        )
                    else {
                        Swal.fire(
                            'Thất bại!',
                            'Đã xảy ra lỗi. Vui lòng thử lại',
                            'error'
                        )
                    }
                },
                complete: function() {
                    modal.modal('hide')
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })

        }

        $('#btnFindKHInfo').click(function() {
            if ($('#inputSDTKH').val() == "") {
                Swal.fire(
                    'Thất bại!',
                    'Vui lòng nhập số điện thoại!',
                    'error'
                )
            } else {
                $.ajax({
                    type: "POST",
                    url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                    data: {
                        action: 'findKH',
                        sdt: $('#inputSDTKH').val()
                    },
                    beforeSend: function() {

                    },
                    success: function(response) {
                        // Swal.fire({
                        //     title: response,
                        // })
                        if (response.includes("error"))
                            Swal.fire(
                                'Thất bại!',
                                '.Đã xảy ra lỗi. Vui lòng thử lại',
                                'error'
                            )
                        else {
                            $arr = response.split("\n")
                            $('#khName').val($arr[0])
                            selectedKHID = $arr[1]
                            $('#khPoint').val($arr[2])
                        }

                    },
                    complete: function() {
                        modal.modal('hide')
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                })
            }
        })

        $('#btnAutoGenerate').click(function() {
            $('#inputKMCode').val(generateCode())
        })

        $('#btnAddKM').click(function() {
            modal.modal('show')
            clearModalData()
        })

        $('#btnExchangeKM').click(function() {
            modal2.modal('show')
            clearModalData()
        })

        $('.btnEditKM').click(function() {
            var $row = $(this).closest('tr')
            $("#btnConfirm").addClass('view')
            modal.modal('show')
            selectedKMID = $row.attr('id');
            initModalData($row)
        })

        $('.btnDeleteKM').click(function() {
            var $row = $(this).closest('tr')
            selectedKMID = $row.attr('id');
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa khuyến mãi?',
                text: "Việc làm này sẽ không thể hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteKM()
                }
            })
        })

        $("#btnConfirm").click(function() {
            if ($(this).hasClass('view')) {
                updateKhuyenMai()
            } else {
                addKhuyenMai()
            }
        })

        $('#btnCreateKM').click(function() {
            checkPoint()
        })
    })
</script>