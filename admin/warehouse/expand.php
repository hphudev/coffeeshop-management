<?php
include '../models/M_DonViTinh.php';
include '../models/M_LoaiNguyenVatLieu.php';
include '../models/M_NhaCungCap.php';
include '../models/M_TinhTrang.php';

$ModelDonViTinh = new Model_DonViTinh();
$DonViTinhList = $ModelDonViTinh->get_AllDonViTinh();

$ModelLoaiNguyenVatLieu = new Model_LoaiNguyenVatLieu();
$LoaiNguyenVatLieuList = $ModelLoaiNguyenVatLieu->get_AllLoaiNguyenVatLieu();

$ModelNhaCungCap = new Model_NhaCungCap();
$NhaCungCapList = $ModelNhaCungCap->get_AllNhaCungCap();

$ModelTinhTrang = new Model_TinhTrang();
$TinhTrangList = $ModelTinhTrang->get_AllTinhTrang();
?>

<style>
    p {
        margin-bottom: 0 !important; 
    }

    .pd-8 {
        padding-left: 8px;
        padding-right: 8px;
    }

    .mt-24 {
        margin-top: 24px !important;
    }

    .flex-sp-bet {
        align-items: center;
        justify-content: space-between;
    }

    .buttons-group,
    .fields-group,
    .flex-sp-bet {
        display: flex;
    }

    .fields-group {
        align-items: center;
        justify-content: space-evenly;
    }

    .line-break {
        width: 100%;
        height: 1px;
        background-color: #ccc;
    }

    .content-in-card,
    .sections-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .content-in-card {
        justify-content: flex-end;
    }

    .sections-container {
        width: 100%;
        height: auto;
        justify-content: center;
    }

    .input-label {
        width: 35%;
    }

    .input-value {
        width: 65%;
    }   

    .modal-body{
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }

    /* mobile */
    @media (max-width: 739px) {
        .buttons-group {
            flex-direction: column;
        }

        .modal-width-sm {
            max-width: 90%;
            margin: auto;
        }

        .input-label {
            width: 35%;
        }

        .input-value {
            width: 64%;
        }   
    }
    /* tablet */
    @media (max-width: 1023px) {
        .hide-sm-md {
            display: none;
        }

        .below-menu-icon {
            margin-top: 40px;
            justify-content: center;
        }
    }
</style>

