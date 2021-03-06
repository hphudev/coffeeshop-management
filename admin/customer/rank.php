<div class="card">
    <div class="card-header card-header-primary card-header-icon">
        <h3 class="card-title">Danh sách hạng thành viên</h3>
        <div>
            <button id="btnAddTV" type="button" rel="tooltip" class="btn btn-success float-right">
                <i class="material-icons">add</i>
                Thêm hạng thành viên
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
                                    <th class='text-center text-info'>Tên hạng thành viên</th>
                                    <th class='text-center text-info'>Điểm tích lũy lên hạng (VNĐ)</th>
                                    <th class='text-center text-info'>Tỷ lệ tích lũy</th>
                                    <th class='text-center text-info'>Hạng thành viên</th>
                                    <th class='text-center text-info'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center text-info'>Tên hạng thành viên</th>
                                    <th class='text-center text-info'>Điểm tích lũy lên hạng (VNĐ)</th>
                                    <th class='text-center text-info'>Tỷ lệ tích lũy</th>
                                    <th class='text-center text-info'>Hạng thành viên</th>
                                    <th class='text-center text-info'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($DSHangTV); $i++) {
                                    echo "<tr class='text-center' id='" . $DSHangTV[$i]->get_MaLoaiTV() . "'>";
                                    echo "<td class='text-center tenloai' >" . $DSHangTV[$i]->get_TenLoaiTV() . "</td>";
                                    echo "<td class='text-center diemlenhang' >" . $DSHangTV[$i]->get_DiemLenHang() . "</td>";
                                    echo "<td class='text-center tichdiem' >" . $DSHangTV[$i]->get_TyLeTichDiem() . "</td>";
                                    echo "<td class='text-center hangtv' >" . $DSHangTV[$i]->get_HangTV() . "</td>";
                                ?>
                                    <td class="td-actions text-center">
                                        <button <?php
                                                echo 'id="' . $DSHangTV[$i]->get_MaLoaiTV() . '"'
                                                ?> type="button" rel="tooltip" class="btn btnEditRank btn-link btn-warning btn-just-icon" data-toggle="tooltip" data-placement="top" title="Chỉnh sửa thông tin">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button <?php
                                                echo 'id="' . $DSHangTV[$i]->get_MaLoaiTV() . '"'
                                                ?> type="button" rel="tooltip" class="btn btnDeleteRank btn-link btn-danger btn-just-icon" data-toggle="tooltip" data-placement="top" title="Xóa khách hàng">
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

<div class="modal fade" id="modalKhachHang" tabindex="-1" role="dialog" aria-labelledby="modalKhachHang" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Thêm hạng thành viên</p>
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
                        <h4 class="card-title">Thông tin hạng thành viên</h4>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class=" col-md-12">
                                    <label class="bmd-label-floating">Tên hạng thành viên</label>
                                    <input id="inputName" type="text" class="form-control personal_info" value="">
                                </div>
                                <div class=" col-md-6">
                                    <label class="bmd-label-floating">Tỷ lệ tích lũy</label>
                                    <input id="inputRating" type="number" class="form-control personal_info" value="">
                                </div>
                                <div class=" col-md-6">
                                    <label class="bmd-label-floating">Điểm tích lũy lên hạng (VNĐ)</label>
                                    <input id="inputPoint" type="text" class="form-control personal_info" value="">
                                </div>
                                <div class=" col-md-12">
                                    <label class="bmd-label-floating">Hạng thành viên</label>
                                    <input id="inputRank" type="number" class="form-control personal_info" value="" disabled>
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

<script>
    $(document).ready(function() {
        var selectedRankId = "";
        var modal = $('#modalKhachHang')
        var tableNV = $('#tableNhanVien').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        $('.diemlenhang').each(function() {
            $(this).html(toMoney($(this).html()))
        })

        $('#inputPoint').on('input', function() {
            if ($(this).val() == "")
                $(this).val("0")
            var point = toInt($(this).val())
            $(this).val(toMoney(point))
        })

        function initModalData($row) {
            $('#inputName').attr('value', $row.find('.tenloai').html())
            $('#inputRating').attr('value', $row.find('.tichdiem').html())
            $('#inputPoint').attr('value', $row.find('.diemlenhang').html())
            $('#inputRank').attr('value', $row.find('.hangtv').html())
        }

        function clearModalData() {
            $('#inputName').attr('value', '')
            $('#inputRating').attr('value', '')
            $('#inputPoint').attr('value', '')
            $('#inputRank').attr('value', '')
        }

        function updateHangTV() {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                data: {
                    action: 'updateHangTV',
                    id: selectedRankId,
                    tenloaitv: $('#inputName').val(),
                    tyletichluy: $('#inputRating').val(),
                    diemlenhang: toInt($('#inputPoint').val()),
                    hangtv: $('#inputRank').val()
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
                            text: "Hạng thành viên đã được cập nhật!",
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            $('#btnHangTV').click()
                        })
                    } else {
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

        function addHangTV() {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                data: {
                    action: "addHangTV",
                    tenloaitv: $('#inputName').val(),
                    tyletichluy: $('#inputRating').val(),
                    diemlenhang: toInt($('#inputPoint').val()),
                    hangtv: $('#inputRank').val()
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
                            text: "Hạng thành viên đã được thêm!",
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            $('#btnHangTV').click()
                        })
                    } else if (response.includes("exist")) {
                        Swal.fire(
                            'Thất bại!',
                            'Tên hạng thành viên đã tồn tại!',
                            'error'
                        )
                    } else
                        Swal.fire(
                            'Thất bại!',
                            '.Đã xảy ra lỗi. Vui lòng thử lại',
                            'error'
                        )
                },
                complete: function() {
                    modal.modal('hide')
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
        }

        function deleteHangTV(id) {
            $.ajax({
                type: "POST",
                url: "/coffeeshopmanagement/controllers/C_KhachHang.php",
                data: {
                    action: "deleteHangTV",
                    id: id
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
                            text: "Hạng thành viên đã được xóa!",
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            $('#btnHangTV').click()
                        })
                    } else if (response.includes("exist")) {
                        Swal.fire(
                            'Thất bại!',
                            'Không thể xóa vì có khách hàng ở hạng thành viên này!',
                            'error'
                        )
                    } else
                        Swal.fire(
                            'Thất bại!',
                            '.Đã xảy ra lỗi. Vui lòng thử lại',
                            'error'
                        )
                },
                complete: function() {
                    modal.modal('hide')
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            })
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

        $('#btnAddTV').click(function() {
            checkPhanQuyen('kh4', function() {
                modal.modal('show')
                clearModalData()
            })
        })

        $('.btnEditRank').click(function() {
            var $row = $(this).closest('tr')
            selectedRankId = $row.attr('id')
            checkPhanQuyen('kh4', function() {
                $("#btnConfirm").addClass('view')
                modal.modal('show')
                initModalData($row)
            })
        })

        $('.btnDeleteRank').click(function() {
            var $row = $(this).closest('tr')
            checkPhanQuyen('kh4', function() {
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
                        deleteHangTV($row.attr('id'))
                    }
                })
            })
        })

        $("#btnConfirm").click(function() {
            if ($(this).hasClass('view')) {
                updateHangTV()
            } else {
                addHangTV()
            }
        })
    })
</script>