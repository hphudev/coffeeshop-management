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
        var isViewPQ = false
        var tableType = $('#tableType').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        $('#btnAddCV').click(function() {
            checkPhanQuyen('nhansu3', function() {
                $('#addCVModel').modal('show')
                $('#inputMaChucVu').attr('value', '')
                $('#inputTenChucVu').attr('value', '')
                $('#inputMucTroCap').attr('value', '')
            })

        })

        $(".btnEditCV").click(function() {
            checkPhanQuyen('nhansu3', function() {
                $('#addCVModel').modal('show')
                var $row = $(this).closest('tr')
                var $columns = $row.find('td');
                $('#btnConfirmAddCV').addClass('edit')
                $('#inputMaChucVu').attr('value', $columns[0].innerHTML)
                $('#inputTenChucVu').attr('value', $columns[1].innerHTML)
                $('#inputMucTroCap').attr('value', $columns[2].innerHTML)
            })
        });

        $(".btnDeleteCV").click(function() {
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
        })
    });
</script>