<div class="container-fluid">
    <div class="flex-sp-bet below-menu-icon col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h3 class="d-none d-sm-none d-md-none d-lg-block d-xl-block"><strong>KHO / MỞ RỘNG</strong></h3>

        <div class="buttons-group">
            <div class="btn btn-material">Nguyên vật liệu</div>
            <div class="btn btn-import">Nhập kho</div>
            <div class="btn btn-export">Xuất kho</div>
            <div class="btn btn-report">Kiểm kho</div>
            <div class="btn btn-success">Mở rộng</div>
        </div>
    </div>

    <div class="line-break"></div>

    <div class="sections-container">
        <!-- đơn vị tính -->
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-success">
                    <div class="card-text">
                        <h4 class="card-title">Đơn vị tính</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-success btn-add-unit" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Thêm ĐVT
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesUnit" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <!-- <th class='text-center text-success'>STT</th> -->
                                    <th class='text-center text-success'>Mã ĐVT</th>
                                    <th class='text-center text-success'>Tên đơn vị tính</th>
                                    <th class='text-center text-success'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <!-- <th class='text-center'>STT</th> -->
                                    <th class='text-center'>Mã ĐVT</th>
                                    <th class='text-center'>Tên đơn vị tính</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($DonViTinhList && count($DonViTinhList) > 0) {
                                // output data of each row
                                for ($i = 0; $i < count($DonViTinhList); $i++) {
                                    echo "<tr role='row' class='odd' id='" . $DonViTinhList[$i]->get_MaDVT() . "'>";
                                    // echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                    echo "<td class='text-center unit-id'>" . $DonViTinhList[$i]->get_MaDVT() . "</td>";
                                    echo "<td class='text-center unit-name'>" . $DonViTinhList[$i]->get_TenDVT() . "</td>";
                                    echo '<td class="td-actions text-center">
                                            <button type="button" id="' . $DonViTinhList[$i]->get_MaDVT() . '" rel="tooltip" class="btn btn-success btn-edit-unit" data-target="#myModal" data-toggle="modal">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" id="' . $DonViTinhList[$i]->get_MaDVT() . '" rel="tooltip" class="btn btn-danger btn-delete-unit">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>';
                                    echo "</tr>";
                                }
                                } else {
                                echo "Dữ liệu trống!";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- loại nguyên vật liệu -->
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-info">
                    <div class="card-text">
                        <h4 class="card-title">Loại nguyên vật liệu</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-info btn-add-mater-type" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Thêm loại NVL
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesType" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-info'>STT</th>
                                    <th class='text-center text-info'>Mã loại</th>
                                    <th class='text-center text-info'>Tên loại NVL</th>
                                    <th class='text-center text-info'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>Mã loại</th>
                                    <th class='text-center'>Tên loại NVL</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($LoaiNguyenVatLieuList && count($LoaiNguyenVatLieuList) > 0) {
                                // output data of each row
                                for ($i = 0; $i < count($LoaiNguyenVatLieuList); $i++) {
                                    echo "<tr role='row' class='odd' id='" . $LoaiNguyenVatLieuList[$i]->get_MaLoaiNVL() . "'>";
                                    echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                    echo "<td class='text-center type-id'>" . $LoaiNguyenVatLieuList[$i]->get_MaLoaiNVL() . "</td>";
                                    echo "<td class='text-center type-name'>" . $LoaiNguyenVatLieuList[$i]->get_TenLoaiNVL() . "</td>";
                                    echo '<td class="td-actions text-center">
                                            <button type="button" id="' . $LoaiNguyenVatLieuList[$i]->get_MaLoaiNVL() . '" rel="tooltip" class="btn btn-success btn-edit-type" data-target="#myModal" data-toggle="modal">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" id="' . $LoaiNguyenVatLieuList[$i]->get_MaLoaiNVL() . '" rel="tooltip" class="btn btn-danger btn-delete-mater-type">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>';
                                    echo "</tr>";
                                }
                                } else {
                                    echo "Dữ liệu trống!";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- tình trạng -->
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-warning">
                    <div class="card-text">
                        <h4 class="card-title">Tình trạng</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-warning btn-add-sts" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Thêm t. trạng
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesType" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-warning'>STT</th>
                                    <th class='text-center text-warning'>Mã tình trạng</th>
                                    <th class='text-center text-warning'>Tên tình trạng</th>
                                    <th class='text-center text-warning'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>Mã tình trạng</th>
                                    <th class='text-center'>Tên tình trạng</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($TinhTrangList && count($TinhTrangList) > 0) {
                                // output data of each row
                                for ($i = 0; $i < count($TinhTrangList); $i++) {
                                    echo "<tr role='row' class='odd' id='" . $TinhTrangList[$i]->get_MaTinhTrang() . "'>";
                                    echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                    echo "<td class='text-center sts-id'>" . $TinhTrangList[$i]->get_MaTinhTrang() . "</td>";
                                    echo "<td class='text-center sts-name'>" . $TinhTrangList[$i]->get_TenTinhTrang() . "</td>";
                                    echo '<td class="td-actions text-center">
                                            <button type="button" id="' . $TinhTrangList[$i]->get_MaTinhTrang() . '" rel="tooltip" class="btn btn-success btn-edit-sts" data-target="#myModal" data-toggle="modal">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" id="' . $TinhTrangList[$i]->get_MaTinhTrang() . '" rel="tooltip" class="btn btn-danger btn-delete-sts">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>';
                                    echo "</tr>";
                                }
                                } else {
                                echo "Dữ liệu trống!";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- nhà cung cấp -->
        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header card-header-text card-header-primary">
                    <div class="card-text">
                        <h4 class="card-title">Nhà cung cấp</h4>
                    </div>
                </div>
                <div class="card-body content-in-card">
                    <button class="btn btn-primary btn-add-supplier" data-toggle="modal" data-target="#myModal">
                        <i class="material-icons">add</i>
                        Thêm NCC
                    </button>

                    <div class="table-responsive">
                        <table id="datatablesSupplier" class="datatables table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" role="grid" aria-describedby="datatables_info">
                            <thead>
                                <tr role="row">
                                    <th class='text-center text-primary'>STT</th>
                                    <th class='text-center text-primary'>Mã NCC</th>
                                    <th class='text-center text-primary'>Tên nhà cung cấp</th>
                                    <th class='text-center text-primary'>Thao tác</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th class='text-center'>STT</th>
                                    <th class='text-center'>Mã NCC</th>
                                    <th class='text-center'>Tên nhà cung cấp</th>
                                    <th class='text-center'>Thao tác</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($NhaCungCapList && count($NhaCungCapList) > 0) {
                                // output data of each row
                                for ($i = 0; $i < count($NhaCungCapList); $i++) {
                                    echo "<tr role='row' class='odd' id='" . $NhaCungCapList[$i]->get_MaNCC() . "'>";
                                    echo "<td tabindex='0' class='text-center sorting_1'>" . ($i + 1) . "</td>";
                                    echo "<td class='text-center supplier-id'>" . $NhaCungCapList[$i]->get_MaNCC() . "</td>";
                                    echo "<td class='text-center supplier-name'>" . $NhaCungCapList[$i]->get_TenNCC() . "</td>";
                                    echo '<td class="td-actions text-center">
                                            <button type="button" id="' . $NhaCungCapList[$i]->get_MaNCC() . '" rel="tooltip" class="btn btn-success btn-edit-supplier" data-target="#myModal" data-toggle="modal">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" id="' . $NhaCungCapList[$i]->get_MaNCC() . '" rel="tooltip" class="btn btn-danger btn-delete-supplier">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>';
                                    echo "</tr>";
                                }
                                } else {
                                echo "Dữ liệu trống!";
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

<!-- Add đơn vị tính/ loại NVL/ ncc modal -->
<div class="modal modal-width-sm fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5><strong class="modal-title">Thêm nguyên vật liệu</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <form id="addForm" class="form" method="post">
                <div class="form-group bmd-form-group">
                    <div class="fields-group">
                        <p class="input-label text-left">Tên NVL: </p>
                        <input name="name" id="obj-name-val" class="form-control input-value"
                            required type="text" placeholder="Nhập tên"
                        >
                    </div>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">Đóng</button>
            <button id="saveData" type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
  </div>
</div>

<script>
    var object = "";
    var path = "";
    var action_type = "";
    var obj_id = "";
    $(document).ready(function() {
        //init datatables
        $('.datatables').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/vi.json'
            }
        });

        //nguyên vật liệu
        $(".btn-material").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse";
        });

        //nhập kho
        $(".btn-import").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&receipt";
        });

        //xuất kho
        $(".btn-export").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&export";
        });

        //kiểm kho
        $(".btn-report").on("click", function() {
            window.location.href = "../admin/index.php?page=werehouse&report";
        });

        //add đvt
        $(".btn-add-unit").on("click", function() {
            object = "unit";
            action_type = "add-unit";
            path = "../controllers/C_DonViTinh.php";
            $(".input-label").text("Tên đơn vị tính:");
            $(".modal-title").text("Thêm đơn vị tính");
            $("#obj-name-val").val("");
        });

        //add loại nvl
        $(".btn-add-mater-type").on("click", function() {
            object = "material type";
            action_type = "add-type";
            path = "../controllers/C_LoaiNguyenVatLieu.php";
            $(".input-label").text("Tên loại ng. vật liệu:");
            $(".modal-title").text("Thêm loại nguyên vật liệu");
            $("#obj-name-val").val("");
        });

        //add tình trạng
        $(".btn-add-sts").on("click", function() {
            object = "status";
            action_type = "add-sts";
            path = "../controllers/C_TinhTrang.php";
            $(".input-label").text("Tên tình trạng:");
            $(".modal-title").text("Thêm tình trạng");
            $("#obj-name-val").val("");
        });

        //add ncc
        $(".btn-add-supplier").on("click", function() {
            object = "supplier";
            action_type = "add-supplier";
            path = "../controllers/C_NhaCungCap.php";
            $(".input-label").text("Tên nhà cung cấp:");
            $(".modal-title").text("Thêm nhà cung cấp");
            $("#obj-name-val").val("");
        });

        //edit đvt
        $(".btn-edit-unit").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                obj_id = $row.attr('id');
                object = "unit";
                action_type = "edit-unit";
                path = "../controllers/C_DonViTinh.php";

                $(".input-label").text("Tên đơn vị tính:");
                $(".modal-title").text("Chỉnh sửa đơn vị tính");
                $("#obj-name-val").val($row.find(".unit-name").text());
            });
        });

        //edit loại nvl
        $(".btn-edit-type").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                obj_id = $row.attr('id');
                object = "material type";
                action_type = "edit-type";
                path = "../controllers/C_LoaiNguyenVatLieu.php";

                $(".input-label").text("Tên loại ng. vật liệu:");
                $(".modal-title").text("Chỉnh sửa loại nguyên vật liệu");
                $("#obj-name-val").val($row.find(".type-name").text());
            });
        });

        //edit tình trạng
        $(".btn-edit-sts").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                obj_id = $row.attr('id');
                object = "status";
                action_type = "edit-sts";
                path = "../controllers/C_TinhTrang.php";

                $(".input-label").text("Tên tình trạng:");
                $(".modal-title").text("Chỉnh sửa tình trạng");
                $("#obj-name-val").val($row.find(".sts-name").text());
                console.log(obj_id);
            });
        });

        //edit ncc
        $(".btn-edit-supplier").each(function(index) {
            $(this).on("click", function() {
                var $row = $(this).closest('tr');
                obj_id = $row.attr('id');
                object = "supplier";
                action_type = "edit-supplier";
                path = "../controllers/C_NhaCungCap.php";

                $(".input-label").text("Tên nhà cung cấp:");
                $(".modal-title").text("Chỉnh sửa nhà cung cấp");
                $("#obj-name-val").val($row.find(".supplier-name").text());
                console.log(obj_id);
            });
        });
    });

    function updateRowData() {
        var length = 0;
        var index = 0;

        if (action_type == "edit-unit") {
            length = $(".btn-edit-unit").length;

            for (let i = 0; i < length; i++)
            {
                if ($($(".btn-edit-unit").get(i)).attr('id') == obj_id) {
                    index = i;
                    break;
                }
            }

            var $row = $($(".btn-edit-unit").get(index)).closest('tr');
            $row.find('.unit-name').text($("#obj-name-val").val());
        }
        if (action_type == "edit-type") {
            length = $(".btn-edit-type").length;

            for (let i = 0; i < length; i++)
            {
                if ($($(".btn-edit-type").get(i)).attr('id') == obj_id) {
                    index = i;
                    break;
                }
            }

            var $row = $($(".btn-edit-type").get(index)).closest('tr');
            $row.find('.type-name').text($("#obj-name-val").val());
        }
        if (action_type == "edit-sts") {
            length = $(".btn-edit-sts").length;

            for (let i = 0; i < length; i++)
            {
                if ($($(".btn-edit-sts").get(i)).attr('id') == obj_id) {
                    index = i;
                    break;
                }
            }

            var $row = $($(".btn-edit-sts").get(index)).closest('tr');
            $row.find('.sts-name').text($("#obj-name-val").val());
        }
        if (action_type == "edit-supplier") {
            length = $(".btn-edit-supplier").length;

            for (let i = 0; i < length; i++)
            {
                if ($($(".btn-edit-supplier").get(i)).attr('id') == obj_id) {
                    index = i;
                    break;
                }
            }

            var $row = $($(".btn-edit-supplier").get(index)).closest('tr');
            $row.find('.supplier-name').text($("#obj-name-val").val());
        }
    }

    //Nút xóa đơn vị tính
    $(".btn-delete-unit").each(function(index) {
        $(this).on("click", function() {
            Swal.fire({
                title: 'Xóa đơn vị tính',
                text: 'Thao tác này sẽ xóa đơn vị tính và không thể hoàn tác. Bạn vẫn muốn tiếp tục?',
                showDenyButton: true,
                confirmButtonText: 'Hủy',
                denyButtonText: `Xóa`,
            }).then((result) => {
                if (result.isConfirmed) {
                    
                } else if (result.isDenied) {
                    var $row = $(this).closest('tr');
                    action_type = "delete";
                    obj_id = $row.attr('id');
                    
                    // Ajax config
                    $.ajax({
                        type: "POST",
                        url: '../controllers/C_DonViTinh.php',
                        data: {
                            action: action_type,
                            unit_id: obj_id,
                        },
                        beforeSend: function () {
                            
                        },
                        success: function (response) {
                            var jsonData = JSON.parse(response);

                            if (jsonData.success == "1")
                            {
                                Swal.fire(
                                    'Thành công!',
                                    'Đã xóa đơn vị tính',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        //location.reload();
                                        $row.remove();
                                    }
                                })
                            }
                            else {
                                Swal.fire(
                                    'Thất bại!',
                                    'Vui lòng kiểm tra lại!',
                                    'error'
                                )
                            }
                        },
                        complete: function() {
                        
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });
                }
            })
        })
    });

    //Nút xóa nhà cung cấp
    $(".btn-delete-supplier").each(function(index) {
        $(this).on("click", function() {
            Swal.fire({
                title: 'Xóa nhà cung cấp',
                text: 'Thao tác này sẽ xóa nhà cung cấp và không thể hoàn tác. Bạn vẫn muốn tiếp tục?',
                showDenyButton: true,
                confirmButtonText: 'Hủy',
                denyButtonText: `Xóa`,
            }).then((result) => {
                if (result.isConfirmed) {
                    
                } else if (result.isDenied) {
                    var $row = $(this).closest('tr');
                    obj_id = $row.attr('id');
                    action_type = "delete";
                    
                    // Ajax config
                    $.ajax({
                        type: "POST",
                        url: '../controllers/C_NhaCungCap.php',
                        data: {
                            action: action_type,
                            supplier_id: obj_id,
                        },
                        beforeSend: function () {
                            
                        },
                        success: function (response) {
                            var jsonData = JSON.parse(response);

                            if (jsonData.success == "1")
                            {
                                Swal.fire(
                                    'Thành công!',
                                    'Đã xóa nhà cung cấp',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        //location.reload();
                                        $row.remove();
                                    }
                                })
                            }
                            else {
                                Swal.fire(
                                    'Thất bại!',
                                    'Vui lòng kiểm tra lại!',
                                    'error'
                                )
                            }
                        },
                        complete: function() {
                        
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });
                }
            })
        })
    });

    //Nút xóa loại ng.vật liệu
    $(".btn-delete-mater-type").each(function(index) {
        $(this).on("click", function() {
            Swal.fire({
                title: 'Xóa loại nguyên vật liệu',
                text: 'Thao tác này sẽ xóa loại nguyên vật liệu và không thể hoàn tác. Bạn vẫn muốn tiếp tục?',
                showDenyButton: true,
                confirmButtonText: 'Hủy',
                denyButtonText: `Xóa`,
            }).then((result) => {
                if (result.isConfirmed) {
                    
                } else if (result.isDenied) {
                    var $row = $(this).closest('tr');
                    obj_id = $row.attr('id');
                    action_type = "delete";
                    
                    // Ajax config
                    $.ajax({
                        type: "POST",
                        url: '../controllers/C_LoaiNguyenVatLieu.php',
                        data: {
                            action: action_type,
                            type_id: obj_id,
                        },
                        beforeSend: function () {
                            
                        },
                        success: function (response) {
                            var jsonData = JSON.parse(response);

                            if (jsonData.success == "1")
                            {
                                Swal.fire(
                                    'Thành công!',
                                    'Đã xóa loại nguyên vật liệu',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        //location.reload();
                                        $row.remove();
                                    }
                                })
                            }
                            else {
                                Swal.fire(
                                    'Thất bại!',
                                    'Vui lòng kiểm tra lại!',
                                    'error'
                                )
                            }
                        },
                        complete: function() {
                        
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });
                }
            })
        })
    });

    //Nút xóa tình trạng
    $(".btn-delete-sts").each(function(index) {
        $(this).on("click", function() {
            Swal.fire({
                title: 'Xóa tình trạng',
                text: 'Thao tác này sẽ xóa tình trạng và không thể hoàn tác. Bạn vẫn muốn tiếp tục?',
                showDenyButton: true,
                confirmButtonText: 'Hủy',
                denyButtonText: `Xóa`,
            }).then((result) => {
                if (result.isConfirmed) {
                    
                } else if (result.isDenied) {
                    var $row = $(this).closest('tr');
                    obj_id = $row.attr('id');
                    action_type = "delete";
                    
                    // Ajax config
                    $.ajax({
                        type: "POST",
                        url: '../controllers/C_TinhTrang.php',
                        data: {
                            action: action_type,
                            sts_id: obj_id,
                        },
                        beforeSend: function () {
                            
                        },
                        success: function (response) {
                            var jsonData = JSON.parse(response);

                            if (jsonData.success == "1")
                            {
                                Swal.fire(
                                    'Thành công!',
                                    'Đã xóa tình trạng',
                                    'success'
                                ).then((result) => {
                                    if (result.isConfirmed) {
                                        // location.reload();
                                        $row.remove();
                                    }
                                })
                            }
                            else {
                                Swal.fire(
                                    'Thất bại!',
                                    'Vui lòng kiểm tra lại!',
                                    'error'
                                )
                            }
                        },
                        complete: function() {
                        
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                        }
                    });
                }
            })
        })
    });

    function checkInput() {
        if ($("#obj-name-val").val() == "") {
            return false;
        }
        return true;
    }   
