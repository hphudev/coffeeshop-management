<!-- Table Chuc Vu -->
<div class="card">
    <div class="card-header card-header-primary card-header-icon">
        <h3 class="card-title">Chi tiết bảng chức vụ</h3>
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
                            echo "<tr id='" . $ChucVuList[$i]->get_MaCV() . "'>";
                            echo "<td class='macv'>" . $ChucVuList[$i]->get_MaCV() . "</td>";
                            echo "<td class='tencv'>" . $ChucVuList[$i]->get_TenCV() . "</td>";
                            echo "<td class='trocap'>" . $ChucVuList[$i]->get_MucTroCap() . "</td>";
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
                                    <label class="bmd-label-floating">Mã chức vụ
                                    </label>
                                    <input id="inputMaChucVu" value=" " type="text" class="form-control chucvu_info" disabled>
                                </div>
                                <div class="col-md-7">
                                    <label class="bmd-label-floating">Tên chức vụ
                                    </label>
                                    <input id="inputTenChucVu" value=" " type="text" class="form-control chucvu_info">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="bmd-label-floating">Mức trợ cấp (VNĐ)</label>
                                    <input id="inputMucTroCap" value=" " type="text" class="form-control chucvu_info">

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
        var isViewPQ = false
        var selectedCV = ""
        var tableType = $('#tableType').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        $('.trocap').each(function() {
            var trocap = $(this).text()
            $(this).html(toMoney(trocap))
        })

        $('#btnAddCV').click(function() {
            checkPhanQuyen('nhansu3', function() {
                $('#addCVModel').modal('show')
                $('#inputMaChucVu').attr('value', '')
                $('#inputTenChucVu').attr('value', '')
                $('#inputMucTroCap').attr('value', '')
            })

        })

        $(".btnEditCV").click(function() {
            var $row = $(this).closest('tr')
            checkPhanQuyen('nhansu3', function() {
                $('#addCVModel').modal('show')
                $('#btnConfirmAddCV').addClass('edit')
                $('#inputMaChucVu').attr('value', $row.find('.macv').html())
                $('#inputTenChucVu').attr('value', $row.find('.tencv').html())
                $('#inputMucTroCap').attr('value', $row.find('.trocap').html())
            })
        });

        $(".btnDeleteCV").click(function() {
            var $row = $(this).closest('tr')
            checkPhanQuyen('nhansu3', function() {
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
                        var xmlhttp = new XMLHttpRequest();
                        var url = "../../coffeeshopmanagement/controllers/C_ChucVu.php?delete=" + $row.find('.macv').html();
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                if (this.responseText == 'success') {
                                    Swal.fire({
                                        title: 'Thành công!',
                                        text: "Thông tin chức vụ đã được xóa!",
                                        icon: 'success',
                                        confirmButtonText: 'Ok'
                                    }).then((result) => {
                                        $('#btnDSCV').click()
                                    })
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
            })
        });

        $('#btnConfirmAddCV').click(function() {
            if ($(this).hasClass('edit')) {
                deleteCV()
            } else {
                checkCVInfomation()
            }
        });

        $('#inputMucTroCap').on('input', function() {
            if ($(this).val() == "") {
                $(this).val("0")
            }
            var trocap = toInt($(this).val())
            $(this).val(toMoney(trocap))
        })

        function checkCVInfomation() {
            if (
                $('#inputTenChucVu').val() == "" ||
                $('#inputMucTroCap').val() == "") {
                Swal.fire(
                    'Thất bại!',
                    'Vui lòng nhập đầy đủ thông tin',
                    'error'
                )
            } else {
                checkTenChucVu()
            }
        }

        function checkTenChucVu() {
            var xmlhttp = new XMLHttpRequest();
            var url = "../../coffeeshopmanagement/controllers/C_ChucVu.php?check=" + $('#inputTenChucVu').val().toUpperCase()
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
            var TroCap = toInt($('#inputMucTroCap').val());
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
                "&TenCV=" + $('#inputTenChucVu').val().toString().toUpperCase() +
                "&TroCap=" + toInt($('#inputMucTroCap').val());

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 'success') {
                        $('#addCVModel').modal('hide')
                        Swal.fire({
                            title: 'Thành công!',
                            text: "Thông tin chức vụ đã được thêm mới!",
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            $('#btnDSCV').click()
                        })
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
                "&TenCV=" + $('#inputTenChucVu').val().toString().toUpperCase() +
                "&TroCap=" + toInt($('#inputMucTroCap').val());

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 'success') {
                        $('#addCVModel').modal('hide')
                        Swal.fire({
                            title: 'Thành công!',
                            text: "Thông tin chức vụ đã được chỉnh sửa!",
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            $('#btnDSCV').click()
                        })
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
    });
</script>