</script>

<script type="text/javascript">
  	$(document).ready(function() {
  		$("#saveData").on("click", function() {
            if (checkInput()) {
                var $this 		    = $(this);
                var $caption        = $this.html();

                // Ajax config
                $.ajax({
                    type: "POST",
                    url: path,
                    data: {
                        action: action_type,
                        id: obj_id,
                        name: $("#obj-name-val").val()
                    },
                    beforeSend: function () {
                        $this.attr('disabled', true).html("Đang xử lý...");
                    },
                    success: function (response) {
                        console.log(response);
                        var jsonData = JSON.parse(response);
    
                        if (jsonData.success == "1")
                        {
                            Swal.fire(
                                'Thành công!',
                                'Thao tác thành công!',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    if (action_type.includes("edit")) {
                                        $('#myModal').modal('hide');
                                        updateRowData();
                                    }
                                    else location.reload();
                                }
                            })
                        }
                        else {
                            Swal.fire(
                                'Thất bại!',
                                'Vui lòng kiểm tra lại!',
                                'error'
                            )
                        }
                    },
                    complete: function() {
                        $this.attr('disabled', false).html($caption);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            }
            else {
                Swal.fire(
                    'Thất bại!',
                    'Vui lòng nhập đủ dữ liệu!',
                    'error'
                )
                // $(".alert").addClass("open");
            }
  		});
  	});
</script>